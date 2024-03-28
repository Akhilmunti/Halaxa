<?php 

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
        $this->load->model('topics_model');
        $this->load->model('cp_model');
        $this->load->model('social_model');
        //$this->load->library('upload');
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

    public function getTopics($mCommunityKey) {
        $data['navbar'] = "network";
        $data['sidebar'] = "mycom";
        $mData = $this->association_model->getCommunity($mCommunityKey);
        if (!empty($mData)) {
            $mPartnerType = $mData['Partner_type'];
            if ($mPartnerType == "hotel") {
                $data['topics'] = $this->topics_model->getAllParentByHotelKey($mPartnerType, $mCommunityKey);
            } elseif ($mPartnerType == "school") {
                $data['topics'] = $this->topics_model->getAllParentBySchoolKey($mPartnerType, $mCommunityKey);
            } elseif ($mPartnerType == "association") {
                $data['topics'] = $this->topics_model->getAllParentByAssociationKey($mPartnerType, $mCommunityKey);
            }
            $data['partner'] = $mData;
            $data['com_key'] = $mData['Com_key'];
            $this->load->view('community/home', $data);
        } else {
            show_404();
        }
    }

    public function rateCommunity($mCommunityKey) {
        $data['navbar'] = "network";
        $data['sidebar'] = "rate";
        $mUserId = $this->session->userdata('User_Id');
        $mData = $this->association_model->getCommunity($mCommunityKey);
        if (!empty($mData)) {
            $mPartnerType = $mData['Partner_type'];
            if ($mPartnerType == "hotel") {
                $data['topics'] = $this->topics_model->getAllParentByHotelKey($mPartnerType, $mCommunityKey);
            } elseif ($mPartnerType == "school") {
                $data['topics'] = $this->topics_model->getAllParentBySchoolKey($mPartnerType, $mCommunityKey);
            } elseif ($mPartnerType == "association") {
                $data['topics'] = $this->topics_model->getAllParentByAssociationKey($mPartnerType, $mCommunityKey);
            }
            $data['partner'] = $mData;
            $data['com_key'] = $mData['Com_key'];
            $data['rating'] = $this->school_model->getRatingByComAndUserKey($mData['Com_key'], $mUserId);
            $this->load->view('community/rating', $data);
        } else {
            show_404();
        }
    }

    public function add_comment($mPostKey) {
        $mUserId = $this->session->userdata('User_Id');
        $mPartnerKey = $this->session->userdata('partner_key');
        $mPartnerType = $this->session->userdata('partner_type');
        if ($mPostKey) {
            $this->form_validation->set_rules('comment', 'comment', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', 'Validation error.');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $mContent = $this->input->post('comment');
                $mKey = $this->mGenerateRandomNumber();

                $topicInfo = array(
                    'cc_key' => $mKey,
                    'cc_post_key' => $mPostKey,
                    'cc_posted_user_id' => $mUserId,
                    'cc_content' => $mContent,
                    'cc_date_added' => date("Y-m-d H:i:s"),
                );

                $mAction = $this->cp_model->addComment($topicInfo);

                if ($mAction) {
                    $this->session->set_flashdata('result', 'Comment added successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
                }
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function add_posts($mTopicKey) {
        $mUserId = $this->session->userdata('User_Id');
        $mPartnerKey = $this->session->userdata('partner_key');
        $mPartnerType = $this->session->userdata('partner_type');
        $mData = $this->topics_model->getParentByKey($mTopicKey);
        //print_r($mData);exit;
        $mKey = $this->mGenerateRandomNumber();
        $image = $video = $link = '';
        $config['upload_path'] = './assets/posts';
        $config['allowed_types'] = 'mp3|jpg|jpeg|gif|png|zip|xlsx|cad|pdf|doc|docx|ppt|pptx|pps|ppsx|odt|xls|xlsx|m4a|ogg|wav|mp4|m4v|mov|wmv|mpeg|MPG';
        $config['max_size'] = 20480; //max of 20M
        //$config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if ($_FILES['image']['name']) {
            if (!$this->upload->do_upload('image')) {
                $error1 = array('error' => $this->upload->display_errors());
                //echo '<pre>';print_r($error1);exit;
            } else {
                $upload_data = $this->upload->data();
                $image = $upload_data['file_name'];
            }
        }


        if ($_FILES['video']['name']) {
            if (!$this->upload->do_upload('video')) {
                $error2 = array('error' => $this->upload->display_errors());
                //echo '<pre>';print_r($error);exit;
            } else {

                $upload_data = $this->upload->data();
                $video = $upload_data['file_name'];
            }
        }

        if ($_FILES['link']['name']) {

            if (!$this->upload->do_upload('link')) {
                $error4 = array('error' => $this->upload->display_errors());
            } else {

                $upload_data = $this->upload->data();
                $link = $upload_data['file_name'];
            }
        }

        //echo $image." ".$video." ".$music;exit;

        $data = array(
            'cp_key' => $mKey,
            'cp_topic_key' => $mTopicKey,
            'cp_partner_key' => $mData['ct_partner_key'],
            'cp_partner_type' => $mData['ct_partner_type'],
            'cp_posted_id' => $mUserId,
            'cp_content' => $this->input->post('content'),
            'cp_image' => $image,
            'cp_video' => $video,
            'cp_link' => $link,
            'cp_date_added' => date("Y-m-d H:i:s"),
            'cp_date_updated' => date("Y-m-d H:i:s"),
        );

        if (isset($data)) {
            $this->cp_model->addParent($data);
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function actionCommunityPost($mTopicKey, $mCommunityKey) {
        $mData = $this->association_model->getCommunity($mCommunityKey);
        $data['partner'] = $mData;
        $data['topicdata'] = $this->topics_model->getParentByKey($mTopicKey);
        $data['posts'] = $this->cp_model->getAllParentByTopicKey($mTopicKey);
        $data['com_key'] = $mCommunityKey;
        $data['topic_key'] = $mTopicKey;
        $data['navbar'] = "network";
        $this->load->view('community/partner', $data);
    }

    public function user($mType = NULL) {
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
            if ($mType) {
                $this->outputData['type'] = $mType;
            } else {
                $this->outputData['type'] = "all";
            }
            $this->outputData['activeCom'] = "social-nav-active";
            $this->outputData['navbar'] = "network";
            $this->outputData['sidebar'] = "mycom";
            $this->load->view('buyer/communities', $this->outputData);
        } else {
            redirect('login');
        }
    }
    
    public function userSearch($mType = NULL) {
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
            if ($mType) {
                $this->outputData['search'] = $mType;
            } else {
                $this->outputData['search'] = "all";
            }
            $this->outputData['activeCom'] = "social-nav-active";
            $this->outputData['navbar'] = "network";
            $this->outputData['sidebar'] = "mycom";
            $this->load->view('buyer/communities', $this->outputData);
        } else {
            redirect('login');
        }
    }

    public function userFilter($param) {
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
            $this->outputData['activeCom'] = "social-nav-active";
            $this->outputData['navbar'] = "network";
            $this->outputData['sidebar'] = "mycom";
            $this->load->view('buyer/communities', $this->outputData);
        } else {
            redirect('login');
        }
    }

    public function find($mType = NULL) {
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
            $this->outputData['activeCom'] = "social-nav-active";
            $this->outputData['navbar'] = "network";
            $this->outputData['sidebar'] = "findc";
            if ($mType) {
                $this->outputData['type'] = $mType;
            } else {
                $this->outputData['type'] = "all";
            }
            $this->load->view('buyer/communities_find', $this->outputData);
        } else {
            redirect('login');
        }
    }
    
    public function findSearch($mType = NULL) {
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
            $this->outputData['activeCom'] = "social-nav-active";
            $this->outputData['navbar'] = "network";
            $this->outputData['sidebar'] = "findc";
            if ($mType) {
                $this->outputData['search'] = $mType;
            } else {
                $this->outputData['search'] = "all";
            }
            $this->load->view('buyer/communities_find', $this->outputData);
        } else {
            redirect('login');
        }
    }
    
    public function filterCommunitites() {
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
            $this->outputData['activeCom'] = "social-nav-active";
            $this->outputData['navbar'] = "network";
            $this->outputData['sidebar'] = "findc";
            $this->load->view('buyer/communities_find', $this->outputData);
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
            } elseif ($type == "hotel") {
                $this->outputData['conversations'] = $this->hotel_model->getAllConversationsByPartnerid($mComId);
                $this->outputData['members'] = $this->association_model->getAllMembers($mComId);
                $this->outputData['info'] = $this->hotel_model->getHotelInfo($mComId);
                $this->outputData['ratings'] = $this->school_model->getPubSchoolRatings($mComId);
                $this->outputData['comId'] = $mComId;
                $this->outputData['type'] = $type;
                $this->load->view('social/view_community_hotel', $this->outputData);
            } else {
                $this->outputData['conversations'] = $this->association_model->getAllConversationsByPartnerid($mComId);
                $this->outputData['members'] = $this->association_model->getAllMembers($mComId);
                $this->outputData['info'] = $this->association_model->getAssociationInfo($mComId);
                $this->outputData['ratings'] = $this->school_model->getPubSchoolRatings($mComId);
                $this->outputData['comId'] = $mComId;
                $this->outputData['type'] = $type;
                $this->load->view('social/view_community_association', $this->outputData);
            }
        } else {
            redirect('communities/buyerCommmunity');
        }
    }

    public function add_post($mComId) {
        $type = end($this->uri->segment_array());
        $this->outputData['notification'] = "";
        $mUserId = $this->session->userdata('User_Id');
        $this->form_validation->set_rules('comments', 'Comments', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('result', 'Validation Error.');
            redirect('communities/viewProfile/' . $mComId . '/' . $type);
        } else {
            $mFile = $this->input->post('imageUpload');
            $mFileUniqueId = $this->uploadDocument('imageUpload', $mFile);

            $conversationInfo = array(
                'partner_id' => $mComId,
                'posted_id' => $mUserId,
                'comment' => $this->input->post('comments'),
                'attachment' => $mFileUniqueId,
            );

            if ($this->school_model->userConversations($conversationInfo)) {
                $this->outputData['notification'] = "Post addded successfully.";
                $this->session->set_flashdata('result', 'Post addded successfully.');
            } else {
                $this->outputData['notification'] = "Please try again later!";
                $this->session->set_flashdata('result', 'Please try again later!');
            }
            redirect('communities/viewProfile/' . $mComId . '/' . $type);
        }
    }

    public function delete_post($postId) {
        $postId = end($this->uri->segment_array());
        $mComId = $this->uri->segment(3); // 1stsegment
        $type = $this->uri->segment(4); // 1stsegment
        $mUserId = $this->session->userdata('User_Id');
        if ($mUserId) {
            if ($postId) {
                $delete = $this->school_model->deletePost($postId);
                if ($delete == TRUE) {
                    $this->session->set_flashdata('result', 'Post deleted successfully.');
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
                }
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            show_404();
        }
    }

    public function sendRatings($mComKey) {
        $mRatedUserId = $this->session->userdata('User_Id');
        if (!empty($mRatedUserId && $mComKey)) {
            $this->form_validation->set_rules('stars', 'stars', 'required');
            $this->form_validation->set_rules('stuStatus', 'Student Status', 'required');
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('pros', 'pros', 'required');
            $this->form_validation->set_rules('cons', 'cons', 'required');
            if ($this->form_validation->run()) {
                $data = array(
                    'rated_user_id' => $mRatedUserId,
                    'com_user_id' => $mComKey,
                    'stars' => $this->input->post('stars'),
                    'student_status' => $this->input->post('stuStatus'),
                    'title' => $this->input->post('title'),
                    'pros' => $this->input->post('pros'),
                    'cons' => $this->input->post('cons'),
                    'advice' => "Null",
                );
                if ($this->school_model->addRating($data)) {
                    $logData = array(
                        'log' => " {$mComKey} : rated successfully.",
                        'User_Id' => $mRatedUserId,
                    );
                    $this->users_model->add_log($logData);
                    $this->session->set_flashdata('result', 'Rated successfully.');
                    redirect('communities/rateCommunity/' . $mComKey);
                } else {
                    $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
                    redirect('communities/rateCommunity/' . $mComKey);
                }
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
                redirect('communities/rateCommunity/' . $mComKey);
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
//            $conversations = array();
//            foreach ($mycommunities as $key => $community) {
//                $postedId = $community['Com_key'];
//                $feeds = $this->association_model->getAllConversationsByPartnerid($postedId);
//                //$conversations[] = $feeds;
//                foreach ($feeds as $feed) {
//                    $conversations[] = $feed;
//                }
//            }
//            $this->outputData['conversations'] = $conversations;
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
                $postedId = $community['Com_key'];
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

    public function request($id, $userType, $as) {
        if ($id && $userType) {
            $mUserId = $this->session->userdata('User_Id');
            $UserName = $this->session->userdata('Username');
            $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
            $data['logMessages'] = $this->users_model->getLogs($mUserId);
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
            $check = $this->association_model->checkRequest($mUserId, $id);
            $getPartnerData = $this->users_model->getPartnerInfoById($userType, $id);
            $getConnection = $this->users_model->getConnectionInfoPartner($getPartnerData['User_Id'], $mUserId);
            if (!empty($check)) {
                $data = array(
                    'Request_status' => "1",
                    'reject_by_user' => "0",
                    'approval' => "0",
                );
                if ($this->association_model->rejectPartner($data, $id, $mUserId)) {
                    if (!empty($getConnection)) {
                        $dataStatus = array(
                            'Status' => $Status,
                        );

                        if (isset($dataStatus)) {
                            if ($this->users_model->update_invitations($Id, $dataStatus))
                                $this->session->set_flashdata('Sucesss', 'Updated successfully');
                        }
                        $dataMessage = array(
                            'User_Id' => $mUserId,
                            'to_user' => $getPartnerData['User_Id'],
                            'message' => $UserName . " has Connected!!",
                            'message_type' => "Logs",
                        );
                        $this->users_model->send_inmail($dataMessage);
                    } else {
                        $dataConnection = array(
                            'Connected_User_Id' => $getPartnerData['User_Id'],
                            'User_Id' => $this->session->userdata('User_Id'),
                            'Status' => "Connected",
                            'Created_On' => date("Y-m-d H:i:s"),
                        );
                        if (isset($dataConnection)) {
                            if ($this->users_model->add_request($dataConnection)) {
                                $dataMessage = array(
                                    'User_Id' => $mUserId,
                                    'to_user' => $getPartnerData['User_Id'],
                                    'message' => $UserName . " has Connected!!",
                                    'message_type' => "Logs",
                                );
                                $this->users_model->send_inmail($dataMessage);
                            }
                        }
                    }
                    $this->session->set_flashdata('result', 'Succesfully followed partner.');
                }
                redirect('communities/user', $this->outputData);
            } else {
                $data = array(
                    'Com_key' => $id,
                    'User_Id' => $mUserId,
                    'User_Name' => $UserName,
                    'Request_status' => "1",
                    'reject_by_user' => "0",
                    'User_As' => $as,
                    'approval' => "0",
                );
                if ($this->association_model->requestPartner($data)) {
                    if (!empty($getConnection)) {
                        $dataStatus = array(
                            'Status' => $Status,
                        );

                        if (isset($dataStatus)) {
                            if ($this->users_model->update_invitations($Id, $dataStatus))
                                $this->session->set_flashdata('Sucesss', 'Updated successfully');
                        }
                        $dataMessage = array(
                            'User_Id' => $mUserId,
                            'to_user' => $getPartnerData['User_Id'],
                            'message' => $UserName . " has Connected!!",
                            'message_type' => "Logs",
                        );
                        $this->users_model->send_inmail($dataMessage);
                    } else {
                        $dataConnection = array(
                            'Connected_User_Id' => $getPartnerData['User_Id'],
                            'User_Id' => $this->session->userdata('User_Id'),
                            'Status' => "Connected",
                            'Created_On' => date("Y-m-d H:i:s"),
                        );
                        if (isset($dataConnection)) {
                            if ($this->users_model->add_request($dataConnection)) {
                                $dataMessage = array(
                                    'User_Id' => $mUserId,
                                    'to_user' => $getPartnerData['User_Id'],
                                    'message' => $UserName . " has Connected!!",
                                    'message_type' => "Logs",
                                );
                                $this->users_model->send_inmail($dataMessage);
                            }
                        }
                    }
                    $this->session->set_flashdata('result', 'Succesfully Following partner.');
                }
                redirect('communities/user', $this->outputData);
            }
        } else {
            redirect('communities/user');
        }
    }

    public function leaveGroup($param) {
        if ($param != "") {
            $delete = $this->association_model->leaveGroup($param);
            if ($delete == TRUE) {
                $this->session->set_flashdata('result', 'Unfollowed successfully.');
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, please try again later.');
            }
            redirect('communities/buyerCommmunity');
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
                    'approval' => "0",
                );
                if ($this->association_model->rejectPartner($data, $id, $mUserId)) {
                    $associations = $this->association_model->getAllCommunities();
                    $this->outputData['all'] = $associations;
                    $this->session->set_flashdata('result', 'Succesfully rejected partner.');
                    redirect('communities/buyerCommmunity', $this->outputData);
                }
            } else {
                $data = array(
                    'Com_key' => $id,
                    'User_Id' => $mUserId,
                    'User_Name' => $UserName,
                    'Request_status' => "0",
                    'reject_by_user' => "1",
                    'approval' => "0",
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

    public function notinterested($id, $userType) {
        if ($id && $userType) {
            $mUserId = $this->session->userdata('User_Id');
            $UserName = $this->session->userdata('Username');
            $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
            $data['logMessages'] = $this->users_model->getLogs($mUserId);
            $data['usersForMail'] = $this->rfq_model->getUsersForInmail($mUserId);
            $check = $this->association_model->checkRequest($mUserId, $id);
            $getPartnerData = $this->users_model->getPartnerInfoById($userType, $id);
            $getConnection = $this->users_model->getConnectionInfoPartner($getPartnerData['User_Id'], $mUserId);
            if (!empty($check)) {
                $data = array(
                    'Request_status' => "0",
                    'reject_by_user' => "-1",
                    'approval' => "0",
                );
                if ($this->association_model->rejectPartner($data, $id, $mUserId)) {
                    $this->users_model->deleteConnectionByConnectionId($getConnection['C_ID']);
                    $associations = $this->association_model->getAllCommunities();
                    $this->outputData['all'] = $associations;
                    $this->session->set_flashdata('result', 'Succesfully rejected partner.');
                    redirect('communities/buyerCommmunity', $this->outputData);
                }
            } else {
                $data = array(
                    'Com_key' => $id,
                    'User_Id' => $mUserId,
                    'User_Name' => $UserName,
                    'Request_status' => "0",
                    'reject_by_user' => "-1",
                    'approval' => "0",
                );
                if ($this->association_model->requestPartner($data)) {
                    $associations = $this->association_model->getAllCommunities();
                    $this->users_model->deleteConnectionByConnectionId($getConnection['C_ID']);
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
            $partnerData = $this->association_model->getPartner($id);
            $data = array(
                'approval' => "1",
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
            $data = array(
                'approval' => "0",
            );
            if ($this->association_model->acceptPartner($data, $id)) {
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

    public function likePost($id) {
        if ($id != "") {
            $mUserId = $this->session->userdata('User_Id');
            $mUserName = $this->session->userdata('Username');
            $checkIfLikedAlready = $this->social_model->check_like_community($id, $mUserId);
            $getPostUserId = $this->social_model->getCommunityPost($id);
            if (empty($checkIfLikedAlready)) {
                $mKey = $this->mGenerateRandomNumber();
                $data = array(
                    //here 1 is buyer type
                    'cpl_key' => $mKey,
                    'cpl_user_liked_id' => $mUserId,
                    'cp_key' => $id,
                    'cpl_status' => 1,
                );
                $this->social_model->add_like_community($data);
                $this->session->set_flashdata('result', $getPostUserId['cp_content'] . " Liked successfully.");
            } else {
                $status = $checkIfLikedAlready;
                $checkStatus = $status['cpl_status'];
                if ($checkStatus == 1) {
                    $data = array(
                        'cpl_status' => 0,
                    );
                    $this->social_model->update_community_like($id, $mUserId, $data);
                    $this->session->set_flashdata('result', $getPostUserId['cp_content'] . " Unliked successfully.");
                } else {
                    $data = array(
                        'cpl_status' => 1,
                    );
                    $this->session->set_flashdata('result', $getPostUserId['cp_content'] . " Liked successfully.");
                    $this->social_model->update_community_like($id, $mUserId, $data);
                }
            }
            
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', "Something went wrong!!");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function likeComment($id) {
        if ($id != "") {
            $mUserId = $this->session->userdata('User_Id');
            $mUserName = $this->session->userdata('Username');
            $checkIfLikedAlready = $this->social_model->check_community_like_for_comments($id, $mUserId);
            $getPostUserId = $this->social_model->getCommentedCommunityPost($id);
            if (empty($checkIfLikedAlready)) {
                $mKey = $this->mGenerateRandomNumber();
                $data = array(
                    //here 1 is buyer type
                    'ccl_key' => $mKey,
                    'ccl_user_liked_id' => $mUserId,
                    'cc_key' => $id,
                    'ccl_status' => 1,
                );
                $this->social_model->add_community_like_comments($data);
                $this->session->set_flashdata('result', $getPostUserId['cp_content'] . " Liked successfully.");
            } else {
                $status = $checkIfLikedAlready;
                $checkStatus = $status['ccl_status'];
                if ($checkStatus == "1") {
                    $data = array(
                        'ccl_status' => 0,
                    );
                    $this->social_model->update_community_like_comments($id, $mUserId, $data);
                    $this->session->set_flashdata('result', $getPostUserId['cc_content'] . " Unliked successfully.");
                } else {
                    $data = array(
                        'ccl_status' => 1,
                    );
                    $this->social_model->update_community_like_comments($id, $mUserId, $data);
                    $this->session->set_flashdata('result', $getPostUserId['cc_content'] . " Liked successfully.");
                }
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', "Something went wrong!!");
            redirect($_SERVER['HTTP_REFERER']);
        }
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

    public function mGenerateRandomNumber() {
        $key = '';
        $keys = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
        for ($i = 0; $i < 25; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }
    

    public function jobList($communityKey) {
        $data['navbar'] = "network";
        $data['sidebar'] = "jobList";
        if($communityKey){
            $associationId = $this->social_model->getAssociationId($communityKey);
            $hotelId = $this->social_model->getHotelId($communityKey);
            $schoolId = $this->social_model->getSchoolId($communityKey);
            if($schoolId){
              $partnerId = $schoolId;
            }else if($hotelId){
              $partnerId = $hotelId;
            }else if($associationId){
              $partnerId = $associationId;
            }
            
            if ($partnerId) {
                $json = file_get_contents(API_PARTNER_WITH_IRS.API_ACTION_PARTNER_JOBS . $partnerId);
                $data = json_decode($json, true);
                if($mData){
                    $data['com_key'] = $mData['Com_key'];
                }else{
                    $data['com_key'] = $communityKey;
                }
                $this->load->view('community/job_list', $data);
            } else {
                show_404();
            }
        }
    }

}
