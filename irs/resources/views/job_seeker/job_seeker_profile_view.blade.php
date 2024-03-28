  <!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IRS | Candidate Profile
    </title>
    @include('layouts.css')
    <style>
      label.error:not(.form-control) {
        color: #EB5E28;
        font-size: 0.8em;
      }
    </style> 
    <style>
      .head{
        margin-top:5px;
      }
      .icon-logo{
        background-color: #b3b6b9;
        border-radius: 6px;
        width:56px;
        height:56px;
        margin-left:-10px;
      }
      .name-heding{
        font-size: 2.6rem;
        line-height: 1.5;
        font-weight: 600;
      }
      .type-heding{
        font-size: 1.6rem;
        line-height: 1.75;
        font-weight: 400;
      }
      .type-heding-education{
        font-size: 1.6rem;
        line-height: 1.75;
        font-weight: 400;
        margin-top: 60px;
      }
      .education-heding{
        font-size: 3rem;
        line-height: 1.4;
      }
    </style>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container"> 
        @include('layouts.jobseeker_sidebar')
        @include('layouts.header')
        <div class="right_col" role="main" >
          <div class="page-title">
            <div class="title_left">
              <h3>Profile</h3>
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
                    <li>
                      <a href="#">Jobs
                      </a>
                    </li>
                    <li class="active">Profile
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix">
          </div>
          <div class="row">
            <div class="panel panel-default">
              <div class="panel-body">
                <!-- Message Error -->
                <div class="row">
                  @if(Session::has('message'))
                  <p class="alert {{ Session::get('alert-class', 'alert-info alert-dismissible') }}" id="myalertstatus">{{ Session::get('message') }}
                  </p>
                  @endif
                </div>
                <!-- Message Error End-->
                <!-- Personal Details Table container -->
                <div class="card wizard-card" data-color="orange" id="wizardProfile"> 
                  <div class="row">
                    <div class="profile_title head after-add-Profile">
                      <div class="col-md-6">
                        <h2>
                          <i class="fa fa-user-circle-o">
                          </i> Personal Details
                        </h2>
                      </div>
                      <div class="col-md-6 pull-right">
                        <button class="btn btn-success btn-sm pull-right"  data-toggle="modal" data-target=".bs-example-modal-Profile" type="button"  title="Add Education" style="margin-top:5px;">
                          <i class="glyphicon glyphicon-edit">
                          </i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="add1">
                  </div>
                  <br/>
                  <!-- Copy Fields-These are the fields which we get through jquery and then add after the above input,-->
                  <?php foreach ($jsprofile as $jsprofilebasic) { ?>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="panel-body">
                        <table class="table table-striped">
                          <tbody>
                            <tr>
                              <th scope="row" class="col-md-4">
                                Name
                              </th>
                              <td class="col-md-8">
                                <?php echo $jsprofilebasic->name ?> 
                              </td>
                            </tr>
                            <tr>
                              <th scope="row" class="col-md-4">Phone
                              </th>
                              <td class="col-md-8">
                                <?php echo $jsprofilebasic->contact_number ?> 
                              </td>
                            </tr>
                            <tr>
                              <th scope="row" class="col-md-4">Marital Status
                              </th>
                              <td class="col-md-8">
                                <?php if($jsprofilebasic->marital_status=="S"){ echo 'Single'; }
else{
echo 'Married'; 
} ?> 
                              </td>
                            </tr>
                            <tr>
                              <th scope="row" class="col-md-4">Country
                              </th>
                              <td class="col-md-8">
                                <?php echo $jsprofilebasic->countryname ?>
                              </td>
                            </tr>
                            <tr>
                              <th scope="row" class="col-md-4">About
                              </th>
                              <td class="col-md-8">
                                <?php echo $jsprofilebasic->about ?> 
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="panel-body">
                        <table class="table table-striped">
                          <tbody>
                            <tr>
                              <th scope="row" class="col-md-4">Email
                              </th>
                              <td class="col-md-8">
                                <?php echo $jsprofilebasic->email ?>
                              </td>
                            </tr>
                            <tr>
                              <th scope="row" class="col-md-4">DOB
                              </th>
                              <td class="col-md-8">
                                <?php echo explode(' ',$jsprofilebasic->dob)[0] ?>
                              </td>
                            </tr>
                            <tr>
                              <th scope="row" class="col-md-4">Gender
                              </th>
                              <td class="col-md-8">
                                <?php if($jsprofilebasic->gender=="F"){ echo 'Female'; }else{
echo 'Male'; } ?>
                              </td>
                            </tr>
                            <tr>
                              <th scope="row" class="col-md-4">City & State
                              </th>
                              <td class="col-md-8">
                                <?php echo $jsprofilebasic->city ?> 
                                <?php echo ", "; echo $jsprofilebasic->statename ?>
                              </td>
                            </tr>
                            <tr>
                              <th scope="row" class="col-md-4">Permanent Address
                              </th>
                              <td class="col-md-8">
                                <?php echo $jsprofilebasic->permanent_address ?>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div>
                <!-- Personal Details Table container End-->
                <!--  Educational Details Table container -->
                <div class="card wizard-card" data-color="orange" id="wizardProfile"> 
                  <div class="row">
                    <div class="profile_title head after-add-Profile">
                      <div class="col-md-6">
                        <h2>
                          <i class="fa fa-university">
                          </i> Educational Details 
                        </h2>
                      </div>
                      <div class="col-md-6 pull-right">
                        <button class="btn btn-success btn-sm pull-right"  data-toggle="modal" data-target=".bs-example-modal-Education" type="button"  title="Add Education" style="margin-top:5px;">
                          <i class="fa fa-plus-circle ">
                          </i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="add1">
                  </div>
                  <br/>
                  <!-- Copy Fields-These are the fields which we get through jquery and then add after the above input,-->
                  <?php foreach ($js_qualification as $jsqualifications) { ?>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="panel-body">
                        <table class="table table-striped">
                          <tbody>
                            <tr>
                              <th scope="row" class="col-md-4">
                                Education Type
                              </th>
                              <td class="col-md-8">
                                <?php echo $jsqualifications->education_type ?>
                              </td>
                            </tr>
                            <tr>
                              <th scope="row" class="col-md-4">Medium
                              </th>
                              <td class="col-md-8">
                                <?php echo $jsqualifications->medium ?> 
                              </td>
                            </tr>
                            <tr>
                              <th scope="row" class="col-md-4">University
                              </th>
                              <td class="col-md-8">
                                <?php echo $jsqualifications->university ?>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="panel-body">
                        <table class="table table-striped">
                          <tbody>
                            <tr>
                              <th scope="row" class="col-md-4">Courses
                              </th>
                              <td class="col-md-8">
                                <?php echo $jsqualifications->course ?>
                              </td>
                            </tr>
                            <tr>
                              <th scope="row" class="col-md-4">Year
                              </th>
                              <td class="col-md-8">
                                <time>
                                  <?php echo $jsqualifications->year_to ?>
                                </time> – 
                                <time>
                                  <?php echo $jsqualifications->year_from ?>
                                </time>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-1 pull-right">
                      <button class="btn btn-success btn-sm pull-right"   onClick="opendeditqualificationmodel('<?php echo $jsqualifications->id ?>');"   data-toggle="modal" data-target="#edit_qualification_div" type="button"  title="Add Education" style="margin-top:5px;"><i class="glyphicon glyphicon-edit "></i> </a></button>
                  </div>
                </div>
                <?php } ?>
              </div>
              <!--  Educational Details Table container End -->
              <!-- Experience Details Table container -->
              <div class="card wizard-card" data-color="orange" id="wizardProfile"> 
                <div class="row">
                  <div class="profile_title head after-add-Profile">
                    <div class="col-md-6">
                      <h2>
                        <i class="fa fa-user-circle-o">
                        </i> Experience Details 
                      </h2>
                    </div>
                    <div class="col-md-6 pull-right">
                      <button class="btn btn-success btn-sm pull-right"  data-toggle="modal" data-target=".bs-example-modal-Experience" type="button"  title="Add Education" style="margin-top:5px;">
                        <i class="fa fa-plus-circle ">
                        </i>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="add1">
                </div>
                <br/>
                <!-- Copy Fields-These are the fields which we get through jquery and then add after the above input,-->
                <?php foreach ($js_experience as $js_experiences) { ?>
                <div class="row">
                  <div class="col-md-6">
                    <div class="panel-body">
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <th scope="row" class="col-md-4">
                              Current Position
                            </th>
                            <td class="col-md-8">
                              <?php echo $js_experiences->designation ?>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row" class="col-md-4">Responsibilities
                            </th>
                            <td class="col-md-8">
                              <?php echo $js_experiences->key_responsibilities ?> 
                            </td>
                          </tr>
                          <tr>
                            <th scope="row" class="col-md-4">Current Package
                            </th>
                            <td class="col-md-8">
                              <?php echo $js_experiences->package ?>
                            </td>
                          </tr>
                         
                          <tr>
                            <th scope="row" class="col-md-4">About Company
                            </th>
                            <td class="col-md-8">
                              <?php echo $js_experiences->about_company ?> 
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="panel-body">
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <th scope="row" class="col-md-4">Employment Type
                            </th>
                            <td class="col-md-8">
                              <?php if($js_experiences->employment_type==1){echo "Full Time";}if($js_experiences->employment_type==2){echo "Part Time";}if($js_experiences->employment_type==3){echo "Internship";}  ?>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row" class="col-md-4">Year
                            </th>
                            <td class="col-md-8">
                              <?php echo $js_experiences->yearto ?> - <?php echo $js_experiences->yearfrom ?>
                            </td>
                          </tr>
                          
                          <tr>
                            <th scope="row" class="col-md-4">Company location
                            </th>
                            <td class="col-md-8">
                              <?php echo $js_experiences->company_location ?> - 
                              <?php foreach ($Country as $countrydata) {
                                if($countrydata->location_id==$js_experiences->company_nationality){ echo $countrydata->name; }
                              } ?>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row" class="col-md-4">Role Description
                            </th>
                            <td class="col-md-8">
                              <?php echo $js_experiences->role_description ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-md-1 pull-right">
                    <button class="btn btn-success btn-sm pull-right"  type="button"  title="Edit Experience" onClick="openjsexperienceeditmodel('<?php echo $js_experiences->id;?>');" data-toggle="modal" data-target="#edit_experience_div" style="margin-top:5px;"><i class="glyphicon glyphicon-edit "></i> </a></button>
                </div>
              </div>
              <?php } ?>
            </div>
            <!-- Experience Details Table container End-->
            <!-- Project Details Table container -->
            <div class="card wizard-card" data-color="orange" id="wizardProfile"> 
              <div class="row">
                <div class="profile_title head after-add-Profile">
                  <div class="col-md-6">
                    <h2>
                      <i class="fa fa-user-circle-o">
                      </i> Project Details
                    </h2>
                  </div>
                  <div class="col-md-6 pull-right">
                    <button class="btn btn-success btn-sm pull-right"  data-toggle="modal" data-target=".bs-example-modal-Project" type="button"  title="Add Education" style="margin-top:5px;">
                      <i class="fa fa-plus-circle">
                      </i>
                    </button>
                  </div>
                </div>
              </div>
              <div class="add1">
              </div>
              <br/>
              <!-- Copy Fields-These are the fields which we get through jquery and then add after the above input,-->
              <?php foreach ($js_projects as $jsprojects) { ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="panel-body">
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <th scope="" class="col-md-4">
                            Project Title
                          </th>
                          <td class="col-md-8">
                            <?php echo $jsprojects->project_title ?> 
                          </td>
                        </tr>
                        <tr>
                          <th scope="" class="col-md-4">Duration
                          </th>
                          <td class="col-md-8">
                            <?php echo $jsprojects->duration ?> 
                          </td>
                        </tr>
                        <tr>
                          <th scope="" class="col-md-4">Team Size
                          </th>
                          <td class="col-md-8">
                            <?php echo $jsprojects->team_size ?>
                          </td>
                        </tr>
                        <tr>
                          <th scope="" class="col-md-4">About Project
                          </th>
                          <td class="col-md-8">
                            <?php echo $jsprojects->project_details ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="panel-body">
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <th scope="" class="col-md-4">Client name
                          </th>
                          <td class="col-md-8">
                            <?php echo $jsprojects->client_name ?>
                          </td>
                        </tr>
                        <tr>
                          <th scope="" class="col-md-4">Role
                          </th>
                          <td class="col-md-8">
                            <?php echo $jsprojects->role ?>
                          </td>
                        </tr>
                        <tr>
                          <th scope="" class="col-md-4">Project Loctaion
                          </th>
                          <td class="col-md-8">
                            <?php echo $jsprojects->project_location ?>
                          </td>
                        </tr>
                        <tr>
                          <th scope="" class="col-md-4">Skills Used
                          </th>
                          <td class="col-md-8">
                            <?php echo $jsprojects->skills_used ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
            <!-- Project Details Table container End-->
          </div>
        </div>  
      </div>
    </div>
    </div>
  </div>

<!-- Project Details Modal End-->
@include('layouts.footer')
<!-- ./wrapper -->
@include('layouts.js2')
<!-- Include Date Range Picker -->
<script type="text/javascript">
  function validate_attachment(){
    var attachment_file = document.getElementById("attachment_file").value;
    var idxDot = attachment_file.lastIndexOf(".") + 1;
    var extFile = attachment_file.substr(idxDot, attachment_file.length).toLowerCase();
    if (extFile=="doc" || extFile=="docx" || extFile=="pdf" || extFile=="txt"){
      //TO DO
    }
    else{
      alert("Only doc,docx and pdf files are allowed!");
      document.getElementById("attachment_file").value='';
    }
  }
</script>
<script>
  function removeerrorsub(){
    document.getElementById('sub0-error').innerHTML = '';
  }
  function removeerrormedium0(){
    document.getElementById('medium0-error').innerHTML = '';
  }
  function removeerroryearto(){
    document.getElementById('yearto-error').innerHTML = '';
  }
  function removeerroryearfrom(){
    document.getElementById('yearfrom-error').innerHTML = '';
  }
  function removeerroryeartoeducation(){
    //document.getElementById('education_date_to-error').innerHTML = '';
  }
  function removeerroryearformeducation(){
    //document.getElementById('education_date_from-error').innerHTML = '';
  }
  function removeerrorcurrentposition(){
    document.getElementById('current_position-error').innerHTML = '';
  }
  function removeerroremplyment_type(){
    document.getElementById('emplyment_type-error').innerHTML = '';
  }
  function removeerrorcurrent_package(){
    document.getElementById('current_package-error').innerHTML = '';
  }
  function removeerrorexpected_package(){
    document.getElementById('expected_package-error').innerHTML = '';
  }
  function removeerrorNationality(){
    document.getElementById('Nationality-error').innerHTML = '';
  }
  function removeerroeduration_to(){
    document.getElementById('duration_to-error').innerHTML = '';
  }
  function removeerroeduration_from(){
    document.getElementById('duration_from-error').innerHTML = '';
  }
  function removeerrorcity(){
    document.getElementById('city-error').innerHTML = '';
  }
</script>
<!-- End Error remove for create Job Posting Page -->
<script type="text/javascript">
  $('.to').datepicker({
    autoclose: true,
    minViewMode: 1,
    format: 'mm/yyyy'
  }
                     ).on('changeDate', function(selected){
    FromEndDate = new Date(selected.date.valueOf());
    FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
    $('.from').datepicker('setEndDate', FromEndDate);
  }
                         );
</script>
<script>
  $(document).ready(function(){
    var date_input=$('input[name="DOB"]');
    //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'mm/dd/yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
    }
                         )
  }
                   )
