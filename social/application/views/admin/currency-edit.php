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
                                    <h3>Currency Management</h3>
                                </div>
                                <div class="title_right">
                                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search for...">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button">Go!</button>
                                            </span> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Edit Currency</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <form id="formTwo" class="form-horizontal form-label-left" action="<?php echo base_url('admin/currency/edit/') . $currencyid; ?>" method="post">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Currency Name*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input value="<?php echo $currencydata['currency']; ?>" id="currency" name="currency" type="text" class="form-control" placeholder="currency Name">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('currency'); ?></span>
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
                $("#formTwo").submit(function (e) {
                    var uomname = $('#uomname').val();
                    if (uomname.length > 0) {
                        $('#uomname + .form-error-message').html('');
                        return true;
                    } else {
                        $('#uomname + .form-error-message').html('Please enter valid data.');
                        return false;
                    }
                })
            });
        </script>
    </body>

</html>