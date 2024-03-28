<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        <a href="<?php echo base_url(); ?>" class="no-decoration">
            <img class="img-fluid logo-big" src="<?php echo base_url('assets/halaxa_dashboard/images/logo.png'); ?>" />
        </a>
        <a href="<?php echo base_url(); ?>" class="no-decoration">
            <img class="img-fluid logo-small" src="<?php echo base_url('assets/halaxa_dashboard/images/favicon.png'); ?>" />
        </a>
    </div>

    <?php
    if ($sidebar == "feeds") {
        $feeds = "active";
        $mycom = "";
    } elseif ($sidebar == "mycom") {
        $mycom = "active";
    } elseif ($sidebar == "findc") {
        $mycomfind = "active";
    } elseif ($sidebar == "myfoll") {
        $myfoll = "active";
    } elseif ($sidebar == "foll") {
        $foll = "active";
    } elseif ($sidebar == "profile") {
        $profile = "active";
    } else {
        $feeds = "";
        $mycom = "";
        $myfoll = "";
    }
    ?>

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
        <li class="sidebar-li <?php echo $feeds; ?>">
            <a href="<?php echo base_url('social'); ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/feeds-icon.png'); ?>" />
                </i>
                <span class="span-desc">
                    Feeds
                </span>
            </a>
        </li>
        <li class="sidebar-li <?php echo $myfoll; ?>">
            <a href="<?php echo base_url(); ?>social/network">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/followers-icon.png'); ?>" />
                </i>
                <span>
                    Followers
                </span>
            </a>
        </li>
        <li class="sidebar-li <?php echo $mycom; ?>">
            <a href="<?php echo base_url(); ?>communities/user">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/communities-icon.png'); ?>" />
                </i>
                <span>
                    My Communities
                </span>
            </a>
        </li>
        <hr class="hr-theme">
        <li class="sidebar-li sidenav-label">Find</li>
        <li class="sidebar-li <?php echo $foll; ?>">
            <a href="<?php echo base_url("social/networkSearch"); ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/find-jobs-icon.png'); ?>" />
                </i>
                <span>
                    Find People
                </span>
            </a>
        </li>
        <li class="sidebar-li <?php echo $mycomfind; ?>">
            <a href="<?php echo base_url("communities/find"); ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/find-icon.png'); ?>" />
                </i>
                <span>
                    Find Communities
                </span>
            </a>
        </li>
        <hr class="hr-theme">
        <li class="sidebar-li sidenav-label">Profile</li>
        <li class="sidebar-li <?php echo $profile; ?>">
            <a href="<?php echo base_url("profile"); ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/profile-icon.png'); ?>" />
                </i>
                <span>
                    Profile
                </span>
            </a>
        </li>
    </ul>
</nav>