<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            redirect('social');
        } else {
            $this->load->view('index');
        }
    }
    
    public function business() {
        $this->load->view('business');
    }
    
     public function partner() {
        $this->load->view('partner');
    }
    
    public function partnerLogin() {
        $data['nav'] = "";
        $this->load->view('partner-login', $data);
    }
    
    public function recruit() {
        $this->load->view('recruit');
    }
    
    public function market() {
        $this->load->view('market');
    }
    
    public function faqs() {
        $this->load->view('faqs');
    }
    
    public function aboutUs() {
        $this->load->view('aboutUs');
    }
    
    public function story() {
        $this->load->view('story');
    }
    
    public function values() {
        $this->load->view('values');
    }
    
    public function promise() {
        $this->load->view('promise');
    }
   

    public function vendor() {
        redirect('vendor');
    }

    public function social() {
        redirect('social');
    }
    
    public function report() {
        $this->load->view('report');
    }
    
    public function send() {
        $this->load->library('email');
// from address
        $this->email->from('sreenivas.anand08@gmail.com', 'Your Name');
        $this->email->to('akhilmunti@gmail.com'); // to Email address
        $this->email->subject('Email Test'); // email Subject 
        $this->email->message('Testing the email class.'); // email Body or Message 
        if($this->email->send()){
            echo "yes";
        } else {
            echo "no";
        }
    }
    
    

}
