<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\User;
use App\Users_Role;
use App\Role;
use App\Job_Application;
use App\Employer;
use App\Address;
use App\Job;
use App\Location;
use App\job_board;
use App\Job_location;
use App\job_education_detail;
use App\Jobs_seed_data_type;
use App\Jobs_seed_data;
use Carbon\Carbon;
use Auth;
use Mail;
use App\Services\UUID;
use App\Services\LocationServices;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Services\JobServices;
use App\Services\UtilityServices;
// use App\Services\UUID;
use App\Notifications\UserNotifications;
use App\Services\JobSeekerServices;
use Illuminate\Support\Facades\Log;
//Log::info('CandidateInformation function Started.');
use Session;
/* Starts Anand Coding */
use App\Schools;
use App\test;
use App\job_type;
/* Ends Anand Coding */



/*
this class is used to call users functions.
 */
class APIServices
{

    /**
     * Get Jobs_seed_data_type.
     *
     * @param  null
     * @return App\Jobs_seed_data_type
     */

  public function __construct()
    {
        $this->location_service = new LocationServices();
        $this->user_service = new UserServices();
        $this->jobseeker_service = new JobSeekerServices();
        $this->job_service = new JobServices();
        $this->utility_service = new JobServices();
    }

    public function get_active_recruitements_for_api(){
        $info = array();
        $job_school_info = array();
        $jobTypes = job_type::where('isactive',1)->get();
        //print_r($jobTypes);
        /* foreach($jobTypes as $jobType){
          $j=0; */
        $campus_jobs = DB::table('jobs')
        ->where('source', '=', 2)
        ->where('isposted', '=', 1)
        ->where('active', '=', 1)
        //->where('jobtype', '=', $jobType->job_type)
        ->select('*' ,"jobs.id as JOBID")
        ->groupBy('job_type')
        ->get();

      //print_r($campus_jobs);
        if(!empty($campus_jobs)){
        $locations;
        foreach($campus_jobs as $campus_job){
          $contact_details = json_decode($campus_job->contact_details);
          $locations = DB::table('job_locations')
          ->where('job_id', '=', $campus_job->JOBID)
          ->get();
          //get job locations by job id..
          $loc = '';
          foreach($locations as $location){    
            $loc = $location->city.','.$loc;
          }
          //get school info by using job board mapping..
          $schools = DB::table('job_board_mapping')
          ->join('school_info', 'S_Id', '=', 'boardid')
          ->where('jobid', '=', $campus_job->JOBID)
          ->select('School_Name')
          ->get();

          // for every school in to put job info...
          $i = 0;
          foreach($schools as $school){
            $info[$i] = array(
              "Job_id" =>$campus_job->JOBID,
              "School Name"=>$school->School_Name, 
              "Job Title"=>$campus_job->jobtitle,
              "Company"=>$campus_job->company, 
              "Recruiter"=> $contact_details->name, 
              "Posted Date"=>$campus_job->postedts, 
              "Expiry Date"=>$campus_job->expiryts, 
              "Salary"=>$campus_job->min_salary, 
              "Job Location"=>rtrim($loc, ','), 
             // "Company Location"=>$campus_job->company
            ); 
            $i++;
          }
          $job_school_info[$campus_job->job_type] = $info;
        }
      }
      return json_encode($job_school_info);  
    }
}
