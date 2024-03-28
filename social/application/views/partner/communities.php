<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('partner/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('partner/partials/left-nav'); ?>    
                <!-- top navigation -->
                <?php $this->load->view('partner/partials/top-nav'); ?>
                <!-- /top navigation --> 
            </div>
            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <div class="row">
                                    <div class="col-md-1"> 
                                        <!-- Current avatar --> 
                                        <img class="img-responsive img-rounded image-head" src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata('picture'); ?>" alt="Avatar" title="Change the avatar"> </div>
                                    <div class="col-md-8">
                                        <h4 style="text-transform: uppercase"><?php echo $this->session->userdata('login_name'); ?></h4>
                                        <i>
                                            <?php
                                            if (!empty($members)) {
                                                echo count($members);
                                            } else {
                                                echo "0";
                                            }
                                            ?> Members
                                        </i> 
                                    </div>
                                    <?php /* <div class="col-md-3">
                                      <ul class="nav navbar-nav navbar-right">
                                      <li role="presentation"> <a href="#" class="info-number" aria-expanded="false"><i class="fa fa-cog"></i></a> </li>
                                      <li> <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Admin <span class=" fa fa-angle-down"></span> </a>
                                      <ul class="dropdown-menu dropdown-usermenu pull-right">
                                      <li><a href="#"> Manage school profile</a></li>
                                      <li><a href="#"> Revenue account</a></li>
                                      <li><a href="#"> Data analysis</a></li>
                                      <li><a href="#"> Change password</a></li>
                                      <li><a href="#"> Logout</a></li>
                                      </ul>
                                      </li>
                                      </ul>
                                      </div> */ ?>
                                </div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-md-9">
                                        <br>
                                        <div class="border-dark" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Conversations</a> </li>
                                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Requests</a> </li>
                                            </ul>
                                            <div id="myTabContent" class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab"> 
                                                    <div class="light-back">
                                                        <form id="Form" method="POST" action="<?php echo base_url() . "partner/school/add_post"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-md-2"> 
                                                                    <div class="avatar-upload">
                                                                        <div class="avatar-edit">
                                                                            <input required="" type='file' id="imageUpload" name="imageUpload" accept=".png, .jpg, .jpeg" />
                                                                            <label for="imageUpload"></label>
                                                                        </div>
                                                                        <div class="avatar-preview">
                                                                            <div id="imagePreview" style="background-image: url(http://via.placeholder.com/90x90);">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <textarea required="" name="comments" placeholder="Start your converstation here...." class="form-control" rows="4" id="comment"></textarea>
                                                                    <?php if (form_error('comments')) { ?><span style="color: #E68F8F;"><?php echo form_error('comments'); ?></span> <?php } ?>
                                                                </div>
                                                                <div class="col-md-12" style="margin-top: 5px"> 
                                                                    <button type="submit" class="btn btn-block btn-sm btn-dark">Post</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <br/>
                                                    <!-- start recent activity -->
                                                    <ul class="messages">
                                                        <?php
                                                        if (!empty($conversations)) {
                                                            foreach ($conversations as $key => $conversation) {
                                                                ?>
                                                                <li> 
                                                                    <img src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata('picture'); ?>" class="avatar" alt="Avatar">
                                                                    <div class="message_date">
                                                                        <h4 class="date text-info">
                                                                            <?php
                                                                            $timestamp = $conversation['date_added'];
                                                                            $splits = explode(" ", $timestamp);
                                                                            echo $get_date = $splits[0];
                                                                            //$get_time = $splits[1];
                                                                            ?>
                                                                        </h4>
                                                                        <p class="month">
                                                                            <?php
                                                                            $timestamp = $conversation['date_added'];
                                                                            $splits = explode(" ", $timestamp);
                                                                            //$get_date = $splits[0];
                                                                            echo $get_time = $splits[1];
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="message_wrapper">
                                                                        <blockquote class="message"><?php echo $conversation['comment']; ?></blockquote>
                                                                        <br />
                                                                        <p class="url"> <span class="fs1 text-info" aria-hidden="true" data-icon=""></span> <a href="http://vendorglobe.com/uploads/<?php echo $conversation['attachment']; ?>" download><i class="fa fa-paperclip"></i> <?php echo $conversation['attachment']; ?> </a> </p>
                                                                    </div>
                                                                </li>

                                                                <?php
                                                            }
                                                        } else {
                                                            ?>

                                                        <?php }
                                                        ?>
                                                    </ul>
                                                    <!-- end recent activity --> 

                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab"> 
                                                    <!-- start user projects -->
                                                    <table class="data table table-striped no-margin">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>User Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if (!empty($requests)) {
                                                                ?>
                                                                <?php
                                                                $i = 0;
                                                                foreach ($requests as $one) {
                                                                    $i++;
                                                                    $userData = $this->users_model->get_element_by($one['User_Id']);
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $i; ?></td>
                                                                        <td><?php echo $userData->Name; ?></td>
                                                                        <td>
                                                                            <?php if ($one['approval'] == "1") {
                                                                                ?>
                                                                                <a href="#" class="btn btn-success btn-xs">Accepted</a> 
                                                                            <?php } else {
                                                                                ?>
                                                                                <a href="<?php echo base_url() . "communities/accept/" . $one['F_Id']; ?>" class="btn btn-xs btn-dark">Accept</a>
                                                                            <?php } ?>
                                                                        </td>
                                                                    </tr>
                                                                <br>
                                                            <?php }
                                                            ?>
                                                        <?php } else {
                                                            ?>
                                                            <tr>
                                                                <td colspan="3">None of the user has requested yet.</td>
                                                            </tr>
                                                        <?php } ?>

                                                        </tbody>
                                                    </table>
                                                    <!-- end user projects --> 

                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                                        photo booth letterpress, commodo enim craft beer mlkshk </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="light-back">
                                            <h4 class="text-justify">Group Description</h4>
                                            <p class="text-justify">
                                                <?php echo $info['group_description']; ?>
                                            </p>
                                        </div>
                                        <br>
                                        <div class="light-back">
                                            <div class="left"> <a href="#">Members</a> </div>
                                            <div class="right"> 
                                                <a href="#">
                                                    <?php
                                                    if (!empty($members)) {
                                                        echo count($members);
                                                    } else {
                                                        echo "0";
                                                    }
                                                    ?> members
                                                </a> 
                                            </div>
                                            <div class="clearfix"></div>
                                            <br>
                                            <div class="anchor-img"> 
                                                <?php
                                                if (!empty($members)) {
                                                    foreach ($members as $key => $member) {
                                                        $user = $this->users_model->get_user_by_id($member['User_Id']);
                                                        ?>
                                                        <a><img height="40" width="40" src="<?php echo base_url(); ?>assets/photo/<?php echo $user->Photo; ?>" class="img-circle img-responsive"/></a> 
                                                        <?php
                                                    }
                                                } else {
                                                    ?>

                                                <?php }
                                                ?>
                                            </div>

                                            <br>
                                            <?php /*
                                              <button class="btn btn-xs btn-dark btn-block">Invite others</button>
                                              <a href="member-schedule.html"><button class="btn btn-xs btn-dark btn-block">Members availability schedule</button></a>
                                              <button class="btn btn-xs btn-dark btn-block">Received offers</button> * */ ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- footer content -->
            <?php $this->load->view('partner/partials/footer') ?>
            <!-- /footer content --> 
        </div>

        <?php $this->load->view('partner/partials/assets-footer'); ?>
        <!-- jQuery Smart Wizard --> 
        <script src="<?php echo base_url(); ?>assets/vendors/moment/min/moment.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>  
        <script src="<?php echo base_url(); ?>assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- iCheck --> 
        <script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script> 
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
        <style>
            .avatar-upload {
                position: relative;
                max-width: 205px;
                margin: auto;
            }
            .avatar-upload .avatar-edit {
                position: absolute;
                right: 75px;
                z-index: 1;
                top: 0px;
            }
            .avatar-upload .avatar-edit input {
                display: none;
            }
            .avatar-upload .avatar-edit input + label {
                display: inline-block;
                width: 34px;
                height: 34px;
                margin-bottom: 0;
                border-radius: 100%;
                background: #FFFFFF;
                border: 1px solid transparent;
                box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                cursor: pointer;
                font-weight: normal;
                transition: all 0.2s ease-in-out;
            }
            .avatar-upload .avatar-edit input + label:hover {
                background: #f1f1f1;
                border-color: #d6d6d6;
            }
            .avatar-upload .avatar-edit input + label:after {
                content: "\f040";
                font-family: 'FontAwesome';
                color: #757575;
                position: absolute;
                top: 10px;
                left: 0;
                right: 0;
                text-align: center;
                margin: auto;
            }
            .avatar-upload .avatar-preview {
                width: 100px;
                height: 100px;
                position: relative;
                border-radius: 100%;
                border: 6px solid #F8F8F8;
                box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
            }
            .avatar-upload .avatar-preview > div {
                width: 100%;
                height: 100%;
                border-radius: 100%;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
            .image-head{
                height: 60px;
                width: 100px
            }
        </style>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                        $('#imagePreview').hide();
                        $('#imagePreview').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imageUpload").change(function () {
                readURL(this);
            });
        </script>
    </body>
</html>
