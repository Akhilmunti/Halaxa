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
                <?php $this->load->view('buyer/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <?php $this->load->view('buyer/partials/searchbar'); ?>
                    <div class="">
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>My Purchase Order </h3>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Purchase Order Info</h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Sl No</th>
                                                        <th>PO Id</th>
                                                        <th>Vendor</th>
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
                                                                <td>
                                                                    <a href="<?php echo base_url(); ?>buyer/Profile/profileDetails/<?php echo $rfq['vendor_name']; ?>" target="_blank"><?php echo $rfq['vendor_name']; ?> </a>
                                                                </td>
                                                                <td>
                                                                    <span class="label label-success">
                                                                        <?php
                                                                        if ($rfq['reject_status'] == 0) {
                                                                            echo "Po Issued";
                                                                        } else {
                                                                            echo "Po Rejected " . "Message: " . $rfq['rejection_message'];
                                                                        }
                                                                        ?>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <a href="<?php echo base_url() . "buyer/rfq/show/" . $rfq['RFQ_Id']; ?>" class="btn btn-success btn-xs">View</a>
                                                                    <?php if ($rfq['reject_status'] == 1) { ?>
                                                                        <a data-toggle="modal" data-target="#myModalPoMail_<?php echo $rfq['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-success btn-xs">Re-Issue PO</a>
                                                                    <?php } ?>
                                                                </td> 
                                                            </tr>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td colspan="5">Data empty</td>
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
                </div>
                <!-- /page content --> 

                <?php
                if (!empty($poissued)) {
                    $i = 1;
                    foreach ($poissued as $key => $rfq) {
                        ?>
                        <div id="myModalPoMail_<?php echo $rfq['id'] ?>" class="modal fade" role="dialog" data-backdrop="false">
                            <div class="modal-dialog">
                                <form id="rfqForm" method="POST" action="<?php echo base_url(); ?>buyer/purchase-order/issuePo/<?php echo $rfq['id']; ?>  " class="form-horizontal form-label-left" enctype="multipart/form-data">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">PO Message</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <label class="control-label">Send Message to <?php echo $rfq['vendor_name']; ?></label>
                                                    <textarea rows="3" required="" name="message_po" type="text" class="form-control" placeholder="Enter Message"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-sm btn-dark">Issue PO</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    ?>

                <?php }
                ?>

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
                                                                            $('#datatable-responsive').dataTable({
                                                                                "orderFixed": [0, 'desc'],
                                                                                "ordering": false
                                                                            });
        </script>
        <script>
            // Type change event
            $('#filterby').change(function () {
                $.post("<?php echo base_url('buyer/search/getFilterResults/'); ?>",
                        {
                            filter: this.value,
                        },
                        function (data, status) {
                            $('#products').html(data);
                        });
            });
        </script>
    </body>

</html>