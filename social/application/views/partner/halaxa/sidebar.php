<!-- Sidebar  -->
<nav id="sidebar">

    <?php
    if ($sidebar == "com") {
        $com = "active";
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
    } elseif ($sidebar == "view_members") {
        $mem = "active";
        $parentmember = "show";
        $areamem = "true";
    } elseif ($sidebar == "reqs") {
        $rem = "active";
        $parentmember = "show";
        $areamem = "true";
    } elseif ($sidebar == "invite") {
        $invite = "active";
        $parentmember = "show";
        $areamem = "true";
    } elseif ($sidebar == "view_ratings") {
        $rating = "active";
    } else {
        $feeds = "";
        $mycom = "";
        $myfoll = "";
        $profile = "";
        $parentmember = "";
        $areamem = "false";
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
        <li class="sidebar-li <?php echo $com; ?>">
            <a href="<?php echo base_url('partner'); ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_partner/images/com-icon.png'); ?>" />
                </i>
                <span class="span-desc">
                    Community
                </span>
            </a>
        </li>
        <li class="sidebar-li <?php echo $rating; ?>">
            <a href="<?php echo base_url('partner/requests/viewRatings'); ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_partner/images/rat-icon.png'); ?>" />
                </i>
                <span>
                    Rating
                </span>
            </a>
        </li>
        <li class="sidebar-li <?php echo $mycom; ?>">
            <a href="<?php echo base_url('partner/school/jobList'); ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_partner/images/list-icon.png'); ?>" />
                </i>
                <span>
                    Jobs List
                </span>
            </a>
        </li>
        <?php
        $isLoggedIn = $this->session->userdata('login_id');
        $whoIsThis = $this->session->userdata('partner_type');
        ?>
        <?php if ($whoIsThis == "school") { ?>
            <hr class="hr-theme">
            <li class="sidebar-li sidenav-label">Internships</li>
            <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="span-icon">
                        <img class="img-fluid" src="<?php echo base_url('assets/halaxa_partner/images/intern-icon.png'); ?>" />
                    </i>
                    <span>
                        Internship Managment
                    </span>
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="<?php echo base_url('partner/members'); ?>">Internship circle</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('partner/receivedoffers'); ?>">Recived offers</a>
                    </li>
                </ul>
            </li>
        <?php } ?>

        <hr class="hr-theme">
        <li class="sidebar-li sidenav-label">Members</li>
        <li>
            <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="<?php echo $areamem; ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_partner/images/intern-icon.png'); ?>" />
                </i>
                <span>
                    Manage members
                </span>
            </a>
            <ul class="collapse list-unstyled <?php echo $parentmember; ?>" id="homeSubmenu2">
                <li class="<?php echo $mem; ?>">
                    <a href="<?= base_url("partner/requests/viewMembers"); ?>">View members</a>
                </li>
                <li class="<?php echo $rem; ?>">
                    <a href="<?= base_url("partner/requests"); ?>">Requests to join</a>
                </li>
                <li class="<?php echo $invite; ?>">
                    <a href="<?= base_url("partner/requests/invite"); ?>">Invite members</a>
                </li>
            </ul>
        </li>
        <hr class="hr-theme">
        <li class="sidebar-li sidenav-label">Profile</li>
        <li class="sidebar-li <?php echo $profile; ?>">
            <?php
            $isLoggedIn = $this->session->userdata('login_id');
            $whoIsThis = $this->session->userdata('partner_type');
            ?>
            <?php if ($whoIsThis == "school") { ?>
                <a href="<?php echo base_url('partner/school/edit/'); ?><?php echo $isLoggedIn; ?>">
                    <i class="span-icon">
                        <img class="img-fluid" src="<?php echo base_url('assets/halaxa_partner/images/profile-icon.png'); ?>" />
                    </i>
                    <span>
                        Profile
                    </span>
                </a>
            <?php } elseif ($whoIsThis == "hotel") { ?>
                <a href="<?php echo base_url('partner/hotel/edit/'); ?><?php echo $isLoggedIn; ?>">
                    <i class="span-icon">
                        <img class="img-fluid" src="<?php echo base_url('assets/halaxa_partner/images/profile-icon.png'); ?>" />
                    </i>
                    <span>
                        Profile
                    </span>
                </a>
            <?php } else { ?>
                <a href="<?php echo base_url('partner/association/edit/'); ?><?php echo $isLoggedIn; ?>">
                    <i class="span-icon">
                        <img class="img-fluid" src="<?php echo base_url('assets/halaxa_partner/images/profile-icon.png'); ?>" />
                    </i>
                    <span>
                        Profile
                    </span>
                </a>
            <?php } ?>

        </li>
    </ul>
</nav>