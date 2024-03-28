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
                        <div class="row">
                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Sub-Category</th>
                                        <th>Brand</th>
                                        <th>UOM</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 0;
                                    $products = $this->product_model->getProductsByCatUserid();
                                    if (!empty($products)) {
                                        foreach ($products as $key => $product) {
                                            $counter++;
                                            ?>
                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td><?php echo $product['product_name']; ?></td>
                                                <td><?php echo $product['category']; ?></td>
                                                <td><?php echo $product['subcategory']; ?></td>
                                                <td><?php echo $product['brand']; ?></td>
                                                <td><?php echo $product['uom']; ?></td>
                                                <td><?php
                                                    $priceStatus = $product['price_status'];
                                                    if ($priceStatus == "1") {
                                                        ?>
                                                        <a class="label label-danger">Hidden <span class="glyphicon glyphicon-eye-close"></span></a>
                                                    <?php } else { ?>
                                                        <?php echo $product['price']; ?>
                                                    <?php } ?>
                                                </td>
                                                <td><input style="margin-top: 7px" value="<?php echo $product['V_Id']; ?>" class="checkbox" type="checkbox" name="vendors[]"></td>

                                                                                                                                                        <!--                                                                    <td><a class="btn btn-dark btn-xs" download="" href="<?php echo base_url(); ?>/uploads/<?= $client["client_logo"] ?>">Download Client Logo</a></td>-->
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="11">Products not found !!</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- footer content -->
                <?php $this->load->view('buyer/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>

        <?php $this->load->view('buyer/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
<!--        <script>
            $(document).ready(function () {
                $("#idshow").hide();
                var found = {};
                $('li').each(function () {
                    var $this = $(this);
                    if (found[$this.attr('id')]) {
                        //$this.remove();
                        $("#" + $this.attr('id') + "_product").hide();
                    } else {
                        found[$this.attr('id')] = true;
                    }
                });
            });
        </script>-->
        <style>
            .right-float{
                float: right !important
            }
            .hide{
                visibility: collapse
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
        <script>
            //select all checkboxes
            $("#select_all").change(function () {  //"select all" change 
                var status = this.checked; // "select all" checked status
                $('.checkbox').each(function () { //iterate all listed checkbox items
                    this.checked = status; //change ".checkbox" checked status
                });
            });

            $("#select_all_sellers").change(function () {  //"select all" change 
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

            $("#sendMail").onclick(function () {
                var checked = $("#productForm input:checked").length > 0;
                if (!checked) {
                    alert("Please check at least one checkbox");
                    return false;
                } else {
                    return true;
                }
            });

            function clickingFunction() {
                var checked = $("#productForm input:checked").length > 0;
                if (!checked) {
                    $('#myModal').modal('hide');
                    alert("Please check at least one checkbox");
                    return false;
                } else {
                    $('#myModal').modal('show');
                    return true;
                }
            }

            function clickingFunctionSeller() {
                var checked = $("#productForm input:checked").length > 0;
                if (!checked) {
                    $('#myModal').modal('hide');
                    alert("Please check at least one checkbox");
                    return false;
                } else {
                    $('#myModal').modal('show');
                    return true;
                }
            }


        </script>
    </body>

</html>