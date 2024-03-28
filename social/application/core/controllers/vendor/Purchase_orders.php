<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_orders extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->load->library('session');
        $this->load->model('rfq_model');
        $this->load->model('vendor_model');
        $this->load->model('users_model');
        $this->load->model('category_model');
        error_reporting(0);
    }

    public function reject($id) {
        $userid = $this->session->userdata('User_Id');
        $messageData = $this->input->post('message_rej');

        if ($id != '') {
            $data = array(
                'reject_status' => 1,
                'rejection_message' => $messageData,
            );
            $status = $this->vendor_model->updateQuoteById($data, $id);
            if ($status == TRUE) {
                $rfqDetails = $this->rfq_model->getquotedRfqById($id);
                $vendorId = $rfqDetails['vendor_id'];
                $rfqId = $rfqDetails['RFQ_Id'];                
                $logData = array(
                    'log' => "A RFQ with id - {$rfqId} has been rejected.",
                    'User_Id' => $userid,
                );
                $this->users_model->add_log($logData);
                $message = array(
                    'User_Id' => $userid,
                    'message' => "A RFQ with id - {$rfqId} has been rejected.",
                    'to_user' => $vendorId,
                    'message_type' => "Logs",
                );
                $this->users_model->send_inmail($message);
                $this->session->set_flashdata('requoteNot', 'RFQ rejected successfully');
                redirect('vendor/purchase_orders');
            } else {
                $this->session->set_flashdata('requoteNot', 'Something went wrong.');
                redirect('vendor/purchase_orders');
            }
        } else {
            $this->session->set_flashdata('requoteNot', 'Something went wrong.');
            redirect('vendor/purchase_orders');
        }
    }

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        $data['poissued'] = $this->vendor_model->getAllPOIssuedRFQsForVendor("1", $mUserId);
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $this->load->view('vendor/purchage_orders', $data);
    }

}
