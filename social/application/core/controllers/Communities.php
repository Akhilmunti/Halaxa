                                                                                                                                                                                                                                          <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Communities extends CI_Controller {

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
        $this->load->model('users_model');
        $this->load->library('upload');
        $this->load->helper('date');
        error_reporting(0);
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index() {
        $partnerId = $this->session->userdata('login_id');
        $userType = $this->session->userdata('partner_type');
        if (!empty($partnerId)) {
            $associations = $this->association_model->getAllCommunities();
            $requests = $this->association_model->getAllRequests($partnerId);
            $this->outputData['all'] = $associations;
            $this->outputData['requests'] = $requests;
            $this->outputData['members'] = $this->association_model->getAllMembers($partnerId);
            $this->outputData['conversations'] = $this->school_model->getAllConversationsByPartnerid($partnerId);
            if ($userType == "school") {
                $this->outputData['info'] = $this->school_model->getSchoolInfo($partnerId);
            } elseif ($userType == "hotel") {
                $this->outputData['info'] = $this->hotel_model->getHotelInfo($partnerId);
            } else {
                $this->outputData['info'] = $this->association_model->getAssociationInfo($partnerId);
            }
            $this->load->view('partner/communities', $this->outputData);
        } else {
            redirect('login');
        }
    }

    public function viewProfile($mComId) {
        $type = end($this->uri->segment_array());
        if (!empty($mComId)) {
            if ($type == "school") {
                $this->outputData['conversations'] = $this->school_model->getAllConversationsByPartnerid($mComId);
                $this->outputData['info'] = $this->school_model->getSchoolInfo($mComId);
                $this->outputData['members'] = $this->association_model->getAllMembers($mComId);
                $this->outputData['ratings'] = $this->school_model->getPubSchoolRatings($mComId);
                $this->outputData['comId'] = $mComId;
                $this->outputData['type'] = $type;
                $this->load->view('social/view_community', $this->outputData);
            } elseif ($userType == "hotel") {
                $this->outputData['conversations'] = $this->school_model->getAllConversationsByPartnerid($mComId);
                $this->outputData['members'] = $this->association_model->getAllMembers($mComId);
                $this->outputData['info'] = $this->hotel_model->getHotelInfo($mComId);
                $this->outputData['ratings'] = $this->school_model->getPubSchoolRatings($mComId);
                $this->outputData['comId'] = $mComId;
                $this->outputData['type'] = $type;
                $this->load->view('partner/view_community_hotel', $this->outputData);
            } else {
                $this->outputData['conversations'] = $this->school_model->getAllConversationsByPartnerid($mComId);
                $this->outputData['members'] = $this->association_model->getAllMembers($mComId);
                $this->outputData['info'] = $this->association_model->getAssociationInfo($mComId);
                $this->outputData['ratings'] = $this->school_model->getPubSchoolRatings($mComId);
                $this->outputData['comId'] = $mComId;
                $this->outputData['type'] = $type;
                $this->load->view('partner/view_community_association', $this->outputData);
            }
        } else {
            redirect('communities/buyerCommmunity');
        }
    }

    public function sendRatings($mComId) {
        $mRatedUserId = $this->session->userdata('User_Id');
        $type = end($this->uri->segment_array());
        if (!empty($mRatedUserId && $type && $mComId)) {
            $this->form_validation->set_rules('stars', 'stars', 'required');
            $this->form_validation->set_rules('stuStatus', 'Student Status', 'required');
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('pros', 'pros', 'required');
            $this->form_validation->set_rules('cons', 'cons', 'required');
            $this->form_validation->set_rules('advice', 'advice', 'required');
            if ($this->form_validation->run()) {
                $data = array(
                    'rated_user_id' => $mRatedUserId,
                    'com_user_id' => $mComId,
                    'stars' => $this->input->post('stars'),
                    'student_status' => $this->input->post('stuStatus'),
                    'title' => $this->input->post('title'),
                    'pros' => $this->input->post('pros'),
                    'cons' => $this->input->post('cons'),
                    'advice' => $this->input->post('advice'),
                );
                if ($this->school_model->addRating($data)) {
                    $logData = array(
                        'log' => " {$mComId} : rated successfully.",
                        'User_Id' => $mRatedUserId,
                    );
                    $this->users_model->add_log($logData);
                    $this->session->set_flashdata('result', 'Rated successfully.');
                    redirect('communities/viewProfile/' . $mComId . "/" . $type);
                } else {
                    $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
                    redirect('communities');
                }
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
                redirect('communities');
            }
        } else {
            redirect('login');
        }
    }

    public function buyerCommmunity() {
        $this->outputData['result'] = "";
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            $data['users'] = $this->rfq_model->getUsers();
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
            $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
            $data['logMessages'] = $this->users_model->getLogs($mUserId);
            $associations = $this->association_model->getAllCommunities();
            $this->outputData['all'] = $associations;
            $mycommunities = $this->association_model->getAllCommunitiesByUser($mUserId);
            $this->outputData['myComs'] = $mycommunities;
            $conversations = array();
            foreach ($mycommunities as $key => $community) {
                $postedId = $community['C_Id'];
                $feeds = $this->association_model->getAllConversationsByPartnerid($postedId);
                //$conversations[] = $feeds;
                foreach ($feeds as $feed) {
                    $conversations[] = $feed;
                }
            }
            $this->outputData['conversations'] = $conversations;
            $this->outputData['activeCom'] = "social-nav-active";
            $this->load->view('buyer/communities', $this->outputData);
        } else {
            redirect('login');
        }
    }

    public function vendorCommmunity() {
        $this->outputData['result'] = "";
        $mUserId = $this->session->userdata('User_Id');
        if (!empty($mUserId)) {
            $data['users'] = $this->rfq_model->getUsers();
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
            $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
            $data['logMessages'] = $this->users_model->getLogs($mUserId);
            $associations = $this->association_model->getAllCommunities();
            $this->outputData['all'] = $associations;
            $mycommunities = $this->association_model->getAllCommunitiesByUser($mUserId);
            $this->outputData['myComs'] = $mycommunities;
            $conversations = array();
            foreach ($mycommunities as $key => $community) {
                $postedId = $community['C_Id'];
                $feeds = $this->association_model->getAllConversationsByPartnerid($postedId);
                //$conversations[] = $feeds;
                foreach ($feeds as $feed) {
                    $conversations[] = $feed;
                }
            }
            $this->outputData['conversations'] = $conversations;
            $this->outputData['activeCom'] = "social-nav-active";
            $this->load->view('vendor/communities', $this->outputData);
        } else {
            redirect('login');
        }
    }

    public function request($id) {
        if ($id != "") {
            $mUserId = $this->session->userdata('User_Id');
            $UserName = $this->session->userdata('Username');
            $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
            $data['logMessages'] = $this->users_model->getLogs($mUserId);
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
            $check = $this->association_model->checkRequest($mUserId, $id);
            if (!empty($check)) {
                $data = array(
                    'Request_status' => "1",
                    'reject_by_user' => "0",
                );
                if ($this->association_model->rejectPartner($data, $id, $mUserId)) {
                    $associations = $this->association_model->getAllCommunities();
                    $this->outputData['all'] = $associations;
                    $this->session->set_flashdata('result', 'Succesfully requested partner.');
                    redirect('communities/buyerCommmunity', $this->outputData);
                }
            } else {
                $data = array(
                    'C_Id' => $id,
                    'User_Id' => $mUserId,
                    'User_Name' => $UserName,
                    'Request_status' => "1",
                    'reject_by_user' => "0",
                );
                if ($this->association_model->requestPartner($data)) {
                    $associations = $this->association_model->getAllCommunities();
                    $this->outputData['all'] = $associations;
                    $this->session->set_flashdata('result', 'Succesfully requested partner.');
                    redirect('communities/buyerCommmunity', $this->outputData);
                }
            }
        } else {
            redirect('communities/buyerCommmunity');
        }
    }

    public function reject($id) {
        if ($id != "") {
            $mUserId = $this->session->userdata('User_Id');
            $UserName = $this->session->userdata('Username');
            $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
            $data['logMessages'] = $this->users_model->getLogs($mUserId);
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
            $check = $this->association_model->checkRequest($mUserId, $id);
            if (!empty($check)) {
                $data = array(
                    'Request_status' => "0",
                    'reject_by_user' => "1",
                );
                if ($this->association_model->rejectPartner($data, $id, $mUserId)) {
                    $associations = $this->association_model->getAllCommunities();
                    $this->outputData['all'] = $associations;
                    $this->session->set_flashdata('result', 'Succesfully rejected partner.');
                    redirect('communities/buyerCommmunity', $this->outputData);
                }
            } else {
                $data = array(
                    'C_Id' => $id,
                    'User_Id' => $mUserId,
                    'User_Name' => $UserName,
                    'Request_status' => "0",
                    'reject_by_user' => "1",
                );
                if ($this->association_model->requestPartner($data)) {
                    $associations = $this->association_model->getAllCommunities();
                    $this->outputData['all'] = $associations;
                    $this->session->set_flashdata('result', 'Succesfully rejected partner.');
                    redirect('communities/buyerCommmunity', $this->outputData);
                }
            }
        } else {
            redirect('communities/buyerCommmunity');
        }
    }

    public function accept($id) {
        if ($id != "") {
            $data = array(
                'approval' => "1",
            );
            if ($this->association_model->acceptPartner($data, $id)) {
                $this->session->set_flashdata('result', 'Member Accepted successfully.');
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
            $data = array(
                'approval' => "0",
            );
            if ($this->association_model->acceptPartner($data, $id)) {
                $this->session->set_flashdata('result', 'rejected follower successfully.');
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

    public function unfollow($id) {
        if ($id != "") {
            $data = array(
                'approval' => "0",
            );
            if ($this->association_model->acceptPartner($data, $id)) {
                redirect('communities/buyerCommmunity');
            } else {
                redirect('communities/buyerCommmunity');
            }
        } else {
            redirect('communities/buyerCommmunity');
        }
    }

}
