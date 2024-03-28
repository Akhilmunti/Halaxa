<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_category extends CI_Controller {

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            $this->load->model('subcategory_model');
            $subcats = $this->subcategory_model->get_subcategories();
            $data['subcats'] = $subcats;
            $this->load->view('admin/subcategory-manage', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function add_new() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subcatname', 'subcategory name', 'required');
        $this->form_validation->set_rules('catname', 'category name', 'required');
        if ($this->form_validation->run()) {

            $this->load->model('subcategory_model');

            $data = array(
                'Sub_Category' => $this->input->post('subcatname'),
                'CT_Key' => $this->input->post('catname'),
                'Created_On' => date("Y-m-d H:i:s"),
                'Modified_On' => date("Y-m-d H:i:s"),
            );

            if ($result = $this->subcategory_model->add_subcategory($data)) {
                $this->session->set_flashdata('result', 'Subcategory added');
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.');
            }
            redirect('admin/sub-category');
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
                redirect('admin/sub-category/add-new');
            }

            // Getting existing types for dropdown
            $this->load->model('category_model');
            $data['categories'] = $this->category_model->get_categories();
            // echo "<pre>";
            // print_r($data['categories']);
            // exit;
            $this->load->view('admin/subcategory-addnew', $data);
        }
    }

    public function delete($id = null) {
        if ($id != '') {
            $this->load->model('subcategory_model');
            if ($result = $this->subcategory_model->delete_subcat($id)) {
                $this->session->set_flashdata('result', 'Sub-Category deleted successfully.');
            } else {
                $this->session->set_flashdata('result', 'Something went wrong.');
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong.');
        }
        redirect('admin/sub-category');
    }

    public function edit($id = null) {
        // validate nuu=meric id
        if ($id != '' && preg_match("/^[0-9]+$/", $id)) {
            $this->load->model('subcategory_model');
            $this->load->library('form_validation');

            // Data validate
            $this->form_validation->set_rules('subcatname', 'subcategory name', 'required');
            $this->form_validation->set_rules('catname', 'category name', 'required');
            if ($this->form_validation->run()) {
                // form validated, upadte data
                $data = array(
                    'Sub_Category' => $this->input->post('subcatname'),
                    'CT_Key' => $this->input->post('catname'),
                    'Modified_On' => date("Y-m-d H:i:s"),
                );
                if ($this->subcategory_model->update_element_byID($id, $data)) {
                    $this->session->set_flashdata('result', 'Category updated');
                } else {
                    $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                }
                redirect('admin/sub-category');
            } else {
                if (!empty($this->form_validation->error_array())) {
                    // form get validation issues.
                    $this->session->set_flashdata('subcatname', $error['subcatname']);
                    $this->session->set_flashdata('catname', $error['catname']);
                    redirect('admin//sub-category/edit/' . $id);
                }
                // call view
                if ($temp = $this->subcategory_model->get_element_byID($id)) {
                    $data = $temp;
                    $data['subcategoryid'] = $id;
                    $this->load->view('admin/subcategory-edit', $data);
                } else {
                    show_404();
                }
            }
        } else {
            show_404();
        }
    }

}
