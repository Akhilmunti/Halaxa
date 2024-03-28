<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IRS | Create Job Posting
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
                  <?php foreach ($jobseekerpersonaldata as $jsprofilebasic) { ?>
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
                              <th scope="row" class="col-md-4">Nationality
                              </th>
                              <td class="col-md-8">
                                <?php echo $jsprofilebasic->countryname ?>
                              </td>
                            </tr>
                            <tr>
                              <th scope="row" class="col-md-4">Personal Brief
                              </th>
                              <td class="col-md-8">
                                <?php echo $jsprofilebasic->about ?> 
                              </td>
                            </tr>
                            <tr>
                              <th scope="row" class="col-md-4">Website/Link
                              </th>
                              <td class="col-md-8">
                                <?php echo $jsprofilebasic->website ?> 
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
                              <th scope="row" class="col-md-4">Current Address
                              </th>
                              <td class="col-md-8">
                                <?php echo $jsprofilebasic->permanent_address ?>
                              </td>
                            </tr>
                            <tr>
                              <th scope="row" class="col-md-4">Show to employer Only
                              </th>
                              <td class="col-md-8">
                                <?php if($jsprofilebasic->show_to_employer==0){ echo 'No'; } else { echo 'Yes'; } ?> 
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
                            <tr>
                              <th scope="row" class="col-md-4">Country
                              </th>
                              <td class="col-md-8">
                                <?php foreach ($Country as $countrydata) {
                                  if($countrydata->location_id==$jsqualifications->country){
                                    echo $countrydata->name;
                                  }
                                } ?>
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
                              <tr>
                                <th scope="row" class="col-md-4">Stream
                              </th>
                              <td class="col-md-8"><?php echo $jsqualifications->specialization ?></td>
                            </tr>
                            <tr>
                              <th scope="row" class="col-md-4">Country
                              </th>
                              <td class="col-md-8">
                               <?php echo $jsqualifications->city;
                                    ?>
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
                <?php foreach ($js_experience as $js_experiences) {   ?>
                  <div class="row"><div class="col-md-6">
                    <div class="panel-body"><h4><?php echo $js_experiences->companyname; ?></h4></div></div></div>
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
                              <?php if($js_experiences->package == 786){
                                                   $annualpkg = 'Less than 5000';
                                                  }else if($js_experiences->package == 10000000){
                                                  $annualpkg = '100,000 & above';
                                                  }
                                                  else{
                                                  $annualpkg = number_format($js_experiences->package);
                                                  }
                                              echo $annualpkg; ?>
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
                            <th scope="row" class="col-md-4">Role Description and Achievements
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
                <div class="col-md-1 pull-right">
                      <button class="btn btn-success btn-sm pull-right"   onClick="openjseditprojectdetailmodel('<?php echo $jsprojects->id ?>');"   data-toggle="modal" data-target="#edit_project_div" type="button"  title="Edit Project Detail" style="margin-top:5px;"><i class="glyphicon glyphicon-edit "></i> </a></button>
                </div>
              </div>
              <?php } ?>
            </div>
            <!-- Project Details Table container End-->

            <!-- Certificate Details Table Container Start  -->
             <div class="card wizard-card" data-color="orange" id="wizardProfile"> 
              <div class="row">
                <div class="profile_title head after-add-certificate">
                  <div class="col-md-6">
                    <h2>
                      <i class="fa fa-file-photo-o">
                      </i> Certificate Details
                    </h2>
                  </div>
                  <div class="col-md-6 pull-right">
                    <button class="btn btn-success btn-sm pull-right"  data-toggle="modal" data-target=".bs-example-modal-Certificate" type="button"  title="Add Certificate" style="margin-top:5px;">
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
              <?php foreach ($js_certificates as $jscertificates) { ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="panel-body">
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <th scope="" class="col-md-4">
                            Certificate Name
                          </th>
                          <td class="col-md-8">
                            <?php echo $jscertificates->certificate_name ?> 
                          </td>
                        </tr>
                        <tr>
                          <th scope="" class="col-md-4">Certification Authority 
                          </th>
                          <td class="col-md-8">
                            <?php echo $jscertificates->certificate_authority ?> 
                          </td>
                        </tr>
                        <tr>
                          <th scope="" class="col-md-4">From Date
                          </th>
                          <td class="col-md-8">
                            <?php echo $jscertificates->fromdate ?>
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
                          <th scope="" class="col-md-4">License No.
                          </th>
                          <td class="col-md-8">
                            <?php echo $jscertificates->license_no ?>
                          </td>
                        </tr>
                        <tr>
                          <th scope="" class="col-md-4">Certification URL
                          </th>
                          <td class="col-md-8">
                            <?php echo $jscertificates->certificate_url ?>
                          </td>
                        </tr>
                        <tr>
                          <th scope="" class="col-md-4">To Date
                          </th>
                          <td class="col-md-8">
                            <?php echo $jscertificates->todate ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-1 pull-right">
                      <button class="btn btn-success btn-sm pull-right"   onClick="openjseditCertificatedetailmodel('<?php echo $jscertificates->id ?>');"   data-toggle="modal" data-target="#edit_Certificate_div" type="button"  title="Edit Certificate Detail" style="margin-top:5px;"><i class="glyphicon glyphicon-edit "></i> </a></button>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>  
      </div>
    </div>
    </div>
  </div>
<!-- Personal Details Modal -->
<div class="card wizard-card" id="wizardProfile">
  <form action="<?php echo url('/home/editjobseekerpersonalprofile'); ?>" method="post" id="personaldetail">
    <div class="modal fade bs-example-modal-Profile">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×
              </span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Personal Details
            </h4>
          </div>
          <div class="modal-body">   
            <?php foreach ($jobseekerpersonaldata as $jsprofilebasic) { ?>  
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  <label for="">Name 
                    <span class="requerd">* 
                    </span>
                  </label>
                  <input type="text" class="form-control"  name="name" id="name" placeholder="Name" value="<?php echo $jsprofilebasic->name ?>" required>
                  <div id="name-error">
                  </div>
                </div> 
                <div class="form-group">
                <label for="">Marital Status 
                  <span class="requerd">* 
                  </span>
                </label>
                <select class="form-control select2" style="width:100%" name="marital" id="marital" required>
                  <option value="" >Select Maritial Status</option>
                  <option value="M" <?php if($jsprofilebasic->marital_status=="M"){ echo 'selected'; } ?>>Married</option> 
                  <option value="S" <?php if($jsprofilebasic->marital_status=="S"){ echo 'selected'; } ?>>Single</option></select>
                  <div id="phone-error">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Email 
                    <span class="requerd">* 
                    </span>
                  </label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $jsprofilebasic->email ?>" required readonly>
                  <div id="email-error">
                  </div>
                </div> 
                <div class="form-group">
                  <label for="">DOB 
                    <span class="requerd">* 
                    </span>
                  </label>
                  <input class="form-control" id="date" value="<?php echo explode(' ',$jsprofilebasic->dob)[0] ?>" name="DOB" placeholder="MM/DD/YYYY" required/>
                  <div id="date-error">
                  </div>
                </div>
              </div>
              <div class="col-md-1">
              </div>
              <div class="form-group col-md-2">
                  <div class="panel-body" align="center">
                     <div class="picture-container">
                        <div class="picture">
                          <div id="wizardPicturePreview">
                            <?php if(strlen($jsprofilebasic->logo) > 0){ ?>
                              <input type='hidden'  name ='js_photo' value='<?php echo $jsprofilebasic->logo; ?>' >
                            <?php } ?>
                            <img src="<?php echo url('/'); ?>/storage/app/public/jobseeker/<?php if(strlen($jsprofilebasic->logo) > 0){echo $jsprofilebasic->logo; } else {  }  ?>"  class="picture-src" id="wizardPicturePreview" title=""/>
                          </div>
                            <input type="file" name="employer_logo" id="employer_logo" accept=".jpg,.JPG,.JPEG,.PNG,.jpeg,.png" >


                    <h2>Profile Picture
                    </h2>
                  </div>
                </div>      
              </div>
              <div class=" col-md-2">
              </div>
            </div>
          </div>
            <div class="row">
                
              <div class="form-group col-md-4">
                <label for="">Gender 
                  <span class="requerd">* 
                  </span>
                </label>
                <p style="margin-top: 5px;">
                  Male 
                  <input type="radio" class="flat" name="gender" id="genderM" value="M" 
                         <?php if($jsprofilebasic->gender == "M"){ echo "checked"; } ?> required="" data-parsley-multiple="gender" style="position: absolute; opacity: 0;">&nbsp;&nbsp; 
                  Female
                  <input type="radio" class="flat" name="gender" id="genderF" value="F" 
                         <?php if($jsprofilebasic->gender == "F"){ echo "checked"; } ?> data-parsley-multiple="gender" style="position: absolute; opacity: 0;">
                </p>
              </div>
              <div class="form-group col-md-4">
                <label for="country">Nationality 
                  <span class="requerd">* 
                  </span>
                </label>
                <select class="form-control select2" id="country"   name="country" style="width:100%" required>
                  <option value="">Select Nationality
                  </option>
                  <?php foreach ($Country as $Countrydata) { ?>
                  <option value="<?php echo $Countrydata->location_id?>" 
                          <?php if($jsprofilebasic->countryid == $Countrydata->location_id){ echo "selected"; } ?> >
                  <?php echo $Countrydata->name ?>
                  </option>
                <?php } ?>                         
                </select>
              <label id="country-error" class="error" for="country">
              </label>
            </div>
              <div class="form-group col-md-4"> 
              <label for="">Upload your Resume.   </label>   
                <div class="btn btn-default btn-file">
                  <label for=""> &nbsp; 
                  </label>
                  <i class="fa fa-paperclip">
                  </i> Attachment Resume
                  <input type="file" name="attachment_file" id="attachment_file" accept=".doc, .docx, .txt,.pdf" onchange="validate_attachment()">
                </div>
              </div>
               
            </div>

        <div class="row">
        <div class="form-group col-md-9">
          <label for="">Website/Link   </label>
          <input type="text" name="website" class="form-control" value="<?php echo $jsprofilebasic->website; ?>" id="website" onblur="checkURL(this)">
        </div>
        <div class="form-group col-md-3">

          <label for="">View to employer Only   </label>
          <p style="margin-top: 5px;">
          <input type="checkbox" name="ViewStatus" id="ViewStatus" value="1" class="flat" <?php if($jsprofilebasic->show_to_employer==1) echo 'checked'; ?> >
        </p>
        </div>
      </div>
            
      <div class="row">
        <div class="form-group col-md-6">
          <label for="">Personal Brief <span class="requerd">* 
                  </span>
          </label>
          <textarea id="About" name="About" class="form-control" required=""><?php echo $jsprofilebasic->about; ?></textarea>
        </div>
        <div class="form-group col-md-6">
          <label for="">Current Address <span class="requerd">* 
                  </span>
          </label>
          <textarea  id="Address" name="Address" class="form-control" required=""><?php echo $jsprofilebasic->permanent_address; ?></textarea>
        </div>
      </div>
      <?php } ?>
    </div>
    <div class="modal-footer">
      <button type="submit" class='btn btn-primary add-Profile' /> Save
      </button>
    </div>
</div>
</div>
</div>
</form>
</div>
<!-- Personal Details Modal End -->
<!-- Education Details Modal -->
<div class="card wizard-card" id="wizardProfile">
  <form action="addjobseekereducationalprofile" method="post" id="Educationaldetail">
    <div class="modal fade bs-example-modal-Education">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×
              </span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Educational Details
            </h4>
          </div>
          <div class="modal-body">
            <h4>
              <b>Educational Qualifications
              </b>
              <!-- <button class="btn btn-success btn-sm pull-right add-more add-AddEducation"  type="button"  title="Add Education"  id=""><i class="fa  fa-plus-circle"></i></button> -->
            </h4>
            <br/>
            <div class="row">
              <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <div class="form-group  col-md-4">
                <label for="">Education Type 
                  <span class="requerd">* 
                  </span>
                </label>
                <select class="form-control select2" id="type0" name="educationtype" onChange="ShowCourse(0)" style="width:100%" required >
                  <!-- 0 for add and 1 for edit -->
                  <option value="">Select Type
                  </option>
                  <option value="UG">UG
                  </option>
                  <option value="PG">PG
                  </option>
                  <option value="PPG">PPG
                  </option>
                </select>
                <label id="type0-error" class="error" for="type0">
                </label> 
              </div>  
              <div class="form-group col-md-4">
                <label for="">Education Courses 
                  <span class="requerd">* 
                  </span>
                </label>
                <div id="courses0" >
                  <select class="form-control select2" name="courses"  id="courses0" onChange = "ShowStream(0)" style="width:100%" required>
                    <option value="">Select Course
                    </option>         
                  </select>
                </div>
                <label id="courses0-error" class="error" for="courses0">
                </label>
              </div>
              <div class="form-group  col-md-4">
                <label for="">&nbsp; 
                </label>
                 <div id="stream0" >
                  <select class="form-control select2" id="sub0" name="sub" style="width:100%" required>
                      <option value="">Select Stream</option>
                      </select>
                  </div>
                  <label id="sub-error" class="error" for="sub0"></label>
                </label>
              </div> 
            </div> 
            <div class="row after-add-more">
              <div class="form-group col-md-3">
                <label for="">Medium 
                  <span class="requerd">* 
                  </span>
                </label>
                <select class="form-control select2" id="medium0" name="medium" onChange = "removeerrormedium0()"  style="width:100%" required>
                  <option value="">Select Medium
                  </option>
                  <option value="Hindi">Hindi
                  </option>
                  <option value="English">English
                  </option>
                </select>
                <label id="medium0-error" class="error" for="medium0">
                </label>
              </div>
              <div class="form-group col-md-3">
                <label for="">University 
                  <span class="requerd">* 
                  </span>
                </label>
                <input type="text" class="form-control" id="university"  name="university" placeholder="University" required>
              </div>
              
              <div class="form-group col-md-3">
                <label for="">Year From 
                  <span class="requerd">* 
                  </span>
                </label>
                <input class="form-control" id="yearfromaddedu" name="yearfromeducation" placeholder="MM/YYYY" type="text" onChange="removeerroryearformeducation()"   required/>
                <span id="yearfromaddedu-error" class="error" for="yearfromaddedu">
                </span>
              </div>
              <div class=" form-group col-md-3">
                <label for="">Year To 
                  <span class="requerd">* 
                  </span>
                </label>

                <input class="form-control" id="yeartoaddedu" name="yeartoeducation" placeholder="MM/YYYY" type="text" onChange="removeerroryeartoeducation()"   required/>
                <span id="yeartoaddedu-error" class="error" for="yeartoaddedu">
                </span>
              </div>
            </div>
            <div class="row">
                            <div class="form-group col-md-4">
                              <label for="country">Country 
                               
                              </label>
                              <select class="form-control select2" id="CountryAddEdu" name="countryAddEdu" onChange="ShowState('AddEdu');" style="width: 100%;">
                                <option value="">Select Country
                                </option>          
                                <?php foreach ($Country as $user6) { ?>
                                <option value="<?php echo $user6->location_id?>">
                                  <?php echo $user6->name?>
                                </option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group col-offset-md-1 col-md-4">
                              <label for="state">State 
                               
                              </label>
                              <div id="NewStateAddEdu">
                                <select class="form-control select2" id="stateAddEdu" name="stateAddEdu" onChange="ShowCity('AddEdu');"  style="width: 100%;" >
                                </select>
                              </div>
                              <label id="state-error" class="error" for="state">
                              </label>
                            </div>
                            <div class="form-group col-offset-md-1 col-md-4">
                              <label for="City">City 
                                
                              </label>
                              <div id="NewCityAddEdu">
                                <select class="form-control select2" id="cityAddEdu" name="cityAddEdu" style="width: 100%;" >
                                </select>
                              </div>
                              <label id="city-error" class="error" for="city">
                              </label>
                            </div>
                          </div>
          </div>                    
          <div class="modal-footer">
            <button type="submit" class='btn btn-primary add-Education' /> Save
            </button>
        </div>
      </div>
    </div>
    </div>
  </form>
</div>
<!-- Education Details Modal End -->
<!-- Experience Details Modal -->
<div class="card wizard-card" id="wizardProfile">  
  <form action="addjobseekerexperienceprofile" method="post">
    <div class="modal fade bs-example-modal-Experience">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×
              </span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Experience Details
            </h4>
          </div>
          <div class="modal-body">
            <div class="row">
                              <div class="form-group col-md-12">
                                  <label for="">Current Position <span class="requerd">* </span></label>
                                  <input class="form-control" id="companyname"  name="companyname" placeholder="Enter Company Name" type="text" required/>
                              </div> </div> 
            <div class="row">    
              <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">                                      
              <div class="form-group col-md-6">
                <label for="">Current Position 
                  <span class="requerd">* 
                  </span>
                </label>
                <select name="currentposition" id="current_position" name="current_position" class="form-control select2" style="width: 100%;" onChange="removeerrorcurrentposition()" required="">
                  <option value="">Select Position
                  </option>          
                  <?php foreach ($Jobs_seed_data_Current_Position as $user1) { ?>
                  <option value="<?php echo $user1->value?>" name="<?php echo $user1->value?>">
                    <?php echo $user1->value?>
                  </option>
                  <?php } ?>
                </select>
                <label id="current_position-error" class="error" for="current_position">
                </label>
              </div>
              <div class="form-group col-md-6">
                <label for="">Employment Type 
                  <span class="requerd">* 
                  </span>
                </label>
                <select  class="form-control select2" id="emplyment_type"  name="emplyment_type"  style="width: 100%;" onChange="removeerroremplyment_type()" required>
                  <option value="">Select
                  </option>
                  <option value="1">Full Time
                  </option>
                  <option value="2">Part Time
                  </option>
                  <option value="3">Internship
                  </option>
                </select>
                <label id="emplyment_type-error" class="error" for="emplyment_type">
                </label>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">About Company 
                  <span class="requerd">* 
                  </span>
                </label>
                <textarea id="editor3" name="about_company" class="form-control"  required>
                </textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="">Role Description and Achievements
                  <span class="requerd">* 
                  </span>
                </label>
                <textarea id="editor4" name="role_description" class="form-control" required>
                </textarea>
              </div>
            </div>                                                          
            <div class="row">
              
              <div class="form-group col-md-6">
                <label for="">Year from 
                  <span class="requerd">* 
                  </span>
                </label>
                <input class="form-control" id="yearfromaddexp" name="yearfrom" placeholder="MM/YYYY" type="text" onChange="removeerroryearfrom()" required/>
                <span id="yearfromaddexp-error" class="error" for="yearfromaddexp">
                </span>
              </div>
              <div class="form-group col-md-6">
                <label for="">Year to 
                  <span class="requerd">* 
                  </span>
                </label>
                <input class="form-control" id="yeartoaddexp" name="yearto" placeholder="MM/YYYY" type="text" onChange="removeerroryearto()"   required/>
                <span id="yeartoaddexp-error" class="error" for="yeartoaddexp">
                </span>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">Current Package 
                  <span class="requerd">* 
                  </span>
                </label>
                <select  name="current_package"  id="current_package" class="form-control select2" required="" onChange="removeerrorcurrent_package()" style="width: 100%;">
                  <option value="">Select Current Package
                  </option>  
                  <option value='786'
                          <?php /*if(count($jobPrefData)>0){ if($jobPrefData[0]->curr_package==786){ echo "Selected"; } }*/ ?> > Less than 5,000 
                  </option>
                <?php  for($x=5000;$x<=100000;$x=$x+5000){ ?>
                <option value='<?php echo $x ?>' 
                        <?php /*if(count($jobPrefData)>0){ if($jobPrefData[0]->curr_package==$x){ echo "Selected"; } }*/ ?> >
                <?php echo number_format($x) ?>
                </option>
              <?php  } ?>
              <option value='10000000' 
                      <?php /*if(count($jobPrefData)>0){ if($jobPrefData[0]->curr_package==10000000){ echo "Selected"; } }*/ ?> >100,000 & above 
              </option>
            </select>
          <label id="current_package-error" class="error" for="current_package">
            </div>
      <div class="form-group col-md-6">
        <label for="">Key Responsibilities 
          <span class="requerd">* 
          </span>
        </label>
        <input id="tags_2" name="tags_2" type="text"  class=" form-control" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label>Nationality 
          <span class="requerd">* 
          </span>
        </label>
        <select class="form-control select2" id="Nationality" name="Nationality"  data-placeholder="Select a country" style="width: 100%;" onChange="removeerrorNationality()"  required>
          <option value="">Select Nationality</option>
          <?php foreach ($Country as $Countrydata) { ?>
          
          <option value="<?php echo $Countrydata->location_id?>" 
                  <?php /*if($jsprofilebasic->countryid == $Countrydata->location_id){ echo "selected"; }*/ ?> >
          <?php echo $Countrydata->name ?>
          </option>
        <?php } ?> 
        </select>
      <label id="Nationality-error" class="error" for="Nationality">
      </label>
    </div>
    <div class="form-group  col-md-6">
      <label for="">Company location 
        <span class="requerd">* 
        </span>
      </label>
      <input type="text" name="company_location"  id="company_location" class="form-control" placeholder="Company Location" required>
      <label id="company_location-error" class="error" for="company_location">
      </label>
    </div>
    </div>                  
</div>
<div class="modal-footer">
  <button type="submit" class='btn btn-primary add-Experience'> Save
  </button>
</div>
</div>
</div>
</div>
</form>
</div>
<!-- Experience Details Modal End -->
<!-- Project Details Modal -->
<div class="card wizard-card" id="wizardProfile">
  <form action="addjobseekerprojectdetails" method="post" id="projectdetail">
    <div class="modal fade bs-example-modal-Project" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×
              </span>
            </button>
            <h4 class="modal-title" id="">Project Details
            </h4>
          </div>
          <div class="modal-body">
            <div class="row">    
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">                                      
              <div class="form-group col-md-6">
                <label for="">Project Title 
                  <span class="requerd">* 
                  </span>
                </label>
                <input type="text" class="form-control"  name="project_title"   id="project_title" placeholder="Project Title" required>
              </div>
              <div class="form-group col-md-6">
                <label for="">Client Name 
                  <span class="requerd">* 
                  </span>
                </label>
                <input type="text" class="form-control" id="client_name"  name="client_name" placeholder="Clint Name" required>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">Team Size 
                  <span class="requerd">* 
                  </span>
                </label>
                <input type="text" name="team_size"  onkeypress="return isNumberKey(event,this.id)"  id="team_size" class="form-control" placeholder="Team Size" required>
              </div>
              <div class="form-group col-md-6">
                <label for="">Project Loctaion 
                  <span class="requerd">* 
                  </span>
                </label>
                <input type="text" name="project_locat"  id="project_locat" class="form-control" placeholder="Project Loctaion" required>
              </div>  
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">About Project 
                  <span class="requerd">* 
                  </span>
                </label>
                <textarea id="editor5" name="project_abtprjct" class="form-control" required>
                </textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="">Skills Used 
                  <span class="requerd">* 
                  </span>
                </label>
                <textarea id="editor6" name="project_skilsused" class="form-control" required>
                </textarea>
              </div>
            </div>  
            <div class="row">
              <div class="form-group col-md-3">
                <label for="">Duration From
                  <span class="requerd">* 
                  </span>
                </label>
                <input class="form-control" id="yearfromaddpro" name="duration_from" placeholder="MM/YYYY" type="text" onChange="removeerroprojectfrom()"   required/>
                <span id="yearfromaddpro-error" class="error" for="yearfromaddpro">
                </span>
              </div>
              <div class="form-group col-md-3">
                <label for="">Duration To
                  <span class="requerd">* 
                  </span>
                </label>
                <input class="form-control" id="yeartoaddpro" name="duration_to" placeholder="MM/YYYY" type="text" onChange="removeerroprojectto()"   required/>
                <span id="yeartoaddpro-error" class="error" for="yeartoaddpro">
                </span>
              </div>
              <div class="form-group col-md-6">
                <label for="">Role 
                </label> <span class="requerd">* 
                  </span>
                <input type="text" name="role" id="role" class="form-control " placeholder="Role" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class='btn btn-primary add-Project'> Save
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- End -->

<!-- Certificate Details Modal -->
<div class="card wizard-card" id="wizardProfile">
  <form action="addjobseekercertificatedetails" method="post" id="certificatedetail">
    <div class="modal fade bs-example-modal-Certificate" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×
              </span>
            </button>
            <h4 class="modal-title" id="">Certificate Details
            </h4>
          </div>
          <div class="modal-body">
            <div class="row">    
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">                                      
              <div class="form-group col-md-6">
                <label for="">Certificate Name 
                  <span class="requerd">* 
                  </span>
                </label>
                <input type="text" class="form-control"  name="certificate_name"   id="certificate_name" placeholder="Certificate Name " required>
              </div>
              <div class="form-group col-md-6">
                <label for="">Certificate Authorization 
                </label>
                <input type="text" class="form-control" id="certificate_authorization"  name="certificate_authorization" placeholder="Certificate Authorization">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">License No.
                  <span class="requerd">* 
                  </span>
                </label>
                <input type="text" name="license_no"  id="license_no" class="form-control" placeholder="License No." >
              </div>
              <div class="form-group col-md-6">
                <label for="">Certificate URL 
                </label>
                <input type="text" name="certificate_url"  id="certificate_url" class="form-control" placeholder="Certificate URL" >
              </div>  
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">From Date 
                  <span class="requerd">* 
                  </span>
                </label>
                <input class="form-control" id="yearfromaddctf" name="fromdate" placeholder="MM/YYYY" type="text" onChange="removeerroryearfromaddctf()"   required/>
                <span id="yearfromaddctf-error" class="error" for="yearfromaddctf">
                </span>
              </div>
              <div class="form-group col-md-6">
                <label for="">To Date
                  <span class="requerd">* 
                  </span>
                </label>
                <input class="form-control" id="yeartoaddctf" name="todate" placeholder="MM/YYYY" type="text" onChange="removeerroryeartoaddctf()"   required/>
                <span id="yeartoaddctf-error" class="error" for="yeartoaddctf">
                </span>
              </div>
            </div>  
          </div>
          <div class="modal-footer">
            <button type="submit" class='btn btn-primary add-Project'> Save
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<!--  End -->

<!--  div to replace the edit qualification model -->     
         <div class="modal fade bs-example-modal-Edit-Education" id="edit_qualification_div">
         </div>
         <!--  div to replace the edit experiance model -->   
          <div class="modal fade bs-example-modal-Edit-Experiance" id="edit_experience_div">
         </div>
          <!--  div to replace the edit Project model -->   
          <div class="modal fade bs-example-modal-Edit-project" id="edit_project_div">
         </div>
          <!--  div to replace the edit Project model -->   
          <div class="modal fade bs-example-modal-Edit-certificate" id="edit_Certificate_div">
         </div>
<!-- Project Details Modal End-->

<!-- Uplode Img Modal -->

<div id="uploadimageModal" class="modal" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Upload & Crop Image</h4>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-8 text-center">
<div id="image_demo" style="width:350px; margin-top:30px"></div>
</div>
<div class="col-md-4" style="padding-top:30px;">
<br />
<br />
<br/>
<button class="btn btn-success crop_image">Crop & Upload Image</button>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- Uplode Img Modal End-->
@include('layouts.footer')
<!-- ./wrapper -->
@include('layouts.js2')
<script> 
$(document).ready(function(){

$image_crop = $('#image_demo').croppie({
enableExif: true,
viewport: {
width:200,
height:200,
type:'circle' //square
},
boundary:{
width:300,
height:300
}
});

$('#employer_logo').on('change', function(){
var reader = new FileReader();
reader.onload = function (event) {
$image_crop.croppie('bind', {
url: event.target.result
}).then(function(){
console.log('jQuery bind complete');
});
}
reader.readAsDataURL(this.files[0]);
$('#uploadimageModal').modal('show');
});

$('.crop_image').click(function(event){
$image_crop.croppie('result', {
type: 'canvas',
size: 'viewport'
}).then(function(response){
$.ajax({
url:"<?php echo url('/common/uploadJsImg'); ?>",
type: "POST",
data:{"image": response, _token: '{{csrf_token()}}'},
success:function(data)
{
$('#uploadimageModal').modal('hide');
$('#wizardPicturePreview').html(data);
}
});
})
});

}); 
</script>
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
    document.getElementById('yeartoaddexp-error').innerHTML = '';
  }
  function removeerroryearfrom(){
    document.getElementById('yearfromaddexp-error').innerHTML = '';
  }

  function removeerroryeartoeducation(){
    document.getElementById('yeartoaddedu-error').innerHTML = '';
  }
  function removeerroryearformeducation(){
    document.getElementById('yearfromaddedu-error').innerHTML = '';
  }

  function removeerroryearfromaddctf(){
    document.getElementById('yearfromaddctf-error').innerHTML = '';
  }
  function removeerroryeartoaddctf(){
    document.getElementById('yeartoaddctf-error').innerHTML = '';
  }
  function removeerroprojectfrom(){
    document.getElementById('yearfromaddpro-error').innerHTML = '';
  }
  function removeerroprojectto(){
    document.getElementById('yeartoaddpro-error').innerHTML = '';
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
<!-- Educational Details Date Start -->
<script>
var startDate;
var FromEndDate;

// var ToEndDate ;
// ToEndDate.setDate(ToEndDate.getDate()+365);

$('#yearfromaddedu').datepicker({

    minViewMode: 1,
    autoclose: true,
    format: 'mm/yyyy'
})
    .on('changeDate', function(selected){
        startDate = new Date(selected.date.valueOf());
        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
        $('#yeartoaddedu').datepicker('setStartDate', startDate);
    }); 
$('#yeartoaddedu')
    .datepicker({

        minViewMode: 1,
        autoclose: true,
        format: 'mm/yyyy'
    })
    .on('changeDate', function(selected){
        FromEndDate = new Date(selected.date.valueOf());
        FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
        $('#yearfromaddedu').datepicker('setEndDate', FromEndDate);
    });
  

  //Educational Details Date End 
  //Experience Details Date Start

$('#yearfromaddexp').datepicker({

    minViewMode: 1,
    autoclose: true,
    format: 'mm/yyyy'
})
    .on('changeDate', function(selected){
        startDate = new Date(selected.date.valueOf());
        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
        $('#yeartoaddexp').datepicker('setStartDate', startDate);
    }); 
$('#yeartoaddexp')
    .datepicker({

        minViewMode: 1,
        autoclose: true,
        format: 'mm/yyyy'
    })
    .on('changeDate', function(selected){
        FromEndDate = new Date(selected.date.valueOf());
        FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
        $('#yearfromaddexp').datepicker('setEndDate', FromEndDate);
    });

// Experience Details Date End 

 // Project Details Date Start


$('#yearfromaddpro').datepicker({

    minViewMode: 1,
    autoclose: true,
    format: 'mm/yyyy'
})
    .on('changeDate', function(selected){
        startDate = new Date(selected.date.valueOf());
        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
        $('#yeartoaddpro').datepicker('setStartDate', startDate);
    }); 
$('#yeartoaddpro')
    .datepicker({

        minViewMode: 1,
        autoclose: true,
        format: 'mm/yyyy'
    })
    .on('changeDate', function(selected){
        FromEndDate = new Date(selected.date.valueOf());
        FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
        $('#yearfromaddpro').datepicker('setEndDate', FromEndDate);
    });
  // Project Details Date End

 // Certificate Details Date Start 


// var ToEndDate ;
// ToEndDate.setDate(ToEndDate.getDate()+365);

$('#yearfromaddctf').datepicker({

    minViewMode: 1,
    autoclose: true,
    format: 'mm/yyyy'
})
    .on('changeDate', function(selected){
        startDate = new Date(selected.date.valueOf());
        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
        $('#yeartoaddctf').datepicker('setStartDate', startDate);
    }); 
$('#yeartoaddctf')
    .datepicker({

        minViewMode: 1,
        autoclose: true,
        format: 'mm/yyyy'
    })
    .on('changeDate', function(selected){
        FromEndDate = new Date(selected.date.valueOf());
        FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
        $('#yearfromaddctf').datepicker('setEndDate', FromEndDate);
    });
    </script>
  <!-- Certificate Details Date End -->
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
                function ShowState(option){
                  var Country = document.getElementById('Country'+option).value;
                   console.log(Country);
                  $.ajax({
                    type:"post",
                    url: "<?php echo url("/common/showstatewithoption"); ?>",
                    data:{
                    Country:Country,option:option,"_token":'{{csrf_token()}}'}
                         ,
                         context: document.body
                         }
                        ).done(function(msg) {
                    $('#NewState'+option).html(msg);
                  }
                              );
                }
              </script>
              <script>
                function ShowCity(option){
                  var State = document.getElementById('state'+option).value;
                   console.log(State);
                  $.ajax({
                    type:"post",
                    url: "<?php echo url("/common/showcitywithoption"); ?>",
                    data:{
                    State:State,option:option,"_token":'{{csrf_token()}}'}
                         ,
                         context: document.body
                         }
                        ).done(function(msg) {
                    $('#NewCity'+option).html(msg);
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

                function openjseditprojectdetailmodel(projectid){
                  $.ajax({
                    type:"post",
                    url: "<?php echo url("/home/openjseditprojectdetailmodel"); ?>",
                    data:{projectid:projectid,"_token":'{{csrf_token()}}'}
                         ,
                         context: document.body
                         }
                        ).done(function(msg) {
                           $('#edit_project_div').html(msg);
                  });
                }

                function openjseditCertificatedetailmodel(certificateid){
                     $.ajax({
                    type:"post",
                    url: "<?php echo url("/home/openjseditcertificatedetailmodel"); ?>",
                    data:{certificateid:certificateid,"_token":'{{csrf_token()}}'}
                         ,
                         context: document.body
                         }
                        ).done(function(msg) {
                           $('#edit_Certificate_div').html(msg);
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

              <script>
                function checkURL (CompanyVideoUrl) {
                var string = CompanyVideoUrl.value;
                console.log(string);
                if(string.length>0){
                  if (!~string.indexOf("http")) {
                  string = "http://" + string;
                  }
                }
                CompanyVideoUrl.value = string;
                return CompanyVideoUrl
                }
              </script>
</body>
</html>
