<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->load->library('session');
        $this->load->model('city_model');
        $this->load->model('users_model');
        $this->load->model('groups_model');
        $this->load->model('rfq_model');
        $this->load->model('product_model');
        date_default_timezone_set('Asia/Calcutta');
        error_reporting(0);
    }

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['groups'] = $this->groups_model->getGroupByUser($mUserId);
        $data['products'] = $this->product_model->getProducts($mUserId, "0");
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['sidebar'] = "groups";
        $data['navbar'] = "seller";
        $this->load->view('vendor/groups_manage', $data);
    }

    public function deleteGroup($id) {
        if (!empty($id)) {
            $this->groups_model->delete_group($id);
            $this->session->set_flashdata('result', 'Group deleted successfully');
            redirect('vendor/groups');
        } else {
            $this->session->set_flashdata('result', 'Something went wrong !!');
            redirect('vendor/groups');
        }
    }

    public function updateProducts($id) {
        if (!empty($id)) {
            $products = $this->input->post('products');
            if (!empty($products)) {
                $data = array(
                    'selected_products' => json_encode($products),
                );
                $insert = $this->groups_model->update_element_byID($id, $data);
                if ($insert) {
                    $this->session->set_flashdata('result', "Products updated to the group with the id - {$id}");
                    redirect('vendor/groups');
                }
            } else {
                $this->session->set_flashdata('result', "Select products !!");
                redirect('vendor/groups');
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong !!');
            redirect('vendor/groups');
        }
    }

    public function updateProductsName($id) {
        if (!empty($id)) {
            $products = $this->input->post('groupname');
            if (!empty($products)) {
                $data = array(
                    'group_name' => $this->input->post('groupname'),
                );
                $insert = $this->groups_model->update_element_byID($id, $data);
                if ($insert) {
                    $this->session->set_flashdata('result', "Group Name changed successfully.");
                    redirect('vendor/groups');
                }
            } else {
                $this->session->set_flashdata('result', 'Something went wrong !!');
                redirect('vendor/groups');
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong !!');
            redirect('vendor/groups');
        }
    }

    public function renameGroup($id) {
        if (!empty($id)) {
            $groupname = $this->input->post('groupname');
            $data = array(
                'group_name' => $groupname,
            );
            $insert = $this->groups_model->update_element_byID($id, $data);
            if ($insert) {
                $logData = array(
                    'log' => "A group with name - {$groupname} updated successfully.",
                    'User_Id' => $mUserId,
                );
                $this->users_model->add_log($logData);
                $this->session->set_flashdata('result', "Group name with the ID - {$id} has been changed");
                redirect('vendor/groups');
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong !!');
            redirect('vendor/groups');
        }
    }

    public function createGroup() {
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('groupname', 'Group Name', 'required');
        if ($this->form_validation->run()) {
            $data = array(
                'User_Id' => $mUserId,
                'group_name' => $this->input->post('groupname'),
            );
            if ($this->groups_model->add_group($data)) {
                $logData = array(
                    'log' => "A group with name - {$this->input->post('groupname')} created successfully.",
                    'User_Id' => $mUserId,
                );
                $this->users_model->add_log($logData);
                $this->session->set_flashdata('result', 'Group created successfully');
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
            }
        } else {
            $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
            $error = $this->form_validation->error_array();
            if (isset($error['groupname'])) {
                $this->session->set_flashdata('groupname', $error['groupname']);
            }
        }
        redirect('vendor/groups');
    }

}
