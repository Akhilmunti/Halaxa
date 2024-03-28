<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Received_quotes extends CI_Controller {

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

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['locations'] = $this->rfq_model->getAllLocs();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['quoted'] = $this->vendor_model->getAllQuotedRFQs($mUserId);
        $details = $this->unique_multidim_array($data['quoted'], 'RFQ_Id');
        $data['categories'] = $this->rfq_model->getAllCategories();
        //$count = array_count_values(array_column($data['quoted'], 'RFQ_Id'));
        $data['quotedRfq'] = $details;
        $mCorporate = $this->session->userdata('Company');
        if ($mCorporate == "") {
            $this->load->view('buyer/homepage', $data);
        } else {
            $this->load->view('buyer/received-quotes', $data);
        }
    }

    function unique_multidim_array($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();
        foreach ($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

    public function requote($id) {
        $userid = $this->session->userdata('User_Id');
        if ($id != '') {
            $data = array(
                'q_negotiate' => "1",
            );
            $status = $this->vendor_model->updateQuoteById($data, $id);
            if ($status == TRUE) {
                $rfqDetails = $this->rfq_model->getquotedRfqById($id);
                $vendorId = $rfqDetails['vendor_id'];
                $rfqId = $rfqDetails['RFQ_Id'];
                $messageData = $this->input->post('message');
                $dataMessage = array(
                    'message' => $messageData,
                    'q_id' => $id,
                    'RFQ_Id' => $rfqId,
                    'User_Id' => $userid,
                    'To_User' => $vendorId
                );
                $this->vendor_model->add_negotiate_message($dataMessage);

                $logData = array(
                    'log' => "A RFQ with id - {$rfqId} has been submitted for negotiation.",
                    'User_Id' => $userid,
                );
                $this->users_model->add_log($logData);

                $message = array(
                    'User_Id' => $userid,
                    'message' => "A RFQ with id - {$rfqId} has been submitted for negotiation.",
                    'to_user' => $vendorId,
                    'message_type' => "Logs",
                );
                $this->users_model->send_inmail($message);
                $this->session->set_flashdata('requoteNot', 'RFQ submitted successfully for negotiation');
                redirect('buyer/received_quotes');
            } else {
                $this->session->set_flashdata('requoteNot', 'Something went wrong.');
                redirect('buyer/received_quotes');
            }
        } else {
            $this->session->set_flashdata('requoteNot', 'Something went wrong.');
            redirect('buyer/received_quotes');
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
            );
            if ($this->vendor_model->updateQuoteById($data, $id)) {
                $vendor = $this->vendor_model->getQuaoteById($id);
                $vendorId = $vendor[0]['vendor_id'];
                $checkFav = $this->vendor_model->checkFavourite($userid, $vendorId);
                if (!$checkFav) {
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
                'message' => "A RFQ with id - {$rfqId} has been submitted for PO.",
                'to_user' => $vendorId,
                'message_type' => "Logs",
            );
            $this->users_model->send_inmail($message);
            $logData = array(
                'log' => "A RFQ with id - {$rfqId} has been submitted for PO.",
                'User_Id' => $userid,
            );
            $this->users_model->add_log($logData);
            $this->session->set_flashdata('requoteNot', 'PO submitted successfully.');
            redirect('buyer/received_quotes');
        } else {
            $this->session->set_flashdata('requoteNot', 'Something went wrong.');
            redirect('buyer/received_quotes');
        }
    }

    public function showNegotiate($id) {
        if ($id != '') {
            // get selected data
            if ($data['rfqdata'] = $this->rfq_model->getRfqById($id)) {
                $mUserId = $this->session->userdata('User_Id');
                $data['users'] = $this->rfq_model->getUsers();
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
                $data['quotedRfqById'] = $this->vendor_model->getAllQuotedRFQsById($id);
                $postatus = $data['quotedRfqById'][0]['po_status'];
                if ($postatus == "1") {
                    $data['potab'] = "hide";
                } else {
                    $data['potab'] = "";
                }
                $this->load->view('buyer/view-quote-nego', $data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function showPo($id) {
        if ($id != '') {
            // get selected data
            if ($data['rfqdata'] = $this->rfq_model->getRfqById($id)) {
                $mUserId = $this->session->userdata('User_Id');
                $data['users'] = $this->rfq_model->getUsers();
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
                $data['quotedRfqById'] = $this->vendor_model->getAllQuotedRFQsById($id);
                
                $this->load->view('buyer/view-quote-po', $data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function showCompare($id) {
        if ($id != '') {
            // get selected data
            if ($data['rfqdata'] = $this->rfq_model->getRfqById($id)) {
                $mUserId = $this->session->userdata('User_Id');
                $data['users'] = $this->rfq_model->getUsers();
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
                $data['quotedRfqById'] = $this->vendor_model->getAllQuotedRFQsById($id);
                $postatus = $data['quotedRfqById'][0]['po_status'];
                if ($postatus == "1") {
                    $data['potab'] = "hide";
                } else {
                    $data['potab'] = "";
                }
                $this->load->view('buyer/view-quote-com', $data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function show($id) {
        if ($id != '') {
            // get selected data
            if ($data['rfqdata'] = $this->rfq_model->getRfqById($id)) {
                $mUserId = $this->session->userdata('User_Id');
                $data['users'] = $this->rfq_model->getUsers();
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
                $data['quotedRfqById'] = $this->vendor_model->getAllQuotedRFQsById($id);
                $postatus = $data['quotedRfqById'][0]['po_status'];
                if ($postatus == "1") {
                    $data['potab'] = "hide";
                } else {
                    $data['potab'] = "";
                }
                $this->load->view('buyer/view-quote', $data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

}
