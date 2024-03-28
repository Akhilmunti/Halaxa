<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\UUID;
use App\AssessmentTest;
use App\TestResults;
use Illuminate\Support\Facades\Log;

/*
this class is used to call users functions.
 */
class AssessmentTestServices{
    //Pass the parameters
    

    /**
     * Get AssessmentTestServices.
     *
     * @param  null
     * @return App\AssessmentTestServices
     */

    public function __construct()
    {
       /*  $this->location_service = new LocationServices();
        $this->user_service = new UserServices();
        $this->jobseeker_service = new JobSeekerServices();
        $this->utility_service = new JobServices(); */
    }

    /**
    * Get Url for the test to start test.
     * @param string
    * @param string
    * @param bool
    * @param bool
    * @param bool
    * @return string
    */
    
    function getTestUrl($userid, $testid, $returnurl, $enabledev, $enabledebug, $enablereuse) {
		$testurl = "";
		$dev = "false";
		$debug = "false";
		$reuse = "false";
		if(Constants::ENABLE_DEV==true)
		{
			$dev = "false";
		}
		if(Constants::ENABLE_DEBUG==true)
		{
			$debug = "false";
		}
		if(Constants::ENABLE_USE==true)
		{
			$reuse= "false";
		}
		
		$postfields = array('partnerid'=>Constants::PARTNER_ID,'password'=>Constants::PASSWORD, 'partneruserid'=>$userid, 'testid'=>$testid, 'returnURL'=>Constants::RETURN_URL, 'dev'=>$dev, 'debug'=>$debug, 'reuse'=>$reuse);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, /*$apicallurl*/Constants::GENERATE_TEST_URL);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // On dev server only!
		
		$testurl = curl_exec($ch);
		return $testurl;
    }
    
    /**
     * Get List by using cURL and get all the tests from the experts rating...
     * @return List of test
     */
    function cURL_call($requestBody){

        
        $requestBody1 = '';
        switch($requestBody){
            case "TEST_LIST":
            $requestBody1 = Constants::GET_TEST_LIST_REQUEST_BODY;
            break;
            case "ALL_USER_TEST_RESULTS":
                $fromDate = date('Y-m-d\T00:00:01\Z', strtotime("-1 days"));// to make is back day
                $toDate = date('Y-m-d\T23:59:59\Z');
                $requestBody1 = sprintf(Constants::GET_ALL_USER_TEST_RESULTS_REQUEST_BODY, $fromDate, $toDate);
            break;
        }
        //echo htmlentities($requestBody1); exit;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, Constants::TEST_API_BASE_URL);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody1);
        
        // add array of required headers
		$headers = array();
		$headers[] = "Content-Type: application/x-www-form-urlencoded";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        // execute cURL and get the data
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		// close cURL resource, and free up system resources
        curl_close($ch);
        //echo htmlentities($result);exit;
		return htmlentities($result);
    }
    
    /**
     * Store all the tests in test  
     * @return null
     */
     function store_tests(){
         // get the output in xml format and encode that into html format and read 
        $xml =  simplexml_load_string(html_entity_decode($this->cURL_call("TEST_LIST")));
        if ($xml === false) {
            echo "Failed loading XML: ";
            foreach(libxml_get_errors() as $error) {
                echo "<br>", $error->message;
            }
        } else {
            $seen=array();
            foreach ($xml->children() as $row) {
                $child_xml = simplexml_load_string($row);
                //print_r($child_xml);exit;
                foreach ($row as $child => $values) { 
                    foreach($values as $value){
                        $assessmentTest = new AssessmentTest();
                        $count = AssessmentTest::where('id', '=', $value['test_id'])->count();
                        if($count==0){
                        $assessmentTest->id = $value['test_id'];
                        $assessmentTest->test_name = $value['test_name'];
                        $assessmentTest->coverage = $value['coverage'];
                        $assessmentTest->total_questions = $value['total_questions'];
                        $assessmentTest->duration = $value['duration'];
                        $assessmentTest->passing_marks = $value['passing_marks'];
                        $assessmentTest->category = $value['category'];
                        $assessmentTest->save();
                        }
                    }
            }
            }
        }	
     }

     /**
      * To get test results of users who have given tests and store in test results table.
      * @return null
      */

      public function getAllUserTestResults(){
        // get the output in xml format and encode that into html format and read 
        //code here..
        Log::info('getAllUserTestResults from Experts Rating on AssessmentTest Service function started.');
        $xml =  simplexml_load_string(html_entity_decode($this->cURL_call("ALL_USER_TEST_RESULTS")));
        //print_r($xml);exit;
        
        if ($xml === false) {
            echo "Failed loading XML: ";
            foreach(libxml_get_errors() as $error) {
                echo "<br>", $error->message;
            }
        } else {
            $seen=array();
            foreach ($xml->children() as $row) {
                $child_xml = simplexml_load_string($row);
                //print_r($child_xml);exit;
                foreach ($row as $child => $values) { 
                    foreach($values as $value){
                        //print_r($value);
                        /* Array ( [user_id] => 65d9f9b6-22cf-4869-af49-db737f3e8199 [transcript_id] => 5766897 [test_id] => 73 [time] => 2019-01-03T09:08:06Z [test_name] => Computer Skills Test [percentage] => 30 [test_result] => FAIL [percentile] => 4 [average_score] => 0 ) )*/
                        $count = TestResults::where('test_tracking_id', '=', $value['user_id'])->where('testid', '=', $value['test_id'])->where('transcript_id', '=', $value['transcript_id'])->count();
                        if($count==0){
                        $testresult = new TestResults();
                        $uuttid = UUID::v4();
                        $testresult->id = $uuttid;
                        $testresult->test_tracking_id = $value['user_id'];
                        $testresult->transcript_id = $value['transcript_id'];
                        $testresult->testid = $value['test_id'];
                        $testresult->test_name = $value['test_name'];
                        $testresult->percentage = $value['percentage'];
                        $testresult->percentile = $value['percentile'];
                        $testresult->average_score = $value['average_score'];
                        $testresult->test_result = $value['test_result'];
                        $testresult->save();
                        }
                   
                    }
                }
            }
        }	
    Log::info('getAllUserTestResults from Experts Rating on AssessmentTest Service function ended.');
    }
    
    /* Code By Anand Starts */
    function getOnlineTestURL($apicallurl, $partnerid, $password, $partneruserid, $testid, $returnurl, $enabledev, $enabledebug, $enablereuse) {
	
		$testurl = "";
		$dev = "false";
		$debug = "false";
		$reuse = "false";
		if($enabledev==true)
		{
			$dev = "true";
		}
		if($enabledebug==true)
		{
			$debug = "true";
		}
		if($enablereuse==true)
		{
			$reuse= "true";
		}
		
		$postfields = array('partnerid'=>$partnerid,'password'=>$password, 'partneruserid'=>$partneruserid, 'testid'=>$testid, 'returnURL'=>$returnurl, 'dev'=>$dev, 'debug'=>$debug, 'reuse'=>$reuse);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $apicallurl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // On dev server only!

		$testurl = curl_exec($ch);
		return $testurl;
	}
    
    /* Code By Anand Ends */
    
}
?>