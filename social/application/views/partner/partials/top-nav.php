<div class="top_nav">
    <div class="nav_menu">
        <nav style="width: 100%;text-align: right"> 
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a> 
            </div>
            <ul class="nav navbar-nav navbar-right hidden-lg hidden-md hidden-sm">
                <?php if ($this->session->userdata('login_id')) {
                    ?>
                    <li role="presentation"> <a href="<?= base_url("partner/home/logout"); ?>" class="info-number" aria-expanded="false">Logout</a> </li>
                <?php } else {
                    ?>
                    <li role="presentation"> <a href="<?= base_url("partner/home/signin"); ?>" class="info-number" aria-expanded="false">Sign In</a> </li>
                <?php } ?>
<!--              <li role="presentation"> <a href="<?= base_url("partner/apply"); ?>" class="info-number" aria-expanded="false">Apply Here</a> </li>
   <li> 
        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Social Connect <span class=" fa fa-angle-down"></span> </a>
        <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li> <a href="<?php echo base_url(); ?>social/network">Network</a> </li>
            <li><a href="<?php echo base_url(); ?>social">Wall</a></li>
        </ul>
    </li>-->
            </ul>
            <ul id="socialNav" class="nav navbar-nav hidden-xs" style="float: none;display: inline-block;">
                <?php if ($this->session->userdata('login_id')) {
                    ?>
                    <li role="presentation"> <a href="<?= base_url("partner/home/logout"); ?>" class="info-number" aria-expanded="false">Logout</a> </li>
                <?php } else {
                    ?>
                    <li role="presentation"> <a href="<?= base_url("partner/home/signin"); ?>" class="info-number" aria-expanded="false">Sign In</a> </li>
                    <?php } ?>
<!--              <li role="presentation"> <a href="<?= base_url("partner/apply"); ?>" class="info-number" aria-expanded="false">Apply Here</a> </li>
   <li> 
        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Social Connect <span class=" fa fa-angle-down"></span> </a>
        <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li> <a href="<?php echo base_url(); ?>social/network">Network</a> </li>
            <li><a href="<?php echo base_url(); ?>social">Wall</a></li>
        </ul>
    </li>-->
            </ul>
        </nav>
    </div>
</div>