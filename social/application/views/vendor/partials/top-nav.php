<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav style="width: 100%;text-align: center">
            <div class="nav toggle"> 
                <a id="menu_toggle"><i class="fa fa-bars"></i></a> 
            </div>
            <ul class="nav navbar-nav navbar-right hidden-lg hidden-md hidden-sm">
                <li>
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <?php if ($this->session->userdata('Photo')) {
                            ?>
                            <img src="<?php echo base_url(); ?>assets/photo/<?php echo $this->session->userdata('Photo'); ?>" alt="">
                        <?php } else {
                            ?>
                            <img src="<?php echo base_url(); ?>assets/images/user.png" alt="">
                        <?php } ?>
                        <span class=" fa fa-angle-down"></span> </a>
                    <?php if ($this->session->userdata('User_Id')) {
                        ?>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a target="_blank" href="<?php echo base_url("profile"); ?>"><i class="fa fa-user pull-right"></i> Profile</a></li>
                            <li><a href="<?php echo base_url(); ?>invite"><i class="fa fa-envelope-o pull-right"></i> Invite your friends</a></li>
                            <li><a href="<?php echo base_url('login/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Logout</a></li>
                        </ul>
                    <?php } else {
                        ?>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a href="<?php echo base_url('login'); ?>"> Login</a></li>
                        </ul>
                    <?php } ?>
                </li>

                <li>
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> More <span class=" fa fa-angle-down"></span> </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li role="presentation"><i class="fa fa-network-wired"></i> <a href="<?php echo base_url(); ?>social" class="info-number" aria-expanded="false">My Network</a> </li>
                        <?php if (!$this->session->userdata('User_Id')) { ?>
                            <li role="presentation"> <a href="<?php echo base_url("irs"); ?>?path=" class="info-number" aria-expanded="false">Jobs</a> </li>
                        <?php } else { ?>
                            <li role="presentation"> <a href="<?php echo base_url("irs"); ?>?path=job_seeker/jobs" class="info-number" aria-expanded="false">Jobs</a> </li>
                        <?php } ?>
                        <?php if (!$this->session->userdata('User_Id')) { ?>
                            <li role="presentation"> <a href="<?php echo base_url("irs"); ?>?path=" class="info-number" aria-expanded="false">Recruit</a></li>
                        <?php } else { ?>
                            <li role="presentation"> <a href="<?php echo base_url("irs"); ?>?path=employer/campusrecruitement" class="info-number" aria-expanded="false">Recruit </a> </li>
                        <?php }
                        ?>
                        <li role="presentation"> <a href="<?php echo base_url(); ?>buyer" class="info-number" aria-expanded="false">Buy </a></li>
                        <li class="presentation" role="presentation"> <a href="<?php echo base_url(); ?>vendor" class="info-number" aria-expanded="false">Sell </a></li>
                    </ul>
                </li>
                <?php
                if (!empty($inmailMessages)) {
                    $countInmail = count($inmailMessages);
                } else {
                    $countInmail = 0;
                    ?>
                    <?php
                }
                ?>
                <?php
                if (!empty($logMessages)) {
                    $countLogs = count($logMessages);
                } else {
                    $countLogs = 0;
                    ?>
                    <?php
                }
                ?>
                <?php
                $countlogMessages = 0;
                foreach (array_slice($logMessages, 0, 5) as $key => $message) {
                    if ($message['flag'] == "0") {
                        $countlogMessages++;
                    }
                }
                ?>
                <?php
                $countinmailMessages = 0;
                foreach (array_slice($inmailMessages, 0, 5) as $key => $message) {
                    if ($message['flag'] == "0") {
                        $countinmailMessages++;
                    }
                }
                ?>
                <li role="presentation" class="dropdown"> <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-envelope-o"></i> <span class="badge bg-green"><?php echo $countinmailMessages; ?></span> </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <div class="text-center"> <a data-toggle="modal" data-target=".bs-example-modal-sm"> <strong>New</strong> </a> </div>
                        </li>
                        <?php
                        if (!empty($inmailMessages)) {
                            foreach (array_slice($inmailMessages, 0, 5) as $key => $message) {
                                ?>
                                <?php if ($message['flag'] == "0") { ?>
                                    <li> 
                                        <a> <span class="image"><img src="<?php echo base_url(); ?>assets/images/favi.jpg" alt="Profile Image" /></span> 
                                            <span> <span><?php $user = $this->users_model->get_user_by_id($message['User_Id']); ?>
                                                    <?php echo $user->Username; ?></span> 
                                                <span class="time"><?php echo $message['date_added']; ?></span> </span> <span class="message"> <?php echo $message['message']; ?> </span> </a> 
                                    </li>
                                <?php } else { ?>
                                <?php } ?>
                                <?php
                            }
                        } else {
                            ?>
                            <li>
                                <div class="text-center"> <a> <strong>Inmail Empty !!</strong> </a> </div>
                            </li>
                            <?php
                        }
                        ?>
                </li>
                <li>
                    <div class="text-center"> <a href="<?php echo base_url() . "buyer/home/inmail"; ?>"> <strong>See All Alerts</strong> <i class="fa fa-angle-right"></i> </a> </div>
                </li>
            </ul>
            </li>
            <li role="presentation" class="dropdown"> <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-bell-o"></i> <span class="badge bg-green"><?php echo $countlogMessages; ?></span> </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
                    if (!empty($logMessages)) {
                        foreach (array_slice($logMessages, 0, 5) as $key => $message) {
                            ?>
                            <?php if ($message['flag'] == "0") { ?>
                                <li> 
                                    <a> <span class="image">
                                            <img src="<?php echo base_url(); ?>assets/images/favi.jpg" alt="Profile Image" />
                                        </span> 
                                        <span> 
                                            <span>
                                                <?php $user = $this->users_model->get_user_by_id($message['User_Id']); ?>
                                                <?php echo $user->Username; ?>
                                            </span> 
                                            <span class="time"><?php echo $message['date_added']; ?></span> </span> 
                                        <span class="message"> <?php echo $message['message']; ?> </span> 
                                    </a> 
                                </li>
                            <?php } else { ?>
                            <?php } ?>
                            <?php
                        }
                    } else {
                        ?>
                        <li>
                            <div class="text-center"> <a> <strong>Logs Empty !!</strong> </a> </div>
                        </li>
                        <?php
                    }
                    ?>
            </li>
            <li>
                <div class="text-center"> 
                    <a href="<?php echo base_url() . "buyer/home/inmail"; ?>"> <strong>See All Alerts</strong> 
                        <i class="fa fa-angle-right"></i> 
                    </a> 
                </div>
            </li>
            </ul>
            </li>
            </ul>
            <ul id="socialNav" class="nav navbar-nav hidden-xs" style="float: none;display: inline-block;">
