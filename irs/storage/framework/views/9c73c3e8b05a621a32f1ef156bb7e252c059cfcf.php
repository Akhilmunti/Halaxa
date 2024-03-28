<style>
.nav_title {
    width: 230px;
    float: left;
    background: #2A3F54;
    border-radius: 0;
    height: 57px;
}
</style>
<div class="col-md-3 left_col menu_fixed">
<div class="left_col scroll-view">
<div class="navbar nav_title" style="border: 0;">
<a href="https://foodlinked.com/social/social" class="site_title logo-fl">
                <img src="https://foodlinked.com/social/landing/assets/images/logo.png" class="img-responsive logo-fl">
            </a>
<!-- <a href="<?php echo url('/') ?>" class="site_title"><i class="fa fa-paw"></i> <span>Foodlinked</span></a> -->
</div>

<div class="clearfix"></div>

<!-- menu profile quick info -->
<div class="profile clearfix">
<div class="profile_pic">
<img src="<?php echo config('constants.base.social_url'); ?>/assets/<?php if(strlen(trim(Session::get('photo'))) > 0){ echo 'photo/'; echo Session::get('photo'); } else { echo 'images/user.png'; }  ?> " alt="..." class="img-circle profile_img">
</div>
<div class="profile_info">
<span>Welcome,</span>
<h2><?php echo e(Auth::check() ? Auth::user()->name : 'Account'); ?></h2>
</div>
</div>
<!-- /menu profile quick info -->

<br />
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
<div class="menu_section">
<h3>General</h3>
<ul class="nav side-menu">
<!-- <li><a href="<?php //echo url('/job_seeker') ?>"><i class="fa fa-home"></i>Dashboard</a>
</li>
<li><a href="<?php //echo url('job_seeker/profile') ?>"><i class="fa fa-edit"></i>Profile</a>
</li> -->
<li><a href="<?php echo url('job_seeker/apply_job') ?>"><i class="fa fa-bar-chart-o"></i> Apply for job</a>
</li>
<li><a href="<?php echo url('job_seeker/job_history') ?>"><i class="fa fa-table"></i> Apply job History</a></li>
<li><a href="<?php echo url('job_seeker/job_preferences') ?>"><i class="fa fa-briefcase"></i>Job Preferences</a>
</li>
</ul>
</div>

</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<!--<div class="sidebar-footer hidden-small">-->
<!--<a data-toggle="tooltip" data-placement="top" title="Settings">-->
<!--<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>-->
<!--</a>-->
<!--<a data-toggle="tooltip" data-placement="top" title="FullScreen">-->
<!--<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>-->
<!--</a>-->
<!--<a data-toggle="tooltip" data-placement="top" title="Lock">-->
<!--<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>-->
<!--</a>-->
<!--<a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();-->
<!--document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>-->
<!--<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">-->
<!--<input type="text" value='<?php echo e(csrf_token()); ?>' name='_token'>-->
<!--</form>-->


<!--</div>-->
<!-- /menu footer buttons -->

<!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small"> 
            <a data-toggle="tooltip" data-placement="top" title="Admin features are only for admin logins."> <span class="glyphicon glyphicon-text-color" aria-hidden="true"></span> </a> 
            <a onclick="toggleFullScreen()" data-toggle="tooltip" data-placement="top" title="FullScreen"> <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span> </a> 
            <a target="_blank" style="float: left" data-toggle="tooltip" data-placement="top" title="Profile" href="http://staging.foodlinked.co.in/social/profile"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> </a> 
            <a style="float: right" data-toggle="tooltip" data-placement="top" title="Logout" href="http://staging.foodlinked.co.in/social/login/logout"> <span class="glyphicon glyphicon-off" aria-hidden="true"></span> </a> 
        </div>
        <!-- /menu footer buttons --> 

</div>
</div>