<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Facebook extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->library('facebook');
        //error_reporting(0);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }

    public function index() {
        echo "yes";
        exit;
//        $userData = array();
//        // Check if user is logged in
//        if ($this->facebook->is_authenticated()) {
//            // Get user facebook profile details
//            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture');
//            // Preparing data for database insertion
//            $userData['oauth_provider'] = 'facebook';
//            $userData['oauth_uid'] = !empty($fbUser['id']) ? $fbUser['id'] : '';
//            $userData['first_name'] = !empty($fbUser['first_name']) ? $fbUser['first_name'] : '';
//            $userData['last_name'] = !empty($fbUser['last_name']) ? $fbUser['last_name'] : '';
//            $userData['email'] = !empty($fbUser['email']) ? $fbUser['email'] : '';
//            $userData['gender'] = !empty($fbUser['gender']) ? $fbUser['gender'] : '';
//            $userData['picture'] = !empty($fbUser['picture']['data']['url']) ? $fbUser['picture']['data']['url'] : '';
//            $userData['link'] = !empty($fbUser['link']) ? $fbUser['link'] : '';
//            // Insert or update user data
//            $userID = $this->user->checkUser($userData);
//            // Check user data insert or update status
//            if (!empty($userID)) {
//                $data['userData'] = $userData;
//                $this->session->set_userdata('userData', $userData);
//            } else {
//                $data['userData'] = array();
//            }
//            // Get logout URL
//            $data['logoutURL'] = $this->facebook->logout_url();
//        } else {
//            // Get login URL
//            $data['authURL'] = $this->facebook->login_url();
//        }
//
//        // Load login & profile view
//        $this->load->view('user_authentication/index', $data);
    }

//    public function logout() {
//        // Remove local Facebook session
//        $this->facebook->destroy_session();
//        // Remove user data from session
//        $this->session->unset_userdata('userData');
//        // Redirect to login page
//        redirect('user_authentication');
//    }

}
