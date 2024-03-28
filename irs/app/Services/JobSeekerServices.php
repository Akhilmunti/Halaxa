<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\User;
use App\Users_Role;
use App\Role;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Services\UUID;
use App\JobSeeker;
use App\js_qualification;
use App\js_project_detail;
use App\js_experience;
use App\Job_Application;
use App\js_job_pref;
use App\js_job_pref_location;
use App\image;
use App\js_certificate_detail;
use App\Job;
use App\Notifications\UserNotifications;
use Session;
use Illuminate\Support\Facades\Log;
use Mail;
/*
this class is used to call users functions.
*/
class JobSeekerServices{

   
/**
     * Check a new user role with requested role .
     *
     * @param  array  $data
     * @return \App\User
     */
    public function checkUserRole($user, $role_Name)
    {
       Log::info('checkUserRole function Started.'); 
        if($role_Name==config('app.Employer'))
            {
                $role_id = 1;
            }
        elseif($role_Name==config('app.Job_Seeker'))
            {
                $role_id = 2;
            }
           // echo $role_id." ".$user->roles[0]['role_id'];die();
        if($user->roles[0]['role_id']==$role_id){
          Log::info('checkUserRole function Ended.');
               return true;
             }
           else{ 
            Log::info('checkUserRole function Ended.');
            return false;
           }
    }

  public function applyjob (Request $request){
    Log::info('applyjob function Started.');
   // echo $request->jobid; die();
    $JobApplication = new Job_Application;
        $JobSeekerId = $this->getjobseekeridbylogedinuser();
         $applicationid = UUID::v4(); 
        $JobApplication->id  = $applicationid;
        $JobApplication->jobid = $request->jobid;
        $JobApplication->jobseekerid = $JobSeekerId[0]->id;
        $JobApplication->utm_source = 'FoodLinked';
        //echo  $JobApplication; die();
        $JobApplication->save();
        $job_title = Job::where("id", "=",$request->jobid)->first(['jobtitle']);

        $username = Auth::user()->name;
        $orderemail = Auth::user()->email;

                    $data=array('name'=>$username,
                      'today'=>date("m.d.y"),
                      'Job_Title' =>$job_title
                    );
                    $subject = 'Successfully Applied on Job With Foodlinked!';

                     Mail::send('mailJobApply', $data, function ($message) use ($orderemail, $subject) {
                            $message->to($orderemail)->subject($subject);
                            $message->bcc(config('app.CC_MailID'));
                        });


        Log::info('applyjob function Ended.');
        return 'you have applied Successfully!';
    }
    //not used till now
    public function checkjobseekercount(){
        $uuuserid = Auth::user()->uuid;
        return JobSeeker::where('userid',$uuuserid)->where('isdeleted',0)->count();
    }

    public function get_jsqualificationwithid($id){
      return js_qualification::where('id',$id)->where('isActive',1)->get();
    }
    public function get_jsexperiencewithid($id){ 
      return js_experience::where('id',$id)->where('isActive',1)->get();
    }
    public function get_jsprojectwithid($id){ 
      return js_project_detail::where("id", "=", $id)->where("isActive", "=", 1)->get();
    }
    public function get_jscertificatewithid($id){
       return js_certificate_detail::where("id", "=", $id)->where("isActive", "=", 1)->get();
    }
     
    public function getappliedjobsbylogedinjs(){
      Log::info('getappliedjobsbylogedinjs function Started.');
        $jobseekerid = $this->getjobseekeridbylogedinuser();
        $jobseekerid = $jobseekerid[0]->id;
         $jobsids = DB::select("select jobid,created_at from job_applications WHERE jobseekerid = '$jobseekerid' ");
         Log::info('getappliedjobsbylogedinjs function Ended.');
        return $jobsids;
    }
    
    public function getappliedjobscountbylogedinjs(){
      Log::info('getappliedjobscountbylogedinjs function Started.');
        $jobseekerid = $this->getjobseekeridbylogedinuser();
        $jobseekerid = $jobseekerid[0]->id;
        //print_r($jobseekerid); die();
        Log::info('getappliedjobscountbylogedinjs function Ended.');
        return Job_Application::where("jobseekerid", "=", $jobseekerid)->count();
    }

