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
    
    public function show($id) {
        if ($id != '') {
            if ($data['rfqdata'] = $this->rfq_model->getRfqById($id)) {
                $mUserId = $this->session->userdata('User_Id');
                $data['users'] = $this->rfq_model->getUsers();
                $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
                $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
                $data['logMessages'] = $this->users_model->getLogs($mUserId);
                $data['types'] = $this->rfq_model->getAllTypes();
                $data['cities'] = $this->rfq_model->getAllCities();
                $data['items'] = $this->rfq_model->getAllItems();
                $data['uoms'] = $this->rfq_model->getAllUoms();
                $data['locs'] = $this->rfq_model->getAllLocs();
                $data['vendors'] = $this->rfq_model->getAllVendors();
                $data['rfqid'] = $id;
                $rfqdata = $this->rfq_model->getRfqById($id);
                $ctkey = $rfqdata['CT_Key'];
                $sctkey = $rfqdata['SCT_Key'];
                $data['cat'] = $this->rfq_model->getCatById($ctkey);
                $data['scat'] = $this->rfq_model->getSCatById($sctkey);
                $data['qouted'] = $this->rfq_model->getQoutedByRfqIdForPo($id);
                $this->load->view('vendor/rfq-show-po', $data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
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
                    'log' => "A RFQ with id #{$rfqId} has been rejected.",
                    'User_Id' => $userid,
                );
                $this->users_model->add_log($logData);
                $message = array(
                    'User_Id' => $userid,
                    'message' => "A RFQ with id #{$rfqId} has been rejected.",
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
        $data['sidebar'] = "po";
        $data['navbar'] = "seller";
        $this->load->view('vendor/purchage_orders', $data);
    }
    
    public function sendInmailToBuyers() {
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
                'message' => "RFQ ID : " . $this->input->post('rfq') . ", " . $this->input->post('message'),
                'message_type' => "Inmail",
            );
            $this->users_model->send_inmail($data);
            $this->session->set_flashdata('result', "Message sent successfully.");
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
        redirect('vendor/purchase_orders');
    }

}
