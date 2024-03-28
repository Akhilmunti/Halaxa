<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('social_model');
        $this->load->model('users_model');
        $this->load->model('rfq_model');
        $this->load->model('vendor_model');
        $this->load->model('association_model');

        date_default_timezone_set('Asia/Calcutta');
        is_logged_in();
        error_reporting(0);
    }

    public function index($id = NULL) {
        $mUserId = $this->session->userdata('User_Id');
        if ($id == NULL) {
            $data['Hidden_User_Id'] = $this->session->userdata('User_Id');
            $data['Name'] = $this->session->userdata('Username');
        } else {
            $data['Hidden_User_Id'] = '';
            $data['Name'] = $this->users_model->get_user_by_id($id)->Name;
        }


        $posts = $this->social_model->get_elements($id);
        $data['likes'] = $this->social_model->get_likes($mUserId);
        $data['users'] = $this->rfq_model->getUsers();
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['connections'] = $this->users_model->get_connections('Connected', $this->session->userdata('User_Id'));
        $data['activeMywall'] = "social-nav-active";
        //echo '<pre>';print_r($data['posts']);exit;
        $data['navbar'] = "network";
        $data['sidebar'] = "feeds";
        $mycommunities = $this->association_model->getAllCommunitiesByUserForDash($mUserId);
        $data['myComs'] = array_slice($mycommunities, 0, 5, true);
        $userstoconnect = $this->users_model->get_users_toconnect();
        $data['userstoconnect'] = array_slice($userstoconnect, 0, 5, true);
        $associations = $this->association_model->getAllCommunities();
        $data['all'] = array_slice($associations, 0, 5, true);
        $data['posts'] = $posts;
        $this->load->view('social/home', $data);
    }

    public function getAllPosts() {
        $mUserId = $this->session->userdata('User_Id');
        if ($id == NULL) {
            $data['Hidden_User_Id'] = $this->session->userdata('User_Id');
            $data['Name'] = $this->session->userdata('Username');
        } else {
            $data['Hidden_User_Id'] = '';
            $data['Name'] = $this->users_model->get_user_by_id($id)->Name;
        }
        $posts = $this->social_model->get_elements($id);
        foreach ($posts as $key => $val) {
            $status = $this->social_model->check_like($val->P_ID, $mUserId);
            $mCheckProImg = base_url('assets/photo/') . $val->Photo;
            $mUserProfile = base_url('profile/index/') . $val->Posted_User_Id;
            if (file_exists($mCheckProImg)) {
                $mProImg = base_url('profile/index/') . $val->Posted_User_Id;
            } else {
                $mProImg = base_url('assets/images/user.png');
            }
            $mName = $val->Name;
            $mPostId = $val->P_ID;
            $mDesignation = $val->Designation;
            if ($val->Partner_type) {
                if ($val->Designation == "") {
                    $mSrc = base_url('assets/halaxa_dashboard/images/halaxa-mark-icon.png');
                    $mMarkIcon = '<img style="margin-bottom: -18px" class="img-fluid post-mark-img-2" src="' . $mSrc . '" />';
                } else {
                    $mSrc = base_url('assets/halaxa_dashboard/images/halaxa-mark-icon.png');
                    $mMarkIcon = '<img class="img-fluid post-mark-img" src="' . $mSrc . '" />';
                }
            }
            $date1 = date('Y-m-d h:i:s');
            $date2 = $val->Date_Created;
            $seconds = strtotime($date1) - strtotime($date2);
            $date = $seconds / 60 / 60;
            if ($seconds < 60) {
                $date = "1 Minute ago";
            } else {
                $date = round($date);
                if ($date > 1) {
                    $date = round($date) . " Hours ago";
                } else {
                    $date = "1 Hours ago";
                }
            }
            if ($date > 24) {
                $diff = strtotime($date1, 0) - strtotime($date2, 0);
                $date = floor($diff / 604800) . " Weeks ago";
                if ($date == 0) {
                    $date = "1 Week ago";
                } else {
                    $date = $date;
                }
            }
            $mPostIcon = base_url('assets/halaxa_dashboard/images/post-time-icon.png');
            $comments = $this->social_model->get_comments($val->P_ID);
            if (!empty($comments)) {
                $mCountComments = count($comments);
            } else {
                $mCountComments = "0";
            }
            if ($val->Content) {
                $text = $val->Content;
                $url = '@(http)?(s)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
                $text = preg_replace($url, '<a href="http$2://$4" target="_blank" title="$0">$0</a>', $text);
                $mContent = '<div class="col-md-12"><span class="post-message-text">' . $text . '</span></div>';
            }
            if ($val->Image) {
                $mSrc = base_url('assets/posts/' . $val->Image);
                $mAttachment = '<div class="col-md-12 mt-3"><span class="post-attachment"><img class="img-fluid" src="' . $mSrc . '" /></span></div>';
            }
            if ($val->Video) {
                $mSrc = base_url('assets/posts/' . $val->Video);
                $mAttachment = '<div class="col-md-12 mt-3"><span class="post-attachment"><video width="100%" controls><source src="' . $mSrc . '" >Your browser does not support the video tag.</video></span></div>';
            }
            if ($val->Music) {
                $mSrc = base_url('assets/posts/' . $val->Music);
                $mAttachment = '<div class="col-md-12 mt-3"><span class="post-attachment"><audio controls><source src="' . $mSrc . '" >Your browser does not support the audio tag.</audio></span></div>';
            }
            if ($val->Link) {
                $mSrc = base_url('assets/posts/' . $val->Link);
                $mAttachment = '<div class="col-md-12 mt-3"><span class="post-attachment"> <iframe src="' . $mSrc . '" width="100%" height="400"></iframe></span></div>';
            }

            if ($status[0]['status'] == "") {
                $mHeartIcon = base_url('assets/halaxa_dashboard/images/post-heart-icon.png');
                $mCount = $val->Count;
                $mLikeLink = base_url('social/likePost/' . $val->P_ID);
                $mLikeBtn = '<a href="' . $mLikeLink . '" class="mr-2 no-decoration"><img class="img-fluid post-time-img" src="' . $mHeartIcon . '" /><span class="post-anchors-text mr-3">' . $mCount . '</span></a>';
            } elseif ($status[0]['status'] == "0") {
                $mHeartIcon = base_url('assets/halaxa_dashboard/images/post-heart-icon.png');
                $mCount = $val->Count;
                $mLikeLink = base_url('social/likePost/' . $val->P_ID);
                $mLikeBtn = '<a href="' . $mLikeLink . '" class="mr-2 no-decoration"><img class="img-fluid post-time-img" src="' . $mHeartIcon . '" /><span class="post-anchors-text mr-3">' . $mCount . '</span></a>';
            } else {
                $mHeartIcon = base_url('assets/halaxa_dashboard/images/post-heart-active-icon.png');
                $mCount = $val->Count;
                $mLikeLink = base_url('social/likePost/' . $val->P_ID);
                $mLikeBtn = '<a href="' . $mLikeLink . '" class="mr-2 no-decoration"><img class="img-fluid post-time-img" src="' . $mHeartIcon . '" /><span class="post-anchors-text mr-3">' . $mCount . '</span></a>';
            }
            $mCommentIcon = base_url('assets/halaxa_dashboard/images/post-comment-icon.png');
            $mCommentBtn = '<a class="mr-2 no-decoration" data-toggle="collapse" href="#commentsBlock_' . $mPostId . '" aria-expanded="false" aria-controls="collapseExample"><img class="img-fluid post-time-img mr-1" src="' . $mCommentIcon . '" /><span class="post-anchors-text mr-3"> ' . $mCountComments . ' comments</span></a>';
            $mShareIcon = base_url('assets/halaxa_dashboard/images/post-share-icon.png');
            $mShareBtn = '<a href="#" class="mr-2 no-decoration"><img class="img-fluid post-time-img" src="' . $mShareIcon . '" /><span class="post-anchors-text mr-3"> share</span></a>';

            $mPostData = $mPostData . '<div class="theme-card mb-3">';
            if (!empty($comments)) {
                $mLatestComment = $comments[0]['Username'];
                $mLatestIcon = base_url('assets/halaxa_dashboard/images/post-comment-icon.png');
                $mPostData = $mPostData . '<div class="posts-header pt-2 pb-2 pl-3 border-bottom-post"><div class="row"><div class="col-md-12"><a href="#" class="mr-2 no-decoration"><img class="img-fluid post-time-img-sm" src="' . $mLatestIcon . '" /><span class="post-status-text">commented by </span><span class="post-status-text-by">' . $mLatestComment . '</span></a></div></div></div>';
            }

            $mCommentFormAction = base_url('social/add_comment/' . $val->P_ID);
            $mLatestComment = $comments[0]['Content'];

            if (file_exists(base_url('assets/photo/' . $comments[0]['Photo']))) {
                $mIcon = base_url('assets/photo/' . $comments[0]['Photo']);
                $mCommentIcon = '<img class="img-fluid rounded-circle" src="' . $mIcon . '" />';
            } else {
                $mIcon = base_url('assets/images/user.png');
                $mCommentIcon = '<img class="img-fluid rounded-circle" src="' . $mIcon . '" />';
            }

            $mPostData = $mPostData . '<div class="posts p-3"><div class="row">';
            $mPostData = $mPostData . '<div class="col-md-1"><a href="' . $mUserProfile . '"><img src="' . $mProImg . '" class="img-fluid rounded-circle" alt="Avatar"></a></div>';
            $mPostData = $mPostData . '<div class="col-md-6 no-padding"><ul class="list-inline"><li class="list-inline-item"><a class="no-decoration" target="_blank" href="' . $mUserProfile . '"><p class="post-user-text text-capitalize">' . $mName . '</p><p class="post-user-post text-capitalize">' . $mDesignation . '</p></a></li><li class="list-inline-item">' . $mMarkIcon . '</li></ul></div>';
            $mPostData = $mPostData . '<div class="col-md-5 text-right"><img class="img-fluid post-time-img" src="' . $mPostIcon . '" /><span class="post-time-text mr-3">' . $date . '</span></div>';
            $mPostData = $mPostData . $mContent;
            $mPostData = $mPostData . $mAttachment;
            $mPostData = $mPostData . '<div class="col-md-12 mt-3"><div class="post-anchors">' . $mLikeBtn . $mCommentBtn . $mShareBtn . '</div></div>';
            $mPostData = $mPostData . '</div></div>';
            $mPostData = $mPostData . '<div class="comments">';
            $mPostData = $mPostData . '<div class="collapse post-comments border-top-post" id="commentsBlock_' . $mPostId . '">';
            $mPostData = $mPostData . '<div class="row"><div class="col-md-12"><div class="comment-box p-3">';
            $mPostData = $mPostData . '<form id="comment_form_' . $mPostId . '" method="POST" enctype="multipart/form-data" action="' . $mCommentFormAction . '">';
            $mPostData = $mPostData . '<div class="row"><div class="col-md-9"><input required="" name="comment" type="text" class="form-control form-control-post-comment" /></div><div class="col-md-3 text-left"><button type="submit" class="no-decoration comment-button">Add Comment</button></div></div>';
            $mPostData = $mPostData . '</form>';
            if (!empty($comments)) {
                $dateComment1 = date('Y-m-d h:i:s');
                $dateComment2 = $comments[0]['Date_Created'];
                $seconds = strtotime($dateComment1) - strtotime($dateComment2);
                $date = $seconds / 60 / 60;
                $date = round($date) . " Hours ago";
                if ($date > 24) {
                    $diff = strtotime($date1, 0) - strtotime($date2, 0);
                    $date = floor($diff / 604800) . " Weeks ago";
                }
                $mPostedBy = $comments[0]['Username'];
                $mPotsTimeIcon = base_url('assets/halaxa_dashboard/images/post-time-icon.png');
                $mLikeUrl = base_url('social/likeComment/') . $comments[0]['C_Id'];
                $mCommentLikesCount = $comments[0]['comment_likes_count'];
                $mCommentStatus = $this->social_model->check_like_for_comments($comments[0]['C_Id'], $mUserId);
                if ($mCommentStatus[0]['Status'] == "") {
                    $mHeartIcon = base_url('assets/halaxa_dashboard/images/post-heart-icon.png');
                    $mComLikeIcon = '<img class="img-fluid post-time-img" src="' . $mHeartIcon . '" />';
                } elseif ($mCommentStatus[0]['Status'] == "0") {
                    $mHeartIcon = base_url('assets/halaxa_dashboard/images/post-heart-icon.png');
                    $mComLikeIcon = '<img class="img-fluid post-time-img" src="' . $mHeartIcon . '" />';
                } else {
                    $mHeartIcon = base_url('assets/halaxa_dashboard/images/post-heart-active-icon.png');
                    $mComLikeIcon = '<img class="img-fluid post-time-img" src="' . $mHeartIcon . '" />';
                }

                $mPostData = $mPostData . '<div class="user-comments"><div class="row"><div class="col-md-12"><div class="main-comment mt-3 border-bottom-post">';
                $mPostData = $mPostData . '<p class="main-comment-text">' . $mLatestComment . '</p>';
                $mPostData = $mPostData . '<div class="row">';
                $mPostData = $mPostData . '<div class="col-md-1">';
                $mPostData = $mPostData . $mCommentIcon;
                $mPostData = $mPostData . '</div>';
                $mPostData = $mPostData . '<div class="col-md-6">';
                $mPostData = $mPostData . '<ul class="list-inline"><li class="list-inline-item"><a class="no-decoration" target="_blank" href="#"><p class="post-user-text">' . $mPostedBy . '</p></a></li><li class="list-inline-item"><img class="img-fluid post-time-img" src="' . $mPotsTimeIcon . '" /><span class="post-time-text mr-3">' . $date . '</span></li></ul>';
                $mPostData = $mPostData . '</div>';
                $mPostData = $mPostData . '<div class="col-md-5 text-right"><a href="' . $mLikeUrl . '" class="mr-2 no-decoration">' . $mComLikeIcon . '<span class="post-anchors-text mr-3"> ' . $mCommentLikesCount . '</span></a>';

                $mPostData = $mPostData . '</div>';
                $mPostData = $mPostData . '</div>';
                $mPostData = $mPostData . '</div></div></div></div>';
            }
            if (!empty($comments)) {
                $mPostData = $mPostData . '<a class="no-decoration pt-3 load-more-comments"  data-toggle="collapse" href="#commentsMoreBlock_' . $mPostId . '" aria-expanded="false" aria-controls="collapseExample">Load More Comments</a>';
            }
            $mPostData = $mPostData . '</div></div></div>';
            $mPostData = $mPostData . '</div>';
            $mPostData = $mPostData . '</div>';
            $mPostData = $mPostData . '</div>';
        }
        return $mPostData;
    }

    public function getMembers() {
        $mUserId = $this->session->userdata('User_Id');
        $memberName = $this->input->post('member');
        if (!empty($memberName)) {
            $getUserByName = $this->users_model->getUserByName($memberName);
            $result = '<li><a target="_blank" href=""></a></li>';
            foreach ($getUserByName as $key => $user) {
                $profileLink = base_url('profile/index/') . $user['User_Id'];
                $imageLink = base_url('assets/photo/') . $user['Photo'];
                $placeholderLink = base_url('/assets/images/user.png');
                $requestLink = base_url('social/request/Connected/') . $user['User_Id'];
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
                $connect = $this->users_model->self_invitations('Connected');
                $conn = array();
                $i = 0;
                foreach ($connect as $val) {
                    $conn[$i++] = $val->Connected_User_Id; //list of user for whom we send requests
                }
                $connect_request = $conn;
                if (in_array($user['User_Id'], $self_request)) {
                    $statusBtn = '<a href="#" class="btn btn-primary btn-xs">Request Sent</a>';
                } elseif (in_array($user['User_Id'], $connect_request)) {
                    $statusBtn = '<a href="#" class="btn btn-success btn-xs">Following</a>';
                } else {
                    $statusBtn = '<a href="' . $requestLink . '" class="btn btn-info btn-xs">Follow</a>';
                }
                $result = $result . '<li><a target="blank" href="' . $profileLink . '"><img src="' . $image . '" class="avatar img-circle" alt="Avatar"></a><div class="message_date">' . $statusBtn . '</div><div class="message_wrapper"><a target="blank" href="' . $profileLink . '"><h4 class="heading">' . $user['Username'] . '</h4><p class="heading">Designation : ' . $designation . '</p><p class="heading">Location : ' . $location . '</p></a></div></li>' . PHP_EOL;
            }
            echo $result;
        }
    }

    public function getUsers() {
        $mUserId = $this->session->userdata('User_Id');
        $memberName = $this->input->post('member');
        if (!empty($memberName)) {
            $getUserByName = $this->users_model->getUserByName($memberName);
            $result = '';
            foreach ($getUserByName as $key => $user) {
                $profileLink = base_url('profile/index/') . $user['User_Id'];
                $imageLink = base_url('assets/photo/') . $user['Photo'];
                $placeholderLink = base_url('assets/halaxa_dashboard/images/user-img.png');
                $requestLink = base_url('social/request/Connected/') . $user['User_Id'];
                $mFollowers = $this->users_model->get_connections('Connected', $user['User_Id']);
                if (!empty($user['Photo'])) {
                    $image = $imageLink;
                } else {
                    $image = $placeholderLink;
                }
                if (!empty($mFollowers)) {
                    $followers = count($mFollowers);
                } else {
                    $followers = "0";
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
                $connect = $this->users_model->self_invitations('Connected');
                $conn = array();
                $i = 0;
                foreach ($connect as $val) {
                    $conn[$i++] = $val->Connected_User_Id; //list of user for whom we send requests
                }
                $connect_request = $conn;
                if (in_array($user['User_Id'], $self_request)) {
                    $statusBtn = '<a href="#" class="btn btn-community btn-block">Request Sent</a>';
                } elseif (in_array($user['User_Id'], $connect_request)) {
                    $statusBtn = '<a href="#" class="btn btn-community btn-block">Following</a>';
                } else {
                    $statusBtn = '<a href="' . $requestLink . '" class="btn btn-community btn-block">Follow</a>';
                }
                //$result = $result . '<li><a target="blank" href="' . $profileLink . '"><img src="' . $image . '" class="avatar img-circle" alt="Avatar"></a><div class="message_date">' . $statusBtn . '</div><div class="message_wrapper"><a target="blank" href="' . $profileLink . '"><h4 class="heading">' . $user['Username'] . '</h4><p class="heading">Designation : ' . $designation . '</p><p class="heading">Location : ' . $location . '</p></a></div></li>' . PHP_EOL;

                $result = $result . '<div class="col-md-4">
                                            <div class="card community-card">
                                                <div class="card-content profile-content">
                                                    <div class="row p-3">
                                                        <div class="col-md-12">
                                                            <img class="img-fluid" src="' . base_url('assets/halaxa_dashboard/images/profile-card-back.png') . '" />'
                        . '                                 <img class="rounded-circle profile-card-img" src="' . $image . '" />
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <h6 class="profile-card-username">' . $user['Username'] . '</h6>
                                                                </div>
                                                                <div class="col-md-2 text-center">
                                                                    <a class="profile-card-settings">
                                                                        <img class="img-fluid" src="' . base_url('assets/halaxa_dashboard/images/post-settings-icon.png') . '" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <p class="profile-info">' . $designation . '</p>
                                                            <p class="profile-info">' . $followers . ' Followers</p>
                                                                ' . $statusBtn . '
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>' . PHP_EOL;
            }

            echo $result;
        } else {
            $getUserByName = $this->users_model->getAllUsers();
            $result = '';
            foreach ($getUserByName as $key => $user) {
                $profileLink = base_url('profile/index/') . $user['User_Id'];
                $imageLink = base_url('assets/photo/') . $user['Photo'];
                $placeholderLink = base_url('assets/halaxa_dashboard/images/user-img.png');
                $requestLink = base_url('social/request/Connected/') . $user['User_Id'];
                $mFollowers = $this->users_model->get_connections('Connected', $user['User_Id']);
                if (!empty($user['Photo'])) {
                    $image = $imageLink;
                } else {
                    $image = $placeholderLink;
                }
                if (!empty($mFollowers)) {
                    $followers = count($mFollowers);
                } else {
                    $followers = "0";
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
                $connect = $this->users_model->self_invitations('Connected');
                $conn = array();
                $i = 0;
                foreach ($connect as $val) {
                    $conn[$i++] = $val->Connected_User_Id; //list of user for whom we send requests
                }
                $connect_request = $conn;
                if (in_array($user['User_Id'], $self_request)) {
                    $statusBtn = '<a href="#" class="btn btn-community btn-block">Request Sent</a>';
                } elseif (in_array($user['User_Id'], $connect_request)) {
                    $statusBtn = '<a href="#" class="btn btn-community btn-block">Following</a>';
                } else {
                    $statusBtn = '<a href="' . $requestLink . '" class="btn btn-community btn-block">Follow</a>';
                }
                //$result = $result . '<li><a target="blank" href="' . $profileLink . '"><img src="' . $image . '" class="avatar img-circle" alt="Avatar"></a><div class="message_date">' . $statusBtn . '</div><div class="message_wrapper"><a target="blank" href="' . $profileLink . '"><h4 class="heading">' . $user['Username'] . '</h4><p class="heading">Designation : ' . $designation . '</p><p class="heading">Location : ' . $location . '</p></a></div></li>' . PHP_EOL;

                $result = $result . '<div class="col-md-4">
                                            <div class="card community-card">
                                                <div class="card-content profile-content">
                                                    <div class="row p-3">
                                                        <div class="col-md-12">
                                                            <img class="img-fluid" src="' . base_url('assets/halaxa_dashboard/images/profile-card-back.png') . '" />'
                        . '                                 <img class="rounded-circle profile-card-img" src="' . $image . '" />
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <h6 class="profile-card-username">' . $user['Username'] . '</h6>
                                                                </div>
                                                                <div class="col-md-2 text-center">
                                                                    <a class="profile-card-settings">
                                                                        <img class="img-fluid" src="' . base_url('assets/halaxa_dashboard/images/post-settings-icon.png') . '" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <p class="profile-info">' . $designation . '</p>
                                                            <p class="profile-info">' . $followers . ' Followers</p>
                                                                ' . $statusBtn . '
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>' . PHP_EOL;
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

    public function mGenerateRandomNumber() {
        $key = '';
        $keys = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
        for ($i = 0; $i < 25; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }

    public function replyToComment($param) {
        $mUserId = $this->session->userdata('User_Id');
        $mUserName = $this->session->userdata('Username');
        if ($mUserId) {
            if ($param != "") {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('reply', 'Reply', 'required');
                if ($this->form_validation->run()) {
                    $mKey = $this->mGenerateRandomNumber();
                    // Date format conversion
                    $data = array(
                        //here 1 is buyer type
                        'reply_key' => $mKey,
                        'reply_by' => $mUserId,
                        'reply_to' => $param,
                        'reply_comment' => $this->input->post('reply'),
                        'reply_date_added' => date('Y-m-d H:i:s'),
                        'reply_date_updated' => date('Y-m-d H:i:s'),
                    );
                    if ($this->social_model->add_reply($data) == TRUE) {
                        $getComment = $this->social_model->getComment($param);

                        if ($mUserId == $getComment['User_commented_id']) {
                            
                        } else {
                            $data = array(
                                //here 1 is buyer type
                                'User_Id' => $mUserId,
                                'to_user' => $getComment['User_commented_id'],
                                'message' => $mUserName . " has replied to your comment",
                                'message_type' => "Logs",
                            );
                            $this->users_model->send_inmail($data);
                        }
                    }
                    $this->session->set_flashdata('commentMessage', "Reply added successfully");
                } else {
                    $this->session->set_flashdata('result', 'Failed. Something went wrong.' . $this->form_validation->error_string());
                    $error = $this->form_validation->error_array();
                    if (isset($error['reply'])) {
                        $this->session->set_flashdata('reply', $error['reply']);
                    }
                }
                redirect('social');
            } else {
                $this->session->set_flashdata('commentMessage', "Something went wrong!!");
                redirect('social');
            }
        } else {
            redirect('social');
        }
    }

    public function add_comment($id) {
        $mUserId = $this->session->userdata('User_Id');
        $mUserName = $this->session->userdata('Username');
        if ($id != "") {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('comment', 'Comment', 'required');
            if ($this->form_validation->run()) {
                // Date format conversion
                $data = array(
                    //here 1 is buyer type
                    'User_commented_id' => $mUserId,
                    'P_ID' => $id,
                    'Content' => $this->input->post('comment'),
                );
                if ($this->social_model->add_comment($data)) {
                    $getPostUserId = $this->social_model->getPost($id);

                    if ($mUserId == $getPostUserId['User_Id']) {
                        
                    } else {
                        $data = array(
                            //here 1 is buyer type
                            'User_Id' => $mUserId,
                            'to_user' => $getPostUserId['User_Id'],
                            'message' => $mUserName . " has Commented on your post!!",
                            'message_type' => "Logs",
                        );
                        $this->users_model->send_inmail($data);
                    }
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

    public function deleteReply($param) {
        $mUserId = $this->session->userdata('User_Id');
        $mUserName = $this->session->userdata('Username');
        if ($mUserId) {
            if ($param) {
                if ($this->social_model->delete_reply($param)) {
                    $this->session->set_flashdata('commentMessage', "Reply deleted successfully!!");
                }
                redirect('social');
            } else {
                $this->session->set_flashdata('commentMessage', "Something went wrong!!");
                redirect('social');
            }
        } else {
            redirect('social');
        }
    }

    public function deleteComment($id) {
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
            $getPostUserId = $this->social_model->getPost($id);
            if ($checkIfLikedAlready == "") {
                $data = array(
                    //here 1 is buyer type
                    'User_liked_id' => $mUserId,
                    'P_ID' => $id,
                    'status' => "1",
                );
                if ($this->social_model->add_like($data)) {
                    if ($mUserId == $getPostUserId['User_Id']) {
                        
                    } else {
                        $getPostUserId = $this->social_model->getPost($id);
                        $dataMessage = array(
                            //here 1 is buyer type
                            'User_Id' => $mUserId,
                            'to_user' => $getPostUserId['User_Id'],
                            'message' => $mUserName . " has liked your post!!",
                            'message_type' => "Logs",
                        );
                        $this->users_model->send_inmail($dataMessage);
                    }

                    $post = $this->social_model->getPost($id);
                    $likeCount = array(
                        'count' => $post['count'] + 1,
                    );
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

                        if ($mUserId == $getPostUserId['User_Id']) {
                            
                        } else {
                            $getPostUserId = $this->social_model->getPost($id);
                            $data = array(
                                //here 1 is buyer type
                                'User_Id' => $mUserId,
                                'to_user' => $getPostUserId['User_Id'],
                                'message' => $mUserName . " has liked your post!!",
                                'message_type' => "Logs",
                            );
                            $this->users_model->send_inmail($data);
                        }


                        $post = $this->social_model->getPost($id);
                        $likeCount = array(
                            //here 1 is buyer type
                            'count' => $post['count'] + 1,
                        );
                        $this->social_model->update_count($id, $likeCount);
                    }
                }
            }
            redirect('social', 'refresh');
        } else {
            $this->session->set_flashdata('commentMessage', "Something went wrong!!");
            redirect('social', 'refresh');
        }
    }

    public function likePostDynamic($id) {
        if ($id != "") {
            $mUserId = $this->session->userdata('User_Id');
            $mUserName = $this->session->userdata('Username');
            $checkIfLikedAlready = $this->social_model->check_like($id, $mUserId);
            $getPostUserId = $this->social_model->getPost($id);
            $mSetStaus = 1;
            if (!empty($checkIfLikedAlready)) {
                $checkStatus = $checkIfLikedAlready[0]['status'];
                if ($checkStatus == 1) {
                    $mSetStaus = 0;
                    if ($getPostUserId['count'] == 0) {
                        $postCount = 0;
                    } else {
                        $postCount = $getPostUserId['count'] - 1;
                    }
                } else {
                    $postCount = $getPostUserId['count'] + 1;
                    $mSetStaus = 1;
                }
                $data = array(
                    'status' => $mSetStaus,
                );
                $this->social_model->update_like($id, $mUserId, $data);
                $likeCount = array(
                    //here 1 is buyer type
                    'count' => $postCount,
                );
                $this->social_model->update_count($id, $likeCount);
            } else {
                $data = array(
                    //here 1 is buyer type
                    'User_liked_id' => $mUserId,
                    'P_ID' => $id,
                    'status' => $mSetStaus,
                );
                if ($mUserId != $getPostUserId['User_Id']) {
                    $dataMessage = array(
                        //here 1 is buyer type
                        'User_Id' => $mUserId,
                        'to_user' => $getPostUserId['User_Id'],
                        'message' => $mUserName . " has liked your post!!",
                        'message_type' => "Logs",
                    );
                    $this->users_model->send_inmail($dataMessage);
                }
                $likeCount = array(
                    'count' => $getPostUserId['count'] + 1,
                );
                $this->social_model->update_count($id, $likeCount);
            }
            
            $post = $this->social_model->getPost($id);
            
            $data = array(
                'count' => $post['count'],
                'status' => $mSetStaus
            );
            $data = json_encode($data);
            echo $data;
        } else {
            echo 0;
        }
    }

    public function likeComment($id) {
        if ($id != "") {
            $mUserId = $this->session->userdata('User_Id');
            $mUserName = $this->session->userdata('Username');
            $checkIfLikedAlready = $this->social_model->check_like_for_comments($id, $mUserId);
            $getPostUserId = $this->social_model->getCommentedPost($id);
            if ($checkIfLikedAlready == "") {
                $data = array(
                    //here 1 is buyer type
                    'User_liked_id' => $mUserId,
                    'C_Id' => $id,
                    'Status' => "1",
                );
                if ($this->social_model->add_like_comments($data)) {

                    if ($mUserId == $getPostUserId['User_Id']) {
                        
                    } else {
                        $getPostUserId = $this->social_model->getCommentedPost($id);
                        $dataMessage = array(
                            'User_Id' => $mUserId,
                            'to_user' => $getPostUserId['User_Id'],
                            'message' => $mUserName . " has liked your post!!",
                            'message_type' => "Logs",
                        );
                        $this->users_model->send_inmail($dataMessage);
                    }


                    $post = $this->social_model->getCommentedPost($id);
                    $likeCount = array(
                        'comment_likes_count' => $post['comment_likes_count'] + 1,
                    );

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


                        if ($mUserId == $getPostUserId['User_Id']) {
                            
                        } else {
                            $getPostUserId = $this->social_model->getCommentedPost($id);
                            $data = array(
                                //here 1 is buyer type
                                'User_Id' => $mUserId,
                                'to_user' => $getPostUserId['User_Id'],
                                'message' => $mUserName . " has liked your post!!",
                                'message_type' => "Logs",
                            );
                            $this->users_model->send_inmail($data);
                        }

                        $post = $this->social_model->getCommentedPost($id);
                        $likeCount = array(
                            //here 1 is buyer type
                            'comment_likes_count' => $post['comment_likes_count'] + 1,
                        );
                        $this->social_model->update_count_comments($id, $likeCount);
                    }
                }
            }
            redirect('social', 'refresh');
        } else {
            $this->session->set_flashdata('commentMessage', "Something went wrong!!");
            redirect('social', 'refresh');
        }
    }

    public function likeCommentDynamic($id) {
        if ($id != "") {
            $mUserId = $this->session->userdata('User_Id');
            $mUserName = $this->session->userdata('Username');
            $checkIfLikedAlready = $this->social_model->check_like_for_comments($id, $mUserId);
            $getPostUserId = $this->social_model->getCommentedPost($id);
            if ($checkIfLikedAlready == "") {
                $data = array(
                    //here 1 is buyer type
                    'User_liked_id' => $mUserId,
                    'C_Id' => $id,
                    'Status' => "1",
                );
                if ($this->social_model->add_like_comments($data)) {

                    if ($mUserId == $getPostUserId['User_Id']) {
                        
                    } else {
                        $getPostUserId = $this->social_model->getCommentedPost($id);
                        $dataMessage = array(
                            'User_Id' => $mUserId,
                            'to_user' => $getPostUserId['User_Id'],
                            'message' => $mUserName . " has liked your post!!",
                            'message_type' => "Logs",
                        );
                        $this->users_model->send_inmail($dataMessage);
                    }


                    $post = $this->social_model->getCommentedPost($id);
                    $likeCount = array(
                        'comment_likes_count' => $post['comment_likes_count'] + 1,
                    );

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


                        if ($mUserId == $getPostUserId['User_Id']) {
                            
                        } else {
                            $getPostUserId = $this->social_model->getCommentedPost($id);
                            $data = array(
                                //here 1 is buyer type
                                'User_Id' => $mUserId,
                                'to_user' => $getPostUserId['User_Id'],
                                'message' => $mUserName . " has liked your post!!",
                                'message_type' => "Logs",
                            );
                            $this->users_model->send_inmail($data);
                        }

                        $post = $this->social_model->getCommentedPost($id);
                        $likeCount = array(
                            //here 1 is buyer type
                            'comment_likes_count' => $post['comment_likes_count'] + 1,
                        );
                        $this->social_model->update_count_comments($id, $likeCount);
                    }
                }
            }
            $post = $this->social_model->getCommentedPost($id);
            echo $post['comment_likes_count'];
        } else {
            echo 0;
        }
    }

    public function deletePost($id) {
        if ($id != "") {
            $mUserId = $this->session->userdata('User_Id');
            $getPostUserId = $this->social_model->getPost($id);
            if ($mUserId == $getPostUserId['Posted_User_Id']) {
                $this->social_model->delete_post($id);
                $this->session->set_flashdata('commentMessage', "Deleted Post Successfully!!");
                redirect('social', 'refresh');
            } else {
                $this->session->set_flashdata('commentMessage', "Cannot delete, This post is not yours!!");
                redirect('social', 'refresh');
            }
        } else {
            $this->session->set_flashdata('commentMessage', "Something went wrong!!");
            redirect('social', 'refresh');
        }
    }

    public function network() {
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['users'] = $this->users_model->get_users_toconnect();
        $data['invitations'] = $this->users_model->get_invitations('Requested', $this->session->userdata('User_Id'));
        $data['connections'] = $this->users_model->get_connections('Connected', $this->session->userdata('User_Id'));
        $self = $this->users_model->self_invitations('Requested');
        $sel = array();
        $i = 0;
        foreach ($self as $val) {
            $sel[$i++] = $val->Connected_User_Id; //list of user for whom we send requests
        }
        $data['self_request'] = $sel;
        //echo '<pre>';print_r($sel);exit;
        $data['activeNetwork'] = "social-nav-active";
        $data['navbar'] = "network";
        $data['sidebar'] = "myfoll";
        $this->load->view('social/network', $data);
    }

    public function networkSearch() {
        $mUserId = $this->session->userdata('User_Id');
        $data['users'] = $this->rfq_model->getUsers();
        $data['inmailMessages'] = $this->users_model->getMessages($mUserId);
        $data['logMessages'] = $this->users_model->getLogs($mUserId);
        $data['users'] = $this->users_model->get_users_toconnect();
        $data['invitations'] = $this->users_model->get_invitations('Requested', $this->session->userdata('User_Id'));
        $data['connections'] = $this->users_model->get_connections('Connected', $this->session->userdata('User_Id'));
        $self = $this->users_model->self_invitations('Requested');
        $sel = array();
        $i = 0;
        foreach ($self as $val) {
            $sel[$i++] = $val->Connected_User_Id; //list of user for whom we send requests
        }
        $data['self_request'] = $sel;
        //echo '<pre>';print_r($sel);exit;
        $data['activeNetwork'] = "social-nav-active";
        $data['navbar'] = "network";
        $data['sidebar'] = "foll";
        $this->load->view('social/network_search', $data);
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
                    'message' => $mUserName . " has Connected!!",
                    'message_type' => "Logs",
                );
            $this->users_model->send_inmail($data);
            $this->session->set_flashdata('Success', 'Connected successfully');
        }
        redirect('social/network');
    }

    public function update_invitations($Status, $Id) {
        if ($Status == "Rejected") {
            $mUserId = $this->session->userdata('User_Id');
            $mUserName = $this->session->userdata('Username');
            $mUserData = $this->users_model->get_connection_by_id($Id);
            $actionDelete = $this->users_model->deleteConnectionByConnectionId($Id);
            if ($actionDelete == TRUE) {
                $dataMessage = array(
                    'User_Id' => $mUserId,
                    'to_user' => $mUserData->User_Id,
                    'message' => "You are " . $Status,
                    'message_type' => "Logs",
                );
                $this->users_model->send_inmail($dataMessage);
                $this->session->set_flashdata('Sucesss', 'Updated successfully');
            } else {
                $this->session->set_flashdata('Sucesss', 'Something went wrong, please try again later.');
            }
        } else {
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
        }

        redirect('social/network');
    }

}
