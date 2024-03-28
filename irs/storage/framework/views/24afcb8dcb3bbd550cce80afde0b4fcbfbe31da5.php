<!-- top navigation -->
<style>
.nav_title {
    width: 230px;
    float: left;
    background: #2A3F54;
    border-radius: 0;
    height: 57px;
}
</style>
<div class="top_nav">
    <div class="nav_menu">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="width: 100%;text-align: center">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <!-- <div class="nav toggle pull-right">
             <a class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
             <i class="fa fa-bars"></i>
             </a>
            </div> 

            <div class="collapse navbar-collapse" id="navbarResponsive">-->

                <ul class="nav navbar-nav" style="float: none;display: inline-block;">

                <li role="presentation"> <a href="<?php echo Config::get('constants.base.social_url'); ?>social/network" class="info-number" aria-expanded="false"><i class="fa fa-sitemap"></i> My Network</a> </li>

                <li role="presentation"> <a href="<?php echo Config::get('constants.base.job_url'); ?>job_seeker" class="info-number" aria-expanded="false"><i class="fa fa-briefcase"></i> Jobs </a> </li>

                    <!-- <li> 

                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> More <span class=" fa fa-angle-down"></span> </a>

                        <ul class="dropdown-menu dropdown-usermenu pull-right">

                            <li> <a href="#"> <span class="badge bg-red pull-right">50%</span> <span>Settings</span> </a> </li>

                            <li><a href="#">Help</a></li>

                        </ul>

                    </li> -->



                    <li role="presentation"> <a href="<?php echo Config::get('constants.base.job_url'); ?>employer/" class="info-number" aria-expanded="false"><i class="fa fa-user-secret"></i> Recruit</a></li>

                    <li role="social-nav-active"> <a href="<?php echo Config::get('constants.base.social_url'); ?>buyer" class="info-number" aria-expanded="false"><i class="fa fa-shopping-bag"></i> Buy </a></li>

                    <li class="presentation"> <a href="<?php echo Config::get('constants.base.social_url'); ?>vendor" class="info-number" aria-expanded="false"><i class="fa fa-building"></i> Sell </a></li>



                    <li> <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> 
                        <img src="<?php echo config('constants.base.social_url'); ?>/assets/<?php if(strlen(trim(Session::get('photo'))) > 0){ echo 'photo/'; echo Session::get('photo'); } else { echo 'images/user.png'; }  ?> " alt="..." >
                        <span class=" fa fa-angle-down"></span> </a>



                        <ul class="dropdown-menu dropdown-usermenu pull-right">

                            <li><a href="<?php echo Config::get('constants.base.job_url'); ?>home/profile"> Profile</a></li>
                            <li><a href="https://foodlinked.com/social/invite"><i class="fa fa-envelope-o pull-right"></i> Invite your friends</a></li>
                            <li><a  href="<?php echo e(route('logout')); ?>"

                                    onclick="event.preventDefault();

                                            document.getElementById('logout-form').submit();"><?php echo e(__('Logout')); ?></a></li>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">

                                <input type="text" value='<?php echo e(csrf_token()); ?>' name='_token'>

                            </form>

                            <!-- <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();

                                 document.getElementById('logout-form').submit();"><?php echo e(__('Logout')); ?></a>

                                 <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li> -->

                        </ul>

                    </li>



                    <li role="presentation" class="dropdown"> <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-envelope-o"></i> <span class="badge bg-green">0</span> </a>

                      <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <div class="text-center"> 
                                <a data-toggle="modal" data-target=".bs-example-modal-sm"> <strong>New</strong> 
                                </a> 
                            </div>
                        </li>
                                                    <li>
                                <div class="text-center"> <a> <strong>Inmail Empty !!</strong> </a> </div>
                            </li>
                                            
                <li>
                    <div class="text-center"> <a href="#"> <strong>See All Alerts</strong> <i class="fa fa-angle-right"></i> </a> </div>
                </li>
            </ul>
                    </li>



                    <li role="presentation" class="dropdown"> <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-bell-o"></i> <span class="badge bg-green">0</span> </a>

                      <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                            <li>
                            <div class="text-center"> <a> <strong>Logs Empty !!</strong> </a> </div>
                        </li>
                                    
            <li>
                <div class="text-center"> 
                    <a href="#"> <strong>See All Alerts</strong> 
                        <i class="fa fa-angle-right"></i> 
                    </a> 
                </div>
            </li>
            </ul>

                    </li>
                    
                    

                     <!--<li role="presentation"> <a href="<?php //echo Config::get('constants.base.social_url'); ?>communities/buyerCommmunity" class="info-number" aria-expanded="false">Communities</a> </li>

                   

                    <li role="presentation"> <a href="<?php //echo Config::get('constants.base.social_url'); ?>social" class="info-number" aria-expanded="false">My Wall </a> </li> -->

                </ul>
            </div>
        </nav>

</div>

</div>



<!-- /top navigation -->