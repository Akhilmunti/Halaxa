<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('partner/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('partner/partials/left-nav'); ?>    
                <!-- top navigation -->
                <?php $this->load->view('partner/partials/top-nav'); ?>
                <!-- /top navigation --> 
            </div>
            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <div class="row">
                                    <div class="col-lg-1 col-xs-3"> 
                                        <?php
                                        $file = base_url('uploads/') . $this->session->userdata('picture');
                                        if (@getimagesize($file)) {
                                            $file = $file;
                                        } else {
                                            $file = base_url('assets/images/favi.png');
                                        }
                                        ?>
                                        <img class="img-responsive img-thumbnail img-rounded image-head" src="<?php echo $file; ?>" alt="<?php echo $this->session->userdata('login_name'); ?>" title="Change the avatar">
                                    </div>
                                    <!-- Current avatar --> 
                                    <div class="col-md-8 col-xs-9">
                                        <?php
                                        if (!empty($members)) {
                                            $memberCount = count($members);
                                            if ($memberCount == 1) {
                                                $countMenber = "Member";
                                            } else {
                                                $countMenber = "Members";
                                            }
                                        } else {
                                            $countMenber = "Member";
                                        }
                                        ?>
                                        <h4 style="text-transform: uppercase"><b><?php echo $this->session->userdata('login_name'); ?></b></h4>
                                        <p>
                                            <?php
                                            if (!empty($members)) {
                                                echo count($members);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                            <?php echo $countMenber; ?>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-md-9 col-xs-12">
                                        <?php
                                        $activeTab = $this->session->flashdata('activeTab');
                                        if (!empty($activeTab)) {
                                            $activeratings = "active";
                                            $activemain = "";
                                        } else {
                                            $activemain = "active";
                                            $activeratings = "";
                                        }
                                        ?>
                                        <?php
                                        $result = $this->session->flashdata('result');
                                        if ($result == NULL) {
                                            $hidealert = "hide";
                                        } else {
                                            $showalert = $result;
                                            $hidealert = "";
                                        }
                                        ?>
                                        <div class="alert alert-success <?php echo $hidealert ?>">
                                            <?php echo $showalert ?>
                                        </div>
                                        <br>
                                        <div class="border-dark" role="tabpanel" data-example-id="togglable-tabs">
                                            <div >
                                                <ul class="nav nav-pills nav-stacked hidden-lg hidden-md hidden-sm">
                                                    <li role="presentation" class="<?php echo $activemain; ?>"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Conversations</a> </li>
                                                    <!--                                               <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">IET (Intern)</a> </li>-->
                                                    <li role="presentation"><a href="#tab_content_jobs" id="jobs-tab" role="tab" data-toggle="tab" aria-expanded="true">Jobs</a> </li>
                                                    <!--                                                    <li class="dropdown">
                                                                                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Jobs
                                                                                                                <span class="caret"></span></a>
                                                                                                            <ul class="dropdown-menu">
                                                                                                                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">HOT</a> </li>
                                                                                                                <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">MT </a> </li>
                                                                                                                <li role="presentation" class=""><a href="#tab_content7" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">HOMT</a> </li>
                                                                                                            </ul>
                                                                                                        </li>-->
<!--                                                    <li role="presentation"><a href="#tab_content9" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Rate</a> </li>-->
                                                    <li role="presentation" class="<?php echo $activeratings; ?>"><a href="#tab_content8" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Manage Ratings</a> </li>
                                                </ul>
                                                <ul id="myTab" class="nav nav-tabs bar_tabs hidden-xs" role="tablist">
                                                    <li role="presentation" class="<?php echo $activemain; ?>"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Conversations</a> </li>
                                                    <!--                                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">IET (Intern)</a> </li>-->
                                                    <!--                                                    <li class="dropdown">
                                                                                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Jobs
                                                                                                                <span class="caret"></span></a>
                                                                                                            <ul class="dropdown-menu">
                                                                                                                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">HOT</a> </li>
                                                                                                                <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">MT </a> </li>
                                                                                                                <li role="presentation" class=""><a href="#tab_content7" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">HOMT</a> </li>
                                                                                                            </ul>
                                                                                                        </li>-->
                                                    <li role="presentation"><a href="#tab_content_jobs" id="jobs-tab" role="tab" data-toggle="tab" aria-expanded="true">Jobs</a> </li>
<!--                                                    <li role="presentation"><a href="#tab_content9" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Rate</a> </li>-->
                                                    <li role="presentation" class="<?php echo $activeratings; ?>"><a href="#tab_content8" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Manage Ratings</a> </li>
                                                </ul>  
                                            </div>
                                            <div id="myTabContent" class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade <?php echo $activemain; ?> in" id="tab_content1" aria-labelledby="home-tab"> 
                                                    <div class="light-back">
                                                        <form id="Form" method="POST" action="<?php echo base_url() . "partner/school/add_post"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">

                                                            <div class="row">
                                                                <div class="col-md-12 col-xs-12">
                                                                    <textarea required="" name="comments" placeholder="Start conversing with your community members." class="form-control" rows="4" id="comment"></textarea>
                                                                    <?php if (form_error('comments')) { ?><span style="color: #E68F8F;"><?php echo form_error('comments'); ?></span> <?php } ?>
                                                                </div>
                                                                <div class="col-md-8 col-xs-12" style="margin-top: 5px"> 
                                                                    <div class="form-group">
                                                                        <div class="input-group input-file" name="imageUpload">
                                                                            <span class="input-group-btn">
                                                                                <button class="btn btn-default btn-choose" type="button">Choose</button>
                                                                            </span>
                                                                            <input type="text" class="form-control" placeholder='Choose a file...' />
                                                                            <span class="input-group-btn">
                                                                                <button class="btn btn-warning btn-reset" type="button">Reset</button>
                                                                            </span> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-xs-12" style="margin-top: 5px"> 
                                                                    <button type="submit" class="btn btn-block btn-warning">Post</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <br/>
                                                    <!-- start recent activity -->
                                                    <ul class="messages post-card">
                                                        <?php
                                                        if (!empty($conversations)) {
                                                            foreach ($conversations as $key => $conversation) {
                                                                ?>
                                                                <li> 
                                                                    <?php
                                                                    $file = base_url('uploads/') . $conversation['Profile'];
                                                                    if (@getimagesize($file)) {
                                                                        $file = $file;
                                                                    } else {
                                                                        $file = base_url('assets/images/favi.png');
                                                                    }
                                                                    ?>
                                                                    <img src="<?php echo $file; ?>" class="avatar" alt="Avatar">
                                                                    <div class="message_date">
                                                                        <p class="month">
                                                                            <?php
                                                                            $timestamp = $conversation['date_added'];
                                                                            $splits = explode(" ", $timestamp);
                                                                            $get_date = $splits[0];
                                                                            echo date("d/m/Y", strtotime($get_date));
                                                                            //$get_time = $splits[1];
                                                                            ?>
                                                                            <br>
                                                                            <?php
                                                                            $timestamp = $conversation['date_added'];
                                                                            $splits = explode(" ", $timestamp);
                                                                            //$get_date = $splits[0];
                                                                            echo $get_time = $splits[1];
                                                                            ?>
                                                                        </p>
                                                                        <?php if ($conversation['posted_id'] == $this->session->userdata('login_id')) { ?>
                                                                            <a href="<?php echo base_url("partner/school/delete_post/"); ?><?php echo $conversation['id']; ?>" class="date"><i class="fa fa-trash"></i></a>                                                                            
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="message_wrapper">
                                                                        <blockquote class="message"><?php echo $conversation['comment']; ?></blockquote>
                                                                        <br />
                                                                        <?php $checkFile = base_url('uploads/') . $conversation['attachment']; ?>
                                                                        <?php if (@getimagesize($checkFile)) { ?>
                                                                            <img class="img-responsive img-thumbnail" src="<?php echo $checkFile; ?>" />
                                                                            <br />
                                                                        <?php } else { ?>
                                                                            <p class="url"><a href="<?php echo base_url('uploads/'); ?><?php echo $conversation['attachment']; ?>" download=""> <?php echo $conversation['attachment']; ?> </a> </p>
                                                                            <br />
                                                                        <?php } ?>
        <!--                                                                        <a href="#" data-toggle="modal" data-target="#comment<?php echo "_" . $conversation['id']; ?>" style="padding-right: 25px;"><i class="fa fa-comments"></i> Comment</a>-->
                                                                    </div>
                                                                </li>

                                                                <?php
                                                            }
                                                        } else {
                                                            ?>

                                                        <?php }
                                                        ?>
                                                    </ul>
                                                    <!-- end recent activity --> 
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                    <div class="row">
                                                        <div class="col-md-12 col-xs-12">
                                                            <!-- start user projects -->
                                                            <table class="data table table-striped no-margin table-responsive" style="width: 100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Job Title</th>
                                                                        <th>Company Name</th>
                                                                        <th>Recruiter</th>
                                                                        <th>Job Location</th>
                                                                        <th>Salary</th>
                                                                        <th>Ends On</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $json = file_get_contents("https://foodlinked.co.in/irs/api/get_active_campus_jobs");
                                                                    $data = json_decode($json, true);
                                                                    $internships = $data['IET(intern)'];
                                                                    if (!empty($internships)) {
                                                                        $counter = 0;
                                                                        foreach ($internships as $inter) {
                                                                            $counter++;
                                                                            ?>
                                                                            <?php
                                                                            $schoolName = $this->session->userdata('login_name');
                                                                            if ($schoolName == $inter['School Name']) {
                                                                                ?>
                                                                                <tr>
                                                                                    <td><?php echo $counter; ?></td>
                                                                                    <td><?php echo $inter['Job Title']; ?></td>
                                                                                    <td><?php echo $inter['Company']; ?></td>
                                                                                    <td><?php echo $inter['Recruiter']; ?></td>
                                                                                    <td><?php echo $inter['Job Location']; ?></td>
                                                                                    <td><?php echo $inter['Salary']; ?></td>
                                                                                    <td><?php echo $inter['Expiry Date']; ?></td>
                                                                                </tr>
                                                                            <?php } else { ?>

                                                                            <?php } ?>

                                                                            <?php
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                        <tr>
                                                                            <td colspan="7"><center>No data found</center></td>
                                                                    </tr>
                                                                <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            <!-- end user projects -->   
                                                        </div>
                                                    </div>


                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                    <!-- start user projects -->
                                                    <table class="data table table-striped no-margin table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Job Title</th>
                                                                <th>Company Name</th>
                                                                <th>Recruiter</th>
                                                                <th>Job Location</th>
                                                                <th>Salary</th>
                                                                <th>Ends On</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $json = file_get_contents("https://foodlinked.co.in/irs/api/get_active_campus_jobs");
                                                            $data = json_decode($json, true);
                                                            $internships = $data['HOT'];
                                                            if (!empty($internships)) {
                                                                $counter = 0;
                                                                foreach ($internships as $inter) {
                                                                    $counter++;
                                                                    ?>
                                                                    <?php
                                                                    $schoolName = $this->session->userdata('login_name');
                                                                    if ($schoolName == $inter['School Name']) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $counter; ?></td>
                                                                            <td><?php echo $inter['Job Title']; ?></td>
                                                                            <td><?php echo $inter['Company']; ?></td>
                                                                            <td><?php echo $inter['Recruiter']; ?></td>
                                                                            <td><?php echo $inter['Job Location']; ?></td>
                                                                            <td><?php echo $inter['Salary']; ?></td>
                                                                            <td><?php echo $inter['Expiry Date']; ?></td>
                                                                        </tr>
                                                                    <?php } else { ?>

                                                                    <?php } ?>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <tr>
                                                                    <td colspan="7"><center>No data found</center></td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <!-- end user projects --> 
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                                                    <!-- start user projects -->
                                                    <table class="data table table-striped no-margin table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Job Title</th>
                                                                <th>Company Name</th>
                                                                <th>Recruiter</th>
                                                                <th>Job Location</th>
                                                                <th>Salary</th>
                                                                <th>Ends On</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $json = file_get_contents("https://foodlinked.co.in/irs/api/get_active_campus_jobs");
                                                            $data = json_decode($json, true);
                                                            $internships = $data['MT'];
                                                            if (!empty($internships)) {
                                                                $counter = 0;
                                                                foreach ($internships as $inter) {
                                                                    $counter++;
                                                                    ?>
                                                                    <?php
                                                                    $schoolName = $this->session->userdata('login_name');
                                                                    if ($schoolName == $inter['School Name']) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $counter; ?></td>
                                                                            <td><?php echo $inter['Job Title']; ?></td>
                                                                            <td><?php echo $inter['Company']; ?></td>
                                                                            <td><?php echo $inter['Recruiter']; ?></td>
                                                                            <td><?php echo $inter['Job Location']; ?></td>
                                                                            <td><?php echo $inter['Salary']; ?></td>
                                                                            <td><?php echo $inter['Expiry Date']; ?></td>
                                                                        </tr>
                                                                    <?php } else { ?>

                                                                    <?php } ?>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <tr>
                                                                    <td colspan="7"><center>No data found</center></td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <!-- end user projects --> 
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="profile-tab">
                                                    <!-- start user projects -->
                                                    <table class="data table table-striped no-margin table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Job Title</th>
                                                                <th>Company Name</th>
                                                                <th>Recruiter</th>
                                                                <th>Job Location</th>
                                                                <th>Salary</th>
                                                                <th>Ends On</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $json = file_get_contents("https://foodlinked.co.in/social_api/get_active_campus_jobs.php ");
                                                            $data = json_decode($json, true);
                                                            $internships = $data['HOMT'];
                                                            if (!empty($internships)) {
                                                                $counter = 0;
                                                                foreach ($internships as $inter) {
                                                                    $counter++;
                                                                    ?>
                                                                    <?php
                                                                    $schoolName = $this->session->userdata('login_name');
                                                                    if ($schoolName == $inter['School Name']) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $counter; ?></td>
                                                                            <td><?php echo $inter['Job Title']; ?></td>
                                                                            <td><?php echo $inter['Company']; ?></td>
                                                                            <td><?php echo $inter['Recruiter']; ?></td>
                                                                            <td><?php echo $inter['Job Location']; ?></td>
                                                                            <td><?php echo $inter['Salary']; ?></td>
                                                                            <td><?php echo $inter['Expiry Date']; ?></td>
                                                                        </tr>
                                                                    <?php } else { ?>

                                                                    <?php } ?>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <tr>
                                                                    <td colspan="7"><center>No data found</center></td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <!-- end user projects --> 
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content_jobs" aria-labelledby="profile-tab">
                                                    <!-- start user projects -->
                                                    <div class="row">
                                                        <div class="col-md-12" style="margin-bottom: 10px">
                                                            <div class="dropdown">
                                                                <button class="btn btn-dark dropdown-toggle btn-block" type="button" data-toggle="dropdown">
                                                                    Select Job Type
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu" style="width: 100%">
                                                                    <li><a href="#" class="filter-button" data-filter="all">All</a></li>
                                                                    <li><a href="#" class="filter-button" data-filter="IET">IET(intern)</a></li>
                                                                    <li><a href="#" class="filter-button" data-filter="HOMT">HOMT</a></li>
                                                                    <li><a href="#" class="filter-button" data-filter="MT">MT</a></li>
                                                                    <li><a href="#" class="filter-button" data-filter="HT">HT</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $schoolName = $this->session->userdata('login_id');
                                                        $json = file_get_contents("https://foodlinked.co.in/social_api/get_active_campus_jobs.php?School_Id=" . $schoolName);
                                                        $data = json_decode($json, true);
                                                        $internships = $data['members'];
                                                        if (!empty($internships)) {
                                                            $counter = 0;
                                                            foreach ($internships as $inter) {
                                                                $counter++;
                                                                ?>
                                                                <?php
                                                                if ($inter['job_type'] == "IET(intern)") {
                                                                    $searchFilter = "IET";
                                                                } else {
                                                                    $searchFilter = $inter['job_type'];
                                                                }
                                                                ?>
                                                                <div class="col-md-6 filter <?php echo $searchFilter; ?>" style="margin-bottom: 10px">
                                                                    <div class="card post-card">
                                                                        <div class="card-header">
                                                                            <h5><b><?php echo $inter['job_type']; ?></b></h5>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table class="data table table-striped no-margin table-responsive">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>Job Title : </td>
                                                                                        <td class="text-wrap"><?php echo $inter['jobtitle']; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Company : </td>
                                                                                        <td><?php echo $inter['company']; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Recruiter : </td>
                                                                                        <td><?php echo $inter['jobtitle']; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Job Location : </td>
                                                                                        <td><?php echo $inter['jobtitle']; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Salary : </td>
                                                                                        <td>
                                                                                            <?php
                                                                                            if (!empty($inter['salary_details'])) {
                                                                                                echo $inter['salary_details'];
                                                                                            } else {
                                                                                                echo "Not Specified";
                                                                                            }
                                                                                            ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Expiry Date : </td>
                                                                                        <td><?php echo $inter['expiryts']; ?></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="card-footer text-right">
                                                                            <a href="#" class="btn btn-block btn-sm btn-dark">Apply</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </div>
                                                    <!-- end user projects --> 
                                                </div>
                                                <div role="tabpanel" class="tab-pane <?php echo $activeratings; ?> in fade" id="tab_content8" aria-labelledby="profile-tab">
                                                    <!-- start user projects -->
                                                    <div style="overflow-x: scroll">
                                                        <table class="data table table-striped no-margin table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
<!--                                                                    <th>Rated By</th>-->
                                                                    <th>Rating</th>
                                                                    <th>Student Status</th>
                                                                    <th>Title</th>
                                                                    <th>Pros</th>
                                                                    <th>Cons</th>
                                                                    <th>Cons</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if (!empty($ratings)) {
                                                                    $counter = 0;
                                                                    foreach ($ratings as $rating) {
                                                                        $counter++;
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $counter; ?></td>
        <!--                                                                            <td><?php echo $rating['Name']; ?></td>-->
                                                                            <td><?php echo $rating['stars']; ?></td>
                                                                            <td><?php echo $rating['student_status']; ?></td>
                                                                            <td><?php echo $rating['title']; ?></td>
                                                                            <td><?php echo $rating['pros']; ?></td>
                                                                            <td><?php echo $rating['cons']; ?></td>
                                                                            <td><?php echo $rating['advice']; ?></td>
                                                                            <td>
                                                                                <?php if ($rating['status'] == 0) { ?>
                                                                                    <a href="<?php echo base_url('partner/school/publishRating/') . $rating['id']; ?>" class="btn btn-xs btn-dark">Publish</a>
                                                                                <?php } else { ?>
                                                                                    <a href="#" class="btn btn-xs btn-success">Published</a>
                                                                                <?php } ?>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <tr>
                                                                        <td colspan="7"><center>No data found</center></td>
                                                                </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- end user projects --> 
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content9" aria-labelledby="profile-tab">
                                                    <!-- start user projects -->
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="light-back">
                                                                <form id="formThree" enctype="multipart/form-data" class="form-horizontal form-label-left" action="<?php echo base_url('partner/school/sendRatings'); ?>" method="post">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="usr">Overall Rating*</label>
                                                                                <br>
                                                                                <div class="rating">
                                                                                    <label>
                                                                                        <input required="" type="radio" name="stars" value="1" />
                                                                                        <span class="icon">★</span> </label>
                                                                                    <label>
                                                                                        <input type="radio" name="stars" value="2" />
                                                                                        <span class="icon">★</span> <span class="icon">★</span> </label>
                                                                                    <label>
                                                                                        <input type="radio" name="stars" value="3" />
                                                                                        <span class="icon">★</span> <span class="icon">★</span> <span class="icon">★</span> </label>
                                                                                    <label>
                                                                                        <input type="radio" name="stars" value="4" />
                                                                                        <span class="icon">★</span> <span class="icon">★</span> <span class="icon">★</span> <span class="icon">★</span> </label>
                                                                                    <label>
                                                                                        <input type="radio" name="stars" value="5" />
                                                                                        <span class="icon">★</span> <span class="icon">★</span> <span class="icon">★</span> <span class="icon">★</span> <span class="icon">★</span> </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="usr">Student Status*</label>
                                                                                <select name="stuStatus" required="" class="form-control" id="sel1">
                                                                                    <option selected="" value="" disabled="">Current Student</option>
                                                                                    <option>Alumni</option>
                                                                                    <option>Potential Student</option>
                                                                                    <option>Others</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="usr">Review Title*</label>
                                                                                <input name="title" type="text" class="form-control" id="email" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="comment">Pros*:</label>
                                                                                <textarea name="pros" class="form-control" rows="3" id="comment" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="comment">Cons*:</label>
                                                                                <textarea name="cons" class="form-control" rows="3" id="comment" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="comment">Advice to management*:</label>
                                                                                <textarea name="advice" class="form-control" rows="3" id="comment" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-xs-12">
                                                                            <div class="checkbox">
                                                                                <label>
                                                                                    <input required="" type="checkbox" required>
                                                                                    I agree to the terms of use. This review of my experience at my current or former employer is truthful.</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-xs-12">
                                                                            <button class="btn btn-dark" type="submit">Submit Review</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-xs-12">
                                                            <div class="light-back">
                                                                <h4 class="text-justify">Keep it real</h4>
                                                                <p class="text-justify">Thank you for contributing to the community. Your Opinion will help others make decisions about jobs and companies.</p>
                                                                <h5>Please stick to the Community guidelines and do not post.</h5>
                                                                <ul>
                                                                    <li>
                                                                        Aggressive or Discriminatory language.
                                                                    </li>
                                                                    <li>
                                                                        Profanities
                                                                    </li>
                                                                    <li>
                                                                        Trade secrets/Confidential information.
                                                                    </li>
                                                                </ul>
                                                                <p class="text-justify">Thank you.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end user projects --> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <div class="light-back">
                                            <h4 class="text-justify">Group Description</h4>
                                            <p class="text-justify">
                                                <?php echo $info['group_description']; ?>
                                            </p>
                                        </div>
                                        <br>
                                        <div class="light-back">
                                            <div class="left"> <a href="#">Members</a> </div>
                                            <div class="right"> 
                                                <a href="#">
                                                    <?php
                                                    if (!empty($members)) {
                                                        echo count($members);
                                                    } else {
                                                        echo "0";
                                                    }
                                                    ?>
                                                    Members
                                                </a>
                                            </div>
                                            <div class="clearfix"></div>
                                            <br>
                                            <div class="anchor-img"> 
                                                <?php
                                                if (!empty($members)) {
                                                    foreach ($members as $key => $member) {
                                                        $user = $this->users_model->get_user_by_id($member['User_Id']);
                                                        ?>
                                                        <?php if (!empty($user->Photo)) { ?>
                                                            <a><img height="40" width="40" src="<?php echo base_url(); ?>assets/photo/<?php echo $user->Photo; ?>" class="img-circle img-responsive"/></a> 
                                                        <?php } else { ?>
                                                            <a><img height="40" width="40" src="<?php echo base_url(); ?>assets/images/user.png" class="img-circle img-responsive"/></a> 
                                                        <?php } ?>       

                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                <?php }
                                                ?>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- footer content -->
            <?php $this->load->view('partner/partials/footer') ?>
            <!-- /footer content --> 
        </div>
        <?php
        $i = 1;
        foreach ($conversations as $conversation) {
            ?>
            <!-- Modal -->
            <div id="comment<?php echo "_" . $conversation['id']; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('partner/school/') ?><?php echo $conversation['id']; ?>">  
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Comment</h4>
                            </div> 
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group form-group-back p-10">
                                        <input required="" type="text" id="comment" name="comment" placeholder="Post Comment" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-dark">Post</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php }
        ?>
        <?php $this->load->view('partner/partials/assets-footer'); ?>
        <!-- jQuery Smart Wizard --> 
        <script src="<?php echo base_url(); ?>assets/vendors/moment/min/moment.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>  
        <script src="<?php echo base_url(); ?>assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- iCheck --> 
        <script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script> 
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
        <style>
            .avatar-upload {
                position: relative;
                max-width: 205px;
                margin: auto;
            }
            .avatar-upload .avatar-edit {
                position: absolute;
                right: 75px;
                z-index: 1;
                top: 0px;
            }
            .avatar-upload .avatar-edit input {
                display: none;
            }
            .avatar-upload .avatar-edit input + label {
                display: inline-block;
                width: 34px;
                height: 34px;
                margin-bottom: 0;
                border-radius: 100%;
                background: #FFFFFF;
                border: 1px solid transparent;
                box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                cursor: pointer;
                font-weight: normal;
                transition: all 0.2s ease-in-out;
            }
            .avatar-upload .avatar-edit input + label:hover {
                background: #f1f1f1;
                border-color: #d6d6d6;
            }
            .avatar-upload .avatar-edit input + label:after {
                content: "\f040";
                font-family: 'FontAwesome';
                color: #757575;
                position: absolute;
                top: 10px;
                left: 0;
                right: 0;
                text-align: center;
                margin: auto;
            }
            .avatar-upload .avatar-preview {
                width: 100px;
                height: 100px;
                position: relative;
                border-radius: 100%;
                border: 6px solid #F8F8F8;
                box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
            }
            .avatar-upload .avatar-preview > div {
                width: 100%;
                height: 100%;
                border-radius: 100%;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
            .image-head{
                height: 60px;
                width: 100px
            }
        </style>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                        $('#imagePreview').hide();
                        $('#imagePreview').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imageUpload").change(function () {
                readURL(this);
            });
            function bs_input_file() {
                $(".input-file").before(
                        function () {
                            if (!$(this).prev().hasClass('input-ghost')) {
                                var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                                element.attr("name", $(this).attr("name"));
                                element.change(function () {
                                    element.next(element).find('input').val((element.val()).split('\\').pop());
                                });
                                $(this).find("button.btn-choose").click(function () {
                                    element.click();
                                });
                                $(this).find("button.btn-reset").click(function () {
                                    element.val(null);
                                    $(this).parents(".input-file").find('input').val('');
                                });
                                $(this).find('input').css("cursor", "pointer");
                                $(this).find('input').mousedown(function () {
                                    $(this).parents('.input-file').prev().click();
                                    return false;
                                });
                                return element;
                            }
                        }
                );
            }
            $(function () {
                bs_input_file();
            });
        </script>
        <script>
            $(document).ready(function () {

                $(".filter-button").click(function () {
                    var value = $(this).attr('data-filter');

                    if (value == "all")
                    {
                        //$('.filter').removeClass('hidden');
                        $('.filter').show('1000');
                    } else
                    {
                        //            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
                        //            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
                        $(".filter").not('.' + value).hide('3000');
                        $('.filter').filter('.' + value).show('3000');

                    }
                });

            });

        </script>
        <style>
            .post-card{
                margin-bottom: 10px;
                background-color: #f8f8f8;
                padding: 20px !important;
                border-radius: 5px;
                -webkit-box-shadow: 0 10px 6px -6px #777;
                -moz-box-shadow: 0 10px 6px -6px #777;
                box-shadow: 0 10px 6px -6px #777;
            }
            .post-div {
                position: relative;
                overflow: hidden;
            }
            .file-post {
                position: absolute;
                opacity: 0;
                right: 0;
                top: 0;
            }
        </style>
    </body>
</html>
