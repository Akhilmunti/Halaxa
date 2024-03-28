<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Invite extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('rfq_model');
        $this->load->model('social_model');
        date_default_timezone_set('Asia/Calcutta');
        is_logged_in();
        error_reporting(0);
    }

    public function index($id = NULL) {
        if ($id == NULL)
            $id = $this->session->userdata('User_Id');
        $data['user'] = $this->users_model->get_element_by($id);
        $data['posts'] = $this->social_model->get_elements($id);
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $this->load->view('social/invite', $data);
    }

}
