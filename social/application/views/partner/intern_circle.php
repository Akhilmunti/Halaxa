<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('partner/halaxa/header'); ?>

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('partner/halaxa/navbar'); ?>

            <div class="wrapper">
                <!-- Sidebar -->
                <?php $this->load->view('partner/halaxa/sidebar'); ?>

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $this->load->view('partner/halaxa/alerts'); ?>
                            </div>
                            <div class="col-md-12">
                                <div class="theme-card mb-3">
                                    <div class="row pr-3 pl-2">
                                        <div class="col-md-10">
                                            <div class="post-card p-2">
                                                <span class="com-name">Internship Circles</span>
                                            </div>
                                        </div>
                                        <div class="col-md-2 p-2">
                                            <button data-toggle="modal" data-target="#addTopic" class="btn btn-block btn-blue"><i class="fa fa-plus mr-2"></i> New Circle</button>
                                            <!-- Modal -->
                                            <form id="memberForm" method="POST" action="<?php echo base_url('partner/members/addMembers') ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                <div id="addTopic" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                        <!-- Modal content-->
                                                        <div class="modal-content-theme">
                                                            <div class="modal-header bg-danger">
                                                                <span class="modal-header-text">Add New Circle</span>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-xs-12" style="overflow: scroll">
                                                                        <label class="control-label">Circle Name*</label>
                                                                        <input required="" name="schedule_name" type="text" class="form-control" />
                                                                        <label class="control-label">Circle Type*</label>
                                                                        <select required="" id="type" name="type" class="form-control">
                                                                            <option value="" selected="" disabled="">Select Circle Type</option>
                                                                            <option value="internship">Internship</option>
                                                                            <option value="odc">ODC</option>
                                                                            <!--<option value="campus">Campus hires</option>-->
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
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Add Circle</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row pt-3 pb-3">
                                            <div class="col-md-2">
                                                <img width="15" class="text-vertical" src='<?php echo base_url('assets/halaxa_partner/images/filter-icon.png'); ?>'>
                                                <p class="text-danger text-vertical"><b>Search : </b></p>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input type="text" class="fontAwesome form-control" name="emailAddress" placeholder="&#xf002;  Keyword" value="">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a style="padding: 6px" href="#" class="btn btn-danger btn-block">Submit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-filter" style="background-color: #ffffff">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Circle Name</th>
                                                    <th>Type</th>
                                                    <th>Location</th>
                                                    <th>Status</th>
                                                    <th>Period From</th>
                                                    <th>Period To</th>
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
                                                            <td>
                                                                <?php echo $counter;?>
                                                            </td>
                                                            <td>
                                                                <a href="#" class="table-circle"><?php echo $member['Schedule_name']; ?></a>
                                                            </td>

                                                            <td>
                                                                <span class="table-type"><?php echo $member['Type']; ?></span>
                                                            </td>
                                                            <td>
                                                                <span class="table-type"><?php echo $member['Country']; ?>, <?php echo $member['City']; ?></span>
                                                            </td>
                                                            <td>
                                                                <span class="table-status">
                                                                    <?php if ($member['Flag'] == "0"): ?>
                                                                        Offer Pending
                                                                    <?php elseif ($member['Flag'] == "1"): ?>
                                                                        Offered
                                                                    <?php elseif ($member['Flag'] == "2"): ?>
                                                                        Offer Withdrawn
                                                                    <?php elseif ($member['Flag'] == "3"): ?>
                                                                        Re-Offered
                                                                    <?php elseif ($member['Flag'] == "5"): ?>
                                                                        Accepted
                                                                    <?php elseif ($member['Flag'] == "6"): ?>
                                                                        Rejected
                                                                    <?php else: ?>
                                                                        Offered
                                                                    <?php endif;  ?>
                                                                    
                                                                    <?php /*if ($member['Flag'] == "0" || $member['Flag'] == "-1"){
                                                                        echo "Inactive";
                                                                    }else{
                                                                        echo "Active";
                                                                    }*/?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="table-type"><?php 
                                                                $date = date_create($member['Periodfrom']);
                                                                echo date_format($date,"d M Y");?></span>
                                                            </td>
                                                            <td>
                                                                <span class="table-type"><?php 
                                                                $date = date_create($member['Periodto']);
                                                                echo date_format($date,"d M Y");?></span>
                                                            </td>
                                                            <td>
                                                                <a href="#" class="ml-3" data-toggle="modal" data-target="#addTopic<?php echo "_" . $member['S_Id']; ?>">
                                                                    <img height="20" src="<?php echo base_url('assets/halaxa_partner/images/table-edit.png'); ?>" />
                                                                </a>
                                                                <a href="#" class="ml-3 table-dropdown" data-toggle="dropdown">
                                                                    <img height="20" src="<?php echo base_url('assets/halaxa_partner/images/table-indus.png'); ?>" />
                                                                </a>
                                                                <?php if ($member['Flag'] != 5){ ?>
                                                                    <a href="<?php echo base_url('partner/members/acceptSchedule/'.$member['S_Id']); ?>" class="table-status ml-3">Activate</a>
                                                                <?php }else{ ?>
                                                                    <a href="<?php echo base_url('partner/members/rejectSchedule/'.$member['S_Id']); ?>" class="table-status ml-3">Deactivate</a>
                                                                <?php }?>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                }
                                                ?>       
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Main -->

     <?php
     if (!empty($scheduledMembers)) {
            $counter = 0;
                foreach ($scheduledMembers as $member) {
                    $counter++;?>
                    <form id="memberForm" method="POST" action="<?php echo base_url('partner/members/editMembers') ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                <div id="addTopic<?php echo "_" . $member['S_Id']; ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                        <!-- Modal content-->
                                                        <div class="modal-content-theme">
                                                            <div class="modal-header bg-danger">
                                                                <span class="modal-header-text">Edit Circle</span>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-xs-12" style="overflow: scroll">
                                                                        <label class="control-label">Circle Name*</label>
                                                                        <input required="" name="schedule_name" type="text" class="form-control" value="<?php echo $member['Schedule_name'];?>"/>
                                                                        <label class="control-label">Circle Type*</label>
                                                                        <select required="" id="type" name="type" class="form-control">
                                                                            <option value="" selected="" disabled="">Select Schedule Type</option>
                                                                            <option value="internship" <?php if($member['Type'] == 'internship'){ echo 'selected'; } ?> >Internship</option>
                                                                            <option value="odc" <?php if($member['Type'] == 'odc'){ echo 'selected'; } ?> >ODC</option>
                                                                            <!--<option value="campus">Campus hires</option>-->
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
                                                                                <?php 
                                                                                $circleMembers = $this->association_model->getCircleMembers($member['P_Id'], $member['Schedule_name']);
                                                                                //print_r($circleMembers);
                                                                                //echo count($circleMembers);
                                                                                ?>
                                                                                <?php 
                                                                                if(count($circleMembers) > 0){
                                                                                    foreach($circleMembers as $circle){ 
                                                                                        //echo $circle['Periodfrom'];
                                                                                    ?>
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
                                                                                                $selected = "";
                                                                                                if($circle['Intern_Name'] == $member['User_Name']){
                                                                                                    $selected = "selected";
                                                                                                }
                                                                                                echo "<option value='" . $member['User_Id'] . "' ".$selected.">" . $member['User_Name'] . "</option>";
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
                                                                                                $elected = "";
                                                                                                if($loc['name'] == $circle['Country']){
                                                                                                    $elected = "selected";
                                                                                                }
                                                                                                echo "<option data-value='" . $loc['id'] . "' value='" . $loc['name'] . "' ".$elected.">" . $loc['name'] . "</option>";
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
                                                                                        <input required="" type="date" name="member[1][]" class="form-control" value= "<?php echo $circle['Periodfrom'];?>"/>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input required="" type="date" name="member[1][]"  class="form-control" value= "<?php echo $circle['Periodto'];?>"/>
                                                                                    </td>
                                                                                </tr>
                                                                                <?php    }
                                                                                }else{ ?>
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
                                                                                <?php }?>
                                                                               
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
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Update Circle</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
        <?php }
        }?>
        <!-- jQuery  -->
