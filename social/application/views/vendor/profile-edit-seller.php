<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('vendor/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('vendor/partials/left-nav'); ?>    
                <?php $this->load->view('vendor/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <?php $this->load->view('vendor/partials/searchbar'); ?>
                    <div class="">
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>Profile</h3>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Edit profile</h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">

                                            <form id="formThree" enctype="multipart/form-data" class="form-horizontal form-label-left" action="<?php echo base_url('buyer/profile/edit_save/') . $user->User_Id ?>" method="post">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Name: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input value="<?php echo $user->Name; ?>" name="Name" type="text" class="form-control" placeholder="Name"  >
                                                        <?php if (form_error('name')) { ?>

                                                            <span class="form-error-message text-danger"><?php echo form_error('name'); ?></span>

                                                        <?php } ?>

                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">  Email: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input value="<?php echo $user->Email; ?>" id="" name="Email" type="email" class="form-control" placeholder="Email" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">  Phone: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input value="<?php echo $user->Phone; ?>" id=" phone" name="Phone" type="number" class="form-control" placeholder="Phone">

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">  Address: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input value="<?php echo $user->Address; ?>" id=" address" name="Address" type="text" class="form-control" placeholder="Address">

                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">  Photo: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input value="" id=" address" name="Photo" type="file" />
                                                        <input type="hidden" name="hidden_photo" value="<?php echo $user->Photo; ?>" />

                                                        <img class="blah" src="<?php echo base_url(); ?>assets/photo/<?php echo $user->Photo; ?>" alt="your image" height="200" width="150" />



                                                    </div>
                                                </div>
                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                        <!--  <button type="reset" class="btn btn-primary">Reset</button>-->
                                                        <input type="submit" class="btn btn-success" value="Submit" />
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
                <!-- /page content -->

                <!-- footer content -->
                <?php $this->load->view('vendor/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>

        <?php $this->load->view('vendor/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
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