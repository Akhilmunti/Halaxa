<?php //echo '<pre>';print_r($user);exit;                                      ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('social/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>
    <style>   
        .avatar{
            border-radius: 50% !important;
            width: 45px !important;
            height: 45px !important;
        }
    </style>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('social/partials/left-nav'); ?>    
                <?php $this->load->view('social/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Network</h2>
                                        <!-- <ul class="nav navbar-right panel_toolbox">
                                           <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                           </li>
                                           <li class="dropdown">
                                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                             <ul class="dropdown-menu" role="menu">
                                               <li><a href="#">Settings 1</a>
                                               </li>
                                               <li><a href="#">Settings 2</a>
                                               </li>
                                             </ul>
                                           </li>
                                           <li><a class="close-link"><i class="fa fa-close"></i></a>
                                           </li>
                                         </ul>-->
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                        <?php
                                        $sucess = $this->session->flashdata('Sucess');
                                        if (isset($sucess)) {
                                            ?>  

                                            <h5 style="text-align:center;background:green;color:white;font:bold"><?php echo $sucess; ?></h5>

                                        <?php } ?>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Connections</a> </li>
<!--                                                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Invitations</a> </li>-->
                                                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Search Members</a> </li>
                                                    </ul>
                                                    <div id="myTabContent" class="tab-content">
                                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab"> 
                                                            <!-- end of user messages -->
                                                            <!-- end of user messages -->
                                                            <ul class="messages">
                                                                <?php
                                                                if ($connections) {
                                                                    foreach ($connections as $val) {
                                                                        $mGetConnectionDetails = $this->users_model->getConnectionByConnectedUserId($val->User_Id);
                                                                        ?>     
                                                                        <li>
                                                                            <a target="_blank" href="<?php echo base_url(); ?>profile/index/<?php echo $val->User_Id; ?>">
                                                                                <?php
                                                                                $pic = $val->Photo;
                                                                                if (!empty($pic)) {
                                                                                    ?>
                                                                                    <!-- Current avatar -->
                                                                                    <img src="<?php echo base_url(); ?>assets/photo/<?php echo $val->Photo; ?>" class="avatar" alt="Avatar">
                                                                                <?php } else { ?>
                                                                                    <img src="<?php echo base_url(); ?>/assets/images/user.png" alt="..." class="avatar">
                                                                                <?php } ?>
                                                                            </a>
                                                                            <div class="message_date">
                                                                                <a href="<?php echo base_url(); ?>social/update_invitations/Rejected/<?php echo $mGetConnectionDetails['C_ID']; ?>" class="btn btn-danger btn-xs">Unfollow </a>  
                                                                            </div>
                                                                            <div class="message_wrapper">
                                                                                <a target="_blank" href="<?php echo base_url(); ?>profile/view/<?php echo $val->User_Id; ?>"><h4 class="heading"><?php echo $val->Name; ?></h4></a>
                                                                                <p style="line-height: 0.5px">Company Name :
                                                                                    <?php
                                                                                    if (!empty($val->Company_name)) {
                                                                                        echo $val->Company_name;
                                                                                    } else {
                                                                                        echo "Not specified";
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                                <p>
                                                                                    Company Brief :
                                                                                    <?php
                                                                                    if (!empty($val->Company_brief)) {
                                                                                        echo $val->Company_brief;
                                                                                    } else {
                                                                                        echo "Not specified";
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </li>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>

                                                            </ul>
                                                            <!-- end of user messages --> 
                                                        </div>
                                                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                            <!-- end of user messages -->
                                                            <ul class="messages">
                                                                <?php
                                                                if ($invitations) {
                                                                    foreach ($invitations as $val) {
                                                                        ?>     
                                                                        <li> 
                                                                            <a target="_blank" href="<?php echo base_url(); ?>profile/view/<?php echo $val->User_Id; ?>">
                                                                                <?php
                                                                                $pic = $val->Photo;
                                                                                if (!empty($pic)) {
                                                                                    ?>
                                                                                    <!-- Current avatar -->
                                                                                    <img src="<?php echo base_url(); ?>assets/photo/<?php echo $val->Photo; ?>" class="avatar" alt="Avatar">
                                                                                <?php } else { ?>
                                                                                    <img src="<?php echo base_url(); ?>/assets/images/user.png" alt="..." class="avatar">
                                                                                <?php } ?>
                                                                            </a>
                                                                            <div class="message_date">
                                                                                <a href="<?php echo base_url(); ?>social/update_invitations/Rejected/<?php echo $val->C_ID; ?>" class="btn btn-danger btn-xs">Ignore</a>
                                                                                <a href="<?php echo base_url(); ?>social/update_invitations/Connected/<?php echo $val->C_ID; ?>" class="btn btn-info btn-xs">Accept</a>
                                                                            </div>
                                                                            <?php
                                                                            $userdata = $this->users_model->getUser($val->User_Id);
                                                                            ?>

                                                                            <?php
                                                                            $com = $val->Name;
                                                                            if (!empty($com)) {
                                                                                ?>
                                                                                <!-- Current avatar -->
                                                                                <div class="message_wrapper">
                                                                                    <a target="_blank" href="<?php echo base_url(); ?>profile/view/<?php echo $val->User_Id; ?>"><h4 class="heading"><?php echo $val->Name; ?></h4></a>
                                                                                    <p style="line-height: 0.5px">Company Name :
                                                                                        <?php
                                                                                        if (!empty($val->Company_name)) {
                                                                                            echo $val->Company_name;
                                                                                        } else {
                                                                                            echo "Not specified";
                                                                                        }
                                                                                        ?>
                                                                                    </p>
                                                                                    <p>
                                                                                        Company Brief :
                                                                                        <?php
                                                                                        if (!empty($val->Company_brief)) {
                                                                                            echo $val->Company_brief;
                                                                                        } else {
                                                                                            echo "Not specified";
                                                                                        }
                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                            <?php } ?>


                                                                        </li>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>

                                                            </ul>
                                                            <!-- end of user messages --> 
                                                        </div>
                                                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <input onkeyup="checkInput(this);" id="searchMembers" type="text" class="form-control" placeholder="Search Members">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- end of user messages -->
                                                            <ul class="messages" id="membersUL">
                                                                <!-- Dynamic li filling from controller --> 
                                                                
                                                            </ul>
                                                            <!-- end of user messages --> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content --> 

                <!-- footer content -->
                <?php $this->load->view('social/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>

        <?php $this->load->view('social/partials/assets-footer'); ?>

        <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script>
        <script>
                                                                                document.addEventListener("touchstart", function () {}, true);
        </script>

        <script type="text/javascript">
            function checkInput(obj) {
                //alert(obj.value);
                var searchTerm = obj.value;
                $.post("<?php echo base_url('social/getMembers/'); ?>",
                        {
                            member: searchTerm,
                        },
                        function (data, status) {
                            $('#membersUL').html(data);
                        });
            }
        </script>

    </body>

</html>