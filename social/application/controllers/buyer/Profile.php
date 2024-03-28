<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('social_model');
        $this->load->model('category_model');
        $this->load->model('subcategory_model');
        $this->load->model('rfq_model');
        date_default_timezone_set('Asia/Calcutta');
        is_logged_in();
        error_reporting(0);
    }

    public function index() {
        $id = $this->session->userdata('User_Id');
        if ($id) {
            $data['sidebar'] = "profile";
            $data['navbar'] = "seller";
            $data['locations'] = $this->rfq_model->getAllLocs();
            $data['countries'] = $this->category_model->get_countries();
            $data['states'] = $this->category_model->get_states();
            $data['categories'] = $this->rfq_model->getAllCategories();
            $data['scategories'] = $this->rfq_model->getAllSubCategories();
            $data['user'] = $this->users_model->get_element_by($id);
            $id = $this->session->userdata('User_Id');
            $data['inmailMessages'] = $this->users_model->getMessages($id);
            $this->load->view('buyer/profile_tab', $data);
        } else {
            show_404();
        }
    }

    public function profileDetails($profileName) {
        if ($profileName != '') {
            $data['user'] = $this->users_model->get_element_by_name($profileName);
            $userid = $data['user']->User_Id;
            $data['inmailMessages'] = $this->users_model->getMessages($userid);
            $data['logMessages'] = $this->users_model->getLogs($userid);
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($userid);
            $data['posts'] = $this->social_model->get_elements($userid);
            $this->load->view('buyer/read-profile', $data);
        } else {
            redirect('buyer/received_quotes');
        }
    }

    public function edit($id) {
        $id = $this->session->userdata('User_Id');
        $data['user'] = $this->users_model->get_element_by($id);
        $data['inmailMessages'] = $this->users_model->getMessages($id);
        $data['logMessages'] = $this->users_model->getLogs($id);
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($id);
        $this->load->view('buyer/profile-edit', $data);
    }

    public function deleteAddress($id) {
        $this->users_model->delete_address_byid($id);
        redirect('buyer/profile');
    }

    public function editAddress($id) {
        $data['address'] = $this->users_model->get_address_byid($id);
    }

    public function edit_corporate($id) {
        $data['locations'] = $this->rfq_model->getAllLocs();
        $data['categories'] = $this->rfq_model->getAllCategories();
        $data['scategories'] = $this->rfq_model->getAllSubCategories();
        $data['user'] = $this->users_model->get_element_by($id);
        $id = $this->session->userdata('User_Id');
        $data['inmailMessages'] = $this->users_model->getMessages($id);
        $this->load->view('buyer/profile-edit-corporate', $data);
    }

    public function edit_save($id) {
        $pic_err_flag = 0;
        $Photo = '';
        $pic_err = array();

        if ($_FILES['Photo']['name']) {
            $config['upload_path'] = './assets/photo';
            $config['allowed_types'] = 'jpg|jpeg|gif|png';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('Photo')) {
                $error = array('error' => $this->upload->display_errors());

                $pic_err['error'] = $error;

                $pic_err_flag = 1;
            } else {

                $upload_data = $this->upload->data();
                $Photo = $upload_data['file_name'];
            }
        }

        if ($Photo == '')
            $Photo = $this->input->post('hidden_photo');

        $data = array(
            'Name' => $this->input->post('Name'),
            'Phone' => $this->input->post('Phone'),
            'Email' => $this->input->post('Email'),
            'Address' => $this->input->post('Address'),
            'Photo' => $Photo,
            'Modified_On' => date("Y-m-d H:m:s")
        );

        if ($pic_err_flag == 0) {
            if ($result = $this->users_model->update_element_byID($id, $data)) {
                $logData = array(
                    'log' => $this->input->post('Name') . " updated profile successfully.",
                    'User_Id' => $id,
                );
                $this->users_model->add_log($logData);
                $this->session->set_flashdata('Sucess', 'User data updated successfully');
            } else {
                $this->session->set_flashdata('Error', 'Failed. Something went wrong.');
            }
        } else {
            $this->session->set_flashdata('PicError', 'Pic Not Uploaded');
        }

        redirect('buyer/profile');
    }

    public function updateCorporateDetails() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('companyname', 'companyname', 'required');
        $this->form_validation->set_rules('companybrief', 'companybrief', 'required');
        $this->form_validation->set_rules('prelanguage', 'prelanguage', 'required');
        $this->form_validation->set_rules('deliveryaddress', 'deliveryaddress', 'required');
        if ($this->form_validation->run()) {
            // Date format conversion
            $mUserId = $this->session->userdata('User_Id');
            $data = array(
                //here 1 is buyer type
                'User_Type' => "1",
                'Designation' => $this->input->post('designation'),
                'Company_name' => $this->input->post('companyname'),
                'Company_brief' => $this->input->post('companybrief'),
                'preferred_lang' => $this->input->post('prelanguage'),
                'delivery_address' => $this->input->post('deliveryaddress'),
                'category' => $this->input->post('Preferrence'),
                'payment_mode' => json_encode($this->input->post('card')),
                'Locations' => $this->input->post('locations'),
                'payment_structure' => $this->input->post('paymentstructure'),
            );
            $this->users_model->updateUserInfo($data, $mUserId);
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
        $this->session->set_flashdata('result', 'Buyer company profile updated successfully');
        redirect('buyer/profile');
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
            redirect('buyer/profile');
        } else {
            redirect('login');
        }
    }

    public function updateDeliveryAdress($id) {
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
            redirect('buyer/profile');
        } else {
            redirect('login');
        }
    }

}
