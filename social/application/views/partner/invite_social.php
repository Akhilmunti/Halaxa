<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('partner/halaxa/header'); ?>

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('partner/halaxa/navbar'); ?>

            <div class="wrapper">
                <!-- Sidebar -->
                <?php $this->load->view('partner/halaxa/sidebar'); ?>

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $this->load->view('partner/halaxa/alerts'); ?>
                            </div>
                            <div class="col-md-8">
                                <div class="theme-card mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="post-card p-3">
                                                <span class="text-dark-theme-bold font">
                                                    Invite Members
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <img style="background-color: #F4F7FA" class="img-fluid p-5" src="<?php echo base_url('assets/halaxa_partner/images/invite-back.png'); ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="post-card p-3 text-center">
                                                <span class="sidenav-label">
                                                    Invite Through Social Networks
                                                </span><br>
                                                <a target="_blank" href="http://www.facebook.com/sharer.php?u=http://staging.foodlinked.co.in" class='facebook btn-primary btn mt-2' rel='nofollow'><span class='square'><i class='fa fa-facebook mr-3'></i></span><span class='title'>Facebook</span></a> 
                                                <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=http://staging.foodlinked.co.in" class='linkedin btn-primary btn mt-2' rel='nofollow'><span class='square'><i class='fa fa-linkedin mr-3'></i></span><span class='title'>LinkedIn</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Main -->

        <!-- jQuery  -->
        <?php $this->load->view('partner/halaxa/scripts'); ?>
    </body>

</html>