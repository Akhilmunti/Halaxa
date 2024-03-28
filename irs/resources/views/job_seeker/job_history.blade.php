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

            <div class="header">
                @include('halaxatheme.header')
            </div>

            <div class="wrapper">
                <!-- Sidebar  -->
                <nav id="sidebar">
                    @include('halaxatheme.jobseeker_sidebar')
                </nav>

                <div id="content-two">
                    <div class="theme-card mb-1">
                        <div class="p-3">
                            <?php /* <div class="row">
                                <div class="col-md-12 text-right" id="asc_div">
                                    <a class="mr-3" href="#"><img height="25" src="<?php echo url('/'); ?>/assets/images/sort-icon.png" id="asc_data_sort" /></a>
                                    <a target="_blank" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img height="25" src="<?php echo url('/'); ?>/assets/images/settings-icon.png" />
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo url('job_seeker/advanced_search') ?>">Search New Job</a>
                                        <div class="dropdown-divider"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right" style="display:none;" id="desc_div">
                                    <a class="mr-3" href="#"><img height="25" src="<?php echo url('/'); ?>/assets/images/dsc-sort-icon.png" id="dsc_data_sort"/></a>
                                    <a target="_blank" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img height="25" src="<?php echo url('/'); ?>/assets/images/settings-icon.png" />
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo url('job_seeker/advanced_search') ?>">Search New Job</a>
                                        <div class="dropdown-divider"></div>
                                    </div>
                                </div>
                            </div> */ ?>
                        </div>
                    </div>

                    <div class="inner-fix">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-unstyled" id="job_container">
                                    <?php
                                    foreach ($Applied_job_response as $appliedjobs) {
                                        //echo '<pre>';
                                        //print_r($appliedjobs);
                                        //echo "Yeah I'm in staging server!!";
                                        ?>
                                            <li class="mb-1 theme-card p-3">
                                            <div class="jobs-list">
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <a class="mr-3" href="#">
                                                            <img class="img-fluid" src="<?php echo url('/'); ?>/assets/images/user-icon.png" />
                                                        </a>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <a class="jobs-li-officer" href="<?php echo url('job_seeker/viewappliedjobdetails/' . $appliedjobs->id) ?>" target="_blank"><h6 class="jobs-li-officer"><?php echo $appliedjobs->jobtitle ?></h6></a>
                                                        <p class="jobs-li-company"><?php echo ucwords($appliedjobs->company) ?></p>
                                                        <p class="jobs-li-place"><?php
                                                            $ContactdetailArray = json_decode($appliedjobs->contact_details, true);
                                                            echo ucwords($ContactdetailArray['name'])
                                                            ?> | Posted on <?php
                                                            $posted = explode(" ", $appliedjobs->postedts);
                                                            echo $newDateFormat2 = date('d F Y', strtotime(date($posted[0])));
                                                            ?>
                                                        </p>

                                                        <p class="jobs-li-place mt-3">
                                                            <?php
                                                            $todayDate = \Carbon\Carbon::now();
                                                            $expiryDate = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $appliedjobs->application_created_date);
                                                            $isExpired = $todayDate->diffInDays($expiryDate);
                                                            if ($isExpired > 0) {
                                                                echo 'No longer accepting application';
                                                            } else {
                                                                echo 'Still accepting applications';
                                                            }
                                                            ?>
                                                        </p>
                                                        <p class="jobs-li-place"><b>Applied</b> <?php
                                                            $applicationdate = explode(" ", $appliedjobs->application_created_date);
                                                            echo $newformatedapplicationdate = date('d F Y', strtotime(date($applicationdate[0])));
                                                            ?></p>
                                                    </div>
                                                    <div class="col-md-1 text-right">
                                                        <a target="_blank" class="no-decoration settings-icon-li" href="#" id="navbarAction" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarAction">
                                                            <a class="dropdown-item" href="<?php echo url('job_seeker/viewappliedjobdetails/' . $appliedjobs->id) ?>" target="_blank">View Details</a>
                                                            <div class="dropdown-divider"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="jobs-li-action-text">
                                                            <p class="text-success font-size-11">
                                                                <?php if ($appliedjobs->is_vi_enabled == 1 || $appliedjobs->is_at_enabled == 1) {
                                                                   echo "! action required";
                                                                } else if ($appliedjobs->is_vi_enabled == 2 || $appliedjobs->is_at_enabled == 2) {
                                                                   echo "! action submitted";
                                                                }else{
                                                                    //echo "! No actions";
                                                                }?>
                                                                
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="hr-theme">
                                                <div class="row">
                                                    <?php
                                                        if ($appliedjobs->is_at_enabled == 1) {
                                                            $posted = explode(" ", $appliedjobs->at_expiry_date);
                                                            $submitted = explode(" ", $appliedjobs->vi_submitted_date);
                                                        }

                                                        if ($appliedjobs->is_vi_enabled == 1) {
                                                            $posted = explode(" ", $appliedjobs->vi_expiry_date);
                                                            $submitted = explode(" ", $appliedjobs->vi_submitted_date);
                                                        }
                                                        
                                                        if ($appliedjobs->is_at_enabled == 2) {
                                                            $submitted = explode(" ", $appliedjobs->vi_submitted_date);
                                                        }

                                                        if ($appliedjobs->is_vi_enabled == 2) {
                                                            $submitted = explode(" ", $appliedjobs->vi_submitted_date);
                                                        }
                                                        
                                                        
                                                        ?>
                                                    <div class="col-md-10">
                                                        <span class="badge-outline badge-outline-warning text-warning">Deadline 
                                                            <?php
                                                                echo $newDateFormat2 = date('d F Y', strtotime(date($posted[0])));
                                                            ?>
                                                        </span>
                                                        <p class="jobs-li-place mt-2 text-warning">
                                                            <b> <?php echo ucwords($appliedjobs->company) ?> has asked you to do an Assesment Test. press on ,,?,, fpr more information</b>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-2 text-right pt-3">
                                                            <span class="fa fa-question-circle-o" onClick="viewTestDetails('<?php echo $appliedjobs->applicantid . '&&jp&&' . $appliedjobs->jobid;?>');"></span>
                                                        
                                                        <?php if ($appliedjobs->is_at_enabled == 1) { ?>
                                                            <a href="<?php echo url('job_seeker/assesment_test/' . $appliedjobs->applicantid . '&&jp&&' . $appliedjobs->jobid) ?>" class="btn btn-success">Assessment test</a>
                                                        <?php }
                                                        ?>
                                                        <?php if ($appliedjobs->is_at_enabled == 2) { ?>
                                                            <a href="#" class="btn btn-success">View Results</a>
                                                        <?php }
                                                        ?>
                                                        <?php if ($appliedjobs->is_vi_enabled == 1) { ?>
                                                            <a href="<?php echo url('job_seeker/video_interview/' . $appliedjobs->applicantid . '&&jp&&' . $appliedjobs->jobid) ?>" class="btn btn-success">Video Interview</a>
                                                        <?php }
                                                        ?>
                                                        <?php if ($appliedjobs->is_vi_enabled == 2) { ?>
                                                            <a href="#" class="btn btn-success">View Results</a>
                                                        <?php }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <?php /*
                                      <li class="mb-1 theme-card p-3">
                                      <div class="jobs-list">
                                      <div class="row">
                                      <div class="col-md-1">
                                      <a class="mr-3" href="#">
                                      <img class="img-fluid" src="<?php echo url('/'); ?>/assets/images/user-icon.png" />
                                      </a>
                                      </div>
                                      <div class="col-md-10">
                                      <h6 class="jobs-li-officer">Marketing Officer</h6>
                                      <p class="jobs-li-company">Al-Hajery & Sons Ltd. Company</p>
                                      <p class="jobs-li-place">Kuwait | Posted on 9 March 2020</p>

                                      <p class="jobs-li-place mt-3">No longer accepting application</p>
                                      <p class="jobs-li-place"><b>Applied</b> 5th april 2020</p>
                                      </div>
                                      <div class="col-md-1 text-right">
                                      <a class="no-decoration settings-icon-li" href="#">
                                      <i class="fa fa-ellipsis-v"></i>
                                      </a>
                                      </div>
                                      </div>
                                      <div class="row">
                                      <div class="col-md-12">
                                      <div class="jobs-li-action-text">
                                      <p class="text-danger font-size-11">! action required</p>
                                      </div>
                                      </div>
                                      </div>
                                      <hr class="hr-theme">
                                      <div class="row">
                                      <div class="col-md-10">
                                      <span class="badge-outline badge-outline-danger text-danger">Deadline 20 march 2020</span>
                                      <p class="jobs-li-place mt-2 text-danger">
                                      <b> Al-Hajery & Sons Ltd. Company has asked you to do an Assesment Test. press on ,,?,, fpr more information</b>
                                      </p>
                                      </div>
                                      <div class="col-md-2 text-right pt-3">
                                      <span class="fa fa-question-circle-o"></span>
                                      <a href="#" class="btn btn-danger">Assessment test</a>
                                      </div>
                                      </div>
                                      </div>
                                      </li>

                                      <?php */ ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Main -->
        
        
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content-theme" id="div_test_info">

                    

                    <!-- Modal body -->
                    
                    

                </div>
            </div>
        </div>

        <!-- Model Ends -->
        @include('halaxatheme.js')

        <script>
            function viewTestDetails (jobId){
                 //console.log(vl);
                $.ajax({
                    type:"post",
                    url: "<?php echo url("/job_seeker/viewtestinfo/"); ?>",
                    data:{
                        id:jobId,
                        "_token":'{{csrf_token()}}'},
                        context: document.body
                    }).done(function(msg) {
                        $('#div_test_info').html(msg);
                        $('#myModal').modal('show');
                    });
            }
            function Ascending_sort(a, b) {
                return ($(b).text().toUpperCase()) < ($(a).text().toUpperCase()) ? 1 : -1;
            }
            $("#asc_data_sort").on("click", function (e) {
                $("#job_container li").sort(Ascending_sort).appendTo('#job_container');
                $("#asc_div").css("display", "none");
                $("#desc_div").css("display", "block");
            });

            function Dscending_sort(a, b) {
                return ($(b).text().toUpperCase()) > ($(a).text().toUpperCase()) ? 1 : -1;
            }

            $("#dsc_data_sort").on("click", function (e) {
                $("#job_container li").sort(Dscending_sort).appendTo('#job_container');
                $("#desc_div").css("display", "none");
                $("#asc_div").css("display", "block");
            });

        </script>

    </body>

</html>