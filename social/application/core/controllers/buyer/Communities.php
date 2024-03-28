<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Communities extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->model('rfq_model');
        $this->load->helper('download');
        $this->load->model('category_model');
        $this->load->model('users_model');
        $this->load->model('subcategory_model');
        $this->load->model('location_model');
        $this->load->model('city_model');
        $this->load->model('type_model');
        //error_reporting(0);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            $data['users'] = $this->rfq_model->getUsers();
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
            $data['locations'] = $this->rfq_model->getAllLocs();
            $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
            $data['logMessages'] = $this->users_model->getLogs($mUserId);
            $this->load->view('buyer/communities');
        } else {
            redirect('login');
        }
    }

}
