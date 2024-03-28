<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('vendor/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
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
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Photo Gallery</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <?php
                            $message = $this->session->flashdata('message');
                            if ($message) {
                                ?>
                                <div class="alert alert-success">
                                    <?php echo $message ?>
                                </div>
                            <?php }
                            ?>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Photos Details</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <form action="<?php echo base_url() . "vendor/photos/addImages/" . $product_id; ?>" class="dropzone"></form>
                                        <br />
                                        <br />
                                        <br />
                                        <br />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Uploaded Photos</h2>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="row">
                                            <?php
                                            if (!empty($photos)) {
                                                $i = 1;
                                                foreach ($photos as $key => $photo) {
                                                    echo $photo;
                                                    ?>
                                                    <div class="col-md-3 mb-10">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <img src="<?php echo base_url(); ?>user_files/product_images/<?php echo $photo['images']; ?>" class="img-responsive img-rounded productImage" />
                                                            </div>
                                                            <div class="card-footer text-center">
                                                                <h5><?php echo $photo['images']; ?></h5>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <a href="<?php echo base_url("vendor/photos/deleteImage/"); ?><?php echo $photo['id']; ?>" class="btn btn-dark btn-sm btn-block">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="5">Data not available.</td>
                                                </tr>
                                            <?php }
                                            ?>
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
        <script src="<?php echo base_url(); ?>assets/vendors/dropzone/dist/dropzone.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>

        <script>
            $(function () {
                // Now that the DOM is fully loaded, create the dropzone, and setup the
                // event listeners
                var myDropzone = new Dropzone(".dropzone");
                myDropzone.on("queuecomplete", function (file, res) {
                    if (myDropzone.files[0].status != Dropzone.SUCCESS) {
                        location.reload();
                    } else {
                        location.reload();
                    }
                });
            });
        </script>
    </body>
</html>