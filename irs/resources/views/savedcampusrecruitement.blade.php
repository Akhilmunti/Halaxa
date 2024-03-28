<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IRS | Saved Job Postings</title>
<link rel="stylesheet" href="<?php echo url('/'); ?>/public/External/css/style.css">
     @include('layouts.css')
 <style>

/*=====================*/
.checkbox {
}
.checkbox:after, .checkbox:before {
}
.checkbox label {
 
  height: 35px;
  background: #ccc;
  position: relative;
 
}
.checkbox label:after {
  content: '';
  position: absolute;
 
  border-radius: 100%;
  left: 0;
  
  z-index: 2;
  background: #fff;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
  transition: 0.4s;
}
.checkbox input {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  z-index: 5;
  opacity: 0;
  cursor: pointer;
}
.checkbox input:hover + label:after {
  box-shadow: 0 2px 15px 0 rgba(0, 0, 0, 0.2), 0 3px 8px 0 rgba(0, 0, 0, 0.15);
}
.checkbox input:checked + label:after {
  
}

.model-8 .checkbox label {
  background: #ddd;
  width: 68px;
  border-radius: 3px;
}
.model-8 .checkbox label:after {
  background: #fff;
  border-radius: 3px;
 
  width: 36px;
  height:35px;
 
}
.model-8 .checkbox input:checked + label {
  background: #1ABB9C;
}
.model-8 .checkbox input:checked + label:after {
  left: 35px;
}

</style>

</head>
<body class="nav-md">
    <div class="container body">
    <div class="main_container"> 

  @include('layouts.employer_sidebar')
  @include('layouts.header')

<div class="right_col" role="main" >
  
          <div class="page-title">
            <div class="title_left">
              <h3> 
                      Saved Campus Recruitement</h3>
            </div>

            <div class="title_right pull-right">
                   <span class="input-group-btn">
                    <?php  if (count($savedcampusjobs) > 0) { ?>
                     <button class="btn btn-default pull-right" type="button"  data-toggle="modal" data-target=".bs-example-modal-Save-job" style="border-radius: 50px; background-color: #FFF; "><i class="fa fa-search" ></i> Search Go ! </button>
                     <?php } ?>
                   </span>
            </div>
          </div>
            <div class="clearfix"></div>
 

              <div class="row">
                <div class="x_panel">
                  <div class="x_content">
                    
                           <div class="row">
                          <?php  if (count($savedcampusjobs) > 0) { ?>
                          <?php  foreach ($savedcampusjobs as $campusdata) { ?>
                          <div class="col-md-4  col-md-8 col-xs-12">
                            <div class="save-job">
                              <div class="count">
                                <h2 class="job-title-name">
                                  <a href="{{ url('/employer/viewsavedjob/'.$campusdata->id.'') }}"><?php echo $campusdata->jobtitle?></a>
                                </h2>
                                <hr/>
                              </div>
                              <div class="save-job-details">
                                <div class="row">
                                  <div class="col-md-5">
                                    <h4 style="">Recruiter Name - </h4>
                                  </div>
                                  <div class="col-md-7">
                                    <h4 class="save-job-text"><?php echo $campusdata->company ?> </h4>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-5">
                                    <h4 style="">Functional Area - </h4>
                                  </div>
                                  <div class="col-md-7">
                                    <h4 class="save-job-text"><?php echo $campusdata->functional_area_value ?> </h4>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-5">
                                    <h4 style="">Job Role - </h4>
                                  </div>
                                  <div class="col-md-7">
                                    <h4 class="save-job-text"> <?php echo $campusdata->job_role_value ?> </h4>
                                  </div>
                                </div>
                              </div>
                              <hr>
                              <div class="row"> 
                                <div class="col-md-12" >
                                    <h3 class="city-location address-bar">Location<?php  foreach($locations[$campusdata->id] as $jobslocation)
                                    { ?>&nbsp&nbsp&nbsp-&nbsp&nbsp&nbsp
                                      <?php echo $jobslocation->city; ?>
                                    <?php }?>
                                    </h3>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-md-4">
                                  <h4 style="city-location address-bar"><?php $createddate = explode(" ", $campusdata->created_at); echo $createddate = date('d M. Y', strtotime(date($createddate[0])));?>
                                  </h4>
                                </div>
                                <div class="col-md-4">
                                  <a href="{{ url('/employer/editsavedcampusrecruitement/'.$campusdata->id.'') }}"><button type="button" class="btn btn-primary"> <i class="fa fa-edit"></i></button></a>                       
                                  <button type="button"  onClick="delete_jobs('<?php echo $campusdata->id; ?>','<?php echo $campusdata->jobtitle; ?>')" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm" ><i class="fa fa-trash-o"></i></button>
                                </div>
                                <div class="col-md-4">
                                    <section class="model-8 pull-right" style="margin-top:-10px;">
                                      <div class="checkbox">
                                        <input type="checkbox" <?php if($campusdata->Isfinished == '0'){ ?> disabled="disabled" <?php } else { ?> data-toggle="modal" data-target=".bs-active-modal-sm" onClick="postsavedjob('<?php echo $campusdata->id; ?>','<?php echo $campusdata->jobtitle; ?>')" <?php }  ?> />
                                          <label  style=""></label>
                                      </div>
                                    </section>
                                </div>
                              </div>
                            </div> 
                          </div> 
                          <?php }} else{ ?>
                            <div class="col-md-12">
                                <center>
                                  <h1 class="icon-wornings">
                               <i class="fa fa-exclamation-triangle"></i> 
                               <h1>No data available</h1>
                             </h1>
                           </center>
                             </div>
                              

                          <?php } ?>
                        </div> 
                        <?php echo $savedcampusjobs->links(); ?>       
                        </div>
                      </div>
                 





