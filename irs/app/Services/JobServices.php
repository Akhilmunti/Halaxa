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
use App\Online_Interview_Questions;
use App\job_education_detail;
use App\Jobs_seed_data_type;
use App\test_tracking;
use App\Jobs_seed_data;
use Carbon\Carbon;
use Auth;
use Mail;
use App\AssessmentTest;
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
// use App\Services\UUID;
use App\Notifications\UserNotifications;
use App\Services\JobSeekerServices;
use App\Services\AssessmentTestServices;
use Illuminate\Support\Facades\Log;
//Log::info('CandidateInformation function Started.');
use Session;
/* Starts Anand Coding */
use App\Schools;
use App\job_type;
/* Ends Anand Coding */
use Ixudra\Curl\Facades\Curl;

/*
  this class is used to call users functions.
 */

class JobServices {

    /**
     * Get Jobs_seed_data_type.
     *
     * @param  null
     * @return App\Jobs_seed_data_type
     */
    public function __construct() {
        $this->location_service = new LocationServices();
        $this->user_service = new UserServices();
        $this->jobseeker_service = new JobSeekerServices();
        $this->assessmenttestservices = new AssessmentTestServices();
    }

    public function getJobSeedDataTypes() {
        Log::info('getJobSeedDataTypes function Started.');
        Log::info('getJobSeedDataTypes function Ended.');
        return Jobs_seed_data_type::get();
    }

    public function getJobboards() {
        Log::info('getJobboards function Started.');
        Log::info('getJobboards function Ended.');
        return Job_Board::where("isactive", "=", 1)->get();
        //return Job_Board::where("isactive", "=", 1)->where('id', '=', 1)->get();
    }

    public function getSavedjobposting() {
        Log::info('getSavedjobposting function Started.');
        $EmployerId = $this->getemployeridbylogedinuser();
        Log::info('getSavedjobposting function Ended.');
        return DB::table('jobs')
                        ->leftjoin('jobs_seed_data as jsdfa', 'jobs.functional_area', '=', 'jsdfa.id')
                        ->leftjoin('jobs_seed_data as jsdjr', 'jobs.role', '=', 'jsdjr.id')
                        ->where('jobs.isposted', '=', 0)
                        ->where("jobs.source", "=", 1)
                        ->where("jobs.employerid", "=", $EmployerId[0]->id)
                        ->where('jobs.active', '=', 1)
                        ->select('jobs.id', 'jobs.company', 'jobs.Isfinished', 'jobs.created_at', 'jobs.jobtitle', 'jobs.source', 'jsdfa.value as functional_area_value', 'jsdjr.value as job_role_value')
                        ->orderBy('jobs.updated_at', 'desc')->paginate(12);
    }

    public function getSavedCampusRecruitements() {
        Log::info('getSavedCampusRecruitements function Started.');
        $EmployerId = $this->getemployeridbylogedinuser();
        Log::info('getSavedCampusRecruitements function Ended.');

        return DB::table('jobs')
                        ->leftjoin('jobs_seed_data as jsdfa', 'jobs.functional_area', '=', 'jsdfa.id')
                        ->leftjoin('jobs_seed_data as jsdjr', 'jobs.role', '=', 'jsdjr.id')
                        ->where('jobs.isposted', '=', 0)
                        ->where("jobs.source", "=", 2)
                        ->where("jobs.employerid", "=", $EmployerId[0]->id)
                        ->where('jobs.active', '=', 1)
                        ->select('jobs.id', 'jobs.company', 'jobs.Isfinished', 'jobs.created_at', 'jobs.jobtitle', 'jobs.source', 'jsdfa.value as functional_area_value', 'jsdjr.value as job_role_value')
                        ->orderBy('jobs.updated_at', 'desc')->paginate(12);
    }

    public function getActivejobopening() {
        Log::info('getActivejobopening function Started.');
        $EmployerId = $this->getemployeridbylogedinuser();
        Log::info('getActivejobopening function Ended.');
        return job::where("isposted", "=", 1)->where("isdeleted", "=", 0)->where("active", "=", 1)->where("source", "=", 1)->where("employerid", "=", $EmployerId[0]->id)->orderBy('updated_at', 'desc')->paginate(12);
    }

    public function getActiveCampusRecruitement() {
        Log::info('getActiveCampusRecruitement function Started.');
        $EmployerId = $this->getemployeridbylogedinuser();
        Log::info('getActiveCampusRecruitement function Ended.');
        return job::where("isposted", "=", 1)->where("active", "=", 1)->where("source", "=", 2)->where("employerid", "=", $EmployerId[0]->id)->orderBy('updated_at', 'desc')->paginate(12);
    }

    public function getAppliedjobHistory() {
        Log::info('getAppliedjobHistory function Started.');
        $jobseekerid = $this->jobseeker_service->getjobseekeridbylogedinuser();
        $jobseekerid = $jobseekerid[0]->id;
        $jobappliedbyjs = $this->jobseeker_service->getappliedjobsbylogedinjs();
        $jobids = array();
        foreach ($jobappliedbyjs as $Jobid) {
            array_push($jobids, $Jobid->jobid);
        }
        Log::info('getAppliedjobHistory function Ended.');

        return DB::table('jobs')
                        ->leftjoin('job_applications as ja', 'ja.jobid', '=', 'jobs.id')
                        ->whereIn('jobs.id', $jobids)
                        ->where('jobs.isposted', '=', 1)
                        ->where("ja.jobseekerid", "=", $jobseekerid)
                        ->where('jobs.active', '=', 1)
                        ->where('jobs.source', '=', 1)
                        ->select('jobs.*', 'ja.vi_submitted_date', 'ja.is_at_enabled', 'ja.at_expiry_date', 'ja.is_vi_enabled', 'ja.vi_expiry_date', 'ja.id as applicationid', 'ja.jobseekerid as applicantid', 'ja.jobid as jobid', 'ja.created_at as application_created_date')
                        ->orderBy('ja.updated_at', 'desc')->paginate(12);
    }

    public function datediffindays($frm_date, $to_date) {
        Log::info('datediffindays function Started.');

        $datefiff = date_diff(date_create(date('Y-m-d', strtotime($frm_date))), date_create(date('Y-m-d', strtotime($to_date))))->format("%a");
        Log::info('datediffindays function Ended.');
        return $datefiff;
        // die();
    }

    public function totalActiveJobs() {
        Log::info('totalActiveJobs function Started.');
        $EmployerId = $this->getemployeridbylogedinuser();
        Log::info('totalActiveJobs function Ended.');
        return job::where("isposted", "=", 1)->where("isdeleted", "=", 0)->where("active", "=", 1)->where("employerid", "=", $EmployerId[0]->id)->count();
    }

    public function totalsavedJobs() {
        Log::info('totalPostedJobs function Started.');
        $EmployerId = $this->getemployeridbylogedinuser();
        //echo $EmployerId[0]->id;
        //exit;
        // print_r($EmployerId); die();
        Log::info('totalPostedJobs function Ended.');
        return job::where("isposted", "=", 0)->where("active", "=", 1)->where("employerid", "=", $EmployerId[0]->id)->count();
    }

    public function getjobboardmappingdata($Jobid) {
        Log::info('getjobboardmappingdata function Started.');
        Log::info('getjobboardmappingdata function End.');
        return DB::table('job_board_mapping')->where('job_board_mapping.jobid', '=', $Jobid)
                        ->where('job_board_mapping.isactive', '=', 1)->get();
    }

    public function totalApplicant() {
        Log::info('totalResponces function Started.');
        $employerid = $this->getemployeridbylogedinuser();
        return DB::table('job_applications')
                        ->join('job_seeker', 'job_applications.jobseekerid', '=', 'job_seeker.id')
                        ->join('jobs', 'job_applications.jobid', '=', 'jobs.id')
                        ->join('users', 'users.uuid', '=', 'job_seeker.userid')
                        ->where('job_applications.isdeleted', '=', 0)
                        ->where('jobs.active', '=', 1)
                        ->where('users.isactive', '=', 1)
                        ->where('jobs.employerid', '=', $employerid[0]->id)
                        ->count();
        Log::info('totalResponces function Ended.');
        //return Job_Application::count();
    }

    public function getActivejobopeningsForJS() {
        Log::info('getActivejobopeningsForJS function Started.');
        $jobids = array();
        $jobappliedbyjs = $this->jobseeker_service->getappliedjobsbylogedinjs();

        $employerid = $this->getemployeridbylogedinuser();
        if (count($employerid) > 0) {
            $employerid = $employerid[0]->id;
        } else {
            $employerid = "";
        }

        foreach ($jobappliedbyjs as $Jobid) {
            array_push($jobids, $Jobid->jobid);
        }

        Log::info('getActivejobopeningsForJS function Ended.');
        return DB::table('users')
                        ->leftjoin('employer', 'users.uuid', '=', 'employer.userid')
                        ->leftjoin('jobs', 'employer.id', '=', 'jobs.employerid')
                        ->leftjoin('address', 'employer.addressid', '=', 'address.id')
                        ->leftJoin('location as statelocation', 'statelocation.location_id', '=', 'address.regionid')
                        ->leftJoin('location as countrylocation', 'countrylocation.location_id', '=', 'address.countryid')
                        ->leftJoin('images', 'images.id', '=', 'users.logoid')
                        ->select('jobs.*', 'address.city', 'address.pincode', 'address.addline1', 'address.addline2', 'statelocation.name as statename', 'countrylocation.name as countryname', 'images.path', "jobs.postedts")
                        ->where('jobs.isposted', '=', 1)
                        ->where('jobs.active', '=', 1)
                        ->where('jobs.source', '=', 1)
                        ->where('users.isactive', '=', 1)
                        ->whereNotIn('jobs.id', $jobids)
                        ->where('jobs.employerid', '!=', $employerid)
                        ->orderBy('jobs.updated_at', 'desc')
                        ->paginate(12);
    }

