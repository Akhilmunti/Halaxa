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
                <?php 
                $job = array();
                if(count($js_applied) > 0){
                    $job = $js_applied[0];
                }
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="theme-card p-3">
                                <div class="row pt-3 pl-5 pr-5 pb-3">
                                    <div class="col-md-4">
                                        <h5 class="border-bottom-thick"><b>Job Title : <?php echo $job->jobtitle;?></b></h5>
                                        <hr class="hr-theme-thick">
                                        <h6><b>Interview Summary</b></h6>

                                        <div class="row mt-5">
                                            <div class="col-md-2">
                                                <img class="img-fluid" src="<?php echo url('assets/images/question-mark-icon.png'); ?>" />
                                            </div>
                                            <div class="col-md-9">
                                                <p><b><?php echo count($vi_list);?> Questions</b></p>
                                                <p class="font-size-11 line-height-fix"><b>to be answered</b></p>
                                            </div>
                                        </div>
                                        <?php 
                                        $time = 0;
                                        foreach($vi_list as $vi){
                                           $time +=  $vi->time;
                                        }
                                        ?>
                                        <hr class="hr-theme-thick-light">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img class="img-fluid" src="<?php echo url('assets/images/time-icon.png'); ?>" />
                                            </div>
                                            <div class="col-md-9">
                                                <p><b><?php echo $time;?> Minutes</b></p>
                                                <p class="font-size-11 line-height-fix"><b>approximate Interview length</b></p>
                                            </div>
                                        </div>
                                        <hr class="hr-theme-thick-light">
                                    </div>
                                    <div class="col-md-5">
                                        <div class="bg-light-theme-card pt-5 pb-5 pr-3 pl-3">
                                            <h6 class="mb-3"><b>Welcome to you video interview</b></h6>
                                            <p class="font-size-11 mb-3">
                                                <b>
                                                    Congratulation on being selected to complete a short video assessment !
                                                </b>
                                            </p>

                                            <p class="font-size-11 mb-3">
                                                <b>
                                                    As part of your application you will be presented with
                                                    questions and notes on screen and will be required to
                                                    respond video answer to each question.
                                                </b>
                                            </p>

                                            <p class="font-size-11 mb-3">
                                                <b>
                                                    Once these are complete, your video will be shared with the
                                                    recuriters to review and they will contact you with followup
                                                    questions or arrange the next stage of the recuritment
                                                    process.
                                                </b>
                                            </p>

                                            <a href="<?php echo url('job_seeker/do_interview/' . $id . '&&jp&&' . $jobid) ?>" class="btn btn-danger">Next Step <i class="ml-2 fa fa-chevron-right"></i></a>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card-theme-bordered">
                                            <div class="card-header-theme-bordered">
                                                <h6><b>Recruiter's Profile</b></h6>
                                            </div>
                                            <div class="card-content-theme-bordered">
                                                <p class="font-size-11"><b><?php echo $job->company;?></b></p>
                                                <p class="font-size-11 line-height-fix"><b><?php //echo $job->countryname;?></b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <footer>
                        <div class="footer">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href="#" class="font-size-11 no-decoration text-theme"><b>Copyrights 2020 Halaxa, All rights reserved</b></a>
                                </div>
                            </div>  
                        </div>
                    </footer>

                </div>
            </div>

        </div>
        <!-- End Main -->

        @include('halaxatheme.js')


    </body>

</html>