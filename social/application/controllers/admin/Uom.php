<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Uom extends CI_Controller {

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
            $this->load->model('uom_model');
            $uoms = $this->uom_model->get_uoms();
            $data['uoms'] = $uoms;
            $this->load->view('admin/uom-manage', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function add_new() {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('uomname', 'uom name', 'required');
            if ($this->form_validation->run()) {
                $this->load->model('uom_model');

                $data = array(
                    'Uom' => $this->input->post('uomname'),
                    'Created_On' => date("Y-m-d H:i:s"),
                    'Modified_On' => date("Y-m-d H:i:s"),
                );

                if ($result = $this->uom_model->add_uom($data)) {
                    $this->session->set_flashdata('result', 'UoM added');
                } else {
                    $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                }
                redirect('admin/uom');
            } else {
                if (!empty($this->form_validation->error_array())) {
                    $error = $this->form_validation->error_array();
                    $this->session->set_flashdata('uomname', $error['uomname']);
                }
                $this->load->view('admin/uom-addnew');
            }
        } else {
            redirect('admin/login');
        }
    }

    public function delete($id = null) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            if ($id != '') {
                $this->load->model('uom_model');
                if ($result = $this->uom_model->delete_uom($id)) {
                    $this->session->set_flashdata('result', 'UOM deleted successfully.');
                } else {
                    $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                }
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.');
            }
            redirect('admin/uom');
        } else {
            redirect('admin/login');
        }
    }

    public function edit($id = null) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            // validate nuu=meric id
            if ($id != '' && preg_match("/^[0-9]+$/", $id)) {
                $this->load->model('uom_model');
                $this->load->library('form_validation');

                // Data validate
                $this->form_validation->set_rules('uomname', 'UoM name', 'required');
                if ($this->form_validation->run()) {
                    // form validated, upadte data
                    $data = array(
                        'Uom' => $this->input->post('uomname'),
                        'Modified_On' => date("Y-m-d H:i:s"),
                    );
                    if ($this->uom_model->update_element_byID($id, $data)) {
                        $this->session->set_flashdata('result', 'UoM updated');
                    } else {
                        $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                    }
                    redirect('admin/uom');
                } else {
                    if (!empty($this->form_validation->error_array())) {
                        // form get validation issues.
                        redirect('admin/uom/edit/' . $id);
                    }
                    // call view
                    if ($temp = $this->uom_model->get_element_byID($id)) {
                        $data['uomdata'] = $temp;
                        $data['uomid'] = $id;
                        $this->load->view('admin/uom-edit', $data);
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
