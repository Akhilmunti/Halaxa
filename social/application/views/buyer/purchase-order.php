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
                                            <h4 class="theme-header-text">My Purshased Orders</h4>
                                        </div>
                                        <div class="col-md-12">
                                            <form method="POST" action="<?php echo base_url('buyer/rfq/cancelledRFQ'); ?>">
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
                                                                <input name="rfq_start" placeholder="Issue Date" class="form-control form-control-sm form-control-filter" type="date">
                                                            </div>
                                                            <div class="col-md-2 no-padding-filter">
                                                                <select name="rfq_status" class="form-control form-control-sm form-control-filter">
                                                                    <option selected="" disabled="" value="">PO Status</option>
                                                                    <option value="1">Pending</option>
                                                                    <option value="2">under negotation</option>
                                                                </select>
                                                                <i class="fa fa-caret-down"></i>
                                                            </div>
                                                            <div class="col-md-2 offset-3">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <a href="<?php echo base_url('buyer/received_quotes'); ?>"><b class="font-size-11 p-info">Clear</b></a>
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
                                    <form method="POST" action="<?php echo base_url('buyer/rfq/cancelledBulkAction'); ?>">
                                        <div class="row">
                                            <div class="col-md-2 offset-10">
                                                <select onchange="this.form.submit()" name="rfq_grp_action" class="form-control form-control-sm form-control-filter">
                                                    <option selected="" disabled="" value="">Group Action</option>
                                                    <option value="1">Delete</option>
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
                                                            <th>PO ID</th>
                                                            <th>RFQ ID</th>
                                                            <th>Seller</th>
                                                            <th>Issue Date</th>
                                                            <th>Status</th>
                                                            <th>Location</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if (!empty($poissued)) {
                                                            $count = 0;
                                                            foreach ($poissued as $key => $rfq) {
                                                                //print_r($rfq);
                                                                $mRfqId = $rfq['RFQ_Id'];
                                                                $postatus = $rfq['reject_status'];
                                                                $count++;
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input name="select_rfq[]" value="<?php echo $mRfqId; ?>" type="checkbox" class="custom-control-input rfq-checkbox" id="select_rfq_<?php echo $mRfqId; ?>">
                                                                            <label class="custom-control-label" for="select_rfq_<?php echo $mRfqId; ?>"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table-user-name">
                                                                            <a href="<?php echo base_url() . "buyer/received_quotes/show/" . $rfq['RFQ_Id']; ?>" class="text-vertical table-username">
                                                                                <b>
                                                                                    <?php echo $rfq['RFQ_Key']; ?>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table-user-name">
                                                                            <a href="<?php echo base_url() . "buyer/received_quotes/show/" . $rfq['RFQ_Id']; ?>" class="text-vertical table-username">
                                                                                <b>
                                                                                    <?php echo $rfq['RFQ_Key']; ?>
                                                                                </b>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table-user-name">
                                                                            <a href="<?php echo base_url() . "buyer/received_quotes/show/" . $rfq['RFQ_Id']; ?>" class="text-vertical table-p text-theme">
                                                                                <b>
                                                                                    <?php echo $rfq['vendor_name']; ?>
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
                                                                        <?php if ($postatus == 1) { ?>
                                                                            <p class="table-p text-warning">
                                                                                Rejected
                                                                            </p>                                                                          
                                                                        <?php } else { ?>
                                                                            <p class="table-p text-warning">
                                                                                Issued
                                                                            </p>
                                                                        <?php } ?>
                                                                    </td>

                                                                    <td>
                                                                        <p class="table-p text-theme">
                                                                            <?php echo $rfq['Location']; ?>
                                                                        </p>
                                                                    </td>
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
        if (!empty($quotedRfq)) {
            $i = 1;
            foreach ($quotedRfq as $key => $rfq) {
                ?>
                <div id="myModalNegMail_<?php echo $rfq['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog">
                        <form id="rfqForm" method="POST" action="<?php echo base_url(); ?>buyer/received_quotes/requote/<?php echo $rfq['id']; ?>  " class="form-horizontal form-label-left" enctype="multipart/form-data">
                            <!-- Modal content-->
                            <div class="modal-content-theme">
                                <div class="modal-header bg-danger">
                                    <span class="modal-header-text">Negotiate : RFQ <?php echo $rfq['RFQ_Key']; ?></span>
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
                <?php
            }
        } else {
            ?>

        <?php }
        ?>


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