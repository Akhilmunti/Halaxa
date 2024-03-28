<style>
    .logo-fl{
        padding: 2px
    }
</style>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;"> 
            <a href="<?php echo base_url(); ?>social" class="site_title logo-fl">
                <img src="<?php echo base_url('assets/halaxa/images/logo-white-2.png'); ?>" class="img-responsive logo-fl">
            </a> 
        </div>
        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic"> 
                <?php if ($this->session->userdata('Photo')) {
                    ?>
                    <a target="_blank" href="<?php echo base_url('profile'); ?>">
                        <img src="<?php echo base_url(); ?>assets/photo/<?php echo $this->session->userdata('Photo'); ?>" alt="..." class="img-circle profile_img"> 
                    </a>
                <?php } else {
                    ?>
                    <a target="_blank" href="<?php echo base_url('profile'); ?>">
                        <img src="<?php echo base_url(); ?>assets/images/user.png" alt="..." class="img-circle profile_img"> 
                    </a>
                <?php } ?>
            </div>
            <div class="profile_info"> <span>Welcome,</span>
                <a target="_blank" href="<?php echo base_url('profile'); ?>">
                    <h2 class="text-uppercase"><?php echo $this->session->userdata('Username'); ?></h2>
                </a>
            </div>
        </div>
        <!-- /menu profile quick info --> 
        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <?php if ($this->session->userdata('User_Id')) {
                        ?>
                        <li><a class="text-uppercase" href="<?php echo base_url(); ?>social"><i class="fa fa-bell-o"></i> My Wall</a></li>
                    <?php } else {
                        ?>
                        <li><a class="text-uppercase" href="<?= base_url("login"); ?>"><i class="fa fa-bell-o"></i> My Wall</a></li>
                    <?php } ?>
                    <?php if ($this->session->userdata('User_Id')) {
                        ?>
                        <li><a class="text-uppercase" href="<?php echo base_url(); ?>social/network"><i class="fa fa-list-alt"></i> My Connections</a></li>
                    <?php } else {
                        ?>
                        <li><a class="text-uppercase" href="<?= base_url("login"); ?>"><i class="fa fa-list-alt"></i> My Connections</a></li>
                    <?php } ?>
                    <?php if ($this->session->userdata('User_Id')) {
                        ?>
                        <li><a class="text-uppercase" href="<?php echo base_url(); ?>communities/user"><i class="fa fa-list-alt"></i> My Communities</a></li>
                    <?php } else {
                        ?>
                        <li><a class="text-uppercase" href="<?= base_url("login"); ?>"><i class="fa fa-list-alt"></i> My Communities</a></li>
                    <?php } ?>

                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->  

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small"> 
            <a data-toggle="tooltip" data-placement="top" title="Admin features are only for admin logins."> <span class="glyphicon glyphicon-text-color" aria-hidden="true"></span> </a> 
            <a onclick="toggleFullScreen()" data-toggle="tooltip" data-placement="top" title="FullScreen"> <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span> </a> 
            <a target="_blank" style="float: left" data-toggle="tooltip" data-placement="top" title="Profile" href="<?php echo base_url("profile"); ?>"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> </a> 
            <a style="float: right" data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url("login/logout"); ?>"> <span class="glyphicon glyphicon-off" aria-hidden="true"></span> </a> 
        </div>
        <!-- /menu footer buttons --> 
    </div>
</div>