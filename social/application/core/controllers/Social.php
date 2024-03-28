<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('social_model');
        $this->load->model('users_model');
        $this->load->model('rfq_model');
        $this->load->model('vendor_model');
        date_default_timezone_set('Asia/Calcutta');
        is_logged_in();
        error_reporting(0);
    }

    public function index($id = NULL) {
        /* if($id==NULL)
          $id=$this->session->userdata('User_Id');

          $connections=$this->users_model->get_connections('Connected',$this->session->userdata('User_Id'));
          //echo '<pre>';print_r($connections);exit;

          $conneted_users=array();
          $i=0;
          if($connections){
          foreach($connections as $val)
          {
          $conneted_users[$i++]=$val->User_Id;
          }
          }
          //echo '<pre>';print_r($conneted_users);exit; */
        $conneted_users[0] = $this->session->userdata('User_Id'); //Restrict the posting from all users(uncomment above code to allow post)
        $data['connected_users'] = $conneted_users;
        if ($id == NULL) {
            $data['Hidden_User_Id'] = $this->session->userdata('User_Id');
            $data['Name'] = $this->session->userdata('Username');
        } else {
            $data['Hidden_User_Id'] = '';
            $data['Name'] = $this->users_model->get_user_by_id($id)->Name;
        }

        $mUserId = $this->session->userdata('User_Id');
        $data['posts'] = $this->social_model->get_elements($id);
        $data['likes'] = $this->social_model->get_likes($mUserId);
        $data['users'] = $this->rfq_model->getUsers();
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['activeMywall'] = "social-nav-active";
        //echo '<pre>';print_r($data['posts']);exit;	
        $this->load->view('social/home', $data);
    }

    public function getMembers() {
        $memberName = $this->input->post('member');
        if (!empty($memberName)) {
            $getUserByName = $this->users_model->getUserByName($memberName);
            $result = '<li><a target="_blank" href=""></a></li>';
            foreach ($getUserByName as $key => $user) {
                $profileLink = base_url('profile/index/') . $user['User_Id'];
                $imageLink = base_url('assets/photo/') . $user['Photo'];
                $placeholderLink = base_url('/assets/images/user.png');
                $requestLink = base_url('social/request/Requested/') . $user['User_Id'];
                if (!empty($user['Photo'])) {
                    $image = $imageLink;
                } else {
                    $image = $placeholderLink;
                }
                if (!empty($user['Designation'])) {
                    $designation = $user['Designation'];
                } else {
                    $designation = "Not Specified.";
                }
                if (!empty($user['Locations'])) {
                    $location = $user['Locations'];
                } else {
                    $location = "Not Specified.";
                }
                $self = $this->users_model->self_invitations('Requested');
                $sel = array();
                $i = 0;
                foreach ($self as $val) {
                    $sel[$i++] = $val->Connected_User_Id; //list of user for whom we send requests
                }
                $self_request = $sel;
                if (in_array($user['User_Id'], $self_request)) {
                    $statusBtn = '<a href="#" class="btn btn-primary btn-xs">Request Sent</a>';
                } else {
                    $statusBtn = '<a href="' . $requestLink . '" class="btn btn-info btn-xs">Connect</a>';
                }
                $result = $result . '<li><a target="blank" href="' . $profileLink . '"><img src="' . $image . '" class="avatar img-circle" alt="Avatar"></a><div class="message_date">' . $statusBtn . '</div><div class="message_wrapper"><a target="blank" href="' . $profileLink . '"><h4 class="heading">' . $user['Username'] . '</h4><p class="heading">Designation : ' . $designation . '</p><p class="heading">Location : ' . $location . '</p></a></div></li>' . PHP_EOL;
            }
            echo $result;
        }
    }

    public function add_posts() {
        $image = $video = $link = '';
        $config['upload_path'] = './assets/posts';
        $config['allowed_types'] = 'mp3|jpg|jpeg|gif|png|zip|xlsx|cad|pdf|doc|docx|ppt|pptx|pps|ppsx|odt|xls|xlsx|m4a|ogg|wav|mp4|m4v|mov|wmv|mpeg|MPG';
        $config['max_size'] = 20480; //max of 20M
        //$config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if ($_FILES['image']['name']) {
            if (!$this->upload->do_upload('image')) {
                $error1 = array('error' => $this->upload->display_errors());
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


        /* if($_FILES['music']['name'])
          {
          if (!$this->upload->do_upload('music')) {
          $error3 = array('error' => $this->upload->display_errors());

          } else {

          $upload_data = $this->upload->data();
          $music = $upload_data['file_name'];
          }
          } */


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
            'User_Id' => $this->input->post('Hidden_User_Id'),
            'Posted_User_Id' => $this->session->userdata('User_Id'),
            'Content' => $this->input->post('content'),
            'Image' => $image,
            'Video' => $video,
            'Link' => $link,
            'Date_Created' => date("Y-m-d H:i:s"),
        );

        if (isset($data))
            $this->social_model->add_post($data);
        //redirect(base_url() . 'social');

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function singlePost($id) {
        $mUserId = $this->session->userdata('User_Id');
        $mUserName = $this->session->userdata('Username');
        $data['post'] = $this->social_model->getPost($id);
        $data['likes'] = $this->social_model->get_likes($mUserId);
        $data['users'] = $this->rfq_model->getUsers();
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        if (!empty($id)) {
            $getPostUserId = $this->social_model->getPost($id);
            $data = array(
                'User_Id' => $mUserId,
                'to_user' => $getPostUserId['User_Id'],
                'message' => $mUserName . " has Commented on your post!!",
                'message_type' => "Logs",
            );
            $this->users_model->send_inmail($data);
        }
        $this->load->view('social/wallpost', $data);
    }

    public function add_comment($id) {
        $mUserName = $this->session->userdata('Username');
        if ($id != "") {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('comment', 'Comment', 'required');
            if ($this->form_validation->run()) {
                // Date format conversion
                $mUserId = $this->session->userdata('User_Id');
                $data = array(
                    //here 1 is buyer type
                    'User_commented_id' => $mUserId,
                    'P_ID' => $id,
                    'Content' => $this->input->post('comment'),
                );
                if ($this->social_model->add_comment($data)) {
                    $getPostUserId = $this->social_model->getPost($id);
                    $data = array(
                        //here 1 is buyer type
                        'User_Id' => $mUserId,
                        'to_user' => $getPostUserId['User_Id'],
                        'message' => $mUserName . " has Commented on your post!!",
                        'message_type' => "Logs",
                    );
                    $this->users_model->send_inmail($data);
                }
                $this->session->set_flashdata('commentMessage', "Comment added successfully");
            } else {
                $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
                $error = $this->form_validation->error_array();
                if (isset($error['comment'])) {
                    $this->session->set_flashdata('comment', $error['comment']);
                }
            }
            redirect('social');
        } else {
            $this->session->set_flashdata('commentMessage', "Something went wrong!!");
            redirect('social');
        }
    }

    public function deleteComment($id) {
        echo $id;
        $mUserId = $this->session->userdata('User_Id');
        $comment = $this->social_model->getCommentedPost($id);
        $post = $this->social_model->getPost($comment['P_ID']);
        $postedBy = $post['Posted_User_Id'];
        $commentedBy = $comment['User_commented_id'];
        if ($commentedBy == $mUserId) {
            if ($id != "") {
                if ($this->social_model->delete_post_comments($id)) {
                    $this->session->set_flashdata('commentMessage', "Comment deleted successfully!!");
                }
                redirect('social');
            } else {
                $this->session->set_flashdata('commentMessage', "Something went wrong!!");
                redirect('social');
            }
        } else if ($postedBy == $mUserId) {
            if ($id != "") {
                if ($this->social_model->delete_post_comments($id)) {
                    $this->session->set_flashdata('commentMessage', "Comment deleted successfully!!");
                }
                redirect('social');
            } else {
                $this->session->set_flashdata('commentMessage', "Something went wrong!!");
                redirect('social');
            }
        } else {
            $this->session->set_flashdata('commentMessage', "Cannot delete comments posted by other users!!");
            redirect('social');
        }
    }

    public function likePost($id) {
        if ($id != "") {
            $mUserId = $this->session->userdata('User_Id');
            $mUserName = $this->session->userdata('Username');
            $checkIfLikedAlready = $this->social_model->check_like($id, $mUserId);
            if ($checkIfLikedAlready == "") {
                $data = array(
                    //here 1 is buyer type
                    'User_liked_id' => $mUserId,
                    'P_ID' => $id,
                    'status' => "1",
                );
                if ($this->social_model->add_like($data)) {
                    $getPostUserId = $this->social_model->getPost($id);
                    $dataMessage = array(
                        //here 1 is buyer type
                        'User_Id' => $mUserId,
                        'to_user' => $getPostUserId['User_Id'],
                        'message' => $mUserName . " has liked your post!!",
                        'message_type' => "Logs",
                    );
                    $post = $this->social_model->getPost($id);
                    $likeCount = array(
                        'count' => $post['count'] + 1,
                    );
                    $this->users_model->send_inmail($dataMessage);
                    $this->social_model->update_count($id, $likeCount);
                }
            } else {
                $status = $checkIfLikedAlready[0];
                $checkStatus = $status['status'];
                if ($checkStatus == "1") {
                    $data = array(
                        'status' => "0",
                    );
                    $this->social_model->update_like($id, $mUserId, $data);
                    $post = $this->social_model->getPost($id);
                    if ($post['count'] == 0) {
                        $postCount = 0;
                    } else {
                        $postCount = $post['count'] - 1;
                    }
                    $likeCount = array(
                        //here 1 is buyer type
                        'count' => $postCount,
                    );
                    $this->social_model->update_count($id, $likeCount);
                } else {
                    $data = array(
                        'status' => "1",
                    );
                    if ($this->social_model->update_like($id, $mUserId, $data)) {
                        $getPostUserId = $this->social_model->getPost($id);
                        $data = array(
                            //here 1 is buyer type
                            'User_Id' => $mUserId,
                            'to_user' => $getPostUserId['User_Id'],
                            'message' => $mUserName . " has liked your post!!",
                            'message_type' => "Logs",
                        );
                        $this->users_model->send_inmail($data);
                        $post = $this->social_model->getPost($id);
                        $likeCount = array(
                            //here 1 is buyer type
                            'count' => $post['count'] + 1,
                        );
                        $this->social_model->update_count($id, $likeCount);
                    }
                }
            }
            redirect('social');
        } else {
            $this->session->set_flashdata('commentMessage', "Something went wrong!!");
            redirect('social');
        }
    }

    public function likeComment($id) {
        if ($id != "") {
            $mUserId = $this->session->userdata('User_Id');
            $mUserName = $this->session->userdata('Username');
            $checkIfLikedAlready = $this->social_model->check_like_for_comments($id, $mUserId);
            if ($checkIfLikedAlready == "") {
                $data = array(
                    //here 1 is buyer type
                    'User_liked_id' => $mUserId,
                    'C_Id' => $id,
                    'Status' => "1",
                );
                if ($this->social_model->add_like_comments($data)) {
                    $getPostUserId = $this->social_model->getCommentedPost($id);
                    $dataMessage = array(
                        'User_Id' => $mUserId,
                        'to_user' => $getPostUserId['User_Id'],
                        'message' => $mUserName . " has liked your post!!",
                        'message_type' => "Logs",
                    );
                    $post = $this->social_model->getCommentedPost($id);
                    $likeCount = array(
                        'comment_likes_count' => $post['comment_likes_count'] + 1,
                    );
                    $this->users_model->send_inmail($dataMessage);
                    $this->social_model->update_count_comments($id, $likeCount);
                }
            } else {
                $status = $checkIfLikedAlready[0];
                $checkStatus = $status['Status'];
                if ($checkStatus == "1") {
                    $data = array(
                        'Status' => "0",
                    );
                    $this->social_model->update_like_comments($id, $mUserId, $data);
                    $post = $this->social_model->getCommentedPost($id);
                    if ($post['comment_likes_count'] == 0) {
                        $postCount = 0;
                    } else {
                        $postCount = $post['comment_likes_count'] - 1;
                    }
                    $likeCount = array(
                        //here 1 is buyer type
                        'comment_likes_count' => $postCount,
                    );
                    $this->social_model->update_count_comments($id, $likeCount);
                } else {
                    $data = array(
                        'Status' => "1",
                    );
                    if ($this->social_model->update_like_comments($id, $mUserId, $data)) {
                        $getPostUserId = $this->social_model->getCommentedPost($id);
                        $data = array(
                            //here 1 is buyer type
                            'User_Id' => $mUserId,
                            'to_user' => $getPostUserId['User_Id'],
                            'message' => $mUserName . " has liked your post!!",
                            'message_type' => "Logs",
                        );
                        $this->users_model->send_inmail($data);
                        $post = $this->social_model->getCommentedPost($id);
                        $likeCount = array(
                            //here 1 is buyer type
                            'comment_likes_count' => $post['comment_likes_count'] + 1,
                        );
                        $this->social_model->update_count_comments($id, $likeCount);
                    }
                }
            }
            redirect('social');
        } else {
            $this->session->set_flashdata('commentMessage', "Something went wrong!!");
            redirect('social');
        }
    }
    
    public function deletePost($id) {
        if ($id != "") {
            $mUserId = $this->session->userdata('User_Id');
            $getPostUserId = $this->social_model->getPost($id);
            if ($mUserId == $getPostUserId['Posted_User_Id']) {
                $this->social_model->delete_post($id);
                $this->session->set_flashdata('commentMessage', "Deleted Post Successfully!!");
                redirect('social');
            } else {
                $this->session->set_flashdata('commentMessage', "Cannot delete, This post is not yours!!");
                redirect('social');
            }
        } else {
            $this->session->set_flashdata('commentMessage', "Something went wrong!!");
            redirect('social');
        }
    }

    public function network() {
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['users'] = $this->users_model->get_users_toconnect();
        $data['invitations'] = $this->users_model->get_invitations('Requested', $this->session->userdata('User_Id'));
        $data['connections'] = $this->users_model->get_connection_two('Connected', $this->session->userdata('User_Id'));
        $self = $this->users_model->self_invitations('Requested');
        $sel = array();
        $i = 0;
        foreach ($self as $val) {
            $sel[$i++] = $val->Connected_User_Id; //list of user for whom we send requests
        }
        $data['self_request'] = $sel;
        //echo '<pre>';print_r($sel);exit;
        $data['activeNetwork'] = "social-nav-active";
        $this->load->view('social/network', $data);
    }

    public function request($Request, $Id) {
        $mUserId = $this->session->userdata('User_Id');
        $mUserName = $this->session->userdata('Username');
        $data = array(
            'Connected_User_Id' => $Id,
            'User_Id' => $this->session->userdata('User_Id'),
            'Status' => $Request,
            'Created_On' => date("Y-m-d H:i:s"),
        );

        if (isset($data)) {
            if ($this->users_model->add_request($data))
                $data = array(
                    'User_Id' => $mUserId,
                    'to_user' => $Id,
                    'message' => $mUserName . " has Requested!!",
                    'message_type' => "Logs",
                );
            $this->users_model->send_inmail($data);
            $this->session->set_flashdata('Sucess', 'Request sent successfully');
        }
        redirect('social/network');
    }

    public function update_invitations($Status, $Id) {
        $mUserId = $this->session->userdata('User_Id');
        $mUserName = $this->session->userdata('Username');
        $mUserData = $this->users_model->get_connection_by_id($Id);
        $data = array(
            'Status' => $Status,
        );

        if (isset($data)) {
            if ($this->users_model->update_invitations($Id, $data))
                $this->session->set_flashdata('Sucesss', 'Updated successfully');
        }
        $dataMessage = array(
            'User_Id' => $mUserId,
            'to_user' => $mUserData->User_Id,
            'message' => "You are " . $Status,
            'message_type' => "Logs",
        );
        $this->users_model->send_inmail($dataMessage);
        redirect('social/network');
    }

}
