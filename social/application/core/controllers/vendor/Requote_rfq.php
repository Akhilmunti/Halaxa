<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Requote_rfq extends CI_Controller {

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
        $data['rfq'] = $this->rfq_model->getAllRFQs();
        $rfq_vendorid = $data['rfq'];
        //print_r($rfq_vendorid);exit;
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
        $data['quotedRfq'] = $this->vendor_model->getAllQuotedRFQsByVendorAndStatus($mVendorId, "1");
        $data['quotedIds'] = array_column($data['quotedRfq'], 'RFQ_Id');
        $this->load->view('vendor/rfq_requote', $data);
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
        $this->outputData['sqnotification'] = "";
        $rfq_id = $this->uri->segment(4);
        $end = $this->vendor_model->getEnddate($rfq_id);
        $endDate = $end['End'];
        $ctKey = $end['CT_Key'];
        $mVendorId = $this->session->userdata('User_Id');
        $mVendorName = $this->session->userdata('Username');
        $items = json_encode($this->input->post('quotedItems'));
        
        print_r($items);exit;
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
                $this->outputData['sqnotification'] = "Quote submitted successfully";
                //$this->session->set_flashdata('quoteResult', 'Quote submitted successfully');
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
