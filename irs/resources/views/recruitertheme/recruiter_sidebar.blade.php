    <?php $uriSection = request()->segment(2);
    //print_r(Auth::user());
    //echo $uriSection;?>
    <div class="sidebar-header">
        <a href="<?php echo url('/'); ?>" class="no-decoration">
            <img class="img-fluid logo-big" src="<?php echo url('/'); ?>/assets/images/logo.png" />
        </a>
        <a href="<?php echo url('/'); ?>" class="no-decoration">
            <img class="img-fluid logo-small" src="<?php echo url('/'); ?>/assets/images/favicon.png" />
        </a>
        
        <a href="<?php echo url('/'); ?>/employer/createjobposting" class="btn btn-info-post btn-block">
            Post a Jobs <i class="fa fa-plus ml-2"></i>
        </a>
    </div>

    <ul class="list-unstyled components">
        <hr class="hr-theme">
        <li class="sidebar-li <?php if($uriSection == 'activejobopening' || $uriSection == 'clonesavedjobsposting' || $uriSection == 'viewappliedjobdetails'){ echo 'active';}?>">
            <a href="<?php echo url('/'); ?>/employer/activejobopening">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo url('/'); ?>/assets/recruit/images/job-list-icon.png" />
                </i>
                <span class="span-desc">
                    Jobs List
                </span>
                <span class="float-right badge badge-danger sidenav-badge">
                    <?php echo $ActivePostedJobs; ?>
                </span>
            </a>
        </li>
        <li class="sidebar-li <?php if($uriSection == 'candidateinformation' || $uriSection == 'job_seeker_profile_view' || $uriSection == 'createassesment'){ echo 'active';}?>">
            <a href="<?php echo url('/'); ?>/employer/candidateinformation">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo url('/'); ?>/assets/recruit/images/candidates-icon.png" />
                </i>
                <span>
                    Candidates
                </span>
                <span class="float-right badge badge-danger sidenav-badge">
                    <?php echo $Applicants; ?>
                </span>
            </a>
        </li>
        <li class="sidebar-li <?php if($uriSection == 'savedjobposting'){ echo 'active';}?>">
            <a href="<?php echo url('/'); ?>/employer/savedjobposting">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo url('/'); ?>/assets/recruit/images/drafts-icon.png" />
                </i>
                <span>
                    Drafts
                </span>
                <span class="float-right badge badge-danger sidenav-badge">
                    <?php echo $savedJobs; ?>
                </span>
            </a>
        </li>
        <hr class="hr-theme">
        <li class="sidebar-li sidenav-label">Premium</li>
        <li class="sidebar-li">
            <a href="<?php echo url('/'); ?>/employer/assigntesttojs">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo url('/'); ?>/assets/recruit/images/assessment-icon.png" />
                </i>
                <span>
                    Assessment Test
                </span>
            </a>
        </li>
        <li class="sidebar-li">
            <a href="<?php echo url('/employer/createvideointerview'); ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo url('/'); ?>/assets/recruit/images/video-icon.png" />
                </i>
                <span>
                    Video Interview
                </span>
            </a>
        </li>
        <li class="sidebar-li">
            <a href="<?php echo url('/'); ?>/employer/activecampusrecruitement">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo url('/'); ?>/assets/recruit/images/campus-icon.png" />
                </i>
                <span>
                    Campus Recruit
                </span>
            </a>
        </li>
        <hr class="hr-theme">
        <li class="sidebar-li sidenav-label">Profile</li>
        <li class="sidebar-li <?php if($uriSection == 'recruiterprofile'){ echo 'active';}?>">
            <a href="<?php echo url('/'); ?>/employer/recruiterprofile">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo url('/'); ?>/assets/recruit/images/profile-icon.png" />
                </i>
                <span>
                    Recruiter Profile
                </span>
            </a>
        </li>
    </ul>
