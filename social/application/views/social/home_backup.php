<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('social/halaxa_partials/header'); ?>

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('social/halaxa_partials/navbar'); ?>

            <div class="wrapper">
                <!-- Sidebar -->
                <?php $this->load->view('social/halaxa_partials/sidebar'); ?>

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-7 scrolling-div-y-feed">
                                <div class="theme-card mb-3">
                                    <?php if ($Hidden_User_Id != 0) { ?>

                                        <div class="row">
                                            <div class="col-md-8 border-right-post">
                                                <div class="post-card p-4">
                                                    <img class="img-fluid start-post-img" src="<?php echo base_url('assets/halaxa_dashboard/images/write-icon.png'); ?>" />
                                                    <span class="start-post-text ml-1">Start a post</span>
                                                </div>
                                            </div>

                                            <div class="col-md-2 border-right-post">
                                                <input hidden="hidden" name="Hidden_User_Id" value="<?php echo $Hidden_User_Id; ?>" />
                                                <div class="post-card p-4 text-center">
                                                    <a href="#" data-toggle="modal" data-target="#myModalBoth">
                                                        <img class="img-fluid start-post-img-picture" src="<?php echo base_url('assets/halaxa_dashboard/images/picture-icon.png'); ?>" />
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <input hidden="hidden" name="Hidden_User_Id" value="<?php echo $Hidden_User_Id; ?>" />
                                                <div class="post-card p-4 text-center">
                                                    <a href="#" data-toggle="modal" data-target="#myModalBoth">
                                                        <img class="img-fluid start-post-img-video" src="<?php echo base_url('assets/halaxa_dashboard/images/video-icon.png'); ?>" />
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <form method="POST" action="<?php echo base_url('social/add_posts'); ?>" enctype="multipart/form-data">
                                            <input hidden="hidden" name="Hidden_User_Id" value="<?php echo $Hidden_User_Id; ?>" />

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="post-card-bottom p-3">
    <!--                                                    <input placeholder="Write a post on Halaxa" required="" name="content" class="form-control comment-form"/>
                                                        <input type="submit" hidden="" />-->
                                                        <a href="#" data-toggle="modal" data-target="#myModalBoth">
                                                            <span class="write-a-post">Write a post </span>
                                                            <span class="write-name">on Halaxa</span>
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
                                    <div class="col-md-12" id="posts">
                                        <?php
                                        if ($posts) {
                                            $mSessionUserId = $this->session->userdata('User_Id');
                                            foreach ($posts as $val) {
                                                $status = $this->social_model->check_like($val->P_ID, $mSessionUserId);
                                                $comments = $this->social_model->get_comments($val->P_ID);
                                                if (!empty($comments)) {
                                                    $mCountComments = count($comments);
                                                } else {
                                                    $mCountComments = "0";
                                                }
                                                ?>
                                                <div class="theme-card mb-3">
                                                    <?php if (!empty($comments)) { ?>
                                                        <div class="posts-header pt-2 pb-2 pl-3 border-bottom-post">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <a href="#" class="mr-2 no-decoration">
                                                                        <img class="img-fluid post-time-img-sm" src="<?php echo base_url('assets/halaxa_dashboard/images/post-comment-icon.png'); ?>" />
                                                                        <span class="post-status-text">commented by </span>
                                                                        <span class="post-status-text-by">
                                                                            <?php echo $comments[0]['Username']; ?>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="posts p-3">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <a href="<?php echo base_url(); ?>profile/index/<?php echo $val->Posted_User_Id; ?>"> 
                                                                    <?php
                                                                    $mProImg = base_url('assets/photo/') . $val->Photo;
                                                                    if (file_exists($mProImg)) {
                                                                        ?>
                                                                        <img src="<?php echo base_url(); ?>assets/photo/<?php echo $val->Photo; ?>" class="img-fluid rounded-circle" alt="Avatar">
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
                                                                                <?php echo $val->Name; ?>
                                                                            </p>
                                                                            <p class="post-user-post text-capitalize">
                                                                                <?php if ($val->Designation) { ?>
                                                                                    <?php echo $val->Designation; ?>
                                                                                <?php } ?>
                                                                            </p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <?php if ($val->Partner_type) { ?>
                                                                            <?php if ($val->Designation == "") { ?>
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
                                                                    ?>
                                                                    <?php echo $date; ?>
                                                                </span>
                                                                <?php if ($mSessionUserId == $val->Posted_User_Id) { ?>
                                                                    <span>
                                                                        <a href="#" id="dropdownMenuButton" data-toggle="dropdown">
                                                                            <img class="img-fluid post-settings-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-settings-icon.png'); ?>" />
                                                                        </a>
                                                                        <div class="dropdown-menu anchor" aria-labelledby="dropdownMenuButton">
                                                                            <a class="dropdown-item" href="<?php echo base_url() ?>social/deletePost/<?php echo $val->P_ID; ?>">Delete</a>
                                                                        </div>
                                                                    </span>
                                                                <?php } ?>
                                                            </div>
                                                            <?php if ($val->Content) { ?>
                                                                <div class="col-md-12">
                                                                    <span class="post-message-text">
                                                                        <?php
                                                                        $text = $val->Content;

                                                                        $url = '@(http)?(s)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
                                                                        $text = preg_replace($url, '<a href="http$2://$4" target="_blank" title="$0">$0</a>', $text);
                                                                        echo $text;
                                                                        ?> 
                                                                    </span>
                                                                </div>
                                                            <?php } ?>
                                                            <div class="col-md-12 mt-3">
                                                                <span class="post-attachment">
                                                                    <?php if ($val->Image) { ?>
                                                                        <img class="img-fluid" src="<?php echo base_url(); ?>assets/posts/<?php echo $val->Image; ?>" />
                                                                    <?php } ?>

                                                                    <?php if ($val->Video) { ?>
                                                                        <video width="100%" controls>
                                                                            <source src="<?php echo base_url(); ?>assets/posts/<?php echo $val->Video; ?>" >
                                                                            Your browser does not support the video tag.
                                                                        </video>
                                                                    <?php } ?>

                                                                    <?php if ($val->Music) { ?>
                                                                        <audio controls>
                                                                            <source src="<?php echo base_url(); ?>assets/posts/<?php echo $val->Music; ?>" >
                                                                            Your browser does not support the audio tag.
                                                                        </audio>
                                                                    <?php } ?>

                                                                    <?php if ($val->Link) { ?>
                                                                        <iframe src="<?php echo base_url(); ?>assets/posts/<?php echo $val->Link; ?>" width="100%" height="400"></iframe>
                                                                    <?php } ?>
                                                                </span>
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <div class="post-anchors">
                                                                    <?php if ($status[0]['status'] == "") { ?>
                                                                        <a href="<?php echo base_url() ?>social/likePost/<?php echo $val->P_ID; ?>" class="mr-2 no-decoration">
                                                                            <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-icon.png'); ?>" />
                                                                            <span class="post-anchors-text mr-3"><?php echo $val->count; ?></span>
                                                                        </a>
                                                                    <?php } elseif ($status[0]['status'] == "0") { ?>
                                                                        <a href="<?php echo base_url() ?>social/likePost/<?php echo $val->P_ID; ?>" class="mr-2 no-decoration">
                                                                            <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-icon.png'); ?>" />
                                                                            <span class="post-anchors-text mr-3"><?php echo $val->count; ?></span>
                                                                        </a>
                                                                    <?php } else { ?>
                                                                        <a href="<?php echo base_url() ?>social/likePost/<?php echo $val->P_ID; ?>" class="mr-2 no-decoration">
                                                                            <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-active-icon.png'); ?>" />
                                                                            <span class="post-anchors-text mr-3"><?php echo $val->count; ?></span>
                                                                        </a>
                                                                    <?php } ?>

                                                                    <a class="mr-2 no-decoration" data-toggle="collapse" href="#commentsBlock_<?php echo $val->P_ID; ?>" aria-expanded="false" aria-controls="collapseExample">
                                                                        <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-comment-icon.png'); ?>" />
                                                                        <span class="post-anchors-text mr-3"><?php echo $mCountComments; ?> comments</span>
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
                                                        <div class="collapse post-comments border-top-post" id="commentsBlock_<?php echo $val->P_ID; ?>">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="comment-box p-3">
                                                                        <form id="comment_form_<?php echo $val->P_ID; ?>" method="POST" enctype="multipart/form-data" action="<?php echo base_url() ?>social/add_comment/<?php echo $val->P_ID; ?>">  
                                                                            <div class="row">
                                                                                <div class="col-md-9">
                                                                                    <input required="" name="comment" type="text" class="form-control form-control-post-comment" />
                                                                                </div>
                                                                                <div class="col-md-3 text-left">
                                                                                    <a onclick="document.getElementById('comment_form_<?php echo $val->P_ID; ?>').submit();" type="submit" href="#" class="no-decoration comment-button">Add Comment</a>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        <div class="user-comments">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="main-comment mt-3 border-bottom-post">
                                                                                        <?php if ($comments != "") { ?>
                                                                                            <?php
                                                                                            $i = 0;
                                                                                            foreach ($comments as $key => $com) {
                                                                                                $i++;
                                                                                                //print_r($com);
                                                                                                $mCommentStatus = $this->social_model->check_like_for_comments($com['C_Id'], $mSessionUserId);
                                                                                                $replies = $this->social_model->get_replies($com['C_Id']);
                                                                                                ?>

                                                                                                <?php if ($i > 2) { ?>

                                                                                                <?php } else { ?>
                                                                                                    <p class="main-comment-text">
                                                                                                        <?php echo $com['Content']; ?>
                                                                                                    </p>
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-1">
                                                                                                            <?php if ($com['Photo']) { ?>
                                                                                                                <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/photo/<?php echo $com['Photo']; ?>" />
                                                                                                            <?php } else { ?>
                                                                                                                <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/images/user.png" />
                                                                                                            <?php } ?>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                            <ul class="list-inline">
                                                                                                                <li class="list-inline-item">
                                                                                                                    <a class="no-decoration" target="_blank" href="#">
                                                                                                                        <p class="post-user-text">
                                                                                                                            <?php echo $com['Username']; ?>
                                                                                                                        </p>
                                                                                                                    </a>
                                                                                                                </li>
                                                                                                                <li class="list-inline-item">
                                                                                                                    <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-time-icon.png'); ?>" />
                                                                                                                    <span class="post-time-text mr-3">
                                                                                                                        <?php
                                                                                                                        $dateComment1 = date('Y-m-d h:i:s');
                                                                                                                        $dateComment2 = $com['Date_Created'];
                                                                                                                        $seconds = strtotime($dateComment1) - strtotime($dateComment2);
                                                                                                                        $date = $seconds / 60 / 60;
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
                                                                                                            <a href="<?php echo base_url() ?>social/likeComment/<?php echo $com['C_Id']; ?>" class="mr-2 no-decoration">
                                                                                                                <?php if ($mCommentStatus[0]['Status'] == ""): ?>
                                                                                                                    <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-icon.png'); ?>" />
                                                                                                                <?php elseif ($mCommentStatus[0]['Status'] == "0"): ?>
                                                                                                                    <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-icon.png'); ?>" />
                                                                                                                <?php else: ?>
                                                                                                                    <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-active-icon.png'); ?>" />
                                                                                                                <?php endif; ?>
                                                                                                                <span class="post-anchors-text mr-3"><?php echo $com['comment_likes_count']; ?></span>
                                                                                                            </a>
                                                                                                            <!--                                                                                                            <a class="mr-2 no-decoration" href="#">
                                                                                                                                                                                                                            <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-comment-icon.png'); ?>" />
                                                                                                                                                                                                                            <span class="post-anchors-text mr-3">3 comments</span>
                                                                                                                                                                                                                        </a>-->
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <?php if (!empty($replies)) { ?>
                                                                                                        <?php
                                                                                                        foreach ($replies as $reply) {
                                                                                                            //print_r($reply);
                                                                                                            ?>
                                                                                                            <div class="sub-comment border-top-post pt-3">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-1">
                                                                                                                        <img class="img-fluid sub-comment-img mt-4" src="<?php echo base_url('assets/halaxa_dashboard/images/arrow-top-icon.png'); ?>" />
                                                                                                                    </div>
                                                                                                                    <div class="col-md-11">
                                                                                                                        <p class="main-comment-text">
                                                                                                                            <?php echo $reply['reply_comment']; ?>
                                                                                                                        </p>
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-1">
                                                                                                                                <?php if ($reply['Photo']) { ?>
                                                                                                                                    <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/photo/<?php echo $reply['Photo']; ?>" />
                                                                                                                                <?php } else { ?>
                                                                                                                                    <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/images/user.png" />
                                                                                                                                <?php } ?>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-11">
                                                                                                                                <ul class="list-inline">
                                                                                                                                    <li class="list-inline-item">
                                                                                                                                        <a class="no-decoration" target="_blank" href="#">
                                                                                                                                            <p class="post-user-text">
                                                                                                                                                <?php echo $reply['Username']; ?>
                                                                                                                                            </p>
                                                                                                                                        </a>
                                                                                                                                    </li>
                                                                                                                                    <li class="list-inline-item">
                                                                                                                                        <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-time-icon.png'); ?>" />
                                                                                                                                        <span class="post-time-text mr-3">
                                                                                                                                            <?php
                                                                                                                                            $dateReply1 = date('Y-m-d h:i:s');
                                                                                                                                            $dateReply2 = $reply['reply_date_added'];
                                                                                                                                            $seconds = strtotime($dateReply1) - strtotime($dateReply2);
                                                                                                                                            $date = $seconds / 60 / 60;
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
                                                                                                                            <!--                                                                                                                        <div class="col-md-5 text-right">
                                                                                                                                                                                                                                    <a href="#" class="mr-2 no-decoration">
                                                                                                                                                                                                                                    <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-icon.png'); ?>" />
                                                                                                                                                                                                                                    <span class="post-anchors-text mr-3">500</span>
                                                                                                                                                                                                                                    </a>
                                                                                                                                                                                                                                    <a class="mr-2 no-decoration" href="#">
                                                                                                                                                                                                                                    <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-comment-icon.png'); ?>" />
                                                                                                                                                                                                                                    <span class="post-anchors-text mr-3">3 comments</span>
                                                                                                                                                                                                                                    </a>
                                                                                                                                                                                                                                    </div>-->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        <?php } ?>
                                                                                                    <?php } ?>
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

                                                                        <?php if (!empty($comments)) { ?>
                                                                            <a class="no-decoration pt-3 load-more-comments"  data-toggle="collapse" href="#commentsMoreBlock_<?php echo $val->P_ID; ?>" aria-expanded="false" aria-controls="collapseExample">Load More Comments</a>
                                                                            <div class="collapse post-comments" id="commentsMoreBlock_<?php echo $val->P_ID; ?>">
                                                                                <div class="user-comments">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="main-comment mt-3 border-bottom-post">
                                                                                                <?php if ($comments != "") { ?>
                                                                                                    <?php
                                                                                                    $i = 0;
                                                                                                    foreach ($comments as $key => $com) {
                                                                                                        $i++;
                                                                                                        //print_r($com);
                                                                                                        $mCommentStatus = $this->social_model->check_like_for_comments($com['C_Id'], $mSessionUserId);
                                                                                                        $replies = $this->social_model->get_replies($com['C_Id']);
                                                                                                        ?>

                                                                                                        <?php if ($i > 2) { ?>
                                                                                                            <p class="main-comment-text">
                                                                                                                <?php echo $com['Content']; ?>
                                                                                                            </p>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-1">
                                                                                                                    <?php if ($com['Photo']) { ?>
                                                                                                                        <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/photo/<?php echo $com['Photo']; ?>" />
                                                                                                                    <?php } else { ?>
                                                                                                                        <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/images/user.png" />
                                                                                                                    <?php } ?>
                                                                                                                </div>
                                                                                                                <div class="col-md-6">
                                                                                                                    <ul class="list-inline">
                                                                                                                        <li class="list-inline-item">
                                                                                                                            <a class="no-decoration" target="_blank" href="#">
                                                                                                                                <p class="post-user-text">
                                                                                                                                    <?php echo $com['Username']; ?>
                                                                                                                                </p>
                                                                                                                            </a>
                                                                                                                        </li>
                                                                                                                        <li class="list-inline-item">
                                                                                                                            <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-time-icon.png'); ?>" />
                                                                                                                            <span class="post-time-text mr-3">
                                                                                                                                <?php
                                                                                                                                $dateComment1 = date('Y-m-d h:i:s');
                                                                                                                                $dateComment2 = $com['Date_Created'];
                                                                                                                                $seconds = strtotime($dateComment1) - strtotime($dateComment2);
                                                                                                                                $date = $seconds / 60 / 60;
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
                                                                                                                    <a id="post_like_" href="<?php echo base_url() ?>social/likeComment/<?php echo $com['C_Id']; ?>" class="mr-2 no-decoration">
                                                                                                                        <?php if ($mCommentStatus[0]['Status'] == ""): ?>
                                                                                                                            <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-icon.png'); ?>" />
                                                                                                                        <?php elseif ($mCommentStatus[0]['Status'] == "0"): ?>
                                                                                                                            <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-icon.png'); ?>" />
                                                                                                                        <?php else: ?>
                                                                                                                            <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-active-icon.png'); ?>" />
                                                                                                                        <?php endif; ?>
                                                                                                                        <span class="post-anchors-text mr-3"><?php echo $com['comment_likes_count']; ?></span>
                                                                                                                    </a>
                                                                                                                    <a class="mr-2 no-decoration" href="#">
                                                                                                                        <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-comment-icon.png'); ?>" />
                                                                                                                        <span class="post-anchors-text mr-3">3 comments</span>
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <?php if (!empty($replies)) { ?>
                                                                                                                <?php
                                                                                                                foreach ($replies as $reply) {
                                                                                                                    //print_r($reply);
                                                                                                                    ?>
                                                                                                                    <div class="sub-comment border-top-post pt-3">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-1">
                                                                                                                                <img class="img-fluid sub-comment-img mt-4" src="<?php echo base_url('assets/halaxa_dashboard/images/arrow-top-icon.png'); ?>" />
                                                                                                                            </div>
                                                                                                                            <div class="col-md-11">
                                                                                                                                <p class="main-comment-text">
                                                                                                                                    <?php echo $reply['reply_comment']; ?>
                                                                                                                                </p>
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-md-1">
                                                                                                                                        <?php if ($reply['Photo']) { ?>
                                                                                                                                            <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/photo/<?php echo $reply['Photo']; ?>" />
                                                                                                                                        <?php } else { ?>
                                                                                                                                            <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/images/user.png" />
                                                                                                                                        <?php } ?>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-md-11">
                                                                                                                                        <ul class="list-inline">
                                                                                                                                            <li class="list-inline-item">
                                                                                                                                                <a class="no-decoration" target="_blank" href="#">
                                                                                                                                                    <p class="post-user-text">
                                                                                                                                                        <?php echo $reply['Username']; ?>
                                                                                                                                                    </p>
                                                                                                                                                </a>
                                                                                                                                            </li>
                                                                                                                                            <li class="list-inline-item">
                                                                                                                                                <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-time-icon.png'); ?>" />
                                                                                                                                                <span class="post-time-text mr-3">
                                                                                                                                                    <?php
                                                                                                                                                    $dateReply1 = date('Y-m-d h:i:s');
                                                                                                                                                    $dateReply2 = $reply['reply_date_added'];
                                                                                                                                                    $seconds = strtotime($dateReply1) - strtotime($dateReply2);
                                                                                                                                                    $date = $seconds / 60 / 60;
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
                                                                                                                                    <!--                                                                                                                        <div class="col-md-5 text-right">
                                                                                                                                                                                                                                        <a href="#" class="mr-2 no-decoration">
                                                                                                                                                                                                                                        <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-heart-icon.png'); ?>" />
                                                                                                                                                                                                                                        <span class="post-anchors-text mr-3">500</span>
                                                                                                                                                                                                                                        </a>
                                                                                                                                                                                                                                        <a class="mr-2 no-decoration" href="#">
                                                                                                                                                                                                                                        <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-comment-icon.png'); ?>" />
                                                                                                                                                                                                                                        <span class="post-anchors-text mr-3">3 comments</span>
                                                                                                                                                                                                                                        </a>
                                                                                                                                                                                                                                        </div>-->
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                <?php } ?>
                                                                                                            <?php } ?>
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
                            <div class="col-md-4">
                                <div class="theme-card p-3 mb-3">
                                    <h6 class="filter-header">
                                        <span class="mr-2">
                                            <img height="18" src="<?php echo base_url('assets/halaxa_dashboard/images/profile-icon.png'); ?>" />
                                        </span>
                                        Communitites
                                    </h6>

                                    <ul class="list-group mt-3">
                                        <?php
                                        foreach ($myComs as $key => $value) {
                                            //print_r($value);
                                            $mMembers = $this->association_model->getAllCommunitiesMembersForDash($value['Com_key']);
                                            if (!empty($mMembers)) {
                                                $mMembers = count($mMembers);
                                            } else {
                                                $mMembers = "0";
                                            }
                                            ?>
                                            <li class="list-group-item theme-list-group">
                                                <div class="row pt-2">
                                                    <div class="col-md-7">
                                                        <p><?php echo $value['Groupname']; ?></p>
                                                    </div>
                                                    <div class="col-md-5 text-center">
                                                        <span class="badge badge-light text-center"><?php echo $mMembers; ?></span>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>

                                </div>

                                <div class="theme-card p-3 mb-3">
                                    <h6 class="filter-header">
                                        Posts by partners
                                    </h6>

                                    <ul class="list-group mt-3">
                                        <?php
                                        foreach ($myComs as $key => $value) {
                                            $mPostsComs = $this->association_model->getAllCommunitiesPostsForDash($value['Com_key']);
                                            if (!empty($mPostsComs)) {
                                                $mPostsComs = count($mPostsComs);
                                            } else {
                                                $mPostsComs = "0";
                                            }
                                            ?>
                                            <li class="list-group-item theme-list-group">
                                                <div class="row pt-2">
                                                    <div class="col-md-7">
                                                        <p><?php echo $value['Groupname']; ?></p>
                                                    </div>
                                                    <div class="col-md-5 text-center">
                                                        <span class="badge badge-light text-center"><?php echo $mPostsComs; ?></span>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>

                                </div>

                                <div class="theme-card p-3 mb-3">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h6 class="filter-header">
                                                You may know
                                            </h6>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="post-user-text" href="<?php echo base_url('social/networkSearch'); ?>">See All</a>
                                        </div>
                                    </div>


                                    <hr class="hr-theme">

                                    <?php
                                    foreach ($userstoconnect as $key => $value) {
                                        //print_r($value);
                                        ?>
                                        <div class="row pt-2">
                                            <div class="col-md-7">
                                                <p><?php echo $value->Name; ?></p>
                                            </div>
                                            <div class="col-md-5 text-center">
                                                <a class="btn btn-sm btn-light" href="<?php echo base_url('social/request/Connected/') . $value->User_Id; ?>">Follow</a>
                                            </div>
                                        </div>
                                        <hr class="hr-theme">
                                    <?php } ?>

                                </div>

                                <div class="theme-card p-3 mb-3">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h6 class="filter-header">
                                                Explore Communities
                                            </h6>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="post-user-text" href="<?php echo base_url('communities/find'); ?>">See All</a>
                                        </div>
                                    </div>


                                    <hr class="hr-theme">

                                    <div class="row">
                                        <?php
                                        foreach ($all as $key => $one) {
                                            //print_r($value);
                                            $mUserId = $this->session->userdata('User_Id');
                                            //$memberData = $this->users_model->get_user_by_id('User_Id');
                                            $request = $this->association_model->checkRequest($mUserId, $one['Com_key']);
                                            $status = $request['Request_status'];
                                            $reject = $request['reject_by_user'];
                                            $members = $this->association_model->getAllMembers($one['Com_key']);
                                            $approve = $request['approval'];
                                            ?>
                                            <?php if (empty($request)) { ?>
                                                <div class="col-md-12">
                                                    <div class="card community-card-dash" style="border: 1px solid #efefef">
                                                        <div class="card-content">
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <img class="img-fluid" src="<?php echo base_url(); ?>uploads/<?php echo $one['Photo']; ?>" />
                                                                </div>
                                                                <div class="col-md-7 no-padding">

                                                                    <div class="row">
                                                                        <div class="col-md-7">
                                                                            <p class="community-partner-name">Lorem</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-5 mt-2">
                                                                            <?php if (!empty($members)) { ?>
                                                                                <?php
                                                                                $i = 1;
                                                                                foreach (array_slice($members, 0, 2) as $member) {
                                                                                    $memberData = $this->users_model->get_user_by_id($member['User_Id']);
                                                                                    $memberPicture = base_url('assets/photo/') . $memberData->Photo;
                                                                                    if (@getimagesize($memberPicture)) {
                                                                                        $memberPicture = $memberPicture;
                                                                                    } else {
                                                                                        $memberPicture = base_url('assets/images/user.png');
                                                                                    }
                                                                                    ?>
                                                                                    <a target="_blank" href="<?php echo base_url('profile/index/') . $member['User_Id']; ?>">
                                                                                        <img style="height: 15px" class="rounded-circle" src="<?php echo $memberPicture; ?>" />
                                                                                    </a>
                                                                                <?php }
                                                                                ?>
                                                                            <?php } ?>
                                                                        </div>
                                                                        <div class="col-md-5 mb-2 mr-2">
                                                                            <?php if ($reject == "-1") { ?>
                                                                                <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                            <?php } else { ?>
                                                                                <?php if ($request == "") {
                                                                                    ?>
                                                                                    <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                <?php } else { ?>
                                                                                    <?php if ($approve == "1") {
                                                                                        ?>
                                                                                        <a href="#" class="btn btn-community btn-block">Following</a>
                                                                                    <?php } else if ($status == "1") {
                                                                                        ?>
                                                                                        <!--                                                                                            <a href="#" class="btn btn-default btn-block btn-sm">Requested</a>-->
                                                                                    <?php } else {
                                                                                        ?>
                                                                                        <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                    <?php } ?>
                                                                                <?php } ?> 
                                                                                <?php if ($reject == "1") {
                                                                                    ?>
                                                                                    <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                <?php } else {
                                                                                    ?>
                    <!--                                                                                        <a href="<?php echo base_url() . "communities/notinterested/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-block btn-danger btn-sm">Not Interested</a>-->
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                        <?php } ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main -->

        <!-- jQuery  -->
        <?php $this->load->view('social/halaxa_partials/scripts'); ?>

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

            function likePost(element) {
                alert(element);
            }
        </script>
    </body>

</html>