<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('vendor_model');
        $this->load->model('users_model');
        $this->load->model('rfq_model');
        $this->load->model('category_model');
        error_reporting(0);
    }

    public function index() {
        $data['sidebar'] = "sellers";
        $data['navbar'] = "buyer";
        $mUserId = $this->session->userdata('User_Id');
        if ($mUserId) {
            $data['users'] = $this->rfq_model->getUsers();
            $data['locations'] = $this->rfq_model->getAllLocs();
            $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
            $data['logMessages'] = $this->users_model->getLogs($mUserId);
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
            $data['vendors'] = $this->vendor_model->getAllVendorstwo();
            $data['categories'] = $this->rfq_model->getAllCategories();
            $mCorporate = $this->session->userdata('Company');
            if ($mCorporate == "") {
                $this->load->view('buyer/homepage', $data);
            } else {
                $this->load->view('buyer/vendors-list', $data);
            }
        } else {
            redirect('social');
        }
    }

    public function addToFavs($id) {
        $userid = $this->session->userdata('User_Id');
        if ($id != '') {
            $data = array(
                'User_Id' => $userid,
                'vendor_id' => $id,
                'status' => "1",
            );
            $this->vendor_model->addToFavourite($data);
            $logData = array(
                'log' => "A vendor with id - {$id} has been added to favourites.",
                'User_Id' => $userid,
            );
            $this->users_model->add_log($logData);
            $this->session->set_flashdata('vendorNot', 'Succesfully added to favourites.');
            redirect('buyer/vendors');
        } else {
            $this->session->set_flashdata('vendorNot', 'Something went wrong.');
            redirect('buyer/vendors');
        }
    }
    
    public function sendBulkInmail() {
        $this->load->library('form_validation');
        $mUserId = $this->session->userdata('User_Id');
        $vendors = $this->input->post('vendors');
        if ($mUserId) {
            if (!empty($vendors)) {
                foreach ($vendors as $value) {
                    $this->form_validation->set_rules('message', 'Message', 'required');
                    if ($this->form_validation->run()) {
                        // Date format conversion
                        $mUserId = $this->session->userdata('User_Id');
                        $data = array(
                            'User_Id' => $mUserId,
                            'to_user' => $value,
                            'message' => $this->input->post('message'),
                            'message_type' => "Inmail",
                        );
                        $this->users_model->send_inmail($data);
                        $this->session->set_flashdata('result', 'Message sent Successfully.');
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
                }
                redirect('buyer/vendors');
            }
        } else {
            redirect('login');
        }
    }

    public function undo($id) {
        if ($id != '') {
            $data = array(
                'status' => "0",
            );
            $this->vendor_model->updateFav($data, $id);
            redirect('buyer/vendors');
        } else {
            redirect('buyer/vendors');
        }
    }

}
