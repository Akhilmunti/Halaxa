<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class School extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('school_model');
        $this->load->model('users_model');
        $this->load->model('rfq_model');
        $this->load->library('upload');
        $this->load->helper('date');
        error_reporting(0);
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            $this->outputData['school_list'] = $this->school_model->getAllSchoolApplications();
            $this->load->view('admin/school_list', $this->outputData);
        } else {
            redirect('admin/login');
        }
    }

    public function viewSchool($param) {
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            $this->outputData['city'] = $this->rfq_model->getAllCity();
            $this->outputData['states'] = $this->rfq_model->getAllStates();
            $this->outputData['countries'] = $this->rfq_model->getAllCountries();
            $this->outputData['school_info'] = $this->school_model->getSchoolInfo($param);
            $this->load->view('admin/school_edit', $this->outputData);
        } else {
            redirect('admin/login');
        }
    }

    public function statusAccept($id) {
        $schoolData = $this->school_model->getSchoolInfo($id);
        if (!empty($id)) {
            $data = array(
                'Status' => "1",
            );
            if ($this->school_model->updateSchool($data, $id)) {
                $userdata = array(
                    'Name' => $schoolData['First_Name'],
                    'Username' => $schoolData['School_Name'],
                    'Password' => $schoolData['Password'],
                    'Phone' => $schoolData['Phone_No'],
                    'Email' => $schoolData['Email'],
                    'Address' => $schoolData['Address'],
                    'Photo' => $schoolData['Profile'],
                    'Created_On' => date("Y-m-d H:m:s"),
                );
                $insertid = $this->users_model->add_user($userdata);
                if ($insertid) {
                    $datadelivery = array(
                        'User_Id' => $insertid,
                        'delivery_address' => $schoolData['Address'],
                    );
                    $this->load->library('email');
                    $config = array(
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'priority' => '1'
                    );
                    $this->email->initialize($config);
                    $this->email->from('info@foodlinked.co.in', 'Partner application');
                    $this->email->to($schoolData->Email);
                    $this->email->subject('Accepted | Welcome to Foodlinked');
                    $message = "
<html>
<head>
</head>
<body>
<h3>Dear $schoolData->First_Name,</h3><br>
<p>Thank you for registering with Foodlinked Partner Portal. Please find below the user id and password.</p>
<h3>Username: $schoolData->School_Name,</h3><br>
<h4>Thanking you!</h4>
<h4>Team Foodlinked</h4>
</body>
</html>";
                    $this->email->message($message);
                    $result = $this->email->send();
                    $this->users_model->add_delivery_address($datadelivery);
                    $this->outputData['school_list'] = $this->school_model->getAllSchoolApplications();
                    $this->outputData['result'] = "School User has been approved!!";
                    $this->load->view('admin/school_list', $this->outputData);
                } else {
                    $this->outputData['school_list'] = $this->school_model->getAllSchoolApplications();
                    $this->outputData['result'] = "Something went wrong, please try again!!";
                    $this->load->view('admin/school_list', $this->outputData);
                }
            } else {
                $this->outputData['school_list'] = $this->school_model->getAllSchoolApplications();
                $this->outputData['result'] = "Something went wrong, please try again!!";
                $this->load->view('admin/school_list', $this->outputData);
            }
        } else {
            $this->outputData['school_list'] = $this->school_model->getAllSchoolApplications();
            $this->outputData['result'] = "Something went wrong, please try again!!";
            $this->load->view('admin/school_list', $this->outputData);
        }
    }

    public function statusReject($id) {
        $reason = $this->input->post('reason');
        if (!empty($reason)) {
            $schoolData = $this->school_model->getSchoolInfo($id);
            //print_r($schoolData);exit;
            if (!empty($id)) {
                $data = array(
                    'Status' => "2",
                );
                if ($this->school_model->updateSchool($data, $id)) {
                    $this->load->library('email');
                    $config = array(
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'priority' => '1'
                    );
                    $this->email->initialize($config);
                    $this->email->from('info@foodlinked.co.in', 'Partner application');
                    $this->email->to($schoolData->Email);
                    $this->email->subject('Rejected | Please try again');
                    $message = "
<html>
<head>
</head>
<body>
<h3>Dear $schoolData->First_Name,</h3><br>
<h4>Reason : $reason</h4><br> 
<p>Thank you for registering with Foodlinked Partner Portal. We regret to inform that your application could not be processed at this point in time. Kindly contact the front office for further queries</p>
<h4>Thanking you!</h4>
<h4>Team Foodlinked</h4>
</body>
</html>";
                    $this->email->message($message);
                    $result = $this->email->send();
                    $this->outputData['school_list'] = $this->school_model->getAllSchoolApplications();
                    $this->outputData['result'] = "School application rejected successfully!!";
                    $this->load->view('admin/school_list', $this->outputData);
                } else {
                    $this->outputData['school_list'] = $this->school_model->getAllSchoolApplications();
                    $this->outputData['result'] = "Something went wrong, please try again 1!!";
                    $this->load->view('admin/school_list', $this->outputData);
                }
            } else {
                $this->outputData['school_list'] = $this->school_model->getAllSchoolApplications();
                $this->outputData['result'] = "Something went wrong, please try again 2!!";
                $this->load->view('admin/school_list', $this->outputData);
            }
        } else {
            $this->outputData['school_list'] = $this->school_model->getAllSchoolApplications();
            $this->outputData['result'] = "Please enter the reason";
            $this->load->view('admin/school_list', $this->outputData);
        }
    }

    public function deleteSchool($id) {
        if (!empty($id)) {
            if ($this->school_model->deleteSchool($id)) {
                $this->load->library('email');
                $config = array(
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'priority' => '1'
                );
                $this->email->initialize($config);
                $this->email->from('info@foodlinked.co.in', 'Partner application');
                $this->email->to($schoolData->Email);
                $this->email->subject('Deleted | Please try again');
                $message = "
<html>
<head>
</head>
<body>
<h3>Dear $schoolData->First_Name,</h3><br>
<p>Thank you for registering with Foodlinked Partner Portal. We regret to inform that your application could not be processed at this point in time. Kindly contact the front office for further queries</p>
<h4>Thanking you!</h4>
<h4>Team Foodlinked</h4>
</body>
</html>";
                $this->email->message($message);
                $result = $this->email->send();
                $this->school_model->deleteSchoolCommunity($id);
                $this->outputData['school_list'] = $this->school_model->getAllSchoolApplications();
                $this->outputData['result'] = "School application deleted successfully!!";
                $this->load->view('admin/school_list', $this->outputData);
            } else {
                $this->outputData['school_list'] = $this->school_model->getAllSchoolApplications();
                $this->outputData['result'] = "Something went wrong, please try again 1!!";
                $this->load->view('admin/school_list', $this->outputData);
            }
        } else {
            $this->outputData['school_list'] = $this->school_model->getAllSchoolApplications();
            $this->outputData['result'] = "Something went wrong, please try again 2!!";
            $this->load->view('admin/school_list', $this->outputData);
        }
    }

}
