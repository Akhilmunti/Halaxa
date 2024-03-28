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
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Vendor management</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Vendor management (<b><a href="<?php echo base_url() . "admin/vendors/add-new" ?>">+ADD NEW</a></b>)</h2>
                                        <?php
                                        $result = $this->session->flashdata('result');
                                        if (isset($result)) {
                                            echo "<p class='text-center text-success'>" . $result . "</p>";
                                        }
                                        ?>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                                            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Settings 1</a> </li>
                                                    <li><a href="#">Settings 2</a> </li>
                                                </ul>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Company Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($sellers)) {
                                                    $counter = 0;
                                                    foreach ($sellers as $vendor) {
                                                        $counter++;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $counter; ?></td>
                                                            <td><?php echo $vendor['comapany_name']; ?></td>
                                                            <td>
                                                                <?php
                                                                $user = $this->users_model->get_user_by_id($vendor['User_Id']);
                                                                if ($user->Email) {
                                                                    ?>
                                                                    <?php echo $user->Email; ?>
                                                                <?php } else {
                                                                    ?>
                                                                    Email Id not provided.
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $user = $this->users_model->get_user_by_id($vendor['User_Id']);
                                                                if ($user->Phone) {
                                                                    ?>
                                                                    <?php echo $user->Phone; ?>
                                                                <?php } else {
                                                                    ?>
                                                                    Phone number not provided.
                                                                <?php } ?>
                                                            </td>
                                                            <td><?php echo $vendor['delivery_address']; ?></td>
                                                            <td>
                                                                <a href="<?php echo base_url() . "admin/vendors/view/" . $vendor['User_Id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View </a>
                                                                <a href="<?php echo base_url() . "admin/vendors/edit/" . $vendor['User_Id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                                <a href="<?php echo base_url() . "admin/vendors/delete/" . $vendor['User_Id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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
            function delete_vendor(id) {

                if (confirm("Are you sure?")) {
                    $.post("/admin/vendors/delete/" + id, {},
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
    </body>

</html>