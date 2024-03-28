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
        <header>
            <nav class="navbar navbar-expand-sm bg-white navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="<?php echo base_url('assets/halaxa/images/logo.png'); ?>" alt="Logo" style="width:150px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>home/network">NETWORK</a>
                            </li>
                            <li class="nav-item">
                                <a target="_blank" class="nav-link" href="<?php echo base_url("home/jobs"); ?>">JOBS</a>
                            </li>
                            <li class="nav-item">
                                <a target="_blank" class="nav-link" href="<?php echo base_url("home/recruit"); ?>">RECRUIT</a>
                            </li>
                            <li class="nav-item">
                                <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>home/sell">SELL</a>
                            </li>
                            <li class="nav-item">
                                <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>home/buy">BUY</a>
                            </li>

                            <li class="nav-item">
                                <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>social/partner">PARTNER</a>
                            </li>

                            <form class="form-inline my-2 my-lg-0">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary btn-sm" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            <li class="nav-item">
                                <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>home/register/network">JOIN</a>
                            </li>
                            <li class="nav-item">
                                <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>home/network">LOGIN</a>
                            </li>
                        </ul>

                    </div>
                </div>

            </nav>
        </header>

        <main role="main">
            <section>
                <div class="container-fluid section-faqs">
                    <div class="container">
                        <div class="row">
                            <div class="col col-md-12 col-xs-12 text-center">
                                <h1>About Us</h1>
                                <h1>Food & Hospitality</h1>
                                <h4 style="color: #ffffff">Professional Business Network</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="jumbotron jumbotron-fluid text-center jumbo bg-white">
                    <div class="container">
                        <h1>What is HALAXA?</h1>
                        <p>Halaxa connects Sellers, Buyers, Employers and Professional Talents within the Food & Hospitality industry to communicate, share their goods and services and link their forces towards success.</p>
                    </div>
                </div>
            </section>
            <section>
                <div class="jumbotron jumbotron-fluid text-center jumbo bg-light">
                    <div class="container">
                        <h1>JOIN Halaxa</h1>
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
