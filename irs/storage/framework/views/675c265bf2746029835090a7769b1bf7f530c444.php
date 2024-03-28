
<?php 
                                        
                                        
                                        $job = array();
                                        $viDaysLeft = 0;
                                        if(count($js_applied) > 0){
                                            $job = $js_applied[0];
                                            $todayDate = \Carbon\Carbon::now();
                                            if($job->is_vi_enabled == 1){
                                                $expiryDate = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $job->vi_expiry_date);
                                            }else if($job->is_vi_enabled == 2){
                                                $expiryDate = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $job->vi_submitted_date);
                                            }
                                            $viDaysLeft = $todayDate->diffInDays($expiryDate, false);
                                        }
                                        
                                        $atDaysLeft = 0;
                                        if(count($js_applied) > 0){
                                            $job = $js_applied[0];
                                            $todayDate = \Carbon\Carbon::now();
                                            if($job->is_at_enabled == 1){
                                                $expiryDate = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $job->at_expiry_date);
                                            }else if($job->is_at_enabled == 2){
                                                $expiryDate = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $job->vi_submitted_date);
                                            }
                                            $atDaysLeft = $todayDate->diffInDays($expiryDate, false);
                                        }
                                        $daysInfo = "";
                                        ?>
                    <?php 
                    if($job->is_vi_enabled == 1 || $job->is_vi_enabled == 2){
                    $viTime = 0;
                                        foreach($vi_list as $vi){
                                           $viTime +=  $vi->time;
                                        }
                    ?>
                        <div class="modal-header">
                        <h6 class="jobs-li-officer">
                            <?php 
                                if($job->is_vi_enabled == 1 || $job->is_vi_enabled == 2){
                                    echo "Video Interview Details";
                                }
                            ?>
                        </h6>
                    </div>
                    
                    <div class="modal-body" >
                        <div class="row p-4">
                            <div class="col-md-4">
                                <div class="card-bordered">
                                    <div class="row">
                                        <div class="col-md-3 card-bordered-left">
                                            <div>
                                                <img height="40" src="<?php echo url('assets/recruit/images/question-small-icon.png'); ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-9 card-bordered-right">
                                            <h4><?php echo count($vi_list);?> Questions</h4>
                                            <p class="h-info">to be answer by candidate</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-bordered">
                                    <div class="row">
                                        <div class="col-md-3 card-bordered-left">
                                            <div>
                                                <img height="45" src="<?php echo url('assets/recruit/images/time-big-icon.png'); ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-9 card-bordered-right">
                                            <h4><?php echo $viTime;?> Minutes</h4>
                                            <p class="h-info">Total time to answer questions</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-bordered">
                                    <div class="row">
                                        <div class="col-md-3 card-bordered-left">
                                            <div>
                                                <img height="40" src="<?php echo url('assets/recruit/images/days-icon.png'); ?>" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-9 card-bordered-right">
                                            <?php 
                                            if($job->is_vi_enabled == 2){?>
                                                <h4 class="<?php echo $daysInfo;?>"><?php echo abs($viDaysLeft);?> Days</h4>
                                                <p class="h-info <?php echo $daysInfo;?>">days before submitted</p>
                                            <?php }else{
                                                if($viDaysLeft < 0){
                                                    $message = "days before submission date was expired.";
                                                }else if($viDaysLeft == 0){
                                                    $message = "Today is the last date for submission.";
                                                }else{
                                                    $message = "days left for application submisition.";
                                                }
                                                ?>
                                                <h4 class="<?php echo $daysInfo;?>"><?php echo abs($viDaysLeft);?> Days</h4>
                                                <p class="h-info <?php echo $daysInfo;?>"><?php echo $message;?></p>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                   <?php }
                    ?>
                    
                    <?php 
                    if($job->is_at_enabled == 1 || $job->is_at_enabled == 2){
                     $atTime = 0;
                                        foreach($at_list as $at){
                                           $atTime +=  $at->time;
                                        }
                
                    ?>
                        <div class="modal-header">
                        <h6 class="jobs-li-officer">
                            <?php 
                                if($job->is_at_enabled == 1 || $job->is_at_enabled == 2){
                                    echo "Assesment Test Details";
                                }
                            ?>
                        </h6>
                    </div>
                    
                    <div class="modal-body" >
                        <div class="row p-4">
                            <div class="col-md-4">
                                <div class="card-bordered">
                                    <div class="row">
                                        <div class="col-md-3 card-bordered-left">
                                            <div>
                                                <img height="40" src="<?php echo url('assets/recruit/images/question-small-icon.png'); ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-9 card-bordered-right">
                                            <h4><?php echo count($at_list);?> Questions</h4>
                                            <p class="h-info">to be answer by candidate</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-bordered">
                                    <div class="row">
                                        <div class="col-md-3 card-bordered-left">
                                            <div>
                                                <img height="45" src="<?php echo url('assets/recruit/images/time-big-icon.png'); ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-9 card-bordered-right">
                                            <h4><?php echo $atTime;?> Minutes</h4>
                                            <p class="h-info">Total time to answer questions</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-bordered">
                                    <div class="row">
                                        <div class="col-md-3 card-bordered-left">
                                            <div>
                                                <img height="40" src="<?php echo url('assets/recruit/images/days-icon.png'); ?>" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-9 card-bordered-right">
                                            <?php 
                                            if($job->is_at_enabled == 2){?>
                                                <h4 class="<?php echo $daysInfo;?>"><?php echo abs($atDaysLeft);?> Days</h4>
                                                <p class="h-info <?php echo $daysInfo;?>">days before submitted</p>
                                            <?php }else{
                                                if($atDaysLeft < 0){
                                                    $message = "days before submission date was expired.";
                                                }else if($atDaysLeft == 0){
                                                    $message = "Today is the last date for submission.";
                                                }else{
                                                    $message = "days left for application submisition.";
                                                }
                                                ?>
                                                <h4 class="<?php echo $daysInfo;?>"><?php echo abs($atDaysLeft);?> Days</h4>
                                                <p class="h-info <?php echo $daysInfo;?>"><?php echo $message;?></p>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                   <?php }
                    ?>
                    
                      <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    </div>
                        