</div>
</div>
</div>
</div>

<?php  /*if (count($savedjobsdata) > 0) {*/ ?>
   <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-sm">
                      <form action="<?php echo url('/employer/deletesavedjobsposting') ?>" method="post">
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
                          <a href="<?php echo url('employer/savedjobposting') ?>"><button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"> No</i></button></a>
                          <button type="submit" class="btn btn-success"> <i class="fa fa-check"> Yes</i></button>
                        </div>

                      </div></form>
                    </div>
                  </div> <?php /*}*/ ?>

  <?php  /*if (count($savedjobsdata) > 0) {*/ ?>
   <div class="modal fade bs-active-modal-sm" tabindex="-1" role="dialog" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-sm">
                      <form action="<?php echo url('/employer/postsavedjob') ?>" method="post">
                      <div class="modal-content">

                        <div class="modal-header">
                        
                          <h4 class="modal-title" id="myModalLabel2">Confirmation</h4>
                        </div>
                        <input type = "hidden" name="MODELNAME" value="Active">
                        <div class="modal-body">
                          <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
                          <h4>Do You Want to Post "<lable id="jobtitleforpost"></lable>" Job ?</h4>
                          <input type="hidden" name="jobid" value="" id="jobidinactivate">
                        </div>
                        <div class="modal-footer">
                        <a href="{{ url('/employer/savedjobposting') }}"><button type="button" class="btn btn-default pull-left" ><i class="fa fa-times"> No</i></button></a>
                        
                       <button type="submit" class="btn btn-success"><i class="fa fa-check"> Yes</i></button>
                        </div>

                      </div></form>
                    </div>
                  </div> <?php /*}*/ ?>

<!-- Save Job modal -->

<div class="modal fade bs-example-modal-Save-job" >
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
<h4 class="modal-title">Search</h4>
</div>
<div class="card wizard-card" data-color="orange" id="wizardProfile">
<form action="<?php echo url("/employer/searchsavedcampusrecruitements"); ?>" method="post" id="mins" enctype="multipart/form-data" >
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

      @include('layouts.footer')
  
    <!-- ./wrapper -->
</body>
@include('layouts.js')

<?php 
  if(Session::get('job_posted_success')==1){
    echo "<script>
                  $.toast({
                    heading: 'Success',
                    text: 'You Have Successfully Posted a Job',
                    icon: 'success',    
                    position: 'top-right'
                  });
                
              </script>";
  session::put('job_posted_success', 0);} ?>
  
  <?php 
  if(Session::get('delete_job_session')==1){
    echo "<script>
                  $.toast({
                    heading: 'Success',
                    text: 'You Have Successfully Deleted a Job',
                    icon: 'success',    
                    position: 'top-right'
                  });
                
              </script>";
  session::put('delete_job_session', 0);} ?>
<script>
  function  delete_jobs(jobidvalue,jobtitlevalue){
    console.log(jobidvalue);
    document.getElementById("jobidindelete").value = jobidvalue;
    document.getElementById("jobtitlefordelete").innerHTML = jobtitlevalue;
  }
</script>

<script>
  function  postsavedjob(jobidvalue,jobtitlevalue){
    console.log(jobidvalue);
    document.getElementById("jobidinactivate").value = jobidvalue;
    document.getElementById('jobtitleforpost').innerHTML = jobtitlevalue;
  }
</script>
   <script>
              function ShowState(){
                  var Country = document.getElementById('country').value;
              // console.log(vl);
                    $.ajax({
                      type:"post",
                      url: "<?php echo url("/common/showstateforsearch"); ?>",
                    data:{Country:Country,"_token":'{{csrf_token()}}'},
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
                    data:{State:State,"_token":'{{csrf_token()}}'},
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
