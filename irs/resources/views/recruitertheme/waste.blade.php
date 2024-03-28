<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IRS | Job History</title>
        @include('layouts.css')
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container"> 
                @include('layouts.jobseeker_sidebar')
                @include('layouts.header')
                <div class="right_col" role="main" >
                    <div class="">
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>Job History</h3>
                                </div>

                                <div class="title_right pull-right">
                                    <span class="input-group-btn">
                                        <?php if (count($Applied_job_response) > 0) { ?>
                                            <button class="btn btn-default pull-right" type="button"  data-toggle="modal" data-target=".bs-example-modal-Job-History" style="border-radius: 50px; background-color: #FFF; "><i class="fa fa-search" ></i> Search Jobs ! </button>
                                        <?php } ?>
                                    </span>
                                </div>
                            </div>
                            <div class="clearfix"></div>


                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>

                                                <div class="col-md-10">
                                                    Apply Job History
                                                </div>
                                            </h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">

                                            <table  class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Job Title</th>
                                                        <th>Company Name</th>
                                                        <th>Recruiter Name</th>
                                                        <th>Apply Date</th>
                                                        <th>Posted Date</th>
                                                        <th>Salary</th>
                                                        <th>Assessment Test Status</th>
                                                        <th>Video Interview Status</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <?php if (count($Applied_job_response) > 0) { ?>
                                                        <?php foreach ($Applied_job_response as $appliedjobs) { ?>
                                                            <tr>
                                                                <?php /* <?php echo url('job_seeker/viewappliedjobdetails/' . $appliedjobs->id . '') ?> */ ?>

                                                                <td><a href="" style="color: #4285f4;" data-toggle="modal" data-target="#<?php echo "view_model_" . $appliedjobs->id; ?>"><b><?php echo $appliedjobs->jobtitle ?></b></a></td>
                                                                <td><?php echo ucwords($appliedjobs->company) ?></td>
                                                                <td><?php
                                                                    $ContactdetailArray = json_decode($appliedjobs->contact_details, true);
                                                                    echo ucwords($ContactdetailArray['name'])
                                                                    ?></td>
                                                                <td><?php
                                                                    $applicationdate = explode(" ", $appliedjobs->application_created_date);
                                                                    echo $newformatedapplicationdate = date('d, F Y', strtotime(date($applicationdate[0])));
                                                                    ?></td>
                                                                <td><?php
                                                                    $posted = explode(" ", $appliedjobs->postedts);
                                                                    echo $newDateFormat2 = date('d, F Y', strtotime(date($posted[0])));
                                                                    ?></td>
                                                                <td><i class="<?php
                                                                    if ($appliedjobs->currency_type == 'INR') {
                                                                        echo 'fa fa-inr';
                                                                    } else if ($appliedjobs->currency_type == 'EUR') {
                                                                        echo 'fa fa-eur';
                                                                    } else if ($appliedjobs->currency_type == 'USD') {
                                                                        echo 'fa fa-usd';
                                                                    } else {
                                                                        echo 'fa fa-jpy';
                                                                    }
                                                                    ?>"><?php
                                                                           if ($appliedjobs->max_salary == 786) {
                                                                               $annualmaxpkg = 'Less than 5000';
                                                                           } else if ($appliedjobs->max_salary == 10000000 && $appliedjobs->currency_type == 'INR') {
                                                                               $annualmaxpkg = '100,000 & above';
                                                                           } else if ($appliedjobs->max_salary == 12477) {
                                                                               $annualmaxpkg = 'Less than 50000';
                                                                           } else if ($appliedjobs->max_salary == 10000000 && $appliedjobs->currency_type == 'INR') {
                                                                               $annualmaxpkg = '100,00,000 & above';
                                                                           } else {
                                                                               $annualmaxpkg = $appliedjobs->max_salary;
                                                                           }
                                                                           echo $annualmaxpkg;
                                                                           ?></i></td>
                                                                <td>NA</td>
                                                                <td>NA</td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr class="odd"><td valign="top" colspan="6" class="dataTables_empty">No data available in table</td></tr>
                                                    <?php } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><?php echo $Applied_job_response->links(); ?>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Job History modal -->

                <div class="modal fade bs-example-modal-Job-History" >
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title">Search</h4>
                            </div>
                            <div class="card wizard-card" data-color="orange" id="wizardProfile">
                                <form action="<?php echo url("/job_seeker/searchjobhistory"); ?>" method="post" id="mins" enctype="multipart/form-data" >
                                    <div class="modal-body">
                                        <!-- start form for validation -->
                                        <div class="row">
                                            <div class="col-md-4 form-group" >
                                                <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <label for="fullname">Keyword </label>
                                                <input type="text" id="keyword" class="form-control" name="keyword" >
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
                                                    <?php for ($i = 1; $i <= 30; $i++) { ?>
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
                                                        <option value= "">Select Country First.</option>
                                                    </select></div>

                                            </div>
                                            <div class="col-md-4 form-group"> 
                                                <label for="City">City </label>
                                                <div id="NewCity">
                                                    <select class="form-control select2" id="city" name="city"  style="width: 100%;" >
                                                        <option value= "">Select State First.</option>
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
                <!-- Job History modal End-->

                <!-- History modal Strts-->
                <?php if (count($Applied_job_response) > 0) { ?>
                    <?php foreach ($Applied_job_response as $appliedjobs) { ?>
                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" id="<?php echo "view_model_" . $appliedjobs->id; ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">Job Details</h4>
                                    </div>

                                    <div class="modal-body">
                                        <!--  Content Starts-->
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="x_panel">
                                                    <div class="x_content">
                                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                                <li role="presentation" class="active"><a href="#<?php echo $appliedjobs->id;?>_tab_content1" id="<?php echo $appliedjobs->id;?>_home-tab" role="tab" data-toggle="tab" aria-expanded="true">Job Summary</a>
                                                                </li>
                                                                <li role="presentation" class=""><a href="#<?php echo $appliedjobs->id;?>_tab_content2" role="tab" id="<?php echo $appliedjobs->id;?>_profile-tab" data-toggle="tab" aria-expanded="false">Assigned Test</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div id="myTabContent" class="tab-content">
                                                            <div role="tabpanel" class="tab-pane fade active in" id="<?php echo $appliedjobs->id;?>_tab_content1" aria-labelledby="<?php echo $appliedjobs->id;?>_home-tab">
                                                                <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <h4><strong>Company Name - </strong> <?php echo ucwords($appliedjobs->company) ?></h4>
                                                                            <h4><strong>Job Title - </strong> <?php echo ucwords($appliedjobs->jobtitle) ?></h4>
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
                                                                                            <td><?php echo $appliedjobs->min_years ?> Year/s</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">Max. Years of Exp.</th>
                                                                                            <td><?php echo $appliedjobs->max_years ?> Year/s</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">Employment Type</th>
                                                                                            <td><?php
                                                                                                if ($appliedjobs->type == 1)
                                                                                                    echo "Contractual";
                                                                                                else
                                                                                                    echo "Permanent"
                                                                                                    ?> </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">Currency</th>
                                                                                            <td><?php echo $appliedjobs->currency_type ?> </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">Preferred Min. Age</th>
                                                                                            <td><?php echo $appliedjobs->pref_min_age ?> Year/s</td>
                                                                                        </tr>

                                                                                    <th scope="row">Functional Area</th>
                                                                                    <td><?php
                                                                                        foreach ($Jobs_seed_data_Functional_Area as $user8) {
                                                                                            if ($user8->id == $appliedjobs->functional_area)
                                                                                                echo $user8->value;
                                                                                        }
                                                                                        ?> </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Job Role</th>
                                                                                        <td><?php
                                                                                            foreach ($JobRolesShowing as $jobroles) {
                                                                                                if ($jobroles->id == $appliedjobs->role && $jobroles->parent_id == $appliedjobs->functional_area)
                                                                                                    echo $jobroles->value;
                                                                                            }
                                                                                            ?> </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Industry</th>
                                                                                        <td><?php
                                                                                            foreach ($Jobs_seed_data_Industry as $JobsIndustry) {
                                                                                                if ($JobsIndustry->id == $appliedjobs->industry)
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
                                                                                                if ($appliedjobs->currency_type == 'INR') {
                                                                                                    echo 'fa fa-inr';
                                                                                                } else if ($appliedjobs->currency_type == 'EUR') {
                                                                                                    echo 'fa fa-eur';
                                                                                                } else if ($appliedjobs->currency_type == 'USD') {
                                                                                                    echo 'fa fa-usd';
                                                                                                } else {
                                                                                                    echo 'fa fa-jpy';
                                                                                                }
                                                                                                ?>"></span><?php
                                                                                                      if ($appliedjobs->min_salary == 786) {
                                                                                                          $annualminpkg = 'Less than 5000';
                                                                                                      } else if ($appliedjobs->min_salary == 10000000 && $appliedjobs->currency_type == 'USD') {
                                                                                                          $annualminpkg = '100,000 & above';
                                                                                                      } else if ($appliedjobs->min_salary == 12477) {
                                                                                                          $annualminpkg = 'Less than 50000';
                                                                                                      } else if ($appliedjobs->min_salary == 10000000 && $appliedjobs->currency_type == 'INR') {
                                                                                                          $annualminpkg = '100,00,000 & above';
                                                                                                      } else {
                                                                                                          $annualminpkg = $appliedjobs->min_salary;
                                                                                                      }
                                                                                                      echo $annualminpkg;
                                                                                                      ?> </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">Annual Max Packagee</th>
                                                                                            <td><span id="pampspan" class="<?php
                                                                                                if ($appliedjobs->currency_type == 'INR') {
                                                                                                    echo 'fa fa-inr';
                                                                                                } else if ($appliedjobs->currency_type == 'EUR') {
                                                                                                    echo 'fa fa-eur';
                                                                                                } else if ($appliedjobs->currency_type == 'USD') {
                                                                                                    echo 'fa fa-usd';
                                                                                                } else {
                                                                                                    echo 'fa fa-jpy';
                                                                                                }
                                                                                                ?>"></span><?php
                                                                                                      if ($appliedjobs->max_salary == 786) {
                                                                                                          $annualmaxpkg = 'Less than 5000';
                                                                                                      } else if ($appliedjobs->max_salary == 10000000 && $appliedjobs->currency_type == 'INR') {
                                                                                                          $annualmaxpkg = '100,000 & above';
                                                                                                      } else if ($appliedjobs->max_salary == 12477) {
                                                                                                          $annualmaxpkg = 'Less than 50000';
                                                                                                      } else if ($appliedjobs->max_salary == 10000000 && $appliedjobs->currency_type == 'INR') {
                                                                                                          $annualmaxpkg = '100,00,000 & above';
                                                                                                      } else {
                                                                                                          $annualmaxpkg = $appliedjobs->max_salary;
                                                                                                      } echo $annualmaxpkg;
                                                                                                      ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">Current Position</th>
                                                                                            <td><?php echo $appliedjobs->positioncriteria; ?> </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">Service Tenure in the Cur. Position</th>
                                                                                            <td><?php echo $appliedjobs->servicetenure ?> </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">Company Url</th>
                                                                                            <td><?php echo $appliedjobs->videourl ?> </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">Preferred. Max. Age</th>
                                                                                            <td><?php echo $appliedjobs->pref_max_age ?> Year/s</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">Max Years of Rel. Exp.</th>
                                                                                            <td><?php echo $appliedjobs->rel_max_years ?> Year/s</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">Min Years of Rel. Exp.</th>
                                                                                            <td><?php echo $appliedjobs->rel_min_years ?> Year/s</td>
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
                                                                </div>                                                                
                                                            </div>

                                                            <div role="tabpanel" class="tab-pane fade" id="<?php echo $appliedjobs->id;?>_tab_content2" aria-labelledby="<?php echo $appliedjobs->id;?>_profile-tab">
                                                                <table  class="table table-striped table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>S No.
                                                                            </th>
                                                                            <th>Test Category
                                                                            </th>
                                                                            <th>Test Name
                                                                            </th>
                                                                            <th>Test Details
                                                                            </th>
                                                                            <th>Duration
                                                                            </th>
                                                                            <th>Status
                                                                            </th>
                                                                            <th>Result
                                                                            </th>
                                                                            <th>Score
                                                                            </th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                        <?php
                                                                        //echo '<pre>';
                                                                        //print_r($jsAssignedTest);
                                                                        if (count($jsAssignedTest) > 0) {
                                                                            $loopvarcount = 1;
                                                                            foreach ($jsAssignedTest as $jsassignedtests) {
                                                                                if ($appliedjobs->id == $jsassignedtests->jobid) {
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td>Test <?php echo $loopvarcount; ?></td>
                                                                                        <td><?php echo $jsassignedtests->category; ?>
                                                                                        </td>
                                                                                        <td><?php echo $jsassignedtests->test_name; ?>
                                                                                        </td>
                                                                                        <td><?php echo $jsassignedtests->coverage; ?>
                                                                                        </td>
                                                                                        </div>
                                                                                        <td><?php echo $jsassignedtests->days; ?>
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td>
                                                                                            <?php if ($jsassignedtests->expiryts >= date("Y-m-d")) { ?>
                                                                                                <input type="button" class="btn btn-success btn-xs pull-right myBtn"  href="#a1" onclick="starttestnow('<?php echo $jsassignedtests->TestAssignmentid; ?>', '<?php echo $jsassignedtests->TestId; ?>');" style="margin-right:15px;" name="startnow" value="start now" />
                                                                                                <?php
                                                                                            } else {
                                                                                                echo 'expired';
                                                                                            }
                                                                                            ?></td>
                                                                                    </tr>
                                                                                    <?php
                                                                                    $loopvarcount++;
                                                                                }
                                                                            }
                                                                        } else {
                                                                            ?>
                                                                            <tr class="odd"><td valign="top" colspan="6" class="dataTables_empty">No Test is Assigned For This Job.</td></tr>
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
                                        <a href="<?php echo url('job_seeker/job_history') ?>"><button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times">Close</i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php
                    }
                }
                ?>                                   
                <!-- History modal Ends-->
                @include('layouts.footer')       
            </div>
            <!-- ./wrapper -->
    </body>
    @include('layouts.js')

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
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>
</html>

