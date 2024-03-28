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
                                            <h4 class="theme-header-text">Company Profile</h4>
                                            <?php //print_r($user); ?>
                                        </div>
                                    </div>
                                    <form id="cProfileForm" method="POST" action="<?php echo base_url() . "buyer/profile/updateCorporateDetails"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">

                                        <div class="col-md-10 mt-3">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                    Company Name
                                                    <span class="form-required-icon">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input value="<?php echo $user->Company_name; ?>" required="" name="companyname" type="text" class="form-control form-rounded" placeholder="Enter Company Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                    Designation
                                                    <span class="form-required-icon">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input value="<?php echo $user->Designation; ?>" name="designation" type="text" class="form-control form-rounded" placeholder="Enter Desgination">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                    Company Brief
                                                    <span class="form-required-icon">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <textarea maxlength="350" name="companybrief" class="form-control form-rounded" rows="4" id="companybrief"><?php echo $user->Company_brief; ?></textarea>
                                                </div>
                                            </div>
                                            <hr class="hr-theme">
                                            <p class="text-dark-theme-bold font-bold">Location</p>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                    Country, state / province
                                                    <span class="form-required-icon">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <select id="locations" name="locations" class="form-control form-rounded">
                                                        <?php
                                                        foreach ($countries as $loc) {
                                                            if ($user->Locations == $loc['name']) {
                                                                echo "<option selected value='" . $loc['name'] . "'>" . $loc['name'] . "</option>";
                                                            } else {
                                                                echo "<option value='" . $loc['name'] . "'>" . $loc['name'] . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                    Delivery Address
                                                </label>
                                                <div class="col-md-8">
                                                    <textarea value="" required="" name="deliveryaddress" class="form-control form-rounded" rows="3" id="comment"><?php echo $user->delivery_address; ?></textarea>
                                                </div>
                                            </div>
                                            <hr class="hr-theme">
                                            <p class="text-dark-theme-bold font-bold">Preferences</p>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                    Preferred Language
                                                </label>
                                                <div class="col-md-8">
                                                    <select name="prelanguage" class="form-control form-rounded" required="">
                                                        <option disabled="" value="">Choose Language</option>
                                                        <option <?php
                                                        if ($user->language == "Chinese") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Chinese">Chinese</option>
                                                        <option <?php
                                                        if ($user->language == "Spanish") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Spanish">Spanish</option>
                                                        <option <?php
                                                        if ($user->language == "English") {
                                                            echo "selected";
                                                        }
                                                        ?> value="English">English</option>
                                                        <option <?php
                                                        if ($user->language == "Arabic") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Arabic">Arabic</option>
                                                        <option <?php
                                                        if ($user->language == "Hindi") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Hindi">Hindi</option>
                                                        <option <?php
                                                        if ($user->language == "Bengali") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Bengali">Bengali</option>
                                                        <option <?php
                                                        if ($user->language == "Portuguese") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Portuguese">Portuguese</option>
                                                        <option <?php
                                                        if ($user->language == "Russian") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Russian">Russian</option>
                                                        <option <?php
                                                        if ($user->language == "Japanese") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Japanese">Japanese</option>
                                                        <option <?php
                                                        if ($user->language == "Lahnda") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Lahnda">Lahnda</option>
                                                        <option <?php
                                                        if ($user->language == "Javanese") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Javanese">Javanese</option>
                                                        <option <?php
                                                        if ($user->language == "Turkish") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Turkish">Turkish</option>
                                                        <option <?php
                                                        if ($user->language == "Korean") {
                                                            echo "selected";
                                                        }
                                                        ?> value="Korean">Korean</option>
                                                        <option <?php
                                                        if ($user->language == "French") {
                                                            echo "selected";
                                                        }
                                                        ?> value="French">French</option>
                                                        <option <?php
                                                        if ($user->language == "German") {
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
                                                $selectedPay = json_decode($user->payment_mode);
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
        <?php $this->load->view('buyer/halaxa_partials/scripts'); ?>

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