    public function getjobseekeridbylogedinuser(){
        Log::info('getjobseekeridbylogedinuser function Started.');
        $useruuid = Auth::user()->uuid;
        $JobSeekerId = DB::select("select id from job_seeker WHERE userid = '$useruuid'");
        //print_r($JobSeekerId);
        //echo "======================".$JobSeekerId[0]->id;
        //exit;
        Log::info('getjobseekeridbylogedinuser function Ended.');
        return $JobSeekerId;
    }

    public function JobSeekerProfileView($id){
      Log::info('JobSeekerProfileView function Started.');
      Log::info('JobSeekerProfileView function Ended.');
        return DB::table('users')
        ->join('job_seeker', 'users.uuid', '=', 'job_seeker.userid')
        ->leftJoin('location as statelocation', 'statelocation.location_id', '=', 'job_seeker.regionid')
        ->leftJoin('location as countrylocation', 'countrylocation.location_id', '=', 'job_seeker.countryid')
        ->leftjoin('images','images.id','=','job_seeker.resumeid')
        ->select('users.*','job_seeker.*','statelocation.name as statename','countrylocation.name as countryname')
        ->where('job_seeker.id','=',$id)
        ->get();
    }
    public function job_seeker_qualification($id){
      Log::info('job_seeker_qualification function Started.');
      Log::info('job_seeker_qualification function Ended.');
        return js_qualification::where("job_seeker_id", "=", $id)->where("isActive", "=", 1)->get();
    }
    public function job_seeker_experience($id){
      Log::info('job_seeker_experience function Started.');
      Log::info('job_seeker_experience function Ended.');
        return js_experience::where("job_seeker_id", "=", $id)->where("isActive", "=", 1)->get();
    }
    public function job_seeker_project_detail($id){
      Log::info('job_seeker_project_detail function Started.');
      Log::info('job_seeker_project_detail function Ended.');
        return js_project_detail::where("job_seeker_id", "=", $id)->where("isActive", "=", 1)->get();
    }
    public function job_seeker_job_pref($id){
      Log::info('job_seeker_job_pref function Started.');
      Log::info('job_seeker_job_pref function Ended.');
        return js_job_pref::where("js_id", "=", $id)->where("Isactive", "=", 1)->get();
    }
    public function job_seeker_job_certificate($id){
      Log::info('job_seeker_job_certificate function Started.');
      Log::info('job_seeker_job_certificate function Ended.');
        return js_certificate_detail::where("job_seeker_id", "=", $id)->where("Isactive", "=", 1)->get();
    }
    public function logedinjsdetails(){
      Log::info('logedinjsdetails function Started.');
      $uuuserid = Auth::user()->uuid;
      Log::info('logedinjsdetails function Ended.');
      return JobSeeker::where("userid", "=", $uuuserid)->get();
    }
     public function get_js_job_prefrence($jsid){
      Log::info('get_js_job_prefrence function Started.');
      Log::info('get_js_job_prefrence function Ended.');
      return js_job_pref::where("js_id", "=", $jsid)->where("Isactive", "=", 1)->get();
    }
    public function get_js_job_prefref_location($jsid){
      Log::info('get_js_job_prefref_location function Started.');
      Log::info('get_js_job_prefref_location function Ended.');
      return js_job_pref_location::where("js_id", "=", $jsid)->where("Isactive", "=", 1)->get();
    }
    //function to set job prefrence for js
    public function setJsJobPrefrence(Request $request){
      Log::info('setJsJobPrefrence function Started.');
        $js_id = $this->getjobseekeridbylogedinuser();
        
        $js_job_pref_row_count = js_job_pref::where('js_id', '=', $js_id[0]->id)->count();
       
        if($js_job_pref_row_count==0){
          $prefjobtitles = $request->jobtitle;
          $string_parts_jobtitle = implode(" , ",(array)$prefjobtitles); 

          $prefemployementtypes = $request->employementtype;
          $string_parts_employementtype = implode(" , ",(array)$prefemployementtypes); 

          $js_job_pref = new js_job_pref;
          $id = UUID::v4();
          $js_job_pref->id = $id;
          $js_job_pref->js_id = $js_id[0]->id;
          $js_job_pref->pref_jobtitle = $string_parts_jobtitle;
          $js_job_pref->pref_type = $string_parts_employementtype;
          $js_job_pref->min_emp = $request->minemp;
          $js_job_pref->max_emp = $request->maxemp;
          $js_job_pref->curr_package = $request->annualminpkg;
          $js_job_pref->expected_package = $request->annualmaxpkg;
          $js_job_pref->notice_period = $request->noticeperiod;
          $js_job_pref->currency = $request->currency;
          $js_job_pref->save();
        
          //$js_job_pref_location = new js_job_pref_location;
          $preflocation = $request->locationpreferedwithcity;
          if(isset($preflocation)){
              $LocationarrayLength = count($preflocation);
              for($i = 0 ; $i < $LocationarrayLength ; $i++)
                  {
                      $LocationarrayPart = $preflocation[$i];

                      $Locationarray = preg_split('/,/', $LocationarrayPart);
                      $country = $Locationarray[0];
                      if (isset($Locationarray[1]))
                      {
                          $state = $Locationarray[1];
                          if(isset($Locationarray[2]))
                          { 
                              $city = $Locationarray[2];
                               //echo $country; echo $state; echo $city;    
                          }
                      }
                      $insertlocationdata = array('js_id'=> $js_id[0]->id, 'countryid'=>$country, 'regionid'=> $state, 'cityname'=> $city);
                      js_job_pref_location::insert($insertlocationdata);
                  }
          }
                unset($country);
                unset($state);
                unset($city);
               
        }
       elseif ($js_job_pref_row_count==1) {
   
            $prefjobtitles = $request->jobtitle;
            $string_parts_jobtitle = implode(" , ",(array)$prefjobtitles); 

            $prefemployementtypes = $request->employementtype;
            $string_parts_employementtype = implode(",",(array)$prefemployementtypes); 

            $jsprefrencedata = ['js_id' => $js_id[0]->id,
            'pref_jobtitle' => $string_parts_jobtitle,
            'pref_type' => $string_parts_employementtype,
            'min_emp' => $request->minemp,
            'max_emp' => $request->maxemp,
            'curr_package' => $request->annualminpkg,
            'expected_package' => $request->annualmaxpkg,
            'notice_period' => $request->noticeperiod,
            'currency' => $request->currency];
            
            js_job_pref::where('js_id' , $js_id[0]->id)->update($jsprefrencedata);
            //print_r($jsprefrencedata);
            //exit;
      
                $preflocation = $request->locationpreferedwithcity; 
                $updatealllocation =['Isactive'=>'0'];
                  js_job_pref_location::where('js_id', $js_id[0]->id)->update($updatealllocation);
                //print_r($preflocation); die();
                if(isset($preflocation)){
                  $LocationarrayLength = count($preflocation);
                  for($i = 0 ; $i < $LocationarrayLength ; $i++)
                  {
                      $LocationarrayPart = $preflocation[$i];

                      $Locationarray = preg_split('/,/', $LocationarrayPart);
                      $country = $Locationarray[0];
                      if (isset($Locationarray[1]))
                      {
                          $state = $Locationarray[1];
                          if(isset($Locationarray[2]))
                          { 
                              $city = $Locationarray[2];
                               //echo $country; echo $state; echo $city;
                                //exit;
                              $joblocationsRecord = count(DB::table('js_job_pref_location')->where('js_id', '=', $js_id[0]->id)->where('countryid', '=', $country)->where('regionid', '=', $state)->where('cityname', '=', $city)->get());
                                   if($joblocationsRecord==0){
                                      $insertlocationdata = array(
                              array('js_id'=>$js_id[0]->id, 'countryid'=> $country, 'regionid'=> $state, 'cityname'=> $city));
                                          js_job_pref_location::insert($insertlocationdata);
                                   }
                                   else{
                                      $updatelocationdata =['Isactive'=>'1'];
                                        
                                      //print_r($updatelocationdata);
                                      DB::table('js_job_pref_location')->where('js_id', '=', $js_id[0]->id)->where('countryid', '=', $country)->where('regionid', '=', $state)->where('cityname', '=', $city)->update($updatelocationdata);
                                  }
                          }
                      }
                  }
                }
                unset($country);
                unset($state);
                unset($city);

        }
       else{
        echo 'first delete all and again go back on insert';
        }
        Log::info('setJsJobPrefrence function Ended.');
    }
   public function getresumeidbyjobseekerid($jsid){
     return JobSeeker::where("id", "=", $jsid)->select('resumeid')->first();
   }

