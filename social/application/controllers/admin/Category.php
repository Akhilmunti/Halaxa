<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->library('upload');
        $this->load->helper('download');
    }
    
    public function index() {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $this->load->model('category_model');
            $cats = $this->category_model->get_categories();
            $data['cats'] = $cats;
            $this->load->view('admin/category-manage', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function add_new() {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('catname', 'category name', 'required');
            $this->form_validation->set_rules('typename', 'type name', 'required');
            if ($this->form_validation->run()) {
                $this->load->model('category_model');
                $data = array(
                    'Category' => $this->input->post('catname'),
                    'T_Key' => $this->input->post('typename'),
                    'Created_On' => date("Y-m-d H:i:s"),
                    'Modified_On' => date("Y-m-d H:i:s"),
                );

                if ($result = $this->category_model->add_category($data)) {
                    $this->session->set_flashdata('result', 'Category added');
                } else {
                    $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                }
                redirect('admin/category');
            } else {
                if (!empty($this->form_validation->error_array())) {
                    // Form submitted with error
                    $error = $this->form_validation->error_array();
                    if (isset($error['catname'])) {
                        $this->session->set_flashdata('catname', $error['catname']);
                    }
                    if (isset($error['typename'])) {
                        $this->session->set_flashdata('typename', $error['typename']);
                    }
                    redirect('admin/category/add-new');
                }

                // Getting existing types for dropdown
                $this->load->model('type_model');
                $data['types'] = $this->type_model->get_types();

                $this->load->view('admin/category-addnew', $data);
            }
        } else {
            redirect('admin/login');
        }
    }

    public function delete($id = null) {
        if ($id != '') {
            $this->load->model('category_model');
            if ($result = $this->category_model->delete_cat($id)) {
                $this->session->set_flashdata('result', 'Category successfully deleted.');
            } else {
                $this->session->set_flashdata('result', 'Something went wrong.');
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong.');
        }
        redirect('admin/category');
    }

    public function edit($id = null) {

        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            // validate numeric id
            if ($id != '' && preg_match("/^[0-9]+$/", $id)) {
                $this->load->model('category_model');
                $this->load->library('form_validation');

                // Data validate
                $this->form_validation->set_rules('catname', 'category name', 'required');
                $this->form_validation->set_rules('typename', 'type name', 'required');
                if ($this->form_validation->run()) {
                    // form validated, upadte data
                    $data = array(
                        'Category' => $this->input->post('catname'),
                        'T_Key' => $this->input->post('typename'),
                        'Modified_On' => date("Y-m-d H:i:s"),
                    );
                    if ($this->category_model->update_element_byID($id, $data)) {
                        $this->session->set_flashdata('result', 'Category updated');
                    } else {
                        $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                    }
                    redirect('admin/category');
                } else {
                    if (!empty($this->form_validation->error_array())) {
                        // form get validation issues.
                        redirect('admin/category/edit/' . $id);
                    }
                    // call view
                    if ($temp = $this->category_model->get_element_byID($id)) {
                        $data = $temp;
                        $data['categoryid'] = $id;
                        $this->load->view('admin/category-edit', $data);
                    } else {
                        show_404();
                    }
                }
            } else {
                show_404();
            }
        } else {
            redirect('admin/login');
        }
    }

}
