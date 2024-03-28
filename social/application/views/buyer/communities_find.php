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

                            <div class="clearfix"></div>

                            <div class="col-md-9 mb-3">
                                <div class="theme-card p-2">

                                    <div class="row mt-2 mb-2">
                                        <div class="col-md-6">
                                            <h6 class="community-head-text ml-3 mt-2">
                                                You may be intersted in the following communities
                                            </h6>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <select onchange="goToURL(); return false;" id="type" class="community-select form-control mx-auto">
                                                        <option <?php
                                                        if ($type == "all") {
                                                            echo "selected";
                                                        }
                                                        ?> value="all">Partner Type</option>
                                                        <option <?php
                                                        if ($type == "hotel") {
                                                            echo "selected";
                                                        }
                                                        ?> value="hotel">Hotel</option>
                                                        <option <?php
                                                        if ($type == "school") {
                                                            echo "selected";
                                                        }
                                                        ?> value="school">School</option>
                                                        <option <?php
                                                        if ($type == "association") {
                                                            echo "selected";
                                                        }
                                                        ?> value="association">Association</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input id="searchCom" class="form-control community-select" placeholder="Search Communities" />
                                                </div>
                                                <div class="col-md-4">
                                                    <button onclick="goToSearchText(); return false;" style="height: 30px" class="btn btn-danger"><i class="fa fa-check mr-2"></i>Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-9">
                                <div class="theme-card p-2">
                                    <div class="row no-gutters">
                                        <?php if (!empty($all)) { ?>
                                            <?php
                                            $i = 1;
                                            foreach ($all as $one) {
                                                $mUserId = $this->session->userdata('User_Id');
                                                //$memberData = $this->users_model->get_user_by_id('User_Id');
                                                $request = $this->association_model->checkRequest($mUserId, $one['Com_key']);
                                                $status = $request['Request_status'];
                                                $reject = $request['reject_by_user'];
                                                $members = $this->association_model->getAllMembers($one['Com_key']);
                                                $approve = $request['approval'];
                                                $ratings = $this->school_model->getSchoolRatings($one['Com_key']);
                                                $mRatingValue = 0;

                                                if (!empty($ratings)) {
                                                    foreach ($ratings as $key => $rat) {
                                                        $mRatingValue += $rat['stars'];
                                                    }

                                                    $mRatingValue = $mRatingValue / count($ratings);
                                                }

                                                //echo $mRatingValue;
                                                ?>

                                                <?php if ($approve != "1") { ?>

                                                    <?php if ($search != "") { ?>
                                                        <?php if (stripos($one['Groupname'], $search) !== FALSE) { ?>
                                                            <div class="col-md-6">
                                                                <div class="card community-card">
                                                                    <div class="card-content community-content">
                                                                        <div class="row">
                                                                            <div class="col-md-4">

                                                                                <?php
                                                                                $mPic = base_url('uploads/' . $one['Photo']);
                                                                                if (file_exists($mPic)) {
                                                                                    ?>
                                                                                    <img class="img-fluid community-img" src="<?php echo base_url(); ?>uploads/<?php echo $one['Photo']; ?>" />
                                                                                <?php } else { ?>
                                                                                    <img class="img-fluid community-img" src="http://via.placeholder.com/100x100" />
                                                                                <?php } ?>
                                                                            </div>
                                                                            <div class="col-md-8 no-padding">


                                                                                <div class="row">
                                                                                    <div class="col-md-5">
                                                                                        <p class="community-partner-name"><?php echo $one['Groupname']; ?></p>
                                                                                        <p class="community-partner-type"><?php echo $one['Partner_type'] . " Partner"; ?></p>
                                                                                    </div>
                                                                                    <div class="col-md-7 text-center">
                                                                                        <div class="mt-2">
                                                                                            <?php if ($mRatingValue == 1) { ?>
                                                                                                <div class="rating-readonly">
                                                                                                    <i class="fa fa-star"></i>
                                                                                                </div>
                                                                                            <?php } elseif ($mRatingValue == 2) { ?>
                                                                                                <div class="rating-readonly">
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                </div>
                                                                                            <?php } elseif ($mRatingValue == 3) { ?>
                                                                                                <div class="rating-readonly">
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                </div>
                                                                                            <?php } elseif ($mRatingValue == 4) { ?>
                                                                                                <div class="rating-readonly">
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                </div>
                                                                                            <?php } elseif ($mRatingValue == 5) { ?>
                                                                                                <div class="rating-readonly">
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                </div>
                                                                                            <?php } else { ?>
                                                                                                <div class="rating-readonly-empty">
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                </div>
                                                                                            <?php } ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <p class="community-desc">
                                                                                    <?php echo $one['group_description']; ?>
                                                                                </p>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <?php
                                                                                        $i = 1;
                                                                                        foreach (array_slice($members, 0, 4) as $member) {
                                                                                            $memberData = $this->users_model->get_user_by_id($member['User_Id']);
                                                                                            $memberPicture = base_url('assets/photo/') . $memberData->Photo;
                                                                                            if (@getimagesize($memberPicture)) {
                                                                                                $memberPicture = $memberPicture;
                                                                                            } else {
                                                                                                $memberPicture = base_url('assets/images/user.png');
                                                                                            }
                                                                                            ?>
                                                                                            <a target="_blank" href="<?php echo base_url('profile/index/') . $member['User_Id']; ?>">
                                                                                                <img class="img-fluid rounded-circle community-followers-img" src="<?php echo $memberPicture; ?>" />
                                                                                            </a>
                                                                                        <?php }
                                                                                        ?>
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <?php if ($reject == "-1") { ?>
                                                                                            <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                        <?php } else { ?>
                                                                                            <?php if ($request == "") {
                                                                                                ?>
                                                                                                <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                            <?php } else { ?>
                                                                                                <?php if ($approve == "1") {
                                                                                                    ?>
                                                                                                    <a href="#" class="btn btn-community btn-block">Following</a>
                                                                                                <?php } else if ($status == "1") {
                                                                                                    ?>
                                                                                                    <!--                                                                                            <a href="#" class="btn btn-default btn-block btn-sm">Requested</a>-->
                                                                                                <?php } else {
                                                                                                    ?>
                                                                                                    <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                                <?php } ?>
                                                                                            <?php } ?> 
                                                                                            <?php if ($reject == "1") {
                                                                                                ?>
                                                                                                <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                            <?php } else {
                                                                                                ?>
                            <!--                                                                                        <a href="<?php echo base_url() . "communities/notinterested/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-block btn-danger btn-sm">Not Interested</a>-->
                                                                                            <?php } ?>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <?php
                                                        if ($type == "all") {
                                                            ?>
                                                            <div class="col-md-6">
                                                                <div class="card community-card">
                                                                    <div class="card-content community-content">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <?php
                                                                                $mPic = base_url('uploads/' . $one['Photo']);
                                                                                if (file_exists($mPic)) {
                                                                                    ?>
                                                                                <img class="img-fluid community-img" src="<?php echo base_url(); ?>uploads/<?php echo $one['Photo']; ?>" />
                                                                                <?php } else { ?>
                                                                                    <img class="img-fluid community-img" src="http://via.placeholder.com/100x100" />
                                                                                <?php } ?>
                                                                            </div>
                                                                            <div class="col-md-8 no-padding">


                                                                                <div class="row">
                                                                                    <div class="col-md-5">
                                                                                        <p class="community-partner-name"><?php echo $one['Groupname']; ?></p>
                                                                                        <p class="community-partner-type"><?php echo $one['Partner_type'] . " Partner"; ?></p>
                                                                                    </div>
                                                                                    <div class="col-md-7 text-center">
                                                                                        <div class="mt-2">
                                                                                            <?php if ($mRatingValue == 1) { ?>
                                                                                                <div class="rating-readonly">
                                                                                                    <i class="fa fa-star"></i>
                                                                                                </div>
                                                                                            <?php } elseif ($mRatingValue == 2) { ?>
                                                                                                <div class="rating-readonly">
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                </div>
                                                                                            <?php } elseif ($mRatingValue == 3) { ?>
                                                                                                <div class="rating-readonly">
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                </div>
                                                                                            <?php } elseif ($mRatingValue == 4) { ?>
                                                                                                <div class="rating-readonly">
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                </div>
                                                                                            <?php } elseif ($mRatingValue == 5) { ?>
                                                                                                <div class="rating-readonly">
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                </div>
                                                                                            <?php } else { ?>
                                                                                                <div class="rating-readonly-empty">
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                </div>
                                                                                            <?php } ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <p class="community-desc">
                                                                                    <?php echo $one['group_description']; ?>
                                                                                </p>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <?php
                                                                                        $i = 1;
                                                                                        foreach (array_slice($members, 0, 4) as $member) {
                                                                                            $memberData = $this->users_model->get_user_by_id($member['User_Id']);
                                                                                            $memberPicture = base_url('assets/photo/') . $memberData->Photo;
                                                                                            if (@getimagesize($memberPicture)) {
                                                                                                $memberPicture = $memberPicture;
                                                                                            } else {
                                                                                                $memberPicture = base_url('assets/images/user.png');
                                                                                            }
                                                                                            ?>
                                                                                            <a target="_blank" href="<?php echo base_url('profile/index/') . $member['User_Id']; ?>">
                                                                                                <img class="img-fluid rounded-circle community-followers-img" src="<?php echo $memberPicture; ?>" />
                                                                                            </a>
                                                                                        <?php }
                                                                                        ?>
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <?php if ($reject == "-1") { ?>
                                                                                            <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                        <?php } else { ?>
                                                                                            <?php if ($request == "") {
                                                                                                ?>
                                                                                                <a class="btn btn-community btn-block" href="#" id="dropdownMenuButton" data-toggle="dropdown">
                                                                                                    Join
                                                                                                </a>
                                                                                                <div class="dropdown-menu anchor" aria-labelledby="dropdownMenuButton">
                                                                                                    <a class="dropdown-item" href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type'] . "/" . "Student"; ?>">As Student</a>
                                                                                                    <a class="dropdown-item" href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type'] . "/" . "Alumni"; ?>">As Alumni</a>
                                                                                                    <a class="dropdown-item" href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type'] . "/" . "Staff"; ?>">As Staff</a>
                                                                                                </div>
                                                                                            <?php } else { ?>
                                                                                                <?php if ($approve == "1") {
                                                                                                    ?>
                                                                                                    <a href="#" class="btn btn-community btn-block">Following</a>
                                                                                                <?php } else if ($status == "1") {
                                                                                                    ?>
                                                                                                    <a href="#" class="btn btn-community btn-block">Requested</a>
                                                                                                <?php } else {
                                                                                                    ?>
                                                                                                    <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                                <?php } ?>
                                                                                            <?php } ?> 
                                                                                            <?php if ($reject == "1") {
                                                                                                ?>
                                                                                                <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                            <?php } else {
                                                                                                ?>
                            <!--                                                                                        <a href="<?php echo base_url() . "communities/notinterested/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-block btn-danger btn-sm">Not Interested</a>-->
                                                                                            <?php } ?>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } elseif ($type == "hotel") { ?>

                                                            <?php if ($one['Partner_type'] == "hotel") { ?>
                                                                <div class="col-md-6">
                                                                    <div class="card community-card">
                                                                        <div class="card-content community-content">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <img class="img-fluid community-img" src="<?php echo base_url(); ?>uploads/<?php echo $one['Photo']; ?>" />
                                                                                </div>
                                                                                <div class="col-md-8 no-padding">


                                                                                    <div class="row">
                                                                                        <div class="col-md-5">
                                                                                            <p class="community-partner-name"><?php echo $one['Groupname']; ?></p>
                                                                                            <p class="community-partner-type"><?php echo $one['Partner_type'] . " Partner"; ?></p>
                                                                                        </div>
                                                                                        <div class="col-md-7 text-center">
                                                                                            <div class="mt-2">
                                                                                                <?php if ($mRatingValue == 1) { ?>
                                                                                                    <div class="rating-readonly">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </div>
                                                                                                <?php } elseif ($mRatingValue == 2) { ?>
                                                                                                    <div class="rating-readonly">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </div>
                                                                                                <?php } elseif ($mRatingValue == 3) { ?>
                                                                                                    <div class="rating-readonly">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </div>
                                                                                                <?php } elseif ($mRatingValue == 4) { ?>
                                                                                                    <div class="rating-readonly">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </div>
                                                                                                <?php } elseif ($mRatingValue == 5) { ?>
                                                                                                    <div class="rating-readonly">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </div>
                                                                                                <?php } else { ?>
                                                                                                    <div class="rating-readonly-empty">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </div>
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <p class="community-desc">
                                                                                        <?php echo $one['group_description']; ?>
                                                                                    </p>
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <?php
                                                                                            $i = 1;
                                                                                            foreach (array_slice($members, 0, 4) as $member) {
                                                                                                $memberData = $this->users_model->get_user_by_id($member['User_Id']);
                                                                                                $memberPicture = base_url('assets/photo/') . $memberData->Photo;
                                                                                                if (@getimagesize($memberPicture)) {
                                                                                                    $memberPicture = $memberPicture;
                                                                                                } else {
                                                                                                    $memberPicture = base_url('assets/images/user.png');
                                                                                                }
                                                                                                ?>
                                                                                                <a target="_blank" href="<?php echo base_url('profile/index/') . $member['User_Id']; ?>">
                                                                                                    <img class="img-fluid rounded-circle community-followers-img" src="<?php echo $memberPicture; ?>" />
                                                                                                </a>
                                                                                            <?php }
                                                                                            ?>
                                                                                        </div>
                                                                                        <div class="col-md-5">
                                                                                            <?php if ($reject == "-1") { ?>
                                                                                                <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                            <?php } else { ?>
                                                                                                <?php if ($request == "") {
                                                                                                    ?>
                                                                                                    <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                                <?php } else { ?>
                                                                                                    <?php if ($approve == "1") {
                                                                                                        ?>
                                                                                                        <a href="#" class="btn btn-community btn-block">Following</a>
                                                                                                    <?php } else if ($status == "1") {
                                                                                                        ?>
                                                                                                        <a href="#" class="btn btn-community btn-block">Requested</a>
                                                                                                    <?php } else {
                                                                                                        ?>
                                                                                                        <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                                    <?php } ?>
                                                                                                <?php } ?> 
                                                                                                <?php if ($reject == "1") {
                                                                                                    ?>
                                                                                                    <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                                <?php } else {
                                                                                                    ?>
                                <!--                                                                                        <a href="<?php echo base_url() . "communities/notinterested/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-block btn-danger btn-sm">Not Interested</a>-->
                                                                                                <?php } ?>
                                                                                            <?php } ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>

                                                        <?php } elseif ($type == "school") { ?>

                                                            <?php if ($one['Partner_type'] == "school") { ?>
                                                                <div class="col-md-6">
                                                                    <div class="card community-card">
                                                                        <div class="card-content community-content">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <img class="img-fluid community-img" src="<?php echo base_url(); ?>uploads/<?php echo $one['Photo']; ?>" />
                                                                                </div>
                                                                                <div class="col-md-8 no-padding">


                                                                                    <div class="row">
                                                                                        <div class="col-md-5">
                                                                                            <p class="community-partner-name"><?php echo $one['Groupname']; ?></p>
                                                                                            <p class="community-partner-type"><?php echo $one['Partner_type'] . " Partner"; ?></p>
                                                                                        </div>
                                                                                        <div class="col-md-7 text-center">
                                                                                            <div class="mt-2">
                                                                                                <?php if ($mRatingValue == 1) { ?>
                                                                                                    <div class="rating-readonly">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </div>
                                                                                                <?php } elseif ($mRatingValue == 2) { ?>
                                                                                                    <div class="rating-readonly">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </div>
                                                                                                <?php } elseif ($mRatingValue == 3) { ?>
                                                                                                    <div class="rating-readonly">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </div>
                                                                                                <?php } elseif ($mRatingValue == 4) { ?>
                                                                                                    <div class="rating-readonly">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </div>
                                                                                                <?php } elseif ($mRatingValue == 5) { ?>
                                                                                                    <div class="rating-readonly">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </div>
                                                                                                <?php } else { ?>
                                                                                                    <div class="rating-readonly-empty">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </div>
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <p class="community-desc">
                                                                                        <?php echo $one['group_description']; ?>
                                                                                    </p>
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <?php
                                                                                            $i = 1;
                                                                                            foreach (array_slice($members, 0, 4) as $member) {
                                                                                                $memberData = $this->users_model->get_user_by_id($member['User_Id']);
                                                                                                $memberPicture = base_url('assets/photo/') . $memberData->Photo;
                                                                                                if (@getimagesize($memberPicture)) {
                                                                                                    $memberPicture = $memberPicture;
                                                                                                } else {
                                                                                                    $memberPicture = base_url('assets/images/user.png');
                                                                                                }
                                                                                                ?>
                                                                                                <a target="_blank" href="<?php echo base_url('profile/index/') . $member['User_Id']; ?>">
                                                                                                    <img class="img-fluid rounded-circle community-followers-img" src="<?php echo $memberPicture; ?>" />
                                                                                                </a>
                                                                                            <?php }
                                                                                            ?>
                                                                                        </div>
                                                                                        <div class="col-md-5">
                                                                                            <?php if ($reject == "-1") { ?>
                                                                                                <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                            <?php } else { ?>
                                                                                                <?php if ($request == "") {
                                                                                                    ?>
                                                                                                    <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                                <?php } else { ?>
                                                                                                    <?php if ($approve == "1") {
                                                                                                        ?>
                                                                                                        <a href="#" class="btn btn-community btn-block">Following</a>
                                                                                                    <?php } else if ($status == "1") {
                                                                                                        ?>
                                                                                                        <a href="#" class="btn btn-community btn-block">Requested</a>
                                                                                                    <?php } else {
                                                                                                        ?>
                                                                                                        <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                                    <?php } ?>
                                                                                                <?php } ?> 
                                                                                                <?php if ($reject == "1") {
                                                                                                    ?>
                                                                                                    <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                                <?php } else {
                                                                                                    ?>
                                <!--                                                                                        <a href="<?php echo base_url() . "communities/notinterested/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-block btn-danger btn-sm">Not Interested</a>-->
                                                                                                <?php } ?>
                                                                                            <?php } ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>

                                                        <?php } elseif ($type == "association") { ?>

                                                            <?php if ($one['Partner_type'] == "association") { ?>
                                                                <div class="col-md-6">
                                                                    <div class="card community-card">
                                                                        <div class="card-content community-content">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <img class="img-fluid community-img" src="<?php echo base_url(); ?>uploads/<?php echo $one['Photo']; ?>" />
                                                                                </div>
                                                                                <div class="col-md-8 no-padding">


                                                                                    <div class="row">
                                                                                        <div class="col-md-5">
                                                                                            <p class="community-partner-name"><?php echo $one['Groupname']; ?></p>
                                                                                            <p class="community-partner-type"><?php echo $one['Partner_type'] . " Partner"; ?></p>
                                                                                        </div>
                                                                                        <div class="col-md-7 text-center">
                                                                                            <div class="mt-2">
                                                                                                <?php if ($mRatingValue == 1) { ?>
                                                                                                    <div class="rating-readonly">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </div>
                                                                                                <?php } elseif ($mRatingValue == 2) { ?>
                                                                                                    <div class="rating-readonly">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </div>
                                                                                                <?php } elseif ($mRatingValue == 3) { ?>
                                                                                                    <div class="rating-readonly">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </div>
                                                                                                <?php } elseif ($mRatingValue == 4) { ?>
                                                                                                    <div class="rating-readonly">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </div>
                                                                                                <?php } elseif ($mRatingValue == 5) { ?>
                                                                                                    <div class="rating-readonly">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </div>
                                                                                                <?php } else { ?>
                                                                                                    <div class="rating-readonly-empty">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </div>
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <p class="community-desc">
                                                                                        <?php echo $one['group_description']; ?>
                                                                                    </p>
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <?php
                                                                                            $i = 1;
                                                                                            foreach (array_slice($members, 0, 4) as $member) {
                                                                                                $memberData = $this->users_model->get_user_by_id($member['User_Id']);
                                                                                                $memberPicture = base_url('assets/photo/') . $memberData->Photo;
                                                                                                if (@getimagesize($memberPicture)) {
                                                                                                    $memberPicture = $memberPicture;
                                                                                                } else {
                                                                                                    $memberPicture = base_url('assets/images/user.png');
                                                                                                }
                                                                                                ?>
                                                                                                <a target="_blank" href="<?php echo base_url('profile/index/') . $member['User_Id']; ?>">
                                                                                                    <img class="img-fluid rounded-circle community-followers-img" src="<?php echo $memberPicture; ?>" />
                                                                                                </a>
                                                                                            <?php }
                                                                                            ?>
                                                                                        </div>
                                                                                        <div class="col-md-5">
                                                                                            <?php if ($reject == "-1") { ?>
                                                                                                <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                            <?php } else { ?>
                                                                                                <?php if ($request == "") {
                                                                                                    ?>
                                                                                                    <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                                <?php } else { ?>
                                                                                                    <?php if ($approve == "1") {
                                                                                                        ?>
                                                                                                        <a href="#" class="btn btn-community btn-block">Following</a>
                                                                                                    <?php } else if ($status == "1") {
                                                                                                        ?>
                                                                                                        <a href="#" class="btn btn-community btn-block">Requested</a>
                                                                                                    <?php } else {
                                                                                                        ?>
                                                                                                        <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                                    <?php } ?>
                                                                                                <?php } ?> 
                                                                                                <?php if ($reject == "1") {
                                                                                                    ?>
                                                                                                    <a href="<?php echo base_url() . "communities/request/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-community btn-block">Join</a>
                                                                                                <?php } else {
                                                                                                    ?>
                                <!--                                                                                        <a href="<?php echo base_url() . "communities/notinterested/" . $one['Com_key'] . "/" . $one['Partner_type']; ?>" class="btn btn-block btn-danger btn-sm">Not Interested</a>-->
                                                                                                <?php } ?>
                                                                                            <?php } ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>

                                                        <?php } ?>

                                                    <?php } ?>

                                                <?php } ?>

                                            <?php } ?>

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

    <script>

        function goToURL() {
            var mType = document.getElementById("type").value;
            location.href = "<?php echo base_url('communities/find/'); ?>" + mType;
        }

        function goToSearchText() {
            var mType = document.getElementById("searchCom").value;
            location.href = "<?php echo base_url('communities/findSearch/'); ?>" + mType;
        }
    </script>

</body>

</html>