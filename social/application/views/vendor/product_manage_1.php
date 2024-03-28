<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('vendor/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/prod/multi.css" rel="stylesheet" type="text/css">
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
                                <h3>Manage Products</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <form id="productForm" method="POST" action="<?php echo base_url() . "vendor/products/operateProducts"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_title">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select style="padding: 2px" class="btn btn-xs btn-dark btn-block filterSelector" id='mySelector' data-attribute="currency">
                                                            <option value="0">All Currencies</option>
                                                            <?php foreach ($currencies as $value) { ?>
                                                                <option value="<?php echo $value['currency']; ?>"><?php echo $value['currency']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select style="padding: 2px" class="btn btn-xs btn-dark btn-block filterSelector" id='mySelectorUomList' data-attribute="uom">
                                                            <option value="0">All UOM's</option>
                                                            <?php foreach ($uoms as $value) { ?>
                                                                <option value="<?php echo $value['Uom']; ?>"><?php echo $value['Uom']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select style="padding: 2px" class="btn btn-xs btn-dark btn-block" id="updateUom" name="operateProducts">
                                                            <option value="0">Update UOM's</option>
                                                            <?php foreach ($uoms as $value) { ?>
                                                                <option value="<?php echo $value['Uom']; ?>"><?php echo $value['Uom']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="submit" value="Display Price" name="operateProducts" class="btn btn-xs btn-dark btn-block"></input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <input type="submit" value="Hide Price" name="operateProducts" class="btn btn-xs btn-dark btn-block"></input>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input id="deleteProduct" type="submit" value="Delete Product" name="operateProducts" class="btn btn-xs btn-dark btn-block"></input>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="submit" value="Update/Edit" name="operateProducts" class="btn btn-xs btn-dark btn-block"></input>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="submit" value="Hide Product" name="operateProducts" class="btn btn-xs btn-dark btn-block"></input>
                                                    </div>
                                                    <!--                                                        <div class="col-md-3">
                                                                                                                <input type="checkbox">
                                                                                                                <input type="submit" value="All Products" name="operateProducts" class="btn btn-dark btn-xs"></input>
                                                                                                            </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Product Details</h2>                                        
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <?php
                                            $result = $this->session->flashdata('operateProduct');
                                            if ($result == NULL) {
                                                $hidealert = "hide";
                                            } else {
                                                $showalert = $result;
                                                $hidealert = "";
                                            }
                                            ?>
                                            <div class="alert alert-success <?php echo $hidealert ?>">
                                                <?php echo $showalert ?>
                                            </div>

                                            <div class="table-responsive" style="position: relative">
                                                <div style="overflow-x: scroll">
                                                    <table id="productTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr class="headings">
                                                                <th> <input type="checkbox" id="select_all">
                                                                </th>
                                                                <th class="column-title">Sl No </th>
                                                                <th class="column-title">Product Name </th>
<!--                                                                <th class="column-title">Group Name </th>-->
                                                                <th class="column-title">Category </th>
                                                                <th class="column-title">Sub-Category </th>
                                                                <th class="column-title">Brand </th>
                                                                <th class="column-title">Description </th>
                                                                <th class="column-title">Currency </th>
                                                                <th class="column-title">UOM </th>
                                                                <th class="column-title">MOQ </th>
                                                                <th class="column-title priceHead">Price </th>
                                                                <th class="column-title">Tax in % </th>
                                                                <th class="column-title">Hidden Status</th>
                                                                <th class="column-title">Photo Gallery</th>
                                                                <th class="column-title">Update/Delete Photo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if (!empty($products)) {
                                                                $counter = 0;
                                                                foreach ($products as $key => $product) {
                                                                    $counter++;
                                                                    ?>
                                                                    <tr class="Row" data-currency="<?= $product["currency"] ?>" data-uom="<?= $product["uom"] ?>">
                                                                        <td>
                                                                            <input class="checkbox" type="checkbox" name="productsCheckedId[]" value="<?= $product['id'] ?>">
                                                                        </td>
                                                                        <td><?= $counter; ?></td>
                                                                        <td class=" "><?= $product["product_name"] ?></td>
        <!--                                                                        <td class=" ">
                                                                        <?php
                                                                        if (is_numeric($product["category"])) {
                                                                            $category = $this->type_model->getTypeById($product["groupname"]);
                                                                            echo $category['Type'];
                                                                        } else if ($product["groupname"] == "Select") {
                                                                            echo "No data";
                                                                        } else {
                                                                            echo $product["groupname"];
                                                                        }
                                                                        ?>
                                                                        </td>-->
                                                                        <td class=" ">
                                                                            <?php
                                                                            if (is_numeric($product["category"])) {
                                                                                $category = $this->category_model->getCategoryById($product["category"]);
                                                                                echo $category['Category'];
                                                                            } else if ($product["category"] == "Select") {
                                                                                echo "No data";
                                                                            } else {
                                                                                echo $product["category"];
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class=" ">
                                                                            <?php
                                                                            if (is_numeric($product["subcategory"])) {
                                                                                $category = $this->subcategory_model->getSubCategoryById($product["subcategory"]);
                                                                                echo $category['Sub_Category'];
                                                                            } else if ($product["subcategory"] == "Select") {
                                                                                echo "No data";
                                                                            } else {
                                                                                echo $product["subcategory"];
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            if (empty($product["brand"])) {
                                                                                echo "No data";
                                                                            } else {
                                                                                echo $product["brand"];
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <input style="width: 100px" name="description[<?= $product["id"] ?>]" class="form-control" value="<?= $product["description"] ?>" type="text"/></td>
                                                                        <td>
                                                                            <?php
                                                                            if (empty($product["currency"])) {
                                                                                echo "No data";
                                                                            } else {
                                                                                echo $product["currency"];
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            if ($product["uom"] == "Select") {
                                                                                echo "No data";
                                                                            } else {
                                                                                echo $product["uom"];
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class=" "><input style="width: 100px" name="moq[<?= $product["id"] ?>]" class="form-control" value="<?= $product["moq"] ?>" type="text"/></td>
                                                                        <td class=" ">
                                                                            <?php
                                                                            $priceStatus = $product["price_status"];
                                                                            if ($priceStatus == "1") {
                                                                                $statusEye = "glyphicon-eye-close red";
                                                                            } else {
                                                                                $statusEye = "glyphicon-eye-open";
                                                                            }
                                                                            ?>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon <?php echo $statusEye; ?>"></i></span>
                                                                                <input style="width: 100px" name="price[<?= $product["id"] ?>]" id="price[]" class="form-control" value="<?= $product["price"] ?>" type="text"/>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            if (empty($product["tax"])) {
                                                                                echo "No data";
                                                                            } else {
                                                                                echo $product["tax"] . "(%)";
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            if ($product["status_hide"] == 0) {
                                                                                echo "Not hidden";
                                                                            } else {
                                                                                echo "Hidden";
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            $productImages = json_decode($product["images_attached"]);
                                                                            if (!empty($productImages)) {
                                                                                ?>
                                                                                <?php
                                                                                $productImages = json_decode($product["images_attached"]);
                                                                                foreach ($productImages as $image) {
                                                                                    ?>
                                                                                    <a href="<?php echo base_url();
                                                                                    ?>user_files/product_images/<?php
                                                                                       $imageDetails = $this->product_model->getProductImagesByid($image);
                                                                                       print_r($imageDetails[0]['images']);
                                                                                       ?>" class="btn btn-dark" download>
                                                                                       <?php
                                                                                       $imageDetails = $this->product_model->getProductImagesByid($image);
                                                                                       print_r($imageDetails[0]['images']);
                                                                                       ?>
                                                                                    </a>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            <?php } else { ?>
                                                                                <select style="width: 150px" name="productImages[<?= $product["id"] ?>][]" id="dates-field2" class="multiselect-ui form-control" multiple="multiple">
                                                                                    <?php
                                                                                    foreach ($images as $image) {
                                                                                        ?>
                                                                                        <option value="<?php echo $image["id"]; ?>"><?php echo $image["images"]; ?></option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <td>
                                                                            <a data-toggle="modal" data-target="#myModal<?php echo "_" . $product['id']; ?>" class="btn btn-dark">Add/Edit Photo</a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <tr>
                                                                    <td colspan="15"><center>No data found</center></td>
                                                            </tr>
                                                        <?php }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $i = 1;
                                foreach ($products as $key => $product) {
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
                                <?php }
                                ?>
                                <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog"> 
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Detailed Form</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-label-left">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <label class="control-label">Manufacturing Date</label>
                                                            <input type="date" class="form-control" placeholder="Enter Name">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label class="control-label">Expiry Date</label>
                                                            <input type="date" class="form-control" placeholder="Enter Description">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label class="control-label">Other Description</label>
                                                            <input type="text" class="form-control" placeholder="Enter Description">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label class="control-label">Availability</label>
                                                            <input type="text" class="form-control" placeholder="Enter Availability">
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
                            </form>
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
        <!-- jQuery Smart Wizard --> 
        <script src="<?php echo base_url(); ?>assets/vendors/moment/min/moment.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>  
        <script src="<?php echo base_url(); ?>assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- iCheck --> 
        <script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script> 
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script src="<?php echo base_url(); ?>assets/prod/multijs.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
        <script type="text/javascript">
//            $('#productTable').dataTable({
//                "orderFixed": [0, 'desc'],
//                "ordering": false
//            });
        </script>
        <script>
            //select all checkboxes
            $("#select_all").change(function () {  //"select all" change 
                var status = this.checked; // "select all" checked status
                $('.checkbox').each(function () { //iterate all listed checkbox items
                    this.checked = status; //change ".checkbox" checked status
                });
            });

            $('.checkbox').change(function () { //".checkbox" change 
                //uncheck "select all", if one of the listed checkbox item is unchecked
                if (this.checked == false) { //if this item is unchecked
                    $("#select_all")[0].checked = false; //change "select all" checked status to false
                }

                //check "select all" if all checkbox items are checked
                if ($('.checkbox:checked').length == $('.checkbox').length) {
                    $("#select_all")[0].checked = true; //change "select all" checked status to true
                }
            });
        </script>
        <script type="text/javascript">
//            function getRows(override, value) {
//                var filter = "#datatable tbody tr td";
//                $("#mySelector").each(function () {
//                    var test = this === override ? value : $(this).val();
//                    if (test !== "All")
//                        filter += ":contains(" + test + ")";
//                });
//                return $(filter).parent();
//            }
//            $('#mySelector').on('change', function () {
//                $('#datatable tbody tr').hide();
//                getRows().show();
//                $('#mySelector').each(function (i, select) {
//                    $('option', this).each(function () {
//                        $(this).toggle(getRows(select, $(this).text()).length > 0);
//                    });
//                });
//            });
//
//            function getRowsUom(override, value) {
//                var filter = "#datatable tbody tr td";
//                $("#mySelectorUomList").each(function () {
//                    var test = this === override ? value : $(this).val();
//                    if (test !== "All")
//                        filter += ":contains(" + test + ")";
//                });
//                return $(filter).parent();
//            }
//            $('#mySelectorUomList').on('change', function () {
//                $('#datatable tbody tr').hide();
//                getRowsUom().show();
//                $('#mySelectorUomList').each(function (i, select) {
//                    $('option', this).each(function () {
//                        $(this).toggle(getRows(select, $(this).text()).length > 0);
//                    });
//                });
//            });

            $('#hidePrice').on('click', function () {
                $('td:nth-child(12),th:nth-child(12)').hide();
            });

            $('#displayPrice').on('click', function () {
                location.reload();
            });

            $("#productForm").submit(function () {
                var checked = $("#productForm input:checked").length > 0;
                if (!checked) {
                    alert("Please check at least one checkbox");
                    return false;
                } else {
                    var deleteP = $('#deleteProduct').val();
                    if (deleteP != "") {
                        if (deleteP == "Delete Product") {
                            if (confirm('Are you sure')) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    } else {
                        return true;
                    }
                }
            });

            $(document).ready(function () {
                $('#updateUom').change(function () {
                    var checked = $("#productForm input:checked").length > 0;
                    if (!checked) {
                        alert("Please check at least one checkbox");
                        return false;
                    } else {
                        $("#productForm").submit();
                        return true;
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('select.filterSelector').bind('change', function () {
                    $('select.filterSelector').attr('disabled', 'disabled');
                    $('#productTable').find('.Row').hide();
                    var critriaAttribute = '';

                    $('select.filterSelector').each(function () {
                        if ($(this).val() != '0') {
                            critriaAttribute += '[data-' + $(this).data('attribute') + '*="' + $(this).val() + '"]';
                        }
                    });

                    $('#productTable').find('.Row' + critriaAttribute).show();
                    $('select.filterSelector').removeAttr('disabled');
                });
            });
        </script>
        <script type="text/javascript">
            $(function () {
                $('.multiselect-ui').multiselect({
                    includeSelectAllOption: true
                });
            });
        </script>
    </body>
</html>