</script>
<script>
  $('input[name="yearto"]').datepicker( {
    format: " yyyy", // Notice the Extra space at the beginning
    viewMode: "years", 
    minViewMode: "years",
    autoclose: true,
  }
                                      );
</script>
<script>
  $('input[name="yearfrom"]').datepicker( {
    format: " yyyy", // Notice the Extra space at the beginning
    viewMode: "years", 
    minViewMode: "years",
    autoclose: true,
  }
                                        );
</script>
<script>
  $('input[name="yeartoeducation"]').datepicker( {
    format: " yyyy", // Notice the Extra space at the beginning
    viewMode: "years", 
    minViewMode: "years",
    autoclose: true,
  }
                                               );
</script>
<script>
  $('input[name="yearfromeducation"]').datepicker( {
    format: " yyyy", // Notice the Extra space at the beginning
    viewMode: "years", 
    minViewMode: "years",
    autoclose: true,
  }
                                                 );
</script>
<script>
  $(document).ready(function(){
    var date_input=$('input[name="Experienceyearto"]');
    //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'mm/dd/yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
    }
                         )
  }
                   )
</script>
<script>
  $(document).ready(function(){
    var date_input=$('input[name="Experienceyearfrom"]');
    //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'mm/dd/yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
    }
                         )
  }
                   )
