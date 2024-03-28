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
                                            <h4 class="theme-header-text">View Sellers</h4>
                                        </div>
                                        <div class="col-md-12">
                                            <form method="POST" action="#">
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
                                                                    <option value="3">Expired</option>
                                                                </select>
                                                                <i class="fa fa-caret-down"></i>
                                                            </div>
                                                            <div class="col-md-2 offset-3">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <a href="<?php echo base_url('buyer/rfq/cancelledRFQ'); ?>"><b class="font-size-11 p-info">Clear</b></a>
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

                                </div>
                            </div>


                            <div class="col-md-12 mt-2">
                                <form id="productForm" method="POST" action="<?php echo base_url() . "buyer/vendors/sendBulkInmail"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                    <div class="theme-card p-3">
                                        <div class="card-header mb-2">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input name="public_rfq" value="1" type="checkbox" class="custom-control-input" id="select_all_sellers">
                                                        <label class="custom-control-label" for="select_all_sellers">Select All</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <button onclick="clickingFunction()" class="btn btn-danger">Send Mail to selection</button>
                                                    <div id="myModalSendMail" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog">
                                                            <!-- Modal content-->
                                                            <div class="modal-content-theme">
                                                                <div class="modal-header bg-danger">
                                                                    <span class="modal-header-text">Send Inmail</span>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12">
                                                                            <label class="control-label">Message</label>
                                                                            <textarea rows="3" required="" name="message" type="text" class="form-control" placeholder="Enter Message"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-sm btn-danger">Send Inmail</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <?php
                                                    if (!empty($vendors)) {
                                                        $iter = 0;
                                                        foreach ($vendors as $vendor) {
                                                            $iter++;
                                                            $vendor = $this->vendor_model->get_elementvendor_byID($vendor['User_Id']);
                                                            $mStatus = $this->vendor_model->getFavourite($vendor['User_Id']);
                                                            $mPayments = json_decode($vendor['payment_mode']);
                                                            $mAreas = json_decode($vendor['delivery_areas']);
                                                            //print_r($vendor);
                                                            ?>
                                                            <div class="col-md-4">
                                                                <div class="seller-card">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <?php if ($mStatus['status'] == "1") { ?>
                                                                                <div class="seller-fav text-danger">
                                                                                    <span class="fa fa-heart"></span>
                                                                                    <span>Favourite</span>
                                                                                </div>
                                                                            <?php } else { ?>
                                                                                <div class="seller-fav">
                                                                                    <span class="fa fa-heart"></span>
                                                                                    <span>Favourite</span>
                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="seller-select">
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input name="vendors[]" value="<?= $vendor['User_Id'] ?>" type="checkbox" class="custom-control-input seller-checkbox" id="seller_<?php echo $vendor['User_Id']; ?>">
                                                                                    <label class="custom-control-label" for="seller_<?php echo $vendor['User_Id']; ?>">Select</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-md-3">
                                                                            <img src="<?php echo base_url('assets/halaxa_buyer/images/user.png'); ?>" class="img-fluid rounded-circle" />
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <h6 class="seller-name mt-3"><?php echo $vendor['comapany_name'] ?></h6>
                                                                            <h6 class="seller-loc"><?php echo $vendor['country'] . ", " . $vendor['state'] ?></h6>
                                                                        </div>
                                                                        <div class="col-md-12 mt-3 mb-3 text-justify">
                                                                            <?php if ($vendor['company_brief']) { ?>
                                                                                <h6 class="seller-loc">
                                                                                    <?php echo $vendor['company_brief'] ?>
                                                                                </h6>
                                                                            <?php } else { ?>
                                                                                <h6 class="seller-loc">
                                                                                    &nbsp;
                                                                                </h6>
                                                                            <?php } ?>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <a data-toggle="modal" data-target="#read_<?php echo $iter; ?>" href="#" class="btn btn-seller-read btn-block mb-2">Read More</a>
                                                                            <a href="<?php echo base_url('buyer/products/viewVendorCatalogue/' . $vendor['User_Id']); ?>" class="btn btn-seller-catalogue btn-block">Product catalogue</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="read_<?php echo $iter; ?>" class="modal fade" role="dialog">
                                                                <div class="modal-dialog modal-lg">
                                                                    <!-- Modal content-->
                                                                    <div class="modal-content-theme">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-2">
                                                                                    <?php if ($this->session->userdata('Photo')) {
                                                                                        ?>
                                                                                        <img width="90" class="rounded-circle" src="<?php echo base_url(); ?>assets/photo/<?php echo $this->session->userdata('Photo'); ?>" alt="">
                                                                                    <?php } else {
                                                                                        ?>
                                                                                        <img width="90" class="rounded-circle" src="<?php echo base_url(); ?>assets/images/user.png" alt="">
                                                                                    <?php } ?>
                                                                                </div>
                                                                                <div class="col-md-10 mt-1">
                                                                                    <h6 class="text-theme font-bold"><?php echo $vendor['comapany_name'] ?></h6>
                                                                                    <a target="_blank" href="<?php echo $vendor['website']; ?>" class="font-sm"><?php echo $vendor['website']; ?></a>
                                                                                    <h6 class="text-theme font-sm"><?php echo $vendor['language']; ?></h6>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <h6 class="text-theme font-sm mt-3"><?php echo $vendor['company_brief']; ?></h6>
                                                                                    <?php if (!empty($mPayments)) { ?>
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <h6 class="vendorsub">
                                                                                                    Payment Terms 
                                                                                                </h6>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <?php foreach ($mPayments as $key => $mPayment) { ?>
                                                                                                    <span class="badge-light-theme"><?php echo $mPayment; ?></span>
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php } ?>
                                                                                    <?php if (!empty($mAreas)) { ?>
                                                                                        <div class="row mt-2">
                                                                                            <div class="col-md-3">
                                                                                                <h6 class="vendorsub">
                                                                                                    Delivery Areas
                                                                                                </h6>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <?php foreach ($mAreas as $key => $mArea) { ?>
                                                                                                    <span class="text-theme font-sm mr-2"><?php echo $mArea; ?></span>
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php } ?>
                                                                                    <?php if ($vendor['delivery_address']) { ?>
                                                                                        <div class="row mt-2">
                                                                                            <div class="col-md-3">
                                                                                                <h6 class="vendorsub">
                                                                                                    Addresses
                                                                                                </h6>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <span class="text-theme font-sm mr-2"><?php echo $vendor['delivery_address'] ?></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php } ?>
                                                                                    <div class="text-center mt-3">
                                                                                        <a href="<?php echo base_url('buyer/products/viewVendorCatalogue/' . $vendor['User_Id']); ?>" class="btn btn-danger">Products Catalogue</a>
                                                                                    </div>

                                                                                    <div class="text-left mt-3">
                                                                                        <?php if ($vendor['documents']) { ?>
                                                                                            <a download="" href="<?php echo base_url('uploads/' . $vendor['documents']); ?>" class="font-sm">Legal Document</a>
                                                                                        <?php } ?>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-info" type="button" class="close" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>

                                                    <?php }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Main -->
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
            $("#select_all_sellers").change(function () {  //"select all" change 
                $('#select_all_sellers_view').prop('checked', true);
                var status = this.checked; // "select all" checked status
                $('.seller-checkbox').each(function () { //iterate all listed checkbox items
                    this.checked = status; //change ".checkbox" checked status
                });
            });

            $('.seller-checkbox').change(function () { //".checkbox" change 
                //uncheck "select all", if one of the listed checkbox item is unchecked
                if (this.checked == false) { //if this item is unchecked
                    $('#select_all_sellers_view').prop('checked', false);
                    $("#select_all_sellers")[0].checked = false; //change "select all" checked status to false
                }

                //check "select all" if all checkbox items are checked
                if ($('.seller-checkbox:checked').length == $('.seller-checkbox').length) {
                    $("#select_all_sellers")[0].checked = true; //change "select all" checked status to true
                    $('#select_all_sellers_view').prop('checked', true);
                }
            });

            function clickingFunction() {
                var checked = $(".seller-checkbox:checked").length > 0;
                if (!checked) {
                    $('#myModalSendMail').modal('hide');
                    alert("Please check at least one checkbox");
                    return false;
                } else {
                    $('#myModalSendMail').modal('show');
                    return true;
                }
            }
        </script>

    </body>

</html>