<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo PROJECT_NAME; ?> | Partner</title>
        <meta content="<?php echo PROJECT_NAME; ?>" name="description" />
        <meta content="<?php echo PROJECT_NAME; ?>" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/halaxa/images/favicon.png">

        <link href="<?php echo base_url(); ?>assets/halaxa/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/halaxa/halaxa-partner.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body class="bg-section">
        <!-- Main -->
        <div class="main">
            <section>
                <div class="header">
                    <nav class="navbar navbar-expand-lg bg-1 text-white navbar-dark">
                        <div class="container">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <a class="navbar-brand text-white" href="#">
                                <img height="30" src="<?php echo base_url('assets/halaxa/images/partner-logo.png'); ?>" />
                            </a>
                            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                <ul class="navbar-nav ml-auto mt-2 mt-lg-0 nav-theme-li">
                                    <li class="nav-item">
                                        <a target="_blank" href="<?= base_url("partner/home/signIn"); ?>" class="no-decoration btn btn-white font-bold my-2 my-sm-0 mr-3" type="submit">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a target="_blank" href="<?= base_url("partner/apply"); ?>" class="no-decoration btn btn-white font-bold my-2 my-sm-0 mr-3" type="submit">Apply</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </section>

            <section class="mt-5 mb-5">
                <div class="container">
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
                        <div class="col-md-12">
                            <div class="partner-card">
                                <div class="partner-card-header">
                                    <p>School Application</p>
                                </div>
                            </div>
                            <div class="partner-card-content">
                                <form id="Form" method="POST" action="<?php echo base_url() . "partner/school/add_new"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4 partners-form">
                                            <div class="title">
                                                <h4>Address</h4>
                                            </div>
                                            <label for="fullname">School Name * :</label>
                                            <input type="text" id="school_name" class="form-control form-control-sm" name="school_name" required value="<?php echo set_value('school_name'); ?>"/>
                                            <?php if (form_error('school_name')) { ?><span style="color: #E68F8F;"><?php echo form_error('school_name'); ?></span> <?php } ?>
                                            <label for="address">Street Address * :</label>
                                            <input type="text" id="school_address" class="form-control form-control-sm" placeholder="Address" name="school_address" required value="<?php echo set_value('school_address'); ?>"/>
                                            <?php if (form_error('school_address')) { ?><span style="color: #E68F8F;"><?php echo form_error('school_address'); ?></span> <?php } ?>
                                            <input type="text" id="school_location" placeholder="Location" class="form-control form-control-sm" name="school_location" required value="<?php echo set_value('school_location'); ?>"/>
                                            <?php if (form_error('school_location')) { ?><span style="color: #E68F8F;"><?php echo form_error('school_location'); ?></span> <?php } ?>
                                            <label for="fullname">Country *:</label>
                                            <input class="form-control form-control-sm" name="country" id="loc-automplete" list="country">
                                            <datalist id="country">
                                                <option>Choose option</option>
                                                <?php
                                                foreach ($countries as $loc) {
                                                    echo "<option data-value='" . $loc['id'] . "' value='" . $loc['name'] . "'>" . $loc['name'] . "</option>";
                                                }
                                                ?>
                                            </datalist>
                                            <?php if (form_error('country')) { ?><span style="color: #E68F8F;"><?php echo form_error('country'); ?></span> <?php } ?>
                                            <label for="fullname">Region/State *:</label>
                                            <select name="state" id="state-automplete" class="form-control form-control-sm" required>
                                                <option>Choose option</option>
                                            </select>
                                            <?php if (form_error('state')) { ?><span style="color: #E68F8F;"><?php echo form_error('state'); ?></span> <?php } ?>
                                            <label for="fullname">City *:</label>
                                            <select name="city" id="city-automplete" class="form-control form-control-sm" required="">
                                                <option>Choose option</option>
                                            </select>
                                            <?php if (form_error('city')) { ?><span style="color: #E68F8F;"><?php echo form_error('city'); ?></span> <?php } ?>
                                            <label for="fullname">Postal code/Zip *:</label>
                                            <input type="number" id="pincode" class="form-control form-control-sm" name="pincode" required value="<?php echo set_value('pincode'); ?>"/>
                                            <?php if (form_error('pincode')) { ?><span style="color: #E68F8F;"><?php echo form_error('pincode'); ?></span> <?php } ?>
                                        </div>
                                        <div class="col-md-4 partners-form">
                                            <div class="title">
                                                <h4>Data</h4>
                                            </div>
                                            <label for="fullname">School website (Optional) :</label>
                                            <input type="text" id="website" class="form-control form-control-sm" name="website" value="<?php echo set_value('website'); ?>"/>
                                            <?php if (form_error('website')) { ?><span style="color: #E68F8F;"><?php echo form_error('website'); ?></span> <?php } ?>
                                            <label for="fullname">School Video (Hyperlink) *:</label>
                                            <input type="text" id="hyperlink" class="form-control form-control-sm" name="hyperlink" required value="<?php echo set_value('hyperlink'); ?>"/>
                                            <?php if (form_error('hyperlink')) { ?><span style="color: #E68F8F;"><?php echo form_error('hyperlink'); ?></span> <?php } ?>
                                            <label for="fullname">School Overview *:</label>
                                            <input type="text" id="overview" class="form-control form-control-sm" name="overview" required value="<?php echo set_value('overview'); ?>"/>
                                            <?php if (form_error('overview')) { ?><span style="color: #E68F8F;"><?php echo form_error('overview'); ?></span> <?php } ?>
                                            <label for="fullname">Number of students (More than) *:</label>
                                            <input type="text" id="no_of_students" class="form-control form-control-sm" name="no_of_students" required value="<?php echo set_value('no_of_students'); ?>"/>
                                            <?php if (form_error('no_of_students')) { ?><span style="color: #E68F8F;"><?php echo form_error('no_of_students'); ?></span> <?php } ?>
                                            <label for="fullname">Logo *:</label>
                                            <input type="file"  class="form-control form-control-sm" accept=".png, .jpg, .jpeg" id="school_logo" name="school_logo"  required />
                                            <label for="fullname">Profile *:</label>
                                            <input type="file"  class="form-control form-control-sm" accept=".png, .jpg, .jpeg" id="school_profile" name="school_profile"  required />
                                            <label for="fullname">Group Description *:</label>
                                            <textarea maxlength="350" class="form-control form-control-sm" id="group_description" name="group_description" rows="3" required></textarea>
                                            <?php if (form_error('group_description')) { ?><span style="color: #E68F8F;"><?php echo form_error('group_description'); ?></span> <?php } ?>
                                        </div>
                                        <div class="col-md-4 partners-form">
                                            <div class="title">
                                                <h4>Contact person</h4>
                                            </div>
                                            <label for="fullname">Salutation * :</label>
                                            <select id="salutation" class="form-control form-control-sm" name="salutation" required>
                                                <option value="">Choose..</option>
                                                <option value="Mr" <?php
                                                if (set_value('salutation') == 'Mr') {
                                                    echo 'selected';
                                                }
                                                ?>>Mr</option>
                                                <option value="Mrs" <?php
                                                if (set_value('salutation') == 'Mrs') {
                                                    echo 'selected';
                                                }
                                                ?>>Mrs</option>
                                                <option value="Miss" <?php
                                                if (set_value('salutation') == 'Miss') {
                                                    echo 'selected';
                                                }
                                                ?>>Miss</option>
                                                <option value="Master" <?php
                                                if (set_value('salutation') == 'Master') {
                                                    echo 'selected';
                                                }
                                                ?>>Master</option>
                                                <option value="Other" <?php
                                                if (set_value('salutation') == 'Other') {
                                                    echo 'selected';
                                                }
                                                ?>>Other</option>
                                            </select>
                                            <?php if (form_error('salutation')) { ?><span style="color: #E68F8F;"><?php echo form_error('salutation'); ?></span> <?php } ?>
                                            <label for="fullname">First Name * :</label>
                                            <input type="text" id="first_name" class="form-control form-control-sm" name="first_name" required value="<?php echo set_value('first_name'); ?>"/>
                                            <?php if (form_error('first_name')) { ?><span style="color: #E68F8F;"><?php echo form_error('first_name'); ?></span> <?php } ?>
                                            <label for="fullname">Last Name * :</label>
                                            <input type="text" id="last_name" class="form-control form-control-sm" name="last_name" required value="<?php echo set_value('last_name'); ?>"/>
                                            <?php if (form_error('last_name')) { ?><span style="color: #E68F8F;"><?php echo form_error('last_name'); ?></span> <?php } ?>
                                            <label for="fullname">Role *:</label>
                                            <select id="role" name="role" class="form-control form-control-sm" required>
                                                <option value="">Choose..</option>
                                                <option value="director" <?php
                                                if (set_value('role') == 'director') {
                                                    echo 'selected';
                                                }
                                                ?>>Director</option>
                                                <option value="dean" <?php
                                                if (set_value('role') == 'dean') {
                                                    echo 'selected';
                                                }
                                                ?>>Dean</option>
                                                <option value="principal" <?php
                                                if (set_value('role') == 'principal') {
                                                    echo 'selected';
                                                }
                                                ?>>Principal</option>
                                                <option value="hod" <?php
                                                if (set_value('role') == 'hod') {
                                                    echo 'selected';
                                                }
                                                ?>>HOD</option>
                                                <option value="other" <?php
                                                if (set_value('role') == 'other') {
                                                    echo 'selected';
                                                }
                                                ?>>Others</option>
                                            </select>
                                            <?php if (form_error('role')) { ?><span style="color: #E68F8F;"><?php echo form_error('role'); ?></span> <?php } ?>
                                            <label for="fullname">Email *:</label>
                                            <input type="email" id="email_id" class="form-control form-control-sm" name="email_id" required="" value="<?php echo set_value('email_id'); ?>"/>
                                            <?php if (form_error('email_id')) { ?><span style="color: #E68F8F;"><?php echo form_error('email_id'); ?></span> <?php } ?>
                                            <label for="fullname">Password *:</label>
                                            <input type="password" id="password" class="form-control form-control-sm" name="password" required="" value="<?php echo set_value('password'); ?>"/>
                                            <?php if (form_error('password')) { ?><span style="color: #E68F8F;"><?php echo form_error('password'); ?></span> <?php } ?>
                                            <label for="fullname">Confirm Password *:</label>
                                            <input type="password" id="confirm_password" class="form-control form-control-sm" name="confirm_password" required value="<?php echo set_value('confirm_password'); ?>"/>
                                            <?php if (form_error('confirm_password')) { ?><span style="color: #E68F8F;"><?php echo form_error('confirm_password'); ?></span> <?php } ?>
                                            <label for="fullname">Phone *:</label>
                                            <div class="clearfix"></div>
                                            <div class="row">
                                                <div class="col-md-4 no-padding">
                                                    <select id="contact_type" name="contact_type" class="form-control form-control-sm" required>
                                                        <option value="">Choose..</option>
                                                        <option value="mobile"  <?php
                                                        if (set_value('contact_type') == 'mobile') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Mobile</option>
                                                        <option value="office"  <?php
                                                        if (set_value('contact_type') == 'office') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Office</option>
                                                        <option value="home"  <?php
                                                        if (set_value('contact_type') == 'home') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Home</option>
                                                    </select>
                                                </div>
                                                <?php if (form_error('contact_type')) { ?><span style="color: #E68F8F;"><?php echo form_error('contact_type'); ?></span> <?php } ?>
                                                <div class="col-md-4">
                                                    <input type="number" placeholder="Area code" id="area_code" class="form-control form-control-sm" name="area_code" required value="<?php echo set_value('area_code'); ?>"/>
                                                    <?php if (form_error('area_code')) { ?><span style="color: #E68F8F;"><?php echo form_error('area_code'); ?></span> <?php } ?>
                                                </div>
                                                <div class="col-md-4 no-padding">
                                                    <input type="number" placeholder="Number" id="contact" class="form-control form-control-sm" name="contact" required value="<?php echo set_value('contact'); ?>"/>
                                                    <?php if (form_error('contact')) { ?><span style="color: #E68F8F;"><?php echo form_error('contact'); ?></span> <?php } ?>
                                                </div>
                                            </div>
                                            <label for="fullname">Fax :</label>
                                            <div class="clearfix"></div>
                                            <div class="row">
                                                <div class="col-md-4 no-padding">
                                                    <select id="fax_type" name="fax_type" class="form-control form-control-sm">
                                                        <option value="">Choose..</option>
                                                        <option value="fax1"  <?php
                                                        if (set_value('fax_type') == 'fax1') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fax-1</option>
                                                        <option value="fax2"  <?php
                                                        if (set_value('fax_type') == 'fax2') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fax-2</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" placeholder="Area code" id="fax_area_code" class="form-control form-control-sm" name="fax_area_code" value="<?php echo set_value('fax_area_code'); ?>"/>
                                                    <?php if (form_error('fax_area_code')) { ?><span style="color: #E68F8F;"><?php echo form_error('fax_area_code'); ?></span> <?php } ?>
                                                </div>
                                                <div class="col-md-4 no-padding">
                                                    <input type="number" placeholder="Number" id="fax_contact" class="form-control form-control-sm" name="fax_contact" value="<?php echo set_value('fax_contact'); ?>"/>
                                                    <?php if (form_error('fax_contact')) { ?><span style="color: #E68F8F;"><?php echo form_error('fax_contact'); ?></span> <?php } ?>
                                                </div>
                                            </div>
                                            <br>
                                            <label for="fullname">Best Day to contact you *:</label>
                                            <input type="checkbox" class="flat" name="best_day[]" id="best_day" value="Monday" 
                                            <?php
                                            if (set_value('best_day') == 'Monday') {
                                                echo 'checked';
                                            }
                                            ?>/>
                                            Monday
                                            <input type="checkbox" class="flat" name="best_day[]" id="best_day" value="Tuesday" 
                                            <?php
                                            if (set_value('best_day') == 'Tuesday') {
                                                echo 'checked';
                                            }
                                            ?>/>
                                            Tuesday
                                            <input type="checkbox" class="flat" name="best_day[]" id="best_day" value="Wednesday" 
                                            <?php
                                            if (set_value('best_day') == 'Wednesday') {
                                                echo 'checked';
                                            }
                                            ?>/>
                                            Wednesday
                                            <input type="checkbox" class="flat" name="best_day[]" id="best_day" value="Thursday" 
                                            <?php
                                            if (set_value('best_day') == 'Thursday') {
                                                echo 'checked';
                                            }
                                            ?>/>
                                            Thursday
                                            <input type="checkbox" class="flat" name="best_day[]" id="best_day" value="Friday" 
                                            <?php
                                            if (set_value('best_day') == 'Friday') {
                                                echo 'checked';
                                            }
                                            ?>/>
                                            Friday
                                            <input type="checkbox" class="flat" name="best_day[]" id="best_day" value="Saturday" 
                                            <?php
                                            if (set_value('best_day') == 'Saturday') {
                                                echo 'checked';
                                            }
                                            ?>/>
                                            Saturday <br>
                                            <?php if (form_error('best_day')) { ?><span style="color: #E68F8F;"><?php echo form_error('best_day'); ?></span> <?php } ?>
                                            <br>
                                            <label for="fullname">Best time to contact you *:</label>
                                            <input type="checkbox" class="flat" name="best_time[]" id="best_time" value="Morning" 
                                            <?php
                                            if (set_value('best_time') == 'Morning') {
                                                echo 'checked';
                                            }
                                            ?>/>
                                            Morning
                                            <input type="checkbox" class="flat" name="best_time[]" id="best_time" value="Afternoon" 
                                            <?php
                                            if (set_value('best_time') == 'Afternoon') {
                                                echo 'checked';
                                            }
                                            ?>/>
                                            Afternoon
                                            <input type="checkbox" class="flat" name="best_time[]" id="best_time" value="Evening" 
                                            <?php
                                            if (set_value('best_time') == 'Evening') {
                                                echo 'checked';
                                            }
                                            ?>/>
                                            Evening <br>
                                            <?php if (form_error('best_time')) { ?><span style="color: #E68F8F;"><?php echo form_error('best_time'); ?></span> <?php } ?>
                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                        <div class="col-md-3 mx-auto">
                                            <input type="submit" value="Submit" class="btn btn-sm btn-dark btn-block">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- End Main -->

        <!-- jQuery  -->
        <?php $this->load->view('partner/partials/assets-footer'); ?>
        <script>
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
                        });
            });
        </script>

    </body>

</html>