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
                                    <h3>Currency management</h3>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Currency management (<b><a href="<?php echo base_url() . "admin/currency/add-new" ?>">+ADD NEW</a></b>)</h2>
                                                <?php
                                                $result = $this->session->flashdata('result');
                                                if (isset($result)) {
                                                    echo "<p class='text-center text-success'>" . $result . "</p>";
                                                }
                                                ?>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <table id="datatable-responsive" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl No</th>
                                                            <th>Currency Name</th>
                                                            <th width="20%">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $count = 0;
                                                        if (!empty($currencies)) {
                                                            foreach ($currencies as $currency) {
                                                                $count++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $count; ?></td>
                                                                    <td><?php echo $currency['currency']; ?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url() . "admin/currency/edit/" . $currency['id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                                        <a onclick="return confirm('Are you sure?')" href="<?php echo base_url() . "admin/currency/delete/" . $currency['id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </button>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <td colspan="3"><center>No data found</center></td>
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
            function delete_uom(id) {
                if (confirm("Are you sure?")) {
                    $.post("/admin/uom/delete/" + id, {},
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