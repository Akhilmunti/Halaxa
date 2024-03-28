<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->load->model('rfq_model');
        $this->load->model('users_model');
        $this->load->model('vendor_model');
        $this->load->model('category_model');
        error_reporting(0);
    }

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['locations'] = $this->rfq_model->getAllLocs();
        $data['categories'] = $this->rfq_model->getAllCategories();
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['poissued'] = $this->vendor_model->getAllPOIssuedRFQs("1", $mUserId);
        $mCorporate = $this->session->userdata('Company');
        if ($mCorporate == "") {
            $this->load->view('buyer/homepage', $data);
        } else {
            $this->load->view('buyer/purchase-order', $data);
        }
    }

}
