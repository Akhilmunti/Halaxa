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

                            <div class="col-md-9">
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


                                <div class="theme-card">
                                    <div class="row mb-2 no-gutters">
                                        <div class="col-md-8 p-2">
                                            <h6 class="followers-head-text">
                                                You may be intersted to follow   
                                            </h6>
                                        </div>
                                        <div class="col-md-4 p-2">
                                            <input onkeyup="checkInput(this);" id="searchMembers" placeholder="Search Members" class="form-control form-control-search" />
                                        </div>
                                        <!--                                        <div class="col-md-1 p-2">
                                                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-check mr-1"></i> Submit</button>
                                                                                </div>-->
                                    </div>
                                </div>

                                <div class="theme-card p-2">

                                    <div class="row no-gutters" id="membersUL">

                                        <?php
                                        foreach ($users as $key => $user) {
                                            $profileLink = base_url('profile/index/') . $user->User_Id;
                                            $imageLink = base_url('assets/photo/') . $user->Photo;
                                            $placeholderLink = base_url('assets/halaxa_dashboard/images/user-img.png');
                                            $requestLink = base_url('social/request/Connected/') . $user->User_Id;
                                            $mFollowers = $this->users_model->get_connections('Connected', $user->User_Id);
                                            if (file_exists($imageLink)) {
                                                $image = $imageLink;
                                            } else {
                                                $image = $placeholderLink;
                                            }
                                            if (!empty($mFollowers)) {
                                                $followers = count($mFollowers);
                                            } else {
                                                $followers = "0";
                                            }
                                            if (!empty($user->Designation)) {
                                                $designation = $user->Designation;
                                            } else {
                                                $designation = "Not Specified.";
                                            }
                                            if (!empty($user->Locations)) {
                                                $location = $user->Locations;
                                            } else {
                                                $location = "Not Specified.";
                                            }
                                            $self = $this->users_model->self_invitations('Requested');
                                            $sel = array();
                                            $i = 0;
                                            foreach ($self as $val) {
                                                $sel[$i++] = $val->Connected_User_Id; //list of user for whom we send requests
                                            }
                                            $self_request = $sel;
                                            $connect = $this->users_model->self_invitations('Connected');
                                            $conn = array();
                                            $i = 0;
                                            foreach ($connect as $val) {
                                                $conn[$i++] = $val->Connected_User_Id; //list of user for whom we send requests
                                            }
                                            $connect_request = $conn;
                                            if (in_array($user->User_Id, $self_request)) {
                                                $statusBtn = '<a href="#" class="btn btn-community btn-block">Request Sent</a>';
                                            } elseif (in_array($user->User_Id, $connect_request)) {
                                                $statusBtn = '<a href="#" class="btn btn-community btn-block">Following</a>';
                                            } else {
                                                $statusBtn = '<a href="' . $requestLink . '" class="btn btn-community btn-block">Follow</a>';
                                            }
                                            ?>
                                            <div class="col-md-4">
                                                <div class="card community-card">
                                                    <div class="card-content profile-content">
                                                        <div class="row p-3">
                                                            <div class="col-md-12">
                                                                <a href="<?php echo base_url(); ?>profile/index/<?php echo $user->User_Id; ?>">
                                                                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/profile-card-back.png'); ?>" />
                                                                    <img class="rounded-circle profile-card-img" src="<?php echo $image; ?>" />
                                                                </a>
                                                            </div>
                                                            <div class="col-md-12 mt-2">
                                                                <div class="row">
                                                                    <div class="col-md-10">
                                                                        <h6 class="profile-card-username"><?php echo $user->Username; ?></h6>
                                                                    </div>
                                                                    <div class="col-md-2 text-center">
                                                                        <a class="profile-card-settings">
                                                                            <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/post-settings-icon.png'); ?>" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <p class="profile-info"><?php echo $designation ?></p>
                                                                <p class="profile-info"><?php echo $followers; ?> Followers</p>
                                                                <?php echo $statusBtn; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    <?php $this->load->view('social/halaxa_partials/scripts'); ?>

    <script type="text/javascript">
        function checkInput(obj) {
            //alert(obj.value);
            var searchTerm = obj.value;
            $.post("<?php echo base_url('social/getUsers/'); ?>",
                    {
                        member: searchTerm,
                    },
                    function (data, status) {
                        $('#membersUL').html(data);
                    });
        }
    </script>

</body>

</html>