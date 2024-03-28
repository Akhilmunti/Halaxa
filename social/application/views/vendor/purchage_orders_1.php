<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('vendor/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('vendor/partials/left-nav'); ?>    
                <?php $this->load->view('vendor/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <?php $this->load->view('vendor/partials/searchbar'); ?>
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Process Order Management</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <?php
                                    $alert = $this->session->flashdata('requoteNot');
                                    if ($alert == NULL) {
                                        $hidealert = "hide";
                                    } else {
                                        $showalert = $alert;
                                        $hidealert = "";
                                    }
                                    ?>
                                    <div class="alert alert-success <?php echo $hidealert ?>">
                                        <?php echo $showalert ?>
                                    </div>
                                    <div class="x_title">
                                        <h2>PO List</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Po Id</th>
                                                    <th>RFQ Id</th>
                                                    <th>Quotation Id</th>
                                                    <th>Buyer</th>
                                                    <th>PO Mesasage</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($poissued)) {
                                                    $i = 1;
                                                    foreach ($poissued as $key => $rfq) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $rfq['RFQ_Id']; ?></td>
                                                            <td><?php echo $rfq['RFQ_Id']; ?></td>
                                                            <td><?php echo $rfq['id']; ?></td>
                                                            <td>
                                                                <?php echo $rfq['vendor_name']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $rfq['po_message']; ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($rfq['reject_status'] == 1) {
                                                                    echo "PO Rejected";
                                                                } else {
                                                                    echo "In Process";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $rfqData = $this->rfq_model->getRfqById($rfq['RFQ_Id']);
                                                                $userId = $rfqData['User_Id'];
                                                                ?>
                                                                <a href="<?php echo base_url() . "vendor/purchase_orders/show/" . $rfq['RFQ_Id']; ?>" class="btn btn-success btn-xs">View</a>
                                                                <!--                                                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">Invoice</button>-->
<!--                                                                <a target="_blank" href="<?php echo base_url(); ?>vendor/Profile/profileDetailsByKey/<?php echo $userId; ?>" class="btn btn-success btn-xs">Manage Buyer</a>-->
                                                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#manage<?php echo "_" . $rfq['RFQ_Id']; ?>">Message Buyer</button>
                                                                <?php if ($rfq['reject_status'] == 1) { ?>
                                                                    <button type="button" class="btn btn-danger btn-xs">Rejected</button>
                                                                <?php } else { ?>
                                                                    <button type="button" data-toggle="modal" data-target="#myModalRejMail_<?php echo $rfq['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-success btn-xs">Reject</button>
                                                                <?php } ?>
                                                            </td> 
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="6">Data empty</td>
                                                    </tr>
                                                <?php }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $i = 1;
                foreach ($poissued as $key => $rfq) {
                    ?>
                    <div id="manage<?php echo "_" . $rfq['RFQ_Id']; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg"> 
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Quotation Details</h4>
                                </div>
                                <div class="modal-body">
                                    <form id="inmailForm" method="POST" action="<?php echo base_url() . "vendor/home/sendInmailToBuyers"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <?php
                                                $rfqData = $this->rfq_model->getRfqById($rfq['RFQ_Id']);
                                                $userId = $rfqData['User_Id'];
                                                $userKey = $rfqData['RFQ_Key'];
                                                ?>
                                                <label class="control-label">To (Foodlinked Users)</label>
                                                <select class="form-control" name="user" id="usersFoodlinked">
                                                    <option data-value="<?php echo $userId; ?>" value="<?php echo $userId; ?>" selected><?php echo $userKey; ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <input required="" name="rfq" value="<?php echo $rfq['RFQ_Id']; ?>" id="rfq" type="hidden"/>
                                                <label class="control-label">Message</label>
                                                <textarea rows="3" required="" name="message" type="text" class="form-control" placeholder="Enter Message"></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-success right-float">Send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>

                <?php
                $i = 1;
                foreach ($poissued as $key => $rfq) {
                    ?>
                    <div id="myModalRejMail_<?php echo $rfq['id'] ?>" class="modal fade" role="dialog" data-backdrop="false">
                        <div class="modal-dialog">
                            <form id="rfqForm" method="POST" action="<?php echo base_url(); ?>vendor/purchase_orders/reject/<?php echo $rfq['id']; ?>  " class="form-horizontal form-label-left" enctype="multipart/form-data">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Reject PO</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="control-label">Send Message to <?php echo $rfq['vendor_name']; ?></label>
                                                <textarea rows="3" required="" name="message_rej" type="text" class="form-control" placeholder="Enter Message"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-sm btn-dark">Reject PO</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php }
                ?>
                <!-- /page content --> 

                <!-- footer content -->
                <?php $this->load->view('vendor/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>


        <?php $this->load->view('vendor/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
                                                            document.addEventListener("touchstart", function () {}, true);
        </script>
    </body>
</html>