    public function getJobWithId(Request $request) {
        Log::info('getJobWithId function Started.');
        $Jobid = $request->id;
        Log::info('getJobWithId function Ended.');
        return job::where("id", "=", $Jobid)->get();
    }

    public function getJobQualificationWithIdUG(Request $request) {
        Log::info('getJobQualificationWithIdUG function Started.');
        $Jobid = $request->id;
        Log::info('getJobQualificationWithIdUG function Ended.');
        return job_education_detail::where("jobid", "=", $Jobid)->where("isActive", "=", 1)->where("type", "=", "Ug")->get();
    }

    public function getJobQualificationWithIdPG(Request $request) {
        Log::info('getJobQualificationWithIdPG function Started.');
        $Jobid = $request->id;
        Log::info('getJobQualificationWithIdPG function Ended.');
        return job_education_detail::where("jobid", "=", $Jobid)->where("isActive", "=", 1)->where("type", "=", "Pg")->get();
    }

    public function getJobQualificationWithIdDOCTORATE(Request $request) {
        Log::info('getJobQualificationWithIdDOCTORATE function Started.');
        $Jobid = $request->id;
        Log::info('getJobQualificationWithIdDOCTORATE function Ended.');
        return job_education_detail::where("jobid", "=", $Jobid)->where("isActive", "=", 1)->where("type", "=", "Ppg")->get();
    }

    public function getJobLocationWithId(Request $request) {
        Log::info('getJobLocationWithId function Started.');
        $Jobid = $request->id;
        Log::info('getJobLocationWithId function Ended.');
        return Job_location::where("job_id", "=", $Jobid)->where("isActive", "=", 1)->get();
    }

    public function getCandidateApplications() {
        Log::info('getCandidateApplications function Started.');
        $employerid = $this->getemployeridbylogedinuser();
        Log::info('getCandidateApplications function Ended.');
        return DB::table('job_applications')
                        ->join('job_seeker', 'job_applications.jobseekerid', '=', 'job_seeker.id')
                        ->join('jobs', 'job_applications.jobid', '=', 'jobs.id')
                        ->join('users', 'users.uuid', '=', 'job_seeker.userid')
                        ->where('job_applications.isdeleted', '=', 0)
                        ->where('jobs.active', '=', 1)
                        ->where('users.isactive', '=', 1)
                        ->where('jobs.employerid', '=', $employerid[0]->id)
                        ->orderBy('job_applications.updated_at', 'desc')
                        ->select('users.name', 'jobs.jobtitle', 'jobs.id as jobid', 'job_applications.shortlisted', 'job_applications.is_at_enabled', 'job_applications.at_expiry_date', 'job_applications.is_vi_enabled', 'job_applications.vi_submitted_date', 'job_applications.app_rating', 'job_applications.app_comment', 'job_applications.comments', 'job_applications.created_at', 'job_seeker.id')
                        ->paginate(12);
    }

    /**
     * Get Jobs_seed_data BY Type.
     *
     * @param  null
     * @return App\Jobs_seed_data BY Type
     */
    public function getJobSeedDataByTypeUG() {
        Log::info('getJobSeedDataByTypeUG function Started.');
        Log::info('getJobSeedDataByTypeUG function Ended.');
        return Jobs_seed_data::where("type", "=", 1004)->where("parent_id", "=", -1)->get();
    }

    public function getJobSeedDataByTypePG() {
        Log::info('getJobSeedDataByTypePG function Started.');
        Log::info('getJobSeedDataByTypePG function Ended.');
        return Jobs_seed_data::where("type", "=", 1005)->where("parent_id", "=", -1)->get();
    }

    public function getJobSeedDataByTypeDR() {
        Log::info('getJobSeedDataByTypeDR function Started.');
        Log::info('getJobSeedDataByTypeDR function Ended.');
        return Jobs_seed_data::where("type", "=", 1006)->where("parent_id", "=", -1)->get();
    }

    public function getJobFunctionalArea() {
        Log::info('getJobFunctionalArea function Started.');
        Log::info('getJobFunctionalArea function Ended.');
        return Jobs_seed_data::where("type", "=", 1002)->where("parent_id", "=", -1)->orderBy('value', 'ASC')->get();
    }

    public function getJobIndustry() {
        Log::info('getJobIndustry function Started.');
        Log::info('getJobIndustry function Ended.');
        return Jobs_seed_data::where("type", "=", 1001)->where("parent_id", "=", -1)->get();
    }

    public function getJobRole() {
        Log::info('getJobRole function Started.');
        Log::info('getJobRole function Ended.');
        return Jobs_seed_data::where("type", "=", 1003)->where("parent_id", "=", -1)->get();
    }

    public function getJobRolesByFunctionalArea($parentid) {
        Log::info('getJobRolesByFunctionalArea function Started.');
        Log::info('getJobRolesByFunctionalArea function Ended.');
        return Jobs_seed_data::where("type", "=", 1003)->where("parent_id", "=", $parentid)->get();
    }

    public function getJobCurrentPosition() {
        Log::info('getJobCurrentPosition function Started.');
        Log::info('getJobCurrentPosition function Ended.');
        return Jobs_seed_data::where("type", "=", 1003)->where("is_visible", "=", 1)->get();
    }

    public function deletesavedjobwithid(Request $request) {
        Log::info('deletesavedjobwithid function Started.');
        // echo $id; die();
        $id = $request->jobid;
        $deletejob = ['active' => '0'];
        Job::where("id", "=", $id)->update($deletejob);
        Log::info('deletesavedjobwithid function Ended.');
        return 'Job Deleted Successfully';
    }

