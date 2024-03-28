<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('partner/halaxa/header'); ?>

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('partner/halaxa/navbar'); ?>

            <div class="wrapper">
                <!-- Sidebar -->
                <?php $this->load->view('partner/halaxa/sidebar'); ?>

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $this->load->view('partner/halaxa/alerts'); ?>
                            </div>
                            <div class="col-md-8 scrolling-div-y">
                                <div class="theme-card mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="post-card p-3">
                                                <span class="text-dark-theme-bold font">Members (<?php echo count($members) ?>)</span>
                                            </div>
                                            <hr class="hr-theme">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="post-card p-3">
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <span class="text-dark-theme-bold font"><i class="fa fa-search"></i></span>
                                                    </div>
                                                    <div class="col-md-11">
                                                        <input placeholder="Search members" class="form-control search-members" />
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="hr-theme">
                                        </div>
                                        <div class="col-md-12">
                                            <?php
                                            foreach ($members as $key => $member) {
                                                $mGetUser = $this->users_model->get_user_by_id($member['User_Id']);
                                                $mName = $mGetUser->Name;
                                                $mPhoto = $mGetUser->Photo;
                                                $mPhotoUrl = base_url('assets/photo/') . $mGetUser->Photo;
                                                $mDesignation = $mGetUser->Designation;
                                                $mLocation = $mGetUser->Locations;
                                                $mFid = $member['F_Id'];
                                                $mUserAs = $member['User_As'];
                                                ?>
                                                <div class="posts p-3">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <a href="<?php echo base_url(); ?>profile/index/<?php echo $val->Posted_User_Id; ?>"> 
                                                                <?php
                                                                if (!empty($mPhoto)) {
                                                                    ?>
                                                                    <img height="50" src="<?php echo $mPhotoUrl; ?>" class="rounded-circle" alt="<?php echo $mName; ?>">
                                                                <?php } else { ?>
                                                                    <img height="50" class="rounded-circle" src="<?php echo base_url(); ?>assets/images/user.png" />
                                                                <?php } ?>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item">
                                                                    <a class="no-decoration" target="_blank" href="<?php echo base_url(); ?>profile/index/<?php echo $val->Posted_User_Id; ?>">
                                                                        <p class="post-user-text text-capitalize">
                                                                            <?php echo $mName; ?>
                                                                        </p>
                                                                        <p class="post-user-post text-capitalize">
                                                                            <?php echo $mUserAs; ?>
                                                                        </p>
                                                                        <p class="post-user-post text-capitalize mb-0">
                                                                            <?php echo $mLocation; ?>
                                                                        </p>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-5 text-right pt-2">
                                                            <a href="<?php echo base_url('partner/requests/reject/') . $mFid; ?>" class="btn btn-white text-danger">Remove</a>
                                                            <a href="#" class="ml-3 mr-3">
                                                                <img height="12" src="<?php echo base_url('assets/halaxa_partner/images/comment-member.png'); ?>" />
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="hr-theme">
                                            <?php } ?>

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
        <?php $this->load->view('partner/halaxa/scripts'); ?>
    </body>

</html>