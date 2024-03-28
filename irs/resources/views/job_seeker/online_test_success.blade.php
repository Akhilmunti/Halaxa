<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        @include('halaxatheme.css')

    </head>

    <body>
        <!-- Main -->
        <div class="main">

            <div class="header">
                @include('halaxatheme.header')
            </div>

            <div class="wrapper">
                <!-- Sidebar  -->
                <nav id="sidebar">
                    @include('halaxatheme.jobseeker_sidebar')
                </nav>
           
                <div class="">

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="theme-card p-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img class="img-fluid" src="<?php echo url('assets/images/success.png'); ?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="theme-card p-5 mt-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="text-center"><b>Test One</b></h4>
                                        <hr class="hr-theme mt-3 mb-3">
                                        <p class="font-size-11 text-justify">
                                            As part of your application you will be presented with questions and notes on screen and will be required to respond video answer to each question. As part of your application you will be presented with questions and notes on screen and will be required to respond video answer to each question.
                                        </p>
                                    </div>

                                    <hr class="hr-theme-thick-light">

                                    <div class="row mx-auto">
                                        <div class="col-md-4">
                                            <div class="progress-circle over50 p43">
                                                <span>43%</span>
                                                <div class="left-half-clipper">
                                                    <div class="first50-bar"></div>
                                                    <div class="value-bar"></div>
                                                </div>
                                            </div>
                                            <div class="text-center mt-3">
                                                <h6><b>Percentage</b></h6>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="progress-circle over50 p35">
                                                <span>35%</span>
                                                <div class="left-half-clipper">
                                                    <div class="first50-bar"></div>
                                                    <div class="value-bar"></div>
                                                </div>
                                            </div>
                                            <div class="text-center mt-3">
                                                <h6><b>Percentile</b></h6>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="progress-circle over50 p83">
                                                <span>83%</span>
                                                <div class="left-half-clipper">
                                                    <div class="first50-bar"></div>
                                                    <div class="value-bar"></div>
                                                </div>
                                            </div>
                                            <div class="text-center mt-3">
                                                <h6><b>Average</b></h6>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>

                        </div>


                    </div>

                    <footer>
                        <div class="">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href="#" class="font-size-11 no-decoration text-theme"><b>Copyrights 2020 Halaxa, All rights reserved</b></a>
                                </div>
                            </div>  
                        </div>
                    </footer>

                </div>
            </div>
            </div>

        </div>
        <!-- End Main -->

        @include('halaxatheme.js')


    </body>

</html>