<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('rfq_model');
        $this->load->model('product_model');
        $this->load->model('vendor_model');
        $this->load->model('category_model');
        $this->load->model('subcategory_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('blogs_model');
        date_default_timezone_set('Asia/Calcutta');
        //error_reporting(0);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }

    public function index() {
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $mUserType = $this->users_model->check_vendor($mUserId);
        $data['products'] = $this->product_model->getProducts($mUserId, "0");
        $data['rfq'] = $this->rfq_model->getAllRFQs();
        $data['blogs'] = $this->blogs_model->get_blogs();
        $data['cities'] = $this->category_model->get_cities();
        $data['categories'] = $this->category_model->get_cats();
        $data['scategories'] = $this->subcategory_model->get_scats();
        $rfq_vendorid = $data['rfq'];
        //print_r($rfq_vendorid);exit;
        $vendors = array();
        foreach ($rfq_vendorid as $key => $single) {
            //echo $single['V_Ids'] . $single['RFQ_Id'];
            $obj = json_decode($single['V_Ids'], true);
            //print_r($obj);
            if (in_array($mUserId, $obj)) {
                $vendors[] = $this->rfq_model->getRfqById($single['RFQ_Id']);
            }
        }
        $data['rfqs'] = $vendors;
        $data['poissued'] = $this->vendor_model->getAllPOIssuedRFQs("1", $mUserId);
        if (!empty($mUserType)) {
            $this->load->view('vendor/homepage', $data);
        } else {
            $this->load->view('vendor/vendor_signup', $data);
        }
    }

    public function addSellerDetails() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('companyname', 'companyname', 'required');
        $this->form_validation->set_rules('prelanguage', 'prelanguage', 'required');
        $this->form_validation->set_rules('deliveryaddress', 'deliveryaddress', 'required');
        if ($this->form_validation->run()) {
            // Date format conversion
            $mUserId = $this->session->userdata('User_Id');
            $mLegaldocs = $this->input->post('documents');
            $mLegalUniqueId = $this->uploadDocument('documents_legal', $mLegaldocs);
            $data = array(
                //here 1 is buyer type
                'User_Id' => $mUserId,
                'comapany_name' => $this->input->post('companyname'),
                'company_brief' => $this->input->post('companybrief'),
                'language' => $this->input->post('prelanguage'),
                'delivery_address' => $this->input->post('deliveryaddress'),
                'documents' => $mLegalUniqueId,
                'delivery_areas' => $this->input->post('deliveryAreas'),
                'payment_mode' => $this->input->post('card'),
                'categories' => json_encode($this->input->post('categories')),
                'scategories' => json_encode($this->input->post('subcategories')),
            );
            $this->users_model->addSellerInfo($data);
            $userData = $this->users_model->get_user_by_id($mUserId);
            $datadelivery = array(
                'User_Id' => $mUserId,
                'delivery_address' => $userData->delivery_address,
            );
            $this->users_model->add_delivery_address($datadelivery);
        } else {
            $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
            $error = $this->form_validation->error_array();
            if (isset($error['companyname'])) {
                $this->session->set_flashdata('companyname', $error['companyname']);
            }
            if (isset($error['companybrief'])) {
                $this->session->set_flashdata('companybrief', $error['companybrief']);
            }
            if (isset($error['prelanguage'])) {
                $this->session->set_flashdata('prelanguage', $error['prelanguage']);
            }
            if (isset($error['deliveryaddress'])) {
                $this->session->set_flashdata('deliveryaddress', $error['deliveryaddress']);
            }
        }
        $this->session->set_flashdata('result', 'Seller profile successfully updated');
        redirect('vendor/home');
    }

    public function uploadDocument($mId, $mFile) {
        $config['upload_path'] = './uploads/';
//$config['file_name'] = basename($_FILES['uploadfile']['name']);
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

    public function inmail() {
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['sentMessages'] = $this->users_model->getMessagesSent($mUserId);
        $data['sentLogs'] = $this->users_model->getLogsSent($mUserId);
        $this->load->view('vendor/inmail_list', $data);
    }

    public function blogs() {
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['sentMessages'] = $this->users_model->getMessagesSent($mUserId);
        $data['sentLogs'] = $this->users_model->getLogsSent($mUserId);
        $data['blogs'] = $this->blogs_model->get_blogs();
        $this->load->view('buyer/bloglist', $data);
    }

    public function sendInmail() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user', 'User Email', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        if ($this->form_validation->run()) {
            // Date format conversion
            $mUserId = $this->session->userdata('User_Id');
            $data = array(
                //here 1 is buyer type
                'User_Id' => $mUserId,
                'to_user' => $this->input->post('user'),
                'message' => $this->input->post('message'),
                'message_type' => "Inmail",
            );
            $this->users_model->send_inmail($data);
        } else {
            $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
            $error = $this->form_validation->error_array();
            if (isset($error['user'])) {
                $this->session->set_flashdata('user', $error['user']);
            }
            if (isset($error['message'])) {
                $this->session->set_flashdata('message', $error['message']);
            }
        }
        redirect('vendor/home/inmail');
    }

    public function sendInmailToBuyers() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user', 'User Email', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        if ($this->form_validation->run()) {
            // Date format conversion
            $mUserId = $this->session->userdata('User_Id');
            $data = array(
                //here 1 is buyer type
                'User_Id' => $mUserId,
                'to_user' => $this->input->post('user'),
                'message' => $this->input->post('message'),
                'message_type' => "Inmail",
            );
            $this->users_model->send_inmail($data);
        } else {
            $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
            $error = $this->form_validation->error_array();
            if (isset($error['user'])) {
                $this->session->set_flashdata('user', $error['user']);
            }
            if (isset($error['message'])) {
                $this->session->set_flashdata('message', $error['message']);
            }
        }
        redirect('vendor/recieved_rfq');
    }

    public function getSubCatByMulCat() {
        $catid = trim($this->input->post('category'));
        if ($catid != '') {
            $data = json_decode($catid);
            $subcatData = array();
            foreach ($data as $cat) {
                $subcatData[] = $this->rfq_model->getSubCatByCat($cat);
            }
            foreach ($subcatData as $subcat) {
                $result = $result . "<option value='" . $subcat[0]['SCT_Id'] . "'>" . $subcat[0]['Sub_Category'] . "</option>" . PHP_EOL;
            }
            echo $result;
        } else {
            echo "<option>No data</option>";
        }
    }

}