</script>
<script type="text/javascript">
  $(document).ready(function() {
    //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
    $(".add-Profile").click(function(){
      $(".add1").html("");
      var html = $(".copy-Profile").html();
      $(".add1").html(html);
    }
                           );
    //here it will remove the current value of the remove button which has been pressed
    $("body").on("click",".remove",function(){
      console.log('remove click');
      $(this).parents(".control-group").remove();
      //$("#neweducation").remove();
    }
                );
  }
                   );
</script>
<script type="text/javascript">
  $(document).ready(function() {
    //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
    $(".add-Education").click(function(){
      $(".add2").html("");
      var html = $(".copy-Education").html();
      $(".add2").html(html);
    }
                             );
    //here it will remove the current value of the remove button which has been pressed
    $("body").on("click",".remove",function(){
      console.log('remove click');
      $(this).parents(".control-group").remove();
      //$("#neweducation").remove();
    }
                );
  }
                   );
</script>
<script type="text/javascript">
  $(document).ready(function() {
    //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
    $(".add-AddEducation").click(function(){
      var html = $(".copy-AddEducation").html();
      $(".after-add-AddEducation").after(html);
    }
                                );
    //here it will remove the current value of the remove button which has been pressed
    $("body").on("click",".removeAddEducation",function(){
      console.log('remove click');
      $(this).parents(".control-group").remove();
      //$("#neweducation").remove();
    }
                );
  }
                   );