    public function updateJob($request) {
        Log::info('updateJob function Started.');
        $Job = new job;
        $JobLocation = new Job_location;
        $JobEducation = new job_education_detail;
        $condition = $request->condition;

        if ($condition == 1) {
            $date = date("Y-m-d H:i:s");
            $day = config('app.NoofDaysForJobPost');
            $expiryts = date('Y-m-d H:i:s', strtotime("+$day days"));
            $isActive = '1';
            $isPosted = '0';
            $postedts = '0000-00-00 00:00:00';
            $isfinished = '1';
        } else {
            if ($condition == 0) {
                $date = date("Y-m-d H:i:s");
                $day = config('app.NoofDaysForJobPost');
                $expiryts = date('Y-m-d H:i:s', strtotime("+$day days"));
                $isActive = '1';
                $isPosted = '0';
                $postedts = '0000-00-00 00:00:00';
                $isfinished = '0';
            }
        }
        if ($request->PAGENAME == 'CAMPUS' || $request->PAGENAME == 'EDIT_CAMPUS') {

            $job_type = $request->job_type;
        } else {
            $job_type = 'job';
        }
        //  print_r($request->PAGENAME);print_r($source);print_r($job_type);

        $ContactDetails = json_encode($request->obj);

        $industry = implode(" ", $request->industry);
        $FunctionRole = implode(" ", $request->FunctionRole);
        $jobrole = implode(" ", $request->jobrole);

        //die();
        //array
        $jobsdata = [
            'jobtitle' => $request->Jobtitle,
            'description' => $request->editor1,
            'min_years' => $request->minexp,
            'max_years' => $request->maxexp,
            'number_of_vacancies' => config('app.number_of_vacancies'),
            'role' => $jobrole,
            'type' => $request->Employmenttype,
            // $Job->about = '';
            'active' => $isActive, //default not posted;
            'keyskills' => $request->editor2,
            'currency_type' => $request->currency,
            'max_salary' => $request->annualmaxpkg,
            'min_salary' => $request->annualminpkg,
            // $Job->salary_details = '';
            'functional_area' => $FunctionRole,
            'brief' => $request->editor3,
            'comments' => $request->editor4,
            //$Job->isdeleted = ''; //default 0 not deleted
            'postedts' => $postedts,
            'isposted' => $isPosted, // default 1  posted
            'expiryts' => $expiryts,
            'industry' => $industry,
            'videourl' => $request->CompanyVideoUrl,
            'contact_details' => $ContactDetails,
            'rel_min_years' => $request->minrelexp,
            'rel_max_years' => $request->maxrelexp,
            'positioncriteria' => $request->currentposition,
            'servicetenure' => $request->servicetenure,
            'hidesalary' => $request->hidesalary,
            'salarynotconstraint' => $request->salarynotconstraint,
            'pref_min_age' => $request->prefminage,
            'pref_max_age' => $request->prefmaxage,
            'company' => $request->Ccmpanyname,
            'Isfinished' => $isfinished,
            'number_of_vacancies' => $request->jobopning,
            'job_type' => $job_type
        ];
        // print_r($request->PAGENAME);print_r($source);print_r($job_type);
        // echo 'in job service session value: ';
        $jobid = $request->session()->get('recentjobid');
        DB::table('jobs')->where('id', $jobid)->update($jobsdata);

        if ($condition == 1) {
            $username = Auth::user()->name;
            $orderemail = Auth::user()->email;
            $companyname = ucwords($request->companyname);

            $data = array('name' => $username,
                'today' => date("m.d.y"),
                'company_Name' => $companyname,
                'Job_Title' => $request->Jobtitle
            );
            $subject = 'Successfully Finished the Job With FoodLinked!';

            Mail::send('mailJobFinishing', $data, function ($message) use ($orderemail, $subject) {
                $message->to($orderemail)->subject($subject);
                $message->bcc(config('app.CC_MailID'));
            });
        }

        // -------------UG course split-------------------
        $ugstr = $request->ug;
        $string_parts_ug = implode(" - ", (array) $ugstr);
        $myUgArray = explode(' - ', $string_parts_ug);
        $UgarrayLength = count($myUgArray);
        $updateallug = ['isActive' => '0'];
        DB::table('job_education_details')->where('jobid', '=', $jobid)->where('type', '=', 'Ug')->update($updateallug);
        for ($i = 0; $i < $UgarrayLength; $i++) {
            $UgarrayPart = $myUgArray[$i];
            $ugarray = preg_split('/,/', $UgarrayPart);
            $key = $ugarray[0];

            if (isset($ugarray[1])) {
                $data = $ugarray[1];
                //echo $key;
                //echo $data;
                $ugjobecadmicsRecord = count(DB::table('job_education_details')->where('jobid', '=', $jobid)->where('type', '=', 'Ug')->where('qualification', '=', $key)->where('specialization', '=', $data)->get());
                if ($ugjobecadmicsRecord == 0) {
                    $insertugdata = array(
                        array('jobid' => $jobid, 'type' => 'Ug', 'qualification' => $key, 'specialization' => $data, 'isActive' => '1'));
                    job_education_detail::insert($insertugdata);
                } else {
                    $updateugdata = ['isActive' => '1'];

                    //print_r($updateugdata);
                    DB::table('job_education_details')->where('jobid', '=', $jobid)->where('type', '=', 'Ug')->where('qualification', '=', $key)->where('specialization', '=', $data)->update($updateugdata);
                }
            }
        }

        echo 'out of loop ug';

        unset($key);
        unset($data);

        // -------------PG course split---------------
        $pgstr = $request->pg;
        $string_parts_pg = implode(" - ", (array) $pgstr);
        $myPgArray = explode(' - ', $string_parts_pg);
        $PgarrayLength = count($myPgArray);
        $updateallpg = ['isActive' => '0'];
        DB::table('job_education_details')->where('jobid', '=', $jobid)->where('type', '=', 'Pg')->update($updateallpg);
        for ($i = 0; $i < $PgarrayLength; $i++) {
            $PgarrayPart = $myPgArray[$i];
            $pgarray = preg_split('/,/', $PgarrayPart);
            $key = $pgarray[0];
            if (isset($pgarray[1])) {
                $data = $pgarray[1];
                $pgjobecadmicsRecord = count(DB::table('job_education_details')->where('jobid', '=', $jobid)->where('type', '=', 'Pg')->where('qualification', '=', $key)->where('specialization', '=', $data)->get());
                if ($pgjobecadmicsRecord == 0) {
                    $insertpgdata = array(
                        array('jobid' => $jobid, 'type' => 'Pg', 'qualification' => $key, 'specialization' => $data, 'isActive' => '1'));
                    job_education_detail::insert($insertpgdata);
                } else {
                    $updatepgdata = ['isActive' => '1'];

                    //print_r($updatepgdata);
                    DB::table('job_education_details')->where('jobid', '=', $jobid)->where('type', '=', 'Pg')->where('qualification', '=', $key)->where('specialization', '=', $data)->update($updatepgdata);
                }
            }
        }
        unset($key);
        unset($data);

        // -------------DOCTORATE course split---------------

        $doctoratestr = $request->doctorate;
        $string_parts_doctorate = implode(" - ", (array) $doctoratestr);
        $myDoctorateArray = explode(' - ', $string_parts_doctorate);
        $DoctoratearrayLength = count($myDoctorateArray);
        $updatealldoctorate = ['isActive' => '0'];
        DB::table('job_education_details')->where('jobid', '=', $jobid)->where('type', '=', 'Ppg')->update($updatealldoctorate);

        for ($i = 0; $i < $DoctoratearrayLength; $i++) {
            $DoctoratearrayPart = $myDoctorateArray[$i];
            $doctoratearray = preg_split('/,/', $DoctoratearrayPart);
            $key = $doctoratearray[0];
            if (isset($doctoratearray[1])) {
                $data = $doctoratearray[1];
                $doctoratejobecadmicsRecord = count(DB::table('job_education_details')->where('jobid', '=', $jobid)->where('type', '=', 'Ppg')->where('qualification', '=', $key)->where('specialization', '=', $data)->get());
                if ($doctoratejobecadmicsRecord == 0) {
                    $insertdoctoratedata = array(
                        array('jobid' => $jobid, 'type' => 'Ppg', 'qualification' => $key, 'specialization' => $data, 'isActive' => '1'));
                    job_education_detail::insert($insertdoctoratedata);
                } else {
                    $updatedoctoratedata = ['isActive' => '1'];

                    //print_r($updatedoctoratedata);
                    DB::table('job_education_details')->where('jobid', '=', $jobid)->where('type', '=', 'Ppg')->where('qualification', '=', $key)->where('specialization', '=', $data)->update($updatedoctoratedata);
                }
            }
        }
        unset($key);
        unset($data);


        // -------------country course split---------------

        $uucid = UUID::v4();
        $Locationstr = $request->country;
        $string_parts_Location = implode(" - ", (array) $Locationstr);
        $myLocationArray = explode(' - ', $string_parts_Location);
        //print_r($myLocationArray);
        $LocationarrayLength = count($myLocationArray);
        $updatealllocation = ['isActive' => '0'];
        DB::table('job_locations')->where('job_id', '=', $jobid)->update($updatealllocation);
        for ($i = 0; $i < $LocationarrayLength; $i++) {
            $LocationarrayPart = $myLocationArray[$i];

            $Locationarray = preg_split('/,/', $LocationarrayPart);
            $key = $Locationarray[0];
            if (isset($Locationarray[1])) {
                $data = $Locationarray[1];
                if (isset($Locationarray[2])) {
                    $value = $Locationarray[2];
                    //echo $key; echo $data; echo $value;

                    /* $COUNTRYID = location::where('name', '=', $key)->where('parent_id', '=', '0')->first()->location_id;
                      $STATEID = location::where('name', '=', $data)->where('parent_id', '=', $COUNTRYID)->first()->location_id; */
                    $uucid = UUID::v4();


                    $joblocationsRecord = count(DB::table('job_locations')->where('job_id', '=', $jobid)->where('countryid', '=', $key)->where('regionid', '=', $data)->where('city', '=', $value)->get());
                    if ($joblocationsRecord == 0) {
                        $insertlocationdata = array(
                            array('id' => $uucid, 'job_id' => $jobid, 'countryid' => $key, 'regionid' => $data, 'city' => $value, 'isActive' => '1'));
                        Job_location::insert($insertlocationdata);
                    } else {
                        $updatelocationdata = ['isActive' => '1'];

                        //print_r($updatelocationdata);
                        DB::table('job_locations')->where('job_id', '=', $jobid)->where('countryid', '=', $key)->where('regionid', '=', $data)->where('city', '=', $value)->update($updatelocationdata);
                    }
                }
            }
        }

        unset($key);
        unset($data);
        unset($value);



        if ($condition == '1') {
            $boards = [];
            $boards = $request->boards;

            $updateBoards = ['isactive' => '0'];
            DB::table('job_board_mapping')->where('jobid', '=', $jobid)->update($updateBoards);

            if (isset($boards)) {
                $boardarraylength = count($boards);
                for ($i = 0; $i < $boardarraylength; $i++) {
                    $BOARDID = job_board::where('name', '=', $boards[$i])->first()->id;
                    $BoardmappingRecord = count(DB::table('job_board_mapping')->where('jobid', '=', $jobid)->where('boardid', '=', $BOARDID)->get());
                    if ($BoardmappingRecord == 0) {
                        $bucid = UUID::v4();
                        $insertjobboards = array(
                            array('id' => $bucid, 'jobid' => $jobid, 'boardid' => $BOARDID, 'isactive' => '1'));
                        //print_r($insertjobboards);
                        DB::table('job_board_mapping')->insert($insertjobboards);
                    } else {
                        $updateBoards = ['isactive' => '1'];
                        DB::table('job_board_mapping')->where('jobid', '=', $jobid)->where('boardid', '=', $BOARDID)->update($updateBoards);
                    }
                }
            }
            $school_partner = [];
            $school_partner = $request->school_partner;
            if (isset($school_partner)) {
                $school_partnerarraylength = count($school_partner);
                for ($i = 0; $i < $school_partnerarraylength; $i++) {
                    /* $SCHOOLID = Schools::where('School_Name', '=', trim($school_partner[$i]))->where('Status', '=', 1)->first()->S_Id; */
                    //echo 'schoolid: '; print_r($SCHOOLID); 
                    $SchoolmappingRecord = count(DB::table('job_board_mapping')->where('jobid', '=', $jobid)->where('boardid', '=', $school_partner[$i])->get());
                    if ($SchoolmappingRecord == 0) {
                        $bucid = UUID::v4();
                        $insertpartenerforjobs = array(
                            array('id' => $bucid, 'jobid' => $jobid, 'boardid' => $school_partner[$i], 'isactive' => '1'));
                        //print_r($insertpartenerforjobs);
                        DB::table('job_board_mapping')->insert($insertpartenerforjobs);
                    } else {
                        $updatepartenerforjobs = ['isactive' => '1'];
                        DB::table('job_board_mapping')->where('jobid', '=', $jobid)->where('boardid', '=', $school_partner[$i])->update($updatepartenerforjobs);
                    }
                }
            }
        }
        Log::info('updateJob function Ended.');
    }

