<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Users_Role;
use App\Role;
use Auth;
use Mail;
use App\Services\Stub;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Services\UserServices;
use App\Services\UtilityServices;
use App\Notifications\UserNotifications;
use Illuminate\Support\Facades\Log;
use Session;
use Storage;
use App\Services\AssessmentTestServices;
use App\Services\APIServices;
use App\Services\JobServices;
use Ixudra\Curl\Facades\Curl;
class WelcomeController extends Controller
{
    protected $user_service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->user_service = new UserServices();
        $this->utility_services = new UtilityServices();
        $this->api_services = new APIServices();
        $this->job_service = new JobServices();
    }
    public function sendmail(){
        Log::info('sendmail function Started.');
        $orderemail = "ankitjain@ssism.org";
        Mail::send(['text' => 'mailJobFinishing'], ['name', config('app.name')], function ($message) use ($orderemail) {
        $message->subject("Hi! this is Ankit!!! this is test mail");
        $message->to($orderemail);
        $message->bcc(config('app.CC_MailID'));
        });
        Log::info('sendmail function Ended.');
    }

public function createJsonForJobs(){
    Log::info('createJsonForJobs function Started.');
    $jobids = DB::select("SELECT  jobid  FROM job_board_mapping   WHERE boardid = 2 and isactive = 1 and is_PostedOn_board = 0");
    foreach ($jobids as $jobids ) {
      // print_r($jobids->jobid);
       $jobsdata = $this->utility_services->createJsonForJobs($jobids->jobid);
        print_r($jobsdata); 
        $stub = new Stub("c50e8d062a0664ecca30c77f9df883c9d2d807d09a8a69f82b5658be7cbc9a58","appKey");
        $apiAddressPost="https://rms.naukri.com/v1/recruiterApi/requirements/8cUk0";
        $requirementData= $jobsdata;
        $stub->addRequirement($apiAddressPost, $requirementData, 1);
        DB::table('job_board_mapping')
        ->where('jobid', $jobids->jobid)
        ->where('isactive', 1)
        ->where('boardid', 2)
        ->update(['is_PostedOn_board' => 1]);

    }
   Log::info('createJsonForJobs function Ended.'); 
}
public function getnaukaridata(){
  $stub = new Stub("c50e8d062a0664ecca30c77f9df883c9d2d807d09a8a69f82b5658be7cbc9a58","appKey");
  $apiAddressget = "https://rms.naukri.com/v1/recruiterApi/b9Xmh";
  $response = Curl::to($apiAddressget)->get();
}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info('index function Started.');
        if(Auth::check()){
            return $this->user_service->authenticated();   
        }
        else{
            return view('welcome');
        }
        Log::info('index function Ended.'); 
    }

    
    public function storetests(){
        
        $this->assessmentTestService = new AssessmentTestServices();
        $this->assessmentTestService->getAllUserTestResults();
        //echo "hi please check your file!!!";strtotime("-1 days")
        //Storage::put('file.txt', $resuest);
       // $this->api_services->get_active_recruitements_for_api();
       // $data = $this->job_service->getSchoolsLists();
       // $ab = json_decode((string)$data);
       // return $ab;
    }

    public function activecampusjson(){
        return $this->api_services->get_active_recruitements_for_api();
      }

       public function waytosms(){
        $mobile="7691944566";
        $message="OFF";
        $json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?Mobile=7691944566&Password=Mummymaa@1103&Message=".urlencode($message)."&To=".urlencode($mobile)."&Key=ruksaeMasVTkJFgciOumCvyU8"),true);
        
            echo $json["msg"];
            echo 'success';

            /*$mobile="6260161517";
        $message=$json["msg"];
        $json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?Mobile=7691944566&Password=Mummymaa@1103&Message=".urlencode($message)."&To=".urlencode($mobile)."&Key=ruksaeMasVTkJFgciOumCvyU8"),true);
            */
        
           /* $mobile="9522675124";
        $message="OFF";
        $json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?Mobile=7691944566&Password=Mummymaa@1103&Message=".urlencode($message)."&To=".urlencode($mobile)."&Key=ruksaeMasVTkJFgciOumCvyU8"),true);*/
     
}
}

