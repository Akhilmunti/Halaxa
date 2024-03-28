<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        date_default_timezone_set("Asia/Kolkata");
        $this->load->helper('date');
        //error_reporting(0);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }

    public function index() {
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
