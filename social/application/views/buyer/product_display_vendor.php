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
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Search</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>List of Products</h2>                  
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div style="overflow-x: scroll">
                                        <table id="productTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr class="headings">
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
                                                                <?php
                                                                if (empty($product["description"])) {
                                                                    echo "No data";
                                                                } else {
                                                                    echo $product["description"];
                                                                }
                                                                ?>
                                                            </td>
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
                                                            <td class=" ">
                                                                <?php
                                                                if (empty($product["moq"])) {
                                                                    echo "No data";
                                                                } else {
                                                                    echo $product["moq"];
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class=" ">
                                                                <?php
                                                                if (empty($product["price"])) {
                                                                    echo "No data";
                                                                } else {
                                                                    echo $product["price"];
                                                                }
                                                                ?>
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
                            </div>
                        </div>
                    </div>
                </div>
                <?php foreach ($rfqs as $key => $rfq) { ?>
                    <!-- Modal -->
                    <div class="modal fade" id="viewDataModal<?php echo $rfq['RFQ_Id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">RFQ Details</h4>
                                </div>
                                <div class="modal-body">
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Item Service</th>
                                                <th>Item Description</th>
                                                <th>Quantity</th>
                                                <th>UOM ID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $infos = json_decode($rfq['itemsinfo']);
                                            foreach ($infos as $key => $info) {
                                                echo "<tr><td>" . $info[0] . "</td><td>" . $info[1] . "</td><td>" . $info[2] . "</td><td>" . $info[3] . "</td><td>" . $info[4] . "</td></tr>";
                                            }
                                            ?>
                                            <tr>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- /page content -->
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
        <script>
            function delete_rfq(id) {
                if (confirm("Are you sure?")) {
                    $.post("/buyer/rfq/deletebyid/" + id, {},
                            function (data, status) {
                                if (data == 'success') {
                                    alert("Data removed");
                                }
                                location.reload();
                            });
                }
            }

            $('#datatable').dataTable({
                "orderFixed": [0, 'desc'],
                "ordering": false
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