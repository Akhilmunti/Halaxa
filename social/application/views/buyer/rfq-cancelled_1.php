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
                            <h3>RFQ </h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>List of RFQ's</h2>                  
                                    <?php
                                    $result = $this->session->flashdata('result');
                                    if (isset($result)) {
                                        echo "<br><p class='text-center text-success'>" . $result . "</p>";
                                    }
                                    ?>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>RFQ ID</th>
                                                <th>Group</th>
                                                <th>Category</th>
                                                <th>Sub Category</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Location</th>
                                                <th>City</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($rfqs)) {
                                                foreach ($rfqs as $key => $rfq) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $rfq['RFQ_Id']; ?></td>
                                                        <td>
                                                            <?php
                                                            $category = $this->type_model->getTypeById($rfq['T_Key']);
                                                            echo $category['Type'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $category = $this->category_model->getCategoryById($rfq['CT_Key']);
                                                            echo $category['Category'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $category = $this->subcategory_model->getSubCategoryById($rfq['SCT_Key']);
                                                            echo $category['Sub_Category'];
                                                            ?>
                                                        </td>
                                                        <td><?php echo $rfq['Start']; ?></td>
                                                        <td><?php echo $rfq['End']; ?></td>
                                                        <td><?php echo $rfq['Location']; ?></td>
                                                        <td><?php echo $rfq['City']; ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url() . "buyer/rfq/show/" . $rfq['RFQ_Id']; ?>" class="btn btn-info btn-xs">View</a>
                                                            <a href="<?php echo base_url() . "buyer/rfq/reorder/" . $rfq['RFQ_Id']; ?>" class="btn btn-warning btn-xs">Re-Order</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="8">List Empty.</td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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
            $('#datatable-responsive').dataTable({
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