   public function edit_jobseekerpersonalprofile(Request $request){
    $uuuserid = Auth::user()->uuid; 
    $JobSeekerId = $this->getjobseekeridbylogedinuser();
    $jobseekerId = $JobSeekerId[0]->id;
    $JobSeekerresumeid = $this->getresumeidbyjobseekerid($jobseekerId);
    //print_r($JobSeekerresumeid->resumeid); die();
        //$JobSeeker->countryid = $request->country;

        if (empty($request->country)) {
            return 'Please Select Country!';

        }

        //$JobSeeker->contact_number = $request->phone;
        if (empty($request->name)) {
            return 'Please Enter Name !';
        }
        if (empty($request->email)) {
            return 'Please Enter Email !';
        }
        
        
        //$JobSeeker->gender=$request->gender;
        if (empty($request->gender)) {
            return 'Please Select gender!';
        }
        //$JobSeeker->marital_status=$request->marital;
        if (empty($request->marital)) {
            return 'Please Select Marital Status!';
        }

         //$JobSeeker->dob=$request->DOB;
        if (empty($request->DOB)) {
            return 'Please Enter Date of Birth!';
        }
        
        //$JobSeeker->about=$request->About;
        if (empty($request->About)) {
            return 'Please Enter About Company!';
        }
         //$JobSeeker->permanent_address=$request->Address;
        if (empty($request->Address)) {
            return 'Please Enter Address!';
        }
        //Users table data 
       
                $ProfileImageName = '';
        
        if(trim($request->js_photo)!=''){     
           $ProfileImageName = $request->js_photo;
        }
        if(isset($request->ViewStatus)){
          $ViewStatus = 1;
        }
        else{
          $ViewStatus = 0;
        }

         $ResumeFileName = ''; 
        
          $request->hasFile('attachment_file'); 
        if($request->hasFile('attachment_file')){
           $extfile = $request->attachment_file->getClientOriginalExtension(); 
           $ResumeFileName =  date('Y_m_d_H_i_s').'_'.$username.'.'.$extfile;
          $request->attachment_file->move(public_path('JS_Resumes'), $ResumeFileName); 
        }

        DB::table('images')->where('id', $JobSeekerresumeid)->update(['path' => $ResumeFileName]);

         //$JobSeeker->logo=$ProfileImageName; 

        DB::table('users')->where('uuid', $uuuserid)->update(['phone' => $request->phone,'name' => $request->name,'email' => $request->email,'logoid' => $ProfileImageName ]);

        DB::table('job_seeker')->where('id', $jobseekerId)->update(['countryid' => $request->country,'contact_number' => $request->phone,'about' => $request->About,'regionid' => $request->state,'city' => $request->city,'logo' => $ProfileImageName,'gender' => $request->gender,'dob' => $request->DOB ,'marital_status' => $request->marital,'permanent_address' => $request->Address,'website'=>$request->website,'show_to_employer'=>$ViewStatus]);


        $username = Auth::user()->name; 
         $orderemail = Auth::user()->email;
         $phone = $request->phone;

          $Sohail='Sohail khan';
          $data=array('name'=>$username,
          'today'=>date("m.d.y"),
          'company_Name'=>'Job Seeker'
        );
          // $data['name'] = $Sohail;

                                        $subject = 'IRS- Test';
                                        // $data['today'] = date("m.d.y");
            // Mail::send('mail', $data, function ($message) use ($orderemail, $subject) {
            //                             $message->from('ruksar1103@gmail.com', 'IRS');
            //                             $message->to($orderemail)->subject($subject);
            //                             $message->cc('ruksar@ssism.org');
                                   // });
          Log::info('register_jobseeker function Ended.');
        return '';
   }