    public function getemployeridbylogedinuser() {
        Log::info('getemployeridbylogedinuser function Started.');
        $uuuserid = Auth::user()->uuid;
        $JobEmployerid = DB::select("select id from employer WHERE userid = '$uuuserid' ");
        Log::info('getemployeridbylogedinuser function Ended.');
        return $JobEmployerid;
    }

    public function getaddressidbylogedinuser() {
        Log::info('getaddressidbylogedinuser function Started.');
        $uuuserid = Auth::user()->uuid;
        $Employeraddressid = DB::select("select addressid from employer WHERE userid = '$uuuserid' ");
        Log::info('getaddressidbylogedinuser function Ended.');
        return $Employeraddressid;
    }

    public function getlogoidbylogedinuser() {
        Log::info('getlogoidbylogedinuser function Started.');
        $uuuserid = Auth::user()->uuid;
        $Employerlogoid = DB::select("select logoid from employer WHERE userid = '$uuuserid' ");
        Log::info('getlogoidbylogedinuser function Ended.');
        return $Employerlogoid;
    }

    public function getlogobylogoid($logoid) {
        Log::info('getlogobylogoid function Started.');
        $Employerlogo = DB::select("select path from images WHERE id = '$logoid' ");
        Log::info('getlogobylogoid function Ended.');
        return $Employerlogo;
    }

    public function createjob($request) {
        Log::info('createjob function Started.');
        //Log::info('------------------'.print_r($request));
        $Job = new job;
        $JobLocation = new Job_location;
        $JobEducation = new job_education_detail;
        $condition = $request->condition;
        //Log::info('------condition is '.$condition.'----------------');
        if ($condition == 1) {
            $boards = [];
            $boards = $request->boards;
            $school_partner = [];
            $school_partner = $request->school_partner;
            $date = date("Y-m-d H:i:s");
            $day = config('app.NoofDaysForJobPost');
            $expiryts = date('Y-m-d H:i:s', strtotime("+$day days"));
            echo "today is:" . $date;
            echo "<br> and after 50 days is :" . $expiryts;
            $isActive = '1';
            $isPosted = '0';
            $postedts = '0000-00-00 00:00:00';
            $isfinished = '1';
            /*foreach ($school_partner as $sc) {
                Log::info('------partner is ' . $sc . '----------------');
            }*/
        } else {
            if ($condition == 0) {
                $date = date("Y-m-d H:i:s");
                $day = config('app.NoofDaysForJobPost');
                $expiryts = date('Y-m-d H:i:s', strtotime("+$day days"));
                $isActive = '1';
                $isPosted = '0';
                $postedts = '0000-00-00 00:00:00';
                $isfinished = '0';
            }
        }
        $industry = implode(" ", $request->industry);
        $FunctionRole = implode(" ", $request->FunctionRole);
        $jobrole = implode(" ", $request->jobrole);

        $ContactDetails = json_encode($request->obj);
        $uuuserid = Auth::user()->uuid;
        $JobEmployerid = $this->getemployeridbylogedinuser();
        $uuid = UUID::v4();
        //print_r($JobEmployerid);
        if ($request->PAGENAME == 'CAMPUS') {
            $Job->source = $request->SOURCE;
            $Job->job_type = $request->job_type;
        }
        $Job->id = $uuid;
        $Job->employerid = $JobEmployerid[0]->id;
        $Job->jobtitle = $request->Jobtitle;
        $Job->description = $request->editor1;
        $Job->min_years = $request->minexp;
        $Job->max_years = $request->maxexp;
        $Job->number_of_vacancies = config('app.number_of_vacancies');
        $Job->role = $jobrole;
        $Job->type = $request->Employmenttype;
        // $Job->about = '';
        $Job->active = $isActive; //default not posted;
        $Job->keyskills = $request->editor2;
        $Job->currency_type = $request->currency;
        $Job->max_salary = $request->annualmaxpkg;
        $Job->min_salary = $request->annualminpkg;
        // $Job->salary_details = '';
        $Job->functional_area = $FunctionRole;
        $Job->brief = $request->editor3;
        $Job->comments = $request->editor4;
        //$Job->isdeleted = ''; //default 0 not deleted
        $Job->postedts = $postedts;
        $Job->isposted = $isPosted; // default 0 Not posted
        $Job->expiryts = $expiryts;
        $Job->industry = $industry;
        $Job->videourl = $request->CompanyVideoUrl;
        $Job->contact_details = $ContactDetails;
        $Job->rel_min_years = $request->minrelexp;
        $Job->rel_max_years = $request->maxrelexp;
        $Job->positioncriteria = $request->currentposition;
        $Job->servicetenure = $request->servicetenure;
        $Job->hidesalary = $request->hidesalary;
        $Job->salarynotconstraint = $request->salarynotconstraint;
        $Job->pref_min_age = $request->prefminage;
        $Job->pref_max_age = $request->prefmaxage;
        $Job->company = $request->Ccmpanyname;
        $Job->Isfinished = $isfinished;
        $Job->number_of_vacancies = $request->jobopning;
        if ($condition == 1 && !empty($school_partner)) {
            //$Job->partner_id = $school_partner[0];
            $Job->partner_id = implode(',', $school_partner);
        }
        Log::info('------------------'.print_r($Job));
        //print_r($Job);
        //exit;
        $Job->save();

        if ($condition == 1) {
            $username = Auth::user()->name;
            $orderemail = Auth::user()->email;
            $companyname = ucwords($request->companyname);

            $data = array('name' => $username,
                'today' => date("m.d.y"),
                'company_Name' => $companyname,
                'Job_Title' => $request->Jobtitle
            );
            $subject = 'Successfully Finished the Job With FoodLinked!';

            Mail::send('mailJobFinishing', $data, function ($message) use ($orderemail, $subject) {
                $message->to($orderemail)->subject($subject);
                $message->bcc(config('app.CC_MailID'));
            });
        }

        // -------------UG course split-------------------
        $ugstr = $request->ug;
        //$ugstr = "B Com - Accounts,BSc - Tourism and Hospitality Management,BSc - Hotel Management and Catering Technology";
        $string_parts_ug = implode(" - ", (array) $ugstr);
        //print_r("string_parts_ug");print_r($string_parts_ug);
        //exit;
        //Log::info('-------ug string----------'.print_r($request));
        $myUgArray = explode(' - ', $string_parts_ug);
        // print_r("myUgArray"); print_r($myUgArray);
        $UgarrayLength = count($myUgArray);
        //print_r($arrayLength);
        
        //Log::info('-------ug string----------'.count($myUgArray));
        for ($i = 0; $i < count($myUgArray); $i++) {
            $UgarrayPart = $myUgArray[$i];
            //echo $arrayPart;

            $ugarray = preg_split('/,/', $UgarrayPart);
            $key = $ugarray[0];
            if (isset($ugarray[1])) {
                $data = $ugarray[1];
                //echo $key;
                //echo $data;
                $insertugdata = array(
                    array('jobid' => $uuid, 'type' => 'Ug', 'qualification' => $key, 'specialization' => $data, 'isActive' => '1'));
                echo 'in loop';
                //print_r($insertugdata);
                job_education_detail::insert($insertugdata);
            }
        }
        echo 'out of loop ug';

        unset($key);
        unset($data);

        // -------------PG course split---------------
        $pgstr = $request->pg;
        $string_parts_pg = implode(" - ", (array) $pgstr);
        //  print_r("string_parts_pg"); print_r($string_parts_pg);
        $myPgArray = explode(' - ', $string_parts_pg);
        // print_r("myPgArray"); print_r($myPgArray);
        $PgarrayLength = count($myPgArray);
        //print_r($arrayLength);

        for ($i = 0; $i < $PgarrayLength; $i++) {
            $PgarrayPart = $myPgArray[$i];
            //echo $arrayPart;
            $pgarray = preg_split('/,/', $PgarrayPart);
            $key = $pgarray[0];
            if (isset($pgarray[1])) {
                $data = $pgarray[1];
                echo $key;
                echo $data;

                $insertpgdata = array(
                    array('jobid' => $uuid, 'type' => 'Pg', 'qualification' => $key, 'specialization' => $data, 'isActive' => '1'));
                //echo 'in loop pg';
                //print_r($insertpgdata);
                job_education_detail::insert($insertpgdata);
            }
        }
        unset($key);
        unset($data);

        // -------------DOCTORATE course split---------------
        $doctoratestr = $request->doctorate;
        $string_parts_doctorate = implode(" - ", (array) $doctoratestr);
        //  print_r("string_parts_doctorate"); print_r($string_parts_doctorate);
        $myDoctorateArray = explode(' - ', $string_parts_doctorate);
        // print_r("myDoctorateArray");print_r($myDoctorateArray);
        $DoctoratearrayLength = count($myDoctorateArray);
        //print_r($arrayLength);
        for ($i = 0; $i < $DoctoratearrayLength; $i++) {
            $DoctoratearrayPart = $myDoctorateArray[$i];
            //echo $arrayPart;
            $doctoratearray = preg_split('/,/', $DoctoratearrayPart);
            $key = $doctoratearray[0];
            if (isset($doctoratearray[1])) {
                $data = $doctoratearray[1];
                // echo $key; echo $data;
                $insertdoctoratedata = array(
                    array('jobid' => $uuid, 'type' => 'Ppg', 'qualification' => $key, 'specialization' => $data, 'isActive' => '1'));
                echo 'in loop Ppg';
                //print_r($insertdoctoratedata);
                job_education_detail::insert($insertdoctoratedata);
            }
        }
        unset($key);
        unset($data);


        // -------------country course split---------------
        $uucid = UUID::v4();
        $Locationstr = $request->country;
        $string_parts_Location = implode(" - ", (array) $Locationstr);
        // print_r("string_parts_Location"); print_r($string_parts_Location);
        $myLocationArray = explode(' - ', $string_parts_Location);
        // print_r("myLocationArray");
        // print_r($myLocationArray);
        $LocationarrayLength = count($myLocationArray);
        //print_r($arrayLength);

        for ($i = 0; $i < $LocationarrayLength; $i++) {
            $LocationarrayPart = $myLocationArray[$i];
            //echo $arrayPart;

            $Locationarray = preg_split('/,/', $LocationarrayPart);
            $key = $Locationarray[0];
            if (isset($Locationarray[1])) {
                $data = $Locationarray[1];
                if (isset($Locationarray[2])) {
                    $value = $Locationarray[2];
                    // echo $key; echo $data; echo $value;

                    /* $COUNTRYID = location::where('name', '=', $key)->where('parent_id', '=', '0')->first()->location_id;
                      $STATEID = location::where('name', '=', $data)->where('parent_id', '=', $COUNTRYID)->first()->location_id; */
                    $uucid = UUID::v4();
                    $insertcountrydata = array('id' => $uucid, 'job_id' => $uuid, 'countryid' => $key, 'regionid' => $data, 'city' => $value, 'isActive' => '1');
                    //echo 'in loop country';
                    //print_r($insertcountrydata);
                    Job_location::insert($insertcountrydata);
                }
            }
        }

        unset($key);
        unset($data);
        unset($value);
        if ($condition == '1') {
            if (isset($boards)) {
                $boardarraylength = count($boards);
                for ($i = 0; $i < $boardarraylength; $i++) {
                    $BOARDID = job_board::where('name', '=', $boards[$i])->first()->id;
                    $bucid = UUID::v4();
                    $insertjobboards = array(
                        array('id' => $bucid, 'jobid' => $uuid, 'boardid' => $BOARDID, 'isactive' => '1'));
                    //print_r($insertjobboards);
                    DB::table('job_board_mapping')->insert($insertjobboards);
                }
            }
            if (isset($school_partner)) {
                $school_partnerarraylength = count($school_partner);
                for ($i = 0; $i < $school_partnerarraylength; $i++) {
                    /* $SCHOOLID = Schools::where('School_Name', '=', $school_partner[$i])->first()->S_Id; 
                      //echo 'schoolid: '; print_r($SCHOOLID); die(); */
                    $bucid = UUID::v4();
                    $insertpartenerforjobs = array(
                        array('id' => $bucid, 'jobid' => $uuid, 'boardid' => $school_partner[$i], 'isactive' => '1'));
                    //print_r($insertpartenerforjobs);
                    DB::table('job_board_mapping')->insert($insertpartenerforjobs);
                }
            }
        }

        $request->session()->put('recentjobid', $uuid);
        // echo "recentjob";
        // echo $request->session()->get('recentjobid');
        // $request->session()->forget('recentjobid');
        Log::info('createjob function Ended.');
    }

