<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faqs extends CI_Controller {

    public function index() {
        $this->load->view('faqs');
    }
    
    public function faqs() {
        $this->load->view('faqs');
    }
    
    public function aboutUs() {
        $this->load->view('aboutUs');
    }

    public function vendor() {
        redirect('vendor');
    }

    public function social() {
        redirect('social');
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
