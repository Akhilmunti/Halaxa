<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('social/halaxa_partials/header'); ?>

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('social/halaxa_partials/navbar'); ?>

            <div class="wrapper">
                <!-- Sidebar -->
                <?php $this->load->view('social/halaxa_partials/sidebar'); ?>

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-md-12">
                                <?php
                                $result = $this->session->flashdata('result');
                                ?>
                                <?php if ($result) { ?>
                                    <div class="alert alert-success">
                                        <?php echo $result ?>
                                    </div>
                                <?php } ?>

                            </div>

                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="theme-card">
                                            <div class="row no-gutters">
                                                <?php
                                                $mProfileImage = base_url('assets/photo/') . $user->Photo;
                                                $mCoverImage = base_url('assets/photo/') . $user->Cover;
                                                if (file_exists($mProfileImage)) {
                                                    $mProfileImage = base_url('assets/photo/') . $user->Photo;
                                                } else {
                                                    $mProfileImage = base_url('assets/halaxa_dashboard/images/user-img.png');
                                                }

                                                if (file_exists($mCoverImage)) {
                                                    $mCoverImage = base_url('assets/photo/') . $user->Cover;
                                                } else {
                                                    $mCoverImage = base_url('assets/halaxa_dashboard/images/back-profile.png');
                                                }
                                                ?>
                                                <div class="col-md-12 profile-back" style="background: url('<?php echo $mCoverImage; ?>');">
                                                    <div class="row p-3 no-gutters">
                                                        
                                                        <div class="col-md-2 mt-2 mx-auto">

                                                            <a href="#" data-toggle="modal" data-target="#myModalProfilePic">
                                                                <img height="70" class="rounded-circle" src="<?php echo $mProfileImage ?>" />
                                                            </a>
                                                            <!-- Modal -->
                                                            <div class="modal" id="myModalProfilePic">
                                                                <div class="modal-dialog modal-lg">
                                                                    <form id="formThree" enctype="multipart/form-data" class="form-horizontal form-label-left" action="<?php echo base_url('profile/edit_save/') . $user->User_Id ?>" method="post">

                                                                        <div class="modal-content-theme">

                                                                            <div class="modal-header bg-danger">
                                                                                <span class="modal-header-text">Update Profile</span>
                                                                            </div>

                                                                            <!-- Modal body -->
                                                                            <div class="modal-body">
                                                                                <div class="row mb-2">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group row">
                                                                                            <label class="control-label col-md-12 col-sm-12 col-xs-12">Name: </label>
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                                <input value="<?php echo $user->Name; ?>" name="Name" type="text" class="form-control" placeholder="Name"  >
                                                                                                <?php if (form_error('name')) { ?>

                                                                                                    <span class="form-error-message text-danger"><?php echo form_error('name'); ?></span>

                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        </div>


                                                                                        <div class="form-group row">
                                                                                            <label class="control-label col-md-12 col-sm-12 col-xs-12">  Email: </label>
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                                <input value="<?php echo $user->Email; ?>" id="" name="Email" type="email" class="form-control" placeholder="Email" >
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">  Phone: </label>
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                                <input value="<?php echo $user->Phone; ?>" id=" phone" name="Phone" type="number" class="form-control" placeholder="Phone">

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">  Address: </label>
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                                <input value="<?php echo $user->Address; ?>" id=" address" name="Address" type="text" class="form-control" placeholder="Address">

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <div class="col-md-6">
                                                                                                <label class="control-label"> Profile Photo: </label>
                                                                                                <input hidden="" class="form-control" type="file" id="image" name="Photo" accept=".png, .jpg, .jpeg, .gif" onchange="loadFileBoth(event)"/>
                                                                                                <div class="text-left">
                                                                                                    <label for='image'>
                                                                                                        <img class="img-fluid start-post-img-picture" src="<?php echo base_url('assets/halaxa_dashboard/images/picture-icon.png'); ?>" />
                                                                                                    </label>
                                                                                                </div>
                                                                                                <br>
                                                                                                <img src="<?php echo $mProfileImage; ?>" id="output-img-both" class="img-fluid"/>
                                                                                            </div>
                                                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                                                <label class="control-label"> Cover Photo: </label>
                                                                                                <input hidden="" class="form-control" type="file" id="imagec" name="Cover" accept=".png, .jpg, .jpeg, .gif" onchange="loadFileCover(event)"/>
                                                                                                <div class="text-left">
                                                                                                    <label for='imagec'>
                                                                                                        <img class="img-fluid start-post-img-picture" src="<?php echo base_url('assets/halaxa_dashboard/images/picture-icon.png'); ?>" />
                                                                                                    </label>
                                                                                                </div>
                                                                                                <br>
                                                                                                <img src="<?php echo $mCoverImage; ?>" id="output-img-cover" class="img-fluid"/>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Modal footer -->
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                                <button type="submit" class="btn btn-danger">Post</button>
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10 mt-2" style="margin-left: -30px">
                                                            <h6 class="profile-name"><?php echo $user->Name; ?></h6>
                                                            <span class="profile-followers mr-4">
                                                                <?php
                                                                if (!empty($connections)) {
                                                                    echo count($connections);
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                                Followers
                                                            </span>
                                                            <span class="profile-followers">
                                                                <?php
                                                                if (!empty($connections)) {
                                                                    echo count($connections);
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?> 
                                                                Following
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <!-- Nav pills -->
                                                    <ul class="nav nav-pills justify-content-center">
                                                        <li class="nav-item">
                                                            <a class="nav-link nav-link-profile-read active" data-toggle="pill" href="#home">About</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link nav-link-profile-read" data-toggle="pill" href="#menu1">Followers</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link nav-link-profile-read" data-toggle="pill" href="#menu2">Following</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link nav-link-profile-read" data-toggle="pill" href="#posts">Posts</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link nav-link-profile-read" data-toggle="pill" href="#coms">Communities</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home">
                                                <div class="row">
                                                    <div class="col-md-9 personal-block">

                                                        <div id="personal" class="theme-card p-3 mt-3">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h6 class="text-danger"><b>Personal Details</b></h6>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <table class="table table-borderless table-desc">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <span class="h-info">Name </span>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="p-info">
                                                                                        <?php echo $user->Name; ?>
                                                                                    </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <span class="h-info">Phone </span>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="p-info"><?php echo $user->Phone; ?></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <span class="h-info">Marital Status </span>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="p-info"><?php
                                                                                        if ($user->marital_status == "S") {
                                                                                            echo 'Single';
                                                                                        } else {
                                                                                            echo 'Married';
                                                                                        }
                                                                                        ?></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <span class="h-info">Website/Link </span>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="p-info"><?php echo $irs_jsd['website'] ?></span>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <ul class="list-unstyled">
                                                                        <li>
                                                                            <span class="h-info">About </span>
                                                                            <div class="clearfix"></div>
                                                                            <span class="p-info">
                                                                                <?php
                                                                                if ($irs_jsd['about']) {
                                                                                    echo $irs_jsd['about'];
                                                                                } else {
                                                                                    echo "-";
                                                                                }
                                                                                ?>
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <table class="table table-borderless table-desc">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <span class="h-info">Email </span>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="p-info"><?php echo $user->Email; ?></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <span class="h-info">DOB </span>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="p-info">
                                                                                        <?php
                                                                                        if ($irs_jsd['dob']) {
                                                                                            echo explode(' ', $irs_jsd['dob'])[0];
                                                                                        } else {
                                                                                            echo "-";
                                                                                        }
                                                                                        ?></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <span class="h-info">Gender</span>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="p-info"><?php
                                                                                        if ($user->gender == "F") {
                                                                                            echo 'Female';
                                                                                        } else {
                                                                                            echo 'Male';
                                                                                        }
                                                                                        ?></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <span class="h-info">Country</span>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="p-info">
                                                                                        <?php
                                                                                        foreach ($countries as $loc) {
                                                                                            if ($loc['location_id'] == $irs_jsd['countryid']) {
                                                                                                echo $loc['name'];
                                                                                            } else {
                                                                                                
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </span>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <ul class="list-unstyled">
                                                                        <?php if (!empty($user->Address)) { ?>
                                                                            <li>
                                                                                <span class="h-info">Permanent Address </span>
                                                                                <div class="clearfix"></div>
                                                                                <span class="p-info">
                                                                                    <?php echo $irs_jsd['permanent_address']; ?>
                                                                                </span>
                                                                            </li>
                                                                        <?php } ?>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="education" class="table-user-name mt-3 mb-3">
                                                            <img height="20" width="25" class="text-vertical" src='<?php echo base_url('assets/halaxa_dashboard/images/education-icon.png'); ?>'>
                                                            <span class="text-vertical text-light-asses">
                                                                <b>Education</b>
                                                            </span>

                                                            
                                                        </div>

                                                        <div class="theme-card p-3">
                                                            <div class="row" style="display:none;">
                                                                <div class="col-md-11">
                                                                    <h6 class="text-danger mb-3"><b>Course</b></h6>
                                                                    <p class="p-info line-height-fix">University</p>
                                                                </div>
                                                            </div>

                                                            <?php
                                                            if (count($irs_js_edu) > 0) {
                                                                foreach ($irs_js_edu as $education) {
                                                                    //print_r($education);
                                                                    ?>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h6 class="text-danger mb-3"><b><?php echo $education['course']; ?></b></h6>
                                                                            <p class="p-info line-height-fix"><?php echo $education['university']; ?></p>
                                                                        </div>
                                                                        
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <table class="table table-borderless table-desc">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <span class="h-info">Education type</span>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="p-info"><?php echo $education['education_type']; ?></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <span class="h-info">Period </span>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="p-info"><?php echo $education['year_from'] . " - " . $education['year_to']; ?></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <table class="table table-borderless table-desc">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <span class="h-info">Language </span>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="p-info"><?php echo $education['medium']; ?> </span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <span class="h-info">University Address</span>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="p-info"> </span>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h6 class="text-danger mb-3"><b></b></h6>
                                                                        <p class="p-info line-height-fix">Nothing to Show</p>
                                                                    </div>
                                                                </div>
                                                            <?php }
                                                            ?>
                                                        </div>

                                                        <div id="experience" class="table-user-name mt-3 mb-3">
                                                            <img height="20" width="20" class="text-vertical" src='<?php echo base_url('assets/halaxa_dashboard/images/experience-icon.png'); ?>'>
                                                            <span class="text-vertical text-light-asses">
                                                                <b>Experience</b>
                                                            </span>
                                                           
                                                        </div>


                                                        <div class="theme-card p-3">
                                                            <?php
                                                            if (count($irs_js_exp) > 0) {
                                                                foreach ($irs_js_exp as $experiance) {
                                                                    //print_r($experiance);
                                                                    ?>
                                                                    <div class="row">
                                                                        <div class="col-md-11">
                                                                            <h6 class="text-danger mb-3"><b><?php echo $experiance['designation']; ?></b></h6>
                                                                            <p class="p-info line-height-fix"><?php echo $experiance['companyname']; ?></p>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <a href="#" data-toggle="modal" data-target="#editExperianceDetails_<?php echo $experiance['id']; ?>">
                                                                                <img height="20" src="<?php echo base_url('assets/halaxa_dashboard/images/edit-irs.png') ?>" />
                                                                            </a>
                                                                            <!-- Modal -->
                                                                            <div class="modal" id="editExperianceDetails_<?php echo $experiance['id']; ?>">
                                                                                <div class="modal-dialog modal-lg">
                                                                                    <form id="cProfileForm" method="POST" action="<?php echo base_url() . "profile/addJsExperienceData/"; ?><?php echo $job_seeker_id; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                                                        <div class="modal-content-theme">
                                                                                            <div class="modal-header bg-danger">
                                                                                                <span class="modal-header-text">Edit Experience Details</span>
                                                                                            </div>
                                                                                            <!-- Modal body -->
                                                                                            <div class="modal-body">
                                                                                                <div class="row mb-2">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="row">
                                                                                                            <div class="form-group col-md-12">
                                                                                                                <label for="">Company name <span class="requerd">* </span></label>
                                                                                                                <input value="<?php echo $experiance['id']; ?>" required="" class="form-control" id="experiance_key"  name="experiance_key" placeholder="Enter Company Name" type="hidden"/>
                                                                                                                <input value="<?php echo $experiance['companyname']; ?>" required="" class="form-control" id="companyname"  name="companyname" placeholder="Enter Company Name" type="text"/>
                                                                                                            </div> 
                                                                                                        </div> 
                                                                                                        <?php //print_r($experiance);  ?>
                                                                                                        <div class="row">    
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">Current Position 
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <select name="currentposition" id="current_position" name="current_position" class="form-control select2" style="width: 100%;" onChange="removeerrorcurrentposition()" required="">
                                                                                                                    <option value="">Select Position
                                                                                                                    </option>   
                                                                                                                    <?php
                                                                                                                    foreach ($job_roles as $role) {
                                                                                                                        ?>
                                                                                                                        <option value="<?php echo $role['value']; ?>" name="<?php echo $role['value']; ?>" <?php
                                                                                                                        if (trim($role['value']) == trim($experiance['designation'])) {
                                                                                                                            echo "selected";
                                                                                                                        }
                                                                                                                        ?>><?php echo $role['value']; ?></option>
                                                                                                                            <?php }
                                                                                                                            ?>
                                                                                                                </select>
                                                                                                                <label id="current_position-error" class="error" for="current_position">
                                                                                                                </label>
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">Employment Type 
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <select  class="form-control select2" id="emplyment_type"  name="emplyment_type"  style="width: 100%;" onChange="removeerroremplyment_type()" required>
                                                                                                                    <option value="">Select
                                                                                                                    </option>
                                                                                                                    <option value="1" <?php
                                                                                                                    if ($experiance['employment_type'] == "1") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>Full Time
                                                                                                                    </option>
                                                                                                                    <option value="2" <?php
                                                                                                                    if ($experiance['employment_type'] == "2") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>Part Time
                                                                                                                    </option>
                                                                                                                    <option value="3" <?php
                                                                                                                    if ($experiance['employment_type'] == "3") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>Internship
                                                                                                                    </option>
                                                                                                                </select>
                                                                                                                <label id="emplyment_type-error" class="error" for="emplyment_type">
                                                                                                                </label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">About Company 
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <textarea id="editor3" name="about_company" class="form-control" required="">
                                                                                                                    <?php echo $experiance['about_company']; ?>
                                                                                                                </textarea>
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">Role Description and Achievements
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <textarea id="editor4" name="role_description" class="form-control" required="">
                                                                                                                    <?php echo $experiance['role_description']; ?>
                                                                                                                </textarea>
                                                                                                            </div>
                                                                                                        </div>                                                          
                                                                                                        <div class="row">
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">Year from 
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <input value="<?php echo $experiance['yearfrom']; ?>" class="form-control" id="yearfromaddexp" name="yearfrom" placeholder="MM/YYYY" type="text" onChange="removeerroryearfrom()" required/>
                                                                                                                <span id="yearfromaddexp-error" class="error" for="yearfromaddexp">
                                                                                                                </span>
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">Year to 
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <input value="<?php echo $experiance['yearto']; ?>" class="form-control" id="yeartoaddexp" name="yearto" placeholder="MM/YYYY" type="text" onChange="removeerroryearto()"   required/>
                                                                                                                <span id="yeartoaddexp-error" class="error" for="yeartoaddexp">
                                                                                                                </span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">Current Package 
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <select  name="current_package"  id="current_package" class="form-control select2" required="" onChange="removeerrorcurrent_package()" style="width: 100%;">
                                                                                                                    <option value="">Select Current Package
                                                                                                                    </option>  
                                                                                                                    <option value='786'
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "786") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?> > Less than 5,000 
                                                                                                                    </option>
                                                                                                                    <option value='5000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "5000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?> >
                                                                                                                        5,000                </option>
                                                                                                                    <option value='10000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "10000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        10,000                </option>
                                                                                                                    <option value='15000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "15000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        15,000                </option>
                                                                                                                    <option value='20000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "20000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        20,000                </option>
                                                                                                                    <option value='25000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "25000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        25,000                </option>
                                                                                                                    <option value='30000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "30000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        30,000                </option>
                                                                                                                    <option value='35000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "35000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        35,000                </option>
                                                                                                                    <option value='40000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "40000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        40,000                </option>
                                                                                                                    <option value='45000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "45000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        45,000                </option>
                                                                                                                    <option value='50000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "50000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        50,000                </option>
                                                                                                                    <option value='55000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "55000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        55,000                </option>
                                                                                                                    <option value='60000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "60000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        60,000                </option>
                                                                                                                    <option value='65000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "65000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        65,000                </option>
                                                                                                                    <option value='70000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "70000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        70,000                </option>
                                                                                                                    <option value='75000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "75000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        75,000                </option>
                                                                                                                    <option value='80000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "80000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        80,000                </option>
                                                                                                                    <option value='85000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "85000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        85,000                </option>
                                                                                                                    <option value='90000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "90000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        90,000                </option>
                                                                                                                    <option value='95000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "95000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        95,000                </option>
                                                                                                                    <option value='100000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "100000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>
                                                                                                                        100,000                </option>
                                                                                                                    <option value='10000000' 
                                                                                                                    <?php
                                                                                                                    if ($experiance['package'] == "10000000") {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                    ?>>100,000 & above 
                                                                                                                    </option>
                                                                                                                </select>
                                                                                                                <label id="current_package-error" class="error" for="current_package">
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">Key Responsibilities 
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <input value="<?php echo $experiance['key_responsibilities']; ?>" id="tags_2" name="tags_2" type="text"  class=" form-control" required>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label>Nationality 
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <select class="form-control select2" id="Nationality" name="Nationality"  data-placeholder="Select a country" style="width: 100%;" onChange="removeerrorNationality()"  required>
                                                                                                                    <option value="">Select Nationality</option>
                                                                                                                    <?php
                                                                                                                    foreach ($countries as $loc) {
                                                                                                                        if ($loc['location_id'] == $experiance['company_nationality']) {
                                                                                                                            $selected = "selected";
                                                                                                                        }
                                                                                                                        echo "<option value='" . $loc['location_id'] . "' " . $selected . ">" . $loc['name'] . "</option>";
                                                                                                                    }
                                                                                                                    ?>

                                                                                                                </select>
                                                                                                                <label id="Nationality-error" class="error" for="Nationality">
                                                                                                                </label>
                                                                                                            </div>
                                                                                                            <div class="form-group  col-md-6">
                                                                                                                <label for="">Company location 
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <input value="<?php echo $experiance['company_location']; ?>" type="text" name="company_location"  id="company_location" class="form-control" placeholder="Company Location" required>
                                                                                                                <label id="company_location-error" class="error" for="company_location">
                                                                                                                </label>
                                                                                                            </div>
                                                                                                        </div> 
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <!-- Modal footer -->
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                                                <button type="submit" class="btn btn-danger">Edit</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <table class="table table-borderless table-desc">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <span class="h-info">Employment type</span>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="p-info">
                                                                                                <?php
                                                                                                if ($experiance['employment_type'] == 1) {
                                                                                                    echo "Full Time";
                                                                                                }if ($experiance['employment_type'] == 2) {
                                                                                                    echo "Part Time";
                                                                                                }if ($experiance['employment_type'] == 3) {
                                                                                                    echo "Internship";
                                                                                                }
                                                                                                ?>
                                                                                            </span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <span class="h-info">Time Period </span>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="p-info"><?php echo $experiance['yearto']; ?> - <?php echo $experiance['yearfrom']; ?></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <ul class="list-unstyled">
                                                                                <li>
                                                                                    <span class="h-info">Role Description </span>
                                                                                    <div class="clearfix"></div>
                                                                                    <span class="p-info">
                                                                                        <?php echo $experiance['role_description']; ?> 
                                                                                    </span>
                                                                                </li>
                                                                                <li class="mt-2">
                                                                                    <span class="h-info">Responsibility </span>
                                                                                    <div class="clearfix"></div>
                                                                                    <span class="p-info">
                                                                                        <?php echo $experiance['key_responsibilities']; ?> 
                                                                                    </span>
                                                                                </li>
                                                                            </ul>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <table class="table table-borderless table-desc">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <span class="h-info">Package </span>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="p-info"><?php echo $experiance['package']; ?>  </span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <span class="h-info">Company Address</span>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="p-info"><?php echo $experiance['company_location']; ?> - 
                                                                                                <?php
                                                                                                foreach ($Country as $countrydata) {
                                                                                                    if ($countrydata['location_id'] == $experiance['company_nationality']) {
                                                                                                        echo $countrydata['name'];
                                                                                                    }
                                                                                                }
                                                                                                ?> </span>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <ul class="list-unstyled">
                                                                                <li>
                                                                                    <span class="h-info">About Company </span>
                                                                                    <div class="clearfix"></div>
                                                                                    <span class="p-info">
                                                                                        resolution he dissimilar precaution to e moments. Merit end sight front Manor equal it on again ye folly by match In so melancholy as an old get our. 
                                                                                    </span>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h6 class="text-danger mb-3"><b></b></h6>
                                                                        <p class="p-info line-height-fix">Nothing to Show</p>
                                                                    </div>
                                                                </div>   
                                                            <?php } ?>
                                                        </div>


                                                        <div id="project" class="table-user-name mt-3 mb-3">
                                                            <img height="20" width="20" class="text-vertical" src='<?php echo base_url('assets/halaxa_dashboard/images/project-icon.png'); ?>'>
                                                            <span class="text-vertical text-light-asses">
                                                                <b>Project</b>
                                                            </span>
                                                        </div>

                                                        <div class="theme-card p-3">
                                                            <?php
                                                            if (count($irs_js_pro) > 0) {
                                                                foreach ($irs_js_pro as $jsprojects) {
                                                                    //print_r($jsprojects);
                                                                    ?>
                                                                    <div class="row">
                                                                        <div class="col-md-11">
                                                                            <h6 class="text-danger mb-3"><b><?php echo $jsprojects['project_title'] ?></b></h6>
                                                                            <p class="p-info line-height-fix"><?php echo $jsprojects['client_name'] ?></p>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <a href="#" data-toggle="modal" data-target="#editProjectDetails_<?php echo $jsprojects['id']; ?>">
                                                                                <img height="20" src="<?php echo base_url('assets/halaxa_dashboard/images/edit-irs.png') ?>" />
                                                                            </a>
                                                                            <!-- Modal -->
                                                                            <div class="modal" id="editProjectDetails_<?php echo $jsprojects['id']; ?>">
                                                                                <div class="modal-dialog modal-lg">
                                                                                    <form id="cProfileForm" method="POST" action="<?php echo base_url() . "profile/addJsProjectData/"; ?><?php echo $job_seeker_id; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                                                        <div class="modal-content-theme">
                                                                                            <div class="modal-header bg-danger">
                                                                                                <span class="modal-header-text">Edit Project Details</span>
                                                                                            </div>

                                                                                            <!-- Modal body -->
                                                                                            <div class="modal-body">
                                                                                                <div class="row mb-2">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="row">    
                                                                                                            <input type="hidden" name="_token" value="REHyK8ZURP7MsyNjw3w82MnLqTujSZ2aBl5xD2Kq">                                      
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">Project Title 
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <input type="hidden" class="form-control"  name="project_key"   id="project_key" placeholder="Project Title" required="" value="<?php echo $jsprojects['id']; ?>">
                                                                                                                <input type="text" class="form-control"  name="project_title"   id="project_title" placeholder="Project Title" required="" value="<?php echo $jsprojects['project_title']; ?>">
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">Client Name 
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <input type="text" class="form-control" id="client_name"  name="client_name" placeholder="Client Name" required="" value="<?php echo $jsprojects['client_name']; ?>">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">Team Size 
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <input type="text" name="team_size"  onkeypress="return isNumberKey(event, this.id)"  id="team_size" class="form-control" placeholder="Team Size" required="" value="<?php echo $jsprojects['team_size']; ?>">
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">Project Loctaion 
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <input type="text" name="project_locat"  id="project_locat" class="form-control" placeholder="Project Loctaion" required="" value="<?php echo $jsprojects['project_location']; ?>">
                                                                                                            </div>  
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">About Project 
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <textarea id="editor5" name="project_abtprjct" class="form-control" required="">
                                                                                                                    <?php echo $jsprojects['project_details']; ?>
                                                                                                                </textarea>
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">Skills Used 
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <textarea id="editor6" name="project_skilsused" class="form-control" required="">
                                                                                                                    <?php echo $jsprojects['skills_used']; ?>
                                                                                                                </textarea>
                                                                                                            </div>
                                                                                                        </div>  
                                                                                                        <?php
                                                                                                        $durationDate = explode("-", $jsprojects['duration']);
                                                                                                        ?>
                                                                                                        <div class="row">
                                                                                                            <div class="form-group col-md-3">
                                                                                                                <label for="">Duration From
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <input value="<?php echo $durationDate[0]; ?>" class="form-control" id="yearfromaddpro" name="duration_from" placeholder="MM/YYYY" type="text" onChange="removeerroprojectfrom()"   required=""/>
                                                                                                                <span id="yearfromaddpro-error" class="error" for="yearfromaddpro">
                                                                                                                </span>
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-3">
                                                                                                                <label for="">Duration To
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <input value="<?php echo $durationDate[1]; ?>" class="form-control" id="yeartoaddpro" name="duration_to" placeholder="MM/YYYY" type="text" onChange="removeerroprojectto()"   required=""/>
                                                                                                                <span id="yeartoaddpro-error" class="error" for="yeartoaddpro">
                                                                                                                </span>
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">Role 
                                                                                                                </label> <span class="requerd">* 
                                                                                                                </span>role
                                                                                                                <input value="<?php echo $jsprojects['role']; ?>" type="text" name="role" id="role" class="form-control " placeholder="Role" required="">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <!-- Modal footer -->
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                                                <button type="submit" class="btn btn-danger">Edit</button>
                                                                                            </div>

                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <table class="table table-borderless table-desc">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <span class="h-info">Team size</span>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="p-info"><?php echo $jsprojects['team_size'] ?></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <span class="h-info">Period </span>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="p-info"><?php echo $jsprojects['duration'] ?></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <ul class="list-unstyled">
                                                                                <li>
                                                                                    <span class="h-info">About project</span>
                                                                                    <div class="clearfix"></div>
                                                                                    <span class="p-info">
                                                                                        <?php echo $jsprojects['project_details'] ?>
                                                                                    </span>
                                                                                </li>
                                                                            </ul>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <table class="table table-borderless table-desc">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <span class="h-info">Role </span>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="p-info"><?php echo $jsprojects['role'] ?> </span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <span class="h-info">Project Location </span>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="p-info"> <?php echo $jsprojects['project_location'] ?> </span>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <ul class="list-unstyled">
                                                                                <li>
                                                                                    <span class="h-info">Roles Used </span>
                                                                                    <div class="clearfix"></div>
                                                                                    <span class="p-info">
                                                                                        <?php echo $jsprojects['skills_used'] ?>
                                                                                    </span>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h6 class="text-danger mb-3"><b></b></h6>
                                                                        <p class="p-info line-height-fix">Nothing to Show</p>
                                                                    </div>
                                                                </div> 
                                                            <?php } ?>

                                                        </div>


                                                        <div id="certificate" class="table-user-name mt-3 mb-3">
                                                            <img height="20" width="20" class="text-vertical" src='<?php echo base_url('assets/halaxa_dashboard/images/certificates-icon.png'); ?>'>
                                                            <span class="text-vertical text-light-asses">
                                                                <b>Certificates</b>
                                                            </span>
                                                        </div>

                                                        <div class="theme-card p-3 mb-3">
                                                            <?php if (count($irs_js_cer) > 0) { ?>
                                                                <?php
                                                                foreach ($irs_js_cer as $certificate) {
                                                                    //print_r($certificate);
                                                                    ?>
                                                                    <div class="row">
                                                                        <div class="col-md-11">
                                                                            <h6 class="text-danger mb-3"><b><?php echo $certificate['certificate_name']; ?></b></h6>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <a href="#" data-toggle="modal" data-target="#addCertificatesDetails_<?php echo $certificate['id']; ?>">
                                                                                <img height="20" src="<?php echo base_url('assets/halaxa_dashboard/images/edit-irs.png') ?>" />
                                                                            </a>
                                                                            <!-- Modal -->
                                                                            <div class="modal" id="addCertificatesDetails_<?php echo $certificate['id']; ?>">
                                                                                <div class="modal-dialog modal-lg">
                                                                                    <form id="cProfileForm" method="POST" action="<?php echo base_url() . "profile/addJsCertificateData/"; ?><?php echo $job_seeker_id; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                                                        <div class="modal-content-theme">
                                                                                            <div class="modal-header bg-danger">
                                                                                                <span class="modal-header-text">Edit Certificates Details</span>
                                                                                            </div>

                                                                                            <!-- Modal body -->
                                                                                            <div class="modal-body">
                                                                                                <div class="row mb-2">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="row">    
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">Certificate Name 
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <input type="hidden" value="<?php echo $certificate['id']; ?>" class="form-control"  name="certificate_key"   id="certificate_key" placeholder="Certificate Name " required="">
                                                                                                                <input type="text" value="<?php echo $certificate['certificate_name']; ?>" class="form-control"  name="certificate_name"   id="certificate_name" placeholder="Certificate Name " required="">
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">Certificate Authorization 
                                                                                                                </label>
                                                                                                                <input type="text" value="<?php echo $certificate['certificate_authority']; ?>" class="form-control" id="certificate_authorization"  name="certificate_authorization" placeholder="Certificate Authorization">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">License No.
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <input value="<?php echo $certificate['license_no']; ?>" required="" type="text" name="license_no"  id="license_no" class="form-control" placeholder="License No." >
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">Certificate URL 
                                                                                                                </label>
                                                                                                                <input value="<?php echo $certificate['certificate_url']; ?>" type="text" name="certificate_url"  id="certificate_url" class="form-control" placeholder="Certificate URL" >
                                                                                                            </div>  
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">From Date 
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <input value="<?php echo $certificate['fromdate']; ?>" class="form-control" id="yearfromaddctf" name="fromdate" placeholder="MM/YYYY" type="text" onChange="removeerroryearfromaddctf()" required=""/>
                                                                                                                <span id="yearfromaddctf-error" class="error" for="yearfromaddctf">
                                                                                                                </span>
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label for="">To Date
                                                                                                                    <span class="requerd">* 
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                                <input value="<?php echo $certificate['todate']; ?>" class="form-control" id="yeartoaddctf" name="todate" placeholder="MM/YYYY" type="text" onChange="removeerroryeartoaddctf()" required=""/>
                                                                                                                <span id="yeartoaddctf-error" class="error" for="yeartoaddctf">
                                                                                                                </span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <!-- Modal footer -->
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                                                <button type="submit" class="btn btn-danger">Edit</button>
                                                                                            </div>

                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <table class="table table-borderless table-desc">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <span class="h-info">Certificates Authorization</span>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="p-info"><?php echo $certificate['certificate_name']; ?></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <span class="h-info">Start </span>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="p-info"><?php echo $certificate['fromdate']; ?></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <span class="h-info">Expiry </span>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="p-info"><?php echo $certificate['todate']; ?></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <table class="table table-borderless table-desc">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <span class="h-info">License Number </span>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="p-info"><?php echo $certificate['license_no']; ?> </span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <span class="h-info">Certificate URL</span>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="p-info"> <?php echo $certificate['certificate_url']; ?> </span>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>             
                                                                <?php }
                                                                ?>

                                                            <?php } else { ?>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h6 class="text-danger mb-3"><b></b></h6>
                                                                        <p class="p-info line-height-fix">Nothing to Show</p>
                                                                    </div>
                                                                </div>      
                                                            <?php } ?>

                                                        </div>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="theme-card mt-3">
                                                            <div class="row">
                                                                <div class="col-md-12 scrollspy-class">

                                                                    <ul id="scroll-nav" class="scroll-nav list-unstyled">
                                                                        <li class="mt-3 personal-li">
                                                                            <a class="ml-3 personal-a" href="#personal">Personal Details</a>
                                                                        </li>
                                                                        <li class="education-li">
                                                                            <a class="ml-3 education-a" href="#education">Education</a>
                                                                        </li>
                                                                        <li class="experience-li">
                                                                            <a class="ml-3 experience-a" href="#experience">Experience</a>
                                                                        </li>
                                                                        <li class="project-li">
                                                                            <a class="ml-3 project-a" href="#project">Project</a>
                                                                        </li>
                                                                        <li class="certificate-li">
                                                                            <a class="ml-3 certificate-a" href="#certificate">Certificates</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="menu1">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="theme-card p-2 mt-3">

                                                            <div class="row no-gutters">

                                                                <?php
                                                                if ($connectionsF) {
                                                                    foreach ($connectionsF as $val) {
                                                                        $mGetConnectionDetails = $this->users_model->getConnectionByConnectedUserId($val->User_Id);
                                                                        $mFollowers = $this->users_model->get_connections('Connected', $val->User_Id);
                                                                        ?>
                                                                        <div class="col-md-4">
                                                                            <div class="card community-card">
                                                                                <div class="card-content profile-content">
                                                                                    <div class="row p-3">
                                                                                        <div class="col-md-12">
                                                                                            <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/profile-card-back.png'); ?>" />
                                                                                            <?php
                                                                                            $pic = $mGetConnectionDetails->Photo;
                                                                                            if (!empty($pic)) {
                                                                                                ?>
                                                                                                <img class="rounded-circle profile-card-img" src="<?php echo base_url(); ?>assets/photo/<?php echo $val->Photo; ?>" />
                                                                                            <?php } else { ?>
                                                                                                <img class="rounded-circle profile-card-img" src="<?php echo base_url('assets/halaxa_dashboard/images/user-img.png'); ?>" />
                                                                                            <?php } ?>

                                                                                        </div>
                                                                                        <div class="col-md-12 mt-2">
                                                                                            <div class="row">
                                                                                                <div class="col-md-10">
                                                                                                    <h6 class="profile-card-username"><?php echo $mGetConnectionDetails->Name; ?></h6>
                                                                                                </div>
                                                                                                <div class="col-md-2 text-center">
                                                                                                    <a class="profile-card-settings">
                                                                                                        <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/post-settings-icon.png'); ?>" />
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                            <p class="profile-info">
                                                                                                <?php
                                                                                                if (!empty($val->Company_name)) {
                                                                                                    echo $val->Company_name;
                                                                                                } else {
                                                                                                    echo "Not specified";
                                                                                                }
                                                                                                ?>
                                                                                            </p>
                                                                                            <p class="profile-info">
                                                                                                <?php
                                                                                                if (!empty($mFollowers)) {
                                                                                                    echo count($mFollowers);
                                                                                                } else {
                                                                                                    echo "0";
                                                                                                }
                                                                                                ?>
                                                                                                followers
                                                                                            </p>
<!--                                                                                            <a href="<?php echo base_url(); ?>social/update_invitations/Rejected/<?php echo $mGetConnectionDetails['C_ID']; ?>" class="btn btn-community btn-block">Unfollow </a>-->
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>


                                                            </div>
                                                        </div>
                                                    </div></div>
                                            </div>
                                            <div class="tab-pane fade" id="menu2">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="theme-card p-2 mt-3">

                                                            <div class="row no-gutters">

                                                                <?php
                                                                if ($connections) {
                                                                    foreach ($connections as $val) {
                                                                        $mGetConnectionDetails = $this->users_model->getConnectionByConnectedUserId($val->User_Id);
                                                                        $mFollowers = $this->users_model->get_connections('Connected', $val->User_Id);
                                                                        ?> 
                                                                        <div class="col-md-4">
                                                                            <div class="card community-card">
                                                                                <div class="card-content profile-content">
                                                                                    <div class="row p-3">
                                                                                        <div class="col-md-12">
                                                                                            <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/profile-card-back.png'); ?>" />
                                                                                            <?php
                                                                                            $pic = $val->Photo;
                                                                                            if (!empty($pic)) {
                                                                                                ?>
                                                                                                <img class="rounded-circle profile-card-img" src="<?php echo base_url(); ?>assets/photo/<?php echo $val->Photo; ?>" />
                                                                                            <?php } else { ?>
                                                                                                <img class="rounded-circle profile-card-img" src="<?php echo base_url('assets/halaxa_dashboard/images/user-img.png'); ?>" />
                                                                                            <?php } ?>

                                                                                        </div>
                                                                                        <div class="col-md-12 mt-2">
                                                                                            <div class="row">
                                                                                                <div class="col-md-10">
                                                                                                    <h6 class="profile-card-username"><?php echo $val->Name; ?></h6>
                                                                                                </div>
                                                                                                <div class="col-md-2 text-center">
                                                                                                    <a class="profile-card-settings">
                                                                                                        <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/post-settings-icon.png'); ?>" />
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                            <p class="profile-info">
                                                                                                <?php
                                                                                                if (!empty($val->Company_name)) {
                                                                                                    echo $val->Company_name;
                                                                                                } else {
                                                                                                    echo "Not specified";
                                                                                                }
                                                                                                ?>
                                                                                            </p>
                                                                                            <p class="profile-info">
                                                                                                <?php
                                                                                                if (!empty($mFollowers)) {
                                                                                                    echo count($mFollowers);
                                                                                                } else {
                                                                                                    echo "0";
                                                                                                }
                                                                                                ?>
                                                                                                followers
                                                                                            </p>
<!--                                                                                            <a href="<?php echo base_url(); ?>social/update_invitations/Rejected/<?php echo $mGetConnectionDetails['C_ID']; ?>" class="btn btn-community btn-block">Unfollow </a>-->
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="posts">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="row">
                                                            <div class="col-md-9 mx-auto">
                                                                <?php
                                                                if ($posts) {
                                                                    $mSessionUserId = $this->session->userdata('User_Id');
                                                                    foreach ($posts as $val) {
                                                                        //print_r($val);
                                                                        $status = $this->social_model->check_like($val->P_ID, $mSessionUserId);
                                                                        $comments = $this->social_model->get_comments($val->P_ID);
                                                                        if (!empty($comments)) {
                                                                            $mCountComments = count($comments);
                                                                        } else {
                                                                            $mCountComments = "0";
                                                                        }
                                                                        ?>
                                                                        <div class="theme-card mb-3 mt-3">
                                                                            <?php if (!empty($comments)) { ?>
                                                                                <div class="posts-header pt-2 pb-2 pl-3 border-bottom-post">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <a href="#" class="mr-2 no-decoration">
                                                                                                <img class="img-fluid post-time-img-sm" src="<?php echo base_url('assets/halaxa_dashboard/images/post-comment-icon.png'); ?>" />
                                                                                                <span class="post-status-text">commented by </span>
                                                                                                <span class="post-status-text-by">
                                                                                                    <?php echo $comments[0]['Username']; ?>
                                                                                                </span>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php } ?>
                                                                            <div class="posts p-3">
                                                                                <div class="row">
                                                                                    <div class="col-md-1">
                                                                                        <a href="<?php echo base_url(); ?>profile/index/<?php echo $val->Posted_User_Id; ?>"> 
                                                                                            <?php
                                                                                            if (!empty($val->Photo)) {
                                                                                                ?>
                                                                                                <img src="<?php echo base_url(); ?>assets/photo/<?php echo $val->Photo; ?>" class="img-fluid rounded-circle" alt="Avatar">
                                                                                            <?php } else { ?>
                                                                                                <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/images/user.png" />
                                                                                            <?php } ?>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-6 no-padding">
                                                                                        <ul class="list-inline">
                                                                                            <li class="list-inline-item">
                                                                                                <a class="no-decoration" target="_blank" href="<?php echo base_url(); ?>profile/index/<?php echo $val->Posted_User_Id; ?>">
                                                                                                    <p class="post-user-text text-capitalize">
                                                                                                        <?php echo $val->Name; ?>
                                                                                                    </p>
                                                                                                    <p class="post-user-post text-capitalize">
                                                                                                        <?php if ($val->Designation) { ?>
                                                                                                            <?php echo $val->Designation; ?>
                                                                                                        <?php } ?>
                                                                                                    </p>
                                                                                                </a>
                                                                                            </li>
                                                                                            <li class="list-inline-item">
                                                                                                <?php if ($val->Partner_type) { ?>
                                                                                                    <?php if ($val->Designation == "") { ?>
                                                                                                        <img style="margin-bottom: -18px" class="img-fluid post-mark-img-2" src="<?php echo base_url('assets/halaxa_dashboard/images/halaxa-mark-icon.png'); ?>" />
                                                                                                    <?php } else { ?>
                                                                                                        <img class="img-fluid post-mark-img" src="<?php echo base_url('assets/halaxa_dashboard/images/halaxa-mark-icon.png'); ?>" />
                                                                                                    <?php } ?>
                                                                                                <?php } ?>
                                                                                            </li>

                                                                                        </ul>
                                                                                    </div>
                                                                                    <div class="col-md-5 text-right">
                                                                                        <img class="img-fluid post-time-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-time-icon.png'); ?>" />
                                                                                        <span class="post-time-text mr-3">
                                                                                            <?php
                                                                                            $date1 = date('Y-m-d h:i:s');
                                                                                            $date2 = $val->Date_Created;
                                                                                            $seconds = strtotime($date1) - strtotime($date2);
                                                                                            $date = $seconds / 60 / 60;
                                                                                            $date = round($date) . " Hours ago";
                                                                                            if ($date > 24) {
                                                                                                $diff = strtotime($date1, 0) - strtotime($date2, 0);
                                                                                                $date = floor($diff / 604800) . " Weeks ago";
                                                                                            }
                                                                                            ?>
                                                                                            <?php echo $date; ?>
                                                                                        </span>
                                                                                        <?php if ($mSessionUserId == $val->Posted_User_Id) { ?>
                                                                                            <span>
                                                                                                <a href="#" id="dropdownMenuButton" data-toggle="dropdown">
                                                                                                    <img class="img-fluid post-settings-img" src="<?php echo base_url('assets/halaxa_dashboard/images/post-settings-icon.png'); ?>" />
                                                                                                </a>
                                                                                                <div class="dropdown-menu anchor" aria-labelledby="dropdownMenuButton">
                                                                                                    <a class="dropdown-item" href="<?php echo base_url() ?>social/deletePost/<?php echo $val->P_ID; ?>">Delete</a>
                                                                                                </div>
                                                                                            </span>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                    <?php if ($val->Content) { ?>
                                                                                        <div class="col-md-12">
                                                                                            <span class="post-message-text">
                                                                                                <?php
                                                                                                $text = $val->Content;

                                                                                                $url = '@(http)?(s)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
                                                                                                $text = preg_replace($url, '<a href="http$2://$4" target="_blank" title="$0">$0</a>', $text);
                                                                                                echo $text;
                                                                                                ?> 
                                                                                            </span>
                                                                                        </div>
                                                                                    <?php } ?>
                                                                                    <div class="col-md-12 mt-3">
                                                                                        <span class="post-attachment">
                                                                                            <?php if ($val->Image) { ?>
                                                                                                <img class="img-fluid" src="<?php echo base_url(); ?>assets/posts/<?php echo $val->Image; ?>" />
                                                                                            <?php } ?>

                                                                                            <?php if ($val->Video) { ?>
                                                                                                <video width="100%" controls>
                                                                                                    <source src="<?php echo base_url(); ?>assets/posts/<?php echo $val->Video; ?>" >
                                                                                                    Your browser does not support the video tag.
                                                                                                </video>
                                                                                            <?php } ?>

                                                                                            <?php if ($val->Music) { ?>
                                                                                                <audio controls>
                                                                                                    <source src="<?php echo base_url(); ?>assets/posts/<?php echo $val->Music; ?>" >
                                                                                                    Your browser does not support the audio tag.
                                                                                                </audio>
                                                                                            <?php } ?>

                                                                                            <?php if ($val->Link) { ?>
                                                                                                <iframe src="<?php echo base_url(); ?>assets/posts/<?php echo $val->Link; ?>" width="100%" height="400"></iframe>
                                                                                            <?php } ?>
                                                                                        </span>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="coms">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="theme-card p-2 mt-3">
                                                            <div class="row no-gutters">
                                                                <?php if (!empty($myComs)) { ?>
                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($myComs as $my) {
                                                                        $community = $this->association_model->getCommunity($my['Com_key']);
                                                                        $members = $this->association_model->getAllMembers($my['Com_key']);
                                                                        $photo = $community['Photo'];
                                                                        $user = $community['Groupname'];
                                                                        $feeds = $this->association_model->getAllConversationsByPartnerid($my['Com_key']);
                                                                        $photo = base_url('uploads/') . $community['Photo'];
                                                                        if (@getimagesize($photo)) {
                                                                            $photo = $photo;
                                                                        } else {
                                                                            $photo = base_url('assets/images/user.png');
                                                                        }
                                                                        ?>
                                                                        <div class="col-md-6">
                                                                            <div class="card community-card">
                                                                                <div class="card-content community-content">
                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <img class="img-fluid community-img" src="<?php echo $photo; ?>" />
                                                                                        </div>
                                                                                        <div class="col-md-8 no-padding">


                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <p class="community-partner-name"><?php echo $community['Groupname'] ?></p>
                                                                                                    <p class="community-partner-type"><?php echo $community['Partner_type'] . " Partner"; ?></p>
                                                                                                </div>
                                                                                            </div>

                                                                                            <p class="community-desc">
                                                                                                <?php echo $community['group_description'] ?>
                                                                                            </p>

                                                                                            <div class="row">
                                                                                                <div class="col-md-6">
                                                                                                    <?php
                                                                                                    $i = 1;
                                                                                                    foreach (array_slice($members, 0, 4) as $member) {
                                                                                                        $memberData = $this->users_model->get_user_by_id($member['User_Id']);
                                                                                                        $memberPicture = base_url('assets/photo/') . $memberData->Photo;
                                                                                                        if (@getimagesize($memberPicture)) {
                                                                                                            $memberPicture = $memberPicture;
                                                                                                        } else {
                                                                                                            $memberPicture = base_url('assets/images/user.png');
                                                                                                        }
                                                                                                        ?>
                                                                                                        <a target="_blank" href="<?php echo base_url('profile/index/') . $member['User_Id']; ?>">
                                                                                                            <img class="img-fluid rounded-circle community-followers-img" src="<?php echo $memberPicture; ?>" />
                                                                                                        </a>
                                                                                                    <?php }
                                                                                                    ?>  
                                                                                                </div>
                                                                                                <div class="col-md-5">
                                                                                                    <a href="#" class="btn btn-community btn-block">Joined</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>

                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Main -->

    <!-- jQuery  -->
    <?php $this->load->view('social/halaxa_partials/scripts'); ?>

    <script>
        $(document).ready(function () {
            // Add scrollspy to <body>
            $('.personal-block').scrollspy({target: ".scrollspy-class", offset: 130});

            // Add smooth scrolling on all links inside the navbar
            $("#scroll-nav a").on('click', function (event) {
                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function () {
                        // Add hash (#) to URL when done scrolling (default click behavior)
                        if (hash == "#personal") {
                            $('.personal-li').addClass("scroll-nav-active");
                            $('.personal-a').addClass("scroll-nav-active-a");
                            $('.certificate-li').removeClass("scroll-nav-active");
                            $('.certificate-a').removeClass("scroll-nav-active-a");
                            $('.experience-li').removeClass("scroll-nav-active");
                            $('.experience-a').removeClass("scroll-nav-active-a");
                            $('.education-li').removeClass("scroll-nav-active");
                            $('.education-a').removeClass("scroll-nav-active-a");
                        } else if (hash == "#education") {
                            $('.education-li').addClass("scroll-nav-active");
                            $('.education-a').addClass("scroll-nav-active-a");
                            $('.personal-li').removeClass("scroll-nav-active");
                            $('.personal-a').removeClass("scroll-nav-active-a");
                            $('.experience-li').removeClass("scroll-nav-active");
                            $('.experience-a').removeClass("scroll-nav-active-a");
                            $('.certificate-li').removeClass("scroll-nav-active");
                            $('.certificate-a').removeClass("scroll-nav-active-a");
                        } else if (hash == "#experience") {
                            $('.experience-li').addClass("scroll-nav-active");
                            $('.experience-a').addClass("scroll-nav-active-a");
                            $('.personal-li').removeClass("scroll-nav-active");
                            $('.personal-a').removeClass("scroll-nav-active-a");
                            $('.certificate-li').removeClass("scroll-nav-active");
                            $('.certificate-a').removeClass("scroll-nav-active-a");
                        } else if (hash == "#project") {
                            $('.project-li').addClass("scroll-nav-active");
                            $('.project-a').addClass("scroll-nav-active-a");
                            $('.personal-class').removeClass("scroll-nav-active");
                            $('.personal-a').removeClass("scroll-nav-active-a");
                            $('.experience-li').removeClass("scroll-nav-active");
                            $('.experience-a').removeClass("scroll-nav-active-a");
                            $('.certificate-li').removeClass("scroll-nav-active");
                            $('.certificate-a').removeClass("scroll-nav-active-a");
                        } else {
                            $('.certificate-li').addClass("scroll-nav-active");
                            $('.certificate-a').addClass("scroll-nav-active-a");
                            $('.project-li').removeClass("scroll-nav-active");
                            $('.project-a').removeClass("scroll-nav-active-a");
                            $('.personal-class').removeClass("scroll-nav-active");
                            $('.personal-a').removeClass("scroll-nav-active-a");
                            $('.experience-li').removeClass("scroll-nav-active");
                            $('.experience-a').removeClass("scroll-nav-active-a");
                            $('.project-li').removeClass("scroll-nav-active");
                            $('.project-a').removeClass("scroll-nav-active-a");
                        }
                        window.location.hash = hash;

                    });
                }  // End if
            });
        });
    </script>

    <script>
        var loadFileBoth = function (event) {
            var output = document.getElementById('output-img-both');
            output.style.display = 'inline';
            output.src = URL.createObjectURL(event.target.files[0]);
        };
        var loadFileCover = function (event) {
            var output = document.getElementById('output-img-cover');
            output.style.display = 'inline';
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        function ShowCourseToEdit(course, keyName, selected) {
            $.post("<?php echo base_url('profile/getCourseByType'); ?>",
                    {
                        location: course,
                        selection_id: selected,
                        //location: this.value,
                    },
                    function (data, status) {
                        //alert(data);
                        $('#courses_' + keyName).html(data);
                    });
        }

        function ShowStreamToEdit(course, keyName, selected) {
            $.post("<?php echo base_url('profile/getStreamByCourse'); ?>",
                    {
                        location: course,
                        selection_id: selected,
                        //location: this.value,
                    },
                    function (data, status) {
                        $('#subcourses_' + keyName).html(data);
                    });
        }

        function showEditState(country, nothing, selected, keyName) {
            $.post("<?php echo base_url('profile/getStateByCountry'); ?>",
                    {
                        location: country,
                        selection_id: selected,
                        //location: this.value,
                    },
                    function (data, status) {
                        $('#stateAddEdu_' + keyName).html(data);
                    });
        }

        function ShowEditCity(state, nothing, selected, keyName) {
            $.post("<?php echo base_url('profile/getCityByState'); ?>",
                    {
                        location: state,
                        selection_id: selected,
                        //location: this.value,
                    },
                    function (data, status) {
                        $('#cityAddEdu').html(data);
                    });
        }
    </script>
    <script>

        $('#type0').change(function () {
            $.post("<?php echo base_url('profile/getCourseByType'); ?>",
                    {
                        location: this.value,
                    },
                    function (data, status) {
                        $('#courses').html(data);
                    });
        });

        $('#courses').change(function () {
            $.post("<?php echo base_url('profile/getStreamByCourse'); ?>",
                    {
                        location: this.value,
                    },
                    function (data, status) {
                        $('#subcourses').html(data);
                    });
        });

        $('#CountryAddEdu').change(function () {
            $.post("<?php echo base_url('profile/getStateByCountry'); ?>",
                    {
                        location: this.value,
                    },
                    function (data, status) {
                        $('#stateAddEdu').html(data);
                    });
        });

        $('#stateAddEdu').change(function () {
            $.post("<?php echo base_url('profile/getCityByState'); ?>",
                    {
                        location: this.value,
                    },
                    function (data, status) {
                        $('#cityAddEdu').html(data);
                    });
        });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function () {
            readURL(this);
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
    <script>
        $(function () {
            $('#categories').multiselect({
                includeSelectAllOption: true
            });
        });

        $('#categories').change(function () {
            var selectedValues = [];
            $("#categories :selected").each(function () {
                selectedValues.push($(this).val());
            });

            $.post("<?php echo base_url('vendor/home/getSubCatByMulCat/'); ?>",
                    {
                        category: JSON.stringify(selectedValues),
                    },
                    function (data, status) {
                        $('#subcategories').html(data);
                    });
        });
    </script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        }
        )</script>
    <script>
        function isNumberKey(evt, id)
        {
            try {
                var charCode = (evt.which) ? evt.which : event.keyCode;
                if (charCode == 46) {
                    var txt = document.getElementById(id).value;
                    if (!(txt.indexOf(".") > -2)) {
                        return true;
                    }
                }
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            } catch (w) {
                alert(w);
            }
        }
    </script>
    <script>
        // WRITE THE VALIDATION SCRIPT.
        function isNumber(evt) {
            var iKeyCode = (evt.which) ? evt.which : evt.keyCode
            if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
                return false;
            return true;
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
            $(".add-Project").click(function () {
                $(".add4").html("");
                var html = $(".copy-Project").html();
                $(".add4").html(html);
            }
            );
            //here it will remove the current value of the remove button which has been pressed
            $("body").on("click", ".remove", function () {
                console.log('remove click');
                $(this).parents(".control-group").remove();
                //$("#neweducation").remove();
            }
            );
        }
        );
    </script>
    <!-- Include Date Range Picker -->
    <script type="text/javascript">
        function validate_attachment() {
            var attachment_file = document.getElementById("attachment_file").value;
            var idxDot = attachment_file.lastIndexOf(".") + 1;
            var extFile = attachment_file.substr(idxDot, attachment_file.length).toLowerCase();
            if (extFile == "doc" || extFile == "docx" || extFile == "pdf" || extFile == "txt") {
                //TO DO
            } else {
                alert("Only doc,docx and pdf files are allowed!");
                document.getElementById("attachment_file").value = '';
            }
        }
    </script>
    <script>
        function removeerrorsub() {
            document.getElementById('sub0-error').innerHTML = '';
        }
        function removeerrormedium0() {
            document.getElementById('medium0-error').innerHTML = '';
        }
        function removeerroryearto() {
            document.getElementById('yeartoaddexp-error').innerHTML = '';
        }
        function removeerroryearfrom() {
            document.getElementById('yearfromaddexp-error').innerHTML = '';
        }

        function removeerroryeartoeducation() {
            document.getElementById('yeartoaddedu-error').innerHTML = '';
        }
        function removeerroryearformeducation() {
            document.getElementById('yearfromaddedu-error').innerHTML = '';
        }

        function removeerroryearfromaddctf() {
            document.getElementById('yearfromaddctf-error').innerHTML = '';
        }
        function removeerroryeartoaddctf() {
            document.getElementById('yeartoaddctf-error').innerHTML = '';
        }
        function removeerroprojectfrom() {
            document.getElementById('yearfromaddpro-error').innerHTML = '';
        }
        function removeerroprojectto() {
            document.getElementById('yeartoaddpro-error').innerHTML = '';
        }

        function removeerrorcurrentposition() {
            document.getElementById('current_position-error').innerHTML = '';
        }
        function removeerroremplyment_type() {
            document.getElementById('emplyment_type-error').innerHTML = '';
        }
        function removeerrorcurrent_package() {
            document.getElementById('current_package-error').innerHTML = '';
        }
        function removeerrorexpected_package() {
            document.getElementById('expected_package-error').innerHTML = '';
        }
        function removeerrorNationality() {
            document.getElementById('Nationality-error').innerHTML = '';
        }
        function removeerrorcity() {
            document.getElementById('city-error').innerHTML = '';
        }
    </script>
    <!-- End Error remove for create Job Posting Page -->
    <script type="text/javascript">
        $('.to').datepicker({
            autoclose: true,
            minViewMode: 1,
            format: 'mm/yyyy'
        }
        ).on('changeDate', function (selected) {
            FromEndDate = new Date(selected.date.valueOf());
            FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
            $('.from').datepicker('setEndDate', FromEndDate);
        }
        );
    </script>
    <!-- Educational Details Date Start -->
    <script>
        var startDate;
        var FromEndDate;

        // var ToEndDate ;
        // ToEndDate.setDate(ToEndDate.getDate()+365);

        $('#yearfromaddedu').datepicker({

            minViewMode: 1,
            autoclose: true,
            format: 'mm/yyyy'
        })
                .on('changeDate', function (selected) {
                    startDate = new Date(selected.date.valueOf());
                    startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
                    $('#yeartoaddedu').datepicker('setStartDate', startDate);
                });
        $('#yeartoaddedu')
                .datepicker({

                    minViewMode: 1,
                    autoclose: true,
                    format: 'mm/yyyy'
                })
                .on('changeDate', function (selected) {
                    FromEndDate = new Date(selected.date.valueOf());
                    FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
                    $('#yearfromaddedu').datepicker('setEndDate', FromEndDate);
                });


        //Educational Details Date End 
        //Experience Details Date Start

        $('#yearfromaddexp').datepicker({

            minViewMode: 1,
            autoclose: true,
            format: 'mm/yyyy'
        })
                .on('changeDate', function (selected) {
                    startDate = new Date(selected.date.valueOf());
                    startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
                    $('#yeartoaddexp').datepicker('setStartDate', startDate);
                });
        $('#yeartoaddexp')
                .datepicker({

                    minViewMode: 1,
                    autoclose: true,
                    format: 'mm/yyyy'
                })
                .on('changeDate', function (selected) {
                    FromEndDate = new Date(selected.date.valueOf());
                    FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
                    $('#yearfromaddexp').datepicker('setEndDate', FromEndDate);
                });

        // Experience Details Date End 

        // Project Details Date Start


        $('#yearfromaddpro').datepicker({

            minViewMode: 1,
            autoclose: true,
            format: 'mm/yyyy'
        })
                .on('changeDate', function (selected) {
                    startDate = new Date(selected.date.valueOf());
                    startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
                    $('#yeartoaddpro').datepicker('setStartDate', startDate);
                });
        $('#yeartoaddpro')
                .datepicker({

                    minViewMode: 1,
                    autoclose: true,
                    format: 'mm/yyyy'
                })
                .on('changeDate', function (selected) {
                    FromEndDate = new Date(selected.date.valueOf());
                    FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
                    $('#yearfromaddpro').datepicker('setEndDate', FromEndDate);
                });
        // Project Details Date End

        // Certificate Details Date Start 


        // var ToEndDate ;
        // ToEndDate.setDate(ToEndDate.getDate()+365);

        $('#yearfromaddctf').datepicker({

            minViewMode: 1,
            autoclose: true,
            format: 'mm/yyyy'
        })
                .on('changeDate', function (selected) {
                    startDate = new Date(selected.date.valueOf());
                    startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
                    $('#yeartoaddctf').datepicker('setStartDate', startDate);
                });
        $('#yeartoaddctf')
                .datepicker({

                    minViewMode: 1,
                    autoclose: true,
                    format: 'mm/yyyy'
                })
                .on('changeDate', function (selected) {
                    FromEndDate = new Date(selected.date.valueOf());
                    FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
                    $('#yearfromaddctf').datepicker('setEndDate', FromEndDate);
                });
    </script>
    <!-- Certificate Details Date End -->
    <script>
        $(document).ready(function () {
            var date_input = $('input[name="DOB"]');
            //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            }
            )
        }
        )
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
            $(".add-Profile").click(function () {
                $(".add1").html("");
                var html = $(".copy-Profile").html();
                $(".add1").html(html);
            }
            );
            //here it will remove the current value of the remove button which has been pressed
            $("body").on("click", ".remove", function () {
                console.log('remove click');
                $(this).parents(".control-group").remove();
                //$("#neweducation").remove();
            }
            );
        }
        );
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
            $(".add-Education").click(function () {
                $(".add2").html("");
                var html = $(".copy-Education").html();
                $(".add2").html(html);
            }
            );
            //here it will remove the current value of the remove button which has been pressed
            $("body").on("click", ".remove", function () {
                console.log('remove click');
                $(this).parents(".control-group").remove();
                //$("#neweducation").remove();
            }
            );
        }
        );
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
        //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
        $(".add-AddEducation").click(function () {
        var html = $(".copy-AddEducation").html();
                $(".after-add-AddEducation").after(html);
        }
        );
                //here it will remove the current value of the remove button which has been pressed                 $("body").on("click", ".removeAddEducation", function () {
                console.log('remove click');
                $(this).parents(".control-group").remove();
                //$("#neweducation").remove();
        }
        );
        }
        );
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
            $(".add-more").click(function () {
                var html = $(".copy-fields").html();
                $(".after-add-more").after(html);
            }
            );
            //here it will remove the current value of the remove button which has been pressed
            $("body").on("click", ".remove", function () {
                console.log('remove click');
                $(this).parents(".control-group").remove();
                //$("#neweducation").remove();
            }
            );
        }
        );
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
            $(".add-Experience").click(function () {
                $(".add3").html("");
                var html = $(".copy-Experience").html();
                $(".add3").html(html);
            }
            );
            //here it will remove the current value of the remove button which has been pressed    
            $("body").on("click", ".remove", function () {
                console.log('remove click');
                $(this).parents(".control-group").remove();
                //$("#neweducation").remove();
            }
            );
        }
        );
    </script>
</body>

</html>