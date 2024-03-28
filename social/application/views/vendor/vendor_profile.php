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
                                            <h4 class="theme-header-text">Seller Profile</h4>
                                            <?php //print_r($vendor_details); ?>
                                        </div>
                                    </div>
                                    <form id="cProfileForm" method="POST" action="<?php echo base_url() . "vendor/profile/updateSellerDetails"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">

                                        <div class="col-md-10 mt-3">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                    Company Name
                                                    <span class="form-required-icon">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input value="<?php echo $vendor_details->comapany_name; ?>" required="" name="companyname" type="text" class="form-control form-rounded" placeholder="Enter Company Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                    Company Brief
                                                    <span class="form-required-icon">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <textarea maxlength="350" name="companybrief" class="form-control form-rounded" rows="4" id="companybrief"><?php echo $vendor_details->company_brief; ?></textarea>
                                                </div>
                                            </div>
                                            <hr class="hr-theme">
                                            <p class="text-dark-theme-bold font-bold">Location</p>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                    Country
                                                    <span class="form-required-icon">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input value="<?php echo $vendor_details->country; ?>" class="form-control form-rounded" name="location" id="loc-automplete" list="country">
                                                    <datalist id="country">
                                                        <option disabled="" selected="" value="">Choose option</option>
                                                        <?php
                                                        foreach ($countries as $loc) {
                                                            echo "<option data-value='" . $loc['id'] . "' value='" . $loc['name'] . "'>" . $loc['name'] . "</option>";
                                                        }
                                                        ?>
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                    Company Address
                                                    <span class="form-required-icon">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <textarea required="" name="deliveryaddress" class="form-control form-rounded" rows="4" id="comment"><?php echo $vendor_details->delivery_address; ?></textarea>
                                                </div>
                                            </div>
                                            <hr class="hr-theme">
                                            <p class="text-dark-theme-bold font-bold">Preferences</p>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                    Preferred Language
                                                    <span class="form-required-icon">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <select name="prelanguage" class="form-control form-rounded" required="">
                                                        <option disabled="" value="">Choose Language</option>
                                                        <option <?php
                                                        if ($vendor_details->language == "Chinese") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Chinese">Chinese</option>
                                                        <option <?php
                                                        if ($vendor_details->language == "Spanish") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Spanish">Spanish</option>
                                                        <option <?php
                                                        if ($vendor_details->language == "English") {
                                                            echo "selected";
                                                        }
                                                        ?> value="English">English</option>
                                                        <option <?php
                                                        if ($vendor_details->language == "Arabic") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Arabic">Arabic</option>
                                                        <option <?php
                                                        if ($vendor_details->language == "Hindi") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Hindi">Hindi</option>
                                                        <option <?php
                                                        if ($vendor_details->language == "Bengali") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Bengali">Bengali</option>
                                                        <option <?php
                                                        if ($vendor_details->language == "Portuguese") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Portuguese">Portuguese</option>
                                                        <option <?php
                                                        if ($vendor_details->language == "Russian") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Russian">Russian</option>
                                                        <option <?php
                                                        if ($vendor_details->language == "Japanese") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Japanese">Japanese</option>
                                                        <option <?php
                                                        if ($vendor_details->language == "Lahnda") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Lahnda">Lahnda</option>
                                                        <option <?php
                                                        if ($vendor_details->language == "Javanese") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Javanese">Javanese</option>
                                                        <option <?php
                                                        if ($vendor_details->language == "Turkish") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Turkish">Turkish</option>
                                                        <option <?php
                                                        if ($vendor_details->language == "Korean") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Korean">Korean</option>
                                                        <option <?php
                                                        if ($vendor_details->language == "French") {
                                                            echo "selected";
                                                        }
                                                        ?> value="French">French</option>
                                                        <option <?php
                                                        if ($vendor_details->language == "German") {
                                                            echo "selected";
                                                        }
                                                        ?> value="German">German</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                    Payment Terms
                                                </label>
                                                <?php
                                                $selectedPay = json_decode($vendor_details->payment_mode);
                                                ?>
                                                <div class="col-md-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input <?php
                                                        if (in_array("Credit Card", $selectedPay)) {
                                                            echo "checked";
                                                        }
                                                        ?> name="card[]" value="Credit Card" type="checkbox" class="custom-control-input" id="customCheck1" name="example1">
                                                        <label class="custom-control-label" for="customCheck1">Credit Card</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input <?php
                                                        if (in_array("Debit Card", $selectedPay)) {
                                                            echo "checked";
                                                        }
                                                        ?> name="card[]" value="Debit Card" type="checkbox" class="custom-control-input" id="customCheck2" name="example1">
                                                        <label class="custom-control-label" for="customCheck2">Debit Card</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input <?php
                                                        if (in_array("COD", $selectedPay)) {
                                                            echo "checked";
                                                        }
                                                        ?> name="card[]" value="COD" type="checkbox" class="custom-control-input" id="customCheck3" name="example1">
                                                        <label class="custom-control-label" for="customCheck3">COD</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input <?php
                                                        if (in_array("Bank Transfer", $selectedPay)) {
                                                            echo "checked";
                                                        }
                                                        ?> name="card[]" value="Bank Transfer" type="checkbox" class="custom-control-input" id="customCheck4" name="example1">
                                                        <label class="custom-control-label" for="customCheck4">Bank Transfer</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="hr-theme">
                                            <p class="text-dark-theme-bold font-bold">Categorization</p>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                    Catagories
                                                    <span class="form-required-icon">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <select id="categories" name="categories[]" class="multiselect-ui form-control form-rounded" multiple="">
                                                        <?php
                                                        $selected = json_decode($vendor_details->categories);
                                                        $found = false;
                                                        foreach ($categories as $key_a => $val_a) {
                                                            $found = false;
                                                            foreach ($selected as $key_b => $val_b) {
                                                                if ($val_a['CT_Id'] == $val_b) {
                                                                    echo "<option selected value='" . $val_a['CT_Id'] . "' selected>" . $val_a['Category'] . "</option>";
                                                                    $found = true;
                                                                }
                                                            }
                                                            if (!$found)
                                                                echo "<option value='" . $val_a['CT_Id'] . "'>" . $val_a['Category'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                    Sub Catagories
                                                    <span class="form-required-icon">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <select name="subcategories[]" id="subcategories" class="form-control form-rounded" multiple="">
                                                        <?php
                                                        $selected = json_decode($vendor_details->scategories);
                                                        $found = false;
                                                        foreach ($scategories as $key_a => $val_a) {
                                                            $found = false;
                                                            foreach ($selected as $key_b => $val_b) {
                                                                if ($val_a['SCT_Id'] == $val_b) {
                                                                    echo "<option selected value='" . $val_a['SCT_Id'] . "' selected>" . $val_a['Sub_Category'] . "</option>";
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
                                            <hr class="hr-theme">
                                            <p class="text-dark-theme-bold font-bold">Legal Documents</p>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                    Upload Legal Document
                                                    <span class="form-required-icon">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input name="documents" type="file" class="form-control form-rounded">
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="hr-theme">
                                        <div class="text-right">
                                            <button class="btn btn-danger" type="submit">Update Profile</button>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery  -->
        <?php $this->load->view('vendor/halaxa_partials/scripts'); ?>

        <script>
            $('#categories').change(function () {
                var selectedValues = [];
                $("#categories :selected").each(function () {
                    selectedValues.push($(this).val());
                });
                $("#subcategories").select2('destroy');
                $.post("<?php echo base_url('vendor/home/getSubCatByMulCat/'); ?>",
                        {
                            category: JSON.stringify(selectedValues),
                        },
                        function (data, status) {
                            $('#subcategories').html(data);
                            $('#subcategories').select2();
                        });
            });

            $('#categories').select2();
            $('#subcategories').select2();
        </script>

    </body>

</html>