<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('vendor/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('vendor/partials/left-nav'); ?>    
                <?php $this->load->view('vendor/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Profile</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="panel-group">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <a style="font-size: 25px">Personal Details</a>
                                                    <a href="<?php echo base_url(); ?>profile/edit/<?php echo $user->User_Id; ?>" class="btn btn-sm btn-success" style="float: right"><i class="fa fa-edit"></i> Edit</a>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div id="collapse1" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-3">
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
                                                            </div>
                                                            <div class="col-md-9">
                                                                <table class="table-striped table table-responsive">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Name : <?php echo $user->Name; ?></td>
                                                                        </tr>
                                                                        <?php if ($user->Address) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>Address : <?php echo $user->Address; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        <?php if ($user->Email) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>Email : <?php echo $user->Email; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        <?php if ($user->Phone) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>Phone : <?php echo $user->Phone; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel-group">
                                            <?php
                                            if ($vendor_details) {
                                                $collapse = "in";
                                                $buttonEdit = "";
                                                $buttonAdd = "hide";
                                            } else {
                                                $collapse = "";
                                                $buttonEdit = "hide";
                                                $buttonAdd = "";
                                            }
                                            ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <a style="font-size: 25px">Seller Details</a>
                                                    <a href="<?php echo base_url(); ?>vendor/profile/edit_seller/<?php echo $user->User_Id; ?>" class="btn btn-sm btn-success <?php echo $buttonEdit; ?>" style="float: right"><i class="fa fa-edit"></i> Edit Seller Profile</a>
                                                    <a data-toggle="modal" data-target=".bs-example-modal-lg-seller" class="btn btn-sm btn-success <?php echo $buttonAdd; ?>" style="float: right"><i class="fa fa-plus"></i> Add Seller Profile</a>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div id="collapse1" class="panel-collapse collapse <?php echo $collapse; ?>">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <table class="table-striped table table-responsive">
                                                                    <tbody>
                                                                        <?php if ($vendor_details->comapany_name) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>Company Name : <?php echo $vendor_details->comapany_name; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        <?php if ($vendor_details->company_brief) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>Company Brief : <?php echo $vendor_details->company_brief; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        <?php if ($vendor_details->payment_mode) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>
                                                                                    Payment Mode : 
                                                                                    <?php
                                                                                    $pmode = json_decode($vendor_details->payment_mode);
                                                                                    foreach ($pmode as $value) {
                                                                                        echo $value . ",";
                                                                                    }
                                                                                    ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table> 
                                                            </div>
                                                            <div class="col-md-6">
                                                                <table class="table-striped table table-responsive">
                                                                    <tbody>
                                                                        <?php if ($vendor_details->delivery_address) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>Delivery Address : <?php echo $vendor_details->delivery_address; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        <?php if ($vendor_details->language) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>Language : <?php echo $vendor_details->language; ?></td>
                                                                            </tr>
                                                                        <?php } ?>    
                                                                    </tbody>
                                                                </table> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- modals -->
                                                <div class="modal fade bs-example-modal-lg-seller" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
                                                                <h4 class="modal-title" id="myModalLabel">Setup Seller Profile</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="cProfileForm" method="POST" action="<?php echo base_url() . "profile/addSellerDetails"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h4 class="text-center">Mandatory Fields</h4>
                                                                            <hr>
                                                                            <div class="col-md-12">
                                                                                <label class="control-label">Company Name*</label>
                                                                                <input required="" name="companyname" type="text" class="form-control" placeholder="Enter Company Name">
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <label class="control-label">Preferred Language*</label>
                                                                                <select name="prelanguage" class="form-control" required="">
                                                                                    <option value="0">Choose Language</option>
                                                                                    <option value="Kannada">Kannada</option>
                                                                                    <option value="English">English</option>
                                                                                    <option value="Telugu">Telugu</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <label class="control-label"> Office Address*</label>
                                                                                <textarea required="" name="deliveryaddress" class="form-control" rows="4" id="comment"></textarea>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <label class="control-label">Category*</label>
    <!--                                                                            <select id="categories" name="categories" class="form-control" multiple="multiple">
                                                                                <?php
                                                                                foreach ($categories as $category) {
                                                                                    echo "<option value='" . $category['CT_Id'] . "'>" . $category['Category'] . "</option>";
                                                                                }
                                                                                ?>
                                                                                </select>-->
                                                                                <select id="categories" name="categories[]" class="form-control" multiple="">
                                                                                    <?php
                                                                                    foreach ($categories as $category) {
                                                                                        echo "<option value='" . $category['CT_Id'] . "'>" . $category['Category'] . "</option>";
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <label class="control-label">Sub Category*</label>
                                                                                <select name="subcategories[]" id="subcategories" class="form-control" multiple="">
                                                                                    <option>Choose Option</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <h4 class="text-center">Non-Mandatory Fields</h4>
                                                                            <hr>
                                                                            <div class="col-md-12">
                                                                                <label class="control-label">Company Brief</label>
                                                                                <textarea name="companybrief" class="form-control" rows="7" id="companybrief"></textarea>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <label class="control-label">Attach legal documents</label>
                                                                                <input name="documents" type="file" class="form-control">
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <label class="control-label">Areas of Supply</label>
                                                                                <input class="form-control" name="deliveryAreas" id="deliveryAreas" list="country">
                                                                                <datalist id="country">
                                                                                    <option>Choose option</option>
                                                                                    <?php
                                                                                    foreach ($cities as $city) {
                                                                                        echo "<option value='" . $city['name'] . "'>" . $city['name'] . "</option>";
                                                                                    }
                                                                                    ?>
                                                                                </datalist>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <label class="control-label">Payment Mode</label>
                                                                                <select id="card" name="card" class="form-control">
                                                                                    <option>Select</option>
                                                                                    <option value="All">All</option>
                                                                                    <option value="Credit Card">Credit Card</option>
                                                                                    <option value="Debit Card">Debit Card</option>
                                                                                    <option value="COD">COD</option>
                                                                                    <option value="Bank Transfer">Bank Transfer</option>
                                                                                </select>
                                                                            </div>
                                                                            <!--                                                                        <div class="col-md-12">
                                                                                                                                                        <label class="control-label">Payment Terms</label>
                                                                                                                                                        <input value="yes" type="checkbox" name="terms">
                                                                                                                                                    </div>-->
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
                                            </div>
                                            <br>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <a style="font-size: 25px"><?php echo $user->Name; ?>'s Activity</a>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div id="collapse1" class="panel-collapse collapse in">
                                                    <div class="panel-body">
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
                                                                                            <a href="<?php echo base_url() . "vendor/profile/deleteAddress/" . $address['id']; ?>" class="btn btn-danger btn-xs">Delete</a>
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
                            </div>
                        </div>
                    </div>
                    <!-- /page content --> 
                    <div class="clearfix"></div>

                </div>
                <!-- footer content -->
                <?php $this->load->view('vendor/partials/footer') ?>
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

    <?php $this->load->view('vendor/partials/assets-footer'); ?>

    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Custom Theme Scripts --> 
    <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script>
    <script>
        document.addEventListener("touchstart", function () {}, true);
    </script>
    <style>
        .hide{
            visibility: collapse;
        }
    </style>
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
    <script>
        $(function () {
            $('#categories').multiselect({
                includeSelectAllOption: true
            });
        });

        $('#categories').change(function () {
            var selectedValues = [];
            $("#categories :selected").each(function () {
                selectedValues.push($(this).val());
            });

            $.post("<?php echo base_url('vendor/home/getSubCatByMulCat/'); ?>",
                    {
                        category: JSON.stringify(selectedValues),
                    },
                    function (data, status) {
                        $('#subcategories').html(data);
                    });
        });
    </script>
</body>

</html>