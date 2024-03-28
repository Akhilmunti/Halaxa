<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('admin/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('admin/partials/left-nav'); ?>    
                <!-- top navigation -->
                <?php $this->load->view('admin/partials/top-nav'); ?>
                <!-- /top navigation --> 
            </div>
            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h3>List of hotels </h3>
                            </div>
                            <div class="x_content">
                                <?php
                                //echo validation_errors();
                                //print_r($clients);
                                if ($result) {
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-success" role="alert">
                                                <?php echo $result;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                                <div class="row">
                                    <div class="col-md-12"> <!--<a href="#" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#newlistModal">Create New List</a> -->
                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin table-responsive table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Hotel Name</th>
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
                                                foreach ($hotel_list as $hotel) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $hotel['property_name']; ?></td>
                                                        <td><?php echo $hotel['Address']; ?></td>
                                                        <td><?php echo $hotel['Location']; ?></td>
                                                        <td><?php echo $hotel['Country']; ?></td>
                                                        <td><?php echo $hotel['City']; ?></td>
                                                        <td><?php echo $hotel['Email']; ?></td>
                                                        <td><?php echo $hotel['Phone_Area_Code'] . "-" . $hotel['Phone_No']; ?></td>

                                                        <td>
                                                            <a href="<?php echo base_url('admin/hotel/viewHotel/' . $hotel['H_Id']); ?>" class="btn btn-success btn-xs btn-block"><i class="fa fa-user"></i> View </a>
                                                            <a href="<?php echo base_url('admin/hotel/editHotel/' . $hotel['H_Id']); ?>" class="btn btn-success btn-xs btn-block"><i class="fa fa-user"></i> Edit </a>

                                                            <?php if ($hotel['Status'] == "1"): ?>
                                                                <a href="#" class="btn btn-success btn-xs btn-block"><i class="fa fa-user"></i> User Approved </a>
                                                                <a href="<?php echo base_url() . "admin/hotel/deleteHotel/" . $hotel['H_Id']; ?>" class="btn btn-danger btn-xs btn-block"><i class="fa fa-user"></i> Delete </a>
                                                                <a class="btn btn-danger btn-xs btn-block" data-toggle="modal" data-target="#myModalReject_<?php echo $hotel['H_Id']; ?>"><i class="fa fa-user"></i> Reject </a>
                                                            <?php elseif ($hotel['Status'] == "2"): ?>
                                                                <a href="<?php echo base_url() . "admin/hotel/deleteHotel/" . $hotel['H_Id']; ?>" class="btn btn-danger btn-xs btn-block"><i class="fa fa-user"></i> Delete </a>
                                                                <a href="#" class="btn btn-danger btn-xs btn-block"><i class="fa fa-user"></i> User Rejected </a>
                                                            <?php else: ?>
                                                                <a href="<?php echo base_url() . "admin/hotel/statusAccept/" . $hotel['H_Id']; ?>" class="btn btn-info btn-xs btn-block"><i class="fa fa-user"></i> Approve </a>
                                                                <a class="btn btn-danger btn-xs btn-block" data-toggle="modal" data-target="#myModalReject_<?php echo $hotel['H_Id']; ?>"><i class="fa fa-user"></i> Reject </a>
                                                                <a href="<?php echo base_url() . "admin/hotel/deleteHotel/" . $hotel['H_Id']; ?>" class="btn btn-danger btn-xs btn-block"><i class="fa fa-user"></i> Delete </a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                ?>
                                            </tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($hotel_list as $school) {
                                                ?>
                                                <!-- Modal -->
                                                <div id="myModalReject_<?php echo $school['H_Id']; ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form id="inmailForm" method="POST" action="<?php echo base_url() . "admin/hotel/statusReject/" . $school['H_Id']; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Rejection Reason(<?php echo $school['property_name']; ?>)</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12">
                                                                            <label class="control-label">Reason</label>
                                                                            <textarea rows="3" required="" name="reason" type="text" class="form-control" placeholder="Enter reason"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-success right-float">Send</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            <?php }
                                            ?>
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
            <?php $this->load->view('admin/partials/footer') ?>
            <!-- /footer content --> 
        </div>

        <?php $this->load->view('admin/partials/assets-footer'); ?>
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
