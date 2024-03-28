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
use App\js_certificate_detail;
use App\Location;
use Auth;
use Mail;
use App\Services\JobServices;
use App\Services\UserServices;
use App\Services\UUID;
use App\Services\LocationServices;
use App\Services\APIServices;
use App\Services\JobSeekerServices;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Session;
use Storage;

class HomeController extends Controller
{
    protected $user_service;
    protected $location_service;
    protected $jobseeker_service;
    protected $job_service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->job_service = new JobServices();
        $this->location_service = new LocationServices();
        $this->user_service = new UserServices();
        $this->jobseeker_service = new JobSeekerServices();
        $this->api_services = new APIServices();
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        Log::info('authenticate function Started.');
        Log::info('authenticate function Ended.');
       return $this->user_service->redirect_user($request->role);
    }

/*
     * This is a master function for all the urls after logged in and then we will redirect to requested      * pages based on URL. 
     * Also checking whether user is logged in first time...
     */
    public function master($any, Request $request)
    {
        Log::info('master function Started.');
        $any = strtolower($any);
        switch ($any) {
            case "showstate":
                return $this->ShowState($request);
                break;
            case "showcity":
                return $this->ShowCity($request);
            case "showcityforjp":
                return $this->ShowCityForJP($request);
                break;
            case "showstatewithoption":
              return $this->showstatewithoption($request);
              break;
            case "showcitywithoption":
              return $this->showcitywithoption($request);
              break;
            case "showstateforsearch":
                return $this->ShowStateFroSearch($request);
                break;
            case "showcityforsearch":
                return $this->ShowCityFroSearch($request);
                break;
            case "showugstream":
                return $this->ShowUGStream($request);
            case "showugstreamforcj":
                return $this->ShowUGStreamForCj($request);
                break;
            case "showpgstream":
                return $this->ShowPGStream($request);
            case "showpgstreamforcj":
                return $this->ShowPGStreamForCj($request);
                break;
            case "showdoctoratestream":
                return $this->ShowDoctorateStream($request);
            case "showdoctoratestreamforcj":
                return $this->ShowDoctorateStreamForCj($request);
                break;
            case "addressstate":
                return $this->Addressstate($request);
                break;
            case "functionaljobrole":
                return $this->ShowJobRole($request);
                break;
            case "showcourse":
                return $this->ShowCourse($request);
                break;
            case "showstream":
                return $this->ShowStream($request);
                break;  
            case "uploadimg":
                return $this->uploadImg($request); 
                break;
            case "uploadjsimg":
                return $this->uploadJsImg($request); 
                break;
            case "activecampusjson":
                return $this->activecampusjson(); 
                break;
            case "gettestnames":
              return $this->gettestnames($request);
              break;
            case "gettestdescription":
              return $this->gettestdescription($request);
              break;
            case "showwithdrawmodel":
              return $this->showwithdrawmodel($request);
              break;
            case "showreoffermodel":
              return $this->showreoffermodel($request);
              break;

            default: return '';      
    }
}

public function profileMaster($any, Request $request)
{
    Log::info('profileMaster function Started.');
    $any = strtolower($any);
    switch ($any) {
        case "profile":
            return $this->JobSeekerProfile();
            break;
        case "editjobseekerpersonalprofile":
            return $this->editjobseekerpersonalprofile($request);
            break;
        case "addjobseekereducationalprofile":
            return $this->addjobseekereducationalprofile($request);
            break;
        case "addjobseekerexperienceprofile":
            return $this->addjobseekerexperienceprofile($request);
            break;
        case "addjobseekerprojectdetails":
            return $this->addjobseekerprojectdetails($request);
            break;
        case "opendeditqualificationmodel":
            return $this->opendeditqualificationmodel($request);
            break;
        case "openjsexperienceeditmodel":
            return $this->openjsexperienceeditmodel($request);
            break;
        case "editjobseekereducationalprofile":
            return $this->editjobseekereducationalprofile($request);
            break; 
        case "editjobseekerexperienceprofile":
            return $this->editjobseekerexperienceprofile($request);
            break;
        case "openjseditprojectdetailmodel":
            return $this->openjseditprojectdetailmodel($request);
            break;
        case "editjobseekerprojectdetails":
          return $this->editjobseekerprojectdetails($request);
            break;
        case "addjobseekercertificatedetails":
          return $this->addjobseekercertificatedetails($request);
          break;
        case "openjseditcertificatedetailmodel":
          return $this->openjseditcertificatedetailmodel($request);
          break;
        case "editjobseekercertificatedetails":
          return $this->editjobseekercertificatedetails($request);
          break;
        default: return '';      
    }
}

