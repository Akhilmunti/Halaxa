<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('buyer/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('buyer/partials/left-nav'); ?>    
                <?php $this->load->view('buyer/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <?php $this->load->view('buyer/partials/searchbar'); ?>
                    <div class="clearfix"></div>
                    <form id="messageForm" method="POST" action="<?php echo base_url() . "buyer/search/sendMessage"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h4>Send Message</h4>
                                    </div>
                                    <div class="x_panel">
                                        <div class="col-md-12 col-sm-12">
                                            <label class="control-label">To :</label>
                                            <?php
                                            if (!empty($vendors)) {
                                                $i = 1;
                                                foreach ($vendors as $vendor) {
                                                    ?>
                                                    <a class="btn btn-dark btn-xs">
                                                        <?php
                                                        $user = $this->users_model->getUser($vendor);
                                                        print_r($user[0]['Name']);
                                                        ?>
                                                    </a>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <a>Something went wrong, Please try again!!</a>
                                            <?php }
                                            ?>
                                            <a></a>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <label class="control-label">To :</label>
                                            <?php
                                            if (!empty($vendors)) {
                                                $i = 1;
                                                foreach ($vendors as $vendor) {
                                                    ?>
                                                    <a class="btn btn-dark btn-xs">
                                                        <?php
                                                        $user = $this->users_model->getUser($vendor);
                                                        print_r($user[0]['Name']);
                                                        ?>
                                                    </a>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <a>Something went wrong, Please try again!!</a>
                                            <?php }
                                            ?>
                                            <a></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- footer content -->
                <?php $this->load->view('buyer/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>

        <?php $this->load->view('buyer/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
        <style>
            .right-float{
                float: right !important
            }
        </style>
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
    </body>

</html>