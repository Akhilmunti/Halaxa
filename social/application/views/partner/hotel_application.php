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
                                    <p>Hotel Application</p>
                                </div>
                            </div>
                            <div class="partner-card-content">
                                <form id="Form" method="POST" action="<?php echo base_url() . "partner/hotel/add_new"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4 partners-form">
                                            <label for="fullname">Property Name * :</label>
                                            <input type="text" id="property_name" class="form-control form-control-sm" name="property_name" required 
                                                   value="<?php echo set_value('property_name'); ?>"/>
                                            <?php if (form_error('property_name')) { ?><span style="color: #E68F8F;"><?php echo form_error('property_name'); ?></span> <?php } ?>

                                            <label for="fullname">Street Address * :</label>
                                            <input type="text" id="hotel_address" class="form-control form-control-sm" name="hotel_address" required 
                                                   value="<?php echo set_value('hotel_address'); ?>"/>
                                            <?php if (form_error('hotel_address')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_address'); ?></span> <?php } ?>
                                            <input type="text" id="hotel_location" class="form-control form-control-sm" name="hotel_location" required 
                                                   value="<?php echo set_value('hotel_location'); ?>"/>
                                            <?php if (form_error('hotel_location')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_location'); ?></span> <?php } ?>

                                            <label for="fullname">Country *:</label>
                                            <input class="form-control form-control-sm" name="hotel_country" id="loc-automplete" list="country">
                                            <datalist id="country">
                                                <option>Choose option</option>
                                                <?php
                                                foreach ($countries as $loc) {
                                                    echo "<option data-value='" . $loc['id'] . "' value='" . $loc['name'] . "'>" . $loc['name'] . "</option>";
                                                }
                                                ?>
                                            </datalist>
                                            <?php if (form_error('hotel_country')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_country'); ?></span> <?php } ?>

                                            <label for="fullname">Region/State *:</label>
                                            <select name="hotel_state" id="state-automplete" class="form-control form-control-sm" required>
                                                <option>Choose option</option>
                                            </select>
                                            <?php if (form_error('hotel_state')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_state'); ?></span> <?php } ?>

                                            <label for="fullname">City *:</label>
                                            <select name="hotel_city" id="city-automplete" class="form-control form-control-sm" required="">
                                                <option>Choose option</option>
                                            </select>
                                            <?php if (form_error('hotel_city')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_city'); ?></span> <?php } ?>

                                            <label for="fullname">Postal code/Zip *:</label>
                                            <input type="number" id="hotel_postal" class="form-control form-control-sm" name="hotel_postal" required 
                                                   value="<?php echo set_value('hotel_postal'); ?>"/>
                                            <?php if (form_error('hotel_postal')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_postal'); ?></span> <?php } ?>



                                            <label for="fullname">Logo *:</label>
                                            <input type="file" id="logo" class="form-control form-control-sm" name="logo" required 
                                                   value="<?php echo set_value('logo'); ?>"/>
                                            <?php if (form_error('logo')) { ?><span style="color: #E68F8F;"><?php echo form_error('logo'); ?></span> <?php } ?>

                                        </div>
                                        <div class="col-md-4 partners-form">
                                            <label for="fullname">Site Rating * :</label>
                                            <select id="hotel_rating" class="form-control form-control-sm" name="hotel_rating" required>
                                                <option value="">Choose..</option>
                                                <option value="1" <?php
                                                if (set_value('hotel_rating') == '1') {
                                                    echo 'selected';
                                                }
                                                ?>>1</option>
                                                <option value="2" <?php
                                                if (set_value('hotel_rating') == '2') {
                                                    echo 'selected';
                                                }
                                                ?>>2</option>
                                                <option value="3" <?php
                                                if (set_value('hotel_rating') == '3') {
                                                    echo 'selected';
                                                }
                                                ?>>3</option>
                                                <option value="4" <?php
                                                if (set_value('hotel_rating') == '4') {
                                                    echo 'selected';
                                                }
                                                ?>>4</option>
                                                <option value="5" <?php
                                                if (set_value('hotel_rating') == '5') {
                                                    echo 'selected';
                                                }
                                                ?>>5</option>
                                            </select>
                                            <?php if (form_error('hotel_rating')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_rating'); ?></span> <?php } ?>

                                            <!--                                            <label for="fullname">Rating Source * :</label>
                                                                                        <select id="hotel_source" class="form-control form-control-sm" name="hotel_source" required>
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
                                            <input type="number" id="hotel_rooms" class="form-control form-control-sm" name="hotel_rooms" required 
                                                   value="<?php echo set_value('hotel_rooms'); ?>"/>
                                            <?php if (form_error('hotel_rooms')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_rooms'); ?></span> <?php } ?>

                                            <label for="fullname">Property type *:</label>
                                            <select id="hotel_type" class="form-control form-control-sm" name="hotel_type" required>
                                                <option value="">Choose..</option>
                                                <option value="1" <?php
                                                if (set_value('hotel_type') == 'Type 1') {
                                                    echo 'selected';
                                                }
                                                ?>>Type 1</option>
                                                <option value="2" <?php
                                                if (set_value('hotel_type') == 'Type 2') {
                                                    echo 'selected';
                                                }
                                                ?>>Type 2</option>
                                            </select>
                                            <?php if (form_error('hotel_type')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_type'); ?></span> <?php } ?>

                                            <label for="fullname">Property website (Optional) :</label>
                                            <input type="text" id="hotel_website" class="form-control form-control-sm" name="hotel_website" 
                                                   value="<?php echo set_value('hotel_website'); ?>"/>
                                            <?php if (form_error('hotel_website')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_website'); ?></span> <?php } ?>

<!--                                            <label for="fullname">Contact Information *: <i>Use the person you want for sign-in and communication during onboarding, if you dont have a fax numbern just enter your phone number</i></label>
                                            <select id="hotel_contact" class="form-control form-control-sm" name="hotel_contact" required>
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
                                            <textarea class="form-control form-control-sm" id="group_description" name="group_description" rows="3" required></textarea>
                                            <?php if (form_error('group_description')) { ?><span style="color: #E68F8F;"><?php echo form_error('group_description'); ?></span> <?php } ?>
                                        </div>
                                        <div class="col-md-4 partners-form">
                                            <label for="fullname">First Name * :</label>
                                            <input type="text" id="hotel_firstname" class="form-control form-control-sm" name="hotel_firstname" 
                                                   value="<?php echo set_value('hotel_firstname'); ?>"/>
                                            <?php if (form_error('hotel_firstname')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_firstname'); ?></span> <?php } ?>

                                            <label for="fullname">Last Name * :</label>
                                            <input type="text" id="hotel_lastname" class="form-control form-control-sm" name="hotel_lastname" 
                                                   value="<?php echo set_value('hotel_lastname'); ?>"/>
                                            <?php if (form_error('hotel_lastname')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_lastname'); ?></span> <?php } ?>

                                            <label for="fullname">Role *:</label>
                                            <select id="hotel_role" class="form-control form-control-sm" name="hotel_role" required>
                                                <option value="">Choose..</option>
                                                <option value="1" <?php
                                                if (set_value('hotel_role') == 'Role 1') {
                                                    echo 'selected';
                                                }
                                                ?>>Role 1</option>
                                                <option value="2" <?php
                                                if (set_value('hotel_role') == 'Role 2') {
                                                    echo 'selected';
                                                }
                                                ?>>Role 2</option>
                                            </select>
                                            <?php if (form_error('hotel_role')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_role'); ?></span> <?php } ?>

                                            <label for="fullname">Email *:</label>
                                            <input type="text" id="hotel_email" class="form-control form-control-sm" name="hotel_email" 
                                                   value="<?php echo set_value('hotel_email'); ?>"/>
                                            <?php if (form_error('hotel_email')) { ?><span style="color: #E68F8F;"><?php echo form_error('hotel_email'); ?></span> <?php } ?>

                                            <label for="fullname">Password *:</label>
                                            <input type="password" id="password" class="form-control form-control-sm" name="password" required value="<?php echo set_value('password'); ?>"/>
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