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
        $this->load->model('rfq_model');
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
            $this->outputData['hotel_list'] = $this->hotel_model->getAllHotelApplications();
            $this->load->view('admin/hotel_list', $this->outputData);
        } else {
            redirect('admin/login');
        }
    }

    public function viewHotel($param) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $this->outputData['hotel_info'] = $this->hotel_model->getHotelInfo($param);
            $this->outputData['city'] = $this->rfq_model->getAllCity();
            $this->outputData['states'] = $this->rfq_model->getAllStates();
            $this->outputData['countries'] = $this->rfq_model->getAllCountries();
            $this->outputData['hotel_info'] = $this->hotel_model->getHotelInfo($param);
            $this->load->view('admin/hotel_read', $this->outputData);
        } else {
            redirect('admin/login');
        }
    }

    public function editHotel($param) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $this->outputData['mId'] = $param;
            $this->outputData['hotel_info'] = $this->hotel_model->getHotelInfo($param);
            $this->outputData['city'] = $this->rfq_model->getAllCity();
            $this->outputData['states'] = $this->rfq_model->getAllStates();
            $this->outputData['countries'] = $this->rfq_model->getAllCountries();
            $this->outputData['hotel_info'] = $this->hotel_model->getHotelInfo($param);
            $this->load->view('admin/hotel_edit', $this->outputData);
        } else {
            redirect('admin/login');
        }
    }

    public function edit($mId) {
        $this->outputData['notification'] = "";
        $this->outputData['mId'] = $mId;
        if ($mId) {
            $this->form_validation->set_rules('property_name', 'Property Name', 'required');
            $this->form_validation->set_rules('hotel_address', 'Address', 'required');
            $this->form_validation->set_rules('hotel_location', 'Location', 'required');
            $this->form_validation->set_rules('hotel_city', 'City', 'required');
            $this->form_validation->set_rules('hotel_state', 'State', '');
            $this->form_validation->set_rules('hotel_postal', 'Pincode', '');
            $this->form_validation->set_rules('hotel_country', 'Country', 'required');
            $this->form_validation->set_rules('hotel_rating', 'Rating', 'required');
            $this->form_validation->set_rules('hotel_rooms', 'Rooms', 'required');
            $this->form_validation->set_rules('hotel_type', 'Property Type', 'required');
            $this->form_validation->set_rules('hotel_firstname', 'First Name', 'required');
            $this->form_validation->set_rules('hotel_lastname', 'Last Name', 'required');
            $this->form_validation->set_rules('hotel_role', 'Role', 'required');
            $this->form_validation->set_rules('hotel_email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('contact_type', 'Phone Type', 'required');
            $this->form_validation->set_rules('area_code', 'Area Code', 'required');
            $this->form_validation->set_rules('contact', 'Contact', 'required');
            //$this->form_validation->set_rules('fax_type', 'Fax Type', 'required');
            //$this->form_validation->set_rules('fax_area_code', 'Fax Area Code', 'required');
            //$this->form_validation->set_rules('fax_contact', 'Fax Number', 'required');
            //$this->form_validation->set_rules('best_day', 'Best day to contact', 'required');
            //$this->form_validation->set_rules('best_time', 'Best time to contact', 'required');
            $this->form_validation->set_rules('group_description', 'Description', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->outputData['hotel_info'] = $this->hotel_model->getHotelInfo($mId);
                $this->outputData['city'] = $this->rfq_model->getAllCity();
                $this->outputData['states'] = $this->rfq_model->getAllStates();
                $this->outputData['countries'] = $this->rfq_model->getAllCountries();
                $this->load->view('admin/hotel_edit', $this->outputData);
            } else {

                $mData = $this->hotel_model->getHotelInfo($mId);

                $mLogo = $this->input->post('logo');
                $mLogoUniqueId = $this->uploadDocument('logo', $mLogo);

                if (!empty($mLogoUniqueId)) {
                    $mLogoUniqueId = $mLogoUniqueId;
                } else {
                    $mLogoUniqueId = $mData['logo'];
                }

                $hotelInfo = array(
                    'property_name' => $this->input->post('property_name'),
                    'Address' => $this->input->post('hotel_address'),
                    'Location' => $this->input->post('hotel_location'),
                    'City' => $this->input->post('hotel_city'),
                    'State' => $this->input->post('hotel_state'),
                    'Zip_Code' => $this->input->post('hotel_postal'),
                    'Country' => $this->input->post('hotel_country'),
                    'hotel_rating' => $this->input->post('hotel_rating'),
                    'hotel_source' => "null",
                    'hotel_rooms' => $this->input->post('hotel_rooms'),
                    'hotel_type' => $this->input->post('hotel_type'),
                    'Website' => $this->input->post('hotel_website'),
                    'hotel_contact' => "null",
                    'First_Name' => $this->input->post('hotel_firstname'),
                    'Last_Name' => $this->input->post('hotel_lastname'),
                    'Role' => $this->input->post('hotel_role'),
                    'Email' => $this->input->post('hotel_email'),
                    'group_description' => $this->input->post('group_description'),
                    'Phone_Type' => $this->input->post('contact_type'),
                    'Phone_Area_Code' => $this->input->post('area_code'),
                    'Phone_No' => $this->input->post('contact'),
                    'Fax_Type' => $this->input->post('fax_type'),
                    'Fax_Area_Code' => $this->input->post('fax_area_code'),
                    'Fax_No' => $this->input->post('fax_contact'),
                    'Best_Day' => json_encode($this->input->post('best_day')),
                    'Best_Time' => json_encode($this->input->post('best_time')),
                    'logo' => $mLogoUniqueId,
                );
                if ($this->hotel_model->updateHotel($hotelInfo, $mId)) {
                    $this->outputData['notification'] = "Hotel Application has been updated successfully!";
                } else {
                    $this->outputData['notification'] = "Please try again later!";
                }
                $this->outputData['hotel_info'] = $this->hotel_model->getHotelInfo($mId);
                $this->outputData['city'] = $this->rfq_model->getAllCity();
                $this->outputData['states'] = $this->rfq_model->getAllStates();
                $this->outputData['countries'] = $this->rfq_model->getAllCountries();
                $this->load->view('admin/hotel_edit', $this->outputData);
            }
        } else {
            show_404();
        }
    }

    /* public function statusAccept($id) {
      $mAdminId = $this->session->userdata('admin_id');
      if (!empty($mAdminId)) {
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
      } else {
      redirect('admin/login');
      }
      } */

    public function statusAccept($id) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $hotelData = $this->hotel_model->getHotelInfo($id);
            if (!empty($id)) {
                $data = array(
                    'Status' => "1",
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
            redirect('admin/login');
        }
    }

    public function statusReject($id) {

        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
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
        } else {
            redirect('admin/login');
        }
    }

    public function deleteHotel($id) {

        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
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
        } else {
            redirect('admin/login');
        }
    }

    public function uploadDocument($mId, $mFile) {
        $config['upload_path'] = './uploads/';
        //$config['file_name'] = basename($_FILES['uploadfile']['name']);
        $config['file_name'] = $mFile;
        $config['allowed_types'] = 'jpg|jpeg|gif|png|zip|xlsx|cad|pdf|doc|docx|ppt|pptx|pps|ppsx|odt|xls|xlsx|.mp3|m4a|ogg|wav|mp4|m4v|mov|wmv';
        $config['overwrite'] = false;
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $data = array();
        if (!$this->upload->do_upload($mId)) {
            $mOutPut = $this->upload->data();
            $filename = "";
            $data['file_name'] = "";
            $data['result'] = 'fail';
            $data['message'] = $this->upload->display_errors();
        } else {
            $mOutPut = $this->upload->data();
            $filename = $mOutPut['file_name'];
            $data['file_name'] = $mOutPut['file_name'];
            $data['result'] = 'success';
            $data['message'] = 'file was uploaded fine';
            $data['error'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
        }
        return $filename;
    }

}
