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
                            <h3>Users</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>User management</h2>
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
                                        <?php
                                        $result = $this->session->flashdata('result');
                                        if ($result == NULL) {
                                            $hidealert = "hide";
                                            $showalert = "";
                                        } else {
                                            $showalert = $result;
                                            $hidealert = "";
                                        }
                                        ?>
                                        <div class="alert alert-success <?php echo $hidealert ?>">
                                            <?php echo $showalert ?>
                                        </div>
                                        <?php
                                        if (!empty($socialStatus)) {
                                            $socialTab = "active";
                                            $buyerTab = "";
                                            $vendorTab = "";
                                        } elseif (!empty($buyerStatus)) {
                                            $socialTab = "";
                                            $buyerTab = "active";
                                            $vendorTab = "";
                                        } else {
                                            $socialTab = "";
                                            $buyerTab = "";
                                            $vendorTab = "active";
                                        }
                                        ?>
                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist">
                                                <li role="presentation" class="<?php echo $socialTab; ?>"><a href="#tab_content11" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Social</a>
                                                </li>
                                                <li role="presentation" class="<?php echo $buyerTab; ?>"><a href="#tab_content22" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Buyer</a>
                                                </li>
                                                <li role="presentation" class="<?php echo $vendorTab; ?>"><a href="#tab_content33" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Vendor</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#tab_content44" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Influencer</a>
                                                </li>
                                            </ul>
                                            <div id="myTabContent2" class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade <?php echo $socialTab; ?> in" id="tab_content11" aria-labelledby="home-tab">
                                                    <table id="" class="table table-striped table-bordered dt-responsive nowrap display" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl No</th>
                                                                <th>User Name</th>
                                                                <th>Email</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if (!empty($social)) {
                                                                $counter = 0;
                                                                foreach ($social as $user) {
                                                                    $counter++;
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $counter; ?></td>
                                                                        <td><?php echo $user['Username']; ?></td>
                                                                        <td><?php echo $user['Email']; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            $status = $user['Status'];
                                                                            if ($status == "0") {
                                                                                $userStatus = "Disabled";
                                                                            } else {
                                                                                $userStatus = "User Active";
                                                                            }
                                                                            ?>
                                                                            <a class="btn btn-dark btn-xs"><i class="fa fa-user"></i> <?php echo $userStatus; ?> </a>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo base_url() . "admin/user/viewSocialUser/" . $user['User_Id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View </a>
                                                                            <a href="<?php echo base_url() . "admin/user/editSocialUser/" . $user['User_Id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                                            <a href="<?php echo base_url() . "admin/user/deleteSocialUser/" . $user['User_Id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                                                            <?php if ($user['Status'] == "0") { ?>
                                                                                <a href="<?php echo base_url() . "admin/user/enableUser/" . $user['User_Id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-dark btn-xs"><i class="fa fa-user"></i> Enable User </a>
                                                                            <?php } else { ?>
                                                                                <a href="<?php echo base_url() . "admin/user/disableUser/" . $user['User_Id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-dark btn-xs"><i class="fa fa-user"></i> Disable User </a>
                                                                            <?php } ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <tr>
                                                                    <td colspan="6"><center>No social users found</center></td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div role="tabpanel" class="tab-pane <?php echo $buyerTab; ?> in fade" id="tab_content22" aria-labelledby="profile-tab">
                                                    <table id="" class="display table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl No</th>
                                                                <th>User Name</th>
                                                                <th>Email</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if (!empty($buyer)) {
                                                                $counter = 0;
                                                                foreach ($buyer as $user) {
                                                                    $counter++;
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $counter; ?></td>
                                                                        <td><?php echo $user['Username']; ?></td>
                                                                        <td><?php echo $user['Email']; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            $status = $user['Status'];
                                                                            if ($status == "0") {
                                                                                $userStatus = "Disabled";
                                                                            } else {
                                                                                $userStatus = "User Active";
                                                                            }
                                                                            ?>
                                                                            <a class="btn btn-dark btn-xs"><i class="fa fa-user"></i> <?php echo $userStatus; ?> </a>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo base_url() . "admin/user/viewBuyerUser/" . $user['User_Id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View </a>
                                                                            <a href="<?php echo base_url() . "admin/user/editBuyerUser/" . $user['User_Id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                                            <a href="<?php echo base_url() . "admin/user/deleteBuyerUser/" . $user['User_Id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                                                            <?php if ($user['Status'] == "0") { ?>
                                                                                <a href="<?php echo base_url() . "admin/user/enableUser/" . $user['User_Id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-dark btn-xs"><i class="fa fa-user"></i> Enable User </a>
                                                                            <?php } else { ?>
                                                                                <a href="<?php echo base_url() . "admin/user/disableUser/" . $user['User_Id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-dark btn-xs"><i class="fa fa-user"></i> Disable User </a>
                                                                            <?php } ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <tr>
                                                                    <td colspan="6"><center>No buyer users found</center></td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div role="tabpanel" class="tab-pane <?php echo $vendorTab; ?> in fade" id="tab_content33" aria-labelledby="profile-tab">
                                                    <table id="" class="table table-striped table-bordered dt-responsive nowrap display" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl No</th>
                                                                <th>User Name</th>
                                                                <th>Email</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if (!empty($vendor)) {
                                                                $counter = 0;
                                                                foreach ($vendor as $user) {
                                                                    $counter++;
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $counter; ?></td>
                                                                        <td><?php echo $user['Username']; ?></td>
                                                                        <td><?php echo $user['Email']; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            $status = $user['Status'];
                                                                            if ($status == "0") {
                                                                                $userStatus = "Disabled";
                                                                            } else {
                                                                                $userStatus = "User Active";
                                                                            }
                                                                            ?>
                                                                            <a class="btn btn-dark btn-xs"><i class="fa fa-user"></i> <?php echo $userStatus; ?> </a>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo base_url() . "admin/user/viewVendorUser/" . $user['User_Id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View </a>
                                                                            <a href="<?php echo base_url() . "admin/user/editVendorUser/" . $user['User_Id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                                            <a href="<?php echo base_url() . "admin/user/deleteVendorUser/" . $user['User_Id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                                                            <?php if ($user['Status'] == "0") { ?>
                                                                                <a href="<?php echo base_url() . "admin/user/enableUser/" . $user['User_Id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-dark btn-xs"><i class="fa fa-user"></i> Enable User </a>
                                                                            <?php } else { ?>
                                                                                <a href="<?php echo base_url() . "admin/user/disableUser/" . $user['User_Id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-dark btn-xs"><i class="fa fa-user"></i> Disable User </a>
                                                                            <?php } ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <tr>
                                                                    <td colspan="6"><center>No vendor users found</center></td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content44" aria-labelledby="profile-tab">
                                                    <table id="" class="table table-striped table-bordered dt-responsive nowrap display" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl No</th>
                                                                <th>User Name</th>
                                                                <th>Email</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if (!empty($influencer)) {
                                                                $counter = 0;
                                                                foreach ($influencer as $user) {
                                                                    $counter++;
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $counter; ?></td>
                                                                        <td><?php echo $user['Username']; ?></td>
                                                                        <td><?php echo $user['Email']; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            $status = $user['Status'];
                                                                            if ($status == "0") {
                                                                                $userStatus = "Disabled";
                                                                            } else {
                                                                                $userStatus = "User Active";
                                                                            }
                                                                            ?>
                                                                            <a class="btn btn-dark btn-xs"><i class="fa fa-user"></i> <?php echo $userStatus; ?> </a>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo base_url() . "admin/user/viewSocialUser/" . $user['User_Id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View </a>
                                                                            <a href="<?php echo base_url() . "admin/user/editSocialUser/" . $user['User_Id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                                            <a href="<?php echo base_url() . "admin/user/deleteInfluencerUser/" . $user['User_Id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                                                            <?php if ($user['Status'] == "0") { ?>
                                                                                <a href="<?php echo base_url() . "admin/user/enableUser/" . $user['User_Id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-dark btn-xs"><i class="fa fa-user"></i> Enable User </a>
                                                                            <?php } else { ?>
                                                                                <a href="<?php echo base_url() . "admin/user/disableUser/" . $user['User_Id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-dark btn-xs"><i class="fa fa-user"></i> Disable User </a>
                                                                            <?php } ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <tr>
                                                                    <td colspan="6"><center>No Influencer users found</center></td>
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

            $(document).ready(function () {
                $('table.nowrap').DataTable();
            });
        </script>
    </body>

</html>