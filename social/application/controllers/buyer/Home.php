<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('rfq_model');
        $this->load->model('vendor_model');
        $this->load->model('blogs_model');
        $this->load->model('category_model');
        $this->load->model('subcategory_model');
        $this->load->model('association_model');
        $this->load->model('location_model');
        $this->load->model('city_model');
        $this->load->model('type_model');
        date_default_timezone_set('Asia/Calcutta');
        //error_reporting(0);
    }

    public function index() {
        $data['sidebar'] = "home";
        $data['navbar'] = "buyer";
        $mUserId = $this->session->userdata('User_Id');
        $data['locations'] = $this->rfq_model->getAllLocs();
        $data['countries'] = $this->category_model->get_countries();
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['categories'] = $this->rfq_model->getAllCategories();
        $data['blogs'] = $this->blogs_model->get_blogs();
        $data['rfqsCount'] = $this->rfq_model->getAllRFQsByfavs($mUserId, "0");
        $data['quotedCount'] = $this->vendor_model->getAllQuotedRFQs($mUserId);
        $data['poissuedCount'] = $this->vendor_model->getAllPOIssuedRFQs("1", $mUserId);
        $mUserType = $this->users_model->get_user_by_type($mUserId, "1");
        if (!empty($mUserType)) {
            $this->load->view('buyer/dashboard', $data);
        } else {
            $this->load->view('buyer/homepage', $data);
        }
    }

    public function blogs() {
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['sentMessages'] = $this->users_model->getMessagesSent($mUserId);
        $data['sentLogs'] = $this->users_model->getLogsSent($mUserId);
        $data['blogs'] = $this->blogs_model->get_blogs();
        $this->load->view('buyer/bloglist', $data);
    }

    public function inmail() {
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $messages = $this->users_model->getAllMessages($mUserId);
        $sentmessages = $this->users_model->getAllSentMessages($mUserId);
        $logs = $this->users_model->getLogs($mUserId);
        foreach ($messages as $key => $value) {
            $data = array(
                'flag' => "1"
            );
            $this->users_model->updateMessages($data, $value['id']);
        }
//        foreach ($sentmessages as $key => $value) {
//            $data = array(
//                'flag' => "1"
//            );
//            $this->users_model->updateMessages($data, $value['id']);
//        }
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['sentMessages'] = $this->users_model->getMessagesSent($mUserId);
        $data['sentLogs'] = $this->users_model->getLogsSent($mUserId);
        $data['partners'] = $this->users_model->getPartnerNotifications($mUserId);
        $this->load->view('buyer/inmail_list', $data);
    }

    public function addCorporateDetails() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('companyname', 'companyname', 'required');
        $this->form_validation->set_rules('companybrief', 'companybrief', 'required');
        $this->form_validation->set_rules('prelanguage', 'prelanguage', 'required');
        $this->form_validation->set_rules('deliveryaddress', 'deliveryaddress', 'required');
        if ($this->form_validation->run()) {
            // Date format conversion
            $mUserId = $this->session->userdata('User_Id');
            $data = array(
                //here 1 is buyer type
                'User_Type' => "1",
                'buyer' => "1",
                'Designation' => $this->input->post('designation'),
                'Company_name' => $this->input->post('companyname'),
                'Company_brief' => $this->input->post('companybrief'),
                'preferred_lang' => $this->input->post('prelanguage'),
                'delivery_address' => $this->input->post('deliveryaddress'),
                'category' => $this->input->post('Preferrence'),
                'payment_mode' => json_encode($this->input->post('card')),
                'Locations' => $this->input->post('locations'),
                'payment_structure' => $this->input->post('paymentstructure'),
            );
            $action = $this->users_model->updateUserInfo($data, $mUserId);
            $userData = $this->users_model->get_user_by_id($mUserId);
            $datadelivery = array(
                'User_Id' => $mUserId,
                'delivery_address' => $userData->delivery_address,
            );
            $this->users_model->add_delivery_address($datadelivery);
            $logData = array(
                'log' => $this->input->post('companyname') . " Created buyer account.",
                'User_Id' => $mUserId,
            );
            $this->users_model->add_log($logData);
        } else {
            $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
            $error = $this->form_validation->error_array();
            if (isset($error['companyname'])) {
                $this->session->set_flashdata('companyname', $error['companyname']);
            }
            if (isset($error['companybrief'])) {
                $this->session->set_flashdata('companybrief', $error['companybrief']);
            }
            if (isset($error['prelanguage'])) {
                $this->session->set_flashdata('prelanguage', $error['prelanguage']);
            }
            if (isset($error['deliveryaddress'])) {
                $this->session->set_flashdata('deliveryaddress', $error['deliveryaddress']);
            }
        }
        $this->session->set_userdata('Company', $this->input->post('companyname'));
        $this->session->set_flashdata('result', 'Buyer corporate profile successfully updated');
        redirect('buyer');
    }

    public function sendInmail() {
        $mUsername = $this->session->userdata('Username');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user', 'User Email', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        if ($this->form_validation->run()) {
            // Date format conversion
            $mUserId = $this->session->userdata('User_Id');
            $data = array(
                //here 1 is buyer type
                'User_Id' => $mUserId,
                'to_user' => $this->input->post('user'),
                'message' => $this->input->post('message'),
                'message_type' => "Inmail",
            );
            $this->users_model->send_inmail($data);
            $logData = array(
                'log' => $mUsername . " Sent inmail.",
                'User_Id' => $mUserId,
            );
            $this->users_model->add_log($logData);
        } else {
            $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
            $error = $this->form_validation->error_array();
            if (isset($error['user'])) {
                $this->session->set_flashdata('user', $error['user']);
            }
            if (isset($error['message'])) {
                $this->session->set_flashdata('message', $error['message']);
            }
        }
        redirect('buyer/home/inmail');
    }

}
