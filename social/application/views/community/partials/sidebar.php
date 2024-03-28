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
    //echo $sidebar;
    if ($sidebar == "com") {
        $feeds = "";
        $mycom = "active";
    } elseif ($sidebar == "mycom") {
        $mycom = "active";
    } elseif ($sidebar == "findc") {
        $mycomfind = "active";
    } elseif ($sidebar == "myfoll") {
        $myfoll = "active";
    } elseif ($sidebar == "foll") {
        $foll = "active";
    } elseif ($sidebar == "rate") {
        $rate = "active";
    }  else if ($sidebar == "jobList") {
        $jobList = "active";
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
        <li class="sidebar-li">
            <a href="<?php echo base_url(); ?>communities/user">
                <i class="span-icon fa fa-arrow-left"></i>
                <span class="span-desc">
                    Community List
                </span>
            </a>
        </li>
        <hr class="hr-theme">
        <li class="sidebar-li <?php echo $mycom; ?>">
            <a href="<?php echo base_url('communities/getTopics/') . $com_key; ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_partner/images/com-icon.png'); ?>" />
                </i>
                <span class="span-desc">
                    Community
                </span>
            </a>
        </li>
        <li class="sidebar-li <?php echo $rate; ?>">
            <a href="<?php echo base_url('communities/rateCommunity/') . $com_key; ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_partner/images/rat-icon.png'); ?>" />
                </i>
                <span>
                    Rating
                </span>
            </a>
        </li>
        <li class="sidebar-li <?php echo $jobList; ?>">
            <a href="<?php echo base_url('communities/jobList/') . $com_key; ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_partner/images/list-icon.png'); ?>" />
                </i>
                <span>
                    Jobs List
                </span>
            </a>
        </li>
        <hr class="hr-theme">
    </ul>
</nav>