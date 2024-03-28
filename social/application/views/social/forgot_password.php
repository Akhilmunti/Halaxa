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
                        <?php $this->load->view('social/login_partials/basic_login_new'); ?>
                        <div class="col-md-5">
                            <div class="right-content text-center pt-5">
                                <div class="row">
                                    <div class="col-md-6 mx-auto">
                                        <h3 class="font-bold color-1">Forgot Password ?</h3>
                                        <a class="text-dark font-14" href="<?php echo base_url('home/network/') ?>"><span class="anchor-color">Already Registered?</span> Sign In</a>
                                        <br>
                                        <img class="img-fluid mt-5" src="<?php echo base_url('assets/halaxa/images/user.png'); ?>" />
                                        <br><br>
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

                                        <form action="<?php echo base_url('login/sendPassword') ?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input required="" id="email" type="text" class="form-control form-control-sm" name="email" placeholder="Email">
                                            </div>
                                            <button type="submit" class="btn font-bold text-white btn-signin btn-block">Send password reset info</button>
                                        </form>
                                        <hr>

                                        <i class="warning-text small text-justify">
                                            It may take several minutes to receive a password reset email, Make sure to check your junk mail.
                                        </i>


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