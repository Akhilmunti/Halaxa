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
    <?php echo $__env->make('layouts.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container"> 
        <?php echo $__env->make('layouts.employer_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="right_col" role="main" >
          <div class="page-title">
            <div class="title_left">
              <h3>Profile
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

              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" <?php if($postaction=='jp'){echo "class='active'";} ?>><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><?php echo $jsprofile[0]->name ?> </a>
                        </li>
                        <li role="presentation" <?php if($postaction=='at'){echo "class='active'";} ?>><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Profile Assessment Test</a>
                        </li>
                        <li role="presentation" <?php if($postaction=='at'){echo "class='active'";} ?>><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Video Interview</a>
                        </li>
                        <li role="presentation" <?php if($postaction=='at'){echo "class='active'";} ?>><a href="#tab_content4" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Live Video Discussion</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade <?php if($postaction=='jp'){echo "active in";} ?>" id="tab_content1" aria-labelledby="home-tab">
                          <!-- Personal Details Table container -->
                <div class="card wizard-card" data-color="orange" id="wizardProfile"> 
                  <div class="row">
                    <div class="profile_title head after-add-Profile">
                      <div class="col-md-12">
                        <h2>
                          <i class="fa fa-user-circle-o">
                          </i> Personal Details
                        </h2>
                      </div>
                      
                    </div>
                  </div>
                  <br/>
                  <!-- Copy Fields-These are the fields which we get through jquery and then add after the above input,-->
                  <?php foreach ($jsprofile as $jsprofilebasic) { ?>
                  <div class="row">
                      <div class="panel-body col-md-6">
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
                      <div class="panel-body col-md-6">
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
                      
                    </div>
                  </div>      
                  <br/>
                  <!-- Copy Fields-These are the fields which we get through jquery and then add after the above input,-->
                  <?php foreach ($js_qualification as $jsqualifications) { ?>
                  <div class="row">
                      <div class="panel-body col-md-6">
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
                      <div class="panel-body col-md-6">
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
                    
                  </div>
                </div>
                <br/>
                <!-- Copy Fields-These are the fields which we get through jquery and then add after the above input,-->
                <?php foreach ($js_experience as $js_experiences) { ?>
                <div class="row">
                    <div class="panel-body col-md-6">
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
                    <div class="panel-body col-md-6">
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
                  
                </div>
              </div>
              <!-- Copy Fields-These are the fields which we get through jquery and then add after the above input,-->
              <?php foreach ($js_projects as $jsprojects) { ?>
              <div class="row">
                  <div class="panel-body col-md-6">
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
                  <div class="panel-body col-md-6">
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
              <?php } ?>
            </div>
            <!-- Project Details Table container End-->
                        </div>
                        <div role="tabpanel" class="tab-pane fade <?php if($postaction=='at'){echo "active in"; } ?>"  id="tab_content2" aria-labelledby="profile-tab">
                        <?php $cuntofrow = count($jsAssignedTest); if(count($jsAssignedTest) > 0){ ?>
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
                          </tr>
                        </thead>
                        <tbody>
                              
                        <?php  for($loopvarcount=0;$loopvarcount<$cuntofrow;$loopvarcount++){ ?>
                            <tr>
                              <td>Test <?php echo $loopvarcount+1; ?></td>
                               <td><?php echo $jsAssignedTest[$loopvarcount]->category; ?>
                              </td>
                              <td><?php echo $jsAssignedTest[$loopvarcount]->test_name; ?>
                              </td>
                              <td><?php echo $jsAssignedTest[$loopvarcount]->coverage; ?>
                              </td>
                              <td><?php echo $jsAssignedTest[$loopvarcount]->days; ?>
                              </td>
                              <td><?php if(!empty($jsAssignedTest[$loopvarcount]->average_score))
                              echo "Attempted";else echo "Not Attempted"; ?></td>
                              <td><?php echo $jsAssignedTest[$loopvarcount]->test_result; ?></td>
                              <td><?php echo $jsAssignedTest[$loopvarcount]->average_score; ?></td>
                            </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                    <?php } ?>
                          <form action="<?php echo url('/employer/assigntesttojs'); ?>" method="post">
                            <input type="hidden" name="jsemail" <?php foreach ($jsprofile as $jsinfo) { ?>
                                value = "<?php echo $jsinfo->email; ?>"
                               <?php } ?>>
                               <input type="hidden" name="jsname" <?php foreach ($jsprofile as $jsinfo) { ?>
                                value = "<?php echo $jsinfo->name; ?>"
                               <?php } ?>>
                              <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
                              <input type = "hidden" name="jsid" value="<?php echo $id; ?>">
                              <input type = "hidden" name="jobid" value="<?php echo $jobid; ?>">
                            <?php if($cuntofrow<1){ ?>
                          <div class="row">
                              <div class="col-md-1">
                                <h4>Test 1</h4>
                              </div>
                              <div class="col-md-3">
                              <select class="form-control select2" id="testcategory1" name="testcategory[]"  onChange="ShowTestName(1)" style="width: 100%;" > 
                                <option value="">Select Test Catrgory</option>
                                <?php foreach ($test_category as $testcategory) { ?>
                                    <option value="<?php echo $testcategory->category; ?>"><?php echo $testcategory->category; ?></option>
                               <?php } ?>
                                
                              </select>
                              </div>
                              <div class="col-md-3">
                              <div id="NewTestName1">
                              <select class="form-control select2" id="testname1" name="testname[]" style="width: 100%;" > 
                                <option value="">Select Test Name</option>
                                
                              </select></div>
                              </div>
                              <div class="col-md-3">
                              <textarea id="description1" name="description[]" class="form-control" style="max-width:100%; min-width:100%; min-height:75px; max-height:75px;" readonly>
                              </textarea>
                              </div>
                              <div class="col-md-2">
                              <input type='button' class='btn btn-reset btn-fill btn-default btn-wd' name='Clear1' onclick="remove_content(1)" value='Clear' />
                              </div>
                          </div>
                          <hr/>
                        <?php  } ?>
                        <?php if($cuntofrow<2){ ?>
                          <div class="row">
                              <div class="col-md-1">
                              <h4>Test 2</h4>
                              </div>
                              <div class="col-md-3">
                              <select class="form-control select2" id="testcategory2" name="testcategory[]" onChange="ShowTestName(2)" style="width: 100%;" > 
                                <option value="">Select Test Catrgory</option>
                               <?php foreach ($test_category as $testcategory) { ?>
                                    <option value="<?php echo $testcategory->category; ?>"><?php echo $testcategory->category; ?></option>
                               <?php } ?>
                              </select>
                              </div>
                              <div class="col-md-3">
                              <div id="NewTestName2">
                              <select class="form-control select2" id="testname2" name="testname[]" style="width: 100%;" > 
                                <option value="">Select Test Name</option>
                               
                              </select></div>
                              </div>
                              <div class="col-md-3">
                              <textarea id="description2" name="description[]" class="form-control" style="max-width:100%; min-width:100%; min-height:75px; max-height:75px;" readonly>
                              </textarea>
                              </div>
                              <div class="col-md-2">
                              <input type='button' class='btn btn-reset btn-fill btn-default btn-wd' name='Clear1' onclick="remove_content(2)" value='Clear' />
                              </div>
                          </div>
                          <hr/>
                           <?php  } ?>
                           <?php if($cuntofrow<3){ ?>
                          <div class="row">
                              <div class="col-md-1">
                              <h4>Test 3</h4>
                              </div>
                              <div class="col-md-3">
                              <select class="form-control select2" id="testcategory3" name="testcategory[]" onChange="ShowTestName(3)" style="width: 100%;" > 
                                <option value="">Select Test Catrgory</option>
                               <?php foreach ($test_category as $testcategory) { ?>
                                    <option value="<?php echo $testcategory->category; ?>"><?php echo $testcategory->category; ?></option>
                               <?php } ?>
                              </select>
                              </div>
                              <div class="col-md-3">
                              <div id="NewTestName3">
                              <select class="form-control select2" id="testname3" name="testname[]" style="width: 100%;" > 
                                <option value="">Select Test Name</option>
                               
                              </select></div>
                              </div>
                              <div class="col-md-3">
                              <textarea id="description3" name="description[]" class="form-control" style="max-width:100%; min-width:100%; min-height:75px; max-height:75px;" readonly>
                              </textarea>
                              </div>
                              <div class="col-md-2">
                              <input type='button' class='btn btn-reset btn-fill btn-default btn-wd' name='Clear1' onclick="remove_content(3)" value='Clear' />
                              </div>
                          </div>
                          <hr/>
                          <?php  } ?>
                          <?php if($cuntofrow<3){ ?>
                          <div class="row">
                            <div class="col-md-3">
                              <label>Assign timelines for completion of tests</label>
                            </div>
                            <div class="col-md-7">
                            <div class="slidecontainer">
                            <input type="range" min="1" max="30" value="0" class="slider" name="timeduration" id="myRange">
                              <br/>
                            <span id="demo"></span>
                          </div>
                            </div>
                            <div class="col-md-2">
                              <input type='submit' class='btn btn-reset btn-fill btn-primary btn-wd' name='next' value='Submit' />
                              </div>
                          </div><?php } ?></form>
                        </div>
                      </div>
                    </div>
               
          </div>
        </div>  
      </div>
    </div>
    </div>
  </div>

<!-- Project Details Modal End-->
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- ./wrapper -->
<?php echo $__env->make('layouts.js2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Include Date Range Picker -->

</body>
<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
  </script>
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
    })
  </script>
  <script>
    //function two get test names
                function ShowTestName(op_type){
                  var typeoftestcategory = document.getElementById('testcategory'+op_type).value;
                  //alert(typeofeducation); 
                  $.ajax({
                    type:"post",
                    url: "<?php echo url("/common/gettestnames"); ?>",
                    data:{
                    typeoftestcategory:typeoftestcategory,op_type:op_type,"_token":'<?php echo e(csrf_token()); ?>'}
                         ,
                         context: document.body
                         }
                        ).done(function(msg) {

                    $('#NewTestName'+op_type).html(msg);
                  }
                              );
                }
              </script>
              <script>
    //function two get test names
                function ShowDescription(op_type){
                  var typeoftestname = document.getElementById('testname'+op_type).value;
                  //alert(typeofeducation); 
                  $.ajax({
                    type:"post",
                    url: "<?php echo url("/common/gettestdescription"); ?>",
                    data:{
                    typeoftestname:typeoftestname,op_type:op_type,"_token":'<?php echo e(csrf_token()); ?>'}
                         ,
                         context: document.body
                         }
                        ).done(function(msg) {

                    $('#description'+op_type).val(msg);
                  }
                              );
                }
              </script>
              <script>
                function remove_content(op_type){
                  $('#testcategory'+op_type).val("").change();
                  $('#testname'+op_type).val("").change();
                  document.getElementById('description'+op_type).value = '';
                 

                }
              </script>
</html>