// Function for showing the state data country wise

public function sendmail(){
Log::info('sendmail function Started.');
$orderemail = "ankitjain@ssism.org";
Mail::send(['text' => 'mailJobFinishing'], ['name', config('app.name')], function ($message) use ($orderemail) {
$message->from(config('app.From_MailID'), config('app.name'));
$message->to($orderemail);
$message->cc(config('app.CC_MailID'));
});
Log::info('sendmail function Ended.');
}
public function ShowState(Request $request)
{
    Log::info('ShowState function Started.');
    $Country = $request->Country;
    //$Country = $request->Country;
    $StateShowing = $this->location_service->getStateByCountryID($Country);
   
    Log::info('ShowState function Ended.');
    //  $StateShowing = 
 return view('showstate', ['StateShowing' => $StateShowing]);
}

public function showstatewithoption(Request $request)
{
    Log::info('StateShowingWithOption function Started.');
    $Country = $request->Country;
    $StateShowing = $this->location_service->getStateByCountryID($Country);
   
    Log::info('StateShowingWithOption function Ended.');
    //  $StateShowing = 
 return view('ShowStateWithOption', ['StateShowing' => $StateShowing,'option' => $request->option]);
}
//function to show states without required
public function ShowStateFroSearch(Request $request)
{
    Log::info('ShowStateForSearch function Started.');
    $Country = $request->Country;
    $StateShowing = $this->location_service->getStateByCountryID($Country);
   
    Log::info('ShowStateForSearch function Ended.');
    //  $StateShowing = 
 return view('showstatewithoutrequired', ['StateShowing' => $StateShowing]);
}
// Function for showing the city data state wise
public function ShowCity(Request $request)
{
    Log::info('ShowCity function Started.');
    $State = $request->State;
    $CityShowing = $this->location_service->getCityByStateID($State);
   //print_r($CityShowing); die();
    Log::info('ShowCity function Ended.');
    //  $StateShowing = 
 return view('showcity', ['CityShowing' => $CityShowing]);
}

public function ShowCityForJP(Request $request)
{
    Log::info('ShowCity function Started.');
    $State = $request->State;
    $CityShowing = $this->location_service->getCityByStateID($State);
   //print_r($CityShowing); die();
    Log::info('ShowCity function Ended.');
    //  $StateShowing = 
 return view('showcityForJP', ['CityShowing' => $CityShowing]);
}

public function showcitywithoption(Request $request)
{
    Log::info('showcitywithoption function Started.');
    $State = $request->State;
    $CityShowing = $this->location_service->getCityByStateID($State);
   //print_r($CityShowing); die();
    Log::info('showcitywithoption function Ended.');
    //  $StateShowing = 
 return view('ShowCityWithOption', ['CityShowing' => $CityShowing,'option' => $request->option]);
}
//function to show city without required
public function ShowCityFroSearch(Request $request)
{
    Log::info('ShowCityFroSearch function Started.');
    $State = $request->State;
    $CityShowing = $this->location_service->getCityByStateID($State);
   //print_r($CityShowing); die();
    Log::info('ShowCityFroSearch function Ended.');
    //  $StateShowing = 
 return view('showcitywithoutrequired', ['CityShowing' => $CityShowing]);
}
// Function for showing the UG Stream data Subject wise
public function ShowUGStream(Request $request)
{
    Log::info('ShowUGStream function Started.');
    $UGCourse = $request->UGCourse;
    //print_r($UGCourse); die();
    $UGCOURSEID = Jobs_seed_data::where('value', '=', $UGCourse)->where('parent_id', '=', '-1')->first()->id;
   // print_r($UGCOURSEID);

    $UGStreamShowing = DB::select("SELECT * FROM `jobs_seed_data` WHERE `type` = 1004 AND `parent_id` = $UGCOURSEID ");
   // print_r($UGStreamShowing);
Log::info('ShowUGStream function Ended.');
    return view('ugstream', ['UGStreamShowing' => $UGStreamShowing]);
}

