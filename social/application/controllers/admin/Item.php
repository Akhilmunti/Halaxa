<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

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
            $this->load->model('item_model');
            $items = $this->item_model->get_items();
            $data['items'] = $items;
            $this->load->view('admin/item-manage', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function add_new() {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('itemname', 'item name', 'required');
            if ($this->form_validation->run()) {
                $this->load->model('item_model');

                $data = array(
                    'Item' => $this->input->post('itemname'),
                    'Created_On' => date("Y-m-d H:i:s"),
                    'Modified_On' => date("Y-m-d H:i:s"),
                );

                if ($result = $this->item_model->add_item($data)) {
                    $this->session->set_flashdata('result', 'item added');
                } else {
                    $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                }
                redirect('admin/item');
            } else {
                if (!empty($this->form_validation->error_array())) {
                    $error = $this->form_validation->error_array();
                    $this->session->set_flashdata('itemname', $error['itemname']);
                }
                $this->load->view('admin/item-addnew');
            }
        } else {
            redirect('admin/login');
        }
    }

    public function delete($id = null) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            if ($id != '') {
                $this->load->model('item_model');

                if ($result = $this->item_model->delete_item($id)) {
                    $this->session->set_flashdata('result', 'Item deleted successfully.');
                } else {
                    $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                }
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.');
            }
            redirect('admin/item');
        } else {
            redirect('admin/login');
        }
    }

    public function edit($id = null) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            // validate nuu=meric id
            if ($id != '' && preg_match("/^[0-9]+$/", $id)) {
                $this->load->model('item_model');
                $this->load->library('form_validation');

                // Data validate
                $this->form_validation->set_rules('itemname', 'item name', 'required');
                if ($this->form_validation->run()) {
                    // form validated, upadte data
                    $data = array(
                        'Item' => $this->input->post('itemname'),
                        'Modified_On' => date("Y-m-d H:i:s"),
                    );
                    if ($this->item_model->update_element_byID($id, $data)) {
                        $this->session->set_flashdata('result', 'Item updated');
                    } else {
                        $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                    }
                    redirect('admin/item');
                } else {
                    if (!empty($this->form_validation->error_array())) {
                        // form get validation issues.
                        redirect('admin/item/edit/' . $id);
                    }
                    // call view
                    if ($temp = $this->item_model->get_element_byID($id)) {
                        $data['itemdata'] = $temp;
                        $data['itemid'] = $id;
                        $this->load->view('admin/item-edit', $data);
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
