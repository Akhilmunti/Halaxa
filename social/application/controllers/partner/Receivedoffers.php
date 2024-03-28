<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Receivedoffers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('school_model');
        $this->load->model('hotel_model');
        $this->load->model('users_model');
        $this->load->model('city_model');
        $this->load->model('rfq_model');
        $this->load->model('association_model');
        $this->load->model('influencer_model');
        $this->load->library('upload');
        $this->load->helper('date');
        error_reporting(0);
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index() {
        $partnerId = $this->session->userdata('login_id');
        if (!empty($partnerId)) {
            $this->outputData['members'] = $this->association_model->getAllMembers($partnerId);
            $this->outputData['scheduledMembersStatus'] = $this->association_model->getAllMembersStatus($partnerId);
            $this->outputData['scheduledMembers'] = $this->association_model->getAllScheduledMembers($partnerId);
            $this->outputData['partnerId'] = $partnerId;
            $this->outputData['countries'] = $this->rfq_model->getAllCountries();
            $this->load->view('partner/received_offers', $this->outputData);
        } else {
            redirect('partner/home');
        }
    }

    public function accept($mPostKey) {
        $partnerId = $this->session->userdata('login_id');
        if (!empty($partnerId)) {
            if (!empty($mPostKey)) {
                $topicInfo = array(
                    'Flag' => 1
                );
                $mAction = $this->association_model->updateScheduledMember($topicInfo, $mPostKey);
                if ($mAction) {
                    $this->session->set_flashdata('result', 'Offer accepted successfully!!.');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, please try again later!!.');
                }
                redirect('partner/receivedoffers');
            } else {
                $this->session->set_flashdata('error', 'Need more information.');
                redirect('partner/receivedoffers');
            }
        } else {
            redirect('partner/home');
        }
        $mPartnerKey = $this->session->userdata('partner_key');
        $mPartnerType = $this->session->userdata('partner_type');
        if ($mPostKey) {
            $this->form_validation->set_rules('comment', 'comment', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', 'Validation error.');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $mContent = $this->input->post('comment');
                $mKey = $this->mGenerateRandomNumber();


                if ($mAction) {
                    $this->session->set_flashdata('result', 'Comment added successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
                }
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect('partner');
        }
    }

    public function reject($mPostKey) {
        $partnerId = $this->session->userdata('login_id');
        if (!empty($partnerId)) {
            if (!empty($mPostKey)) {
                $topicInfo = array(
                    'Flag' => -1
                );
                $mAction = $this->association_model->updateScheduledMember($topicInfo, $mPostKey);
                if ($mAction) {
                    $this->session->set_flashdata('result', 'Offer rejected successfully!!.');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, please try again later!!.');
                }
                redirect('partner/receivedoffers');
            } else {
                $this->session->set_flashdata('error', 'Need more information.');
                redirect('partner/receivedoffers');
            }
        } else {
            redirect('partner/home');
        }
        $mPartnerKey = $this->session->userdata('partner_key');
        $mPartnerType = $this->session->userdata('partner_type');
        if ($mPostKey) {
            $this->form_validation->set_rules('comment', 'comment', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', 'Validation error.');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $mContent = $this->input->post('comment');
                $mKey = $this->mGenerateRandomNumber();


                if ($mAction) {
                    $this->session->set_flashdata('result', 'Comment added successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
                }
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect('partner');
        }
    }

}
