<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('buyer/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('buyer/partials/left-nav'); ?>    
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="x_panel">
                                        <div class="x_content">
                                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Login</a> </li>
                                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Register</a> </li>
                                                </ul>
                                                <div id="myTabContent" class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab"> 
                                                        <!-- start recent activity -->
                                                        <div class="container">
                                                            <div class="omb_login">
                                                                <h3 class="omb_authTitle">Login </h3>
                                                                <div class="row omb_row-sm-offset-3 omb_socialButtons">
                                                                    <div class="col-xs-4 col-sm-2"> <a href="#" class="btn btn-lg btn-block omb_btn-facebook"> <i class="fa fa-facebook visible-xs"></i> <span class="hidden-xs">Facebook</span> </a> </div>
                                                                    <div class="col-xs-4 col-sm-2"> <a href="#" class="btn btn-lg btn-block omb_btn-twitter"> <i class="fa fa-twitter visible-xs"></i> <span class="hidden-xs">Twitter</span> </a> </div>
                                                                    <div class="col-xs-4 col-sm-2"> <a href="#" class="btn btn-lg btn-block omb_btn-google"> <i class="fa fa-google-plus visible-xs"></i> <span class="hidden-xs">Google+</span> </a> </div>
                                                                </div>
                                                                <div class="row omb_row-sm-offset-3 omb_loginOr">
                                                                    <div class="col-xs-12 col-sm-6">
                                                                        <hr class="omb_hrOr">
                                                                        <span class="omb_spanOr">or</span> </div>
                                                                </div>
                                                                <div class="row omb_row-sm-offset-3">
                                                                    <div class="col-xs-12 col-sm-6">
                                                                        <form class="omb_loginForm" action="" autocomplete="off" method="POST">
                                                                            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                                                <input type="text" class="form-control" name="username" placeholder="email address">
                                                                            </div>
                                                                            <span class="help-block"></span>
                                                                            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                                <input  type="password" class="form-control" name="password" placeholder="Password">
                                                                            </div>
                                                                            <span class="help-block">Password error</span>
                                                                            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end recent activity --> 
                                                        <br><br><br><br>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab"> 

                                                        <!-- start user projects -->
                                                        <!-- start recent activity -->
                                                        <div class="container">
                                                            <div class="omb_login">
                                                                <h3 class="omb_authTitle">Register </h3>
                                                                <div class="row omb_row-sm-offset-3 omb_socialButtons">
                                                                    <div class="col-xs-4 col-sm-2"> <a href="#" class="btn btn-lg btn-block omb_btn-facebook"> <i class="fa fa-facebook visible-xs"></i> <span class="hidden-xs">Facebook</span> </a> </div>
                                                                    <div class="col-xs-4 col-sm-2"> <a href="#" class="btn btn-lg btn-block omb_btn-twitter"> <i class="fa fa-twitter visible-xs"></i> <span class="hidden-xs">Twitter</span> </a> </div>
                                                                    <div class="col-xs-4 col-sm-2"> <a href="#" class="btn btn-lg btn-block omb_btn-google"> <i class="fa fa-google-plus visible-xs"></i> <span class="hidden-xs">Google+</span> </a> </div>
                                                                </div>
                                                                <div class="row omb_row-sm-offset-3 omb_loginOr">
                                                                    <div class="col-xs-12 col-sm-6">
                                                                        <hr class="omb_hrOr">
                                                                        <span class="omb_spanOr">or</span> </div>
                                                                </div>
                                                                <div class="row omb_row-sm-offset-3">
                                                                    <div class="col-xs-12 col-sm-6">
                                                                        <form class="omb_loginForm" action="" autocomplete="off" method="POST">
                                                                            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                                                <input type="text" class="form-control" name="username" placeholder="First Name">
                                                                            </div>
                                                                            <span class="help-block"></span>
                                                                            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                                                <input type="text" class="form-control" name="username" placeholder="Last Name">
                                                                            </div>
                                                                            <span class="help-block"></span>
                                                                            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                                <input  type="password" class="form-control" name="password" placeholder="Password">
                                                                            </div>
                                                                            <span class="help-block"></span>
                                                                            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                                <input  type="password" class="form-control" name="password" placeholder="Confirm Password">
                                                                            </div>
                                                                            <span class="help-block">Password error</span>
                                                                            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end recent activity --> 
                                                        <br><br><br><br>
                                                        <!-- end user projects --> 

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content --> 

                <!-- footer content -->
                <?php $this->load->view('buyer/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>

        <?php $this->load->view('buyer/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
    </body>

</html>