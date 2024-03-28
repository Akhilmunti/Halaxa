<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->load->library('session');
        $this->load->model('rfq_model');
        $this->load->model('users_model');
        $this->load->model('vendor_model');
        $this->load->model('category_model');
        date_default_timezone_set('Asia/Calcutta');
        error_reporting(0);
    }

    public function index() {
        $data['sidebar'] = "po";
        $data['navbar'] = "buyer";
        $mUserId = $this->session->userdata('User_Id');
        if ($mUserId) {
            $data['users'] = $this->rfq_model->getUsers();
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
            $data['locations'] = $this->rfq_model->getAllLocs();
            $data['categories'] = $this->rfq_model->getAllCategories();
            $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
            $data['logMessages'] = $this->users_model->getLogs($mUserId);
            $data['poissued'] = $this->vendor_model->getAllPOIssuedRFQs("1", $mUserId);
            $mCorporate = $this->session->userdata('Company');
            if ($mCorporate == "") {
                $this->load->view('buyer/homepage', $data);
            } else {
                $this->load->view('buyer/purchase-order', $data);
            }
        } else {
            redirect('social');
        }
    }

    public function issuePo($id) {
        $userid = $this->session->userdata('User_Id');
        $messageData = $this->input->post('message_po');
        if ($id != '') {
            $data = array(
                'po_status' => "1",
                'q_negotiate' => "0",
                'buyer_id' => $userid,
                'po_message' => $messageData,
                'reject_status' => "0"
            );
            if ($this->vendor_model->updateQuoteById($data, $id)) {
                $vendor = $this->vendor_model->getQuaoteById($id);
                $vendorId = $vendor[0]['vendor_id'];
                $checkFav = $this->vendor_model->checkFavourite($userid, $vendorId);
                if (empty($checkFav)) {
                    $data = array(
                        'User_Id' => $userid,
                        'vendor_id' => $vendorId,
                        'status' => "1",
                    );
                    $this->vendor_model->addToFavourite($data);
                }
            }
            $rfqDetails = $this->rfq_model->getquotedRfqById($id);
            $vendorId = $rfqDetails['vendor_id'];
            $rfqId = $rfqDetails['RFQ_Id'];
            $message = array(
                'User_Id' => $userid,
                'message' => "A RFQ with id #{$rfqId} has been submitted for PO.",
                'to_user' => $vendorId,
                'message_type' => "Logs",
            );
            $this->users_model->send_inmail($message);
            $logData = array(
                'log' => "A RFQ with id #{$rfqId} has been submitted for PO.",
                'User_Id' => $userid,
            );
            $this->users_model->add_log($logData);
            $this->session->set_flashdata('requoteNot', 'PO submitted successfully.');
            redirect('buyer/purchase-order');
        } else {
            $this->session->set_flashdata('requoteNot', 'Something went wrong.');
            redirect('buyer/purchase-order');
        }
    }

}
