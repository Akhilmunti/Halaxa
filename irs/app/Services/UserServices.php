<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\User;
use App\Users_Role;
use App\Role;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Services\UUID;
use App\Services\JobServices;
use App\Services\JobSeekerServices;
use App\Notifications\UserNotifications;
use Illuminate\Support\Facades\Log;
use Session;

/*
this class is used to call users functions.
*/
class UserServices{

    /**
     * Get a user check either user exist for requested data.
     *
     * @param  array  $data
     * @return App\User
     */
    public function checkUserExist(array $data){
       Log::info('checkUserExist function Started.');
        $user = User::with('roles')->where('email', '=', $data['userid'])->where('isactive', '=', 1)->first();
        if(!isset($user)){
            //If user is not exist then create a new user
            $user =  $this->create($data);
           //  $user =  $this->additional($data);
        }
        //print_r($user);exit;
        Log::info('checkUserExist function Ended.');
        return $user; 
    }
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



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    { 
        Log::info('create function Started.');
        $timestamp =  date("Y-m-d H:i:s");
       $user = User::create([
            'name' => $data['name'],
            'email' => $data['userid'],
            'uuid' => UUID::v4(),
            // here we are using token as the users password and storing token with Hash encryption 
            'password' => Hash::make($data['token']),
            'login_token' => $data['token'],
            'created_at' => $timestamp,
        ]);
        
        //insert data in associated tables if data inserted in users table....
        /* if(isset($user)){
            // get role_id by using role name...
            $role_id = $this->getRoleIdByRoleName($data['role']);
           $this->addUserRole($user->uuid, $role_id);
        }  */ 
        Log::info('create function Ended.');
        return $user;
    }

    public function doLogin($data, Request $request)
    {
    Log::info('doLogin function Started.');
    // validate the info, create rules for the inputs
    $rules = array(
        'email'    => 'required|email', // make sure the email is an actual email
        'password' => 'required' // password can only be alphanumeric and has to be greater than 3 characters
    );

    // run the validation rules on the inputs from the form
    $validator = Validator::make($data, $rules);

    // if the validator fails, redirect back to the form
    if ($validator->fails()) {
        Log::info('doLogin function Ended and failed.');
        return Redirect::to('/')
            ->withErrors($validator) // send back all errors to the login form
            ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
    } else {
        // attempt to do the login
        if (Auth::attempt($data)) {
            // validation successful!
            // redirect them to the secure section or whatever
            // return Redirect::to('secure');
            // for now we'll just echo success (even though echoing in a controller is bad)
            Log::info('doLogin function Ended and uthenticated.');
            $jobSeekerServices = new JobSeekerServices();
            $jobSeekerServices->add_jobseeker();
            return $this->redirect_user($request->role);
        } else {        
            // validation not successful, send back to form 
            Log::info('doLogin function Ended and failed.');
           return back()->with('role_error', 'Failed to find that user!');
        }
    }
    }
    /** This function add users role to users role table.
    *
    * @param  string uuid, string role_id
    * @return void
    */
    protected function addUserRole($uuid, $role_id){
        Log::info('addUserRole function Started.');
            Users_Role::create([
                'user_id' => $uuid,
                'role_id' => $role_id,
            ]);
        Log::info('addUserRole function Ended.');
    }
    /** Get role id by using role name 
    *
    * @param  string role_name
    * @return role_id
    */
    protected function getRoleIdByRoleName($role_name){
        Log::info('getRoleIdByRoleName function Started.');
        $roles = Role::where('role_name', '=', $role_name)->first();
        Log::info('getRoleIdByRoleName function Ended.');
        return $roles->role_id;
    }

    /** Get role id by using role name 
    *
    * @param  string uuid
    * @return role_id
    */
    protected function getRoleNameByUuid($uuid){
        Log::info('getRoleNameByUuid function Started.');
        $user = User::with('roles')->where('uuid', '=', $uuid)->where('isactive', '=', 1)->first();
        Log::info('getRoleNameByUuid function Ended.');
        return $user->roles->first()->role_name;
        // return view('layouts.header')->withUser($user);
    }

