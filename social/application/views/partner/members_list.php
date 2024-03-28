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
                                    <div class="col-md-4 col-md-offset-4">
                                        <form>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Members Availability Schedule">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-default" type="submit">Received offers</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-md-12"> <!--<a href="#" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#newlistModal">Create New List</a> -->
                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin table-responsive table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Member Name</th>
                                                    <th>Offer From</th>
                                                    <th>Offer Date Received</th>
                                                    <th>Country</th>
                                                    <th>City</th>
                                                    <th>Period From</th>
                                                    <th>Period To</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Lorem Ipsum</td>
                                                    <td>Internship</td>
                                                    <td>Lorem Ipsum</td>
                                                    <td>Lorem Ipsum</td>
                                                    <td>Lorem Ipsum</td>
                                                    <td>xx-xx-xxxx</td>
                                                    <td>xx-xx-xxxx</td>
                                                    <td><a href="#" class="btn btn-dark btn-xs">Approve</a><a href="#" class="btn btn-danger btn-xs">Reject</a><a href="#" class="btn btn-warning btn-xs">Negotiate</a></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Lorem Ipsum</td>
                                                    <td>Internship</td>
                                                    <td>Lorem Ipsum</td>
                                                    <td>Lorem Ipsum</td>
                                                    <td>Lorem Ipsum</td>
                                                    <td>xx-xx-xxxx</td>
                                                    <td>xx-xx-xxxx</td>
                                                    <td><a href="#" class="btn btn-dark btn-xs">Approve</a><a href="#" class="btn btn-danger btn-xs">Reject</a><a href="#" class="btn btn-warning btn-xs">Negotiate</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- end user projects --> 
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
