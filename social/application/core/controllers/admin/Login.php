<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('users_model');
        date_default_timezone_set('Asia/Calcutta');
    }

    public function index() {
        $this->load->view('admin/login');
    }

    public function login() {
        $Username = $this->input->post('Username');
        $Password = $this->input->post('Password');
        if ($Username == "admin@foodlinked.com" && $Password == "admin123") {
            $this->session->set_userdata('Username', "Admin");
            $this->session->set_userdata('Email', $Username);
            $this->session->set_userdata('User_Id', "1");
            redirect('admin/home');
        } else {
            $this->session->set_flashdata('result', 'Incorrect username or password');
            $this->load->view('admin/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/login');
    }

}
