<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('buyer/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('buyer/partials/left-nav'); ?>    
                <?php $this->load->view('buyer/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <?php $this->load->view('buyer/partials/searchbar'); ?>
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Profile</h3>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>User Report <small>Activity report</small></h2>
                                        
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                            <div class="profile_img">
                                                <div id="crop-avatar">
                                                    <?php
                                                    if (!empty($user->Photo)) {
                                                        ?>
                                                        <!-- Current avatar -->
                                                        <img class="img-responsive avatar-view" src="<?php echo base_url(); ?>assets/photo/<?php echo $user->Photo; ?>" alt="Avatar" title="Change the avatar">
                                                    <?php } else { ?>
                                                        <img src="<?php echo base_url(); ?>/assets/images/favi.jpg" alt="..." class="img-circle avatar-view">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <h3><?php echo $user->Name; ?></h3>

                                            <ul class="list-unstyled user_data">
                                                <?php if ($user->Address) {
                                                    ?>
                                                    <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $user->Address; ?>
                                                    </li>
                                                <?php } ?>

                                                <!--  <li>
                                                    <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                                                  </li> -->
                                                <?php if ($user->Email) {
                                                    ?>
                                                    <li class="m-top-xs">
                                                        <i class="fa fa-external-link user-profile-icon"></i>
                                                        <?php echo $user->Email; ?>
                                                    </li>
                                                <?php } ?>

                                                <?php if ($user->Phone) {
                                                    ?>
                                                    <li class="m-top-xs">
                                                        <i class="fa fa-phone"></i>
                                                        <?php echo $user->Phone; ?>
                                                    </li>
                                                <?php } ?>
                                            </ul>

                                            <a class="btn btn-success" href="<?php echo base_url(); ?>buyer/profile/edit/<?php echo $user->User_Id; ?>"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                                            <br />

                                            <!-- start skills -->
                                            <h4>Company Name</h4>
                                            <ul class="list-unstyled user_data">
                                                <?php if ($user->Company_name) { ?>
                                                    <li>
                                                        <h5><?php echo $user->Company_name; ?></h5>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                            <!-- start skills -->
                                            <h4>Company Brief</h4>
                                            <ul class="list-unstyled user_data">
                                                <?php if ($user->Company_brief) { ?>
                                                    <li>
                                                        <h5><?php echo $user->Company_brief; ?></h5>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                            <!-- end of skills -->
                                            <!-- start skills -->
                                            <ul class="list-unstyled user_data">
                                                <?php if ($user->category) { ?>
                                                    <li>
                                                        <h5>Preferences : <?php echo $user->category ?></h5>
                                                    </li>
                                                <?php } ?> 
                                                <?php if ($user->brand) { ?>
                                                    <li>
                                                        <h5>Brand : <?php echo $user->brand; ?></h5>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($user->payment_mode) { ?>
                                                    <li>
                                                        <h5>Payment Mode : <?php echo $user->payment_mode; ?></h5>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($user->payment_structure) { ?>
                                                    <li>
                                                        <h5>Payment Structure : <?php echo $user->payment_structure; ?></h5>
                                                    </li>
                                                <?php } ?>    
                                            </ul>
                                            <!-- end of skills -->
                                            <a class="btn btn-success" href="<?php echo base_url(); ?>buyer/profile/edit_corporate/<?php echo $user->User_Id; ?>"><i class="fa fa-edit m-right-xs"></i> Edit Corporate Profile</a>
                                            <br />
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-12">

                                            <div class="profile_title">
                                                <div class="col-md-6">
                                                    <h2>User Activity Report</h2>
                                                </div>
                                                <div class="col-md-6">
                                                    <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- start of user-activity-graph -->
                                            <div id="graph_bar" style="width:100%; height:280px;"></div>
                                            <!-- end of user-activity-graph -->

                                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                                                    </li>
                                                    <!--   <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a>
                                                       </li>-->
                                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                                                    </li>
                                                    <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Manage Delivery Address</a>
                                                    </li>
                                                </ul>
                                                <div id="myTabContent" class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                                        <!-- start recent activity -->
                                                        <ul class="messages">
                                                            <?php
                                                            if ($posts) {
                                                                foreach ($posts as $val) {
                                                                    ?>  
                                                                    <li><a href="<?php echo base_url(); ?>profile/index/<?php echo $val->Posted_User_Id; ?>"> <img src="<?php echo base_url(); ?>assets/photo/<?php echo $val->Photo; ?>" class="avatar" alt="Avatar"></a>
                                                                        <div class="message_date">
                                                                            <?php $exp = explode(" ", $val->Date_Created); ?>
                                                                            <b class="month">
                                                                                <?php echo date("d", strtotime($exp[0])) . " " . date("F", strtotime($exp[0])); ?>
                                                                            </b><br>
                                                                            <b class="month"><?php echo substr($exp[1], 0, 5); ?></b><br>

                                                                        </div>

                                                                        <div class="message_wrapper">
                                                                            <a href="<?php echo base_url(); ?>social/index/<?php echo $val->Posted_User_Id; ?>">
                                                                                <h4 class="heading"><?php echo $val->Name; ?></h4>
                                                                            </a>
                                                                            <p class="message"><?php echo $val->Content; ?></p>
                                                                            <br />

                                                                            <?php if ($val->Image) { ?>
                                                                                <img src="<?php echo base_url(); ?>assets/posts/<?php echo $val->Image; ?>" width="320" height="240" />

                                                                                <?php
                                                                            }



                                                                            if ($val->Video) {
                                                                                ?>

                                                                                <video width="320" height="240" controls>
                                                                                    <source src="<?php echo base_url(); ?>assets/posts/<?php echo $val->Video; ?>" >
                                                                                    Your browser does not support the video tag.
                                                                                </video>
                                                                                <?php
                                                                            }

                                                                            if ($val->Music) {
                                                                                ?>
                                                                                <audio controls>
                                                                                    <source src="<?php echo base_url(); ?>assets/posts/<?php echo $val->Music; ?>" >
                                                                                    Your browser does not support the audio tag.
                                                                                </audio>
                                                                                <?php
                                                                            }

                                                                            if ($val->Link) {
                                                                                ?>


                                                                                <a href="<?php echo base_url(); ?>assets/posts/<?php echo $val->Link; ?>" target="_blank">Link</a> 
                                                                            <?php }
                                                                            ?>
                                                                            <br>
                                                                            <a href="#" style="padding-right: 25px;"><i class="fa fa-thumbs-up"></i>Like</a>
                                                                            <a href="#" style="padding-right: 25px;"><i class="fa fa-comments"></i>Comment</a>
                                                                            <a href="#"><i class="fa fa-share-alt-square"></i>Share</a>


                                                                        </div>
                                                                    </li>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                        <!-- end recent activity -->

                                                    </div>
                                                    <!--<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          
                                                      <table class="data table table-striped no-margin">
                                                        <thead>
                                                          <tr>
                                                            <th>#</th>
                                                            <th>Project Name</th>
                                                            <th>Client Company</th>
                                                            <th class="hidden-phone">Hours Spent</th>
                                                            <th>Contribution</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                          <tr>
                                                            <td>1</td>
                                                            <td>New Company Takeover Review</td>
                                                            <td>Deveint Inc</td>
                                                            <td class="hidden-phone">18</td>
                                                            <td class="vertical-align-mid">
                                                              <div class="progress">
                                                                <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                                              </div>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td>2</td>
                                                            <td>New Partner Contracts Consultanci</td>
                                                            <td>Deveint Inc</td>
                                                            <td class="hidden-phone">13</td>
                                                            <td class="vertical-align-mid">
                                                              <div class="progress">
                                                                <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                                                              </div>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td>3</td>
                                                            <td>Partners and Inverstors report</td>
                                                            <td>Deveint Inc</td>
                                                            <td class="hidden-phone">30</td>
                                                            <td class="vertical-align-mid">
                                                              <div class="progress">
                                                                <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                                                              </div>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td>4</td>
                                                            <td>New Company Takeover Review</td>
                                                            <td>Deveint Inc</td>
                                                            <td class="hidden-phone">28</td>
                                                            <td class="vertical-align-mid">
                                                              <div class="progress">
                                                                <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                            
                                                    </div>-->
                                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Name: </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input readonly value="<?php echo $user->Name; ?>" name="Name" type="text" class="form-control" placeholder="Name"  >
                                                                <?php if (form_error('name')) { ?>

                                                                    <span class="form-error-message text-danger"><?php echo form_error('name'); ?></span>

                                                                <?php } ?>

                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">  Email: </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input readonly value="<?php echo $user->Email; ?>" id="" name="Email" type="email" class="form-control" placeholder="Email" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">  Phone: </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input readonly value="<?php echo $user->Phone; ?>" id=" phone" name="Phone" type="number" class="form-control" placeholder="Phone">

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">  Address: </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input readonly value="<?php echo $user->Address; ?>" id=" address" name="Address" type="text" class="form-control" placeholder="Address">

                                                            </div>
                                                        </div>



                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                                                        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="2">List of Address Lines</th>
                                                                    <th colspan=1" class="text-center"><a class="label label-default" data-toggle="modal" data-target=".bs-example-modal-lg">Add New</a></th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Delivery Address</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if (!empty($addresses)) {
                                                                    foreach ($addresses as $address) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $address['id']; ?></td>
                                                                            <td><?php echo $address['delivery_address']; ?></td>
                                                                            <td>
                                                                                <a data-toggle="modal" data-target="#add<?php echo "_" . $address['id']; ?>" href="#" class="btn btn-info btn-xs">Edit</a>
                                                                                <a href="<?php echo base_url() . "buyer/profile/deleteAddress/" . $address['id']; ?>" class="btn btn-danger btn-xs">Delete</a>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <tr>
                                                                        <td colspan="3">Delivery Address Not available</td>
                                                                    </tr>
                                                                    <?php
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
                    </div>
                    <!-- /page content --> 
                    <div class="clearfix"></div>

                </div>
                <!-- footer content -->
                <?php $this->load->view('buyer/partials/footer') ?>
                <!-- /footer content --> 
            </div>
            <!-- modals -->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
                            <h4 class="modal-title" id="myModalLabel">Add Delivery Address</h4>
                        </div>
                        <div class="modal-body">
                            <form id="adressForm" method="POST" action="<?php echo base_url() . "buyer/profile/addDeliveryAdress"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Delivery Address</label>
                                        <input required="" name="delivery" type="text" class="form-control" placeholder="Delivery Address">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success right-float">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="button" class="close" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $i = 1;
            foreach ($addresses as $val) {
                ?>
                <!-- Modal -->
                <div id="add<?php echo "_" . $val['id']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
                                <h4 class="modal-title" id="myModalLabel">Edit Delivery Address</h4>
                            </div>
                            <div class="modal-body">
                                <form id="adressForm" method="POST" action="<?php echo base_url() . "buyer/profile/updateDeliveryAdress"; ?>/<?php echo $val['id']; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label">Delivery Address</label>
                                            <input value="<?php echo $val['delivery_address']; ?>" required="" name="delivery" type="text" class="form-control" placeholder="Delivery Address">
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-success right-float">Update</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="button" class="close" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>

    <?php $this->load->view('buyer/partials/assets-footer'); ?>

    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Custom Theme Scripts --> 
    <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script>
    <script>
        document.addEventListener("touchstart", function () {}, true);
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function () {
            readURL(this);
        });
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
</body>

</html>