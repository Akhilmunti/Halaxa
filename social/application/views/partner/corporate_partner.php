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
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <div class="row">
                                    <div class="col-md-1"> 
                                        <!-- Current avatar --> 
                                        <img class="img-responsive img-rounded" src="http://via.placeholder.com/100x100" alt="Avatar" title="Change the avatar" width="100%"> </div>
                                    <div class="col-md-8">
                                        <h3>Lorem Ipsum</h3>
                                        <i>34,555 Members</i> </div>
                                    <div class="col-md-3">
                                        <ul class="nav navbar-nav navbar-right">
                                            <li role="presentation"> <a href="#" class="info-number" aria-expanded="false"><i class="fa fa-cog"></i></a> </li>
                                            <li> <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Admin <span class=" fa fa-angle-down"></span> </a>
                                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                                    <li><a href="#"> Manage school profile</a></li>
                                                    <li><a href="#"> Revenue account</a></li>
                                                    <li><a href="#"> Data analysis</a></li>
                                                    <li><a href="#"> Change password</a></li>
                                                    <li><a href="#"> Logout</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="light-back">
                                            <div class="row">
                                                <div class="col-md-1"> <img class="img-responsive img-circle" src="http://via.placeholder.com/100x100" alt="Avatar" title="Change the avatar" width="100%"> </div>
                                                <div class="col-md-11">
                                                    <h5 class="mar-allign-top">Start a conversation with your group</h5>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form>
                                                        <textarea class="form-control" rows="2" id="comment"></textarea>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="border-dark" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Conversations</a> </li>
                                                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Jobs</a> </li>
                                                <li role="presentation" class=""><a href="review-company.html">Hotel services</a> </li>
                                            </ul>
                                            <div id="myTabContent" class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab"> 

                                                    <!-- start recent activity -->
                                                    <ul class="messages">
                                                        <li> <img src="../images/img.jpg" class="avatar" alt="Avatar">
                                                            <div class="message_date">
                                                                <h3 class="date text-info">24</h3>
                                                                <p class="month">May</p>
                                                            </div>
                                                            <div class="message_wrapper">
                                                                <h4 class="heading">Desmond Davison</h4>
                                                                <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                                <br />
                                                                <p class="url"> <span class="fs1 text-info" aria-hidden="true" data-icon=""></span> <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a> </p>
                                                            </div>
                                                        </li>
                                                        <li> <img src="../images/img.jpg" class="avatar" alt="Avatar">
                                                            <div class="message_date">
                                                                <h3 class="date text-error">21</h3>
                                                                <p class="month">May</p>
                                                            </div>
                                                            <div class="message_wrapper">
                                                                <h4 class="heading">Brian Michaels</h4>
                                                                <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                                <br />
                                                                <p class="url"> <span class="fs1" aria-hidden="true" data-icon=""></span> <a href="#" data-original-title="">Download</a> </p>
                                                            </div>
                                                        </li>
                                                        <li> <img src="../images/img.jpg" class="avatar" alt="Avatar">
                                                            <div class="message_date">
                                                                <h3 class="date text-info">24</h3>
                                                                <p class="month">May</p>
                                                            </div>
                                                            <div class="message_wrapper">
                                                                <h4 class="heading">Desmond Davison</h4>
                                                                <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                                <br />
                                                                <p class="url"> <span class="fs1 text-info" aria-hidden="true" data-icon=""></span> <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a> </p>
                                                            </div>
                                                        </li>
                                                        <li> <img src="../images/img.jpg" class="avatar" alt="Avatar">
                                                            <div class="message_date">
                                                                <h3 class="date text-error">21</h3>
                                                                <p class="month">May</p>
                                                            </div>
                                                            <div class="message_wrapper">
                                                                <h4 class="heading">Brian Michaels</h4>
                                                                <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                                <br />
                                                                <p class="url"> <span class="fs1" aria-hidden="true" data-icon=""></span> <a href="#" data-original-title="">Download</a> </p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <!-- end recent activity --> 

                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab"> 

                                                    <!-- start user projects -->
                                                    <table class="data table table-striped no-margin">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Project Name</th>
                                                                <th>Client Company</th>
                                                                <th class="hidden-phone">Hours Spent</th>
                                                                <th>Contribution</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>New Company Takeover Review</td>
                                                                <td>Deveint Inc</td>
                                                                <td class="hidden-phone">18</td>
                                                                <td class="vertical-align-mid"><div class="progress">
                                                                        <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                                                    </div></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>New Partner Contracts Consultanci</td>
                                                                <td>Deveint Inc</td>
                                                                <td class="hidden-phone">13</td>
                                                                <td class="vertical-align-mid"><div class="progress">
                                                                        <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                                                                    </div></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Partners and Inverstors report</td>
                                                                <td>Deveint Inc</td>
                                                                <td class="hidden-phone">30</td>
                                                                <td class="vertical-align-mid"><div class="progress">
                                                                        <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                                                                    </div></td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>New Company Takeover Review</td>
                                                                <td>Deveint Inc</td>
                                                                <td class="hidden-phone">28</td>
                                                                <td class="vertical-align-mid"><div class="progress">
                                                                        <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                                                                    </div></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- end user projects --> 

                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                                        photo booth letterpress, commodo enim craft beer mlkshk </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="light-back">
                                            <h4 class="text-justify">Lorem Ipsum</h4>
                                            <p class="text-justify">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</p>
                                            <a href="#">Group rules</a> </div>
                                        <br>
                                        <div class="light-back">
                                            <div class="left"> <a href="#">Members</a> </div>
                                            <div class="right"> <a href="#">54,888 members</a> </div>
                                            <div class="clearfix"></div>
                                            <br>
                                            <div class="anchor-img"> <a><img src="http://via.placeholder.com/40x40" class="img-circle img-responsive"/></a> <a><img src="http://via.placeholder.com/40x40" class="img-circle img-responsive"/></a> <a><img src="http://via.placeholder.com/40x40" class="img-circle img-responsive"/></a> <a><img src="http://via.placeholder.com/40x40" class="img-circle img-responsive"/></a> <a><img src="http://via.placeholder.com/40x40" class="img-circle img-responsive"/></a> <a><img src="http://via.placeholder.com/40x40" class="img-circle img-responsive"/></a> </div>
                                            <br>
                                            <button class="btn btn-xs btn-dark btn-block">Invite others</button>
                                            <a href="member-schedule.html"><button class="btn btn-xs btn-dark btn-block">Members availability schedule</button></a>
                                            <button class="btn btn-xs btn-dark btn-block">Received offers</button>
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
        <!-- plugin script --> 
        <script src="<?php echo base_url(); ?>build/js/jquery.mThumbnailScroller.js"></script> 
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
