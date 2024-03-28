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
        $this->load->model('location_model');
        $this->load->model('city_model');
        $this->load->model('rfq_model');
        $this->load->model('association_model');
        $this->load->model('social_model');
        $this->load->model('topics_model');
        $this->load->model('cp_model');
        $this->load->model('roles_model');
        
        //$this->load->library('upload');
        $this->load->helper('date');
        error_reporting(0);
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index() {
        $this->outputData['notification'] = "";
        $this->outputData['sidebar'] = "com";
        $partnerId = $this->session->userdata('login_id');
        $mPartnerKey = $this->session->userdata('partner_key');
        $mPartnerType = $this->session->userdata('partner_type');
        $this->outputData['conversations'] = $this->school_model->getAllConversationsByPartnerid($partnerId);
        $this->outputData['info'] = $this->school_model->getSchoolInfo($partnerId);
        $this->outputData['ratings'] = $this->school_model->getSchoolRatings($partnerId);
        $this->outputData['members'] = $this->association_model->getAllMembers($partnerId);
        $this->outputData['topics'] = $this->topics_model->getAllParentBySchoolKey($mPartnerType, $mPartnerKey);
        $this->load->view('partner/school_partner_topics', $this->outputData);
    }

    public function actionCommunityPost($mTopicKey) {
        $this->outputData['notification'] = "";
        $this->outputData['sidebar'] = "com";
        $partnerId = $this->session->userdata('login_id');
        $mPartnerKey = $this->session->userdata('partner_key');
        $mPartnerType = $this->session->userdata('partner_type');
        $this->outputData['conversations'] = $this->school_model->getAllConversationsByPartnerid($partnerId);
        $this->outputData['info'] = $this->school_model->getSchoolInfo($partnerId);
        $this->outputData['ratings'] = $this->school_model->getSchoolRatings($partnerId);
        $this->outputData['members'] = $this->association_model->getAllMembers($partnerId);
        $this->outputData['topicdata'] = $this->topics_model->getParentByKey($mTopicKey);
        $this->outputData['posts'] = $this->cp_model->getAllParentByTopicKey($mTopicKey);
        $this->load->view('partner/school_partner', $this->outputData);
    }

    public function add_topic() {
        $this->outputData['notification'] = "";
        $mPartnerId = $this->session->userdata('login_id');
        $mPartnerKey = $this->session->userdata('partner_key');
        $mPartnerType = $this->session->userdata('partner_type');

        $this->form_validation->set_rules('topic', 'topic', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Validation error.');
            $this->load->view('partner/school_partner_topics');
        } else {
            $mTopic = $this->input->post('topic');
            $mKey = $this->mGenerateRandomNumber();

            $topicInfo = array(
                'ct_key' => $mKey,
                'ct_partner_key' => $mPartnerKey,
                'ct_partner_type' => $mPartnerType,
                'ct_topic' => $mTopic,
            );

            $mAction = $this->topics_model->addParent($topicInfo);

            if ($mAction) {
                $this->session->set_flashdata('result', 'Topic added successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
            }
            redirect('partner', $this->outputData);
        }
    }

    public function add_comment($mPostKey) {
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
            redirect('partner');
        }
    }

    public function add_posts($mTopicKey) {
        $mPartnerId = $this->session->userdata('login_id');
        $mPartnerKey = $this->session->userdata('partner_key');
        $mPartnerType = $this->session->userdata('partner_type');
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
            'cp_partner_key' => $mPartnerKey,
            'cp_partner_type' => $mPartnerType,
            'cp_posted_id' => 0,
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
        redirect(base_url() . 'partner/school/actionCommunityPost/' . $mTopicKey);
    }

