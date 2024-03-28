<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('vendor_model');
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('category_model');
        $this->load->model('subcategory_model');
        $this->load->model('rfq_model');
        $this->load->library('email');
        date_default_timezone_set('Asia/Calcutta');
    }

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            $data['vendors'] = $this->vendor_model->getAllVendors();
            $data['sellers'] = $this->vendor_model->getAllVendorstwo();
            $data['cats'] = $this->rfq_model->getAllCategories();
            $data['scats'] = $this->rfq_model->getAllSubCategories();
            $data['cities'] = $this->category_model->get_cities();
            $this->load->view('admin/vendors-manage', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function add_new() {
//        $this->load->library('form_validation');
//        $this->form_validation->set_rules('vendorname', 'vendor name', 'required');
//        $this->form_validation->set_rules('vendoremail', 'vendor email', 'required');
//        $this->form_validation->set_rules('vendorphone', 'vendor phone', 'required');
//        $this->form_validation->set_rules('vendoraddress', 'vendor address', 'required');
//
//        if ($this->form_validation->run()) {
//            $data = array(
//                'Company' => $this->input->post('vendorname'),
//                'Phone' => $this->input->post('vendorphone'),
//                'Email' => $this->input->post('vendoremail'),
//                'Address' => $this->input->post('vendoraddress'),
//                'Created_On' => date("Y-m-d H:i:s"),
//                'Modified_On' => date("Y-m-d H:i:s"),
//            );
//
//            if ($result = $this->vendor_model->add_vendor($data)) {
//                $this->session->set_flashdata('result', 'Vendor added');
//            } else {
//                $this->session->set_flashdata('result', 'Failed. Something went wrong.');
//            }
//            redirect('admin/vendors');
//        } else {
//            if (!empty($this->form_validation->error_array())) {
//                $error = $this->form_validation->error_array();
//                if (isset($error['vendorname'])) {
//                    $this->session->set_flashdata('vendorname', $error['vendorname']);
//                }
//                if (isset($error['vendoremail'])) {
//                    $this->session->set_flashdata('vendoremail', $error['vendoremail']);
//                }
//                if (isset($error['vendorphone'])) {
//                    $this->session->set_flashdata('vendorphone', $error['vendorphone']);
//                }
//                if (isset($error['vendoraddress'])) {
//                    $this->session->set_flashdata('vendoraddress', $error['vendoraddress']);
//                }
//                redirect('admin/vendors/add-new');
//            }
//            $this->load->view('admin/vendors-addnew');
//        }
        $data['categories'] = $this->category_model->get_cats();
        $data['scategories'] = $this->subcategory_model->get_scats();
        $data['cities'] = $this->category_model->get_cities_country();
        $this->load->view('admin/vendors-addnew', $data);
    }

    public function add_vendors() {
        $vendors = $this->input->post('vendor');
        if ($vendors == NULL) {
            $this->session->set_flashdata('result', 'Please fill all the fields.');
            $this->load->view('admin/vendors-addnew');
        } else {
            //print_r($vendors);exit;
            //print_r($vendors);exit;
            //$counter = 0;
            foreach ($vendors as $key => $itemrow) {
                //$counter++;
//                $countItems = count($itemrow);
//                $itemsRow = array();
//                unset($itemsRow);
//                if ($countItems = "10") {
//                    for ($x = $countItems; $x <= 11; $x++) {
//                        $itemsRow[] = $itemrow[$x];
//                    }
//                }
                $checkEmailExist = $this->users_model->check_email_exist($itemrow[3]);
                if ($checkEmailExist) {
                    $this->session->set_flashdata('result', 'Failed. Email already exists.');
                    $this->load->view('social/login');
                } else {
                    $userdata = array(
                        'Name' => $itemrow[1],
                        'Username' => $itemrow[1],
                        'Password' => md5("123456"),
                        'Phone' => $itemrow[4],
                        'Email' => $itemrow[3],
                        'Address' => $itemrow[2],
                        'vendor' => "1",
                        'Created_On' => date("Y-m-d H:m:s")
                    );

                    if ($insertid = $this->users_model->add_user($userdata)) {

                        if (!empty($insertid)) {
                            $data = array(
                                //here 1 is buyer type
                                'User_Id' => $insertid,
                                'comapany_name' => $itemrow[1],
                                'categories' => json_encode($this->input->post('categories')),
                                'scategories' => json_encode($this->input->post('subcategories')),
                                'delivery_address' => $itemrow[2],
                                'website' => $itemrow[5],
                                'contact_person' => $itemrow[6],
                                'status' => "1",
                            );
                            $cats = $this->input->post('categories');
                            $scats = $this->input->post('subcategories');
                            if ($this->users_model->addSellerInfo($data)) {
                                if (!empty($cats)) {
                                    foreach ($cats as $key => $cat) {
                                        $catName = $this->category_model->getCategoryById($cat);
                                        $dataCats = array(
                                            //here 1 is buyer type
                                            'User_Id' => $insertid,
                                            'comapany_name' => $itemrow[1],
                                            'categories' => $catName['Category'],
                                            'contact_person' => $itemrow[6],
                                        );
                                        $this->users_model->addCatsInfo($dataCats);
                                    }
                                }
                                if (!empty($scats)) {
                                    foreach ($scats as $key => $scat) {
                                        $scatName = $this->subcategory_model->getSubCategoryById($scat);
                                        $dataScats = array(
                                            //here 1 is buyer type
                                            'User_Id' => $insertid,
                                            'comapany_name' => $itemrow[1],
                                            'subcategories' => $scatName['Sub_Category'],
                                            'contact_person' => $itemrow[6],
                                        );
                                        $this->users_model->addscatsInfo($dataScats);
                                    }
                                }
                            }
                        }
                        $this->session->set_flashdata('result', 'Vendor added successfully.');
                    } else {
                        $this->session->set_flashdata('result', 'Failed. Something went wrong.');
                    }
                }
            }
            redirect('admin/vendors');
        }
    }

    public function delete($id = null) {
        if ($id != '') {
            if ($userData = $this->users_model->delete_user($id)) {
                $result = $this->vendor_model->delete_vendor_two($id);
                if ($result) {
                    $this->session->set_flashdata('result', 'Vendor deleted successfully.');
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong.');
                }
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong.');
        }
        redirect('admin/vendors');
    }

    public function edit($id = null) {
        $data['categories'] = $this->category_model->get_cats();
        $data['scategories'] = $this->subcategory_model->get_scats();
        $data['cities'] = $this->category_model->get_cities_country();
        // validate numeric id
        if ($id != '' && preg_match("/^[0-9]+$/", $id)) {
            $this->load->library('form_validation');
            // Data validate
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('phone', 'phone', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('vendoraddress', 'vendor address', 'required');
            $this->form_validation->set_rules('cname', 'company name', 'required');
            if ($this->form_validation->run()) {
                $userdata = array(
                    'Name' => $this->input->post('name'),
                    'Username' => $this->input->post('username'),
                    'Phone' => $this->input->post('phone'),
                    'Email' => $this->input->post('email'),
                    'Address' => $this->input->post('vendoraddress'),
                );

                $data = array(
                    'comapany_name' => $this->input->post('cname'),
                    'contact_person' => $this->input->post('contact'),
                    'website' => $this->input->post('website'),
                    'delivery_address' => $this->input->post('vendoraddress'),
                    'categories' => json_encode($this->input->post('categories')),
                    'scategories' => json_encode($this->input->post('subcategories')),
                );

                $this->users_model->update_element_byID($id, $userdata);
                $this->vendor_model->update_element_byIDTwo($id, $data);
                $this->session->set_flashdata('result', 'Vendor updated');
                redirect('admin/vendors');
            } else {
                if (!empty($this->form_validation->error_array())) {
                    // form get validation issues.
                    redirect('admin/vendors/edit/' . $id);
                }
                // call view
                if ($temp = $this->vendor_model->get_elementvendor_byID($id)) {
                    $user = $this->users_model->get_user_by_id($id);
                    $data['vendordata'] = $temp;
                    $data['userdata'] = $user;
                    $data['vendoryid'] = $id;
                    $this->load->view('admin/vendors-edit', $data);
                } else {
                    show_404();
                }
            }
        } else {
            show_404();
        }
    }

    public function view($id = null) {
        $data['cats'] = $this->rfq_model->getAllCategories();
        $data['scats'] = $this->rfq_model->getAllSubCategories();
        // validate numeric id
        if ($temp = $this->vendor_model->get_elementvendor_byID($id)) {
            $user = $this->users_model->get_user_by_id($id);
            $data['vendordata'] = $temp;
            $data['userdata'] = $user;
            $data['vendoryid'] = $id;
            $this->load->view('admin/vendors-view', $data);
        } else {
            show_404();
        }
    }

}
