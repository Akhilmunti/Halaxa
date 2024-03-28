<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('buyer/halaxa_partials/header'); ?>

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('buyer/halaxa_partials/navbar'); ?>

            <div class="wrapper">

                <?php $this->load->view('buyer/halaxa_partials/sidebar'); ?>

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $this->load->view('buyer/halaxa_partials/alerts'); ?>
                            </div>

                            <div class="col-md-12">
                                <div class="theme-card p-3 mb-3 bg-light-blue">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="pt-2">Keep your Buyer Corporate Profile updated at all times in order to receive best quoted prices from Halaxa network of sellers and to attract more supplier connections.</p>
                                        </div>
                                        <div class="col-md-2 pt-3 text-center">
                                            <a href="<?php echo base_url('buyer/profile'); ?>" class="btn btn-success">Update Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="theme-card p-3 mb-3 bg-light-yellow">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="pt-2">
                                                Help us continuously grow the Halaxa suppliers network and help your current suppliers grow their sales and revenues.
                                            </p>
                                        </div>
                                        <div class="col-md-2 pt-2 text-center">
                                            <a href="<?php echo base_url('buyer/invite-seller'); ?>" class="btn btn-success">Invite</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <a class="text-theme" href="#" data-toggle="modal" data-target="#myModalRfqs">
                                            <div class="theme-card p-3 mb-3">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <h5>
                                                            <b>
                                                                <?php
                                                                if (!empty($rfqsCount)) {
                                                                    echo count($rfqsCount);
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                            </b>
                                                        </h5>
                                                        <h6>RFQs</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img height="50" class="" src="<?php echo base_url('assets/halaxa_buyer/images/view-rfq-icon.png'); ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="text-theme" href="#" data-toggle="modal" data-target="#myModalReceived">
                                            <div class="theme-card p-3 mb-3">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <h5>
                                                            <b>
                                                                <?php
                                                                if (!empty($quotedCount)) {
                                                                    echo count($quotedCount);
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                            </b>
                                                        </h5>
                                                        <h6>Received Quotations</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img height="60" class="" src="<?php echo base_url('assets/halaxa_buyer/images/received-icon.png'); ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="text-theme" href="#" data-toggle="modal" data-target="#myModalPo">
                                            <div class="theme-card p-3 mb-3">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <h5>
                                                            <b>
                                                                <?php
                                                                if (!empty($poissuedCount)) {
                                                                    echo count($poissuedCount);
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                            </b>
                                                        </h5>
                                                        <h6>Purchase Orders</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img height="60" class="" src="<?php echo base_url('assets/halaxa_buyer/images/po-icon.png'); ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Main -->

        <!--RFQ Modal -->
        <div id="myModalRfqs" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content-theme">
                    <div class="modal-header bg-danger">
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
                                        <td colspan="10">RFQ's List Empty.</td>
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
                <div class="modal-content-theme">
                    <div class="modal-header bg-danger">
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
                                        <td colspan="10">Data empty</td>
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
                <div class="modal-content-theme">
                    <div class="modal-header bg-danger">
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

        <!-- jQuery  -->
        <?php $this->load->view('buyer/halaxa_partials/scripts'); ?>

    </body>

</html>