<!--                <li> <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> More <span class=" fa fa-angle-down"></span> </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li> <a href="#"> <span class="badge bg-red pull-right">50%</span> <span>Settings</span> </a> </li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </li>-->
                <li role="presentation"> <a href="<?php echo base_url(); ?>social" class="info-number"><i class="fa fa-sitemap"></i> My Network</a> </li>
                <?php if (!$this->session->userdata('User_Id')) { ?>
                    <li role="presentation"> <a href="<?php echo base_url("irs"); ?>?path=" class="info-number"><i class="fa fa-briefcase"></i> Jobs</a> </li>
                <?php } else { ?>
                    <li role="presentation"> <a href="<?php echo base_url("irs"); ?>?path=job_seeker/jobs" class="info-number"><i class="fa fa-briefcase"></i> Jobs</a> </li>
                <?php } ?>
                <?php if (!$this->session->userdata('User_Id')) { ?>
                    <li role="presentation"> <a href="<?php echo base_url("irs"); ?>?path=" class="info-number" aria-expanded="false"><i class="fa fa-user-secret"></i> Recruit</a></li>
                <?php } else { ?>
                    <li role="presentation"> <a href="<?php echo base_url("irs"); ?>?path=employer/campusrecruitement" class="info-number" aria-expanded="false"><i class="fa fa-user-secret"></i> Recruit </a> </li>
                <?php }
                ?>
                <li role="presentation"> <a href="<?php echo base_url(); ?>buyer" class="info-number" aria-expanded="false"><i class="fa fa-shopping-bag"></i> Buy </a></li>
                <li class="presentation" role="presentation"> <a href="<?php echo base_url(); ?>vendor" class="info-number" aria-expanded="false"><i class="fa fa-building"></i> Sell </a></li>
                <li> 
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <?php if ($this->session->userdata('Photo')) {
                            ?>
                            <img src="<?php echo base_url(); ?>assets/photo/<?php echo $this->session->userdata('Photo'); ?>" alt="">
                        <?php } else {
                            ?>
                            <img src="<?php echo base_url(); ?>assets/images/user.png" alt="">
                        <?php } ?>

                        <span class=" fa fa-angle-down"></span> </a>
                    <?php if ($this->session->userdata('User_Id')) {
                        ?>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a target="_blank" href="<?php echo base_url("profile"); ?>"><i class="fa fa-user pull-right"></i> Profile</a></li>
                            <li><a href="<?php echo base_url(); ?>invite"><i class="fa fa-envelope-o pull-right"></i> Invite your friends</a></li>
                            <li><a href="<?php echo base_url('login/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Logout</a></li>
                        </ul>
                    <?php } else {
                        ?>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a href="<?php echo base_url('login'); ?>"> Login</a></li>
                        </ul>
                    <?php } ?>
                </li>
                <?php
                if (!empty($inmailMessages)) {
                    $countInmail = count($inmailMessages);
                } else {
                    $countInmail = 0;
                    ?>
                    <?php
                }
                ?>
                <?php
                if (!empty($logMessages)) {
                    $countLogs = count($logMessages);
                } else {
                    $countLogs = 0;
                    ?>
                    <?php
                }
                ?>
                <?php
                $countlogMessages = 0;
                foreach (array_slice($logMessages, 0, 5) as $key => $message) {
                    if ($message['flag'] == "0") {
                        $countlogMessages++;
                    }
                }
                ?>
                <?php
                $countinmailMessages = 0;
                foreach (array_slice($inmailMessages, 0, 5) as $key => $message) {
                    if ($message['flag'] == "0") {
                        $countinmailMessages++;
                    }
                }
                ?>
                <li role="presentation" class="dropdown"> <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-envelope-o"></i> <span class="badge bg-green"><?php echo $countinmailMessages; ?></span> </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <div class="text-center"> <a data-toggle="modal" data-target=".bs-example-modal-sm"> <strong>New</strong> </a> </div>
                        </li>
                        <?php
                        if (!empty($inmailMessages)) {
                            foreach (array_slice($inmailMessages, 0, 5) as $key => $message) {
                                ?>
                                <?php if ($message['flag'] == "0") { ?>
                                    <li> 
                                        <a> <span class="image"><img src="<?php echo base_url(); ?>assets/images/favi.jpg" alt="Profile Image" /></span> 
                                            <span> <span><?php $user = $this->users_model->get_user_by_id($message['User_Id']); ?>
                                                    <?php echo $user->Username; ?></span> 
                                                <span class="time"><?php echo $message['date_added']; ?></span> </span> <span class="message"> <?php echo $message['message']; ?> </span> </a> 
                                    </li>
                                <?php } else { ?>
                                <?php } ?>
                                <?php
                            }
                        } else {
                            ?>
                            <li>
                                <div class="text-center"> <a> <strong>Inmail Empty !!</strong> </a> </div>
                            </li>
                            <?php
                        }
                        ?>
                </li>
                <li>
                    <div class="text-center"> <a href="<?php echo base_url() . "buyer/home/inmail"; ?>"> <strong>See All Alerts</strong> <i class="fa fa-angle-right"></i> </a> </div>
                </li>
            </ul>
            </li>
            <li role="presentation" class="dropdown"> <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-bell-o"></i> <span class="badge bg-green"><?php echo $countlogMessages; ?></span> </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
                    if (!empty($logMessages)) {
                        foreach (array_slice($logMessages, 0, 5) as $key => $message) {
                            ?>
                            <?php if ($message['flag'] == "0") { ?>
                                <li> 
                                    <a> <span class="image">
                                            <img src="<?php echo base_url(); ?>assets/images/favi.jpg" alt="Profile Image" />
                                        </span> 
                                        <span> 
                                            <span>
                                                <?php $user = $this->users_model->get_user_by_id($message['User_Id']); ?>
                                                <?php echo $user->Username; ?>
                                            </span> 
                                            <span class="time"><?php echo $message['date_added']; ?></span> </span> 
                                        <span class="message"> <?php echo $message['message']; ?> </span> 
                                    </a> 
                                </li>
                            <?php } else { ?>
                            <?php } ?>
                            <?php
                        }
                    } else {
                        ?>
                        <li>
                            <div class="text-center"> <a> <strong>Logs Empty !!</strong> </a> </div>
                        </li>
                        <?php
                    }
                    ?>
            </li>
            <li>
                <div class="text-center"> 
                    <a href="<?php echo base_url() . "buyer/home/inmail"; ?>"> <strong>See All Alerts</strong> 
                        <i class="fa fa-angle-right"></i> 
                    </a> 
                </div>
            </li>
            </ul>
            </li>

<!--            <li role="presentation"> <a href="<?php echo base_url(); ?>communities/buyerCommmunity" class="info-number" aria-expanded="false">Communities</a> </li>-->
<!--            <li role="presentation" class="social-nav-active"> <a href="<?php echo base_url(); ?>social" class="info-number" aria-expanded="false">My Wall </a> </li>-->
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->