<?php $this->load->view('partner/halaxa/scripts'); ?>

        <script>
            document.addEventListener("touchstart", function () {}, true);
            function empty_validate() {
                var a = document.getElementById('content').value;
                var b = document.getElementById('image').value;
                var c = document.getElementById('video').value;
                var d = document.getElementById('link').value;
                if ($('#content').val() || $('#image').val() || $('#video').val() || $('#link').val()) {
                    return true;
                } else {
                    alert("Empty Post cannot be posted.");
                    return false;
                }
            }

        </script>
        <script>
            function addId(id) {
                var id = id
                alert(id);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('controller/function'); ?>",
                    data: {id: id},
                    cache: false,
                    async: false,
                    success: function (result) {
                        console.log(result);
                    }
                });
            }
        </script>
        <script>
            // Type change event
            $('#filterby').change(function () {
                $.post("<?php echo base_url('buyer/search/getFilterResults/'); ?>",
                        {
                            filter: this.value,
                        },
                        function (data, status) {
                            $('#products').html(data);
                        });
            });
        </script>
        <script>
            var loadFile = function (event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
            };
            $(document).on("change", ".file_multi_video", function (evt) {
                var $source = $('#video_here');
                $source[0].src = URL.createObjectURL(this.files[0]);
                $source.parent()[0].load();
            });
        </script>
        <script>
            $("#cancelImage").click(function () {
                $('#image').val('');
                $('#output').attr("src", "https://via.placeholder.com/150");
            });
            $("#cancelVideo").click(function () {
                $('#video').val('');
                $("#videoPreview").attr("src", "videos/Funny Cats.mp4");
            });
            $("#cancelLink").click(function () {
                $('#link').val('');
            });
            $("#linkClose").click(function () {
                $('#link').val('');
                $('#myModalLink').modal('hide');
            });
            $("#videoClose").click(function () {
                $('#video').val('');
                $('#myModalVideo').modal('hide');
                $("video").attr("src", "videos/Funny Cats.mp4");
            });
            $("#imageClose").click(function () {
                $('#image').val('');
                $('#myModalImage').modal('hide');
                $('#output').attr("src", "https://via.placeholder.com/150");
            });
        </script>
        <script type="text/javascript">
            $('#content').on('change', function () {
                // Change occurred so count chars...
                var comment = $.trim($("#content").val());
                $("#content_image").text(comment);
                $("#content_video").text(comment);
                $("#content_link").text(comment);
            });
        </script>

        <!-- old scripts starts here-->
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

        <!-- old scripts ends here-->
    </body>

</html>