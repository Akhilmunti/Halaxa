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

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>V-General</h3>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url("vendor/home"); ?>"><i class="fa fa-list-alt"></i> Dashboard</a></li>
                    <?php
                    $userId = $this->session->userdata('User_Id');
                    if ($this->users_model->check_vendor($userId)) {
                        ?>
                        <li><a><i class="fa fa-edit"></i> Product Management <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?= base_url("vendor/products/add_new"); ?>">Add Product</a></li>
                                <li><a href="<?= base_url("vendor/groups"); ?>">Manage Groups</a></li>
                                <li><a href="<?= base_url("vendor/photos"); ?>">Photo Gallery</a></li>
                                <li><a href="<?= base_url("vendor/products/manageProducts"); ?>">Manage Products</a></li>
                                <li><a href="<?= base_url("vendor/clientele"); ?>">Clientele Management</a></li>
                            </ul>
                        </li>
                    <?php } else {
                        ?>
                        <li><a><i class="fa fa-edit"></i> Product Management <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?= base_url("vendor/home"); ?>">Add Product</a></li>
                                <li><a href="<?= base_url("vendor/home"); ?>">Manage Groups</a></li>
                                <li><a href="<?= base_url("vendor/home"); ?>">Photo Gallery</a></li>
                                <li><a href="<?= base_url("vendor/home"); ?>">Manage Products</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php
                    $userId = $this->session->userdata('User_Id');
                    if ($this->users_model->check_vendor($userId)) {
                        ?>
                        <li><a><i class="fa fa-edit"></i> Received RFQ <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?= base_url("vendor/recieved_rfq"); ?>">All RFQ's</a></li>
                                <li><a href="<?= base_url("vendor/requote_rfq"); ?>">Requested for Requote</a></li>
                                <li><a href="<?= base_url("vendor/public_rfq"); ?>">Public RFQ's</a></li>
                                <li><a href="<?= base_url("vendor/draft_rfq"); ?>">Draft RFQ's</a></li>
                            </ul>
                        </li>
                    <?php } else {
                        ?>
                        <li><a><i class="fa fa-edit"></i> Received RFQ <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?= base_url("vendor/home"); ?>">All RFQ's</a></li>
                                <li><a href="<?= base_url("vendor/home"); ?>">Requested for Requote</a></li>
                                <li><a href="<?= base_url("vendor/home"); ?>">Public RFQ's</a></li>
                                <li><a href="<?= base_url("vendor/home"); ?>">Draft RFQ's</a></li>
                            </ul>
                        </li>
                    <?php } ?>

<!--                    <li><a href="<?= base_url("vendor/quotations"); ?>"><i class="fa fa-quote-left"></i> Quotation Management</a></li>-->
                    <?php
                    $userId = $this->session->userdata('User_Id');
                    if ($this->users_model->check_vendor($userId)) {
                        ?>
                        <li><a href="<?= base_url("vendor/purchase_orders"); ?>"><i class="fa fa-hand-grab-o"></i> Purchase Order Management</a></li>
                    <?php } else {
                        ?>
                        <li><a href="<?= base_url("vendor/home"); ?>"><i class="fa fa-hand-grab-o"></i> Purchase Order Management</a></li>
                    <?php } ?>
                    <?php
                    $userId = $this->session->userdata('User_Id');
                    if ($this->users_model->check_vendor($userId)) {
                        ?>
                        <li><a href="<?= base_url("vendor/invoice"); ?>"><i class="fa fa-info"></i> Invoice Management</a></li>
                    <?php } else {
                        ?>
                        <li><a href="<?= base_url("vendor/home"); ?>"><i class="fa fa-info"></i> Invoice Management</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>

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