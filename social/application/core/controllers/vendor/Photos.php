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

    public function addImages() {
        $this->outputData['notification'] = "";
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $targetPath = FCPATH . "user_files/product_images/";
            $targetFile = $targetPath . $fileName;
            move_uploaded_file($tempFile, $targetFile);
            if ($fileName != '') {
                $files = array(
                    'V_Id' => $mUserId,
                    'images' => $fileName,
                );
                $upload = $this->product_model->addProductImages($files);
                $logData = array(
                    'log' => "Added product image.",
                    'User_Id' => $mUserId,
                );
                if ($upload) {
                    $this->users_model->add_log($logData);
                    $data['photos'] = $this->product_model->getProductImages($mUserId);
                    redirect('vendor/photos', $data);
                }
            } else {
                $data['photos'] = $this->product_model->getProductImages($mUserId);
                redirect('vendor/photos', $data);
            }
        } else {
            $data['photos'] = $this->product_model->getProductImages($mUserId);
            redirect('vendor/photos', $data);
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
