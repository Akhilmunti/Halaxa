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
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $alert = $this->session->flashdata('result');
                            if ($alert == NULL) {
                                $hidealert = "hide";
                            } else {
                                $showalert = $alert;
                                $hidealert = "";
                            }
                            ?>
                            <div class="alert alert-success <?php echo $hidealert ?>">
                                <?php echo $showalert ?>
                            </div>
                            <?php $productData = $product[0]; ?>
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2 class="text-uppercase">
                                        <?php
                                        $company = $this->users_model->get_vendor_details($productData['V_Id']);
                                        print_r($company->comapany_name);
                                        ?>
                                    </h2>
                                    (<i>
                                        <?php
                                        $user = $this->users_model->getUser($productData['V_Id']);
                                        print_r($user[0]['Name']);
                                        ?>
                                    </i>)
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <?php
                                            $image = json_decode($productData['images_attached']);
                                            if (!empty($image)) {
                                                $imageId = array_values($image)[0];
                                            }
                                            ?>
                                            <?php
                                            if (!empty($imageId)) {
                                                ?>
                                                <img style="height: 250px !important;width: 100%" src="<?php echo base_url(); ?>user_files/product_images/<?php
                                                $imageData = $this->product_model->getProductImagesByid($imageId);
                                                print_r($imageData[0]['images']);
                                                ?>" alt="..." class="img-rounded img-responsive">
                                                 <?php } else { ?>
                                                <img style="height: 250px !important;width: 100%" src="<?php echo base_url(); ?>/assets/images/favi.jpg" alt="..." class="img-rounded img-responsive">
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-7">
                                            <h3 class="text-uppercase">
                                                <?php echo $productData['product_name']; ?>
                                            </h3>
                                            <h5>
                                                Category : <?php echo $productData['category']; ?>
                                            </h5>
                                            <h5>
                                                Sub-Category : <?php echo $productData['subcategory']; ?>
                                            </h5>
                                            <h5>
                                                Brand : <?php echo $productData['brand']; ?>
                                            </h5>
                                            <h5>
                                                <?php
                                                $priceStatus = $productData['price_status'];
                                                if ($priceStatus == "1") {
                                                    ?>
                                                    Price : <a class="label label-danger">Hidden <span class="glyphicon glyphicon-eye-close"></span></a>
                                                <?php } else { ?>
                                                    Price : <?php echo $productData['price']; ?> <i>per <?php echo $productData['uom']; ?></i>
                                                <?php } ?>
                                            </h5>
                                            <h5>Description : <?php echo $productData['description']; ?></h5>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="btn btn-dark btn-block" data-toggle="collapse" data-target="#client">Clientele</a>
                                            <div id="client" class="collapse">
                                                <?php
                                                $clientsResult = $this->product_model->getClientsByVendor($productData['V_Id']);
                                                ?>
                                                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl No</th>
                                                            <th>Client Name</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $counter = 0;
                                                        if (!empty($clientsResult)) {
                                                            foreach ($clientsResult as $key => $client) {
                                                                $counter++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $counter; ?></td>
                                                                    <td>
                                                                        <?php echo $client['client_name']; ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <td colspan="3">Clientele Empty !!</td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <a class="btn btn-dark btn-block" data-toggle="modal" data-target="#Modalm">Send Mail</a>
                                            <!-- Modal -->
                                            <div id="Modalm" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Send Message</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="<?php echo base_url() . "buyer/search/sendMessage/"; ?><?php echo $productData['id']; ?>" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <label class="control-label">Message</label>
                                                                        <textarea rows="3" required="" name="message" type="text" class="form-control" placeholder="Enter Message"></textarea>
                                                                    </div>
                                                                    <br>
                                                                    <div class="col-md-2">
                                                                        <button type="submit" class="btn btn-sm btn-dark btn-block">Send Mail</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <a target="_blank" href="<?php echo base_url(); ?>profile/index/<?php echo $productData['V_Id']; ?>" class="btn btn-dark btn-block">View Vendor Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /page content -->
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