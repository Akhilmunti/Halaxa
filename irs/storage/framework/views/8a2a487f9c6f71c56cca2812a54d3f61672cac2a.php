<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo Config::get('constants.base.app_name'); ?></title>
        <meta content="<?php echo Config::get('constants.base.app_name'); ?>" name="description" />
        <meta content="<?php echo Config::get('constants.base.app_name'); ?>" name="author" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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

                <div class="container">
                    <div class="row">
                        <div class="col-md-3 mx-auto">
                            <img class="img-fluid" src="<?php echo url('assets/images/logo.png'); ?>" />
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-8 mx-auto">
                            <div class="card theme-card p-3">
                                <h6 class="text-left font-size-14"><b class="text-dark">Hello XYZ</b></h6>
                                <p class="font-size-14 text-left text-dark mb-3 mt-3">
                                    Recruiter Profile Created.
                                </p>
                                <p class="font-size-14 text-left text-dark mb-3">
                                    You have successfully setup your recruiter profile, We cannot wait to see your first job post on Halaxa.
                                </p>
                                <p class="font-size-14 text-left text-dark mb-3">
                                    Please check below details : <br>
                                    Recruiter name : XYZ <br>
                                    Company : ABC
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