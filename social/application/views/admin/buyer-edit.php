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
                                    <h3>User Management</h3>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Buyer Details</h2>
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
                                                <?php
                                                $result = $this->session->flashdata('result');
                                                if ($result == NULL) {
                                                    $hidealert = "hide";
                                                    $showalert = "";
                                                } else {
                                                    $showalert = $result;
                                                    $hidealert = "";
                                                }
                                                ?>
                                                <div class="alert alert-success <?php echo $hidealert ?>">
                                                    <?php echo $showalert ?>
                                                </div>
                                                <form id="formThree" class="form-horizontal form-label-left" action="<?php echo base_url('admin/user/updateBuyerUser/') . $userdata->User_Id; ?>" method="post">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input required="" value="<?php echo $userdata->Name; ?>" id="name" name="name" type="text" class="form-control" placeholder="Name">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendorname'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">User Name*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input required="" value="<?php echo $userdata->Username; ?>" id="username" name="username" type="text" class="form-control" placeholder="Username">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendoremail'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <?php
                                                            if ($userdata->Phone) {
                                                                $phone = $userdata->Phone;
                                                                $phonePlaceholder = "";
                                                            } else {
                                                                $phone = "";
                                                                $phonePlaceholder = "Not provided by the user!";
                                                            }
                                                            ?>
                                                            <input required="" value="<?php echo $phone; ?>" id="phone" name="phone" type="text" class="form-control" placeholder="<?php echo $phonePlaceholder; ?>">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendoraddress'); ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input required="" value="<?php echo $userdata->Email; ?>" id="email" name="email" type="text" class="form-control" placeholder="Email">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendoraddress'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Company Name*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input required="" value="<?php echo $userdata->Company_name; ?>" id="cname" name="cname" type="text" class="form-control" placeholder="Company Name">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendoraddress'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Company Brief*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input required="" value="<?php echo $userdata->Company_brief; ?>" id="cbrief" name="cbrief" type="text" class="form-control" placeholder="Company Brief">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendoraddress'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Delivery Address*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input required="" value="<?php echo $userdata->delivery_address; ?>" id="address" name="address" type="text" class="form-control" placeholder="Delivery Address">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendoraddress'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="ln_solid"></div>
                                                    <div class="form-group">
                                                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                            <button type="submit" class="btn btn-success">Update Buyer Details</button>
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
    </body>

</html>