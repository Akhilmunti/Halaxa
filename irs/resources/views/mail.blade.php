<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo Config::get('constants.base.app_name'); ?></title>
        <meta content="<?php echo Config::get('constants.base.app_name'); ?>" name="description" />
        <meta content="<?php echo Config::get('constants.base.app_name'); ?>" name="author" />
        <script src="{{ asset('public/js/app.js') }}" defer></script>
        <link rel="shortcut icon" href="<?php echo url('/'); ?>/assets/images/favicon.png">

        <link href="<?php echo url('/'); ?>/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo url('/'); ?>/assets/halaxa.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <!-- Main -->
        <div class="main">

            <div class="header mb-5">
                <nav class="navbar py-0 navbar-expand-lg navbar-dark bg-theme-gradient">
                    <div class="container">

                    </div>
                </nav>
            </div>

            <div class="">
                <?php echo url('/'); ?>/assets/halaxa.css
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 mx-auto">
                            <img class="img-fluid" src="<?php echo url('assets/images/logo.png'); ?>" />
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-8 mx-auto">
                            <div class="card theme-card p-3">
                                <h6 class="text-left font-size-14"><b class="text-dark">Hello <?php echo $to_name?></b></h6>
                                <p class="font-size-14 text-left text-dark mb-3 mt-3">
                                    <?php echo $mail_title;?>
                                </p>
                                <p class="font-size-14 text-left text-dark mb-3">
                                    <?php echo $mail_body_one;?>.
                                </p>
                                <p class="font-size-14 text-left text-dark mb-3">
                                   <?php echo $mail_body_two;?>
                                </p>
                                <h6 class="text-left font-size-14 mt-3">
                                    <b class="text-dark">
                                        Thank You ! <br>
                                        Halaxa Team
                                    </b>
                                </h6>
                            </div>
                        </div>
                    </div>


                    <style>
                        #social {
                            margin: 0px 0px;
                            text-align: center;
                        }

                        .smGlobalBtn { /* global button class */
                            display: inline-block;
                            position: relative;
                            cursor: pointer;
                            width: 30px;
                            height: 30px;
                            border:1px solid #343a40; /* add border to the buttons */
                            padding: 0px;
                            text-decoration: none;
                            text-align: center;
                            color:#343a40;
                            font-size: 15px;
                            font-weight: normal;
                            line-height: 2em;
                            border-radius: 27px;
                            -moz-border-radius:27px;
                            -webkit-border-radius:27px;
                        }

                        /* facebook button class*/
                        .facebookBtn{
                        }

                        .facebookBtn:before{ /* use :before to add the relevant icons */
                            font-family: "FontAwesome";
                            content: "\f09a"; /* add facebook icon */
                        }

                        .facebookBtn:hover{
                            color: #4060A5;
                            background: #fff;
                            border-color: #4060A5; /* change the border color on mouse hover */
                        }

                        /* twitter button class*/
                        .twitterBtn{
                            background: #00ABE3;
                        }

                        .twitterBtn:before{
                            font-family: "FontAwesome";
                            content: "\f099"; /* add twitter icon */

                        }

                        .twitterBtn:hover{
                            color: #00ABE3;
                            background: #fff;
                            border-color: #00ABE3;
                        }
                        /* google plus button class*/
                        .googleplusBtn{
                            background: transparent;
                        }

                        .googleplusBtn:before{
                            font-family: "FontAwesome";
                            content: "\f0d5"; /* add googleplus icon */
                        }

                        .googleplusBtn:hover{
                            color: #e64522;
                            background: #fff;
                            border-color: #e64522;
                        }

                        /* linkedin button class*/
                        .linkedinBtn{
                        }

                        .linkedinBtn:before{
                            font-family: "FontAwesome";
                            content: "\f0e1"; /* add linkedin icon */
                        }

                        .linkedinBtn:hover{
                            color: #0094BC;
                            background: #fff;
                            border-color: #0094BC;
                        }

                        /* pinterest button class*/
                        .pinterestBtn{
                            background: #cb2027;
                        }

                        .pinterestBtn:before{
                            font-family: "FontAwesome";
                            content: "\f0d2"; /* add pinterest icon */
                        }

                        .pinterestBtn:hover{
                            color: #cb2027;
                            background: #fff;
                            border-color: #cb2027;
                        }

                        /* tumblr button class*/
                        .tumblrBtn{
                            background: #3a5876;
                        }

                        .tumblrBtn:before{
                            font-family: "FontAwesome";
                            content: "\f173"; /* add tumblr icon */
                        }

                        .tumblrBtn:hover{
                            color: #3a5876;
                            background: #fff;
                            border-color: #3a5876;
                        }
                    </style>
                    <footer>
                        <div class="mt-5">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div id="social">
                                        <span class="font-18 font-bold text-dark">Contact Us</span>
                                        <a class="facebookBtn smGlobalBtn" href="#" ></a>
                                        <a class="googleplusBtn smGlobalBtn" href="#" ></a>
                                        <a class="linkedinBtn smGlobalBtn" href="#" ></a>
                                    </div>
                                    <a href="#" class="font-size-11 no-decoration text-dark"><b>Copyrights 2020 Halaxa, All rights reserved</b></a>
                                </div>
                            </div>  
                        </div>
                    </footer>

                </div>



            </div>

        </div>
        <!-- End Main -->

        <!-- jQuery  -->
        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <script src="<?php echo url('assets/app.js'); ?>"></script>
        <script src="<?php echo url('assets/slider.js'); ?>"></script>


        <script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/0.5.6/dist/progressbar.js"></script>

    </body>

</html>