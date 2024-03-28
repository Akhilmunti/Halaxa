<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('vendor/halaxa_partials/header'); ?>
    <link href="<?php echo base_url(); ?>assets/vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('vendor/halaxa_partials/navbar'); ?>

            <div class="wrapper">

                <?php $this->load->view('vendor/halaxa_partials/sidebar'); ?>

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $this->load->view('vendor/halaxa_partials/alerts'); ?>
                            </div>

                            <div class="col-md-12">
                                <div class="theme-card p-3">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <h4 class="theme-header-text">
                                                <?php echo $product_name; ?> / 
                                                <span class="text-theme">Photo Gallery</span>
                                            </h4>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <form action="<?php echo base_url() . "vendor/photos/addImages/" . $product_id; ?>" class="dropzone"></form>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <h4 class="theme-header-text">
                                                Uploaded Photos
                                            </h4>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <?php
                                                if (!empty($photos)) {
                                                    $i = 1;
                                                    foreach ($photos as $key => $photo) {
                                                        //echo $photo;
                                                        ?>
                                                        <div class="col-md-3">
                                                            <div class="product-img text-right">
                                                                <img src="<?php echo base_url(); ?>user_files/product_images/<?php echo $photo; ?>" class="img-fluid product-img-list" />
                                                                <a title="Delete Image" href="<?php echo base_url('vendor/photos/deleteProductImage/' . $photo . "/" . $product_id); ?>" class="mr-3 no-decoration mt-2 fa fa-trash red"></a>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                <?php }
                                                ?>
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

        <!-- jQuery  -->
        <?php $this->load->view('vendor/halaxa_partials/scripts'); ?>
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script src="<?php echo base_url(); ?>assets/vendors/dropzone/dist/dropzone.js"></script> 

        <script>

            $(".dropzone").dropzone({
                success: function (file, response) {
                    location.reload(true);
                },
                error: function (file, response) {
                    alert("something went wrong, Please try again later.");
                    location.reload(true);
                }
            });

        </script>

    </body>

</html>