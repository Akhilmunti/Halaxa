<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IRS | Candidate Application</title>
        @include('layouts.css')

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .checked {
                color: orange;
            }
        </style>
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container"> 

                @include('layouts.employer_sidebar')
                @include('layouts.header')

                <div class="right_col" role="main" >
                    <div class="">
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3> Candidate Application</h3>
                                </div>

                                <div class="title_right">
                                    <div class="form-group pull-right top_search">
                                        <div class="input-group">
                                            <ol class="breadcrumb">
                                                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                                                <li class="active">Candidate Application</li>
                                            </ol></div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>


                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Candidate Application </h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">

                                            <table  class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Candidate Name</th>
                                                        <th>Job Opening</th>
                                                        <th>Application Date</th>
                                                        <th>Assessment Test Status</th>
                                                        <th>Video Interview Status</th>
                                                        <th>Status </th>
                                                        <th>Overall Rating</th>
                                                        <th><i class="fa fa-comment"></i></th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <?php
                                                    //echo '<pre>';
                                                    //print_r($CandidateAppliedForJobs);
                                                    if (count($CandidateAppliedForJobs) > 0) {
                                                        ?>
                                                        <?php foreach ($CandidateAppliedForJobs as $CandidateInfo) { ?>
                                                            <tr>
                                                                <td><a style="color: #4285f4;" href="<?php echo url('/employer/job_seeker_profile_view/' . $CandidateInfo->id . '&&jp&&' . $CandidateInfo->jobid); ?>"><b><?php echo $CandidateInfo->name ?></b></a></td>
                                                                <td><?php echo $CandidateInfo->jobtitle ?></td>
                                                                <td><?php
                                                                    $applicationdate = explode(" ", $CandidateInfo->created_at);
                                                                    echo $newFormatapplicationdate = date('d, F Y', strtotime(date($applicationdate[0])));
                                                                    ?></td>
                                                                <td>NA</td>
                                                                <td>NA</td>
                                                                <td>NA</td>
                                                                <td> 
                                                                    <!-- <span class="fa fa-star checked"></span>-->
                                                                    <span class="fa fa-star"></span>
                                                                    <span class="fa fa-star"></span>
                                                                    <span class="fa fa-star"></span>
                                                                    <span class="fa fa-star"></span>
                                                                    <span class="fa fa-star"></span> 
                                                                </td>
                                                                <td><span class="col-lg-2 form-group" data-toggle="tooltip" title="<?php 
                                                                if($CandidateInfo->comments){
                                                                    echo $CandidateInfo->comments;
                                                                }else{ echo "No Comment found!!";} ?>">Comment
</span>
                                                                </td>
                                                                <td> <div class="btn-group">
                                                                        <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">Default <span class="caret"></span>
                                                                        </button>
                                                                        <ul role="menu" class="dropdown-menu">
                                                                            <li><a href="<?php echo url('/employer/job_seeker_profile_view/' . $CandidateInfo->id . '&&jp&&' . $CandidateInfo->jobid); ?>">View Detailed Profile</a>
                                                                            </li>
                                                                            <?php /*
                                                                              <li><a href="<?php echo url('/employer/job_seeker_profile_view/' . $CandidateInfo->id . '&&at&&' . $CandidateInfo->jobid); ?>">Assign Test</a>
                                                                              </li>
                                                                              <li><a href="#">Assign video Interview</a>
                                                                              </li>
                                                                             * 
                                                                             */ ?>
                                                                        </ul>
                                                                    </div></td>
                                                            </tr><?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr class="odd"><td valign="top" colspan="6" class="dataTables_empty">No data available in table</td></tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><?php echo $CandidateAppliedForJobs->links(); ?> 
                            </div>

                        </div>
                    </div>
                </div>
                @include('layouts.footer')       
            </div>
            <!-- ./wrapper -->
    </body>
    @include('layouts.js')

</html>
<script>
    // Not essential functionality - for demonstration purposes only
    $(document).on('change', '[type=radio]', function (e) {
        // Update display of the currently selected value whenever it's changed
        if ($(this).is(':checked')) {
            $('#display_selected').text($(this).val());
        }
    }).ready(function () {
        // Display the initial selected value (should be zero)
        $('input').trigger('change');
    });
</script>
<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip({
            placement: 'top'
        });
    });
</script>
