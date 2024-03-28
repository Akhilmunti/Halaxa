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

    public function viewCatalogue() {
        $mUserId = $this->session->userdata('User_Id');
        if ($mUserId) {
            $data['sidebar'] = "cata";
            $data['navbar'] = "seller";
            $mVendor = $this->vendor_model->get_element_byID($mUserId);
            $mUser = $this->users_model->get_element_by($mUserId);
            $data['groups'] = $this->groups_model->getGroupByUser($mUserId);
            $data['vendor'] = $mVendor;
            $data['user'] = $mUser;
            $this->load->view('vendor/view_catalogue', $data);
        } else {
            show_404();
        }
    }

    public function getSearchedProducts() {
        $mUserId = $this->session->userdata('User_Id');
        $search = $this->input->post('search');
        if ($search) {
            $products = $this->product_model->getProductsForSearch($mUserId, $search);
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
        $vendorData = $this->vendor_model->get_element_byID($mUserId);
        $data['vendor_cats'] = $vendorData['categories'];
        if (!empty($data['vendor_cats'])) {
            $vendorcats = array();
            $array_a = $this->rfq_model->getAllCategories();
            $array_b = json_decode($data['vendor_cats']); // assume this is the array you wan to compare against
            $found = false;
            foreach ($array_a as $key_a => $val_a) {
                $found = false;
                foreach ($array_b as $key_b => $val_b) {
                    if ($val_a['CT_Id'] == $val_b) {
                        $vendorcats[] = $val_a;
                        $found = true;
                    }
                }
            }
            $data['cats'] = $vendorcats;
        } else {
            $data['cats'] = $this->rfq_model->getAllCategories();
        }
        $data['users'] = $this->rfq_model->getUsers();
        $data['types'] = $this->rfq_model->getAllTypes();
        $data['uoms'] = $this->rfq_model->getAllUoms();
        $data['currencies'] = $this->rfq_model->getAllCurrency();
        $data['scats'] = $this->rfq_model->getAllSubCategories();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['sidebar'] = "add";
        $data['navbar'] = "seller";
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
                $this->session->set_flashdata('result', 'Product images updated successfully!!');
            } else {
                $this->session->set_flashdata('result', 'Something went wrong');
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
        $selectedProductsId = $this->input->post('select_product');

        if (!empty($selectedProductsId)) {
            if ($operate == "1") {
                $selectedProductsId = $this->input->post('select_product');
                foreach ($selectedProductsId as $value) {
                    $success = $this->product_model->deleteProduct($value);
                }
                if ($success) {
                    $this->session->set_flashdata('result', 'Product has been deleted successfully!!');
                    redirect('vendor/products/manageProducts');
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong!!');
                    redirect('vendor/products/manageProducts');
                }
            } elseif ($operate == "6") {
                $selectedProductsId = $this->input->post('select_product');
                //$descriptionArray = $this->input->post('description');
                $moqArray = $this->input->post('moq');
                $priceArray = $this->input->post('price');
                //$imagesArray = $this->input->post('productImages');
                foreach ($selectedProductsId as $value) {
                    $data = array(
                        'moq' => $moqArray[$value],
                        'price' => $priceArray[$value],
                    );
                    $this->product_model->updateProduct($value, $data);
                    $this->session->set_flashdata('result', 'Product has been updated successfully!!');
                    $logData = array(
                        'log' => "Product has been updated successfully with the product ID- {$value}",
                        'User_Id' => $mUserId,
                    );
                    $this->users_model->add_log($logData);
                }
                redirect('vendor/products/manageProducts');
            } elseif ($operate == "2") {
                $selectedProductsId = $this->input->post('select_product');
                foreach ($selectedProductsId as $value) {
                    $data = array(
                        'status_hide' => "1",
                    );
                    $this->product_model->updateProduct($value, $data);
                    $this->session->set_flashdata('result', 'Products hidden successfully!!');
                    $logData = array(
                        'log' => "Product has been hidden successfully with the product ID- {$value}",
                        'User_Id' => $mUserId,
                    );
                    $this->users_model->add_log($logData);
                }
                redirect('vendor/products/manageProducts');
            } elseif ($operate == "3") {
                $hiddenProducts = $this->product_model->getProducts($mUserId, "1");
                if (count($hiddenProducts) > 0) {
                    foreach ($hiddenProducts as $key => $value) {
                        $data = array(
                            'status_hide' => "0",
                        );
                        $this->product_model->updateProduct($value['id'], $data);
                        $this->session->set_flashdata('result', 'Successfully pushed all hidden products!!');
                        $logData = array(
                            'log' => "Product has been pushed successfully with the product ID- {$value['id']}",
                            'User_Id' => $mUserId,
                        );
                        $this->users_model->add_log($logData);
                    }
                } else {
                    $this->session->set_flashdata('result', 'No hidden products!!');
                }
                redirect('vendor/products/manageProducts');
            } elseif ($operate == "kgs") {
                $selectedProductsId = $this->input->post('select_product');
                foreach ($selectedProductsId as $value) {
                    $data = array(
                        'uom' => $operate,
                    );
                    $this->product_model->updateProduct($value, $data);
                    $this->session->set_flashdata('result', 'Product UOM has been updated successfully!!');
                    $logData = array(
                        'log' => "Product UOM has been updated successfully with the product ID- {$value}",
                        'User_Id' => $mUserId,
                    );
                    $this->users_model->add_log($logData);
                }
                redirect('vendor/products/manageProducts');
            } elseif ($operate == "grams") {
                $selectedProductsId = $this->input->post('select_product');
                foreach ($selectedProductsId as $value) {
                    $data = array(
                        'uom' => $operate,
                    );
                    $this->product_model->updateProduct($value, $data);
                    $this->session->set_flashdata('result', 'Product UOM has been updated successfully!!');
                    $logData = array(
                        'log' => "Product UOM has been updated successfully with the product ID- {$value}",
                        'User_Id' => $mUserId,
                    );
                    $this->users_model->add_log($logData);
                }
                redirect('vendor/products/manageProducts');
            } elseif ($operate == "4") {
                $hiddenProductsPrice = $this->product_model->getProductsByPriceStatus($mUserId, "1");
                if (count($hiddenProductsPrice) > 0) {
                    foreach ($hiddenProductsPrice as $key => $value) {
                        $data = array(
                            'price_status' => "0",
                        );
                        $this->product_model->updateProduct($value['id'], $data);
                        $this->session->set_flashdata('result', 'Successfully updated price status!!');
                        $logData = array(
                            'log' => "Successfully updated price status with the product ID- {$value['id']}",
                            'User_Id' => $mUserId,
                        );
                        $this->users_model->add_log($logData);
                    }
                } else {
                    $this->session->set_flashdata('result', 'None of the products price is hidden!!');
                }
                redirect('vendor/products/manageProducts');
            } elseif ($operate == "5") {
                $selectedProductsId = $this->input->post('select_product');
                foreach ($selectedProductsId as $value) {
                    $data = array(
                        'price_status' => "1",
                    );
                    $this->product_model->updateProduct($value, $data);
                    $this->session->set_flashdata('result', 'Successfully updated price status!!');
                    $logData = array(
                        'log' => "Successfully updated price status with the product ID- {$value}",
                        'User_Id' => $mUserId,
                    );
                    $this->users_model->add_log($logData);
                }
                redirect('vendor/products/manageProducts');
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, Please try again.');
                redirect('vendor/products/manageProducts');
            }
        } else {
            $this->session->set_flashdata('result', 'Please select atleast one product.');
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
        $data['cats'] = $this->rfq_model->getAllCategories();
        $data['scats'] = $this->rfq_model->getAllSubCategories();
        $product = $this->input->post('name');
        $currency = $this->input->post('currency');
        $uom = $this->input->post('uom');

        if ($product || $currency || $uom) {
            $allProducts = $this->product_model->getProductsFilter($mUserId, $product, $currency, $uom);
            $data['images'] = $this->product_model->getProductImages($mUserId);
            $data['products'] = $allProducts;
            $data['hiddenProducts'] = $hiddenProducts;
        } else {
            $allProducts = $this->product_model->getProducts($mUserId, "0");
            $hiddenProducts = $this->product_model->getProducts($mUserId, "1");
            $data['images'] = $this->product_model->getProductImages($mUserId);
            $data['products'] = $allProducts;
            $data['hiddenProducts'] = $hiddenProducts;
        }

        $data['sidebar'] = "mp";
        $data['navbar'] = "seller";
        $this->load->view('vendor/product_manage', $data);
    }

    public function updateProduct($mProductId) {
        $mUserId = $this->session->userdata('User_Id');
        $this->outputData['notification'] = "";

        if ($mProductId && $mUserId) {
            $data = array(
                'product_name' => $this->input->post('item_name'),
                'groupname' => "Null",
                'category' => $this->input->post('categories'),
                'subcategory' => $this->input->post('subcategories'),
                'brand' => $this->input->post('item_brand'),
                'currency' => $this->input->post('item_currency'),
                'uom' => $this->input->post('item_uom'),
                'description' => $this->input->post('item_details'),
                'moq' => $this->input->post('item_moq'),
                'price' => $this->input->post('item_price'),
                'tax' => $this->input->post('item_tax'),
            );
            $update = $this->product_model->updateProduct($mProductId, $data);
            if ($update == TRUE) {
                $this->session->set_flashdata('result', $this->input->post('item_name') . ' updated successfully..');
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.');
            }
            redirect('vendor/products/manageProducts');
        } else {
            show_404();
        }
    }

    public function addProduct() {
        $mUserId = $this->session->userdata('User_Id');
        $this->outputData['notification'] = "";
        $products = $this->input->post('product');
        if ($products == NULL) {
            $this->session->set_flashdata('result', 'Please fill all the data');
            redirect('vendor/products/add_new');
        } else {

            foreach ($products as $key => $itemrow) {
                $price = preg_replace('~\D~', '', $itemrow[9]);
                $data = array(
                    'V_Id' => $mUserId,
                    'product_name' => $itemrow[1],
                    'groupname' => "Null",
                    'category' => $itemrow[2],
                    'subcategory' => $itemrow[3],
                    'brand' => $itemrow[4],
                    'currency' => $itemrow[7],
                    'uom' => $itemrow[5],
                    'description' => $itemrow[6],
                    'moq' => $itemrow[8],
                    'price' => $price,
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
                $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                $mUserId = $this->session->userdata('User_Id');
                $this->outputData['inmailMessages'] = $this->users_model->getMessages($mUserId);
                redirect('vendor/products/add_new');
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
