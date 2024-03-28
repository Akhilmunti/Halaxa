<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('admin/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('admin/partials/left-nav'); ?>    
                <?php $this->load->view('admin/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>Vendor Management</h3>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Edit vendor</h2>
                                                <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                                                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="#">Settings 1</a> </li>
                                                            <li><a href="#">Settings 2</a> </li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <form id="formThree" class="form-horizontal form-label-left" action="<?php echo base_url('admin/vendors/edit/') . $vendoryid; ?>" method="post">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input value="<?php echo $userdata->Name; ?>" id="name" name="name" type="text" class="form-control" placeholder="Name">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendorname'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">User Name*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input value="<?php echo $userdata->Username; ?>" id="username" name="username" type="text" class="form-control" placeholder="Username">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendoremail'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Company Name*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input value="<?php echo $vendordata['comapany_name']; ?>" id="cname" name="cname" type="text" class="form-control" placeholder="Company Name">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendoraddress'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Company Address*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input value="<?php echo $userdata->Address; ?>" id="vendoraddress" name="vendoraddress" type="text" class="form-control" placeholder="Vendor address">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendoraddress'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input value="<?php echo $userdata->Phone; ?>" id="phone" name="phone" type="text" class="form-control" placeholder="Phone">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendoraddress'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input value="<?php echo $userdata->Email; ?>" id="email" name="email" type="text" class="form-control" placeholder="Email">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendoraddress'); ?></span>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Website*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input value="<?php echo $vendordata['website']; ?>" id="brief" name="website" type="text" class="form-control" placeholder="Brief">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendoraddress'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Person*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input value="<?php echo $vendordata['contact_person']; ?>" id="language" name="contact" type="text" class="form-control" placeholder="Language">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendoraddress'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Category*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <select id="categories" name="categories[]" class="form-control" multiple="">
                                                                <?php
                                                                $selectedc = json_decode($vendordata['categories']);
                                                                $found = false;
                                                                foreach ($categories as $key_a => $val_a) {
                                                                    $found = false;
                                                                    foreach ($selectedc as $key_b => $val_b) {
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
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub-Category*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <select name="subcategories[]" id="subcategories" class="form-control" multiple="">
                                                                <?php
                                                                $selected = json_decode($vendordata['scategories']);
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
                                                    <div class="ln_solid"></div>
                                                    <div class="form-group">
                                                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                            <button type="submit" class="btn btn-success">Submit</button>
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
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <?php $this->load->view('admin/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>

        <?php $this->load->view('admin/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
        <script>
            $(document).ready(function () {
                $("#formThree").submit(function (e) {
                    var vendorname = $('#vendorname').val();
                    var vendoremail = $('#vendoremail').val();
                    var vendorphone = $('#vendorphone').val();
                    var vendoraddress = $('#vendoraddress').val();

                    var e1 = false;
                    var e2 = false;
                    var e3 = false;
                    var e4 = false;

                    if (vendorname.length > 0) {
                        $('#vendorname + .form-error-message').html('');
                        e1 = true;
                    } else {
                        $('#vendorname + .form-error-message').html('Please enter valid data.');
                        e1 = false;
                    }
                    if (vendoremail.length > 0) {
                        e2 = true;
                        $('#vendoremail + .form-error-message').html('');
                    } else {
                        e2 = false;
                        $('#vendoremail + .form-error-message').html('Please enter valid data.');
                    }

                    if (vendorphone.length > 0) {
                        e3 = true;
                        $('#vendorphone + .form-error-message').html('');
                    } else {
                        e3 = false;
                        $('#vendorphone + .form-error-message').html('Please enter valid data.');
                    }

                    if (vendoraddress.length > 0) {
                        e4 = true;
                        $('#vendoraddress + .form-error-message').html('');
                    } else {
                        e4 = false;
                        $('#vendoraddress + .form-error-message').html('Please enter valid data.');
                    }
                    return (e1 && e2 && e3 && e4) ? true : false;
                })
            });
        </script>
        <script>
            // Category change event
            $('#categories').change(function () {
                $.post("<?php echo base_url('buyer/rfq/getSubCatByCat/'); ?>",
                        {
                            category: this.value,
                        },
                        function (data, status) {
                            $('#subcategories').html(data);
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
    </body>

</html>