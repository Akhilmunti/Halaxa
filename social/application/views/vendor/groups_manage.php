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
                                        <div class="col-md-10">
                                            <h4 class="theme-header-text">Manage Group</h4>
                                        </div>
                                        <div class="col-md-2 mt-3">
                                            <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModal">Add Group</a> 
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <table id="productsTable" class="table order-list table-striped mt-3">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <p class="jobs-li-place text-justify p-info">
                                                                #
                                                            </p>
                                                        </th>
                                                        <td>
                                                            <p class="jobs-li-place text-justify p-info">
                                                                Group Name
                                                            </p>
                                                        </td>
                                                        <th>
                                                            <p class="jobs-li-place text-justify p-info">
                                                                Products Count
                                                            </p>
                                                        </th>
                                                        <td>
                                                            <p class="jobs-li-place text-justify p-info">
                                                                Select Product
                                                            </p>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($groups)) {
                                                        $i = 0;
                                                        foreach ($groups as $key => $group) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <p class="table-p text-theme">
                                                                        <?php
                                                                        echo $i;
                                                                        ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="table-p text-theme">
                                                                        <?php
                                                                        echo $group['group_name'];
                                                                        ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="table-p text-theme">
                                                                        <?php
                                                                        $task_array = json_decode($group['selected_products']);
                                                                        echo count($task_array);
                                                                        ?>
                                                                    </p>
                                                                </td>
                                                                <?php
                                                                $task_array = json_decode($group['selected_products']);
                                                                $countProducts = count($task_array);
                                                                if ($countProducts == "0") {
                                                                    ?>
                                                                    <td style="width: 400px">
                                                                        <form method="POST" action="<?php echo base_url() . "vendor/groups/updateProducts"; ?>/<?php echo $group['id']; ?>" enctype="multipart/form-data">
                                                                            <div class="input-group mb-3">
                                                                                <select name="products[]" id="products_<?php echo $i; ?>" class="multiselect-ui form-control" multiple="multiple">
                                                                                    <?php
                                                                                    foreach ($products as $key => $product) {
                                                                                        ?>
                                                                                        <option value="<?php echo $product['id']; ?>"><?php echo $product['product_name']; ?></option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                </select> 
                                                                                <div class="input-group-append">
                                                                                    <button type="submit" class="btn btn-sm btn-block btn-danger">Submit</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </td>
                                                                <?php } else { ?>
                                                                    <td>
                                                                        <?php
                                                                        $productdata = json_decode($group['selected_products']);
                                                                        ?>
                                                                        <form method="POST" action="<?php echo base_url() . "vendor/groups/updateProducts"; ?>/<?php echo $group['id']; ?>" enctype="multipart/form-data">
                                                                            <div class="input-group mb-3">
                                                                                <select name="products[]" id="products_<?php echo $i; ?>" class="multiselect-ui form-control" multiple="multiple">
                                                                                    <?php
                                                                                    foreach ($products as $key => $product) {
                                                                                        ?>
                                                                                        <?php if (in_array($product['id'], $productdata)) { ?>
                                                                                            <option selected="" value="<?php echo $product['id']; ?>"><?php echo $product['product_name']; ?></option>
                                                                                        <?php } else { ?>
                                                                                            <option value="<?php echo $product['id']; ?>"><?php echo $product['product_name']; ?></option>
                                                                                        <?php } ?>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                </select> 
                                                                                <div class="input-group-append">
                                                                                    <button type="submit" class="btn btn-sm btn-block btn-danger">Submit</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </td>
                                                                <?php } ?>

                                                                <td>
                                                                    <a title="Edit Group Name" data-toggle="modal" data-target="#myModal<?php echo "_" . $group['id']; ?>" href="#" class="mr-3 no-decoration">
                                                                        <img height="15" src="<?php echo base_url('assets/halaxa_buyer/images/pencil-icon.png'); ?>" />
                                                                    </a>
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


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm"> 
                <!-- Modal content-->
                <div class="modal-content-theme">
                    <div class="modal-header bg-danger">
                        <span class="modal-header-text">Add Group</span>
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
                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Add</button>
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
                    <form method="POST" action="<?php echo base_url() . "vendor/groups/updateProductsName"; ?>/<?php echo $group['id']; ?>" enctype="multipart/form-data">

                        <!-- Modal content-->
                        <div class="modal-content-theme">
                            <div class="modal-header bg-danger">
                                <span class="modal-header-text">Edit Group Name</span>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Group Name</label>
                                        <input value="<?php echo $group['group_name']; ?>" name="groupname" type="text" required="" class="form-control" placeholder="Enter Group Name">
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php }
        ?>

        <!-- jQuery  -->
        <?php $this->load->view('vendor/halaxa_partials/scripts'); ?>

        <script>
            $(document).ready(function () {

<?php
$i = 0;
foreach ($groups as $key => $group) {
    $i++
    ?>
                    $('#products_<?php echo $i; ?>').select2();
<?php } ?>
            });
        </script>
    </body>

</html>