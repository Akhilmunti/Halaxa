<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>FoodLinked</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>landing/assets/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>landing/assets/foodlinked.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-sm bg-white navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="<?php echo base_url(); ?>landing/assets/images/FL-Logo.png" alt="Logo" style="width:40px;">
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
                <div class="container-fluid section-one">
                    <div class="container">
                        <div class="row">
                            <div class="col col-md-7 col-xs-12">
                                <img class="img-responsive" src="<?php echo base_url(); ?>landing/assets/images/logo.png" alt="FoodLinked Logo" width="100%">
                                <br><br>
                                <h1 class="text-justified">FOOD AND HOSPITALITY</h1>
                                <h1>Professional Business Network</h1>
                            </div>
                            <div class="col offset-md-2 col-md-3 col-xs-12 justify-content-center btns-section-one">
                                <div class="sidebar">
                                    <a href="<?php echo base_url(); ?>home/network" class="opt--a" target="_blank">
                                        <div class="opt">
                                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" />
                                            </svg>
                                            <div class="opt--text">
                                                NETWORK
                                            </div>
                                        </div> 
                                    </a>
                                    <a href="<?php echo base_url("home/jobs"); ?>" class="opt--a" target="_blank">
                                        <div class="opt">
                                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M15,18V16H6V18H15M18,14V12H6V14H18Z" />
                                            </svg>
                                            <div class="opt--text">Find a job</div>
                                        </div>
                                    </a>

                                    <a href="<?php echo base_url("home/recruit"); ?>" class="opt--a" target="_blank">
                                        <div class="opt">
                                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path  d="M6,17C6,15 10,13.9 12,13.9C14,13.9 18,15 18,17V18H6M15,9A3,3 0 0,1 12,12A3,3 0 0,1 9,9A3,3 0 0,1 12,6A3,3 0 0,1 15,9M3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3H5C3.89,3 3,3.9 3,5Z" />
                                            </svg>
                                            <div class="opt--text">Post a job</div>
                                        </div>
                                    </a>

                                    <a href="<?php echo base_url(); ?>home/sell" class="opt--a" target="_blank">
                                        <div class="opt">
                                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path  d="M13,9H11V7H13M13,17H11V11H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                                            </svg>
                                            <div class="opt--text">Sell products</div>
                                        </div>
                                    </a>

                                    <a href="<?php echo base_url(); ?>home/buy" class="opt--a" target="_blank">
                                        <div class="opt">
                                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path d="M5,20H19V18H5M19,9H15V3H9V9H5L12,16L19,9Z" />
                                            </svg>
                                            <div class="opt--text">Buy products</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="d-none d-sm-block" style="position: relative;margin-top: -30px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-15">
                            <div class="floating-card card shadow">
                                <div class="card-body text-center">
                                    <a class="text-uppercase" href="<?php echo base_url(); ?>home/network" target="_blank">Network</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15">
                            <div class="card shadow">
                                <div class="card-body text-center">
                                    <a class="text-uppercase" href="<?php echo base_url(); ?>home/jobs" target="_blank">Find a job</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15">
                            <div class="card shadow">
                                <div class="card-body text-center">
                                    <a class="text-uppercase" href="<?php echo base_url(); ?>home/recruit" target="_blank">Post a job</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15">
                            <div class="card shadow">
                                <div class="card-body text-center">
                                    <a class="text-uppercase" href="<?php echo base_url(); ?>home/sell" target="_blank">Sell products</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-15">
                            <div class="card shadow">
                                <div class="card-body text-center">
                                    <a class="text-uppercase" href="<?php echo base_url(); ?>home/buy" target="_blank">Buy products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <section>
                <div class="container-fluid section-two">
                    <div class="container">
                        <div class="row">
                            <div class="col col-md-12 col-xs-12 section-two-menu">
                                <h2 class="text-center">What is FoodLinked ?</h2>
                                <p class="text-center">FoodLinked connects buyers, sellers, employers and professionals within the food and hospitality industry to communicate, share and link their forces towards success.</p>                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section style="background-color: #f5f7fa">
                <div class="container-fluid section-two">
                    <div class="container">
                        <div class="row">
                            <div class="col col-md-12 col-xs-12 section-two-menu">
                                <div class="row mt-3 mb-5">
                                    <div class="col col-md-12 text-center">
                                        <h2> Connect, Share and Engage</h2>
                                        <p class="text-center">Connect to your Food and Hospitality fraternity through FoodLinked</p>
                                    </div>
