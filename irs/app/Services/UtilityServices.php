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
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\UUID;
use App\Services\JobServices;
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
use Illuminate\Support\Facades\Log;
use Session;



/*
this class is used to call users functions.
 */
class UtilityServices
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

    public function createJsonForJobs($jobid){
        Log::info('createJsonForJobs function Started.');
        $salary = DB::select("SELECT currency_type as currency ,min_salary as min ,max_salary as max ,CASE WHEN hidesalary=1 THEN 0 ELSE 1 END as showToJobseeker  FROM jobs WHERE id = '$jobid'");
        $salaryjson = json_encode($salary[0]);

            $expirience = DB::select("SELECT  min_years as min ,max_years as max  FROM jobs WHERE id = '$jobid'");
        $expiriencejson = json_encode($expirience[0]);

        $contactdetails = DB::select("SELECT  j.contact_details,e.website,e.about  FROM jobs j join employer e on j.employerid=e.id  WHERE j.id = '$jobid'");
         $ContactdetailArray = json_decode($contactdetails[0]->contact_details,true);
           $contactarray = array('person'=> $ContactdetailArray['name'] , 'number'=>$ContactdetailArray['phonenumber'] , 'companyWebsite'=>$contactdetails[0]->website, 'aboutCompany'=> "Test Data", 'showToJobseeker'=>0 );
        
 

            $ugqualification = DB::select(DB::raw("SELECT  jsd1.naukari_code as quacode , jsd2.naukari_code as speccode  FROM job_education_details jed join jobs_seed_data jsd1  on jed.qualification =  jsd1.value join jobs_seed_data jsd2  on jed.specialization =  jsd2.value and jsd2.parent_id = jsd1.id  WHERE jed.jobid = '$jobid' and jed.type = 'Ug' "));

            if(count($ugqualification)>0){
                $qualug = array();
                $specug = array();
                foreach ($ugqualification as $ugqualification) {
                    array_push($qualug, $ugqualification->quacode);
                    array_push($specug, $ugqualification->speccode);
                }
                
                $insertugdata = array('type'=> 1 , 'courseIds'=>$qualug , 'specIds'=>$specug , 'relation'=> 0 );
               
            }
            else{
               $insertugdata = array('type'=> 0); 
            }

        $pgqualification = DB::select(DB::raw("SELECT  jsd1.naukari_code as quacode , jsd2.naukari_code as speccode  FROM job_education_details jed join jobs_seed_data jsd1  on jed.qualification =  jsd1.value join jobs_seed_data jsd2  on jed.specialization =  jsd2.value and jsd2.parent_id = jsd1.id  WHERE jed.jobid = '$jobid' and jed.type = 'Pg' "));
         
            if(count($pgqualification)>0){   
                $qualpg = array();
                $specpg = array();
                foreach ($pgqualification as $pgqualification) {
                    array_push($qualpg, $pgqualification->quacode);
                    array_push($specpg, $pgqualification->speccode);
                }
                
                $insertpgdata = array('type'=> 1 , 'courseIds'=>$qualpg , 'specIds'=>$specpg , 'relation'=> 0 );
               
                
            }
            else{
                $insertpgdata = array('type'=> 0);
            }

            $ppgqualification = DB::select(DB::raw("SELECT  jsd1.naukari_code as quacode , jsd2.naukari_code as speccode  FROM job_education_details jed join jobs_seed_data jsd1  on jed.qualification =  jsd1.value join jobs_seed_data jsd2  on jed.specialization =  jsd2.value and jsd2.parent_id = jsd1.id  WHERE jed.jobid = '$jobid' and jed.type = 'Ppg' "));
            if(count($ppgqualification)>0){
                $qualppg = array();
                $specppg = array();
                foreach ($ppgqualification as $ppgqualification) {
                    array_push($qualppg, $ppgqualification->quacode);
                    array_push($specppg, $ppgqualification->speccode);
                    }
                $insertppgdata = array('type'=> 1 , 'courseIds'=>$qualppg , 'specIds'=>$specppg , 'relation'=> 0 );
               
            }
            else{
                $insertppgdata = array('type'=> 0);
            }


            $location = DB::select("SELECT loc2.naukari_code as city FROM job_locations jl 
                join location loc1  on jl.countryid =  loc1.location_id and loc1.location_type = 0 
                join location loc2  on jl.city =  loc2.name and loc2.location_type = 3   WHERE jl.job_id = '$jobid' And  jl.countryid = 100");

            $location1 = DB::select("SELECT loc1.name as city FROM job_locations jl 
                join location loc1  on jl.countryid =  loc1.location_id and loc1.location_type = 0 
                  WHERE jl.job_id = '$jobid' And  jl.countryid != 100");

           // print_r($location);print_r($location1);
            $loc = array();
                foreach ($location as $location) {
                    array_push($loc, $location->city);
                }
                $loc1 = array();
                foreach ($location1 as $location1) {
                    array_push($loc1, $location1->city);
                }

             if(count($loc)>0 && count($loc1)>0){
                $locationarray = array('cityIds'=>$loc,'otherCountry'=>$loc1);
             }
             elseif(count($loc)>0 && count($loc1)<=0){
                $locationarray = array('cityIds'=>$loc);
             }
             elseif(count($loc)<=0 && count($loc1)>0){
                $locationarray = array('otherCountry'=>$loc1);
             }
             else{
                $locationarray = array();
             }
            
           //  $locationarray = array('otherCountry'=>$loc1);
            $locationjson = json_encode($locationarray);

           
            $hiringFor = array('name'=>$ContactdetailArray['name'],'showToJobseeker'=>1);
           
            $visibility = array('visibleTo'=>1);
         
            $skillsdata = DB::select("SELECT  keyskills  FROM jobs   WHERE id = '$jobid'");
            $keyskillsarray = htmlspecialchars(trim(strip_tags($skillsdata[0]->keyskills)));
            // print_r($keyskillsarray); die();
            //$keyskillsarray = array('keyskills'=>"Management , Dedicated");

            $jobsdata = DB::select("SELECT  jobtitle,description, jsd1.naukari_code as industry,jsd2.naukari_code as fa,jsd3.naukari_code as role,number_of_vacancies,j.postedts
            from jobs j join jobs_seed_data jsd1 on j.industry = jsd1.id and jsd1.type = 1001
             join jobs_seed_data jsd2 on j.functional_area = jsd2.id and jsd2.type = 1002
             join jobs_seed_data jsd3 on j.role = jsd3.id and jsd3.type = 1003
            where j.id =  '$jobid'");
           
            $emlarray = array("rajat.dutta@naukri.com", "ram.sevak@naukri.com");
            $resarray = array('type'=>3,'companyUrl'=>"http://internal.com");
            $frwrdarray = array('emails'=>$emlarray,'showToJobseeker'=>0);
            $refresharray = array('frequency'=>1, 'startDate'=>date_format(date_create($jobsdata[0]->postedts), 'U'), 'stopAfter'=>10);
            $postonarray = array('platformType'=>12,'refresh'=>$refresharray, 'responseMode'=>$resarray,'forward'=>$frwrdarray);
            $postOnarry = array($postonarray);
            
            
            $arrayforjson = array('requirementName'=> $jobsdata[0]->jobtitle.''.$jobid ,'title'=> $jobsdata[0]->jobtitle ,'description'=>  $jobsdata[0]->description ,'salary'=>  $salary[0],'experience'=>$expirience[0],'keywords'=>$keyskillsarray,'locations'=>$locationarray ,'createdBy'=>$ContactdetailArray['name'] ,'industry'=> 29 ,'functionalArea'=>  1 ,'role'=>'1.13' ,'hiringFor'=>$hiringFor  ,'visibilty'=>$visibility ,'sendNotificationMail'=> 1 ,'vacancies'=>$jobsdata[0]->number_of_vacancies  ,'ug'=> $insertugdata  ,'pg'=>  $insertpgdata ,'ppg'=> $insertppgdata  ,'contact'=> $contactarray,'postOn'=>$postOnarry);
                 $result = str_replace("\n\n", " ", $arrayforjson);
            $finaljson = json_encode($result,JSON_UNESCAPED_SLASHES);
            $fp = fopen('datajsn.json', 'w');
            fwrite($fp, $finaljson);
            fclose($fp);
            Log::info('createJsonForJobs function Ended.');
            return $finaljson;

    }
   
   public function getSavedjobpostingusingseach(Request $request)
    {
        
        Log::info('getSavedjobpostingusingseach function Started.');
        $EmployerId = $this->job_service->getemployeridbylogedinuser();
        Log::info('getSavedjobpostingusingseach function Ended.');
        $keywordcondition = '';
        if(trim($request->keyword)!='')
        {
            $keywordcondition="AND jobs.jobtitle like '%".$request->keyword."%'";
        }
        $Expectedpckgcondition = '';
        if(trim($request->Expectedpckg)!='')
        {
            $Expectedpckgcondition="AND jobs.min_salary <=  ".$request->Expectedpckg." AND jobs.max_salary >=".$request->Expectedpckg;
        }
        $expcondition = '';
        if(trim($request->exp)!='')
        {
            $expcondition="AND jobs.min_years <=  ".$request->exp." AND jobs.max_years >=".$request->exp;
        }
        $Currencycondition = '';
        if(trim($request->Currency)!='')
        {
            $Currencycondition="AND jobs.currency_type =  '".$request->Currency."'";
        }
         $employementtypecondition = '';
        if(trim($request->employementtype)!='')
        {
            $employementtypecondition="AND jobs.type =  ".$request->employementtype."";
        }
        $countrycondition = '';
        if(trim($request->country)!='')
        {
            $countrycondition="AND jl.countryid = ".$request->country." AND jl.isActive = 1";
        }
        $statecondition = '';
        if(trim($request->state)!='')
        {
            $statecondition="AND jl.regionid = ".$request->state."  AND jl.isActive = 1";
        }
        $citycondition = '';
        if(trim($request->city)!='')
        {
            $citycondition="AND jl.city = '".$request->city."'  AND jl.isActive = 1";
        }

        

        $savedsearchjobdata = DB::select("SELECT jobs.id,jobs.company,jobs.Isfinished,jobs.created_at,jobs.jobtitle,jobs.source,jsdfa.value as functional_area_value,jsdjr.value as job_role_value FROM   jobs left join jobs_seed_data as jsdfa on jobs.functional_area = jsdfa.id  left join jobs_seed_data as jsdjr on jobs.role = jsdjr.id left join job_locations jl on jl.job_id = jobs.id where jobs.isposted = 0 and jobs.source =1 AND jobs.employerid ='".$EmployerId[0]->id."' AND jobs.active=1  $keywordcondition $Expectedpckgcondition  $expcondition $Currencycondition $employementtypecondition $countrycondition $statecondition $citycondition GROUP BY jobs.id ORDER BY jobs.updated_at desc");

return $savedsearchjobdata = $this->arrayPaginator($savedsearchjobdata, $request);

// return view('welcome')->with('allNotices', $notices);
       
    }

    //function to perform search on saved campus recruitement
    public function getSavedCampusRecruitementsusingsearch(Request $request)
    {
        Log::info('getSavedCampusRecruitementsusingsearch function Started.');
        $EmployerId = $this->job_service->getemployeridbylogedinuser();
        Log::info('getSavedCampusRecruitementsusingsearch function Ended.');
  /*  return job::where("active", "=", 1)->where("isposted", "=", 0)->where("source", "=", 2)->where("employerid", "=", $EmployerId[0]->id)->get();*/
    $keywordcondition = '';
        if(trim($request->keyword)!='')
        {
            $keywordcondition="AND jobs.jobtitle like '%".$request->keyword."%'";
        }
        $Expectedpckgcondition = '';
        if(trim($request->Expectedpckg)!='')
        {
            $Expectedpckgcondition="AND jobs.min_salary <=  ".$request->Expectedpckg." AND jobs.max_salary >=".$request->Expectedpckg;
        }
        $expcondition = '';
        if(trim($request->exp)!='')
        {
            $expcondition="AND jobs.min_years <=  ".$request->exp." AND jobs.max_years >=".$request->exp;
        }
        $Currencycondition = '';
        if(trim($request->Currency)!='')
        {
            $Currencycondition="AND jobs.currency_type =  '".$request->Currency."'";
        }
         $employementtypecondition = '';
        if(trim($request->employementtype)!='')
        {
            $employementtypecondition="AND jobs.type =  ".$request->employementtype."";
        }
        $countrycondition = '';
        if(trim($request->country)!='')
        {
            $countrycondition="AND jl.countryid = ".$request->country." AND jl.isActive = 1";
        }
        $statecondition = '';
        if(trim($request->state)!='')
        {
            $statecondition="AND jl.regionid = ".$request->state."  AND jl.isActive = 1";
        }
        $citycondition = '';
        if(trim($request->city)!='')
        {
            $citycondition="AND jl.city = '".$request->city."'  AND jl.isActive = 1";
        }

        

        $savedcampusdata = DB::select("SELECT jobs.id,jobs.company,jobs.Isfinished,jobs.created_at,jobs.jobtitle,jobs.source,jsdfa.value as functional_area_value,jsdjr.value as job_role_value FROM   jobs left join jobs_seed_data as jsdfa on jobs.functional_area = jsdfa.id  left join jobs_seed_data as jsdjr on jobs.role = jsdjr.id left join job_locations jl on jl.job_id = jobs.id where jobs.isposted = 0 and jobs.source =2 AND jobs.employerid ='".$EmployerId[0]->id."' AND jobs.active=1  $keywordcondition $Expectedpckgcondition  $expcondition $Currencycondition $employementtypecondition $countrycondition $statecondition $citycondition GROUP BY jobs.id ORDER BY jobs.updated_at desc");

        return $savedcampusdata = $this->arrayPaginator($savedcampusdata, $request);


    }
    public function getActivejobopeningusingsearch(Request $request)
    {
        Log::info('getActivejobopeningusingsearch function Started.');
        $EmployerId = $this->job_service->getemployeridbylogedinuser();
        Log::info('getActivejobopeningusingsearch function Ended.');

        $keywordcondition = '';
        if(trim($request->keyword)!='')
        {
            $keywordcondition="AND jobs.jobtitle like '%".$request->keyword."%'";
        }
        $Expectedpckgcondition = '';
        if(trim($request->Expectedpckg)!='')
        {
            $Expectedpckgcondition="AND jobs.min_salary <=  ".$request->Expectedpckg." AND jobs.max_salary >=".$request->Expectedpckg;
        }
        $expcondition = '';
        if(trim($request->exp)!='')
        {
            $expcondition="AND jobs.min_years <=  ".$request->exp." AND jobs.max_years >=".$request->exp;
        }
        $Currencycondition = '';
        if(trim($request->Currency)!='')
        {
            $Currencycondition="AND jobs.currency_type =  '".$request->Currency."'";
        }
         $employementtypecondition = '';
        if(trim($request->employementtype)!='')
        {
            $employementtypecondition="AND jobs.type =  ".$request->employementtype."";
        }
        $countrycondition = '';
        if(trim($request->country)!='')
        {
            $countrycondition="AND jl.countryid = ".$request->country." AND jl.isActive = 1";
        }
        $statecondition = '';
        if(trim($request->state)!='')
        {
            $statecondition="AND jl.regionid = ".$request->state."  AND jl.isActive = 1";
        }
        $citycondition = '';
        if(trim($request->city)!='')
        {
            $citycondition="AND jl.city = '".$request->city."'  AND jl.isActive = 1";
        }

        

        $activejobsearch = DB::select("SELECT jobs.*  FROM   jobs left join job_locations jl on jl.job_id = jobs.id where jobs.isposted = 1 and jobs.source =1 AND jobs.employerid ='".$EmployerId[0]->id."' AND jobs.active=1  $keywordcondition $Expectedpckgcondition  $expcondition $Currencycondition $employementtypecondition $countrycondition $statecondition $citycondition GROUP BY jobs.id ORDER BY jobs.updated_at desc");

        return $activejobsearch = $this->arrayPaginator($activejobsearch, $request);
    }
    
        public function getActiveCampusRecruitementusingsearch(Request $request)
    {
        Log::info('getActivejobopeningusingsearch function Started.');
        $EmployerId = $this->job_service->getemployeridbylogedinuser();
        Log::info('getActivejobopeningusingsearch function Ended.');

        $keywordcondition = '';
        if(trim($request->keyword)!='')
        {
            $keywordcondition="AND jobs.jobtitle like '%".$request->keyword."%'";
        }
        $Expectedpckgcondition = '';
        if(trim($request->Expectedpckg)!='')
        {
            $Expectedpckgcondition="AND jobs.min_salary <=  ".$request->Expectedpckg." AND jobs.max_salary >=".$request->Expectedpckg;
        }
        $expcondition = '';
        if(trim($request->exp)!='')
        {
            $expcondition="AND jobs.min_years <=  ".$request->exp." AND jobs.max_years >=".$request->exp;
        }
        $Currencycondition = '';
        if(trim($request->Currency)!='')
        {
            $Currencycondition="AND jobs.currency_type =  '".$request->Currency."'";
        }
         $employementtypecondition = '';
        if(trim($request->employementtype)!='')
        {
            $employementtypecondition="AND jobs.type =  ".$request->employementtype."";
        }
        $countrycondition = '';
        if(trim($request->country)!='')
        {
            $countrycondition="AND jl.countryid = ".$request->country." AND jl.isActive = 1";
        }
        $statecondition = '';
        if(trim($request->state)!='')
        {
            $statecondition="AND jl.regionid = ".$request->state."  AND jl.isActive = 1";
        }
        $citycondition = '';
        if(trim($request->city)!='')
        {
            $citycondition="AND jl.city = '".$request->city."'  AND jl.isActive = 1";
        }

        

        $activecampusdata = DB::select("SELECT jobs.*  FROM   jobs left join job_locations jl on jl.job_id = jobs.id where jobs.isposted = 1 and jobs.source =2 AND jobs.employerid ='".$EmployerId[0]->id."' AND jobs.active=1  $keywordcondition $Expectedpckgcondition  $expcondition $Currencycondition $employementtypecondition $countrycondition $statecondition $citycondition GROUP BY jobs.id ORDER BY jobs.updated_at desc");

        return $activecampusdata = $this->arrayPaginator($activecampusdata, $request);
    }

    public function getActivejobopeningsForJSusingsearch(Request $request){
        Log::info('getActivejobopeningsForJS function Started.');
        $jobids = array();
        $jobappliedbyjs = $this->jobseeker_service->getappliedjobsbylogedinjs();

        $employerid = $this->job_service->getemployeridbylogedinuser();
        if(count($employerid)>0){
            $employerid = $employerid[0]->id;
        } else{
            $employerid = "";
        }
        
        foreach ($jobappliedbyjs as $Jobid) {
            array_push($jobids, $Jobid->jobid);
        }
        
        $keywordcondition = '';
        if(trim($request->keyword)!=''){
            $keywordcondition .=" AND jobs.jobtitle like '%".$request->keyword."%'";
            $keywordcondition .=" OR users.company like '%".$request->keyword."%'";
        }
        $Expectedpckgcondition = '';
        if(trim($request->Expectedpckg)!='') {
            $Expectedpckgcondition="AND jobs.min_salary <=  ".$request->Expectedpckg." AND jobs.max_salary >=".$request->Expectedpckg;
        }
        $expcondition = '';
        if(trim($request->exp)!='') {
            $expcondition="AND jobs.min_years <=  ".$request->exp." AND jobs.max_years >=".$request->exp;
        }
        $Currencycondition = '';
        if(trim($request->Currency)!='') {
            $Currencycondition="AND jobs.currency_type =  '".$request->Currency."'";
        }
        $employementtypecondition = '';
        if(trim($request->employementtype)!='') {
            $employementtypecondition="AND jobs.type =  ".$request->employementtype."";
        }
        $countrycondition = '';
        if(trim($request->country)!='') {
            $countrycondition="AND jl.countryid = ".$request->country." AND jl.isActive = 1";
        }
        
        if(trim($request->req_type)!='' && $request->req_type == 'basic'){
            $statecondition = '';
            $citycondition = '';
            if(trim($request->city)!='') {
                $statecondition="AND (st.name = '".$request->city."' OR jl.city = '".$request->city."' )  AND jl.isActive = 1";
            }
        }else{
            $statecondition = '';
            if(trim($request->state)!='') {
                $statecondition="AND jl.regionid = ".$request->state."  AND jl.isActive = 1";
            }
            $citycondition = '';
            if(trim($request->city)!='') {
                $citycondition="AND jl.city = '".$request->city."'  AND jl.isActive = 1";
            }
        }
        Log::info('getActivejobopeningsForJS function Ended.');
        $activejobsforjssearchdata = DB::SELECT("SELECT jobs.*, address.pincode,address.addline1,address.addline2,images.path,jobs.postedts FROM users left join employer on users.uuid = employer.userid left join jobs on employer.id = jobs.employerid left join address on employer.addressid = address.id left join images on images.id = users.logoid left join job_locations jl on jl.job_id = jobs.id left join location st on jl.regionid = st.location_id WHERE jobs.isposted = 1 AND jobs.active = 1 AND jobs.source = 1 AND jobs.id NOT IN ('".implode(',', $jobids)."')  AND jobs.employerid != '".$employerid."'  $keywordcondition $Expectedpckgcondition  $expcondition $Currencycondition $employementtypecondition $countrycondition $statecondition $citycondition GROUP BY jobs.id ORDER BY jobs.updated_at desc");
        return $activejobsforjssearchdata = $this->arrayPaginator($activejobsforjssearchdata, $request);
    }
    
    public function getActivejobopeningsForJSusingNsearch(Request $request){
        Log::info('getActivejobopeningsForJS function Started.');
        $jobids = array();
        $jobappliedbyjs = $this->jobseeker_service->getappliedjobsbylogedinjs();

        $employerid = $this->job_service->getemployeridbylogedinuser();
        if(count($employerid)>0){
            $employerid = $employerid[0]->id;
        }
        else{
            $employerid = "";
        }
        
        foreach ($jobappliedbyjs as $Jobid) {
            array_push($jobids, $Jobid->jobid);
        }
        $keywordcondition = '';
        if(trim($request->keyword)!=''){
            $keywordcondition="AND jobs.jobtitle like '%".$request->keyword."%'";
        }
        $Expectedpckgcondition = '';
        if(trim($request->Expectedpckg)!='') {
            $Expectedpckgcondition="AND jobs.min_salary <=  ".$request->Expectedpckg." AND jobs.max_salary >=".$request->Expectedpckg;
        }
        $expcondition = '';
        if(trim($request->exp)!='') {
            $expcondition="AND jobs.min_years <=  ".$request->exp." AND jobs.max_years >=".$request->exp;
        }
        $Currencycondition = '';
        if(trim($request->Currency)!='') {
            $Currencycondition="AND jobs.currency_type =  '".$request->Currency."'";
        }
        $employementtypecondition = '';
        if(trim($request->employementtype)!='') {
            $employementtypecondition="AND jobs.type =  ".$request->employementtype."";
        }
        $countrycondition = '';
        if(trim($request->country)!='') {
            $countrycondition="AND jl.countryid = ".$request->country." AND jl.isActive = 1";
        }
        $statecondition = '';
        if(trim($request->state)!='') {
            $statecondition="AND jl.regionid = ".$request->state."  AND jl.isActive = 1";
        }
        $citycondition = '';
        if(trim($request->city)!='') {
            $citycondition="AND jl.city = '".$request->city."'  AND jl.isActive = 1";
            $statecondition="AND jl.regionid = ".$request->city."  AND jl.isActive = 1";
        }

      Log::info('getActivejobopeningsForJS function Ended.');

        $activejobsforjssearchdata = DB::SELECT("SELECT jobs.*, address.pincode,address.addline1,address.addline2,images.path,jobs.postedts FROM users left join employer on users.uuid = employer.userid left join jobs on employer.id = jobs.employerid left join address on employer.addressid = address.id left join images on images.id = users.logoid left join job_locations jl on jl.job_id = jobs.id WHERE jobs.isposted = 1 AND jobs.active = 1 AND jobs.source = 1 AND jobs.id NOT IN ('".implode(',', $jobids)."')  AND jobs.employerid != '".$employerid."'  $keywordcondition $Expectedpckgcondition  $expcondition $Currencycondition $employementtypecondition $countrycondition $statecondition $citycondition GROUP BY jobs.id ORDER BY jobs.updated_at desc");

        return $activejobsforjssearchdata = $this->arrayPaginator($activejobsforjssearchdata, $request);
    }

    public function getAppliedjobHistoryusingsearch(Request $request){
        Log::info('getAppliedjobHistory function Started.');
        $jobseekerid = $this->jobseeker_service->getjobseekeridbylogedinuser();
        $jobseekerid = $jobseekerid[0]->id;
        $jobappliedbyjs = $this->jobseeker_service->getappliedjobsbylogedinjs();
        $jobids = array();
        $appliedjobidcondition = '';
        if(count($jobappliedbyjs)>0){
        foreach ($jobappliedbyjs as $Jobid) {
            array_push($jobids, "'".$Jobid->jobid."'");
      }
      $appliedjobidcondition = "AND jobs.id IN (".implode(',', $jobids).") ";
  }
      
      //print_r(implode(',', $jobids)); die();
      $keywordcondition = '';
        if(trim($request->keyword)!='')
        {
            $keywordcondition="AND jobs.jobtitle like '%".$request->keyword."%'";
        }
        $Expectedpckgcondition = '';
        if(trim($request->Expectedpckg)!='')
        {
            $Expectedpckgcondition="AND jobs.min_salary <=  ".$request->Expectedpckg." AND jobs.max_salary >=".$request->Expectedpckg;
        }
        $expcondition = '';
        if(trim($request->exp)!='')
        {
            $expcondition="AND jobs.min_years <=  ".$request->exp." AND jobs.max_years >=".$request->exp;
        }
        $Currencycondition = '';
        if(trim($request->Currency)!='')
        {
            $Currencycondition="AND jobs.currency_type =  '".$request->Currency."'";
        }
         $employementtypecondition = '';
        if(trim($request->employementtype)!='')
        {
            $employementtypecondition="AND jobs.type =  ".$request->employementtype."";
        }
        $countrycondition = '';
        if(trim($request->country)!='')
        {
            $countrycondition="AND jl.countryid = ".$request->country." AND jl.isActive = 1";
        }
        $statecondition = '';
        if(trim($request->state)!='')
        {
            $statecondition="AND jl.regionid = ".$request->state."  AND jl.isActive = 1";
        }
        $citycondition = '';
        if(trim($request->city)!='')
        {
            $citycondition="AND jl.city = '".$request->city."'  AND jl.isActive = 1";
        }

        Log::info('getAppliedjobHistory function Ended.');

        $appliedjobsbyjssearchdata = DB::SELECT("SELECT jobs.*,ja.id as applicationid,ja.jobseekerid as applicantid,ja.jobid as jobid,ja.created_at as application_created_date FROM jobs LEFT JOIN job_applications as ja ON ja.jobid = jobs.id LEFT JOIN job_locations jl on jl.job_id = jobs.id WHERE  ja.jobseekerid = '".$jobseekerid."'  AND jobs.isposted = 1 AND jobs.active = 1 AND jobs.source = 1 $appliedjobidcondition $keywordcondition $Expectedpckgcondition  $expcondition $Currencycondition $employementtypecondition $countrycondition $statecondition $citycondition  GROUP BY jobs.id ORDER BY ja.updated_at desc");

        return $appliedjobsbyjssearchdata = $this->arrayPaginator($appliedjobsbyjssearchdata, $request);
    }

    public function arrayPaginator($array, $request)
{
    $page = Input::get('page', 1);
    $perPage = 12;
    $offset = ($page * $perPage) - $perPage;

    return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
        ['path' => $request->url(), 'query' => $request->query()]);
}


}


?>