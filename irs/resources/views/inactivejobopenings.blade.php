<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IRS | Active Job Openings
        </title>
        @include('layouts.css')
        <style type="text/css">
            label.error:not(.form-control) {
                color: #EB5E28;
                font-size: 0.8em;
            }
        </style>
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container"> 
                @include('layouts.employer_sidebar')
                @include('layouts.header')
                <div class="right_col" role="main" >
                    <div class="">
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>In-Active job Opening
                                    </h3>
                                </div>
                                <div class="title_right pull-right">
                                    <span class="input-group-btn">
                                        <?php if (count($Activejobsdata) > 0) { ?>
                                            <button class="btn btn-default pull-right" type="button"  data-toggle="modal" data-target=".bs-example-modal-Save-job" style="border-radius: 50px; background-color: #FFF; "><i class="fa fa-search" ></i> Search Jobs ! </button>
                                        <?php } ?>
                                    </span>
                                </div>
                            </div>
                            <div class="clearfix">
                            </div>


                            <div class="row">
                                <div class="x_panel">
                                    <div class="x_content">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="x_title">
                                                <h2>

                                                    <div class="col-md-10">
                                                        Active Jobs
                                                    </div>
                                                </h2>
                                                <div class="clearfix">
                                                </div>
                                            </div>

                                            <table  class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Job Title
                                                        </th>
                                                        <th>Company
                                                        </th>
                                                        <th>Recruiter
                                                        </th>
                                                        <th>Posted Date
                                                        </th>
                                                        <th>Expiry Date
                                                        </th>
                                                        <th>Salary
                                                        </th>
                                                        <th>Applicant Count
                                                        </th>
                                                        <th>Actions
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (count($Activejobsdata) > 0) { ?>
                                                        <?php
                                                        $counter = 0;
                                                        foreach ($Activejobsdata as $user7) {
                                                            ?>
                                                            <tr>
                                                                <?php
                                                                $ContactdetailArray = json_decode($user7->contact_details, true);
                                                                //{{ url('/employer/viewsavedjob/'.$user7->id.'') }}
                                                                ?>
                                                                <td>
                                                                    <a href="" style="color: #4285f4;" data-toggle="modal" data-target="#<?php echo "view_model_" . $user7->id; ?>">
                                                                        <b>
                                                                            <?php echo $user7->jobtitle ?>
                                                                        </b></a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $user7->company ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $ContactdetailArray['name'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $posted = explode(" ", $user7->postedts);
                                                                    echo $newDateFormat2 = date('d, F Y', strtotime(date($posted[0])));
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $posted = explode(" ", $user7->expiryts);
                                                                    echo $newDateFormat2 = date('d, F Y', strtotime(date($posted[0])));
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <i class="<?php
                                                                    if ($user7->currency_type == 'INR') {
                                                                        echo 'fa fa-inr';
                                                                    } else if ($user7->currency_type == 'EUR') {
                                                                        echo 'fa fa-eur';
                                                                    } else if ($user7->currency_type == 'USD') {
                                                                        echo 'fa fa-usd';
                                                                    } else {
                                                                        echo 'fa fa-jpy';
                                                                    }
                                                                    ?>">
                                                                           <?php
                                                                           if ($user7->min_salary == 786) {
                                                                               $annualminpkg = 'Less than 5000';
                                                                           } else if ($user7->min_salary == 10000000 && $user7->currency_type == 'INR') {
                                                                               $annualminpkg = '100,000 & above';
                                                                           } else if ($user7->min_salary == 12477) {
                                                                               $annualminpkg = 'Less than 50000';
                                                                           } else if ($user7->min_salary == 10000000 && $user7->currency_type == 'INR') {
                                                                               $annualminpkg = '100,00,000 & above';
                                                                           } else {
                                                                               $annualminpkg = $user7->min_salary;
                                                                           }
                                                                           echo $annualminpkg;
                                                                           ?></i>
                                                                </td>
                                                                <td>
                                                                    <a href="" style="color: #4285f4;" data-toggle="modal" data-target="#<?php echo "view_app_model_" . $user7->id; ?>">
                                                                        <b>
                                                                            <?php echo $Totalapplicantcount[$user7->id]; ?>
                                                                        </b>
                                                                    </a>
                                                                    <?php /* <a href="{{ url('/employer/viewsavedjob/'.$user7->id.'') }}" style="color: #4285f4;">
                                                                      <b>
                                                                      <?php echo $Totalapplicantcount[$user7->id]; ?>
                                                                      </b></a>
                                                                     * 
                                                                     */ ?>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ url('/employer/recreatejobsposting/'.$user7->id.'') }}"><button type="button" class="btn btn-primary"> <i class="fa fa-edit"></i></button></a>
                                                                    <?php /* <button type="button"  onClick="deactivate_jobs('<?php echo $user7->id ?>', '<?php echo $user7->jobtitle ?>')" class="btn btn-secondary" data-toggle="modal" data-target="#deactivate_model" ><i class="fa fa-eye-slash"></i></button> */ ?> 
                                                                    <button type="button"  onClick="delete_jobs('<?php echo $user7->id ?>', '<?php echo $user7->jobtitle ?>')" class="btn btn-danger" data-toggle="modal" data-target="#delete_model" ><i class="fa fa-trash-o"></i></button>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $counter++;
                                                        }
                                                    } else {
                                                        ?> 
                                                        <tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">No data available in table</td></tr>
                                                    <?php } ?> 
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php echo $Activejobsdata->links(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--                Display Job Content Models starts-->
                <?php if (count($Activejobsdata) > 0) { ?>
                    <?php
                    $counter = 0;
                    foreach ($Activejobsdata as $user7) {
                        //echo '<pre>';
                        $ContactdetailArray = json_decode($user7->contact_details, true);
                        ?>
                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" id="<?php echo "view_model_" . $user7->id; ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">Job Summary</h4>
                                    </div>

                                    <div class="modal-body">
                                        <!--  Content Starts-->
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="x_panel">
                                                    <div class="x_content">
                                                        <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <h4><strong>Company Name - </strong> <?php echo ucwords($user7->company) ?></h4>
                                                                    <h4><strong>Job Title - </strong> <?php echo ucwords($user7->jobtitle) ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="row">
                                                                <div class="col-md-6"> 
                                                                    <div class="panel-body">
                                                                        <table class="table table-striped">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">Min years of Exp.</th>
                                                                                    <td><?php echo $user7->min_years ?> Year/s</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Max. Years of Exp.</th>
                                                                                    <td><?php echo $user7->max_years ?> Year/s</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Employment Type</th>
                                                                                    <td><?php
                                                                                        if ($user7->type == 1)
                                                                                            echo "Contractual";
                                                                                        else
                                                                                            echo "Permanent"
                                                                                            ?> </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Currency</th>
                                                                                    <td><?php echo $user7->currency_type ?> </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Preferred Min. Age</th>
                                                                                    <td><?php echo $user7->pref_min_age ?> Year/s</td>
                                                                                </tr>

                                                                            <th scope="row">Functional Area</th>
                                                                            <td><?php
                                                                                foreach ($Jobs_seed_data_Functional_Area as $user8) {
                                                                                    if ($user8->id == $user7->functional_area)
                                                                                        echo $user8->value;
                                                                                }
                                                                                ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Job Role</th>
                                                                                <td><?php
                                                                                    foreach ($JobRolesShowing as $jobroles) {
                                                                                        if ($jobroles->id == $user7->role && $jobroles->parent_id == $user7->functional_area)
                                                                                            echo $jobroles->value;
                                                                                    }
                                                                                    ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Industry</th>
                                                                                <td><?php
                                                                                    foreach ($Jobs_seed_data_Industry as $JobsIndustry) {
                                                                                        if ($JobsIndustry->id == $user7->industry)
                                                                                            echo $JobsIndustry->value;
                                                                                    }
                                                                                    ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Name </th>
                                                                                <td><?php echo $ContactdetailArray['name'] ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Email</th>
                                                                                <td><?php echo $ContactdetailArray['emailid'] ?></td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6"> 
                                                                    <div class="panel-body">
                                                                        <table class="table table-striped">

                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">Annual Min Package</th>
                                                                                    <td><span id="pampspan" class="<?php
                                                                                        if ($user7->currency_type == 'INR') {
                                                                                            echo 'fa fa-inr';
                                                                                        } else if ($user7->currency_type == 'EUR') {
                                                                                            echo 'fa fa-eur';
                                                                                        } else if ($user7->currency_type == 'USD') {
                                                                                            echo 'fa fa-usd';
                                                                                        } else {
                                                                                            echo 'fa fa-jpy';
                                                                                        }
                                                                                        ?>"></span><?php
                                                                                              if ($user7->min_salary == 786) {
                                                                                                  $annualminpkg = 'Less than 5000';
                                                                                              } else if ($user7->min_salary == 10000000 && $user7->currency_type == 'USD') {
                                                                                                  $annualminpkg = '100,000 & above';
                                                                                              } else if ($user7->min_salary == 12477) {
                                                                                                  $annualminpkg = 'Less than 50000';
                                                                                              } else if ($user7->min_salary == 10000000 && $user7->currency_type == 'INR') {
                                                                                                  $annualminpkg = '100,00,000 & above';
                                                                                              } else {
                                                                                                  $annualminpkg = $user7->min_salary;
                                                                                              }
                                                                                              echo $annualminpkg;
                                                                                              ?> </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Annual Max Packagee</th>
                                                                                    <td><span id="pampspan" class="<?php
                                                                                        if ($user7->currency_type == 'INR') {
                                                                                            echo 'fa fa-inr';
                                                                                        } else if ($user7->currency_type == 'EUR') {
                                                                                            echo 'fa fa-eur';
                                                                                        } else if ($user7->currency_type == 'USD') {
                                                                                            echo 'fa fa-usd';
                                                                                        } else {
                                                                                            echo 'fa fa-jpy';
                                                                                        }
                                                                                        ?>"></span><?php
                                                                                              if ($user7->max_salary == 786) {
                                                                                                  $annualmaxpkg = 'Less than 5000';
                                                                                              } else if ($user7->max_salary == 10000000 && $user7->currency_type == 'INR') {
                                                                                                  $annualmaxpkg = '100,000 & above';
                                                                                              } else if ($user7->max_salary == 12477) {
                                                                                                  $annualmaxpkg = 'Less than 50000';
                                                                                              } else if ($user7->max_salary == 10000000 && $user7->currency_type == 'INR') {
                                                                                                  $annualmaxpkg = '100,00,000 & above';
                                                                                              } else {
                                                                                                  $annualmaxpkg = $user7->max_salary;
                                                                                              } echo $annualmaxpkg;
                                                                                              ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Current Position</th>
                                                                                    <td><?php echo $user7->positioncriteria; ?> </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Service Tenure in the Cur. Position</th>
                                                                                    <td><?php echo $user7->servicetenure ?> </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Company Url</th>
                                                                                    <td><?php echo $user7->videourl ?> </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Preferred. Max. Age</th>
                                                                                    <td><?php echo $user7->pref_max_age ?> Year/s</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Max Years of Rel. Exp.</th>
                                                                                    <td><?php echo $user7->rel_max_years ?> Year/s</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Min Years of Rel. Exp.</th>
                                                                                    <td><?php echo $user7->rel_min_years ?> Year/s</td>
                                                                                </tr>
                                                                                <tr>

                                                                                <tr>
                                                                                    <th scope="row">Phone </th>
                                                                                    <td><?php echo $ContactdetailArray['phonenumber'] ?> </td>
                                                                                </tr>

                                                                            </tbody>
                                                                        </table>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php //print_r($Jobs_seed_data_Role);?>
                                                            <div class="row">
                                                                <div class=" col-md-12">
                                                                    <div class="panel-body">
                                                                        <table class="table table-striped">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">Role Description</th>
                                                                                    <td> <?php echo $user7->description ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Role Requisites</th>
                                                                                    <td> <?php echo $user7->keyskills; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Company/ Project brief</th>
                                                                                    <td > <?php echo $user7->brief ?>

                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Comments (if any- optional)</th>
                                                                                    <td > <?php echo $user7->comments; ?> </td>
                                                                                </tr>      

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div> 
                                                            </div>

                                                            <h4><strong><i class="fa fa-book mr-1"></i> Educational Qualifications</strong></h4>
                                                            <div class="clearfix"></div>
                                                            <div class=" row">
                                                                <?php //print_r($user7); ?>
                                                                <div class="col-md-12"> 
                                                                    <div class="panel-body">
                                                                        <?php if (count($JobQualificationUG) > 0) { ?>
                                                                            <table class="table table-striped">

                                                                                <tbody>
                                                                                <label>UG Courses</label>
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        <?php
                                                                                        //echo '<pre>';
                                                                                        //print_r($JobQualificationUG);
                                                                                        $UGdatacounter = 0;
                                                                                        foreach ($JobQualificationUG as $fetchedfromDBUG) {
                                                                                            if ($fetchedfromDBUG->jobid == $user7->id && $fetchedfromDBUG->type == "Ug") {
                                                                                                ?>
                                                                                                <span id="UGSpan<?php echo $UGdatacounter ?>" >
                                                                                                    <input type ="button" data-toggle="tooltip" style="margin-left: 5px; margin-bottom: 5px; margin-top: 5px;" class="btn btn-success btn-xs" id="UG<?php echo $UGdatacounter ?>"  value="<?php echo $fetchedfromDBUG->qualification . ' - ' . $fetchedfromDBUG->specialization ?>">
                                                                                                </span>
                                                                                                <?php
                                                                                                $UGdatacounter++;
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </th>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        <?php } ?>
                                                                        <?php if (count($JobQualificationPG) > 0) { ?>

                                                                            <table class="table table-striped">

                                                                                <tbody>
                                                                                <label>PG Courses</label>
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        <?php
                                                                                        $PGdatacounter = 0;
                                                                                        foreach ($JobQualificationPG as $fetchedfromDBPG) {
                                                                                            if ($fetchedfromDBPG->jobid == $user7->id && $fetchedfromDBPG->type == "Pg") {
                                                                                                ?>

                                                                                                <span id="PGSpan<?php echo $PGdatacounter ?>" >

                                                                                                    <input type ="button" data-toggle="tooltip" style="margin-left: 5px; margin-bottom: 5px; margin-top: 5px;" class="btn btn-success btn-xs" id="PG<?php echo $PGdatacounter ?>"  value="<?php echo $fetchedfromDBPG->qualification . ' - ' . $fetchedfromDBPG->specialization ?>" >
                                                                                                </span>

                                                                                                <?php
                                                                                                $PGdatacounter++;
                                                                                            }
                                                                                        }
                                                                                        ?>

                                                                                    </th>

                                                                                </tr>

                                                                                </tbody>
                                                                            </table><?php } ?>
                                                                        <?php if (count($JobQualificationDOCTORATE) > 0) { ?>
                                                                            <table class="table table-striped">

                                                                                <tbody>
                                                                                <label>Doctorate Courses</label>
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        <?php
                                                                                        $Doctoratedatacounter = 0;
                                                                                        foreach ($JobQualificationDOCTORATE as $fetchedfromDBDOCTORATE) {
                                                                                            if ($fetchedfromDBDOCTORATE->jobid == $user7->id && $fetchedfromDBDOCTORATE->type == "Ppg") {
                                                                                                ?>

                                                                                                <span id="DoctorateSpan<?php echo $Doctoratedatacounter ?>">

                                                                                                    <input type ="button" data-toggle="tooltip"  style="margin-left: 5px; margin-bottom: 5px; margin-top: 5px;" class="btn btn-success btn-xs" id="Doctorate<?php echo $Doctoratedatacounter ?>"  value="<?php echo $fetchedfromDBDOCTORATE->qualification . ' - ' . $fetchedfromDBDOCTORATE->specialization ?>" >
                                                                                                </span>

                                                                                                <?php
                                                                                                $Doctoratedatacounter++;
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </th>
                                                                                </tr>

                                                                                </tbody>
                                                                            </table>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <h4><strong><i class="fa fa-map-marker mr-1"></i> Location</strong></h4>

                                                            <div class="clearfix"></div>

                                                            <div class="row">
                                                                <div class="col-md-12"> 
                                                                    <div class="panel-body">
                                                                        <?php if (count($JobLocation) > 0) { ?>
                                                                            <table class="table table-striped"> 
                                                                                <tbody>
                                                                                    <tr>

                                                                                        <th scope="row">
                                                                                            <?php
                                                                                            $Locationdatacounter = 0;
                                                                                            //echo '<pre>';
                                                                                            //print_r($JobCountries);
                                                                                            $countryName = "";
                                                                                            $stateName = "";
                                                                                            foreach ($JobLocation as $fetchedfromDBLocation) {
                                                                                                foreach ($JobCountries as $country) {
                                                                                                    if ($fetchedfromDBLocation->countryid == $country->location_id && $country->location_type == "0") {
                                                                                                        $countryName = $country->name;
                                                                                                    }
                                                                                                }
                                                                                                foreach ($JobStates as $states) {
                                                                                                    if ($fetchedfromDBLocation->regionid == $states->location_id && $states->location_type == "1") {
                                                                                                        $stateName = $states->name;
                                                                                                    }
                                                                                                }
                                                                                                if ($fetchedfromDBLocation->job_id == $user7->id) {
                                                                                                    ?>
                                                                                                    <span  id="LocationSpan<?php echo $Locationdatacounter ?>" >
                                                                                                        <input type ="button" data-toggle="tooltip" style="margin-left: 5px; margin-bottom: 5px; margin-top: 5px;" class="btn btn-success btn-xs" id="Location<?php echo $Locationdatacounter ?>"  value="<?php echo $countryName . " - " . $stateName . " - " . $fetchedfromDBLocation->city ?>">
                                                                                                    </span>

                                                                                                    <?php
                                                                                                    $Locationdatacounter++;
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                        </th>
                                                                                    </tr>                        
                                                                                </tbody>
                                                                            </table>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--   Content Ends-->

                                    </div>

                                    <div class="modal-footer">
                                        <a href="<?php echo url('employer/activejobopening') ?>"><button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times">Close</i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php
                    }
                }
                ?>

                <?php if (count($Activejobsdata) > 0) { ?>
                    <?php
                    $counter = 0;
                    foreach ($Activejobsdata as $user7) {
                        //echo '<pre>';
                        $ContactdetailArray = json_decode($user7->contact_details, true);
                        ?>
                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" id="<?php echo "view_app_model_" . $user7->id; ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">Candidate Applications</h4>
                                    </div>

                                    <div class="modal-body">
                                        <!--  Content Starts-->
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="x_panel">
                                                    <div class="x_content">
                                                        <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <h4><strong>Company Name - </strong> <?php echo ucwords($user7->company) ?></h4>
                                                                    <h4><strong>Job Title - </strong> <?php echo ucwords($user7->jobtitle) ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="row">

                                                                <table  class="table table-striped table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Candidate Name</th>
                                                                            <th>Job Opening</th>
                                                                            <th>Application Date</th>
                                                                            <th>Assessment Test</th>
                                                                            <th>One Way Video Interview</th>
                                                                            <th>One Way Video Interview Rating </th>
                                                                            <th>Status </th>
                                                                            <th>Overall Rating</th>
                                                                            <th><i class="fa fa-comment"></i></th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>


                                                                    <tbody><?php 
                                                                    //echo '<pre>';
                                                                    //print_r($JobApplications);
                                                                    if (count($JobApplications) > 0) { ?>
                                                                            <?php
                                                                            foreach ($JobApplications as $CandidateInfo) {
                                                                                if ($CandidateInfo->jobid == $user7->id) {
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td><a href="<?php echo url('/employer/job_seeker_profile_view/' . $CandidateInfo->id . '&&jp&&' . $CandidateInfo->jobid); ?>"><b><?php echo $CandidateInfo->name ?></b></a></td>
                                                                                        <td><?php echo $CandidateInfo->jobtitle ?></td>
                                                                                        <td><?php
                                                                                            $applicationdate = explode(" ", $CandidateInfo->created_at);
                                                                                            echo $newFormatapplicationdate = date('d, F Y', strtotime(date($applicationdate[0])));
                                                                                            ?></td>
                                                                                        <td>NA</td>
                                                                                        <td>NA</td>
                                                                                        <td>Not Rated
                                                                                        <!-- <span class="fa fa-star checked"></span>
                                                                                        <span class="fa fa-star checked"></span>
                                                                                        <span class="fa fa-star "></span>
                                                                                        <span class="fa fa-star"></span>
                                                                                        <span class="fa fa-star"></span> -->
                                                                                        </td>
                                                                                        <td>NA</td>
                                                                                        <td>  Not Rated
                                                                                        <!-- <span class="fa fa-star checked"></span>
                                                                                        <span class="fa fa-star checked"></span>
                                                                                        <span class="fa fa-star checked"></span>
                                                                                        <span class="fa fa-star checked"></span>
                                                                                        <span class="fa fa-star"></span> -->
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td> <div class="btn-group">
                                                                                                <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">Default <span class="caret"></span>
                                                                                                </button>
                                                                                                <ul role="menu" class="dropdown-menu">
                                                                                                    <li><a href="<?php echo url('/employer/job_seeker_profile_view/' . $CandidateInfo->id . '&&at&&' . $CandidateInfo->jobid); ?>">Assign Test</a>
                                                                                                    </li>
                                                                                                    <li><a href="#">Assign video Interview</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div></td>
                                                                                    </tr><?php
                                                                                }
                                                                            }
                                                                        } else {
                                                                            ?>
                                                                            <tr class="odd"><td valign="top" colspan="6" class="dataTables_empty">No data available in table</td></tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--   Content Ends-->

                                    </div>

                                    <div class="modal-footer">
                                        <a href="<?php echo url('employer/activejobopening') ?>"><button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times">Close</i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php
                    }
                }
                ?>
                <!--                Display Job Content Models ends-->

                <!-- Save Job modal -->

                <div class="modal fade bs-example-modal-Save-job">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title">Search</h4>
                            </div>
                            <div class="card wizard-card" data-color="orange" id="wizardProfile">
                                <form action="<?php echo url("/employer/searchactivejobopening"); ?>" method="post" id="mins" enctype="multipart/form-data" >
                                    <div class="modal-body">
                                        <!-- start form for validation -->
                                        <div class="row">
                                            <div class="col-md-4 form-group" >
                                                <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <label for="fullname">Keyword </label>
                                                <input type="text" id="fullname" class="form-control" name="keyword" >
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="Currency">Currency </label>
                                                <select id="Currency" name="Currency" class="form-control select2" onChange="ChangeCurrency();" style="width: 100%;">
                                                    <option value="">Select Currency Type</option>
                                                    <?php foreach ($Currency as $currency) { ?>
                                                        <option value="<?php echo $currency->ccode; ?>" ><?php echo $currency->ccode; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group"> 
                                                <label for="heard">Experience </label>
                                                <select name="exp" id="exp" class="form-control select2" style="width: 100%;">
                                                    <option value="">Select Min Exp
                                                    </option>
                                                    <option value="0">0</option>
                                                    <?php
                                                    for ($i = 1; $i <= 30; $i++) {
                                                        ?>
                                                        <option value="<?php echo $i ?>">
                                                            <?php echo $i ?>
                                                        </option>
                                                    <?php } ?>                                  
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="Country">Country </label>
                                                <select class="form-control select2" id="country" name="country" onChange="ShowState()" style="width: 100%;" > 
                                                    <option value="">Select Country</option>
                                                    <?php foreach ($Country as $user6) { ?>
                                                        <option value="<?php echo $user6->location_id ?>"><?php echo $user6->name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="State">State </label>
                                                <div id="NewState">
                                                    <select class="form-control select2" id="state" name="state" onChange="ShowCity()" style="width: 100%;" >
                                                    </select></div>

                                            </div>
                                            <div class="col-md-4 form-group"> 
                                                <label for="City">City </label>
                                                <div id="NewCity">
                                                    <select class="form-control select2" id="city" name="city"  style="width: 100%;" >
                                                    </select></div> 

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="email">Expected Pay Package </label>
                                                <select  name="Expectedpckg" class="form-control select2" id="Expectedpckg" style="width: 100%;">   
                                                    <option value="">Select Package</option>
                                                </select>
                                            </div>
                                            <div class="col-md-8 form-group">

                                                <label>Employment Type</label>
                                                <br/> 

                                                <input type="radio" class="flat" name="employementtype" id="employementtype" value="" checked="" > All
                                                <input type="radio" class="flat" name="employementtype" id="employementtype" value="1" /> Contract
                                                <input type="radio" class="flat" name="employementtype" id="employementtype" value="2" /> Permanent

                                            </div>
                                        </div>

                                        <!-- end form for validations -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="Search"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Save Job modal End-->


                <!--Campus-Recruitement modal -->

                <!-- Save Job modal End-->
                <?php /* if (count($savedjobsdata) > 0) { */ ?>

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" id="deactivate_model">
                    <div class="modal-dialog modal-sm">
                        <form action="<?php echo url('/employer/deactivatedsavedjobsposting') ?>" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel2">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <h4>Do You Want to Deactivate "<lable id="jobtitlefordelete"></lable>" Job ?</h4>
                                    <input type="hidden" name="jobid" value="" id="jobidindelete">
                                </div>
                                <div class="modal-footer">
                                    <a href="<?php echo url('employer/activejobopening') ?>"><button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"> No</i></button></a>
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"> Yes</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" id="delete_model">
                    <div class="modal-dialog modal-sm">
                        <form action="<?php echo url('/employer/deleteactivejobsposting') ?>" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel2">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <h4>Do You Want to Delete "<lable id="jobtitle_deactivate"></lable>" Job ?</h4>
                                    <input type="hidden" name="jobid" value="" id="jobid_deactivate">
                                </div>
                                <div class="modal-footer">
                                    <a href="<?php echo url('employer/activejobopening') ?>"><button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"> No</i></button></a>
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"> Yes</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 

                <!-- Campus-Recruitement modal End-->
                @include('layouts.footer')       
            </div></div>
        <!-- ./wrapper -->
    </body>
    @include('layouts.js')

    <!-- page script -->
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>
    <script>
        function  deactivate_jobs(jobidvalue, jobtitlevalue) {
            console.log(jobidvalue);
            document.getElementById("jobidindelete").value = jobidvalue;
            document.getElementById("jobtitlefordelete").innerHTML = jobtitlevalue;
        }
    </script>
    <script>
        function  delete_jobs(jobidvalue, jobtitlevalue) {
            console.log(jobidvalue);
            document.getElementById("jobid_deactivate").value = jobidvalue;
            document.getElementById("jobtitle_deactivate").innerHTML = jobtitlevalue;
        }
    </script>
    <script>
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
</html>