   public function add_jobseekereducationalprofile(Request $request){
      $JobSeekerId = $this->getjobseekeridbylogedinuser();
      $jobseekerId = $JobSeekerId[0]->id;
      $uucid = UUID::v4();

        if (empty($request->educationtype)) {
            return 'Please Select Education Type!';

        }

        if (empty($request->coursedetail)) {
            return 'Please Select Course !';
        }
        if (empty($request->streamdetail)) {
            return 'Please Select Stream !';
        }
        if (empty($request->medium)) {
            return 'Please Select Medium !';
        }

        if (empty($request->university)) {
           return 'Please Enter university !';
        } 
        if (empty($request->yeartoeducation)) {
            return 'Please Select Start Date !';
        }
        if (empty($request->yearfromeducation)) {
           return 'Please Select End Date !';
        } 
        // $counteducations = js_qualification::where('job_seeker_id',$jobseekerId)->count();
        // print_r($counteducations); 
        // if($counteducations > 0){
        //   $updatealljsqualification=['isActive'=>'0'];
        //   js_qualification::where('job_seeker_id', '=', $jobseekerId)->update($updatealljsqualification);
        // }
        // else{
          $inserteducationdata = array('id'=>$uucid, 'job_seeker_id'=> $jobseekerId, 'course'=> $request->coursedetail, 'year_from'=> $request->yearfromeducation, 'year_to'=>$request->yeartoeducation, 'medium'=>$request->medium, 'education_type'=>$request->educationtype, 'specialization'=>$request->streamdetail, 'university'=>$request->university,'country'=>$request->countryAddEdu,'state'=>$request->stateAddEdu,'city'=>$request->cityAddEdu);
                                        js_qualification::insert($inserteducationdata);
          return '';
        // }
   }

