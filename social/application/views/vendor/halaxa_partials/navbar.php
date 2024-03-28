<div class="header">
    <nav class="navbar py-0 navbar-expand-lg navbar-dark bg-theme-gradient">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a id="sidebarCollapse" href="#" class="no-decoration">
                <img class="sidebar-collapse-btn" src="<?php echo base_url('assets/halaxa_dashboard/images/hamburger.png'); ?>" />
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <?php
                if ($navbar == "buyer") {
                    $buyer = "active";
                    $network = "";
                } elseif ($navbar == "seller") {
                    $buyer = "";
                    $seller = "active";
                    $network = "";
                } else {
                    $network = "";
                    $buyer = "";
                    $seller = "";
                }
                ?>
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0 nav-theme-li">
                    <li class="nav-item mr-2 <?php echo $network; ?>">
                        <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>social">NETWORK</a>
                    </li>
                    <li class="nav-item mr-2">
                        <a target="_blank" class="nav-link" href="<?php echo base_url("irs"); ?>?path=job_seeker/jobs">FIND JOBS</a>
                    </li>
                    <li class="nav-item mr-2">
                        <a target="_blank" class="nav-link" href="<?php echo base_url("irs"); ?>?path=employer/campusrecruitement">RECRUIT</a>
                    </li>
                    <li class="nav-item mr-2 <?php echo $seller; ?>">
                        <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>vendor">SELL</a>
                    </li>
                    <li class="nav-item mr-2 <?php echo $buyer; ?>">
                        <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>buyer">BUY</a>
                    </li>

                    <li class="nav-item mr-2">
                        <a target="_blank" class="nav-link" href="#">PARTNER</a>
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
                                <?php if ($this->session->userdata('Photo')) {
                                    ?>
                                    <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/photo/<?php echo $this->session->userdata('Photo'); ?>" alt="">
                                <?php } else {
                                    ?>
                                    <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/images/user.png" alt="">
                                <?php } ?>
                            </span>
                            <?php echo $this->session->userdata('Username'); ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url("profile"); ?>">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url('login/logout'); ?>">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>


        </div>
    </nav>
</div>