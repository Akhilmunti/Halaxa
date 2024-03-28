 <div class="sidebar-header">
                        <a href="<?php echo url('/'); ?>/" class="no-decoration">
                            <img class="img-fluid logo-big" src="<?php echo url('/'); ?>/assets/images/logo.png" />
                        </a>
                        <a href="<?php echo url('/'); ?>" class="no-decoration">
                            <img class="img-fluid logo-small" src="<?php echo url('/'); ?>/assets/images/favicon.png" />
                        </a>
                    </div>

                    <ul class="list-unstyled components">
                        <!--                        <li class="active">
                                                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                                        <i class="fas fa-home"></i>
                                                        Home
                                                    </a>
                                                    <ul class="collapse list-unstyled" id="homeSubmenu">
                                                        <li>
                                                            <a href="#">Home 1</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Home 2</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Home 3</a>
                                                        </li>
                                                    </ul>
                                                </li>-->
                                                <?php $uriSection = request()->segment(2);?>
                        <li class="sidebar-li <?php if($uriSection == 'apply_job' || $uriSection == '' || $uriSection == 'searchapplyforjob' || $uriSection == 'advanced_search'){ echo 'active';}?>">
                            <a href="<?php echo url('job_seeker/apply_job') ?>">
                                <i class="span-icon">
                                    <img class="img-fluid" src="<?php echo url('/'); ?>/assets/images/find-jobs-icon.png" />
                                </i>
                                <span class="span-desc">
                                    Find Jobs
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-li <?php if($uriSection == 'job_history'){ echo 'active';}?>">
                            <a href="<?php echo url('job_seeker/job_history') ?>">
                                <i class="span-icon">
                                    <img class="img-fluid" src="<?php echo url('/'); ?>/assets/images/applied-jobs-icon.png" />
                                </i>
                                <span>
                                    Applied Jobs
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-li <?php if($uriSection == 'job_preferences'){ echo 'active';}?>">
                            <a href="<?php echo url('job_seeker/job_preferences') ?>">
                                <i class="span-icon">
                                    <img class="img-fluid" src="<?php echo url('/'); ?>/assets/images/job-preferences-icon.png" />
                                </i>
                                <span>
                                    Job Preferences
                                </span>
                            </a>
                        </li>
                    </ul>
               