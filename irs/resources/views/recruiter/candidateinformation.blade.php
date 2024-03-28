<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        @include('recruitertheme.css')
    </head>

    <body>
        <!-- Main -->
        <div class="main">
            <div class="header">
                @include('recruitertheme.header')
            </div>
            <style>
                th {
                    padding: 3px;
                }
            </style>
            <div class="wrapper">
                <!-- Sidebar  -->
                <nav id="sidebar">
                    @include('recruitertheme.recruiter_sidebar')
                </nav>

                <div id="content">
                    <div class="theme-card container-fluid">
                        <div id = 'error'>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row pt-3 pb-3">
                                    <div class="col-md-1">
                                        <img width="15" class="text-vertical" src='<?php echo url('assets/recruit/images/filter-icon.png'); ?>'>
                                        <p class="text-danger text-vertical"><b>Filter : </b></p>
                                    </div>
                                    <div class="col-md-11">
                                        <div class="row">
                                            <div class="col-md-2 no-padding-filter">
                                                <select required="" class="form-control form-control-sm form-control-filter" name="titles">
                                                    <option selected="" value="">Job Vacancy</option>
                                                    <option>Title One</option>
                                                </select>
                                                <i class="fa fa-caret-down" style="color: #EF3753 !important"></i>
                                            </div>
                                            <div class="col-md-2 no-padding-filter">
                                                <select required="" class="form-control form-control-sm form-control-filter" name="titles">
                                                    <option selected="" value="">Assesment Test</option>
                                                    <option>Title One</option>
                                                </select>
                                                <i class="fa fa-caret-down" style="color: #EF3753 !important"></i>
                                            </div>
                                            <div class="col-md-2 no-padding-filter">
                                                <select required="" class="form-control form-control-sm form-control-filter" name="titles">
                                                    <option selected="" value="">Video Interview</option>
                                                    <option>Title One</option>
                                                </select>
                                                <i class="fa fa-caret-down" style="color: #EF3753 !important"></i>
                                            </div>
                                            <div class="col-md-2 no-padding-filter">
                                                <select required="" class="form-control form-control-sm form-control-filter" name="titles">
                                                    <option selected="" value="">Rating</option>
                                                    <option>Title One</option>
                                                </select>
                                                <i class="fa fa-caret-down" style="color: #EF3753 !important"></i>
                                            </div>
                                            <div class="col-md-2 no-padding-filter">
                                                <select required="" class="form-control form-control-sm form-control-filter" name="titles">
                                                    <option selected="" value="">Interview Status</option>
                                                    <option>Title One</option>
                                                </select>
                                                <i class="fa fa-caret-down" style="color: #EF3753 !important"></i>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <a href="#"><b class="font-size-11 p-info">Clear</b></a>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <a href="#" class="btn btn-danger btn-block"><i class="fa fa-check mr-2"></i>Apply</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-filter">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Job Applied</th>
                                            <th><img height="17" src="<?php echo url('assets/recruit/images/time-icon.png'); ?>" /></th>
                                            <th>Status</th>
                                            <th><img height="17" src="<?php echo url('assets/recruit/images/star-icon.png'); ?>" /></th>
                                            <th>Video Interview</th>
                                            <th>Assessment Test</th>
                                            <th>Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        if (count($CandidateAppliedForJobs) > 0) { 
                                            foreach ($CandidateAppliedForJobs as $candidateInfo) {
                                            //echo '<pre>';
                                            //print_r($candidateInfo);
                                            ?>
                                                <tr>
                                                    <td>
                                                        <div class="table-user-name">
                                                            <img height="30" width="30" class="text-vertical rounded-circle" src='<?php echo url('assets/recruit/images/user.png'); ?>'>
                                                            <a href="<?php echo url('/employer/job_seeker_profile_view/' . $candidateInfo->id . '&&jp&&' . $candidateInfo->jobid); ?>" class="text-vertical table-username">
                                                                <b>
                                                                    <?php echo $candidateInfo->name ?>
                                                                </b>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="table-p">
                                                            <?php echo $candidateInfo->jobtitle ?>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="table-p">
                                                            <?php
                                                                $applicationdate = explode(" ", $candidateInfo->created_at);
                                                                echo $newFormatapplicationdate = date('d, F Y', strtotime(date($applicationdate[0])));
                                                            ?>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <?php 
                                                                if($candidateInfo->shortlisted == 0 || $candidateInfo->shortlisted == 1){
                                                                    $enableState = "disabled";
                                                                }else{
                                                                    $enableState = "";
                                                                }
                                                            ?>
                                                            <select onChange="updateApplicationStatus(this.value, '<?php echo $candidateInfo->id;?>', '<?php echo $candidateInfo->jobid;?>');" required="" class="form-control form-control-sm form-control-filter" id="<?php echo "select_".$candidateInfo->jobid;?>" name="<?php echo "select_".$candidateInfo->jobid;?>">
                                                                <option <?php if($candidateInfo->shortlisted == 0){echo ' selected';}?> value="0" disabled>Received</option>
                                                                <option <?php if($candidateInfo->shortlisted == 1){echo ' selected';}?> value="1" disabled>Reviewed</option>
                                                                <option <?php if($candidateInfo->shortlisted == 2){echo ' selected';}?> value="2">Shortlisted</option>
                                                                <option <?php if($candidateInfo->shortlisted == 3){echo ' selected';}?> value="3">Potential</option>
                                                                <option <?php if($candidateInfo->shortlisted == 4){echo ' selected';}?> value="4">Approved</option>
                                                                <option <?php if($candidateInfo->shortlisted == -1){echo ' selected';}?> value="-1">Rejected</option>
                                                            </select>
                                                            <i class="fa fa-caret-down"></i>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="rating mt-2">
                                                            <label>
                                                                <input type="radio" name="<?php echo $candidateInfo->jobid;?>" value="1" onClick="updateRating(this.value, '<?php echo $candidateInfo->id;?>', '<?php echo $candidateInfo->jobid;?>', '<?php echo $candidateInfo->app_comment;?>');" <?php if($candidateInfo->app_rating == 1){echo ' checked';}?>/>
                                                                <span class="icon">★</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="<?php echo $candidateInfo->jobid;?>" value="2" onClick="updateRating(this.value, '<?php echo $candidateInfo->id;?>', '<?php echo $candidateInfo->jobid;?>', '<?php echo $candidateInfo->app_comment;?>');"  <?php if($candidateInfo->app_rating == 2){echo ' checked';}?>/>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="<?php echo $candidateInfo->jobid;?>"  value="3" onClick="updateRating(this.value, '<?php echo $candidateInfo->id;?>', '<?php echo $candidateInfo->jobid;?>', '<?php echo $candidateInfo->app_comment;?>');"  <?php if($candidateInfo->app_rating == 3){echo ' checked';}?>/>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>   
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="<?php echo $candidateInfo->jobid;?>" value="4" onClick="updateRating(this.value, '<?php echo $candidateInfo->id;?>', '<?php echo $candidateInfo->jobid;?>', '<?php echo $candidateInfo->app_comment;?>');"   <?php if($candidateInfo->app_rating == 4){echo ' checked';}?>/>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="<?php echo $candidateInfo->jobid;?>" value="5" onClick="updateRating(this.value, '<?php echo $candidateInfo->id;?>', '<?php echo $candidateInfo->jobid;?>', '<?php echo $candidateInfo->app_comment;?>');"   <?php if($candidateInfo->app_rating == 5){echo ' checked';}?>/>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                                <span class="icon">★</span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="table-p">
                                                            <?php 
                                                                if($candidateInfo->is_vi_enabled == 1){?>
                                                                Assigned
                                                                <?php }else if($candidateInfo->is_vi_enabled == 2){ ?>
                                                                Submitted
                                                                <?php }else{ ?>
                                                                     <a class="no-decoration" href="<?php echo url('/employer/createvideointerview/' . $candidateInfo->id . '&&jp&&' . $candidateInfo->jobid); ?>">Assign Now</a>
                                                                <?php }
                                                            ?>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="table-p">
                                                            <?php 
                                                                if($candidateInfo->is_at_enabled == 1){?>
                                                                Assigned
                                                                <?php }else if($candidateInfo->is_at_enabled == 2){ ?>
                                                                Submitted
                                                                <?php }else{ ?>
                                                                     <a class="no-decoration" href="<?php echo url('/employer/createassesment/' . $candidateInfo->id . '&&jp&&' . $candidateInfo->jobid); ?>">Assign Now</a>
                                                                <?php }
                                                            ?>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <?php if($candidateInfo->app_comment){?>
                                                                <a href="#" class="no-decoration" onClick="updateComment('<?php echo $candidateInfo->app_rating;?>', '<?php echo $candidateInfo->id;?>', '<?php echo $candidateInfo->jobid;?>', '<?php echo $candidateInfo->app_comment;?>');">
                                                                    <img height="15" src="<?php echo url('assets/recruit/images/comment-checked-icon.png'); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $candidateInfo->app_comment;?>"/>
                                                                </a>
                                                            <?php }else{ ?>
                                                                <a href="#" class="no-decoration" onClick="updateComment('<?php echo $candidateInfo->app_rating;?>', '<?php echo $candidateInfo->id;?>', '<?php echo $candidateInfo->jobid;?>', '<?php echo $candidateInfo->app_comment;?>');">
                                                                    <img height="15" src="<?php echo url('assets/recruit/images/comment-icon.png'); ?>" data-toggle="tooltip" data-placement="bottom" title="No Comments!!"/>
                                                                </a>
                                                            <?php }
                                                            ?>
                                                           
                                                            <a href="#" class="ml-3 table-dropdown" data-toggle="dropdown">
                                                                <img height="15" src="<?php echo url('assets/recruit/images/setting-icon.png'); ?>" />
                                                            </a>
                                                            <div class="dropdown-menu table-dropdown-menu pull-left">
                                                                <a class="dropdown-item" href="#">Share</a>
                                                                <a class="dropdown-item" href="#">Generate embed Link</a>
                                                                <a class="dropdown-item" href="{{ url('/employer/clonesavedjobsposting/'.$candidateInfo->jobid.'') }}">Clone</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="#">Deactivate</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } 
                                            } else{ ?>
                                                <tr>
                                                    <td colspan="8">
                                                        <p class="table-p text-theme">
                                                            No Candidates Information found!!
                                                        </p>
                                                    </td>
                                                </tr>
                                       <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- Models Starts -->
                                <div class="modal" id="myModel">
                                    <div class="modal-dialog modal-sm">
                                                                        <div class="modal-content-theme">
                                                                            <input type="hidden" name="candidate_key" id="candidate_key"/>
                                                                            <input type="hidden" name="job_key" id="job_key"/>
                                                                            <!-- Modal body --> 
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <h5><b>Rate</b></h5>
                                                                                    </div>
                                                                                    <div class="col-md-9 text-left">
                                                                                        <div class="rating">
                                                                                            <label>
                                                                                                <input type="radio" name="givestars" id="rate_one" value="1"/>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="givestars" id="rate_two" value="2"/>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="givestars" id="rate_three" value="3"/>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>   
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="givestars" id="rate_four" value="4"/>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="givestars" id="rate_five" value="5"/>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-12">
                                                                                        <textarea rows="5" class="form-control" id="app_comment" name="app_comment"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Modal footer -->
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-danger" onClick="postComment();">Save</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                </div>
                            <!-- Models Ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main -->

        @include('recruitertheme.js')
        
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>
        
        <script>
            function postComment(){
                var candidateKey = $('#candidate_key').val();
                var jobKey = $('#job_key').val();
                var commentInfo = $('#app_comment').val();
                var rating = $("input[name='givestars']:checked").val();
                
                updateRating(rating, candidateKey, jobKey, commentInfo);
                $('#myModel').modal('hide');
            }
            
            function updateComment(rating, candidateKey, jobKey, commentInfo){
                $('#candidate_key').val(candidateKey);
                $('#job_key').val(jobKey);
                $('#app_comment').val(commentInfo);
                if(rating == 1){
                    $("#rate_one").attr('checked', 'checked');
                }else if(rating == 2){
                    $("#rate_two").attr('checked', 'checked');
                }else if(rating == 3){
                    $("#rate_three").attr('checked', 'checked');
                }else if(rating == 4){
                    $("#rate_four").attr('checked', 'checked');
                }else if(rating == 5){
                    $("#rate_five").attr('checked', 'checked');
                }
                //givestars
                $('#myModel').modal();
            }
            
            function updateRating(rating, candidateKey, jobKey, commentInfo){
               $.ajax({
                    url: '<?php echo url("/employer/postreview"); ?>',
                    type: 'POST',
                    data: {
                        'candidate_id': candidateKey,
                        'job_id': jobKey,
                        'rating': rating,
                        'review': commentInfo,
                        '_token': '{{csrf_token()}}'
                    },
                    success: function (msg) {
                        //console.log(data);
                        $('#error').html('<div class="alert alert-success" id="myalertstatus" >Overall rating has been updated successfully!!.</div>');
                        window.location.hash = '#error';
                        $('#myalertstatus').fadeOut(10000);
                    },
                    error: function (msg) {
                        //console.log(data);
                        $('#error').html('<div class="alert alert-danger" id="myalertstatus" >Data is Not Valid, Please Insert Valid Data.</div>');
                        window.location.hash = '#error';
                        $('#myalertstatus').fadeOut(10000);
                    }
                });

            }
        </script>
        
        <script>
            function updateApplicationStatus(candidateStatus, candidateKey, jobKey){
                $.ajax({
                    url: '<?php echo url("/employer/poststatues"); ?>',
                    type: 'POST',
                    data: {
                        'candidate_id': candidateKey,
                        'job_id': jobKey,
                        'shortlisted': candidateStatus,
                        '_token': '{{csrf_token()}}'
                    },
                    success: function (msg) {
                        //console.log(data);
                        $('#error').html('<div class="alert alert-success" id="myalertstatus" >Application Status has been updated successfully!!.</div>');
                        window.location.hash = '#error';
                        $('#myalertstatus').fadeOut(10000);
                    },
                    error: function (msg) {
                        //console.log(data);
                        $('#error').html('<div class="alert alert-danger" id="myalertstatus" >Data is Not Valid, Please Insert Valid Data.</div>');
                        window.location.hash = '#error';
                        $('#myalertstatus').fadeOut(10000);
                    }
                });
            }
        </script>
        
        
        
        
    </body>

</html>