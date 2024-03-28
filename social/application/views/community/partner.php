<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('community/partials/header'); ?>

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('community/partials/navbar'); ?>

            <div class="wrapper">
                <!-- Sidebar -->
                <?php $this->load->view('community/partials/sidebar'); ?>

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $this->load->view('community/partials/alerts'); ?>
                            </div>
                            <div class="col-md-12">
                                <div class="theme-card mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?php echo base_url('communities/getTopics/') . $com_key; ?>">
                                                <div class="post-card p-2">
                                                    <span class="com-name"><?php echo $partner['Groupname'] . " Community" . "/"; ?></span>
                                                    <span class="com-thread-name"><?php echo $topicdata['ct_topic'] ?></span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 scrolling-div-y">
                                <div class="theme-card mb-3">
                                    <?php
                                    if (!empty($topicdata)) {
                                        $mSessionId = $this->session->userdata('User_Id');
                                        ?>

                                        <div class="row">
                                            <div class="col-md-8 border-right-post">
                                                <div class="post-card p-4">
                                                    <img class="img-fluid start-post-img" src="<?php echo base_url('assets/halaxa_dashboard/images/write-icon.png'); ?>" />
                                                    <span class="start-post-text ml-1">Start a post</span>
                                                </div>
                                            </div>

                                            <div class="col-md-2 border-right-post">
                                                <div class="post-card p-4 text-center">
                                                    <a href="#" data-toggle="modal" data-target="#myModalBoth">
                                                        <img class="img-fluid start-post-img-picture" src="<?php echo base_url('assets/halaxa_dashboard/images/picture-icon.png'); ?>" />
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="post-card p-4 text-center">
                                                    <a href="#" data-toggle="modal" data-target="#myModalBoth">
                                                        <img class="img-fluid start-post-img-video" src="<?php echo base_url('assets/halaxa_dashboard/images/video-icon.png'); ?>" />
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <form method="POST" action="<?php echo base_url('communities/add_posts/' . $topicdata['ct_key']); ?>" enctype="multipart/form-data">
                                            <input hidden="hidden" name="Hidden_User_Id" value="<?php echo $mSessionId; ?>" />

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="post-card-bottom p-3">
    <!--                                                    <input placeholder="Write a post on Halaxa" required="" name="content" class="form-control comment-form"/>
                                                        <input type="submit" hidden="" />-->
                                                        <a href="#" data-toggle="modal" data-target="#myModalBoth">
                                                            <span class="write-a-post">Write a post </span>
                                                            <span class="write-name">on Community</span>
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal" id="myModalBoth">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content-theme">

                                                                    <div class="modal-header bg-danger">
                                                                        <span class="modal-header-text">Create a post</span>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <div class="row mb-2">
                                                                            <div class="col-md-1">
                                                                                <span>
                                                                                    <?php if ($this->session->userdata('Photo')) { ?>
                                                                                        <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/photo/<?php echo $this->session->userdata('Photo'); ?>" alt="">
                                                                                    <?php } else { ?>
                                                                                        <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/images/user.png" alt="">
                                                                                    <?php } ?>
                                                                                </span>
                                                                            </div>
                                                                            <div class="col-md-11 text-left">
                                                                                <span class="post-user-text-modal text-capitalize">
                                                                                    <?php echo $this->session->userdata('Username'); ?>
                                                                                </span>
                                                                            </div>
                                                                        </div>

                                                                        <textarea rows="10" type="text" id="content_image" name="content" placeholder="What do you want to talk about?" class="form-control post-comment-textarea"></textarea>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col-md-1">
                                                                                <input hidden="" class="form-control" type="file" id="image" name="image" accept=".png, .jpg, .jpeg, .gif" onchange="loadFileBoth(event)"/>
                                                                                <div class="text-left">
                                                                                    <label for='image'>
                                                                                        <img class="img-fluid start-post-img-picture" src="<?php echo base_url('assets/halaxa_dashboard/images/picture-icon.png'); ?>" />
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-1">
                                                                                <input hidden="" type="file" class="file_multi_video form-control" id="video" name="video" accept="video/mp4, video/MPG, video/* " /> 
                                                                                <div class="text-left">
                                                                                    <label for='video'>
                                                                                        <img class="img-fluid start-post-img-picture" src="<?php echo base_url('assets/halaxa_dashboard/images/video-icon.png'); ?>" />
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <br>
                                                                        <img id="output-img-both" width="100%" height="300"/>

                                                                        <video id="videoPreview-both" width="100%" height="300" controls>
                                                                            <source src="mov_bbb.mp4" id="video_here_both">
                                                                            Your browser does not support HTML5 video.
                                                                        </video>

                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                        <button type="button" class="btn btn-default" id="cancelImage">Reset</button>
                                                                        <button type="submit" class="btn btn-danger">Post</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php } ?>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">


                                        <?php
                                        if ($posts) {
                                            $mSessionId = $this->session->userdata('User_Id');
                                            foreach ($posts as $val) {
                                                $mWhoPosted = $val['cp_posted_id'];
                                                if ($mWhoPosted == 0) {
                                                    $mName = $partner['Groupname'];
                                                    $mPhoto = $this->session->userdata('picture');
                                                    $mPhotoUrl = base_url('uploads/') . $this->session->userdata('picture');
                                                    $mDesignation = "Admin";
                                                    $mDate = $val['cp_date_added'];
                                                    $mContent = $val['cp_content'];
                                                    $mPostKey = $val['cp_key'];
                                                } else {
                                                    $mGetUser = $this->users_model->get_user_by_id($mWhoPosted);
                                                    $mName = $mGetUser->Name;
                                                    $mId = $mGetUser->User_Id;
                                                    $mPhoto = $mGetUser->Photo;
                                                    $mPhotoUrl = base_url('assets/photo/') . $mGetUser->Photo;
                                                    $mDesignation = $mGetUser->Designation;
                                                    $mDate = $val['cp_date_added'];
                                                    $mContent = $val['cp_content'];
                                                    $mPostKey = $val['cp_key'];
                                                }
                                                $mComments = $this->cp_model->getCommentsByPostKey($mPostKey);
                                                if (!empty($mComments)) {
                                                    $mCommentsCount = count($mComments);
                                                } else {
                                                    $mCommentsCount = "0";
                                                }
                                                $mLikeStatus = $this->social_model->check_like_community($mPostKey, $mSessionId);
                                                $mLikesCount = $this->social_model->getAllLikes($mPostKey);
                                                if (!empty($mLikesCount)) {
                                                    $mLikesCount = count($mLikesCount);
                                                } else {
                                                    $mLikesCount = 0;
                                                }
                                                ?>
                                                <div class="theme-card mb-3">
                                                    <?php
                                                    if (!empty($mComments)) {
                                                        $com = $mComments[0];
                                                        $mWhoCommented = $com['cc_posted_user_id'];
                                                        if ($mWhoCommented == 0) {
                                                            $mName = $partner['Groupname'];
                                                            $mPhotoCom = $this->session->userdata('picture');
                                                            $mPhotoComUrl = base_url('uploads/') . $this->session->userdata('picture');
                                                            $mDesignation = "Admin";
                                                            $mDateCom = $com['cc_date_added'];
                                                            $mContentCom = $com['cc_content'];
                                                            $mPostKey = $val['cp_key'];
                                                        } else {
                                                            $mGetUser = $this->users_model->get_user_by_id($mWhoCommented);
                                                            $mName = $mGetUser->Name;
                                                            $mPhotoCom = $mGetUser->Photo;
                                                            $mPhotoComUrl = base_url('assets/photo/') . $mGetUser->Photo;
                                                            $mDesignation = $mGetUser->Designation;
                                                            $mDateCom = $com['cc_date_added'];
                                                            $mContentCom = $com['cc_content'];
                                                            $mPostKey = $val['cp_key'];
                                                        }
                                                        ?>
                                                        <div class="posts-header pt-2 pb-2 pl-3 border-bottom-post">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <a href="#" class="mr-2 no-decoration">
                                                                        <img class="img-fluid post-time-img-sm" src="<?php echo base_url('assets/halaxa_dashboard/images/post-comment-icon.png'); ?>" />
                                                                        <span class="post-status-text">commented by </span>
                                                                        <span class="post-status-text-by">
                                                                            <?php echo $mName; ?>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="posts p-3">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <a href="#"> 
                                                                    <?php
                                                                    if (!empty($mPhoto)) {
                                                                        ?>
                                                                        <img src="<?php echo $mPhotoUrl; ?>" class="img-fluid rounded-circle" alt="<?php echo $mName; ?>">
                                                                    <?php } else { ?>
                                                                        <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/images/user.png" />
                                                                    <?php } ?>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 no-padding">
                                                                <ul class="list-inline">
                                                                    <li class="list-inline-item">
                                                                        <a class="no-decoration" target="_blank" href="<?php echo base_url(); ?>profile/index/<?php echo $val->Posted_User_Id; ?>">
                                                                            <p class="post-user-text text-capitalize">
                                                                                <?php echo $mName; ?>
                                                                            </p>
                                                                            <p class="post-user-post text-capitalize">
                                                                                <?php if ($mDesignation) { ?>
                                                                                    <?php echo $mDesignation; ?>
                                                                                <?php } ?>
                                                                            </p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <?php if ($mWhoPosted == 0) { ?>
                                                                            <?php if ($mDesignation == "") { ?>
                                                                                <img style="margin-bottom: -18px" class="img-fluid post-mark-img-2" src="<?php echo base_url('assets/halaxa_dashboard/images/halaxa-mark-icon.png'); ?>" />
                                                                            <?php } else { ?>
                                                                                <img class="img-fluid post-mark-img" src="<?php echo base_url('assets/halaxa_dashboard/images/halaxa-mark-icon.png'); ?>" />
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                            <div class="col-md-5 text-right">
                                                                <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-time-icon.png'); ?>" />
                                                                <span class="post-time-text mr-3">
                                                                    <?php
                                                                    $date1 = date('Y-m-d h:i:s');
                                                                    $date2 = $mDate;
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
                                                                    ?>
                                                                    <?php echo $date; ?>
                                                                </span>
                                                                <?php if ($mWhoPosted == 0) { ?>
                                                                    <span>
                                                                        <a href="#" id="dropdownMenuButton" data-toggle="dropdown">
                                                                            <img class="img-fluid post-settings-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-settings-icon.png'); ?>" />
                                                                        </a>
                                                                        <div class="dropdown-menu anchor" aria-labelledby="dropdownMenuButton">
                                                                            <a class="dropdown-item" href="<?php echo base_url() ?>social/deletePost/<?php echo $mPostKey; ?>">Delete</a>
                                                                        </div>
                                                                    </span>
                                                                <?php } ?>
                                                            </div>
                                                            <?php if ($mContent) { ?>
                                                                <div class="col-md-12">
                                                                    <span class="post-message-text">
                                                                        <?php
                                                                        $text = $mContent;
                                                                        $url = '@(http)?(s)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
                                                                        $text = preg_replace($url, '<a href="http$2://$4" target="_blank" title="$0">$0</a>', $text);
                                                                        echo $text;
                                                                        ?> 
                                                                    </span>
                                                                </div>
                                                            <?php } ?>
                                                            <div class="col-md-12 mt-3">
                                                                <span class="post-attachment">
                                                                    <?php if ($val['cp_image']) { ?>
                                                                        <img class="img-fluid" src="<?php echo base_url(); ?>assets/posts/<?php echo $val['cp_image']; ?>" />
                                                                    <?php } ?>

                                                                    <?php if ($val['cp_video']) { ?>
                                                                        <video width="100%" controls>
                                                                            <source src="<?php echo base_url(); ?>assets/posts/<?php echo $val['cp_video']; ?>" >
                                                                            Your browser does not support the video tag.
                                                                        </video>
                                                                    <?php } ?>

                                                                    <?php if ($val['cp_link']) { ?>
                                                                        <iframe src="<?php echo base_url(); ?>assets/posts/<?php echo $val['cp_link']; ?>" width="100%" height="400"></iframe>
                                                                    <?php } ?>
                                                                </span>
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <div class="post-anchors">
                                                                    <?php if ($mLikeStatus['cpl_status'] == 0) { ?>
                                                                        <a href="<?php echo base_url() ?>communities/likePost/<?php echo $mPostKey; ?>" class="mr-2 no-decoration">
                                                                            <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-icon.png'); ?>" />
                                                                            <span class="post-anchors-text mr-3"><?php echo $mLikesCount; ?></span>
                                                                        </a>
                                                                    <?php } else { ?>
                                                                        <a href="<?php echo base_url() ?>communities/likePost/<?php echo $mPostKey; ?>" class="mr-2 no-decoration">
                                                                            <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-active-icon.png'); ?>" />
                                                                            <span class="post-anchors-text mr-3"><?php echo $mLikesCount; ?></span>
                                                                        </a>
                                                                    <?php } ?>

                                                                    <a class="mr-2 no-decoration" data-toggle="collapse" href="#commentsBlock_<?php echo $mPostKey; ?>" aria-expanded="false" aria-controls="collapseExample">
                                                                        <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-comment-icon.png'); ?>" />
                                                                        <span class="post-anchors-text mr-3"><?php echo $mCommentsCount; ?> comments</span>
                                                                    </a>
                                                                    <a href="#" class="mr-2 no-decoration">
                                                                        <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-share-icon.png'); ?>" />
                                                                        <span class="post-anchors-text mr-3">share</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="comments">
                                                        <div class="collapse post-comments border-top-post" id="commentsBlock_<?php echo $mPostKey; ?>">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="comment-box p-3">
                                                                        <form id="comment_form_<?php echo $mPostKey; ?>" method="POST" enctype="multipart/form-data" action="<?php echo base_url('communities/add_comment/' . $mPostKey); ?>">
                                                                            <div class="row">
                                                                                <div class="col-md-9">
                                                                                    <input required="" name="comment" type="text" class="form-control form-control-post-comment" />
                                                                                </div>
                                                                                <div class="col-md-3 text-left">
                                                                                    <a onclick="document.getElementById('comment_form_<?php echo $mPostKey; ?>').submit();" type="submit" href="#" class="no-decoration comment-button">Add Comment</a>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        <div class="user-comments">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="main-comment mt-3 border-bottom-post">
                                                                                        <?php if ($mComments != "") { ?>
                                                                                            <?php
                                                                                            $i = 0;
                                                                                            foreach ($mComments as $key => $com) {
                                                                                                $i++;
                                                                                                $mWhoCommented = $com['cc_posted_user_id'];
                                                                                                if ($mWhoCommented == 0) {
                                                                                                    $mName = $partner['Groupname'];
                                                                                                    $mPhotoCom = $this->session->userdata('picture');
                                                                                                    $mPhotoComUrl = base_url('uploads/') . $this->session->userdata('picture');
                                                                                                    $mDesignation = "Admin";
                                                                                                    $mDateCom = $com['cc_date_added'];
                                                                                                    $mContentCom = $com['cc_content'];
                                                                                                    $mPostKey = $val['cp_key'];
                                                                                                } else {
                                                                                                    $mGetUser = $this->users_model->get_user_by_id($mWhoCommented);
                                                                                                    $mName = $mGetUser->Name;
                                                                                                    $mPhotoCom = $mGetUser->Photo;
                                                                                                    $mPhotoComUrl = base_url('assets/photo/') . $mGetUser->Photo;
                                                                                                    $mDesignation = $mGetUser->Designation;
                                                                                                    $mDateCom = $com['cc_date_added'];
                                                                                                    $mContentCom = $com['cc_content'];
                                                                                                    $mPostKey = $val['cp_key'];
                                                                                                }

                                                                                                $mCommentStatus = $this->social_model->check_community_like_for_comments($com['cc_key'], $mSessionId);
                                                                                                $mCommentLikesCount = $this->social_model->getAllCommunityCommentsLikes($com['cc_key']);
                                                                                                if (!empty($mCommentLikesCount)) {
                                                                                                    $mCommentLikesCount = count($mCommentLikesCount);
                                                                                                } else {
                                                                                                    $mCommentLikesCount = 0;
                                                                                                }
                                                                                                ?>

                                                                                                <?php if ($i > 2) { ?>

                                                                                                <?php } else { ?>
                                                                                                    <p class="main-comment-text">
                                                                                                        <?php echo $mContentCom; ?>
                                                                                                    </p>
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-1">
                                                                                                            <?php if ($mPhotoCom) { ?>
                                                                                                                <img class="img-fluid rounded-circle" src="<?php echo $mPhotoComUrl; ?>" />
                                                                                                            <?php } else { ?>
                                                                                                                <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/images/user.png" />
                                                                                                            <?php } ?>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                            <ul class="list-inline">
                                                                                                                <li class="list-inline-item">
                                                                                                                    <a class="no-decoration" target="_blank" href="#">
                                                                                                                        <p class="post-user-text">
                                                                                                                            <?php echo $mName; ?>
                                                                                                                        </p>
                                                                                                                    </a>
                                                                                                                </li>
                                                                                                                <li class="list-inline-item">
                                                                                                                    <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-time-icon.png'); ?>" />
                                                                                                                    <span class="post-time-text mr-3">
                                                                                                                        <?php
                                                                                                                        $dateComment1 = date('Y-m-d h:i:s');
                                                                                                                        $dateComment2 = $mDateCom;
                                                                                                                        $seconds = strtotime($dateComment1) - strtotime($dateComment2);
                                                                                                                        $date = $seconds / 60 / 60;
                                                                                                                        if ($date > 0) {
                                                                                                                            $date = $date;
                                                                                                                        } else {
                                                                                                                            $date = "0";
                                                                                                                        }
                                                                                                                        $date = round($date) . " Hours ago";
                                                                                                                        if ($date > 24) {
                                                                                                                            $diff = strtotime($date1, 0) - strtotime($date2, 0);
                                                                                                                            $date = floor($diff / 604800) . " Weeks ago";
                                                                                                                        }
                                                                                                                        ?>
                                                                                                                        <?php echo $date; ?>
                                                                                                                    </span>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </div>
                                                                                                        <div class="col-md-5 text-right">
                                                                                                            <a href="<?php echo base_url() ?>communities/likeComment/<?php echo $com['cc_key']; ?>" class="mr-2 no-decoration">
                                                                                                                <?php if (empty($mCommentStatus)): ?>
                                                                                                                    <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-icon.png'); ?>" />
                                                                                                                <?php elseif ($mCommentStatus['ccl_status'] == 0): ?>
                                                                                                                    <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-icon.png'); ?>" />
                                                                                                                <?php else: ?>
                                                                                                                    <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-active-icon.png'); ?>" />
                                                                                                                <?php endif; ?>
                                                                                                                <span class="post-anchors-text mr-3"><?php echo $mCommentLikesCount; ?></span>
                                                                                                            </a>
                                                                                                            <!--                                                                                                            <a class="mr-2 no-decoration" href="#">
                                                                                                                                                                                                                            <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-comment-icon.png'); ?>" />
                                                                                                                                                                                                                            <span class="post-anchors-text mr-3">3 comments</span>
                                                                                                                                                                                                                        </a>-->
                                                                                                        </div>
                                                                                                    </div>
                                                                                                <?php } ?>
                                                                                            <?php }
                                                                                            ?>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <?php if (!empty($mComments)) { ?>
                                                                            <a class="no-decoration pt-3 load-more-comments"  data-toggle="collapse" href="#commentsMoreBlock_<?php echo $mPostKey; ?>" aria-expanded="false" aria-controls="collapseExample">Load More Comments</a>
                                                                            <div class="collapse post-comments" id="commentsMoreBlock_<?php echo $mPostKey; ?>">
                                                                                <div class="user-comments">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="main-comment mt-3 border-bottom-post">
                                                                                                <?php if ($mComments != "") { ?>
                                                                                                    <?php
                                                                                                    $i = 0;
                                                                                                    foreach ($mComments as $key => $com) {
                                                                                                        $i++;
                                                                                                        //print_r($com);
                                                                                                        $mWhoCommented = $com['cc_posted_user_id'];
                                                                                                        if ($mWhoCommented == 0) {
                                                                                                            $mName = $partner['Groupname'];
                                                                                                            $mPhotoCom = $this->session->userdata('picture');
                                                                                                            $mPhotoComUrl = base_url('uploads/') . $this->session->userdata('picture');
                                                                                                            $mDesignation = "Admin";
                                                                                                            $mDateCom = $com['cc_date_added'];
                                                                                                            $mContentCom = $com['cc_content'];
                                                                                                            $mPostKey = $val['cp_key'];
                                                                                                        } else {
                                                                                                            $mGetUser = $this->users_model->get_user_by_id($mWhoCommented);
                                                                                                            $mName = $mGetUser->Name;
                                                                                                            $mPhotoCom = $mGetUser->Photo;
                                                                                                            $mPhotoComUrl = base_url('assets/photo/') . $mGetUser->Photo;
                                                                                                            $mDesignation = $mGetUser->Designation;
                                                                                                            $mDateCom = $com['cc_date_added'];
                                                                                                            $mContentCom = $com['cc_content'];
                                                                                                            $mPostKey = $val['cp_key'];
                                                                                                        }
                                                                                                        $mCommentStatus = $this->social_model->check_community_like_for_comments($com['ccl_key'], $mSessionId);
                                                                                                        $mCommentLikesCount = $this->social_model->getAllCommunityCommentsLikes($com['ccl_key']);
                                                                                                        if (!empty($mCommentLikesCount)) {
                                                                                                            $mCommentLikesCount = count($mCommentLikesCount);
                                                                                                        } else {
                                                                                                            $mCommentLikesCount = 0;
                                                                                                        }
                                                                                                        ?>

                                                                                                        <?php if ($i > 2) { ?>
                                                                                                            <p class="main-comment-text">
                                                                                                                <?php echo $mContentCom; ?>
                                                                                                            </p>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-1">
                                                                                                                    <?php if ($mPhotoCom) { ?>
                                                                                                                        <img class="img-fluid rounded-circle" src="<?php echo $mPhotoComUrl; ?>" />
                                                                                                                    <?php } else { ?>
                                                                                                                        <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/images/user.png" />
                                                                                                                    <?php } ?>
                                                                                                                </div>
                                                                                                                <div class="col-md-6">
                                                                                                                    <ul class="list-inline">
                                                                                                                        <li class="list-inline-item">
                                                                                                                            <a class="no-decoration" target="_blank" href="#">
                                                                                                                                <p class="post-user-text">
                                                                                                                                    <?php echo $mName; ?>
                                                                                                                                </p>
                                                                                                                            </a>
                                                                                                                        </li>
                                                                                                                        <li class="list-inline-item">
                                                                                                                            <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-time-icon.png'); ?>" />
                                                                                                                            <span class="post-time-text mr-3">
                                                                                                                                <?php
                                                                                                                                $dateComment1 = date('Y-m-d h:i:s');
                                                                                                                                $dateComment2 = $mDateCom;
                                                                                                                                $seconds = strtotime($dateComment1) - strtotime($dateComment2);
                                                                                                                                $date = $seconds / 60 / 60;
                                                                                                                                if ($date > 0) {
                                                                                                                                    $date = $date;
                                                                                                                                } else {
                                                                                                                                    $date = "0";
                                                                                                                                }
                                                                                                                                $date = round($date) . " Hours ago";
                                                                                                                                if ($date > 24) {
                                                                                                                                    $diff = strtotime($date1, 0) - strtotime($date2, 0);
                                                                                                                                    $date = floor($diff / 604800) . " Weeks ago";
                                                                                                                                }
                                                                                                                                ?>
                                                                                                                                <?php echo $date; ?>
                                                                                                                            </span>
                                                                                                                        </li>
                                                                                                                    </ul>
                                                                                                                </div>
                                                                                                                <div class="col-md-5 text-right">
                                                                                                                    <a href="<?php echo base_url() ?>communities/likeComment/<?php echo $com['cc_key']; ?>" class="mr-2 no-decoration">
                                                                                                                        <?php if (empty($mCommentStatus)): ?>
                                                                                                                            <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-icon.png'); ?>" />
                                                                                                                        <?php elseif ($mCommentStatus['cpl_status'] == 0): ?>
                                                                                                                            <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-icon.png'); ?>" />
                                                                                                                        <?php else: ?>
                                                                                                                            <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-active-icon.png'); ?>" />
                                                                                                                        <?php endif; ?>
                                                                                                                        <span class="post-anchors-text mr-3"><?php echo $mCommentLikesCount; ?></span>
                                                                                                                    </a>
                                                                                                                    <!--                                                                                                                    <a class="mr-2 no-decoration" href="#">
                                                                                                                                                                                                                                <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-comment-icon.png'); ?>" />
                                                                                                                                                                                                                                <span class="post-anchors-text mr-3">3 comments</span>
                                                                                                                                                                                                                                </a>-->
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        <?php } ?>
                                                                                                    <?php }
                                                                                                    ?>
                                                                                                    <?php
                                                                                                }
                                                                                                ?>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php } ?>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="post-card-bottom p-3">
                                    <h6 class="partner-name">
                                        <?php echo $partner['Groupname']; ?>
                                    </h6>
                                    <p>
                                        <?php echo $partner['group_description']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Main -->

        <!-- jQuery  -->
        <?php $this->load->view('community/partials/scripts'); ?>

        <script>
            document.addEventListener("touchstart", function () {}, true);
            function empty_validate() {
                var a = document.getElementById('content').value;
                var b = document.getElementById('image').value;
                var c = document.getElementById('video').value;
                var d = document.getElementById('link').value;
                if ($('#content').val() || $('#image').val() || $('#video').val() || $('#link').val()) {
                    return true;
                } else {
                    alert("Empty Post cannot be posted.");
                    return false;
                }
            }

        </script>
        <script>
            function addId(id) {
                var id = id
                alert(id);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('controller/function'); ?>",
                    data: {id: id},
                    cache: false,
                    async: false,
                    success: function (result) {
                        console.log(result);
                    }
                });
            }
        </script>
        <script>
            // Type change event
            $('#filterby').change(function () {
                $.post("<?php echo base_url('buyer/search/getFilterResults/'); ?>",
                        {
                            filter: this.value,
                        },
                        function (data, status) {
                            $('#products').html(data);
                        });
            });
        </script>
        <script>
            var imgbth = document.getElementById('output-img-both');
            imgbth.style.display = 'none';

            var videobth = document.getElementById('videoPreview-both');
            videobth.style.display = 'none';

            var loadFileBoth = function (event) {
                var output = document.getElementById('output-img-both');
                output.style.display = 'inline';
                output.src = URL.createObjectURL(event.target.files[0]);
                document.getElementById("video").disabled = true;
            };

            $(document).on("change", ".file_multi_video", function (evt) {
                var video = document.getElementById('videoPreview-both');
                video.style.display = 'inline';
                var $source = $('#video_here_both');
                $source[0].src = URL.createObjectURL(this.files[0]);
                $source.parent()[0].load();
                document.getElementById("image").disabled = true;
            });
        </script>
        <script>
            $("#cancelImage").click(function () {
                $('#image').val('');
                $('#output-img-both').attr("src", "https://via.placeholder.com/150");
                $('#video').val('');
                $("#videoPreview-both").attr("src", "videos/Funny Cats.mp4");
            });
            $("#cancelVideo").click(function () {
                $('#video').val('');
                $("#videoPreview").attr("src", "videos/Funny Cats.mp4");
            });
            $("#cancelLink").click(function () {
                $('#link').val('');
            });
            $("#linkClose").click(function () {
                $('#link').val('');
                $('#myModalLink').modal('hide');
            });
        </script>
        <script type="text/javascript">
            $('#content').on('change', function () {
                // Change occurred so count chars...
                var comment = $.trim($("#content").val());
                $("#content_image").text(comment);
                $("#content_video").text(comment);
                $("#content_link").text(comment);
            });
        </script>
    </body>

</html>