    public function Jobposting($request) {
        Log::info('Jobposting function Started.');
        $date = date("Y-m-d H:i:s");
        $day = 50;
        $expiryts = date('Y-m-d H:i:s', strtotime("+$day days"));
        // echo "today is:".$date;
        // echo "<br> and after 50 days is :".$expiryts;
        $isPosted = '1';
        $postedts = $date;

        $postingData = ['postedts' => $postedts,
            'isposted' => $isPosted, // default 1  posted
            'expiryts' => $expiryts];
        $jobid = $request->session()->get('recentjobid');
        Job::where('id', $jobid)->update($postingData);
        // $request->session()->forget('recentjobid');
        $job_title = Job::where('id', $jobid)->first()->jobtitle;
        $username = Auth::user()->name;
        $companyname = Auth::user()->company;
        $data = array('name' => $username,
            'today' => date("m.d.y"),
            'company_Name' => $companyname,
            'Job_Title' => $job_title
        );
        $subject = 'Successfully Posted Job On FoodLinked!';
        $orderemail = Auth::user()->email;
        Mail::send('mail_job_post', $data, function ($message) use ($orderemail, $subject) {
            $message->subject($subject);
            $message->to($orderemail);
            $message->bcc(config('app.CC_MailID'));
        });
        echo "<script type='text/javascript'>
                  $.toast({
                    heading: 'Success',
                    text: 'You Have Successfully Posted a Job',
                    icon: 'success',    
                    position: 'top-right'
                  });
                  window.location.reload();
              </script>";
        Log::info('Jobposting function Ended.');
        return 'Job Posted Successfully';
    }

    /**
     * Get All jobs.
     *
     * @param  null
     * @return App\Jobs
     */
    public function getJobs() {
        Log::info('getJobs function Started.');
        Log::info('getJobs function Ended.');
        return Jobs::get();
    }

    /**
     * Get job by job id.
     *
     * @param  null
     * @return App\Jobs
     */
    public function getJobsbyJobid($jobid) {
        Log::info('getJobsbyJobid function Started.');
        Log::info('getJobsbyJobid function Ended.');
        return Jobs::find($jobid)->first();
    }

    public function checkemployercount() {
        Log::info('checkemployercount function Started.');
        $uuuserid = Auth::user()->uuid;
        Log::info('checkemployercount function Ended.');
        return Employer::where('userid', $uuuserid)->where('isdeleted', 0)->count();
    }

    public function getCourseByType($qualificationtype) {
        Log::info('getCourseByType function Started.');
        $educationtypeid = jobs_seed_data_type::where('value', $qualificationtype)->first()->id;
        Log::info('getCourseByType function Ended.');
        return Jobs_seed_data::where('type', '=', $educationtypeid)->where('parent_id', '=', '-1')->where('is_visible', '=', '1')->get();
    }

    public function getStreamByCourseType($jsqualificationcourse) {
        Log::info('getStreamByCourseType function Started.');
        $educationcourseid = Jobs_seed_data::where('value', $jsqualificationcourse)->where('parent_id', '=', '-1')->where('is_visible', '=', '1')->first()->id;
        Log::info('getStreamByCourseType function Ended.');
        return Jobs_seed_data::where('parent_id', '=', $educationcourseid)->where('is_visible', '=', '1')->get();
    }

    /* Starts Edited By Anand */

    public function getSchoolsLists() {
        $response = Curl::to(Constants::FETCH_SCHOOLS)->get();
        return $response;
        //Schools::where('Status','=',1)->get();
    }

    public function getlocationsofjob($jobid) {
        Log::info('getlocationsofjob function Started.');
        Log::info('getlocationsofjob function Ended.');
        return $JobEmployerid = DB::select("select city from job_locations WHERE job_id = '$jobid' and isActive = 1");
    }

    public function get_test_category() {
        Log::info('get_test_category function Started.');
        Log::info('get_test_category function Ended.');
        return AssessmentTest::where('active', '=', 1)->distinct()->get(['category']);
    }

    public function getjobtypes() {
        Log::info('getjobtypes function Started.');
        Log::info('getjobtypes function Ended.');
        return job_type::where('isactive', '=', 1)->get();
    }

    public function gettestnameaccordingcategory($typeoftestcategory) {
        Log::info('gettestnameaccordingcategory function Started.');
        Log::info('gettestnameaccordingcategory function Ended.');
        return AssessmentTest::where('active', '=', 1)->where('category', '=', $typeoftestcategory)->get(['test_name', 'id']);
    }

