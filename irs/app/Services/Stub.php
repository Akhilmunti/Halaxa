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
use App\Services\UUID;
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



class Stub
{   

    private $userName;
    private $authKey;
    
    function __construct($authKey, $userName = Constants::USER_NAME) 
    {
       
        if ($userName==null || $authKey==null)
        {
            echo Constants::MSG_MUST_SET_USER_AUTH;
        }
        $this->userName = $userName;
        $this->authKey = $authKey;
    }

    public function getApplication($apiAddress, $returnDataFormat = Constants::JSON, $after=null, $size=null, $offset=null)
    {
        $getParams = array("after"=>$after, "size"=>$size, "offset"=>$offset);
        $resultArr = $this->makeGetRequest($apiAddress, $returnDataFormat, $getParams);
        return $this->resultWrapper($resultArr["httpCode"], $resultArr["result"]);
    }
    
    
    public function addRequirement($apiAddress, $requirementData, $returnDataFormat = Constants::JSON)
    {
        //Log.info('addRequirement started');
        $requirementData = json_encode(json_decode($requirementData, TRUE));
        $resultArr = $this->makePostRequest($apiAddress, $returnDataFormat, $requirementData);
        return $this->resultWrapper($resultArr["httpCode"], $resultArr["result"]);
        //Log.info('addRequirement Ended');
    }
    
    private function makeGetRequest($apiAddress, $returnDataFormat, $getParams)
    {
        $curlObj = $this->setupCurl($apiAddress, $returnDataFormat, $getParams);
        $result = curl_exec($curlObj);
        $httpCode = curl_getinfo($curlObj, CURLINFO_HTTP_CODE);
        curl_close($curlObj);
        return array("result"=>$result, "httpCode"=>$httpCode);
    }

    private function makePostRequest($apiAddress, $returnDataFormat, $requirementData)
    {
        $curlObj = $this->setupCurl($apiAddress, $returnDataFormat, $requirementData, Constants::POST);
        $result = curl_exec($curlObj);
        $httpCode = curl_getinfo($curlObj, CURLINFO_HTTP_CODE);
        curl_close($curlObj);
        return array("result"=>$result, "httpCode"=>$httpCode);
    }

    private function setupCurl($apiAddress, $returnDataFormat, $params, $requestType = Constants::GET)
    {
        $curlObj = curl_init();
        $header = $this->setupRequestHeader($returnDataFormat);
        
        $options = array(
                    CURLOPT_RETURNTRANSFER => TRUE,
                    CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
                    CURLOPT_USERPWD => "$this->userName:$this->authKey",
                    CURLOPT_ENCODING => '',
                    CURLOPT_HTTPHEADER => $header);
        
        switch ($requestType)
        {
            case Constants::GET:
                $formattedParams = $this->formatApiParams($params);
                $urlWithParams = $formattedParams==""?$apiAddress:$apiAddress."?$formattedParams";
                $options[CURLOPT_URL] = $urlWithParams;
                break;
            case Constants::POST:
                $options[CURLOPT_URL] = $apiAddress;
                $options[CURLOPT_CUSTOMREQUEST] = "POST";
                $options[CURLOPT_POSTFIELDS] = $params;
        }
        curl_setopt_array($curlObj, $options);
        return $curlObj;
    }
    
    private function setupRequestHeader($returnDataFormat)
    {
        $header = array();
        switch ($returnDataFormat)
        {
            case Constants::JSON:
                $header[] = "Accept: application/json"; 
                $header[] = "Content-Type: application/json";
                break;
            case Constants::XML:
                $header[] = "Accept: application/xml"; 
                $header[] = "Content-Type: application/xml";
                break;
        }
        return $header;
    }
            
    private function resultWrapper($httpCode, $result)
    {
        switch ($httpCode)
        {
            case Constants::HTTP_SUCCESS:
                return $result;
            case Constants::HTTP_CREATED:
                return $result;
            case Constants::HTTP_NOT_FOUND:
               // Log.error('HTTP_NOT_FOUND:Incorrect Address');
                //throw new Exception($result==null?"Incorrect Address": $result, Constants::HTTP_NOT_FOUND);
            case Constants::HTTP_UNAUTHORIZED:
               // Log.error('HTTP_UNAUTHORIZED:Incorrect Username or authKey');
                //throw new Exception($result==null?"Incorrect Username or authKey":$result, Constants::HTTP_UNAUTHORIZED);
            case Constants::HTTP_FORBIDDEN:
               // Log.error('HTTP_FORBIDDEN:Forbidden');
                //throw new Exception($result==null?"Forbidden":$result, Constants::HTTP_FORBIDDEN);
            case Constants::HTTP_VALIDATION_ERROR:
                //Log.error('HTTP_VALIDATION_ERROR:Validation Error');
                //throw new Exception($result==null?"Validation Error":$result, Constants::HTTP_VALIDATION_ERROR);
            default:
                //throw new Exception("Unknown Error", $httpCode);
               // Log.error('Unknown Error:Unknown Error');
        }
    }

    private function formatApiParams($params)
    {
        $paramArr = [];
        foreach ($params as $key => $value)
        {
            if ($value!=null) {
                $paramArr[] = "$key=$value";
            }
        }
        return implode("&", $paramArr);
    }
}
?>