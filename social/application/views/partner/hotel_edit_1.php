<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('partner/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    </head>
    <?php
    if ($hotel_info) {
        $mPropertyName = $hotel_info['property_name'];
        $mAddress = $hotel_info['Address'];
        $mLocation = $hotel_info['Location'];
        $mCity = $hotel_info['City'];
        $mState = $hotel_info['State'];
        $mZipCode = $hotel_info['Zip_Code'];
        $mCountry = $hotel_info['Country'];
        $mWebsite = $hotel_info['Website'];
        $mSource = $hotel_info['hotel_source'];
        $mRooms = $hotel_info['hotel_rooms'];
        $mRating = $hotel_info['hotel_rating'];
        $mType = $hotel_info['hotel_type'];
        $mContacttype = $hotel_info['hotel_contact'];
        $mFirstName = $hotel_info['First_Name'];
        $mLastName = $hotel_info['Last_Name'];
        $mRole = $hotel_info['Role'];
        $mEmail = $hotel_info['Email'];
        $mPhoneType = $hotel_info['Phone_Type'];
        $mPACode = $hotel_info['Phone_Area_Code'];
        $mPhoneNo = $hotel_info['Phone_No'];
        $mFaxType = $hotel_info['Fax_Type'];
        $mFACode = $hotel_info['Fax_Area_Code'];
        $mFaxNo = $hotel_info['Fax_No'];
        $mBestDay = $hotel_info['Best_Day'];
        $mBestTime = $hotel_info['Best_Time'];
        $mLogo = $hotel_info['logo'];
        $mGd = $hotel_info['group_description'];
    } else {
        $mPropertyName = set_value('property_name');
        $mAddress = set_value('hotel_address');
        $mLocation = set_value('hotel_location');
        $mCity = set_value('hotel_city');
        $mState = set_value('hotel_state');
        $mZipCode = set_value('hotel_postal');
        $mCountry = set_value('hotel_country');
        $mWebsite = set_value('hotel_website');
        $mSource = set_value('hotel_source');
        $mRooms = set_value('hotel_rooms');
        $mRating = set_value('hotel_rating');
        $mType = set_value('hotel_type');
        $mContacttype = set_value('hotel_contact');
        $mFirstName = set_value('hotel_firstname');
        $mLastName = set_value('hotel_lastname');
        $mRole = set_value('hotel_role');
        $mEmail = set_value('hotel_email');
        $mPhoneType = set_value('Phone_Type');
        $mPACode = set_value('Phone_Area_Code');
        $mPhoneNo = set_value('Phone_No');
        $mFaxType = set_value('Fax_Type');
        $mFACode = set_value('Fax_Area_Code');
        $mFaxNo = set_value('Fax_No');
        $mBestDay = set_value('Best_Day');
        $mBestTime = set_value('Best_Time');
        $mGd = set_value('group_description');
    }
    ?>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('partner/partials/left-nav'); ?>    
                <!-- top navigation -->
                <?php $this->load->view('partner/partials/top-nav'); ?>
                <!-- /top navigation --> 
            </div>


            <div class="right_col" role="main">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Hotel Partner Application</h3>
                    </div>
                    <!--                    <div class="right">
                                            <a href="<?php echo base_url() . "partner/hotel/getList"; ?>" class="btn btn-dark btn-small">View Applications</a>
                                        </div>-->
                </div>
                <div class="clearfix"></div>
                <?php
                //echo validation_errors();
                //print_r($clients);
                if ($notification) {
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">
                                <?php echo $notification;
                                ?>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <div class="row">
                                    <form id="Form" method="POST" action="<?php echo base_url() . "partner/hotel/edit/" . $mId; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                        <div class="col-md-4 partners-form">
                                            <label for="fullname">Property Name * :</label>
                                            <input type="text" id="property_name" class="form-control form-rounded-partner" name="property_name" required 
                                                   value="<?php echo $mPropertyName; ?>"/>
                                            <?php if (form_error('property_name')) { ?><span style="color: #E68F8F;"><?php echo form_error('property_name'); ?></span> <?php } ?>

                                            <label for="fullname">Street Address * :</label>
                                            <input type="text" id="hotel_address" class="form-control form-rounded-partner" name="hotel_address" required 
                                                   value="<?php echo $mAddress; ?>"/>
                                            <?php if (form_error('hotel_address')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_address'); ?></span> <?php } ?>
                                            <input type="text" id="hotel_location" class="form-control form-rounded-partner" name="hotel_location" required 
                                                   value="<?php echo $mLocation; ?>"/>
                                            <?php if (form_error('hotel_location')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_location'); ?></span> <?php } ?>

                                            <label for="fullname">Country *:</label>
                                            <input value="<?php echo $mCountry; ?>" class="form-control form-rounded-partner" name="hotel_country" id="loc-automplete" list="country">
                                            <datalist id="country">
                                                <option>Choose option</option>
                                                <?php
                                                foreach ($countries as $loc) {
                                                    if ($mCountry == $loc['name']) {
                                                        echo "<option selected data-value='" . $loc['id'] . "' value='" . $loc['name'] . "'>" . $loc['name'] . "</option>";
                                                    } else {
                                                        echo "<option data-value='" . $loc['id'] . "' value='" . $loc['name'] . "'>" . $loc['name'] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </datalist>
                                            <?php if (form_error('hotel_country')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_country'); ?></span> <?php } ?>

                                            <label for="fullname">Region/State *:</label>
                                            <select name="hotel_state" id="state-automplete" class="form-control form-rounded-partner" required>
                                                <?php
                                                foreach ($states as $state) {
                                                    if ($mState == $state['id']) {
                                                        echo "<option selected data-value='" . $state['id'] . "' value='" . $state['name'] . "'>" . $state['name'] . "</option>";
                                                    } else {
                                                        echo "<option data-value='" . $state['id'] . "' value='" . $state['name'] . "'>" . $state['name'] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <?php if (form_error('hotel_state')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_state'); ?></span> <?php } ?>

                                            <label for="fullname">City *:</label>
                                            <select name="hotel_city" id="city-automplete" class="form-control form-rounded-partner" required="">
                                                <?php
                                                foreach ($city as $ci) {
                                                    if ($mCity == $ci['name']) {
                                                        echo "<option selected data-value='" . $ci['id'] . "' value='" . $ci['name'] . "'>" . $ci['name'] . "</option>";
                                                    } else {
                                                        echo "<option data-value='" . $ci['id'] . "' value='" . $ci['name'] . "'>" . $ci['name'] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <?php if (form_error('hotel_city')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_city'); ?></span> <?php } ?>

                                            <label for="fullname">Postal code/Zip *:</label>
                                            <input type="number" id="hotel_postal" class="form-control form-rounded-partner" name="hotel_postal" required 
                                                   value="<?php echo $mZipCode ?>"/>
                                            <?php if (form_error('hotel_postal')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_postal'); ?></span> <?php } ?>



                                            <label for="fullname">Logo *:</label>
                                            <input type="file" id="logo" class="form-control form-rounded-partner" name="logo" 
                                                   value="<?php echo set_value('logo'); ?>"/>
                                            <a download="" class="btn btn-xs btn-primary" href="<?php echo base_url('uploads/') ?><?php echo $mLogo; ?>">Download Logo</a>
                                            <?php if (form_error('logo')) { ?><span style="color: #E68F8F;"><?php echo form_error('logo'); ?></span> <?php } ?>

                                        </div>
                                        <div class="col-md-4 partners-form">
                                            <label for="fullname">Site Rating * :</label>
                                            <select id="hotel_rating" class="form-control form-rounded-partner" name="hotel_rating" required>
                                                <option value="">Choose..</option>
                                                <option value="1" <?php
                                                if ($mRating == '1') {
                                                    echo 'selected';
                                                }
                                                ?>>1</option>
                                                <option value="2" <?php
                                                if ($mRating == '2') {
                                                    echo 'selected';
                                                }
                                                ?>>2</option>
                                                <option value="3" <?php
                                                if ($mRating == '3') {
                                                    echo 'selected';
                                                }
                                                ?>>3</option>
                                                <option value="4" <?php
                                                if ($mRating == '4') {
                                                    echo 'selected';
                                                }
                                                ?>>4</option>
                                                <option value="5" <?php
                                                if ($mRating == '5') {
                                                    echo 'selected';
                                                }
                                                ?>>5</option>
                                            </select>
                                            <?php if (form_error('hotel_rating')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_rating'); ?></span> <?php } ?>

                                            <!--                                            <label for="fullname">Rating Source * :</label>
                                                                                        <select id="hotel_source" class="form-control form-rounded-partner" name="hotel_source" required>
                                                                                            <option value="" disabled="">Choose..</option>
                                                                                            <option value="1" <?php
                                            if (set_value('hotel_source') == 'Source 1') {
                                                echo 'selected';
                                            }
                                            ?>>Source 1</option>
                                                                                            <option value="2" <?php
                                            if (set_value('hotel_source') == 'Source 2') {
                                                echo 'selected';
                                            }
                                            ?>>Source 2</option>
                                                                                        </select>-->

                                            <label for="fullname">Number of rooms *:</label>
                                            <input type="number" id="hotel_rooms" class="form-control form-rounded-partner" name="hotel_rooms" required 
                                                   value="<?php echo $mRooms; ?>"/>
                                            <?php if (form_error('hotel_rooms')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_rooms'); ?></span> <?php } ?>

                                            <label for="fullname">Property type *:</label>
                                            <select id="hotel_type" class="form-control form-rounded-partner" name="hotel_type" required>
                                                <option value="">Choose..</option>
                                                <option value="1" <?php
                                                if ($mType == '1') {
                                                    echo 'selected';
                                                }
                                                ?>>Type 1</option>
                                                <option value="2" <?php
                                                if ($mType == '2') {
                                                    echo 'selected';
                                                }
                                                ?>>Type 2</option>
                                            </select>
                                            <?php if (form_error('hotel_type')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_type'); ?></span> <?php } ?>

                                            <label for="fullname">Property website (Optional) :</label>
                                            <input type="text" id="hotel_website" class="form-control form-rounded-partner" name="hotel_website" 
                                                   value="<?php echo $mWebsite; ?>"/>
                                            <?php if (form_error('hotel_website')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_website'); ?></span> <?php } ?>

<!--                                            <label for="fullname">Contact Information *: <i>Use the person you want for sign-in and communication during onboarding, if you dont have a fax numbern just enter your phone number</i></label>
                                            <select id="hotel_contact" class="form-control form-rounded-partner" name="hotel_contact" required>
                                                <option value="">Choose..</option>
                                                <option value="1" <?php
                                            if (set_value('hotel_contact') == 'Contact 1') {
                                                echo 'selected';
                                            }
                                            ?>>Contact 1</option>
                                                <option value="2" <?php
                                            if (set_value('hotel_contact') == 'Contact 2') {
                                                echo 'selected';
                                            }
                                            ?>>Contact 2</option>
                                            </select>-->
                                            <label for="fullname">Group Description *:</label>
                                            <textarea class="form-control form-rounded-partner" id="group_description" name="group_description" rows="3" required><?php echo $mGd ?></textarea>
                                            <?php if (form_error('group_description')) { ?><span style="color: #E68F8F;"><?php echo form_error('group_description'); ?></span> <?php } ?>
                                        </div>
                                        <div class="col-md-4 partners-form">
                                            <label for="fullname">First Name * :</label>
                                            <input type="text" id="hotel_firstname" class="form-control form-rounded-partner" name="hotel_firstname" 
                                                   value="<?php echo $mFirstName; ?>"/>
                                            <?php if (form_error('hotel_firstname')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_firstname'); ?></span> <?php } ?>

                                            <label for="fullname">Last Name * :</label>
                                            <input type="text" id="hotel_lastname" class="form-control form-rounded-partner" name="hotel_lastname" 
                                                   value="<?php echo $mLastName; ?>"/>
                                            <?php if (form_error('hotel_lastname')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_lastname'); ?></span> <?php } ?>

                                            <label for="fullname">Role *:</label>
                                            <select id="hotel_role" class="form-control form-rounded-partner" name="hotel_role" required>
                                                <option value="">Choose..</option>
                                                <option value="1" <?php
                                                if ($mRole == '1') {
                                                    echo 'selected';
                                                }
                                                ?>>Role 1</option>
                                                <option value="2" <?php
                                                if ($mRole == '2') {
                                                    echo 'selected';
                                                }
                                                ?>>Role 2</option>
                                            </select>
                                            <?php if (form_error('hotel_role')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_role'); ?></span> <?php } ?>

                                            <label for="fullname">Email *:</label>
                                            <input readonly="" type="text" id="hotel_email" class="form-control form-rounded-partner" name="hotel_email" 
                                                   value="<?php echo $mEmail; ?>"/>
                                            <?php if (form_error('hotel_email')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_email'); ?></span> <?php } ?>


                                            <label for="fullname">Phone *:</label>
                                            <div class="clearfix"></div>
                                            <div class="col-md-4 no-padding">
                                                <select id="contact_type" name="contact_type" class="form-control form-rounded-partner" required>
                                                    <option value="">Choose..</option>
                                                    <option value="mobile"  <?php
                                                    if ($mPhoneType == 'mobile') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Mobile</option>
                                                    <option value="office"  <?php
                                                    if ($mPhoneType == 'office') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Office</option>
                                                    <option value="home"  <?php
                                                    if ($mPhoneType == 'home') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Home</option>
                                                </select>
                                            </div>
                                            <?php if (form_error('contact_type')) { ?><span style="color: #E68F8F;"><?php echo form_error('contact_type'); ?></span> <?php } ?>
                                            <div class="col-md-4">
                                                <input type="number" placeholder="Area code" id="area_code" class="form-control form-rounded-partner" name="area_code" required value="<?php echo $mPACode; ?>"/>
                                                <?php if (form_error('area_code')) { ?><span style="color: #E68F8F;"><?php echo form_error('area_code'); ?></span> <?php } ?>
                                            </div>
                                            <div class="col-md-4 no-padding">
                                                <input type="number" placeholder="Number" id="contact" class="form-control form-rounded-partner" name="contact" required value="<?php echo $mPhoneNo; ?>"/>
                                                <?php if (form_error('contact')) { ?><span style="color: #E68F8F;"><?php echo form_error('contact'); ?></span> <?php } ?>
                                            </div>
                                            <label for="fullname">Fax :</label>
                                            <div class="clearfix"></div>
                                            <div class="col-md-4 no-padding">
                                                <select id="fax_type" name="fax_type" class="form-control form-rounded-partner">
                                                    <option value="">Choose..</option>
                                                    <option value="fax1"  <?php
                                                    if ($mFaxType == 'fax1') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Fax-1</option>
                                                    <option value="fax2"  <?php
                                                    if ($mFaxType == 'fax2') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Fax-2</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="number" placeholder="Area code" id="fax_area_code" class="form-control form-rounded-partner" name="fax_area_code" value="<?php echo $mFACode; ?>"/>
                                                <?php if (form_error('fax_area_code')) { ?><span style="color: #E68F8F;"><?php echo form_error('fax_area_code'); ?></span> <?php } ?>
                                            </div>
                                            <div class="col-md-4 no-padding">
                                                <input type="number" placeholder="Number" id="fax_contact" class="form-control form-rounded-partner" name="fax_contact" value="<?php echo $mFaxNo; ?>"/>
                                                <?php if (form_error('fax_contact')) { ?><span style="color: #E68F8F;"><?php echo form_error('fax_contact'); ?></span> <?php } ?>
                                            </div>
                                            <label for="fullname">Best Day to contact you *:</label>
                                            <?php
                                            $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
                                            $selectedc = json_decode($mBestDay);
                                            $found = false;
                                            foreach ($days as $key_a => $val_a) {
                                                $found = false;
                                                foreach ($selectedc as $key_b => $val_b) {
                                                    if ($val_a == $val_b) {
                                                        echo "<input checked type='checkbox' class='flat' name='best_day[]' id='best_day' value='" . $val_a . "'/> $val_a";
                                                        $found = true;
                                                    }
                                                }
                                                if (!$found)
                                                    echo "<input type='checkbox' class='flat' name='best_day[]' id='best_day' value='" . $val_a . "'/> $val_a";
                                            }
                                            ?>
                                            <br>
                                            <?php if (form_error('best_day')) { ?><span style="color: #E68F8F;"><?php echo form_error('best_day'); ?></span> <?php } ?>
                                            <br>
                                            <label for="fullname">Best time to contact you *:</label>
                                            <?php
                                            $time = array("Morning", "Afternoon", "Evening");
                                            $selectedc = json_decode($mBestTime);
                                            $found = false;
                                            foreach ($time as $key_a => $val_a) {
                                                $found = false;
                                                foreach ($selectedc as $key_b => $val_b) {
                                                    if ($val_a == $val_b) {
                                                        echo "<input checked type='checkbox' class='flat' name='best_time[]' id='best_time' value='" . $val_a . "'/> $val_a";
                                                        $found = true;
                                                    }
                                                }
                                                if (!$found)
                                                    echo "<input type='checkbox' class='flat' name='best_time[]' id='best_time' value='" . $val_a . "'/> $val_a";
                                            }
                                            ?>
                                            <?php if (form_error('best_time')) { ?><span style="color: #E68F8F;"><?php echo form_error('best_time'); ?></span> <?php } ?>
                                        </div>
                                        <div class="text-right">
                                            <input type="submit" value="Submit" class="btn btn-sm btn-dark">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer content -->
            <?php $this->load->view('partner/partials/footer') ?>
            <!-- /footer content --> 
        </div>

        <?php $this->load->view('partner/partials/assets-footer'); ?>
        <!-- jQuery Smart Wizard --> 
        <script src="<?php echo base_url(); ?>assets/vendors/moment/min/moment.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>  
        <script src="<?php echo base_url(); ?>assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- iCheck --> 
        <script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script> 
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>

    </body>
</html>
