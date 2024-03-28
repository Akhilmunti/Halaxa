<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('association_model');
        $this->load->library('email');
        date_default_timezone_set('Asia/Calcutta');
        error_reporting(0);
    }

    public function index() {
        redirect('social');
    }

    public function saveLinkedinSession($param) {
        $getUser = $this->users_model->checkLinkedinUser($param);
        $this->session->set_userdata('Username', $getUser->Username);
        $this->session->set_userdata('User_Id', $getUser->User_Id);
        $this->session->set_userdata('Name', $getUser->Name);
        redirect('social');
    }

    public function saveGplusinSession($param) {
        $getUser = $this->users_model->checkGplusUser($param);
        $this->session->set_userdata('Username', $getUser->Username);
        $this->session->set_userdata('User_Id', $getUser->User_Id);
        $this->session->set_userdata('Name', $getUser->Name);
        redirect('social');
    }
    
    public function saveFacebookSession($param) {
        $getUser = $this->users_model->checkFbUser($param);
        $this->session->set_userdata('Username', $getUser->Username);
        $this->session->set_userdata('User_Id', $getUser->User_Id);
        $this->session->set_userdata('Name', $getUser->Name);
        redirect('social');
    }

}
