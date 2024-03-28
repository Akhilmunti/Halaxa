<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Socialauthentication extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('association_model');
        $this->load->model('social_model');
        $this->load->model('rfq_model');
        $this->load->library('email');
        $this->load->library('facebook');
        error_reporting(0);
        //error_reporting(E_ALL);
        //ini_set('display_socials', 1);
    }

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        if ($mUserId) {
            $conneted_users[0] = $this->session->userdata('User_Id');
            $data['connected_users'] = $conneted_users;
            if ($mUserId == NULL) {
                $data['Hidden_User_Id'] = $this->session->userdata('User_Id');
                $data['Name'] = $this->session->userdata('Username');
            } else {
                $data['Hidden_User_Id'] = '';
                $data['Name'] = $this->users_model->get_user_by_id($mUserId)->Name;
            }
            $data['posts'] = $this->social_model->get_elements($mUserId);
            $data['likes'] = $this->social_model->get_likes($mUserId);
            $data['users'] = $this->rfq_model->getUsers();
            $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
            $data['logMessages'] = $this->users_model->getLogs($mUserId);
            $data['activeMywall'] = "social-nav-active";
            //echo '<pre>';print_r($data['posts']);exit;	
            $this->load->view('social/home', $data);
        } else {
            redirect('home/register');
        }
    }

    public function facebook() {
        $fbData = array();
        // Check if user is logged in
        if ($this->facebook->is_authenticated()) {
            // Get user facebook profile details
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture');
            // Preparing data for database insertion
            $fbData['oauth_provider'] = 'facebook';
            $fbData['oauth_uid'] = !empty($fbUser['id']) ? $fbUser['id'] : '';
            $fbData['first_name'] = !empty($fbUser['first_name']) ? $fbUser['first_name'] : '';
            $fbData['last_name'] = !empty($fbUser['last_name']) ? $fbUser['last_name'] : '';
            $fbData['email'] = !empty($fbUser['email']) ? $fbUser['email'] : '';
            $fbData['gender'] = !empty($fbUser['gender']) ? $fbUser['gender'] : '';
            $fbData['picture'] = !empty($fbUser['picture']['data']['url']) ? $fbUser['picture']['data']['url'] : '';
            $fbData['link'] = !empty($fbUser['link']) ? $fbUser['link'] : '';

            $checkUserFbstatus = $this->users_model->checkFbUser($fbData['oauth_uid']);
            if ($checkUserFbstatus != "") {
                $this->session->set_userdata('Username', $checkUserFbstatus->Username);
                $this->session->set_userdata('User_Id', $checkUserFbstatus->User_Id);
                $this->session->set_userdata('Name', $checkUserFbstatus->Name);
                $this->session->set_userdata('Photo', $checkUserFbstatus->Photo);
                $this->session->set_userdata('Company', $checkUserFbstatus->Company_name);
                redirect('Socialauthentication', $data);
            } else {
                $checkEmailExist = $this->users_model->check_email_exist($fbData['email']);
                if ($checkEmailExist) {
                    $this->session->set_flashdata('social', 'This Email already exists, try login with the same email.');
                } else {
                    $data = array(
                        'Name' => $fbData['first_name'],
                        'Username' => $fbData['first_name'] . $fbData['last_name'],
                        'Email' => $fbData['email'],
                        'Created_On' => date("Y-m-d H:m:s"),
                        //here 2 is facebook user
                        'Signup_Through' => "2",
                        'social' => "1",
                        'FB_Id' => $fbData['oauth_uid']
                    );
                    $insertid = $this->users_model->add_user($data);
                    if ($insertid) {
                        $logData = array(
                            'log' => $postData->first_name . $postData->last_name . " Registered through Facebook.",
                            'User_Id' => $insertid,
                        );
                        $this->users_model->add_log($logData);
                        $this->load->library('email');
                        $config = array(
                            'mailtype' => 'html',
                            'charset' => 'utf-8',
                            'priority' => '1'
                        );
                        $this->email->initialize($config);
                        $this->email->from('info@foodlinked.co.in', 'Foodlinked Social');
                        $this->email->to($checkEmailExist->Email);
                        $this->email->subject('Thanks for registering with Foodlinked Social!!');
                        $this->email->message("Thank you:" . $this->input->post('Name'));
                        $result = $this->email->send();
                        $this->session->set_flashdata('social', 'Added Successfully, Please goto Sign in page and login.');
                    } else {
                        $this->session->set_flashdata('social', 'Something went wrong');
                    }
                }
            }
            $data['userData'] = $fbData;
            $this->facebook->destroy_session();
            redirect('home/register', $data);
        } else {
            // Get login URL
            $fbData['authURL'] = $this->facebook->login_url();
            redirect($fbData['authURL'], $data);
        }
    }

    public function google() {
        require_once APPPATH . "libraries/google-api-php-client-1-master/src/Google/autoload.php";

        $client_id = GP_CLIENT_ID;
        $client_secret = GP_CLIENT_SECRET;
        $redirect_uri = GP_REDIRECT_URI;
        $simple_api_key = GP_API_KEY;

        // Create Client Request to access Google API
        $client = new Google_Client();
        $client->setApplicationName("PHP Google OAuth Login Example");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->setDeveloperKey($simple_api_key);
        //$client->addScope("https://www.googleapis.com/auth/userinfo.email");
        $client->addScope("email");
        $client->addScope("profile");
        //$client->addScope("https://www.googleapis.com/auth/userinfo.profile, https://www.googleapis.com/auth/userinfo.email");
        // Send Client Request
        $objOAuthService = new Google_Service_Oauth2($client);

        // Add Access Token to Session
        if (isset($_GET['code'])) {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }

        // Set Access Token to make Request
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $client->setAccessToken($_SESSION['access_token']);
        }

        // Get User Data from Google and store them in $data
        if ($client->getAccessToken()) {
            $userData = $objOAuthService->userinfo->get();
            $data['userData'] = $userData;
            $_SESSION['access_token'] = $client->getAccessToken();
            $oauth_uid = $userData->id;
            $first_name = !empty($userData->givenName) ? $userData->givenName : '';
            $last_name = !empty($userData->familyName) ? $userData->familyName : '';
            $email = !empty($userData->email) ? $userData->email : '';
            $checkUserGooglestatus = $this->users_model->checkGplusUser($oauth_uid);
            if (!empty($checkUserGooglestatus)) {
                $this->session->set_userdata('Username', $checkUserGooglestatus->Username);
                $this->session->set_userdata('User_Id', $checkUserGooglestatus->User_Id);
                $this->session->set_userdata('Name', $checkUserGooglestatus->Name);
                $this->session->set_userdata('Photo', $checkUserGooglestatus->Photo);
                $this->session->set_userdata('Company', $checkUserGooglestatus->Company_name);
                redirect('socialauthentication');
            } else {
                $checkEmailExist = $this->users_model->check_email_exist($email);
                if ($checkEmailExist) {
                    $this->session->set_flashdata('social', 'This Email already exists, try login with the same email.');
                    redirect('home/register', $data);
                } else {
                    $data = array(
                        'Name' => $first_name,
                        'Username' => $first_name . $last_name,
                        'Email' => $email,
                        'Created_On' => date("Y-m-d H:m:s"),
                        //here 3 is gplus user
                        'Signup_Through' => "3",
                        'social' => "1",
                        'GPlus_Id' => $oauth_uid
                    );
                    $insertid = $this->users_model->add_user($data);
                    if ($insertid) {
                        $logData = array(
                            'log' => $first_name . $last_name . " Registered through Google.",
                            'User_Id' => $insertid,
                        );
                        $this->users_model->add_log($logData);
                        $this->load->library('email');
                        $config = array(
                            'mailtype' => 'html',
                            'charset' => 'utf-8',
                            'priority' => '1'
                        );
                        $this->email->initialize($config);
                        $this->email->from('info@foodlinked.co.in', 'Foodlinked Social');
                        $this->email->to($checkEmailExist->Email);
                        $this->email->subject('Thanks for registering with Foodlinked Social!!');
                        $this->email->message("Thank you:" . $this->input->post('Name'));
                        $result = $this->email->send();
                        $this->session->set_flashdata('social', 'Added Successfully, Please goto Sign in page and login.');
                        //unset($_SESSION['access_token']);
                        redirect('home/register', $data);
                    } else {
                        $this->session->set_flashdata('social', 'Something went wrong');
                        //unset($_SESSION['access_token']);
                        redirect('home/register', $data);
                    }
                }
            }
        } else {
            $authUrl = $client->createAuthUrl();
            $data['authUrl'] = $authUrl;
            redirect($authUrl, $data);
        }
    }

    public function linkedin() {
        $userData = array();
        $code = $this->input->get('code', TRUE);
        if ($code) {
            $data = array("grant_type" => "authorization_code",
                "code" => $code,
                "redirect_uri" => LIN_REDIRECT_URL,
                "client_id" => LIN_CLIENT_ID,
                "client_secret" => LIN_CLIENT_SECRET
            );

            $header_data = array(
                "Content-Type: application/x-www-form-urlencoded",
                "Accept: application/json",
            );
            $mUrl = 'https://www.linkedin.com/oauth/v2/accessToken';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header_data);
            curl_setopt($ch, CURLOPT_URL, $mUrl);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_HEADER, 0);

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            //curl_setopt_array($ch, $curlOpts);
            $response = curl_exec($ch);
            //If there was an error, show it
            if (curl_error($ch)) {
                echo curl_error($ch);
                die(curl_error($ch));
            }
            curl_close($ch);
            $user_data = json_decode($response, true);
            $accessTokenIs = "Bearer " . $user_data['access_token'];

            $get_header_data = array(
                "Content-Type: application/json",
                "Authorization: " . $accessTokenIs . "\r\n" .
                "Accept: application/json",
                    //"Connection: Keep-Alive"
            );
            $mUrlGet = 'https://api.linkedin.com/v2/me?projection=(id,emailAddress,firstName,lastName,profilePicture(displayImage~:playableStreams))';
            $getCh = curl_init();
            curl_setopt($getCh, CURLOPT_HTTPHEADER, $get_header_data);
            curl_setopt($getCh, CURLOPT_URL, $mUrlGet);
            curl_setopt($getCh, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($getCh, CURLOPT_POST, false);
            curl_setopt($getCh, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($getCh, CURLOPT_HEADER, 0);

            curl_setopt($getCh, CURLOPT_SSL_VERIFYPEER, false);
            //curl_setopt_array($ch, $curlOpts);
            $getResponse = curl_exec($getCh);
            //If there was an error, show it
            if (curl_error($getCh)) {
                echo curl_error($getCh);
                die(curl_error($getCh));
            }
            curl_close($getCh);
            //print_r($getResponse);
            //exit;
            $profile_data = json_decode($getResponse, true);
            //print_r($profile_data);
            //exit;
            $firstNameIs = $profile_data['firstName']['localized']['en_US'];
            $lastNameIs = $profile_data['lastName']['localized']['en_US'];
            $idIs = $profile_data['id'];
            $userData['first_name'] = $firstNameIs;
            $userData['last_name'] = $lastNameIs;
            $userData['oauth_uid'] = $idIs;
            $userData['gender'] = "";
            $userData['picture'] = $profile_data['profilePicture']['displayImage~']['elements'][3]['identifiers'][0]['identifier'];

            $mUrlGetEmail = "https://api.linkedin.com/v2/emailAddress?q=members&projection=(elements*(handle~))";
            $getEmail = curl_init();
            curl_setopt($getEmail, CURLOPT_HTTPHEADER, $get_header_data);
            curl_setopt($getEmail, CURLOPT_URL, $mUrlGetEmail);
            curl_setopt($getEmail, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($getEmail, CURLOPT_POST, false);
            curl_setopt($getEmail, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($getEmail, CURLOPT_HEADER, 0);

            curl_setopt($getEmail, CURLOPT_SSL_VERIFYPEER, false);
            //curl_setopt_array($ch, $curlOpts);
            $emailResponse = curl_exec($getEmail);
            //If there was an error, show it
            if (curl_error($getEmail)) {
                echo curl_error($getEmail);
                die(curl_error($getEmail));
            }
            curl_close($getEmail);
            //print_r($emailResponse);
            $email_data = json_decode($emailResponse, true);
            $emailAddressIs = $email_data['elements'][0]['handle~']['emailAddress'];
            $userData['email'] = $emailAddressIs;
            $data['userData'] = $userData;
            $oauth_uid = $userData['oauth_uid'];
            $first_name = $userData['first_name'];
            $last_name = $userData['last_name'];
            $email = $userData['email'];
            $checkUserLinkedinstatus = $this->users_model->checkLinkedinUser($oauth_uid);
            if (!empty($checkUserLinkedinstatus)) {
                $user_id = $checkUserLinkedinstatus->User_Id;
                $this->session->set_userdata('Username', $first_name . $last_name);
                $this->session->set_userdata('User_Id', $user_id);
                $this->session->set_userdata('Name', $first_name);
                $mUserId = $this->session->userdata('User_Id');
                $data['posts'] = $this->social_model->get_elements($mUserId);
                $data['likes'] = $this->social_model->get_likes($mUserId);
                $data['users'] = $this->rfq_model->getUsers();
                $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
                $data['logMessages'] = $this->users_model->getLogs($mUserId);
                $data['activeMywall'] = "social-nav-active";
                $data['user'] = $checkUserLinkedinstatus;
                //echo '<pre>';print_r($data['posts']);exit;	
                $this->load->view('social/home', $data);
            } else {
                $checkEmailExist = $this->users_model->check_email_exist($email);
                if ($checkEmailExist) {
                    $this->session->set_flashdata('social', 'This Email already exists, try login with the same email.');
                    //unset($_SESSION['access_token']);
                    redirect('home/register', $data);
                } else {
                    $data = array(
                        'Name' => $first_name,
                        'Username' => $first_name . $last_name,
                        'Email' => $email,
                        'Created_On' => date("Y-m-d H:m:s"),
                        //here 1 is linkedin user
                        'Signup_Through' => "1",
                        'social' => "1",
                        'Linkedin_Id' => $oauth_uid
                    );
                    $insertid = $this->users_model->add_user($data);
                    if ($insertid) {
                        $logData = array(
                            'log' => $first_name . $last_name . " Registered through Linkedin.",
                            'User_Id' => $insertid,
                        );
                        $this->users_model->add_log($logData);
                        $this->load->library('email');
                        $config = array(
                            'mailtype' => 'html',
                            'charset' => 'utf-8',
                            'priority' => '1'
                        );
                        $this->email->initialize($config);
                        $this->email->from('info@foodlinked.co.in', 'Foodlinked Social');
                        $this->email->to($checkEmailExist->Email);
                        $this->email->subject('Thanks for registering with Foodlinked Social!!');
                        $this->email->message("Thank you:" . $this->input->post('Name'));
                        $result = $this->email->send();
                        $this->session->set_flashdata('social', 'Added Successfully, Please goto Sign in page and login.');
                        //unset($_SESSION['access_token']);
                        redirect('home/register', $data);
                    } else {
                        $this->session->set_flashdata('social', 'Something went wrong, try again later!!');
                        //unset($_SESSION['access_token']);
                        redirect('home/register', $data);
                    }
                }
            }
        } else {
            $url = 'https://www.linkedin.com/oauth/v2/authorization?response_type=code&'
                    . 'client_id=' . LIN_CLIENT_ID . '&redirect_uri=' . LIN_REDIRECT_URL . '&state=fooobar&scope=' . LIN_SCOPE;
            $userData['authURL'] = $url;
            redirect($url, $data);
        }
    }

    public function fblogout() {
        // Remove local Facebook session
        $this->facebook->destroy_session();
        // Remove user data from session
        // Redirect to login page
        //redirect('user_authentication');
    }

}