</script>
<script type="text/javascript">
  $(document).ready(function() {
    //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
    $(".add-more").click(function(){
      var html = $(".copy-fields").html();
      $(".after-add-more").after(html);
    }
                        );
    //here it will remove the current value of the remove button which has been pressed
    $("body").on("click",".remove",function(){
      console.log('remove click');
      $(this).parents(".control-group").remove();
      //$("#neweducation").remove();
    }
                );
  }
                   );
</script>
<script type="text/javascript">
  $(document).ready(function() {
    //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
    $(".add-Experience").click(function(){
      $(".add3").html("");
      var html = $(".copy-Experience").html();
      $(".add3").html(html);
    }
                              );
    //here it will remove the current value of the remove button which has been pressed
    $("body").on("click",".remove",function(){
      console.log('remove click');
      $(this).parents(".control-group").remove();
      //$("#neweducation").remove();
    }
                );
  }
                   );
</script>
<script type="text/javascript">
  $(document).ready(function() {
    //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
    $(".add-Project").click(function(){
      $(".add4").html("");
      var html = $(".copy-Project").html();
      $(".add4").html(html);
    }
                           );
    //here it will remove the current value of the remove button which has been pressed
    $("body").on("click",".remove",function(){
      console.log('remove click');
      $(this).parents(".control-group").remove();
      //$("#neweducation").remove();
    }
                );
  }
                   );
