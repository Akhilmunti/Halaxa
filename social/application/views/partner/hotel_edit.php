<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('partner/halaxa/header'); ?>
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
        $mId = $hotel_info['H_Id'];
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
    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('partner/halaxa/navbar'); ?>

            <div class="wrapper">
                <!-- Sidebar -->
                <?php $this->load->view('partner/halaxa/sidebar'); ?>

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $this->load->view('partner/halaxa/alerts'); ?>
                                <?php
                                //echo validation_errors();
                                //print_r($clients);
                                if ($notification) {
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-success <?php echo $hidealert ?>">
                                                <?php echo $showalert ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                            </div>
                            <div class="col-md-12">
                                <div class="theme-card mb-3">
                                    <div class="row">
                                        <div class="col-md-12 pl-5 pr-5">
                                            <div class="post-card pl-5 pr-5 pt-3 pb-3">
                                                <span class="text-dark-theme-bold"><?php echo $this->session->userdata('login_name') . " Profile"; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="theme-card mb-3">

                                    <form id="Form" method="POST" action="<?php echo base_url() . "partner/hotel/edit/" . $mId; ?>" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-md-12 p-5">
                                                <div class="post-card pl-5 pr-5 pt-3 pb-3">
                                                    <p class="text-dark-theme-bold">Address</p>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Partner Name: <span class="form-required-icon">*</span> </label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="property_name" class="form-control form-rounded-partner" name="property_name" required 
                                                                   value="<?php echo $mPropertyName; ?>"/>
                                                            <?php if (form_error('property_name')) { ?><span style="color: #E68F8F;"><?php echo form_error('property_name'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Street Address: <span class="form-required-icon">*</span> </label>
                                                        <div class="col-md-5">
                                                            <input type="text" id="hotel_address" class="form-control form-rounded-partner" name="hotel_address" required 
                                                                   value="<?php echo $mAddress; ?>"/>
                                                            <?php if (form_error('hotel_address')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_address'); ?></span> <?php } ?>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <input type="text" id="hotel_location" class="form-control form-rounded-partner" name="hotel_location" required 
                                                                   value="<?php echo $mLocation; ?>"/>
                                                            <?php if (form_error('hotel_location')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_location'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Country: <span class="form-required-icon">*</span> </label>
                                                        <div class="col-md-10">
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
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Region/State: <span class="form-required-icon">*</span> </label>
                                                        <div class="col-md-10">
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
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">City: <span class="form-required-icon">*</span> </label>
                                                        <div class="col-md-10">
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
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Postal code/Zip: <span class="form-required-icon">*</span> </label>
                                                        <div class="col-md-10">
                                                            <input type="number" id="hotel_postal" class="form-control form-rounded-partner" name="hotel_postal" required 
                                                                   value="<?php echo $mZipCode ?>"/>
                                                            <?php if (form_error('hotel_postal')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_postal'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <p class="text-dark-theme-bold">Partner Information</p>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Website (Optional)</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="hotel_website" class="form-control form-rounded-partner" name="hotel_website" 
                                                                   value="<?php echo $mWebsite; ?>"/>
                                                            <?php if (form_error('hotel_website')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_website'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Video (Hyperlink)</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="hyperlink" class="form-control form-rounded-partner" name="hyperlink" value="<?php echo $mVideoUrl; ?>"/>
                                                            <?php if (form_error('hyperlink')) { ?><span style="color: #E68F8F;"><?php echo form_error('hyperlink'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Overview (Optional)</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="overview" class="form-control form-rounded-partner" name="overview" value="<?php echo $mOverview; ?>"/>
                                                            <?php if (form_error('overview')) { ?><span style="color: #E68F8F;"><?php echo form_error('overview'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Number of members (More than) : <span class="form-required-icon">*</span></label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="no_of_students" class="form-control form-rounded-partner" name="no_of_students" required value="<?php echo $mNoOfStudents; ?>"/>
                                                            <?php if (form_error('no_of_students')) { ?><span style="color: #E68F8F;"><?php echo form_error('no_of_students'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Logo : <span class="form-required-icon">*</span></label>
                                                        <div class="col-md-1">
                                                            <img class="img-fluid rounded-circle" src="<?php echo base_url('uploads/') ?><?php echo $mLogo; ?>" />
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="file"  class="form-control form-rounded-partner" accept=".png, .jpg, .jpeg" id="school_logo" name="school_logo" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Group Description : <span class="form-required-icon">*</span></label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control form-rounded-partner" id="group_description" name="group_description" rows="4" required><?php echo $mGd; ?></textarea>
                                                            <?php if (form_error('group_description')) { ?><span style="color: #E68F8F;"><?php echo form_error('group_description'); ?></span> <?php } ?>

                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <p class="text-dark-theme-bold">Contact person</p>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Salutation : <span class="form-required-icon">*</span></label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="salutation" class="form-control form-rounded-partner" name="salutation" required value="<?php echo $mSalutation; ?>"/>
                                                            <?php if (form_error('salutation')) { ?><span style="color: #E68F8F;"><?php echo form_error('salutation'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">First Name : <span class="form-required-icon">*</span></label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="hotel_firstname" class="form-control form-rounded-partner" name="hotel_firstname" 
                                                                   value="<?php echo $mFirstName; ?>"/>
                                                            <?php if (form_error('hotel_firstname')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_firstname'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Last Name : <span class="form-required-icon">*</span></label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="hotel_lastname" class="form-control form-rounded-partner" name="hotel_lastname" 
                                                                   value="<?php echo $mLastName; ?>"/>
                                                            <?php if (form_error('hotel_lastname')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_lastname'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Role : <span class="form-required-icon">*</span></label>
                                                        <div class="col-md-10">
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
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Email : <span class="form-required-icon">*</span></label>
                                                        <div class="col-md-10">
                                                            <input readonly="" type="text" id="hotel_email" class="form-control form-rounded-partner" name="hotel_email" 
                                                                   value="<?php echo $mEmail; ?>"/>
                                                            <?php if (form_error('hotel_email')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_email'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Phone : <span class="form-required-icon">*</span></label>
                                                        <div class="col-md-2">
                                                            <input type="number" placeholder="Area code" id="area_code" class="form-control form-rounded-partner" name="area_code" required value="<?php echo $mPACode; ?>"/>
                                                            <?php if (form_error('area_code')) { ?><span style="color: #E68F8F;"><?php echo form_error('area_code'); ?></span> <?php } ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="number" placeholder="Area code" id="area_code" class="form-control form-rounded-partner" name="area_code" required value="<?php echo $mPACode; ?>"/>
                                                            <?php if (form_error('area_code')) { ?><span style="color: #E68F8F;"><?php echo form_error('area_code'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Fax : <span class="form-required-icon">*</span></label>
                                                        <div class="col-md-2">
                                                            <input type="number" placeholder="Area code" id="fax_area_code" class="form-control form-rounded-partner" name="fax_area_code" required value="<?php echo $mFACode; ?>"/>
                                                            <?php if (form_error('fax_area_code')) { ?><span style="color: #E68F8F;"><?php echo form_error('fax_area_code'); ?></span> <?php } ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="number" placeholder="Number" id="fax_contact" class="form-control form-rounded-partner" name="fax_contact" required value="<?php echo $mFaxNo; ?>"/>
                                                            <?php if (form_error('fax_contact')) { ?><span style="color: #E68F8F;"><?php echo form_error('fax_contact'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Best time to contact you : <span class="form-required-icon">*</span></label>
                                                        <div class="col-md-10">
                                                            <?php
                                                            $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
                                                            $selectedc = json_decode($mBestDay);
                                                            $found = false;
                                                            foreach ($days as $key_a => $val_a) {
                                                                $found = false;
                                                                foreach ($selectedc as $key_b => $val_b) {
                                                                    if ($val_a == $val_b) {
                                                                        echo "<span class='mr-5'><input checked type='checkbox' class='flat' name='best_day[]' id='best_day' value='" . $val_a . "'/> $val_a <span>";
                                                                        $found = true;
                                                                    }
                                                                }
                                                                if (!$found)
                                                                    echo "<span class='mr-5'><input type='checkbox' class='flat' name='best_day[]' id='best_day' value='" . $val_a . "'/> $val_a <span>";
                                                            }
                                                            ?>
                                                            <?php if (form_error('best_day')) { ?><span style="color: #E68F8F;"><?php echo form_error('best_day'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Best time to contact you : <span class="form-required-icon">*</span></label>
                                                        <div class="col-md-10">
                                                            <?php
                                                            $time = array("Morning", "Afternoon", "Evening");
                                                            $selectedc = json_decode($mBestTime);
                                                            $found = false;
                                                            foreach ($time as $key_a => $val_a) {
                                                                $found = false;
                                                                foreach ($selectedc as $key_b => $val_b) {
                                                                    if ($val_a == $val_b) {
                                                                        echo "<span class='mr-5'><input checked type='checkbox' class='flat' name='best_time[]' id='best_time' value='" . $val_a . "'/> $val_a <span>";
                                                                        $found = true;
                                                                    }
                                                                }
                                                                if (!$found)
                                                                    echo "<span class='mr-5'><input type='checkbox' class='flat' name='best_time[]' id='best_time' value='" . $val_a . "'/> $val_a <span>";
                                                            }
                                                            ?>
                                                            <?php if (form_error('best_time')) { ?><span style="color: #E68F8F;"><?php echo form_error('best_time'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="inner-footer">
                                                        <input hidden="" value="Update" class="btn btn-sm btn-dark" id="property_name" name="property_name">
                                                        <button type="submit" class="btn btn-theme-submit"><i class="fa fa-check mr-2"></i>Update Profile</button>   
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
        </div>

        <!-- End Main -->

        <!-- jQuery  -->
        <?php $this->load->view('partner/halaxa/scripts'); ?>

    </body>

</html>