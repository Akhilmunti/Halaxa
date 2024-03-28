<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('social/halaxa_partials/header'); ?>

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('social/halaxa_partials/navbar'); ?>

            <div class="wrapper">
                <!-- Sidebar -->
                <?php $this->load->view('social/halaxa_partials/sidebar'); ?>

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-md-12">
                                <?php
                                $result = $this->session->flashdata('result');
                                ?>
                                <?php if ($result) { ?>
                                    <div class="alert alert-success">
                                        <?php echo $result ?>
                                    </div>
                                <?php } ?>

                            </div>

                            <div class="col-md-9">
                                <div class="theme-card p-2">

                                    <div class="row no-gutters">

                                        <?php
                                        if ($connections) {
                                            foreach ($connections as $val) {
                                                $mGetConnectionDetails = $this->users_model->getConnectionByConnectedUserId($val->User_Id);
                                                $mFollowers = $this->users_model->get_connections('Connected', $val->User_Id);
                                                ?> 
                                                <div class="col-md-4">
                                                    <div class="card community-card">
                                                        <div class="card-content profile-content">
                                                            <div class="row p-3">
                                                                <div class="col-md-12">
                                                                    <a href="<?php echo base_url(); ?>profile/index/<?php echo $val->User_Id; ?>">
                                                                        <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/profile-card-back.png'); ?>" />
                                                                        <?php
                                                                        $pic = $val->Photo;
                                                                        if (file_exists($pic)) {
                                                                            ?>
                                                                            <img class="rounded-circle profile-card-img" src="<?php echo base_url(); ?>assets/photo/<?php echo $val->Photo; ?>" />
                                                                        <?php } else { ?>
                                                                            <img class="rounded-circle profile-card-img" src="<?php echo base_url('assets/halaxa_dashboard/images/user-img.png'); ?>" />
                                                                        <?php } ?> 
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-12 mt-2">
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <h6 class="profile-card-username"><?php echo $val->Name; ?></h6>
                                                                        </div>
                                                                        <div class="col-md-2 text-center">
                                                                            <a class="profile-card-settings">
                                                                                <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/post-settings-icon.png'); ?>" />
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <p class="profile-info">
                                                                        <?php
                                                                        if (!empty($val->Company_name)) {
                                                                            echo $val->Company_name;
                                                                        } else {
                                                                            echo "Not specified";
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                    <p class="profile-info">
                                                                        <?php
                                                                        if (!empty($mFollowers)) {
                                                                            echo count($mFollowers);
                                                                        } else {
                                                                            echo "0";
                                                                        }
                                                                        ?>
                                                                        followers
                                                                    </p>
                                                                    <a href="<?php echo base_url(); ?>social/update_invitations/Rejected/<?php echo $mGetConnectionDetails['C_ID']; ?>" class="btn btn-community btn-block">Unfollow </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Main -->

    <!-- jQuery  -->
    <?php $this->load->view('social/halaxa_partials/scripts'); ?>

</body>

</html>