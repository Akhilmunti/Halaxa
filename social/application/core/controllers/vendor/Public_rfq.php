<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Public_rfq extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->load->library('session');
        $this->load->model('rfq_model');
        $this->load->model('users_model');
        $this->load->model('vendor_model');
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
        $data['rfqs'] = $this->rfq_model->getAllRFQsByPublicVendor("1", $mUserId);
        $mVendorId = $this->session->userdata('User_Id');
        $data['quotedRfq'] = $this->vendor_model->getAllQuotedRFQsByVendor($mVendorId);
        $data['quotedIds'] = array_column($data['quotedRfq'], 'RFQ_Id');
        $this->load->view('vendor/rfq_public', $data);
    }

    public function manageBuyer() {
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
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
        $mVendorId = $this->session->userdata('User_Id');
        $mVendorName = $this->session->userdata('Username');
        if ($mVendorId == "") {
            redirect('login');
        }
        $this->outputData['sqnotification'] = "";
        $rfq_id = $this->uri->segment(4);
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
                $logData = array(
                    'log' => "Quote submitted successfully with the ID - {$insertid}",
                    'User_Id' => $mVendorId,
                );
                $this->users_model->add_log($logData);
                $this->outputData['sqnotification'] = "Quote submitted successfully";
                //$this->session->set_flashdata('quoteResult', 'Quote submitted successfully');
            } else {
                $this->outputData['sqnotification'] = "Failed. Something went wrong.";
            }
        } else {
            $this->outputData['sqnotification'] = "Failed. Something went wrong.";
        }
        $this->outputData['sqnotification'] = "Quote submitted successfully";
        redirect('vendor/public-rfq', $this->outputData);
    }

}
