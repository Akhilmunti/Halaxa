<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('city_model');
        $this->load->model('location_model');
        date_default_timezone_set('Asia/Calcutta');
    }

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            $cities = $this->city_model->get_cities();
            $location = $this->location_model->get_locations();
            $data['cities'] = $cities;
            $data['locations'] = $location;
            $this->load->view('admin/city-manage', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function add_new() {
        $cities = $this->city_model->get_cities();
        $location = $this->location_model->get_locations();
        $data['cities'] = $cities;
        $data['locations'] = $location;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cityname', 'city name', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('city_model');

            $data = array(
                'Country_Key' => $this->input->post('country'),
                'City' => $this->input->post('cityname'),
                'Created_On' => date("Y-m-d H:i:s"),
                'Modified_On' => date("Y-m-d H:i:s"),
            );

            if ($result = $this->city_model->add_city($data)) {
                $this->session->set_flashdata('result', 'city added');
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.');
            }
            redirect('admin/city');
        } else {
            if (!empty($this->form_validation->error_array())) {
                $error = $this->form_validation->error_array();
                $this->session->set_flashdata('cityname', $error['cityname']);
            }
            $this->load->view('admin/city-addnew', $data);
        }
    }

    public function delete($id = null) {
        if ($id != '') {
            $this->load->model('city_model');
            if ($result = $this->city_model->delete_city($id)) {
                $this->session->set_flashdata('result', 'City successfully deleted.');
            } else {
                $this->session->set_flashdata('result', 'Something went wrong.');
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong.');
        }
        redirect('admin/city');
    }

    public function edit($id = null) {
        // validate nuu=meric id
        if ($id != '' && preg_match("/^[0-9]+$/", $id)) {
            $this->load->model('city_model');
            $this->load->library('form_validation');

            // Data validate
            $this->form_validation->set_rules('cityname', 'city name', 'required');
            if ($this->form_validation->run()) {
                // form validated, upadte data
                $data = array(
                    'City' => $this->input->post('cityname'),
                    'Modified_On' => date("Y-m-d H:i:s"),
                );
                if ($this->city_model->update_element_byID($id, $data)) {
                    $this->session->set_flashdata('result', 'City updated');
                } else {
                    $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                }
                redirect('admin/city');
            } else {
                if (!empty($this->form_validation->error_array())) {
                    // form get validation issues.
                    redirect('admin/city/edit/' . $id);
                }
                // call view
                if ($temp = $this->city_model->get_element_byID($id)) {
                    $data['citydata'] = $temp;
                    $data['cityid'] = $id;
                    $this->load->view('admin/city-edit', $data);
                } else {
                    show_404();
                }
            }
        } else {
            show_404();
        }
    }

}
