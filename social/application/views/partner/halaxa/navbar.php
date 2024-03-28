<div class="header">
    <nav class="navbar navbar-expand-lg bg-1 text-white navbar-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a id="sidebarCollapse" href="#" class="no-decoration">
                <img class="sidebar-collapse-btn" src="<?php echo base_url('assets/halaxa_dashboard/images/hamburger.png'); ?>" />
            </a>
            <a class="navbar-brand text-white ml-5" href="#" class="no-decoration">
                <img height="30" src="<?php echo base_url('assets/halaxa/images/partner-logo.png'); ?>" />
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

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
                                    <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata('picture'); ?>" alt="">
                                <?php } else {
                                    ?>
                                    <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/images/user.png" alt="">
                                <?php } ?>
                            </span>
                            <?php echo $this->session->userdata('login_name'); ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url("partner/home/logout"); ?>">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>