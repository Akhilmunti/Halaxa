<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo PROJECT_NAME; ?> | Market Place</title>
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
                                        <span class="input-group-text" id="basic-addon2"> <i class="fa fa-search mr-1"></i> Search</span>
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
                        <a class="navbar-brand text-white" href="<?php echo base_url(); ?>">
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

            <section class="section-header-business">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 text-center mt-5">
                            <h1 class="big-text-recruit mt-5">Market Place</h1>
                            <h4>Search thousands of products and sellers</h4>
                        </div>
                        <div class="col-lg-4 mx-auto img-wrapper">
                            <img src="<?php echo base_url('assets/halaxa/images/header-image-market.png'); ?>" class="img-fluid mt-2 market-top-image" />
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 p-5 buy-image">
                            <div class="img-magnifier-container">
                                <img id="buyer" src="<?php echo base_url('assets/halaxa/images/market-two.png'); ?>" class="img-fluid" />
                            </div>
                        </div>
                        <div class="col-md-6 p-5 text-left">
                            <div class="vertical-center">
                                <h1 class="font-bold color-business">Key Buyer Features</h1>
                                <ul class="list-unstyled">
                                    <li>
                                        Search thousands of products and sellers
                                    </li>
                                    <li>
                                        Issue RFQs to one or multiple sellers of your choice at a time​
                                    </li>
                                    <li>
                                        Compare and Negotiate Quotations
                                    </li>
                                    <li>
                                        Easy Re-order option
                                    </li>
                                </ul>
                                <a href="<?php echo base_url(); ?>social/home/register/buy" class="no-decoration">
                                    <span style="height: 40px;font-size: 22px;background-color: #f68723" class="btn text-white">Join Now</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 p-5 text-left">
                            <div class="vertical-center">
                                <h1 class="font-bold color-business">Key Seller Features</h1>
                                <ul class="list-unstyled">
                                    <li>
                                        Search thousands of products and sellers
                                    </li>
                                    <li>
                                        Issue RFQs to one or multiple sellers of your choice at a time​
                                    </li>
                                    <li>
                                        Compare and Negotiate Quotations
                                    </li>
                                    <li>
                                        Easy Re-order option
                                    </li>
                                </ul>
                                <a href="<?php echo base_url(); ?>social/home/register/sell" class="no-decoration">
                                    <span style="height: 40px;font-size: 22px;background-color: #f68723" class="btn btn-signin text-white">Join Now</span>
                                </a>
                            </div>

                        </div>
                        <div class="col-md-6 p-5 sell-image">
                            <div class="img-magnifier-container">
                                <img id="myimage" src="<?php echo base_url('assets/halaxa/images/market-one.png'); ?>" class="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="">
                <div class="container pb-3">
                    <h1 class="font-bold text-center pt-3 color-business">General Features</h1>
                    <p class="text-center font-18">
                        Search thousands of products Issue RFQ's to one or multiple
                    </p>
                    <div class="row">
                        <div class="col-md-10 mx-auto general-block">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-3">
                                            <div class="general-img">
                                                <img class="img-fluid" src="<?php echo base_url('assets/halaxa/images/reli.png'); ?>" /> 
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-sm-9 text-left pt-2">
                                            <h3>Reliable & Secure</h3>
                                        </div>
                                        <div class="col-lg-12">
                                            <ul class="list-unstyled">
                                                <li>
                                                    Search thousands of products and sellers
                                                </li>
                                                <li>
                                                    Issue RFQs to one or multiple sellers of your choice at a time​
                                                </li>
                                                <li>
                                                    Compare and Negotiate Quotations
                                                </li>
                                                <li>
                                                    Easy Re-order option
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-3">
                                            <div class="general-img">
                                                <img class="img-fluid" src="<?php echo base_url('assets/halaxa/images/flexible.png'); ?>" /> 
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-sm-9 text-left pt-2">
                                            <h3>Flexible</h3>
                                        </div>
                                        <div class="col-lg-12">
                                            <ul class="list-unstyled">
                                                <li>
                                                    Search thousands of products and sellers
                                                </li>
                                                <li>
                                                    Issue RFQs to one or multiple sellers of your choice at a time​
                                                </li>
                                                <li>
                                                    Compare and Negotiate Quotations
                                                </li>
                                                <li>
                                                    Easy Re-order option
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-3">
                                            <div class="general-img mx-auto">
                                                <img class="img-fluid" src="<?php echo base_url('assets/halaxa/images/freee.png'); ?>" /> 
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-sm-9 text-left pt-2">
                                            <h3>Free</h3>
                                        </div>
                                        <div class="col-lg-12">
                                            <ul class="list-unstyled">
                                                <li>
                                                    Search thousands of products and sellers
                                                </li>
                                                <li>
                                                    Issue RFQs to one or multiple sellers of your choice at a time​
                                                </li>
                                                <li>
                                                    Compare and Negotiate Quotations
                                                </li>
                                                <li>
                                                    Easy Re-order option
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-3">
                                            <div class="general-img mx-auto">
                                                <img class="img-fluid" src="<?php echo base_url('assets/halaxa/images/save-cost.png'); ?>" /> 
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-sm-9 text-left pt-2">
                                            <h3>Save Cost</h3>
                                        </div>
                                        <div class="col-lg-12">
                                            <ul class="list-unstyled">
                                                <li>
                                                    Search thousands of products and sellers
                                                </li>
                                                <li>
                                                    Issue RFQs to one or multiple sellers of your choice at a time​
                                                </li>
                                                <li>
                                                    Compare and Negotiate Quotations
                                                </li>
                                                <li>
                                                    Easy Re-order option
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-3">
                                            <div class="general-img mx-auto">
                                                <img class="img-fluid" src="<?php echo base_url('assets/halaxa/images/save-time.png'); ?>" /> 
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-sm-9 text-left pt-2">
                                            <h3>Save Time</h3>
                                        </div>
                                        <div class="col-lg-12">
                                            <ul class="list-unstyled">
                                                <li>
                                                    Search thousands of products and sellers
                                                </li>
                                                <li>
                                                    Issue RFQs to one or multiple sellers of your choice at a time​
                                                </li>
                                                <li>
                                                    Compare and Negotiate Quotations
                                                </li>
                                                <li>
                                                    Easy Re-order option
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-3">
                                            <div class="general-img mx-auto">
                                                <img class="img-fluid" src="<?php echo base_url('assets/halaxa/images/indus.png'); ?>" /> 
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-sm-9 text-left pt-2">
                                            <h3>Industry focused</h3>
                                        </div>
                                        <div class="col-lg-12">
                                            <ul class="list-unstyled">
                                                <li>
                                                    Search thousands of products and sellers
                                                </li>
                                                <li>
                                                    Issue RFQs to one or multiple sellers of your choice at a time​
                                                </li>
                                                <li>
                                                    Compare and Negotiate Quotations
                                                </li>
                                                <li>
                                                    Easy Re-order option
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <section class="pt-5 pb-5 bg-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="<?php echo base_url(); ?>social/home/register/buy" class="anchor-language">
                                <h1 class="font-bold text-what">What are you waiting for ? <span style="height: 40px;font-size: 22px" class="btn btn-signin text-white">Join Now</span></h1>
                            </a>
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
                                    <li><a class="anchor-language" href="<?php echo base_url('social/home/aboutus'); ?>">What is Halaxa ?</a></li>
                                    <li><a class="anchor-language" href="<?php echo base_url('social/home/story'); ?>">Our story</a></li>
                                    <li><a class="anchor-language" href="<?php echo base_url('social/home/values'); ?>">Values</a></li>
                                    <li><a class="anchor-language" href="<?php echo base_url('social/home/promise'); ?>">Our promise to you</a></li>
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
        <script>

            function magnify(imgID, zoom) {
                var img, glass, w, h, bw;
                img = document.getElementById(imgID);

                /* Create magnifier glass: */
                glass = document.createElement("DIV");
                glass.setAttribute("class", "img-magnifier-glass");

                /* Insert magnifier glass: */
                img.parentElement.insertBefore(glass, img);

                /* Set background properties for the magnifier glass: */
                glass.style.backgroundImage = "url('" + img.src + "')";
                glass.style.backgroundRepeat = "no-repeat";
                glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
                bw = 3;
                w = glass.offsetWidth / 2;
                h = glass.offsetHeight / 2;

                /* Execute a function when someone moves the magnifier glass over the image: */
                glass.addEventListener("mousemove", moveMagnifier);
                img.addEventListener("mousemove", moveMagnifier);

                /*and also for touch screens:*/
                glass.addEventListener("touchmove", moveMagnifier);
                img.addEventListener("touchmove", moveMagnifier);
                function moveMagnifier(e) {
                    var pos, x, y;
                    /* Prevent any other actions that may occur when moving over the image */
                    e.preventDefault();
                    /* Get the cursor's x and y positions: */
                    pos = getCursorPos(e);
                    x = pos.x;
                    y = pos.y;
                    /* Prevent the magnifier glass from being positioned outside the image: */
                    if (x > img.width - (w / zoom)) {
                        x = img.width - (w / zoom);
                    }
                    if (x < w / zoom) {
                        x = w / zoom;
                    }
                    if (y > img.height - (h / zoom)) {
                        y = img.height - (h / zoom);
                    }
                    if (y < h / zoom) {
                        y = h / zoom;
                    }
                    /* Set the position of the magnifier glass: */
                    glass.style.left = (x - w) + "px";
                    glass.style.top = (y - h) + "px";
                    /* Display what the magnifier glass "sees": */
                    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
                }

                function getCursorPos(e) {
                    var a, x = 0, y = 0;
                    e = e || window.event;
                    /* Get the x and y positions of the image: */
                    a = img.getBoundingClientRect();
                    /* Calculate the cursor's x and y coordinates, relative to the image: */
                    x = e.pageX - a.left;
                    y = e.pageY - a.top;
                    /* Consider any page scrolling: */
                    x = x - window.pageXOffset;
                    y = y - window.pageYOffset;
                    return {x: x, y: y};
                }
            }

            $(document).ready(function () {

                $(".sell-image").on({
                    mouseenter: function () {
                        //stuff to do on mouse enter
                        magnify("myimage", 2);
                    },
                    mouseleave: function () {
                        //stuff to do on mouse leave
                        $(".img-magnifier-glass").remove();
                    }
                });
                
                
                $(".buy-image").on({
                    mouseenter: function () {
                        //stuff to do on mouse enter
                        magnify("buyer", 2);
                    },
                    mouseleave: function () {
                        //stuff to do on mouse leave
                        $(".img-magnifier-glass").remove();
                    }
                });




            });


        </script>

    </body>

</html>