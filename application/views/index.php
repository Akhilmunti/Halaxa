<!DOCTYPE html>
<html lang="en">

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

    <body>
        <!-- Main -->
        <div class="main">

            <div class="header">
                <div class="top-bar">
                    <div class="container pt-3 pb-3">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12 theme-logo">
                                <img width="150" src="<?php echo base_url('assets/halaxa/images/logo.png'); ?>" />
                            </div>
                            <div class="col-lg-3 text-right col-sm-4 d-none d-sm-block">
                                <div class="dropdown show mt-2">
                                    <a class="dropdown-toggle anchor-language" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        English
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item theme-primary-color" href="#">Arabic</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 d-none d-sm-block">
                                <div class="input-group input-group-sm mt-2">
                                    <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <a href="#" class="input-group-text no-decoration" id="basic-addon2"> <i class="fa fa-search mr-1"></i> Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg navbar-dark bg-theme-gradient">
                    <div class="container">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a  style="background-color: #ff3d7a;padding-right: 10px;padding-left: 10px" class="navbar-brand text-white" href="<?php echo base_url(); ?>">
                            <i class="fa fa-home"></i>
                        </a>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

                            <style>
                                .nav-link{
                                    margin-top: 0px !important;
                                    margin-bottom: 0px !important;
                                }
                                .nav-link:hover {
                                    background-color: #ff3d7a !important;
                                }
                            </style>

                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 nav-theme-li">
                                <li class="nav-item mr-2">
                                    <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>social/home/network">NETWORK</a>
                                </li>
                                <li class="nav-item mr-2">
                                    <a target="_blank" class="nav-link" href="<?php echo base_url("social/home/jobs"); ?>">FIND JOBS</a>
                                </li>
                                <li class="nav-item mr-2">
                                    <a target="_blank" class="nav-link" href="<?php echo base_url("social/home/recruit"); ?>">RECRUIT</a>
                                </li>
                                <li class="nav-item mr-2">
                                    <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>social/home/sell">SELL</a>
                                </li>
                                <li class="nav-item mr-2">
                                    <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>social/home/buy">BUY</a>
                                </li>

                                <li class="nav-item mr-2">
                                    <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>social/partner">PARTNER</a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0">
                                <a target="_blank" href="<?php echo base_url(); ?>social/home/network" class="btn btn-transparent my-2 my-sm-0 mr-3" type="submit">Login</a>
                                <a target="_blank" href="<?php echo base_url(); ?>social/home/register/network" class="btn btn-white my-2 my-sm-0" type="submit">Signup</a>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>

            <section class="section-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="big-text mt-5">Global Hospitality Network</h1>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="links">
                                <span class="btn-circle btn-circle-dark btn-sm no-decoration mb-3">Hotel</span>
                                <span class="btn-circle btn-circle-dark btn-sm no-decoration mb-3 ml-3">Cafe</span>
                                <span class="btn-circle btn-circle-dark btn-sm no-decoration mb-3 ml-3">Restaurant</span>
                                <span class="btn-circle btn-circle-dark btn-sm no-decoration mb-3 ml-3">Spa</span>
                                <span class="btn-circle btn-circle-dark btn-sm no-decoration mb-3 ml-3">Airlines</span>
                                <span class="btn-circle btn-circle-dark btn-sm no-decoration mb-3 ml-3">Gym</span>
                                <span class="btn-circle btn-circle-dark btn-sm no-decoration mb-3 ml-3">Recruitment Agency</span>
                                <span class="btn-circle btn-circle-dark btn-sm no-decoration mb-3 ml-4">Food Supplier</span>
                                <span class="btn-circle btn-circle-dark btn-sm no-decoration mb-3 ml-4">Hospitality Talent</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5 buttons-header">
                        <div class="col-md-12">
                            <a target="_blank" href="<?php echo base_url(); ?>social/home/register/network" class="btn-joinus-home box-shadow text-white no-decoration bg-theme-gradient text-center p-3 font-20 mr-2">
                                Join Us Today
                            </a>
                            <a href="#" class="btn-joinus-home box-shadow text-white no-decoration bg-theme-gradient text-center p-3 font-20">Learn More</a>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container">
                    <h5 class="text-center mt-3 text-header">What is <?php echo PROJECT_NAME; ?> ?</h5>
                    <p class="text-center mt-3 font-18">
                        <?php echo PROJECT_NAME; ?> connects buyers, sellers, employers and professionals within the food and hospitality <br> industry to communicate, share and link their forces towards success.</p>
                    <div class="row">
                        <div class="col-md-4 p-5">

                            <div class="theme-card theme-card-one">
                                <div class="theme-card-image">
                                    <img width="100%" src="<?php echo base_url('assets/halaxa/images/business.png'); ?>" />
                                </div>
                                <div class="theme-card-header-adjust p-4"></div>
                                <a href="<?php echo base_url('home/business'); ?>" class="no-decoration text-white">
                                    <div class="font-20 font-bold theme-card-content-header bg-theme-gradient p-2 text-center">

                                        Business Network

                                    </div>
                                </a>
                                <div class="theme-card-content p-3 box-shadow text-center">
                                    <p class="text-justify">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                    <a href="<?php echo base_url('home/business'); ?>" class="no-decoration anchor-color font-18">Learn More</a>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 p-5">
                            <div class="theme-card theme-card-two">
                                <div class="theme-card-image">
                                    <img height="173" width="100%" src="<?php echo base_url('assets/halaxa/images/recruitment.png'); ?>" />
                                </div>
                                <div class="theme-card-header-adjust p-4"></div>
                                <a href="<?php echo base_url('home/recruit'); ?>" class="no-decoration text-white">
                                    <div class="font-20 font-bold theme-card-content-header bg-theme-gradient p-2 text-center">
                                        Recruitment Center
                                    </div>
                                </a>
                                <div class="theme-card-content p-3 box-shadow text-center">
                                    <p class="text-justify">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                    <a href="<?php echo base_url('home/recruit'); ?>" class="no-decoration anchor-color font-18">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-5">
                            <div class="theme-card theme-card-three">
                                <div class="theme-card-image">
                                    <img width="100%" src="<?php echo base_url('assets/halaxa/images/market.png'); ?>" />
                                </div>
                                <div class="theme-card-header-adjust p-4"></div>
                                <a href="<?php echo base_url('home/market'); ?>" class="no-decoration text-white">
                                    <div class="font-20 font-bold theme-card-content-header bg-theme-gradient p-2 text-center">
                                        Market Place
                                    </div>
                                </a>
                                <div class="theme-card-content p-3 box-shadow text-center">
                                    <p class="text-justify">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                    <a href="<?php echo base_url('home/market'); ?>" class="no-decoration anchor-color font-18">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-section">
                <div class="container pb-3">
                    <h5 class="text-center pt-3 text-header">How it works?</h5>
                    <p class="text-center pt-3 font-18">
                        <?php echo PROJECT_NAME; ?> connects buyers, sellers, employers and professionals within the food and hospitality <br> industry to communicate, share and link their forces towards success.</p>
                    <div class="row">

                        <div class="col-md-4 p-5 mb-3">

                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img class="img-fluid rounded-circle" src="<?php echo base_url('assets/halaxa/images/circle-div-contenttwo.png'); ?>" alt="Avatar">
                                    </div>
                                    <div class="flip-card-back">
                                        <img class="img-fluid rounded-circle" src="<?php echo base_url('assets/halaxa/images/circle-text.png'); ?>" alt="Avatar">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 p-5 mb-3">

                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img class="img-fluid rounded-circle" src="<?php echo base_url('assets/halaxa/images/circle-div-contentone.png'); ?>" alt="Avatar">
                                    </div>
                                    <div class="flip-card-back">
                                        <img class="img-fluid rounded-circle" src="<?php echo base_url('assets/halaxa/images/circle-text.png'); ?>" alt="Avatar">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 p-5 mb-3">

                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img class="img-fluid rounded-circle" src="<?php echo base_url('assets/halaxa/images/circle-div-contentthree.png'); ?>" alt="Avatar">
                                    </div>
                                    <div class="flip-card-back">
                                        <img class="img-fluid rounded-circle" src="<?php echo base_url('assets/halaxa/images/circle-text.png'); ?>" alt="Avatar">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 mt-3 mb-3 text-center">
                            <a href="<?php echo base_url(); ?>social/home/register/network" class="text-white mt-3 font-18 btn-circle bg-theme-gradient">Join Us</a>
                        </div>

                        <!--                        <div class="col-md-12">
                                                    <a class="no-decoration" href="#">
                                                        <div class="circle-div">
                                                            <img width="100%" src="<?php echo base_url('assets/halaxa/images/circle-div.png'); ?>" />
                                                        </div>
                                                    </a>
                                                </div>-->
                    </div>
                </div>
            </section>

            <section class="">
                <div class="container pt-4 pb-4">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <iframe frameborder="0" class="iframe" src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4">
                            </iframe>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-section p-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="post-card box-shadow">
                                <div class="row mt-3">
                                    <div class="text-center col-md-3">
                                        <h5 class="pt-4 text-header">Are you an expert ?</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-justify">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <a href="<?php echo base_url(); ?>home/partner" class="text-white mt-3 font-18 btn-circle bg-theme-gradient">Become a partner</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-section-dark">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 p-3 left-box">
                            <div class="center mt-2">
                                <h5 class="text-white font-bold font-18 text-white">About Us</h5>
                                <ul class="list-unstyled">
                                    <li><a class="anchor-language" href="<?php echo base_url('home/aboutus'); ?>">What is Halaxa ?</a></li>
                                    <li><a class="anchor-language" href="<?php echo base_url('home/story'); ?>">Our story</a></li>
                                    <li><a class="anchor-language" href="<?php echo base_url('home/values'); ?>">Values</a></li>
                                    <li><a class="anchor-language" href="<?php echo base_url('home/promise'); ?>">Our promise to you</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 p-3 middle-box">
                            <div class="center mt-2">
                                <h5 class="text-white font-bold font-18 text-white">Goto</h5>
                                <ul class="list-unstyled">
                                    <li><a class="anchor-language" target="_blank" href="<?php echo base_url("social/irs"); ?>">Find a job</a></li>
                                    <li><a class="anchor-language" target="_blank" href="<?php echo base_url("social/irs"); ?>">Post a job</a></li>
                                    <li><a class="anchor-language" target="_blank" href="<?php echo base_url(); ?>social/home/buy">Post a buying request</a></li>
                                    <li><a class="anchor-language" target="_blank" href="<?php echo base_url(); ?>social/home/sell">Post a product</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 p-3 right-box">
                            <div class="center mt-2">
                                <h5 class="text-white font-bold font-18 text-white">Support</h5>
                                <ul class="list-unstyled">
                                    <li><a class="anchor-language" href="<?php echo base_url('home/faqs'); ?>">FAQ's</a></li>
                                    <li><a class="anchor-language" href="<?php echo base_url('home/faqs'); ?>">Feedback</a></li>
                                    <li><a class="anchor-language" href="<?php echo base_url('home/report'); ?>">Report a problem</a></li>
                                    <li><a class="anchor-language" href="<?php echo base_url('home/faqs'); ?>">Privacy policy</a></li>
                                    <li><a class="anchor-language" href="<?php echo base_url('home/report'); ?>">Report abuse</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-12 m-3 text-center">
                            <div class="">
                                <span class="font-18 font-bold text-white">Contact Us</span>
                                <br>
                                <div id="social">
                                    <a class="facebookBtn smGlobalBtn" href="#" ></a>
                                    <a class="linkedinBtn smGlobalBtn" href="#" ></a>
                                </div>
                                <br>
                                <a href="#">
                                    <img style="margin-right: -50px" height="40"src="<?php echo base_url('assets/halaxa/images/visa.png'); ?>" />
                                </a>
                                <a href="#">
                                    <img height="40" src="<?php echo base_url('assets/halaxa/images/mast.png'); ?>" />
                                </a>
                                <a href="#">
                                    <img height="40" src="<?php echo base_url('assets/halaxa/images/pay.png'); ?>" />
                                </a>
                                <br>
                                <div class="text-white mt-3">
                                    Copyright © 2020 <?php echo PROJECT_NAME; ?>. <span class="d-none d-sm-inline-block"> All rights reserved</span>
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