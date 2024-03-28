<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('rfq_model');
        $this->load->model('vendor_model');
        $this->load->model('product_model');
        date_default_timezone_set('Asia/Calcutta');
        error_reporting(0);
    }

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        $data['locations'] = $this->rfq_model->getAllLocs();
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['categories'] = $this->rfq_model->getAllCategories();
        $this->load->view('buyer/search', $data);
    }

    public function vendorProducts($id) {
        if (!empty($id)) {
            $mUserId = $this->session->userdata('User_Id');
            $data['locations'] = $this->rfq_model->getAllLocs();
            $data['users'] = $this->rfq_model->getUsers();
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
            $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
            $data['logMessages'] = $this->users_model->getLogs($mUserId);
            $data['categories'] = $this->rfq_model->getAllCategories();
            $data['products'] = $this->product_model->getProductsByUser($id);
            $this->load->view('buyer/product_display_vendor', $data);
        } else {
            redirect('vendor/search');
        }
    }

    public function productDisplay($id) {
        if (!empty($id)) {
            $mUserId = $this->session->userdata('User_Id');
            $data['locations'] = $this->rfq_model->getAllLocs();
            $data['users'] = $this->rfq_model->getUsers();
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
            $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
            $data['logMessages'] = $this->users_model->getLogs($mUserId);
            $data['categories'] = $this->rfq_model->getAllCategories();
            $data['product'] = $this->product_model->getProductsById($id);
            $this->load->view('buyer/product_display', $data);
        } else {
            redirect('vendor/search');
        }
    }

    public function products($id) {
        if (!empty($id)) {
            $mUserId = $this->session->userdata('User_Id');
            $data['locations'] = $this->rfq_model->getAllLocs();
            $data['users'] = $this->rfq_model->getUsers();
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
            $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
            $data['logMessages'] = $this->users_model->getLogs($mUserId);
            $data['categories'] = $this->rfq_model->getAllCategories();
            $data['product'] = $this->product_model->getProductsById($id);
            $this->load->view('buyer/products', $data);
        } else {
            redirect('vendor/search');
        }
    }

    public function result() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('filterby', 'filterby', 'required');
        $this->form_validation->set_rules('searchterm', 'searchterm', 'required');
        $mUserId = $this->session->userdata('User_Id');
        $data['locations'] = $this->rfq_model->getAllLocs();
        $data['users'] = $this->rfq_model->getUsers();
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['categories'] = $this->rfq_model->getAllCategories();
        if ($this->form_validation->run()) {
            $filterBy = $this->input->post('filterby');
            $searchterm = $this->input->post('searchterm');
            if ($filterBy == "Products") {
                $productsResult = $this->product_model->getProductsByName($searchterm);
                if (!empty($productsResult)) {
                    $data['products'] = $productsResult;
                } else {
                    $this->session->set_flashdata('result', "Products not found!!");
                }
            } else if ($filterBy == "Seller") {
                $vendor = $this->rfq_model->getAllVendorsByCompany($searchterm);
                $vendorId = $vendor[0]['User_Id'];
                $productsResult = $this->product_model->getProductsByVendor($vendorId);
                $clientsResult = $this->product_model->getClientsByVendor($vendorId);
                if (!empty($vendor)) {
                    $data['products'] = $productsResult;
                    $data['clients'] = $clientsResult;
                    $data['vendors'] = $vendor;
                    $data['showSeller'] = "sellers";
                } else {
                    $this->session->set_flashdata('result', "Data not found, Select any other seller.");
                }
            } else if ($filterBy == "others") {
                $productsResultCat = $this->product_model->getProductsByCat($searchterm);
                $productsResultSub = $this->product_model->getProductsBySub($searchterm);
                $productsResultBrand = $this->product_model->getProductsByBrand($searchterm);
                $productsResultCurrency = $this->product_model->getProductsByCurrency($searchterm);
                //print_r($productsResultCat);exit;
                $vendorIds = array();
                if (!empty($productsResultCat)) {
                    foreach ($productsResultCat as $key => $value) {
                        $vendorIds[] = $value['User_Id'];
                    }
                    $data['vendorIds'] = array_unique($vendorIds);
                    $data['showOthers'] = "others";
                } else if (!empty($productsResultSub)) {
                    foreach ($productsResultSub as $key => $value) {
                        $vendorIds[] = $value['User_Id'];
                    }
                    $data['vendorIds'] = array_unique($vendorIds);
                    $data['showOthers'] = "others";
                } else if (!empty($productsResultBrand)) {
                    foreach ($productsResultBrand as $key => $value) {
                        $vendorIds[] = $value['V_Id'];
                    }
                    $data['vendorIds'] = array_unique($vendorIds);
                    $data['showOthers'] = "others";
                } else if (!empty($productsResultCurrency)) {
                    foreach ($productsResultCurrency as $key => $value) {
                        $vendorIds[] = $value['V_Id'];
                    }
                    $data['vendorIds'] = array_unique($vendorIds);
                    $data['showOthers'] = "others";
                } else {
                    $this->session->set_flashdata('result', "Products not found!!");
                }
            } else {
                $productsResult = $this->product_model->getProductsBySub($searchterm);
                if (!empty($productsResult)) {
                    $data['products'] = $productsResult;
                } else {
                    $this->session->set_flashdata('result', "Products not found!!");
                }
            }
        } else {
            $this->session->set_flashdata('result', $this->form_validation->error_string());
            $error = $this->form_validation->error_array();
            if (isset($error['filterby'])) {
                $this->session->set_flashdata('filterby', $error['filterby']);
            }
            if (isset($error['searchterm'])) {
                $this->session->set_flashdata('searchterm', $error['searchterm']);
            }
        }
        $this->load->view('buyer/search', $data);
    }

    public function getFilterResults() {
        $filter = trim($this->input->post('filter'));
        if ($filter == "Products") {
            if ($products = $this->product_model->getAllProducts()) {
                $result = '<option>Select here...</option>';
                foreach ($products as $key => $product) {
                    $result = $result . "<option value='" . $product['product_name'] . "'>" . $product['product_name'] . "</option>" . PHP_EOL;
                }
                echo $result;
            } else {
                echo "<option>No data</option>";
            }
        } else if ($filter == "Seller") {
            if ($vendors = $this->rfq_model->getAllVendorsNew()) {
                $result = '<option>Select here...</option>';
                foreach ($vendors as $key => $vendor) {
                    $result = $result . "<option value='" . $vendor['comapany_name'] . "'>" . $vendor['comapany_name'] . "</option>" . PHP_EOL;
                }
                echo $result;
            } else {
                echo "<option>No data</option>";
            }
        } else if ($filter == "Category") {
            if ($vendors = $this->rfq_model->getAllCats()) {
                $result = '<option>Select here...</option>';
                foreach ($vendors as $key => $vendor) {
                    $result = $result . "<option value='" . $vendor['Category'] . "'>" . $vendor['Category'] . "</option>" . PHP_EOL;
                }
                echo $result;
            } else {
                echo "<option>No data</option>";
            }
        } else {
            if ($vendors = $this->rfq_model->getAllSubCats()) {
                $result = '<option>Select here...</option>';
                foreach ($vendors as $key => $vendor) {
                    $result = $result . "<option value='" . $vendor['Sub_Category'] . "'>" . $vendor['Sub_Category'] . "</option>" . PHP_EOL;
                }
                echo $result;
            } else {
                echo "<option>No data</option>";
            }
        }
    }

    public function sendMessage($Id) {
        if (!empty($Id)) {
            $product = $this->product_model->getProductsById($Id);
            $toId = $product[0]['V_Id'];
            $this->load->library('form_validation');
            $mUserId = $this->session->userdata('User_Id');
            $this->form_validation->set_rules('message', 'Message', 'required');
            if ($this->form_validation->run()) {
                // Date format conversion
                $mUserId = $this->session->userdata('User_Id');
                $data = array(
                    'User_Id' => $mUserId,
                    'to_user' => $toId,
                    'message' => $this->input->post('message'),
                    'message_type' => "Inmail",
                );
                $this->users_model->send_inmail($data);
                $this->session->set_flashdata('result', 'Message sent Successfully.');
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
                $error = $this->form_validation->error_array();
                if (isset($error['user'])) {
                    $this->session->set_flashdata('user', $error['user']);
                }
                if (isset($error['message'])) {
                    $this->session->set_flashdata('message', $error['message']);
                }
            }
        }
        redirect('buyer/search/productDisplay/' . $Id);
    }

    public function sendBulkInmail() {
        $this->load->library('form_validation');
        $mUserId = $this->session->userdata('User_Id');
        $vendors = $this->input->post('vendors');
        if ($mUserId) {
            if (!empty($vendors)) {
                foreach ($vendors as $value) {
                    $this->form_validation->set_rules('message', 'Message', 'required');
                    if ($this->form_validation->run()) {
                        // Date format conversion
                        $mUserId = $this->session->userdata('User_Id');
                        $data = array(
                            'User_Id' => $mUserId,
                            'to_user' => $value,
                            'message' => $this->input->post('message'),
                            'message_type' => "Inmail",
                        );
                        $this->users_model->send_inmail($data);
                        $this->session->set_flashdata('result', 'Message sent Successfully.');
                    } else {
                        $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
                        $error = $this->form_validation->error_array();
                        if (isset($error['user'])) {
                            $this->session->set_flashdata('user', $error['user']);
                        }
                        if (isset($error['message'])) {
                            $this->session->set_flashdata('message', $error['message']);
                        }
                    }
                }
                redirect('buyer/search');
            }
        } else {
            redirect('login');
        }
    }

}