    public function gettestdescriptionbytestid($testid) {
        Log::info('gettestdescriptionbytestid function Started. Test id is ' . $testid);
        Log::info('gettestdescriptionbytestid function Ended.');
        return AssessmentTest::where('active', '=', 1)->where('id', '=', $testid)->first()->coverage;
    }

    public function getmemberavailability() {
        Log::info('getmemberavailability function Started.');
        $response = Curl::to(Constants::FETCH_MEMBER_AVAILABILITY)->get();
        Log::info('getmemberavailability function Ended.');
        return $response;
    }

    public function getcandidatesinmembers($S_Id, $city) {
        Log::info('getcandidatesinmembers function Started.');
        $response = Curl::to(Constants::FETCH_CANDIDATE_AVAILABLE)->withData(['S_Id' => $S_Id, 'C_Id' => $city])->get();
        Log::info('getcandidatesinmembers function Ended.');
        return $response;
    }

    public function postsubmitoffer(Request $request) {
        Log::info('postsubmitoffer function Started.');
        $response = Curl::to(Constants::POST_SUBMIT_OFFER_DATA)->withData(['flag_id' => $request->up_flag, 'School_Id' => $request->School_Id, 'Employee_Id' => $request->Employee_Id, 'Intern_Id' => $request->Intern_Id, 'Country' => $request->Country, 'City' => $request->City, 'Start_Date' => $request->Start_Date, 'End_Date' => $request->End_Date])->post();
        
        Log::info('postsubmitoffer function Ended.----------'.$response);
        return '';
    }

    public function getissuedofferdata() {
        Log::info('getissuedofferdata function Started.');
        $EmployerId = $this->getemployeridbylogedinuser();
        $EmployerId = $EmployerId[0]->id;
        // $employerid = "'".$EmployerId."'";
        $response = Curl::to(Constants::FETCH_ISSUED_OFFERS)->withData(['Employee_Id' => $EmployerId])->get();
        Log::info('getissuedofferdata function Ended.');
        return $response;
    }

    public function updatestatustowithdraw(Request $request) {
        Log::info('updatestatustowithdraw function Started.');
        $response = Curl::to(Constants::POST_MEMBERS_WITHDRAW_OFFER)->withData(['School_Id' => $request->School_Id, 'Employee_Id' => $request->Employee_Id, 'Intern_Id' => $request->Intern_Id, 'Country' => $request->Country, 'City' => $request->City, 'Start_Date' => $request->Start_Date, 'End_Date' => $request->End_Date])->post();
        Log::info('updatestatustowithdraw function Ended.');
        return '';
    }

    public function updatememberoffer(Request $request) {
        Log::info('updatememberoffer function Started.');
        $response = Curl::to(Constants::POST_MEMBER_RE_OFFER)->withData(['School_Id' => $request->School_Id, 'Employee_Id' => $request->Employee_Id, 'Intern_Id' => $request->Intern_Id, 'Country' => $request->Country, 'City' => $request->City, 'Start_Date' => $request->Start_Date, 'End_Date' => $request->End_Date])->post();
        Log::info('updatememberoffer function Ended.');
        return '';
    }

    public function AssignTestToJobseeker(Request $request) {
        Log::info('AssignTestToJobseeker function Started.');
        $jobsinfo = $this->getjobbyid($request->jobid);
        $testids = $request->testid;
        $valueresponse = array();
        $duration = $request->timeduration;
        $expiryts = date('Y-m-d H:i:s', strtotime("+$duration days"));
        $countvar1 = 0;
        foreach ($testids as $testid) {
            $testtrackingid = UUID::v4();
            $valueresponse[$countvar1] = $this->assessmenttestservices->getTestUrl($testtrackingid, $testid, Constants::RETURN_URL, Constants::ENABLE_DEV, Constants::ENABLE_DEBUG, Constants::ENABLE_USE);
            $InsertTestTrackingData = array('id' => $testtrackingid, 'testid' => $testid, 'landing_page_url' => $valueresponse[$countvar1], 'jobid' => $request->jobid, 'expiryts' => $expiryts, 'jobseekerid' => $request->jsid);
            test_tracking::insert($InsertTestTrackingData);
            $countvar1++;
        }
        $username = ucwords($request->jsname);
        $orderemail = $request->jsemail;
        // $companyname = ucwords($request->companyname);
        $data = array('name' => $username,
            'today' => date("m.d.y"),
            'company_Name' => ucwords($jobsinfo[0]->company),
            'Job_Title' => ucwords($jobsinfo[0]->jobtitle),
            'testurls' => $valueresponse,
            'testcategory' => $request->testcategory,
            'expirydate' => $expiryts
        );
        $subject = 'Foodlinked Employer Have Assigned The Test For ' . $jobsinfo[0]->jobtitle . ' Job.';
        Mail::send('AssignedTestReminder', $data, function ($message) use ($orderemail, $subject) {
            $message->to($orderemail)->subject($subject);
            $message->bcc(config('app.CC_MailID'));
        });
        Log::info('AssignTestToJobseeker function Ended.');
        return 'Test Assigned Successfully';
    }

    public function getjobbyid($id) {
        Log::info('getjobbyid function Started.');
        Log::info('getjobbyid function Ended.');
        return Job::where('id', $id)->get();
    }

    public function getAssignmentTestOfJsForJob($jsid, $jobid) {
        return DB::table('test_tracking')->
                        join('tests', 'test_tracking.testid', '=', 'tests.id')
                        ->leftjoin('test_results', 'test_results.test_tracking_id', '=', 'test_tracking.id')
                        ->select('tests.id as TestId', 'tests.test_name', 'tests.category', 'tests.coverage', 'test_tracking.id as TestAssignmentid', 'test_tracking.landing_page_url', 'test_tracking.jobid', 'test_tracking.jobseekerid', 'test_tracking.status', 'test_tracking.expiryts', 'test_tracking.rating', 'test_results.average_score', 'test_results.test_result', DB::raw('DATEDIFF(test_tracking.expiryts,test_tracking.createdts) as days'))
                        ->where('jobid', $jobid)->where('jobseekerid', $jsid)->where('jobseekerid', $jsid)->get();
    }

    public function starttestnow(Request $request) {
        Log::info('starttestnow function Started.');
        $username = Auth::user()->name;
        $orderemail = Auth::user()->email;
        $testtrackingdetails = DB::table('test_tracking')->
                        leftjoin('jobs', 'jobs.id', '=', 'test_tracking.jobid')
                        ->leftjoin('tests', 'tests.id', '=', 'test_tracking.testid')
                        ->select('test_tracking.id as TestAssignmentid', 'test_tracking.jobid', 'jobs.jobtitle', 'tests.category', 'jobs.company', 'test_tracking.jobseekerid', 'test_tracking.status', 'test_tracking.expiryts', 'test_tracking.rating')
                        ->where('test_tracking.id', $request->testtrackingid)->first();
        // print_r($testtrackingdetails); echo $testtrackingdetails->category;  die();

        $valueresponse = $this->assessmenttestservices->getTestUrl($request->testtrackingid, $request->testid, Constants::RETURN_URL, Constants::ENABLE_DEV, Constants::ENABLE_DEBUG, Constants::ENABLE_USE);

        $UpdateTestTrackingData = array('landing_page_url' => $valueresponse);
        test_tracking::where('id', $request->testtrackingid)->update($UpdateTestTrackingData);
        $data = array('name' => $username,
            'today' => date("m.d.y"),
            'company_Name' => ucwords($testtrackingdetails->company),
            'Job_Title' => ucwords($testtrackingdetails->jobtitle),
            'testurl' => $valueresponse,
            'testcategory' => $testtrackingdetails->category,
            'expirydate' => $testtrackingdetails->expiryts
        );
        $subject = 'You have Successfully Started The Assigned Test For "' . $testtrackingdetails->jobtitle . '" Job.';

        Mail::send('StartTestReminder', $data, function ($message) use ($orderemail, $subject) {
            $message->to($orderemail)->subject($subject);
            $message->bcc(config('app.CC_MailID'));
        });

        Log::info('starttestnow function Ended.');
        return $valueresponse;
    }

    public function deactivatesavedjobwithid(Request $request) {
        Log::info('deletesavedjobwithid function Started.');
        // echo $id; die();
        $postedts = date("Y-m-d H:i:s");
        $id = $request->jobid;
        //$deletejob = ['active' => '0', 'updated_at' => $postedts];
        $deletejob = ['active' => '-1', 'updated_at' => $postedts];
        Job::where("id", "=", $id)->update($deletejob);
        Log::info('deletesavedjobwithid function Ended.');
        return 'Job Deactivated Successfully';
    }

    public function getJobQualificationWithOutIdUG() {
        Log::info('getJobQualificationWithIdUG function Started.');
        Log::info('getJobQualificationWithIdUG function Ended.');
        return job_education_detail::where("isActive", "=", 1)->where("type", "=", "Ug")->get();
    }

    public function getJobQualificationWithOutIdPG() {
        Log::info('getJobQualificationWithIdPG function Started.');
        Log::info('getJobQualificationWithIdPG function Ended.');
        return job_education_detail::where("isActive", "=", 1)->where("type", "=", "Pg")->get();
    }

