<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Association extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('association_model');
        $this->load->model('users_model');
        $this->load->model('roles_model');
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
            $this->outputData['association_list'] = $this->association_model->getAllAssociationApplications();
            $this->load->view('admin/association_list', $this->outputData);
        } else {
            redirect('admin/login');
        }
    }

    public function viewAssociation($param) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $this->outputData['mId'] = $param;
            $this->outputData['city'] = $this->rfq_model->getAllCity();
            $this->outputData['states'] = $this->rfq_model->getAllStates();
            $this->outputData['countries'] = $this->rfq_model->getAllCountries();
            $this->outputData['school_info'] = $this->association_model->getAssociationInfo($param);
            $this->outputData['roles'] = $this->roles_model->getAllParentForSite();
            $this->load->view('admin/association_read', $this->outputData);
        } else {
            redirect('admin/login');
        }
    }

    public function actionEdit($mId) {
        if (!empty($mId)) {
            $this->form_validation->set_rules('association_name', 'Association Name', 'required');
            $this->form_validation->set_rules('school_address', 'Address', 'required');
            $this->form_validation->set_rules('school_location', 'Location', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('state', 'State', '');
            $this->form_validation->set_rules('pincode', 'Pincode', '');
            $this->form_validation->set_rules('country', 'Country', 'required');
            //$this->form_validation->set_rules('website', 'Website', 'required');
            $this->form_validation->set_rules('hyperlink', 'Hyperlink', 'required');
            $this->form_validation->set_rules('overview', 'Overview', 'required');
            $this->form_validation->set_rules('no_of_students', 'No Of Students', 'required');
            $this->form_validation->set_rules('salutation', 'Salutation', 'required');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('role', 'Role', 'required');
            $this->form_validation->set_rules('no_of_students', 'No Of Students', 'required|numeric');
            $this->form_validation->set_rules('role', 'Role', 'required');
            $this->form_validation->set_rules('contact_type', 'Phone Type', 'required');
            $this->form_validation->set_rules('area_code', 'Area Code', 'required');
            $this->form_validation->set_rules('contact', 'Contact', 'required');
            //$this->form_validation->set_rules('fax_type', 'Fax Type', 'required');
            //$this->form_validation->set_rules('fax_area_code', 'Fax Area Code', 'required');
            //$this->form_validation->set_rules('fax_contact', 'Fax Number', 'required');
            $this->form_validation->set_rules('group_description', 'Description', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->outputData['city'] = $this->rfq_model->getAllCity();
                $this->outputData['states'] = $this->rfq_model->getAllStates();
                $this->outputData['countries'] = $this->rfq_model->getAllCountries();
                $this->outputData['school_info'] = $this->association_model->getAssociationInfo($mId);
                $this->load->view('admin/association_edit', $this->outputData);
            } else {

                $mData = $this->association_model->getAssociationInfo($mId);

                $mLogo = $this->input->post('school_logo');
                $mLogoUniqueId = $this->uploadDocument('school_logo', $mLogo);
                if (!empty($mLogoUniqueId)) {
                    $mLogoUniqueId = $mLogoUniqueId;
                } else {
                    $mLogoUniqueId = $mLogo['school_logo'];
                }

                $mProfile = $this->input->post('school_profile');
                $mProfileUniqueId = $this->uploadDocument('school_profile', $mProfile);
                if (!empty($mProfileUniqueId)) {
                    $mProfileUniqueId = $mProfileUniqueId;
                } else {
                    $mProfileUniqueId = $mLogo['school_profile'];
                }

                $schoolInfo = array(
                    'Association_Name' => $this->input->post('association_name'),
                    'Address' => $this->input->post('school_address'),
                    'Location' => $this->input->post('school_location'),
                    'City' => $this->input->post('city'),
                    'State' => $this->input->post('state'),
                    'Zip_Code' => $this->input->post('pincode'),
                    'Country' => $this->input->post('country'),
                    'Website' => $this->input->post('website'),
                    'Video_Url' => $this->input->post('hyperlink'),
                    'Overview' => $this->input->post('overview'),
                    'No_Of_Students' => $this->input->post('no_of_students'),
                    'group_description' => $this->input->post('group_description'),
                    'Logo' => $mLogoUniqueId,
                    'Profile' => $mProfileUniqueId,
                    'Salutation' => $this->input->post('salutation'),
                    'First_Name' => $this->input->post('first_name'),
                    'Last_Name' => $this->input->post('last_name'),
                    'Role' => $this->input->post('role'),
                    'Phone_Type' => $this->input->post('contact_type'),
                    'Phone_Area_Code' => $this->input->post('area_code'),
                    'Phone_No' => $this->input->post('contact'),
                    'Fax_Type' => $this->input->post('fax_type'),
                    'Fax_Area_Code' => $this->input->post('fax_area_code'),
                    'Fax_No' => $this->input->post('fax_contact'),
                    'Best_Day' => json_encode($this->input->post('best_day')),
                    'Best_Time' => json_encode($this->input->post('best_time')),
                );
                if ($this->association_model->updateAssociation($schoolInfo, $mId)) {
                    $this->session->set_flashdata('result', 'Association Application has been updated successfully!');
                    $this->outputData['notification'] = "Association Application has been updated successfully!";
                } else {
                    $this->outputData['notification'] = "Please try again later!";
                }
                $this->outputData['city'] = $this->rfq_model->getAllCity();
                $this->outputData['states'] = $this->rfq_model->getAllStates();
                $this->outputData['countries'] = $this->rfq_model->getAllCountries();
                $this->outputData['school_info'] = $this->association_model->getAssociationInfo($param);
                $this->load->view('admin/association_edit', $this->outputData);
            }
        } else {
            show_404();
        }
    }

    public function editAssociation($param) {
        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {
            $this->outputData['mId'] = $param;
            $this->outputData['city'] = $this->rfq_model->getAllCity();
            $this->outputData['states'] = $this->rfq_model->getAllStates();
            $this->outputData['countries'] = $this->rfq_model->getAllCountries();
            $this->outputData['school_info'] = $this->association_model->getAssociationInfo($param);
            $this->outputData['roles'] = $this->roles_model->getAllParentForSite();
            $this->load->view('admin/association_edit', $this->outputData);
        } else {
            redirect('admin/login');
        }
    }

//    public function statusAccept($id) {
//
//        $mAdminId = $this->session->userdata('admin_id');
//        if (!empty($mAdminId)) {
//
//            $associationData = $this->association_model->getAssociationInfo($id);
//            if (!empty($id)) {
//                $data = array(
//                    'Status' => "1",
//                );
//                if ($this->association_model->updateAssociation($data, $id)) {
//                    $userdata = array(
//                        'Name' => $associationData['First_Name'],
//                        'Username' => $associationData['Association_Name'],
//                        'Password' => $associationData['Password'],
//                        'Phone' => $associationData['Phone_No'],
//                        'Email' => $associationData['Email'],
//                        'Address' => $associationData['Address'],
//                        'Photo' => $associationData['Profile'],
//                        'Created_On' => date("Y-m-d H:m:s"),
//                    );
//                    $insertid = $this->users_model->add_user($userdata);
//                    if ($insertid) {
//                        $datadelivery = array(
//                            'User_Id' => $insertid,
//                            'delivery_address' => $associationData['Address'],
//                        );
//                        $this->load->library('email');
//                        $config = array(
//                            'mailtype' => 'html',
//                            'charset' => 'utf-8',
//                            'priority' => '1'
//                        );
//                        $this->email->initialize($config);
//                        $this->email->from('info@foodlinked.co.in', 'Partner application');
//                        $this->email->to($associationData->Email);
//                        $this->email->subject('Accepted | Welcome to Foodlinked');
//                        $message = "
//<html>
//<head>
//</head>
//<body>
//<h3>Dear $associationData->First_Name,</h3><br>
//<p>Thank you for registering with Foodlinked Partner Portal. Please find below the user id and password.</p>
//<h3>Username: $associationData->School_Name,</h3><br>
//<h4>Thanking you!</h4>
//<h4>Team Foodlinked</h4>
//</body>
//</html>";
//                        $this->email->message($message);
//                        $result = $this->email->send();
//                        $this->users_model->add_delivery_address($datadelivery);
//                        $this->outputData['association_list'] = $this->association_model->getAllAssociationApplications();
//                        $this->outputData['result'] = "Association User has been approved!!";
//                        $this->load->view('admin/association_list', $this->outputData);
//                    } else {
//                        $this->outputData['association_list'] = $this->association_model->getAllAssociationApplications();
//                        $this->outputData['result'] = "Something went wrong, please try again!!";
//                        $this->load->view('admin/association_list', $this->outputData);
//                    }
//                } else {
//                    $this->outputData['association_list'] = $this->association_model->getAllAssociationApplications();
//                    $this->outputData['result'] = "Something went wrong, please try again!!";
//                    $this->load->view('admin/association_list', $this->outputData);
//                }
//            } else {
//                $this->outputData['association_list'] = $this->association_model->getAllAssociationApplications();
//                $this->outputData['result'] = "Something went wrong, please try again!!";
//                $this->load->view('admin/association_list', $this->outputData);
//            }
//        } else {
//            redirect('admin/login');
//        }
//    }

    public function statusAccept($id) {

        $mAdminId = $this->session->userdata('admin_id');
        if (!empty($mAdminId)) {

            $associationData = $this->association_model->getAssociationInfo($id);
            if (!empty($id)) {
                $data = array(
                    'Status' => "1",
                );
                if ($this->association_model->updateAssociation($data, $id)) {
                    $this->load->library('email');
                    $config = array(
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'priority' => '1'
                    );
                    $this->email->initialize($config);
                    $this->email->from('info@foodlinked.co.in', 'Partner application');
                    $this->email->to($associationData->Email);
                    $this->email->subject('Accepted | Welcome to Foodlinked');
                    $message = "
<html>
<head>
</head>
<body>
<h3>Dear $associationData->First_Name,</h3><br>
<p>Thank you for registering with Foodlinked Partner Portal. Please find below the user id and password.</p>
<h3>Username: $associationData->School_Name,</h3><br>
<h4>Thanking you!</h4>
<h4>Team Foodlinked</h4>
</body>
</html>";
                    $this->email->message($message);
                    $result = $this->email->send();
                    $this->outputData['association_list'] = $this->association_model->getAllAssociationApplications();
                    $this->outputData['result'] = "Association User has been approved!!";
                    $this->load->view('admin/association_list', $this->outputData);
                } else {
                    $this->outputData['association_list'] = $this->association_model->getAllAssociationApplications();
                    $this->outputData['result'] = "Something went wrong, please try again!!";
                    $this->load->view('admin/association_list', $this->outputData);
                }
            } else {
                $this->outputData['association_list'] = $this->association_model->getAllAssociationApplications();
                $this->outputData['result'] = "Something went wrong, please try again!!";
                $this->load->view('admin/association_list', $this->outputData);
            }
        } else {
            redirect('admin/login');
        }
    }

    public function statusReject($id) {
        $reason = $this->input->post('reason');
        if (!empty($reason)) {
            $associationData = $this->association_model->getAssociationInfo($id);
            if (!empty($id)) {
                $data = array(
                    'Status' => "2",
                );
                if ($this->association_model->updateAssociation($data, $id)) {
                    $this->load->library('email');
                    $config = array(
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'priority' => '1'
                    );
                    $this->email->initialize($config);
                    $this->email->from('info@foodlinked.co.in', 'Partner application');
                    $this->email->to($associationData->Email);
                    $this->email->subject('Rejected | Please try again');
                    $message = "
<html>
<head>
</head>
<body>
<h3>Dear $associationData->First_Name,</h3><br>
<h4>Reason : $reason</h4><br> 
<p>Thank you for registering with Foodlinked Partner Portal. We regret to inform that your application could not be processed at this point in time. Kindly contact the front office for further queries</p>
<h4>Thanking you!</h4>
<h4>Team Foodlinked</h4>
</body>
</html>";
                    $this->email->message($message);
                    $result = $this->email->send();
                    $this->outputData['association_list'] = $this->association_model->getAllAssociationApplications();
                    $this->outputData['result'] = "Association user has been rejected !!";
                    $this->load->view('admin/association_list', $this->outputData);
                } else {
                    $this->outputData['association_list'] = $this->association_model->getAllAssociationApplications();
                    $this->outputData['result'] = "Something went wrong, please try again!!";
                    $this->load->view('admin/association_list', $this->outputData);
                }
            } else {
                $this->outputData['association_list'] = $this->association_model->getAllAssociationApplications();
                $this->outputData['result'] = "Something went wrong, please try again!!";
                $this->load->view('admin/association_list', $this->outputData);
            }
        } else {
            $this->outputData['association_list'] = $this->association_model->getAllAssociationApplications();
            $this->outputData['result'] = "Please enter the reason!!";
            $this->load->view('admin/association_list', $this->outputData);
        }
    }

    public function deleteAssociation($id) {
        if (!empty($id)) {
            if ($this->association_model->deleteAssociation($id)) {
                $this->load->library('email');
                $config = array(
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'priority' => '1'
                );
                $this->email->initialize($config);
                $this->email->from('info@foodlinked.co.in', 'Partner application');
                $this->email->to($associationData->Email);
                $this->email->subject('Deleted | Please try again');
                $message = "
<html>
<head>
</head>
<body>
<h3>Dear $associationData->First_Name,</h3><br>
<p>Thank you for registering with Foodlinked Partner Portal. We regret to inform that your application could not be processed at this point in time. Kindly contact the front office for further queries</p>
<h4>Thanking you!</h4>
<h4>Team Foodlinked</h4>
</body>
</html>";
                $this->email->message($message);
                $result = $this->email->send();
                $this->outputData['association_list'] = $this->association_model->getAllAssociationApplications();
                $this->outputData['result'] = "Association user has been deleted !!";
                $this->load->view('admin/association_list', $this->outputData);
            } else {
                $this->outputData['association_list'] = $this->association_model->getAllAssociationApplications();
                $this->outputData['result'] = "Something went wrong, please try again!!";
                $this->load->view('admin/association_list', $this->outputData);
            }
        } else {
            $this->outputData['association_list'] = $this->association_model->getAllAssociationApplications();
            $this->outputData['result'] = "Something went wrong, please try again!!";
            $this->load->view('admin/association_list', $this->outputData);
        }
    }

    public function uploadDocument($mId, $mFile) {
        $config['upload_path'] = 'uploads/';
        $config['file_name'] = $mFile;
        $config['allowed_types'] = 'jpg|jpeg|gif|png|zip|xlsx|cad|pdf|doc|docx|ppt|pptx|pps|ppsx|odt|xls|xlsx|.mp3|m4a|ogg|wav|mp4|m4v|mov|wmv';
        $config['overwrite'] = false;
        $config['encrypt_name'] = true;
        //$this->load->library('upload', $config);
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
