<!--<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/halaxa/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/halaxa/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Foodlinked Partner</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
             Fonts and icons     
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
         CSS Files 
        <link href="<?php echo base_url(); ?>/home_assets/assets/halaxa/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>/home_assets/assets/halaxa/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
         CSS Just for demo purpose, don't include it in your project 
        <link href="<?php echo base_url(); ?>/home_assets/assets/halaxa/css/demo.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>partners.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>override-classes.css" rel="stylesheet" type="text/css">
    </head>

    <body class="landing-page sidebar-collapse">
         Navbar 
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
                    <a class="navbar-brand" href="<?= base_url("partner/home"); ?>" rel="tooltip" title="Foodlinked" data-placement="bottom">
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
                            <a class="nav-link" href="<?= base_url("partner/apply"); ?>">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url("partner/home/signIn"); ?>">Sign In</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
         End Navbar 
        <div class="wrapper">
            <div class="section">
                <div class="container m-t-90 m-b-30">
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            <p class="category text-center">Apply to become a <?php echo PROJECT_NAME; ?> Partner</p>
                            <div class="card">
                                <div class="card-header text-center" data-background-color="orange">
                                    <h6>What kind of partner you are?</h6>
                                </div>
                                <form id="formOne" action="<?php echo base_url('partner/apply/apply_new') ?>" method="post">
                                    <div class="card-body text-justify">
                                        <div class="body-tabs">
                                            <select name="list" id="list" accesskey="target" class="form-control" required>
                                                <optgroup>
                                                    <option value="0">Choose..</option>
                                                    <option value="1">School</option>
                                                    <option value="2">Hotel</option>
                                                    <option value="3">Association</option>
                                                    <option value="4">Influencers</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <br>
                                            <input type="submit" class="btn btn-round btn-md btn-dark" value="Next">
                                        </div>
                                    </div>
                                </form>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer footer-default">
                <div class="container">
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
       Core JS Files   
    <script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script> 
    <script src="<?php echo base_url(); ?>/home_assets/assets/halaxa/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/home_assets/assets/halaxa/js/core/bootstrap.min.js" type="text/javascript"></script>
      Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ 
    <script src="<?php echo base_url(); ?>/home_assets/assets/halaxa/js/plugins/bootstrap-switch.js"></script>
      Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker 
    <script src="<?php echo base_url(); ?>/home_assets/assets/halaxa/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
     Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc 
    <script src="<?php echo base_url(); ?>/home_assets/assets/halaxa/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
     plugin script  
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
    <style>
        optgroup { font-size:14px; }
    </style>
</html>-->

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo PROJECT_NAME; ?> | Partner</title>
        <meta content="<?php echo PROJECT_NAME; ?>" name="description" />
        <meta content="<?php echo PROJECT_NAME; ?>" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/halaxa/images/favicon.png">

        <link href="<?php echo base_url(); ?>assets/halaxa/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/halaxa/halaxa-partner.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body class="login-body">
        <!-- Main -->
        <div class="main">
            <section>
                <div class="header">
                    <nav class="navbar navbar-expand-lg bg-1 text-white">
                        <div class="container">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <a class="navbar-brand text-white" href="#">
                                <img height="30" src="<?php echo base_url('assets/halaxa/images/partner-logo.png'); ?>" />
                            </a>
                            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                <ul class="navbar-nav ml-auto mt-2 mt-lg-0 nav-theme-li">
                                    <li class="nav-item">
                                        <a href="<?= base_url("partner/home/signIn"); ?>" class="no-decoration btn btn-white font-bold my-2 my-sm-0 mr-3" type="submit">Login</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </section>

            <section class="vertical-align">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="partner-card">
                                <div class="partner-card-header">
                                    <p>WHAT KIND OF PARTNER YOU ARE?</p>
                                </div>
                            </div>
                            <div class="partner-card-content">
                                <div class="row">
                                    <div class="col-md-6 mx-auto text-center">
                                        <div class="row">
                                            <div class="col-md-4 mx-auto">
                                                <img class="mb-2 img-fluid rounded-circle" src="<?php echo base_url('assets/halaxa/images/user-light.jpg'); ?>" />
                                            </div>
                                        </div>

                                        <form id="formOne" action="<?php echo base_url('partner/apply/apply_new') ?>" method="post">
                                            <div class="form-group">
                                                <select name="list" id="list" accesskey="target" class="form-control form-control-sm" required>
                                                    <optgroup>
                                                        <option value="0">Choose..</option>
                                                        <option value="1">School</option>
                                                        <option value="2">Hotel</option>
                                                        <option value="3">Association</option>
                                                        <option value="4">Influencers</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-theme btn-block font-bold mb-5">Apply</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- End Main -->

        <!-- jQuery  -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>

</html>