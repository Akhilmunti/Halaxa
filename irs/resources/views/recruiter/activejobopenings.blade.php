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
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="theme-header-text">Job List</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row pt-3 pb-3">
                                    <div class="col-md-1">
                                        <img width="15" class="text-vertical" src='<?php echo url('assets/recruit/images/filter-icon.png'); ?>'>
                                        <p class="text-danger text-vertical"><b>Filter : </b></p>
                                    </div>
                                    <div class="col-md-11">
                                        <div class="row">
                                            <div class="col-md-3 no-padding-filter">
                                                <select required="" class="form-control form-control-sm form-control-filter" name="titles">
                                                    <option selected="" value="">Job Vacancy</option>
                                                    <option>Title One</option>
                                                </select>
                                                <i class="fa fa-search" style="color: #EF3753 !important"></i>
                                            </div>
                                            <div class="col-md-2 no-padding-filter">
                                                <select required="" class="form-control form-control-sm form-control-filter" name="titles">
                                                    <option selected="" value="">Posted by</option>
                                                    <option>Title One</option>
                                                </select>
                                                <i class="fa fa-caret-down" style="color: #EF3753 !important"></i>
                                            </div>
                                            <div class="col-md-2 no-padding-filter">
                                                <select required="" class="form-control form-control-sm form-control-filter" name="titles">
                                                    <option selected="" value="">Job Status</option>
                                                    <option>Title One</option>
                                                </select>
                                                <i class="fa fa-caret-down" style="color: #EF3753 !important"></i>
                                            </div>
                                            <div class="col-md-2 offset-3">
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
                                            <th>Title</th>
                                            <th>#Applied</th>
                                            <th>Posted By</th>
                                            <th>Posted Date</th>
                                            <th>Expiry Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (count($Activejobsdata) > 0) {
                                            foreach ($Activejobsdata as $jobInfo) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="table-user-name">
                                                            <a href="<?php echo url('/'); ?>/employer/viewappliedjobdetails/<?php echo $jobInfo->id;?>" class="text-vertical table-username">
                                                                <b>
                                                                    <?php echo $jobInfo->jobtitle ?>
                                                                </b>
                                                            </a>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <p class="table-p text-theme">
                                                            <?php if($Totalapplicantcount[$jobInfo->id] > 0){?>
                                                                <a class="text-vertical table-username" href="<?php echo url('/'); ?>/employer/jobApplicants/<?php echo $jobInfo->id;?>">
                                                                    <?php echo $Totalapplicantcount[$jobInfo->id]; ?>
                                                                </a>
                                                            <?php }else{ ?>
                                                                <a class="text-vertical table-username" href="#">
                                                                    <?php echo $Totalapplicantcount[$jobInfo->id]; ?>
                                                                </a>
                                                            <?php }?>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="table-p text-theme">
                                                            <?php echo $jobInfo->company ?>
                                                        </p>
                                                    </td>
                                                    <td>

                                                        <p class="table-p text-theme">
                                                            <?php
                                                            $createddate = explode(" ", $jobInfo->created_at);
                                                            echo $createddate = date('d M. Y', strtotime(date($createddate[0])));
                                                            ?>
                                                        </p>
                                                    </td>
                                                    <td>

                                                        <p class="table-p text-theme">
                                                            <?php
                                                            $createddate = explode(" ", $jobInfo->expiryts);
                                                            echo $createddate = date('d M. Y', strtotime(date($createddate[0])));
                                                            ?>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <a href="#" class="table-dropdown" data-toggle="dropdown">
                                                                <img height="15" src="<?php echo url('assets/recruit/images/setting-icon.png'); ?>" />
                                                            </a>
                                                            <div class="dropdown-menu table-dropdown-menu pull-left">
                                                                <a class="dropdown-item" href="#">Share</a>
                                                                <a class="dropdown-item" href="#">Generate embed Link</a>
                                                                <a class="dropdown-item" href="{{ url('/employer/clonesavedjobsposting/'.$jobInfo->id.'') }}">Clone</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="#" onClick="deactivate_jobs('<?php echo $jobInfo->id ?>', '<?php echo $jobInfo->jobtitle ?>')">Deactivate</a>
                                                                <a class="dropdown-item" href="#" onClick="delete_jobs('<?php echo $jobInfo->id ?>', '<?php echo $jobInfo->jobtitle ?>')" >Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="6">
                                                    <p class="table-p text-theme">
                                                        No Active jobs found!!
                                                    </p>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Model Dialogs starts -->

            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" id="delete_model">
                <div class="modal-dialog modal-sm">
                    <form action="<?php echo url('/employer/deleteactivejobsposting') ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Confirmation</h4>
                            </div>
                            <div class="modal-body">
                                <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <h4>Do You Want to Delete "<lable id="jobtitlefordelete"></lable>" Job ?</h4>
                                <input type="hidden" name="jobid" value="" id="jobidindelete">
                            </div>
                            <div class="modal-footer">
                                <a href="<?php echo url('employer/activejobopening') ?>"><button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"> No</i></button></a>
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"> Yes</i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 

            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" id="deactivate_model">
                <div class="modal-dialog modal-sm">
                    <form action="<?php echo url('/employer/deactivatedsavedjobsposting') ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Confirmation</h4>
                            </div>
                            <div class="modal-body">
                                <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <h4>Do You Want to Deactivate "<lable id="jobtitle_deactivate"></lable>" Job ?</h4>
                                <input type="hidden" name="jobid" value="" id="jobid_deactivate">
                            </div>
                            <div class="modal-footer">
                                <a href="<?php echo url('employer/activejobopening') ?>"><button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"> No</i></button></a>
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"> Yes</i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
            <!-- Model Dialogs ends -->

        </div>
        <!-- End Main -->

        @include('recruitertheme.js')

        <script>
            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()
            })
        </script>
        <script>
            function  delete_jobs(jobidvalue, jobtitlevalue) {
                console.log(jobidvalue);
                document.getElementById("jobidindelete").value = jobidvalue;
                document.getElementById("jobtitlefordelete").innerHTML = jobtitlevalue;
                $('#delete_model').modal('show');
            }
        </script>
        <script>
            function deactivate_jobs(jobidvalue, jobtitlevalue) {
                console.log(jobidvalue);
                document.getElementById("jobid_deactivate").value = jobidvalue;
                document.getElementById("jobtitle_deactivate").innerHTML = jobtitlevalue;
                $('#deactivate_model').modal('show');
            }
        </script>
        <script>
            function ShowState() {
                var Country = document.getElementById('country').value;
                // console.log(vl);
                $.ajax({
                    type: "post",
                    url: "<?php echo url("/common/showstateforsearch"); ?>",
                    data: {Country: Country, "_token": '{{csrf_token()}}'},
                    context: document.body
                }).done(function (msg) {
                    $('#NewState').html(msg);
                });
            }
        </script>
        <script>
            function ShowCity() {
                var State = document.getElementById('state').value;
                // console.log(vl);
                $.ajax({
                    type: "post",
                    url: "<?php echo url("/common/showcityforsearch"); ?>",
                    data: {State: State, "_token": '{{csrf_token()}}'},
                    context: document.body
                }).done(function (msg) {
                    $('#NewCity').html(msg);
                });
            }
        </script>

        <script>
            function ChangeCurrency() {
                var currencytype = document.getElementById('Currency').value;
                console.log('currencytype: ' + currencytype);
                $(".exptdpckg").remove();
                if (currencytype == 'USD') {
                    var option = "<option class='exptdpckg' value='786'> Less than 5,000 </option>"
                    document.getElementById('Expectedpckg').innerHTML += option;
                    for (var x = 5000; x <= 100000; x = x + 5000) {
                        var option = "<option class='exptdpckg' value='" + x + "'> " + x.toLocaleString() + "</option>"
                        document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    var option = "<option class='exptdpckg' value='10000000'>  100,000 & above </option>"
                    document.getElementById('Expectedpckg').innerHTML += option;
                } else if (currencytype == 'INR') {
                    var option = "<option class='exptdpckg' value='12477'> Less than 50,000 </option>"
                    document.getElementById('Expectedpckg').innerHTML += option;
                    for (var x = 50000; x <= 100000; x = x + 10000) {
                        var option = "<option class='exptdpckg' value='" + x + "'> " + x.toLocaleString() + "</option>"
                        document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for (var y = 125000; y <= 500000; y = y + 25000) {
                        var option = "<option class='exptdpckg' value='" + y + "'> " + y.toLocaleString() + "</option>"
                        document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for (var z = 550000; z <= 1000000; z = z + 50000) {
                        var option = "<option class='exptdpckg' value='" + z + "'> " + z.toLocaleString() + "</option>"
                        document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for (var p = 1100000; p <= 2000000; p = p + 100000) {
                        var option = "<option class='exptdpckg' value='" + p + "'> " + p.toLocaleString() + "</option>"
                        document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for (var q = 2250000; q <= 4000000; q = q + 250000) {
                        var option = "<option class='exptdpckg' value='" + q + "'> " + q.toLocaleString() + "</option>"
                        document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for (var r = 4500000; r <= 9500000; r = r + 500000) {
                        var option = "<option class='exptdpckg' value='" + r + "'> " + r.toLocaleString() + "</option>"
                        document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    var option = "<option class='exptdpckg' value='10000000'>  100,00,000 & above </option>"
                    document.getElementById('Expectedpckg').innerHTML += option;
                } else {
                    // ShowMaxAnnualIncome();
                }
            }
        </script>
    </body>

</html>