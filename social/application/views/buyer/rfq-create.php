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

                <div id="content-two">
                    <div class="theme-card container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Smart Wizard -->
                                <form id="rfqForm" method="POST" action="<?php echo base_url() . "buyer/rfq/create-submit"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                    <div id="wizard" class="form_wizard wizard_horizontal">
                                        <ul class="wizard_steps">
                                            <li> 
                                                <a href="#step-1"> 
                                                    <span class="step_no">    
                                                        <img class="mb-1" height="20" width="20" src="<?php echo base_url('assets/halaxa_buyer/images/guide-icon.png'); ?>" />
                                                    </span> 
                                                    <span class="step_descr"> 
                                                        Guide
                                                    </span> 
                                                </a> 
                                            </li>
                                            <li> <a href="#step-2"> <span class="step_no">2</span> <span class="step_descr"> Basic Info </span> </a> </li>
                                            <li> <a href="#step-3"> <span class="step_no">3</span> <span class="step_descr"> Items </span> </a> </li>
                                            <li> <a href="#step-4"> <span class="step_no">4</span> <span class="step_descr"> Seller Selection </span> </a> </li>
                                            <li> 
                                                <a href="#step-5"> 
                                                    <span class="step_no" >    
                                                        <img class="mb-1" height="20" width="20" src="<?php echo base_url('assets/halaxa_buyer/images/review-icon.png'); ?>" />
                                                    </span>
                                                    <span class="step_descr"> Review & Submit </span> 
                                                </a> 
                                            </li>
                                        </ul>

                                        <hr class="hr-theme">

                                        <div class="p-5">
                                            <div id="step-1" style="min-height: 450px">                        
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6><b>Creating a new Request For Quotation</b></h6>
                                                        <p class="p-info">
                                                            This page guides you through the process of creating a new RFQ
                                                        </p>
                                                        <h6 class="h-info"><b>Receive Quotation</b></h6>
                                                        <p class="p-info">
                                                            Material confined likewise it humanity raillery an unpacked as he. Th comparison an. Matters engaged between he of pursuit manners w sentirnents simplicity connection. Far supply depart branch agreed ree chief merit no if. Now how her edward engage not horses. Oh resolution he dissimilar precaution to e moments. Merit gay end sight front Manor equal it on again ye folly by match In so melancholy as an old get our. 
                                                        </p>
                                                        <h6 class="h-info"><b>Issue a Purchase Order</b></h6>
                                                        <p class="p-info">
                                                            Material confined likewise it humanity raillery an unpacked as he. Th comparison an. Matters engaged between he of pursuit manners w sentirnents simplicity connection. Far supply depart branch agreed ree chief merit no if. Now how her edward engage not horses. Oh resolution he dissimilar precaution to e moments. Merit gay end sight front Manor equal it on again ye folly by match In so melancholy as an old get our. 
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="step-2" style="min-height: 450px">
                                                <h6><b>Basic Info</b></h6>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Group 
                                                        <span class="form-required-icon">*</span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <select name="types" id="types" required="" class="form-control form-rounded" name="titles">
                                                            <option selected="" value="">Select Group</option>
                                                            <?php
                                                            foreach ($types as $type) {
                                                                echo "<option value='" . $type['T_Id'] . "'>" . $type['Type'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                        <i class="fa fa-caret-down"></i>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-9 offset-md-3 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="error-group"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Category 
                                                        <span class="form-required-icon">*</span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <select id="categories" name="categories" required="" class="form-control form-rounded" name="titles">
                                                            <option selected="" value="">Select Category</option>
                                                        </select>
                                                        <i class="fa fa-caret-down"></i>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-9 offset-md-3 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="error-category"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Sub Category 
                                                        <span class="form-required-icon">*</span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <select name="subcategories" id="subcategories" required="" class="form-control form-rounded" name="titles">
                                                            <option selected="" value="">Select Sub Category</option>
                                                        </select>
                                                        <i class="fa fa-caret-down"></i>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-9 offset-md-3 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="error-subcategory"></span>
                                                    </div>
                                                </div>

                                                <hr class="hr-theme">

                                                <h6 class="mt-3"><b>Period</b></h6>

                                                <div class="form-group row mt-4">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Start Date
                                                        <span class="form-required-icon">*</span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input name="startdate" type="date" class="form-control form-rounded" id="single_cal1">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-9 offset-md-3 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="error-startdate"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        End Date
                                                        <span class="form-required-icon">*</span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input name="enddate" type="date" class="form-control form-rounded" id="single_cal2">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-9 offset-md-3 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="error-enddate"></span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>

                                                <hr class="hr-theme">

                                                <h6 class="mt-3"><b>Location</b></h6>

                                                <div class="form-group row mt-4">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Location
                                                        <span class="form-required-icon">*</span>
                                                    </label>
                                                    <div class="col-md-2">
                                                        <?php
                                                        if (!empty($user->Locations)) {
                                                            $place = $user->Locations;
                                                        } else {
                                                            $place = "";
                                                        }
                                                        ?>
                                                        <input value="<?php echo $place; ?>" class="form-control form-rounded" name="location" id="loc-automplete" list="country">
                                                        <datalist id="country">
                                                            <option value="" disabled="" selected="">Country</option>
                                                            <?php
                                                            foreach ($countries as $loc) {
                                                                if ($loc['name'] == $user->Locations) {
                                                                    echo "<option selected='' data-value='" . $loc['id'] . "' value='" . $loc['name'] . "'>" . $loc['name'] . "</option>";
                                                                } else {
                                                                    echo "<option data-value='" . $loc['id'] . "' value='" . $loc['name'] . "'>" . $loc['name'] . "</option>";
                                                                }
                                                            }
                                                            ?>
                                                        </datalist>
                                                        <i class="fa fa-caret-down"></i>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="state" id="state-automplete" class="form-control form-rounded">
                                                            <option value="" disabled="" selected="">State</option>
                                                        </select>
                                                        <i class="fa fa-caret-down"></i>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="city" id="city-automplete" class="form-control form-rounded">
                                                            <option value="" disabled="" selected="">City</option>
                                                        </select>
                                                        <i class="fa fa-caret-down"></i>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-9 offset-md-3 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="error-location"></span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div id="step-3" style="min-height: 450px">
                                                <span class="form-error-message text-danger text-danger" id="error-items"></span>
                                                <br>
                                                <a class="text-theme no-decoration" href="#" data-toggle="modal" data-target=".modal-items">
                                                    <b>Add item</b>
                                                    <img class="ml-2" style="margin-top: -3px" height="18" src="<?php echo base_url('assets/halaxa_buyer/images/add-item-icon.png'); ?>" />
                                                </a>
                                                <!--Item modal -->
                                                <div class="modal fade modal-items" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content-theme">
                                                            <div class="modal-header bg-danger">
                                                                <span class="modal-header-text">Product Basic Information</span>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="p-3">
                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3" class="col-md-4 col-form-label">
                                                                            Product Name 
                                                                            <span class="form-required-icon">*</span>
                                                                        </label>
                                                                        <div class="col-md-8">
                                                                            <input id="item_name" required="" class="form-control form-rounded" type="text" placeholder="Product Name" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3" class="col-md-4 col-form-label">
                                                                            Quantity
                                                                            <span class="form-required-icon">*</span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <input id="item_quantity" required="" class="form-control form-rounded" type="text" placeholder="Quantity" />
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <select name="moq" id="item_moq" class="form-control form-rounded">
                                                                                <option value="" disabled="" selected="">MOQ</option>
                                                                                <?php
                                                                                foreach ($uoms as $key => $uom) {
                                                                                    echo "<option value='" . $uom['Uom'] . "'>" . $uom['Uom'] . "</option>";
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                            <i class="fa fa-caret-down"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3" class="col-md-4 col-form-label">
                                                                            Brand
                                                                        </label>
                                                                        <div class="col-md-8">
                                                                            <input id="item_brand" required="" class="form-control form-rounded" type="text" placeholder="Brand" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3" class="col-md-4 col-form-label">
                                                                            Details
                                                                            <span class="form-required-icon">*</span>
                                                                        </label>
                                                                        <div class="col-md-8">
                                                                            <textarea id="item_details" rows="4" required="" class="form-control form-rounded" type="text" placeholder="Details"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-info" type="button" class="close" data-dismiss="modal">Cancel</button>
                                                                <button id="item_action_add" class="btn btn-danger right-float">Add</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table id="itemsTable" class="table order-list table-striped mt-3">
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
                                                            <td></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody  id="itemsTbody"></tbody>
                                                </table>

                                                <h6 class="mt-5">
                                                    <b>Import items</b>
                                                </h6>
                                                <p class="p-sm">
                                                    <b>
                                                        Note: Please make sure column number and column names are similar in your uploading BOQ documents.
                                                    </b>
                                                </p>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <input type="file" id="excelfile" class="form-control" placeholder='Choose a file...' />
                                                            <div class="input-group-append">
                                                                <input class="btn btn-success text-white" type="button" id="viewfile" value="Import To Table" onclick="ExportToTable()"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <p class="p-sm">
                                                    <b>Upload BOQ/List of requirements in Excel format.</b>
                                                    <a class="badge badge-success" href="<?php echo base_url('assets/halaxa_buyer/templates/halaxa_items_template.xlsx'); ?>" download>Download Template</a>
                                                </p>
                                            </div>      

                                            <div id="step-4" style="min-height: 450px">
                                                <span class="form-error-message text-danger text-danger" id="error-sellers"></span>
                                                <br>
                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input name="public_rfq" value="1" type="checkbox" class="custom-control-input" id="select_all_sellers">
                                                    <label class="custom-control-label" for="select_all_sellers">This is a public RFQ (public will be visible to all sellers)</label>
                                                </div>
                                                <div class="row">
                                                    <?php
                                                    $iter = 0;
                                                    foreach ($vendors as $key => $value) {
                                                        $mId = $value['User_Id'];
                                                        //print_r($vendor);
                                                        $iter++;
                                                        $vendor = $this->vendor_model->get_elementvendor_byID($mId);
                                                        $mStatus = $this->vendor_model->getFavourite($mId);
                                                        $mPayments = json_decode($vendor['payment_mode']);
                                                        $mAreas = json_decode($vendor['delivery_areas']);
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
                                                                        <a target="_blank" href="<?php echo base_url('buyer/products/viewVendorCatalogue/' . $vendor['User_Id']); ?>" class="btn btn-seller-catalogue btn-block">Product catalogue</a>
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
                                                                                    <a target="_blank" href="<?php echo base_url('buyer/products/viewVendorCatalogue/' . $vendor['User_Id']); ?>" class="btn btn-danger">Products Catalogue</a>
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
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div id="step-5" style="min-height: 450px">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6 class="mt-2">
                                                            <b>Request For Quotation</b>
                                                        </h6>
                                                        <div class="custom-control custom-checkbox">
                                                            <input readonly="" type="checkbox" class="custom-control-input" id="select_all_sellers_view">
                                                            <label class="custom-control-label" for="select_all_sellers_view">Public RFQ</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="seller-card">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <span class="seller-view-title">Start</span>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <span id="start_date_view" class="seller-view">7 July 2020</span>
                                                                </div>
                                                            </div>
                                                            <hr class="hr-theme">
                                                            <div class="row">
                                                                <div class="col-md-6 text-left">
                                                                    <span class="seller-view-title">End</span>
                                                                </div>
                                                                <div class="col-md-6 text-left">
                                                                    <span id="end_date_view" class="seller-view">7 July 2020</span>
                                                                </div>
                                                            </div>
                                                            <hr class="hr-theme">
                                                            <div class="row">
                                                                <div class="col-md-6 text-left">
                                                                    <span class="seller-view-title">Group</span>
                                                                </div>
                                                                <div class="col-md-6 text-left">
                                                                    <span id="group_view" class="seller-view">7 July 2020</span>
                                                                </div>
                                                            </div>
                                                            <hr class="hr-theme">
                                                            <div class="row">
                                                                <div class="col-md-6 text-left">
                                                                    <span class="seller-view-title">Category</span>
                                                                </div>
                                                                <div class="col-md-6 text-left">
                                                                    <span id="category_view" class="seller-view">7 July 2020</span>
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
                                                                    <td></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="itemsTbodyView"></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </form>
                                <!-- End SmartWizard Content --> 
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
            $(document).ready(function () {

                $('#single_cal1').change(function () {
                    const d = new Date(this.value)
                    const ye = new Intl.DateTimeFormat('en', {year: 'numeric'}).format(d)
                    const mo = new Intl.DateTimeFormat('en', {month: 'short'}).format(d)
                    const da = new Intl.DateTimeFormat('en', {day: '2-digit'}).format(d)
                    $("#start_date_view").html(`${da}-${mo}-${ye}`);
                });

                $('#single_cal2').change(function () {
                    const d = new Date(this.value)
                    const ye = new Intl.DateTimeFormat('en', {year: 'numeric'}).format(d)
                    const mo = new Intl.DateTimeFormat('en', {month: 'short'}).format(d)
                    const da = new Intl.DateTimeFormat('en', {day: '2-digit'}).format(d)
                    $("#end_date_view").html(`${da}-${mo}-${ye}`);
                });

                $('#types').change(function () {
                    var value = $("#types :selected").text();
                    $("#group_view").html(value);
                });

                $('#subcategories').change(function () {
                    var value = $("#categories :selected").text();
                    var subvalue = $("#subcategories :selected").text();
                    value = value + ", " + subvalue;
                    $("#category_view").html(value);
                });

                var counter = 1;
                $('#item_action_add').on('click', function (e) {
                    e.preventDefault();
                    var name = $("#item_name").val();
                    var quantity = $("#item_quantity").val();
                    var moq = $("#item_moq").val();
                    var brand = $("#item_brand").val();
                    var details = $("#item_details").val();

                    if (name == "" || quantity == "" || moq == "" || details == "") {
                        alert("Fill all the fields.");
                    } else {
                        var rowCount = $('#itemsTable tr').length;
                        var count = rowCount;
                        var newRow = $("<tr>");
                        var cols = "";
                        cols += '<td><input hidden="" value="' + count + '" type="text" name="iteminfo[' + count + '][]"/><p class="jobs-li-place text-justify p-info">' + count + '</p></td>';
                        cols += '<td><input hidden="" value="' + name + '" type="text" name="iteminfo[' + count + '][]"/><p class="jobs-li-place text-justify p-info">' + name + '</p></td>';
                        cols += '<td><input hidden="" value="' + brand + '" type="text" name="iteminfo[' + count + '][]"/><p class="jobs-li-place text-justify p-info">' + brand + '</p></td>';
                        cols += '<td><input hidden="" value="' + details + '" type="text" name="iteminfo[' + count + '][]"/><p class="jobs-li-place text-justify p-info">' + details + '</p></td>';
                        cols += '<td><input hidden="" value="' + quantity + ' ' + moq + '" type="text" name="iteminfo[' + count + '][]"/><p class="jobs-li-place text-justify p-info">' + quantity + ' ' + moq + '</p></td>';
                        cols += '<td><a class="ibtnDel" href="#"><img height="18" src="<?php echo base_url('assets/halaxa_buyer/images/delete-item-icon.png'); ?>" /></a></td>'
                        newRow.append(cols);
                        if ($("#itemsTable").append(newRow)) {
                            counter++;
                            var source = document.getElementById('itemsTable');
                            var destination = document.getElementById('itemsTableView');
                            var copy = source.cloneNode(true);
                            copy.setAttribute('id', 'itemsTableView');
                            destination.parentNode.replaceChild(copy, destination);
                            $("#item_name").val("");
                            $("#item_quantity").val("");
                            $("#item_moq").val("");
                            $("#item_brand").val("");
                            $("#item_details").val("");
                            $('.modal-items').modal('toggle');
                        }
                    }

                });

                $("#itemsTable").on("click", ".ibtnDel", function (event) {
                    $(this).closest("tr").remove();
                    var source = document.getElementById('itemsTable');
                    var destination = document.getElementById('itemsTableView');
                    var copy = source.cloneNode(true);
                    copy.setAttribute('id', 'itemsTableView');
                    destination.parentNode.replaceChild(copy, destination);
                    counter -= 1
                });

                /* SMART WIZARD */
                function init_SmartWizard() {

                    if (typeof ($.fn.smartWizard) === 'undefined') {
                        return;
                    }
                    console.log('init_SmartWizard');

                    // $('#wizard').smartWizard();
                    $('#wizard').smartWizard({
                        onLeaveStep: leaveAStepCallback,
                        onFinish: onFinishCallback
                    });

                    function leaveAStepCallback(obj, context) {
                        // alert("Leaving step " + context.fromStep + " to go to step " + context.toStep);
                        return validateSteps(context.fromStep); // return false to stay on step and true to continue navigation 
                    }

                    function onFinishCallback(objs, context) {
                        if (validateAllSteps()) {
                            $('form').submit();
                        }
                    }

                    // Your Step validation logic
                    function validateSteps(stepnumber) {
                        var isStepValid = false;
                        // validate step 1
                        if (stepnumber == 1) {
                            // Your step validation logic
                            var errors = 0;

                            if (errors == 0) {
                                isStepValid = true;
                            }
                            return isStepValid;
                        }
                        if (stepnumber == 2) {
                            isStepValid = false;
                            var errors = 0;
                            // Your step validation logic
                            // set isStepValid = false if has errors
                            var types = $('#types').val();
                            var categories = $('#categories').val();
                            var subcategories = $('#subcategories').val();
                            var single_cal1 = $('#single_cal1').val();
                            var single_cal2 = $('#single_cal2').val();
                            var city_automplete = $('#city-automplete').val();
                            var loc_automplete = $('#loc-automplete').val();
                            var datereg = /^\d\d\/\d\d\/\d{4}$/;
                            var errors = 0;
                            if (!types.match(/^\d+$/)) {
                                errors++;
                                $('#error-group').html("Please select group");
                            } else {
                                $('#error-group').html("");
                            }

                            if (!categories.match(/^\d+$/)) {
                                errors++;
                                $('#error-category').html("Please select category");
                            } else {
                                $('#error-category').html("");
                            }

                            if (!subcategories.match(/^\d+$/)) {
                                errors++;
                                $('#error-subcategory').html("Please select sub category");
                            } else {
                                $('#error-subcategory').html("");
                            }

                            if (single_cal1) {
                                $('#error-startdate').html("");
                            } else {
                                errors++;
                                $('#error-startdate').html("Please select start date");
                            }

                            if (single_cal2) {
                                $('#error-enddate').html("");
                            } else {
                                errors++;
                                $('#error-enddate').html("Please select end date");
                            }

                            if (!city_automplete.match(/^\d+$/)) {
                                $('#error-location').html("");
                            } else {
                                errors++;
                                $('#error-location').html("Please select city");
                            }

                            if (!loc_automplete.match(/^\d+$/)) {
                                $('#error-location').html("");
                            } else {
                                errors++;
                                $('#error-location').html("Please select country");
                            }

                            if (errors == 0) {
                                isStepValid = true;
                            }
                            return isStepValid;
                        }
                        if (stepnumber == 3) {
                            isStepValid = false;
                            var errors = 0;
                            var rowCount = $('#itemsTable tr').length;
                            if (rowCount == 1) {
                                errors++;
                                $('#error-items').html("Please add items.");
                            } else {
                                $('#error-items').html("");
                            }
                            if (errors == 0) {
                                isStepValid = true;
                            }
                            return isStepValid;
                        }
                        if (stepnumber == 4) {
                            isStepValid = false;
                            var vendor_checks = $('input[name^=vendor_id]:checked').map(function (idx, elem) {
                                return $(elem).val();
                            }).get();
                            if (vendor_checks.length < 1) {
                                $('#error-sellers').html("Please select at least one seller");
                            } else {
                                $('#error-sellers').html("");
                                isStepValid = true;
                            }
                            console.log(vendor_checks);
                            return isStepValid;
                        }
                        if (stepnumber == 5) {
                            isStepValid = true;
                            return isStepValid;
                        }
                        // ...      
                    }


                    function validateAllSteps() {
                        // for 3rd step filal validation
                        isStepValid = false;
                        var vendor_checks = $('input[name^=vendor_id]:checked').map(function (idx, elem) {
                            return $(elem).val();
                        }).get();
                        if (vendor_checks.length < 1) {
                            $('#vendorRowError').html("Please select at least one vendor");
                        } else {
                            $('#vendorRowError').html("");
                            isStepValid = true;
                        }
                        return isStepValid;
                    }

                    function alertFun() {
                        console.log("Submit form");
                        $('#rfqForm').submit();
                    }
                    $('#wizard_verticle').smartWizard({
                        transitionEffect: 'slide'
                    });

                    $('.buttonNext').addClass('btn btn-danger');
                    $('.buttonPrevious').addClass('btn btn-info');
                    $('.buttonFinish').addClass('btn btn-success');

                }

                function init_validator() {

                    if (typeof (validator) === 'undefined') {
                        return;
                    }
                    console.log('init_validator');

                    // initialize the validator function
                    validator.message.date = 'not a real date';

                    // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
                    $('form')
                            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
                            .on('change', 'select.required', validator.checkField)
                            .on('keypress', 'input[required][pattern]', validator.keypress);

                    $('.multi.required').on('keyup blur', 'input', function () {
                        validator.checkField.apply($(this).siblings().last()[0]);
                    });

                    $('form').submit(function (e) {
                        e.preventDefault();
                        var submit = true;

                        // evaluate the form using generic validaing
                        if (!validator.checkAll($(this))) {
                            submit = false;
                        }

                        if (submit)
                            this.submit();

                        return false;
                    });

                }


                init_SmartWizard();

            });

        </script>

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
        </script>
        <script>
            $(document).ready(function () {
                var defaultCountry = '<?php echo $country; ?>';
                if (defaultCountry != "") {
                    $.post("<?php echo base_url('buyer/rfq/getStateByCountry/'); ?>",
                            {
                                location: defaultCountry,
                            },
                            function (data, status) {
                                $('#state-automplete').html(data);
                            });
                }
            });
            $('#loc-automplete').change(function () {
                $.post("<?php echo base_url('buyer/rfq/getStateByCountry/'); ?>",
                        {
                            location: this.value,
                        },
                        function (data, status) {
                            $('#state-automplete').html(data);
                        });
            });

            $('#state-automplete').change(function () {
                $.post("<?php echo base_url('buyer/rfq/getCityByState/'); ?>",
                        {
                            state: this.value,
                        },
                        function (data, status) {
                            $('#city-automplete').html(data);
//                            $('#city-automplete').multiselect({
//                                includeSelectAllOption: true,
//                                enableCaseInsensitiveFiltering: true,
//                                buttonWidth: '100%'
//                            });
                        });
            });
        </script>
        <script>
            // Type change event
            $('#types').change(function () {
                $.post("<?php echo base_url('buyer/rfq/getCatByType/'); ?>",
                        {
                            type: this.value,
                        },
                        function (data, status) {
                            $('#categories').html(data);
                        });
            });

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

            // location autocomplete
            var locations = [
<?php
foreach ($locs as $key => $loc) {
    echo "{ value: '" . $loc['Location'] . "', data: '" . $loc['L_Id'] . "' },";
}
?>
            ];
            $('#loc-automplete').autocomplete({lookup: locations});

            // Cities autocomplete
            var cities = [
<?php
foreach ($cities as $key => $city) {
    echo "{ value: '" . $city['City'] . "', data: '" . $city['C_Id'] . "' },";
}
?>
            ];
            $('#city-automplete').autocomplete({lookup: cities});

            // For input file styling

            function bs_input_file() {
                $(".input-file").before(
                        function () {
                            if (!$(this).prev().hasClass('input-ghost')) {
                                var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                                element.attr("name", $(this).attr("name"));
                                element.change(function () {
                                    element.next(element).find('input').val((element.val()).split('\\').pop());
                                });
                                $(this).find("button.btn-choose").click(function () {
                                    element.click();
                                });
                                $(this).find("button.btn-reset").click(function () {
                                    element.val(null);
                                    $(this).parents(".input-file").find('input').val('');
                                });
                                $(this).find('input').css("cursor", "pointer");
                                $(this).find('input').mousedown(function () {
                                    $(this).parents('.input-file').prev().click();
                                    return false;
                                });
                                return element;
                            }
                        }
                );
            }
            $(function () {
                bs_input_file();
            });
        </script>
        <script type="text/javascript">
            function ExportToTable() {
                $('#itemsTbody tr').remove();
                var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;
                /*Checks whether the file is a valid excel file*/
                if (regex.test($("#excelfile").val().toLowerCase())) {
                    var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/
                    if ($("#excelfile").val().toLowerCase().indexOf(".xlsx") > 0) {
                        xlsxflag = true;
                    }
                    /*Checks whether the browser supports HTML5*/
                    if (typeof (FileReader) != "undefined") {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var data = e.target.result;
                            /*Converts the excel data in to object*/
                            if (xlsxflag) {
                                var workbook = XLSX.read(data, {type: 'binary'});
                            } else {
                                var workbook = XLS.read(data, {type: 'binary'});
                            }
                            /*Gets all the sheetnames of excel in to a variable*/
                            var sheet_name_list = workbook.SheetNames;

                            var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/
                            sheet_name_list.forEach(function (y) { /*Iterate through all sheets*/
                                /*Convert the cell value to Json*/
                                if (xlsxflag) {
                                    var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);
                                } else {
                                    var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);
                                }
                                if (exceljson.length > 0 && cnt == 0) {
                                    BindTable(exceljson, '#itemsTable');
                                    cnt++;
                                }
                            });
                            $('#itemsTable').show();
                        }
                        if (xlsxflag) {/*If excel file is .xlsx extension than creates a Array Buffer from excel*/
                            reader.readAsArrayBuffer($("#excelfile")[0].files[0]);
                        } else {
                            reader.readAsBinaryString($("#excelfile")[0].files[0]);
                        }
                    } else {
                        alert("Sorry! Your browser does not support HTML5!");
                    }
                } else {
                    alert("Please upload a valid Excel file!");
                }
            }
            function BindTable(jsondata, tableid) {/*Function used to convert the JSON array to Html Table*/
                var columns = BindTableHeader(jsondata, tableid); /*Gets all the column headings of Excel*/
                var counter = 0;
                for (var i = 0; i < jsondata.length; i++) {
                    counter++;
                    var cols = "";
                    var newRow = $("<tr>");
                    for (var colIndex = 0; colIndex < columns.length; colIndex++) {
                        var cellValue = jsondata[i][columns[colIndex]];
                        if (cellValue == null) {
                            cellValue = "";
                        }
                        if (colIndex == "5") {
                            cols += '<td><a class="ibtnDel" href="#"><img height="18" src="<?php echo base_url('assets/halaxa_buyer/images/delete-item-icon.png'); ?>" /></a></td>';
                        } else {
                            cols += '<td><input hidden="" value="' + cellValue + '" type="text" name="iteminfo[' + counter + '][]"/><p class="jobs-li-place text-justify p-info">' + cellValue + '</p></td>'
                        }
                        var source = document.getElementById('itemsTable');
                        var destination = document.getElementById('itemsTableView');
                        var copy = source.cloneNode(true);
                        copy.setAttribute('id', 'itemsTableView');
                        destination.parentNode.replaceChild(copy, destination);

                    }
                    newRow.append(cols);
                    $("table.order-list").append(newRow);
                }
            }
            function BindTableHeader(jsondata, tableid) {/*Function used to get all column names from JSON and bind the html table header*/
                var columnSet = [];
                var headerTr$ = $('<tr/>');
                for (var i = 0; i < jsondata.length; i++) {
                    var rowHash = jsondata[i];
                    for (var key in rowHash) {
                        if (rowHash.hasOwnProperty(key)) {
                            if ($.inArray(key, columnSet) == -1) {/*Adding each unique column names to a variable array*/
                                columnSet.push(key);
                                headerTr$.append($('<th/>').html(key));
                            }
                        }
                    }
                }
                //$(tableid).append(headerTr$);
                return columnSet;
            }
        </script>
        <script>
            $(document).ready(function () {

                handleStatusChanged();

            });

            function handleStatusChanged() {
                $('#toggleElement').on('change', function () {
                    toggleStatus();
                });
            }

            function toggleStatus() {
                if ($('#toggleElement').is(':checked')) {
                    $('#elementsToOperateOn :input').attr('disabled', true);
                } else {
                    $('#elementsToOperateOn :input').removeAttr('disabled');
                }
            }

            function myFunction() {
                document.getElementById("vendor_id[]").disabled = true;
            }
        </script>

    </body>

</html>