<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('rfq_model');
        $this->load->model('roles_model');
        
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index() {
        $this->outputData['notification'] = "";
        $this->session->sess_destroy();
        $this->load->view('partner/apply', $this->outputData);
    }

    public function school() {
        $this->outputData['notification'] = "";
        $this->outputData['countries'] = $this->rfq_model->getAllCountries();
        $this->load->view('partner/school_application', $this->outputData);
    }

    public function hotel() {
        $this->outputData['notification'] = "";
        $this->outputData['countries'] = $this->rfq_model->getAllCountries();
        $this->load->view('partner/hotel_application', $this->outputData);
    }

    public function association() {
        $this->outputData['notification'] = "";
        $this->outputData['countries'] = $this->rfq_model->getAllCountries();
        $this->outputData['roles'] = $this->roles_model->getAllParentForSite();
        $this->load->view('partner/association_application', $this->outputData);
    }

    public function influencer() {
        $this->outputData['notification'] = "";
        $this->outputData['countries'] = $this->rfq_model->getAllCountries();
        $this->load->view('partner/influencer_application', $this->outputData);
    }

    public function apply_new() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('list', 'Apply Type', 'required');
        if ($this->form_validation->run()) {
            if ($this->input->post('list') == 0) {
                redirect('partner/apply');
            } else if ($this->input->post('list') == 1) {
                redirect('partner/apply/school');
            } else if ($this->input->post('list') == 2) {
                redirect('partner/apply/hotel');
            } else if ($this->input->post('list') == 3) {
                redirect('partner/apply/association');
            } else if ($this->input->post('list') == 4) {
                redirect('partner/apply/influencer');
            }
        } else {
            if (!empty($this->form_validation->error_array())) {
                // Form submitted with error
                $error = $this->form_validation->error_array();
                if (isset($error['list'])) {
                    $this->session->set_flashdata('list', $error['list']);
                }
                redirect('partner/apply/apply_new');
            }
            // Getting existing types for dropdown
            $this->load->view('partner/apply', $data);
        }
    }

}
