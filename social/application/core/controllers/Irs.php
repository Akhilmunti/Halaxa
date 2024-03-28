<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Irs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        date_default_timezone_set('Asia/Calcutta');
        is_logged_in();
        error_reporting(0);
    }

    public function index() {
        $url;
        $path = $_GET['path'];

        if (URL_CREATE_JOB_POST === $path || URL_CAMPUS_RECRUITEMENT === $path || URL_HOME_PROFILE === $path ||
                URL_EMPLOYER === $path || URL_JOB_SEEKER === $path || URL_JOB_SEEKER_JOBS === $path) {
            $data['user'] = $this->users_model->get_element_by($this->session->userdata('User_Id'));
            $Username = $data['user']->Username;
            $userid = $data['user']->Email;
            $token = $data['user']->Password;
            if (strpos($path, URL_EMPLOYER) !== false) {
                $role = strtoupper(URL_EMPLOYER);
            } else if (strpos($path, URL_JOB_SEEKER) !== false) {
                $role = strtoupper(URL_JOB_SEEKER);
            } else if (strpos($path, URL_IRS_HOME) !== false) {
                $role = strtoupper(URL_IRS_HOME); //"USERS";//
            }
            $method = explode("/", $path)[1];
            $url = URL_JOB . "users/create_user?name=$Username&userid=$userid&role=$role&path=$method&token=$token";
        } else {
            $url = URL_SOCIAL;
        }
        //echo $url;
        header("Location:" . $url);
    }

}
