<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Photos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->load->library('session');
        $this->load->model('rfq_model');
        $this->load->model('product_model');
        $this->load->model('users_model');
        $this->load->helper(array('url', 'html', 'form'));
        error_reporting(0);
    }

    public function index() {
        $this->outputData['notification'] = "";
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['photos'] = $this->product_model->getProductImages($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $this->load->view('vendor/upload_photos', $data);
    }

    public function addProductImages($mProductId) {
        $this->outputData['notification'] = "";
        $mUserId = $this->session->userdata('User_Id');
        if ($mProductId) {
            $data['users'] = $this->rfq_model->getUsers();
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
            $product = $this->product_model->getProductImagesByProductId($mUserId, $mProductId);
            $data['photos'] = json_decode($product['images_attached'], TRUE);
            $data['product_id'] = $mProductId;
            $data['product_name'] = $product['product_name'];
            $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
            $data['logMessages'] = $this->users_model->getLogs($mUserId);
        } else {
            $data['users'] = $this->rfq_model->getUsers();
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
            $data['photos'] = $this->product_model->getProductImages($mUserId);
            $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
            $data['logMessages'] = $this->users_model->getLogs($mUserId);
        }
        $data['sidebar'] = "mp";
        $data['navbar'] = "seller";
        $this->load->view('vendor/upload_photos', $data);
    }

    public function deleteProductImage($mName, $mProductId) {
        $mUserId = $this->session->userdata('User_Id');
        if ($mUserId) {
            if ($mProductId && $mName) {
                $product = $this->product_model->getProductImagesByProductId($mUserId, $mProductId);
                $mImages = json_decode($product['images_attached'], TRUE);
                $mImages = array_diff($mImages, $mName);
                $data = array(
                    'images_attached' => json_encode($mImages),
                );
                $result = $this->product_model->updateProduct($mProductId, $data);
                if ($result == TRUE) {
                    $this->session->set_flashdata('result', 'product image deleted successfully');
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong.');
                }
                redirect('vendor/photos/addProductImages/' . $mProductId, $data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function addImages($mProductId) {
        $this->outputData['notification'] = "";
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($_FILES)) {
            $product = $this->product_model->getProductImagesByProductId($mUserId, $mProductId);
            $mImages = json_decode($product['images_attached'], TRUE);

            $file_tmp = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_destination = 'user_files/product_images/' . $file_name;
            if (move_uploaded_file($file_tmp, $file_destination)) {
                if (!empty($mImages)) {
                    $value = array($file_name);
                    $result_array = array_merge($mImages, $value);
                    $data = array(
                        'images_attached' => json_encode($result_array),
                    );
                    $result = $this->product_model->updateProduct($mProductId, $data);
                    if ($result == TRUE) {
                        $this->session->set_flashdata('result', 'Images added to product successfully');
                    } else {
                        $this->session->set_flashdata('result', 'Something went wrong.');
                    }
                } else {
                    $value = array($file_name);
                    $data = array(
                        'images_attached' => json_encode($value),
                    );
                    $result = $this->product_model->updateProduct($mProductId, $data);
                    if ($result == TRUE) {
                        $this->session->set_flashdata('result', 'Images added to product successfully');
                    } else {
                        $this->session->set_flashdata('result', 'Something went wrong.');
                    }
                }

                redirect('vendor/photos/addProductImages/' . $mProductId, $data);
            } else {
                $data['photos'] = $this->product_model->getProductImages($mUserId);
                redirect('vendor/photos/addProductImages/' . $mProductId, $data);
            }
        } else {
            show_404();
        }
    }

    public function deleteImage($param = null) {
        $mUserId = $this->session->userdata('User_Id');
        if ($mUserId) {
            if ($param != "") {
                $delete = $this->product_model->deleteImage($param);
                if ($delete == TRUE) {
                    $this->session->set_flashdata('message', "Succefully deleted image.");
                } else {
                    $this->session->set_flashdata('message', "Something went wrong, please try again later.");
                }
            } else {
                $this->session->set_flashdata('message', "Something went wrong, please try again later.");
            }
            $data['photos'] = $this->product_model->getProductImages($mUserId);
            redirect('vendor/photos', $data);
        } else {
            show_404();
        }
    }

}
