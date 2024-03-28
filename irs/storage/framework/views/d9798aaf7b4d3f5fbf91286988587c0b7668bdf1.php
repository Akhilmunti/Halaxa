<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    
        <?php echo $__env->make('halaxatheme.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </head>

    <body>
        <!-- Main -->
        <div class="main">

            <div class="header">
                <?php echo $__env->make('halaxatheme.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

            <div class="wrapper">
                <!-- Sidebar  -->
                <nav id="sidebar">
                    <?php echo $__env->make('halaxatheme.jobseeker_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </nav>

                <div id="content-two">
                    <div class="theme-card mb-1">
                        <div class="p-3">
                            <div class="row">
                                    <div class="col-md-10">
                                        <form action="<?php echo url('job_seeker/searchapplyforjob') ?>" method="post">
                                            <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input type="text" class="fontAwesome form-control" id="keyword" name="keyword" placeholder="&#xf002;  Search by title or company" value="<?php if($keyWord){echo $keyWord;}?>">
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" class="fontAwesome form-control autocomplete" id="city" name="city" placeholder="&#xf041;  city or state" value="">
                                                    <input type="hidden" class="fontAwesome form-control" id="req_type" name="req_type" value="basic">
                                                </div>
                                                <div class="col-md-2">
                                                    <a style="padding: 6px" href="#"><button type="submit" class="btn btn-success btn-block">Filter | <i class="fa fa-chevron-down"></i></button></a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-2 text-right" id="asc_div">
                                        <a class="mr-3" href="#"><img height="25" src="<?php echo url('/'); ?>/assets/images/sort-icon.png" id="asc_data_sort"/></a>
                                        <a target="_blank" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img height="25" src="<?php echo url('/'); ?>/assets/images/settings-icon.png" />
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <?php /*<a class="dropdown-item" href="<?php echo url('job_seeker/advanced_search') ?>">Advanced Search</a> */?>
                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#myModal">Advanced Search</a>
                                            <a class="dropdown-item" href="<?php echo url('job_seeker/job_preferences') ?>">Job Preferences</a> 
                                            <div class="dropdown-divider"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2 text-right" style="display:none"; id="desc_div">
                                        <a class="mr-3" href="#"><img height="25" src="<?php echo url('/'); ?>/assets/images/dsc-sort-icon.png" id="dsc_data_sort"/></a>
                                        <a target="_blank" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img height="25" src="<?php echo url('/'); ?>/assets/images/settings-icon.png" />
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <?php /*<a class="dropdown-item" href="<?php echo url('job_seeker/advanced_search') ?>">Advanced Search</a> */ ?>
                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#myModal">Advanced Search</a>
                                            <a class="dropdown-item" href="<?php echo url('job_seeker/job_preferences') ?>">Job Preferences</a> 
                                            <div class="dropdown-divider"></div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                        
                    <div class="inner-fix">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="nav fixed-height-with-scroll" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <?php 
                                    $counter_jobs = 0; 
                                    foreach ($jobs_info as $jobs) {
                                        if($counter_jobs == 0){
                                            $activeInfo = "active no-decoration";
                                        }else{
                                            $activeInfo = "";
                                        }
                                        //echo '<pre>';
                                        //print_r($jobs);
                                    ?>
                                        <a class="nav-link-theme-tab <?php echo $activeInfo;?>" id="v-pills-profile-tab" data-toggle="pill" href="#<?php echo $jobs->id;?>" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <h6 class="jobs-li-officer" style="display:none;"><?php echo $jobs->postedts ?> <span class="ml-2 badge-theme-noradius badge-white">New</span></h6>
                                                <h6 class="jobs-li-officer"><?php echo $jobs->jobtitle ?> <span class="ml-2 badge-theme-noradius badge-white">New</span></h6>
                                                <p class="jobs-li-company mb-1"><?php echo $jobs->company; ?></p>
                                            </div>
                                            <div class="col-md-2">
                                                <img class="img-fluid" src="<?php if(strlen($jobs->path) > 0){echo url('/storage/app/public/employer/'.$jobs->path); } else { echo url('assets/images/user-icon.png'); }  ?>" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="jobs-li-place">
                                                    <?php echo $jobs->brief; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <?php 
                                        $counter_jobs++;
                                    } ?>
                                </div>
                            </div>
                            
                            <div class="col-md-8">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <?php $counter_jobs = 0; foreach ($jobs_info as $jobs) {
                                    if($counter_jobs == 0){
                                        $isEnabled = 'show active';
                                    }else{
                                        $isEnabled = '';
                                    }
                                    ?>
                                        <div class="tab-pane fade <?php echo $isEnabled;?> theme-card-tab" id="<?php echo $jobs->id;?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <div class="job-description">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <img class="img-fluid img-thumbnail" src="<?php if(strlen($jobs->path) > 0){echo url('/storage/app/public/employer/'.$jobs->path); } else { echo url('assets/images/user-icon.png'); }  ?>" />
                                                </div>
                                                <div class="col-md-9">
                                                    <p class="jobs-li-company weight-bold"><?php echo $jobs->company;?></p>
                                                    <p class="jobs-li-place"><i class="fa fa-map-marker mr-2"></i><?php echo $jobs->addline1;?></p>
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
                                                    <p class="jobs-li-company weight-bold"><?php echo $jobs->jobtitle ?></p>
                                                    <p class="jobs-li-place">
                                                        <?php echo $jobs->company;?>
                                                    </p>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <p class="jobs-li-company weight-bold">Role Description</p>
                                                    <p class="jobs-li-place text-justify">
                                                        <?php echo $jobs->description;?>
                                                    </p>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <p class="jobs-li-company weight-bold">Role Requisites </p>
                                                    <p class="jobs-li-place text-justify">
                                                        <?php echo $jobs->keyskills;?>
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
                                                                        <?php echo $jobs->min_years;?> Year's
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
                                                                        <?php echo $jobs->max_years;?> Year's
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
                                                                        <?php 
                                                                        if($jobs->type == 1){
                                                                            echo "Full Time";
                                                                        }else if($jobs->type == 2){
                                                                            echo "Part Time";
                                                                        }else if($jobs->type == 3){
                                                                            echo "Internship";
                                                                        }
                                                                        ?>
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
                                                                        <?php echo $jobs->currency_type;?>
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
                                                                        <?php echo $jobs->pref_min_age;?> Year's 
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
                                                                        <?php echo $jobs->functional_area;?> Corporate Operations Management 
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
                                                                        Associate Director-Operations 
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
                                                                        Associate Director-Operations 
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
                                                                        Lorem Ipsum
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
                                                                        $ <?php echo $jobs->min_salary;?>
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
                                                                        $ <?php echo $jobs->max_salary;?>
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
                                                                       <?php echo $jobs->positioncriteria;?>
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
                                                                        <?php echo $jobs->servicetenure;?>
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
                                                                        <?php echo $jobs->pref_max_age;?> Year/s 
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
                                                                        <?php echo $jobs->rel_max_years;?> Year/s
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
                                                                        <?php echo $jobs->rel_min_years;?> Year/s
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <p class="jobs-li-company weight-bold">Educational Qualifications </p>
                                                    <p class="jobs-li-place text-justify">
                                                        <?php echo $jobs->keyskills;?>                                               
                                                    </p>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <p class="jobs-li-company weight-bold">Company/ Project brief  </p>
                                                    <p class="jobs-li-place text-justify">
                                                        <?php echo $jobs->company;?>                                               
                                                    </p>
                                                </div>
                                                <div class="col-md-12 mt-3 mb-3">
                                                    <p class="jobs-li-company weight-bold">Comments (if a, optional)  </p>
                                                    <p class="jobs-li-place text-justify">
                                                        <?php echo $jobs->comments;?>
                                                    </p>
                                                </div>

                                            </div>
                                            <hr class="hr-theme">
                                            <div class="row">
                                                <form action="action_job" method="post" id="main">
                                                    <div class="col-md-12 text-right">
                                                        <a href="<?php echo url('job_seeker/viewappliedjobdetails/'.$jobs->id) ?>">
                                                            <button type="button" class="btn btn-theme-submit mt-3"><i class="fa fa-check mr-2"></i> One click apply</button>  
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                     <?php $counter_jobs++; 
                                     } ?>
                                </div>
                            </div>
                            
                            <!-- Model Dialog Start here -->
                                <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content-theme">
                                            <div class="modal-header">
                                                <h6>Advanced Search</h6>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="main">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12 mx-auto mt-5">
                                                        <div class="theme-card p-5 job-description">
                                                            <h5 class="text-center">Search</h5>
                                                            <div class="form-group row mt-3">
                                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                                    Keyword
                                                                </label>
                                                                <div class="col-md-8">
                                                                    <input placeholder="Enter Keyword" class="form-control form-rounded" type="text" id="keyword" name="keyword"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mt-3">
                                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                                    Country
                                                                </label>
                                                                <div class="col-md-8">
                                                                    <select required="" class="form-control form-rounded" id="country" name="country" onChange="ShowState()">
                                                                        <option value="">Select Country</option>
                                                                        <?php foreach ($Country as $user6) { ?>
                                                                                <option value="<?php echo $user6->location_id ?>"><?php echo $user6->name ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <i class="fa fa-caret-down"></i>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mt-3">
                                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                                    State
                                                                </label>
                                                                <div class="col-md-8" id="NewState">
                                                                    <select required="" class="form-control form-rounded" id="state" name="state" onChange="ShowCity()">
                                                                        <option value="">Select State</option>
                                                                    </select>
                                                                    <i class="fa fa-caret-down"></i>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mt-3">
                                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                                    City
                                                                </label>
                                                                <div class="col-md-8"  id="NewCity">
                                                                    <select required="" class="form-control form-rounded" id="city" name="city">
                                                                        <option selected="" value="">Select City</option>
                                                                        <option>Title One</option>
                                                                    </select>
                                                                    <i class="fa fa-caret-down"></i>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mt-3">
                                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                                    Experience
                                                                </label>
                                                                <div class="col-md-8">
                                                                    <select required="" name="exp" id="exp"  class="form-control form-rounded">
                                                                        <option selected="" value="">Select Experience</option>
                                                                        <option value="0">0</option>
                                                                            <?php for ($i = 1; $i <= 30; $i++) { ?>
                                                                                <option value="<?php echo $i ?>">
                                                                                    <?php echo $i ?>
                                                                                </option>
                                                                            <?php } ?> 
                                                                    </select>
                                                                    <i class="fa fa-caret-down"></i>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mt-3">
                                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                                    Expected Salary
                                                                </label>
                                                                <div class="col-md-8">
                                                                    <select required="" class="form-control form-rounded" id="Expectedpckg" name="Expectedpckg">
                                                                        <option selected="" value="">Select Expected Salary</option>
                                                                        <option  value='786'> Less than 5,000 </option>
                                                                            <?php  for($x=5000;$x<=100000;$x=$x+5000){ ?>
                                                                                <option  value='<?php echo $x ?>'><?php echo number_format($x) ?></option>
                                                                            <?php  } ?>
                                                                        <option  value='10000000'>100,000 & above </option>
                                                                    </select>
                                                                    <i class="fa fa-caret-down"></i>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 text-right">
                                                                    <button type="submit" class="btn btn-theme-submit mt-3">Search</button>   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- Model Dialog Ends here -->
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- End Main -->

        <?php echo $__env->make('halaxatheme.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
        <script>
            function Ascending_sort(a, b) { 
                return ($(b).text().toUpperCase()) < ($(a).text().toUpperCase()) ? 1 : -1;  
            } 
            $("#asc_data_sort").on("click", function (e) {
                $("#v-pills-tab a").sort(Ascending_sort).appendTo('#v-pills-tab'); 
                $("#asc_div").css("display", "none");
                $("#desc_div").css("display", "block");
            });
            
            function Dscending_sort(a, b) { 
                return ($(b).text().toUpperCase()) > ($(a).text().toUpperCase()) ? 1 : -1;  
            }
            
            $("#dsc_data_sort").on("click", function (e) {
                $("#v-pills-tab a").sort(Dscending_sort).appendTo('#v-pills-tab'); 
                $("#desc_div").css("display", "none");
                $("#asc_div").css("display", "block");
            });
            
              
        </script>
        
         <script>
function ShowState(){
                  //alert("---------------");
                  var Country = document.getElementById('country').value;
              // console.log(vl);
                    $.ajax({
                      type:"post",
                      url: "<?php echo url("/common/showstate"); ?>",
                    data:{Country:Country,"_token":'<?php echo e(csrf_token()); ?>'},
                    context: document.body
                    }).done(function(msg) {
                        //alert(msg);
                    $('#NewState').html(msg);
                    });
              }
             
              
              function ShowCity(){
                  var State = document.getElementById('state').value;
              // console.log(vl);
                    $.ajax({
                      type:"post",
                      url: "<?php echo url("/common/showcity"); ?>",
                    data:{State:State,"_token":'<?php echo e(csrf_token()); ?>'},
                    context: document.body
                    }).done(function(msg) {
                    $('#NewCity').html(msg);
                    });
              }
              </script>
    </body>

</html>