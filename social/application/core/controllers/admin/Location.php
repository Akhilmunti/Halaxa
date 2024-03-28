<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {

    public function index() {
        $this->load->model('location_model');
        $locations = $this->location_model->get_locations();
        $data['locations'] = $locations;
        $this->load->view('admin/location-manage', $data);
    }

    public function add_new() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('locationname', 'location name', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('location_model');

            $data = array(
                'location' => $this->input->post('locationname'),
                'Created_On' => date("Y-m-d H:i:s"),
                'Modified_On' => date("Y-m-d H:i:s"),
            );

            if ($result = $this->location_model->add_location($data)) {
                $this->session->set_flashdata('result', 'location added');
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.');
            }
            redirect('admin/location');
        } else {
            if (!empty($this->form_validation->error_array())) {
                $error = $this->form_validation->error_array();
                $this->session->set_flashdata('locationname', $error['locationname']);
            }
            $this->load->view('admin/location-addnew');
        }
    }

    public function delete($id = null) {
        if ($id != '') {
            $this->load->model('location_model');

            if ($result = $this->location_model->delete_location($id)) {
                $this->session->set_flashdata('result', 'Location deleted successfully.');
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.');
            }
        } else {
            $this->session->set_flashdata('result', 'Failed. Something went wrong.');
        }
        redirect('admin/location');
    }

    public function edit($id = null) {
        // validate nuu=meric id
        if ($id != '' && preg_match("/^[0-9]+$/", $id)) {
            $this->load->model('location_model');
            $this->load->library('form_validation');

            // Data validate
            $this->form_validation->set_rules('locationname', 'location name', 'required');
            if ($this->form_validation->run()) {
                // form validated, upadte data
                $data = array(
                    'Location' => $this->input->post('locationname'),
                    'Modified_On' => date("Y-m-d H:i:s"),
                );
                if ($this->location_model->update_element_byID($id, $data)) {
                    $this->session->set_flashdata('result', 'Location updated');
                } else {
                    $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                }
                redirect('admin/location');
            } else {
                if (!empty($this->form_validation->error_array())) {
                    // form get validation issues.
                    redirect('admin/location/edit/' . $id);
                }
                // call view
                if ($temp = $this->location_model->get_element_byID($id)) {
                    $data['locationdata'] = $temp;
                    $data['locationid'] = $id;
                    $this->load->view('admin/location-edit', $data);
                } else {
                    show_404();
                }
            }
        } else {
            show_404();
        }
    }

}