   public function edit_jobseekereducationalprofile(Request $request){
        $JobSeekerId = $this->getjobseekeridbylogedinuser();
        $jobseekerId = $JobSeekerId[0]->id;

        if (empty($request->qualificationid)) {
            return 'Invalid Data Passed Please Check Id !';
        }
        if (empty($request->educationtype1)) {
            return 'Please Select Education Type!';

        }

        if (empty($request->coursedetail)) {
            return 'Please Select Course !';
        }
        if (empty($request->streamdetail)) {
            return 'Please Select Stream !';
        }
        if (empty($request->medium1)) {
            return 'Please Select Medium !';
        }

        if (empty($request->university1)) {
           return 'Please Enter university !';
        } 
        if (empty($request->yearto1)) {
            return 'Please Select Start Date !';
        }
        if (empty($request->yearfrom1)) {
           return 'Please Select End Date !';
        } 
        $editeducationdata = array('course'=> $request->coursedetail, 'year_from'=> $request->yearfrom1, 'year_to'=>$request->yearto1, 'medium'=>$request->medium1, 'education_type'=>$request->educationtype1, 'specialization'=>$request->streamdetail, 'university'=>$request->university1,'country'=>$request->CountryEditEdu,'state'=>$request->stateEditEdu,'city'=>$request->cityEditEdu);
          js_qualification::where('id',$request->qualificationid)->where('job_seeker_id',$jobseekerId)->update($editeducationdata);
          return '';
  }

