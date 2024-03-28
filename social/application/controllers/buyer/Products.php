<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->load->library('session');
        $this->load->model('city_model');
        $this->load->model('users_model');
        $this->load->model('category_model');
        $this->load->model('subcategory_model');
        $this->load->model('currency_model');
        $this->load->model('type_model');
        $this->load->model('rfq_model');
        $this->load->model('product_model');
        $this->load->model('vendor_model');
        $this->load->model('uom_model');
        $this->load->model('groups_model');

        $this->load->library('form_validation');
        $this->load->library('upload');
        date_default_timezone_set('Asia/Calcutta');
        error_reporting(0);
    }

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        if ($mUserId) {
            $data['sidebar'] = "pro";
            $data['navbar'] = "seller";
            $data['groups'] = $this->groups_model->get_groups();
            $this->load->view('buyer/view_catalogue', $data);
        } else {
            show_404();
        }
    }
    
    public function viewVendorCatalogue($mVendorId) {
        $mUserId = $this->session->userdata('User_Id');
        if ($mUserId && $mVendorId) {
            $data['sidebar'] = "pro";
            $data['navbar'] = "seller";
            $data['groups'] = $this->groups_model->getGroupByUser($mVendorId);
            $this->load->view('buyer/view_catalogue', $data);
        } else {
            show_404();
        }
    }
    
    public function viewProduct($mProductId) {
        $mUserId = $this->session->userdata('User_Id');
        if ($mUserId && $mProductId) {
            $data['sidebar'] = "pro";
            $data['navbar'] = "seller";
            $product = $this->product_model->getProductsById($mProductId);
            $company = $this->users_model->get_vendor_details($product[0]['V_Id']);
            $data['product'] = $product;
            $data['company'] = $company;
            $this->load->view('buyer/view_product', $data);
        } else {
            show_404();
        }
    }

    public function getSearchedProducts() {
        $mUserId = $this->session->userdata('User_Id');
        $search = $this->input->post('search');
        if ($search) {
            $products = $this->product_model->getProductsForSearchBuyer($search);
            if (!empty($products)) {
                $result = "";
                foreach ($products as $key => $product) {
                    if ($product['images_attached']) {
                        $img = base_url('user_files/product_images/') . json_decode($product['images_attached'])[0];
                    } else {
                        $img = base_url('assets/halaxa_buyer/images/product-place.png');
                    }
                    $name = $product['product_name'];
                    $desc = $product['description'];
                    $moq = $product['moq'];
                    $currency = $product['currency'];
                    $price = $product['price'];
                    $result = $result
                            . '<div class="col-md-3">
                                                            <a href="#" class="no-decoration">
                                                                <div class="product-card">
                                                                    <div class="product-card-head">
                                                                        <img class="img-fluid" src="' . $img . '" />
                                                                        <h6 class="product-name">
                                                                            ' . $name . '
                                                                        </h6>
                                                                        <h6 class="product-desc">
                                                                            ' . $desc . '
                                                                        </h6>
                                                                        <h6 class="product-desc">
                                                                            MOQ ' . $moq . ' pieces
                                                                        </h6>
                                                                    </div>
                                                                    <div class="product-card-bottom">
                                                                        <h6 class="product-name">
                                                                            ' . $price . '
                                                                            ' . $currency . '
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>'
                            . PHP_EOL;
                }
                echo $result;
            } else {
                echo "No Data";
            }
        } else {
            echo "No Data";
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
        redirect('buyer/products');
    }
    
    public function sendMessageToVendor($Id) {
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
        redirect('buyer/products/viewProduct/' . $Id);
    }

}
