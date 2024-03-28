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
                                            <h4 class="theme-header-text">Clientele</h4>
                                        </div>
                                        <div class="col-md-2 mt-3">
                                            <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModal">Add Clientele</a> 
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <table id="productsTable" class="table order-list table-striped mt-3">
                                                <thead>
                                                    <tr>
                                                        <td>
                                                            <p class="jobs-li-place text-justify p-info">
                                                                #
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="jobs-li-place text-justify p-info">
                                                                Clientele Name
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="jobs-li-place text-justify p-info">
                                                                Logo
                                                            </p>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($clients)) {
                                                        $i = 0;
                                                        foreach ($clients as $key => $client) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td><?= $i; ?></td>
                                                                <td><?= $client["client_name"] ?></td>
                                                                <td>
                                                                    <?php if (!empty($client["client_logo"])) { ?>
                                                                        <a href="#" class="mr-3 no-decoration">
                                                                            <img width="30" height="30" src="<?php echo base_url(); ?>/uploads/<?= $client["client_logo"] ?>" />
                                                                        </a>
                                                                    <?php } else { ?>
                                                                        <a href="#" class="mr-3 no-decoration">
                                                                            <img width="30" height="30" src="<?php echo base_url('assets/halaxa_buyer/images/user.png'); ?>" />
                                                                        </a>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <a href="<?php echo base_url() . "vendor/clientele/deleteClient"; ?>/<?= $client["id"] ?>" class="mr-3 no-decoration">
                                                                        <i class="fa fa-trash red"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td colspan="7">No Clientele available !! Create a new one</td>
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
                        <span class="modal-header-text">Add Clientele</span>
                    </div>
                    <form method="POST" action="<?php echo base_url() . "vendor/clientele/addClient"; ?>" enctype="multipart/form-data">

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <label class="control-label">Client Name</label>
                                    <input name="clientName" type="text" class="form-control" placeholder="Enter Client Name">
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <label class="control-label">Client Logo</label>
                                    <input name="clientLogo" type="file" class="form-control">
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

    </body>

</html>