public function ShowUGStreamForCj(Request $request)
{
    Log::info('ShowUGStream function Started.');
    $UGCourse = $request->UGCourse;
    //print_r($UGCourse); die();
    $UGCOURSEID = Jobs_seed_data::where('value', '=', $UGCourse)->where('parent_id', '=', '-1')->first()->id;
   // print_r($UGCOURSEID);

    $UGStreamShowing = DB::select("SELECT * FROM `jobs_seed_data` WHERE `type` = 1004 AND `parent_id` = $UGCOURSEID ");
   // print_r($UGStreamShowing);
Log::info('ShowUGStream function Ended.');
    return view('ugstreamforcj', ['UGStreamShowing' => $UGStreamShowing]);
}


// Function for showing the PG Stream data Subject wise
public function ShowPGStream(Request $request) {
    Log::info('ShowPGStream function Started.');
    $PGCourse = $request->PGCourse;
    $PGCOURSEID = Jobs_seed_data::where('value', '=', $PGCourse)->where('parent_id', '=', '-1')->first()->id;
    $PGStreamShowing = DB::select("SELECT * FROM `jobs_seed_data` WHERE `type` = 1005 AND `parent_id` = $PGCOURSEID ");
    Log::info('ShowPGStream function Ended.');
    return view('pgstream', ['PGStreamShowing' => $PGStreamShowing]);
}

public function ShowPGStreamForCj(Request $request) {
    Log::info('ShowPGStream function Started.');
    $PGCourse = $request->PGCourse;
    $PGCOURSEID = Jobs_seed_data::where('value', '=', $PGCourse)->where('parent_id', '=', '-1')->first()->id;
    $PGStreamShowing = DB::select("SELECT * FROM `jobs_seed_data` WHERE `type` = 1005 AND `parent_id` = $PGCOURSEID ");
    Log::info('ShowPGStream function Ended.');
    return view('pgstreamforcj', ['PGStreamShowing' => $PGStreamShowing]);
}


// Function for showing the Doctorate Stream data Subject wise
public function ShowDoctorateStream(Request $request) {
    Log::info('ShowDoctorateStream function Started.');
    $DoctorateCourse = $request->DoctorateCourse;
    $DoctorateCOURSEID = Jobs_seed_data::where('value', '=', $DoctorateCourse)->where('parent_id', '=', '-1')->first()->id;
    $DoctorateStreamShowing = DB::select("SELECT * FROM `jobs_seed_data` WHERE `type` = 1006 AND `parent_id` = $DoctorateCOURSEID ");
    Log::info('ShowDoctorateStream function Ended.');
    return view('doctoratestream', ['DoctorateStreamShowing' => $DoctorateStreamShowing]);
}

public function ShowDoctorateStreamForCj(Request $request) {
    Log::info('ShowDoctorateStream function Started.');
    $DoctorateCourse = $request->DoctorateCourse;
    $DoctorateCOURSEID = Jobs_seed_data::where('value', '=', $DoctorateCourse)->where('parent_id', '=', '-1')->first()->id;
    $DoctorateStreamShowing = DB::select("SELECT * FROM `jobs_seed_data` WHERE `type` = 1006 AND `parent_id` = $DoctorateCOURSEID ");
    Log::info('ShowDoctorateStream function Ended.');
    return view('doctoratestreamforcj', ['DoctorateStreamShowing' => $DoctorateStreamShowing]);
}



 // Function for showing the Doctorate Stream data Subject wise
public function Addressstate(Request $request)
{
    Log::info('Addressstate function Started.');
    $Country = $request->Country;
    $StateShowing = DB::select("SELECT * FROM `location` WHERE `location_type` = 1 AND `parent_id` = $Country ");
    Log::info('Addressstate function Ended.');
    return view('showaddstate', ['StateShowing' => $StateShowing]);
}

// Function for showing the state data country wise
public function ShowJobRole(Request $request)
{
    Log::info('ShowJobRole function Started.');
    $FunctionalArea = $request->FunctionalArea;
    $JobRolesShowing = DB::select("SELECT * FROM `jobs_seed_data` WHERE `type` = 1003 AND `parent_id` = $FunctionalArea ");
    Log::info('ShowJobRole function Ended.');
    return view('showjobroles', ['JobRolesShowing' => $JobRolesShowing]);
}

