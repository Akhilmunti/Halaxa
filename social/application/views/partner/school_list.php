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
                                <h3>List of schools <a href="<?php echo base_url() . "partner/apply/school"; ?>" class="label label-success">Goto School Application</a></h3>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-md-12"> <!--<a href="#" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#newlistModal">Create New List</a> -->
                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin table-responsive table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>School Name</th>
                                                    <th>Address</th>
                                                    <th>Location</th>
                                                    <th>Country</th>
                                                    <th>City</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($school_list as $school) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $school['School_Name']; ?></td>
                                                        <td><?php echo $school['Address']; ?></td>
                                                        <td><?php echo $school['Location']; ?></td>
                                                        <td><?php echo $school['Country']; ?></td>
                                                        <td><?php echo $school['City']; ?></td>
                                                        <td><?php echo $school['Email']; ?></td>
                                                        <td><?php echo $school['Phone_Area_Code'] . "-" . $school['Phone_No']; ?></td>
                                                        <td>
<!--                                                            <a href="<?php echo base_url() . "partner/school/edit/" . $school['S_Id']; ?>" class="btn btn-dark btn-xs">Edit</a>-->
                                                            <a href="<?php echo base_url() . "partner/school/delete/" . $school['S_Id']; ?>" class="btn btn-danger btn-xs">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                ?>
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
