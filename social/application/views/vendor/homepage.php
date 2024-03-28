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
                                <div class="theme-card p-3 mb-3 bg-light-blue">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="pt-2">
                                                Keep your Seller Corporate Profile updated at all times in order to receive best quoted prices from Halaxa network of sellers and to attract more supplier connections.
                                            </p>
                                        </div>
                                        <div class="col-md-2 pt-3 text-center">
                                            <a href="<?php echo base_url('vendor/profile'); ?>" class="btn btn-success">Update Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="theme-card p-3 mb-3 bg-light-yellow">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="pt-2">
                                                Help us continuously grow the Halaxa suppliers network and help your current suppliers grow their sales and revenues.
                                            </p>
                                        </div>
                                        <div class="col-md-2 pt-2 text-center">
                                            <a href="<?php echo base_url('vendor/invite-buyers'); ?>" class="btn btn-success">Invite</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <a class="text-theme" href="#">
                                            <div class="theme-card p-3 mb-3">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <h5>
                                                            <b>
                                                                <?php
                                                                if (!empty($rfqs)) {
                                                                    echo count($rfqs);
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                            </b>
                                                        </h5>
                                                        <h6>RFQs</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img height="50" class="" src="<?php echo base_url('assets/halaxa_buyer/images/view-rfq-icon.png'); ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="text-theme" href="#">
                                            <div class="theme-card p-3 mb-3">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <h5>
                                                            <b>
                                                                <?php
                                                                if (!empty($products)) {
                                                                    echo count($products);
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                            </b>
                                                        </h5>
                                                        <h6>Products</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img height="60" class="" src="<?php echo base_url('assets/halaxa_buyer/images/received-icon.png'); ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="text-theme" href="#">
                                            <div class="theme-card p-3 mb-3">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <h5>
                                                            <b>
                                                                <?php
                                                                if (!empty($poissued)) {
                                                                    echo count($poissued);
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                            </b>
                                                        </h5>
                                                        <h6>Purchase Orders</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img height="60" class="" src="<?php echo base_url('assets/halaxa_buyer/images/po-icon.png'); ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Main -->

        <!--RFQ Modal -->
        <div id="myModalRfqs" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content-theme">
                    <div class="modal-header bg-danger">
                        <h4 class="modal-title">RFQ List</h4>
                    </div>
                    <div class="modal-body">
                        <table width="100%" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>RFQ ID</th>
                                    <th>Group</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Location</th>
                                    <th>City</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($rfqsCount)) {
                                    $count = 0;
                                    foreach ($rfqsCount as $key => $rfq) {
                                        $count++;
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
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
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="10">RFQ's List Empty.</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- jQuery  -->
        <?php $this->load->view('vendor/halaxa_partials/scripts'); ?>

    </body>

</html>