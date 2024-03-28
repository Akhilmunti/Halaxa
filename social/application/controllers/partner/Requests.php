<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Requests extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('influencer_model');
        $this->load->model('school_model');
        $this->load->model('hotel_model');
        $this->load->model('rfq_model');
        $this->load->model('users_model');
        $this->load->model('association_model');
        $this->load->model('social_model');
        
        $this->load->model('users_model');
        $this->load->library('upload');
        $this->load->helper('date');
        error_reporting(0);
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index() {
        $mPartnerKey = $this->session->userdata('partner_key');
        $mPartnerId = $this->session->userdata('login_id');
        if (!empty($mPartnerKey)) {
            $this->outputData['sidebar'] = "reqs";
            $associations = $this->association_model->getAllCommunities();
            $requests = $this->association_model->getAllRequestsNotApproved($mPartnerKey);
            $this->outputData['all'] = $associations;
            $this->outputData['requests'] = $requests;
            $this->outputData['members'] = $this->association_model->getAllMembers($mPartnerKey);
            $this->load->view('partner/members_request', $this->outputData);
        } else {
            redirect('partner/home');
        }
    }
    
    public function invite() {
        $mPartnerKey = $this->session->userdata('partner_key');
        $mPartnerId = $this->session->userdata('login_id');
        if (!empty($mPartnerKey)) {
            $this->outputData['sidebar'] = "invite";
            $this->outputData['members'] = $this->association_model->getAllMembers($mPartnerKey);
            $this->load->view('partner/invite_social', $this->outputData);
        } else {
            redirect('partner/home');
        }
    }

    public function viewMembers() {
        $mPartnerKey = $this->session->userdata('partner_key');
        $mPartnerId = $this->session->userdata('login_id');
        if (!empty($mPartnerKey)) {
            $this->outputData['sidebar'] = "view_members";
            $associations = $this->association_model->getAllCommunities();
            $requests = $this->association_model->getAllRequests($mPartnerId);
            $this->outputData['all'] = $associations;
            $this->outputData['requests'] = $requests;
            $this->outputData['members'] = $this->association_model->getAllMembers($mPartnerKey);
            $this->load->view('partner/members_following', $this->outputData);
        } else {
            redirect('partner/home');
        }
    }
    
    public function viewRatings() {
        $mPartnerKey = $this->session->userdata('partner_key');
        $mPartnerId = $this->session->userdata('login_id');
        if (!empty($mPartnerKey)) {
            $this->outputData['sidebar'] = "view_ratings";
            $this->outputData['ratings'] = $this->school_model->getSchoolRatings($mPartnerKey);
            $this->load->view('partner/ratings_list', $this->outputData);
        } else {
            redirect('partner/home');
        }
    }
    
    public function actionDeleteRating($param) {
        $mPartnerKey = $this->session->userdata('partner_key');
        if (!empty($param)) {
            $mDelete = $this->social_model->delete_rating($param);
            if($mDelete == TRUE){
                $this->session->set_flashdata('result', 'Rating removed successfully.');
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, please try again later.');
            }
            redirect('partner/requests/viewRatings');
        } else {
            redirect('partner/home');
        }
    }

    public function accept($id, $as) {
        if ($id != "") {
            $partnerData = $this->association_model->getPartner($id);
            $data = array(
                'approval' => "1",
                'User_As' => $as
            );
            if ($this->association_model->acceptPartner($data, $id)) {
                $this->session->set_flashdata('result', 'Member Accepted successfully.');
                $data = array(
                    //here 1 is buyer type
                    'User_Id' => $partnerData['F_Id'],
                    'to_user' => $partnerData['User_Id'],
                    'message' => $mUserName . " accepted.",
                    'message_type' => "Partner",
                );
                $this->users_model->send_inmail($data);
                redirect('partner/requests');
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, please try again later.');
                redirect('partner/requests');
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong, please try again later.');
            redirect('partner/requests');
        }
    }

    
    public function rejectFollower($id) {
        if ($id != "") {
            $partnerData = $this->association_model->getPartner($id);
            $rejdata = array(
                'approval' => "0",
            );
            if ($this->association_model->acceptPartner($rejdata, $id)) {
                $this->session->set_flashdata('result', 'rejected follower successfully.');
                $data = array(
                    //here 1 is buyer type
                    'User_Id' => $partnerData['F_Id'],
                    'to_user' => $partnerData['User_Id'],
                    'message' => $mUserName . " rejected.",
                    'message_type' => "Partner",
                );
                $this->users_model->send_inmail($data);
                redirect('partner/requests');
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, please try again later.');
                redirect('partner/requests');
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong, please try again later.');
            redirect('partner/requests');
        }
    }
    
    public function reject($id) {
        if ($id != "") {
            $partnerData = $this->association_model->getPartner($id);
            $data = array(
                'approval' => "0",
            );
            if ($this->association_model->acceptPartner($data, $id)) {
                $this->session->set_flashdata('result', 'Member Removed successfully.');
                $data = array(
                    //here 1 is buyer type
                    'User_Id' => $partnerData['F_Id'],
                    'to_user' => $partnerData['User_Id'],
                    'message' => $mUserName . " accepted.",
                    'message_type' => "Partner",
                );
                $this->users_model->send_inmail($data);
                redirect('partner/requests/viewMembers');
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, please try again later.');
                redirect('partner/requests/viewMembers');
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong, please try again later.');
            redirect('partner/requests/viewMembers');
        }
    }

}
