<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IRS | Apply for Jobs</title>
  <link rel="stylesheet" href="<?php echo url('/'); ?>/public/External/css/style.css">
     <?php echo $__env->make('layouts.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<style>
  .icon-wornings{
    font-size: 90px;
  }
</style>
<body class="nav-md">
    <div class="container body">
    <div class="main_container"> 

  <?php echo $__env->make('layouts.jobseeker_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="right_col" role="main" >
          <div class="page-title">
            <div class="title_left">
              <h3>Apply for Jobs </h3>
            </div>
            <div class="title_right pull-right">
<span class="input-group-btn">
                   <?php  if (count($jobs_info) > 0) { ?>
                     <button class="btn btn-default pull-right" type="button"  data-toggle="modal" data-target=".bs-example-modal-apply-job" style="border-radius: 50px; background-color: #FFF; "><i class="fa fa-search" ></i> Search Jobs ! </button>
                     <?php } ?>
                   </span>
            </div>
          </div>
          <div class="clearfix"></div>
          
          <div class="row">
          <?php  if (count($jobs_info) > 0) { ?>
          <?php $counter_jobs = 0; foreach ($jobs_info as $jobs) { ?>
                <!-- start of weather widget -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2 class="company-name"><?php echo $jobs->company ?></h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="weather-icon">


                            <img class="img-responsive avatar-view"  src="<?php echo url('/'); ?>/storage/app/public/employer/<?php if(strlen($jobs->path) > 0){echo $jobs->path; } else { echo 'default.png'; }  ?>" height="84" width="84"  alt="Avatar" title="Change the avatar">
                          </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="weather-text job-title">
                          <a href="<?php echo url('job_seeker/viewjobdetails/'.$jobs->id.'') ?>">
                            <h2><?php echo $jobs->jobtitle ?></h2></a>
                          </div>
                        </div>
                      </div>


                      <div class="row weather-days">
                          <div class="daily-weather">
                            <h2 class="day city-name"><b>Job Location</b><?php  foreach($locations[$jobs->id] as $location)
                                    { ?>&nbsp&nbsp&nbsp-&nbsp&nbsp&nbsp
                                      <?php 
                                      echo $location->city; ?>
                                    <?php }?></h2>
                            <h3 class="city address-bar"><b>Company Location</b>&nbsp&nbsp&nbsp-&nbsp&nbsp&nbsp<?php echo $jobs->addline1;/* echo $jobs->addline2; echo $jobs->pincode; echo $jobs->statename;*/ ?> </h3>
                          </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="row"><hr>
                        <div class="col-md-4">
                          <p style="font-size:10px;"><?php echo $daypassedtopost[$counter_jobs] ?> day ago</p>
                        </div>
                        <div class="col-md-4">
                        <?php /* <img class="img" style="width:90%; height:15px;" src="<?php echo url('/'); ?>/public/images/jobs/foodlinked.png" alt="foodlinked"> */ ?>
                        </div>
                        <div class="col-md-4 pull-right">
                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target=".bs-apply-modal-sm" onClick="apply_jobs('<?php echo $jobs->id ?>','<?php echo $jobs->jobtitle ?>','<?php echo $jobs->company ?>')">Easy Apply</button>
                        </div>
                        </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
                <!-- end of weather widget --> 
                <?php $counter_jobs++; }} else{ ?>  
                    <div class="col-md-12">
                                <center>
                                  <h1 class="icon-wornings" style="
    padding-top: 110px;
">
                               <i class="fa fa-exclamation-triangle"></i> 
                               <h1>No data available</h1>
                             </h1>
                           </center>
                             </div>
                              

                          <?php } ?>
              </div>
</div>
</div>
<?php echo $jobs_info->links(); ?>
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
                  </div>

<!-- Save Job modal -->

<div class="modal fade bs-example-modal-apply-job" >
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
<h4 class="modal-title">Search</h4>
</div>
<div class="card wizard-card" data-color="orange" id="wizardProfile">
<form action="<?php echo url("/job_seeker/searchapplyforjob"); ?>" method="post" id="mins" enctype="multipart/form-data" >
<div class="modal-body">
<!-- start form for validation -->
<div class="row">
<div class="col-md-4 form-group" >
<input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
<label for="fullname">Keyword </label>
<input type="text" id="keyword" class="form-control" name="keyword" >
</div>
<div class="col-md-4 form-group"><label for="Currency">Currency </label>
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
<?php   for( $i = 1; $i<=30; $i++ ) {?>
<option value="<?php echo $i ?>">
  <?php echo $i ?>
</option>
<?php  } ?>                                  
</select>
</div>
</div>
<div class="row">
<div class="col-md-4 form-group">
<label for="Country">Country </label>
<select class="form-control select2" id="country" name="country" onChange="ShowState()" style="width: 100%;" > 
  <option value="">Select Country</option>
  <?php foreach ($Country as $user6) { ?>
  <option value="<?php echo $user6->location_id?>"><?php echo $user6->name?></option>
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
<!-- Save Job modal End-->

  
    <!-- ./wrapper -->
</body>
<?php echo $__env->make('layouts.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Session::get('job_posted_success');
  if(Session::get('job_apply_session')==1){
    echo "<script>
                  $.toast({
                    heading: 'Success',
                    text: 'You Have Successfully Applied for a Job',
                    icon: 'success',    
                    position: 'top-right'
                  });
                
              </script>";
  session::put('job_apply_session', 0);} ?>
<script>
  function  apply_jobs(jobidvalue,jobtitle,companyname){
    console.log(jobidvalue);
    document.getElementById("jobid").value = jobidvalue;
    document.getElementById("jobtitleforapply").innerHTML = jobtitle;
    document.getElementById("companynameforapply").innerHTML = companyname;
  }
</script>
<script>
              function ShowState(){
                  var Country = document.getElementById('country').value;
              // console.log(vl);
                    $.ajax({
                      type:"post",
                      url: "<?php echo url("/common/showstateforsearch"); ?>",
                    data:{Country:Country,"_token":'<?php echo e(csrf_token()); ?>'},
                    context: document.body
                    }).done(function(msg) {
                    $('#NewState').html(msg);
                    });
              }
              </script>
              <script>
              function ShowCity(){
                  var State = document.getElementById('state').value;
              // console.log(vl);
                    $.ajax({
                      type:"post",
                      url: "<?php echo url("/common/showcityforsearch"); ?>",
                    data:{State:State,"_token":'<?php echo e(csrf_token()); ?>'},
                    context: document.body
                    }).done(function(msg) {
                    $('#NewCity').html(msg);
                    });
              }
              </script>
              
<script>
  function ChangeCurrency(){
    var currencytype = document.getElementById('Currency').value;
                  console.log('currencytype: '+currencytype);
                  $(".exptdpckg").remove();
                  if(currencytype=='USD'){
                    var option = "<option class='exptdpckg' value='786'> Less than 5,000 </option>"
                    document.getElementById('Expectedpckg').innerHTML += option;
                    for(var x=5000;x<=100000;x=x+5000){
                      var option = "<option class='exptdpckg' value='"+ x +"'> " + x.toLocaleString() + "</option>"
                      document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    var option = "<option class='exptdpckg' value='10000000'>  100,000 & above </option>"
                    document.getElementById('Expectedpckg').innerHTML += option;
                  }
                  else if(currencytype=='INR'){
                    var option = "<option class='exptdpckg' value='12477'> Less than 50,000 </option>"
                    document.getElementById('Expectedpckg').innerHTML += option;
                    for(var x=50000;x<=100000;x=x+10000){
                      var option = "<option class='exptdpckg' value='"+ x +"'> " + x.toLocaleString() + "</option>"
                      document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for(var y=125000;y<=500000;y=y+25000){
                      var option = "<option class='exptdpckg' value='"+ y +"'> " + y.toLocaleString() + "</option>"
                      document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for(var z=550000;z<=1000000;z=z+50000){
                      var option = "<option class='exptdpckg' value='"+ z +"'> " + z.toLocaleString() + "</option>"
                      document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for(var p=1100000;p<=2000000;p=p+100000){
                      var option = "<option class='exptdpckg' value='"+ p +"'> " + p.toLocaleString() + "</option>"
                      document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for(var q=2250000;q<=4000000;q=q+250000){
                      var option = "<option class='exptdpckg' value='"+ q +"'> " + q.toLocaleString() + "</option>"
                      document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for(var r=4500000;r<=9500000;r=r+500000){
                      var option = "<option class='exptdpckg' value='"+ r +"'> " + r.toLocaleString() + "</option>"
                      document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    var option = "<option class='exptdpckg' value='10000000'>  100,00,000 & above </option>"
                    document.getElementById('Expectedpckg').innerHTML += option;
                  }
                  else{
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