   public function add_jobseekerexperienceprofile(Request $request){
        $JobSeekerId = $this->getjobseekeridbylogedinuser();
        $jobseekerId = $JobSeekerId[0]->id;
        $uucid = UUID::v4();

        if (empty($request->currentposition)) {
            return 'Please Select currentposition !';

        }
        if (empty($request->about_company)) {
            return 'Please Select About Company !';
        }
        if (empty($request->role_description)) {
            return 'Please Select Role Description !';
        }
        if (empty($request->emplyment_type)) {
            return 'Please Select Emplyment Type !';
        }
        if (empty($request->yearto)) {
            return 'Please Select Vlid Date !';
        }
        if (empty($request->yearfrom)) {
            return 'Please Select Vlid Date !';
        }

        if (empty($request->current_package)) {
           return 'Please Select Vlid Package !';
        } 
       
        if (empty($request->tags_2)) {
           return 'Please Select Valid Data !';
        } 
        if (empty($request->Nationality)) {
           return 'Please Select Nationality !';
        } 
        if (empty($request->company_location)) {
           return 'Please Enter Valid Location !';
        } 
        
        if (empty($request->companyname)) {
           return 'Please Enter Valid Company Name !';
        } 

        // $counteducations = js_qualification::where('job_seeker_id',$jobseekerId)->count();
        // print_r($counteducations); 
        // if($counteducations > 0){
        //   $updatealljsqualification=['isActive'=>'0'];
        //   js_qualification::where('job_seeker_id', '=', $jobseekerId)->update($updatealljsqualification);
        // }
        // else{
          $insertExpriencedata = array('id'=>$uucid, 'job_seeker_id'=> $jobseekerId, 'designation'=> $request->currentposition, 'employment_type'=> $request->emplyment_type, 'package'=>$request->current_package, 'yearfrom'=>$request->yearfrom, 'yearto'=>$request->yearto, 'key_responsibilities'=>$request->tags_2, 'company_nationality'=>$request->Nationality,'company_location'=> $request->company_location, 'role_description'=>$request->role_description,'about_company'=>$request->about_company,'companyname'=>$request->companyname);
          //print_r($insertExpriencedata); die();
          js_experience::insert($insertExpriencedata);

                                        

          return '';
   }
   public function add_jobseekercertificateprofile(Request $request){
     $JobSeekerId = $this->getjobseekeridbylogedinuser();
        $jobseekerId = $JobSeekerId[0]->id;
        $uucid = UUID::v4();

        if (empty($request->certificate_name)) {
            return 'Please Enter Certificate Name !';

        }
        if (empty($request->fromdate)) {
            return 'Please Enter From Date !';
        }
        if (empty($request->todate)) {
            return 'Please Enter To Date !';
        }
     $insertCertificateData = array('id'=>$uucid, 'job_seeker_id'=> $jobseekerId, 'certificate_name'=> $request->certificate_name, 'fromdate'=> $request->fromdate, 'todate'=>$request->todate, 'certificate_authority'=>$request->certificate_authorization, 'certificate_url'=>$request->certificate_url, 'license_no'=>$request->license_no);
          js_certificate_detail::insert($insertCertificateData);
          
            return '';
   }
   public function edit_jobseekercertificatedetailinprofile(Request $request){
      $JobSeekerId = $this->getjobseekeridbylogedinuser();
        $jobseekerId = $JobSeekerId[0]->id;

        if (empty($request->certificate_name)) {
            return 'Please Enter Certificate Name !';

        }
        if (empty($request->fromdate)) {
            return 'Please Enter From Date !';
        }
        if (empty($request->todate)) {
            return 'Please Enter To Date !';
        }
     $UpdateCertificateData = array('certificate_name'=> $request->certificate_name, 'fromdate'=> $request->fromdate, 'todate'=>$request->todate, 'certificate_authority'=>$request->certificate_authorization, 'certificate_url'=>$request->certificate_url, 'license_no'=>$request->license_no);
          js_certificate_detail::where('job_seeker_id','=',$jobseekerId)->where('id','=',$request->certificateid)->update($UpdateCertificateData);
          
            return '';
   }
   public function edit_jobseekerexperienceprofile(Request $request){
      $JobSeekerId = $this->getjobseekeridbylogedinuser();
      $jobseekerId = $JobSeekerId[0]->id;

      if (empty($request->experienceid)) {
            return 'Invalid Data Passed !';

        }
      if (empty($request->currentposition)) {
            return 'Please Select currentposition !';

        }
        if (empty($request->about_company)) {
            return 'Please Select About Company !';
        }
        if (empty($request->role_description)) {
            return 'Please Select Role Description !';
        }
        if (empty($request->emplyment_type)) {
            return 'Please Select Emplyment Type !';
        }
        if (empty($request->yearto)) {
            return 'Please Select Vlid Date !';
        }
        if (empty($request->yearfrom)) {
            return 'Please Select Vlid Date !';
        }

        if (empty($request->current_package)) {
           return 'Please Select Vlid Package !';
        } 
        if (empty($request->tags_2)) {
           return 'Please Select Valid Data !';
        } 
        if (empty($request->Nationality)) {
           return 'Please Select Nationality !';
        } 
        if (empty($request->company_location)) {
           return 'Please Enter Valid Location !';
        } 
        if (empty($request->companyname)) {
           return 'Please Enter Valid Company Name !';
        } 

        $editexperiencedata = array('designation'=> $request->currentposition, 'employment_type'=> $request->emplyment_type, 'package'=>$request->current_package, 'yearfrom'=>$request->yearfrom, 'yearto'=>$request->yearto, 'key_responsibilities'=>$request->tags_2, 'company_nationality'=>$request->Nationality,'company_location'=> $request->company_location, 'role_description'=>$request->role_description,'about_company'=>$request->about_company,'companyname'=>$request->companyname);
          js_experience::where('id',$request->experienceid)->where('job_seeker_id',$jobseekerId)->update($editexperiencedata);
          return '';
      }

