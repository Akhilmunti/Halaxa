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

                <div id="content-two">
                    <div class="theme-card container-fluid">
                        <div id = 'error'>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Smart Wizard -->
                                <form action="" method="post" id="main">
                                    <div id="wizard" class="form_wizard wizard_horizontal">
                                        <ul class="wizard_steps">
                                            <li> 
                                                <a href="#step-1"> 
                                                    <span class="step_no">    
                                                        <img class="mb-1" height="20" width="20" src="<?php echo url('/'); ?>/assets/recruit/images/guide-icon.png" />
                                                    </span> 
                                                    <span class="step_descr"> 
                                                        Guide
                                                    </span> 
                                                </a> 
                                            </li>
                                            <li> <a href="#step-2"> <span class="step_no">1</span> <span class="step_descr"> Basic Info </span> </a> </li>
                                            <li> <a href="#step-3"> <span class="step_no">2</span> <span class="step_descr"> Additional Info </span> </a> </li>
                                            <li> <a href="#step-4"> <span class="step_no">3</span> <span class="step_descr"> Company </span> </a> </li>
                                            <li> 
                                                <a href="#step-5"> 
                                                    <span class="step_no" >    
                                                        <img class="mb-1" height="20" width="20" src="<?php echo url('/'); ?>/assets/recruit/images/review-icon.png" />
                                                    </span>
                                                    <span class="step_descr"> Review & Publish </span> 
                                                </a> 
                                            </li>
                                        </ul>

                                        <hr class="hr-theme">
                                        <?php 
                                            if(count($employerprofile) > 0){
                                                $profile = $employerprofile[0];
                                            }else{
                                                $profile = array();
                                            }
                                        ?>
                                        <div class="p-5">
                                            <div id="step-1" style="min-height: 450px">                        
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6><b>Creating a new job</b></h6>
                                                        <p class="p-info">
                                                            This page guides you through the process of creating a new job post    
                                                        </p>
                                                        <p class="p-info">
                                                            Material confined likewise it humanity raillery an unpacked as he. Th comparison an. Matters engaged between he of pursuit manners w sentirnents simplicity connection. Far supply depart branch agreed ree chief merit no if. Now how her edward engage not horses. Oh resolution he dissimilar precaution to e moments. Merit gay end sight front Manor equal it on again ye folly by match In so melancholy as an old get our. 
                                                        </p>
                                                        <h6 class="h-info"><b>Video interview</b></h6>
                                                        <p class="p-info">
                                                            Material confined likewise it humanity raillery an unpacked as he. Th comparison an. Matters engaged between he of pursuit manners w sentirnents simplicity connection. Far supply depart branch agreed ree chief merit no if. Now how her edward engage not horses. Oh resolution he dissimilar precaution to e moments. Merit gay end sight front Manor equal it on again ye folly by match In so melancholy as an old get our. 
                                                        </p>
                                                        <h6 class="h-info"><b>Assessment test</b></h6>
                                                        <p class="p-info">
                                                            Material confined likewise it humanity raillery an unpacked as he. Th comparison an. Matters engaged between he of pursuit manners w sentirnents simplicity connection. Far supply depart branch agreed ree chief merit no if. Now how her edward engage not horses. Oh resolution he dissimilar precaution to e moments. Merit gay end sight front Manor equal it on again ye folly by match In so melancholy as an old get our. 
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-2" style="min-height: 450px">
                                                <h6><b>Basic Info</b></h6>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Titles 
                                                        <span class="form-required-icon">*</span>
                                                    </label>
                                                    <div class="col-md-5">
                                                        <input type="hidden" id="graduation_title_token" name="graduation_title_token"/>
                                                        <input type="hidden" id="graduation_id_token" name="graduation_id_token"/>
                                                        <input type="hidden" id="pg_title_token" name="pg_title_token"/>
                                                        <input type="hidden" id="pg_id_token" name="pg_id_token"/>
                                                        <input type="hidden" id="doctorate_title_token" name="doctorate_title_token"/>
                                                        <input type="hidden" id="doctorate_id_token" name="doctorate_id_token"/>
                                                        <input type="hidden"  class="form-control form-rounded" name="location_title_token" id="location_title_token">
                                                        <input type="hidden"  class="form-control form-rounded" name="location_id_token" id="location_id_token">
                                                        <select required="" class="form-control form-rounded" name="jobtitle" id="jobtitle">
                                                            <option selected="" value="">Select Job Titles</option>
                                                            <?php foreach ($Jobs_seed_data_Functional_Area as $jobTitleHeading) { ?>
                                                                <?php for ($i = 0; $i < count($Jobs_RolesBy_Id[$jobTitleHeading->id]); $i++) { ?>
                                                                    <option value="<?php echo $Jobs_RolesBy_Id[$jobTitleHeading->id][$i]->value ?>"><?php echo $Jobs_RolesBy_Id[$jobTitleHeading->id][$i]->value ?>
                                                                    </option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="fa fa-caret-down"></i>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-10 offset-md-2 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="error-jobtitle"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Industry 
                                                        <span class="form-required-icon">*</span>
                                                    </label>
                                                    <div class="col-md-5">
                                                        <select required="" class="form-control form-rounded" name="industry" id="industry" onChange="removeerroeindustry()">
                                                            <option selected="" value="">Select Industry</option>
                                                            <?php foreach ($Jobs_seed_data_Industry as $user7) { ?>
                                                                <option value="<?php echo $user7->id ?> -- <?php echo $user7->value ?>" >
                                                                    <?php echo $user7->value ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="fa fa-caret-down"></i>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-10 offset-md-2 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Functional area 
                                                        <span class="form-required-icon">*</span>
                                                    </label>
                                                    <div class="col-md-5">
                                                        <select required="" class="form-control form-rounded" name="functionalarea" id="FunctionRole" onChange="FunctionalJobRole()" >
                                                            <option selected="" value="">Select Functional area</option>
                                                            <?php foreach ($Jobs_seed_data_Functional_Area as $user8) { ?>
                                                                <option value="<?php echo $user8->id ?> -- <?php echo $user8->value ?>">
                                                                    <?php echo $user8->value ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="fa fa-caret-down"></i>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-10 offset-md-2 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Job role
                                                        <span class="form-required-icon">*</span>
                                                    </label>
                                                    <div class="col-md-5" id="FunctionalRole">
                                                        <select required="" class="form-control form-rounded" name="jobrole" id="jobrole">
                                                            <option selected="" value="">Select Job role</option>
                                                        </select>
                                                        <i class="fa fa-caret-down"></i>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-10 offset-md-2 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                    </div>
                                                </div>

                                                <hr class="hr-theme">

                                                <div class="form-group row mt-4">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        No, of openings
                                                        <span class="form-required-icon">*</span>
                                                    </label>
                                                    <div class="col-md-3">
                                                        <input type="number" class="form-control form-rounded" id="jobopning" name="jobopning" min="1" max="1000" onkeypress="return isOpningJob(event, this.id)" value="1"/>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-10 offset-md-2 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Employment Type 
                                                        <span class="form-required-icon">*</span>
                                                    </label>
                                                    <div class="col-md-9 mt-2">
                                                        <div class="form-check form-check-inline">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" id="Employmenttype[1]" name="Employmenttype" value="1">
                                                                <label class="custom-control-label" for="Employmenttype[1]">Permanent</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" id="Employmenttype[2]" name="Employmenttype" value="2">
                                                                <label class="custom-control-label" for="Employmenttype[2]">Contract</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>

                                                <hr class="hr-theme">

                                                <div class="form-group row mt-4">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Description
                                                        <span class="form-required-icon">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <textarea rows="5" type="number" class="form-control form-rounded-textarea" name="description" id="description" onChange="removeerroerd()"></textarea>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-10 offset-md-2 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label"> 
                                                        Responsibility
                                                        <span class="form-required-icon">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <textarea rows="5" type="number" class="form-control form-rounded-textarea" name="requisites" id="requisites"></textarea>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-10 offset-md-2 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div id="step-3">
                                                <h6><b>Education Requirments</b></h6>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Under Graduate courses 
                                                        <span class="form-required-icon">*</span>
                                                    </label>
                                                    <div class="col-md-5">
                                                        <select required="" class="form-control form-rounded" onChange="ShowUGStream()" id="UGCourses" name="UGCourses">
                                                            <option selected="" value="">Select Degree</option>
                                                            <?php foreach ($Jobs_seed_data_UG as $user3) { ?>
                                                                <option value="<?php echo $user3->value ?>">
                                                                    <?php echo $user3->value ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="fa fa-caret-down"></i>
                                                        <div class="clearfix"></div>
                                                        <div class="clearfix"></div>
                                                        <div id="UGStream">
                                                            <select id="program" required="" class="form-control form-rounded mt-3" id="UGStreams" name="UGStreams" onChange="addGraduation()">
                                                                <option selected="" value="">Select Program</option>
                                                            </select>
                                                            <i class="fa fa-caret-down"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2" style="display:none;">
                                                        <a href="#" class="btn btn-danger mt-1 btn-block" onclick="addGraduation()">Add <i class="ml-2 fa fa-plus"></i></a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="clearfix"></div>
                                                    <div id="divGraduation" class="col-md-9 offset-md-3 mt-3">

                                                    </div>
                                                    <div class="col-md-9 offset-md-3 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <div class="form-check form-check-inline">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="pg_enables" name="example1">
                                                                <label style="margin-top: -10px" class="custom-control-label col-form-label" for="pg_enables">Post Graduate courses</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div id="pg_hidden_div">
                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                    <select id="PGCourses" name="PGCourses"  onChange="ShowPGStream()" required="" class="form-control form-rounded">
                                                                        <option selected="" value="">Select Degree</option>
                                                                        <?php foreach ($Jobs_seed_data_PG as $user4) { ?>
                                                                            <option value="<?php echo $user4->value ?>">
                                                                                <?php echo $user4->value ?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <i class="fa fa-caret-down"></i>
                                                                    <div class="clearfix"></div>
                                                                    <div id="PGStream">
                                                                        <select required="" class="form-control form-rounded mt-3" id="PGStreams" name="PGStreams">
                                                                            <option selected="" value="">Select Program</option>
                                                                        </select>
                                                                        <i class="fa fa-caret-down"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <div class="col-md-2" style="display:none;">
                                                                    <a  href="#" class="btn btn-danger mt-1 btn-block" onclick="addPostGraduation()">Add <i class="ml-2 fa fa-plus"></i></a>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <div class="clearfix"></div>
                                                                <div id="divPostGraduation" class="col-md-12 mt-3">
            
                                                                </div>
                                                                <div class="col-md-12 mt-3">
                                                                    <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <div class="form-check form-check-inline">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="dc_enables" name="example1">
                                                                <label style="margin-top: -10px" class="custom-control-label col-form-label" for="dc_enables">Doctorate Courses</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div id="dc_hidden_div">
                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                    <select required="" class="form-control form-rounded" id="DoctorateCourses" name="DoctorateCourses" onChange="ShowDOCTORATEStream()">
                                                                        <option selected="" value="">Select Degree</option>
                                                                        <?php foreach ($Jobs_seed_data_DR as $user5) { ?>
                                                                            <option value="<?php echo $user5->value ?>">
                                                                                <?php echo $user5->value ?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <i class="fa fa-caret-down"></i>
                                                                    <div id="DOCTORATEStream">
                                                                        <select required="" class="form-control form-rounded mt-3" id="DoctorateStreams" name="DoctorateStreams">
                                                                            <option selected="" value="">Select Program</option>
                                                                        </select>
                                                                        <i class="fa fa-caret-down"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <div class="col-md-2" style="display:none;">
                                                                    <a  href="#" class="btn btn-danger mt-1 btn-block" onclick="addDoctorateInfo()">Add <i class="ml-2 fa fa-plus"></i></a>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <div class="clearfix"></div>
                                                                <div id="divDoctorate" class="col-md-12 mt-3">
            
                                                                </div>
                                                                <div class="col-md-12 mt-3">
                                                                    <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                <hr class="hr-theme">
                                                <h6 class="mt-4"><b>Location</b></h6>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Job location
                                                        <span class="form-required-icon">*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <select id="country" name="country" onChange="ShowState()" required="" class="form-control form-rounded">
                                                                    <option selected="" value="">Select Country</option>
                                                                    <?php foreach ($Country as $user6) { ?>
                                                                        <option value="<?php echo $user6->location_id ?>">
                                                                            <?php echo $user6->name ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                                <i class="fa fa-caret-down"></i>
                                                            </div>
                                                            <div class="col-md-4" id="NewState">
                                                                <select required="" class="form-control form-rounded" id="state" name="state" onChange="ShowCity()">
                                                                    <option selected="" value="">Select State</option>
                                                                </select>
                                                                <i class="fa fa-caret-down"></i>
                                                            </div>
                                                            <div class="col-md-4" id="NewCity">
                                                                <select required="" class="form-control form-rounded" id="city" name="city" onChange="addLocation();">
                                                                    <option selected="" value="">Select City</option>
                                                                </select>
                                                                <i class="fa fa-caret-down"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2" style="display:none;">
                                                        <a  href="#" class="btn btn-danger mt-1 btn-block" onclick="addLocation()">Add <i class="ml-2 fa fa-plus"></i></a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="clearfix"></div>
                                                    <div id="divLocation" class="col-md-9 offset-md-3 mt-3">

                                                    </div>
                                                    <div class="col-md-9 offset-md-3 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                    </div>
                                                </div>

                                                <hr class="hr-theme">
                                                <h6 class="mt-4"><b>Experience & Salary</b></h6>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Current Position
                                                    </label>
                                                    <div class="col-md-5">
                                                        <select required="" class="form-control form-rounded" name="currentposition" id="currentposition">
                                                            <option selected="" value="">Select Current Position</option>
                                                            <?php foreach ($Jobs_seed_data_Functional_Area as $jobTitleHeading) { ?>
                                                                <?php for ($i = 0; $i < count($Jobs_RolesBy_Id[$jobTitleHeading->id]); $i++) { ?>
                                                                    <option value="<?php echo $Jobs_RolesBy_Id[$jobTitleHeading->id][$i]->value ?>"><?php echo $Jobs_RolesBy_Id[$jobTitleHeading->id][$i]->value ?>
                                                                    </option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="fa fa-caret-down"></i>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-9 offset-md-3 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Service tenure in current position
                                                    </label>
                                                    <div class="col-md-2">
                                                        <input class="form-control form-rounded" type="number" name="servicetenure" id="servicetenure"/>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <span class="mt-3 font-size-11">Years</span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-9 offset-md-3 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Years of experience
                                                    </label>
                                                    <div class="col-md-3">
                                                        <div class="row mt-3">
                                                            <div class="col-sm-12">
                                                                <div id="exp_slider"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row slider-labels">
                                                            <div class="col-6 col-xs-6">
                                                                <span class="text-left" id="exp_low"></span>
                                                            </div>
                                                            <div class="col-6 col-xs-6 text-right">
                                                                <span class="text-right" id="exp_high"></span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <input type="hidden" value="" name="minexp" id="minexp">
                                                                <input type="hidden" value="" name="maxexp" id="maxexp">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <span class="mt-3 font-size-11">Years</span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Prefferd Age
                                                    </label>
                                                    <div class="col-md-3">
                                                        <div class="row mt-3">
                                                            <div class="col-sm-12">
                                                                <div id="slider_preffered_age"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row slider-labels">
                                                            <div class="col-6 col-xs-6">
                                                                <span class="text-left" id="preffered_age_low"></span>
                                                            </div>
                                                            <div class="col-6 col-xs-6 text-right">
                                                                <span class="text-right" id="preffered_age_high"></span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <input type="hidden" value="" name="prefminage" id="prefminage">
                                                                <input type="hidden" value="" name="prefmaxage" id="prefmaxage">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <span class="mt-3 font-size-11">Years</span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Annual Package
                                                        <span class="form-required-icon">*</span>
                                                    </label>
                                                    <div class="col-md-3">
                                                        <div class="row mt-3">
                                                            <div class="col-sm-12">
                                                                <div id="annualPackage"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row slider-labels">
                                                            <div class="col-6 col-xs-6">
                                                                <span class="text-left" id="annual_package_low"></span>
                                                            </div>
                                                            <div class="col-6 col-xs-6 text-right">
                                                                <span class="text-right" id="annual_package_high"></span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <input type="hidden" value="" id="annualminpkg" name="annualminpkg">
                                                                <input type="hidden" value="" id="annualmaxpkg" name="annualmaxpkg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <span class="mt-3 font-size-11">USD</span>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a data-toggle="collapse" data-target="#demo" href="#" class="btn btn-danger mt-1 btn-block">Add Currency<i class="ml-2 fa fa-plus"></i></a>
                                                    </div>

                                                    <div class="clearfix"></div>
                                                </div>

                                                <div id="demo" class="collapse">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-3 col-form-label">
                                                            Annual Package
                                                        </label>
                                                        <div class="col-md-3">
                                                            <div class="row mt-3">
                                                                <div class="col-sm-12">
                                                                    <div id="annual_package_more"></div>
                                                                </div>
                                                            </div>
                                                            <div class="row slider-labels">
                                                                <div class="col-6 col-xs-6">
                                                                    <span class="text-left" id="more_ap_low"></span>
                                                                </div>
                                                                <div class="col-6 col-xs-6 text-right">
                                                                    <span class="text-right" id="more_ap_high"></span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <input type="hidden" value="" id="annualminpkgm" name="annualminpkgm">
                                                                    <input type="hidden" value="" id="annualmaxpkgm" name="annualmaxpkgm">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <select required="" class="form-control form-rounded" name="currency" id="currency">
                                                                <option selected="" value="">Euros</option>
                                                                <option>Rupees</option>
                                                            </select>
                                                            <i class="fa fa-caret-down"></i>
                                                        </div>

                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Options
                                                    </label>
                                                    <div class="col-md-9 mt-2">
                                                        <div class="form-check">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="hidesalary" name="hidesalary" value="1">
                                                                <label class="custom-control-label" for="hidesalary">Hide Salary</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-check">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="salarynotconstraint" name="salarynotconstraint" value="1">
                                                                <label class="custom-control-label" for="salarynotconstraint">Salary is not a constraint</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>

                                            </div>      
                                            <div id="step-4" >
                                                <h6><b>Company Profile</b></h6>
                                                <div class="form-group row mt-4">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Company Url
                                                    </label>
                                                    <div class="col-md-5">
                                                        <input placeholder="Company Url" type="text" class="form-control form-rounded" id="CompanyVideoUrl" name="CompanyVideoUrl"/>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-10 offset-md-2 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Company / Project Brief
                                                    </label>
                                                    <div class="col-md-9">
                                                        <textarea rows="5" placeholder="Company / Project Brief" type="text" class="form-control form-rounded-textarea" name="brief" id="brief">
                                                        <?php 
                                                            if($profile->about){
                                                                echo trim($profile->about);
                                                            }
                                                        ?></textarea>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-9 offset-md-3 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Comments
                                                    </label>
                                                    <div class="col-md-9">
                                                        <textarea rows="5" placeholder="Comments" type="text" class="form-control form-rounded-textarea" name="comment" id="comment"></textarea>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-9 offset-md-3 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                    </div>
                                                </div>
                                                <hr class="hr-theme">

                                                <h6 class="mt-4"><b>Recruiter Contact</b></h6>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Name
                                                        <span class="form-required-icon">*</span>
                                                    </label>
                                                    <div class="col-md-5">
                                                        <input placeholder="Name" type="text" class="form-control form-rounded" name="recruitername" id="recruitername" value="<?php echo Auth::user()->name;?>"/>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-9 offset-md-3 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-4">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Email
                                                        <span class="form-required-icon">*</span> 
                                                    </label>
                                                    <div class="col-md-5">
                                                        <input placeholder="Email" type="email" class="form-control form-rounded" name="recruiteremail" id="recruiteremail" value="<?php echo Auth::user()->email;?>"/>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-9 offset-md-3 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-4">
                                                    <label for="inputEmail3" class="col-md-3 col-form-label">
                                                        Phone Number
                                                    </label>
                                                    <div class="col-md-5">
                                                        <input placeholder="Phone Number" type="tel" class="form-control form-rounded" name="recruiterphone" id="recruiterphone" onkeypress="return isNumberKey(event, this.id)"/>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-9 offset-md-3 mt-3">
                                                        <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                    </div>
                                                </div>

                                                <hr class="hr-theme">
                                                <button type="button" class="btn btn-info float-left mt-2" onClick="saveAndPostCreatejob('0');"><i class="fa fa-save mr-2"></i>Save as Draft</button>
                                            </div>
                                            <div id="step-5">
                                                <h6><b>Job Summary</b></h6>
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Job Title
                                                                </p>
                                                            </th>
                                                            <td id="pJobTitle">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Adc
                                                                </p>
                                                            </td>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Annual Min. Package
                                                                </p>
                                                            </th>
                                                            <td id="pAnnualMinPkg">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    0 Year's
                                                                </p>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Company Name
                                                                </p>
                                                            </th>
                                                            <td id="pCompanyName">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Company Name
                                                                </p>
                                                            </td>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Annual Max. Package
                                                                </p>
                                                            </th>
                                                            <td id="pAnnualMaxPkg">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    444
                                                                </p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Min years of exp.

                                                                </p>
                                                            </th>
                                                            <td id="pMinExp">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    4
                                                                </p>
                                                            </td>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Current Position
                                                                </p>
                                                            </th>
                                                            <td id="pCurrentPosition">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Lorem
                                                                </p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Max. Years of exp.
                                                                </p>
                                                            </th>
                                                            <td id="pMaxExp">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    4
                                                                </p>
                                                            </td>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Services Tenure in the Curr. positions
                                                                </p>
                                                            </th>
                                                            <td id="pServiceTenure">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Lorem
                                                                </p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Employment Type
                                                                </p>
                                                            </th>
                                                            <td id="pEmploymentType">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    4
                                                                </p>
                                                            </td>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Company Url

                                                                </p>
                                                            </th>
                                                            <td id="pCompanyURL">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Lorem
                                                                </p>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Currency
                                                                </p>
                                                            </th>
                                                            <td id="pCurrency">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    4
                                                                </p>
                                                            </td>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Preffered Max. Age
                                                                </p>
                                                            </th>
                                                            <td id="pPrefMaxAge">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Lorem
                                                                </p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Preferred Min. Age
                                                                </p>
                                                            </th>
                                                            <td id="pPrefMinAge">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    4
                                                                </p>
                                                            </td>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Max Years of Rel. Exp.
                                                                </p>
                                                            </th>
                                                            <td id="pRelMaxExp">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Lorem
                                                                </p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Functional Area

                                                                </p>
                                                            </th>
                                                            <td id="pFunctionalArea">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    4
                                                                </p>
                                                            </td>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Min Years of Rel.Exp

                                                                </p>
                                                            </th>
                                                            <td id="pRelMinExp">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Lorem
                                                                </p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Job Role


                                                                </p>
                                                            </th>
                                                            <td id="pJobRole">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    4
                                                                </p>
                                                            </td>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Name

                                                                </p>
                                                            </th>
                                                            <td id="pName">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Lorem
                                                                </p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Industry


                                                                </p>
                                                            </th>
                                                            <td id="pIndustry">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    4
                                                                </p>
                                                            </td>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Email Address
                                                                </p>
                                                            </th>
                                                            <td id="pEmailId">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Lorem
                                                                </p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    No, of openings
                                                                </p>
                                                            </th>
                                                            <td id="pOpenings">
                                                                <p class="jobs-li-place text-justify p-info">

                                                                </p>
                                                            </td>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Phone
                                                                </p>
                                                            </th>
                                                            <td id="pPhone">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Lorem
                                                                </p>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>

                                                <h6 class="h-info"><b>Description</b></h6>
                                                <div id="pDescription">
                                                    <p class="p-info">
                                                    </p>
                                                </div>
                                                
                                                <h6 class="h-info"><b>Responsibility</b></h6>
                                                <div id="pRequisites">
                                                    <p class="p-info">
                                                    </p>
                                                </div>


                                                <hr class="hr-theme">
                                                <h6 class="h-info mt-3"><b>Educational Qualifications</b></h6>
                                                <p class="p-info">
                                                    UG Courses : <span class="h-info">
                                                        <div id="pUgCourse">
                                                        </div>
                                                    </span>
                                                </p>

                                                <p class="p-info">
                                                    PG Courses : <span class="h-info">
                                                        <div id="pPgCourse">
                                                        </div>
                                                    </span>
                                                </p>


                                                <p class="p-info">
                                                    Doctorate Courses : <span class="h-info">
                                                        <div id="pDocCourse">
                                                        </div>
                                                    </span>
                                                </p>



                                                <h6 class="h-info mt-3"><b>Locations</b></h6>
                                                <p class="p-info">
                                                    Locations : <span class="h-info">
                                                        <div id="pLocation">
                                                        </div>
                                                    </span>
                                                </p>


                                                <hr class="hr-theme">

                                                <h6 class="h-info mt-3"><b>Company/Project Brief</b></h6>
                                                <p class="p-info">
                                                <div id="pBrief">
                                                </div>
                                                </p>

                                                <h6 class="h-info mt-3"><b>Comments (if any-optional)</b></h6>
                                                <p class="p-info">
                                                <div id="pComment">
                                                </div>
                                                </p>
                                                <hr class="hr-theme">

                                                <button type="button" class="btn btn-info float-left mt-2" onClick="saveAndPostCreatejob('0');"><i class="fa fa-save mr-2"></i>Save as Draft</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- End SmartWizard Content --> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Model dialog starts -->
                <div id="myModal" class="modal">
    <div  id="a1"> 
        <ul class="loader">
            <li-loader class="dot"></li-loader>
            <li-loader class="dot"></li-loader>
            <li-loader class="dot"></li-loader>
            <li-loader class="dot"></li-loader>
            <li-loader class="dot"></li-loader>
            <li-loader class="dot"></li-loader>
        </ul>
    </div>
</div>
<div class="modal fade bs-example-modal-sm" id="postmodelincreatejob" tabindex="-1" role="dialog" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Confirmation
                </h4>
            </div>
            <div class="modal-body">
                <h4>Do You Want to Post this Job ?
                </h4>
            </div>
            <div class="modal-footer">
                <a href="{{ url('/employer/createjobposting') }}">
                    <button type="button" class="btn btn-default pull-left">
                        <i class="fa fa-times"> No
                        </i>
                    </button>
                </a>
                <a href="{{ url('/employer/jobposting') }}">
                    <button type="button" class="btn btn-success">
                        <i class="fa fa-check"> Yes
                        </i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>           
            <!-- Model dialog ends -->
        </div>
        <!-- End Main -->

        @include('recruitertheme.js')

        <!-- ./wrapper -->
        <script>
            $(document).ready(function () {
                /* SMART WIZARD */

                function init_SmartWizard() {
                    if (typeof ($.fn.smartWizard) === 'undefined') {
                        return;
                    }
                    console.log('init_SmartWizard');

                    // $('#wizard').smartWizard();
                    $('#wizard').smartWizard({
                        labelNext: 'Next >', // label for Next button
                        labelPrevious: 'Back', // label for Previous button
                        labelFinish: 'Publish', // label for Finish button 
                        buttonOrder: ['prev', 'next', 'finish'],
                        onFinish: submitCallback,
                        onLeaveStep: leaveAStepCallback,
                        onFinish: onFinishCallback,
                    });
                    
                    $(".buttonFinish").hide(); 
                    $(".buttonPrevious").hide(); 

                    function submitCallback(objs, context) {
                        //alert("submit call back");
                        ///saveAndPostCreatejob('1')
                    }

                    function leaveAStepCallback(obj, context) {
                        //alert("Leaving step " + context.fromStep + " to go to step " + context.toStep);
                        if(context.toStep === 5){
                            $(".buttonFinish").show(); 
                            $(".buttonNext").hide(); 
                            //$('#wizard').smartWizard('', true);
                        }else{
                            $(".buttonFinish").hide(); 
                            $(".buttonNext").show(); 
                            //$('#wizard').smartWizard('.buttonFinish', false);
                        }
                        
                        if(context.toStep === 1){
                            $(".buttonPrevious").hide(); 
                            //$('#wizard').smartWizard('', true);
                        }else{
                            $(".buttonPrevious").show(); 
                            //$('#wizard').smartWizard('.buttonFinish', false);
                        }
                        return validateSteps(context.fromStep); // return false to stay on step and true to continue navigation 
                    }

                    function onFinishCallback(objs, context) {
                        //alert("finish call back");
                        if (validateAllSteps()) {
                            saveAndPostCreatejob('1')
                        }
                    }

                    // Your Step validation logic
                    function validateSteps(stepnumber) {
                        var isStepValid = false;
                        var isHavingError = 0;
                        if (stepnumber == 1) {
                            if (isHavingError == 0) {
                                isStepValid = true;
                            }
                            return isStepValid;
                        }

                        if (stepnumber == 2) {
                            isStepValid = false;
                            var jobTitle = document.getElementById('jobtitle').value;
                            var indstry = document.getElementById('industry').value;
                            var FunctionalArea = document.getElementById('FunctionRole').value;
                            var jbrl = document.getElementById('jobrole').value;
                            var jobopning = document.getElementById('jobopning').value;
                            var Employmenttype = document.querySelector('input[name="Employmenttype"]:checked').value;
                            var roleDescription = document.getElementById('description').value;
                            var RoleRequisites = document.getElementById('requisites').value;
                            
                            var industry = indstry.split(" -- ", 1);
                            var FunctionRole = FunctionalArea.split(" -- ", 1);
                            var Jobrole = jbrl.split(" -- ", 1);
                
                            $("#pJobTitle").html('<p class="jobs-li-place text-justify p-info">' + jobTitle + '</p>');
                            $("#pIndustry").html('<p class="jobs-li-place text-justify p-info">' + indstry + '</p>');
                            $("#pFunctionalArea").html('<p class="jobs-li-place text-justify p-info">' + FunctionalArea + '</p>');
                            $("#pJobRole").html('<p class="jobs-li-place text-justify p-info">' + jbrl + '</p>');
                            $("#pOpenings").html('<p class="jobs-li-place text-justify p-info">' + jobopning + '</p>');
                            if (Employmenttype === 1) {
                                $("#pEmploymentType").html('<p class="jobs-li-place text-justify p-info">Permanent</p>');
                            } else {
                                $("#pEmploymentType").html('<p class="jobs-li-place text-justify p-info">Contract</p>');
                            }
                            $("#pDescription").html('<p class="jobs-li-place text-justify p-info">' + roleDescription + '</p>');
                            $("#pRequisites").html('<p class="jobs-li-place text-justify p-info">' + RoleRequisites + '</p>');
                            if (jobTitle.length === 0) {
                                //alert('in error');
                                //$("#error-jobtitle").text("This field is required");
                                $('#jobtitle').focus();
                                isHavingError = 1;
                                isStepValid = false;
                            }

                            if (indstry.length == 0) {
                                $('#industry').focus();
                                isHavingError = 1;
                                isStepValid = false;
                            }

                            if (FunctionalArea.length == 0) {
                                $('#FunctionRole').focus();
                                isHavingError = 1;
                                isStepValid = false;
                            }

                            if (jbrl.length == 0) {
                                $('#jobrole').focus();
                                isHavingError = 1;
                                isStepValid = false;
                            }

                            if (jobopning.length == 0) {
                                $('#jobopning').focus();
                                isHavingError = 1;
                                isStepValid = false;
                            }

                            if (Employmenttype.length == 0) {
                                $('#Employmenttype').focus();
                                isHavingError = 1;
                                isStepValid = false;
                            }

                            if (roleDescription.length == 0) {
                                $('#description').focus();
                                isHavingError = 1;
                                isStepValid = false;
                            }

                            if (RoleRequisites.length == 0) {
                                $('#requisites').focus();
                                isHavingError = 1;
                                isStepValid = false;
                            }

                            if (isHavingError == 0) {
                                isStepValid = true;
                            }
                            return isStepValid;
                        }

                        if (stepnumber == 3) {
                            isStepValid = false;
                            $("#pUgCourse").empty();
                            $("#pPgCourse").empty();
                            $("#pDocCourse").empty();
                            $("#pLocation").empty();
                            var divUGs = document.getElementById('divGraduation').innerHTML;
                            var divLocations = document.getElementById('divLocation').innerHTML;
                            var minPackage = document.getElementById('annualminpkg').value;
                            var maxPackage = document.getElementById('annualmaxpkg').value;
                            var prefferedMinAge = document.getElementById('prefminage').value;
                            var prefferedMaxAge = document.getElementById('prefmaxage').value;
                            var minExp = document.getElementById('minexp').value;
                            var maxExp = document.getElementById('maxexp').value;
                            var serviceTenure = document.getElementById('servicetenure').value;
                            var currentPosition = document.getElementById('currentposition').value;

                            $("#pAnnualMinPkg").html('<p class="jobs-li-place text-justify p-info">' + minPackage + '</p>');
                            $("#pAnnualMaxPkg").html('<p class="jobs-li-place text-justify p-info">' + maxPackage + '</p>');
                            $("#pMinExp").html('<p class="jobs-li-place text-justify p-info">' + minExp + " Year/s" + '</p>');
                            $("#pMaxExp").html('<p class="jobs-li-place text-justify p-info">' + maxExp + " Year/s" + '</p>');
                            $("#pRelMinExp").html('<p class="jobs-li-place text-justify p-info">' + minExp + " Year/s" + '</p>');
                            $("#pRelMaxExp").html('<p class="jobs-li-place text-justify p-info">' + maxExp + " Year/s" + '</p>');
                            $("#pPrefMinAge").html('<p class="jobs-li-place text-justify p-info">' + prefferedMinAge + " Year/s" + '</p>');
                            $("#pPrefMaxAge").html('<p class="jobs-li-place text-justify p-info">' + prefferedMaxAge + " Year/s" + '</p>');
                            $("#pServiceTenure").html('<p class="jobs-li-place text-justify p-info">' + serviceTenure + '</p>');
                            $("#pCurrentPosition").html('<p class="jobs-li-place text-justify p-info">' + currentPosition + '</p>');

                            $("#divGraduation").clone().appendTo($("#pUgCourse"));
                            $("#divPostGraduation").clone().appendTo($("#pPgCourse"));
                            $("#divDoctorate").clone().appendTo($("#pDocCourse"));
                            $("#divLocation").clone().appendTo($("#pLocation"));

                            if (divUGs.trim().length == 0) {
                                isHavingError = 1;
                                isStepValid = false;
                            }

                            if (divLocations.trim().length == 0) {
                                isHavingError = 1;
                                isStepValid = false;
                            }

                            if (minPackage.length == 0) {
                                $('#annualminpkg').focus();
                                isHavingError = 1;
                                isStepValid = false;
                            }

                            if (maxPackage.length == 0) {
                                $('#annualmaxpkg').focus();
                                isHavingError = 1;
                                isStepValid = false;
                            }
                            if (isHavingError == 0) {
                                isStepValid = true;
                            }
                            return isStepValid;
                        }

                        if (stepnumber == 4) {
                            isStepValid = false;
                            var recruiterName = document.getElementById('recruitername').value;
                            var recruiterEmail = document.getElementById('recruiteremail').value;
                            var recruiterphone = document.getElementById('recruiterphone').value;
                            var briefInfo = document.getElementById('brief').value;
                            var comment = document.getElementById('comment').value;
                            var url = document.getElementById('CompanyVideoUrl').value;

                            $("#pName").html('<p class="jobs-li-place text-justify p-info">' + recruiterName + '</p>');
                            $("#pEmailId").html('<p class="jobs-li-place text-justify p-info">' + recruiterEmail + '</p>');
                            $("#pPhone").html('<p class="jobs-li-place text-justify p-info">' + recruiterphone + '</p>');

                            $("#pCompanyURL").html('<p class="jobs-li-place text-justify p-info">' + url + '</p>');
                            $("#pComment").html('<p class="jobs-li-place text-justify p-info">' + comment + '</p>');
                            $("#pBrief").html('<p class="jobs-li-place text-justify p-info">' + briefInfo + '</p>');

                            if (recruiterName.length == 0) {
                                $('#recruitername').focus();
                                isHavingError = 1;
                                isStepValid = false;
                            }

                            if (recruiterEmail.length == 0) {
                                $('#recruiteremail').focus();
                                isHavingError = 1;
                                isStepValid = false;
                            }

                            if (isHavingError == 0) {
                                isStepValid = true;
                            }

                            return isStepValid;
                        }

                        if (stepnumber == 5) {
                            var jobTitle = document.getElementById('jobtitle').value;
                            document.getElementById("pJobTitle").innerHTML = jobTitle;
                            isStepValid = false;
                            //var paymentmethod = $('#paymentmethod').val();
//                            var deliveryaddress = $('#deliveryaddress').val();
                            var errors2a = 0;

                            if ((errors2a) == 0) {
                                isStepValid = true;
                            }

                            return isStepValid;
                        }
                        
                    }


                    function validateAllSteps() {
                        var isStepValid = false;
                        var isHavingError = 0;
                        
                        var jobTitle = document.getElementById('jobtitle').value;
                        var indstry = document.getElementById('industry').value;
                        var FunctionalArea = document.getElementById('FunctionRole').value;
                        var jbrl = document.getElementById('jobrole').value;
                        var jobopning = document.getElementById('jobopning').value;
                        var Employmenttype = document.querySelector('input[name="Employmenttype"]:checked').value;
                        var roleDescription = document.getElementById('description').value;
                        var RoleRequisites = document.getElementById('requisites').value;
                        
                        var divUGs = document.getElementById('divGraduation').innerHTML;
                        var divLocations = document.getElementById('divLocation').innerHTML;
                        var minPackage = document.getElementById('annualminpkg').value;
                        var maxPackage = document.getElementById('annualmaxpkg').value;
                        var prefferedMinAge = document.getElementById('prefminage').value;
                        var prefferedMaxAge = document.getElementById('prefmaxage').value;
                        var minExp = document.getElementById('minexp').value;
                        var maxExp = document.getElementById('maxexp').value;
                        var serviceTenure = document.getElementById('servicetenure').value;
                        var currentPosition = document.getElementById('currentposition').value;
                        
                        var recruiterName = document.getElementById('recruitername').value;
                        var recruiterEmail = document.getElementById('recruiteremail').value;
                        var recruiterphone = document.getElementById('recruiterphone').value;
                        var briefInfo = document.getElementById('brief').value;
                        var comment = document.getElementById('comment').value;
                        var url = document.getElementById('CompanyVideoUrl').value;

                        if (jobTitle.length === 0) {
                            isHavingError = 1;
                            isStepValid = false;
                        }

                        if (indstry.length == 0) {
                            isHavingError = 1;
                            isStepValid = false;
                        }

                        if (FunctionalArea.length == 0) {
                            isHavingError = 1;
                            isStepValid = false;
                        }

                        if (jbrl.length == 0) {
                            isHavingError = 1;
                            isStepValid = false;
                        }

                        if (jobopning.length == 0) {
                            isHavingError = 1;
                            isStepValid = false;
                        }

                        if (Employmenttype.length == 0) {
                            isHavingError = 1;
                            isStepValid = false;
                        }

                        if (roleDescription.length == 0) {
                            isHavingError = 1;
                            isStepValid = false;
                        }

                        if (RoleRequisites.length == 0) {
                            isHavingError = 1;
                            isStepValid = false;
                        }
                        
                        if (divUGs.trim().length == 0) {
                            isHavingError = 1;
                            isStepValid = false;
                        }

                        if (divLocations.trim().length == 0) {
                            isHavingError = 1;
                            isStepValid = false;
                        }

                        if (minPackage.length == 0) {
                            isHavingError = 1;
                            isStepValid = false;
                        }

                        if (maxPackage.length == 0) {
                            isHavingError = 1;
                            isStepValid = false;
                        }
                        
                        if (recruiterName.length == 0) {
                            isHavingError = 1;
                            isStepValid = false;
                        }

                        if (recruiterEmail.length == 0) {
                            isHavingError = 1;
                            isStepValid = false;
                        }

                        if (isHavingError == 0) {
                            isStepValid = true;
                        }

                        return isStepValid;
                    }

                    function alertFun() {
                        console.log("Submit form");
                        $('#rfqForm').submit();
                    }
                    $('#wizard_verticle').smartWizard({
                        transitionEffect: 'slide',
                    });

                    $('.buttonNext').addClass('btn btn-danger');
                    $('.buttonPrevious').addClass('btn btn-info');
                    $('.buttonFinish').addClass('btn btn-success');

                }

                function init_validator() {

                    if (typeof (validator) === 'undefined') {
                        return;
                    }
                    console.log('init_validator');

                    // initialize the validator function
                    validator.message.date = 'not a real date';

                    // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
                    $('form')
                            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
                            .on('change', 'select.required', validator.checkField)
                            .on('keypress', 'input[required][pattern]', validator.keypress);

                    $('.multi.required').on('keyup blur', 'input', function () {
                        validator.checkField.apply($(this).siblings().last()[0]);
                    });

                    $('form').submit(function (e) {
                        e.preventDefault();
                        var submit = true;

                        // evaluate the form using generic validaing
                        if (!validator.checkAll($(this))) {
                            submit = false;
                        }

                        if (submit)
                            this.submit();

                        return false;
                    });

                }


                init_SmartWizard();

                $('.noUi-handle1').on('click', function () {
                    $(this).width(50);
                });
                
                var expSlider = document.getElementById('exp_slider');
                
                var expFormat = wNumb({
                    decimals: 0,
                    thousand: ',',
                });
                
                noUiSlider.create(expSlider, {
                    start: [5, 15],
                    step: 1,
                    range: {
                        'min': [0],
                        'max': [55]
                    },
                    format: expFormat,
                    connect: true
                });

                // Set visual min and max values and also update value hidden form inputs
                expSlider.noUiSlider.on('update', function (values, handle) {
                    document.getElementById('exp_low').innerHTML = values[0];
                    document.getElementById('exp_high').innerHTML = values[1];
                    document.getElementById('minexp').value = expFormat.from(
                            values[0]);
                    document.getElementById('maxexp').value = expFormat.from(
                            values[1]);
                });

                $('.noUi-handle2').on('click', function () {
                    $(this).width(50);
                });
                
                var ageSlider = document.getElementById('slider_preffered_age');
                
                var prefferedAgeFormat = wNumb({
                    decimals: 0,
                    thousand: ',',
                });
                
                noUiSlider.create(ageSlider, {
                    start: [50, 90],
                    step: 1,
                    range: {
                        'min': [0],
                        'max': [100]
                    },
                    format: prefferedAgeFormat,
                    connect: true
                });

                // Set visual min and max values and also update value hidden form inputs
                ageSlider.noUiSlider.on('update', function (values, handle) {
                    document.getElementById('preffered_age_low').innerHTML = values[0];
                    document.getElementById('preffered_age_high').innerHTML = values[1];
                    document.getElementById('prefminage').value = prefferedAgeFormat.from(
                            values[0]);
                    document.getElementById('prefmaxage').value = prefferedAgeFormat.from(
                            values[1]);
                });



                $('.noUi-handle3').on('click', function () {
                    $(this).width(50);
                });

                var annualPackageSlider = document.getElementById('annualPackage');
                var annualPackageFormat = wNumb({
                    decimals: 0,
                    thousand: ',',
                });

                noUiSlider.create(annualPackageSlider, {
                    start: [50000, 70000],
                    step: 1,
                    range: {
                        'min': [50000],
                        'max': [100000]
                    },
                    format: annualPackageFormat,
                    connect: true
                });

                // Set visual min and max values and also update value hidden form inputs
                annualPackageSlider.noUiSlider.on('update', function (values, handle) {
                    document.getElementById('annual_package_low').innerHTML = values[0];
                    document.getElementById('annual_package_high').innerHTML = values[1];
                    document.getElementById('annualminpkg').value = annualPackageFormat.from(
                            values[0]);
                    document.getElementById('annualmaxpkg').value = annualPackageFormat.from(
                            values[1]);
                });



                $('.noUi-handle4').on('click', function () {
                    $(this).width(50);
                });
                var moreApSlider = document.getElementById('annual_package_more');
                var moreApFormat = wNumb({
                    decimals: 0,
                    thousand: ',',
                });
                
                noUiSlider.create(moreApSlider, {
                    start: [50000, 70000],
                    step: 1,
                    range: {
                        'min': [50000],
                        'max': [100000]
                    },
                    format: moreApFormat,
                    connect: true
                });

                // Set visual min and max values and also update value hidden form inputs
                moreApSlider.noUiSlider.on('update', function (values, handle) {
                    document.getElementById('more_ap_low').innerHTML = values[0];
                    document.getElementById('more_ap_high').innerHTML = values[1];
                    document.getElementById('annualminpkgm').value = moreApFormat.from(
                            values[0]);
                    document.getElementById('annualmaxpkgm').value = moreApFormat.from(
                            values[1]);
                });

            });
        </script>

        <script>
            function ShowState() {
                var Country = document.getElementById('country').value;
                // console.log(vl);
                $.ajax({
                    type: "post",
                    url: "<?php echo url("/common/showstate"); ?>",
                    data: {
                        Country: Country, "_token": '{{csrf_token()}}'}
                    ,
                    context: document.body
                }
                ).done(function (msg) {
                    $('#NewState').html(msg);
                }
                );
            }
        </script>
        <script>
            function ShowCity() {
                var State = document.getElementById('state').value;
                // console.log(vl);
                $.ajax({
                    type: "post",
                    url: "<?php echo url("/common/showcityforjp"); ?>",
                    data: {
                        State: State, "_token": '{{csrf_token()}}'}
                    ,
                    context: document.body
                }
                ).done(function (msg) {
                    $('#NewCity').html(msg);
                }
                );
                document.getElementById('state-error').innerHTML = '';
            }
        </script>
        <script>
            function ShowUGStream() {
                var UGCourse = document.getElementById('UGCourses').value;
                //  alert(UGCourse); die();
                // console.log(vl);
                $.ajax({
                    type: "post",
                    url: "<?php echo url("/common/showugstreamforcj"); ?>",
                    data: {
                        UGCourse: UGCourse, "_token": '{{csrf_token()}}'},
                        context: document.body
                    }).done(function (msg) {
                        $('#UGStream').html(msg);
                    });
                }
        </script>
        <script>
            function ShowPGStream() {
                var PGCourse = document.getElementById('PGCourses').value;
                //alert(PGCourse); die();
                // console.log(vl);
                $.ajax({
                    type: "post",
                    url: "<?php echo url("/common/showpgstreamforcj"); ?>",
                    data: {
                        PGCourse: PGCourse, "_token": '{{csrf_token()}}'},
                        context: document.body
                    }).done(function (msg) {
                        $('#PGStream').html(msg);
                    });
                }
        </script>
        <script>
            function ShowDOCTORATEStream() {
                var DoctorateCourse = document.getElementById('DoctorateCourses').value;
                // alert(DoctorateCourse); die();
                // console.log(vl);
                $.ajax({
                    type: "post",
                    url: "<?php echo url("/common/showdoctoratestreamforcj"); ?>",
                    data: {
                        DoctorateCourse: DoctorateCourse, "_token": '{{csrf_token()}}'},
                        context: document.body
                    }).done(function (msg) {
                        $('#DOCTORATEStream').html(msg);
                    });
                }
        </script>
        <script>
            function FunctionalJobRole() {
                var FunctionalArea = document.getElementById('FunctionRole').value;
                // alert(FunctionalArea); 
                // console.log(vl);
                $.ajax({
                    type: "post",
                    url: "<?php echo url("/common/functionaljobrole"); ?>",
                    data: {
                        FunctionalArea: FunctionalArea, "_token": '{{csrf_token()}}'},
                        context: document.body
                }).done(function (msg) {
                    $('#FunctionalRole').html(msg);
                });
                document.getElementById('FunctionRole-error').innerHTML = '';
            }
        </script>


        <script>
            $(document).ready(function () {
                $("#pg_enables").click(function () {
                    if ($(this).is(":checked")) {
                        $("#pg_hidden_div").hide(300);
                    } else {
                        $("#pg_hidden_div").show(200);
                    }
                });
                
                $("#dc_enables").click(function () {
                    if ($(this).is(":checked")) {
                        $("#dc_hidden_div").hide(300);
                    } else {
                        $("#dc_hidden_div").show(200);
                    }
                });
                
                displayGraduations();
                displayPostGraduation();
                displayDoctorateInfo();
                displayLocations();
            });

            /* function addLocation() {
                var country = document.getElementById("country");
                var countryVal = country.value;
                var selected_country = country.options[country.selectedIndex].innerHTML;
                var state = document.getElementById("state");
                var stateVal = state.value;
                var selected_state = state.options[state.selectedIndex].innerHTML;
                var city = document.getElementById("city").value;
                console.log(selected_country + " " + selected_state + " " + city);

                var myLocations = $('#location_title_token').val() + selected_country + ' - ' + selected_state + ' - ' + city+ "&$#";
                $('#location_title_token').val(myLocations);

                var myLocationIds = $('#location_id_token').val() + "|" + countryVal + ',' + stateVal + ',' + city;
                $('#location_id_token').val(myLocationIds);

                displayLocations();
            }

            function displayLocations() {
                $('#divLocation').empty();
                var locTitles = $('#location_title_token').val().split("&$#");
                var locIds = $('#location_id_token').val().split("|");
                var btn = document.createElement("span");
                var btn = document.createElement("span");
                btn.style.marginLeft = '5px';
                btn.style.marginBottom = '5px';
                btn.innerHTML = "";
                for (var i = 0; i < locTitles.length; i++) {
                    var infoTitle = locTitles[i];
                    var infoId = locIds[i];
                    if (!infoTitle || 0 === infoTitle.length) {
                        //alert();
                    } else {
                        btn.innerHTML += '<a href="#" class="badge-theme no-decoration" onClick ="LocationsRemove(' + i + ')">' + infoTitle + '&nbsp;&nbsp;<i class="fa fa-times-circle-o"></i></a><input type ="hidden"  id="locationpreferedwithcity" name="locationpreferedwithcity" value="' + infoId + '">';
                        btn.id += "LocationSpan" + i;
                        document.getElementById("divLocation").appendChild(btn);
                    }
                }
                return false;
            }

            function LocationsRemove(length) {
                var allLocationSpan = $('#location_title_token').val().split("&$#");
                var allLocationIdSpan = $('#location_id_token').val().split("|");
                var autoLocName = [];
                var autoLocId = [];
                for (var i = 0; i < allLocationSpan.length; i++) {
                    if (length != i) {
                        autoLocName.push(allLocationSpan[i]);
                        autoLocId.push(allLocationIdSpan[i]);
                    }
                }
                $('#location_title_token').val(autoLocName.join('&$#'));
                $('#location_id_token').val(autoLocName.join('|'));
                displayLocations();
            } */
            
            function addLocation() {
        var locTitles = $('#location_title_token').val().split("&$#");
        var locIds = $('#location_id_token').val().split("|");
        var country = document.getElementById("country");
        var countryVal = country.value;
        var selected_country = country.options[country.selectedIndex].innerHTML;
        var state = document.getElementById("state");
        var stateVal = state.value;
        var selected_state = state.options[state.selectedIndex].innerHTML;
        var city = document.getElementById("city").value;
        console.log(selected_country+" "+selected_state+" "+city);
        var nameIs = selected_country.trim() + ' - ' + selected_state.trim() + ' - ' + city.trim();
        if (locTitles.indexOf(nameIs) != -1) {
            //console.log('Laravel is exist!');
            $('#error').html('<div class="alert alert-danger" id="myalertstatus" >Duplicate Locations are not allowed.</div>');
            window.location.hash = '#error';
            $('#myalertstatus').fadeOut(10000);
        }else {
            //alert($.inArray(""+country.value, allLocationSpan));
            var myLocations = $('#location_title_token').val()+"&$#"+ selected_country.trim() + ' - ' + selected_state.trim() + ' - ' + city.trim();
            $('#location_title_token').val(myLocations);
        
            var myLocationIds = $('#location_id_token').val()+"|"+ countryVal +','+ stateVal +','+ city ;
            $('#location_id_token').val(myLocationIds);
            displayLocations();
        }
    }
    
            function displayLocations(){
        $('#divLocation').empty();
        var locTitles = $('#location_title_token').val().split("&$#");
        var locIds = $('#location_id_token').val().split("|");
        
        var btn = document.createElement("span");
        var btn = document.createElement("span");
        btn.style.marginLeft = '5px';
        btn.style.marginBottom = '5px';
        btn.innerHTML = "";
        for(var i = 0; i < locTitles.length; i++){
            var infoTitle = locTitles[i];
            var infoId = locIds[i];
            if(!infoTitle || 0 === infoTitle.length){
                //alert();
            }else{
                btn.innerHTML += '<a href="#" class="badge-theme no-decoration" onClick ="LocationsRemove(' + i + ')">' + infoTitle + '&nbsp;&nbsp;<i class="fa fa-times-circle-o"></i></a><input type ="hidden"  id="locationpreferedwithcity[]" name="locationpreferedwithcity[]" value="'+ infoId +'">';
                btn.id += "LocationSpan" + i;
                document.getElementById("divLocation").appendChild(btn);
            }
        }
        return false;
    }
    
            function LocationsRemove(length){
        var allLocationSpan = $('#location_title_token').val().split("&$#");
        var allLocationIdSpan = $('#location_id_token').val().split("|");
        var autoLocName = [];
        var autoLocId = [];
        for(var i = 0; i < allLocationSpan.length; i++){
            if(length != i){
                autoLocName.push(allLocationSpan[i]);
                autoLocId.push(allLocationIdSpan[i]);
            }
        }
        $('#location_title_token').val(autoLocName.join('&$#'));
        $('#location_id_token').val(autoLocName.join('|'));
        displayLocations();
    }
    
            function addGraduation() {
                var graduationTitles = $('#graduation_title_token').val().split("&$#");
                var ugCourse = document.getElementById("UGCourses");
                var ugCourseName = ugCourse.value;
                //var ugCourseId = ugCourse.options[ugCourse.selectedIndex].innerHTML;
                //alert("----------"+ugCourseId);
                var ugStream = document.getElementById("UGStreams");
                var ugStreamName = ugStream.value;
                //var ugStreamId = ugStream.options[ugStream.selectedIndex].innerHTML;
                var ugIs = ugCourseName.trim() + ' - ' + ugStreamName.trim();
                if (graduationTitles.indexOf(ugIs) != -1) {
                    //console.log('Laravel is exist!');
                    $('#error').html('<div class="alert alert-danger" id="myalertstatus" >Duplicate Under Graduate courses are not allowed.</div>');
                    window.location.hash = '#error';
                    $('#myalertstatus').fadeOut(10000);
                }else {
                    //alert($.inArray(""+country.value, allLocationSpan));
                    var myLocations = $('#graduation_title_token').val() + ugCourseName.trim() + ' - ' + ugStreamName.trim()+ "&$#";
                    $('#graduation_title_token').val(myLocations);

                    var myLocationIds = $('#graduation_id_token').val() + "|" + ugCourseName.trim() + ',' + ugStreamName.trim();
                    $('#graduation_id_token').val(myLocationIds);
                    displayGraduations();
                }
            }

            function displayGraduations() {
                $('#divGraduation').empty();
                var allLocationSpan = $('#graduation_title_token').val().split("&$#");
                var btn = document.createElement("span");
                btn.style.marginLeft = '5px';
                btn.style.marginBottom = '5px';
                for (var i = 0; i < allLocationSpan.length; i++) {
                    var selected_title = allLocationSpan[i];
                    if (!selected_title || 0 === selected_title.length) {
                        //alert();
                    } else {
                        btn.innerHTML += '<a href="#" class="badge-theme no-decoration" onClick ="graduationRemove(' + i + ')">' + selected_title + ' &nbsp;&nbsp;<i class="fa fa-times-circle-o"></i></a><input type ="hidden" name="ugcourseswithstream"  id="ugcourseswithstream" value="' + selected_title + '">';
                        btn.id += "graduationSpan" + i;
                        document.getElementById("divGraduation").appendChild(btn);
                    }
                }
                return false;
            }

            function graduationRemove(length) {
                var allLocationSpan = $('#graduation_title_token').val().split("&$#");
                var favorite = [];
                for (var i = 0; i < allLocationSpan.length; i++) {
                    if (length != i) {
                        favorite.push(allLocationSpan[i]);
                    }
                }
                $('#graduation_title_token').val(favorite.join('&$#'));
                displayGraduations();
            }

            function addPostGraduation() {
                var graduationTitles = $('#pg_title_token').val().split("&$#");
                var pgCourse = document.getElementById("PGCourses");
                var pgCourseName = pgCourse.value;
                //var ugCourseId = pgCourse.options[pgCourse.selectedIndex].innerHTML;
                //alert("----------"+ugCourseId);
                var pgStream = document.getElementById("PGStreams");
                var pgStreamName = pgStream.value;
                //var pgStreamId = pgStream.options[pgStream.selectedIndex].innerHTML;
                var pgIs = pgCourseName.trim() + ' - ' + pgStreamName.trim();
                if (graduationTitles.indexOf(pgIs) != -1) {
                    //console.log('Laravel is exist!');
                    $('#error').html('<div class="alert alert-danger" id="myalertstatus" >Duplicate Post Graduate courses are not allowed.</div>');
                    window.location.hash = '#error';
                    $('#myalertstatus').fadeOut(10000);
                }else{
                    var myLocations = $('#pg_title_token').val()  + pgCourseName.trim() + ' - ' + pgStreamName.trim() + "&$#";
                    $('#pg_title_token').val(myLocations);
                    var myLocationIds = $('#pg_id_token').val() + "|" + pgCourseName.trim() + ',' + pgStreamName.trim();
                    $('#pg_id_token').val(myLocationIds);
                    displayPostGraduation();
                }
            }

            function displayPostGraduation() {
                $('#divPostGraduation').empty();
                var allLocationSpan = $('#pg_title_token').val().split("&$#");
                var btn = document.createElement("span");
                btn.style.marginLeft = '5px';
                btn.style.marginBottom = '5px';
                btn.innerHTML = "";
                for (var i = 0; i < allLocationSpan.length; i++) {
                    var selected_title = allLocationSpan[i];
                    if (!selected_title || 0 === selected_title.length) {
                        //alert();
                    } else {
                        btn.innerHTML += '<a href="#" class="badge-theme no-decoration" onClick ="postGraduationRemove(' + i + ')">' + selected_title + ' &nbsp;&nbsp;<i class="fa fa-times-circle-o"></i></a><input type ="hidden" name="pgcourseswithstream"  id="pgcourseswithstream" value="' + selected_title + '">';
                        btn.id += "pgSpan" + i;
                        document.getElementById("divPostGraduation").appendChild(btn);
                    }
                }
                return false;
            }
            
            function postGraduationRemove(length) {
                var allLocationSpan = $('#pg_title_token').val().split("&$#");
                var favorite = [];
                for (var i = 0; i < allLocationSpan.length; i++) {
                    if (length != i) {
                        favorite.push(allLocationSpan[i]);
                    }
                }
                $('#pg_title_token').val(favorite.join('&$#'));
                displayPostGraduation();
            }

            function addDoctorateInfo() {
                //alert("=================");
                var dcTitles = $('#doctorate_title_token').val().split("&$#");
                var pgCourse = document.getElementById("DoctorateCourses");
                var pgCourseName = pgCourse.value;
                //var ugCourseId = pgCourse.options[pgCourse.selectedIndex].innerHTML;
                //alert("----------"+ugCourseId);
                var pgStream = document.getElementById("DoctorateStreams");
                var pgStreamName = pgStream.value;
                //var pgStreamId = pgStream.options[pgStream.selectedIndex].innerHTML;
                var dcIs = pgCourseName.trim() + ' - ' + pgStreamName.trim();
                if (dcTitles.indexOf(dcIs) != -1) {
                    //console.log('Laravel is exist!');
                    $('#error').html('<div class="alert alert-danger" id="myalertstatus" >Duplicate Doctorate Courses are not allowed.</div>');
                    window.location.hash = '#error';
                    $('#myalertstatus').fadeOut(10000);
                }else{
                    var myLocations = $('#doctorate_title_token').val()  + pgCourseName.trim() + ' - ' + pgStreamName.trim()+ "&$#";
                    $('#doctorate_title_token').val(myLocations);
    
                    var myLocationIds = $('#doctorate_id_token').val() + "|" + pgCourseName.trim() + ',' + pgStreamName.trim();
                    $('#doctorate_id_token').val(myLocationIds);
    
                    displayDoctorateInfo();
                }
            }

            function displayDoctorateInfo() {
                $('#divDoctorate').empty();
                var allLocationSpan = $('#doctorate_title_token').val().split("&$#");
                var btn = document.createElement("span");
                btn.style.marginLeft = '5px';
                btn.style.marginBottom = '5px';
                btn.innerHTML = "";
                for (var i = 0; i < allLocationSpan.length; i++) {
                    var selected_title = allLocationSpan[i];
                    if (!selected_title || 0 === selected_title.length) {
                        //alert();
                    } else {
                        btn.innerHTML += '<a href="#" class="badge-theme no-decoration" onClick ="doctorateInfoRemove(' + i + ')">' + selected_title + ' &nbsp;&nbsp;<i class="fa fa-times-circle-o"></i></a><input type ="hidden" name="doctoratecourseswithstream"  id="doctoratecourseswithstream" value="' + selected_title + '">';
                        btn.id += "docSpan" + i;
                        document.getElementById("divDoctorate").appendChild(btn);
                    }
                }
                return false;
            }
            
            function doctorateInfoRemove(length) {
                var allLocationSpan = $('#doctorate_title_token').val().split("&$#");
                var favorite = [];
                for (var i = 0; i < allLocationSpan.length; i++) {
                    if (length != i) {
                        favorite.push(allLocationSpan[i]);
                    }
                }
                $('#doctorate_title_token').val(favorite.join('&$#'));
                displayDoctorateInfo();
            }

        </script>

        <script>
            function saveAndPostCreatejob(condition) {
                var PageSerial = '0';
                var boards = [];
                if (condition == '1') {
                    //alert("-----------condition======1----------------");
                    var i = 0;
                    /*$('.myjobboards:checked').each(function () {
                        var values = $(this).val();
                        boards[i] = values;
                        //console.log(boards[i]);
                        i++;
                    });*/
                    //console.log(i); 
                    console.log(boards);
                }
                
                if (condition == '0') {
                    //alert("-----------condition======0----------------");
                    /*var jobTitle = document.getElementById('jobtitle').value;
                    if (jobTitle.length == 0) {
                        //$("#myModal").remove();
                        //document.getElementById('jobtitle-error').innerHTML = 'This field is required.';
                        //document.getElementById('jobtitle').focus();
                        return false;
                    }*/
                }
                
                var ugarray = [];
                var pgarray = [];
                var doctoratearray = [];
                var countryarray = [];
                
                var Jobtitle = document.getElementById('jobtitle').value;
                //var Ccmpanyname = document.getElementById('Ccmpanyname').value;
                var Ccmpanyname = document.getElementById('recruitername').value;
                var indstry = document.getElementById('industry').value;
                var FnctnRle = document.getElementById('FunctionRole').value;
                var jbrl = document.getElementById('jobrole').value;
                var jobopning = document.getElementById('jobopning').value;
                var Employmenttype = document.querySelector('input[name="Employmenttype"]:checked').value;
                //var Employmenttype = document.querySelector('input[name="Employmenttype"]:checked').value;
                var editor1 = document.getElementById('description').value;
                var editor2 = document.getElementById('requisites').value; 
                
                var divUGs = document.getElementById('divGraduation').innerHTML;
                var divPGs = document.getElementById('divPostGraduation').innerHTML;
                var divDoctorates = document.getElementById('divDoctorate').innerHTML;
                var divLocations = document.getElementById('divLocation').innerHTML;
                
                var servicetenure = document.getElementById('servicetenure').value;
                var crrentpstion = document.getElementById('currentposition').value;
                var annualminpkg = document.getElementById('annualminpkg').value;
                var annualmaxpkg = document.getElementById('annualmaxpkg').value;
                var prefminage = document.getElementById('prefminage').value;
                var prefmaxage = document.getElementById('prefmaxage').value;
                var minexp = document.getElementById('minexp').value;
                var maxexp = document.getElementById('maxexp').value;
                var maxrelexp = document.getElementById('minexp').value;
                var minrelexp = document.getElementById('maxexp').value;
                
                //var hidesalary = document.getElementById('hidesalary').value;
                //var salarynotconstraint = document.getElementById('salarynotconstraint').value;
                //var currency = document.querySelector('input[name="currency"]:checked').value;
                var currency = document.getElementById('currency').value;
                
                var Name = document.getElementById('recruitername').value;
                var EmailAddress = document.getElementById('recruiteremail').value;
                var PhoneNumber = document.getElementById('recruiterphone').value;
                var editor3 = document.getElementById('brief').value;
                var editor4 = document.getElementById('comment').value;
                var CompanyVideoUrl = document.getElementById('CompanyVideoUrl').value;
                var industry = indstry.split(" -- ", 1);
                var FunctionRole = FnctnRle.split(" -- ", 1);
                var Jobrole = jbrl.split(" -- ", 1);
                var country = document.getElementsByName('locationpreferedwithcity');
                var ug = document.getElementsByName('ugcourseswithstream');
                var pg = document.getElementsByName('pgcourseswithstream');
                var doctorate = document.getElementsByName('doctoratecourseswithstream');
                
                //alert(ug);
                var obj = {};
                obj.name = Name;
                obj.emailid = EmailAddress;
                obj.phonenumber = PhoneNumber;
                if ($('#hidesalary').not(':checked').length) {
                    var hidesalary = 0;
                } else {
                    var hidesalary = 1;
                }
                if ($('#salarynotconstraint').not(':checked').length) {
                    var salarynotconstraint = 0;
                } else {
                    var salarynotconstraint = 1;
                }
                
                for (var i = 0; i < ug.length; i++) {
                    ugarray[i] = ug[i].value;
                    console.log(ugarray[i]);
                }
                for (var j = 0; j < pg.length; j++) {
                    pgarray[j] = pg[j].value;
                    console.log(pgarray[j]);
                }
                for (var k = 0; k < doctorate.length; k++) {
                    doctoratearray[k] = doctorate[k].value;
                    console.log(doctoratearray[k]);
                }
                for (var l = 0; l < country.length; l++) {
                    countryarray[l] = country[l].value;
                    console.log(countryarray[l]);
                }
                //alert(ug.length+"==========="+ugarray.length);
                /*console.log("===================Posting Data Is==========================");
                console.log('Jobtitle----------->'+ Jobtitle);
                console.log('Ccmpanyname----------->'+ Ccmpanyname);
                console.log('ug----------->'+ ugarray);
                console.log('pg----------->'+ pgarray);
                console.log('doctorate----------->'+ doctoratearray);
                console.log('country----------->'+ countryarray);
                console.log('editor1----------->'+ editor1);
                console.log('editor2----------->'+ editor2);
                console.log('editor3----------->'+ editor3);
                console.log('editor4----------->'+ editor4);
                console.log('minexp----------->'+ minexp);
                console.log('maxexp----------->'+ maxexp);
                console.log('prefminage----------->'+ prefminage);
                console.log('prefmaxage----------->'+ prefmaxage);
                console.log('minrelexp----------->'+ minrelexp);
                console.log('maxrelexp----------->'+ maxrelexp);
                console.log('annualminpkg----------->'+ annualminpkg);
                console.log('annualmaxpkg----------->'+ annualmaxpkg);
                console.log('Employmenttype----------->'+ Employmenttype);
                console.log('currency----------->'+ currency);
                console.log('salarynotconstraint----------->'+ salarynotconstraint);
                console.log('Name----------->'+ Name);
                console.log('EmailAddress----------->'+ EmailAddress);
                console.log('PhoneNumber----------->'+ PhoneNumber);
                console.log('CompanyVideoUrl----------->'+ CompanyVideoUrl);
                console.log('currentposition----------->'+ crrentpstion);
                console.log('condition----------->'+ condition);
                console.log('boards----------->'+ boards);
                console.log('jobopning----------->'+ jobopning);
                console.log('_token----------->'+ '{{csrf_token()}}');
                console.log('industry----------->'+ industry);
                console.log('jobrole----------->'+ Jobrole);
                console.log('FunctionRole----------->'+ FunctionRole);
                console.log('obj----------->'+ obj);

                console.log("===================Posting Data End==========================");*/

                if (condition == '1') {
                    //alert("Proceed with condition ===> 1 macha");
                    //$('#postmodelincreatejob').modal('show');
                    $.ajax({
                        url: '<?php echo url("/employer/createjob"); ?>',
                        type: 'POST',
                        data: {
                            'Jobtitle': Jobtitle,
                            'Ccmpanyname': Ccmpanyname,
                            'ug': ugarray.toString(),
                            'pg': pgarray.toString(),
                            'doctorate': doctoratearray.toString(),
                            'country': countryarray,
                            'editor1': editor1,
                            'editor2': editor2,
                            'editor3': editor3,
                            'editor4': editor4,
                            'minexp': minexp,
                            'maxexp': maxexp,
                            'prefminage': prefminage,
                            'prefmaxage': prefmaxage,
                            'maxrelexp': maxrelexp,
                            'minrelexp': minrelexp,
                            'annualminpkg': annualminpkg,
                            'annualmaxpkg': annualmaxpkg,
                            'Employmenttype': Employmenttype,
                            'currency': currency,
                            'hidesalary': hidesalary,
                            'salarynotconstraint': salarynotconstraint,
                            'Name': Name,
                            'EmailAddress': EmailAddress,
                            'PhoneNumber': PhoneNumber,
                            'CompanyVideoUrl': CompanyVideoUrl,
                            'currentposition': crrentpstion,
                            'condition': condition,
                            'boards': boards,
                            'jobopning': jobopning,
                            '_token': '{{csrf_token()}}',
                            'industry': industry,
                            'jobrole': Jobrole,
                            'FunctionRole': FunctionRole,
                            //'context': document.body,
                            obj
                        },
                        success: function (msg) {
                            //console.log(data); 
                            //alert("Im in success");
                            //$("#myModal").hide();
                            //$('#error').html('<div class="alert alert-success" id="myalertstatus" >You have Successfully Finished the Job.</div>');
                            //window.location.hash = '#error';
                            //$('#myalertstatus').fadeOut(10000);
                            /*$.toast({
                                heading: 'Success',
                                text: 'You have Successfully Finished the Job.',
                                icon: 'success',
                                position: 'top-right'
                            })*/
                            $('#postmodelincreatejob').modal('show');
                        },
                        error: function (msg) {
                            //console.log(data);
                            $('#error').html('<div class="alert alert-danger" id="myalertstatus" >Data is Not Valid, Please Insert Valid Data.</div>');
                            window.location.hash = '#error';
                            $('#myalertstatus').fadeOut(10000);
                        }
                    });
                }else if (condition == '0'){
                    //alert("Proceed with condition ===> 0 macha");
                    $.ajax({
                        url: '<?php echo url("/employer/createjob"); ?>',
                        type: 'POST',
                        data: {
                            'Jobtitle': Jobtitle,
                            'Ccmpanyname': Ccmpanyname,
                            'ug': ugarray,
                            'pg': pgarray,
                            'doctorate': doctoratearray,
                            'country': countryarray,
                            'editor1': editor1,
                            'editor2': editor2,
                            'editor3': editor3,
                            'editor4': editor4,
                            'minexp': minexp,
                            'maxexp': maxexp,
                            'prefminage': prefminage,
                            'prefmaxage': prefmaxage,
                            'maxrelexp': maxrelexp,
                            'minrelexp': minrelexp,
                            'annualminpkg': annualminpkg,
                            'annualmaxpkg': annualmaxpkg,
                            'Employmenttype': Employmenttype,
                            'currency': currency,
                            'hidesalary': hidesalary,
                            'salarynotconstraint': salarynotconstraint,
                            'Name': Name,
                            'EmailAddress': EmailAddress,
                            'PhoneNumber': PhoneNumber,
                            'CompanyVideoUrl': CompanyVideoUrl,
                            'currentposition': crrentpstion,
                            'condition': condition,
                            'boards': boards,
                            'jobopning': jobopning,
                            '_token': '{{csrf_token()}}',
                            'industry': industry,
                            'jobrole': Jobrole,
                            'FunctionRole': FunctionRole,
                            //'context': document.body,
                            obj
                        },
                        success: function (msg) {
                            //console.log(data); 
                            //alert("Im in success");
                            $("#myModal").hide();
                            $('#error').html('<div class="alert alert-success" id="myalertstatus" >You have Successfully Saved the Job.</div>');
                            window.location.hash = '#error';
                            $('#myalertstatus').fadeOut(10000);
                            /*$.toast({
                                heading: 'Success',
                                text: 'You have Successfully Finished the Job.',
                                icon: 'success',
                                position: 'top-right'
                            })*/
                            //$('#postmodelincreatejob').modal('show');
                        },
                        error: function (msg) {
                            //console.log(data);
                            $('#error').html('<div class="alert alert-danger" id="myalertstatus" >Data is Not Valid, Please Insert Valid Data.</div>');
                            window.location.hash = '#error';
                            $('#myalertstatus').fadeOut(10000);
                        }
                    });
                }
            }

            function isNumberKey(evt, id) {
                try {
                    var charCode = (evt.which) ? evt.which : event.keyCode;

                    if (charCode == 46) {
                        var txt = document.getElementById(id).value;
                        if (!(txt.indexOf(".") > -2)) {

                            return true;
                        }
                    }
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                        return false;

                    return true;
                } catch (w) {
                    alert(w);
                }
            }
        </script>

        <script>
            function removeerrorjobtitle() {
                document.getElementById('jobtitle-error').innerHTML = '';
            }
            function removeerroemaxexp() {
                document.getElementById('maxexp-error').innerHTML = '';
            }
            function removeerrorannualmaxpkg() {
                document.getElementById('annualmaxpkg-error').innerHTML = '';
            }
            function removeerrorCompanyVideoUrl() {
                document.getElementById('CompanyVideoUrl').innerHTML = '';
            }
            function removeerrorcurrentposition() {
                document.getElementById('currentposition-error').innerHTML = '';
            }
            function removeerroeindustry() {
                document.getElementById('industry-error').innerHTML = '';
            }
            function removeerroejobrole() {
                document.getElementById('jobrole-error').innerHTML = '';
            }
            function removeerroeUGStreams() {
                document.getElementById('UGStreams-error').innerHTML = '';
            }
            function removeerrorcity() {
                document.getElementById('city-error').innerHTML = '';
            }
            function removeerroerd() {
                document.getElementById('rd-error').innerHTML = '';
            }
        </script>
        
        
    </body>

</html>