<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('social_model');
        $this->load->model('rfq_model');
        $this->load->model('category_model');
        $this->load->model('subcategory_model');
        date_default_timezone_set('Asia/Calcutta');
        $this->load->library('form_validation');
        $this->load->library('upload');
        is_logged_in();
        error_reporting(0);
    }

    public function index($id = NULL) {
        if ($id == NULL)
            $id = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($id);
        $data['inmailMessages'] = $this->users_model->getMessages($id);
        $data['logMessages'] = $this->users_model->getLogs($id);
        $data['user'] = $this->users_model->get_element_by($id);
        $data['posts'] = $this->social_model->get_elements($id);
        $data['addresses'] = $this->users_model->get_address_by($id);
        $data['vendor_details'] = $this->users_model->get_vendor_details($id);
        $data['categories'] = $this->rfq_model->getAllCategories();
        $data['scategories'] = $this->rfq_model->getAllSubCategories();
        $data['sidebar'] = "profile";
        $data['navbar'] = "seller";
        $this->load->view('vendor/vendor_profile', $data);
    }

    public function profileDetails($profileName) {
        if ($profileName != '') {
            $data['user'] = $this->users_model->get_element_by_name($profileName);
            $userid = $data['user']->User_Id;
            $data['users'] = $this->rfq_model->getUsers();
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($userid);
            $data['inmailMessages'] = $this->users_model->getMessages($userid);
            $data['logMessages'] = $this->users_model->getLogs($userid);
            $data['posts'] = $this->social_model->get_elements($userid);
            $this->load->view('buyer/read-profile', $data);
        } else {
            redirect('buyer/received_quotes');
        }
    }

    public function profileDetailsByKey($profileName) {
        if ($profileName != '') {
            $data['user'] = $this->users_model->get_element_by($profileName);
            $userid = $data['user']->User_Id;
            $data['users'] = $this->rfq_model->getUsers();
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($userid);
            $data['inmailMessages'] = $this->users_model->getMessages($userid);
            $data['logMessages'] = $this->users_model->getLogs($userid);
            $data['posts'] = $this->social_model->get_elements($userid);
            $this->load->view('buyer/read-profile', $data);
        } else {
            redirect('buyer/received_quotes');
        }
    }

    public function edit($id) {
        $data['users'] = $this->rfq_model->getUsers();
        $userid = $this->session->userdata('User_Id');
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($userid);
        $data['inmailMessages'] = $this->users_model->getMessages($userid);
        $data['logMessages'] = $this->users_model->getLogs($userid);
        $data['user'] = $this->users_model->get_element_by($id);
        $this->load->view('vendor/profile-edit-seller', $data);
    }

    public function deleteAddress($id) {
        $this->users_model->delete_address_byid($id);
        redirect('buyer/profile');
    }

    public function editAddress($id) {
        $data['address'] = $this->users_model->get_address_byid($id);
    }

    public function edit_seller($id) {
        $data['user'] = $this->users_model->get_element_by($id);
        $data['vendor_details'] = $this->users_model->get_vendor_details($id);
        $data['categories'] = $this->category_model->get_cats();
        $data['scategories'] = $this->subcategory_model->get_scats();
        $data['cities'] = $this->category_model->get_cities();
        $data['countries'] = $this->category_model->get_countries();
        $data['states'] = $this->category_model->get_states();
        $this->load->view('vendor/vendor_profile_corporate', $data);
    }

    public function updateSellerDetails() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('companyname', 'companyname', 'required');
        $this->form_validation->set_rules('prelanguage', 'prelanguage', 'required');
        $this->form_validation->set_rules('deliveryaddress', 'deliveryaddress', 'required');
        if ($this->form_validation->run()) {
            // Date format conversion
            $mUserId = $this->session->userdata('User_Id');
            $mLegaldocs = $this->input->post('documents');
            $mLegalUniqueId = $this->uploadDocument('documents_legal', $mLegaldocs);
            
            $data = array(
                'User_Id' => $mUserId,
                'comapany_name' => $this->input->post('companyname'),
                'company_brief' => $this->input->post('companybrief'),
                'language' => $this->input->post('prelanguage'),
                'delivery_address' => $this->input->post('deliveryaddress'),
                'documents' => $mLegalUniqueId,
                'country' => $this->input->post('location'),
                'delivery_areas' => json_encode($this->input->post('deliveryAreas')),
                'payment_mode' => json_encode($this->input->post('card')),
                'categories' => json_encode($this->input->post('categories')),
                'scategories' => json_encode($this->input->post('subcategories')),
            );
            $this->users_model->updateSellerInfo($data, $mUserId);
            $logData = array(
                'log' => "Updated his profile successfully",
                'User_Id' => $mUserId,
            );
            $this->users_model->add_log($logData);
        } else {
            $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
            $error = $this->form_validation->error_array();
            if (isset($error['companyname'])) {
                $this->session->set_flashdata('companyname', $error['companyname']);
            }
            if (isset($error['companybrief'])) {
                $this->session->set_flashdata('companybrief', $error['companybrief']);
            }
            if (isset($error['prelanguage'])) {
                $this->session->set_flashdata('prelanguage', $error['prelanguage']);
            }
            if (isset($error['deliveryaddress'])) {
                $this->session->set_flashdata('deliveryaddress', $error['deliveryaddress']);
            }
        }
        $this->session->set_flashdata('result', 'Seller profile successfully updated');
        redirect('vendor/profile');
    }

    public function addDeliveryAdress() {
        $id = $this->session->userdata('User_Id');
        if (!empty($id)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('delivery', 'delivery_address', 'required');
            if ($this->form_validation->run()) {
                $data = array(
                    'User_Id' => $id,
                    'delivery_address' => $this->input->post('delivery'),
                );
                $this->users_model->add_delivery_address($data);
            } else {
                $this->session->set_flashdata('deliveryresult', 'Failed. Something went wrong.' . $this->form_validation->error_string());
                $error = $this->form_validation->error_array();
                if (isset($error['delivery'])) {
                    $this->session->set_flashdata('delivery', $error['delivery']);
                }
            }
            $this->session->set_flashdata('deliveryresult', 'Delivery address added successfully.');
            $logData = array(
                'log' => "Added new delivery address.",
                'User_Id' => $id,
            );
            $this->users_model->add_log($logData);
            redirect('buyer/profile');
        } else {
            redirect('login');
        }
    }

    public function updateDeliveryAdress($id) {
        $Userid = $this->session->userdata('User_Id');
        if (!empty($id)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('delivery', 'delivery_address', 'required');
            if ($this->form_validation->run()) {
                $data = array(
                    'delivery_address' => $this->input->post('delivery'),
                );
                $this->users_model->update_delivery_address($data, $id);
            } else {
                $this->session->set_flashdata('deliveryresult', 'Failed. Something went wrong.' . $this->form_validation->error_string());
                $error = $this->form_validation->error_array();
                if (isset($error['delivery'])) {
                    $this->session->set_flashdata('delivery', $error['delivery']);
                }
            }
            $this->session->set_flashdata('deliveryresult', 'Delivery address updated successfully.');
            $logData = array(
                'log' => "Delivery address updated successfully.",
                'User_Id' => $Userid,
            );
            $this->users_model->add_log($logData);
            redirect('buyer/profile');
        } else {
            redirect('login');
        }
    }

    public function uploadDocument($mId, $mFile) {
        $config['upload_path'] = './uploads/';
//$config['file_name'] = basename($_FILES['uploadfile']['name']);
        $config['file_name'] = $mFile;
        $config['allowed_types'] = 'jpg|jpeg|gif|png|zip|xlsx|cad|pdf|doc|docx|ppt|pptx|pps|ppsx|odt|xls|xlsx|.mp3|m4a|ogg|wav|mp4|m4v|mov|wmv';
        $config['overwrite'] = false;
        $config['encrypt_name'] = true;
//$this->load->library('upload', $config);
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
