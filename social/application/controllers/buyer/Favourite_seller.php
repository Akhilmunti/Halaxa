<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Favourite_seller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->load->model('users_model');
        $this->load->model('rfq_model');
        $this->load->model('vendor_model');
        $this->load->model('category_model');
        error_reporting(0);
    }

    public function index() {
        $data['sidebar'] = "fav";
        $data['navbar'] = "buyer";
        $mUserId = $this->session->userdata('User_Id');
        if ($mUserId) {
            $data['users'] = $this->rfq_model->getUsers();
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
            $data['locations'] = $this->rfq_model->getAllLocs();
            $data['categories'] = $this->rfq_model->getAllCategories();
            $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
            $data['logMessages'] = $this->users_model->getLogs($mUserId);
            $data['quotedRfq'] = $this->vendor_model->getAllFavs("1", $mUserId);
            $mCorporate = $this->session->userdata('Company');
            if ($mCorporate == "") {
                $this->load->view('buyer/homepage', $data);
            } else {
                $this->load->view('buyer/favourite-seller', $data);
            }
        } else {
            redirect('social');
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
                redirect('buyer/favourite_seller');
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
            redirect('buyer/favourite_seller');
        } else {
            redirect('buyer/favourite_seller');
        }
    }

}
