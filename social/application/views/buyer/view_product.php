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

                            <div class="col-md-12">
                                <?php //print_r($product); ?>
                                <?php
                                $product = $product[0];
                                $mProductImage = json_decode($product['images_attached']);
                                if (!empty($mProductImage)) {
                                    $img = base_url('user_files/product_images/') . $mProductImage[0];
                                } else {
                                    $img = "https://via.placeholder.com/800x535";
                                }
                                $mPriceStatus = $product['price_status'];
                                $mProductId = $product['id'];
                                ?>
                                <div class="theme-card p-3 user-header-border mb-4">
                                    <div class="row p-4">
                                        <div class="col-md-5">
                                            <div class="simple-gallery">

                                                <img class="maxi img-fluid" src="<?php echo $img; ?>">

                                                <div class="mini">
                                                    <?php
                                                    foreach ($mProductImage as $key => $value) {
                                                        if (!empty($value)) {
                                                            $imgThumb = base_url('user_files/product_images/') . $value;
                                                        } else {
                                                            $imgThumb = "https://via.placeholder.com/800x535";
                                                        }
                                                        ?>
                                                        <img src="<?php echo $imgThumb; ?>">
                                                    <?php } ?>
                                                </div>

                                            </div>                                            
                                        </div>
                                        <div class="col-md-7">
                                            <h5 class="pname">
                                                <?php echo $product['product_name']; ?>  
                                            </h5>
                                            <h6 class="pcname">
                                                <?php echo $company->comapany_name; ?>
                                            </h6>
                                            <div class="row mt-4 mb-4">
                                                <div class="col-md-6">
                                                    <?php if ($mPriceStatus == "0") { ?>
                                                        <span class="pprice">
                                                            <?php echo $product['price']; ?>
                                                            <?php echo $product['currency']; ?>
                                                        </span>
                                                    <?php } else { ?>
                                                        <span class="pprice fa fa-eye-slash"></span> Hidden
                                                    <?php } ?>
                                                    <h6 class="pcname mt-4">
                                                        Tax <?php echo $product['tax'] . " %"; ?>
                                                    </h6>
                                                    <h6 class="pcname">
                                                        MOQ <?php echo $product['moq'] . " pieces"; ?>
                                                    </h6>
                                                    <h6 class="pcname">
                                                        Brand : <?php echo $product['brand']; ?>
                                                    </h6>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-default btn-number btn-number-left" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                                <span class="fa fa-minus"></span>
                                                            </button>
                                                        </span>
                                                        <input type="text" name="quant[1]" class="form-control input-number" value="<?php echo $product['moq']; ?>" min="<?php echo $product['moq']; ?>">
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-number btn-number-right" data-type="plus" data-field="quant[1]">
                                                                <span class="fa fa-plus"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="<?php echo base_url('buyer/rfq/create'); ?>" class="btn-rounded btn-rounded-danger no-decoration">Submit RFQ</a>
                                            <a href="#" data-toggle="modal" data-target="#Modalm" class="btn-rounded btn-rounded-danger no-decoration">Send Mail</a>
                                        </div>

                                        <div class="col-md-12">
                                            <br>
                                            <div>
                                                <h5 class="pdesc">
                                                    Product Description
                                                </h5>
                                                <p>
                                                    <?php echo $product['description']; ?>  
                                                </p>
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

        <div id="Modalm" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content-theme">
                    <div class="modal-header bg-danger">
                        <span class="modal-header-text">Send Mail</span>
                    </div>
                    <form method="POST" action="<?php echo base_url() . "buyer/products/sendMessageToVendor/"; ?><?php echo $mProductId; ?>" enctype="multipart/form-data">
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

        <!-- jQuery  -->
        <?php $this->load->view('buyer/halaxa_partials/scripts'); ?>

        <script>
            $(".mini img").click(function () {
                $(".maxi").attr("src", $(this).attr("src").replace("100x100", "400x400"));
            });

            //plugin bootstrap minus and plus
            $('.btn-number').click(function (e) {
                e.preventDefault();

                fieldName = $(this).attr('data-field');
                type = $(this).attr('data-type');
                var input = $("input[name='" + fieldName + "']");
                var currentVal = parseInt(input.val());
                if (!isNaN(currentVal)) {
                    if (type == 'minus') {

                        if (currentVal > input.attr('min')) {
                            input.val(currentVal - 1).change();
                        }
                        if (parseInt(input.val()) == input.attr('min')) {
                            $(this).attr('disabled', true);
                        }

                    } else if (type == 'plus') {

                        if (currentVal < input.attr('max')) {
                            input.val(currentVal + 1).change();
                        }
                        if (parseInt(input.val()) == input.attr('max')) {
                            $(this).attr('disabled', true);
                        }

                    }
                } else {
                    input.val(0);
                }
            });
            $('.input-number').focusin(function () {
                $(this).data('oldValue', $(this).val());
            });
            $('.input-number').change(function () {

                minValue = parseInt($(this).attr('min'));
                maxValue = parseInt($(this).attr('max'));
                valueCurrent = parseInt($(this).val());

                name = $(this).attr('name');
                if (valueCurrent >= minValue) {
                    $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
                } else {
                    alert('Sorry, the minimum value was reached');
                    $(this).val($(this).data('oldValue'));
                }
                if (valueCurrent <= maxValue) {
                    $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
                } else {
                    alert('Sorry, the maximum value was reached');
                    $(this).val($(this).data('oldValue'));
                }


            });
            $(".input-number").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                        // Allow: Ctrl+A
                                (e.keyCode == 65 && e.ctrlKey === true) ||
                                // Allow: home, end, left, right
                                        (e.keyCode >= 35 && e.keyCode <= 39)) {
                            // let it happen, don't do anything
                            return;
                        }
                        // Ensure that it is a number and stop the keypress
                        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                            e.preventDefault();
                        }
                    });
        </script>

    </body>

</html>