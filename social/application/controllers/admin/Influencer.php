<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Influencer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('influencer_model');
        $this->load->model('users_model');
        $this->load->library('upload');
        $this->load->helper('date');
        error_reporting(0);
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index() {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $this->outputData['influencer_list'] = $this->influencer_model->getAllInfluencerApplications();
            $this->load->view('admin/influencer_list', $this->outputData);
        } else {
            redirect('admin/login');
        }
    }

    public function actionView($param) {
        if ($param) {
            $mAdminId = $this->session->userdata('admin_id');
            if (!empty($mAdminId)) {
                $this->outputData['influencer'] = $this->influencer_model->getInfluencerInfo($param);
                $this->load->view('admin/view_influencer', $this->outputData);
            } else {
                redirect('admin/login');
            }
        } else {
            show_404();
        }
    }

    public function approve($id) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $influencerData = $this->influencer_model->getInfluencerInfo($id);
            if (!empty($id)) {
                $data = array(
                    'influencer_status' => "1",
                );
                if ($this->influencer_model->update_element_byID($id, $data)) {
                    $userdata = array(
                        'Name' => $influencerData['Username'],
                        'Username' => $influencerData['Username'],
                        'Password' => $influencerData['Password'],
                        'Phone' => $influencerData['Phone'],
                        'Email' => $influencerData['Email'],
                        'Address' => $influencerData['Current_address'],
                        'Photo' => $influencerData['Photo'],
                        'Created_On' => date("Y-m-d H:m:s"),
                        'influencer' => "1",
                        'Status' => "1",
                    );
                    $insertid = $this->users_model->add_user($userdata);
                    if ($insertid) {
                        $datadelivery = array(
                            'User_Id' => $insertid,
                            'delivery_address' => $influencerData['Current_address'],
                        );
                        $this->users_model->add_delivery_address($datadelivery);
                        $this->outputData['influencer_list'] = $this->influencer_model->getAllInfluencerApplications();
                        $this->outputData['result'] = "Influencer User has been approved!!";
                        $this->load->view('admin/influencer_list', $this->outputData);
                    } else {
                        $this->outputData['influencer_list'] = $this->influencer_model->getAllInfluencerApplications();
                        $this->outputData['result'] = "Something went wrong, please try again 1!!";
                        $this->load->view('admin/influencer_list', $this->outputData);
                    }
                } else {
                    $this->outputData['influencer_list'] = $this->influencer_model->getAllInfluencerApplications();
                    $this->outputData['result'] = "Something went wrong, please try again 2!!";
                    $this->load->view('admin/influencer_list', $this->outputData);
                }
            } else {
                $this->outputData['influencer_list'] = $this->influencer_model->getAllInfluencerApplications();
                $this->outputData['result'] = "Something went wrong, please try again 3!!";
                $this->load->view('admin/influencer_list', $this->outputData);
            }
        } else {
            redirect('admin/login');
        }
    }
    
    public function reject($id) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $influencerData = $this->influencer_model->getInfluencerInfo($id);
            $influencerDataSocial = $this->influencer_model->getInfluencerInfoByEmailFromSocial($influencerData['Email']);
            
            if (!empty($id)) {
                $data = array(
                    'influencer_status' => "2",
                );
                $action = $this->influencer_model->update_element_byID($id, $data);
                if ($action == TRUE) {
                    $userdata = array(
                        'Status' => 0,
                    );
                    $insertid = $this->users_model->updateUserInfo($userdata, $influencerDataSocial['User_Id']);
                    if ($insertid == TRUE) {
                        $this->outputData['result'] = "Influencer User has been rejected!!";
                        $this->load->view('admin/influencer_list', $this->outputData);
                    } else {
                        $this->outputData['influencer_list'] = $this->influencer_model->getAllInfluencerApplications();
                        $this->outputData['result'] = "Something went wrong, please try again 1!!";
                        $this->load->view('admin/influencer_list', $this->outputData);
                    }
                } else {
                    $this->outputData['influencer_list'] = $this->influencer_model->getAllInfluencerApplications();
                    $this->outputData['result'] = "Something went wrong, please try again 2!!";
                    $this->load->view('admin/influencer_list', $this->outputData);
                }
            } else {
                $this->outputData['influencer_list'] = $this->influencer_model->getAllInfluencerApplications();
                $this->outputData['result'] = "Something went wrong, please try again 3!!";
                $this->load->view('admin/influencer_list', $this->outputData);
            }
        } else {
            redirect('admin/login');
        }
    }

}
