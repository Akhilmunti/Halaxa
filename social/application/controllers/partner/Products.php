<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function index() {
        $this->load->model('city_model');
        $cities = $this->city_model->get_cities();
        $data['cities'] = $cities;
        $this->load->view('vendor/product_manage', $data);
    }

    public function create_submit() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('types', 'type', 'required');
        $this->form_validation->set_rules('categories', 'category', 'required');
        $this->form_validation->set_rules('subcategories', 'sub-category', 'required');
        $this->form_validation->set_rules('startdate', 'start date', 'required');
        $this->form_validation->set_rules('enddate', 'end date', 'required');
        $this->form_validation->set_rules('location', 'location', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('deliveryaddress', 'delivery address', 'required');
        $this->form_validation->set_rules('paymentmethod', 'payment method', 'required');
        $this->form_validation->set_rules('vendor_id[]', 'vendor', 'required');
        if ($this->form_validation->run()) {
            // Date format conversion
            $startdate = $this->input->post('startdate');
            $date = DateTime::createFromFormat('m/d/Y', $startdate);
            $Start = $date->format('Y-m-d 00:00:00');

            $enddate = $this->input->post('enddate');
            $date = DateTime::createFromFormat('m/d/Y', $startdate);
            $End = $date->format('Y-m-d 00:00:00');

            $data = array(
                'T_Key' => $this->input->post('types'),
                'CT_Key' => $this->input->post('categories'),
                'SCT_Key' => $this->input->post('subcategories'),
                'Start' => $Start,
                'End' => $End,
                'Location' => $this->input->post('location'),
                'City' => $this->input->post('city'),
                'Deliveryaddress' => $this->input->post('deliveryaddress'),
                'Paymentmethod' => $this->input->post('paymentmethod'),
                'Created_On' => date("Y-m-d H:i:s"),
                'Modified_On' => date("Y-m-d H:i:s"),
                'itemsinfo' => json_encode($this->input->post('iteminfo')),
                'V_Ids' => json_encode($this->input->post('vendor_id')),
            );
            if ($insertid = $this->rfq_model->addRfq($data)) {

                $file1 = '';
                $file2 = '';
                if (isset($_FILES['Fichier1'])) {
                    $file1_name = $_FILES['Fichier1']['name'];
                    $file1_type = $_FILES['Fichier1']['type'];
                    $file1_tmp_name = $_FILES['Fichier1']['tmp_name'];

                    $file1 = $insertid . "_file1_" . $file1_name;
                    $fileToUpload = FCPATH . "user_files/rfq_files/" . $file1;
                    move_uploaded_file($file1_tmp_name, $fileToUpload);
                }

                if (isset($_FILES['Fichier2'])) {
                    $file1_name = $_FILES['Fichier2']['name'];
                    $file1_type = $_FILES['Fichier2']['type'];
                    $file1_tmp_name = $_FILES['Fichier2']['tmp_name'];

                    $file2 = $insertid . "_file2_" . $file1_name;
                    $fileToUpload = FCPATH . "user_files/rfq_files/" . $file2;
                    move_uploaded_file($file1_tmp_name, $fileToUpload);
                }

                if ($file1 != '' || $file2 != '') {
                    $files = array(
                        'file1' => $file1,
                        'file2' => $file2
                    );
                    $this->rfq_model->updateRfqFileInfo($files, $insertid);
                }

                $this->session->set_flashdata('result', 'RFQ submitted successfully');
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
            }
        } else {
            $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
            $error = $this->form_validation->error_array();
            if (isset($error['types'])) {
                $this->session->set_flashdata('types', $error['types']);
            }
            if (isset($error['categories'])) {
                $this->session->set_flashdata('categories', $error['categories']);
            }
            if (isset($error['subcategories'])) {
                $this->session->set_flashdata('subcategories', $error['subcategories']);
            }
            if (isset($error['startdate'])) {
                $this->session->set_flashdata('startdate', $error['startdate']);
            }
            if (isset($error['location'])) {
                $this->session->set_flashdata('location', $error['location']);
            }
            if (isset($error['city'])) {
                $this->session->set_flashdata('city', $error['city']);
            }
        }
        redirect('buyer/rfq');
    }

    public function add_new() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cityname', 'city name', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('city_model');

            $data = array(
                'City' => $this->input->post('cityname'),
                'Created_On' => date("Y-m-d H:i:s"),
                'Modified_On' => date("Y-m-d H:i:s"),
            );

            if ($result = $this->city_model->add_city($data)) {
                $this->session->set_flashdata('result', 'city added');
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.');
            }
            redirect('vendor/products');
        } else {
            if (!empty($this->form_validation->error_array())) {
                $error = $this->form_validation->error_array();
                $this->session->set_flashdata('cityname', $error['cityname']);
            }
            $this->load->view('vendor/product_add');
        }
    }

    public function delete($id = null) {
        if ($id != '') {
            $this->load->model('city_model');

            if ($result = $this->city_model->delete_city($id)) {
                echo "success";
            } else {
                echo "Something wrong";
            }
            exit;
        } else {
            echo "Something wrong";
        }
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
                redirect('buyer/city');
            } else {
                if (!empty($this->form_validation->error_array())) {
                    // form get validation issues.
                    redirect('buyer/city/edit/' . $id);
                }
                // call view
                if ($temp = $this->city_model->get_element_byID($id)) {
                    $data['citydata'] = $temp;
                    $data['cityid'] = $id;
                    $this->load->view('buyer/city-edit', $data);
                } else {
                    show_404();
                }
            }
        } else {
            show_404();
        }
    }

}
