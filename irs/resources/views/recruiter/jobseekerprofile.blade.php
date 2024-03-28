<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        @include('recruitertheme.css')
    </head>

    <body>
        <!-- Main -->
        <div class="main">
            <div class="header">
                @include('recruitertheme.header')
            </div>
            <style>
                th {
                    padding: 3px;
                }
            </style>
            <div class="wrapper">
                <!-- Sidebar  -->
                <nav id="sidebar">
                    @include('recruitertheme.recruiter_sidebar')
                </nav>
                <?php
                $jsprofilebasic = $jsprofile[0];
                $js_experiences = array();
                if (count($js_experience) > 0) {
                    $js_experiences = $js_experience[0];
                }
                
                if (count($jsapplication) > 0) {
                    $applicationInfo = $jsapplication[0];
                }
                ?>
                
                <div id="content-two">
                    <div class="theme-card container-fluid">
                        <input type="hidden" name="candidate_key" id="candidate_key" value="<?php echo $id;?>"/>
                        <input type="hidden" name="job_key" id="job_key" value="<?php echo $jobid;?>"/>
                        <div id = 'error'>
                        </div>
                        <div class="row">
                            <div class="col-md-10 offset-1 p-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <img height="40" width="40" class="text-vertical rounded-circle" src='<?php echo url('assets/recruit/images/user.png'); ?>'>
                                            </div>
                                            <div class="col-md-11">
                                                &nbsp; &nbsp;<a href="#" class="text-vertical text-theme">
                                                    <b>
                                                        <?php echo $jsprofilebasic->name ?>
                                                    </b>
                                                </a>
                                                <p class="text-info-small">&nbsp; &nbsp;<?php
                                                    if ($js_experiences) {
                                                        echo $js_experiences->designation . " - " . $js_experiences->about_company;
                                                    }
                                                    ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                 
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <select onChange="updateApplicationStatus(this.value, '<?php echo $applicationInfo->id;?>', '<?php echo $applicationInfo->jobid;?>');" required="" class="form-control form-control-sm form-control-filter" id="select_rate" name="select_rate">
                                                            <option <?php if($applicationInfo->shortlisted == 0){echo ' selected';}?> value="0" disabled>Received</option>
                                                            <option <?php if($applicationInfo->shortlisted == 1){echo ' selected';}?> value="1" disabled>Reviewed</option>
                                                            <option <?php if($applicationInfo->shortlisted == 2){echo ' selected';}?> value="2">Shortlisted</option>
                                                            <option <?php if($applicationInfo->shortlisted == 3){echo ' selected';}?> value="3">Potential</option>
                                                            <option <?php if($applicationInfo->shortlisted == 4){echo ' selected';}?> value="4">Approved</option>
                                                            <option <?php if($applicationInfo->shortlisted == -1){echo ' selected';}?> value="-1">Rejected</option>
                                                        </select>
                                                        <i class="fa fa-caret-down"></i> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div>
                                                    <h6 class="text-theme">
                                                        <b>
                                                            Overall rate
                                                        </b>
                                                    </h6>
                                                    <div class="rating">
                                                        <label>
                                                            <input type="radio" name="stars" id="rate_one" value="1" onClick="updateRating(this.value);" <?php if($applicationInfo->app_rating == 1){echo ' checked';}?>/>
                                                            <span class="icon">★</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="stars" id="rate_two" value="2" onClick="updateRating(this.value);" <?php if($applicationInfo->app_rating == 2){echo ' checked';}?>/>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="stars" id="rate_three" value="3" onClick="updateRating(this.value);" <?php if($applicationInfo->app_rating == 3){echo ' checked';}?>/>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>   
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="stars" id="rate_four" value="4" onClick="updateRating(this.value);" <?php if($applicationInfo->app_rating == 4){echo ' checked';}?>/>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="stars" id="rate_five" value="5" onClick="updateRating(this.value);" <?php if($applicationInfo->app_rating == 5){echo ' checked';}?>/>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div>
                                                    <h6 class="text-theme">
                                                        <b>
                                                            Overall Comment
                                                        </b>
                                                    </h6>
                                                    <div class="text-center" id="comment_div">
                                                        <a href="#" class="no-decoration" class="no-decoration" data-toggle="modal" data-target="#myModal">
                                                            <?php if($applicationInfo->app_comment){?>
                                                                <img height="15" src="<?php echo url('assets/recruit/images/comment-checked-icon.png'); ?>" id="comment_on" name="comment_on" data-toggle="tooltip" data-placement="bottom" title="<?php if($applicationInfo->app_comment){echo $applicationInfo->app_comment;}else{ echo "No Comments!!";}?>"/>
                                                            <?php }else{ ?>
                                                                <img height="15" src="<?php echo url('assets/recruit/images/comment-icon.png'); ?>" id="comment_off" name="comment_off" data-toggle="tooltip" data-placement="bottom" title="<?php if($applicationInfo->app_comment){echo $applicationInfo->app_comment;}else{ echo "No Comments!!";}?>"/>
                                                            <?php } ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 no-padding nav-tabs-profile-main">
                                <div class="row">
                                    <div class="col-md-10 offset-1 pl-5 pr-5">
                                        <ul class="nav nav-tabs nav-tabs-profile">
                                            <li class="nav-item mr-3" role="presentation">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">
                                                    Application File
                                                </a>
                                            </li>
                                            <li class="nav-item mr-3" role="presentation">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                                    Assessment Test
                                                </a>
                                            </li>
                                            <li class="nav-item mr-3" role="presentation">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">
                                                    Video Interview
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>

                    <div class="container mt-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="clearfix"></div>
                                <div class="tab-content" id="myTabContent">
                                    <div class="mb-3 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="table-user-name mb-3 text-right">
                                            <a class="text-theme mb-3" href="<?php echo url('employer/print_js_profile/'. $id . '&&jp&&' . $jobid); ?>"><b>Download</b> <i class="ml-2 fa fa-download"></i></a>
                                        </div>
                                        <?php //echo '<pre>'; print_r($jsprofilebasic);  ?>
                                        <div class="theme-card p-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6 class="text-danger"><b>Personal Details</b></h6>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <a href="#">
                                                        <img height="20" src="<?php echo url('assets/recruit/images/comment-checked-icon.png'); ?>" />
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <table class="table table-borderless table-desc">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <span class="h-info">Name </span>
                                                                </td>
                                                                <td>
                                                                    <span class="p-info">
                                                                        <?php if($jsprofilebasic->name){
                                                                           echo $jsprofilebasic->name; 
                                                                        }else{
                                                                           echo "-";
                                                                        }?> 
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span class="h-info">Phone </span>
                                                                </td>
                                                                <td>
                                                                    <span class="p-info">
                                                                        <?php if($jsprofilebasic->phone){
                                                                           echo $jsprofilebasic->phone; 
                                                                        }else{
                                                                           echo "-";
                                                                        }?></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span class="h-info">Marital Status </span>
                                                                </td>
                                                                <td>
                                                                    <span class="p-info"><?php
                                                                        if ($jsprofilebasic->marital_status == "S") {
                                                                            echo 'Single';
                                                                        } else {
                                                                            echo 'Married';
                                                                        }
                                                                        ?> </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <span class="h-info">About </span>
                                                            <div class="clearfix"></div>
                                                            <span class="p-info">
                                                                <?php if($jsprofilebasic->about){
                                                                           echo $jsprofilebasic->about; 
                                                                        }else{
                                                                           echo "-";
                                                                        }?>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="col-md-6">
                                                    <table class="table table-borderless table-desc">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <span class="h-info">Email </span>
                                                                </td>
                                                                <td>
                                                                    <span class="p-info">
                                                                        <?php if($jsprofilebasic->email){
                                                                           echo $jsprofilebasic->email; 
                                                                        }else{
                                                                           echo "-";
                                                                        }?>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span class="h-info">DOB </span>
                                                                </td>
                                                                <td>
                                                                    <span class="p-info">
                                                                        <?php if($jsprofilebasic->dob){
                                                                           echo explode(' ', $jsprofilebasic->dob)[0]; 
                                                                        }else{
                                                                           echo "-";
                                                                        }?>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span class="h-info">Gender</span>
                                                                </td>
                                                                <td>
                                                                    <span class="p-info"><?php
                                                                        if ($jsprofilebasic->gender == "F") {
                                                                            echo 'Female';
                                                                        } else {
                                                                            echo 'Male';
                                                                        }
                                                                        ?></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span class="h-info">Country</span>
                                                                </td>
                                                                <td>
                                                                    <span class="p-info">
                                                                        <?php if($jsprofilebasic->countryname){
                                                                           echo $jsprofilebasic->countryname; 
                                                                        }else{
                                                                           echo "-";
                                                                        }?>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <span class="h-info">Permanent Address </span>
                                                            <div class="clearfix"></div>
                                                            <span class="p-info">
                                                                <?php if($jsprofilebasic->permanent_address){
                                                                           echo $jsprofilebasic->permanent_address; 
                                                                        }else{
                                                                           echo "-";
                                                                        }?>
                                                                <?php if($jsprofilebasic->city){
                                                                           echo $jsprofilebasic->city; 
                                                                        }else{
                                                                           echo "-";
                                                                        }?>
                                                                <?php if($jsprofilebasic->statename){
                                                                           echo $jsprofilebasic->statename; 
                                                                        }else{
                                                                           echo "-";
                                                                        }?>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-user-name mt-3 mb-3">
                                            <img height="20" width="25" class="text-vertical" src='<?php echo url('assets/recruit/images/education-icon.png'); ?>'>
                                            <span class="text-vertical text-light-asses">
                                                <b>Education</b>
                                            </span>
                                        </div>


                                        <div class="theme-card p-3">
                                            <?php 
                                            if(count($js_qualification) > 0){
                                            foreach ($js_qualification as $jsqualifications) { ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6 class="text-danger mb-3"><b><?php echo $jsqualifications->course ?></b></h6>
                                                        <p class="p-info line-height-fix"><?php echo $jsqualifications->university ?></p>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        <a href="#">
                                                            <?php if($applicationInfo->app_comment){?>
                                                                <img height="20" src="<?php echo url('assets/recruit/images/comment-checked-icon.png'); ?>" id="comment_on" name="comment_on"/>
                                                            <?php }else{ ?>
                                                                <img height="20" src="<?php echo url('assets/recruit/images/comment-icon.png'); ?>" id="comment_off" name="comment_off"/>
                                                            <?php } ?>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <table class="table table-borderless table-desc">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Education type</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info"><?php echo $jsqualifications->education_type ?></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Period </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info"><?php echo $jsqualifications->year_from ?> - <?php echo $jsqualifications->year_to ?></span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <table class="table table-borderless table-desc">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Language </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info"><?php echo $jsqualifications->medium ?></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">University Address</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info">  </span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php }
                                            }else{?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6 class="text-danger mb-3"><b></b></h6>
                                                        <p class="p-info line-height-fix">Nothing to Show</p>
                                                    </div>
                                                </div>
                                            <?php }
                                            ?>

                                        </div>


                                        <div class="table-user-name mt-3 mb-3">
                                            <img height="20" width="20" class="text-vertical" src='<?php echo url('assets/recruit/images/experience-icon.png'); ?>'>
                                            <span class="text-vertical text-light-asses">
                                                <b>Experience</b>
                                            </span>
                                        </div>


                                        <div class="theme-card p-3">
                                            <?php 
                                            if(count($js_experience) > 0){
                                            foreach ($js_experience as $js_experiences) { ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6 class="text-danger mb-3"><b><?php echo $js_experiences->designation ?></b></h6>
                                                        <p class="p-info line-height-fix">Al Ghanim Graoup</p>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        <a href="#">
                                                            <img height="20" src="<?php echo url('assets/recruit/images/comment-checked-icon.png'); ?>" />
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <table class="table table-borderless table-desc">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Employment type</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info"><?php
                                                                            if ($js_experiences->employment_type == 1) {
                                                                                echo "Full Time";
                                                                            }if ($js_experiences->employment_type == 2) {
                                                                                echo "Part Time";
                                                                            }if ($js_experiences->employment_type == 3) {
                                                                                echo "Internship";
                                                                            }
                                                                            ?></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Time Period </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info"><?php echo $js_experiences->yearto ?> - <?php echo $js_experiences->yearfrom ?></span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <span class="h-info">Role Description </span>
                                                                <div class="clearfix"></div>
                                                                <span class="p-info">
                                                                    <?php echo $js_experiences->role_description ?> 
                                                                </span>
                                                            </li>
                                                            <li class="mt-2">
                                                                <span class="h-info">Responsibility </span>
                                                                <div class="clearfix"></div>
                                                                <span class="p-info">
                                                                    <?php echo $js_experiences->key_responsibilities ?> 
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <table class="table table-borderless table-desc">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Package </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info"><?php echo $js_experiences->package ?> </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Company Address</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info"> <?php echo $js_experiences->company_location ?> - 
                                                                            <?php
                                                                            foreach ($Country as $countrydata) {
                                                                                if ($countrydata->location_id == $js_experiences->company_nationality) {
                                                                                    echo $countrydata->name;
                                                                                }
                                                                            }
                                                                            ?> </span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <span class="h-info">About Company </span>
                                                                <div class="clearfix"></div>
                                                                <span class="p-info">
                                                                    <?php echo $js_experiences->about_company ?> 
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            <?php } 
                                            }else{?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6 class="text-danger mb-3"><b></b></h6>
                                                        <p class="p-info line-height-fix">Nothing to Show</p>
                                                    </div>
                                                </div>
                                            <?php }
                                            ?>

                                        </div>


                                        <div class="table-user-name mt-3 mb-3">
                                            <img height="20" width="20" class="text-vertical" src='<?php echo url('assets/recruit/images/project-icon.png'); ?>'>
                                            <span class="text-vertical text-light-asses">
                                                <b>Project</b>
                                            </span>
                                        </div>

                                        <div class="theme-card p-3">
                                            <?php 
                                            if(count($js_projects) > 0){
                                            foreach ($js_projects as $jsprojects) { ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6 class="text-danger mb-3"><b><?php echo $jsprojects->project_title ?></b></h6>
                                                        <p class="p-info line-height-fix"><?php echo $jsprojects->client_name ?></p>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        <a href="#">
                                                            <img height="20" src="<?php echo url('assets/recruit/images/comment-checked-icon.png'); ?>" />
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <table class="table table-borderless table-desc">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Team size</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info"><?php echo $jsprojects->team_size ?></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Period </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info"><?php echo $jsprojects->duration ?> </span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <span class="h-info">About project</span>
                                                                <div class="clearfix"></div>
                                                                <span class="p-info">
                                                                    <?php echo $jsprojects->project_details ?>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <table class="table table-borderless table-desc">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Role </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info"><?php echo $jsprojects->role ?> </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Project Location </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info"> <?php echo $jsprojects->project_location ?> </span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <span class="h-info">Skills Used </span>
                                                                <div class="clearfix"></div>
                                                                <span class="p-info">
                                                                    <?php echo $jsprojects->skills_used ?>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            <?php } 
                                            }else{?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6 class="text-danger mb-3"><b></b></h6>
                                                        <p class="p-info line-height-fix">Nothing to Show</p>
                                                    </div>
                                                </div>
                                            <?php }
                                            ?>
                                        </div>


                                        <div class="table-user-name mt-3 mb-3">
                                            <img height="20" width="20" class="text-vertical" src='<?php echo url('assets/recruit/images/certificates-icon.png'); ?>'>
                                            <span class="text-vertical text-light-asses">
                                                <b>Certificates</b>
                                            </span>
                                        </div>

                                        <div class="theme-card p-3">
                                            <?php 
                                            if(count($js_projects) > 0){
                                                foreach ($js_projects as $jsprojects) { ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6 class="text-danger mb-3"><b>Certificates Name</b></h6>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        <a href="#">
                                                            <img height="20" src="<?php echo url('assets/recruit/images/comment-checked-icon.png'); ?>" />
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <table class="table table-borderless table-desc">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Certificates Authorization</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info">Permanent</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Start </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info">June 2009 - June 2012</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Expiry </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info">June 2009 - June 2012</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <table class="table table-borderless table-desc">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">License Number </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info">English </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Certificate URL</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info"> Kuwait, Salmiya </span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php } 
                                            }else{?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6 class="text-danger mb-3"><b></b></h6>
                                                        <p class="p-info line-height-fix">Nothing to Show</p>
                                                    </div>
                                                </div>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="mb-3 tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="theme-card p-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6 class="text-center"><b>No Assessment test  has been assigned </b></h6>
                                                    <hr class="hr-theme">
                                                    <p class="p-info text-center">What can you do with assessment test</p>
                                                    <div class="row">
                                                        <div class="col-md-10 mx-auto text-center">
                                                            <img class="img-fluid" src="<?php echo url('assets/recruit/images/test-details.png'); ?>" />

                                                            <a style="border-radius: 3px !important" href="<?php echo url('/employer/createassesment/' . $id . '&&jp&&' . $jobid); ?>" class="btn btn-danger mb-3 mt-3">Assign Assessment test</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if ($applicationInfo->is_vi_enabled == 0) { ?>
                                        <div class="mb-3 tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="theme-card p-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6 class="text-center"><b>No Video Interview has been assigned </b></h6>

                                                        <hr class="hr-theme">

                                                        <p class="p-info text-center">What can you do with Video Interview?</p>

                                                        <div class="row">
                                                            <div class="col-md-10 mx-auto text-center">
                                                                <img class="img-fluid" src="<?php echo url('assets/recruit/images/test-details.png'); ?>" />

                                                                <a style="border-radius: 3px !important" href="<?php echo url('/employer/createvideointerview/' . $id . '&&jp&&' . $jobid); ?>" class="btn btn-danger mb-3 mt-3">Assign Video Interview</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($applicationInfo->is_vi_enabled == 1 || $applicationInfo->is_vi_enabled == 2) { ?>
                                        <div class="mb-3 tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="theme-card p-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?php if ($applicationInfo->is_vi_enabled == 1) { ?>
                                                            <h6 class="mb-3"><b><?php echo $jsprofilebasic->name ?> has assigned with his video interview</b></h6>
                                                        <?php } ?>
                                                        <?php if ($applicationInfo->is_vi_enabled == 2) { ?>
                                                            <h6 class="mb-3"><b><?php echo $jsprofilebasic->name ?> has submited his video interview</b></h6>
                                                        <?php } ?>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="nav" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                    <?php
                                                                    if ($applicationInfo->is_vi_enabled == 1 || $applicationInfo->is_vi_enabled == 2) {
                                                                        if (count($vi_list) > 0) {
                                                                            $viSerialNo = 1;
                                                                            foreach ($vi_list as $vi) {
                                                                                //print_r($vi);
                                                                                if ($viSerialNo == 1) {
                                                                                    $enable = "active";
                                                                                } else {
                                                                                    $enable = "";
                                                                                }
                                                                                //v-pills-home
                                                                                ?>
                                                                                <a class="nav-link-tab-profile <?php echo $enable; ?> no-decoration" id="v-pills-home-tab" data-toggle="pill" href="#<?php echo $vi->id; ?>" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                                                                    <div class="row">
                                                                                        <div class="col-md-2">
                                                                                            <span class="btn btn-xs rounded-circle bg-danger mt-2"><?php echo $viSerialNo++; ?></span>
                                                                                        </div>
                                                                                        <div class="col-md-2 no-padding">
                                                                                            <img class="img-fluid" src="<?php echo url('assets/recruit/images/thumbnail-icon.png'); ?>" />
                                                                                        </div>
                                                                                        <div class="col-md-7">
                                                                                            <p class="p-info"><?php echo $vi->question; ?></p>
                                                                                            <div class="table-user-name line-height-fix">
                                                                                                <span class="text-vertical text-light-asses font-size-11">
                                                                                                    <?php echo $vi->time; ?> mins
                                                                                                </span>
                                                                                                <img height="13" width="13" class="text-vertical" src='<?php echo url('assets/recruit/images/time-icon.png'); ?>'>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>

                                                                                <?php
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="tab-content" id="v-pills-tabContent">
                                                                    <?php
                                                                    $submitted = 0;
                                                                    $durationIs = 0;
                                                                    echo '<pre>';
                                                                    //print_r($vi_list);
                                                                    if (count($vi_list) > 0) {
                                                                        $viSerialNo = 1;
                                                                        foreach ($vi_list as $que) {
                                                                            //print_r($que);
                                                                            //echo $que->duration_time;
                                                                            if ($viSerialNo == 1) {
                                                                                $enable = "active";
                                                                            } else {
                                                                                $enable = "";
                                                                            }
                                                                            if ($vi->status == 2) {
                                                                                $submitted++;
                                                                            }
                                                                            if($que->duration_time){
                                                                                $durationIs += $que->duration_time;
                                                                            }else{
                                                                                $durationIs = "0";
                                                                            }
                                                                            //
                                                                            ?>
                                                                            <div class="tab-pane fade show <?php echo $enable; ?>" id="<?php echo $que->id; ?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                                                <iframe src="<?php echo $que->answer_url; ?>" width="100%" height="300" frameBorder="0"></iframe>
                                                                            </div>
                                                                            <?php
                                                                            $viSerialNo++;
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <hr class="hr-theme-thick-light">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <table class="table table-borderless table-desc">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Questions Submitted</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info"><?php echo $submitted;?>/<?php echo count($vi_list); ?> </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Total Duration</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info"><?php 
                                                                            if($durationIs < 100){
                                                                                echo $durationIs." secs";
                                                                            }else{
                                                                                echo ($durationIs/60)." mins";
                                                                            }
                                                                        ?> </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Date Submitted</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info"> 
                                                                            <?php
                                                                                $submissionDate = explode(" ", $applicationInfo->vi_submitted_date );
                                                                                echo $newFormatapplicationdate = date('d, F Y', strtotime(date($submissionDate[0])));
                                                                            ?>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <span class="h-info">Due Date</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="p-info"> 
                                                                            <?php
                                                                                $expiryDate = explode(" ", $applicationInfo->vi_expiry_date );
                                                                                echo $newFormatapplicationdate = date('d, F Y', strtotime(date($expiryDate[0])));
                                                                            ?>
                                                                        </span>
                                                                    </td>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-8 mx-auto">
                                                                <a href="#" class="no-decoration" data-toggle="modal" data-target="#myModal">
                                                                    <div class="nav-link-tab-profile">
                                                                        <div class="row">
                                                                            <div class="col-md-5 text-center">
                                                                                <img class="img-fluid" src='<?php echo url('assets/recruit/images/star.png'); ?>'>
                                                                                <div class="centered" id="display_rate"><?php echo $applicationInfo->app_rating?></div>
                                                                            </div> 
                                                                            <div class="col-md-7">
                                                                                <p class="p-info">Your comment and rate</p>
                                                                                <p class="h-info line-height-fix" id="display_comment">
                                                                                    <?php echo $applicationInfo->app_comment;?> 
                                                                                </p>
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
                                    <?php } ?>
                                    
                                    <!--- Model enabled -->
                                        <!-- The Modal -->
                                                                <div class="modal" id="myModal">
                                                                    <div class="modal-dialog modal-sm">
                                                                        <div class="modal-content-theme">

                                                                            <!-- Modal body -->
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <h5><b>Rate</b></h5>
                                                                                    </div>
                                                                                    <div class="col-md-9 text-left">
                                                                                        <div class="rating">
                                                                                            <label>
                                                                                                <input type="radio" name="givestars" value="1" <?php if($applicationInfo->app_rating == 1){echo ' checked';}?>/>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="givestars" value="2" <?php if($applicationInfo->app_rating == 2){echo ' checked';}?>/>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="givestars" value="3" <?php if($applicationInfo->app_rating == 3){echo ' checked';}?>/>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>   
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="givestars" value="4" <?php if($applicationInfo->app_rating == 4){echo ' checked';}?>/>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="givestars" value="5" <?php if($applicationInfo->app_rating == 5){echo ' checked';}?>/>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-12">
                                                                                        <textarea rows="5" class="form-control" id="app_comment" name="app_comment"><?php echo $applicationInfo->app_comment;?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Modal footer -->
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-danger" onClick="updateRating(0);">Save</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                    <!--- Model disabled -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>            
            </div>

        </div>
        <!-- End Main -->

        @include('recruitertheme.js')

        <script>
            function  delete_jobs(jobidvalue, jobtitlevalue) {
                console.log(jobidvalue);
                document.getElementById("jobidindelete").value = jobidvalue;
                document.getElementById("jobtitlefordelete").innerHTML = jobtitlevalue;
                $('#delete_model').modal('show');
            }
        </script>
        <script>
            function deactivate_jobs(jobidvalue, jobtitlevalue) {
                console.log(jobidvalue);
                document.getElementById("jobid_deactivate").value = jobidvalue;
                document.getElementById("jobtitle_deactivate").innerHTML = jobtitlevalue;
                $('#deactivate_model').modal('show');
            }
        </script>
        <script>
            function  postsavedjob(jobidvalue, jobtitlevalue) {
                console.log(jobidvalue);
                document.getElementById("jobidinactivate").value = jobidvalue;
                document.getElementById('jobtitleforpost').innerHTML = jobtitlevalue;
                $('#publish_model').modal('show');
            }
        </script>
        <script>
             function updateApplicationStatus(candidateStatus, candidateKey, jobKey){
                $.ajax({
                    url: '<?php echo url("/employer/poststatues"); ?>',
                    type: 'POST',
                    data: {
                        'candidate_id': candidateKey,
                        'job_id': jobKey,
                        'shortlisted': candidateStatus,
                        '_token': '{{csrf_token()}}'
                    },
                    success: function (msg) {
                        //console.log(data);
                        $('#error').html('<div class="alert alert-success" id="myalertstatus" >Application Status has been updated successfully!!.</div>');
                        window.location.hash = '#error';
                        $('#myalertstatus').fadeOut(10000);
                    },
                    error: function (msg) {
                        //console.log(data);
                        $('#error').html('<div class="alert alert-danger" id="myalertstatus" >Data is Not Valid, Please Insert Valid Data.</div>');
                        window.location.hash = '#error';
                        $('#myalertstatus').fadeOut(10000);
                    }
                });
            }
            
            function updateRating(rating){
                if(rating == 0){
                    //alert("yes");
                    rating = $("input[name='givestars']:checked").val();
                    //alert(rating);
                }
                var candidateKey = $("#candidate_key").val();
                var jobKey = $("#job_key").val();
                var comment = $("#app_comment").val();
                //alert(comment);
                $("#display_rate").text(rating)
                $("#display_comment").text(comment)
                if(comment === "" || comment === null){
                    $("#comment_off").attr("src", "<?php echo url('assets/recruit/images/comment-icon.png'); ?>");
                    $("#comment_on").attr("src", "<?php echo url('assets/recruit/images/comment-icon.png'); ?>");
                }else{
                    $("#comment_off").attr("src", "<?php echo url('assets/recruit/images/comment-checked-icon.png'); ?>");
                    $("#comment_on").attr("src", "<?php echo url('assets/recruit/images/comment-checked-icon.png'); ?>");
                }
                $("#myModal").modal('hide');
                //alert(rating+"==========="+candidateKey+"=============="+jobKey);
                //$('#select_rate').val(rating);
                if(rating == 1){
                    $("#rate_one").attr('checked', 'checked');
                }else if(rating == 2){
                    $("#rate_two").attr('checked', 'checked');
                }else if(rating == 3){
                    $("#rate_three").attr('checked', 'checked');
                }else if(rating == 4){
                    $("#rate_four").attr('checked', 'checked');
                }else if(rating == 5){
                    $("#rate_five").attr('checked', 'checked');
                }
                
                $.ajax({
                    url: '<?php echo url("/employer/postreview"); ?>',
                    type: 'POST',
                    data: {
                        'candidate_id': candidateKey,
                        'job_id': jobKey,
                        'rating': rating,
                        'review': comment,
                        '_token': '{{csrf_token()}}'
                    },
                    success: function (msg) {
                        //console.log(data);
                        $('#error').html('<div class="alert alert-success" id="myalertstatus" >Overall rating has been updated successfully!!.</div>');
                        window.location.hash = '#error';
                        $('#myalertstatus').fadeOut(10000);
                    },
                    error: function (msg) {
                        //console.log(data);
                        $('#error').html('<div class="alert alert-danger" id="myalertstatus" >Data is Not Valid, Please Insert Valid Data.</div>');
                        window.location.hash = '#error';
                        $('#myalertstatus').fadeOut(10000);
                    }
                });
            }
            
            function ShowState() {
                var Country = document.getElementById('country').value;
                // console.log(vl);
                $.ajax({
                    type: "post",
                    url: "<?php echo url("/common/showstateforsearch"); ?>",
                    data: {Country: Country, "_token": '{{csrf_token()}}'},
                    context: document.body
                }).done(function (msg) {
                    $('#NewState').html(msg);
                });
            }
        </script>
        <script>
            function ShowCity() {
                var State = document.getElementById('state').value;
                // console.log(vl);
                $.ajax({
                    type: "post",
                    url: "<?php echo url("/common/showcityforsearch"); ?>",
                    data: {State: State, "_token": '{{csrf_token()}}'},
                    context: document.body
                }).done(function (msg) {
                    $('#NewCity').html(msg);
                });
            }
        </script>
        <script> function removeerrorcity() {
                document.getElementById('city-error').innerHTML = '';
            }</script>
        <script>
            function ChangeCurrency() {
                var currencytype = document.getElementById('Currency').value;
                console.log('currencytype: ' + currencytype);
                $(".exptdpckg").remove();
                if (currencytype == 'USD') {
                    var option = "<option class='exptdpckg' value='786'> Less than 5,000 </option>"
                    document.getElementById('Expectedpckg').innerHTML += option;
                    for (var x = 5000; x <= 100000; x = x + 5000) {
                        var option = "<option class='exptdpckg' value='" + x + "'> " + x.toLocaleString() + "</option>"
                        document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    var option = "<option class='exptdpckg' value='10000000'>  100,000 & above </option>"
                    document.getElementById('Expectedpckg').innerHTML += option;
                } else if (currencytype == 'INR') {
                    var option = "<option class='exptdpckg' value='12477'> Less than 50,000 </option>"
                    document.getElementById('Expectedpckg').innerHTML += option;
                    for (var x = 50000; x <= 100000; x = x + 10000) {
                        var option = "<option class='exptdpckg' value='" + x + "'> " + x.toLocaleString() + "</option>"
                        document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for (var y = 125000; y <= 500000; y = y + 25000) {
                        var option = "<option class='exptdpckg' value='" + y + "'> " + y.toLocaleString() + "</option>"
                        document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for (var z = 550000; z <= 1000000; z = z + 50000) {
                        var option = "<option class='exptdpckg' value='" + z + "'> " + z.toLocaleString() + "</option>"
                        document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for (var p = 1100000; p <= 2000000; p = p + 100000) {
                        var option = "<option class='exptdpckg' value='" + p + "'> " + p.toLocaleString() + "</option>"
                        document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for (var q = 2250000; q <= 4000000; q = q + 250000) {
                        var option = "<option class='exptdpckg' value='" + q + "'> " + q.toLocaleString() + "</option>"
                        document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for (var r = 4500000; r <= 9500000; r = r + 500000) {
                        var option = "<option class='exptdpckg' value='" + r + "'> " + r.toLocaleString() + "</option>"
                        document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    var option = "<option class='exptdpckg' value='10000000'>  100,00,000 & above </option>"
                    document.getElementById('Expectedpckg').innerHTML += option;
                } else {
                    // ShowMaxAnnualIncome();
                }
            }
        </script>
        <script>
            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()
            })
        </script>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>
    </body>

</html>