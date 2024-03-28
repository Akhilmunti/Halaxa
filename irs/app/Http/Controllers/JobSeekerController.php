<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Users_Role;
use Carbon\Carbon;
use App\Role;
use App\Employer;
use App\Address;
use App\Job;
use App\Job_location;
use App\job_education_detail;
use App\Jobs_seed_data_type;
use App\Jobs_seed_data;
use App\Location;
use Auth;
use Mail;
use DateTime;
use App\Services\JobSeekerServices;
use App\Services\JobServices;
use App\Services\UUID;
use App\Services\UserServices;
use App\Services\UtilityServices;
use App\Services\LocationServices;
use App\Services\AssessmentTestServices;
use App\Services\Constants;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Session;
use Redirect;

class JobSeekerController extends Controller {
    //

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        $this->job_service = new JobServices();
        $this->location_service = new LocationServices();
        $this->user_service = new UserServices();
        $this->utility_services = new UtilityServices();
        $this->jobseeker_service = new JobSeekerServices();
        $this->assessmenttestservices = new AssessmentTestServices();
    }

    public function index(Request $request) {
        Log::info('Index function Started.');
        $user = $this->user_service->getLoggedInUser();
        //if($user->roles->first()->role_name=="Job_Seeker"){

        if ($this->jobseeker_service->checkjobseekercount() <= 0) {
            $Country = $this->location_service->getCountry();
            Log::info('Index function Ended and return on Additional Form.');
            return view('job_seeker/additional_form', ['Country' => $Country, 'user' => $user]);
        } else {
            $appliedjobcount = $this->jobseeker_service->getappliedjobscountbylogedinjs();
            $recommendedjob = $this->job_service->getActivejobopeningsForJS();
            $recommendedjobcount = count($recommendedjob);
            $jsdetails = $this->jobseeker_service->logedinjsdetails();
            $uuuserid = Auth::user()->uuid;
            $roleid = $this->user_service->getrolebyuserid($uuuserid);
            session(['roleid' => $roleid]);
            session(['userlogo' => $jsdetails[0]->logo]);
            // echo Session::get('roleid');  die();
            Log::info('Index function Ended and return on dashboard.');
            return view('job_seeker/dashboard', ['user' => $user, 'appliedjobcount' => $appliedjobcount, 'recommendedjobcount' => $recommendedjobcount]);
        }
        /* }else{
          //echo "Hi";die();
          return redirect(strtolower($user->roles->first()->role_name));
          } */
    }

    /*
     * This is a master function for all the urls after logged in and then we will redirect to requested      * pages based on URL. 
     * Also checking whether user is logged in first time...
     */

    public function master($any, Request $request) {
        Log::info('master function Started.');
        $user = $this->user_service->getLoggedInUser();
        if ($this->jobseeker_service->checkjobseekercount() <= 0) {
            $Country = $this->location_service->getCountry();
            Log::info('Index function Ended and return on Additional Form.');
            return view('job_seeker/additional_form', ['Country' => $Country, 'user' => $user]);
        } else {
            $any = strtolower($any);

            switch ($any) {
                case "apply_job":
                    return $this->applyForJobs();
                    break;
                
                case "advanced_search":
                    return $this->advancedSearch();
                    break;
                    
                case "searchapplyforjob":
                    return $this->searchapplyforjob($request);
                    
                case "searchLocjob":
                    return $this->searchLocationjob($request);

                case "job_history":
                    return $this->jobHistory();
                    break;

                case "searchjobhistory":
                    return $this->searchjobhistory($request);
                    break;

                case "job_preferences":
                    return $this->job_preferences();
                    break;

                case "applyjob":
                    return $this->applyjob($request);
                    break;

                case "updatejsprefrence":
                    return $this->setJsJobPrefrence($request);
                    break;
                case "starttestnow":
                    return $this->starttestnow($request);
                    break;
                case "postvianswers":
                    return $this->saveOnlineViAnswer($request);
                    break;
                case "onlinesuccess":
                    return $this->onlineTestSuccess($request);
                    break;
                case "onlinefail":
                    return $this->onlineTestFail($request);
                    break;
                case "viewtestinfo":
                    return $this->viewTestInfo($request);
                     break;
                default;
                    return view('/job_seeker');
            }
        }
        /* }else{
          //echo "Hi";die();
          return redirect(strtolower($user->roles->first()->role_name));
          } */
    }

    public function actionForJobs($request) {
        Log::info('applyForJobs function Started.');
        $jsid = $this->jobseeker_service->getjobseekeridbylogedinuser();
        $stateAndCities = $this->location_service->getStateAndCities();
        //echo "-----------".$jsid[0]->id;
        //exit;
		$jobPrefData = $this->jobseeker_service->get_js_job_prefrence($jsid[0]->id);
		/* if(empty($jobPrefData[0])){
		    $jobPrefData = array(
                "js_id" => $jsid,
                "pref_jobtitle" => 0,
                "pref_type" => 0,
                "min_emp" => 1,
                "max_emp" => 3,
                "curr_package" => 50000,
                "expected_package" => 60000,
                "notice_period" => 0,
                "Isactive" => 0,
                "created_at" => 0,
                "updated_at" => 0
            );
            //echo "1111111111111111111111";
		    //exit;
		} */
		
        $jobPrefLocationData = $this->jobseeker_service->get_js_job_prefref_location($jsid[0]->id);
        /* if(empty($jobPrefLocationData[0])){
		    $jobPrefLocationData = array(
                "js_id" => $jsid,
                "countryid" => 0,
                "regionid" => 0,
                "cityname" => '',
                "Isactive" => 0,
                "created_at" => 0,
                "updated_at" => 0
            );
            //echo "1111111111111111111111";
		    //exit;
		}
        */
        $jobs_info = $this->job_service->getActivejobopeningsForJS();
        if(empty($jobPrefLocationData[0]) || empty($jobPrefData[0])){
            //echo "1111111111111111111111111";
            //exit;
            return redirect('/job_seeker/job_preferences');
        }else{
            $jobs_info = $this->job_service->getActivejobswithprefrences($jobPrefData, $jobPrefLocationData);
            //echo "-----------".$jsid;
            //echo '<pre>';
            //print_r($jobPrefData);
            //exit;
            $daypassedtopost = array();
            for ($i = 0; $i < count($jobs_info); $i++) {
                $posted = explode(" ", $jobs_info[$i]->postedts);
                $date1 = new DateTime(str_replace(".", "-", $posted[0]));
                $date2 = new DateTime(str_replace(".", "-", date('y-m-d')));
                //print_r($date1);
                $diff = $date2->diff($date1)->format("%a");
                $daypassedtopost[$i] = $diff;
            }
            $locations = array();
            foreach ($jobs_info as $activejobsinfo) {
                $locations[$activejobsinfo->id] = $this->job_service->getlocationsofjob($activejobsinfo->id);
            }
            $Currency = $this->location_service->getCurrency();
            $Country = $this->location_service->getCountry();
            
            Log::info('applyForJobs function Ended.');
            return view('job_seeker/apply_job', ['keyWord'=> $keyWord, 'stateCities' => $stateAndCities, 'jobs_info' => $jobs_info, 'daypassedtopost' => $daypassedtopost, 'locations' => $locations, 'Currency' => $Currency, 'Country' => $Country]);
        }
    }
    
    public function advancedSearch() {
        Log::info('applyForJobs function Started.');
        $jsid = $this->jobseeker_service->getjobseekeridbylogedinuser();
		$jobPrefData = $this->jobseeker_service->get_js_job_prefrence($jsid[0]->id);
        $jobPrefLocationData = $this->jobseeker_service->get_js_job_prefref_location($jsid[0]->id);
        $jobs_info = $this->job_service->getActivejobopeningsForJS();
        if(empty($jobPrefLocationData[0]) || empty($jobPrefData[0])){
            //echo "1111111111111111111111111";
            //exit;
            return redirect('/job_seeker/job_preferences');
        }else{
            $jobs_info = $this->job_service->getActivejobswithprefrences($jobPrefData, $jobPrefLocationData);
            //echo "-----------".$jsid;
            //echo '<pre>';
            //print_r($jobPrefData);
            //exit;
            $daypassedtopost = array();
            for ($i = 0; $i < count($jobs_info); $i++) {
                $posted = explode(" ", $jobs_info[$i]->postedts);
                $date1 = new DateTime(str_replace(".", "-", $posted[0]));
                $date2 = new DateTime(str_replace(".", "-", date('y-m-d')));
                //print_r($date1);
                $diff = $date2->diff($date1)->format("%a");
                $daypassedtopost[$i] = $diff;
            }
            $locations = array();
            foreach ($jobs_info as $activejobsinfo) {
                $locations[$activejobsinfo->id] = $this->job_service->getlocationsofjob($activejobsinfo->id);
            }
            $Currency = $this->location_service->getCurrency();
            $Country = $this->location_service->getCountry();
            Log::info('applyForJobs function Ended.');
            return view('job_seeker/advanced_search', ['jobs_info' => $jobs_info, 'daypassedtopost' => $daypassedtopost, 'locations' => $locations, 'Currency' => $Currency, 'Country' => $Country]);
        }
    }
    
    public function applyForJobs() {
        Log::info('applyForJobs function Started.');
        $jsid = $this->jobseeker_service->getjobseekeridbylogedinuser();
        //echo "-----------".$jsid[0]->id;
        //exit;
		$jobPrefData = $this->jobseeker_service->get_js_job_prefrence($jsid[0]->id);
		//echo '<pre>';
		//print_r($jobPrefData);
		//exit;
		/* if(empty($jobPrefData[0])){
		    $jobPrefData = array(
                "js_id" => $jsid,
                "pref_jobtitle" => 0,
                "pref_type" => 0,
                "min_emp" => 1,
                "max_emp" => 3,
                "curr_package" => 50000,
                "expected_package" => 60000,
                "notice_period" => 0,
                "Isactive" => 0,
                "created_at" => 0,
                "updated_at" => 0
            );
            //echo "1111111111111111111111";
		    //exit;
		} */
		
        $jobPrefLocationData = $this->jobseeker_service->get_js_job_prefref_location($jsid[0]->id);
        //echo '<pre>';
        //print_r($jobPrefLocationData);
        //exit;
        /* if(empty($jobPrefLocationData[0])){
		    $jobPrefLocationData = array(
                "js_id" => $jsid,
                "countryid" => 0,
                "regionid" => 0,
                "cityname" => '',
                "Isactive" => 0,
                "created_at" => 0,
                "updated_at" => 0
            );
            //echo "1111111111111111111111";
		    //exit;
		}
        */
        $jobs_info = $this->job_service->getActivejobopeningsForJS();
        if(empty($jobPrefLocationData[0]) || empty($jobPrefData[0])){
            //echo "1111111111111111111111111";
            //exit;
            return redirect('/job_seeker/job_preferences');
        }else{
            $jobs_info = $this->job_service->getActivejobswithprefrences($jobPrefData, $jobPrefLocationData);
            //echo "-----------".$jsid;
            //echo '<pre>';
            //print_r($jobPrefData);
            //exit;
            $daypassedtopost = array();
            for ($i = 0; $i < count($jobs_info); $i++) {
                $posted = explode(" ", $jobs_info[$i]->postedts);
                $date1 = new DateTime(str_replace(".", "-", $posted[0]));
                $date2 = new DateTime(str_replace(".", "-", date('y-m-d')));
                //print_r($date1);
                $diff = $date2->diff($date1)->format("%a");
                $daypassedtopost[$i] = $diff;
            }
            $locations = array();
            foreach ($jobs_info as $activejobsinfo) {
                $locations[$activejobsinfo->id] = $this->job_service->getlocationsofjob($activejobsinfo->id);
            }
            $Currency = $this->location_service->getCurrency();
            $Country = $this->location_service->getCountry();
            $stateAndCities = $this->location_service->getStateAndCities();
            $keyWord = "";
            Log::info('applyForJobs function Ended.');
            return view('job_seeker/apply_job', ['keyWord'=> $keyWord, 'stateCities' => $stateAndCities, 'jobs_info' => $jobs_info, 'daypassedtopost' => $daypassedtopost, 'locations' => $locations, 'Currency' => $Currency, 'Country' => $Country]);
        }
    }

    public function searchapplyforjob(Request $request) {
        Log::info('searchapplyforjob function Started.');
        $jobs_info = $this->utility_services->getActivejobopeningsForJSusingsearch($request);
        $daypassedtopost = array();
        for ($i = 0; $i < count($jobs_info); $i++) {
            $posted = explode(" ", $jobs_info[$i]->postedts);
            $date1 = new DateTime(str_replace(".", "-", $posted[0]));
            $date2 = new DateTime(str_replace(".", "-", date('y-m-d')));
            //print_r($date1);
            $diff = $date2->diff($date1)->format("%a");
            $daypassedtopost[$i] = $diff;
        }
        $locations = array();
        foreach ($jobs_info as $activejobsinfo) {
            $locations[$activejobsinfo->id] = $this->job_service->getlocationsofjob($activejobsinfo->id);
        }
        $Currency = $this->location_service->getCurrency();
        $Country = $this->location_service->getCountry();
        $stateAndCities = $this->location_service->getStateAndCities();
        if($request->keyword){
            $keyWord = $request->keyword;
        }else{
            $keyWord = "";
        }
        Log::info('searchapplyforjob function Ended.');
        return view('job_seeker/apply_job', ['keyWord' => $keyWord, 'stateCities' => $stateAndCities, 'jobs_info' => $jobs_info, 'daypassedtopost' => $daypassedtopost, 'locations' => $locations, 'Currency' => $Currency, 'Country' => $Country]);
    }

    public function searchLocationjob(Request $request) {
        Log::info('searchapplyforjob function Started.');
        $jobs_info = $this->utility_services->getActivejobopeningsForJSusingNsearch($request);
        $daypassedtopost = array();
        for ($i = 0; $i < count($jobs_info); $i++) {
            $posted = explode(" ", $jobs_info[$i]->postedts);
            $date1 = new DateTime(str_replace(".", "-", $posted[0]));
            $date2 = new DateTime(str_replace(".", "-", date('y-m-d')));
            //print_r($date1);
            $diff = $date2->diff($date1)->format("%a");
            $daypassedtopost[$i] = $diff;
        }
        $locations = array();
        foreach ($jobs_info as $activejobsinfo) {
            $locations[$activejobsinfo->id] = $this->job_service->getlocationsofjob($activejobsinfo->id);
        }
        $Currency = $this->location_service->getCurrency();
        $Country = $this->location_service->getCountry();
        $stateAndCities = $this->location_service->getStateAndCities();
        if($request->keyword){
            $keyWord = $request->keyword;
        }else{
            $keyWord = "";
        }
        Log::info('searchapplyforjob function Ended.');
        return view('job_seeker/apply_job', ['keyWord' => $keyWord, 'stateCities' => $stateAndCities, 'jobs_info' => $jobs_info, 'daypassedtopost' => $daypassedtopost, 'locations' => $locations, 'Currency' => $Currency, 'Country' => $Country]);
    }


    public function jobHistory() {
        Log::info('jobHistory function Started.');
        $Applied_job_response = $this->job_service->getAppliedjobHistory();
        $Currency = $this->location_service->getCurrency();
        $Country = $this->location_service->getCountry();
        $Jobs_seed_data_Functional_Area = $this->job_service->getJobFunctionalArea();
        $Jobs_seed_data_Role = $this->job_service->getJobRole();
        $Jobs_seed_data_Industry = $this->job_service->getJobIndustry();
        $JobQualificationUG = $this->job_service->getJobQualificationWithOutIdUG();
        $JobQualificationPG = $this->job_service->getJobQualificationWithOutIdPG();
        $JobQualificationDOCTORATE = $this->job_service->getJobQualificationWithOutIdDOCTORATE();
        $JobLocation = $this->job_service->getJobLocationWithOutId();
        $JobCountries = $this->location_service->getCountryNameList();
        $JobStates = $this->location_service->getStateNameList();
        $JobApplications = $this->job_service->getApplicationsList();
        $JobRolesShowing = DB::select("SELECT * FROM `jobs_seed_data` WHERE `type` = 1003");
        $JobSeekerId = $this->jobseeker_service->getjobseekeridbylogedinuser();
        $jobseekerId = $JobSeekerId[0]->id;

        $jsAssignedTest = $this->job_service->getAssignmentTestOfForJob($jobseekerId);

        Log::info('jobHistory function Ended.');
        return view('job_seeker/job_history', ['Applied_job_response' => $Applied_job_response, 'Currency' => $Currency, 'Country' => $Country, 'Jobs_seed_data_Functional_Area' => $Jobs_seed_data_Functional_Area, 
            'Jobs_seed_data_Role' => $Jobs_seed_data_Role, 
            'JobRolesShowing' => $JobRolesShowing, 
            'JobQualificationUG' => $JobQualificationUG,
            'JobQualificationPG' => $JobQualificationPG,
            'JobQualificationDOCTORATE' => $JobQualificationDOCTORATE,
            'JobLocation' => $JobLocation,
            'JobCountries' => $JobCountries, 
            'JobStates' => $JobStates, 
            'JobApplications' => $JobApplications, 
            'jsAssignedTest' => $jsAssignedTest,
            'Jobs_seed_data_Industry' => $Jobs_seed_data_Industry]);
    }

    public function searchjobhistory(Request $request) {
        Log::info('jobHistory function Started.');
        $Applied_job_response = $this->utility_services->getAppliedjobHistoryusingsearch($request);
        $Currency = $this->location_service->getCurrency();
        $Country = $this->location_service->getCountry();
        Log::info('jobHistory function Ended.');
        return view('job_seeker/job_history', ['Applied_job_response' => $Applied_job_response, 'Currency' => $Currency, 'Country' => $Country]);
    }

    public function job_preferences() {
        Log::info('job_preferences function Started.');
        $jsid = $this->jobseeker_service->getjobseekeridbylogedinuser();
        $Jobs_seed_data_Functional_Area = $this->job_service->getJobFunctionalArea();
        for ($i = 0; $i < count($Jobs_seed_data_Functional_Area); $i++) {
            $Jobs_RolesBy_Id[$Jobs_seed_data_Functional_Area[$i]->id] = $this->job_service->getJobRolesByFunctionalArea($Jobs_seed_data_Functional_Area[$i]->id);
        }
        $Country = $this->location_service->getCountry();
        $Currency = $this->location_service->getCurrency();
        $jobPrefData = $this->jobseeker_service->get_js_job_prefrence($jsid[0]->id);
        $jobPrefLocationData = $this->jobseeker_service->get_js_job_prefref_location($jsid[0]->id);
        $countryname = array();
        $statenames = array();
        for ($i = 0; $i < count($jobPrefLocationData); $i++) {
            $countryname[$i] = $this->location_service->getCountryByCounryID($jobPrefLocationData[$i]->countryid);
            $statenames[$i] = $this->location_service->getStateNameByStateID($jobPrefLocationData[$i]->countryid, $jobPrefLocationData[$i]->regionid);
            //print_r($countryname[$i]."-------".$statenames[$i]);
        }
        Log::info('job_preferences function Ended.');
        return view('job_seeker/job_preferences', ['Jobs_seed_data_Functional_Area' => $Jobs_seed_data_Functional_Area, 'Jobs_RolesBy_Id' => $Jobs_RolesBy_Id, 
        'Country' => $Country, 'jobPrefData' => $jobPrefData, 'jobPrefLocationData' => $jobPrefLocationData, 'countryname' => $countryname, 'statenames' => $statenames, 'Currency' => $Currency]);
    }

    public function register_jobseeker(Request $request) {
        Log::info('register_jobseeker function Started.');
        $register_jobseeker_response = $this->jobseeker_service->register_jobseeker($request);
        Session::flash('message', $register_jobseeker_response);
        Session::flash('alert-class', 'alert-danger');
        Log::info('register_jobseeker function Ended.');
        return redirect('/job_seeker');
    }

    public function applyjob(Request $request) {
        Log::info('applyjob function Started.');
        $apply_job_response = $this->jobseeker_service->applyjob($request);
        session::put('job_apply_session', 1);
        Log::info('applyjob function Ended.');
        return redirect('/job_seeker/');
    }

    // -----------------  Start of master_with_id  ----------------//
    public function master_with_id($any, $id, Request $request) {
        Log::info('master_with_id function Started.');
        $user = $this->user_service->getLoggedInUser();
        //if($user->roles->first()->role_name=="Job_Seeker"){
        $any = strtolower($any);
        switch ($any) {
            case "viewjobdetails":
                return $this->viewjobdetails($id, $request);
                break;
            case "viewappliedjobdetails":
                return $this->viewappliedjobdetails($id, $request);
                break;
                
            case "assesment_test":
                return $this->attendVideoInterview($id, $request);
                break;
                
            case "video_interview":
                return $this->attendVideoInterview($id, $request);
                break;
                
            case "do_interview":
                return $this->recordVideoInterview($id, $request);
                break;

            default;
                return view('/job_seeker');
        }
        /* }else{
          return redirect(strtolower($user->roles->first()->role_name));
          } */
    }

    public function viewjobdetails($id, Request $request) {
        Log::info('viewjobdetails function Started.');
        $Jobs_seed_data_Functional_Area = $this->job_service->getJobFunctionalArea();
        $Jobs_seed_data_Role = $this->job_service->getJobRole();
        $Jobs_seed_data_Current_Position = $this->job_service->getJobCurrentPosition();
        $Job = $this->job_service->getJobWithId($request);
        $JobQualificationUG = $this->job_service->getJobQualificationWithIdUG($request);
        $JobQualificationPG = $this->job_service->getJobQualificationWithIdPG($request);
        $JobQualificationDOCTORATE = $this->job_service->getJobQualificationWithIdDOCTORATE($request);
        $JobLocation = $this->job_service->getJobLocationWithId($request);
        $functional_area = $Job[0]->functional_area;
        if (!isset($functional_area)) {
            $functional_area = 0;
        }
        $JobRolesShowing = DB::select("SELECT * FROM `jobs_seed_data` WHERE `type` = 1003 AND `parent_id` = $functional_area ");

        $countryname = array();
        $statenames = array();
        for ($i = 0; $i < count($JobLocation); $i++) {
            $countryname[$i] = $Country = $this->location_service->getCountryByCounryID($JobLocation[$i]->countryid);
            $statenames[$i] = $this->location_service->getStateNameByStateID($JobLocation[$i]->countryid, $JobLocation[$i]->regionid);
        }
        $ContactdetailArray = json_decode($Job[0]->contact_details, true);
        $appliedjoblist = array();
        $jobappliedbyjs = $this->jobseeker_service->getappliedjobsbylogedinjs();
        foreach ($jobappliedbyjs as $jobappliedbyjs) {
            array_push($appliedjoblist, $jobappliedbyjs->jobid);
        }


        Log::info('viewjobdetails function Ended.');
        return view('job_seeker/jobview', ['countryname' => $countryname, 'Jobs_seed_data_Functional_Area' => $Jobs_seed_data_Functional_Area, 'Jobs_seed_data_Role' => $Jobs_seed_data_Role, 'Jobs_seed_data_Current_Position' => $Jobs_seed_data_Current_Position, 'Job' => $Job, 'JobQualificationUG' => $JobQualificationUG, 'JobQualificationPG' => $JobQualificationPG, 'JobQualificationDOCTORATE' => $JobQualificationDOCTORATE, 'JobLocation' => $JobLocation, 'JobRolesShowing' => $JobRolesShowing, 'statenames' => $statenames, 'ContactdetailArray' => $ContactdetailArray, 'appliedjoblist' => $appliedjoblist]);
    }

    public function viewappliedjobdetails($id, Request $request) {
        Log::info('viewappliedjobdetails function Started.');
        $Jobs_seed_data_Functional_Area = $this->job_service->getJobFunctionalArea();
        $Jobs_seed_data_Role = $this->job_service->getJobRole();
        $Jobs_seed_data_Current_Position = $this->job_service->getJobCurrentPosition();
        $Job = $this->job_service->getJobWithId($request);
        $JobQualificationUG = $this->job_service->getJobQualificationWithIdUG($request);
        $JobQualificationPG = $this->job_service->getJobQualificationWithIdPG($request);
        $JobQualificationDOCTORATE = $this->job_service->getJobQualificationWithIdDOCTORATE($request);
        $JobLocation = $this->job_service->getJobLocationWithId($request);
        $functional_area = $Job[0]->functional_area;
        if (!isset($functional_area)) {
            $functional_area = 0;
        }
        $JobRolesShowing = DB::select("SELECT * FROM `jobs_seed_data` WHERE `type` = 1003 AND `parent_id` = $functional_area ");

        $countryname = array();
        $statenames = array();
        for ($i = 0; $i < count($JobLocation); $i++) {
            $countryname[$i] = $Country = $this->location_service->getCountryByCounryID($JobLocation[$i]->countryid);
            $statenames[$i] = $this->location_service->getStateNameByStateID($JobLocation[$i]->countryid, $JobLocation[$i]->regionid);
        }
        $ContactdetailArray = json_decode($Job[0]->contact_details, true);
        $appliedjoblist = array();
        $jobappliedbyjs = $this->jobseeker_service->getappliedjobsbylogedinjs();
        foreach ($jobappliedbyjs as $jobappliedbyjs) {
            array_push($appliedjoblist, $jobappliedbyjs->jobid);
        }
        $JobSeekerId = $this->jobseeker_service->getjobseekeridbylogedinuser();
        $jobseekerId = $JobSeekerId[0]->id;

        $jsAssignedTest = $this->job_service->getAssignmentTestOfJsForJob($jobseekerId, $id);

        Log::info('viewappliedjobdetails function Ended.');

        return view('job_seeker/appliedjobview', ['countryname' => $countryname, 'Jobs_seed_data_Functional_Area' => $Jobs_seed_data_Functional_Area, 'Jobs_seed_data_Role' => $Jobs_seed_data_Role, 'Jobs_seed_data_Current_Position' => $Jobs_seed_data_Current_Position, 'Job' => $Job, 'JobQualificationUG' => $JobQualificationUG, 'JobQualificationPG' => $JobQualificationPG, 'JobQualificationDOCTORATE' => $JobQualificationDOCTORATE, 'JobLocation' => $JobLocation, 'JobRolesShowing' => $JobRolesShowing, 'statenames' => $statenames, 'ContactdetailArray' => $ContactdetailArray, 'appliedjoblist' => $appliedjoblist, 'jsAssignedTest' => $jsAssignedTest]);
    }
    
    public function attendVideoInterview($id, Request $request) {
        Log::info('attendVideoInterview function Started.');
        $jsid = explode('&&', $id);
        $id = $jsid[0];
        $postaction = $jsid[1];
        $jobid = $jsid[2];
        $js_at_questions = $this->job_service->getAssignedToAT($id, $jobid);
        $js_vi_questions = $this->job_service->getAssignedToVI($id, $jobid);
        $job_applied_info = $this->job_service->getAppliedjobHistoryInfo($id, $jobid);
        //print_r($job_applied_info);
        Log::info('attendVideoInterview function Ended.');
        return view('job_seeker/attend_vi', ['id' => $id, 'jobid' => $jobid, 'at_list' => $js_at_questions, 'vi_list' => $js_vi_questions, 'js_applied' => $job_applied_info]);
    }
    
    public function viewTestInfo(Request $request) {
        Log::info('attendVideoInterview function Started.');
        $id = $request->id;
        $jsid = explode('&&', $id);
        $id = $jsid[0];
        $postaction = $jsid[1];
        $jobid = $jsid[2];
        $js_at_questions = $this->job_service->getAssignedToAT($id, $jobid);
        $js_vi_questions = $this->job_service->getAssignedToVI($id, $jobid);
        $job_applied_info = $this->job_service->getAppliedjobHistoryInfo($id, $jobid);
        //print_r($job_applied_info);
        Log::info('attendVideoInterview function Ended.');
        return view('job_seeker/online_test_details', ['id' => $id, 'jobid' => $jobid, 'at_list' => $js_at_questions, 'vi_list' => $js_vi_questions, 'js_applied' => $job_applied_info]);
    }
    
    public function recordVideoInterview($id, Request $request) {
        Log::info('attendVideoInterview function Started.');
        $jsid = explode('&&', $id);
        $id = $jsid[0];
        $postaction = $jsid[1];
        $jobid = $jsid[2];
        $job_applied_info = $this->job_service->getAppliedjobHistoryInfo($id, $jobid);
        $js_vi_list = $this->job_service->getAssignedToVI($id, $jobid);
        $js_vi_questions = $this->job_service->getAssignedToVI($id, $jobid);
        
        //print_r($job_applied_info);
        Log::info('attendVideoInterview function Ended.');
        return view('job_seeker/submit_vi', ['id' => $id, 'jobid' => $jobid, 'quetion_list' => $js_vi_list, 'vi_list' => $js_vi_questions[0], 'js_applied' => $job_applied_info]);
    }
    
    //Function to add and update js Job Prefrences.
    public function setJsJobPrefrence(Request $request) {
        Log::info('setJsJobPrefrence function Started.');
        $this->jobseeker_service->setJsJobPrefrence($request);
        Log::info('setJsJobPrefrence function Ended.');
        //redirect()->back()->with('success', 'Job Preferences updated successfully!!');
        return redirect('/job_seeker/apply_job');
        //return redirect('/job_seeker/job_preferences');
    }

    public function starttestnow(Request $request) {
        Log::info('starttestnow function Started.');
        $responsevalue = $this->job_service->starttestnow($request);

        Log::info('starttestnow function Ended.');
        return $responsevalue;
    }
    
    protected function saveOnlineViAnswer(Request $request) {
        Log::info('saveOnlineViAnswer in controller function Started.');
        
        Log::info('==========end============='.$request->answer_url);
        $this->job_service->saveViAnswerInfo($request);
            
        $pendingQuestions = $this->job_service->getAssignedToVI($request->candidate_id, $request->job_id);
        if(count($pendingQuestions) > 0){
            return "/job_seeker/do_interview/".$request->candidate_id."&&jp&&".$request->job_id;
            //url$this->recordVideoInterview($request->candidate_id."&&jp&&".$request->job_id, $request);
        }else{
            return "/job_seeker/onlinesuccess/";
        }
            
        Log::info('saveOnlineViAnswer in controller function Ended.');
    }
    
    public function onlineTestSuccess() {
        Log::info('onlineTestSuccess function Started.');
       
        Log::info('onlineTestSuccess function Ended.');
        return view('job_seeker/online_test_success');
    }
    
    public function onlineTestFail() {
        Log::info('onlineTestFail function Started.');
       
        Log::info('onlineTestFail function Ended.');
        return view('job_seeker/online_test_fail');
    }


}
