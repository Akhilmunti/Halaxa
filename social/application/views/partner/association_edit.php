<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('partner/halaxa/header'); ?>
    <?php
    if ($school_info) {
        $mSchoolName = $school_info['Association_Name'];
        $mAddress = $school_info['Address'];
        $mLocation = $school_info['Location'];
        $mCity = $school_info['City'];
        $mState = $school_info['State'];
        $mZipCode = $school_info['Zip_Code'];
        $mCountry = $school_info['Country'];
        $mWebsite = $school_info['Website'];
        $mVideoUrl = $school_info['Video_Url'];
        $mOverview = $school_info['Overview'];
        $mNoOfStudents = $school_info['No_Of_Students'];
        $mSalutation = $school_info['Salutation'];
        $mFirstName = $school_info['First_Name'];
        $mLastName = $school_info['Last_Name'];
        $mRole = $school_info['Role'];
        $mEmail = $school_info['Email'];
        $mPhoneType = $school_info['Phone_Type'];
        $mPACode = $school_info['Phone_Area_Code'];
        $mPhoneNo = $school_info['Phone_No'];
        $mFaxType = $school_info['Fax_Type'];
        $mFACode = $school_info['Fax_Area_Code'];
        $mFaxNo = $school_info['Fax_No'];
        $mBestDay = $school_info['Best_Day'];
        $mBestTime = $school_info['Best_Time'];
        $mGd = $school_info['group_description'];
        $mLogo = $school_info['Logo'];
        $mProfile = $school_info['Profile'];
        $mId = $school_info['A_Id'];
    } else {
        $mSchoolName = set_value('association_name');
        $mAddress = set_value('school_address');
        $mLocation = set_value('school_location');
        $mCity = set_value('city');
        $mState = set_value('state');
        $mZipCode = set_value('pincode');
        $mCountry = set_value('country');
        $mWebsite = set_value('website');
        $mSource = set_value('hyperlink');
        $mOverview = set_value('overview');
        $mNoOfStudents = set_value('no_of_students');
        $mSalutation = set_value('salutation');
        $mFirstName = set_value('first_name');
        $mLastName = set_value('last_name');
        $mRole = set_value('role');
        $mEmail = set_value('email_id');
        $mPhoneType = set_value('contact_type');
        $mPACode = set_value('area_code');
        $mPhoneNo = set_value('contact');
        $mFaxType = set_value('fax_type');
        $mFACode = set_value('fax_area_code');
        $mFaxNo = set_value('fax_contact');
        $mBestDay = set_value('best_day');
        $mBestTime = set_value('best_time');
        $mGd = set_value('group_description');
        $mLogo = $school_info['Logo'];
        $mProfile = $school_info['Profile'];
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

                                    <form id="Form" method="POST" action="<?php echo base_url() . "partner/association/actionEdit/" . $mId; ?>" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-md-12 p-5">
                                                <div class="post-card pl-5 pr-5 pt-3 pb-3">
                                                    <p class="text-dark-theme-bold">Address</p>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Partner Name: <span class="form-required-icon">*</span> </label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="association_name" class="form-control form-rounded-partner" name="association_name" required 
                                                                   value="<?php echo $mSchoolName; ?>"/>
                                                            <?php if (form_error('school_name')) { ?><span style="color: #E68F8F;"><?php echo form_error('school_name'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Street Address: <span class="form-required-icon">*</span> </label>
                                                        <div class="col-md-5">
                                                            <input type="text" id="school_address" class="form-control form-rounded-partner" placeholder="Address" name="school_address" required value="<?php echo $mAddress; ?>"/>
                                                            <?php if (form_error('school_address')) { ?><span style="color: #E68F8F;"><?php echo form_error('school_address'); ?></span> <?php } ?>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <input type="text" id="school_location" placeholder="Location" class="form-control form-rounded-partner" name="school_location" required value="<?php echo $mLocation; ?>"/>
                                                            <?php if (form_error('school_location')) { ?><span style="color: #E68F8F;"><?php echo form_error('school_location'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Country: <span class="form-required-icon">*</span> </label>
                                                        <div class="col-md-10">
                                                            <input value="<?php echo $mCountry; ?>" class="form-control form-rounded-partner" name="country" id="loc-automplete" list="country">
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
                                                            <?php if (form_error('country')) { ?><span style="color: #E68F8F;"><?php echo form_error('country'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Region/State: <span class="form-required-icon">*</span> </label>
                                                        <div class="col-md-10">
                                                            <select name="state" id="state-automplete" class="form-control form-rounded-partner" required>
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
                                                            <?php if (form_error('state')) { ?><span style="color: #E68F8F;"><?php echo form_error('state'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">City: <span class="form-required-icon">*</span> </label>
                                                        <div class="col-md-10">
                                                            <select name="city" id="city-automplete" class="form-control form-rounded-partner" required="">
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
                                                            <?php if (form_error('city')) { ?><span style="color: #E68F8F;"><?php echo form_error('city'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Postal code/Zip: <span class="form-required-icon">*</span> </label>
                                                        <div class="col-md-10">
                                                            <input type="number" id="pincode" class="form-control form-rounded-partner" name="pincode" required value="<?php echo $mZipCode ?>"/>
                                                            <?php if (form_error('pincode')) { ?><span style="color: #E68F8F;"><?php echo form_error('pincode'); ?></span> <?php } ?>       
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <p class="text-dark-theme-bold">Partner Information</p>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Website (Optional)</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="website" class="form-control form-rounded-partner" name="website" value="<?php echo $mWebsite; ?>"/>
                                                            <?php if (form_error('website')) { ?><span style="color: #E68F8F;"><?php echo form_error('website'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Video (Hyperlink)</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="hyperlink" class="form-control form-rounded-partner" name="hyperlink" required value="<?php echo $mVideoUrl; ?>"/>
                                                            <?php if (form_error('hyperlink')) { ?><span style="color: #E68F8F;"><?php echo form_error('hyperlink'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Overview (Optional)</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="overview" class="form-control form-rounded-partner" name="overview" required value="<?php echo $mOverview; ?>"/>
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
                                                            <input type="text" id="first_name" class="form-control form-rounded-partner" name="first_name" required value="<?php echo $mFirstName; ?>"/>
                                                            <?php if (form_error('first_name')) { ?><span style="color: #E68F8F;"><?php echo form_error('first_name'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Last Name : <span class="form-required-icon">*</span></label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="last_name" class="form-control form-rounded-partner" name="last_name" required value="<?php echo $mLastName; ?>"/>
                                                            <?php if (form_error('last_name')) { ?><span style="color: #E68F8F;"><?php echo form_error('last_name'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Role : <span class="form-required-icon">*</span></label>
                                                        <div class="col-md-10">
                                                            <select id="role" name="role" class="form-control form-rounded-partner" required>
                                                                <option value="" selected="" disabled="">Choose..</option>
                                                                <?php if (!empty($roles)) { ?>
                                                                    <?php
                                                                    foreach ($roles as $role) {
                                                                        if ($role['role_name'] == $mRole) {
                                                                            echo "<option selected='' value='" . $role['role_name'] . "'>" . $role['role_name'] . "</option>";
                                                                        } else {
                                                                            echo "<option value='" . $role['role_name'] . "'>" . $role['role_name'] . "</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                <?php } ?>
                                                            </select>
                                                            <?php if (form_error('role')) { ?><span style="color: #E68F8F;"><?php echo form_error('role'); ?></span> <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-2 col-form-label">Email : <span class="form-required-icon">*</span></label>
                                                        <div class="col-md-10">
                                                            <input type="email" id="email_id" class="form-control form-rounded-partner" name="email_id" required value="<?php echo $mEmail; ?>" readonly/>
                                                            <?php if (form_error('email_id')) { ?><span style="color: #E68F8F;"><?php echo form_error('email_id'); ?></span> <?php } ?>
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
                                                        <button type="submit" class="btn btn-theme-submit"><i class="fa fa-check mr-2"></i>Update Profile</button>   
                                                    </div>
                                                    
                                                    <div class="inner-footer">
                                                        <input hidden="" value="Update" class="btn btn-sm btn-dark" id="association_name" name="association_name">
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