</script>
<script>
  // WRITE THE VALIDATION SCRIPT.
  function isNumber(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
      return false;
    return true;
  }
</script>
<script>
  function isNumberKey(evt,id)
  {
    try{
      var charCode = (evt.which) ? evt.which : event.keyCode;
      if(charCode==46){
        var txt=document.getElementById(id).value;
        if(!(txt.indexOf(".") > -2)){
          return true;
        }
      }
      if (charCode > 31 && (charCode < 48 || charCode > 57) )
        return false;
      return true;
    }
    catch(w){
      alert(w);
    }
  }
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  }
   )
</script>
<script>
  function ShowState(){
    var Country = document.getElementById('country').value;
    $.ajax({
      type:"post",
      url: "<?php echo url('/common/showstate'); ?>",
      data:{
        Country:Country,"_token":"{{csrf_token()}}"}
      ,
      context: document.body
    }
          ).done(function(msg) {
      $("#NewAddState").html(msg);
    }
                );
    document.getElementById('country-error').innerHTML = '';
  }
</script>
<script>
  function ShowCity(){
    var State = document.getElementById('state').value;
    console.log(State);
    $.ajax({
      type:"post",
      url: "<?php echo url('/common/showcity'); ?>",
      data:{
        State:State,"_token":"{{csrf_token()}}"}
      ,
      context: document.body
    }
          ).done(function(msg) {
      $("#NewAddCity").html(msg);
    }
                );
    document.getElementById('state-error').innerHTML = '';
  }
