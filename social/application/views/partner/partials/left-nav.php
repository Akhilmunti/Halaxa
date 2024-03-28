<style>
    .logo-fl{
        padding: 2px
    }
</style>
<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;"> 
            <a href="<?php $_SERVER['PHP_SELF']; ?>" class="site_title logo-fl">
                <img src="<?php echo base_url('assets/halaxa/images/logo-white-2.png'); ?>" class="img-responsive logo-fl">
            </a> 
        </div>
        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <?php if ($this->session->userdata('picture')) { ?>
                <div class="profile_pic"> <img src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata('picture'); ?>" alt="..." class="img-circle profile_img"> </div>
            <?php } else { ?>
                <img src="<?php echo base_url(); ?>assets/images/user.png" alt="..." class="img-circle profile_img"> 
            <?php }
            ?>
            <div style="font-size: 12px;margin-top: 20px;color: #ffffff;float: right"> 
                <span>Welcome <?php echo $this->session->userdata('login_name'); ?>,</span>
                <br>
                <span>Greetings from Foodlinked.</span>
            </div>
        </div>
        <!-- /menu profile quick info --> 
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <?php
                    $dashActive = $this->session->flashdata('active');
                    if (!empty($dashActive)) {
                        $dash = "active";
                    } else {
                        $dash = "";
                    }
                    ?>
                    <li class="<?php echo $dash; ?>"><a href="<?= base_url("partner/"); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<!--                    <li><a href="<?= base_url("communities"); ?>"><i class="fa fa-users"></i> Communities</a></li>-->
                    <?php
                    $isLoggedIn = $this->session->userdata('login_id');
                    $whoIsThis = $this->session->userdata('partner_type');
                    if ($isLoggedIn) {
                        ?>
                        <li><a><i class="fa fa-lock"></i> Admin Features <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <?php if ($whoIsThis == "school") { ?>
                                    <li><a href="<?php echo base_url('partner/school/edit/'); ?><?php echo $isLoggedIn; ?>">Manage <?php echo $whoIsThis; ?> Profile</a></li>
                                <?php } elseif ($whoIsThis == "hotel") { ?>
                                    <li><a href="<?php echo base_url('partner/hotel/edit/'); ?><?php echo $isLoggedIn; ?>">Manage <?php echo $whoIsThis; ?> Profile</a></li>
                                <?php } else { ?>
                                    <li><a href="<?php echo base_url('partner/association/edit/'); ?><?php echo $isLoggedIn; ?>">Manage <?php echo $whoIsThis; ?> Profile</a></li>
                                <?php } ?>
                                <!--                                <li><a href="#">Revenue Account</a></li>
                                                                <li><a href="#">Data Analysis</a></li>-->
                                <li><a href="<?php echo base_url('partner/home/resetPassword'); ?>">Change Password</a></li>
                                <li><a href="<?= base_url("partner/home/logout"); ?>">Logout</a></li>
                            </ul>
                        </li>
                        <li>
                            <a><i class="fa fa-users"></i> Members <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?= base_url("partner/requests"); ?>">Member Requests</a></li>
                                <li><a href="<?= base_url("partner/home/inviteMembers"); ?>">Invite Members</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url("partner/members"); ?>"><i class="fa fa-users"></i> Members Availability Schedule</a></li>
                        <?php if ($whoIsThis != "hotel") { ?>
                            <li><a href="<?= base_url("partner/receivedoffers"); ?>"><i class="fa fa-recycle"></i> Received Offers</a></li>
                        <?php } ?>
                <!--<li><a href="<?php echo base_url(); ?>vendor/login.html"><i class="fa fa-industry"></i> Vendor</a></li>
                  <li><a href="<?php echo base_url(); ?>buyer/login.html"><i class="fa fa-exchange"></i> Buyer</a></li>-->
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu --> 

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small"> 
            <a data-toggle="tooltip" data-placement="top" title="Settings"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> </a> 
            <a data-toggle="tooltip" data-placement="top" title="FullScreen"> <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span> </a> 
            <a data-toggle="tooltip" data-placement="top" title="Lock"> <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> </a> 
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url("partner/home/logout"); ?>"> <span class="glyphicon glyphicon-off" aria-hidden="true"></span> </a> 
        </div>
        <!-- /menu footer buttons --> 
    </div>
</div>