<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('buyer/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>
    <body class="nav-md">
        <style>
            h2{
                word-wrap: break-word;
            }
            h4{
                word-wrap: break-word;
            }
            .desc-text{
                white-space: nowrap; 
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .table-desc-text{
                white-space: nowrap; 
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 50px;
            }
            .product-card{
                border-radius: 10px;
                box-shadow: 0 8px 6px -6px black;
            }
        </style>
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('buyer/partials/left-nav'); ?>    
                <?php $this->load->view('buyer/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <?php $this->load->view('buyer/partials/searchbar'); ?>
                    <div class="clearfix"></div>
                    <form id="productForm" method="POST" action="<?php echo base_url() . "buyer/search/sendBulkInmail"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                        <div class="row">
                            <?php
                            if (!empty($showSeller)) {
                                $ProductsBlock = "hide";
                                $SellersBlock = "";
                                $OthersBlock = "hide";
                            } else if (!empty($showOthers)) {
                                $ProductsBlock = "hide";
                                $SellersBlock = "hide";
                                $OthersBlock = "";
                            } else {
                                $ProductsBlock = "";
                                $SellersBlock = "hide";
                                $OthersBlock = "hide";
                            }
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="x_panel">
                                    <div class="col-md-9">
                                        <h4>Search Results</h4>
                                    </div>
                                    <div class="col-md-1 text-right <?php echo $showBlock; ?>">
                                        <input style="margin-top: 13px" type="checkbox" id="select_all"/>
                                    </div>
                                    <div class="col-md-2 <?php echo $showBlock; ?>">
                                        <button onclick="clickingFunction()" style="margin-top: 5px" class="btn btn-dark btn-sm btn-block">Send Mail</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /page content -->
                            <div id="myModalSendMail" class="modal fade" tabindex="100000" role="dialog" data-backdrop="false">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Send Message</h4>
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
                                            <button type="submit" class="btn btn-sm btn-dark btn-block">Send Mail</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 <?php echo $ProductsBlock ?>">
                                <?php
                                $alert = $this->session->flashdata('result');
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
                                <div class="row">
                                    <?php
                                    if (!empty($products)) {
                                        $i = 1;
                                        $counterIds = 0;
                                        foreach ($products as $key => $product) {
                                            $counterIds++;
                                            ?>
                                            <div class="col-md-4 col-xs-12 widget widget_tally_box" id="<?php echo $product['V_Id']; ?>_<?php echo $product['product_name']; ?>_product">
                                                <div class="x_panel product-card">
                                                    <div class="x_title">
                                                        <h2 class="text-uppercase"><?php echo $product['product_name']; ?></h2>
                                                        <ul class="nav navbar-right panel_toolbox" style="margin-right: -45px">
                                                            <li><input style="margin-top: 7px" value="<?php echo $product['V_Id']; ?>" class="checkbox" type="checkbox" name="vendors[]"></li>
                                                        </ul>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="x_content">
                                                        <div class="flex" style="margin-top: -20px" id="<?php echo $product['V_Id']; ?>_<?php echo $product['product_name']; ?>">
                                                            <ul id="myid" class="list-inline widget_profile_box">
                                                                <li id="<?php echo $product['V_Id']; ?>_<?php echo $product['product_name']; ?>">

                                                                    <?php
                                                                    if (!empty($imageId)) {
                                                                        ?>
                                                                        <img src="<?php echo base_url(); ?>assets/photo/<?php
                                                                        $user = $this->users_model->getUser($product['V_Id']);
                                                                        print_r($user[0]['Photo']);
                                                                        ?>" alt="..." class="img-circle profile_img">
                                                                         <?php } else { ?>
                                                                        <img src="https://via.placeholder.com/150" alt="..." class="img-circle profile_img">
                                                                    <?php } ?>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <i style="margin-top: 5px" class="fa fa-info"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <h4 class="text-uppercase text-center" style="margin-top: 15px">
                                                            <?php
                                                            $company = $this->users_model->get_vendor_details($product['V_Id']);
                                                            print_r($company->comapany_name);
                                                            ?>
                                                        </h4>
                                                        <h5 class="text-uppercase text-center">
                                                            <?php
                                                            $user = $this->users_model->getUser($product['V_Id']);
                                                            print_r($user[0]['Name']);
                                                            ?>
                                                        </h5>
                                                        <h5 class="text-uppercase text-center">
                                                            <?php
                                                            $user = $this->users_model->getUser($product['V_Id']);
                                                            print_r($user[0]['Phone']);
                                                            ?>
                                                        </h5>

                                                        <div class="row">
                                                            <div class="col-md-6 text_align-left">
                                                                <h5>Brand :</h5>
                                                                <h5>UOM :</h5>
                                                                <h5>Price :</h5>
                                                                <h5>Description :</h5>
                                                            </div>
                                                            <div class="col-md-6 text_align-left">
                                                                <h5><?php echo $product['brand']; ?></h5>
                                                                <h5><?php echo $product['uom']; ?></h5>
                                                                <h5>
                                                                    <?php
                                                                    $priceStatus = $product['price_status'];
                                                                    if ($priceStatus == "1") {
                                                                        ?>
                                                                        <a class="label label-danger">Hidden <span class="glyphicon glyphicon-eye-close"></span></a>
                                                                    <?php } else { ?>
                                                                        <?php echo $product['price']; ?>
                                                                    <?php } ?>
                                                                </h5>
                                                                <h5 class="desc-text"><?php echo $product['description']; ?></h5>
                                                            </div>
                                                        </div>
                                                        <br>
        <!--                                                        <button class="btn btn-success btn-block btn-xs" data-toggle="collapse" data-target="#<?php echo $counterIds; ?>">Clientele</button>
                                                        <div id="<?php echo $counterIds; ?>" class="collapse">
                                                        <?php
                                                        $clientsResult = $this->product_model->getClientsByVendor($product['V_Id']);
                                                        ?>
                                                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sl No</th>
                                                                        <th>Client Name</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                        <?php
                                                        $counter = 0;
                                                        if (!empty($clientsResult)) {
                                                            foreach ($clientsResult as $key => $client) {
                                                                $counter++;
                                                                ?>
                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                        <td><?php echo $counter; ?></td>
                                                                                                                                                                                                                        <td>
                                                                <?php echo $client['client_name']; ?>
                                                                                                                                                                                                                        </td>
                                                                                                                                                                                                                        </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                                                                                                                                    <tr>
                                                                                                                                                                        <td colspan="3">Clientele Empty !!</td>
                                                                                                                                                                    </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                                </tbody>
                                                            </table>
                                                        </div>-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <a data-toggle="modal" data-target="#more_<?php echo $counterIds; ?>" class="btn btn-block btn-dark btn-sm">More Products</a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <a data-toggle="modal" data-target="#product_<?php echo $counterIds; ?>" class="btn btn-block btn-dark btn-sm">Read More</a>
                                                            </div>
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
                            <div class="col-md-12 <?php echo $SellersBlock; ?>">
                                <div class="row">
                                    <?php
                                    if (!empty($vendors)) {
                                        $count = 0;
                                        foreach ($vendors as $key => $vendor) {
                                            $count++;
                                            ?>
                                            <div class="col-md-4 col-xs-12 widget widget_tally_box">
                                                <div class="x_panel product-card">
                                                    <div class="x_title">
                                                        <a href="<?php echo base_url('profile/index/') . $vendor['User_Id']; ?>" target="_blank">
                                                            <h2 class="text-uppercase">
                                                                <?php echo $vendor['comapany_name']; ?>
                                                            </h2>
                                                        </a>
                                                        <ul class="nav navbar-right panel_toolbox" style="margin-right: -45px">
                                                            <li><input style="margin-top: 7px" value="<?php echo $vendor['User_Id']; ?>" class="checkbox" type="checkbox" name="vendors[]"></li>
                                                        </ul>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="x_content">
                                                        <div class="flex" style="margin-top: -20px">
                                                            <ul class="list-inline widget_profile_box">
                                                                <li>
                                                                    <a href="<?php echo base_url('profile/index/') . $vendor['User_Id']; ?>" target="_blank">
                                                                        <?php
                                                                        $user = $this->users_model->getUser($vendor['User_Id']);
                                                                        if (!empty(($user[0]['Photo']))) {
                                                                            ?>
                                                                            <img src="<?php echo base_url(); ?>assets/photo/<?php
                                                                            $user = $this->users_model->getUser($vendor['User_Id']);
                                                                            print_r($user[0]['Photo']);
                                                                            ?>" alt="..." class="img-circle profile_img">
                                                                             <?php } else { ?>
                                                                            <img src="https://via.placeholder.com/150" alt="..." class="img-circle profile_img">
                                                                        <?php } ?>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <i style="margin-top: 5px" class="fa fa-info"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-md-6 text_align-left">
                                                                <h5>Company Brief :</h5>
                                                                <h5>Language :</h5>
                                                            </div>
                                                            <div class="col-md-6 text_align-left">
                                                                <h5>
                                                                    <?php
                                                                    if (!empty($vendor['company_brief'])) {
                                                                        echo implode(' ', array_slice(str_word_count($vendor['company_brief'], 2), 0, 5));
                                                                    } else {
                                                                        echo "Not Uploaded.";
                                                                    }
                                                                    ?>
                                                                </h5>
                                                                <h5><?php echo $vendor['language']; ?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <a data-toggle="modal" data-target="#more_<?php echo $count; ?>" class="btn btn-block btn-dark btn-sm">More Products</a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <a data-toggle="modal" data-target="#vendor_<?php echo $count; ?>" class="btn btn-block btn-dark btn-sm">Read More</a>
                                                            </div>
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
                            <div class="col-md-12 <?php echo $OthersBlock; ?>">
                                <?php
                                if (!empty($vendorIds)) {
                                    $i = 1;
                                    foreach ($vendorIds as $vendor) {
                                        $i++;
                                        $vendorData = $this->vendor_model->get_element_byID($vendor);
                                        ?>
                                        <div class="col-md-4 col-xs-12 widget widget_tally_box">
                                            <div class="x_panel product-card">
                                                <div class="x_title">
                                                    <h2 style="font-size: 16px !important" class="text-uppercase"><?php echo $vendorData['comapany_name']; ?></h2>
                                                    <ul class="nav navbar-right panel_toolbox" style="margin-right: -45px">
                                                        <li><input style="margin-top: 7px" value="<?php echo $vendor; ?>" class="checkbox" type="checkbox" name="vendors[]"></li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="flex" style="margin-top: -20px">
                                                        <ul class="list-inline widget_profile_box">
                                                            <li>
                                                                <?php
                                                                $user = $this->users_model->getUser($vendorData['User_Id']);
                                                                if (!empty(($user[0]['Photo']))) {
                                                                    ?>
                                                                    <img src="<?php echo base_url(); ?>assets/photo/<?php
                                                                    $user = $this->users_model->getUser($vendorData['User_Id']);
                                                                    print_r($user[0]['Photo']);
                                                                    ?>" alt="..." class="img-circle profile_img">
                                                                     <?php } else { ?>
                                                                    <img src="https://via.placeholder.com/150" alt="..." class="img-circle profile_img">
                                                                <?php } ?>
                                                            </li>
                                                            <li>
                                                                <a>
                                                                    <i style="margin-top: 5px" class="fa fa-info"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6 text_align-left">
                                                            <h5>Company Brief :</h5>
                                                            <h5>Language :</h5>
                                                        </div>
                                                        <div class="col-md-6 text_align-left">
                                                            <h5>
                                                                <?php
                                                                if (!empty($vendorData['company_brief'])) {
                                                                    echo implode(' ', array_slice(str_word_count($vendorData['company_brief'], 2), 0, 5));
                                                                } else {
                                                                    echo "Not Uploaded.";
                                                                }
                                                                ?>
                                                            </h5>
                                                            <h5>
                                                                <?php
                                                                if ($vendorData['language']) {
                                                                    echo $vendorData['language'];
                                                                } else {
                                                                    echo "Not Uploaded";
                                                                }
                                                                ?>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button class="btn btn-dark btn-block btn-xs" data-toggle="collapse" data-target="#<?php echo "id_" + $i; ?>">Clientele</button>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <a target="_blank" class="btn btn-dark btn-block btn-xs" href="<?php echo base_url(); ?>buyer/search/vendorProducts/<?php echo $vendor; ?>">Products</a>
                                                        </div>
                                                    </div>
                                                    <div id="<?php echo "id_" + $i; ?>" class="collapse">
                                                        <?php
                                                        $clientsResult = $this->product_model->getClientsByVendor($vendorData['User_Id']);
                                                        ?>
                                                        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sl No</th>
                                                                    <th>Client Name</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $counter = 0;
                                                                if (!empty($clientsResult)) {
                                                                    foreach ($clientsResult as $key => $client) {
                                                                        $counter++;
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $counter; ?></td>
                                                                            <td>
                                                                                <?php echo $client['client_name']; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <tr>
                                                                        <td colspan="3">Clientele Empty !!</td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
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

                    </form>
                </div>

                <!-- footer content -->
                <?php $this->load->view('buyer/partials/footer'); ?>
                <?php $this->load->view('search/modal_products'); ?>
                <?php $this->load->view('search/modal_more_products'); ?>
                <?php $this->load->view('search/modal_vendor'); ?>
                <!-- /footer content --> 
            </div>
        </div>

        <?php $this->load->view('buyer/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script type="text/javascript">
            //select all checkboxes
            $("#select_all").change(function () {  //"select all" change 
                var status = this.checked; // "select all" checked status
                $('.checkbox').each(function () { //iterate all listed checkbox items
                    this.checked = status; //change ".checkbox" checked status
                });
            });

            $("#select_all_sellers").change(function () {  //"select all" change 
                var status = this.checked; // "select all" checked status
                $('.checkbox').each(function () { //iterate all listed checkbox items
                    this.checked = status; //change ".checkbox" checked status
                });
            });

            $("#select_all_others").change(function () {  //"select all" change 
                var status = this.checked; // "select all" checked status
                $('.checkbox').each(function () { //iterate all listed checkbox items
                    this.checked = status; //change ".checkbox" checked status
                });
            });

            $('.checkbox').change(function () { //".checkbox" change 
                //uncheck "select all", if one of the listed checkbox item is unchecked
                if (this.checked == false) { //if this item is unchecked
                    $("#select_all")[0].checked = false; //change "select all" checked status to false
                }

                //check "select all" if all checkbox items are checked
                if ($('.checkbox:checked').length == $('.checkbox').length) {
                    $("#select_all")[0].checked = true; //change "select all" checked status to true
                }
            });

            $("#sendMail").onclick(function () {
                var checked = $("#productForm input:checked").length > 0;
                if (!checked) {
                    alert("Please check at least one checkbox");
                    return false;
                } else {
                    return true;
                }
            });

            function clickingFunction() {
                var checked = $("#productForm input:checked").length > 0;
                if (!checked) {
                    $('#myModalSendMail').modal('hide');
                    alert("Please check at least one checkbox");
                    return false;
                } else {
                    $('#myModalSendMail').modal('show');
                    return true;
                }
            }

            function clickingFunctionSeller() {
                var checked = $("#productForm input:checked").length > 0;
                if (!checked) {
                    $("#myModalSendMail").modal('hide');
                    alert("Please check at least one checkbox");
                    return false;
                } else {
                    $('#myModalSendMail').modal('show');
                    return true;
                }
            }

            function clickingFunctionThree() {
                var checked = $("#productForm input:checked").length > 0;
                if (!checked) {
                    $("#myModalSendMail").modal('hide');
                    alert("Please check at least one checkbox");
                    return false;
                } else {
                    $('#myModalSendMail').modal('show');
                    return true;
                }
            }


        </script>
        <style>
            .right-float{
                float: right !important
            }
            .hide{
                visibility: collapse
            }
        </style>
        <script>
            // Category change event
            $('#categories').change(function () {
                $.post("<?php echo base_url('buyer/rfq/getSubCatByCat/'); ?>",
                        {
                            category: this.value,
                        },
                        function (data, status) {
                            $('#subcategories').html(data);
                        });
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