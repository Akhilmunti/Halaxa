<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Recieved_rfq extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->load->library('session');
        $this->load->model('rfq_model');
        $this->load->model('users_model');
        $this->load->model('vendor_model');
        date_default_timezone_set('Asia/Calcutta');
        error_reporting(0);
    }

    public function index() {
        $data['sqnotification'] = "";
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['cities'] = $this->rfq_model->getAllCities();
        $data['items'] = $this->rfq_model->getAllItems();
        $data['uoms'] = $this->rfq_model->getAllUoms();
        $data['locs'] = $this->rfq_model->getAllLocs();
        $data['vendors'] = $this->rfq_model->getAllVendors();
        //$data['rfq'] = $this->rfq_model->getAllRFQs();


        $mFilterRfqId = $this->input->post('rfq_id');
        $mFilterRfqStart = $this->input->post('rfq_start');
        $mFilterRfqStatus = $this->input->post('rfq_status');

        if ($mFilterRfqId || $mFilterRfqStart || $mFilterRfqStatus) {
            if ($mFilterRfqId) {
                $mFilterRfqId = $mFilterRfqId;
            } else {
                $mFilterRfqId = "";
            }
            if ($mFilterRfqStart) {
                $mFilterRfqStart = $mFilterRfqStart;
            } else {
                $mFilterRfqStart = "";
            }
            if ($mFilterRfqStatus) {
                $mFilterRfqStatus = $mFilterRfqStatus;
            } else {
                $mFilterRfqStatus = "";
            }
            $data['rfq'] = $this->rfq_model->getAllRFQsWithConFilter($mUserId, $mFilterRfqId, $mFilterRfqStart, $mFilterRfqStatus);
            $rfq_vendorid = $data['rfq'];
        } else {
            $data['rfq'] = $this->rfq_model->getAllRFQsWithCon($mUserId);
            $rfq_vendorid = $data['rfq'];
        }

        $vendors = array();
        foreach ($rfq_vendorid as $key => $single) {
            //echo $single['V_Ids'] . $single['RFQ_Id'];
            $obj = json_decode($single['V_Ids'], true);
            //print_r($obj);
            if (in_array($mUserId, $obj)) {
                $vendors[] = $this->rfq_model->getRfqById($single['RFQ_Id']);
            }
        }
        $data['rfqs'] = $vendors;
        $mVendorId = $this->session->userdata('User_Id');
        $data['quotedRfq'] = $this->vendor_model->getAllQuotedRFQsByVendor($mVendorId);
        $data['quotedIds'] = array_column($data['quotedRfq'], 'RFQ_Id');
        $data['sidebar'] = "all";
        $data['navbar'] = "seller";
        $data['status'] = $mFilterRfqStatus;
        $this->load->view('vendor/recieved_rfq', $data);
    }

    public function manageBuyer() {
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['vendors'] = $this->rfq_model->getAllVendors();
        $this->load->view('vendor/rfq_manage_buyer', $data);
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
                $this->load->view('vendor/rfq-show', $data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function submit_quote() {
        if ($this->input->post('draft')) {
            $mVendorId = $this->session->userdata('User_Id');
            $mVendorName = $this->session->userdata('Username');
            if ($mVendorId == "") {
                redirect('login');
            }
            $this->outputData['sqnotification'] = "";
            $rfq_id = $this->uri->segment(4);
            $rfqdata = $this->rfq_model->getRfqById($rfq_id);
            $buyerId = $rfqdata['User_Id'];
            $end = $this->vendor_model->getEnddate($rfq_id);
            $endDate = $end['End'];
            $ctKey = $end['CT_Key'];
            $mVendorId = $this->session->userdata('User_Id');
            $mVendorName = $this->session->userdata('Username');
            $items = json_encode($this->input->post('quotedItems'));
            if (!empty($items)) {
                $data = array(
                    'vendor_id' => $mVendorId,
                    'vendor_name' => $mVendorName,
                    'RFQ_Id' => $rfq_id,
                    'quotedItems' => $items,
                    'q_enddate' => $endDate,
                    'q_catid' => $ctKey,
                    'buyer_id' => $buyerId,
                );
                if ($insertid = $this->vendor_model->addQuotedRfqToDraft($data)) {
                    $file1 = '';
                    if (isset($_FILES['quotedAttachment'])) {
                        $file1_name = $_FILES['quotedAttachment']['name'];
                        $file1_type = $_FILES['quotedAttachment']['type'];
                        $file1_tmp_name = $_FILES['quotedAttachment']['tmp_name'];

                        $file1 = $insertid . "_file1_" . $file1_name;
                        $fileToUpload = FCPATH . "user_files/quoted_files/" . $file1;
                        move_uploaded_file($file1_tmp_name, $fileToUpload);
                    }

                    if ($file1 != '') {
                        $files = array(
                            'q_attachment' => $file1
                        );
                        $this->vendor_model->updateQuotedRfqFileInfoDraft($files, $insertid);
                    }
                    $this->outputData['sqnotification'] = "Quote saved in drafts";
                    $logData = array(
                        'log' => "Quote saved in drafts with the #{$insertid}",
                        'User_Id' => $mVendorId,
                    );
                    $this->users_model->add_log($logData);
                } else {
                    $this->outputData['sqnotification'] = "Failed. Something went wrong.";
                }
            } else {
                $this->outputData['sqnotification'] = "Failed. Something went wrong.";
            }
            redirect('vendor/recieved-rfq', $this->outputData);
        } else {
            $mVendorId = $this->session->userdata('User_Id');
            $mVendorName = $this->session->userdata('Username');
            if ($mVendorId == "") {
                redirect('login');
            }
            $this->outputData['sqnotification'] = "";
            $rfq_id = $this->uri->segment(4);
            $rfqdata = $this->rfq_model->getRfqById($rfq_id);
            $buyerId = $rfqdata['User_Id'];
            $end = $this->vendor_model->getEnddate($rfq_id);
            $endDate = $end['End'];
            $ctKey = $end['CT_Key'];
            $mVendorId = $this->session->userdata('User_Id');
            $mVendorName = $this->session->userdata('Username');
            $items = json_encode($this->input->post('quotedItems'));

            $arrayItems = $this->input->post('quotedItems');

            if (!empty($items)) {
                $data = array(
                    'vendor_id' => $mVendorId,
                    'vendor_name' => $mVendorName,
                    'RFQ_Id' => $rfq_id,
                    'quotedItems' => $items,
                    'q_enddate' => $endDate,
                    'q_catid' => $ctKey,
                    'buyer_id' => $buyerId,
                );
                if ($insertid = $this->vendor_model->addQuotedRfq($data)) {
                    $file1 = '';
                    if (isset($_FILES['quotedAttachment'])) {
                        $file1_name = $_FILES['quotedAttachment']['name'];
                        $file1_type = $_FILES['quotedAttachment']['type'];
                        $file1_tmp_name = $_FILES['quotedAttachment']['tmp_name'];

                        $file1 = $insertid . "_file1_" . $file1_name;
                        $fileToUpload = FCPATH . "user_files/quoted_files/" . $file1;
                        move_uploaded_file($file1_tmp_name, $fileToUpload);
                    }

                    if ($file1 != '') {
                        $files = array(
                            'q_attachment' => $file1
                        );
                        $this->vendor_model->updateQuotedRfqFileInfo($files, $insertid);
                    }
                    $this->vendor_model->delete_draft($rfq_id);
                    $message = array(
                        'User_Id' => $mVendorId,
                        'message' => "A RFQ with id #{$rfq_id} has been quoted by vendor.",
                        'to_user' => $buyerId,
                        'message_type' => "Logs",
                    );
                    $this->users_model->send_inmail($message);
                    $this->outputData['sqnotification'] = "Quote submitted successfully";
                    $logData = array(
                        'log' => "A RFQ with id #{$rfq_id} has been quoted by vendor.",
                        'User_Id' => $mVendorId,
                    );
                    $this->users_model->add_log($logData);
                } else {
                    $this->outputData['sqnotification'] = "Failed. Something went wrong.";
                }
            } else {
                $this->outputData['sqnotification'] = "Failed. Something went wrong.";
            }
            $this->outputData['sqnotification'] = "Quote submitted successfully";
            redirect('vendor/recieved-rfq', $this->outputData);
        }
    }

}
