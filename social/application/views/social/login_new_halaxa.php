<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo PROJECT_NAME; ?></title>
        <meta content="<?php echo PROJECT_NAME; ?>" name="description" />
        <meta content="<?php echo PROJECT_NAME; ?>" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/halaxa/images/favicon.png">

        <link href="<?php echo base_url(); ?>assets/halaxa/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/halaxa/halaxa.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body data-aos-easing="ease" data-aos-duration="1500" data-aos-delay="0">
        <!-- Main -->
        <div class="main">

            <section class="login">
                <div class="container-fluid full">
                    <div class="row">
                        <?php
                        if ($left_content == "network") {
                            $this->load->view('social/login_partials/basic_login_new');
                        } elseif ($left_content == "sell") {
                            $this->load->view('social/login_partials/sell_login_new');
                        } elseif ($left_content == "buy") {
                            $this->load->view('social/login_partials/buy_login_new');
                        } elseif ($left_content == "recruit") {
                            $this->load->view('social/login_partials/recruit_login_new');
                        } elseif ($left_content == "jobs") {
                            $this->load->view('social/login_partials/job_login');
                        } else {
                            $this->load->view('social/login_partials/basic_login_new');
                        }
                        ?>
                        <div class="col-md-5">
                            <div class="right-content text-center pt-5">
                                <div class="row">
                                    <div class="col-md-6 mx-auto">
                                        <h3 class="font-bold color-1">Sign In</h3>
                                        <a class="text-dark font-14" href="<?php echo base_url('home/register/') ?><?php echo $left_content; ?>"><span class="anchor-color">Don't you have an account?</span> Create One</a>
                                        <br>
                                        <img class="img-fluid mt-5" src="<?php echo base_url('assets/halaxa/images/user.png'); ?>" />
                                        <h2 class="color-1">Login</h2>

                                        <?php
                                        $picerror = $this->session->flashdata('PicError');
                                        $social = $this->session->flashdata('social');
                                        $sucess = $this->session->flashdata('Sucess');
                                        $error_message = $this->session->flashdata('Error');
                                        ?>

                                        <?php if ($sucess) { ?>
                                            <div class="alert alert-success">
                                                <?php echo $sucess; ?>
                                            </div>
                                        <?php } ?>

                                        <?php if ($error_message) { ?>
                                            <div class="alert alert-danger">
                                                <?php echo $error_message; ?>
                                            </div>
                                        <?php } ?>

                                        <?php if ($picerror) { ?>
                                            <div class="alert alert-danger">
                                                <?php echo $picerror; ?>
                                            </div>
                                        <?php } ?>

                                        <?php if ($social) { ?>
                                            <div class="alert alert-danger">
                                                <?php echo $social; ?>
                                            </div>
                                        <?php } ?>

                                        <style>
                                            label{
                                                float: left;
                                                font-size: 13px;
                                                font-weight: bold;
                                                color: #666666
                                            }

                                            .input-group-text{
                                                background-color: #ffffff !important;
                                                border-right: 1px solid #ced4da;
                                                border-top: 1px solid #ced4da;
                                                border-bottom: 1px solid #ced4da;
                                                border-left: 0 !important;
                                                border-radius: 0.40rem;
                                            }

                                            .form-control {
                                                width: 100%;
                                                color: #495057;
                                                background-clip: padding-box;
                                                /* border: 1px solid #ced4da; */
                                                border-radius: 0.40rem;
                                                border-right: 0;
                                                border-top: 1px solid #ced4da;
                                                border-bottom: 1px solid #ced4da;
                                                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                                            }

                                            ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
                                                color: #cccccc !important;
                                            }
                                            ::-moz-placeholder { /* Firefox 19+ */
                                                color: #cccccc !important;
                                            }
                                            :-ms-input-placeholder { /* IE 10+ */
                                                color: #cccccc !important;
                                            }
                                            :-moz-placeholder { /* Firefox 18- */
                                                color: #cccccc !important;
                                            }
                                            input::placeholder {
                                                color: #cccccc !important;
                                            }
                                        </style>

                                        <form action="<?php echo base_url('login/login') ?>" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input required="" id="loginName" type="text" class="form-control form-control-sm" name="Username" placeholder="Email/Username">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <img width="15" src="<?php echo base_url('assets/halaxa/images/user-icon.png'); ?>" />
                                                        </span>
                                                    </div>
                                                </div>           
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input required="" type="password" class="form-control form-control-sm" name="Password" placeholder="Password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <img width="15" src="<?php echo base_url('assets/halaxa/images/lock-icon.png'); ?>" />
                                                        </span>
                                                    </div>
                                                </div>           
                                            </div>
                                            
                                            <button type="submit" class="btn font-bold text-white btn-signin btn-block">Sign In</button>
                                        </form>
                                        <a class="text-dark mt-2 font-14" href="<?php echo base_url('login/forgotPassword') ?>"><span class="anchor-color">Forgot the password?</span> Click here</a>
                                        <div class="row">
                                            <div class="col-md-7 mx-auto">
                                                <br>
                                                <hr>
                                            </div>
                                        </div>
                                        <h5 style="color: #b3b3b3">Or Sign in with</h5>

                                        <a href="<?php echo base_url('socialauthentication/facebook/network'); ?>" class="btn brand-facebook"><i class="fa fa-facebook"></i></a>
<!--                                        <a href="<?php echo base_url('socialauthentication/google/network'); ?>" class="btn brand-google"><i class="fa fa-google"></i></a>-->
                                        <a href="<?php echo base_url('socialauthentication/linkedin/network'); ?>" class="btn brand-linkedin"><i class="fa fa-linkedin"></i></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- End Main -->
        <?php $this->load->view('social/partials/assets-footer'); ?>
        <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script> 
    </body>
</html>