<!--                                    <div class="col col-md-4 text-center">
                                        <h4> </h4>
                                    </div>
                                    <div class="col col-md-4 text-center">
                                        <h4> </h4>
                                    </div>-->
                                </div>
                                <div class="row mb-2" style="margin-top: -55px !important">
                                    <div class="col col-md-2 offset-md-2 text-center">
                                        <a target="_blank" style="color: #ffffff" href="<?php echo base_url(); ?>home/network" class="btn btn-light btn-block">Network</a>
                                    </div>
                                    <div class="col col-md-2 offset-md-4 text-center">
                                        <a target="_blank" style="color: #ffffff" href="<?php echo base_url(); ?>home/network" class="btn btn-light btn-block">Communities</a>
                                    </div>
                                </div>
                                <p class="text-center">Become a part of global, professional and growing business network for Food & Hospitality professionals.</p>
                                <p class="text-center">Grow your business connections and join your relevant schools, corporates, associations and communities</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container-fluid section-two">
                    <div class="container">
                        <div class="row">
                            <div class="col col-md-12 col-xs-12 section-three-menu">
                                <h2 class="text-center">Recruit and Find a job</h2>
                                <p class="text-center">We serve Food and Hospitality industry</p>
                                <div class="row mt-3 mb-3">
                                    <div class="col col-md-2 offset-md-2 text-center right">
                                        <button class="btn btn-light btn-block">Find a job</button>
                                    </div>
                                    <div class="col col-md-2 offset-md-4 text-center left">
                                        <button class="btn btn-light btn-block">Post a job</button>
                                    </div>
                                </div>
                                <div class="row mt-3 mb-3">
                                    <div class="col col-md-3 text-center">
                                        <a target="_blank" href="<?php echo base_url(); ?>home/network" class="btn btn-outline-secondary btn-block">One Click Apply</a>
                                    </div>
                                    <div class="col col-md-3 text-center">
                                        <a target="_blank" href="<?php echo base_url(); ?>home/network" class="btn btn-outline-secondary btn-block">Browse Jobs</a>
                                    </div>
                                    <div class="col col-md-3 text-center">
                                        <a target="_blank" href="<?php echo base_url(); ?>home/network" class="btn btn-outline-secondary btn-block">Hire the best talent</a>
                                    </div>
                                    <div class="col col-md-3 text-center">
                                        <a target="_blank" href="<?php echo base_url(); ?>home/network" class="btn btn-outline-secondary btn-block">Reduce Time & Effort</a>
                                    </div>
                                </div>
                                <div class="row mt-3 mb-3">
                                    <div class="col col-md-3 text-center">
                                        <a target="_blank" href="<?php echo base_url(); ?>home/network" class="btn btn-outline-secondary btn-block">Set your preference</a>
                                    </div>
                                    <div class="col col-md-3 text-center">
                                        <a target="_blank" href="<?php echo base_url(); ?>home/network" class="btn btn-outline-secondary btn-block">Track your applications</a>
                                    </div>
                                    <div class="col col-md-3 text-center">
                                        <a target="_blank" href="<?php echo base_url(); ?>home/network" class="btn btn-outline-secondary btn-block">Save money</a>
                                    </div>
                                    <div class="col col-md-3 text-center">
                                        <a target="_blank" href="<?php echo base_url(); ?>home/network" class="btn btn-outline-secondary btn-block">Increase flexibility</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section style="background-color: #f5f7fa">
                <div class="container-fluid section-three">
                    <div class="container">
                        <div class="row">
                            <div class="col col-md-12 col-xs-12 section-four-menu">
                                <h2 class="text-center">Buy and Sell</h2>
                                <h2 class="text-center">Food and Hospitality related items</h2>
                                <p class="text-center">Developed by industry professionals to serve better</p>
                                <div class="row mt-3 mb-3">
                                    <div class="col col-md-2 offset-md-2 text-center">
                                        <a target="_blank" style="color: #ffffff" href="<?php echo base_url(); ?>home/buy" class="btn btn-light btn-block">Buy Products</a>
                                    </div>
                                    <div class="col col-md-2 offset-md-4 text-center">
                                        <a target="_blank" style="color: #ffffff" href="<?php echo base_url(); ?>home/sell" class="btn btn-light btn-block">Sell Products</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col offset-md-1 col-md-4">
                                        <h2 class="text-center">Key Buyer Features​</h2>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-square-o "></i> Search thousands of products and sellers</li>
                                            <li><i class="fa fa-square-o "></i> Issue RFQs to one or multiple sellers of your choice at a time​</li>
                                            <li><i class="fa fa-square-o "></i> Compare and Negotiate Quotations</li>
                                            <li><i class="fa fa-square-o "></i> Issue Purchase Orders</li>
                                            <li><i class="fa fa-square-o "></i> Easy Re-order option</li>
                                            <li><i class="fa fa-square-o "></i> Rate and Review Sellers that you deal with</li>
                                            <li><i class="fa fa-square-o "></i> If you cannot find a product then post a public RFQ and sellers will find you​</li>
                                            <li><i class="fa fa-square-o "></i> Reduce your procurement cost by more than 20%</li>
                                            <li><i class="fa fa-square-o "></i> Get Products and Sellers recommendations based on your profile preferences​</li>
                                        </ul>
                                    </div>
                                    <div class="col offset-md-2 col-md-4">
                                        <h2 class="text-center">Key Vendor Features</h2>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-square-o "></i> Increase your sales​</li>
                                            <li><i class="fa fa-square-o "></i> Add and Manage products – upload 1,000+ products in 2 clicks</li>
                                            <li><i class="fa fa-square-o "></i> Set your delivery areas and quantities per product</li>
                                            <li><i class="fa fa-square-o "></i> Display and Promote your products</li>
                                            <li><i class="fa fa-square-o "></i> Receive RFQs</li>
                                            <li><i class="fa fa-square-o "></i> Issue Quotations</li>
                                            <li><i class="fa fa-square-o "></i> Receive Purchase Orders</li>
                                            <li><i class="fa fa-square-o "></i> Browse public Buying requests and issue quotations</li>
                                            <li><i class="fa fa-square-o "></i> Easy tools to negotiate and discuss issued quotations with Buyers​</li>
                                            <li><i class="fa fa-square-o "></i> Maintain and Track all your sale communications and transactions ​</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>

        <footer class="text-muted">
            <section>
                <div class="container-fluid footerFoodlinked">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-xs-12 col-sm-12">
                                <h5>About Us</h5>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url(); ?>home/aboutUs">What is FoodLinked ?</a></li>
                                    <li><a href="<?php echo base_url(); ?>home/story">Our story</a></li>
                                    <li><a href="<?php echo base_url(); ?>home/values">Values</a></li>
                                    <li><a href="<?php echo base_url(); ?>home/promise">Our promise to you</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-xs-12 col-sm-12">
                                <h5>Goto</h5>
                                <ul class="list-unstyled">
                                    <li><a target="_blank" href="<?php echo base_url("irs"); ?>">Find a job</a></li>
                                    <li><a target="_blank" href="<?php echo base_url("irs"); ?>">Post a job</a></li>
                                    <li><a target="_blank" href="<?php echo base_url(); ?>home/buy">Post a buying request</a></li>
                                    <li><a target="_blank" href="<?php echo base_url(); ?>home/sell">Post a product</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-xs-12 col-sm-12">
                                <h5>Support</h5>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url(); ?>home/faqs">FAQ's</a></li>
                                    <li><a href="<?php echo base_url(); ?>home/faqs">Feedback</a></li>
                                    <li><a href="<?php echo base_url(); ?>home/faqs">Report a problem</a></li>
                                    <li><a href="<?php echo base_url(); ?>home/faqs">Privacy policy</a></li>
                                    <li><a href="<?php echo base_url(); ?>home/faqs">Report abuse</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-xs-12 col-sm-12">
                                <h5>Connect with us</h5>
                                <ul class="list-unstyled">
                                    <li><a target="_blank" href="<?php echo base_url(); ?>social/login">Facebook</a></li>
                                    <li><a target="_blank" href="<?php echo base_url(); ?>social/login">Twitter</a></li>
                                    <li><a target="_blank" href="<?php echo base_url(); ?>social/login">Linkedin</a></li>
                                </ul>
                                <h5>Contact us</h5>
                                <ul class="list-unstyled">
                                    <li><a href="#">support@foodlinked.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </footer>

        <!-- Bootstrap core JavaScript
          ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="landing/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="<?php echo base_url(); ?>landing/assets/js/vendor/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>landing/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>landing/assets/js/vendor/holder.min.js"></script>
    </body>
</html>