    public function getJobQualificationWithOutIdDOCTORATE() {
        Log::info('getJobQualificationWithIdDOCTORATE function Started.');
        Log::info('getJobQualificationWithIdDOCTORATE function Ended.');
        return job_education_detail::where("isActive", "=", 1)->where("type", "=", "Ppg")->get();
    }

    public function getJobLocationWithOutId() {
        Log::info('getJobLocationWithId function Started.');
        Log::info('getJobLocationWithId function Ended.');
        return Job_location::where("isActive", "=", 1)->get();
    }

    public function getApplicationsList() {
        Log::info('getCandidateApplications function Started.');
        //$employerid = $this->getemployeridbylogedinuser();
        Log::info('getCandidateApplications function Ended.');
        return DB::table('job_applications')
                        ->join('job_seeker', 'job_applications.jobseekerid', '=', 'job_seeker.id')
                        ->join('jobs', 'job_applications.jobid', '=', 'jobs.id')
                        ->join('users', 'users.uuid', '=', 'job_seeker.userid')
                        ->where('job_applications.isdeleted', '=', 0)
                        ->where('jobs.active', '=', 1)
                        ->where('users.isactive', '=', 1)
                        //->where('jobs.employerid', '=', $employerid[0]->id)
                        ->orderBy('job_applications.updated_at', 'desc')
                        ->select('users.name', 'jobs.jobtitle', 'jobs.id as jobid', 'job_applications.created_at', 'job_seeker.id')
                        ->paginate(12);
    }

    public function getAssignmentTestOfForJob($jsid) {
        return DB::table('test_tracking')->
                        join('tests', 'test_tracking.testid', '=', 'tests.id')
                        ->leftjoin('test_results', 'test_results.test_tracking_id', '=', 'test_tracking.id')
                        ->select('tests.id as TestId', 'tests.test_name', 'tests.category', 'tests.coverage', 'test_tracking.id as TestAssignmentid', 'test_tracking.landing_page_url', 'test_tracking.jobid', 'test_tracking.jobseekerid', 'test_tracking.status', 'test_tracking.expiryts', 'test_tracking.rating', 'test_results.average_score', 'test_results.test_result', DB::raw('DATEDIFF(test_tracking.expiryts,test_tracking.createdts) as days'))
                        ->where('jobseekerid', $jsid)->where('jobseekerid', $jsid)->get();
    }

    public function getInActivejobopening() {
        Log::info('getActivejobopening function Started.');
        $EmployerId = $this->getemployeridbylogedinuser();
        Log::info('getActivejobopening function Ended.');
        return job::where("isposted", "=", 1)->where("active", "=", -1)->where("source", "=", 1)->where("employerid", "=", $EmployerId[0]->id)->orderBy('updated_at', 'desc')->paginate(12);
    }

    public function getActivejobswithprefrences($jobPrefData, $jobPrefLocationData) {
        Log::info('getActivejobopeningsForJS function Started.');
        $jobids = array();
        $jobappliedbyjs = $this->jobseeker_service->getappliedjobsbylogedinjs();
        $countryId = $jobPrefLocationData[0]->countryid;
        $stateId = $jobPrefLocationData[0]->regionid;
        $cityId = $jobPrefLocationData[0]->cityname;

        $jobTitle = $jobPrefData[0]->pref_jobtitle;
        $jobType = $jobPrefData[0]->pref_type;
        $currentPackage = $jobPrefData[0]->curr_package;
        $expPackage = $jobPrefData[0]->expected_package;
        $noticePeriod = $jobPrefData[0]->notice_period;
        $jobTitle = str_replace(" , ", ",", "$jobTitle");
        $jobTitle = explode(",", $jobTitle);
        $jobType = str_replace(" , ", ",", "$jobType");
        $jobType = explode(",", $jobType);
        
        $newTitles = array();
        for($i = 0; $i < count($jobTitle); $i++){
            $newTitles[$i] = trim($jobTitle[$i]);
        }
        //print_r($newTitles);
        //exit;
        //echo $jobTitle."------------------".$expPackage."----------------".$cityId;
        //dd($jobTitle);
        //exit;
        $employerid = $this->getemployeridbylogedinuser();
        if (count($employerid) > 0) {
            $employerid = $employerid[0]->id;
        } else {
            $employerid = "";
        }

        foreach ($jobappliedbyjs as $Jobid) {
            array_push($jobids, $Jobid->jobid);
        }

        Log::info('getActivejobopeningsForJS function Ended.');
        //Log::info('================='.implode(",",$jobids).'=======================');
        return DB::table('users')
                        ->leftjoin('employer', 'users.uuid', '=', 'employer.userid')
                        ->leftjoin('jobs', 'employer.id', '=', 'jobs.employerid')
                        ->leftjoin('address', 'employer.addressid', '=', 'address.id')
                        ->leftJoin('location as statelocation', 'statelocation.location_id', '=', 'address.regionid')
                        ->leftJoin('location as countrylocation', 'countrylocation.location_id', '=', 'address.countryid')
                        ->leftJoin('images', 'images.id', '=', 'users.logoid')
                        ->select('jobs.*', 'address.city', 'address.pincode', 'address.addline1', 'address.addline2', 'statelocation.name as statename', 'countrylocation.name as countryname', 'images.path', "jobs.postedts")
                        ->where('jobs.isposted', '=', 1)
                        ->where('jobs.active', '=', 1)
                        ->where('jobs.source', '=', 1)
                        ->where('users.isactive', '=', 1)
                        ->whereIn('jobs.jobtitle', $newTitles)
                        ->where('jobs.max_salary', '>=', $expPackage)
                        ->where('jobs.min_salary', '>=', $currentPackage)
                        ->whereIn('jobs.type', $jobType)
                        ->whereNotIn('jobs.id', $jobids)
                        ->where('jobs.employerid', '!=', $employerid) 
                        //end
                        //->where('address.countryid', '=', $countryId)
                        //->where('statelocation.location_id', '=', $stateId)
                        ->orderBy('jobs.updated_at', 'desc')
                        ->paginate(12);
    }
    
    public function createOnlineTestInfo($request) {
        Log::info('createOnlineTestInfo function Started.');
        //Log::info('------------------'.print_r($request));
        
        
        $uuuserid = Auth::user()->uuid;
        $JobEmployerid = $this->getemployeridbylogedinuser();
      
        // -------------Question course split-------------------
        $onlineQuestions = $request->questions;
        $onlineTime = $request->time_allowed;
        $onlineNotes = $request->key_notes;
        $noOfDays = $request->no_of_days;
        
        Log::info('-------que string----------'.$onlineQuestions);

        $arrQuestion = explode(',', $onlineQuestions);
        $arrTime = explode(',', $onlineTime);
        $arrNotes = explode(',', $onlineNotes);
        
        Log::info('-------que string----------'.count($arrQuestion));

        $date = date("Y-m-d H:i:s");
        $expiryts = date('Y-m-d H:i:s', strtotime("+$noOfDays days"));
        
        for ($i = 0; $i < count($arrQuestion); $i++) {
            if ($arrQuestion[$i]) {
                $insertugdata = array(
                    array('id' => UUID::v4(), 
                        'candidate_id' => $request->candidate_id, 
                        'job_id' => $request->job_id, 
                        'question' => $arrQuestion[$i], 
                        'time' => $arrTime[$i], 
                        'note' => $arrNotes[$i], 
                        'expiry_date' => $expiryts, 
                        'type' => $request->test_type, 
                        'created_date' => $date, 
                        'updated_date' => $date));
                echo 'in loop';

                //print_r($insertugdata);
                Online_Interview_Questions::insert($insertugdata);
            }
        }
        
        echo 'out of loop ug';

        unset($key);
        unset($data);

        if($request->test_type == "1"){
            $jobsdata = [
                'is_at_enabled' => 1,
                'at_expiry_date' => $expiryts
            ];
            DB::table('job_applications')->where('jobseekerid', $request->candidate_id)->where('jobid', $request->job_id)->update($jobsdata);
        }else if($request->test_type == "2"){
             $jobsdata = [
                'is_vi_enabled' => 1,
                'vi_expiry_date' => $expiryts
            ];
            DB::table('job_applications')->where('jobseekerid', $request->candidate_id)->where('jobid', $request->job_id)->update($jobsdata);
        }
        $request->session()->put('recentjobid', UUID::v4());
        // echo "recentjob";
        // echo $request->session()->get('recentjobid');
        // $request->session()->forget('recentjobid');
        Log::info('createOnlineTestInfo function Ended.');
    }

    
    public function getCandidateApplicationInfo($jsid, $jobid) {
        Log::info('getCandidateApplications function Started.');
        $employerid = $this->getemployeridbylogedinuser();
        Log::info('getCandidateApplications function Ended.');
        return DB::table('job_applications')
                        ->join('job_seeker', 'job_applications.jobseekerid', '=', 'job_seeker.id')
                        ->join('jobs', 'job_applications.jobid', '=', 'jobs.id')
                        ->join('users', 'users.uuid', '=', 'job_seeker.userid')
                        ->where('job_applications.isdeleted', '=', 0)
                        ->where('jobs.active', '=', 1)
                        ->where('users.isactive', '=', 1)
                        ->where('job_applications.jobseekerid', '=', $jsid)
                        ->where('job_applications.jobid', '=', $jobid)
                        ->where('jobs.employerid', '=', $employerid[0]->id)
                        ->orderBy('job_applications.updated_at', 'desc')
                        ->select('job_applications.shortlisted',   'job_applications.at_expiry_date',  'job_applications.at_expiry_date', 'job_applications.is_vi_enabled', 'job_applications.vi_expiry_date', 'job_applications.vi_submitted_date', 'job_applications.app_rating', 'job_applications.app_comment', 'users.name', 'jobs.jobtitle', 'jobs.id as jobid', 'job_applications.comments', 'job_applications.created_at', 'job_seeker.id')
                        ->paginate(12);
    }
    
