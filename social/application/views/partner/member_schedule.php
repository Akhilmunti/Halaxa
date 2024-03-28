<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('partner/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('partner/partials/left-nav'); ?>    
                <!-- top navigation -->
                <?php $this->load->view('partner/partials/top-nav'); ?>
                <!-- /top navigation --> 
            </div>

            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <?php
                                $result = $this->session->flashdata('result');
                                if ($result == NULL) {
                                    $hidealert = "hide";
                                } else {
                                    $showalert = $result;
                                    $hidealert = "";
                                }
                                ?>
                                <div class="alert alert-success <?php echo $hidealert ?>">
                                    <?php echo $showalert ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-xs-12" style="overflow: scroll">
                                        <a data-toggle="modal" data-target="#myModal" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#newlistModal">Create New List</a> 
                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin table-responsive table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Availability Schedules</th>
                                                    <th>Type</th>
                                                    <th>Country</th>
                                                    <th>City</th>
                                                    <th>Period From</th>
                                                    <th>Period To</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($scheduledMembers)) {
                                                    $counter = 0;
                                                    foreach ($scheduledMembers as $member) {
                                                        $counter++;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $counter; ?></td>
                                                            <td><a data-toggle="modal" data-target="#schedule<?php echo "_" . $member['S_Id']; ?>" class="btn btn-xs btn-dark"><?php echo $member['Schedule_name']; ?></a></td>
                                                            <td><?php echo $member['Type']; ?></td>
                                                            <td><?php echo $member['Country']; ?></td>
                                                            <td><?php echo $member['City']; ?></td>
                                                            <td><?php echo $member['Periodfrom']; ?></td>
                                                            <td><?php echo $member['Periodto']; ?></td>
        <!--                                                            <td><a href="#" class="btn btn-xs btn-dark"><?php echo $member['Intern_Name']; ?></a></td>-->
                                                            <td>
                                                                <?php if ($member['Flag'] == "0"): ?>
                                                                    <a class="btn btn-info btn-xs">Offer Pending</a>
                                                                <?php elseif ($member['Flag'] == "1"): ?>
                                                                    <a class="btn btn-success btn-xs">Offered</a>
                                                                <?php elseif ($member['Flag'] == "2"): ?>
                                                                    <a class="btn btn-danger btn-xs">Offer Withdrawn</a>
                                                                <?php elseif ($member['Flag'] == "3"): ?>
                                                                    <a class="btn btn-primary btn-xs">Re-Offered</a>
                                                                <?php elseif ($member['Flag'] == "5"): ?>
                                                                    <a class="btn btn-primary btn-xs">Accepted</a>
                                                                <?php elseif ($member['Flag'] == "6"): ?>
                                                                    <a class="btn btn-primary btn-xs">Rejected</a>
                                                                <?php else: ?>
                                                                    <a class="btn btn-primary btn-xs">Offered</a>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                                <!--                                                                <a href="<?php echo base_url('partner/members/deleteMembers') ?>/<?php echo $member['S_Id']; ?>" class="btn btn-dark btn-xs">Manage</a>-->
                                                                <?php if ($member['Flag'] == "0"): ?>
                                                                    <?php if (!empty($member['Selected_recruiters'])) { ?>
                                                                        <a href="#" class="btn btn-success btn-xs">Shared</a>
                                                                    <?php } else { ?>
                                                                        <a data-toggle="modal" data-target="#schedule_share<?php echo "_" . $member['S_Id']; ?>" href="#" class="btn btn-dark btn-xs">Share</a>
                                                                    <?php } ?>
                                                                    <a onclick="return confirm('Are you sure, you want to end?');" href="<?php echo base_url('partner/members/deleteMembers') ?>/<?php echo $member['S_Id']; ?>" class="btn btn-danger btn-xs">End</a>
                                                                <?php elseif ($member['Flag'] == "1"): ?>
                                                                    <a href="<?php echo base_url('partner/members/acceptSchedule/') ?><?php echo $member['S_Id']; ?>" class="btn btn-dark btn-xs">Accept</a>
                                                                    <a href="<?php echo base_url('partner/members/rejectSchedule/') ?><?php echo $member['S_Id']; ?>" class="btn btn-danger btn-xs">Reject</a>
                                                                    <?php if (!empty($member['Negotiation'])) { ?>
                                                                        <a href="#" class="btn btn-success btn-xs">Negotiated</a>
                                                                    <?php } else { ?>
                                                                        <a data-toggle="modal" data-target="#schedule_negotiate<?php echo "_" . $member['S_Id']; ?>" href="#" class="btn btn-dark btn-xs">Negotiate</a>
                                                                    <?php } ?>                                                                <?php elseif ($member['Flag'] == "2"): ?>
                                                                    <?php if (!empty($member['Selected_recruiters'])) { ?>
                                                                        <a href="#" class="btn btn-success btn-xs">Shared</a>
                                                                    <?php } else { ?>
                                                                        <a data-toggle="modal" data-target="#schedule_share<?php echo "_" . $member['S_Id']; ?>" href="#" class="btn btn-dark btn-xs">Share</a>
                                                                    <?php } ?>
                                                                    <a onclick="return confirm('Are you sure, you want to end?');" href="<?php echo base_url('partner/members/deleteMembers') ?>/<?php echo $member['S_Id']; ?>" class="btn btn-danger btn-xs">End</a>
                                                                <?php else: ?>
                                                                    <?php if ($member['Flag'] == "5"): ?>
                                                                        <a class="btn btn-info btn-xs">Accepted</a>
                                                                    <?php elseif ($member['Flag'] == "6"): ?>
                                                                        <a class="btn btn-primary btn-xs">Rejected</a>
                                                                        <a href="<?php echo base_url('partner/members/acceptSchedule/') ?><?php echo $member['S_Id']; ?>" class="btn btn-dark btn-xs">Accept</a>
                                                                    <?php else: ?>
                                                                        <a href="<?php echo base_url('partner/members/acceptSchedule/') ?><?php echo $member['S_Id']; ?>" class="btn btn-dark btn-xs">Accept</a>
                                                                        <a href="<?php echo base_url('partner/members/rejectSchedule/') ?><?php echo $member['S_Id']; ?>" class="btn btn-danger btn-xs">Reject</a>                                                                    <?php endif; ?>
                                                                    <?php if (!empty($member['Negotiation'])) { ?>
                                                                        <a href="#" class="btn btn-success btn-xs">Negotiated</a>
                                                                    <?php } else { ?>
                                                                        <a data-toggle="modal" data-target="#schedule_negotiate<?php echo "_" . $member['S_Id']; ?>" href="#" class="btn btn-dark btn-xs">Negotiate</a>
                                                                    <?php } ?>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="10"><center>No data found</center></td>
                                                </tr>
                                            <?php } ?>

                                            </tbody>
                                        </table>
                                        <!-- end user projects --> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <form id="memberForm" method="POST" action="<?php echo base_url('partner/members/addMembers') ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Create New Schedule</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12" style="overflow: scroll">
                                        <label class="control-label">Schedule Name*</label>
                                        <input required="" name="schedule_name" type="text" class="form-control" />
                                        <label class="control-label">Schedule Type*</label>
                                        <select required="" id="type" name="type" class="form-control">
                                            <option value="" selected="" disabled="">Select Schedule Type</option>
                                            <option value="internship">Internship</option>
                                            <option value="odc">ODC</option>
                                            <!--                                            <option value="campus">Campus hires</option>-->
                                        </select>
                                        <br>
                                        <table id="memberTable" class="table order-list table-striped no-margin table-responsive table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Intern Name</th>
                                                    <th>Country</th>
                                                    <th>State</th>
                                                    <th>City</th>
                                                    <th>Period From</th>
                                                    <th>Period To</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="mTable">
                                                <tr>
                                                    <td>
                                                        <input style="width: 50px" value="1" readonly="" type="text" name="member[1][]" class="form-control" />
                                                    </td>
                                                    <td>
                                                        <select style="width : 100px" id="member" name="member[1][]" class="form-control" required>
                                                            <option value="" selected="" disabled="">Select</option>
                                                            <option value="invite">Invite</option>
                                                            <?php
                                                            foreach ($members as $member) {
                                                                echo "<option value='" . $member['User_Id'] . "'>" . $member['User_Name'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input required="" style="width: 150px" id="country1" onchange="myFunction(1)" class="form-control" name="member[1][]"  list="country">
                                                        <datalist id="country">
                                                            <option value="" selected="" disabled="">Choose option</option>
                                                            <?php
                                                            foreach ($countries as $loc) {
                                                                echo "<option data-value='" . $loc['id'] . "' value='" . $loc['name'] . "'>" . $loc['name'] . "</option>";
                                                            }
                                                            ?>
                                                        </datalist>
                                                    </td>
                                                    <td>
                                                        <select required="" style="width: 150px" onchange="myFunctionState(1)" name="member[1][]" id="state1" class="form-control">
                                                            <option value="" selected="" disabled="">Choose option</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select required="" style="width: 150px" name="member[1][]" id="city-automplete1" class="form-control">
                                                            <option value="" selected="" disabled="">Choose option</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input required="" type="date" name="member[1][]" class="form-control" />
                                                    </td>
                                                    <td>
                                                        <input required="" type="date" name="member[1][]"  class="form-control"/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" style="text-align: left;">
                                                        <button type="button" class="btn btn-dark btn-sm btn-block" id="addrow">Add Row</button>
                                                    </td>
                                                    <td colspan="4" style="text-align: right;">
                                                        <button type="button" class="btn btn-dark btn-sm btn-block" id="remove">Delete Row</button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button id="memberButton" type="submit" class="btn btn-dark">Create Schedule</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- footer content -->
            <?php $this->load->view('partner/partials/footer') ?>
            <!-- /footer content --> 
        </div>

        <?php
        if (!empty($scheduledMembers)) {
            $counter = 0;
            foreach ($scheduledMembers as $member) {
                $counter++;
                ?>
                <div id="schedule<?php echo "_" . $member['S_Id']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg"> 
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><?php echo $member['Schedule_name']; ?> Details</h4>
                            </div>
                            <div class="modal-body">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Intern Name</th>
                                            <th>Type</th>
                                            <th>Country</th>
                                            <th>City</th>
                                            <th>Period From</th>
                                            <th>Period To</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($scheduledMembers)) {
                                            $counter = 0;
                                            foreach ($scheduledMembers as $member) {
                                                $counter++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $counter; ?></td>
                                                    <td><a href="#" class="btn btn-xs btn-dark"><?php echo $member['Intern_Name']; ?></a></td>
                                                    <td><?php echo $member['Type']; ?></td>
                                                    <td><?php echo $member['Country']; ?></td>
                                                    <td><?php echo $member['City']; ?></td>
                                                    <td><?php echo $member['Periodfrom']; ?></td>
                                                    <td><?php echo $member['Periodto']; ?></td>
                                                    <td>
                                                        <?php if ($member['Flag'] == "0"): ?>
                                                            <a class="btn btn-info btn-xs">Offer Pending</a>
                                                        <?php elseif ($member['Flag'] == "1"): ?>
                                                            <a class="btn btn-success btn-xs">Offered</a>
                                                        <?php elseif ($member['Flag'] == "2"): ?>
                                                            <a class="btn btn-danger btn-xs">Offer Withdrawn</a>
                                                        <?php else: ?>
                                                            <a class="btn btn-primary btn-xs">Re-Offered</a>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-dark btn-xs">Share</a>
                                                        <a onclick="return confirm('Are you sure, you want to end?');" href="<?php echo base_url('partner/members/deleteMembers') ?>/<?php echo $member['S_Id']; ?>" class="btn btn-danger btn-xs">End</a>
                <!--                                                                <a href="<?php echo base_url('partner/members/deleteMembers') ?>/<?php echo $member['S_Id']; ?>" class="btn btn-dark btn-xs">Manage</a>-->
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="10"><center>No data found</center></td>
                                        </tr>
                                    <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>

        <?php } ?>


        <?php
        if (!empty($scheduledMembers)) {
            $counter = 0;
            foreach ($scheduledMembers as $member) {
                $counter++;
                ?>
                <div id="schedule_negotiate<?php echo "_" . $member['S_Id']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-md">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Negotiate <?php echo $member['Schedule_name']; ?></h4>
                            </div>
                            <form id="memberNegotiateForm" method="POST" action="<?php echo base_url('partner/members/addNegotiation/') ?><?php echo $member['S_Id']; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <label class="control-label">Negotiation Message*</label>
                                    <textarea rows="6" required="" name="negotiation" type="text" class="form-control" ></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button id="memberNegtiateButton" type="submit" class="btn btn-dark">Submit Negotiation</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>

        <?php } ?>

        <?php
        if (!empty($scheduledMembers)) {
            $counter = 0;
            foreach ($scheduledMembers as $member) {
                $counter++;
                ?>
                <div id="schedule_share<?php echo "_" . $member['S_Id']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Share <?php echo $member['Schedule_name']; ?></h4>
                            </div>
                            <form id="memberNegotiateForm" method="POST" action="<?php echo base_url('partner/members/shareSchedule/') ?><?php echo $member['S_Id']; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <?php
                                        $json = file_get_contents("https://foodlinked.co.in/social_api/get_recruiters.php");
                                        $data = json_decode($json, true);
                                        $recruiters = $data['members'];
                                        if (!empty($recruiters)) {
                                            $counter = 0;
                                            foreach ($recruiters as $recruiter) {
                                                $counter++;
                                                ?>
                                                <div class="col-md-3" style="margin-bottom: 10px">
                                                    <div class="card post-card text-center">
                                                        <?php if ($counter == 1) { ?>
                                                            <input required="" value="<?php echo $recruiter['uuid']; ?>" type="checkbox" name="recruiters[]"/> 
                                                        <?php } else { ?>
                                                            <input value="<?php echo $recruiter['uuid']; ?>" type="checkbox" name="recruiters[]"/> 
                                                        <?php } ?>
                                                        <br>
                                                        <?php echo $recruiter['company']; ?>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <div class="col-md-12">
                                                <div class="card post-card">
                                                    <div class="card-body">
                                                        <h5><b>Recruiters not found.</b></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button id="memberNegtiateButton" type="submit" class="btn btn-dark">Share</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>

        <?php } ?>

        <?php $this->load->view('partner/partials/assets-footer'); ?>
        <!-- jQuery Smart Wizard --> 
        <script src="<?php echo base_url(); ?>assets/vendors/moment/min/moment.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>  
        <script src="<?php echo base_url(); ?>assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- iCheck --> 
        <script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script> 
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
                                                            document.addEventListener("touchstart", function () {}, true);
        </script>

        <script>
            $(document).ready(function () {
                $('#recruitersTable').DataTable({
                    responsive: true
                });
            });
            function myFunction(row) {
                var rowvalue = row;
                var country = $('#country' + rowvalue).val();
                $.post("<?php echo base_url('buyer/rfq/getStateByCountry/'); ?>",
                        {
                            location: country,
                        },
                        function (data, status) {
                            $('#state' + rowvalue).html(data);
                        });
            }

            function myFunctionState(row) {
                var rowvalue = row;
                var state = $('#state' + rowvalue).val();
                $.post("<?php echo base_url('buyer/rfq/getCityByState/'); ?>",
                        {
                            state: state,
                        },
                        function (data, status) {
                            $('#city-automplete' + rowvalue).html(data);
                        });
            }
        </script>

        <script>
            $('#member').on('change', function () {
                if (this.value === "invite") {
                    //                    $('#demo').show();
                    //                    $("#memberButton").hide();
                    //                    $("#inviteButton").show();
                    window.top.location.href = "/social/partner/members/inviteMembers";
                } else {
                    //$('#demo').hide();
                    //$("#inviteButton").hide();
                    //$("#memberButton").show();
                }
            });
            //            $("#memberForm").on('submit', function (e) {
            //                //ajax call here
            //                var internName = $("#member option:selected").text();
            //                var type = $("#type option:selected").text();
            //                
            //                if(internName == "Select"){
            //                    e.preventDefault();
            //                    alert("Please select intern.");
            //                } else {
            //                    return true;
            //                }
            //                
            //                if(type == "Select"){
            //                    e.preventDefault();
            //                    alert("Please select Schedule type.");
            //                } else {
            //                    return true;
            //                }
            //                //stop form submission
            //            });
        </script>

        <script>
            $('#remove').on("click", function () {
                var rowCount = $('#memberTable >tbody >tr').length;
                if (rowCount > 1) {
                    $('#memberTable tbody tr:last').remove();
                }
            })


            $(document).ready(function () {
                var counter = 2;
<?php
$invites_out = "<option value='' selected='' disabled=''>Select</option>";
foreach ($members as $member) {
    $invites_out = $invites_out . "<option value='" . $member['User_Id'] . "'>" . $member['User_Name'] . "</option>";
}
echo "var invites_out = \"" . $invites_out . "\";";

$con_out = "<option value='' selected='' disabled=''>Select</option>";
foreach ($countries as $loc) {
    $con_out = $con_out . "<option data-value='" . $loc['id'] . "' value='" . $loc['name'] . "'>" . $loc['name'] . "</option>";
}
echo "var con_out = \"" . $con_out . "\";";
?>
                $("#addrow").on("click", function () {
                    var rowCount = $('#memberTable tbody tr').length + 1;
                    var newRow = $("<tr>");
                    var cols = "";
                    cols += '<td><input style="width: 50px" value="' + rowCount + '" readonly="" type="text" name="member[' + counter + '][]" class="form-control" /></td>';
                    cols += '<td><select id="member' + counter + '" required="" class="form-control" name="member[' + counter + '][]">' + invites_out + '</select></td>';
                    cols += '<td><input style="width: 150px" id="country' + counter + '" onchange="myFunction(' + counter + ')" class="form-control" name="member[' + counter + '][]" list="country"><datalist id="country">' + con_out + '</datalist></td>';
                    cols += '<td><select style="width: 150px" onchange="myFunctionState(' + counter + ')" name="member[' + counter + '][]" id="state' + counter + '" class="form-control"></select></td>';
                    cols += '<td><select style="width: 150px" name="member[' + counter + '][]" id="city-automplete' + counter + '" class="form-control"></select></td>';
                    cols += '<td><input required="" type="date" name="member[' + counter + '][]" class="form-control" /></td>';
                    cols += '<td><input required="" type="date" name="member[' + counter + '][]" class="form-control" /></td>';
                    newRow.append(cols);
                    $("table.order-list").append(newRow);
                    counter++;
                });

                $("table.order-list").on("click", ".ibtnDel", function (event) {
                    $(this).closest("tr").remove();
                    counter -= 1
                });

            });

        </script>
        <style>
            .post-card{
                margin-bottom: 10px;
                background-color: #f8f8f8;
                padding: 20px !important;
                border-radius: 5px;
                -webkit-box-shadow: 0 10px 6px -6px #777;
                -moz-box-shadow: 0 10px 6px -6px #777;
                box-shadow: 0 10px 6px -6px #777;
            }
            .post-div {
                position: relative;
                overflow: hidden;
            }
            .file-post {
                position: absolute;
                opacity: 0;
                right: 0;
                top: 0;
            }
        </style>
    </body>
</html>
