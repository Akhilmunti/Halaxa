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
                                <h3>Manage Groups</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Group Details</h2>
                                        <a style="margin-top: 3px" class="btn btn-dark btn-xs" data-toggle="modal" data-target="#myModal">Add Group</a> 
                                        
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <?php
                                        $notification = $this->session->flashdata('result');
                                        if ($notification == NULL) {
                                            $hidealert = "hide";
                                        } else {
                                            $showalert = $notification;
                                            $hidealert = "";
                                        }
                                        ?>
                                        <div class="alert alert-success <?php echo $hidealert ?>">
                                            <?php echo $showalert ?>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-responsive table-bordered">
                                                <thead>
                                                    <tr class="headings">
                                                        <th class="column-title">Sl No </th>
                                                        <th class="column-title">Group Name </th>
                                                        <th class="column-title">Number of products </th>
                                                        <th class="column-title">Select Products </th>
                                                        <th class="column-title">Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($groups)) {
                                                        $i = 1;
                                                        foreach ($groups as $key => $group) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td><?php echo $group['group_name']; ?></td>
                                                                <td>
                                                                    <?php
                                                                    $task_array = json_decode($group['selected_products']);
                                                                    echo count($task_array);
                                                                    ?>
                                                                </td>
                                                                <?php
                                                                $task_array = json_decode($group['selected_products']);
                                                                $countProducts = count($task_array);
                                                                if ($countProducts == "0") {
                                                                    ?>
                                                                    <td>
                                                                        <form method="POST" action="<?php echo base_url() . "vendor/groups/updateProducts"; ?>/<?php echo $group['id']; ?>" enctype="multipart/form-data">
                                                                            <select name="products[]" id="dates-field2" class="multiselect-ui form-control" multiple="multiple">
                                                                                <?php
                                                                                foreach ($products as $key => $product) {
                                                                                    ?>
                                                                                    <option value="<?php echo $product['product_name']; ?>"><?php echo $product['product_name']; ?></option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                            <button style="margin-top: 3px" type="submit" class="btn btn-xs btn-block btn-dark">Submit</button>
                                                                        </form>
                                                                    </td>
                                                                <?php } else { ?>
                                                                    <td>
                                                                        <select name="products[]" id="dates-field2" class="multiselect-ui form-control" multiple="multiple">
                                                                            <?php
                                                                            $productdata = json_decode($group['selected_products']);
                                                                            foreach ($productdata as $value) {
                                                                                ?>
                                                                                <option selected="" value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </td>
                                                                <?php } ?>

                                                                <td>
                                                                    <a data-toggle="modal" data-target="#myModal<?php echo "_" . $group['id']; ?>" class="label label-info"><i class="fa fa-edit"></i> Edit</a>
                                                                    <a href="<?php echo base_url() . "vendor/groups/deleteGroup"; ?>/<?php echo $group['id']; ?>" class="label label-danger"><i class="fa fa-trash"></i> Delete</a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td colspan="7">No Groups available !! Create a new one</td>
                                                        </tr>
                                                    <?php }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-sm"> 
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Add Group</h4>
                                        </div>
                                        <form method="POST" action="<?php echo base_url() . "vendor/groups/createGroup"; ?>" enctype="multipart/form-data">

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="control-label">Group Name</label>
                                                        <input name="groupname" type="text" required="" class="form-control" placeholder="Enter Group Name">
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-dark">Create</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $i = 1;
                            foreach ($groups as $key => $group) {
                                ?>
                                <div id="myModal<?php echo "_" . $group['id']; ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-md">
                                        <form method="POST" action="<?php echo base_url() . "vendor/groups/updateProducts"; ?>/<?php echo $group['id']; ?>" enctype="multipart/form-data">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit Group</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="control-label">Group Name</label>
                                                            <input value="<?php echo $group['group_name']; ?>" name="groupname" type="text" required="" class="form-control" placeholder="Enter Group Name">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <br>
                                                            <label class="control-label">Products</label>
                                                            <select name="products[]" id="dates-field2" class="multiselect-ui form-control" multiple="multiple">
                                                                <?php
                                                                $selectedProducts = json_decode($group['selected_products']);
                                                                $found = false;
                                                                foreach ($products as $key_a => $val_a) {
                                                                    $found = false;
                                                                    foreach ($selectedProducts as $key_b => $val_b) {
                                                                        if ($val_a['product_name'] == $val_b) {
                                                                            echo "<option value='" . $val_a['product_name'] . "' selected>" . $val_a['product_name'] . "</option>";
                                                                            $found = true;
                                                                        }
                                                                    }
                                                                    if (!$found)
                                                                        echo "<option value='" . $val_a['product_name'] . "'>" . $val_a['product_name'] . "</option>";
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
        <script src="<?php echo base_url(); ?>assets/prod/multijs.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
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