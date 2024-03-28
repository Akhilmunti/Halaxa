<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('vendor/halaxa_partials/header'); ?>

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('vendor/halaxa_partials/navbar'); ?>

            <div class="wrapper">

                <?php $this->load->view('vendor/halaxa_partials/sidebar'); ?>

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $this->load->view('vendor/halaxa_partials/alerts'); ?>
                            </div>

                            <div class="col-md-12">
                                <div class="theme-card p-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="theme-header-text">POs Management</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <table class="table table-borderless table-filter">
                                            <thead>
                                                <tr>
                                                    <th>RFQ ID</th>
                                                    <th>Quotations ID</th>
                                                    <th>Buyer</th>
                                                    <th>Issued Date</th>
                                                    <th>Status</th>
                                                    <th>PO Message</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($poissued)) {
                                                    $i = 1;
                                                    foreach ($poissued as $key => $rfq) {
                                                        //print_r($rfq);
                                                        $mBuyer = $this->users_model->get_element_by($rfq['buyer_id']);
                                                        $mBuyerName = $mBuyer->Company_name;
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <div class="table-user-name">
                                                                    <a href="<?php echo base_url() . "buyer/rfq/show/" . $rfq['RFQ_Id']; ?>" class="text-vertical table-username">
                                                                        <b>
                                                                            <?php echo $rfq['RFQ_Key']; ?>
                                                                        </b>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="table-user-name">
                                                                    <a href="#" class="text-vertical table-username">
                                                                        <b>
                                                                            <?php echo $rfq['id']; ?>
                                                                        </b>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="table-user-name">
                                                                    <a href="#" class="text-vertical table-username">
                                                                        <b>
                                                                            <?php echo $mBuyerName; ?>
                                                                        </b>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="table-p text-theme">
                                                                    <?php
                                                                    $start = strtotime($rfq['date_updated']);
                                                                    echo date('d  M  Y', $start);
                                                                    ?>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <?php if ($rfq['reject_status'] == 1) { ?>
                                                                    <p class="table-p text-danger">
                                                                        Rejected
                                                                    </p>
                                                                <?php } else { ?>
                                                                    <p class="table-p text-theme">
                                                                        Issued
                                                                    </p>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <p class="table-p text-theme">
                                                                    <?php
                                                                    if ($rfq['po_message']) {
                                                                        echo $rfq['po_message'];
                                                                    } else {
                                                                        echo "No Data";
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <a title="Message Buyer" data-toggle="modal" data-target="#message<?php echo "_" . $rfq['RFQ_Id']; ?>" href="#" class="mr-3 no-decoration">
                                                                    <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/message-icon.png'); ?>" />
                                                                </a>
                                                                <?php if ($rfq['reject_status'] != 1) { ?>
                                                                    <a title="Reject PO" data-toggle="modal" data-target="#myModalRejMail_<?php echo $rfq['id'] ?>" onclick="return confirm('Are you sure?')" href="#" class="mr-3 no-decoration">
                                                                        <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/cross-icon.png'); ?>" />
                                                                    </a>
                                                                    <a title="Accept PO" href="#" class="mr-3 no-decoration">
                                                                        <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/tick-icon.png'); ?>" />
                                                                    </a>
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
            </div>
        </div>
        <!-- jQuery  -->
        <?php $this->load->view('vendor/halaxa_partials/scripts'); ?>

        <?php
        $i = 1;
        foreach ($poissued as $key => $rfq) {
            ?>
            <div id="message<?php echo "_" . $rfq['RFQ_Id']; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg"> 
                    <!-- Modal content-->
                    <div class="modal-content-theme">
                        <div class="modal-header bg-danger">
                            <h4 class="modal-title">Message Buyer</h4>
                        </div>
                        <form id="inmailForm" method="POST" action="<?php echo base_url() . "vendor/purchase_orders/sendInmailToBuyers"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label class="control-label">To (Halaxa Users)</label>
                                        <select class="form-control" name="user" id="usersFoodlinked">
                                            <option data-value="<?php echo $rfq['User_Id']; ?>" value="<?php echo $rfq['User_Id']; ?>" selected><?php echo $rfq['RFQ_Key']; ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <label class="control-label">Message</label>
                                        <textarea rows="3" required="" name="message" type="text" class="form-control" placeholder="Enter Message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Send</button>
                            </div>
                        </form>
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
                        <div class="modal-content-theme">
                            <div class="modal-header bg-danger">
                                <h4 class="modal-title">Reject PO Buyer</h4>
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
                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-sm btn-danger">Reject PO</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php }
        ?>
    </body>

</html>            