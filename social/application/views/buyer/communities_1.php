<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('buyer/partials/assets-head') ?>
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('social/partials/left-nav'); ?>    
                <!-- top navigation -->
                <?php $this->load->view('social/partials/top-nav'); ?>
                <!-- /top navigation --> 
            </div>
            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <div class="row">
                                    <?php
                                    $result = $this->session->flashdata('result');
                                    if ($result == NULL) {
                                        $hidealert = "hide";
                                    } else {
                                        $showalert = $result;
                                        $hidealert = "";
                                    }
                                    ?>
                                    <div class="alert alert-success <?php echo $hidealert ?>">
                                        <?php echo $showalert ?>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="border-dark" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Join Communities</a> </li>
                                                <!--                                                <li role="presentation" class=""><a href="#tab_content3" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Conversations</a> </li>-->
                                                <li role="presentation" class=""><a href="#tab_content2" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">My Communities</a> </li>
                                            </ul>
                                            <div id="myTabContent" class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab" style="min-height: 500px">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <?php
                                                            $i = 1;
                                                            foreach ($all as $one) {
                                                                $mUserId = $this->session->userdata('User_Id');
                                                                //$memberData = $this->users_model->get_user_by_id('User_Id');
                                                                $request = $this->association_model->checkRequest($mUserId, $one['Com_key']);
                                                                $status = $request['Request_status'];
                                                                $reject = $request['reject_by_user'];
                                                                $members = $this->association_model->getAllMembers($one['Com_key']);
                                                                $approve = $request['approval'];
                                                                if ($reject == "1") {
                                                                    $hideDiv = "hide";
                                                                } else {
                                                                    $hideDiv = "";
                                                                }
                                                                ?>
                                                                <div class="<?php echo $hideDiv; ?>">

                                                                    <div class="row">
                                                                        <div class="col-md-1">
                                                                            <a href="#">
                                                                                <img class="img-responsive img-thumbnail img-circle" src="<?php echo base_url(); ?>uploads/<?php echo $one['Photo']; ?>" width="100%"/>
                                                                            </a>
                                                                        </div> 
                                                                        <div class="col-md-11">
                                                                            <h4><b><?php echo $one['Groupname']; ?> (<?php echo $one['Username']; ?>)</b></h4>
                                                                            <?php
                                                                            $memberCount = count($members);
                                                                            if ($memberCount == 1) {
                                                                                $countMenber = "Member";
                                                                            } else {
                                                                                $countMenber = "Members";
                                                                            }
                                                                            ?>
    <!--                                                                            <p>
                                                                            <?php
                                                                            if (!empty($members)) {
                                                                                echo count($members);
                                                                            } else {
                                                                                echo "0";
                                                                            }
                                                                            ?>
                                                                            <?php echo $countMenber; ?>
                                                                            </p> -->
                                                                            <p><?php echo $one['group_description']; ?></p>
                                                                            <div class="row">
                                                                                <div class="col-md-8">
                                                                                    <p>You know 
                                                                                        <?php
                                                                                        if (!empty($members)) {
                                                                                            echo count($members);
                                                                                        } else {
                                                                                            echo "0";
                                                                                        }
                                                                                        ?>
                                                                                        <?php echo $countMenber; ?> in this group
                                                                                    </p> 
                                                                                    <?php
                                                                                    $i = 1;
                                                                                    foreach (array_slice($members, 0, 4) as $member) {
                                                                                        $memberData = $this->users_model->get_user_by_id($member['User_Id']);
                                                                                        $memberPicture = base_url('assets/photo/') . $memberData->Photo;
                                                                                        if (@getimagesize($memberPicture)) {
                                                                                            $memberPicture = $memberPicture;
                                                                                        } else {
                                                                                            $memberPicture = base_url('assets/images/user.png');
                                                                                        }
                                                                                        ?>
                                                                                        <a target="_blank" href="<?php echo base_url('profile/index/') . $member['User_Id']; ?>">
                                                                                            <img src="<?php echo $memberPicture; ?>" class="avatar-circle"/>
                                                                                        </a>
                                                                                    <?php }
                                                                                    ?>
                                                                                </div>

                                                                                <?php if ($reject == "-1") { ?>
                                                                                    <div class="col-md-2">
                                                                                        <br>
                                                                                        <a href="#" class="btn btn-danger btn-sm btn-block">You blocked interest</a>
                                                                                    </div> 
                                                                                    <div class="col-md-2">
                                                                                        <br>
                                                                                        <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-block btn-dark btn-sm">Follow</a> 
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="col-md-2">
                                                                                        <br>
                                                                                        <?php if ($request == "") {
                                                                                            ?>
                                                                                            <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-block btn-dark btn-sm">Follow</a> 
                                                                                        <?php } else { ?>
                                                                                            <?php if ($approve == "1") {
                                                                                                ?>
                                                                                                <a href="#" class="btn btn-dark btn-block btn-sm">Following</a>
                                                                                            <?php } else if ($status == "1") {
                                                                                                ?>
                                                                                                <a href="#" class="btn btn-default btn-block btn-sm">Requested</a>
                                                                                            <?php } else {
                                                                                                ?>
                                                                                                <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-block btn-dark btn-sm">Follow</a> 
                                                                                            <?php } ?>
                                                                                        <?php } ?> 

                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <br>
                                                                                        <?php if ($reject == "1") {
                                                                                            ?>
                                                                                            <a href="#" class="btn btn-danger btn-sm btn-block">Rejected</a> 
                                                                                        <?php } else {
                                                                                            ?>
                                                                                            <a href="<?php echo base_url() . "communities/notinterested/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-block btn-danger btn-sm">Not Interested</a>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            <?php }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab" style="min-height: 500px">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <?php
                                                            if (!empty($myComs)) {
                                                                //print_r($myComs);
                                                                ?>
                                                                <?php
                                                                $i = 1;
                                                                foreach ($myComs as $my) {
                                                                    $community = $this->association_model->getCommunity($my['Com_key']);
                                                                    $members = $this->association_model->getAllMembers($my['Com_key']);
                                                                    $photo = $community['Photo'];
                                                                    $user = $community['Groupname'];
                                                                    $feeds = $this->association_model->getAllConversationsByPartnerid($my['Com_key']);
                                                                    $photo = base_url('uploads/') . $community['Photo'];
                                                                    if (@getimagesize($photo)) {
                                                                        $photo = $photo;
                                                                    } else {
                                                                        $photo = base_url('assets/images/user.png');
                                                                    }
                                                                    ?>
                                                                    <div class="">
                                                                        <div class="row">
                                                                            <div class="col-md-1">
                                                                                <a target="_blank" href="<?php echo base_url('communities/viewProfile/'); ?><?php echo $my['Com_key'] ?>/<?php echo $community['Partner_type'] ?>">
                                                                                    <img class="img-responsive img-thumbnail img-rounded" src="<?php echo $photo; ?>" width="100%"/> 
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-md-11">
                                                                                <h4><a target="_blank" href="<?php echo base_url('communities/viewProfile/'); ?><?php echo $my['Com_key']; ?>/<?php echo $community['Partner_type'] ?>"><b><?php echo $user; ?></b></a></h4>
                                                                                <p>( <?php echo count($feeds); ?> ) new conversations</p> 
                                                                                <div class="row">
                                                                                    <div class="col-md-9">
                                                                                        <p> 
                                                                                            <?php
                                                                                            if (!empty($members)) {
                                                                                                echo count($members);
                                                                                            } else {
                                                                                                echo "0";
                                                                                            }
                                                                                            ?>
                                                                                            <?php echo $countMenber; ?>
                                                                                        </p> 
                                                                                        <?php
                                                                                        $i = 1;
                                                                                        foreach (array_slice($members, 0, 4) as $member) {
                                                                                            $memberData = $this->users_model->get_user_by_id($member['User_Id']);
                                                                                            $memberPicture = base_url('assets/photo/') . $memberData->Photo;
                                                                                            if (@getimagesize($memberPicture)) {
                                                                                                $memberPicture = $memberPicture;
                                                                                            } else {
                                                                                                $memberPicture = base_url('assets/images/user.png');
                                                                                            }
                                                                                            ?>
                                                                                            <a target="_blank" href="<?php echo base_url('profile/index/') . $member['User_Id']; ?>">
                                                                                                <img src="<?php echo $memberPicture; ?>" class="avatar-circle"/>
                                                                                            </a>
                                                                                        <?php }
                                                                                        ?>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <br>
                                                                                        <a href="<?php echo base_url() . "communities/leaveGroup/" . $my['F_Id']; ?>" class="btn btn-block btn-danger btn-sm">Unfollow</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>

                                                                    </div>
                                                                <?php }
                                                                ?>
                                                            <?php } else {
                                                                ?>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <!--                                                            <div class="right"> <a href="#" class="btn btn-dark">Filter V</a> </div>
                                                                                                                        <div class="left"> <a href="#" class="btn btn-dark">Sort by V</a> </div>-->
                                                            <div class="clearfix"></div>
                                                            <?php if (!empty($conversations)) {
                                                                ?>
                                                                <?php
                                                                $i = 1;
                                                                foreach ($conversations as $my) {
                                                                    $community = $this->association_model->getCommunity($my['partner_id']);
                                                                    $photo = $community['Photo'];
                                                                    $user = $community['Groupname'];
                                                                    ?>
                                                                    <div class="communities-card light-back">
                                                                        <div class="row">
                                                                            <div class="col-md-1"> 
                                                                                <?php if ($photo) {
                                                                                    ?>
                                                                                    <img class="img-responsive img-rounded" src="<?php echo base_url(); ?>uploads/<?php echo $photo; ?>" width="100%"/> 
                                                                                <?php } else {
                                                                                    ?>
                                                                                <?php } ?>
                                                                            </div>
                                                                            <div class="col-md-11">
                                                                                <h4><?php echo $user; ?></h4>
                                                                                <i>(<?php echo count($conversations); ?>) conversations</i> 
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <br>
                                                                                <?php if ($my['attachment']) {
                                                                                    ?>
                                                                                    <img class="img-responsive img-rounded" src="<?php echo base_url(); ?>uploads/<?php echo $my['attachment']; ?>" width="100%"/> 
                                                                                <?php } else {
                                                                                    ?>
                                                                                <?php } ?>
                                                                                <br>
                                                                                <p><?php echo $my['comment']; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                <?php }
                                                                ?>
                                                            <?php } else {
                                                                ?>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                    <div class="col-md-3">
                                                                            <div class="light-back">
                                                                                <h4 class="text-justify">Lorem Ipsum</h4>
                                                                                <p class="text-justify">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</p>
                                                                                <a href="#">Group rules</a> </div>
                                                                            <br>
                                                                            <div class="light-back">
                                                                                <h4>Quick Links</h4>
                                                                                <button class="btn btn-sm btn-dark btn-block">Posting buy request</button>
                                                                                <a href="#">
                                                                                    <button class="btn btn-sm btn-dark btn-block">Request for quotation</button>
                                                                                </a>
                                                                                <button class="btn btn-sm btn-dark btn-block">Post a product</button>
                                                                                <button class="btn btn-sm btn-dark btn-block">Post a job</button>
                                                                                <button class="btn btn-sm btn-dark btn-block">Apply for job</button>
                                                                                <button class="btn btn-sm btn-dark btn-block">Join communities</button>
                                                                            </div>
                                                                        </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer content -->
            <?php $this->load->view('buyer/partials/footer') ?>
            <!-- /footer content --> 
        </div>

        <?php $this->load->view('buyer/partials/assets-footer'); ?>

        <!-- plugin script --> 
        <script src="<?php echo base_url(); ?>build/js/jquery.mThumbnailScroller.js"></script> 
        <script>
            (function ($) {
                $(window).load(function () {

                    $("#content-1").mThumbnailScroller({
                        type: "click-50",
                        theme: "buttons-in"
                    });

                    $("#content-2").mThumbnailScroller({
                        type: "click-50",
                        theme: "buttons-in"
                    });

                    $("#content-3").mThumbnailScroller({
                        type: "click-50",
                        theme: "buttons-in"
                    });

                });
            })(jQuery);
        </script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
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
        <style>
            .post-card{
                margin-bottom: 10px;
                background-color: #f8f8f8;
                padding: 20px !important;
                border-radius: 5px;
                -webkit-box-shadow: 0 10px 6px -6px #777;
                -moz-box-shadow: 0 10px 6px -6px #777;
                box-shadow: 0 10px 6px -6px #777;
            }
            .post-div {
                position: relative;
                overflow: hidden;
            }
            .file-post {
                position: absolute;
                opacity: 0;
                right: 0;
                top: 0;
            }
        </style>
    </body>
</html>
