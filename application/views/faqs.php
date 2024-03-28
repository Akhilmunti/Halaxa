<!doctype html>
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

        <main role="main">

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
                            <h1 class="big-text mt-5">Frequently Asked Questions</h1>
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
                    <div class="row mt-5 mb-5">
                        <div class="col-md-12 col-xs-12">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-circle" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                What is Halaxa?
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            Halaxa connects Sellers, Buyers, Employers and Professional Talents within the Food & Hospitality industry to communicate, share their goods and services and link their forces towards success.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-circle collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Is Halaxa FREE?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            YES. Joining Halaxa is TOTALLY FREE, and we are in process of creating certain additional premium features.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-circle collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Is it FREE to POST a JOB?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            YES. It is totally free to post any job on Halaxa.
                                        </div>
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
        </main>
        <!-- jQuery  -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>