// show course according type
public function ShowCourse(Request $request)
{
   Log::info('ShowCourse function Started.');
   $typeofeducation = $request->typeofeducation;
   $op_type = $request->op_type; //echo $op_type; die();
   $TYPE = Jobs_seed_data_type::where('value', '=', $typeofeducation)->first()->id;
   $CourseShowing = DB::select("SELECT * FROM `jobs_seed_data` WHERE `type` = $TYPE AND `parent_id` = -1 ");
  // print_r($UGStreamShowing);
    Log::info('ShowCourse function Ended.');
   return view('showcourse', ['CourseShowing' => $CourseShowing,'op_type' =>$op_type]);
}
// show educational stream of cources
public function ShowStream(Request $request)
{
   Log::info('ShowStream function Started.');
   $typeofeducation = $request->typeofeducation;
   $courseName = $request->courseName;
   $TYPE = Jobs_seed_data_type::where('value', '=', $typeofeducation)->first()->id;
   $COURSEID = Jobs_seed_data::where('value', '=', $courseName)->where('parent_id', '=', '-1')->first()->id;
   $StreamShowing = DB::select("SELECT * FROM `jobs_seed_data` WHERE `type` = $TYPE  AND `parent_id` = $COURSEID ");
   Log::info('ShowStream function Ended.');
   return view('showstream', ['StreamShowing' => $StreamShowing]);
}

//profile functions
public function JobSeekerProfile()
{
    Log::info('JobSeekerProfile function Started.');
    $id = $this->jobseeker_service->getjobseekeridbylogedinuser();
    $id = $id[0]->id;
    $jobseekerpersonaldata = $this->jobseeker_service->JobSeekerProfileView($id);
    $js_qualification = $this->jobseeker_service->job_seeker_qualification($id);
    $js_experience = $this->jobseeker_service->job_seeker_experience($id);
 
    $js_projects = $this->jobseeker_service->job_seeker_project_detail($id);
    $js_job_pref = $this->jobseeker_service->job_seeker_job_pref($id);
    $js_certificates = $this->jobseeker_service->job_seeker_job_certificate($id);

    $StateShowing = $this->location_service->getStateByCountryID($jobseekerpersonaldata[0]->countryid);
    $CityShowing = $this->location_service->getCityByStateID($jobseekerpersonaldata[0]->regionid);
    $Country = $this->location_service->getCountry();
    $Jobs_seed_data_Current_Position = $this->job_service->getJobCurrentPosition();

    Log::info('JobSeekerProfile function Ended.');
    
    return view('job_seeker/profile',['Country' => $Country,'jobseekerpersonaldata' => $jobseekerpersonaldata, 'js_qualification' => $js_qualification , 'js_experience' => $js_experience , 'js_projects' => $js_projects , 'js_job_pref' => $js_job_pref,'StateShowing' => $StateShowing,'CityShowing' => $CityShowing,'Jobs_seed_data_Current_Position'=>$Jobs_seed_data_Current_Position,'js_certificates'=>$js_certificates]);
}

