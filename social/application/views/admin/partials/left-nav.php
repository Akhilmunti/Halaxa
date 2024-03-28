<style>
    .logo-fl{
        padding: 2px
    }
</style>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;"> 
            <a href="<?php echo base_url(); ?>" class="site_title logo-fl">
                <img src="<?php echo base_url('assets/halaxa/images/logo-white-2.png'); ?>" class="img-responsive logo-fl">
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
                <h2>Admin</h2>
            </div>
        </div>
        <!-- /menu profile quick info --> 
        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="<?= base_url("admin"); ?>"><i class="fa fa-dashboard"></i> Dashboard </a>
                    </li>
                    <li>
                        <a href="<?= base_url("admin/logs"); ?>"><i class="fa fa-user-secret"></i> Logs </a>
                    </li>
                    <li><a><i class="fa fa-cogs"></i> Settings <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?= base_url("admin/questions"); ?>">Question Bank</a></li>
                            <li><a href="<?= base_url("admin/user"); ?>">User Management</a></li>
                            <li><a href="<?= base_url("admin/type"); ?>">Group Management</a></li>
                            <li><a href="<?= base_url("admin/category"); ?>">Category Management</a></li>
                            <li><a href="<?= base_url("admin/sub_category"); ?>">Sub-Category Management</a></li>
                            <li><a href="<?= base_url("admin/location"); ?>">Country Management</a></li>
                            <li><a href="<?= base_url("admin/city"); ?>">City Management</a></li>
                            <li><a href="<?= base_url("admin/item"); ?>">Item Management</a></li>
                            <li><a href="<?= base_url("admin/uom"); ?>">UoM Management</a></li>
                            <li><a href="<?= base_url("admin/currency"); ?>">Currency Management</a></li>
                            <li><a href="<?= base_url("admin/vendors"); ?>">Vendor Management</a></li>
                            <li><a href="<?= base_url("admin/blogs"); ?>">Blogs Management</a></li>
                            <li><a href="<?= base_url("admin/influencer"); ?>">Influencer Management</a></li>
                            <li><a href="<?= base_url("admin/school"); ?>">School Management</a></li>
                            <li><a href="<?= base_url("admin/hotel"); ?>">Hotel Management</a></li>
                            <li><a href="<?= base_url("admin/association"); ?>">Association Management</a></li>
                            <li><a href="<?= base_url("admin/roles"); ?>">Association Roles</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->  

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small"> <a data-toggle="tooltip" data-placement="top" title="Settings"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> </a> <a data-toggle="tooltip" data-placement="top" title="FullScreen"> <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span> </a> <a data-toggle="tooltip" data-placement="top" title="Lock"> <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> </a> <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('admin/login/logout'); ?>"> <span class="glyphicon glyphicon-off" aria-hidden="true"></span> </a> </div>
        <!-- /menu footer buttons --> 
    </div>
</div>