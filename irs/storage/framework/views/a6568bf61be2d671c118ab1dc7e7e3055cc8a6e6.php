<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <?php echo $__env->make('recruitertheme.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </head>

    <body>
        <!-- Main -->
        <div class="main">
            <div class="header">
                <?php echo $__env->make('recruitertheme.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <style>
                th {
                    padding: 3px;
                }
            </style>
            <div class="wrapper">
                <!-- Sidebar  -->
                <nav id="sidebar">
                    <?php echo $__env->make('recruitertheme.recruiter_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </nav>
                <?php 
            $Jobsdata = $Job[0];
            ?>
                <div id="content">
                    <div class="theme-card container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                            <div class="theme-card p-3 job-description">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img class="img-fluid img-thumbnail" src="<?php echo url('assets/images/user-icon.png'); ?>" />
                                    </div>
                                    <div class="col-md-9">
                                        <p class="jobs-li-company weight-bold"><?php echo ucwords($Jobsdata->company) ?></p>
                                        <p class="jobs-li-place"><i class="fa fa-map-marker mr-2"></i>Kuwait, Hawally</p>
                                    </div>
                                    <div class="col-md-2 text-right job-description-anchors">
                                        <a class="mr-3" href="#">
                                            <i class="fa fa-share-alt"></i>
                                        </a>
                                        <a href="#" class="table-dropdown" data-toggle="dropdown">
                                                                <img height="15" src="<?php echo url('assets/recruit/images/setting-icon.png'); ?>" />
                                                            </a>
                                                            <div class="dropdown-menu table-dropdown-menu pull-left">
                                                                <a class="dropdown-item" href="#">Generate embed Link</a>
                                                                <a class="dropdown-item" href="<?php echo e(url('/employer/clonesavedjobsposting/'.$Jobsdata->id.'')); ?>">Clone</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="#" onClick="deactivate_jobs('<?php echo $Jobsdata->id ?>', '<?php echo $Jobsdata->jobtitle ?>')">Deactivate</a>
                                                                <a class="dropdown-item" href="#" onClick="delete_jobs('<?php echo $Jobsdata->id ?>', '<?php echo $Jobsdata->jobtitle ?>')" >Delete</a>
                                                            </div>
                                    </div>
                                </div>
                                <hr class="hr-theme">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <p class="jobs-li-place">
                                            5th may 2020
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="jobs-li-company weight-bold"><?php echo ucwords($Jobsdata->jobtitle) ?></p>
                                        <p class="jobs-li-place">
                                            <?php echo ucwords($Jobsdata->company) ?>
                                        </p>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <p class="jobs-li-company weight-bold">Role Description</p>
                                        <p class="jobs-li-place text-justify">
                                            <?php  echo $Jobsdata->description ?> 
                                        </p>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <p class="jobs-li-company weight-bold">Role Requisites </p>
                                        <p class="jobs-li-place text-justify">
                                            <?php   echo $Jobsdata->keyskills; ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            Min years of Exp.
                                                        </p>
                                                    </th>
                                                    <td>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            <?php echo $Jobsdata->min_years ?> Year's
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            Max. Years of Exp 
                                                        </p>
                                                    </th>
                                                    <td>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            <?php echo $Jobsdata->max_years ?> Year's
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            Employment Type  			
                                                        </p>
                                                    </th>
                                                    <td>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            Permanent
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            Currency 		 			
                                                        </p>
                                                    </th>
                                                    <td>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            <?php echo $Jobsdata->currency_type ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            Pref. Min. Age				 		 			
                                                        </p>
                                                    </th>
                                                    <td>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            <?php echo $Jobsdata->pref_min_age ?> Year's 
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            Functional Area 			 				 		 			
                                                        </p>
                                                    </th>
                                                    <td>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            <?php foreach ($Jobs_seed_data_Functional_Area as $user8) { 
                                      if($user8->id==$Jobsdata->functional_area) echo $user8->value; } ?> 
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            Job Role		 						 				 		 			
                                                        </p>
                                                    </th>
                                                    <td>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            <?php foreach ($JobRolesShowing as $jobroles) { if($jobroles->id==$Jobsdata->role) echo $jobroles->value;  } ?> 
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            Industry 		 					 						 				 		 			
                                                        </p>
                                                    </th>
                                                    <td>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            <?php foreach ($JobRolesShowing as $jobroles) { if($jobroles->id==$Jobsdata->role) echo $jobroles->value;  } ?> 
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            Name		 			 		 					 						 				 		 			
                                                        </p>
                                                    </th>
                                                    <td>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            <?php echo $ContactdetailArray['name'] ?> 
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            Annual Min. Package			  
                                                        </p>
                                                    </th>
                                                    <td>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            <span id="pampspan" class="<?php if($Jobsdata->currency_type == 'INR'){ echo 'fa fa-inr'; }
                                                               else if($Jobsdata->currency_type == 'EUR'){ echo 'fa fa-eur'; } 
                                                               else if($Jobsdata->currency_type == 'USD'){ echo 'fa fa-usd'; }
                                                               else{  echo 'fa fa-jpy'; } ?>">
                                    </span> <?php if($Jobsdata->min_salary == 786){
                                                  $annualminpkg = 'Less than 5000';
                                                  }
                                                  else if($Jobsdata->min_salary == 10000000 && $Jobsdata->currency_type == 'USD'){
                                                  $annualminpkg = '100,000 & above';
                                                  }
                                                  else if($Jobsdata->min_salary == 12477){
                                                  $annualminpkg = 'Less than 50000';
                                                  }
                                                  else if($Jobsdata->min_salary == 10000000 && $Jobsdata->currency_type == 'INR'){
                                                  $annualminpkg = '100,00,000 & above';
                                                  }
                                                  else{
                                                  $annualminpkg = $Jobsdata->min_salary;
                                                  }
                                                  echo $annualminpkg; ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            Annual Max. Package			  
                                                        </p>
                                                    </th>
                                                    <td>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            <span id="pampspan" class="<?php if($Jobsdata->currency_type == 'INR'){ echo 'fa fa-inr'; }
                                                               else if($Jobsdata->currency_type == 'EUR'){ echo 'fa fa-eur'; } 
                                                               else if($Jobsdata->currency_type == 'USD'){ echo 'fa fa-usd'; }
                                                               else{  echo 'fa fa-jpy'; } ?>">
                                    </span> <?php if($Jobsdata->max_salary == 786){
                                        $annualmaxpkg = 'Less than 5000';
                                        }
                                        else if($Jobsdata->max_salary == 10000000 && $Jobsdata->currency_type == 'INR'){
                                        $annualmaxpkg = '100,000 & above';
                                        }
                                        else if($Jobsdata->max_salary == 12477){
                                        $annualmaxpkg = 'Less than 50000';
                                        }
                                        else if($Jobsdata->max_salary == 10000000 && $Jobsdata->currency_type == 'INR'){
                                        $annualmaxpkg = '100,00,000 & above';
                                        }
                                        else{
                                        $annualmaxpkg = $Jobsdata->max_salary;
                                        } echo $annualmaxpkg;  ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            Current Position				 			
                                                        </p>
                                                    </th>
                                                    <td>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            <?php echo $Jobsdata->positioncriteria;  ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            Service Tenure in the Cur. Position  		 			
                                                        </p>
                                                    </th>
                                                    <td>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            <?php echo $Jobsdata->servicetenure ?> 
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            Company Url 			 		 			
                                                        </p>
                                                    </th>
                                                    <td>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            <?php echo $Jobsdata->videourl ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            Pref. Max. Age 							 				 		 			
                                                        </p>
                                                    </th>
                                                    <td>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            <?php echo $Jobsdata->pref_max_age ?> Year/s 
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            Max Years of Rel. Exp 			  		 						 				 		 			
                                                        </p>
                                                    </th>
                                                    <td>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            <?php echo $Jobsdata->rel_max_years ?> Year/s
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            Min Years of Rel. Exp 			   		 					 						 				 		 			
                                                        </p>
                                                    </th>
                                                    <td>
                                                        <p class="jobs-li-place text-justify weight-bold">
                                                            <?php echo $Jobsdata->rel_min_years ?> Year/s
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <p class="jobs-li-company weight-bold">Educational Qualifications </p>
                                        <?php if(count($JobQualificationUG)>0){  ?>
                                            <p class="clearfix"></p>
                                            <p class="jobs-li-place text-justify">
                                                UG Courses
                                            </p>
                                            <p class="clearfix"></p>
                                            <p class="jobs-li-place text-justify">
                                                    <?php $UGdatacounter = 0; foreach ($JobQualificationUG as $fetchedfromDBUG) { ?>
                                                        <a href="#" class="badge-theme no-decoration">
                                                            <?php echo $fetchedfromDBUG->qualification.' - '.$fetchedfromDBUG->specialization ?> <i class="fa fa-times-circle-o"></i>
                                                        </a>
                                                        <?php $UGdatacounter++; } ?>
                                            </p>
                                        <?php } ?>
                                        <?php if(count($JobQualificationPG)>0){  ?>
                                            <p class="clearfix"></p>
                                            <p class="jobs-li-place text-justify"> 
                                                PG Courses
                                            </p>
                                            <p class="clearfix"></p>
                                            <p class="jobs-li-place text-justify">
                                                    <?php $PGdatacounter = 0; foreach ($JobQualificationPG as $fetchedfromDBPG) { ?>
                                                        <a href="#" class="badge-theme no-decoration">
                                                            <?php echo $fetchedfromDBPG->qualification.' - '.$fetchedfromDBPG->specialization ?> <i class="fa fa-times-circle-o"></i>
                                                        </a>
                                                        <?php $PGdatacounter++; } ?>
                                            </p>
                                        <?php } ?>
                                        <?php if(count($JobQualificationDOCTORATE)>0){  ?>
                                            <p class="clearfix"></p>
                                            <p class="jobs-li-place text-justify">
                                                Doctorate Courses
                                            </p>
                                            <p class="clearfix"></p>
                                            <p class="jobs-li-place text-justify">
                                                
                                                    <?php $Doctoratedatacounter = 0; foreach ($JobQualificationDOCTORATE as $fetchedfromDBDOCTORATE) { ?>
                                                        <a href="#" class="badge-theme no-decoration">
                                                            <?php echo $fetchedfromDBDOCTORATE->qualification.' - '.$fetchedfromDBDOCTORATE->specialization ?> <i class="fa fa-times-circle-o"></i>
                                                        </a>
                                                        <?php $Doctoratedatacounter++; } ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <p class="jobs-li-company weight-bold">Company/ Project brief  </p>
                                        <p class="jobs-li-place text-justify">
                                            <?php echo $Jobsdata->brief ?>                                               
                                        </p>
                                    </div>
                                    <div class="col-md-12 mt-3 mb-3">
                                        <p class="jobs-li-company weight-bold">Comments (if a, optional)  </p>
                                        <p class="jobs-li-place text-justify">
                                            <?php echo $Jobsdata->comments; ?>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Model Dialogs starts -->

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
                                <h4>Do You Want to Delete "<lable id="jobtitlefordelete"></lable>" Job ?</h4>
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
                                <h4>Do You Want to Deactivate "<lable id="jobtitle_deactivate"></lable>" Job ?</h4>
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
            <!-- Model Dialogs ends -->

        </div>
        <!-- End Main -->

        <?php echo $__env->make('recruitertheme.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <script>
            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()
            })
        </script>
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

    </body>

</html>