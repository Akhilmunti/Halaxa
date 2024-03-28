<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Users_Role;
use App\Role;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Services\UserServices;
use App\Notifications\UserNotifications;
use Illuminate\Support\Facades\Log;
use Session;


class UserController extends Controller
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
        $this->middleware('guest', ['except' => ['logout', 'getLogout', 'logout1']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   Log::info('index function Started.');
        Log::info('index function Ended.');
        return view('home');
    }

   /**
     * check & create user if not exist..
     *  @request get the requird parameters...
     *
     * @param  array  $request
     */
    public function createUser(Request $request){
    Log::info('createUser function Started.');
     
    //echo Auth::check(); exit;
    // if(){}
    /**
     * Validation check for every parameter in request
     * @request get the requird parameters...
     * @param  Request $request
     */
    if ($this->validator($request)->fails()) {
       return redirect('/')
                   ->withErrors($this->validator($request))
                   ->withInput(); 
        }  
    
    // Auto register function logic..

    //check user exist 
    $user = $this->user_service->checkUserExist($request->all());
       $data = array();
        if(isset($user)){
            $password = $request->token;
            $data = ['email'=>$user->email,
            'password'=>$password];      
            //echo $this->user_service->checkUserRole($user, $request->role);die();

            /*
            removed user role check as they want same user can login with both users.
            
            /* if($this->user_service->checkUserRole($user, $request->role)==''){
                return back()->with('role_error', 'Failed to find that user with '.$request->role.' role!');
            }
            else
            {  */ 
                //print_r($data);die();
                return $this->user_service->doLogin($data, $request);
            //}
        }
        Log::info('createUser function Ended.');
} 

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        Log::info('validator function Started.');
        return $validator =  Validator::make($request->all(), [
            'userid' => 'required|string|email|max:255',
            'token' => 'required|string',
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:15',
        ]);
        

    //     $validator = $request->validate([
    //     'userid' => 'required|string|email|max:255',
    //     'token' => 'required|string',
    //     'name' => 'required|string|max:255',
    //     'role' => 'required|string|max:10',
    // ]);
    // return  $validator;
    Log::info('validator function Ended.');
}

public function logout() {
        Log::info('logout function Started.');
        Auth::logout();
        Session::flush();
        Log::info('logout function Ended.');
        return redirect()->to(config('constants.base.social_url').'login/logout');  
}

public function logout1() {
        //echo "hi"; exit;
        Log::info('logout1 function Started.');
        Auth::logout();
        Session::flush();
        Log::info('logout1 function Ended.');
        return redirect()->to(config('constants.base.social_url'));  
}

public function authenticate(Request $request)
{
    Log::info('authenticate function Started.');
    Log::info('authenticate function Ended.');
        $this->user_service->authenticated();
}
        
}

