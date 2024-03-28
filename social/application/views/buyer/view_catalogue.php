<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('buyer/halaxa_partials/header'); ?>

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('buyer/halaxa_partials/navbar'); ?>

            <div class="wrapper">

                <?php $this->load->view('buyer/halaxa_partials/sidebar'); ?>

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $this->load->view('buyer/halaxa_partials/alerts'); ?>
                            </div>

                            <div class="col-md-10">
                                <?php //print_r($buyer); ?>
                                <div class="theme-card p-3 user-header-border mb-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="user-header">
                                                <div class="row">
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
                                        <?php if (!empty($mSelectedProducts)) { ?>
                                            <div class="row mb-4">
                                                <div class="col-md-12 mb-3">
                                                    <div class="separator">
                                                        <?php echo $group['group_name']; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <?php
                                                        $count = 0;
                                                        foreach ($mSelectedProducts as $key => $mSelectedProduct) {
                                                            $count++;
                                                            $mProduct = $this->product_model->getProductData($mSelectedProduct);
                                                            if ($mProduct['images_attached']) {
                                                                $img = base_url('user_files/product_images/') . json_decode($mProduct['images_attached'])[0];
                                                            } else {
                                                                $img = base_url('assets/halaxa_buyer/images/product-place.png');
                                                            }
                                                            $mPriceStatus = $mProduct['price_status'];
                                                            $mProductId = $mProduct['id'];
                                                            ?>
                                                            <div class="col-md-3">
                                                                <div class="flip-card">
                                                                    <div class="flip-card-inner">
                                                                        <div class="flip-card-front">
                                                                            <a href="#" class="no-decoration">
                                                                                <div class="product-card">
                                                                                    <div class="product-card-head">
                                                                                        <img class="img-fluid" src="<?php echo $img; ?>" />
                                                                                        <h6 class="product-name">
                                                                                            <?php echo $mProduct['product_name']; ?>
                                                                                        </h6>
                                                                                        <?php if ($mProduct['description']) { ?>
                                                                                            <h6 class="product-desc">
                                                                                                <?php echo $mProduct['description']; ?>
                                                                                            </h6>
                                                                                        <?php } else { ?>
                                                                                            <h6 class="product-desc">
                                                                                                &nbsp;
                                                                                            </h6>
                                                                                        <?php } ?>
                                                                                        <?php if ($mProduct['moq']) { ?>
                                                                                            <h6 class="product-desc">
                                                                                                MOQ <?php echo $mProduct['moq']; ?> pieces
                                                                                            </h6>
                                                                                        <?php } else { ?>
                                                                                            <h6 class="product-desc">
                                                                                                &nbsp;
                                                                                            </h6>
                                                                                        <?php } ?>

                                                                                    </div>
                                                                                    <div class="product-card-bottom">
                                                                                        <?php if ($mPriceStatus == "0") { ?>
                                                                                            <h6 class="product-name">
                                                                                                <?php echo $mProduct['price']; ?>
                                                                                                <?php echo $mProduct['currency']; ?>
                                                                                            </h6>
                                                                                        <?php } else { ?>
                                                                                            <h6 class="product-name">
                                                                                                <span class="fa fa-eye-slash"></span>
                                                                                            </h6>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        <div class="flip-card-back">
                                                                            <div class="product-card">
                                                                                <a href="<?php echo base_url('buyer/products/viewProduct/' . $mProductId); ?>">
                                                                                    <div class="product-card-head">
                                                                                        <img class="img-fluid" src="<?php echo $img; ?>" />
                                                                                        <h6 class="product-name">
                                                                                            <?php echo $mProduct['product_name']; ?>
                                                                                        </h6>
                                                                                        <?php if ($mProduct['description']) { ?>
                                                                                            <h6 class="product-desc">
                                                                                                <?php echo $mProduct['description']; ?>
                                                                                            </h6>
                                                                                        <?php } else { ?>
                                                                                            <h6 class="product-desc">
                                                                                                &nbsp;
                                                                                            </h6>
                                                                                        <?php } ?>
                                                                                        <?php if ($mProduct['moq']) { ?>
                                                                                            <h6 class="product-desc">
                                                                                                MOQ <?php echo $mProduct['moq']; ?> pieces
                                                                                            </h6>
                                                                                        <?php } else { ?>
                                                                                            <h6 class="product-desc">
                                                                                                &nbsp;
                                                                                            </h6>
                                                                                        <?php } ?>
                                                                                    </div> 
                                                                                </a>
                                                                                <div class="product-card-bottom">
                                                                                    <div class="row">
                                                                                        <div class="col-md-6 text-left">
                                                                                            <a data-toggle="modal" data-target="#sendmail_<?php echo $count; ?>" class="product-name" href="#">Send Mail</a>
                                                                                        </div>
                                                                                        <div class="col-md-6 text-right">
                                                                                            <a class="product-name" href="<?php echo base_url('buyer/rfq/create'); ?>">Submit RFQ</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="sendmail_<?php echo $count; ?>" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                    <!-- Modal content-->
                                                                    <div class="modal-content-theme">
                                                                        <div class="modal-header bg-danger">
                                                                            <span class="modal-header-text">Send Mail</span>
                                                                        </div>
                                                                        <form method="POST" action="<?php echo base_url() . "buyer/products/sendMessage/"; ?><?php echo $mProductId; ?>" enctype="multipart/form-data">
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12">
                                                                                        <label class="control-label">Message</label>
                                                                                        <textarea rows="3" required="" name="message" type="text" class="form-control" placeholder="Enter Message"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-info" type="button" class="close" data-dismiss="modal">Cancel</button>
                                                                                <button type="submit" class="btn btn-danger right-float">Send</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery  -->
        <?php $this->load->view('buyer/halaxa_partials/scripts'); ?>

        <script type="text/javascript">
            function search(obj) {
                var searchTerm = obj.value;
                $.post("<?php echo base_url('buyer/products/getSearchedProducts/'); ?>",
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