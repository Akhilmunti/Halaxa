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
                                <div class="theme-card p-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="theme-header-text">Public RFQs</h4>
                                        </div>
                                        <div class="col-md-12">
                                            <form method="POST" action="<?php echo base_url('buyer/rfq/publicRFQ'); ?>">
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
                                                                    <option value="1">Requested</option>
                                                                    <option value="2">Cancelled</option>
                                                                    <option value="3">Expired</option>
                                                                </select>
                                                                <i class="fa fa-caret-down"></i>
                                                            </div>
                                                            <div class="col-md-2 offset-3">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <a href="<?php echo base_url('buyer/rfq/publicRFQ'); ?>"><b class="font-size-11 p-info">Clear</b></a>
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
                                    <form method="POST" action="<?php echo base_url('buyer/rfq/publicBulkAction'); ?>">
                                        <div class="row">
                                            <div class="col-md-2 offset-10">
                                                <select onchange="this.form.submit()" name="rfq_grp_action" class="form-control form-control-sm form-control-filter">
                                                    <option selected="" disabled="" value="">Group Action</option>
                                                    <option value="1">Delete</option>
                                                    <option value="2">Cancel</option>
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
                                                            <th>Category</th>
                                                            <th style="background-color: #F8F8F9">Quotations</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
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
                                                                $mRfqId = $rfq['RFQ_Id'];
                                                                $mCancel = $rfq['cancel_rfq_status'];
                                                                $mQuotations = $this->rfq_model->getAllQuoteationsByRfqId($mRfqId);
                                                                if (!empty($mQuotations)) {
                                                                    $mQcount = count($mQuotations);
                                                                } else {
                                                                    $mQcount = "0";
                                                                }
                                                                $today = date("Y-m-d");
                                                                $end = strtotime($rfq['End']);
                                                                $end = date('Y-m-d', $end);
                                                                $count++;
                                                                ?>
                                                                <?php if ($statusfilter == "3") { ?>
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
                                                                            <td style="background-color: #F8F8F9">
                                                                                <div class="table-user-name">
                                                                                    <a href="#" class="text-vertical table-username">
                                                                                        <b>
                                                                                            <?php echo $mQcount; ?>
                                                                                        </b>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <p class="table-p text-theme">
                                                                                    <?php
                                                                                    $start = strtotime($rfq['Start']);
                                                                                    echo date('d  M  Y', $start);
                                                                                    ?>
                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="table-p text-theme">
                                                                                    <?php
                                                                                    $enddate = strtotime($rfq['End']);
                                                                                    echo date('d  M  Y', $enddate);
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
                                                                                    <p class="table-p text-theme">
                                                                                        Requested
                                                                                    </p>
                                                                                <?php } ?>
                                                                            </td>
                                                                            <td>
                                                                                <p class="table-p text-theme">
                                                                                    <?php echo $rfq['Location']; ?>, <?php echo $rfq['City']; ?>
                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <div class="text-left">
                                                                                    <a title="View Seller" data-toggle="modal" data-target="#<?php echo $rfq['RFQ_Id']; ?>" href="#" class="mr-3 no-decoration">
                                                                                        <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/view-buyer.png'); ?>" />
                                                                                    </a>
                                                                                    <a data-toggle="tooltip" title="Re-issue RFQ" href="<?php echo base_url() . "buyer/rfq/reorder/" . $rfq['RFQ_Id']; ?>" class="mr-3 no-decoration">
                                                                                        <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/re-issue-icon.png'); ?>" />
                                                                                    </a>
                                                                                    <?php if ($end < $today) { ?>

                                                                                    <?php } elseif ($mCancel == 0) { ?>
                                                                                        <a href="<?php echo base_url() . "buyer/rfq/cancelRfq/" . $rfq['RFQ_Id']; ?>" class="text-danger table-p">
                                                                                            Cancel
                                                                                        </a>
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                <?php } elseif ($statusfilter == "1") { ?>
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
                                                                            <td style="background-color: #F8F8F9">
                                                                                <div class="table-user-name">
                                                                                    <a href="#" class="text-vertical table-username">
                                                                                        <b>
                                                                                            <?php echo $mQcount; ?>
                                                                                        </b>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <p class="table-p text-theme">
                                                                                    <?php
                                                                                    $start = strtotime($rfq['Start']);
                                                                                    echo date('d  M  Y', $start);
                                                                                    ?>
                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="table-p text-theme">
                                                                                    <?php
                                                                                    $enddate = strtotime($rfq['End']);
                                                                                    echo date('d  M  Y', $enddate);
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
                                                                                    <p class="table-p text-theme">
                                                                                        Requested
                                                                                    </p>
                                                                                <?php } ?>
                                                                            </td>
                                                                            <td>
                                                                                <p class="table-p text-theme">
                                                                                    <?php echo $rfq['Location']; ?>, <?php echo $rfq['City']; ?>
                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <div class="text-left">
                                                                                    <a title="View Seller" data-toggle="modal" data-target="#<?php echo $rfq['RFQ_Id']; ?>" href="#" class="mr-3 no-decoration">
                                                                                        <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/view-buyer.png'); ?>" />
                                                                                    </a>
                                                                                    <a data-toggle="tooltip" title="Re-issue RFQ" href="<?php echo base_url() . "buyer/rfq/reorder/" . $rfq['RFQ_Id']; ?>" class="mr-3 no-decoration">
                                                                                        <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/re-issue-icon.png'); ?>" />
                                                                                    </a>
                                                                                    <?php if ($end < $today) { ?>

                                                                                    <?php } elseif ($mCancel == 0) { ?>
                                                                                        <a href="<?php echo base_url() . "buyer/rfq/cancelRfq/" . $rfq['RFQ_Id']; ?>" class="text-danger table-p">
                                                                                            Cancel
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
                                                                        <td style="background-color: #F8F8F9">
                                                                            <div class="table-user-name">
                                                                                <a href="#" class="text-vertical table-username">
                                                                                    <b>
                                                                                        <?php echo $mQcount; ?>
                                                                                    </b>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <p class="table-p text-theme">
                                                                                <?php
                                                                                $start = strtotime($rfq['Start']);
                                                                                echo date('d  M  Y', $start);
                                                                                ?>
                                                                            </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="table-p text-theme">
                                                                                <?php
                                                                                $enddate = strtotime($rfq['End']);
                                                                                echo date('d  M  Y', $enddate);
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
                                                                                <p class="table-p text-theme">
                                                                                    Requested
                                                                                </p>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <td>
                                                                            <p class="table-p text-theme">
                                                                                <?php echo $rfq['Location']; ?>, <?php echo $rfq['City']; ?>
                                                                            </p>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-left">
                                                                                <a title="View Seller" data-toggle="modal" data-target="#<?php echo $rfq['RFQ_Id']; ?>" href="#" class="mr-3 no-decoration">
                                                                                    <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/view-buyer.png'); ?>" />
                                                                                </a>
                                                                                <a data-toggle="tooltip" title="Re-issue RFQ" href="<?php echo base_url() . "buyer/rfq/reorder/" . $rfq['RFQ_Id']; ?>" class="mr-3 no-decoration">
                                                                                    <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/re-issue-icon.png'); ?>" />
                                                                                </a>
                                                                                <?php if ($end < $today) { ?>

                                                                                <?php } elseif ($mCancel == 0) { ?>
                                                                                    <a href="<?php echo base_url() . "buyer/rfq/cancelRfq/" . $rfq['RFQ_Id']; ?>" class="text-danger table-p">
                                                                                        Cancel
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
        <?php foreach ($rfqs as $key => $rfq) { ?>
            <!-- vendors Modal -->
            <div class="modal fade" id="<?php echo $rfq['RFQ_Id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                    $vendors = json_decode($rfq['V_Ids']);
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
        <?php } ?>

        <!-- jQuery  -->
        <?php $this->load->view('buyer/halaxa_partials/scripts'); ?>

        <script>
            function TDate() {
                var UserDate = document.getElementById("userdate").value;
                var ToDate = new Date();

                if (new Date(UserDate).getTime() <= ToDate.getTime()) {
                    alert("The Date must be Bigger or Equal to today date");
                    return false;
                }
                return true;
            }

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