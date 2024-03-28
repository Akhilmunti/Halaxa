<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('vendor/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" type="text/css"/>
    </head>
    <body class="nav-md">
        <style type="text/css">
            .multiselect-container {
                width: 100% !important;
            }
        </style>
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('vendor/partials/left-nav'); ?>    
                <?php $this->load->view('vendor/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>Vendor Profile</h3>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Edit Vendor profile</h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <form id="cProfileForm" method="POST" action="<?php echo base_url() . "vendor/profile/updateSellerDetails"; ?>" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4 class="text-center">Mandatory Fields</h4>
                                                        <hr>
                                                        <div class="col-md-12">
                                                            <label class="control-label">Company Name*</label>
                                                            <input value="<?php echo $vendor_details->comapany_name; ?>" required="" name="companyname" type="text" class="form-control" placeholder="Enter Company Name">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="control-label">Preferred Language*</label>
                                                            <select name="prelanguage" class="form-control" required="">
                                                                <option disabled="" value="">Choose Language</option>
                                                                <option value="Chinese">Chinese</option>
                                                                <option value="Spanish">Spanish</option>
                                                                <option value="English">English</option>
                                                                <option value="Arabic">Arabic</option>
                                                                <option value="Hindi">Hindi</option>
                                                                <option value="Bengali">Bengali</option>
                                                                <option value="Portuguese">Portuguese</option>
                                                                <option value="Russian">Russian</option>
                                                                <option value="Japanese">Japanese</option>
                                                                <option value="Lahnda">Lahnda</option>
                                                                <option value="Javanese">Javanese</option>
                                                                <option value="Turkish">Turkish</option>
                                                                <option value="Korean">Korean</option>
                                                                <option value="French">French</option>
                                                                <option value="German">German</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="control-label"> Office Address*</label>
                                                            <textarea required="" name="deliveryaddress" class="form-control" rows="4" id="comment"><?php echo $vendor_details->delivery_address; ?></textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="control-label">Category*</label>
<!--                                                                            <select id="categories" name="categories" class="form-control" multiple="multiple">
                                                            <?php
                                                            foreach ($categories as $category) {
                                                                echo "<option value='" . $category['CT_Id'] . "'>" . $category['Category'] . "</option>";
                                                            }
                                                            ?>
                                                            </select>-->
                                                            <select id="categories" name="categories[]" class="form-control" multiple="">
                                                                <?php
                                                                $selected = json_decode($vendor_details->categories);
                                                                $found = false;
                                                                foreach ($categories as $key_a => $val_a) {
                                                                    $found = false;
                                                                    foreach ($selected as $key_b => $val_b) {
                                                                        if ($val_a['CT_Id'] == $val_b) {
                                                                            echo "<option value='" . $val_a['CT_Id'] . "' selected>" . $val_a['Category'] . "</option>";
                                                                            $found = true;
                                                                        }
                                                                    }
                                                                    if (!$found)
                                                                        echo "<option value='" . $val_a['CT_Id'] . "'>" . $val_a['Category'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="control-label">Sub Category</label>
                                                            <select name="subcategories[]" id="subcategories" class="form-control" multiple="">
                                                                <?php
                                                                $selected = json_decode($vendor_details->scategories);
                                                                $found = false;
                                                                foreach ($scategories as $key_a => $val_a) {
                                                                    $found = false;
                                                                    foreach ($selected as $key_b => $val_b) {
                                                                        if ($val_a['SCT_Id'] == $val_b) {
                                                                            echo "<option value='" . $val_a['SCT_Id'] . "' selected>" . $val_a['Sub_Category'] . "</option>";
                                                                            $found = true;
                                                                        }
                                                                    }
                                                                    if (!$found)
                                                                        echo "<option value='" . $val_a['SCT_Id'] . "'>" . $val_a['Sub_Category'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h4 class="text-center">Non-Mandatory Fields</h4>
                                                        <hr>
                                                        <div class="col-md-12">
                                                            <label class="control-label">Company Brief</label>
                                                            <textarea maxlength="350" name="companybrief" class="form-control" rows="7" id="companybrief"><?php echo $vendor_details->company_brief; ?></textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="control-label">Attach legal documents</label>
                                                            <input name="documents" type="file" class="form-control">
                                                        </div>
                                                        <a href="#"><?php echo $vendor_details->documents; ?></a>
                                                        <div class="col-md-12">
                                                            <label class="control-label">Country</label>
                                                            <input value="<?php echo $vendor_details->country; ?>" class="form-control" name="location" id="loc-automplete" list="country">
                                                            <datalist id="country">
                                                                <option disabled="" selected="" value="">Choose option</option>
                                                                <?php
                                                                foreach ($countries as $loc) {
                                                                    echo "<option data-value='" . $loc['id'] . "' value='" . $loc['name'] . "'>" . $loc['name'] . "</option>";
                                                                }
                                                                ?>
                                                            </datalist>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="control-label">Areas of Supply</label>
                                                            <select id="state-automplete" name="deliveryAreas[]" class="form-control" multiple="">
                                                                <?php
                                                                $countryId = $this->rfq_model->getCountryByName($vendor_details->country);
                                                                $citiesSelected = $this->rfq_model->getCityByLocation($countryId[0]['id']);
                                                                $selected = json_decode($vendor_details->delivery_areas);
                                                                $found = false;
                                                                foreach ($citiesSelected as $key_a => $val_a) {
                                                                    $found = false;
                                                                    foreach ($selected as $key_b => $val_b) {
                                                                        if ($val_a['name'] == $val_b) {
                                                                            echo "<option value='" . $val_a['name'] . "' selected>" . $val_a['name'] . "</option>";
                                                                            $found = true;
                                                                        }
                                                                    }
                                                                    if (!$found)
                                                                        echo "<option value='" . $val_a['name'] . "'>" . $val_a['name'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="control-label">Payment Mode</label>
                                                            <select id="card" name="card[]" class="form-control" multiple="">
                                                                <?php
                                                                $selected = json_decode($vendor_details->payment_mode);

                                                                if (!empty($selected)) {
                                                                    $found = false;
                                                                    foreach ($selected as $key_a => $val_a) {
                                                                        $found = false;
                                                                        if ($val_a == "Credit Card") {
                                                                            echo "<option value='" . $val_a . "' selected>" . $val_a . "</option>";
                                                                            $found = true;
                                                                        }
                                                                        if ($val_a == "Debit Card") {
                                                                            echo "<option value='" . $val_a . "' selected>" . $val_a . "</option>";
                                                                            $found = true;
                                                                        }
                                                                        if ($val_a == "COD") {
                                                                            echo "<option value='" . $val_a . "' selected>" . $val_a . "</option>";
                                                                            $found = true;
                                                                        }
                                                                        if ($val_a == "Bank Transfer") {
                                                                            echo "<option value='" . $val_a . "' selected>" . $val_a . "</option>";
                                                                            $found = true;
                                                                        }
                                                                        if (!$found)
                                                                            echo "<option value='" . $val_a . "'>" . $val_a . "</option>";
                                                                    }
                                                                } else {
                                                                    echo "<option value='Bank Transfer'>Bank Transfer</option>";
                                                                    echo "<option value='Credit Card'>Credit Card</option>";
                                                                    echo "<option value='COD'>COD</option>";
                                                                    echo "<option value='Bank Transfer'>Bank Transfer</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <button type="submit" class="btn btn-success right-float">Submit</button>
                                            </form>
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
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
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
        </script>
        <script>
            $(function () {
                $('#state-automplete').multiselect({
                    includeSelectAllOption: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '100%'
                });
            });

            $(function () {
                $('#subcategories').multiselect({
                    includeSelectAllOption: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '100%'
                });
            });

            $(function () {
                $('#card').multiselect({
                    includeSelectAllOption: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '100%'
                });
            });

            $(function () {
                $('#categories').multiselect({
                    includeSelectAllOption: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '100%'
                });
            });

            $('#categories').change(function () {
                var selectedValues = [];
                $("#categories :selected").each(function () {
                    selectedValues.push($(this).val());
                });
                $("#subcategories").multiselect('destroy');
                $.post("<?php echo base_url('vendor/home/getSubCatByMulCat/'); ?>",
                        {
                            category: JSON.stringify(selectedValues),
                        },
                        function (data, status) {
                            $('#subcategories').html(data);
                            $("#subcategories").multiselect({
                                includeSelectAllOption: true,
                                enableCaseInsensitiveFiltering: true,
                                buttonWidth: '100%'
                            });
                        });
            });

            $('#loc-automplete').change(function () {
                $("#state-automplete").multiselect('destroy');
                $.post("<?php echo base_url('buyer/rfq/getStateByCountrySign/'); ?>",
                        {
                            location: this.value,
                        },
                        function (data, status) {
                            $('#state-automplete').html(data);
                            $("#state-automplete").multiselect({
                                includeSelectAllOption: true,
                                enableCaseInsensitiveFiltering: true,
                                buttonWidth: '100%'
                            });
                        });
            });
        </script>
    </body>

</html>