public function editjobseekerpersonalprofile(Request $request){

    Log::info('editjobseekerpersonalprofile function Started.');
     $editjobseekerpersonalprofile =  $this->jobseeker_service->edit_jobseekerpersonalprofile($request);
     if(strlen($editjobseekerpersonalprofile)>0){
         Session::flash('message', $editjobseekerpersonalprofile);
          Session::flash('alert-class', 'alert-danger');
      }
      Log::info('editjobseekerpersonalprofile function Ended.');
      return redirect('/home/profile');  
  }
  
  public function addjobseekereducationalprofile(Request $request){
      Log::info('editjobseekereducationalprofile function Started.');
         $addjobseekereducationalprofile =  $this->jobseeker_service->add_jobseekereducationalprofile($request);
         if(strlen($addjobseekereducationalprofile)>0){
             Session::flash('message', $addjobseekereducationalprofile);
              Session::flash('alert-class', 'alert-danger');
          }
          Log::info('addjobseekereducationalprofile function Ended.');
          return redirect('/home/profile'); 
  }
  
  public function addjobseekerexperienceprofile(Request $request){
      Log::info('addjobseekerexperienceprofile function Started.');
      //print_r('addjobseekerexperienceprofile function Started.'); die();
         $addjobseekerexperienceprofile =  $this->jobseeker_service->add_jobseekerexperienceprofile($request);
         if(strlen($addjobseekerexperienceprofile)>0){
             Session::flash('message', $addjobseekerexperienceprofile);
              Session::flash('alert-class', 'alert-danger');
          }
          Log::info('addjobseekerexperienceprofile function Ended.');
          return redirect('/home/profile'); 
  }
  public function addjobseekercertificatedetails(Request $request){
      Log::info('addjobseekercertificatedetails function Started.');
      //print_r('addjobseekerexperienceprofile function Started.'); die();
         $addjobseekercertificateprofile =  $this->jobseeker_service->add_jobseekercertificateprofile($request);
         if(strlen($addjobseekercertificateprofile)>0){
             Session::flash('message', $addjobseekercertificateprofile);
              Session::flash('alert-class', 'alert-danger');
          }
          Log::info('addjobseekercertificatedetails function Ended.');
          return redirect('/home/profile'); 
  }
  public function editjobseekerexperienceprofile(Request $request){
      Log::info('addjobseekerexperienceprofile function Started.');
      //print_r('editjobseekerexperienceprofile function Started.'); die();
         $editjobseekerexperienceprofile =  $this->jobseeker_service->edit_jobseekerexperienceprofile($request);
         if(strlen($editjobseekerexperienceprofile)>0){
             Session::flash('message', $editjobseekerexperienceprofile);
              Session::flash('alert-class', 'alert-danger');
          }
          Log::info('editjobseekerexperienceprofile function Ended.');
          return redirect('/home/profile'); 
  }

  public function editjobseekerprojectdetails(Request $request){
      Log::info('editjobseekerprojectdetails function Started.');
         $editjobseekerprojectprofileresponse =  $this->jobseeker_service->edit_jobseekerprojectdetailinprofile($request);
         if(strlen($editjobseekerprojectprofileresponse)>0){
             Session::flash('message', $editjobseekerprojectprofileresponse);
              Session::flash('alert-class', 'alert-danger');
          }
          Log::info('editjobseekerprojectdetails function Ended.');
          return redirect('/home/profile'); 

  }

  public function editjobseekercertificatedetails(Request $request){
      Log::info('editjobseekercertificatedetails function Started.');
         $editjobseekercertificateprofileresponse =  $this->jobseeker_service->edit_jobseekercertificatedetailinprofile($request);
         if(strlen($editjobseekercertificateprofileresponse)>0){
             Session::flash('message', $editjobseekercertificateprofileresponse);
              Session::flash('alert-class', 'alert-danger');
          }
          Log::info('editjobseekercertificatedetails function Ended.');
          return redirect('/home/profile'); 

  }
  
  public function addjobseekerprojectdetails(Request $request){
      Log::info('addjobseekerprojectdetails function Started.');
         $editjobseekerprojectdetails =  $this->jobseeker_service->add_jobseekerprojectdetails($request);
         if(strlen($editjobseekerprojectdetails)>0){
             Session::flash('message', $editjobseekerprojectdetails);
              Session::flash('alert-class', 'alert-danger');
          }
          Log::info('addjobseekerprojectdetails function Ended.');
          return redirect('/home/profile'); 
  }
  
  
  public function editjobseekereducationalprofile(Request $request){
      Log::info('editjobseekereducationalprofile function Started.');
         $editjobseekereducationalprofile =  $this->jobseeker_service->edit_jobseekereducationalprofile($request);
         if(strlen($editjobseekereducationalprofile)>0){
             Session::flash('message', $editjobseekereducationalprofile);
              Session::flash('alert-class', 'alert-danger');
          }
          Log::info('editjobseekereducationalprofile function Ended.');
          return redirect('/home/profile'); 
  }

  public function opendeditqualificationmodel($request){
    $jsqualificationdata = $this->jobseeker_service->get_jsqualificationwithid($request->qualificationid);
    $coursebytype = $this->job_service->getCourseByType($jsqualificationdata[0]->education_type);
    $streambycoursetype = $this->job_service->getStreamByCourseType($jsqualificationdata[0]->course);
    $Country = $this->location_service->getCountry();
    $state = $this->location_service->getStateByCountryID($jsqualificationdata[0]->country);
    $city = $this->location_service->getCityByStateID($jsqualificationdata[0]->state);
    return view('job_seeker/editjsqualificationdetail', ['jsqualificationdata'=>$jsqualificationdata,'coursebytype'=>$coursebytype,'streambycoursetype'=>$streambycoursetype,'Country'=>$Country,'state'=>$state,'city'=>$city]);
}
public function openjsexperienceeditmodel($request){
    //echo $request->experienceid;exit;
    $jsexperiencedata = $this->jobseeker_service->get_jsexperiencewithid($request->experienceid);
    $Country = $this->location_service->getCountry();
    $Jobs_seed_data_Current_Position = $this->job_service->getJobCurrentPosition();
    return view('job_seeker/editjsexperiancedetail', ['Jobs_seed_data_Current_Position'=>$Jobs_seed_data_Current_Position,'Country'=>$Country,'jsexperiencedata'=>$jsexperiencedata]);

}
public function openjseditprojectdetailmodel($request){
  $jsprojectdata = $this->jobseeker_service->get_jsprojectwithid($request->projectid);
    $Country = $this->location_service->getCountry();
    $Jobs_seed_data_Current_Position = $this->job_service->getJobCurrentPosition();
    return view('job_seeker/editjsprojectdetail', ['Jobs_seed_data_Current_Position'=>$Jobs_seed_data_Current_Position,'Country'=>$Country,'jsprojectdata'=>$jsprojectdata]);
}
public function openjseditcertificatedetailmodel($request){
    $jscertificatedata = $this->jobseeker_service->get_jscertificatewithid($request->certificateid);
    return view('job_seeker/editjscertificatedetail', ['jscertificatedata'=>$jscertificatedata]);
}


