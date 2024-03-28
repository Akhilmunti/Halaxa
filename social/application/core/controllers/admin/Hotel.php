<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('hotel_model');
        $this->load->model('users_model');
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
            $this->outputData['hotel_list'] = $this->hotel_model->getAllHotelApplications();
            $this->load->view('admin/hotel_list', $this->outputData);
        } else {
            redirect('admin/login');
        }
    }

    public function viewHotel($param) {
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            $this->outputData['hotel_info'] = $this->hotel_model->getHotelInfo($param);
            $this->load->view('admin/hotel_edit', $this->outputData);
        } else {
            redirect('admin/login');
        }
    }

    public function statusAccept($id) {
        $hotelData = $this->hotel_model->getHotelInfo($id);
        if (!empty($id)) {
            $data = array(
                'Status' => "1",
            );
            if ($this->hotel_model->updateHotel($data, $id)) {
                $userdata = array(
                    'Name' => $hotelData['First_Name'],
                    'Username' => $hotelData['property_name'],
                    'Password' => $hotelData['Password'],
                    'Phone' => $hotelData['Phone_No'],
                    'Email' => $hotelData['Email'],
                    'Address' => $hotelData['Address'],
                    'Photo' => $hotelData['logo'],
                    'Created_On' => date("Y-m-d H:m:s"),
                );
                $insertid = $this->users_model->add_user($userdata);
                if ($insertid) {
                    $datadelivery = array(
                        'User_Id' => $insertid,
                        'delivery_address' => $hotelData['Address'],
                    );
                    $this->load->library('email');
                    $config = array(
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'priority' => '1'
                    );
                    $this->email->initialize($config);
                    $this->email->from('info@foodlinked.co.in', 'Partner application');
                    $this->email->to($hotelData->Email);
                    $this->email->subject('Accepted | Welcome to Foodlinked');
                    $message = "
<html>
<head>
</head>
<body>
<h3>Dear $hotelData->First_Name,</h3><br>
<p>Thank you for registering with Foodlinked Partner Portal. Please find below the user id and password.</p>
<h3>Username: $hotelData->School_Name,</h3><br>
<h4>Thanking you!</h4>
<h4>Team Foodlinked</h4>
</body>
</html>";
                    $this->email->message($message);
                    $result = $this->email->send();
                    $this->users_model->add_delivery_address($datadelivery);
                    $this->outputData['hotel_list'] = $this->hotel_model->getAllHotelApplications();
                    $this->outputData['result'] = "Hotel User has been approved!!";
                    $this->load->view('admin/hotel_list', $this->outputData);
                } else {
                    $this->outputData['hotel_list'] = $this->hotel_model->getAllHotelApplications();
                    $this->outputData['result'] = "Something went wrong, please try again!!";
                    $this->load->view('admin/hotel_list', $this->outputData);
                }
            } else {
                $this->outputData['hotel_list'] = $this->hotel_model->getAllHotelApplications();
                $this->outputData['result'] = "Something went wrong, please try again!!";
                $this->load->view('admin/hotel_list', $this->outputData);
            }
        } else {
            $this->outputData['hotel_list'] = $this->hotel_model->getAllHotelApplications();
            $this->outputData['result'] = "Something went wrong, please try again!!";
            $this->load->view('admin/hotel_list', $this->outputData);
        }
    }

    public function statusReject($id) {
        $reason = $this->input->post('reason');
        if (!empty($reason)) {
            $hotelData = $this->hotel_model->getHotelInfo($id);
            if (!empty($id)) {
                $data = array(
                    'Status' => "2",
                );
                if ($this->hotel_model->updateHotel($data, $id)) {
                    $this->load->library('email');
                    $config = array(
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'priority' => '1'
                    );
                    $this->email->initialize($config);
                    $this->email->from('info@foodlinked.co.in', 'Partner application');
                    $this->email->to($hotelData->Email);
                    $this->email->subject('Rejected | Please try again');
                    $message = "
<html>
<head>
</head>
<body>
<h3>Dear $hotelData->First_Name,</h3><br>
<h4>Reason : $reason</h4><br> 
<p>Thank you for registering with Foodlinked Partner Portal. We regret to inform that your application could not be processed at this point in time. Kindly contact the front office for further queries</p>
<h4>Thanking you!</h4>
<h4>Team Foodlinked</h4>
</body>
</html>";
                    $this->email->message($message);
                    $result = $this->email->send();
                    $this->outputData['hotel_list'] = $this->hotel_model->getAllHotelApplications();
                    $this->outputData['result'] = "Hotel user has been rejected !!";
                    $this->load->view('admin/hotel_list', $this->outputData);
                } else {
                    $this->outputData['hotel_list'] = $this->hotel_model->getAllHotelApplications();
                    $this->outputData['result'] = "Something went wrong, please try again!!";
                    $this->load->view('admin/hotel_list', $this->outputData);
                }
            } else {
                $this->outputData['hotel_list'] = $this->hotel_model->getAllHotelApplications();
                $this->outputData['result'] = "Something went wrong, please try again!!";
                $this->load->view('admin/hotel_list', $this->outputData);
            }
        } else {
            $this->outputData['hotel_list'] = $this->hotel_model->getAllHotelApplications();
            $this->outputData['result'] = "Please enter the reason!!";
            $this->load->view('admin/hotel_list', $this->outputData);
        }
    }

    public function deleteHotel($id) {
        if (!empty($id)) {
            if ($this->hotel_model->deleteHotel($id)) {
                $this->load->library('email');
                $config = array(
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'priority' => '1'
                );
                $this->email->initialize($config);
                $this->email->from('info@foodlinked.co.in', 'Partner application');
                $this->email->to($hotelData->Email);
                $this->email->subject('Deleted | Please try again');
                $message = "
<html>
<head>
</head>
<body>
<h3>Dear $hotelData->First_Name,</h3><br>
<p>Thank you for registering with Foodlinked Partner Portal. We regret to inform that your application could not be processed at this point in time. Kindly contact the front office for further queries</p>
<h4>Thanking you!</h4>
<h4>Team Foodlinked</h4>
</body>
</html>";
                $this->email->message($message);
                $result = $this->email->send();
                $this->hotel_model->deleteHotelCommunity($id);
                $this->outputData['hotel_list'] = $this->hotel_model->getAllHotelApplications();
                $this->outputData['result'] = "Hotel user has been deleted !!";
                $this->load->view('admin/hotel_list', $this->outputData);
            } else {
                $this->outputData['hotel_list'] = $this->hotel_model->getAllHotelApplications();
                $this->outputData['result'] = "Something went wrong, please try again!!";
                $this->load->view('admin/hotel_list', $this->outputData);
            }
        } else {
            $this->outputData['hotel_list'] = $this->hotel_model->getAllHotelApplications();
            $this->outputData['result'] = "Something went wrong, please try again!!";
            $this->load->view('admin/hotel_list', $this->outputData);
        }
    }

}
