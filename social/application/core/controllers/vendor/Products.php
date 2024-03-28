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
        $this->load->model('uom_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
        date_default_timezone_set('Asia/Calcutta');
        error_reporting(0);
    }

    public function index() {
        $this->outputData['notification'] = "";
        $cities = $this->city_model->get_cities();
        $data['cities'] = $cities;
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $this->load->view('vendor/product_add', $data);
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
        $data['notification'] = "";
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['types'] = $this->rfq_model->getAllTypes();
        $data['uoms'] = $this->rfq_model->getAllUoms();
        $data['currencies'] = $this->rfq_model->getAllCurrency();
        $data['cats'] = $this->rfq_model->getAllCategories();
        $data['scats'] = $this->rfq_model->getAllSubCategories();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $this->load->view('vendor/product_add', $data);
    }

    public function updateProductImage($param = null) {
        if ($param != "") {
            $imagesArray = $this->input->post('products');
            $data = array(
                'images_attached' => json_encode($imagesArray),
            );
            $update = $this->product_model->updateProduct($param, $data);
            if ($update == TRUE) {
                $this->session->set_flashdata('operateProduct', 'Product images updated successfully!!');
            } else {
                $this->session->set_flashdata('operateProduct', 'Something went wrong');
            }
            redirect('vendor/products/manageProducts');
        } else {
            show_404();
        }
    }

    public function operateProducts() {
        $data['notification'] = "";
        $mUserId = $this->session->userdata('User_Id');
        $operate = $this->input->post('operateProducts');
        if ($operate == "Delete Product") {
            $selectedProductsId = $this->input->post('productsCheckedId');
            foreach ($selectedProductsId as $value) {
                $success = $this->product_model->deleteProduct($value);
            }
            if ($success) {
                $this->session->set_flashdata('operateProduct', 'Product has been deleted successfully!!');
                redirect('vendor/products/manageProducts');
            } else {
                $this->session->set_flashdata('operateProduct', 'Something went wrong!!');
                redirect('vendor/products/manageProducts');
            }
        } elseif ($operate == "Update/Edit") {
            $selectedProductsId = $this->input->post('productsCheckedId');
            $descriptionArray = $this->input->post('description');
            $moqArray = $this->input->post('moq');
            $priceArray = $this->input->post('price');
            $imagesArray = $this->input->post('productImages');
            foreach ($selectedProductsId as $value) {
                $data = array(
                    'description' => $descriptionArray[$value],
                    'moq' => $moqArray[$value],
                    'price' => $priceArray[$value],
                    'images_attached' => json_encode($imagesArray[$value]),
                );
                $this->product_model->updateProduct($value, $data);
                $this->session->set_flashdata('operateProduct', 'Product has been updated successfully!!');
                $logData = array(
                    'log' => "Product has been updated successfully with the product ID- {$value}",
                    'User_Id' => $mUserId,
                );
                $this->users_model->add_log($logData);
            }
            redirect('vendor/products/manageProducts');
        } elseif ($operate == "Hide Product") {
            $selectedProductsId = $this->input->post('productsCheckedId');
            foreach ($selectedProductsId as $value) {
                $data = array(
                    'status_hide' => "1",
                );
                $this->product_model->updateProduct($value, $data);
                $this->session->set_flashdata('operateProduct', 'Products hidden successfully!!');
                $logData = array(
                    'log' => "Product has been hidden successfully with the product ID- {$value}",
                    'User_Id' => $mUserId,
                );
                $this->users_model->add_log($logData);
            }
            redirect('vendor/products/manageProducts');
        } elseif ($operate == "All Products") {
            $hiddenProducts = $this->product_model->getProducts($mUserId, "1");
            if (count($hiddenProducts) > 0) {
                foreach ($hiddenProducts as $key => $value) {
                    $data = array(
                        'status_hide' => "0",
                    );
                    $this->product_model->updateProduct($value['id'], $data);
                    $this->session->set_flashdata('operateProduct', 'Successfully pushed all hidden products!!');
                    $logData = array(
                        'log' => "Product has been pushed successfully with the product ID- {$value['id']}",
                        'User_Id' => $mUserId,
                    );
                    $this->users_model->add_log($logData);
                }
            } else {
                $this->session->set_flashdata('operateProduct', 'No hidden products!!');
            }
            redirect('vendor/products/manageProducts');
        } elseif ($operate == "kgs") {
            $selectedProductsId = $this->input->post('productsCheckedId');
            foreach ($selectedProductsId as $value) {
                $data = array(
                    'uom' => $operate,
                );
                $this->product_model->updateProduct($value, $data);
                $this->session->set_flashdata('operateProduct', 'Product UOM has been updated successfully!!');
                $logData = array(
                    'log' => "Product UOM has been updated successfully with the product ID- {$value}",
                    'User_Id' => $mUserId,
                );
                $this->users_model->add_log($logData);
            }
            redirect('vendor/products/manageProducts');
        } elseif ($operate == "grams") {
            $selectedProductsId = $this->input->post('productsCheckedId');
            foreach ($selectedProductsId as $value) {
                $data = array(
                    'uom' => $operate,
                );
                $this->product_model->updateProduct($value, $data);
                $this->session->set_flashdata('operateProduct', 'Product UOM has been updated successfully!!');
                $logData = array(
                    'log' => "Product UOM has been updated successfully with the product ID- {$value}",
                    'User_Id' => $mUserId,
                );
                $this->users_model->add_log($logData);
            }
            redirect('vendor/products/manageProducts');
        } elseif ($operate == "Display Price") {
            $hiddenProductsPrice = $this->product_model->getProductsByPriceStatus($mUserId, "1");
            if (count($hiddenProductsPrice) > 0) {
                foreach ($hiddenProductsPrice as $key => $value) {
                    $data = array(
                        'price_status' => "0",
                    );
                    $this->product_model->updateProduct($value['id'], $data);
                    $this->session->set_flashdata('operateProduct', 'Successfully updated price status!!');
                    $logData = array(
                        'log' => "Successfully updated price status with the product ID- {$value['id']}",
                        'User_Id' => $mUserId,
                    );
                    $this->users_model->add_log($logData);
                }
            } else {
                $this->session->set_flashdata('operateProduct', 'None of the products price is hidden!!');
            }
            redirect('vendor/products/manageProducts');
        } elseif ($operate == "Hide Price") {
            $selectedProductsId = $this->input->post('productsCheckedId');
            foreach ($selectedProductsId as $value) {
                $data = array(
                    'price_status' => "1",
                );
                $this->product_model->updateProduct($value, $data);
                $this->session->set_flashdata('operateProduct', 'Successfully updated price status!!');
                $logData = array(
                    'log' => "Successfully updated price status with the product ID- {$value}",
                    'User_Id' => $mUserId,
                );
                $this->users_model->add_log($logData);
            }
            redirect('vendor/products/manageProducts');
        } else {
            $this->session->set_flashdata('operateProduct', 'Something went wrong, Please try again.');
            redirect('vendor/products/manageProducts');
        }
    }

    public function addProductCount() {
        $this->outputData['notification'] = "";
        $account = $this->input->post('account');
        $this->session->set_userdata("columnCount", $account);
        echo $account;
    }

    public function manageProducts() {
        $data['notification'] = "";
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['currencies'] = $this->currency_model->get_currency();
        $data['uoms'] = $this->uom_model->get_uoms();
        $allProducts = $this->product_model->getProducts($mUserId, "0");
        $hiddenProducts = $this->product_model->getProducts($mUserId, "1");
        $data['images'] = $this->product_model->getProductImages($mUserId);
        $data['products'] = $allProducts;
        $data['hiddenProducts'] = $hiddenProducts;
        $this->load->view('vendor/product_manage', $data);
    }

    public function addProduct() {
        $mUserId = $this->session->userdata('User_Id');
        $this->outputData['notification'] = "";
        $products = $this->input->post('product');
        if ($products == NULL) {
            $this->outputData['notification'] = "Please fill all the fields.";
            $this->load->view('vendor/product_add', $this->outputData);
        } else {
            foreach ($products as $key => $itemrow) {
                if (is_numeric($itemrow[2])) {
                    $catData = $this->category_model->getCategoryById($itemrow[2]);
                    $catValue = $catData['Category'];
                } else {
                    $catValue = $itemrow[2];
                }
                if (is_numeric($itemrow[3])) {
                    $subcatData = $this->subcategory_model->getSubCategoryById($itemrow[3]);
                    $subcatValue = $subcatData['Sub_Category'];
                } else {
                    $subcatValue = $itemrow[3];
                }
                $data = array(
                    'V_Id' => $mUserId,
                    'product_name' => $itemrow[1],
                    'groupname' => "Null",
                    'category' => $catValue,
                    'subcategory' => $subcatValue,
                    'brand' => $itemrow[4],
                    'description' => $itemrow[5],
                    'currency' => $itemrow[6],
                    'uom' => $itemrow[7],
                    'moq' => $itemrow[8],
                    'price' => $itemrow[9],
                    'tax' => $itemrow[10],
                );
                $insertid = $this->product_model->addProducts($data);
            }
            if ($insertid) {
                $logData = array(
                    'log' => "Product added successfully with the product ID- {$insertid}",
                    'User_Id' => $mUserId,
                );
                $this->users_model->add_log($logData);
                redirect('vendor/products/manageProducts');
            } else {
                $this->outputData['notification'] = "Failed. Something went wrong.";
                $this->session->set_flashdata('productMessage', 'Failed. Something went wrong.');
                $mUserId = $this->session->userdata('User_Id');
                $this->outputData['inmailMessages'] = $this->users_model->getMessages($mUserId);
                $this->load->view('vendor/product_add', $this->outputData);
            }
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
