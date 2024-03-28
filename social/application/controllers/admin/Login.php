<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Calcutta');
    }

    public function index() {
        $this->load->view('admin/login');
    }

    public function login() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('Username', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('Password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('result', 'Validation Error');
                $this->load->view('admin/login');
            } else {
                $mUsername = $this->input->post('Username');
                $mPassword = $this->input->post('Password');
                $mSecretPassword = md5($this->input->post('Password'));

                $mIsAuthenticated = $this->users_model->adminLogin($mUsername, $mSecretPassword);

                if ($mIsAuthenticated) {
                    redirect('admin/home');
                } else {
                    $this->session->set_flashdata('result', 'Admin not found.');
                    $this->load->view('admin/login');
                }
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong.');
            $this->load->view('admin/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/login');
    }

}
