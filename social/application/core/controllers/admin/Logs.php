<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('vendor_model');
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('logs_model');
        $this->load->library('email');
        date_default_timezone_set('Asia/Calcutta');
    }

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            $data['logs'] = $this->logs_model->get_logs();
            $this->load->view('admin/logs', $data);
        } else {
            redirect('admin/login');
        }
    }

}