public function uploadImg($request){
if(isset($_POST["image"]))
{
$data = $_POST["image"];
$image_array_1 = explode(";", $data);
$image_array_2 = explode(",", $image_array_1[1]);
$data = base64_decode($image_array_2[1]);
$imageName = time() . '.png';
//file_put_contents($imageName, $data);
Storage::put("employer/".$imageName, $data);
echo "<input type='hidden'  name ='emp_photo' value='".$imageName."' >";
$path = asset('storage/app/public/employer/'.$imageName);//Storage::disk('public')->path($imageName);
echo '<img src="'.$path.'" class="img-thumbnail" />';
}
}

public function uploadJsImg($request){
if(isset($_POST["image"]))
{
$data = $_POST["image"];
$image_array_1 = explode(";", $data);
$image_array_2 = explode(",", $image_array_1[1]);
$data = base64_decode($image_array_2[1]);
$imageName = time() . '.png';
//file_put_contents($imageName, $data);
Storage::put("jobseeker/".$imageName, $data);
echo "<input type='hidden'  name ='js_photo' value='".$imageName."' >";
$path = asset('storage/app/public/jobseeker/'.$imageName);//Storage::disk('public')->path($imageName);
echo '<img src="'.$path.'" class="img-thumbnail" />';
}
}

public function activecampusjson(){
  $this->api_services->get_active_recruitements_for_api();
}


public function gettestnames(Request $request)
{
   Log::info('gettestnames function Started.');
   $typeoftestcategory = $request->typeoftestcategory;
   $op_type = $request->op_type;
   $Testname = $this->job_service->gettestnameaccordingcategory($typeoftestcategory);
   //print_r($Testname); die();
   Log::info('gettestnames function Ended.');
   return view('ShowTestName', ['Testname' => $Testname,'op_type' => $op_type]);
}
public function gettestdescription($request){
  Log::info('gettestnames function Started.');
   $testid = $request->typeoftestname;
   $op_type = $request->op_type;
   $Testdescription = $this->job_service->gettestdescriptionbytestid($testid);
   //print_r($Testname); die();
   Log::info('gettestnames function Ended.');
   return $Testdescription;
}
public function showwithdrawmodel(Request $request){
  Log::info('showwithdrawmodel function Started.');
   $Employee_Id = $request->Employee_Id;
         $School_Id = $request->School_Id;
         $Intern_Id = $request->Intern_Id;
         $Country = $request->Country;
         $City = $request->City;
         $Start_Date = $request->Start_Date;
         $End_Date = $request->End_Date;
  Log::info('showwithdrawmodel function Ended.');
  return view('offer_withdraw', ['Employee_Id'=>$Employee_Id,'School_Id'=>$School_Id,'Intern_Id'=>$Intern_Id,'Country'=>$Country,'City'=>$City,'Start_Date'=>$Start_Date,'End_Date'=>$End_Date]);
}

public function showreoffermodel(Request $request){
  Log::info('showreoffermodel function Started.');
         $Employee_Id = $request->Employee_Id;
         $School_Id = $request->School_Id;
         $Intern_Id = $request->Intern_Id;
         $Country = $request->Country;
         $City = $request->City;
         $Start_Date = $request->Start_Date;
         $End_Date = $request->End_Date;
  Log::info('showreoffermodel function Ended.');
  return view('re_offer', ['Employee_Id'=>$Employee_Id,'School_Id'=>$School_Id,'Intern_Id'=>$Intern_Id,'Country'=>$Country,'City'=>$City,'Start_Date'=>$Start_Date,'End_Date'=>$End_Date]);
}

}
