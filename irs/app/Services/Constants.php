<?php

namespace App\Services;

use Illuminate\Http\Request;
use Session;

class Constants
{
    const JSON = 1;
    const XML = 2;
    const GET = 1;
    const POST = 2;
    const HTTP_SUCCESS = 200;
    const HTTP_CREATED = 201;
    const HTTP_VALIDATION_ERROR = 400;
    const HTTP_NOT_FOUND = 404;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_FORBIDDEN = 403;
    const USER_NAME = "appKey";//appKey
    const N_PASSWORD = "c50e8d062a0664ecca30c77f9df883c9d2d807d09a8a69f82b5658be7cbc9a58";
    const MSG_NOT_EMPTY_USER_AUTH = "Username or Auth key cannot be empty";
    const MSG_MUST_SET_USER_AUTH = "Username and Auth key must be set before calling APIs";

    // constants for Assessment test APIs
    const PARTNER_ID = "1222166";
    const PASSWORD = "f1o2o2d2l1i6n6ked";
    const PARTNER_USER_ID = "foodlinkedtestuser2";
    const TEST_ID = "6682";
    const RETURN_URL = "http://www.foodlinked.co.in/";
    const ENABLE_DEV = false;
    const ENABLE_DEBUG = true;
    const ENABLE_USE = true;
    const TEST_API_BASE_URL = "https://assessment.foodlinked.com/webservices/";
    const GENERATE_TEST_URL = "https://assessment.foodlinked.com/webservices/GenerateTicket.aspx";
   
   
    //get data from social media application
    const FETCH_SCHOOLS = "https://foodlinked.co.in/social_api/fetch_schools.php";
    const FETCH_MEMBER_AVAILABILITY = "http://foodlinked.co.in/social_api/fetch_members_scheduled.php";
    const FETCH_CANDIDATE_AVAILABLE = "https://foodlinked.co.in/social_api/get_members_by_schoolname.php";
    const POST_SUBMIT_OFFER_DATA = "https://foodlinked.co.in/social_api/members_submit_offer.php";
    const FETCH_ISSUED_OFFERS = "http://foodlinked.co.in/social_api/get_members_by_employee.php";
    const POST_MEMBERS_WITHDRAW_OFFER = "https://foodlinked.co.in/social_api/members_withdraw_offer.php";
    const POST_MEMBER_RE_OFFER = "https://foodlinked.co.in/social_api/members_re_offer.php";

    const GET_TEST_LIST_REQUEST_BODY = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><request><authentication partnerid=\"".Constants::PARTNER_ID."\" password=\"".Constants::PASSWORD."\" /><method name=\"GetTestList\" /></request>";

    const GET_ALL_USER_TEST_RESULTS_REQUEST_BODY = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><request><authentication partnerid=\"".Constants::PARTNER_ID."\" password=\"".Constants::PASSWORD."\" /><method name=\"GetAllUserTestsInfo\" /><parameters><parameter name=\"from_date\">%s</parameter><parameter name=\"to_date\">%s</parameter><parameter name=\"errorsonly\">1</parameter><parameter name=\"user_id\"></parameter>;</parameters></request>";

    /* const GET_TEST_LIST_REQUEST_BODY = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><request><authentication partnerid=\"".Constants::PARTNER_ID."\" password=\"".Constants::PASSWORD."\" /><method name=\"GetTestList\" /></request>";

    const GET_TEST_LIST_REQUEST_BODY = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><request><authentication partnerid=\"".Constants::PARTNER_ID."\" password=\"".Constants::PASSWORD."\" /><method name=\"GetTestList\" /></request>";

    const GET_TEST_LIST_REQUEST_BODY = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><request><authentication partnerid=\"".Constants::PARTNER_ID."\" password=\"".Constants::PASSWORD."\" /><method name=\"GetTestList\" /></request>"; */
    
}
?>
