<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title><?php  foreach ($Job as $Jobsdata) { ?>
              <?php echo ucwords($Jobsdata->jobtitle) ?> | <?php echo ucwords($Jobsdata->company) ?> 
              
              <?php  } ?>
    </title>
    <link rel="stylesheet" href="<?php echo url('/'); ?>/public/External/css/style.css">
    <?php echo $__env->make('layouts.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container"> 
        <?php echo $__env->make('layouts.jobseeker_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="right_col" role="main" >
          <div class="page-title">
            <div class="title_left">
              <h3> Job Summary
              </h3>
            </div>
            <div class="title_right">
              <div class="form-group pull-right top_search">
                <div class="input-group">
                  <ol class="breadcrumb">
                    <li>
                      <a href="#">
                        <i class="fa fa-dashboard">
                        </i> Home
                      </a>
                    </li>
                    <li class="active"> Job Summary
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          
          <div class="clearfix">
          </div>
          <?php  foreach ($Job as $Jobsdata) { ?>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">
                  <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="col-md-12"> 
                      <h4>
                        <strong>
                          <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                        <?php  foreach ($Job as $Jobsdata) { ?>
              <h4><strong>Company Name - </strong> <?php echo ucwords($Jobsdata->company) ?></h4>
              <h4><strong>Job Title - </strong> <?php echo ucwords($Jobsdata->jobtitle) ?></h4>
              <?php  } ?>
                                        </div>
                                        </div>
                        </strong><?php if(in_array($Jobsdata->id, $appliedjoblist, TRUE)){}else{ ?>
                            <button class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target=".bs-apply-modal-sm" onClick="apply_jobs('<?php echo $Jobsdata->id ?>','<?php echo $Jobsdata->jobtitle ?>','<?php echo $Jobsdata->company ?>');" style="margin-right:15px;"> Apply for Job</button><?php } ?>
                      </h4>
                      <div class="clearfix">
                      </div>
                      <div class="row">
                        
                        <div class="col-md-6"> 
                          <div class="panel-body">
                            <table class="table table-striped">
                              <tbody>
                                
                                <tr>
                                  <th class="col-md-4">Min years of Exp.
                                  </th>
                                  <td class="col-md-8">
                                    <?php echo $Jobsdata->min_years ?> Year/s
                                  </td>
                                </tr>
                                <tr>
                                  <th class="col-md-4">Max. Years of Exp
                                  </th>
                                  <td class="col-md-8">
                                    <?php echo $Jobsdata->max_years ?> Year/s
                                  </td>
                                </tr>
                                <tr>
                                  <th class="col-md-4">Employment Type
                                  </th>
                                  <td class="col-md-8">
                                    <?php if($Jobsdata->type==1) echo "Contractual"; else echo "Permanent" ?> 
                                  </td>
                                </tr>
                                <tr>
                                  <th class="col-md-4">Currency
                                  </th>
                                  <td class="col-md-8">
                                    <?php echo $Jobsdata->currency_type ?> 
                                  </td>
                                </tr>
                                <tr >
                                  <th class="col-md-4">Pref. Min. Age
                                  </th>
                                  <td class="col-md-8">
                                    <?php echo $Jobsdata->pref_min_age ?> Year/s
                                  </td>
                                </tr>
                                <tr>
                                  <th class="col-md-4">Functional Area
                                  </th>
                                  <td class="col-md-8">
                                    <?php foreach ($Jobs_seed_data_Functional_Area as $user8) { 
                                      if($user8->id==$Jobsdata->functional_area) echo $user8->value; } ?> 
                                  </td>
                                </tr>
                                <tr>
                                  <th class="col-md-4">Job Role
                                  </th>
                                  <td class="col-md-8">
                                    <?php foreach ($JobRolesShowing as $jobroles) { if($jobroles->id==$Jobsdata->role) echo $jobroles->value;  } ?> 
                                  </td>
                                </tr>
                                <tr>
                                  <th class="col-md-6">Industry
                                  </th>
                                  <td class="col-md-6">
                                    <?php foreach ($JobRolesShowing as $jobroles) { if($jobroles->id==$Jobsdata->role) echo $jobroles->value;  } ?> 
                                  </td>
                                </tr>
                                <tr>
                                  <th class="col-md-6">Name 
                                  </th>
                                  <td class="col-md-6">
                                    <?php echo $ContactdetailArray['name'] ?> 
                                  </td>
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
                                  <th class="col-md-4">Annual Min. Package
                                  </th>
                                  <td class="col-md-8">
                                    <span id="pampspan" class="<?php if($Jobsdata->currency_type == 'INR'){ echo 'fa fa-inr'; }
                                                               else if($Jobsdata->currency_type == 'EUR'){ echo 'fa fa-eur'; } 
                                                               else if($Jobsdata->currency_type == 'USD'){ echo 'fa fa-usd'; }
                                                               else{  echo 'fa fa-jpy'; } ?>">
                                    </span>
                                                                                      <?php if($Jobsdata->min_salary == 786){
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
                                  </td>
                                </tr>
                                <tr>
                                  <th class="col-md-4">Annual Max. Packagee
                                  </th>
                                  <td class="col-md-8">
                                    <span id="pamapspan" class="<?php if($Jobsdata->currency_type == 'INR'){ echo 'fa fa-inr'; }
                                                                else if($Jobsdata->currency_type == 'EUR'){ echo 'fa fa-eur'; } 
                                                                else if($Jobsdata->currency_type == 'USD'){ echo 'fa fa-usd'; }
                                                                else{  echo 'fa fa-jpy'; } ?>">
                                    </span>
                                                                            <?php if($Jobsdata->max_salary == 786){
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
                                  </td>
                                </tr>
                                <tr>
                                  <th class="col-md-4">Current Position
                                  </th>
                                  <td class="col-md-8">
                                    <?php echo $Jobsdata->positioncriteria;  ?> 
                                  </td>
                                </tr>
                                <tr>
                                  <th class="col-md-4">Service Tenure in the Cur. Position
                                  </th>
                                  <td class="col-md-8">
                                    <?php echo $Jobsdata->servicetenure ?> 
                                  </td>
                                </tr>
                                <tr>
                                  <th class="col-md-4">Company Url
                                  </th>
                                  <td class="col-md-8">
                                    <?php echo $Jobsdata->videourl ?> 
                                  </td>
                                </tr>
                                <tr>
                                  <th class="col-md-4">Pref. Max. Age
                                  </th>
                                  <td class="col-md-8">
                                    <?php echo $Jobsdata->pref_max_age ?> Year/s
                                  </td>
                                </tr>
                                <tr>
                                  <th class="col-md-4">Max. Years of Rel. Exp.
                                  </th>
                                  <td class="col-md-8">
                                    <?php echo $Jobsdata->rel_max_years ?> Year/s
                                  </td>
                                </tr>
                                <tr>
                                  <th class="col-md-4">Min Years of Rel. Exp.
                                  </th>
                                  <td class="col-md-8">
                                    <?php echo $Jobsdata->rel_min_years ?> Year/s
                                  </td>
                                </tr>
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                      <div class="col-md-12">
                          <table class="table table-striped">
                            <tbody>
                              <tr>
                                <th class="col-md-3">Role Description
                                </th>
                                <td class="col-md-9">
                                  <?php  echo $Jobsdata->description ?> 
                                </td>
                              </tr>
                              <tr>
                                <th class="">Role Requisites
                                </th>
                                <td class="">
                                  <?php   echo $Jobsdata->keyskills; ?> 
                                </td>
                              </tr>
                              <tr>
                                <th class="">Company/ Project brief
                                </th>
                                <td class="">
                                  <?php echo $Jobsdata->brief ?>
                                </td>
                              </tr>
                              <tr>
                                <th class="">Comments (if any- optional)
                                </th>
                                <td class="">
                                  <?php echo $Jobsdata->comments; ?> 
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div> 
                      </div>
                    </div>
                    <?php  } ?>
                    <div class="clearfix">
                    </div>
                    <div class="col-md-12"> 
                      <h4>
                        <strong>
                          <i class="fa fa-book mr-1">
                          </i> &nbsp; Educational Qualifications
                        </strong>
                      </h4>
                      <div class="panel-body">
                        <?php if(count($JobQualificationUG)>0){  ?>
                        <table class="table table-striped">
                          <tbody>
                            <label>UG Courses
                            </label>
                            <tr>
                              <th scope="row">
                                <?php $UGdatacounter = 0; foreach ($JobQualificationUG as $fetchedfromDBUG) { ?>
                                <span id="UGSpan<?php echo $UGdatacounter ?>" >
                                  <input type ="button" data-toggle="tooltip" style="margin-left: 5px; margin-bottom: 5px; margin-top: 5px;" class="btn btn-success btn-xs" id="UG<?php echo $UGdatacounter ?>"  value="<?php echo $fetchedfromDBUG->qualification.' - '.$fetchedfromDBUG->specialization ?>">
                                </span>
                                <?php $UGdatacounter++; } ?>
                              </th>
                            </tr>
                          </tbody>
                        </table>
                        <?php } ?>
                        <?php if(count($JobQualificationPG)>0){  ?>
                        <table class="table table-striped">
                          <tbody>
                            <label>PG Courses
                            </label>
                            <tr>
                              <th scope="row">
                                <?php $PGdatacounter = 0; foreach ($JobQualificationPG as $fetchedfromDBPG) { ?>
                                <span id="PGSpan<?php echo $PGdatacounter ?>" >
                                  <input type ="button" data-toggle="tooltip" style="margin-left: 5px; margin-bottom: 5px; margin-top: 5px;" class="btn btn-success btn-xs" id="PG<?php echo $PGdatacounter ?>"  value="<?php echo $fetchedfromDBPG->qualification.' - '.$fetchedfromDBPG->specialization ?>" >
                                </span>
                                <?php $PGdatacounter++; } ?>
                              </th>
                            </tr>
                          </tbody>
                        </table>
                        <?php } ?>
                        <?php if(count($JobQualificationDOCTORATE)>0){  ?>
                        <table class="table table-striped">
                          <tbody>
                            <label>Doctorate Courses
                            </label>
                            <tr>
                              <th scope="row">
                                <?php $Doctoratedatacounter = 0; foreach ($JobQualificationDOCTORATE as $fetchedfromDBDOCTORATE) { ?>
                                <span id="DoctorateSpan<?php echo $Doctoratedatacounter ?>">
                                  <input type ="button" data-toggle="tooltip" style="margin-left: 5px; margin-bottom: 5px; margin-top: 5px;" class="btn btn-success btn-xs" id="Doctorate<?php echo $Doctoratedatacounter ?>"  value="<?php echo $fetchedfromDBDOCTORATE->qualification.' - '.$fetchedfromDBDOCTORATE->specialization ?>" >
                                </span>
                                <?php $Doctoratedatacounter++; } ?>
                              </th>
                            </tr>
                          </tbody>
                        </table>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix">
                  </div>
                  <div class="col-md-12"> 
                    <h4>
                      <strong>
                        <i class="fa fa-map-marker mr-1">
                        </i>&nbsp; Location
                      </strong>
                    </h4>
                    <div class="panel-body">
                      <?php if(count($JobLocation)>0){  ?>
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <th scope="row">
                              <?php $Locationdatacounter = 0; foreach ($JobLocation as $fetchedfromDBLocation) { ?>
                              <span  id="LocationSpan<?php echo $Locationdatacounter ?>" >
                                <input type ="button" data-toggle="tooltip" style="margin-left: 5px; margin-bottom: 5px; margin-top: 5px;" class="btn btn-success btn-xs" id="Location<?php echo $Locationdatacounter ?>"  value="<?php echo $countryname[$Locationdatacounter][0]['name'].' - '.$statenames[$Locationdatacounter][0]['name'].' - '.$fetchedfromDBLocation->city ?>">
                              </span>
                              <?php $Locationdatacounter++;  } ?>
                            </th>
                          </tr>                        
                        </tbody>
                      </table>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><?php } ?>
        </div>
      </div>
    </div>
    </div>  


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



  <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- ./wrapper -->
  </body>
<?php echo $__env->make('layouts.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</html>
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