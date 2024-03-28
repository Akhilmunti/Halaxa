<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('partner/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    </head>
    <?php
    $mId = $this->session->userdata('login_id');
    ?>

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
                                <h4>Reset Password</h4>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <?php
                                    if ($notification == NULL) {
                                        $hidealert = "hide";
                                        $showalert = "";
                                    } else {
                                        $showalert = $notification;
                                        $hidealert = "";
                                    }
                                    ?>
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="alert alert-success <?php echo $hidealert ?>">
                                            <?php echo $showalert ?>
                                        </div>
                                        <form id="Form" method="POST" action="<?php echo base_url("partner/home/reset/"); ?><?php echo $mId; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="email">Present Password</label>
                                                <input required="" type="password" class="form-control" name="pPassword" id="pPassword">
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">New Password:</label>
                                                <input required="" type="password" class="form-control" name="nPassword" id="nPassword">
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">Confirm New Password:</label>
                                                <input required="" type="password" class="form-control" name="cPassword" id="cPassword">
                                            </div>
                                            <button type="submit" class="btn btn-default">Submit</button>
                                        </form>
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
    </body>
</html>
