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
                    <div class="">
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>All Sellers</h3>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Sellers List</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <?php
                                                $alert = $this->session->flashdata('vendorNot');
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
                                                <table id="datatable-responsive" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl No</th>
                                                            <th>Company Name</th>
                                                            <th width="20%">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if (!empty($vendors)) {
                                                            $iter = 0;
                                                            foreach ($vendors as $vendor) {
                                                                $iter++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $iter; ?></td>
                                                                    <td><?php echo $vendor['comapany_name']; ?></td>
                                                                    <td>
                                                                        <?php
                                                                        $vendorslist = $this->vendor_model->getFavourite($vendor['User_Id']);
                                                                        if ($vendorslist['status'] == "1") {
                                                                            ?>
                                                                            <a href="<?php echo base_url(); ?>buyer/vendors/undo/<?php echo $vendorslist['id'] ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Remove from favourites </a>
                                                                        <?php } else { ?>
                                                                            <a href="<?php echo base_url(); ?>buyer/vendors/addToFavs/<?php echo $vendor['User_Id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-heart-o"></i> Add to Favourites </a>
                                                                        <?php } ?>                                                                  
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <td colspan="6"><center>No data found</center></td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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