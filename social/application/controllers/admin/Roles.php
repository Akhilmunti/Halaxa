<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('vendor_model');
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('category_model');
        $this->load->model('subcategory_model');
        $this->load->model('roles_model');
        $this->load->model('rfq_model');
        $this->load->library('email');
        date_default_timezone_set('Asia/Calcutta');
    }

    public function index() {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $data['result'] = "";
            $data['roles'] = $this->roles_model->getAllParent();
            $this->load->view('admin/roles', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function add() {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $data['result'] = "";
            $data['roles'] = $this->roles_model->getAllParent();
            $this->load->view('admin/role_add', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function actionAdd() {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'question', 'required');
            //$this->form_validation->set_rules('note', 'note', 'required');
            if ($this->form_validation->run()) {
                $data = array(
                    'role_key' => $this->mGenerateRandomNumber(),
                    'role_name' => $this->input->post('name'),
                    'role_date_added' => date('Y-m-d H:i:s'),
                    'role_date_updated' => date('Y-m-d H:i:s'),
                );

                if ($result = $this->roles_model->addParent($data)) {
                    $this->session->set_flashdata('result', 'Role added');
                } else {
                    $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                }
                redirect('admin/roles');
            } else {
                $this->session->set_flashdata('result', 'Validation Error.');
                $this->load->view('admin/role_add');
            }
        } else {
            redirect('admin/login');
        }
    }

    public function mGenerateRandomNumber() {
        $key = '';
        $keys = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
        for ($i = 0; $i < 25; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }

    public function actionDelete($id = null) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            if ($id != '') {
                $result = $this->roles_model->deleteParentByKey($id);
                if ($result) {
                    $this->session->set_flashdata('result', 'Role deleted successfully.');
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong.');
                }
            } else {
                $this->session->set_flashdata('result', 'Something went wrong.');
            }
            redirect('admin/roles');
        } else {
            redirect('admin/login');
        }
    }
    
    public function actionDisable($id = null) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            if ($id != '') {
                
                $data = array(
                    'role_status' => 0,
                    'role_date_updated' => date('Y-m-d H:i:s'),
                );
                
                $result = $this->roles_model->updateParentByKey($id, $data);
                if ($result) {
                    $this->session->set_flashdata('result', 'Role disabled successfully.');
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong.');
                }
            } else {
                $this->session->set_flashdata('result', 'Something went wrong.');
            }
            redirect('admin/roles');
        } else {
            redirect('admin/login');
        }
    }
    
    public function actionEnable($id = null) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            if ($id != '') {
                
                $data = array(
                    'role_status' => 1,
                    'role_date_updated' => date('Y-m-d H:i:s'),
                );
                
                $result = $this->roles_model->updateParentByKey($id, $data);
                if ($result) {
                    $this->session->set_flashdata('result', 'Role enabled successfully.');
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong.');
                }
            } else {
                $this->session->set_flashdata('result', 'Something went wrong.');
            }
            redirect('admin/roles');
        } else {
            redirect('admin/login');
        }
    }


    public function view($id = null) {

        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $data['cats'] = $this->rfq_model->getAllCategories();
            $data['scats'] = $this->rfq_model->getAllSubCategories();
            // validate numeric id
            if ($temp = $this->vendor_model->get_elementvendor_byID($id)) {
                $user = $this->users_model->get_user_by_id($id);
                $data['vendordata'] = $temp;
                $data['userdata'] = $user;
                $data['vendoryid'] = $id;
                $this->load->view('admin/vendors-view', $data);
            } else {
                show_404();
            }
        } else {
            redirect('admin/login');
        }
    }

}
