<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Invite_buyers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->load->library('session');
        $this->load->model('city_model');
        $this->load->model('users_model');
        $this->load->model('rfq_model');
        $this->load->model('product_model');
        date_default_timezone_set('Asia/Calcutta');
        error_reporting(0);
    }
    
    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $this->load->view('vendor/invite_buyer',$data);
    }

}
