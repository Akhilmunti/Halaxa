<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\User;
use App\Users_Role;
use App\Role;
use App\Job;
use App\Jobs_seed_data_type;
use App\Jobs_seed_data;
use App\Currency;
use App\Location;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Services\UUID;
use App\Notifications\UserNotifications;
use Illuminate\Support\Facades\Log;
use Session;
/*
this class is used to call users functions.
 */
class LocationServices
{

    /**
     * Get Country.
     *
     * @param  null
     * @return App\Location.
     */
    
     public function getStateAndCities(){
        Log::info('getCountry function Started.');
        Log::info('getCountry function Ended.');
        return Location::where("location_type", "=", 3 )->orWhere("location_type", "=", 1)->orderBy('name', 'ASC')->get();
    }
    
    public function getCountry()
    {
        Log::info('getCountry function Started.');
        Log::info('getCountry function Ended.');
        return Location::where("location_type", "=", 0 )->where("parent_id", "=", 0)->orderBy('name', 'ASC')->get();
    }

    public function getCurrency()
    {
      Log::info('getCurrency function Started.');
      Log::info('getCurrency function Ended.');
      return Currency::get();
    }

    public function getStateByCountryID($cid)
    {
      Log::info('getStateByCountryID function Started.');
      Log::info('getStateByCountryID function Ended.');
      return Location::where('location_type', '=', '1')->where('parent_id', '=', $cid)->orderBy('name', 'ASC')->get();
    }
    public function getStateNameByStateID($cid,$sid)
    {
      Log::info('getStateNameByStateID function Started.');
      Log::info('getStateNameByStateID function Ended.');
      return Location::where('location_type', '=', '1')->where('parent_id', '=', $cid)->where('location_id', '=', $sid)->orderBy('name', 'ASC')->get();
    }

    public function getCityByStateID($sid)
    {
      Log::info('getCityByStateID function Started.');
      Log::info('getCityByStateID function Ended.');
      return Location::where('location_type', '=', '3')->where('parent_id', '=', $sid)->orderBy('name', 'ASC')->get();
    }
     public function getCountryByCounryID($cid)
    {
      Log::info('getCountryByCounryID function Started.');
      Log::info('getCountryByCounryID function Ended.');
        return Location::where("location_type", "=", 0 )->where("parent_id", "=", 0)->where('location_id', '=', $cid)->orderBy('name', 'ASC')->get();
    }
    
    public function getStateNameList() {
        Log::info('getStateNameByStateID function Started.');
        Log::info('getStateNameByStateID function Ended.');
        return Location::where('location_type', '=', '1')->orderBy('name', 'ASC')->get();
    }

    public function getCountryNameList() {
        Log::info('getCountryByCounryID function Started.');
        Log::info('getCountryByCounryID function Ended.');
        return Location::where("location_type", "=", 0)->orderBy('name', 'ASC')->get();
    }
    
    

}     