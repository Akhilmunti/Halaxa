<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('community/partials/header'); ?>

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('community/partials/navbar'); ?>

            <div class="wrapper">
                <!-- Sidebar -->
                <?php $this->load->view('community/partials/sidebar'); ?>

                  <div id="content-two">
                    <div class="theme-card mb-1">
                        <div class="p-3">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="text" class="fontAwesome form-control" name="emailAddress" placeholder="&#xf002;  Search by title or company" value="">
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="fontAwesome form-control" name="emailAddress" placeholder="&#xf041;  city or state" value="">
                                        </div>
                                        <div class="col-md-2">
                                            <a style="padding: 6px" href="#" class="btn btn-success btn-block">Filter | <i class="fa fa-chevron-down"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 text-right">
                                    <a class="mr-3" href="#"><img height="25" src="<?php echo base_url('assets/images/sort-icon.png'); ?>" /></a>
                                    <a href="#"><img height="25" src="<?php echo base_url('assets/images/settings-icon.png'); ?>" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="inner-fix">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="nav" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <?php 
                                    $counter_jobs = 0; 
                                    foreach ($jobs as $job) {
                                        if($counter_jobs == 0){
                                            $activeInfo = "active no-decoration";
                                        }else{
                                            $activeInfo = "";
                                        }
                                    ?>
                                     <a class="nav-link-theme-tab <?php echo $activeInfo;?>" id="v-pills-home-tab" data-toggle="pill" href="#<?php echo $job['id'];?>" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <h6 class="jobs-li-officer"><?php echo $job['jobtitle']; ?> <span class="ml-2 badge-theme-noradius badge-white">New</span></h6>
                                                <p class="jobs-li-company mb-1"><?php echo $job['company']; ?></p>
                                            </div>
                                            <div class="col-md-2">
                                                <img class="img-fluid" src="<?php echo base_url('assets/images/user-icon.png'); ?>" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="jobs-li-place">
                                                    <?php echo $job['brief']; ?>
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
                                    <?php 
                                    $counter_jobs = 0; 
                                    foreach ($jobs as $job) {
                                    if($counter_jobs == 0){
                                        $isEnabled = 'show active';
                                    }else{
                                        $isEnabled = '';
                                    }
                                    ?>
                                    <div class="tab-pane fade <?php echo $isEnabled;?> theme-card-tab" id="<?php echo $job['id'];?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <div class="job-description">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo base_url('assets/images/user-icon.png'); ?>" />
                                                </div>
                                                <div class="col-md-9">
                                                    <p class="jobs-li-company weight-bold"><?php echo $job['company'];?></p>
                                                    <p class="jobs-li-place"><i class="fa fa-map-marker mr-2"></i><?php echo $job['addline1'];?></p>
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
                                                    <p class="jobs-li-company weight-bold"><?php echo $job['jobtitle'];?></p>
                                                    <p class="jobs-li-place">
                                                        <?php echo $job['company'];?>
                                                    </p>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <p class="jobs-li-company weight-bold">Role Description</p>
                                                    <p class="jobs-li-place text-justify">
                                                        <?php echo $job['description'];?>
                                                    </p>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <p class="jobs-li-company weight-bold">Role Requisites </p>
                                                    <p class="jobs-li-place text-justify">
                                                         <?php echo $job['keyskills'];?>
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
                                                                        <?php echo $job['min_years'];?> Year's
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
                                                                        <?php echo $job['max_years'];?> Year's
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
                                                                        if($job['type'] == 1){
                                                                            echo "Full Time";
                                                                        }else if($job['type'] == 2){
                                                                            echo "Part Time";
                                                                        }else if($job['type'] == 3){
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
                                                                        <?php echo $job['currency_type'];?>
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
                                                                        <?php echo $job['pref_min_age'];?> Year's 
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
                                                                        <?php echo $jobs['functional_area'];?> 
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
                                                                        -
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
                                                                        - 
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
                                                                        -
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
                                                                        $ <?php echo $job['min_salary'];?>
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
                                                                        $ <?php echo $job['max_salary'];?>
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
                                                                        <?php echo $job['positioncriteria'];?>
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
                                                                        <?php echo $job['servicetenure'];?>
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
                                                                        <?php echo $job['pref_max_age'];?> Year/s 
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
                                                                       <?php echo $job['rel_max_years'];?> Year/s
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
                                                                        <?php echo $job['rel_min_years'];?> Year/s
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <p class="jobs-li-company weight-bold">Educational Qualifications </p>
                                                    <p class="jobs-li-place text-justify">
                                                        <?php echo $job['keyskills'];?>                                                
                                                    </p>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <p class="jobs-li-company weight-bold">Company/ Project brief  </p>
                                                    <p class="jobs-li-place text-justify">
                                                        <?php echo $job['company'];?>                                               
                                                    </p>
                                                </div>
                                                <div class="col-md-12 mt-3 mb-3">
                                                    <p class="jobs-li-company weight-bold">Comments (if a, optional)  </p>
                                                    <p class="jobs-li-place text-justify">
                                                        <?php echo $job['comments'];?>
                                                    </p>
                                                </div>

                                            </div>
                                            <hr class="hr-theme">
                                            <?php 
                                            if($this->session->userdata('partner_type') != 'school' && $this->session->userdata('partner_type') != 'hotel' && $this->session->userdata('partner_type') != 'association'){ ?>
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <button type="button" class="btn btn-theme-submit mt-3"><i class="fa fa-check mr-2"></i> One click apply</button>   
                                                </div>
                                            </div>
                                           <?php }?>
                                        </div>
                                    </div>

                                    <?php 
                                    $counter_jobs++; 
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         
            </div>
        </div>

        <!-- End Main -->

        <!-- jQuery  -->
        <?php $this->load->view('community/partials/scripts'); ?>

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
                    data:{Country:Country,"_token":'{{csrf_token()}}'},
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
                    data:{State:State,"_token":'{{csrf_token()}}'},
                    context: document.body
                    }).done(function(msg) {
                    $('#NewCity').html(msg);
                    });
              }
              </script>
    </body>

</html>