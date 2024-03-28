<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        @include('halaxatheme.css')

    </head>

    <body>
        <!-- Main -->
        <div class="main">

            <div class="header mb-3">
                <nav class="navbar py-0 navbar-expand-lg navbar-dark bg-theme-gradient">
                    <div class="container">
                        <a href="#" class="no-decoration">
                            <img width="150" src="<?php echo url('assets/images/logo-white-2.png'); ?>" />
                        </a>
                    </div>
                </nav>
            </div>
            <?php 
            $Jobsdata = $Job[0];
            ?>
            <div class="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
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
                                        <a href="#">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
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
                        <div class="col-md-3">
                            <div class="theme-card p-3 job-description">
                                <p class="jobs-li-place text-justify weight-bold">
                                    <?php echo $Jobsdata->brief ?>
                                </p>
                                <hr class="hr-theme">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-theme-submit mt-3" data-toggle="modal" 
                                    data-target=".bs-apply-modal-sm" onClick="apply_jobs('<?php echo $Jobsdata->id ?>','<?php echo $Jobsdata->jobtitle ?>','<?php echo $Jobsdata->company ?>');">Join Now</button>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dialog -->
                
<div class="modal fade bs-apply-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-sm">
                      <form action="<?php echo url('job_seeker/applyjob') ?>" method="post">
                      <div class="modal-content">

                        <div class="modal-header">
                        
                          <h4 class="modal-title" id="myModalLabel2">Confirmation</h4>
                        </div>
                        <input type = "hidden" name="MODELNAME" value="Active">
                        <div class="modal-body">
                          <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
                          <h4>Do You Want to Apply for "<lable id="jobtitleforapply"></lable>" Posted by "<lable id="companynameforapply"></lable>". ?</h4>
                          <input type="hidden" name="jobid" value="" id="jobid">
                        </div>
                        <div class="modal-footer">
                        <a href="<?php echo url('job_seeker/apply_job') ?>"><button type="button" class="btn btn-default pull-left" ><i class="fa fa-times"> No</i></button></a>
                        
                         <button type="submit" class="btn btn-success"><i class="fa fa-check"> Yes</i></button>
                        </div>

                      </div>
                    </form>
                    </div>
          </div>


            <!-- no dialog -->
            
        </div>
        
        <!-- End Main -->

        @include('halaxatheme.js')
<script>
  $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Active',
      off: 'Deactive'
    }
                                    );
  }
   )
</script>
        <script>
  function  apply_jobs(jobidvalue,jobtitle,companyname){
    console.log(jobidvalue);
    document.getElementById("jobid").value = jobidvalue;
    document.getElementById("jobtitleforapply").innerHTML = jobtitle;
    document.getElementById("companynameforapply").innerHTML = companyname;
  }


</script>
    </body>

</html>