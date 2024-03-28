                <nav class="navbar py-0 navbar-expand-lg navbar-dark bg-theme-gradient">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a id="sidebarCollapse" href="#" class="no-decoration">
                            <img class="sidebar-collapse-btn" src="<?php echo url('/'); ?>/assets/images/hamburger.png" />
                        </a>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                            <ul class="navbar-nav mx-auto mt-2 mt-lg-0 nav-theme-li">
                                <li class="nav-item mr-2">
                                    <a target="_blank" class="nav-link" href="<?php echo Config::get('constants.base.social_url'); ?>social/network">NETWORK</a>
                                </li>
                                <li class="nav-item mr-2">
                                    <a target="_blank" class="nav-link" href="<?php echo Config::get('constants.base.job_url'); ?>job_seeker">FIND JOBS</a>
                                </li>
                                <li class="nav-item mr-2 active">
                                    <a target="_blank" class="nav-link" href="<?php echo Config::get('constants.base.job_url'); ?>employer/">RECRUIT</a>
                                </li>
                                <li class="nav-item mr-2">
                                    <a target="_blank" class="nav-link" href="<?php echo Config::get('constants.base.social_url'); ?>vendor">SELL</a>
                                </li>
                                <li class="nav-item mr-2">
                                    <a target="_blank" class="nav-link" href="<?php echo Config::get('constants.base.social_url'); ?>buyer">BUY</a>
                                </li>

                                <li class="nav-item mr-2">
                                    <a target="_blank" class="nav-link" href="<?php echo Config::get('constants.base.social_url'); ?>social/partner">PARTNER</a>
                                </li>
                            </ul>

                            <ul class="navbar-nav ml-auto mt-2 mt-lg-0 nav-theme-li">
                                <li class="nav-item mr-2">
                                    <a target="_blank" class="nav-link nav-link-wrapper" href="#">
                                        <div class="notify">
                                            <i class="fa fa-bell-o"></i>
                                            <span class="badge badge-info notify-badge">43</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a target="_blank" class="nav-link nav-link-profile" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="profile-nav">
                                            <img class="img-fluid rounded-circle" src="<?php echo config('constants.base.social_url'); ?>/assets/<?php if(strlen(trim(Session::get('photo'))) > 0){ echo 'photo/'; echo Session::get('photo'); } else { echo 'images/user.png'; }  ?> " />
                                        </span>
                                        <?php echo e(Auth::check() ? Auth::user()->name : 'Account'); ?>

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo Config::get('constants.base.job_url'); ?>home/profile">Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"

                                    onclick="event.preventDefault();

                                            document.getElementById('logout-form').submit();">Logout</a>
                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">

                                                                            <input type="text" value='<?php echo e(csrf_token()); ?>' name='_token'>


                            </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>