<!DOCTYPE html>
<!-- saved from url=(0047) -->
<html lang="en" class="js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
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
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

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
                            $this->load->view('social/login_partials/basic_login');
                        }
                        ?>
                        <div class="col-md-5">
                            <div class="right-content text-center pt-5">
                                <div class="row">
                                    <div class="col-md-6 mx-auto">
                                        <h3 class="font-bold color-1">Sign Up</h3>
                                        <a class="text-dark font-14" href="<?php echo base_url('home/') ?><?php echo $left_content; ?>"><span class="anchor-color">Already registered?</span> Sign In</a>
                                        <br>
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

                                        <br><br>

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


                                        <form action="<?php echo base_url('login') ?>" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label>Name</label>
                                                <div class="input-group">
                                                    <input type="text" id="username" name="Username" class="form-control form-control-sm" placeholder="Name" value="<?php echo set_value('Username'); ?>" required> 
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <img width="15" src="<?php echo base_url('assets/halaxa/images/edit-icon.png'); ?>" />
                                                        </span>
                                                    </div>
                                                </div>           
                                            </div>

                                            <div class="form-group">
                                                <label>Email/Username</label>
                                                <div class="input-group">
                                                    <input required="" id="email" type="text" class="form-control  form-control-sm" name="Email" placeholder="Email/Username">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <img width="15" src="<?php echo base_url('assets/halaxa/images/user-icon.png'); ?>" />
                                                        </span>
                                                    </div>
                                                </div>           
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <div class="input-group">
                                                    <input  type="password" id="Password" class="form-control  form-control-sm" name="Password" placeholder="Password" value="" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <img width="15" src="<?php echo base_url('assets/halaxa/images/lock-icon.png'); ?>" />
                                                        </span>
                                                    </div>
                                                </div>           
                                            </div>


                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <div class="input-group">
                                                    <input required="" type="password" id="CPassword" class="form-control  form-control-sm" name="CPassword" placeholder="Confirm Password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <img width="15" src="<?php echo base_url('assets/halaxa/images/lock-icon.png'); ?>" />
                                                        </span>
                                                    </div>
                                                </div>           
                                            </div>
                                            <br>
                                            <button type="submit" class="btn font-bold text-white btn-signin btn-block">Sign Up</button>
                                        </form>



                                        <a class="text-dark mt-2 font-14" href="<?php echo base_url('login/forgotPassword') ?>"><span class="anchor-color">Forgot the password?</span> Click here</a>

                                        <div class="row">
                                            <div class="col-md-7 mx-auto">
                                                <hr>
                                            </div>
                                        </div>


                                        <h5 style="color: #b3b3b3">Or Sign up with</h5>

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