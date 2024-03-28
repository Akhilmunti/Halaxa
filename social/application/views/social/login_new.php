<!DOCTYPE html>
<html>
    <?php $this->load->view('social/login_partials/head') ?>
    <body data-aos-easing="ease" data-aos-duration="1500" data-aos-delay="0">
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
                    } elseif ($left_content == "jobs") {
                        $this->load->view('social/login_partials/job_login');
                    } elseif ($left_content == "recruit") {
                        $this->load->view('social/login_partials/recruit_login');
                    } else {
                        $this->load->view('social/login_partials/basic_login');
                    }
                    ?>
                    <div class="col-md-5 col-lg-4 mx-auto">
                        <div class="login-form mt-0 mt-md-0">
                            <h1 class="color-5 bold">Login</h1>
                            <p class="color-2 mt-0 mb-4 mb-md-6">Don't have an account yet? <a href="<?php echo base_url('home/register/') ?><?php echo $left_content; ?>" class="accent bold"  style="margin-bottom: 0px !important;color: #477270;">Create it here</a></p>
                            <?php
                            $sucess = $this->session->flashdata('Sucess');
                            if ($sucess == NULL) {
                                $hidealert = "hide";
                            } else {
                                $showalert = $sucess;
                                $hidealert = "";
                            }
                            ?>
                            <div class="alert alert-danger <?php echo $hidealert ?>">
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
                            <div style="background-color: #ff0000;color: #ffffff" class="alert alert-danger <?php echo $hidealert ?>">
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
                            <?php
                            $social = $this->session->flashdata('social');
                            if ($social == NULL) {
                                $hidealert = "hide";
                            } else {
                                $showalert = $social;
                                $hidealert = "";
                            }
                            ?>
                            <div class="alert alert-danger <?php echo $hidealert ?>">
                                <?php echo $showalert ?>
                            </div>
                            <form action="<?php echo base_url('login/login') ?>" method="post" enctype="multipart/form-data">
                                <label class="control-label bold small text-uppercase color-2">Username</label>
                                <div class="form-group has-icon">
                                    <input required="" id="loginName" type="text" class="form-control form-control-rounded" name="Username" placeholder="Username">
                                    <i class="icon fa fa-user"></i>
                                </div>
                                <label class="control-label bold small text-uppercase color-2">Password</label>
                                <div class="form-group has-icon">
                                    <input required="" type="password" class="form-control form-control-rounded" name="Password" placeholder="Password">
                                    <i class="icon fa fa-lock"></i>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <a href="<?php echo base_url('login/forgotPassword') ?>" class="text-warning small" style="color: #707b6b important;">Forgot your password?</a>
                                    <button type="submit" class="btn btn-accent btn-rounded" style="background-color: #00C3AE; border-color: #DFF0D8;">Login <i class="fa fa-arrow-circle-right"></i></button>
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