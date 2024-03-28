<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Currency extends CI_Controller {

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            $this->load->model('currency_model');
            $currencies = $this->currency_model->get_currency();
            $data['currencies'] = $currencies;
            $this->load->view('admin/currency-manage', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function add_new() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('currency', 'currency name', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('currency_model');
            $data = array(
                'currency' => $this->input->post('currency'),
            );

            if ($result = $this->currency_model->add_currency($data)) {
                $this->session->set_flashdata('result', 'currency added');
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.');
            }
            redirect('admin/currency');
        } else {
            if (!empty($this->form_validation->error_array())) {
                $error = $this->form_validation->error_array();
                $this->session->set_flashdata('currency', $error['currency']);
            }
            $this->load->view('admin/currency-addnew');
        }
    }

    public function delete($id = null) {
        if ($id != '') {
            $this->load->model('currency_model');
            if ($result = $this->currency_model->delete_currency($id)) {
                $this->session->set_flashdata('result', 'currency deleted successfully.');
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.');
            }
        } else {
            $this->session->set_flashdata('result', 'Failed. Something went wrong.');
        }
        redirect('admin/currency');
    }

    public function edit($id = null) {
        // validate nuu=meric id
        if ($id != '' && preg_match("/^[0-9]+$/", $id)) {
            $this->load->model('currency_model');
            $this->load->library('form_validation');
            // Data validate
            $this->form_validation->set_rules('currency', 'currency name', 'required');
            if ($this->form_validation->run()) {
                // form validated, upadte data
                $data = array(
                    'currency' => $this->input->post('currency'),
                );
                if ($this->currency_model->update_element_byID($id, $data)) {
                    $this->session->set_flashdata('result', 'currency updated');
                } else {
                    $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                }
                redirect('admin/currency');
            } else {
                if (!empty($this->form_validation->error_array())) {
                    // form get validation issues.
                    redirect('admin/currency/edit/' . $id);
                }
                // call view
                if ($temp = $this->currency_model->get_element_byID($id)) {
                    $data['currencydata'] = $temp;
                    $data['currencyid'] = $id;
                    $this->load->view('admin/currency-edit', $data);
                } else {
                    show_404();
                }
            }
        } else {
            show_404();
        }
    }

}