      /** Get role id by using role name 
    *
    * @param  App\User user
    * @return redirct
    */
    public function authenticated(){
        Log::info('authenticated function Started.');
        $redirect = $this->getRoleNameByUuid(Auth::user()->uuid);
            $data = array(
                'message' => 'A try to pass data from controller.',
                'action' => 'no need for action'
            );
            Auth::user()->notify(new UserNotifications($data));
            Log::info('authenticated function Ended.');
        return redirect(strtolower($redirect));
    }
    /*
    Redirect to user as per the requested url.
    */
    public function redirect_user($role){
        //echo $role;exit;
        if($role!=''){
        if($role==config('app.Job_Seeker')){
            return redirect()->route('JobSeekerDashboard');
        }elseif($role==config('app.Employer')){
            return redirect()->route('employerdashboard');
        }elseif($role=="HOME"){
            return redirect('home/profile');
        }
        }else {
            return back();
        }
    }

    public function getLoggedInUser(){
        Log::info('getLoggedInUser function Started.');
        $uuid = (Auth::user()->uuid);
        $user = User::with('roles')->where('uuid', '=', $uuid)->where('isactive', '=', 1)->first();
        Log::info('getLoggedInUser function Ended.');
       return $user;
    }


    public function getLoggedInEmployerProfile(){
        Log::info('getLoggedInEmployerProfile function Started.');
        $uuid = (Auth::user()->uuid);
        Log::info('getLoggedInEmployerProfile function Ended.');
        return  DB::table('users')
        ->join('employer', 'users.uuid', '=', 'employer.userid')
        ->join('address', 'employer.addressid', '=', 'address.id')
        ->leftJoin('location as statelocation', 'statelocation.location_id', '=', 'address.regionid')
        ->leftJoin('location as countrylocation', 'countrylocation.location_id', '=', 'address.countryid')
        ->leftJoin('images', 'images.id', '=', 'users.logoid')
        ->select('users.company','users.name','employer.company_type','employer.website','employer.about','employer.estimated_vacancies','address.city','address.pincode','address.addline1','address.addline2','statelocation.name as statename','countrylocation.name as countryname','images.path','address.regionid','address.countryid')
        ->where('users.isactive', '=', 1)
        ->where('users.uuid', '=', $uuid)
        ->get(); 
       
    }


    public function editEmployerProfile(Request $request){
        Log::info('editEmployerProfile function Started.');
        $this->job_service = new JobServices();
        $uuid = Auth::user()->uuid;
        $employerid = $this->job_service->getemployeridbylogedinuser();
        $employerAddressid = $this->job_service->getaddressidbylogedinuser();
        $employerlogoid = $this->job_service->getlogoidbylogedinuser();
        // echo $employerid[0]->id;
        // echo $employerAddressid[0]->addressid;
        // echo $employerlogoid[0]->logoid;
       // die();
        // $Address = new Address;

        $AddrsEmployerData = [
        'pincode' => $request->pincode,
        'addline1' => trim($request->Address)];

       // $Employer = new Employer;

        $EmployerData = [
        'company_type' => $request->companytype,
        'website' => $request->website,
        'about' => trim($request->About),
        'updatedts' => \Carbon\Carbon::now()->toDateTimeString()];
        //Users table data 
        $username = Auth::user()->name;
        $companyname = ucwords($request->companyname);
        $companytype = $request->companytype;

        //$urlimage='';
         //$ProfileImageName = '';
        //  print_r($request->emp_photo);
        // print_r($request->employer_logo); die();
          /*$request->hasFile('employer_logo'); 
        if($request->hasFile('employer_logo')){
           $extimage = $request->employer_logo->getClientOriginalExtension();
           $ProfileImageName =  date('Y_m_d_H_i_s').'_'.$username.'.'.$extimage;
          $request->employer_logo->move(public_path('images/employer'), $ProfileImageName); 
            
           DB::table('images')->where('id', $employerlogoid[0]->logoid)->update(['path' => $ProfileImageName]);
        }*/
        if(trim($request->emp_photo)!=''){     
           DB::table('images')->where('id', $employerlogoid[0]->logoid)->update(['path' => $request->emp_photo]);
        }

        // $image = new image;


        DB::table('users')->where('uuid', $uuid)->update(['company' => $companyname,'type' => $companytype]);
        
        DB::table('employer')->where('id', $employerid[0]->id)->update($EmployerData);
        DB::table('address')->where('id', $employerAddressid[0]->addressid)->update($AddrsEmployerData);  

        Log::info('editEmployerProfile function Ended.'); 
       return 'Profile Updated Successfully';
    }

     public function getrolebyuserid($userid){
        Log::info('getrolebyuserid function Started.');
        // $user = User::with('roles')->where('uuid', '=', $userid)->where('isactive', '=', 1)->first();
        Log::info('getrolebyuserid function Ended.');
       return $user = Users_Role::where("user_id", "=",$userid)->first()->role_id;
     }

     

}


