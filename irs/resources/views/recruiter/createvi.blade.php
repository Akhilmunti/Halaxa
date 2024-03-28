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
                <?php 
                    $jsprofilebasic = $jsprofile[0];
                    $js_experiences = array();
                    if(count($js_experience) > 0){
                        $js_experiences = $js_experience[0];
                    }
                ?>
                <div id="content-two">
                <div class="theme-card container-fluid">
                    <div id = 'error'>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-1 p-5">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img height="40" width="40" class="text-vertical rounded-circle" src='<?php echo url('assets/recruit/images/user.png'); ?>'>
                                        </div>
                                        <div class="col-md-11">
                                            <a href="#" class="text-vertical text-theme">
                                                <b>
                                                    <?php echo $jsprofilebasic->name ?>
                                                </b>
                                            </a>
                                            <p class="text-info-small">&nbsp; &nbsp;<?php if($js_experiences){ echo $js_experiences->designation." - ".$js_experiences->about_company;}?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 text-right">
                                    <div>
                                        <a href="#" class="table-dropdown" data-toggle="dropdown">
                                            <img height="15" src="<?php echo url('assets/recruit/images/setting-icon.png'); ?>" />
                                        </a>
                                        <div class="dropdown-menu table-dropdown-menu pull-left">
                                            <a class="dropdown-item" href="#">Share</a>
                                            <a class="dropdown-item" href="#">Generate embed Link</a>
                                            <a class="dropdown-item" href="#">Clone</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Deactivate</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php 
                //echo '<pre>';
                //print_r($questionbank);
                //echo count($questionbank);
                ?>
                <div class="container mt-3" id="div_question_selector">
                    <div class="theme-card">
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="p-3"><b>Add Video Interview</b></h6>
                                <hr class="hr-theme">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-right p-3 mb-5">
                                    <a href="#" class="no-decoration" data-toggle="modal" data-target="#myModal">
                                        <img height="20" src="<?php echo url('assets/recruit/images/plus-icon.png'); ?>" />
                                        <span class="ml-2 text-theme font-size-14 no-decoration" id="question_tracker"><b>0/3 questions</b></span>
                                    </a>
                                    <!-- The Modal -->
                                    <div class="modal" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content-theme">

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <table id="questionstable" class="table table-borderless table-filter">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Interview Question</th>
                                                                <th>Max time</th>
                                                                <th>Note</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $serialNo = 1;
                                                            foreach($questionbank as $question){?>
                                                            <tr data-row-num="<?php echo $serialNo;?>">
                                                                <td>
                                                                    <p class="table-p text-theme">
                                                                        <?php echo $serialNo++;?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="table-p text-theme">
                                                                        <input type="hidden" name="question" id="question" value="<?php echo $question['question_content'];?>">
                                                                        <?php echo $question['question_content'];?>	
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="table-p text-theme">
                                                                        <input type="hidden" name="time" id="time" value="<?php echo $question['question_max_time'];?>">
                                                                        <?php echo $question['question_max_time'];?> mins	
                                                                    </p>
                                                                </td> 
                                                                <td>
                                                                    <p class="table-p text-theme">
                                                                        <input type="hidden" name="key_notes" id="key_notes" value="<?php echo $question['question_note'];?>">
                                                                        <?php echo $question['question_note'];?>	
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <a href="#" class="td-link">
                                                                            <img height="20" src="<?php echo url('assets/recruit/images/plus-icon.png'); ?>" />
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php }
                                                            ?>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <table id="selectedQuestions" class="table table-borderless table-filter">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Interview Question</th>
                                            <th>Max time</th>
                                            <th>Note</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="p-3">
                                            <div class="form-group row text-right">
                                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                                    <b>Days to submit test</b>
                                                </label>
                                                <div class="col-md-3">
                                                    <input type="number" class="form-control form-rounded" id="no_of_days_to_submit" name="no_of_days_to_submit" onKeyUp="updateSubmitionDays(this.value);"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div class="p-3">
                                            <a style="border-radius: 3px !important" href="<?php echo url('/'); ?>/employer/candidateinformation" class="btn btn-white">Cancel </a>
                                            <a style="border-radius: 3px !important" href="#" class="btn btn-danger" onClick="proceedToNext();">Next <i class="ml-2 fa fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Test Pagination -->
                
                <div class="container mt-3" style="display:none;" id="div_question_saver">
                    <div class="theme-card">
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="p-3"><b>Add Video Interview</b></h6>
                                <hr class="hr-theme">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="post">
                                    <input type="hidden" name="candidate_id" id="candidate_id" value="<?php echo $id;?>"/>
                                    <input type="hidden" name="job_id" id="job_id" value="<?php echo $jobid;?>"/>
                                    <div class="p-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card-bordered">
                                                    <div class="row">
                                                        <div class="col-md-3 card-bordered-left">
                                                            <div>
                                                                <img height="50" src="<?php echo url('assets/recruit/images/question-small-icon.png'); ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 card-bordered-right">
                                                            <h4 id="no_of_tests">0 Questions</h4>
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
                                                                <img height="55" src="<?php echo url('assets/recruit/images/time-big-icon.png'); ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 card-bordered-right">
                                                            <h4 id="total_time_to_answer">0 Minutes</h4>
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
                                                                <img height="50" src="<?php echo url('assets/recruit/images/days-icon.png'); ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 card-bordered-right">
                                                            <h4 id="days_left_submition">0 Days</h4>
                                                            <p class="h-info">day for application submisition</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <table id="savedQuestions" class="table table-borderless table-filter">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Interview Question</th>
                                                <th>Max time</th>
                                                <th>Note</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
    
                                    <div class="row">
                                        <div class="col-md-6">
    
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <div class="p-3">
                                                <a style="border-radius: 3px !important" href="#" class="btn btn-white" onClick="proceedToBack();">Back </a>
                                                <a style="border-radius: 3px !important" href="#" class="btn btn-danger" onClick="saveAssesmentTest();">Save <i class="ml-2 fa fa-save"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            </div>
        </div>
        <!-- End Main -->

        @include('recruitertheme.js')

        <script>
            function saveAssesmentTest(){
                var noOfDays = $("#no_of_days_to_submit").val();
                var candidateId = $("#candidate_id").val();
                var jobId = $("#job_id").val();
                var arrQuestion = [];
                var arrTime = [];
                var arrNotes = [];
                $('#savedQuestions tr').each(function(index){
                    var questionIs = $(this).find('td input:eq(0)').val();
                    var timeIs = $(this).find('td input:eq(1)').val();
                    var noteIs = $(this).find('td input:eq(2)').val();
                    arrQuestion[index] = questionIs;
                    arrTime[index] = timeIs;
                    arrNotes[index] = noteIs;
                });
                
                $.ajax({
                        url: '<?php echo url("/employer/postonlinetest"); ?>',
                        type: 'POST',
                        data: {
                            'candidate_id': candidateId,
                            'job_id': jobId,
                            'test_type': "2",
                            'no_of_days': noOfDays,
                            'questions': arrQuestion.toString(),
                            'time_allowed': arrTime.toString(),
                            'key_notes': arrNotes.toString(),
                            '_token': '{{csrf_token()}}'
                        },
                        success: function (msg) {
                            //console.log(data);
                            $('#error').html('<div class="alert alert-success" id="myalertstatus" >Assesment Test has been assigned successfully!!.</div>');
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
            
            function updateSubmitionDays(daysLeft){
                $("#days_left_submition").text(daysLeft+" Days");
            }
            
            function proceedToNext(){
                var noOfDays = $("#no_of_days_to_submit").val();
                var noOfTests = $("#no_of_tests").text();
                var timeToAnswer = $("#total_time_to_answer").text();
                if(noOfDays.length == 0 || noOfTests === "0 Questions" || timeToAnswer === "0 Minutes"){
                    $('#error').html('<div class="alert alert-danger" id="myalertstatus" >Data is Not Valid, Please Select Valid Data.</div>');
                    window.location.hash = '#error';
                    $('#myalertstatus').fadeOut(10000);
                }else{
                    $("#days_left_submition").text(noOfDays+" Days");
                    $('#div_question_selector').css('display','none');
                    $('#div_question_saver').css('display','block'); 
                }
            }
            
            function proceedToBack(){
                $('#div_question_selector').css('display','block');
                $('#div_question_saver').css('display','none');
            }
            
            $(document).ready(function () {
//                $('#questionstable tr.select').unbind('click').click(function () {
//                    $('#myModal').modal('toggle');
//                    $(this).clone().appendTo('#selectedQuestions');
//                    return false;
//                });

                $('#questionstable').on('click', "[class*=td-link]", function () {
                    var totalRows = $("#no_of_tests").text();
                    if(totalRows == "3 Questions"){
                        alert("Max 3 Questions can be added!!");
                    }else{
                        var rowNumber = $(this).closest('tr').data('row-num');
                        if ($('#selectedQuestions tr[data-row-num="' + rowNumber + '"]').length) {
                            //if it already exists then remove it
                            if (confirm('Same question added to table already, click yes to remove the same.')) {
                                $('#selectedQuestions tr[data-row-num="' + rowNumber + '"]').remove();
                                $('#myModal').modal('toggle');
                            }
    
                        } else { // else add it
                            $('#myModal').modal('toggle');
                            var $clone = $(this).closest('tr').clone();
                            $clone.find('td:last').remove();
                            $clone.append("<td><a href='#' class='td-link-delete'><img height='20' src='<?php echo url('assets/recruit/images/minus-icon.png'); ?>' /></a></td>");
                            //var row = $(this).closest('tr').clone();
                            $('#selectedQuestions').append($clone);
                        }
                        
                        if ($('#savedQuestions tr[data-row-num="' + rowNumber + '"]').length) {
                            //if it already exists then remove it
                            if (confirm('Same question added to table already, click yes to remove the same.')) {
                                $('#savedQuestions tr[data-row-num="' + rowNumber + '"]').remove();
                                $('#myModal').modal('toggle');
                            }
    
                        } else { // else add it
                            $('#myModal').modal('toggle');
                            var data1 = $(this).find("td input[type='text']").val();
                            var $clone = $(this).closest('tr').clone();
                            $clone.find('td:last').remove();
                            $clone.append("<td><a href='#' class='td-link-delete'><img height='20' src='<?php echo url('assets/recruit/images/minus-icon.png'); ?>' /></a></td>");
                            //var row = $(this).closest('tr').clone();
                            $('#savedQuestions').append($clone);
                        }
                        var timeToAnswer = 0;
                        $('#savedQuestions tr').each(function(){
                            var time = $(this).find('td input:eq(1)').val();
                            if(time === undefined){
                                
                            }else{
                                timeToAnswer = parseInt(timeToAnswer)+parseInt($(this).find('td input:eq(1)').val());
                            }
                        });
                        var rowCount = $('table#savedQuestions tr:last').index() + 1;
                        $("#no_of_tests").text(rowCount+" Questions");
                        $("#total_time_to_answer").text(timeToAnswer+" Minutes");
                        $("#question_tracker").html("<b>"+rowCount+"/3 questions"+"</b>");
                    }
                });
            });
        </script>
    </body>

</html>