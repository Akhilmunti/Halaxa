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
            
            <section>
                <div class="container-fluid section-faqs">
                    <div class="container">
                        <div class="row">
                            <div class="col col-md-12 col-xs-12 text-center">
                                <h1>Frequently Asked Questions</h1>
                                <h1>FAQ's</h1>
                            </div>
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
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
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
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
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
            <section>
                <div class="jumbotron jumbotron-fluid text-center jumbo bg-light">
                    <div class="container">
                        <h1>JOIN Halaxa​</h1>
                        <button class="btn btn-light btn-md">JOIN NOW</button><br>
                        
                        <div class="links mt-3">
                            <a href="<?php echo base_url(); ?>social/home/network">Network</a>
                            <a href="<?php echo base_url("social/irs"); ?>">Recruit</a>
                            <a href="<?php echo base_url("social/irs"); ?>">Find a job</a>
                            <a href="<?php echo base_url(); ?>social/home/sell">Sell</a>
                            <a href="<?php echo base_url(); ?>social/home/buy">Buy</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Bootstrap core JavaScript
          ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="https://foodlinked.com/assets/js/vendor/popper.min.js"></script>
        <script src="https://foodlinked.com/assets/js/bootstrap.min.js"></script>
        <script src="https://foodlinked.com/assets/js/vendor/holder.min.js"></script>
    </body>
</html>
