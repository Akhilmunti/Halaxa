<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        @include('halaxatheme.css')
        <link rel="stylesheet" href="//cdn.addpipe.com/2.0/pipe.css">
        <script type="text/javascript" src="//cdn.addpipe.com/2.0/pipe.js"></script>
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
                    <div id="error">
                    
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <input type="hidden" id="answer_url" name="answer_url"/>
                                <input type="hidden" id="job_id" name="job_id" value="<?php echo $jobid;?>"/>
                                <input type="hidden" id="candidate_id" name="candidate_id" value="<?php echo $id;?>"/>
                                <input type="hidden" id="question_id" name="question_id" value="<?php echo $vi_list->id;?>"/>
                                <input type="hidden" id="answer_duration" name="answer_duration"/>
                                <div class="theme-card p-3"> 
                                <div class="row pt-3 pl-5 pr-5 pb-3">
                                    <div class="col-md-3">
                                        <h5 class="border-bottom-thick"><b>Job Title : <?php echo $job->jobtitle;?></b></h5>
                                        <hr class="hr-theme-thick">
                                        <h6><b>Interview Summary</b></h6>

                                        <div class="row mt-5">
                                            <div class="col-md-2">
                                                <img class="img-fluid" src="<?php echo url('assets/images/question-mark-icon.png'); ?>" />
                                            </div>
                                            <div class="col-md-9">
                                                <p><b><?php echo count($quetion_list);?> Questions</b></p>
                                                <p class="font-size-11 line-height-fix"><b>to be answered</b></p>
                                            </div>
                                        </div>
                                        <hr class="hr-theme-thick-light">
                                        <?php 
                                        $time = 0;
                                        foreach($quetion_list as $vi){
                                           $time +=  $vi->time;
                                        }
                                        ?>
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
                                        <div class="bg-light-theme-card p-3">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img height="28" src="<?php echo url('assets/images/time-icon.png'); ?>" />
                                                        </div>
                                                        <div class="col-md-10">
                                                            <p class="font-size-11"><b>50 Secs</b></p>
                                                            <p class="font-size-11 line-height-fix"><b>to road question</b></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img height="28" src="<?php echo url('assets/images/sanbox-icon.png'); ?>" />
                                                        </div>
                                                        <div class="col-md-10">
                                                            <p class="font-size-11"><b><?php echo $vi_list->time*60;?> Secs</b></p>
                                                            <p class="font-size-11 line-height-fix"><b>Max answer lenght</b></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="hr-theme">
                                            <?php 
                                            //print_r($vi_list);
                                            /*$questionItem = array();
                                            if(count($vi_list) > 0){
                                                $questionItem = $vi_list[0]; 
                                            }*/
                                            ?>
                                            <p class="font-size-11 mb-3 mt-3">
                                                <b>
                                                    <?php echo $vi_list->question;?>
                                                </b>
                                            </p>

                                            <p class="font-size-11 mb-3">
                                                <b>
                                                    Notes:
                                                </b>
                                            </p>

                                            <p class="font-size-11 mb-3 line-height-fix">
                                                <b>
                                                   <?php echo $vi_list->note;?>
                                                </b>
                                            </p>
                                            <a href="#" class="btn btn-danger" onClick="saveAssesmentTest();">Skip & Proceed <i class="ml-2 fa fa-chevron-right"></i></a>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <piperecorder id="custom-id" pipe-width="100%" pipe-height="250" pipe-qualityurl="avq/360p.xml" pipe-accounthash="9064ea14f3cd6dcf9ec6320331cc8964" pipe-eid="1LlX3a" pipe-mrt="600"></piperecorder>  
                                    </div>
                                </div>
                            </div>
                            </form>
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

        <script>
            $(document).ready(function () {
                $.ajax({
                    type: "GET", //rest Type
                    dataType: 'jsonp', //mispelled
                    url: "https://api.addpipe.com/video/all",
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader("X-PIPE-AUTH", "b9163bd7574c615ab3084577939b4bf2b14d1c05df979731984ba3589e79be1a");
                    },
                    async: false,
                    contentType: "application/json; charset=utf-8",
                    success: function (msg) {
                        console.log(msg);
                        alert(Json.Stringify(msg));
                    },
                    error: function (error) {
                        alert(Json.Stringify(error));
                    }
                });
                
        </script>
        
        <script>
            function startRecording(stream) {
                console.log('Starting...');
                mediaRecorder = new MediaRecorder(stream);
                mediaRecorder.start();
                var url = window.URL || window.webkitURL;
                videoElement.src = url ? url.createObjectURL(stream) : stream;
                videoElement.play();
                mediaRecorder.ondataavailable = function(e) {
                    chunks.push(e.data);
                };
                mediaRecorder.onerror = function(e) {
                    log('Error: ' + e);
                    console.log('Error: ', e);
                };
                mediaRecorder.onstart = function() {
                    log('Started, state = ' + mediaRecorder.state);
                };
                mediaRecorder.onstop = function() {
                    log('Stopped, state = ' + mediaRecorder.state);
                    var blob = new Blob(chunks, {
                        type: "video/webm"
                    });
                    chunks = [];
                    var videoURL = window.URL.createObjectURL(blob);
                    downloadLink.href = videoURL;
                    videoElement.src = videoURL;
                    downloadLink.innerHTML = 'Download video file';
                    var rand = Math.floor((Math.random() * 10000000));
                    var name = "video_" + rand + ".webm";
                    downloadLink.setAttribute("download", name);
                    downloadLink.setAttribute("name", name);
                    alert()
                    log('link, to download = ' + downloadLink);
                };
                mediaRecorder.onwarning = function(e) {
                    log('Warning: ' + e);
                };
            }
    
        </script>
        
        <script>
        PipeSDK.onRecordersInserted = function(){
            accountHash = "9064ea14f3cd6dcf9ec6320331cc8964";
            formFieldId = "answer_url";
            formDurationId = "answer_duration";
            myRecorderObject =  PipeSDK.getRecorderById('custom-id');
            myRecorderObject.onSaveOk = function(recorderId, streamName, streamDuration, cameraName, micName, audioCodec, videoCodec, fileType, videoId, audioOnly, location){
                document.getElementById(formFieldId).value = "https://" + location + "/" + accountHash + "/" + streamName + ".mp4";
                document.getElementById(formDurationId).value = ""+streamDuration;
                //alert("111111111111111111111111111111");
                saveAssesmentTest();
            };
        	myRecorderObject.onVideoUploadSuccess = function(recorderId, filename, filetype, videoId, audioOnly, location){
        		document.getElementById(formFieldId).value = "https://" + location + "/" + accountHash + "/" + filename + ".mp4";
        		//alert("22222222222222222222222222222222222");
            }
            myRecorderObject.onDesktopVideoUploadSuccess = function(recorderId, filename, filetype, videoId, audioOnly, location){
        		document.getElementById(formFieldId).value = "https://" + location + "/" + accountHash + "/" + filename + ".mp4";
        		//alert("33333333333333333333333333333333333");
        	}
        }; 
        
        function saveAssesmentTest(){
                var answerURL = $("#answer_url").val();
                var candidateId = $("#candidate_id").val();
                var jobId = $("#job_id").val();
                var questionId = $("#question_id").val();
                var durationTime = $("#answer_duration").val();
                $.ajax({
                        url: '<?php echo url("/job_seeker/postvianswers"); ?>',
                        type: 'POST',
                        data: {
                            'candidate_id': candidateId,
                            'job_id': jobId,
                            'question_id': questionId,
                            'answer_url': answerURL,
                            'duration': durationTime,
                            '_token': '{{csrf_token()}}'
                        },
                        success: function (msg) {
                            //console.log(data);
                            $('#error').html('<div class="alert alert-success" id="myalertstatus" >Video Interview has been saved successfully!!.</div>');
                            window.location.hash = '#error';
                            $('#myalertstatus').fadeOut(10000);
                            location.href = '<?php echo url(''); ?>'+msg;
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