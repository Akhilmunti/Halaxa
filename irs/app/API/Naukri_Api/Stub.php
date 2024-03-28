<?php

include 'Constants.php';

class Stub
{   
    private $userName;
    private $authKey;
    
    function __construct($authKey, $userName = Constants::USER_NAME) 
    {
        echo $userName;
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
        $requirementData = json_encode(json_decode($requirementData, TRUE));
        $resultArr = $this->makePostRequest($apiAddress, $returnDataFormat, $requirementData);
        return $this->resultWrapper($resultArr["httpCode"], $resultArr["result"]);
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
                throw new Exception($result==null?"Incorrect Address": $result, Constants::HTTP_NOT_FOUND);
            case Constants::HTTP_UNAUTHORIZED:
                throw new Exception($result==null?"Incorrect Username or authKey":$result, Constants::HTTP_UNAUTHORIZED);
            case Constants::HTTP_FORBIDDEN:
                throw new Exception($result==null?"Forbidden":$result, Constants::HTTP_FORBIDDEN);
            case Constants::HTTP_VALIDATION_ERROR:
                throw new Exception($result==null?"Validation Error":$result, Constants::HTTP_VALIDATION_ERROR);
            default:
                throw new Exception("Unknown Error", $httpCode);
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