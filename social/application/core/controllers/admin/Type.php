<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Controller {

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            $this->load->model('type_model');
            $types = $this->type_model->get_types();
            $data['types'] = $types;
            $this->load->view('admin/type-manage', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function add_new() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('typename', 'type name', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('type_model');
            $data = array(
                'Type' => $this->input->post('typename'),
                'Created_On' => date("Y-m-d H:i:s"),
                'Modified_On' => date("Y-m-d H:i:s"),
            );

            if ($result = $this->type_model->add_type($data)) {
                $this->session->set_flashdata('result', 'Type added');
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.');
            }
            redirect('/admin/type');
        } else {
            if (!empty($this->form_validation->error_array())) {
                $error = $this->form_validation->error_array();
                $this->session->set_flashdata('typename', $error['typename']);
            }
            $this->load->view('admin/type-addnew');
        }
    }

    public function delete($id = null) {
        if ($id != '') {
            $this->load->model('type_model');
            if ($result = $this->type_model->delete_type($id)) {
                $this->session->set_flashdata('result', 'Group successfully deleted.');
            } else {
                $this->session->set_flashdata('result', 'Something wrong.');
            }
        } else {
            $this->session->set_flashdata('result', 'Something wrong.');
        }
        redirect('/admin/type');
    }

    public function edit($id = null) {
        // validate nuu=meric id
        if ($id != '' && preg_match("/^[0-9]+$/", $id)) {
            $this->load->model('type_model');
            $this->load->library('form_validation');

            // Data validate
            $this->form_validation->set_rules('typename', 'Type name', 'required');
            if ($this->form_validation->run()) {
                // form validated, upadte data
                $data = array(
                    'Type' => $this->input->post('typename'),
                    'Modified_On' => date("Y-m-d H:i:s"),
                );
                if ($this->type_model->update_element_byID($id, $data)) {
                    $this->session->set_flashdata('result', 'Type updated');
                } else {
                    $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                }
                redirect('/admin/type');
            } else {
                if (!empty($this->form_validation->error_array())) {
                    // form get validation issues.
                    redirect('/admin/type/edit/' . $id);
                }
                // call view
                if ($temp = $this->type_model->get_element_byID($id)) {
                    $data['typedata'] = $temp;
                    $data['typeid'] = $id;
                    $this->load->view('admin/type-edit', $data);
                } else {
                    show_404();
                }
            }
        } else {
            show_404();
        }
    }

}
