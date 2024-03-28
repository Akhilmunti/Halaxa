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

                            <div class="col-md-12">
                                <div class="theme-card p-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="theme-header-text">List Products</h4>
                                        </div>
                                        <div class="col-md-12">
                                            <form method="POST" action="<?php echo base_url('vendor/products/manageProducts'); ?>">
                                                <div class="row pt-3 pb-3">
                                                    <div class="col-md-1">
                                                        <img width="15" class="text-vertical" src='<?php echo base_url('assets/halaxa_buyer/images/filter-icon.png'); ?>'>
                                                        <p class="text-danger text-vertical"><b>Filter : </b></p>
                                                    </div>
                                                    <div class="col-md-11">
                                                        <div class="row">
                                                            <div class="col-md-3 no-padding-filter">
                                                                <input name="name" placeholder="Product Name" class="form-control form-control-sm form-control-filter" type="text">
                                                                <span class="fa fa-search iconspan"></span>
                                                            </div>
                                                            <div class="col-md-3 no-padding-filter">
                                                                <select class="form-control form-control-sm form-control-filter" name="currency">
                                                                    <option selected="" value="" disabled="">Currency</option>
                                                                    <?php
                                                                    foreach ($currencies as $key => $currency) {
                                                                        echo "<option value='" . $currency['currency'] . "'>" . $currency['currency'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <span class="fa fa-caret-down iconspan"></span>
                                                            </div>
                                                            <div class="col-md-3 no-padding-filter">
                                                                <select class="form-control form-control-sm form-control-filter" name="uom">
                                                                    <option selected="" value="" disabled="">UOM</option>
                                                                    <?php
                                                                    foreach ($uoms as $key => $uom) {
                                                                        echo "<option value='" . $uom['Uom'] . "'>" . $uom['Uom'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <span class="fa fa-caret-down iconspan"></span>
                                                            </div>
                                                            <div class="col-md-2 offset-1">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <a href="<?php echo base_url('vendor/products/manageProducts'); ?>"><b class="font-size-11 p-info">Clear</b></a>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-check mr-2"></i>Apply</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <form method="POST" action="<?php echo base_url('vendor/products/operateProducts'); ?>">
                                        <div class="row">
                                            <div class="col-md-2 offset-10">
                                                <select onchange="this.form.submit()" name="operateProducts" class="form-control form-control-sm form-control-filter">
                                                    <option selected="" disabled="" value="">Group Action</option>
                                                    <option value="1">Delete</option>
                                                    <option value="2">Hide</option>
                                                    <option value="3">Unhide</option>
                                                    <option value="4">Display Price</option>
                                                    <option value="5">Hide Price</option>
                                                    <option value="6">Update Product</option>
                                                </select>
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                            <div class="col-md-12">
                                                <table class="table table-borderless table-filter">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input rfq-checkbox" id="select_all_rfqs">
                                                                    <label class="custom-control-label" for="select_all_rfqs"></label>
                                                                </div>
                                                            </th>
                                                            <th>Product Name</th>
                                                            <th>Catagory</th>
                                                            <th>Brand</th>
                                                            <th>MOQ</th>
                                                            <th>Description</th>
                                                            <th>Unit Price</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if (!empty($products)) {
                                                            $count = 0;
                                                            foreach ($products as $key => $product) {
                                                                $count++;
                                                                //print_r($product);
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input name="select_product[]" value="<?= $product['id'] ?>" type="checkbox" class="custom-control-input rfq-checkbox" id="select_product_<?php echo $count; ?>">
                                                                            <label class="custom-control-label" for="select_product_<?php echo $count; ?>"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <p class="table-p text-theme">
                                                                            <?php
                                                                            echo $product["product_name"];
                                                                            ?>
                                                                            <?php if ($product['status_hide'] == 1) { ?>
                                                                                <br>
                                                                                <span class="font-sm hidden-text">
                                                                                    Hidden
                                                                                </span>
                                                                            <?php } ?>
                                                                        </p>

                                                                    </td>
                                                                    <td class=" ">
                                                                        <p class="table-p text-theme">
                                                                            <?php
                                                                            echo $product["category"] . ", " . $product["subcategory"];
                                                                            ?>
                                                                        </p>
                                                                    </td>
                                                                    <td class=" ">
                                                                        <p class="table-p text-theme">
                                                                            <?php
                                                                            echo $product["brand"];
                                                                            ?>
                                                                        </p>
                                                                    </td>
                                                                    <td style="width: 90px">
                                                                        <input name="moq[<?= $product["id"] ?>]" class="form-control form-control-table-price" value="<?= $product["moq"] ?>" type="text"/>
                                                                    </td>
                                                                    <td>
                                                                        <p class="table-p text-theme">
                                                                            <?php
                                                                            echo $product["description"];
                                                                            ?>
                                                                        </p>  
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        $priceStatus = $product["price_status"];
                                                                        if ($priceStatus == "0") {
                                                                            $statusEye = "fa-eye";
                                                                        } else {
                                                                            $statusEye = "fa-eye-slash red";
                                                                        }
                                                                        ?>
                                                                        <div class="input-group">
                                                                            <div class="input-group-append">
                                                                                <a class="fa <?php echo $statusEye; ?> mt-2 mr-2 font-bold text-theme"></a>
                                                                                <button class="btn btn-light text-theme"><?= $product["currency"] ?></button>
                                                                            </div>
                                                                            <input style="width: 30px" name="price[<?= $product["id"] ?>]" id="price[]" class="form-control form-control-table-price" value="<?= $product["price"] ?>" type="text"/>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <a data-toggle="modal" data-target="#read_<?php echo $count; ?>" title="Edit Product" href="#" class="mr-3 no-decoration">
                                                                            <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/pencil-icon.png'); ?>" />
                                                                        </a>
                                                                        <a title="Add Pictures" href="<?php echo base_url('vendor/photos/addProductImages/' . $product["id"]); ?>" class="mr-3 no-decoration">
                                                                            <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/image-icon.png'); ?>" />
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <td colspan="8">Products's List Empty.</td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
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

        <!-- End Main -->
        <?php
        $i = 1;
        $count = 0;
        foreach ($products as $key => $product) {
            $count++;
            ?>
            <div id="myModal<?php echo "_" . $product['id']; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog modal-md">
                    <form method="POST" action="<?php echo base_url() . "vendor/products/updateProductImage"; ?>/<?php echo $product['id']; ?>" enctype="multipart/form-data">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add/Edit Product Photo</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <label class="control-label">Photos</label>
                                        <select name="products[]" id="dates-field2" class="form-control" multiple="multiple">
                                            <?php
                                            $selectedProducts = json_decode($product['images_attached']);
                                            $found = false;
                                            foreach ($images as $key_a => $val_a) {
                                                $found = false;
                                                foreach ($selectedProducts as $key_b => $val_b) {
                                                    if ($val_a['product_name'] == $val_b) {
                                                        echo "<option value='" . $val_a['id'] . "' selected>" . $val_a['images'] . "</option>";
                                                        $found = true;
                                                    }
                                                }
                                                if (!$found)
                                                    echo "<option value='" . $val_a['id'] . "'>" . $val_a['images'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-dark">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="read_<?php echo $count; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content-theme">
                        <div class="modal-header bg-danger">
                            <span class="modal-header-text">Product Basic Information</span>
                        </div>
                        <form method="POST" action="<?php echo base_url() . "vendor/products/updateProduct"; ?>/<?php echo $product['id']; ?>" enctype="multipart/form-data">

                            <div class="modal-body">
                                <div class="p-3">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-md-4 col-form-label">
                                            Product Name 
                                            <span class="form-required-icon">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="item_name" value="<?php echo $product["product_name"]; ?>" id="item_name" required="" class="form-control form-rounded" type="text" placeholder="Product Name" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-md-4 col-form-label">
                                            Category
                                            <span class="form-required-icon">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <select id="categories_<?php echo $count; ?>" name="categories" required="" class="form-control form-rounded">
                                                <option disabled="" selected="" value="">Select Category</option>
                                                <?php foreach ($cats as $key => $value) { ?>
                                                    <?php if ($product["category"] == $value['Category']) { ?>
                                                        <option selected="" value="<?php echo $value['Category']; ?>"><?php echo $value['Category']; ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $value['Category']; ?>"><?php echo $value['Category']; ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-md-4 col-form-label">
                                            Sub Category
                                            <span class="form-required-icon">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <select id="subcategories_<?php echo $count; ?>" name="subcategories" required="" class="form-control form-rounded">
                                                <option disabled="" selected="" value="">Select Sub Category</option>
                                                <?php foreach ($scats as $key => $value) { ?>
                                                    <?php if ($product["subcategory"] == $value['Sub_Category']) { ?>
                                                        <option selected="" value="<?php echo $value['Sub_Category']; ?>"><?php echo $value['Sub_Category']; ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $value['Sub_Category']; ?>"><?php echo $value['Sub_Category']; ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-md-4 col-form-label">
                                            Brand
                                            <span class="form-required-icon">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input value="<?php
                                            echo $product["brand"];
                                            ?>" id="item_brand" name="item_brand" required="" class="form-control form-rounded" type="text" placeholder="Brand" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-md-4 col-form-label">
                                            UOM
                                            <span class="form-required-icon">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <select name="item_uom" id="item_uom" required="" class="form-control form-rounded">
                                                <option value="" selected="" disabled="">Choose option</option>
                                                <?php
                                                foreach ($uoms as $key => $uom) {
                                                    if ($product["uom"] == $uom['Uom']) {
                                                        echo "<option selected value='" . $uom['Uom'] . "'>" . $uom['Uom'] . "</option>";
                                                    } else {
                                                        echo "<option value='" . $uom['Uom'] . "'>" . $uom['Uom'] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-md-4 col-form-label">
                                            Description
                                            <span class="form-required-icon">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <textarea name="item_details" id="item_details" rows="4" required="" class="form-control form-rounded" type="text" placeholder="Description"><?php echo $product["description"]; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-md-4 col-form-label">
                                            Currency
                                            <span class="form-required-icon">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <select id="item_currency" required="" class="form-control form-rounded" name="item_currency">
                                                <option value="" selected="" disabled="">Select Currency</option>
                                                <?php
                                                foreach ($currencies as $key => $currency) {
                                                    if ($product["currency"] == $currency['currency']) {
                                                        echo "<option selected value='" . $currency['currency'] . "'>" . $currency['currency'] . "</option>";
                                                    } else {
                                                        echo "<option value='" . $currency['currency'] . "'>" . $currency['currency'] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-md-4 col-form-label">
                                            MOQ
                                            <span class="form-required-icon">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input value="<?php echo $product["moq"]; ?>" name="item_moq" id="item_moq" required="" class="form-control form-rounded" type="text" placeholder="MOQ" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-md-4 col-form-label">
                                            Unit Price
                                            <span class="form-required-icon">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input value="<?php echo $product["price"]; ?>" name="item_price" id="item_price" required="" class="form-control form-rounded" type="number" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-md-4 col-form-label">
                                            Tax in %
                                            <span class="form-required-icon">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input value="<?php echo $product["tax"]; ?>" max="100" name="item_tax" id="item_tax" required="" class="form-control form-rounded" type="number" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-info" type="button" class="close" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger right-float">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php }
        ?>



        <!-- jQuery  -->
        <?php $this->load->view('vendor/halaxa_partials/scripts'); ?>

        <script>

<?php
$count = 0;
foreach ($products as $key => $product) {
    $count++;
    ?>
                $('#categories_<?php echo $count; ?>').change(function () {
                    $.post("<?php echo base_url('buyer/rfq/getSubCatByCatByName/'); ?>",
                            {
                                category: this.value,
                            },
                            function (data, status) {
                                $('#subcategories_<?php echo $count; ?>').html(data);
                            });
                });
<?php } ?>
            function calculateTotal(row) {
                var rowvalue = row;
                var quotedQuantity = "#quotedQuantity" + rowvalue;
                var quantity = "#quantity" + rowvalue;
                var priceId = "#price" + rowvalue;
                if ($(quantity).val() > $(quotedQuantity).val()) {
                    //$("#submit").attr("disabled", true);
                    alert("Quantity cannot be more than requested quantity.");
                } else {
                    //$("#submit").attr("disabled", false);
                    value = $(quantity).val();
                    value2 = $(priceId).val();
                    var grand = parseFloat($("#grand").html());
                    $("#amount" + rowvalue).val(value * parseFloat(value2.replace(",", "")));
                    $("#itemTotal" + rowvalue).html(value * parseFloat(value2.replace(",", "")) + " USD");
                    //$("#grand").html(grand + value * parseFloat(value2.replace(",", ""))));
                }
            }

            function calculateQuantityTotal(row) {
                var rowvalue = row;
                var quotedQuantity = "#quotedQuantity" + rowvalue;
                var quantity = "#quantity" + rowvalue;
                var priceId = "#price" + rowvalue;
                if ($(quantity).val() > $(quotedQuantity).val()) {
                    //$("#submit").attr("disabled", true);
                    alert("Quantity cannot be more than requested quantity.");
                } else {
                    //$("#submit").attr("disabled", false);
                    value = $(quantity).val();
                    value2 = $(priceId).val();
                    $("#amount" + rowvalue).val(value * parseFloat(value2.replace(",", "")));
                    $("#itemTotal" + rowvalue).html(value * parseFloat(value2.replace(",", "")) + " USD")
                }
            }

            $(document).ready(function () {
                $("#draft").click(function () {
                    alert("Are you sure?");
                    $("input").prop('required', false);
                });
            });
//            $(document).ready(function () {
//                $('#datatable-responsive-rfq').DataTable({
//                    "order": [[2, "asc"]]
//                });
//            });

//select all checkboxes
            $("#select_all_rfqs").change(function () {  //"select all" change 
                $('#select_all_sellers_view').prop('checked', true);
                var status = this.checked; // "select all" checked status
                $('.rfq-checkbox').each(function () { //iterate all listed checkbox items
                    this.checked = status; //change ".checkbox" checked status
                });
            });

            $('.rfq-checkbox').change(function () { //".checkbox" change 
                //uncheck "select all", if one of the listed checkbox item is unchecked
                if (this.checked == false) { //if this item is unchecked
                    $('#select_all_sellers_view').prop('checked', false);
                    $("#select_all_rfqs")[0].checked = false; //change "select all" checked status to false
                }

                //check "select all" if all checkbox items are checked
                if ($('.rfq-checkbox:checked').length == $('.rfq-checkbox').length) {
                    $("#select_all_rfqs")[0].checked = true; //change "select all" checked status to true
                    $('#select_all_sellers_view').prop('checked', true);
                }
            });
        </script>

    </body>

</html>