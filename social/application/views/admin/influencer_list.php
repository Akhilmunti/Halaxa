<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('admin/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('admin/partials/left-nav'); ?>    
                <?php $this->load->view('admin/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>Influencer</h3>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Influencer management</h2>
                                                <?php
                                                $resultData = $result;
                                                if (isset($resultData)) {
                                                    echo "<p class='text-center text-success'>" . $resultData . "</p>";
                                                }
                                                ?>

                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <table id="datatable-responsive" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl No</th>
                                                            <th>Influencer Name</th>
                                                            <th>Email</th>
                                                            <th width="20%">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $iter = 0;
                                                        if (!empty($influencer_list)) {
                                                            foreach ($influencer_list as $subcat) {
                                                                $iter++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $iter; ?></td>
                                                                    <td><?php echo $subcat['Username']; ?></td>
                                                                    <td><?php echo $subcat['Email']; ?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url() . "admin/influencer/actionView/" . $subcat['I_Id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-user"></i> View </a>
                                                                        <?php if ($subcat['influencer_status'] == "0") { ?>
                                                                            <a href="<?php echo base_url() . "admin/influencer/approve/" . $subcat['I_Id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-user"></i> Approve </a>
                                                                            <a href="<?php echo base_url() . "admin/influencer/reject/" . $subcat['I_Id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-user"></i> Reject </a>
                                                                        <?php } elseif ($subcat['influencer_status'] == "1") { ?>
                                                                            <a href="<?php echo base_url() . "admin/influencer/reject/" . $subcat['I_Id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-user"></i> Reject </a>
                                                                            <a href="#" class="btn btn-success btn-xs"><i class="fa fa-user"></i> User Approved </a>
                                                                        <?php } else { ?>
                                                                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-user"></i> User Rejected </a>
                                                                            <a href="<?php echo base_url() . "admin/influencer/approve/" . $subcat['I_Id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-user"></i> Approve </a>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <td colspan="4"><center>No data found</center></td>
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
                <?php $this->load->view('admin/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>

        <?php $this->load->view('admin/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
        <script>
            function delete_subcategory(id) {
                if (confirm("Are you sure?")) {
                    $.post("/admin/sub-category/delete/" + id, {},
                            function (data, status) {
                                if (data == 'success') {
                                    alert("Data removed");
                                }
                                location.reload();
                            });
                }
            }
        </script>
    </body>

</html>