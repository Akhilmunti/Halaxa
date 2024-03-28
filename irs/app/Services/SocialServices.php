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
use App\Questions;
use Session;

/*
  this class is used to call users functions.
 */

class SocialServices {

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
        $this->job_service = new JobServices();
        $this->utility_service = new JobServices();
    }

    public function getQuestionBank() {
        Log::info('get question bank function Started.');
        //$EmployerId = $this->getemployeridbylogedinuser();
        Log::info('get question bank function Ended.');
        //return DB::connection('mysql2')->table("questions")->get();
        return Questions::where("question_status", "=", 1)->get();
    }


}

?>