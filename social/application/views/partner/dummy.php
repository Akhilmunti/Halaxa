<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Foodlinked Partner</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <!-- CSS Files -->
        <link href="<?php echo base_url(); ?>/home_assets/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>/home_assets/assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="<?php echo base_url(); ?>/home_assets/assets/css/demo.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>partners.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>override-classes.css" rel="stylesheet" type="text/css">
    </head>

    <body class="landing-page sidebar-collapse">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-primary fixed-top">
            <div class="container">
                <div class="dropdown button-dropdown">
                    <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                        <span class="button-bar"></span>
                        <span class="button-bar"></span>
                        <span class="button-bar"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-header">Dropdown header</a>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">One more separated link</a>
                    </div>
                </div>
                <div class="navbar-translate">
                    <a class="navbar-brand" href="#" rel="tooltip" title="Foodlinked" data-placement="bottom">
                        Foodlinked Partner
                    </a>
                    <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url("partner/apply"); ?>">Apply Here</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url("partner/home/signIn"); ?>">Sign Up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="wrapper">
            <div class="section">
                <div class="container m-t-90 m-b-30">
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            <div class="card">
                                <div class="card-header text-center" data-background-color="orange">
                                    <p>Sign in to the FoodLinked Partner Admin Panel</p>
                                </div>
                                <div class="card-body text-justify">
                                    <form id="Form" method="POST" action="<?php echo base_url() . "partner/home/signIn"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                                            <select name="log_type" id="log_type" accesskey="target" class="form-control" required>
                                                <option value="0" <?php
                                                if (set_value('log_type') == '0') {
                                                    echo 'selected';
                                                }
                                                ?>>Choose..</option>
                                                <option value="1" <?php
                                                if (set_value('log_type') == '1') {
                                                    echo 'selected';
                                                }
                                                ?>>School</option>
                                                <option value="2" <?php
                                                if (set_value('log_type') == '2') {
                                                    echo 'selected';
                                                }
                                                ?>>Hotel/Corporate</option>
                                                <option value="3" <?php
                                                if (set_value('log_type') == '3') {
                                                    echo 'selected';
                                                }
                                                ?>>Association</option>                                                        
                                            </select>
                                        </div>
                                        <?php if (form_error('log_type')) { ?><span style="color: #E68F8F;"><?php echo form_error('log_type'); ?></span> <?php } ?>
                                        <span class="help-block"></span>
                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>">
                                        </div>
                                        <?php if (form_error('username')) { ?><span style="color: #E68F8F;"><?php echo form_error('username'); ?></span> <?php } ?>

                                        <span class="help-block"></span>
                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input  type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <?php if (form_error('password')) { ?><span style="color: #E68F8F;"><?php echo form_error('password'); ?></span> <?php } ?>
                                        <input type="submit" value="Sign In" class="btn btn-lg btn-dark btn-block">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer footer-default">
                <div class="container">
                    <nav>
                        <ul>
                            <li>
                                <a href="<?= base_url("partner/apply"); ?>">
                                    Apply Here
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        <a href="#" target="_blank">Foodlinked Social</a>.
                    </div>
                </div>
            </footer>
        </div>
    </body>
    <!--   Core JS Files   -->
    <script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script> 
    <script src="<?php echo base_url(); ?>/home_assets/assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/home_assets/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="<?php echo base_url(); ?>/home_assets/assets/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
    <script src="<?php echo base_url(); ?>/home_assets/assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo base_url(); ?>/home_assets/assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
    <!-- plugin script --> 
    <script src="<?php echo base_url(); ?>build/js/jquery.mThumbnailScroller.js"></script> 
    <script>
                            (function ($) {
                                $(window).load(function () {

                                    $("#content-1").mThumbnailScroller({
                                        type: "click-50",
                                        theme: "buttons-in"
                                    });

                                    $("#content-2").mThumbnailScroller({
                                        type: "click-50",
                                        theme: "buttons-in"
                                    });

                                    $("#content-3").mThumbnailScroller({
                                        type: "click-50",
                                        theme: "buttons-in"
                                    });

                                });
                            })(jQuery);
    </script>
</html>