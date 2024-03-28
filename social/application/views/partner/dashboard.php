<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('partner/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('partner/partials/left-nav'); ?>    
                <!-- top navigation -->
                <?php $this->load->view('partner/partials/top-nav'); ?>
                <!-- /top navigation --> 
            </div>
            <div class="right_col" role="main">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Partners For Success</h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-md-12"> 
                                        <!-- demo content -->
                                        <div id="content-1" class="content" style="background-color: #ffffff">
                                            <ul>
                                                <li class="img-logo"> <img src="<?php echo base_url(); ?>images/logo-1.png" alt="Avatar" class="img-responsive img-rounded"> </li>
                                                <li class="img-logo"> <img src="<?php echo base_url(); ?>images/logo-3.png" alt="Avatar" class="img-responsive img-rounded"> </li>
                                                <li class="img-logo"> <img src="<?php echo base_url(); ?>images/logo-4.jpg" alt="Avatar" class="img-responsive img-rounded"> </li>
                                                <li class="img-logo"> <img src="<?php echo base_url(); ?>images/logo-5.png" alt="Avatar" class="img-responsive img-rounded"> </li>
                                                <li class="img-logo"> <img src="<?php echo base_url(); ?>images/logo-4.jpg" alt="Avatar" class="img-responsive img-rounded"> </li>
                                                <li class="img-logo"> <img src="<?php echo base_url(); ?>images/logo-1.png" alt="Avatar" class="img-responsive img-rounded"> </li>
                                                <li class="img-logo"> <img src="<?php echo base_url(); ?>images/logo-3.png" alt="Avatar" class="img-responsive img-rounded"> </li>
                                                <li class="img-logo"> <img src="<?php echo base_url(); ?>images/logo-5.png" alt="Avatar" class="img-responsive img-rounded"> </li>
                                                <li class="img-logo"> <img src="<?php echo base_url(); ?>images/logo-4.jpg" alt="Avatar" class="img-responsive img-rounded"> </li>
                                                <li class="img-logo"> <img src="<?php echo base_url(); ?>images/logo-1.png" alt="Avatar" class="img-responsive img-rounded"> </li>
                                                <li class="img-logo"> <img src="<?php echo base_url(); ?>images/logo-3.png" alt="Avatar" class="img-responsive img-rounded"> </li>
                                            </ul>
                                        </div>
                                        <!-- -//- --> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="x_panel dark-back">
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-7 five-three">
                                                <div class="row">
                                                    <div class="col-sm-4 text-center">
                                                        <h4>Community Management</h4>
                                                        <br>
                                                        <p>Share updates with a community of current students, alumni, association members and/or employees who are related to you.</p>
                                                    </div>
                                                    <div class="col-sm-4 text-center">
                                                        <h4>Data Analytics</h4>
                                                        <br>
                                                        <p>Get deeper insights into what your students are studying, explore the career paths of your graduates, get advised on members and employees engagement.</p>
                                                    </div>
                                                    <div class="col-sm-4 text-center">
                                                        <h4>Revenue Sharing</h4>
                                                        <br>
                                                        <p>Get a direct revenue share from what your related users spend and what advertisers pay.</p>
                                                    </div>
                                                    <!-- end inner row --> 
                                                </div>
                                            </div>
                                            <div class="col-sm-5 five-two">
                                                <div class="row">
                                                    <div class="col-sm-6 text-center">
                                                        <h4>Hiring & Employment <br>
                                                            FREE Solutions </h4>
                                                        <p>Allow your community members to benefit from accessing Job posts in private that no one else can access or view.</p>
                                                    </div>
                                                    <div class="col-sm-6 text-center">
                                                        <h4>Branding & Culture AwareneL̥ss Creation</h4>
                                                        <p>Allow your community members to review and rate you and see your ranking within annual published ranks to attract more students, members, and/or employees.</p>
                                                    </div>
                                                </div>
                                                <!-- end inner row --> 
                                            </div>
                                        </div>
                                        <!-- end outer row --> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="x_panel">
                            <div class="x_content">
                                <div class="title text-center">
                                    <h4>Choose the type of partnership you belong to</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="partner-tabs">
                                            <div class="head-tabs">Schools</div>
                                            <div class="body-tabs">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                            <div class="tail-tabs">
                                                <a href="<?= base_url("partner/apply/school"); ?>" class="btn btn-sm btn-dark">Apply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="partner-tabs">
                                            <div class="head-tabs">Corporates Hotels</div>
                                            <div class="body-tabs">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                            <div class="tail-tabs">
                                                <a href="<?= base_url("partner/apply/hotel"); ?>" class="btn btn-sm btn-dark">Apply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="partner-tabs">
                                            <div class="head-tabs">Associations</div>
                                            <div class="body-tabs">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                            <div class="tail-tabs">
                                                <a href="<?= base_url("partner/apply/association"); ?>" class="btn btn-sm btn-dark">Apply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="partner-tabs">
                                            <div class="head-tabs">Influencers</div>
                                            <div class="body-tabs">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                            <div class="tail-tabs">
                                                <a href="<?= base_url("partner/apply/influencer"); ?>" class="btn btn-sm btn-dark">Apply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer content -->
            <?php $this->load->view('partner/partials/footer') ?>
            <!-- /footer content --> 
        </div>

        <?php $this->load->view('partner/partials/assets-footer'); ?>
        <!-- jQuery Smart Wizard --> 
        <script src="<?php echo base_url(); ?>assets/vendors/moment/min/moment.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>  
        <script src="<?php echo base_url(); ?>assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- iCheck --> 
        <script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script> 
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
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
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
    </body>
</html>