    public function edit_jobseekerprojectdetailinprofile(Request $request){
      $JobSeekerId = $this->getjobseekeridbylogedinuser();
      $jobseekerId = $JobSeekerId[0]->id;

      if (empty($request->projectid)) {
            return 'Invalid Data Passed !';
        }
      if (empty($request->project_title)) {
            return 'Please Enter project_title !';
        }

        if (empty($request->client_name)) {
            return 'Please Enter Client Name !';
        }
        if (empty($request->duration_to)) {
            return 'Please Select Vlid Date !';
        }
        if (empty($request->duration_from)) {
            return 'Please Select Vlid Date !';
        }
        if (empty($request->role)) {
            return 'Please Enter Vlid Role !';
        }

        if (empty($request->team_size)) {
           return 'Please Enter Team Size !';
        } 
        if (empty($request->project_locat)) {
            return 'Please Enter Project Location !';
        }
        if (empty($request->project_abtprjct)) {
           return 'Please Enter About Project !';
        } 
        if (empty($request->project_skilsused)) {
           return 'Please Enter Skills !';
        } 

        $duration = $request->duration_to." - ".$request->duration_from; 

          $updateProjectdata = array('client_name'=> $request->client_name, 'project_title'=> $request->project_title, 'duration'=>$duration, 'project_location'=>$request->project_locat, 'project_details'=>$request->project_abtprjct, 'role'=>$request->role, 'team_size'=>$request->team_size,'skills_used'=> $request->project_skilsused);
          js_project_detail::where('id',$request->projectid)->where('job_seeker_id',$jobseekerId)->update($updateProjectdata);
        return '';
    }

   public function add_jobseekerprojectdetails(Request $request){
        $JobSeekerId = $this->getjobseekeridbylogedinuser();
        $jobseekerId = $JobSeekerId[0]->id;
        $uucid = UUID::v4();

        if (empty($request->project_title)) {
            return 'Please Enter project_title !';

        }

        if (empty($request->client_name)) {
            return 'Please Enter Client Name !';
        }
        if (empty($request->duration_to)) {
            return 'Please Select Vlid Date !';
        }
        if (empty($request->duration_from)) {
            return 'Please Select Vlid Date !';
        }
        if (empty($request->role)) {
            return 'Please Enter Vlid Role !';
        }

        if (empty($request->team_size)) {
           return 'Please Enter Team Size !';
        } 
        if (empty($request->project_locat)) {
            return 'Please Enter Project Location !';
        }
        if (empty($request->project_abtprjct)) {
           return 'Please Enter About Project !';
        } 
        if (empty($request->project_skilsused)) {
           return 'Please Enter Skills !';
        } 

        $duration = $request->duration_to." - ".$request->duration_from; 

          $insertProjectdata = array('id'=>$uucid, 'job_seeker_id'=> $jobseekerId, 'client_name'=> $request->client_name, 'project_title'=> $request->project_title, 'duration'=>$duration, 'project_location'=>$request->project_locat, 'project_details'=>$request->project_abtprjct, 'role'=>$request->role, 'team_size'=>$request->team_size,'skills_used'=> $request->project_skilsused);
          //print_r($insertExpriencedata); die();
          js_project_detail::insert($insertProjectdata);
        return '';
        
   }


