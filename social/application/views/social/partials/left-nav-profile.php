<style>
    .logo-fl{
        padding: 7px
    }
</style>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;"> 
            <a href="<?php echo base_url(); ?>social" class="site_title logo-fl">
                <img src="<?php echo base_url('landing/assets/images/logo.png'); ?>" class="img-responsive logo-fl">
            </a> 
        </div>
        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic"> 
                <?php if ($this->session->userdata('Photo')) {
                    ?>
                    <img src="<?php echo base_url(); ?>assets/photo/<?php echo $this->session->userdata('Photo'); ?>" alt="..." class="img-circle profile_img"> 
                <?php } else {
                    ?>
                    <img src="<?php echo base_url(); ?>assets/images/user.png" alt="..." class="img-circle profile_img"> 
                <?php } ?>
            </div>
            <div class="profile_info"> <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('Username'); ?></h2>
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
                        <li><a href="<?php echo base_url(); ?>profile"><i class="fa fa-list-alt"></i> Profile</a></li>
                    <?php } else {
                        ?>
                        <li><a href="<?= base_url("login"); ?>"><i class="fa fa-list-alt"></i> Profile</a></li>
                    <?php } ?>
                    
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->  

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small"> 
            <a target="_blank" style="float: left" data-toggle="tooltip" data-placement="top" title="Settings" href="<?php echo base_url("profile"); ?>"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> </a> 
            <a style="float: right" data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url("login/logout"); ?>"> <span class="glyphicon glyphicon-off" aria-hidden="true"></span> </a> 
        </div>
        <!-- /menu footer buttons --> 
    </div>
</div>