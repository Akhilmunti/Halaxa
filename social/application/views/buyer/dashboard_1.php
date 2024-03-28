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
                        <div class="row top_tiles">
                            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <a href="#" data-toggle="modal" data-target="#myModalRfqs">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-quote-right"></i></div>
                                        <div class="count">
                                            <?php
                                            if (!empty($rfqsCount)) {
                                                echo count($rfqsCount);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                        <h3>RFQ</h3>
                                    </div> 

                                </a>
                            </div>
                            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <a href="#" data-toggle="modal" data-target="#myModalReceived">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                                        <div class="count">
                                            <?php
                                            if (!empty($quotedCount)) {
                                                echo count($quotedCount);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                        <h3>Received Quotation</h3>
                                    </div>
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <a href="#" data-toggle="modal" data-target="#myModalPo">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-list-ol"></i></div>
                                        <div class="count">
                                            <?php
                                            if (!empty($poissuedCount)) {
                                                echo count($poissuedCount);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                        <h3>PO</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!--RFQ Modal -->
                        <div id="myModalRfqs" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">RFQ List</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table width="100%" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>SL No</th>
                                                    <th>RFQ ID</th>
                                                    <th>Group</th>
                                                    <th>Category</th>
                                                    <th>Sub Category</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Location</th>
                                                    <th>City</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($rfqsCount)) {
                                                    $count = 0;
                                                    foreach ($rfqsCount as $key => $rfq) {
                                                        $count++;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $count; ?></td>
                                                            <td><?php echo $rfq['RFQ_Id']; ?></td>
                                                            <td>
                                                                <?php
                                                                $category = $this->type_model->getTypeById($rfq['T_Key']);
                                                                echo $category['Type'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $category = $this->category_model->getCategoryById($rfq['CT_Key']);
                                                                echo $category['Category'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $category = $this->subcategory_model->getSubCategoryById($rfq['SCT_Key']);
                                                                echo $category['Sub_Category'];
                                                                ?>
                                                            </td>
                                                            <td><?php echo $rfq['Start']; ?></td>
                                                            <td><?php echo $rfq['End']; ?></td>
                                                            <td><?php echo $rfq['Location']; ?></td>
                                                            <td><?php echo $rfq['City']; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="8">RFQ's List Empty.</td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--Received Modal -->
                        <div id="myModalReceived" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Received Quotation List</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>RFQ Id</th>
                                                    <th>Quotation count</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                    <th>End Date</th>
                                                    <th>Date Added</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($quotedCount)) {
                                                    $i = 1;
                                                    $count = count($quotedCount);
                                                    foreach ($quotedCount as $key => $rfq) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><a href="<?php echo base_url() . "buyer/received_quotes/show/" . $rfq['RFQ_Id']; ?>"><?php echo $rfq['RFQ_Id']; ?></a></td>
                                                            <td>
                                                                <?php
                                                                $count = $this->vendor_model->getAllQuotedRFQsById($rfq['RFQ_Id']);
                                                                echo count($count);
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $category = $this->category_model->getCategoryById($rfq['q_catid']);
                                                                echo $category['Category'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $negotiate = $rfq['q_negotiate'];
                                                                $postatus = $rfq['po_status'];
                                                                if ($negotiate == "1") {
                                                                    $status = "Under Negotiation";
                                                                    $style = "danger";
                                                                    $hideissueaction = "";
                                                                } elseif ($postatus == "1") {
                                                                    $status = "PO Issued";
                                                                    $style = "success";
                                                                    $hideissueaction = "";
                                                                } else {
                                                                    $status = "Quoted";
                                                                    $style = "primary";
                                                                    $hideissueaction = "";
                                                                }
                                                                ?>
                                                                <span class="label label-<?php echo $style; ?>"><?php echo $status; ?></span>
                                                            </td>
                                                            <td><?php echo $rfq['q_enddate']; ?></td>
                                                            <td><?php echo $rfq['date_added']; ?></td>
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
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--PO Modal -->
                        <div id="myModalPo" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">PO List</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>PO Id</th>
                                                    <th>Vendor</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($poissuedCount)) {
                                                    $i = 1;
                                                    foreach ($poissuedCount as $key => $rfq) {
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
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>Buyer</h3>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <p>Keep your Buyer Corporate Profile updated at all times in order to receive best quoted prices from <?php echo PROJECT_NAME; ?> network of sellers and to attract more supplier connections.</p>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <a href="<?php echo base_url('buyer/profile'); ?>" class="btn btn-sm btn-dark">Update Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="x_panel">
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <p>Help us continuously grow the <?php echo PROJECT_NAME; ?> suppliers network and help your current suppliers grow their sales and revenues.</p>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <a href="<?php echo base_url('buyer/invite-seller'); ?>" class="btn btn-sm btn-dark btn-block">Invite</a>
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
            $('#datatable').dataTable({
                "orderFixed": [0, 'desc'],
                "ordering": false
            });
        </script>
    </body>

</html>