    public function getAssignedAT($jsid, $jobid) {
        Log::info('getAssignedAT function Started.');
        Log::info('getAssignedAT function Ended.');
        return DB::table('online_interview_questions')
                        ->where('online_interview_questions.candidate_id', '=', $jsid)
                        ->where('online_interview_questions.job_id', '=', $jobid)
                        ->where('online_interview_questions.type', '=', 1)
                        ->orderBy('online_interview_questions.created_date', 'asc')
                        ->select('*')
                        ->paginate(12);
    }
    
    public function getAssignedVI($jsid, $jobid) {
        Log::info('getAssignedVI function Started.');
        Log::info('getAssignedVI function Ended.');
        return DB::table('online_interview_questions')
                        ->where('online_interview_questions.candidate_id', '=', $jsid)
                        ->where('online_interview_questions.job_id', '=', $jobid)
                        ->where('online_interview_questions.type', '=', 2)
                        ->orderBy('online_interview_questions.created_date', 'asc')
                        ->select('*')
                        ->paginate(12);
    }
    
    public function getAssignedToAT($jsid, $jobid) {
        Log::info('getAssignedAT function Started.');
        Log::info('getAssignedAT function Ended.');
        return DB::table('online_interview_questions')
                        ->where('online_interview_questions.candidate_id', '=', $jsid)
                        ->where('online_interview_questions.job_id', '=', $jobid)
                        ->where('online_interview_questions.type', '=', 1)
                        ->where('online_interview_questions.status', '!=', 2)
                        ->orderBy('online_interview_questions.created_date', 'asc')
                        ->select('*')
                        ->paginate(12);
    }
    
    public function getAssignedToVI($jsid, $jobid) {
        Log::info('getAssignedVI function Started.');
        Log::info('getAssignedVI function Ended.');
        return DB::table('online_interview_questions')
                        ->where('online_interview_questions.candidate_id', '=', $jsid)
                        ->where('online_interview_questions.job_id', '=', $jobid)
                        ->where('online_interview_questions.type', '=', 2)
                        ->where('online_interview_questions.status', '!=', 2)
                        ->orderBy('online_interview_questions.created_date', 'asc')
                        ->select('*')
                        ->paginate(12);
    }
    
    public function getAppliedjobHistoryInfo($id, $jobid) {
        Log::info('getAppliedjobHistory function Started.');
        Log::info('getAppliedjobHistory function Ended.');

        return DB::table('jobs')
                        ->leftjoin('job_applications as ja', 'ja.jobid', '=', 'jobs.id')
                        ->where('jobs.isposted', '=', 1)
                        ->where("ja.jobid", "=", $jobid)
                        ->where("ja.jobseekerid", "=", $id)
                        ->where('jobs.active', '=', 1)
                        ->where('jobs.source', '=', 1)
                        ->select('jobs.*', 'ja.app_rating', 'ja.app_comment', 'ja.is_at_enabled', 'ja.at_expiry_date', 'ja.is_vi_enabled', 'ja.vi_expiry_date', 'ja.id as applicationid', 'ja.jobseekerid as applicantid', 'ja.jobid as jobid', 'ja.created_at as application_created_date')
                        ->orderBy('ja.updated_at', 'desc')->paginate(12);
    }
    
    public function saveViAnswerInfo($request) {
        Log::info('saveViAnswerInfo function Started.');
        //Log::info('------------------'.print_r($request));
        
        Log::info('========answer url========='.$request->answer_url);
        Log::info('========candidate id========='.$request->candidate_id);
        Log::info('========question id========='.$request->question_id);
        Log::info('========job id========='.$request->job_id);
        
        $uuuserid = Auth::user()->uuid;
      
        $date = date("Y-m-d H:i:s");

        unset($key);
        unset($data);

        if($request->answer_url){
            $jobsdata = [
                'answer_url' => $request->answer_url,
                'duration_time' => $request->duration,
                'answer_date' => $date,
                'status' => 2
            ];
            DB::table('online_interview_questions')->where('id', $request->question_id)->update($jobsdata);
        }else{
            $jobsdata = [
                'answer_url' => $request->answer_url,
                'answer_date' => $date,
                'status' => 1
            ];
            DB::table('online_interview_questions')->where('id', $request->question_id)->update($jobsdata);
        }
        
        $pendingQuestions = $this->getAssignedToVI($request->candidate_id, $request->job_id);
        //Log::info('=================yet to answer================'.count($pendingQuestions));
        if(count($pendingQuestions) == 0){
            $vidata = [
                'is_vi_enabled' => 2,
                'vi_submitted_date' => $date,
            ];
            DB::table('job_applications')->where('jobid', $request->job_id)->where('jobseekerid', $request->candidate_id)->update($vidata);
        }
        $request->session()->put('recentjobid', UUID::v4());
        // echo "recentjob";
        // echo $request->session()->get('recentjobid');
        // $request->session()->forget('recentjobid');
        Log::info('saveViAnswerInfo function Ended.');
    }
    
    public function saveApplicationRatingInfo($request) {
        Log::info('saveApplicationRatingInfo function Started.');
        $date = date("Y-m-d H:i:s");
        $vidata = [
            'app_rating' => $request->rating,
            'app_comment' => $request->review,
            'updated_at' => $date,
        ];
        DB::table('job_applications')->where('jobid', $request->job_id)->where('jobseekerid', $request->candidate_id)->update($vidata);
            
        $request->session()->put('recentjobid', UUID::v4());
        // echo "recentjob";
        // echo $request->session()->get('recentjobid');
        // $request->session()->forget('recentjobid');
        Log::info('saveApplicationRatingInfo function Ended.');
    }
    
    public function getJobApplicants($jobIdIs) {
        Log::info('getCandidateApplications function Started.');
        $employerid = $this->getemployeridbylogedinuser();
        Log::info('getCandidateApplications function Ended.');
        return DB::table('job_applications')
                        ->join('job_seeker', 'job_applications.jobseekerid', '=', 'job_seeker.id')
                        ->join('jobs', 'job_applications.jobid', '=', 'jobs.id')
                        ->join('users', 'users.uuid', '=', 'job_seeker.userid')
                        ->where('job_applications.isdeleted', '=', 0)
                        ->where('jobs.active', '=', 1)
                        ->where('users.isactive', '=', 1)
                        ->where('jobs.employerid', '=', $employerid[0]->id)
                        ->where('job_applications.jobid', '=', $jobIdIs)
                        ->orderBy('job_applications.updated_at', 'desc')
                        ->select('users.name', 'jobs.jobtitle', 'jobs.id as jobid', 'job_applications.is_at_enabled', 'job_applications.at_expiry_date', 'job_applications.is_vi_enabled', 'job_applications.vi_submitted_date', 'job_applications.app_rating', 'job_applications.app_comment', 'job_applications.comments', 'job_applications.created_at', 'job_seeker.id')
                        ->paginate(12);
    }
    
    public function saveApplicationStatus($request) {
        //print_r($request);
        //echo $request['shortlisted'];
        //exit;
        Log::info('saveApplicationStatus function Started.');
        $date = date("Y-m-d H:i:s");
        $vidata = [
            'shortlisted' => $request['shortlisted'],
            'updated_at' => $date,
        ];
        DB::table('job_applications')->where('jobid', $request['job_id'])->where('jobseekerid', $request['candidate_id'])->update($vidata);
            
        //$request->session()->put('recentjobid', UUID::v4());
        // echo "recentjob";
        // echo $request->session()->get('recentjobid');
        // $request->session()->forget('recentjobid');
        Log::info('saveApplicationStatus function Ended.');
    }
    
    public function changeApplicationStatus($request) {
        //print_r($request);
        //echo $request['shortlisted'];
        //exit;
        Log::info('changeApplicationStatus function Started.');
        $date = date("Y-m-d H:i:s");
        $vidata = [
            'shortlisted' => $request->shortlisted,
            'updated_at' => $date,
        ];
        DB::table('job_applications')->where('jobid', $request->job_id)->where('jobseekerid', $request->candidate_id)->update($vidata);
            
        //$request->session()->put('recentjobid', UUID::v4());
        // echo "recentjob";
        // echo $request->session()->get('recentjobid');
        // $request->session()->forget('recentjobid');
        Log::info('changeApplicationStatus function Ended.');
    }

    /* Ends Edited By Anand */
}