    public function register_jobseeker(Request $request){
    Log::info('register_jobseeker function Started.');
        $uuuserid = Auth::user()->uuid;
        $JobSeeker = new JobSeeker();
        $uuid = UUID::v4();
        $JobSeeker->id = $uuid;
        $JobSeeker->userid = $uuuserid; 
        $JobSeeker->countryid = $request->country;

        if (empty($request->country)) {
            return 'Please Select Country!';
        }

        $JobSeeker->contact_number = $request->phone;
        if (empty($request->phone)) {
            return 'Please Enter Contact No.!';
        }
        else{
            if(is_numeric(trim($request->phone)) == false){
                return 'Please Enter valid phone Number!';
            }
        }   
        $JobSeeker->regionid = $request->state;
        if (empty($request->state)) {
           return 'Please Select City!';
        } 
        $JobSeeker->city =$request->city;
        if (empty($request->city)) {
            return 'Please Enter City Name!';
        }
        $JobSeeker->gender=$request->gender;
        if (empty($request->gender)) {
            return 'Please Select gender!';
        }
        $JobSeeker->marital_status=$request->marital;
        if (empty($request->marital)) {
            return 'Please Select Marital Status!';
        }

         $JobSeeker->dob=$request->DOB;
        if (empty($request->DOB)) {
            return 'Please Enter Date of Birth!';
        }
        
        $JobSeeker->about=$request->About;
        if (empty($request->About)) {
            return 'Please Enter About Company!';
        }
         $JobSeeker->permanent_address=$request->Address;
        if (empty($request->Address)) {
            return 'Please Enter Address!';
        }
        //Users table data    
        $username = Auth::user()->name; 
        $orderemail = Auth::user()->email;
        $phone = $request->phone;
        $ProfileImageName = '';
        
        $request->hasFile('profile_pic'); 
        if($request->hasFile('profile_pic')){
           $extimage = $request->profile_pic->getClientOriginalExtension();
           $ProfileImageName =  date('Y_m_d_H_i_s').'_'.$username.'.'.$extimage;
           $request->profile_pic->move(public_path('images/job_seeker'), $ProfileImageName); 
        }

        $ResumeFileName = '';         
        $request->hasFile('attachment_file'); 
        if($request->hasFile('attachment_file')){
            $extfile = $request->attachment_file->getClientOriginalExtension(); 
            $ResumeFileName =  date('Y_m_d_H_i_s').'_'.$username.'.'.$extfile;
            $request->attachment_file->move(public_path('JS_Resumes'), $ResumeFileName); 
        }
        $image = new image;
        $resumeid = UUID::v4();
        $image->id = $resumeid;
        $image->path = $ResumeFileName;
        $image->save();

        $JobSeeker->logo=$ProfileImageName; 
        $JobSeeker->resumeid=$resumeid;

        DB::table('users')->where('uuid', $uuuserid)->update(['is_first_login' => '1' ,'phone' => $phone,'logoid' => $ProfileImageName ]);
        $JobSeeker->save();
        $Sohail='Sohail khan';
        $data=array('name'=>$username,
          'today'=>date("m.d.y"),
          'company_Name'=>'Job Seeker');
        // $data['name'] = $Sohail;
        $subject = 'IRS- Test';
        //$data['today'] = date("m.d.y");
        Mail::send('mail', $data, function ($message) use ($orderemail, $subject) {
                $message->from('ruksar1103@gmail.com', 'IRS');
                $message->to($orderemail)->subject($subject);
                $message->cc('ruksar@ssism.org');
            });
        Log::info('register_jobseeker function Ended.');
        return 'JS  registered  Successfully!';
    }

    public function add_jobseeker(){
        Log::info('add_jobseeker function Started.');
        //echo "hi"; exit;
        $uuuserid = Auth::user()->uuid;
        $jobSeeker = JobSeeker::where("userid", "=", $uuuserid)->first();
        //print_r($jobSeeker);exit;
        if(!isset($jobSeeker)){    
            $JobSeeker = new JobSeeker();
            $uuid = UUID::v4();
            $JobSeeker->id = $uuid;
            $JobSeeker->userid = $uuuserid;   
            $image = new image;
            $resumeid = UUID::v4();
            $image->id = $resumeid;
            $image->path = '';
            $image->save();
            $JobSeeker->resumeid=$resumeid;
            $JobSeeker->save();
             //update user profile is login 
             DB::table('users')->where('uuid', $uuuserid)->update(['is_first_login' => '1']);
            Log::info('add_jobseeker function Ended.');
        }
            return '';
        }


        
    public function getapplicantcountforjob($jobid){
        Log::info('getapplicantcountforjob function Started.');
        Log::info('getapplicantcountforjob function Ended.');
       return Job_Application::where('jobid',$jobid)->where('isdeleted',0)->count();
    }

}


