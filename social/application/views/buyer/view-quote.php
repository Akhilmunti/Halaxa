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

                            <?php
                            //print_r($quotedRfqById);
                            $quotedRfqById = $quotedRfqById[0];
                            $today = date("Y-m-d");
                            $end = strtotime($rfqdata['End']);
                            $end = date('Y-m-d', $end);
                            $mCancel = $rfqdata['cancel_rfq_status'];
                            //print_r($rfqdata);
                            ?>

                            <div class="col-md-12">
                                <div class="theme-card p-3">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h4 class="theme-header-text text-danger">Quotation</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="text-right">
                                                <?php if ($end < $today) { ?>
                                                    <p class="table-p text-expired">
                                                        Expired
                                                    </p>
                                                <?php } elseif ($mCancel == 1) { ?>
                                                    <p class="table-p text-danger">
                                                        Cancelled
                                                    </p>
                                                <?php } else { ?>
                                                    <p class="table-p text-theme">
                                                        Requested
                                                    </p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="table-p text-theme">
                                                        For RFQ <?php echo $rfqdata['RFQ_Key']; ?>
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="seller-card">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <span class="seller-view-title">RFQ ID</span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span id="start_date_view" class="seller-view">
                                                                    <b>
                                                                        <?php
                                                                        echo $rfqdata['RFQ_Key'];
                                                                        ?>
                                                                    </b>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <hr class="hr-theme">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <span class="seller-view-title">Start</span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span id="start_date_view" class="seller-view">
                                                                    <b>
                                                                        <?php
                                                                        $start = strtotime($rfqdata['Start']);
                                                                        echo date('d  M  Y', $start);
                                                                        ?>
                                                                    </b>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <hr class="hr-theme">
                                                        <div class="row">
                                                            <div class="col-md-6 text-left">
                                                                <span class="seller-view-title">End</span>
                                                            </div>
                                                            <div class="col-md-6 text-left">
                                                                <span id="end_date_view" class="seller-view">
                                                                    <b>
                                                                        <?php
                                                                        $enddate = strtotime($rfqdata['End']);
                                                                        echo date('d  M  Y', $enddate);
                                                                        ?>
                                                                    </b>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <hr class="hr-theme">
                                                        <div class="row">
                                                            <div class="col-md-6 text-left">
                                                                <span class="seller-view-title">Group</span>
                                                            </div>
                                                            <div class="col-md-6 text-left">
                                                                <span id="group_view" class="seller-view">
                                                                    <b>
                                                                        <?php echo $rfqdata['Type']; ?>
                                                                    </b>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <hr class="hr-theme">
                                                        <div class="row">
                                                            <div class="col-md-6 text-left">
                                                                <span class="seller-view-title">Category</span>
                                                            </div>
                                                            <div class="col-md-6 text-left">
                                                                <span id="category_view" class="seller-view">
                                                                    <b>
                                                                        <?php echo $rfqdata['Category'] . ", " . $rfqdata['Sub_Category']; ?>
                                                                    </b>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <hr class="hr-theme">
                                                        <div class="row">
                                                            <div class="col-md-6 text-left">
                                                                <span class="seller-view-title">Received  Quotations</span>
                                                            </div>
                                                            <div class="col-md-6 text-left">
                                                                <a href="#">
                                                                    <span id="category_view" class="seller-view">
                                                                        <b>
                                                                            <?php echo count($qoutes); ?>
                                                                        </b>
                                                                    </span> 
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <h6 class="mt-2">
                                                        <b>Items</b>
                                                    </h6>
                                                    <table id="itemsTableView" class="table order-list table-striped mt-3">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <p class="jobs-li-place text-justify p-info">
                                                                        #
                                                                    </p>
                                                                </th>
                                                                <td>
                                                                    <p class="jobs-li-place text-justify p-info">
                                                                        Product Name
                                                                    </p>
                                                                </td>
                                                                <th>
                                                                    <p class="jobs-li-place text-justify p-info">
                                                                        Brand
                                                                    </p>
                                                                </th>
                                                                <td>
                                                                    <p class="jobs-li-place text-justify p-info">
                                                                        Description
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="jobs-li-place text-justify p-info">
                                                                        Quantity
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="jobs-li-place text-justify p-info">
                                                                        Unit Price
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="jobs-li-place text-justify p-info">
                                                                        Tax in %
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="jobs-li-place text-justify p-info">
                                                                        Amount
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="itemsTbodyView">
                                                            <?php
                                                            $itemdata = json_decode($rfqdata['itemsinfo']);
                                                            $quoteddata = json_decode($quotedRfqById['quotedItems']);
                                                            $found = false;
                                                            foreach ($itemdata as $key_a => $val_a) {
                                                                $found = false;
                                                                $iter++;
                                                                //print_r($val_a);
                                                                ?>
                                                                <?php
                                                                foreach ($quoteddata as $key_b => $val_b) {
                                                                    //print_r($val_b);
                                                                    $sum += $val_b[5];
                                                                    ?>
                                                                    <?php
                                                                    if ($val_a[1] == $val_b[0]) {
                                                                        $found = true;
                                                                        ?>
                                                                        <tr>
                                                                            <td>
                                                                                <p class="jobs-li-place text-justify p-info">
                                                                                    <?= $iter; ?>
                                                                                </p>
                                                                            <td>   
                                                                                <p class="jobs-li-place text-justify p-info">
                                                                                    <?php echo $val_a[1]; ?>
                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="jobs-li-place text-justify p-info">
                                                                                    <?php echo $val_a[2]; ?>
                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="jobs-li-place text-justify p-info">
                                                                                    <?php echo $val_a[2]; ?>
                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="jobs-li-place text-justify p-info">
                                                                                    <?php echo $val_a[3] . " " . $val_a[4]; ?>
                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="jobs-li-place text-justify p-info">
                                                                                    <?php echo $val_b[4] . " " . $val_b[3]; ?>
                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="jobs-li-place text-justify p-info">
                                                                                    1 %
                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="jobs-li-place text-justify p-info">
                                                                                    <?php echo $val_b[5]; ?>
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                <?php } ?>

                                                                <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="7" class="text-right"></td>
                                                                <td class="text-right">
                                                                    <p class="jobs-li-place text-justify p-info">
                                                                        Sub Total : <?php echo $sum ?>
                                                                    </p>
                                                                    <p class="jobs-li-place text-justify p-info">
                                                                        Total : <?php echo $sum ?>
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <div class="col-md-12">
                                                    <h6 class="mt-2">
                                                        <b>Actions</b>
                                                    </h6>
                                                    <div class="seller-card p-3 text-center">
                                                        <a href="#" data-toggle="modal" data-target="#myModalNegMail_<?php echo $quotedRfqById['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-negotiate">Negotiate</a>
                                                        <a href="<?php echo base_url() . "buyer/received_quotes/showCompare/" . $quotedRfqById['RFQ_Id']; ?>" class="btn btn-danger">Compare</a>
                                                        <a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>buyer/received_quotes/issuePo/<?php echo $quotedRfqById['id']; ?>" class="btn btn-success">Issue PO</a>
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
            </div>
        </div>

        <!-- End Main -->
        <!-- vendors Modal -->
        <div class="modal fade" id="<?php echo $rfqdata['RFQ_Id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content-theme">
                    <div class="modal-header bg-danger">
                        <span class="modal-header-text">Sellers</span>
                    </div>
                    <div class="modal-body">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th><p class="table-p text-theme">Sl No</p></th>
                                    <th><p class="table-p text-theme">Company Name</p></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $vendors = json_decode($rfqdata['V_Ids']);
                                $i = 0;
                                foreach ($vendors as $key => $vendor) {
                                    $i++;
                                    $vendor = $this->users_model->get_vendor_by_id($vendor);
                                    echo "<tr><td><p class='table-p text-theme'>" . $i . "</p></td><td><p class='table-p text-theme'>" . $vendor->comapany_name . "</p></td></tr>";
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

        <div id="myModalNegMail_<?php echo $quotedRfqById['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <form id="rfqForm" method="POST" action="<?php echo base_url(); ?>buyer/received_quotes/requote/<?php echo $rfq['id']; ?>  " class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <!-- Modal content-->
                    <div class="modal-content-theme">
                        <div class="modal-header bg-danger">
                            <span class="modal-header-text">Negotiate</span>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <label class="control-label">Send Message to <?php echo $rfq['vendor_name']; ?></label>
                                    <textarea rows="3" required="" name="message" type="text" class="form-control" placeholder="Enter Message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-danger">Negotiate</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- jQuery  -->
        <?php $this->load->view('buyer/halaxa_partials/scripts'); ?>

    </body>

</html>