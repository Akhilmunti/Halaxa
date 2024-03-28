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

                                    <div class="row mt-2 mb-3">
                                        <div class="col-md-4 mt-2">
                                            <h6 class="community-head-text ml-3">
                                                My Communities  
                                                <span class="ml-3">
                                                    <?php
                                                    if (!empty($myComs)) {
                                                        echo count($myComs);
                                                    } else {
                                                        echo "0";
                                                    }
                                                    ?>
                                                </span>
                                            </h6>
                                        </div>
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
                                            <div class="input-group mb-3">
                                                <input id="searchCom" type="text" class="form-control community-select" placeholder="Search Communities" aria-label="" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <a href="javascript:void(0)" onclick="goToSearchText(); return false;" class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row no-gutters">
                                        <?php if (!empty($myComs)) { ?>
                                            <?php
                                            $i = 1;
                                            foreach ($myComs as $my) {
                                                $community = $this->association_model->getCommunity($my['Com_key']);
                                                $members = $this->association_model->getAllMembers($my['Com_key']);
                                                $photo = $community['Photo'];
                                                $user = $community['Groupname'];
                                                $key = $my['Com_key'];
                                                $feeds = $this->association_model->getAllConversationsByPartnerid($my['Com_key']);
                                                $photo = base_url('uploads/') . $community['Photo'];
                                                if (@getimagesize($photo)) {
                                                    $photo = $photo;
                                                } else {
                                                    $photo = base_url('assets/images/user.png');
                                                }
                                                $ratings = $this->school_model->getSchoolRatings($my['Com_key']);
                                                $mRatingValue = 0;

                                                if (!empty($ratings)) {
                                                    foreach ($ratings as $key => $rat) {
                                                        $mRatingValue += $rat['stars'];
                                                    }

                                                    $mRatingValue = $mRatingValue / count($ratings);
                                                }
                                                ?>

                                                <?php if ($search != "") { ?>
                                                    <?php if (stripos($community['Groupname'], $search) !== FALSE) { ?>
                                                        <div class="col-md-6">
                                                            <div class="card community-card">
                                                                <div class="card-content community-content">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <img class="img-fluid community-img" src="<?php echo $photo; ?>" />
                                                                        </div>
                                                                        <div class="col-md-8 no-padding">


                                                                            <div class="row">
                                                                                <div class="col-md-5">
                                                                                    <p class="community-partner-name"><?php echo $community['Groupname'] ?></p>
                                                                                    <p class="community-partner-type"><?php echo $community['Partner_type'] . " Partner"; ?></p>
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
                                                                                <?php echo $community['group_description'] ?>
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
                                                                                    <a href="<?php echo base_url('communities/getTopics/' . $my['Com_key']); ?>" class="btn btn-community btn-block">View</a>
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
                                                                            <img class="img-fluid community-img" src="<?php echo $photo; ?>" />
                                                                        </div>
                                                                        <div class="col-md-8 no-padding">


                                                                            <div class="row">
                                                                                <div class="col-md-5">
                                                                                    <p class="community-partner-name"><?php echo $community['Groupname'] ?></p>
                                                                                    <p class="community-partner-type"><?php echo $community['Partner_type'] . " Partner"; ?></p>
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
                                                                                <?php echo $community['group_description'] ?>
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
                                                                                    <a href="<?php echo base_url('communities/getTopics/' . $my['Com_key']); ?>" class="btn btn-community btn-block">View</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } elseif ($type == "hotel") { ?>

                                                        <?php if ($community['Partner_type'] == "hotel") { ?>
                                                            <div class="col-md-6">
                                                                <div class="card community-card">
                                                                    <div class="card-content community-content">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <img class="img-fluid community-img" src="<?php echo $photo; ?>" />
                                                                            </div>
                                                                            <div class="col-md-8 no-padding">


                                                                                <div class="row">
                                                                                    <div class="col-md-5">
                                                                                        <p class="community-partner-name"><?php echo $community['Groupname'] ?></p>
                                                                                        <p class="community-partner-type"><?php echo $community['Partner_type'] . " Partner"; ?></p>
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
                                                                                    <?php echo $community['group_description'] ?>
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
                                                                                        <a href="<?php echo base_url('communities/getTopics/' . $my['Com_key']); ?>" class="btn btn-community btn-block">View</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>

                                                    <?php } elseif ($type == "school") { ?>

                                                        <?php if ($community['Partner_type'] == "school") { ?>
                                                            <div class="col-md-6">
                                                                <div class="card community-card">
                                                                    <div class="card-content community-content">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <img class="img-fluid community-img" src="<?php echo $photo; ?>" />
                                                                            </div>
                                                                            <div class="col-md-8 no-padding">

                                                                                <div class="row">
                                                                                    <div class="col-md-5">
                                                                                        <p class="community-partner-name"><?php echo $community['Groupname'] ?></p>
                                                                                        <p class="community-partner-type"><?php echo $community['Partner_type'] . " Partner"; ?></p>
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
                                                                                    <?php echo $community['group_description'] ?>
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
                                                                                            <a target="_blank" href="#">
                                                                                                <img class="img-fluid rounded-circle community-followers-img" src="<?php echo $memberPicture; ?>" />
                                                                                            </a>
                                                                                        <?php }
                                                                                        ?>  
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <a href="<?php echo base_url('communities/getTopics/' . $my['Com_key']); ?>" class="btn btn-community btn-block">View</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>

                                                    <?php } elseif ($type == "association") { ?>

                                                        <?php if ($community['Partner_type'] == "association") { ?>
                                                            <div class="col-md-6">
                                                                <div class="card community-card">
                                                                    <div class="card-content community-content">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <img class="img-fluid community-img" src="<?php echo $photo; ?>" />
                                                                            </div>
                                                                            <div class="col-md-8 no-padding">


                                                                                <div class="row">
                                                                                    <div class="col-md-5">
                                                                                        <p class="community-partner-name"><?php echo $community['Groupname'] ?></p>
                                                                                        <p class="community-partner-type"><?php echo $community['Partner_type'] . " Partner"; ?></p>
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
                                                                                    <?php echo $community['group_description'] ?>
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
                                                                                        <a href="<?php echo base_url('communities/getTopics/' . $my['Com_key']); ?>" class="btn btn-community btn-block">View</a>
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
            location.href = "<?php echo base_url('communities/user/'); ?>" + mType;
        }

        function goToSearchText() {
            var mType = document.getElementById("searchCom").value;
            location.href = "<?php echo base_url('communities/userSearch/'); ?>" + mType;
        }
    </script>

</body>

</html>