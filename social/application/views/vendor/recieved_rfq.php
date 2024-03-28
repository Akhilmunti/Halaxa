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
                                            <h4 class="theme-header-text">RFQs</h4>
                                        </div>
                                        <div class="col-md-12">
                                            <form method="POST" action="<?php echo base_url('vendor/recieved_rfq'); ?>">
                                                <div class="row pt-3 pb-3">
                                                    <div class="col-md-1">
                                                        <img width="15" class="text-vertical" src='<?php echo base_url('assets/halaxa_buyer/images/filter-icon.png'); ?>'>
                                                        <p class="text-danger text-vertical"><b>Filter : </b></p>
                                                    </div>
                                                    <div class="col-md-11">
                                                        <div class="row">
                                                            <div class="col-md-3 no-padding-filter">
                                                                <input name="rfq_id" placeholder="RFQ ID" class="form-control form-control-sm form-control-filter" type="text">
                                                                <span class="fa fa-search iconspan"></span>
                                                            </div>
                                                            <div class="col-md-2 no-padding-filter">
                                                                <input name="rfq_start" placeholder="Start Date" class="form-control form-control-sm form-control-filter" type="date">
                                                            </div>
                                                            <div class="col-md-2 no-padding-filter">
                                                                <select name="rfq_status" class="form-control form-control-sm form-control-filter">
                                                                    <option selected="" disabled="" value="">RFQ Status</option>
                                                                    <option value="1">Quoted</option>
                                                                    <option value="2">Pending</option>
                                                                    <option value="3">Expired</option>
                                                                </select>
                                                                <i class="fa fa-caret-down"></i>
                                                            </div>
                                                            <div class="col-md-2 offset-3">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <a href="<?php echo base_url('vendor/recieved_rfq'); ?>"><b class="font-size-11 p-info">Clear</b></a>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-check mr-2"></i>Apply</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <form method="POST" action="#">
                                        <div class="row">
                                            <div class="col-md-2 offset-10">
                                                <select onchange="this.form.submit()" name="rfq_grp_action" class="form-control form-control-sm form-control-filter">
                                                    <option selected="" disabled="" value="">Group Action</option>
                                                </select>
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                            <div class="col-md-12">
                                                <table class="table table-borderless table-filter">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input rfq-checkbox" id="select_all_rfqs">
                                                                    <label class="custom-control-label" for="select_all_rfqs"></label>
                                                                </div>
                                                            </th>
                                                            <th>RFQ ID</th>
                                                            <th>Catagory</th>
                                                            <th>Buyer</th>
                                                            <th>Request Date</th>
                                                            <th>Status</th>
                                                            <th>Location</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if (!empty($rfqs)) {
                                                            $count = 0;
                                                            foreach ($rfqs as $key => $rfq) {
                                                                //print_r($rfq);
                                                                $mBuyer = $this->users_model->get_element_by($rfq['User_Id']);
                                                                $mBuyerName = $mBuyer->Company_name;
                                                                $mRfqId = $rfq['RFQ_Id'];
                                                                $mCancel = $rfq['cancel_rfq_status'];
                                                                $today = date("Y-m-d");
                                                                $end = strtotime($rfq['End']);
                                                                $end = date('Y-m-d', $end);
                                                                $count++;
                                                                ?>

                                                                <?php if ($status == "1") { ?>
                                                                    <?php if (in_array($rfq['RFQ_Id'], $quotedIds)) { ?>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input name="select_rfq[]" value="<?php echo $mRfqId; ?>" type="checkbox" class="custom-control-input rfq-checkbox" id="select_rfq_<?php echo $mRfqId; ?>">
                                                                                    <label class="custom-control-label" for="select_rfq_<?php echo $mRfqId; ?>"></label>
                                                                                </div>
                                                                            </td>
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
                                                                                <p class="table-p text-theme">
                                                                                    <?php echo $rfq['Category'] . ", " . $rfq['Sub_Category']; ?>
                                                                                </p>
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
                                                                                    $start = strtotime($rfq['Created_On']);
                                                                                    echo date('d  M  Y', $start);
                                                                                    ?>
                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <?php if ($end < $today) { ?>
                                                                                    <p class="table-p text-expired">
                                                                                        Expired
                                                                                    </p>
                                                                                <?php } elseif ($mCancel == 1) { ?>
                                                                                    <p class="table-p text-danger">
                                                                                        Cancelled
                                                                                    </p>
                                                                                <?php } else { ?>
                                                                                    <?php if (in_array($rfq['RFQ_Id'], $quotedIds)) { ?>
                                                                                        <p class="table-p text-quoted">
                                                                                            Quoted
                                                                                        </p>
                                                                                    <?php } else { ?>
                                                                                        <p class="table-p text-theme">
                                                                                            Pending
                                                                                        </p>
                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                            </td>
                                                                            <td>
                                                                                <p class="table-p text-theme">
                                                                                    <?php echo $rfq['Location']; ?>, <?php echo $rfq['City']; ?>
                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <div class="text-left">
                                                                                    <a title="Message Buyer" data-toggle="modal" data-target="#message<?php echo "_" . $rfq['RFQ_Id']; ?>" href="#" class="mr-3 no-decoration">
                                                                                        <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/message-icon.png'); ?>" />
                                                                                    </a>
                                                                                    <?php if (in_array($rfq['RFQ_Id'], $quotedIds)) { ?>

                                                                                    <?php } else { ?>
                                                                                        <a title="Quote" data-toggle="modal" data-target="#manage<?php echo "_" . $rfq['RFQ_Id']; ?>" href="#" class="mr-3 no-decoration">
                                                                                            <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/qoute-icon.png'); ?>" />
                                                                                        </a>
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                <?php } elseif ($status == "2") { ?>
                                                                    <?php if (!in_array($rfq['RFQ_Id'], $quotedIds)) { ?>

                                                                        <?php if ($end > $today) { ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="custom-control custom-checkbox">
                                                                                        <input name="select_rfq[]" value="<?php echo $mRfqId; ?>" type="checkbox" class="custom-control-input rfq-checkbox" id="select_rfq_<?php echo $mRfqId; ?>">
                                                                                        <label class="custom-control-label" for="select_rfq_<?php echo $mRfqId; ?>"></label>
                                                                                    </div>
                                                                                </td>
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
                                                                                    <p class="table-p text-theme">
                                                                                        <?php echo $rfq['Category'] . ", " . $rfq['Sub_Category']; ?>
                                                                                    </p>
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
                                                                                        $start = strtotime($rfq['Created_On']);
                                                                                        echo date('d  M  Y', $start);
                                                                                        ?>
                                                                                    </p>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($end < $today) { ?>
                                                                                        <p class="table-p text-expired">
                                                                                            Expired
                                                                                        </p>
                                                                                    <?php } elseif ($mCancel == 1) { ?>
                                                                                        <p class="table-p text-danger">
                                                                                            Cancelled
                                                                                        </p>
                                                                                    <?php } else { ?>
                                                                                        <?php if (in_array($rfq['RFQ_Id'], $quotedIds)) { ?>
                                                                                            <p class="table-p text-quoted">
                                                                                                Quoted
                                                                                            </p>
                                                                                        <?php } else { ?>
                                                                                            <p class="table-p text-theme">
                                                                                                Pending
                                                                                            </p>
                                                                                        <?php } ?>
                                                                                    <?php } ?>
                                                                                </td>
                                                                                <td>
                                                                                    <p class="table-p text-theme">
                                                                                        <?php echo $rfq['Location']; ?>, <?php echo $rfq['City']; ?>
                                                                                    </p>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="text-left">
                                                                                        <a title="Message Buyer" data-toggle="modal" data-target="#message<?php echo "_" . $rfq['RFQ_Id']; ?>" href="#" class="mr-3 no-decoration">
                                                                                            <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/message-icon.png'); ?>" />
                                                                                        </a>
                                                                                        <?php if (in_array($rfq['RFQ_Id'], $quotedIds)) { ?>

                                                                                        <?php } else { ?>
                                                                                            <a title="Quote" data-toggle="modal" data-target="#manage<?php echo "_" . $rfq['RFQ_Id']; ?>" href="#" class="mr-3 no-decoration">
                                                                                                <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/qoute-icon.png'); ?>" />
                                                                                            </a>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>


                                                                    <?php } ?>
                                                                <?php } elseif ($status == "3") { ?>

                                                                    <?php if ($end < $today) { ?>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input name="select_rfq[]" value="<?php echo $mRfqId; ?>" type="checkbox" class="custom-control-input rfq-checkbox" id="select_rfq_<?php echo $mRfqId; ?>">
                                                                                    <label class="custom-control-label" for="select_rfq_<?php echo $mRfqId; ?>"></label>
                                                                                </div>
                                                                            </td>
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
                                                                                <p class="table-p text-theme">
                                                                                    <?php echo $rfq['Category'] . ", " . $rfq['Sub_Category']; ?>
                                                                                </p>
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
                                                                                    $start = strtotime($rfq['Created_On']);
                                                                                    echo date('d  M  Y', $start);
                                                                                    ?>
                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <?php if ($end < $today) { ?>
                                                                                    <p class="table-p text-expired">
                                                                                        Expired
                                                                                    </p>
                                                                                <?php } elseif ($mCancel == 1) { ?>
                                                                                    <p class="table-p text-danger">
                                                                                        Cancelled
                                                                                    </p>
                                                                                <?php } else { ?>
                                                                                    <?php if (in_array($rfq['RFQ_Id'], $quotedIds)) { ?>
                                                                                        <p class="table-p text-quoted">
                                                                                            Quoted
                                                                                        </p>
                                                                                    <?php } else { ?>
                                                                                        <p class="table-p text-theme">
                                                                                            Pending
                                                                                        </p>
                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                            </td>
                                                                            <td>
                                                                                <p class="table-p text-theme">
                                                                                    <?php echo $rfq['Location']; ?>, <?php echo $rfq['City']; ?>
                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <div class="text-left">
                                                                                    <a title="Message Buyer" data-toggle="modal" data-target="#message<?php echo "_" . $rfq['RFQ_Id']; ?>" href="#" class="mr-3 no-decoration">
                                                                                        <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/message-icon.png'); ?>" />
                                                                                    </a>
                                                                                    <?php if (in_array($rfq['RFQ_Id'], $quotedIds)) { ?>

                                                                                    <?php } else { ?>
                                                                                        <a title="Quote" data-toggle="modal" data-target="#manage<?php echo "_" . $rfq['RFQ_Id']; ?>" href="#" class="mr-3 no-decoration">
                                                                                            <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/qoute-icon.png'); ?>" />
                                                                                        </a>
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                <?php } else { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input name="select_rfq[]" value="<?php echo $mRfqId; ?>" type="checkbox" class="custom-control-input rfq-checkbox" id="select_rfq_<?php echo $mRfqId; ?>">
                                                                                <label class="custom-control-label" for="select_rfq_<?php echo $mRfqId; ?>"></label>
                                                                            </div>
                                                                        </td>
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
                                                                            <p class="table-p text-theme">
                                                                                <?php echo $rfq['Category'] . ", " . $rfq['Sub_Category']; ?>
                                                                            </p>
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
                                                                                $start = strtotime($rfq['Created_On']);
                                                                                echo date('d  M  Y', $start);
                                                                                ?>
                                                                            </p>
                                                                        </td>
                                                                        <td>
                                                                            <?php if ($end < $today) { ?>
                                                                                <p class="table-p text-expired">
                                                                                    Expired
                                                                                </p>
                                                                            <?php } elseif ($mCancel == 1) { ?>
                                                                                <p class="table-p text-danger">
                                                                                    Cancelled
                                                                                </p>
                                                                            <?php } else { ?>
                                                                                <?php if (in_array($rfq['RFQ_Id'], $quotedIds)) { ?>
                                                                                    <p class="table-p text-quoted">
                                                                                        Quoted
                                                                                    </p>
                                                                                <?php } else { ?>
                                                                                    <p class="table-p text-theme">
                                                                                        Pending
                                                                                    </p>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <td>
                                                                            <p class="table-p text-theme">
                                                                                <?php echo $rfq['Location']; ?>, <?php echo $rfq['City']; ?>
                                                                            </p>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-left">
                                                                                <a title="Message Buyer" data-toggle="modal" data-target="#message<?php echo "_" . $rfq['RFQ_Id']; ?>" href="#" class="mr-3 no-decoration">
                                                                                    <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/message-icon.png'); ?>" />
                                                                                </a>
                                                                                <?php if (in_array($rfq['RFQ_Id'], $quotedIds)) { ?>

                                                                                <?php } else { ?>
                                                                                    <a title="Quote" data-toggle="modal" data-target="#manage<?php echo "_" . $rfq['RFQ_Id']; ?>" href="#" class="mr-3 no-decoration">
                                                                                        <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/qoute-icon.png'); ?>" />
                                                                                    </a>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
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
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Main -->
        <?php
        $i = 1;
        foreach ($rfqs as $key => $rfq) {
            $mBuyer = $this->users_model->get_element_by($rfq['User_Id']);
            $mBuyerName = $mBuyer->Company_name;
            ?>
            <div id="message<?php echo "_" . $rfq['RFQ_Id']; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg"> 
                    <!-- Modal content-->
                    <div class="modal-content-theme">
                        <div class="modal-header bg-danger">
                            <h4 class="modal-title">Message Buyer</h4>
                        </div>
                        <form id="inmailForm" method="POST" action="<?php echo base_url() . "vendor/home/sendInmailToBuyers"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
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
        foreach ($rfqs as $key => $rfq) {
            $mBuyer = $this->users_model->get_element_by($rfq['User_Id']);
            $mBuyerName = $mBuyer->Company_name;
            $i++;
            ?>
            <div id="manage<?php echo "_" . $rfq['RFQ_Id']; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content-theme">
                        <form method="POST" action="<?php echo base_url() . "vendor/Recieved-rfq/submit-quote"; ?>/<?php echo $rfq['RFQ_Id']; ?>" enctype="multipart/form-data">
                            <div class="modal-body">
                                <h5 class="text-theme text-center pt-3">Submit Quotation</h5>
                                <div class="row p-5">
                                    <div class="col-md-6">
                                        <div class="row p-3">
                                            <div class="col-md-3 bg-danger text-center">
                                                <h6 class="mt-2">To</h6>
                                            </div>
                                            <div class="col-md-9 bg-table-head text-center">
                                                <h6 class="mt-2"><?php echo $mBuyerName; ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row p-3">
                                            <div class="col-md-4 bg-danger text-center">
                                                <h6 class="mt-2">RFQ No.</h6>
                                            </div>
                                            <div class="col-md-8 bg-table-head text-center">
                                                <h6 class="mt-2"><?php echo $rfq['RFQ_Key']; ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <table class="table table-borderless table-filter bg-table-quote" id="QuoteTable">
                                            <thead>
                                                <tr>
                                                    <td style="color: #000000 !important;font-weight: 600">Product Name</td>
                                                    <td style="color: #000000 !important;font-weight: 600">Brand</td>
                                                    <td style="color: #000000 !important;font-weight: 600">Quantity</td>
                                                    <td style="color: #000000 !important;font-weight: 600">UOM</td>
                                                    <td style="color: #000000 !important;font-weight: 600">Price per unit</td>
                                                    <td>&nbsp;</td>
                                                    <td style="color: #000000 !important;font-weight: 600">Amount</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $itemdatatwo = json_decode($rfq['itemsinfo']);
                                                $iter = 0;
                                                foreach ($itemdatatwo as $key => $itemrow) {
                                                    $iter++;
                                                    $unique = mt_rand();
                                                    ?>
                                                    <tr>
                                                        <td style="width: 120px">
                                                            <?php
                                                            foreach ($items as $key => $item) {
                                                                if (is_numeric($itemrow[1])) {
                                                                    if ($itemrow[1] == $item['I_Id']) {
                                                                        $value = $item['Item'];
                                                                    }
                                                                } else {
                                                                    $value = $itemrow[1];
                                                                }
                                                            }
                                                            ?>
                                                            <p class="table-p text-black">
                                                                <?php echo $value; ?>
                                                            </p>
                                                            <input hidden="" value="<?php echo $value; ?>" readonly="" type="text" name="quotedItems[<?php echo $iter; ?>][]" class="form-control"/>
                                                            <span class="form-error-message text-danger"></span>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" value="<?php echo $itemrow[2]; ?>" />
                                                            <input value="<?php echo $itemrow[2] ?>" required="" type="text" name="quotedItems[<?php echo $iter; ?>][]" class="form-control form-control-table"/>
                                                            <span class="text-theme font-sm">
                                                                <b><?php echo $itemrow[2]; ?></b>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $quantity = preg_replace('~\D~', '', $itemrow[4]);
                                                            ?>
                                                            <input id="quotedQuantity<?php echo $unique; ?>" type="hidden" value="<?php echo $itemrow[3]; ?>" />
                                                            <input max="<?php echo $quantity ?>"  value="<?php echo $quantity ?>" onchange="calculateQuantityTotal(<?php echo $unique; ?>)" required="" id="quantity<?php echo $unique; ?>" type="number" name="quotedItems[<?php echo $iter; ?>][]" class="form-control form-control-table"/>
                                                            <span class="text-theme font-sm">
                                                                <b><?php echo $quantity; ?> Requested</b>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <p class="table-p text-black">
                                                                <?php
                                                                if (is_numeric($itemrow[4])) {
                                                                    foreach ($uoms as $key => $uom) {
                                                                        if ($itemrow[4] == $uom['U_Id']) {
                                                                            echo $uom['Uom'];
                                                                        }
                                                                    }
                                                                } else {
                                                                    $uom = preg_replace('/[0-9]+/', '', $itemrow[4]);
                                                                    echo $uom;
                                                                }
                                                                ?>
                                                            </p>
                                                            <input hidden="" value="<?php
                                                            if (is_numeric($itemrow[4])) {
                                                                foreach ($uoms as $key => $uom) {
                                                                    if ($itemrow[4] == $uom['U_Id']) {
                                                                        echo $uom['Uom'];
                                                                    }
                                                                }
                                                            } else {
                                                                $uom = preg_replace('/[0-9]+/', '', $itemrow[4]);
                                                                echo $uom;
                                                            }
                                                            ?>" type="text" name="quotedItems[<?php echo $iter; ?>][]"  class="form-control form-control-table"/>
                                                            <span class="form-error-message text-danger"></span>
                                                        </td>
                                                        <td>
                                                            <input required="" id="price<?php echo $unique; ?>" onchange="calculateTotal(<?php echo $unique; ?>)" type="number" name="quotedItems[<?php echo $iter; ?>][]" class="form-control form-control-table"/>
                                                            <span class="text-theme font-sm">
                                                                <b>&nbsp;</b>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <p class="table-p text-black">
                                                                USD
                                                            </p>
                                                        </td>
                                                        <td class="single-total">
                                                            <p class="table-p text-black" id="itemTotal<?php echo $unique; ?>">

                                                            </p>
                                                            <input onchange="calculateTotalAll(<?php echo $unique; ?>)" hidden="" readonly="" required="" id="amount<?php echo $unique; ?>" type="number" name="quotedItems[<?php echo $iter; ?>][]" class="form-control form-control-table"/>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <!--                                        <div class="text-right">
                                                                                    <p class="table-p text-black">
                                                                                        Total : <span id="grand">0</span>
                                                                                    </p>
                                                                                </div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php }
        ?>

        <!-- jQuery  -->
        <?php $this->load->view('vendor/halaxa_partials/scripts'); ?>

        <script>
            function calculateTotal(row) {
                var rowvalue = row;
                var quotedQuantity = "#quotedQuantity" + rowvalue;
                var quantity = "#quantity" + rowvalue;
                var priceId = "#price" + rowvalue;
                if ($(quantity).val() > $(quotedQuantity).val()) {
                    //$("#submit").attr("disabled", true);
                    alert("Quantity cannot be more than requested quantity.");
                } else {
                    //$("#submit").attr("disabled", false);
                    value = $(quantity).val();
                    value2 = $(priceId).val();
                    var grand = parseFloat($("#grand").html());
                    $("#amount" + rowvalue).val(value * parseFloat(value2.replace(",", "")));
                    $("#itemTotal" + rowvalue).html(value * parseFloat(value2.replace(",", "")) + " USD");
                    //$("#grand").html(grand + value * parseFloat(value2.replace(",", ""))));
                }
            }

            function calculateQuantityTotal(row) {
                var rowvalue = row;
                var quotedQuantity = "#quotedQuantity" + rowvalue;
                var quantity = "#quantity" + rowvalue;
                var priceId = "#price" + rowvalue;
                if ($(quantity).val() > $(quotedQuantity).val()) {
                    //$("#submit").attr("disabled", true);
                    alert("Quantity cannot be more than requested quantity.");
                } else {
                    //$("#submit").attr("disabled", false);
                    value = $(quantity).val();
                    value2 = $(priceId).val();
                    $("#amount" + rowvalue).val(value * parseFloat(value2.replace(",", "")));
                    $("#itemTotal" + rowvalue).html(value * parseFloat(value2.replace(",", "")) + " USD")
                }
            }

            $(document).ready(function () {
                $("#draft").click(function () {
                    alert("Are you sure?");
                    $("input").prop('required', false);
                });
            });
//            $(document).ready(function () {
//                $('#datatable-responsive-rfq').DataTable({
//                    "order": [[2, "asc"]]
//                });
//            });

//select all checkboxes
            $("#select_all_rfqs").change(function () {  //"select all" change 
                $('#select_all_sellers_view').prop('checked', true);
                var status = this.checked; // "select all" checked status
                $('.rfq-checkbox').each(function () { //iterate all listed checkbox items
                    this.checked = status; //change ".checkbox" checked status
                });
            });

            $('.rfq-checkbox').change(function () { //".checkbox" change 
                //uncheck "select all", if one of the listed checkbox item is unchecked
                if (this.checked == false) { //if this item is unchecked
                    $('#select_all_sellers_view').prop('checked', false);
                    $("#select_all_rfqs")[0].checked = false; //change "select all" checked status to false
                }

                //check "select all" if all checkbox items are checked
                if ($('.rfq-checkbox:checked').length == $('.rfq-checkbox').length) {
                    $("#select_all_rfqs")[0].checked = true; //change "select all" checked status to true
                    $('#select_all_sellers_view').prop('checked', true);
                }
            });
        </script>

    </body>

</html>