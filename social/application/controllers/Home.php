<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->library('email');
        $this->load->library('facebook');
        date_default_timezone_set('Asia/Calcutta');
        error_reporting(0);
    }

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            redirect('buyer');
        } else {
            redirect('http://localhost/Halaxa/', 'refresh');
        }
    }
    
    public function actionSocial() {
        $this->load->view('social/designs/home');
    }
    
    public function aboutUs() {
        $this->load->view('aboutus');
    }
    
    public function values() {
        $this->load->view('values');
    }
    
    public function story() {
        $this->load->view('story');
    }
    
    public function promise() {
        $this->load->view('promise');
    }
    
    public function faqs() {
        $this->load->view('faqs');
    }

    public function vendor() {
        redirect('vendor');
    }

    public function social() {
        redirect('social');
    }

    public function register($left_tab = NULL) {
        if (!empty($left_tab)) {
            if ($left_tab == "network") {
                $data['left_content'] = "network";
            } elseif ($left_tab == "buy") {
                $data['left_content'] = "buy";
            } elseif ($left_tab == "sell") {
                $data['left_content'] = "sell";
            } elseif ($left_tab == "recruit") {
                $data['left_content'] = "recruit";
            } elseif ($left_tab == "jobs") {
                $data['left_content'] = "jobs";
            } else {
                $data['left_content'] = "network";
            }
        } else {
            $data['left_content'] = "network";
        }
        $this->load->view('social/register_new', $data);
    }

    public function recruit() {
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            redirect('social/network');
        } else {
            $data['left_content'] = "recruit";
            $this->load->view('social/login_new_halaxa', $data);
        }
    }

    public function jobs() {
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            redirect('social/network');
        } else {
            $data['left_content'] = "jobs";
            $this->load->view('social/login_new_halaxa', $data);
        }
    }

    public function network() {
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            redirect('social/network');
        } else {
            $data['left_content'] = "network";
            $this->load->view('social/login_new_halaxa', $data);
        }
    }

    public function sell() {
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            redirect('vendor');
        } else {
            $data['left_content'] = "sell";
            $this->load->view('social/login_new_halaxa', $data);
        }
    }

    public function buy() {
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            redirect('buyer');
        } else {
            $data['left_content'] = "buy";
            $this->load->view('social/login_new_halaxa', $data);
        }
    }

}