</script>
<script>
  $(document).ready(function () {
    $('form').each(function () {
      $(this).validate({
        // your option
      }
                      );
    }
                  );
  }
                   );
</script>
<script>
                function ShowCourse(op_type){
                  var typeofeducation = document.getElementById('type'+op_type).value;
                  //alert(typeofeducation); 
                  $.ajax({
                    type:"post",
                    url: "<?php echo url("/common/showcourse"); ?>",
                    data:{
                    typeofeducation:typeofeducation,op_type:op_type,"_token":'{{csrf_token()}}'}
                         ,
                         context: document.body
                         }
                        ).done(function(msg) {

                    $('#courses'+op_type).html(msg);
                  }
                              );
                }
              </script>
              <script>
                function opendeditqualificationmodel(qualificationid){
                     $.ajax({
                    type:"post",
                    url: "<?php echo url("/home/opendeditqualificationmodel"); ?>",
                    data:{qualificationid:qualificationid,"_token":'{{csrf_token()}}'}
                         ,
                         context: document.body
                         }
                        ).done(function(msg) {
                           $('#edit_qualification_div').html(msg);
                           //$("[data-toggle='tooltip']").tooltip();
                    
                  });
                 
                }

                
                function openjsexperienceeditmodel(experienceid){
                     $.ajax({
                    type:"post",
                    url: "<?php echo url("/home/openjsexperienceeditmodel"); ?>",
                    data:{experienceid:experienceid,"_token":'{{csrf_token()}}'}
                         ,
                         context: document.body
                         }
                        ).done(function(msg) {
                           $('#edit_experience_div').html(msg);
                  });
                 
                }
              </script>
              
            <script>
                function ShowStream(op_type){
                  var typeofeducation = document.getElementById('type'+op_type).value;
                  var courseName = document.getElementById('coursedetail').value;
                  
                  //alert(courseName);

                  $.ajax({
                    type:"post",
                    url: "<?php echo url("/common/showstream"); ?>",
                    data:{
                    typeofeducation:typeofeducation,courseName:courseName,"_token":'{{csrf_token()}}'}
                         ,
                         context: document.body
                         }
                        ).done(function(msg) {
                    $('#stream'+op_type).html(msg);
                  }
                              );
                }
              </script>
</body>
</html>
