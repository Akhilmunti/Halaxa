<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clientele extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->load->library('session');
        $this->load->model('city_model');
        $this->load->model('users_model');
        $this->load->model('category_model');
        $this->load->model('subcategory_model');
        $this->load->model('type_model');
        $this->load->model('rfq_model');
        $this->load->model('product_model');
        $this->load->model('clientele_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
        date_default_timezone_set('Asia/Calcutta');
        error_reporting(0);
    }

    public function index() {
        $this->outputData['notification'] = "";
        $cities = $this->city_model->get_cities();
        $data['cities'] = $cities;
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['clients'] = $this->clientele_model->getClientByUser($mUserId);
        $this->load->view('vendor/clientele', $data);
    }

    public function addClient() {
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('clientName', 'Client Name', 'required');
        if ($this->form_validation->run()) {
            $mLogo = $this->input->post('clientLogo');
            $mLogoUniqueId = $this->uploadDocument('clientLogo', $mLogo);

            $data = array(
                'User_Id' => $mUserId,
                'client_name' => $this->input->post('clientName'),
                'client_logo' => $mLogoUniqueId,
            );
            if ($this->clientele_model->add_client($data)) {
                $logData = array(
                    'log' => " {$this->input->post('clientName')} has been added successfully.",
                    'User_Id' => $mUserId,
                );
                $this->users_model->add_log($logData);
                $this->session->set_flashdata('result', 'Client added successfully');
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
            }
        } else {
            $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
            $error = $this->form_validation->error_array();
            if (isset($error['clientName'])) {
                $this->session->set_flashdata('clientName', $error['clientName']);
            }
        }
        redirect('vendor/clientele');
    }

    public function deleteClient($id) {
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($id)) {
            $insert = $this->clientele_model->delete_client($id);
            if ($insert) {
                $logData = array(
                    'log' => "A client with id- {$id} deleted successfully.",
                    'User_Id' => $mUserId,
                );
                $this->users_model->add_log($logData);
                $this->session->set_flashdata('result', "Client deleted successfully.");
                redirect('vendor/clientele');
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong !!');
            redirect('vendor/clientele');
        }
    }

    public function uploadDocument($mId, $mFile) {
        $config['upload_path'] = './uploads/';
        //$config['file_name'] = basename($_FILES['uploadfile']['name']);
        $config['file_name'] = $mFile;
        $config['allowed_types'] = 'jpg|jpeg|gif|png|zip|xlsx|cad|pdf|doc|docx|ppt|pptx|pps|ppsx|odt|xls|xlsx|.mp3|m4a|ogg|wav|mp4|m4v|mov|wmv';
        $config['overwrite'] = false;
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $data = array();
        if (!$this->upload->do_upload($mId)) {
            $mOutPut = $this->upload->data();
            $filename = "";
            $data['file_name'] = "";
            $data['result'] = 'fail';
            $data['message'] = $this->upload->display_errors();
        } else {
            $mOutPut = $this->upload->data();
            $filename = $mOutPut['file_name'];
            $data['file_name'] = $mOutPut['file_name'];
            $data['result'] = 'success';
            $data['message'] = 'file was uploaded fine';
            $data['error'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
        }
        return $filename;
    }

}
