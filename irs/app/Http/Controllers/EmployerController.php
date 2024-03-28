<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Users_Role;
use Carbon\Carbon;
use App\Role;
use App\Employer;
use App\Address;
use App\image;
use App\Job;
use App\Job_location;
use App\job_education_detail;
use App\Jobs_seed_data_type;
use App\Jobs_seed_data;
use App\Location;
use App\Http\Controllers\Config;
use Auth;
use Mail;
use App\Schools;
use App\Services\JobSeekerServices;
use App\Services\JobServices;
use App\Services\UserServices;
use App\Services\SocialServices;
use App\Services\AssessmentTestServices;
use App\Services\Stub;
use App\Services\UUID;
use App\Services\LocationServices;
use App\Services\UtilityServices;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Session;
use PDF;

class EmployerController extends Controller {

    protected $job_service;
    protected $location_service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->jobseeker_service = new JobSeekerServices();
        $this->job_service = new JobServices();
        $this->location_service = new LocationServices();
        $this->utility_services = new UtilityServices();
        $this->user_service = new UserServices();
        $this->social_service = new SocialServices();
        $this->at_service = new AssessmentTestServices();
        $this->middleware('auth');
    }

    public function index(Request $request) {
        Log::info('Index function Started.');
        $user = $this->user_service->getLoggedInUser();
        //if($user->roles->first()->role_name=="Employer"){
        $user = $this->user_service->getLoggedInUser();
        if ($this->job_service->checkemployercount() <= 0) {
            //$Country = $this->location_service->getCountry();
            Log::info('Index function To Additional Form.');
            //return view('employer_additional_form', ['Country' => $Country, 'user'=>$user]);
            return view('employer_home');
        } else {
            $savedJobs = $this->job_service->totalsavedJobs();
            $Applicants = $this->job_service->totalApplicant();
            $ActivePostedJobs = $this->job_service->totalActiveJobs();
            $employerlogoid = $this->job_service->getlogoidbylogedinuser();
            $employerlogo = $this->job_service->getlogobylogoid($employerlogoid[0]->logoid);
            $uuuserid = Auth::user()->uuid;
            //$roleid = $this->user_service->getrolebyuserid($uuuserid);
            //print_r($roleid); die();
            //session(['roleid' => $roleid]);
            //session(['userlogo' => $employerlogo[0]->path]);
            //echo Session::get('roleid');  die();
            Log::info('Index function To Dashboard.');
            Log::info('Activejobopening function Started.');
        Session::forget('recentjobid');
        $Activejobsdata = $this->job_service->getActivejobopening();
        $Totalapplicantcount = array();
        foreach ($Activejobsdata as $activejob) {
            $Totalapplicantcount[$activejob->id] = $this->jobseeker_service->getapplicantcountforjob($activejob->id);
        }
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

        Log::info('Activejobopening function Ended.');
        return view('recruiter/activejobopenings', ['Activejobsdata' => $Activejobsdata, 'Country' => $Country, 'Currency' => $Currency, 'Totalapplicantcount' => $Totalapplicantcount,
            'Jobs_seed_data_Functional_Area' => $Jobs_seed_data_Functional_Area,
            'Jobs_seed_data_Role' => $Jobs_seed_data_Role,
            'JobRolesShowing' => $JobRolesShowing,
            'JobQualificationUG' => $JobQualificationUG,
            'JobQualificationPG' => $JobQualificationPG,
            'JobQualificationDOCTORATE' => $JobQualificationDOCTORATE,
            'JobLocation' => $JobLocation,
            'JobCountries' => $JobCountries,
            'JobStates' => $JobStates,
            'JobApplications' => $JobApplications,
            'Jobs_seed_data_Industry' => $Jobs_seed_data_Industry, 'user' => $user, 'savedJobs' => $savedJobs, 'Applicants' => $Applicants, 'ActivePostedJobs' => $ActivePostedJobs]);
            //return view('employernewdashboard', ['user' => $user, 'savedJobs' => $savedJobs, 'Applicants' => $Applicants, 'ActivePostedJobs' => $ActivePostedJobs]);
        }
        /* }else{
          return redirect(strtolower($user->roles->first()->role_name));
          } */
    }

    /*
     * This is a master function for all the urls after logged in and then we will redirect to requested      * pages based on URL. 
     * Also checking whether user is logged in first time...
     */

    public function Company_registration() {
        Log::info('Company_registeration function To Additional Form start.');
        $user = $this->user_service->getLoggedInUser();
        $Country = $this->location_service->getCountry();
        Log::info('Index function To Additional Form end.');
        return view('employer_additional_form', ['Country' => $Country, 'user' => $user]);
    }

    public function master($any, Request $request) {
        Log::info('master function Started.');
        $user = $this->user_service->getLoggedInUser();
        //if($user->roles->first()->role_name=="Employer"){
        if ($this->job_service->checkemployercount() <= 0) {
            /* $Country = $this->location_service->getCountry();
              return view('employer_additional_form', ['Country' => $Country, 'user'=>$user]); */
            return view('employer_home');
        } else {
            $any = strtolower($any);
            switch ($any) {
                case "testmail":
                    return $this->testMail($request);
                    break;
                    
                case "postonlinetest":
                    return $this->ceateOnlineTest($request);
                    break;
                    
                case "postreview":
                    return $this->updateReview($request);
                    break;
                    
                case "recruiterprofile":
                    return $this->createRecruiterProfile($request);
                    break;
               
                case "createjobposting":
                    return $this->Createjobposting($request);
                    break;

                case "campusrecruitement":
                    return $this->CampusRecruitement($request);
                    break;

                case "savedjobposting":
                    return $this->Savedjobposting();
                    break;

                case "savedcampusrecruitements":
                    return $this->savedcampusrecruitements();
                    break;

                case "activejobopening":
                    return $this->Activejobopening();
                    break;

                case "activecampusrecruitement":
                    return $this->activecampusrecruitement();
                    break;

                case "candidateinformation":
                    return $this->CandidateInformation();
                    break;

                case "profile":
                    return $this->Employerprofile();
                    break;

                case "createjob":
                    return $this->Createjob($request);
                    break;

                case "jobposting":
                    return $this->Jobposting($request);
                    break;

                case "deletesavedjobsposting":
                    return $this->deletesavedjobsposting($request);
                    break;

                case "postsavedjob":
                    return $this->postsavedjob($request);
                    break;

                case "editemployerprofile":
                    return $this->editemployerprofile($request);
                    break;

                case "searchsavedjobposting":
                    return $this->searchsavedjobposting($request);
                    break;

                case "searchsavedcampusrecruitements":
                    return $this->searchsavedcampusrecruitements($request);
                    break;

                case "searchactivejobopening":
                    return $this->searchactivejobopening($request);
                    break;

                case "searchactivecampusrecruitement":
                    return $this->searchactivecampusrecruitement($request);
                    break;

                case "memberavailability":
                    return $this->memberavailability();
                    break;

                case "issued_offers":
                    return $this->issued_offers();
                    break;
                case "postsubmitoffer":
                    return $this->postsubmitoffer($request);
                    break;

                case "changestatustowithdraw":
                    return $this->changestatustowithdraw($request);
                    break;

                case "changeoffer":
                    return $this->changeoffer($request);
                    break;

                case "assigntesttojs":
                    return $this->assigntesttojs($request);
                    break;

                case "assesmentandvideointerview":
                    return $this->assesmenttestandvideointerview();
                    break;

                case "deactivatedsavedjobsposting":
                    return $this->deactivatejobsposting($request);
                    break;

                case "deleteactivejobsposting":
                    return $this->deleteactivejobsposting($request);
                    break;

                case "posttojobboards":
                    return $this->PostToJobBoards();
                    break;

                case "inactivejobopening":
                    return $this->InActivejobopening();
                    break;
            
                case "poststatues":
                    return $this->updateStatues($request);
                    break;
                default;
                    return redirect('employer/');
                    break;
            }
        }
        /* }else{
          //echo "Hi";die();
          return redirect(strtolower($user->roles->first()->role_name));
          } */
    }

    public function master_with_id($any, Request $request, $id) {
        Log::info('master_with_id function Started.');
        $user = $this->user_service->getLoggedInUser();
        //if($user->roles->first()->role_name=="Employer"){
        if ($this->job_service->checkemployercount() <= 0) {
            /* $Country = $this->location_service->getCountry();
              return view('employer_additional_form', ['Country' => $Country, 'user'=>$user]); */
            return view('employer_home');
        } else {
            $any = strtolower($any);
            switch ($any) {
                case "createassesment":
                    return $this->createAssessmentTest($id, $request);
                case "createvideointerview":
                    return $this->createViTest($id, $request);
                    break;
                case "editsavedjobsposting":
                    return $this->editsavedjobsposting($id, $request);
                    break;
                    
                 case "clonesavedjobsposting":
                    return $this->clonesavedjobsposting($id, $request);
                    break;

                case "editsavedcampusrecruitement":
                    return $this->editsavedcampusrecruitement($id, $request);
                    break;

                case "viewsavedjob":
                    return $this->viewsavedjob($id, $request);
                    break;

                case "job_seeker_profile_view":
                    return $this->jobseekerprofileview($id, $request);
                    break;

                case "member_availability_candidates":
                    $id = explode("!$!irs!$!", $id);
                    //print_r($id);
                    //exit;
                    return $this->member_availability_candidates($id[0], $id[1]);
                    break;
                case "recreatejobsposting":
                    return $this->recreatejobsposting($id, $request);
                case "jobapplicants":
                    return $this->jobApplicants($id, $request);
                case "print_js_profile":
                    return $this->jobseekerprofileprint($id, $request);
                case "viewappliedjobdetails":
                    return $this->viewappliedjobdetails($id, $request);
                    break;
            }
        }
        /*  }else{
          //echo "Hi";die();
          return redirect(strtolower($user->roles->first()->role_name));
          } */
    }

    public function testMail(Request $request){
        $userName = "Anand Kumar";
        $title = "Sample Title goes here!!";
        $bodyOne = "Sample body-1 comes here!!";
        $bodyTwo = "Sample body-2 comes here!!";
        $subject = "Sample Mail";
        $orderemail = "anandkumar.singam@gmail.com";
        $data = view('mail/email_template', []);
        $data = array('to_name'=>$userName, 'mail_title'=>$title, 'mail_body_one'=>$bodyOne, 'mail_body_two'=>$bodyTwo);
        //echo resource_path('views/vendor/mail');
        //exit;
        $message = "My Message";
        Mail::send('mail', $data, function ($message) use ($orderemail, $subject) {
            $message->to($orderemail)->subject($subject);
            //$message->bcc(config('app.CC_MailID'));
        });
        
        return view('mail/email_template');
    }
    
    public function editemployerprofile(Request $request) {
        Log::info('editemployerprofile function Started.');
        $validator = Validator::make($request->all(), [
                    'companyname' => 'required|max:255',
                    'companytype' => 'required',
                    'Address' => 'required',
                    'About' => 'required',
        ]);
        if ($validator->fails()) {
            //pass validator errors as errors object for ajax response 
            echo 'error is there';
            $errors = $validator->errors();
            //$jsonArray = json_decode($errors,true);
            //echo  $jsonArray['pincode'][0];
            //print_r($jsonArray);
            //exit;
            Session::flash('message', 'Cant Edit Profile, InValid Data Passed.');
            Session::flash('alert-class', 'alert-danger');
            Log::info('editemployerprofile function Ended with error handling.');
            return redirect('employer/recruiterprofile');
        } else {
            $editemployerprofileres = $this->user_service->editEmployerProfile($request);
            Log::info('editemployerprofile function Ended.');
            return redirect('employer/recruiterprofile');
        }
    }

    public function postsavedjob($request) {
        Log::info('postsavedjob function Started.');
        $id = $request->jobid;
        $request->session()->put('recentjobid', $id);
        $JobpostingResponse = $this->job_service->Jobposting($request);
        /* $jobid= $request->session()->get('recentjobid');
          $naukariboard = DB::select("SELECT * FROM job_board_mapping where boardid =2 and isactive=1 and is_PostedOn_board = 0 and jobid = '$jobid' ");
          if(count($naukariboard)>0){
          $jobsdata = $this->utility_services->createJsonForJobs($jobid);
          print_r($jobsdata);
          $stub = new Stub("c50e8d062a0664ecca30c77f9df883c9d2d807d09a8a69f82b5658be7cbc9a58","appKey");
          $apiAddressPost="https://rms.naukri.com/v1/recruiterApi/requirements/8cUk0";
          $requirementData= $jobsdata;
          $stub->addRequirement($apiAddressPost, $requirementData, 1);
          DB::table('job_board_mapping')
          ->where('jobid', $jobid)
          ->where('isactive', 1)
          ->where('boardid', 2)
          ->update(['is_PostedOn_board' => 1]);
          } */
        $request->session()->put('job_posted_success', 1);
        $request->session()->forget('recentjobid');
        //Session:put('job_posted_success', $request->jobtitle)
        Log::info('postsavedjob function Ended.');
        return $this->Savedjobposting();
    }

    public function Jobposting($request) {
        Log::info('Jobposting function Started.');
        $JobpostingResponse = $this->job_service->Jobposting($request);
        $jobid = $request->session()->get('recentjobid');
        //print_r($request[0]);
        //$name = $request->input('school_partner');
        //$abc = $request->Jobtitle;
        //echo $abc."----------------".$name;
        //exit;
        /* $naukariboard = DB::select("SELECT * FROM job_board_mapping where boardid =2 and isactive=1 and is_PostedOn_board = 0 and jobid = '$jobid' ");
          if(count($naukariboard)>0){
          $jobsdata = $this->utility_services->createJsonForJobs($jobid);
          print_r($jobsdata);
          $stub = new Stub("c50e8d062a0664ecca30c77f9df883c9d2d807d09a8a69f82b5658be7cbc9a58","appKey");
          $apiAddressPost="https://rms.naukri.com/v1/recruiterApi/requirements/8cUk0";
          $requirementData= $jobsdata;
          $stub->addRequirement($apiAddressPost, $requirementData, 1);
          DB::table('job_board_mapping')
          ->where('jobid', $jobid)
          ->where('isactive', 1)
          ->where('boardid', 2)
          ->update(['is_PostedOn_board' => 1]);
          } */
        $user = $this->user_service->getLoggedInUser();
        $savedJobs = $this->job_service->totalsavedJobs();
        $Applicants = $this->job_service->totalApplicant();
        $ActivePostedJobs = $this->job_service->totalActiveJobs();
        $employerlogoid = $this->job_service->getlogoidbylogedinuser();
        $employerlogo = $this->job_service->getlogobylogoid($employerlogoid[0]->logoid);
        $uuuserid = Auth::user()->uuid;
        $request->session()->forget('recentjobid');
        Log::info('Jobposting function Ended.');
        //return $this->Createjobposting($request);
        return view('recruiter/jobpostingsuccess', ['user' => $user, 'savedJobs' => $savedJobs, 'Applicants' => $Applicants, 'ActivePostedJobs' => $ActivePostedJobs]);
    }

    public function jobseekerprofileview($id, Request $request) {
        Log::info('jobseekerprofileview function Started.');
        $jsid = explode('&&', $id);
        $id = $jsid[0];
        $postaction = $jsid[1];
        $jobid = $jsid[2];
        $jsAssignedTest = $this->job_service->getAssignmentTestOfJsForJob($id, $jobid);
        $jsprofile = $this->jobseeker_service->JobSeekerProfileView($id);
        $js_qualification = $this->jobseeker_service->job_seeker_qualification($id);
        $js_experience = $this->jobseeker_service->job_seeker_experience($id);
        $js_projects = $this->jobseeker_service->job_seeker_project_detail($id);
        $js_job_pref = $this->jobseeker_service->job_seeker_job_pref($id);
        $js_application = $this->job_service->getCandidateApplicationInfo($id, $jobid);
        $js_at_questions = $this->job_service->getAssignedAT($id, $jobid);
        $js_vi_questions = $this->job_service->getAssignedVI($id, $jobid);
        $test_category = $this->job_service->get_test_category();
        $Country = $this->location_service->getCountry();
        $user = $this->user_service->getLoggedInUser();
		$savedJobs = $this->job_service->totalsavedJobs();
        $Applicants = $this->job_service->totalApplicant();
        $ActivePostedJobs = $this->job_service->totalActiveJobs();
        $employerlogoid = $this->job_service->getlogoidbylogedinuser();
        $employerlogo = $this->job_service->getlogobylogoid($employerlogoid[0]->logoid);
        //echo $js_application[0]->shortlisted;
        //exit;
        if($js_application[0]->shortlisted == 0){
             $dataInfo = [
                'job_id' => $jobid,
                'candidate_id' => $id,
                'shortlisted' => 1
            ];
            $dataInfo = $this->job_service->saveApplicationStatus($dataInfo);
        }
        //saveApplicationStatus
        $uuuserid = Auth::user()->uuid;
        //echo '<pre>';
        //print_r($js_vi_questions);
        //exit;
    
        Log::info('jobseekerprofileview function Ended.');
        return view('recruiter/jobseekerprofile', ['id' => $id, 'jobid' => $jobid, 'at_list' => $js_at_questions, 'vi_list' => $js_vi_questions, 'jsapplication' => $js_application, 'jsprofile' => $jsprofile, 'js_qualification' => $js_qualification, 'js_experience' => $js_experience, 'js_projects' => $js_projects, 'js_job_pref' => $js_job_pref, 'postaction' => $postaction, 'test_category' => $test_category, 'Country' => $Country, 'jsAssignedTest' => $jsAssignedTest, 'user' => $user, 'savedJobs' => $savedJobs, 'Applicants' => $Applicants, 'ActivePostedJobs' => $ActivePostedJobs]);
    }

    public function viewsavedjob($id, Request $request) {
        Log::info('viewsavedjob function Started.');
        $company_name = Auth::user()->company;
        $job_seed_data_types = $this->job_service->getJobSeedDataTypes();
        $Jobs_seed_data_UG = $this->job_service->getJobSeedDataByTypeUG();
        $Jobs_seed_data_PG = $this->job_service->getJobSeedDataByTypePG();
        $Jobs_seed_data_DR = $this->job_service->getJobSeedDataByTypeDR();
        $Jobs_seed_data_Industry = $this->job_service->getJobIndustry();
        $Jobs_seed_data_Functional_Area = $this->job_service->getJobFunctionalArea();
        $Jobs_seed_data_Role = $this->job_service->getJobRole();
        $Jobs_seed_data_Current_Position = $this->job_service->getJobCurrentPosition();
        $Currency = $this->location_service->getCurrency();

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

        $ContactdetailArray = json_decode($Job[0]->contact_details, true);
        //echo  $jsonArray['pincode'][0];
        $countryname = array();
        $statenames = array();
        for ($i = 0; $i < count($JobLocation); $i++) {
            $countryname[$i] = $Country = $this->location_service->getCountryByCounryID($JobLocation[$i]->countryid);
            $statenames[$i] = $this->location_service->getStateNameByStateID($JobLocation[$i]->countryid, $JobLocation[$i]->regionid);
        }

        Log::info('viewsavedjob function Ended.');
        return view('viewsavedjob', ['job_seed_data_types' => $job_seed_data_types, 'Jobs_seed_data_UG' => $Jobs_seed_data_UG, 'Jobs_seed_data_PG' => $Jobs_seed_data_PG, 'Jobs_seed_data_DR' => $Jobs_seed_data_DR, 'Jobs_seed_data_Industry' => $Jobs_seed_data_Industry, 'Currency' => $Currency, 'countryname' => $countryname, 'Jobs_seed_data_Functional_Area' => $Jobs_seed_data_Functional_Area, 'Jobs_seed_data_Role' => $Jobs_seed_data_Role, 'Jobs_seed_data_Current_Position' => $Jobs_seed_data_Current_Position, 'company_name' => $company_name, 'Job' => $Job, 'JobQualificationUG' => $JobQualificationUG, 'JobQualificationPG' => $JobQualificationPG, 'JobQualificationDOCTORATE' => $JobQualificationDOCTORATE, 'JobLocation' => $JobLocation, 'JobRolesShowing' => $JobRolesShowing, 'statenames' => $statenames, 'ContactdetailArray' => $ContactdetailArray]);
    }

    public function CandidateInformation() {
        Log::info('CandidateInformation function Started.');
        $user = $this->user_service->getLoggedInUser();
        $savedJobs = $this->job_service->totalsavedJobs();
        $Applicants = $this->job_service->totalApplicant();
        $ActivePostedJobs = $this->job_service->totalActiveJobs();
        $employerlogoid = $this->job_service->getlogoidbylogedinuser();
        $employerlogo = $this->job_service->getlogobylogoid($employerlogoid[0]->logoid);
        $uuuserid = Auth::user()->uuid;
        $CandidateAppliedForJobs = $this->job_service->getCandidateApplications();
        Log::info('CandidateInformation function Ended.');
        return view('recruiter/candidateinformation', ['CandidateAppliedForJobs' => $CandidateAppliedForJobs, 'user' => $user, 'savedJobs' => $savedJobs, 'Applicants' => $Applicants, 'ActivePostedJobs' => $ActivePostedJobs]);
    }
    
    public function createRecruiterProfile() {
        Log::info('Recruiter Profile function Started.');
        $user = $this->user_service->getLoggedInUser();
        $employerprofile = $this->user_service->getLoggedInEmployerProfile();
        $StateShowing = $this->location_service->getStateByCountryID($employerprofile[0]->countryid);
        $CityShowing = $this->location_service->getCityByStateID($employerprofile[0]->regionid);
        $Country = $this->location_service->getCountry();
        $savedJobs = $this->job_service->totalsavedJobs();
        $Applicants = $this->job_service->totalApplicant();
        $ActivePostedJobs = $this->job_service->totalActiveJobs();
        $employerlogoid = $this->job_service->getlogoidbylogedinuser();
        $employerlogo = $this->job_service->getlogobylogoid($employerlogoid[0]->logoid);
        $uuuserid = Auth::user()->uuid;
        Log::info('Recruiter Profile function Ended.');
        return view('recruiter/recruiterprofile', ['Country' => $Country, 'employerprofile' => $employerprofile, 'StateShowing' => $StateShowing, 'CityShowing' => $CityShowing, 'user' => $user, 'savedJobs' => $savedJobs, 'Applicants' => $Applicants, 'ActivePostedJobs' => $ActivePostedJobs]);
    }

    public function createAssessmentTest($id, Request $request) {
        Log::info('Create Assesment Test function Started.');
        $jsid = explode('&&', $id);
        $id = $jsid[0];
        $postaction = $jsid[1];
        $jobid = $jsid[2];
        $jsprofile = $this->jobseeker_service->JobSeekerProfileView($id);
        $js_experience = $this->jobseeker_service->job_seeker_experience($id);
        $user = $this->user_service->getLoggedInUser();
        $savedJobs = $this->job_service->totalsavedJobs();
        $Applicants = $this->job_service->totalApplicant();
        $ActivePostedJobs = $this->job_service->totalActiveJobs();
        $employerlogoid = $this->job_service->getlogoidbylogedinuser();
        $employerlogo = $this->job_service->getlogobylogoid($employerlogoid[0]->logoid);
        $questionbank = $this->social_service->getQuestionBank();
        $uuuserid = Auth::user()->uuid;
        $partnerid = "1222166";
	$password = "f1o2o2d2l1i6n6ked";
	$partneruserid = "foodlinkedtestuser2";
	$testid = "6682";
	$returnurl = "http://localhost/Halaxa/";
	$enabledev = false;
	$enabledebug = true;
	$enablereuse = true;
	$apicallurl = "http://localhost/Halaxa/webservices/GenerateTicket.aspx";
	
	$testingurl = $this->at_service->getTestUrl($partneruserid, $testid, $returnurl, $enabledev, $enabledebug, $enablereuse);
	//($apicallurl, $partnerid, $password, $partneruserid, $testid, $returnurl, $enabledev, $enabledebug, $enablereuse);
	echo "testingurl: ". $testingurl ."<br/>";
	//header("Location: ".$testingurl);
	die();
        Log::info('Create Assesment Test function Ended.');
        return view('recruiter/createat', ['id' => $id, 'jobid' => $jobid, 'questionbank' => $questionbank, 'jsprofile' => $jsprofile, 'js_experience' => $js_experience, 'user' => $user, 'savedJobs' => $savedJobs, 'Applicants' => $Applicants, 'ActivePostedJobs' => $ActivePostedJobs]);
    }

    public function createViTest($id, Request $request) {
        Log::info('Create Assesment Test function Started.');
        $jsid = explode('&&', $id);
        $id = $jsid[0];
        $postaction = $jsid[1];
        $jobid = $jsid[2];
        $jsprofile = $this->jobseeker_service->JobSeekerProfileView($id);
        $js_experience = $this->jobseeker_service->job_seeker_experience($id);
        $user = $this->user_service->getLoggedInUser();
        $savedJobs = $this->job_service->totalsavedJobs();
        $Applicants = $this->job_service->totalApplicant();
        $ActivePostedJobs = $this->job_service->totalActiveJobs();
        $employerlogoid = $this->job_service->getlogoidbylogedinuser();
        $employerlogo = $this->job_service->getlogobylogoid($employerlogoid[0]->logoid);
        $questionbank = $this->social_service->getQuestionBank();
        $uuuserid = Auth::user()->uuid;
        Log::info('Create Assesment Test function Ended.');
        return view('recruiter/createvi', ['id' => $id, 'jobid' => $jobid, 'questionbank' => $questionbank, 'jsprofile' => $jsprofile, 'js_experience' => $js_experience, 'user' => $user, 'savedJobs' => $savedJobs, 'Applicants' => $Applicants, 'ActivePostedJobs' => $ActivePostedJobs]);
    }

    public function Createjobposting(Request $request) {
        Log::info('Createjobposting function Started.');
        $request->session()->forget('recentjobid');
        $Jobs_seed_data_Functional_Area = $this->job_service->getJobFunctionalArea();
        $Jobs_seed_data_Role = $this->job_service->getJobRole();
        for ($i = 0; $i < count($Jobs_seed_data_Functional_Area); $i++) {
            $Jobs_RolesBy_Id[$Jobs_seed_data_Functional_Area[$i]->id] = $this->job_service->getJobRolesByFunctionalArea($Jobs_seed_data_Functional_Area[$i]->id);
        }
        // print_r($Jobs_RolesBy_Id[2000][2]->value); die();

        $company_name = Auth::user()->company;
        $job_seed_data_types = $this->job_service->getJobSeedDataTypes();
        $Jobs_seed_data_UG = $this->job_service->getJobSeedDataByTypeUG();
        $Jobs_seed_data_PG = $this->job_service->getJobSeedDataByTypePG();
        $Jobs_seed_data_DR = $this->job_service->getJobSeedDataByTypeDR();
        $Jobs_seed_data_Industry = $this->job_service->getJobIndustry();
        
        $user = $this->user_service->getLoggedInUser();
        $savedJobs = $this->job_service->totalsavedJobs();
        $Applicants = $this->job_service->totalApplicant();
        $ActivePostedJobs = $this->job_service->totalActiveJobs();
        $employerlogoid = $this->job_service->getlogoidbylogedinuser();
        $employerlogo = $this->job_service->getlogobylogoid($employerlogoid[0]->logoid);
        $employerprofile = $this->user_service->getLoggedInEmployerProfile();
        $uuuserid = Auth::user()->uuid;
            
        $Jobs_seed_data_Current_Position = $this->job_service->getJobCurrentPosition();
        $Currency = $this->location_service->getCurrency();
        //  print_r($Currency); die();
        $Country = $this->location_service->getCountry();
        $job_boards_data = $this->job_service->getJobboards();

        Log::info('Createjobposting function Ended.');
        return view('recruiter/createjobposting', ['employerprofile' => $employerprofile, 'job_seed_data_types' => $job_seed_data_types, 'Jobs_seed_data_UG' => $Jobs_seed_data_UG, 'Jobs_seed_data_PG' => $Jobs_seed_data_PG, 'Jobs_seed_data_DR' => $Jobs_seed_data_DR, 'Jobs_seed_data_Industry' => $Jobs_seed_data_Industry, 'Currency' => $Currency, 'Country' => $Country, 'Jobs_seed_data_Functional_Area' => $Jobs_seed_data_Functional_Area, 'Jobs_seed_data_Role' => $Jobs_seed_data_Role, 'Jobs_seed_data_Current_Position' => $Jobs_seed_data_Current_Position, 'job_boards_data' => $job_boards_data, 'company_name' => $company_name, 'Jobs_RolesBy_Id' => $Jobs_RolesBy_Id, 'user' => $user, 'savedJobs' => $savedJobs, 'Applicants' => $Applicants, 'ActivePostedJobs' => $ActivePostedJobs]);
    }
    
    
    protected function ceateOnlineTest(Request $request) {
        Log::info('ceateOnlineTest in controller function Started.');
        
        Log::info('inside edit condition others.');
            if ($request->test_type == "1" || $request->test_type == "2") {
                $validator = Validator::make($request->all(), [
                            'candidate_id' => 'required|max:255',
                            'job_id' => 'required|max:255',
                            'no_of_days' => 'required',
                            'questions' => 'required',
                            'time_allowed' => 'required'
                ]);

                if ($validator->fails()) {
                    //pass validator errors as errors object for ajax response
                    return response()->json(['errors' => $validator->errors()]);
                    unset($request->PageName);
                }
            }
            $this->job_service->createOnlineTestInfo($request);
            
        Log::info('==================='.$request->job_id."============".$request->candidate_id);

        Log::info('ceateOnlineTest in controller function Ended.');
    }

    protected function updateReview(Request $request) {
        Log::info('updateReview in controller function Started.');
        
            if ($request->rating != "0") {
                $validator = Validator::make($request->all(), [
                            'candidate_id' => 'required|max:255',
                            'job_id' => 'required|max:255',
                            'rating' => 'required',
                ]);

                if ($validator->fails()) {
                    //pass validator errors as errors object for ajax response
                    return response()->json(['errors' => $validator->errors()]);
                    //unset($request->PageName);
                }
            }
            $this->job_service->saveApplicationRatingInfo($request);
            

        Log::info('updateReview in controller function Ended.');
    }

    public function CampusRecruitement(Request $request) {
        Log::info('CampusRecruitement function Started.');
        $request->session()->forget('recentjobid');
        $Jobs_seed_data_Functional_Area = $this->job_service->getJobFunctionalArea();
        $Jobs_seed_data_Role = $this->job_service->getJobRole();
        for ($i = 0; $i < count($Jobs_seed_data_Functional_Area); $i++) {
            $Jobs_RolesBy_Id[$Jobs_seed_data_Functional_Area[$i]->id] = $this->job_service->getJobRolesByFunctionalArea($Jobs_seed_data_Functional_Area[$i]->id);
        }

        $company_name = Auth::user()->company;
        $job_seed_data_types = $this->job_service->getJobSeedDataTypes();
        $Jobs_seed_data_UG = $this->job_service->getJobSeedDataByTypeUG();
        $Jobs_seed_data_PG = $this->job_service->getJobSeedDataByTypePG();
        $Jobs_seed_data_DR = $this->job_service->getJobSeedDataByTypeDR();
        $Jobs_seed_data_Industry = $this->job_service->getJobIndustry();
        $data = $this->job_service->getSchoolsLists();
        if (!empty($data)) {
            $schools = json_decode((string) $data, true);
            $school_list = $schools['schools'];

            $Jobs_seed_data_Current_Position = $this->job_service->getJobCurrentPosition();
            $Currency = $this->location_service->getCurrency();
            //  print_r($Currency); die();
            $Country = $this->location_service->getCountry();
            // $job_boards_data = $this->job_service->getJobboards();
            $job_type = $this->job_service->getjobtypes();
            Log::info('CampusRecruitement function Ended.');
            return view('campusrecruitement', ['job_seed_data_types' => $job_seed_data_types, 'Jobs_seed_data_UG' => $Jobs_seed_data_UG, 'Jobs_seed_data_PG' => $Jobs_seed_data_PG, 'Jobs_seed_data_DR' => $Jobs_seed_data_DR, 'Jobs_seed_data_Industry' => $Jobs_seed_data_Industry, 'Currency' => $Currency, 'Country' => $Country, 'Jobs_seed_data_Functional_Area' => $Jobs_seed_data_Functional_Area, 'Jobs_seed_data_Role' => $Jobs_seed_data_Role, 'Jobs_seed_data_Current_Position' => $Jobs_seed_data_Current_Position, 'school_info' => $school_list, 'company_name' => $company_name, 'Jobs_RolesBy_Id' => $Jobs_RolesBy_Id, 'job_type' => $job_type]);
        } else {
            return redirect('/employer/');
        }
    }

    // function to show data of saved job by id
    public function editsavedjobsposting($id, Request $request) {
        Log::info('editsavedjobsposting function Started.');
        $Jobs_seed_data_Functional_Area = $this->job_service->getJobFunctionalArea();
        $Jobs_seed_data_Role = $this->job_service->getJobRole();
        for ($i = 0; $i < count($Jobs_seed_data_Functional_Area); $i++) {
            $Jobs_RolesBy_Id[$Jobs_seed_data_Functional_Area[$i]->id] = $this->job_service->getJobRolesByFunctionalArea($Jobs_seed_data_Functional_Area[$i]->id);
        }
        $company_name = Auth::user()->company;
        $job_seed_data_types = $this->job_service->getJobSeedDataTypes();
        $Jobs_seed_data_UG = $this->job_service->getJobSeedDataByTypeUG();
        $Jobs_seed_data_PG = $this->job_service->getJobSeedDataByTypePG();
        $Jobs_seed_data_DR = $this->job_service->getJobSeedDataByTypeDR();
        $Jobs_seed_data_Industry = $this->job_service->getJobIndustry();
        $Jobs_seed_data_Current_Position = $this->job_service->getJobCurrentPosition();
        $Currency = $this->location_service->getCurrency();

        $Country = $this->location_service->getCountry();

        $Job = $this->job_service->getJobWithId($request);
        $JobQualificationUG = $this->job_service->getJobQualificationWithIdUG($request);
        $JobQualificationPG = $this->job_service->getJobQualificationWithIdPG($request);
        $JobQualificationDOCTORATE = $this->job_service->getJobQualificationWithIdDOCTORATE($request);
        $job_boards_data = $this->job_service->getJobboards();
        $JobLocation = $this->job_service->getJobLocationWithId($request);
        $functional_area = $Job[0]->functional_area;
        if (!isset($functional_area)) {
            $functional_area = 0;
        }
        $JobRolesShowing = DB::select("SELECT * FROM `jobs_seed_data` WHERE `type` = 1003 AND `parent_id` = $functional_area ");
        $countryname = array();
        $statenames = array();
        for ($i = 0; $i < count($JobLocation); $i++) {
            $countryname[$i] = $this->location_service->getCountryByCounryID($JobLocation[$i]->countryid);
            $statenames[$i] = $this->location_service->getStateNameByStateID($JobLocation[$i]->countryid, $JobLocation[$i]->regionid);
        }
        $ContactdetailArray = json_decode($Job[0]->contact_details, true);
        $insertedboards = $this->job_service->getjobboardmappingdata($id);
        $insertedboardarray = array();
        foreach ($insertedboards as $insertedboards) {
            array_push($insertedboardarray, $insertedboards->boardid);
        }
        $user = $this->user_service->getLoggedInUser();
		$savedJobs = $this->job_service->totalsavedJobs();
        $Applicants = $this->job_service->totalApplicant();
        $ActivePostedJobs = $this->job_service->totalActiveJobs();
        $employerlogoid = $this->job_service->getlogoidbylogedinuser();
        $employerlogo = $this->job_service->getlogobylogoid($employerlogoid[0]->logoid);
        $uuuserid = Auth::user()->uuid;
        //echo array_search("5",$insertedboardarray); die();
        //print_r(); die();
        Log::info('editsavedjobsposting function Ended.');
        return view('recruiter/editsavedjob', ['job_seed_data_types' => $job_seed_data_types, 'Jobs_seed_data_UG' => $Jobs_seed_data_UG, 'Jobs_seed_data_PG' => $Jobs_seed_data_PG, 'Jobs_seed_data_DR' => $Jobs_seed_data_DR, 'Jobs_seed_data_Industry' => $Jobs_seed_data_Industry, 'Currency' => $Currency, 'Country' => $Country, 'Jobs_seed_data_Functional_Area' => $Jobs_seed_data_Functional_Area, 'Jobs_seed_data_Role' => $Jobs_seed_data_Role, 'Jobs_seed_data_Current_Position' => $Jobs_seed_data_Current_Position, 'company_name' => $company_name, 'Job' => $Job, 'JobQualificationUG' => $JobQualificationUG, 'JobQualificationPG' => $JobQualificationPG, 'JobQualificationDOCTORATE' => $JobQualificationDOCTORATE, 'JobLocation' => $JobLocation, 'JobRolesShowing' => $JobRolesShowing, 'job_boards_data' => $job_boards_data, 'countryname' => $countryname, 'statenames' => $statenames, 'Jobs_RolesBy_Id' => $Jobs_RolesBy_Id, 'ContactdetailArray' => $ContactdetailArray, 'insertedboardarray' => $insertedboardarray, 'user' => $user, 'savedJobs' => $savedJobs, 'Applicants' => $Applicants, 'ActivePostedJobs' => $ActivePostedJobs]);
    }

    public function clonesavedjobsposting($id, Request $request) {
        Log::info('clonesavedjobsposting function Started.');
        $Jobs_seed_data_Functional_Area = $this->job_service->getJobFunctionalArea();
        $Jobs_seed_data_Role = $this->job_service->getJobRole();
        for ($i = 0; $i < count($Jobs_seed_data_Functional_Area); $i++) {
            $Jobs_RolesBy_Id[$Jobs_seed_data_Functional_Area[$i]->id] = $this->job_service->getJobRolesByFunctionalArea($Jobs_seed_data_Functional_Area[$i]->id);
        }
        $company_name = Auth::user()->company;
        $job_seed_data_types = $this->job_service->getJobSeedDataTypes();
        $Jobs_seed_data_UG = $this->job_service->getJobSeedDataByTypeUG();
        $Jobs_seed_data_PG = $this->job_service->getJobSeedDataByTypePG();
        $Jobs_seed_data_DR = $this->job_service->getJobSeedDataByTypeDR();
        $Jobs_seed_data_Industry = $this->job_service->getJobIndustry();
        $Jobs_seed_data_Current_Position = $this->job_service->getJobCurrentPosition();
        $Currency = $this->location_service->getCurrency();

        $Country = $this->location_service->getCountry();

        $Job = $this->job_service->getJobWithId($request);
        $JobQualificationUG = $this->job_service->getJobQualificationWithIdUG($request);
        $JobQualificationPG = $this->job_service->getJobQualificationWithIdPG($request);
        $JobQualificationDOCTORATE = $this->job_service->getJobQualificationWithIdDOCTORATE($request);
        $job_boards_data = $this->job_service->getJobboards();
        $JobLocation = $this->job_service->getJobLocationWithId($request);
        $functional_area = $Job[0]->functional_area;
        if (!isset($functional_area)) {
            $functional_area = 0;
        }
        $JobRolesShowing = DB::select("SELECT * FROM `jobs_seed_data` WHERE `type` = 1003 AND `parent_id` = $functional_area ");
        $countryname = array();
        $statenames = array();
        for ($i = 0; $i < count($JobLocation); $i++) {
            $countryname[$i] = $this->location_service->getCountryByCounryID($JobLocation[$i]->countryid);
            $statenames[$i] = $this->location_service->getStateNameByStateID($JobLocation[$i]->countryid, $JobLocation[$i]->regionid);
        }
        $ContactdetailArray = json_decode($Job[0]->contact_details, true);
        $insertedboards = $this->job_service->getjobboardmappingdata($id);
        $insertedboardarray = array();
        foreach ($insertedboards as $insertedboards) {
            array_push($insertedboardarray, $insertedboards->boardid);
        }
        $user = $this->user_service->getLoggedInUser();
		$savedJobs = $this->job_service->totalsavedJobs();
        $Applicants = $this->job_service->totalApplicant();
        $ActivePostedJobs = $this->job_service->totalActiveJobs();
        $employerlogoid = $this->job_service->getlogoidbylogedinuser();
        $employerlogo = $this->job_service->getlogobylogoid($employerlogoid[0]->logoid);
        $uuuserid = Auth::user()->uuid;
        //echo array_search("5",$insertedboardarray); die();
        //print_r(); die();
        Log::info('clonesavedjobsposting function Ended.');
        return view('recruiter/clonesavedjob', ['job_seed_data_types' => $job_seed_data_types, 'Jobs_seed_data_UG' => $Jobs_seed_data_UG, 'Jobs_seed_data_PG' => $Jobs_seed_data_PG, 'Jobs_seed_data_DR' => $Jobs_seed_data_DR, 'Jobs_seed_data_Industry' => $Jobs_seed_data_Industry, 'Currency' => $Currency, 'Country' => $Country, 'Jobs_seed_data_Functional_Area' => $Jobs_seed_data_Functional_Area, 'Jobs_seed_data_Role' => $Jobs_seed_data_Role, 'Jobs_seed_data_Current_Position' => $Jobs_seed_data_Current_Position, 'company_name' => $company_name, 'Job' => $Job, 'JobQualificationUG' => $JobQualificationUG, 'JobQualificationPG' => $JobQualificationPG, 'JobQualificationDOCTORATE' => $JobQualificationDOCTORATE, 'JobLocation' => $JobLocation, 'JobRolesShowing' => $JobRolesShowing, 'job_boards_data' => $job_boards_data, 'countryname' => $countryname, 'statenames' => $statenames, 'Jobs_RolesBy_Id' => $Jobs_RolesBy_Id, 'ContactdetailArray' => $ContactdetailArray, 'insertedboardarray' => $insertedboardarray, 'user' => $user, 'savedJobs' => $savedJobs, 'Applicants' => $Applicants, 'ActivePostedJobs' => $ActivePostedJobs]);
    }

    public function editsavedcampusrecruitement($id, Request $request) {
        Log::info('editsavedcampusrecruitement function Started.');
        $Jobs_seed_data_Functional_Area = $this->job_service->getJobFunctionalArea();
        $Jobs_seed_data_Role = $this->job_service->getJobRole();
        for ($i = 0; $i < count($Jobs_seed_data_Functional_Area); $i++) {
            $Jobs_RolesBy_Id[$Jobs_seed_data_Functional_Area[$i]->id] = $this->job_service->getJobRolesByFunctionalArea($Jobs_seed_data_Functional_Area[$i]->id);
        }
        $company_name = Auth::user()->company;
        $job_seed_data_types = $this->job_service->getJobSeedDataTypes();
        $Jobs_seed_data_UG = $this->job_service->getJobSeedDataByTypeUG();
        $Jobs_seed_data_PG = $this->job_service->getJobSeedDataByTypePG();
        $Jobs_seed_data_DR = $this->job_service->getJobSeedDataByTypeDR();
        $Jobs_seed_data_Industry = $this->job_service->getJobIndustry();
        $Jobs_seed_data_Current_Position = $this->job_service->getJobCurrentPosition();
        $Currency = $this->location_service->getCurrency();

        $Country = $this->location_service->getCountry();

        $Job = $this->job_service->getJobWithId($request);
        $JobQualificationUG = $this->job_service->getJobQualificationWithIdUG($request);
        $JobQualificationPG = $this->job_service->getJobQualificationWithIdPG($request);
        $JobQualificationDOCTORATE = $this->job_service->getJobQualificationWithIdDOCTORATE($request);
        $data = $this->job_service->getSchoolsLists();
        if (!empty($data)) {
            $schools = json_decode((string) $data, true);
            $school_list = $schools['schools'];
            //print_r($school_list); die();
            $JobLocation = $this->job_service->getJobLocationWithId($request);
            $functional_area = $Job[0]->functional_area;
            if (!isset($functional_area)) {
                $functional_area = 0;
            }
            $JobRolesShowing = DB::select("SELECT * FROM `jobs_seed_data` WHERE `type` = 1003 AND `parent_id` = $functional_area ");
            $countryname = array();
            $statenames = array();
            for ($i = 0; $i < count($JobLocation); $i++) {
                $countryname[$i] = $this->location_service->getCountryByCounryID($JobLocation[$i]->countryid);
                $statenames[$i] = $this->location_service->getStateNameByStateID($JobLocation[$i]->countryid, $JobLocation[$i]->regionid);
            }
            $ContactdetailArray = json_decode($Job[0]->contact_details, true);
            $insertedPartners = $this->job_service->getjobboardmappingdata($id);
            $insertedPartnersarray = array();
            foreach ($insertedPartners as $insertedPartners) {
                array_push($insertedPartnersarray, $insertedPartners->boardid);
            }
            $job_type = $this->job_service->getjobtypes();
            //if(array_search(17,$insertedPartnersarray)!=null){echo "not";} die();
            Log::info('editsavedcampusrecruitement function Ended.');
            return view('editsavedcampusrecruitment', ['job_seed_data_types' => $job_seed_data_types, 'Jobs_seed_data_UG' => $Jobs_seed_data_UG, 'Jobs_seed_data_PG' => $Jobs_seed_data_PG, 'Jobs_seed_data_DR' => $Jobs_seed_data_DR, 'Jobs_seed_data_Industry' => $Jobs_seed_data_Industry, 'Currency' => $Currency, 'Country' => $Country, 'Jobs_seed_data_Functional_Area' => $Jobs_seed_data_Functional_Area, 'Jobs_seed_data_Role' => $Jobs_seed_data_Role, 'Jobs_seed_data_Current_Position' => $Jobs_seed_data_Current_Position, 'company_name' => $company_name, 'Job' => $Job, 'JobQualificationUG' => $JobQualificationUG, 'JobQualificationPG' => $JobQualificationPG, 'JobQualificationDOCTORATE' => $JobQualificationDOCTORATE, 'JobLocation' => $JobLocation, 'JobRolesShowing' => $JobRolesShowing, 'school_info' => $school_list, 'countryname' => $countryname, 'statenames' => $statenames, 'Jobs_RolesBy_Id' => $Jobs_RolesBy_Id, 'ContactdetailArray' => $ContactdetailArray, 'insertedPartnersarray' => $insertedPartnersarray, 'job_type' => $job_type]);
        } else {
            return redirect('/employer/');
        }
    }

    public function deletesavedjobsposting(Request $request) {
        Log::info('deletesavedjobsposting function Started.');
        $Deletejobresponse = $this->job_service->deletesavedjobwithid($request);
        // $savedjobsdata = $this->job_service->getSavedjobposting();
        // return view('savedjobpostings',['Deletejobresponse' => $Deletejobresponse, 'savedjobsdata' => $savedjobsdata]);
        session::put('delete_job_session', 1);
        Log::info('deletesavedjobsposting function Ended.');
        return redirect('/employer/savedjobposting');
    }

    public function Savedjobposting() {
        Log::info('Savedjobposting function Started.');
        Session::forget('recentjobid');
        $locations = array();
        $savedjobsdata = $this->job_service->getSavedjobposting();
        foreach ($savedjobsdata as $savedjob) {
            $locations[$savedjob->id] = $this->job_service->getlocationsofjob($savedjob->id);
        }
        $Currency = $this->location_service->getCurrency();
        
        $user = $this->user_service->getLoggedInUser();
        $Country = $this->location_service->getCountry();
        $savedJobs = $this->job_service->totalsavedJobs();
        $Applicants = $this->job_service->totalApplicant();
        $ActivePostedJobs = $this->job_service->totalActiveJobs();
        $employerlogoid = $this->job_service->getlogoidbylogedinuser();
        $employerlogo = $this->job_service->getlogobylogoid($employerlogoid[0]->logoid);
        $uuuserid = Auth::user()->uuid;
        Log::info('Savedjobposting function Ended.');
        return view('recruiter/savedjobpostings', ['savedjobsdata' => $savedjobsdata, 'locations' => $locations, 'Country' => $Country, 'Currency' => $Currency, 'user' => $user, 'savedJobs' => $savedJobs, 'Applicants' => $Applicants, 'ActivePostedJobs' => $ActivePostedJobs]);
    }

    public function searchsavedjobposting(Request $request) {
        Log::info('searchsavedjobposting function Started.');
        $Currency = $this->location_service->getCurrency();
        $Country = $this->location_service->getCountry();
        $locations = array();
        $savedjobsdata = $this->utility_services->getSavedjobpostingusingseach($request);
        foreach ($savedjobsdata as $savedjob) {
            $locations[$savedjob->id] = $this->job_service->getlocationsofjob($savedjob->id);
        }
        Log::info('searchsavedjobposting function Started.');
        return view('savedjobpostings', ['savedjobsdata' => $savedjobsdata, 'locations' => $locations, 'Country' => $Country, 'Currency' => $Currency]);
    }

    public function savedcampusrecruitements() {
        Log::info('savedcampusrecruitements function Started.');
        Session::forget('recentjobid');
        $locations = array();
        $savedcampusjobs = $this->job_service->getSavedCampusRecruitements();
        foreach ($savedcampusjobs as $savedrecrutement) {
            $locations[$savedrecrutement->id] = $this->job_service->getlocationsofjob($savedrecrutement->id);
        }
        $Currency = $this->location_service->getCurrency();

        $Country = $this->location_service->getCountry();
        Log::info('savedcampusrecruitements function Ended.');
        return view('savedcampusrecruitement', ['savedcampusjobs' => $savedcampusjobs, 'locations' => $locations, 'Country' => $Country, 'Currency' => $Currency]);
    }

    public function searchsavedcampusrecruitements(Request $request) {
        Log::info('searchsavedcampusrecruitements function Started.');
        Session::forget('recentjobid');
        $locations = array();
        $savedcampusjobs = $this->utility_services->getSavedCampusRecruitementsusingsearch($request);
        foreach ($savedcampusjobs as $savedrecrutement) {
            $locations[$savedrecrutement->id] = $this->job_service->getlocationsofjob($savedrecrutement->id);
        }
        $Currency = $this->location_service->getCurrency();

        $Country = $this->location_service->getCountry();
        Log::info('searchsavedcampusrecruitements function Ended.');
        return view('savedcampusrecruitement', ['savedcampusjobs' => $savedcampusjobs, 'locations' => $locations, 'Country' => $Country, 'Currency' => $Currency]);
    }

    public function Activejobopening() {
        Log::info('Activejobopening function Started.');
        Session::forget('recentjobid');
        $Activejobsdata = $this->job_service->getActivejobopening();
        $Totalapplicantcount = array();
        foreach ($Activejobsdata as $activejob) {
            $Totalapplicantcount[$activejob->id] = $this->jobseeker_service->getapplicantcountforjob($activejob->id);
        }
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
        
        $user = $this->user_service->getLoggedInUser();
        $savedJobs = $this->job_service->totalsavedJobs();
        $Applicants = $this->job_service->totalApplicant();
        $ActivePostedJobs = $this->job_service->totalActiveJobs();
        $employerlogoid = $this->job_service->getlogoidbylogedinuser();
        $employerlogo = $this->job_service->getlogobylogoid($employerlogoid[0]->logoid);
        $uuuserid = Auth::user()->uuid;
            
        Log::info('Activejobopening function Ended.');
        return view('recruiter/activejobopenings', ['Activejobsdata' => $Activejobsdata, 'Country' => $Country, 'Currency' => $Currency, 'Totalapplicantcount' => $Totalapplicantcount,
            'Jobs_seed_data_Functional_Area' => $Jobs_seed_data_Functional_Area,
            'Jobs_seed_data_Role' => $Jobs_seed_data_Role,
            'JobRolesShowing' => $JobRolesShowing,
            'JobQualificationUG' => $JobQualificationUG,
            'JobQualificationPG' => $JobQualificationPG,
            'JobQualificationDOCTORATE' => $JobQualificationDOCTORATE,
            'JobLocation' => $JobLocation,
            'JobCountries' => $JobCountries,
            'JobStates' => $JobStates,
            'JobApplications' => $JobApplications,
            'Jobs_seed_data_Industry' => $Jobs_seed_data_Industry, 'user' => $user, 'savedJobs' => $savedJobs, 'Applicants' => $Applicants, 'ActivePostedJobs' => $ActivePostedJobs]);
    }

    public function searchactivejobopening(Request $request) {
        Log::info('Activejobopening function Started.');
        Session::forget('recentjobid');
        $Activejobsdata = $this->utility_services->getActivejobopeningusingsearch($request);
        $Totalapplicantcount = array();
        foreach ($Activejobsdata as $activejob) {
            $Totalapplicantcount[$activejob->id] = $this->jobseeker_service->getapplicantcountforjob($activejob->id);
        }
        $Currency = $this->location_service->getCurrency();
        $Country = $this->location_service->getCountry();
        Log::info('Activejobopening function Ended.');
        return view('activejobopenings', ['Activejobsdata' => $Activejobsdata, 'Country' => $Country, 'Currency' => $Currency, 'Totalapplicantcount' => $Totalapplicantcount]);
    }

    public function activecampusrecruitement() {
        Log::info('activecampusrecruitement function Started.');
        Session::forget('recentjobid');
        $ActiveCampusRecruitementdata = $this->job_service->getActiveCampusRecruitement();
        $Currency = $this->location_service->getCurrency();
        $Country = $this->location_service->getCountry();
        Log::info('activecampusrecruitement function Ended.');
        return view('activecampusopening', ['ActiveCampusRecruitementdata' => $ActiveCampusRecruitementdata, 'Country' => $Country, 'Currency' => $Currency]);
    }

    public function searchactivecampusrecruitement(Request $request) {
        Log::info('searchactivecampusrecruitement function Started.');
        Session::forget('recentjobid');
        $ActiveCampusRecruitementdata = $this->utility_services->getActiveCampusRecruitementusingsearch($request);
        $Currency = $this->location_service->getCurrency();
        $Country = $this->location_service->getCountry();
        Log::info('searchactivecampusrecruitement function Ended.');
        return view('activecampusopening', ['ActiveCampusRecruitementdata' => $ActiveCampusRecruitementdata, 'Country' => $Country, 'Currency' => $Currency]);
    }

    public function Employerprofile() {
        Log::info('Employerprofile function Started.');
        $employerprofile = $this->user_service->getLoggedInEmployerProfile();
        $StateShowing = $this->location_service->getStateByCountryID($employerprofile[0]->countryid);
        $CityShowing = $this->location_service->getCityByStateID($employerprofile[0]->regionid);
        $Country = $this->location_service->getCountry();
        Log::info('Employerprofile function Ended.');
        return view('employerprofile', ['Country' => $Country, 'employerprofile' => $employerprofile, 'StateShowing' => $StateShowing, 'CityShowing' => $CityShowing]);
    }

    public function register_company(Request $request) {
        //echo "aghdvhvcdcddj"; die();
        Log::info('register_company function Started.');
        $Address = new Address;
        $uuid = UUID::v4();
        $Address->id = $uuid;

        $Address->pincode = $request->pincode;
        if (!empty($request->pincode)) {

            if (is_numeric(trim($request->pincode)) == false) {
                Session::flash('message', 'Please Enter valid Pincode!');
                Session::flash('alert-class', 'alert-danger');
                Log::info('register_company function Ended with error handler for pincode nonnumeric.');
                return redirect('/company_registration');
            }
        }
        $Address->addline1 = $request->Address;
        if (empty($request->Address)) {
            Session::flash('message', 'Please Enter Address!');
            Session::flash('alert-class', 'alert-danger');
            Log::info('register_company function Ended with error handler for Address empty.');
            return redirect('/company_registration');
        }
        $Employer = new Employer;
        $Employer->id = UUID::v4();
        $Employer->company_type = $request->companytype;
        if (empty($request->companytype)) {
            Session::flash('message', 'Please Select Company Type!');
            Session::flash('alert-class', 'alert-danger');
            Log::info('register_company function Ended with error handler for company type empty.');
            return redirect('/company_registration');
        }
        $Employer->addressid = $uuid;

        $Employer->website = $request->website;
        /* if (empty($request->website)) {
          Session::flash('message', 'Please Enter Website!');
          Session::flash('alert-class', 'alert-danger');
          Log::info('register_company function Ended with error handler for website empty.');
          return redirect('/company_registration');
          }
          else{
          if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$request->website)) {
          Session::flash('message', 'Please Enter valid value for Website!');
          Session::flash('alert-class', 'alert-danger');
          Log::info('register_company function Ended with error handler for website wrong format.');
          return redirect('/company_registration');
          }
          else{

          }
          } */
        $Employer->about = $request->About;
        if (empty($request->About)) {
            Session::flash('message', 'Please Enter About Company!');
            Session::flash('alert-class', 'alert-danger');
            Log::info('register_company function Ended with error handler for empty.');
            return redirect('/company_registration');
        }
        $Employer->createdts = \Carbon\Carbon::now()->toDateTimeString();
        $Employer->updatedts = \Carbon\Carbon::now()->toDateTimeString();
        $Employer->userid = Auth::user()->uuid;
        /* $Employer->estimated_vacancies = $request->estimatedvacancies;
          if (empty($request->estimatedvacancies)) {
          Session::flash('message', 'Please Enter Estimated Vacancies!');
          Session::flash('alert-class', 'alert-danger');
          Log::info('register_company function Ended with error handler for vacancies.');
          return redirect('/company_registration');
          }
          else{
          if(is_numeric(trim($request->estimatedvacancies)) == false){
          Session::flash('message', 'Please Enter valid value for estimatedvacancies!');
          Session::flash('alert-class', 'alert-danger');
          Log::info('register_company function Ended with error handler for vacancies nonnumeric value.');
          return redirect('/company_registration');
          }
          else{

          }
          } */
        //Users table data 
        $uuuserid = Auth::user()->uuid;
        $username = Auth::user()->name;
        $orderemail = Auth::user()->email;
        $companyname = ucwords($request->companyname);
        $companytype = $request->companytype;
        $urlimage = '';
        $ProfileImageName = '';

        /* $request->hasFile('employer_logo'); 
          if($request->hasFile('employer_logo')){
          $extimage = $request->employer_logo->getClientOriginalExtension();
          $ProfileImageName =  date('Y_m_d_H_i_s').'_'.$username.'.'.$extimage;
          $request->employer_logo->move(public_path('images/employer'), $ProfileImageName);

          //$urlimage = URL::to("/") .'/images/employer/'.$ProfileImageName;
          } */

        if (trim($request->emp_photo) != '') {
            $ProfileImageName = $request->emp_photo;
        }

        $image = new image;
        $employerlogo = UUID::v4();
        $image->id = $employerlogo;
        $image->path = $ProfileImageName;
        $image->save();

        $Employer->logoid = $employerlogo;

        DB::table('users')->where('uuid', $uuuserid)->update(['is_first_login' => '1', 'company' => $companyname, 'type' => $companytype, 'logoid' => $employerlogo]);
        $Address->save();
        $Employer->save();

        $data = array('name' => $username,
            'today' => date("m.d.y"),
            'company_Name' => $companyname
        );

        $subject = 'Successfully Registered With FoodLinked!';
        Mail::send('mail', $data, function ($message) use ($orderemail, $subject) {
            $message->to($orderemail)->subject($subject);
            $message->bcc(config('app.CC_MailID'));
        });
        Log::info('register_company function Ended.');
        return redirect('/employer');
    }

    protected function Createjob(Request $request) {
        Log::info('Createjob function Started.');
        
        if ($request->PAGENAME == 'EDIT') {
            echo 'yest its edit';
            Log::info('inside edit condition EDIT.');
            $JOBID = $request->JOBID;
            echo $JOBID;

            if ($request->condition == '1') {
                $validator = Validator::make($request->all(), [
                            //'Jobtitle' => 'required|max:255',
                            'Ccmpanyname' => 'required|max:300',
                            'annualminpkg' => 'required',
                            'annualmaxpkg' => 'required',
                            'EmailAddress' => 'required|email',
                            'Name' => 'required|string'
                ]);

                if ($validator->fails()) {

                    //pass validator errors as errors object for ajax response

                    return response()->json(['errors' => $validator->errors()]);
                    unset($request->PageName);
                }
            }

            $request->session()->put('recentjobid', $JOBID);
            echo "recentjob in edit";
            echo $request->session()->get('recentjobid');

            $this->job_service->updateJob($request);
            unset($request->PageName);
        } elseif ($request->PAGENAME == 'EDIT_CAMPUS') {
            echo 'yest its campus edit';
            Log::info('inside edit condition EDIT campus.');
            $JOBID = $request->JOBID;
            echo $JOBID;

            if ($request->condition == '1') {
                $validator = Validator::make($request->all(), [
                            //'Jobtitle' => 'required|max:255',
                            'job_type' => 'required|max:255|string',
                            'Ccmpanyname' => 'required|max:300',
                            'annualminpkg' => 'required',
                            'annualmaxpkg' => 'required',
                            'EmailAddress' => 'required|email',
                            'Name' => 'required|string'
                ]);

                if ($validator->fails()) {

                    //pass validator errors as errors object for ajax response
                    unset($request->PageName);
                    return response()->json(['errors' => $validator->errors()]);
                }
            }

            $request->session()->put('recentjobid', $JOBID);
            echo "recentjob in edit";
            echo $request->session()->get('recentjobid');

            $this->job_service->updateJob($request);
            unset($request->PageName);
        } elseif ($request->PAGENAME == 'CAMPUS') {
            Log::info('inside edit condition Campus.');
            if ($request->condition == '1') {
                $validator = Validator::make($request->all(), [
                            //'Jobtitle' => 'required|max:255',
                            'job_type' => 'required|max:255|string',
                            'Ccmpanyname' => 'required|max:300',
                            'annualminpkg' => 'required',
                            'annualmaxpkg' => 'required',
                            'EmailAddress' => 'required|email',
                            'Name' => 'required|string'
                ]);

                if ($validator->fails()) {
                    //pass validator errors as errors object for ajax response
                    return response()->json(['errors' => $validator->errors()]);
                }
            }
            //Log::info('-----------------------------'.$request);

            if ($request->session()->has('recentjobid')) {
                echo 'update tables only';
                Log::info('---------in update--------------------');
                echo $request->session()->get('recentjobid');
                $this->job_service->updateJob($request);
                //$request->session()->forget('recentjobid');
            } else {
                Log::info('---------in create--------------------');
                $this->job_service->createJob($request);
            }
        } else {
            Log::info('inside edit condition others.');
            if ($request->condition == '1') {
                $validator = Validator::make($request->all(), [
                            //'Jobtitle' => 'required|max:255',
                            'Ccmpanyname' => 'required|max:300',
                            'annualminpkg' => 'required',
                            'annualmaxpkg' => 'required',
                            'EmailAddress' => 'required|email',
                            'Name' => 'required|string'
                ]);

                if ($validator->fails()) {

                    //pass validator errors as errors object for ajax response

                    return response()->json(['errors' => $validator->errors()]);
                }
            }


            if ($request->session()->has('recentjobid')) {
                echo 'update tables only';
                echo $request->session()->get('recentjobid');
                $this->job_service->updateJob($request);
                //$request->session()->forget('recentjobid');
            } else {
                $this->job_service->createJob($request);
            }
        }
        Log::info('Createjob function Ended.');
    }

    public function respondCreated($message) {
        Log::info('respondCreated function Started.');
        //if you to return message to view or ajax process
        return response()->json(['message' => $message]);
        Log::info('respondCreated function Ended.');
    }

    public function memberavailability() {
        Log::info('memberavailability function Started.');
        $members = $this->job_service->getmemberavailability();
        //echo '<pre>';
        //PRINT_R($members);
        //exit;
        $members_availability = array();
        if (!empty($members)) {
            $member = json_decode((string) $members, true);
            if ($member['status'] == 1) {
                $members_availability = $member['members'];
            }
        }
        //PRINT_R($members_availability); DIE();

        Log::info('memberavailability function Ended.');
        return view('member_availability', ['members_availability' => $members_availability]);
    }

    public function member_availability_candidates($id, $city) {
        Log::info('member_availability_candidates function Started.');
        $members = $this->job_service->getcandidatesinmembers($id, $city);
        //PRINT_R($members); DIE();
        $members_availability = array();
        if (!empty($members)) {
            $member = json_decode((string) $members, true);
            if ($member['status'] == 1) {
                $members_availability = $member['orders'];
            }
        }
        //PRINT_R($members_availability); die();
        $EmployerId = $this->job_service->getemployeridbylogedinuser();
        $EmployerId = $EmployerId[0]->id;
        Log::info('member_availability_candidates function Ended.');
        return view('candidate_members', ['members_availability' => $members_availability, 'EmployerId' => $EmployerId]);
    }

    public function issued_offers() {
        Log::info('issued_offers function Started.');
        $issuedofferdata = $this->job_service->getissuedofferdata();
        //print_r($issuedofferdata); die();
        $issued_offerdata = array();
        if (!empty($issuedofferdata)) {
            $issuedoffers = json_decode((string) $issuedofferdata, true);
            if ($issuedoffers['status'] == 'true') {
                $issued_offerdata = $issuedoffers['orders'];
            }
        }
        // $EmployerId = $this->job_service->getemployeridbylogedinuser();
        // $EmployerId = "'".$EmployerId[0]->id."'";
        Log::info('issued_offers function Ended.');
        return view('IssuedOffers', ['issued_offerdata' => $issued_offerdata]);
    }

    public function postsubmitoffer(Request $request) {
        Log::info('postsubmitoffer function Started.');
        $this->job_service->postsubmitoffer($request);
        Log::info('postsubmitoffer function Ended.');
        return redirect('/employer/issued_offers');
    }

    public function changestatustowithdraw(Request $request) {
        Log::info('changestatustowithdraw function Started.');
        $response = $this->job_service->updatestatustowithdraw($request);
        Log::info('changestatustowithdraw function Ended.');
        return redirect('/employer/issued_offers');
    }

    public function changeoffer(Request $request) {
        Log::info('changeoffer function Started.');
        $response = $this->job_service->updatememberoffer($request);
        Log::info('changeoffer function Ended.');
        return redirect('/employer/issued_offers');
    }

    public function assigntesttojs($request) {
        Log::info('assigntesttojs function Started.');
        $responseurl = $this->job_service->AssignTestToJobseeker($request);
        Log::info('assigntesttojs function Ended.');
        return redirect('/employer/candidateinformation');
    }

    public function assesmenttestandvideointerview() {
        Log::info('CandidateInformation function Started.');
        //$CandidateAppliedForJobs = $this->job_service->getCandidateApplications();
        Log::info('CandidateInformation function Ended.');
        return view('assessment_and_video_interview');
    }

    public function deactivatejobsposting(Request $request) {
        Log::info('deactivatejobsposting function Started.');
        //$Deletejobresponse = $this->job_service->deletesavedjobwithid($request);
        $Deletejobresponse = $this->job_service->deactivatesavedjobwithid($request);
        // $savedjobsdata = $this->job_service->getSavedjobposting();
        // return view('savedjobpostings',['Deletejobresponse' => $Deletejobresponse, 'savedjobsdata' => $savedjobsdata]);
        session::put('delete_job_session', 1);
        Log::info('deactivatejobsposting function Ended.');
        return redirect('/employer/activejobopening');
    }

    public function deleteactivejobsposting(Request $request) {
        Log::info('deleteactivejobsposting function Started.');
        $Deletejobresponse = $this->job_service->deletesavedjobwithid($request);
        // $savedjobsdata = $this->job_service->getSavedjobposting();
        // return view('savedjobpostings',['Deletejobresponse' => $Deletejobresponse, 'savedjobsdata' => $savedjobsdata]);
        session::put('delete_job_session', 1);
        Log::info('deleteactivejobsposting function Ended.');
        return redirect('/employer/activejobopening');
    }

    public function PostToJobBoards() {
        Log::info('Savedjobposting function Started.');
        Session::forget('recentjobid');
        $locations = array();
        $savedjobsdata = $this->job_service->getSavedjobposting();
        foreach ($savedjobsdata as $savedjob) {
            $locations[$savedjob->id] = $this->job_service->getlocationsofjob($savedjob->id);
        }
        $Currency = $this->location_service->getCurrency();
        $Country = $this->location_service->getCountry();
        Log::info('Savedjobposting function Ended.');
        return view('posttojobboards', ['savedjobsdata' => $savedjobsdata, 'locations' => $locations, 'Country' => $Country, 'Currency' => $Currency]);
    }

    public function InActivejobopening() {
        Log::info('Activejobopening function Started.');
        Session::forget('recentjobid');
        $Activejobsdata = $this->job_service->getInActivejobopening();
        $Totalapplicantcount = array();
        foreach ($Activejobsdata as $activejob) {
            $Totalapplicantcount[$activejob->id] = $this->jobseeker_service->getapplicantcountforjob($activejob->id);
        }
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

        Log::info('Activejobopening function Ended.');
        return view('inactivejobopenings', ['Activejobsdata' => $Activejobsdata, 'Country' => $Country, 'Currency' => $Currency, 'Totalapplicantcount' => $Totalapplicantcount,
            'Jobs_seed_data_Functional_Area' => $Jobs_seed_data_Functional_Area,
            'Jobs_seed_data_Role' => $Jobs_seed_data_Role,
            'JobRolesShowing' => $JobRolesShowing,
            'JobQualificationUG' => $JobQualificationUG,
            'JobQualificationPG' => $JobQualificationPG,
            'JobQualificationDOCTORATE' => $JobQualificationDOCTORATE,
            'JobLocation' => $JobLocation,
            'JobCountries' => $JobCountries,
            'JobStates' => $JobStates,
            'JobApplications' => $JobApplications,
            'Jobs_seed_data_Industry' => $Jobs_seed_data_Industry]);
    }

    public function recreatejobsposting($id, Request $request) {
        Log::info('editsavedjobsposting function Started.');
        $Jobs_seed_data_Functional_Area = $this->job_service->getJobFunctionalArea();
        $Jobs_seed_data_Role = $this->job_service->getJobRole();
        for ($i = 0; $i < count($Jobs_seed_data_Functional_Area); $i++) {
            $Jobs_RolesBy_Id[$Jobs_seed_data_Functional_Area[$i]->id] = $this->job_service->getJobRolesByFunctionalArea($Jobs_seed_data_Functional_Area[$i]->id);
        }
        $company_name = Auth::user()->company;
        $job_seed_data_types = $this->job_service->getJobSeedDataTypes();
        $Jobs_seed_data_UG = $this->job_service->getJobSeedDataByTypeUG();
        $Jobs_seed_data_PG = $this->job_service->getJobSeedDataByTypePG();
        $Jobs_seed_data_DR = $this->job_service->getJobSeedDataByTypeDR();
        $Jobs_seed_data_Industry = $this->job_service->getJobIndustry();
        $Jobs_seed_data_Current_Position = $this->job_service->getJobCurrentPosition();
        $Currency = $this->location_service->getCurrency();

        $Country = $this->location_service->getCountry();

        $Job = $this->job_service->getJobWithId($request);
        $JobQualificationUG = $this->job_service->getJobQualificationWithIdUG($request);
        $JobQualificationPG = $this->job_service->getJobQualificationWithIdPG($request);
        $JobQualificationDOCTORATE = $this->job_service->getJobQualificationWithIdDOCTORATE($request);
        $job_boards_data = $this->job_service->getJobboards();
        $JobLocation = $this->job_service->getJobLocationWithId($request);
        $functional_area = $Job[0]->functional_area;
        if (!isset($functional_area)) {
            $functional_area = 0;
        }
        $JobRolesShowing = DB::select("SELECT * FROM `jobs_seed_data` WHERE `type` = 1003 AND `parent_id` = $functional_area ");
        $countryname = array();
        $statenames = array();
        for ($i = 0; $i < count($JobLocation); $i++) {
            $countryname[$i] = $this->location_service->getCountryByCounryID($JobLocation[$i]->countryid);
            $statenames[$i] = $this->location_service->getStateNameByStateID($JobLocation[$i]->countryid, $JobLocation[$i]->regionid);
        }
        $ContactdetailArray = json_decode($Job[0]->contact_details, true);
        $insertedboards = $this->job_service->getjobboardmappingdata($id);
        $insertedboardarray = array();
        foreach ($insertedboards as $insertedboards) {
            array_push($insertedboardarray, $insertedboards->boardid);
        }
        //echo array_search("5",$insertedboardarray); die();
        //print_r(); die();
        Log::info('editsavedjobsposting function Ended.');
        return view('recreatejob', ['job_seed_data_types' => $job_seed_data_types, 'Jobs_seed_data_UG' => $Jobs_seed_data_UG, 'Jobs_seed_data_PG' => $Jobs_seed_data_PG, 'Jobs_seed_data_DR' => $Jobs_seed_data_DR, 'Jobs_seed_data_Industry' => $Jobs_seed_data_Industry, 'Currency' => $Currency, 'Country' => $Country, 'Jobs_seed_data_Functional_Area' => $Jobs_seed_data_Functional_Area, 'Jobs_seed_data_Role' => $Jobs_seed_data_Role, 'Jobs_seed_data_Current_Position' => $Jobs_seed_data_Current_Position, 'company_name' => $company_name, 'Job' => $Job, 'JobQualificationUG' => $JobQualificationUG, 'JobQualificationPG' => $JobQualificationPG, 'JobQualificationDOCTORATE' => $JobQualificationDOCTORATE, 'JobLocation' => $JobLocation, 'JobRolesShowing' => $JobRolesShowing, 'job_boards_data' => $job_boards_data, 'countryname' => $countryname, 'statenames' => $statenames, 'Jobs_RolesBy_Id' => $Jobs_RolesBy_Id, 'ContactdetailArray' => $ContactdetailArray, 'insertedboardarray' => $insertedboardarray]);
    }

    public function jobApplicants($id, Request $request) {
        Log::info('CandidateInformation function Started.');
        $user = $this->user_service->getLoggedInUser();
        $savedJobs = $this->job_service->totalsavedJobs();
        $Applicants = $this->job_service->totalApplicant();
        $ActivePostedJobs = $this->job_service->totalActiveJobs();
        $employerlogoid = $this->job_service->getlogoidbylogedinuser();
        $employerlogo = $this->job_service->getlogobylogoid($employerlogoid[0]->logoid);
        $uuuserid = Auth::user()->uuid;
        $CandidateAppliedForJobs = $this->job_service->getJobApplicants($id);
        //echo '<pre>';
        //print_r($CandidateAppliedForJobs);
        //exit;
        Log::info('CandidateInformation function Ended.');
        return view('recruiter/candidateinformation', ['CandidateAppliedForJobs' => $CandidateAppliedForJobs, 'user' => $user, 'savedJobs' => $savedJobs, 'Applicants' => $Applicants, 'ActivePostedJobs' => $ActivePostedJobs]);
    }
    
    public function jobseekerprofileprint($id, Request $request) {
        Log::info('jobseekerprofileprint function Started.');
        $jsid = explode('&&', $id);
        $id = $jsid[0];
        $postaction = $jsid[1];
        $jobid = $jsid[2];
        $jsAssignedTest = $this->job_service->getAssignmentTestOfJsForJob($id, $jobid);
        $jsprofile = $this->jobseeker_service->JobSeekerProfileView($id);
        $js_qualification = $this->jobseeker_service->job_seeker_qualification($id);
        $js_experience = $this->jobseeker_service->job_seeker_experience($id);
        $js_projects = $this->jobseeker_service->job_seeker_project_detail($id);
        $js_job_pref = $this->jobseeker_service->job_seeker_job_pref($id);
        $js_application = $this->job_service->getCandidateApplicationInfo($id, $jobid);
        $js_at_questions = $this->job_service->getAssignedAT($id, $jobid);
        $js_vi_questions = $this->job_service->getAssignedVI($id, $jobid);
        $test_category = $this->job_service->get_test_category();
        $Country = $this->location_service->getCountry();
        $user = $this->user_service->getLoggedInUser();
		$savedJobs = $this->job_service->totalsavedJobs();
        $Applicants = $this->job_service->totalApplicant();
        $ActivePostedJobs = $this->job_service->totalActiveJobs();
        $employerlogoid = $this->job_service->getlogoidbylogedinuser();
        $employerlogo = $this->job_service->getlogobylogoid($employerlogoid[0]->logoid);
        $uuuserid = Auth::user()->uuid;
        //echo '<pre>';
        //print_r($js_vi_questions);
        //exit;
        
        $data = [
          'title' => 'First PDF for Medium',
          'heading' => 'Hello from 99Points.info',
          'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'        
            ];
        
        $pdf = PDF::loadView('recruiter/printjobseekerprofile', $data);  
        return $pdf->download('medium.pdf');
        
        Log::info('jobseekerprofileprint function Ended.');
        //return view('recruiter/printjobseekerprofile', ['id' => $id, 'jobid' => $jobid, 'at_list' => $js_at_questions, 'vi_list' => $js_vi_questions, 'jsapplication' => $js_application, 'jsprofile' => $jsprofile, 'js_qualification' => $js_qualification, 'js_experience' => $js_experience, 'js_projects' => $js_projects, 'js_job_pref' => $js_job_pref, 'postaction' => $postaction, 'test_category' => $test_category, 'Country' => $Country, 'jsAssignedTest' => $jsAssignedTest, 'user' => $user, 'savedJobs' => $savedJobs, 'Applicants' => $Applicants, 'ActivePostedJobs' => $ActivePostedJobs]);
    }
    
    protected function updateCandidateStatus(Request $request) {
        Log::info('updateCandidateStatus in controller function Started.');

        /*if ($request->shortlisted != "0" || $request->shortlisted != "1") {
                $validator = Validator::make($request->all(), [
                    'candidate_id' => 'required|max:255',
                    'job_id' => 'required|max:255',
                    'shortlisted' => 'required']);

            if ($validator->fails()) {
                //pass validator errors as errors object for ajax response
                return response()->json(['errors' => $validator->errors()]);
                //unset($request->PageName);
            }
        }
        
        $dataInfo = $this->job_service->changeApplicationStatus($request);*/

        Log::info('updateCandidateStatus in controller function Ended.');
    }
    
    protected function updateStatues(Request $request) {
        Log::info('updateStatues in controller function Started.');
        if ($request->shortlisted != 0 || $request->shortlisted != 1) {
                $validator = Validator::make($request->all(), [
                    'candidate_id' => 'required|max:255',
                    'job_id' => 'required|max:255',
                    'shortlisted' => 'required']);

            if ($validator->fails()) {
                //pass validator errors as errors object for ajax response
                return response()->json(['errors' => $validator->errors()]);
                //unset($request->PageName);
            }
        }
        $dataInfo = $this->job_service->changeApplicationStatus($request);
        Log::info('updateStatues in controller function Ended.');
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

        $user = $this->user_service->getLoggedInUser();
        $savedJobs = $this->job_service->totalsavedJobs();
        $Applicants = $this->job_service->totalApplicant();
        $ActivePostedJobs = $this->job_service->totalActiveJobs();
        $employerlogoid = $this->job_service->getlogoidbylogedinuser();
        $employerlogo = $this->job_service->getlogobylogoid($employerlogoid[0]->logoid);
        $uuuserid = Auth::user()->uuid;
        
        Log::info('viewappliedjobdetails function Ended.');

        return view('recruiter/appliedjobview', ['savedJobs' => $savedJobs, 'Applicants' => $Applicants, 'ActivePostedJobs' => $ActivePostedJobs, 'countryname' => $countryname, 'Jobs_seed_data_Functional_Area' => $Jobs_seed_data_Functional_Area, 'Jobs_seed_data_Role' => $Jobs_seed_data_Role, 'Jobs_seed_data_Current_Position' => $Jobs_seed_data_Current_Position, 'Job' => $Job, 'JobQualificationUG' => $JobQualificationUG, 'JobQualificationPG' => $JobQualificationPG, 'JobQualificationDOCTORATE' => $JobQualificationDOCTORATE, 'JobLocation' => $JobLocation, 'JobRolesShowing' => $JobRolesShowing, 'statenames' => $statenames, 'ContactdetailArray' => $ContactdetailArray, 'appliedjoblist' => $appliedjoblist, 'jsAssignedTest' => $jsAssignedTest]);
    }



}
