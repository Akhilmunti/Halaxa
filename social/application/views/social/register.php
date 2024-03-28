<!DOCTYPE html>
<!-- saved from url=(0047) -->
<html lang="en" class="js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
    <?php $this->load->view('social/login_partials/head') ?>

    <body data-aos-easing="ease" data-aos-duration="1500" data-aos-delay="0">
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <main>
            <div class="container-fluid">
                <div class="row align-items-center">
                    <?php
                    if ($left_content == "network") {
                        $this->load->view('social/login_partials/basic_login');
                    } elseif ($left_content == "sell") {
                        $this->load->view('social/login_partials/sell_login');
                    } elseif ($left_content == "buy") {
                        $this->load->view('social/login_partials/buy_login');
                    } elseif ($left_content == "recruit") {
                        $this->load->view('social/login_partials/recruit_login');
                    } elseif ($left_content == "jobs") {
                        $this->load->view('social/login_partials/job_login');
                    } else {
                        $this->load->view('social/login_partials/basic_login');
                    }
                    ?>
                    <div class="col-md-5 col-lg-4 mx-auto">
                        <div class="login-form mt-0 mt-md-0">
                           <!--<img src="./Foodlinked_Sample/logo.png" class="logo img-responsive mb-4 mb-md-6" alt="" style="max-width: 60px;">-->
                            <h1 class="color-5 bold">Sign Up</h1>
                            <p class="color-2 mt-0 mb-4 mb-md-6" style="margin-bottom: 35px !important;">Already Registered? <a href="<?php echo base_url('home/') ?><?php echo $left_content; ?>" class="accent bold"  style="margin-bottom: 0px !important;color: #477270;">Sign In</a></p>
                            <?php
                            $social = $this->session->flashdata('social');
                            if ($social == NULL) {
                                $hidealert = "hide";
                            } else {
                                $showalert = $social;
                                $hidealert = "";
                            }
                            ?>
                            <div class="alert alert-success <?php echo $hidealert ?>">
                                <?php echo $showalert ?>
                            </div>
                            <?php
                            $sucess = $this->session->flashdata('Sucess');
                            if ($sucess == NULL) {
                                $hidealert = "hide";
                            } else {
                                $showalert = $sucess;
                                $hidealert = "";
                            }
                            ?>
                            <div class="alert alert-success <?php echo $hidealert ?>">
                                <?php echo $showalert ?>
                            </div>

                            <?php
                            $error_message = $this->session->flashdata('Error');
                            if ($error_message == NULL) {
                                $hidealert = "hide";
                            } else {
                                $showalert = $error_message;
                                $hidealert = "";
                            }
                            ?>
                            <div class="alert alert-success <?php echo $hidealert ?>">
                                <?php echo $showalert ?>
                            </div>

                            <?php
                            $picerror = $this->session->flashdata('PicError');
                            if ($picerror == NULL) {
                                $hidealert = "hide";
                            } else {
                                $showalert = $picerror;
                                $hidealert = "";
                            }
                            ?>
                            <div class="alert alert-success <?php echo $hidealert ?>">
                                <?php echo $showalert ?>
                            </div>
                            <form action="<?php echo base_url('login') ?>" method="post" enctype="multipart/form-data">
                                <label class="control-label bold small text-uppercase color-2">Name</label>
                                <div class="form-group has-icon">
                                    <input type="text" id="username" name="Username" class="form-control form-control-rounded" placeholder="Name" value="<?php echo set_value('Username'); ?>" required> 
                                    <i class="icon fa fa-user"></i>
                                </div>
                                <label class="control-label bold small text-uppercase color-2">Email/Username</label>
                                <div class="form-group has-icon">
                                    <input required="" id="email" type="text" class="form-control form-control-rounded" name="Email" placeholder="Email/Username">
                                    <i class="icon fa fa-envelope-square"></i>
                                </div>
                                <label class="control-label bold small text-uppercase color-2">Password</label>
                                <div class="form-group has-icon">
                                    <input  type="password" id="Password" class="form-control form-control-rounded" name="Password" placeholder="Password" value="" required>
                                    <i class="icon fa fa-lock"></i>
                                </div>
                                <label class="control-label bold small text-uppercase color-2">Confirm Password</label>
                                <div class="form-group has-icon">
                                    <input required="" type="password" id="CPassword" class="form-control form-control-rounded" name="CPassword" placeholder="Confirm Password">
                                    <i class="icon fa fa-lock"></i>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="ajax-button right">
                                        <button type="submit" class="btn btn-accent btn-rounded" style="background-color: #00C3AE; border-color: #DFF0D8;">Sign Up <i class="fa fa-arrow-circle-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php $this->load->view('social/partials/assets-footer'); ?>
        <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script> 

    </body>
</html>