//    public function add_comment($id) {
//        $partnerId = $this->session->userdata('login_id');
//        if ($id != "") {
//            $this->load->library('form_validation');
//            $this->form_validation->set_rules('comment', 'Comment', 'required');
//            if ($this->form_validation->run()) {
//                // Date format conversion
//                $mUserId = $this->session->userdata('User_Id');
//                $data = array(
//                    //here 1 is buyer type
//                    'user_com_id' => $partnerId,
//                    'con_id' => $id,
//                    'com_content' => $this->input->post('comment'),
//                );
//                if ($this->social_model->add_comment($data)) {
//                    $getPostUserId = $this->social_model->getPost($id);
//                    $data = array(
//                        //here 1 is buyer type
//                        'User_Id' => $mUserId,
//                        'to_user' => $getPostUserId['User_Id'],
//                        'message' => $mUserName . " has Commented on your post!!",
//                        'message_type' => "Logs",
//                    );
//                    $this->users_model->send_inmail($data);
//                }
//                $this->session->set_flashdata('commentMessage', "Comment added successfully");
//            } else {
//                $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
//                $error = $this->form_validation->error_array();
//                if (isset($error['comment'])) {
//                    $this->session->set_flashdata('comment', $error['comment']);
//                }
//            }
//            redirect('partner');
//        } else {
//            $this->session->set_flashdata('commentMessage', "Something went wrong!!");
//            redirect('partner');
//        }
//    }

    public function publishRating($id) {
        if (!empty($id)) {
            $data = array(
                'status' => 1
            );
            $publish = $this->school_model->publishRating($data, $id);
            if ($publish == TRUE) {
                $this->session->set_flashdata('result', 'Published successfully.');
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
            }
        } else {
            $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
        }
        $this->session->set_flashdata('activeTab', 'ratings');
        redirect('partner/school');
    }

    public function reviews() {
        $this->load->view('partner/review_company');
    }

    public function sendRatings() {
        $partnerId = $this->session->userdata('login_id');
        if (!empty($partnerId)) {
            $this->form_validation->set_rules('stars', 'stars', 'required');
            $this->form_validation->set_rules('stuStatus', 'Student Status', 'required');
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('pros', 'pros', 'required');
            $this->form_validation->set_rules('cons', 'cons', 'required');
            $this->form_validation->set_rules('advice', 'advice', 'required');
            if ($this->form_validation->run()) {
                $data = array(
                    'rated_user_id' => $partnerId,
                    'com_user_id' => $partnerId,
                    'stars' => $this->input->post('stars'),
                    'student_status' => $this->input->post('stuStatus'),
                    'title' => $this->input->post('title'),
                    'pros' => $this->input->post('pros'),
                    'cons' => $this->input->post('cons'),
                    'advice' => $this->input->post('advice'),
                    'status' => 1,
                );
                if ($this->school_model->addRating($data)) {
                    $this->session->set_flashdata('result', 'Rated successfully.');
                    redirect('partner/school');
                } else {
                    $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
                    redirect('partner/school');
                }
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
                redirect('partner/school');
            }
        } else {
            redirect('partner/school');
        }
    }

    public function delete_post($param) {
        $partnerId = $this->session->userdata('login_id');
        if ($partnerId) {
            if ($param) {
                $delete = $this->school_model->deletePost($param);
                if ($delete == TRUE) {
                    $this->session->set_flashdata('result', 'Post deleted successfully.');
                } else {
                    $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
                }
            } else {
                $this->session->set_flashdata('result', 'Something went wrong, Please try again later.');
            }
            redirect('partner/school');
        } else {
            show_404();
        }
    }

    public function add_post() {
        $this->outputData['notification'] = "";
        $partnerId = $this->session->userdata('login_id');
        $this->form_validation->set_rules('comments', 'Comments', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('partner/school_partner');
        } else {
            $mFile = $this->input->post('imageUpload');
            $mFileUniqueId = $this->uploadDocument('imageUpload', $mFile);

            $conversationInfo = array(
                'partner_id' => $partnerId,
                'posted_id' => $partnerId,
                'comment' => $this->input->post('comments'),
                'attachment' => $mFileUniqueId,
            );

            if ($this->school_model->userConversations($conversationInfo)) {
                $this->outputData['notification'] = "Post addded successfully.";
            } else {
                $this->outputData['notification'] = "Please try again later!";
            }
            redirect('partner', $this->outputData);
        }
    }

    public function add_new() {
        $this->outputData['notification'] = "";
        $this->form_validation->set_rules('school_name', 'School Name', 'required');
        $this->form_validation->set_rules('school_address', 'Address', 'required');
        $this->form_validation->set_rules('school_location', 'Location', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State', '');
        $this->form_validation->set_rules('pincode', 'Pincode', '');
        $this->form_validation->set_rules('country', 'Country', 'required');
        //$this->form_validation->set_rules('website', 'Website', 'required');
        //$this->form_validation->set_rules('hyperlink', 'Hyperlink', 'required');
        //$this->form_validation->set_rules('overview', 'Overview', 'required');
        $this->form_validation->set_rules('no_of_students', 'No Of Students', 'required');
        $this->form_validation->set_rules('salutation', 'Salutation', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('no_of_students', 'No Of Students', 'required|numeric');
        $this->form_validation->set_rules('email_id', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[6]|matches[password]');
        $this->form_validation->set_rules('role', 'Role', 'required');
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
            $this->load->view('partner/school_application');
        } else {
            $mLogo = $this->input->post('school_logo');
            $mLogoUniqueId = $this->uploadDocument('school_logo', $mLogo);

            $mProfile = $this->input->post('school_profile');
            $mProfileUniqueId = $this->uploadDocument('school_profile', $mProfile);

            $mKey = $this->mGenerateRandomNumber();

            $schoolInfo = array(
                'S_key' => $mKey,
                'School_Name' => $this->input->post('school_name'),
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
                'Email' => $this->input->post('email_id'),
                'Password' => md5($this->input->post('password')),
                'Phone_Type' => $this->input->post('contact_type'),
                'Phone_Area_Code' => $this->input->post('area_code'),
                'Phone_No' => $this->input->post('contact'),
                'Fax_Type' => $this->input->post('fax_type'),
                'Fax_Area_Code' => $this->input->post('fax_area_code'),
                'Fax_No' => $this->input->post('fax_contact'),
                'Best_Day' => json_encode($this->input->post('best_day')),
                'Best_Time' => json_encode($this->input->post('best_time')),
            );
            $shoolEnroll = $this->school_model->addSchool($schoolInfo);
            if ($shoolEnroll) {
                $communityInfo = array(
                    'Username' => $this->input->post('first_name'),
                    'Photo' => $mLogoUniqueId,
                    'Groupname' => $this->input->post('school_name'),
                    'group_description' => $this->input->post('group_description'),
                    'Partner_type' => "school",
                    'Com_key' => $mKey,
                );
                $this->association_model->addUserToCommunities($communityInfo);
                $checkEmailExist = $this->users_model->check_email_exist($this->input->post('email_id'));
                if (!empty($checkEmailExist)) {
                    $this->session->set_flashdata('result', 'School Application has been submitted successfully, Wait for the Admin approval.');
                    $this->session->set_flashdata('Error', 'Could not create Social account, Email already taken by other user.');
                    $this->load->view('social/register');
                } else {
                    $data = array(
                        'Name' => $this->input->post('school_name'),
                        'Username' => $this->input->post('first_name'),
                        'Password' => md5($this->input->post('password')),
                        'Phone' => $this->input->post('contact'),
                        'Email' => $this->input->post('email_id'),
                        'Address' => $this->input->post('school_address'),
                        'social' => "1",
                        'partner_type' => "School",
                        'partner_key' => $mKey,
                        'Created_On' => date("Y-m-d H:m:s")
                    );
                    $this->users_model->add_user($data);
                    $this->session->set_flashdata('result', 'School Application has been submitted successfully!');
                    $this->outputData['notification'] = "School Application has been submitted successfully!";
                    redirect('partner/home/signIn');
                }
            } else {
                $this->outputData['notification'] = "Please try again later!";
            }
            $this->load->view('partner/school_application', $this->outputData);
        }
    }

    public function getList() {
        $this->outputData['school_list'] = $this->school_model->getAllSchoolApplications();
        $this->load->view('partner/school_list', $this->outputData);
    }

    public function edit($mId) {
        $this->outputData['city'] = $this->rfq_model->getAllCity();
        $this->outputData['states'] = $this->rfq_model->getAllStates();
        $this->outputData['states'] = $this->rfq_model->getAllStates();
        $this->outputData['countries'] = $this->rfq_model->getAllCountries();
        $this->outputData['roles'] = $this->roles_model->getAllParentForSite();
        $this->outputData['notification'] = "";
        $this->outputData['mId'] = $mId;
        if ($_POST['edit_school']) {
            $this->outputData['notification'] = "Validation error";
            $this->form_validation->set_rules('school_name', 'School Name', 'required');
            $this->form_validation->set_rules('school_address', 'Address', 'required');
            $this->form_validation->set_rules('school_location', 'Location', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('partner/school_edit', $this->outputData);
            } else {
                $school_info = $this->school_model->getSchoolInfo($mId);
                $mLogo = $this->input->post('school_logo');
                $mLogoUniqueId = $this->uploadDocument('school_logo', $mLogo);

                $mProfile = $this->input->post('school_profile');
                $mProfileUniqueId = $this->uploadDocument('school_profile', $mProfile);

                if (!empty($mProfileUniqueId)) {
                    $mEProfile = $mProfileUniqueId;
                } else {
                    $mEProfile = $school_info['Profile'];
                }

                if (!empty($mLogoUniqueId)) {
                    $mELogo = $mLogoUniqueId;
                } else {
                    $mELogo = $school_info['Logo'];
                }

                $schoolInfo = array(
                    'School_Name' => $this->input->post('school_name'),
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
                    'Logo' => $mELogo,
                    'Profile' => $mEProfile,
                    'Salutation' => $this->input->post('salutation'),
                    'First_Name' => $this->input->post('first_name'),
                    'Last_Name' => $this->input->post('last_name'),
                    'Role' => $this->input->post('role'),
                    'Email' => $this->input->post('email_id'),
                    'Phone_Type' => $this->input->post('contact_type'),
                    'Phone_Area_Code' => $this->input->post('area_code'),
                    'Phone_No' => $this->input->post('contact'),
                    'Fax_Type' => $this->input->post('fax_type'),
                    'Fax_Area_Code' => $this->input->post('fax_area_code'),
                    'Fax_No' => $this->input->post('fax_contact'),
                    'Best_Day' => json_encode($this->input->post('best_day')),
                    'Best_Time' => json_encode($this->input->post('best_time')),
                );
                if ($this->school_model->updateSchool($schoolInfo, $mId)) {
                    $this->outputData['notification'] = "School Application has been updated successfully!";
                } else {
                    $this->outputData['notification'] = "Please try again later!";
                }
                $this->outputData['city'] = $this->rfq_model->getAllCity();
                $this->outputData['states'] = $this->rfq_model->getAllStates();
                $this->outputData['countries'] = $this->rfq_model->getAllCountries();
                $this->outputData['school_info'] = $this->school_model->getSchoolInfo($mId);
                $this->load->view('partner/school_edit', $this->outputData);
            }
        } else {
            $this->outputData['city'] = $this->rfq_model->getAllCity();
            $this->outputData['states'] = $this->rfq_model->getAllStates();
            $this->outputData['countries'] = $this->rfq_model->getAllCountries();
            $this->outputData['school_info'] = $this->school_model->getSchoolInfo($mId);
            $this->load->view('partner/school_edit', $this->outputData);
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

    public function mGenerateRandomNumber() {
        $key = '';
        $keys = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
        for ($i = 0; $i < 25; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }
    
    public function internCircle() {
        $partnerId = $this->session->userdata('login_id');
        if ($partnerId) {
            $this->load->view('partner/intern_circle', $data);
        } else {
            show_404();
        }
    }
    
    public function receivedOffers() {
        $partnerId = $this->session->userdata('login_id');
        if ($partnerId) {
            $this->load->view('partner/received_offers', $data);
        } else {
            show_404();
        }
    }
    
    public function jobList() {
        $partnerId = $this->session->userdata('login_id');
        if ($partnerId) {
            $json = file_get_contents(API_PARTNER_WITH_IRS.API_ACTION_PARTNER_JOBS . $partnerId);
            $data = json_decode($json, true);
            $this->load->view('partner/job_list', $data);
        } else {
            show_404();
        }
    }

}
