<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('admin/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    </head>
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
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('admin/partials/left-nav'); ?>    
                <!-- top navigation -->
                <?php $this->load->view('admin/partials/top-nav'); ?>
                <!-- /top navigation --> 
            </div>


            <div class="right_col" role="main">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Association admin Application</h3>
                    </div>
                    <!--                    <div class="title_right">
                                            <a href="<?= base_url("admin/school/getList"); ?>">
                                                <h3>View Applications</h3>
                                            </a>
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
                            <div class="alert alert-success <?php echo $hidealert ?>">
                                <?php echo $showalert ?>
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
                                    <form id="Form" method="POST" action="<?php echo base_url() . "admin/association/actionEdit/" . $mId; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                        <div class="col-md-4 partners-form">
                                            <div class="title">
                                                <h4>Address</h4>
                                            </div>
                                            <label for="fullname">Association Name * :</label>
                                            <input readonly='' type="text" id="association_name" class="form-control" name="association_name" required 
                                                   value="<?php echo $mSchoolName; ?>"/>
                                            <?php if (form_error('school_name')) { ?><span style="color: #E68F8F;"><?php echo form_error('school_name'); ?></span> <?php } ?>
                                            <label for="address">Street Address * :</label>
                                            <input readonly='' type="text" id="school_address" class="form-control" placeholder="Address" name="school_address" required value="<?php echo $mAddress; ?>"/>
                                            <?php if (form_error('school_address')) { ?><span style="color: #E68F8F;"><?php echo form_error('school_address'); ?></span> <?php } ?>
                                            <input readonly='' type="text" id="school_location" placeholder="Location" class="form-control" name="school_location" required value="<?php echo $mLocation; ?>"/>
                                            <?php if (form_error('school_location')) { ?><span style="color: #E68F8F;"><?php echo form_error('school_location'); ?></span> <?php } ?>
                                            <label for="fullname">Country *:</label>
                                            <input readonly='' value="<?php echo $mCountry; ?>" class="form-control" name="country" id="loc-automplete" list="country">
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
                                            <label for="fullname">Region/State *:</label>
                                            <select disabled="" readonly="" name="state" id="state-automplete" class="form-control" required>
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
                                            <label for="fullname">City *:</label>
                                            <select disabled="" readonly="" name="city" id="city-automplete" class="form-control" required="">
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

                                            <label for="fullname">Postal code/Zip *:</label>
                                            <input readonly='' type="number" id="pincode" class="form-control" name="pincode" required value="<?php echo $mZipCode ?>"/>
                                            <?php if (form_error('pincode')) { ?><span style="color: #E68F8F;"><?php echo form_error('pincode'); ?></span> <?php } ?>
                                        </div>
                                        <div class="col-md-4 partners-form">
                                            <div class="title">
                                                <h4>Data</h4>
                                            </div>
                                            <label for="fullname">Association website (Optional) :</label>
                                            <input readonly='' type="text" id="website" class="form-control" name="website" value="<?php echo $mWebsite; ?>"/>
                                            <?php if (form_error('website')) { ?><span style="color: #E68F8F;"><?php echo form_error('website'); ?></span> <?php } ?>
                                            <label for="fullname">Association Video (Hyperlink) :</label>
                                            <input readonly='' type="text" id="hyperlink" class="form-control" name="hyperlink" required value="<?php echo $mVideoUrl; ?>"/>
                                            <?php if (form_error('hyperlink')) { ?><span style="color: #E68F8F;"><?php echo form_error('hyperlink'); ?></span> <?php } ?>
                                            <label for="fullname">Association Overview :</label>
                                            <input readonly='' type="text" id="overview" class="form-control" name="overview" required value="<?php echo $mOverview; ?>"/>
                                            <?php if (form_error('overview')) { ?><span style="color: #E68F8F;"><?php echo form_error('overview'); ?></span> <?php } ?>
                                            <label for="fullname">Number of members (More than) :</label>
                                            <input readonly='' type="text" id="no_of_students" class="form-control" name="no_of_students" required value="<?php echo $mNoOfStudents; ?>"/>
                                            <?php if (form_error('no_of_students')) { ?><span style="color: #E68F8F;"><?php echo form_error('no_of_students'); ?></span> <?php } ?>
                                            <label for="fullname">Logo *:</label>
                                            <input readonly='' type="file"  class="form-control" accept=".png, .jpg, .jpeg" id="school_logo" name="school_logo" />
                                            <a download="" class="btn btn-xs btn-primary" href="<?php echo base_url('uploads/') ?><?php echo $mLogo; ?>">Download Logo</a>
                                            <br>
                                            <label for="fullname">Profile *:</label>
                                            <input readonly='' type="file"  class="form-control" accept=".png, .jpg, .jpeg" id="school_profile" name="school_profile"  />
                                            <a download="" class="btn btn-xs btn-primary" href="<?php echo base_url('uploads/') ?><?php echo $mProfile; ?>">Download Profile</a>
                                            <br>
                                            <label for="fullname">Group Description *:</label>
                                            <textarea readonly='' class="form-control" id="group_description" name="group_description" rows="3" required><?php echo $mGd; ?></textarea>
                                            <?php if (form_error('group_description')) { ?><span style="color: #E68F8F;"><?php echo form_error('group_description'); ?></span> <?php } ?>
                                        </div>
                                        <div class="col-md-4 partners-form">
                                            <div class="title">
                                                <h4>Contact person</h4>
                                            </div>
                                            <label for="fullname">Salutation * :</label>
                                            <input readonly='' type="text" id="salutation" class="form-control" name="salutation" required value="<?php echo $mSalutation; ?>"/>
                                            <?php if (form_error('salutation')) { ?><span style="color: #E68F8F;"><?php echo form_error('salutation'); ?></span> <?php } ?>
                                            <label for="fullname">First Name * :</label>
                                            <input readonly='' type="text" id="first_name" class="form-control" name="first_name" required value="<?php echo $mFirstName; ?>"/>
                                            <?php if (form_error('first_name')) { ?><span style="color: #E68F8F;"><?php echo form_error('first_name'); ?></span> <?php } ?>
                                            <label for="fullname">Last Name * :</label>
                                            <input readonly='' type="text" id="last_name" class="form-control" name="last_name" required value="<?php echo $mLastName; ?>"/>
                                            <?php if (form_error('last_name')) { ?><span style="color: #E68F8F;"><?php echo form_error('last_name'); ?></span> <?php } ?>
                                            <label for="fullname">Role :</label>
                                            <select disabled="" readonly="" id="role" name="role" class="form-control" required>
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
                                            <label for="fullname">Email :</label>
                                            <input readonly='' type="email" id="email_id" class="form-control" name="email_id" required value="<?php echo $mEmail; ?>" readonly/>
                                            <?php if (form_error('email_id')) { ?><span style="color: #E68F8F;"><?php echo form_error('email_id'); ?></span> <?php } ?>
                                            <label for="fullname">Phone :</label>
                                            <div class="clearfix"></div>
                                            <div class="col-md-4 no-padding">
                                                <select disabled="" readonly="" id="contact_type" name="contact_type" class="form-control" required>
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
                                                <input readonly='' type="number" placeholder="Area code" id="area_code" class="form-control" name="area_code" required value="<?php echo $mPACode; ?>"/>
                                                <?php if (form_error('area_code')) { ?><span style="color: #E68F8F;"><?php echo form_error('area_code'); ?></span> <?php } ?>
                                            </div>
                                            <div class="col-md-4 no-padding">
                                                <input readonly='' type="number" placeholder="Number" id="contact" class="form-control" name="contact" required value="<?php echo $mPhoneNo; ?>"/>
                                                <?php if (form_error('contact')) { ?><span style="color: #E68F8F;"><?php echo form_error('contact'); ?></span> <?php } ?>
                                            </div>
                                            <label for="fullname">Fax :</label>
                                            <div class="clearfix"></div>
                                            <div class="col-md-4 no-padding">
                                                <select disabled="" readonly="" id="fax_type" name="fax_type" class="form-control" >
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
                                                <input readonly='' type="number" placeholder="Area code" id="fax_area_code" class="form-control" name="fax_area_code" required value="<?php echo $mFACode; ?>"/>
                                                <?php if (form_error('fax_area_code')) { ?><span style="color: #E68F8F;"><?php echo form_error('fax_area_code'); ?></span> <?php } ?>
                                            </div>
                                            <div class="col-md-4 no-padding">
                                                <input readonly='' type="number" placeholder="Number" id="fax_contact" class="form-control" name="fax_contact" required value="<?php echo $mFaxNo; ?>"/>
                                                <?php if (form_error('fax_contact')) { ?><span style="color: #E68F8F;"><?php echo form_error('fax_contact'); ?></span> <?php } ?>
                                            </div>
                                            <label for="fullname">Best time to contact you :</label>
                                            <?php
                                            $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
                                            $selectedc = json_decode($mBestDay);
                                            $found = false;
                                            foreach ($days as $key_a => $val_a) {
                                                $found = false;
                                                foreach ($selectedc as $key_b => $val_b) {
                                                    if ($val_a == $val_b) {
                                                        echo "<input disabled='' readonly='' checked type='checkbox' class='flat' name='best_day[]' id='best_day' value='" . $val_a . "'/> $val_a";
                                                        $found = true;
                                                    }
                                                }
                                                if (!$found)
                                                    echo "<input disabled='' readonly='' type='checkbox' class='flat' name='best_day[]' id='best_day' value='" . $val_a . "'/> $val_a";
                                            }
                                            ?>
                                            <br>
                                            <?php if (form_error('best_day')) { ?><span style="color: #E68F8F;"><?php echo form_error('best_day'); ?></span> <?php } ?>
                                            <label for="fullname">Best time to contact you :</label>
                                            <?php
                                            $time = array("Morning", "Afternoon", "Evening");
                                            $selectedc = json_decode($mBestTime);
                                            $found = false;
                                            foreach ($time as $key_a => $val_a) {
                                                $found = false;
                                                foreach ($selectedc as $key_b => $val_b) {
                                                    if ($val_a == $val_b) {
                                                        echo "<input disabled='' readonly='' checked type='checkbox' class='flat' name='best_time[]' id='best_time' value='" . $val_a . "'/> $val_a";
                                                        $found = true;
                                                    }
                                                }
                                                if (!$found)
                                                    echo "<input disabled='' readonly='' type='checkbox' class='flat' name='best_time[]' id='best_time' value='" . $val_a . "'/> $val_a";
                                            }
                                            ?>
                                            <br>
                                            <?php if (form_error('best_time')) { ?><span style="color: #E68F8F;"><?php echo form_error('best_time'); ?></span> <?php } ?>
                                        </div>
                                        <div class="text-center">
<!--                                            <input type="submit" value="Update" class="btn btn-sm btn-dark" id="edit_association" name="edit_school">-->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer content -->
            <?php $this->load->view('admin/partials/footer') ?>
            <!-- /footer content --> 
        </div>

        <?php $this->load->view('admin/partials/assets-footer'); ?>
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
