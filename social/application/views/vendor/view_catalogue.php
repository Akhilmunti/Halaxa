<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('vendor/halaxa_partials/header'); ?>

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

                            <div class="col-md-10">
                                <?php //print_r($vendor); ?>
                                <div class="theme-card p-3 user-header-border mb-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="user-header">
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <?php if ($this->session->userdata('Photo')) {
                                                            ?>
                                                            <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/photo/<?php echo $this->session->userdata('Photo'); ?>" alt="">
                                                        <?php } else {
                                                            ?>
                                                            <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>assets/images/user.png" alt="">
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-md-11 mt-1">
                                                        <h6 class="text-theme font-bold"><?php echo $vendor['comapany_name']; ?></h6>
                                                        <h6 class="text-theme font-sm"><?php echo $vendor['company_brief']; ?></h6>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row pt-3 pb-3">
                                                            <div class="col-md-1">
                                                                <p class="text-danger text-vertical"><b>Search</b></p>
                                                            </div>
                                                            <div class="col-md-11">
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                        <input onkeyup="search(this);" id="search" name="product" placeholder="Search" class="form-control form-control-sm form-control-filter" type="text">
                                                                        <span class="fa fa-search iconspan"></span>
                                                                    </div>
                                                                    <div class="col-md-7 text-right">
                                                                        <a title="Message Buyer" href="#" class="mr-3 no-decoration">
                                                                            <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/menu-icon.png'); ?>" />
                                                                        </a>
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

                                <div id="products-div">
                                    <?php
                                    foreach ($groups as $key => $group) {
                                        $mSelectedProducts = json_decode($group['selected_products']);
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="separator">
                                                    <?php echo $group['group_name']; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <?php
                                                    foreach ($mSelectedProducts as $key => $mSelectedProduct) {
                                                        $mProduct = $this->product_model->getProductData($mSelectedProduct);
                                                        if ($mProduct['images_attached']) {
                                                            $img = base_url('user_files/product_images/') . json_decode($mProduct['images_attached'])[0];
                                                        } else {
                                                            $img = base_url('assets/halaxa_buyer/images/product-place.png');
                                                        }
                                                        ?>
                                                        <div class="col-md-3">
                                                            <a href="#" class="no-decoration">
                                                                <div class="product-card">
                                                                    <div class="product-card-head">
                                                                        <img class="img-fluid" src="<?php echo $img; ?>" />
                                                                        <h6 class="product-name">
                                                                            <?php echo $mProduct['product_name']; ?>
                                                                        </h6>
                                                                        <h6 class="product-desc">
                                                                            <?php echo $mProduct['description']; ?>
                                                                        </h6>
                                                                        <h6 class="product-desc">
                                                                            MOQ <?php echo $mProduct['moq']; ?> pieces
                                                                        </h6>
                                                                    </div>
                                                                    <div class="product-card-bottom">
                                                                        <h6 class="product-name">
                                                                            <?php echo $mProduct['price']; ?>
                                                                            <?php echo $mProduct['currency']; ?>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery  -->
        <?php $this->load->view('vendor/halaxa_partials/scripts'); ?>

        <script type="text/javascript">
            function search(obj) {
                var searchTerm = obj.value;
                $.post("<?php echo base_url('vendor/products/getSearchedProducts/'); ?>",
                        {
                            search: searchTerm,
                        },
                        function (data, status) {
                            $('#products-div').html(data);
                        });
            }
        </script>

    </body>

</html>