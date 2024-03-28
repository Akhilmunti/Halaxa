<?php //echo '<pre>';print_r($user);exit;                                                                  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('social/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://foodlinked.com/irs/public/External/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://foodlinked.com/irs/public/External/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="https://foodlinked.com/irs/public/External/bower_components/select2/dist/css/select2.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="https://foodlinked.com/irs/public/External/dist/css/crm.min.css">
        <!-- bootstrap-progressbar -->
        <link href="https://foodlinked.com/irs/public/External/bower_components/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://foodlinked.com/irs/public/External/css/croppie.css" />

        <link rel="stylesheet" href="https://foodlinked.com/irs/public/External/css/switchery.min.css" rel="stylesheet">

        <!-- bootstrap-daterangepicker -->
        <link rel="stylesheet" href="https://foodlinked.com/irs/public/External/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <link rel="stylesheet" href="https://foodlinked.com/irs/public/External/datepicker/css/bootstrap-datepicker3.css" rel="stylesheet">

        <link rel="stylesheet" href="https://foodlinked.com/irs/public/External/stepper/css/nprogress.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="https://foodlinked.com/irs/public/External/plugins/iCheck/all.css">
        <link rel="stylesheet" href="https://foodlinked.com/irs/public/External/plugins/iCheck/flat/green.css">
        <link rel="stylesheet" href="https://foodlinked.com/irs/public/External/dist/css/gsdk-bootstrap-wizard.css">

        <link href="https://foodlinked.com/irs/public/External/pnotify/tost/css.css" rel="stylesheet">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <!-- DataTables -->
        <link rel="stylesheet" href="https://foodlinked.com/irs/public/External/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <style>
            label.error:not(.form-control) {
                color: #EB5E28;
                font-size: 0.8em;
            }
        </style>
        <style>
            .icon-logo{
                background-color: #b3b6b9;
                border-radius: 6px;
                width:56px;
                height:56px;
                margin-left:-10px;
            }
        </style>
    </head>
    <body class="nav-md">
        <div class="body">
            <div class="main_container">
                <!-- page content -->
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="title_left">
                            <h3 style="color: #ffffff" class="text-uppercase">
                                <?php
                                if (!empty($user->Company_name)) {
                                    echo $user->Company_name;
                                } else {
                                    echo $user->Username;
                                }
                                ?> Profile Details
                            </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                $sucess = $this->session->flashdata('result');
                                if (isset($sucess)) {
                                    ?>  
                                    <div class="alert alert-success">
                                        <?php echo $sucess ?>
                                    </div>                                            
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>User Profile 
                                        <small>
                                            <?php
                                            if (!empty($user->Company_name)) {
                                                echo $user->Company_name;
                                            } else {
                                                echo $user->Username;
                                            }
                                            ?>
                                        </small>
                                    </h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-md-2 col-sm-12 col-xs-12 profile_left">
                                        <div class="profile_img">
                                            <div id="crop-avatar">
                                                <!-- Current avatar -->
                                                <?php
                                                if (!empty($user->Photo)) {
                                                    $mProfileImage = base_url('assets/photo/') . $user->Photo;
                                                } else {
                                                    $mProfileImage = base_url('assets/images/user.png');
                                                }
                                                ?>
                                                <img class="img-responsive img-thumbnail avatar-view" src="<?php echo $mProfileImage; ?>" alt="<?php echo $user->Username; ?>" title="<?php echo $user->Company_name; ?>">
                                            </div>
                                        </div>
                                        <h3 class="text-uppercase"><?php echo $user->Name; ?></h3>

                                        <ul class="list-unstyled user_data">

                                            <?php if (!empty($irs_jsd['name'])) { ?>
                                                <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $irs_jsd['name']; ?>
                                                </li>
                                            <?php } ?>

                                            <li class="m-top-xs">
                                                <i class="fa fa-envelope user-profile-icon"></i>
                                                <a href="#"><?php echo $user->Email; ?></a>
                                            </li>

                                            <?php if (!empty($user->Address)) { ?>
                                                <li>
                                                    <i class="fa fa-home user-profile-icon"></i>  <?php echo $user->Address; ?>
                                                </li>
                                            <?php } ?>
                                        </ul>

<!--                                        <div class="sidebar-widget">
                                            <h4>Profile Completion</h4>
                                            <div class="gauge">
                                                <canvas id="canvas-preview"></canvas>
                                                <div id="minVal">0</div>
                                                <div id="maxVal">100</div>
                                                <div id="preview-textfield">0%</div>
                                            </div>
                                        </div>-->

                                    </div>
                                    <div class="col-md-10 col-sm-12 col-xs-12">

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a style="font-size: 20px">Profile Status</a>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="collapse2" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"
                                                             aria-valuenow="<?php echo $total . "%"; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $total . "%"; ?>">
                                                            <?php echo $total . "%"; ?> Complete
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <br>

                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#pro" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Professional</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#buyer" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Buyer</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#vendor" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Vendor</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#recruit" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Recruiter</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#basic" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Basic Details</a>
                                                </li>
                                            </ul>
                                            <div id="myTabContent" class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade in" id="buyer" aria-labelledby="buyer-tab">
                                                    <div class="panel-group">
                                                        <?php
                                                        if ($user->Company_name) {
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
                                                                <a style="font-size: 25px">Buyer Details</a>
                                                                <a href="<?php echo base_url(); ?>buyer/profile/edit_corporate/<?php echo $user->User_Id; ?>" class="btn btn-sm btn-success <?php echo $buttonEdit; ?>" style="float: right"><i class="fa fa-edit"></i> Edit Buyer Profile</a>
                                                                <a data-toggle="modal" data-target=".bs-example-modal-lg-buyer" class="btn btn-sm btn-success <?php echo $buttonAdd; ?>" style="float: right"><i class="fa fa-plus"></i> Add Buyer Profile</a>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div id="collapse1" class="panel-collapse collapse <?php echo $collapse; ?>">
                                                                <div class="panel-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <table class="table-striped table table-responsive">
                                                                                <tbody>
                                                                                    <?php if ($user->Company_name) {
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td>Company Name : <?php echo $user->Company_name; ?></td>
                                                                                        </tr>
                                                                                    <?php } ?>
                                                                                    <?php if ($user->Company_brief) {
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td>Company Brief : <?php echo $user->Company_brief; ?></td>
                                                                                        </tr>
                                                                                    <?php } ?>
                                                                                    <?php if ($user->category) {
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td>
                                                                                                Preferences : <?php echo $user->category ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                    <?php } ?>
                                                                                </tbody>
                                                                            </table> 
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <table class="table-striped table table-responsive">
                                                                                <tbody>
                                                                                    <?php if ($user->brand) {
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td>Brand : <?php echo $user->brand; ?></td>
                                                                                        </tr>
                                                                                    <?php } ?>
                                                                                    <?php if ($user->payment_mode) {
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td>
                                                                                                Payment Mode : 
                                                                                                <?php
                                                                                                $pmode = json_decode($user->payment_mode);
                                                                                                foreach ($pmode as $value) {
                                                                                                    echo $value . ",";
                                                                                                }
                                                                                                ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                    <?php } ?>
                                                                                    <?php if ($user->payment_structure) {
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td>Payment Structure : <?php echo $user->payment_structure; ?></td>
                                                                                        </tr>
                                                                                    <?php } ?>    
                                                                                </tbody>
                                                                            </table> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- modals -->
                                                            <div class="modal fade bs-example-modal-lg-buyer" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
                                                                            <h4 class="modal-title" id="myModalLabel">Setup Buyer Corporate Profile</h4>
                                                                        </div>
                                                                        <form id="cProfileForm" method="POST" action="<?php echo base_url() . "profile/addCorporateDetails"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">

                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <h4 class="text-center">Mandatory Fields</h4>
                                                                                        <hr>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <label class="control-label">Company Name*</label>
                                                                                            <input required="" name="companyname" type="text" class="form-control" placeholder="Enter Company Name">
                                                                                        </div>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <label class="control-label">Preferred Language*</label>
                                                                                            <select name="prelanguage" class="form-control" required="">
                                                                                                <option disabled="" value="">Choose Language</option>
                                                                                                <option value="Chinese">Chinese</option>
                                                                                                <option value="Spanish">Spanish</option>
                                                                                                <option value="English">English</option>
                                                                                                <option value="Arabic">Arabic</option>
                                                                                                <option value="Hindi">Hindi</option>
                                                                                                <option value="Bengali">Bengali</option>
                                                                                                <option value="Portuguese">Portuguese</option>
                                                                                                <option value="Russian">Russian</option>
                                                                                                <option value="Japanese">Japanese</option>
                                                                                                <option value="Lahnda">Lahnda</option>
                                                                                                <option value="Javanese">Javanese</option>
                                                                                                <option value="Turkish">Turkish</option>
                                                                                                <option value="Korean">Korean</option>
                                                                                                <option value="French">French</option>
                                                                                                <option value="German">German</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12">
                                                                                            <label class="control-label">Delivery Address*</label>
                                                                                            <textarea required="" name="deliveryaddress" class="form-control" rows="4" id="deliveryaddress"></textarea>
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12">
                                                                                            <label class="control-label">Company Brief*</label>
                                                                                            <textarea maxlength="350" required="" name="companybrief" class="form-control" rows="4" placeholder="Enter Brief Details"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <h4 class="text-center">Non-Mandatory Fields</h4>
                                                                                        <hr>
                                                                                        <div class="col-md-12 col-sm-12">
                                                                                            <label class="control-label">Designation</label>
                                                                                            <input name="designation" type="text" class="form-control" placeholder="Enter Designation">
                                                                                        </div>
                                                                                        <!--                                                                            <div class="col-md-12 col-sm-12">
                                                                                                                                                                        <label class="control-label">Preferrences</label>
                                                                                                                                                                        <select id="Preferrence" name="Preferrence" class="form-control">
                                                                                                                                                                            <option>Select</option>
                                                                                                                                                                            <option value="One">Preferrence One</option>
                                                                                                                                                                            <option value="Two">Preferrence Two</option>
                                                                                                                                                                        </select>
                                                                                                                                                                    </div>-->
                                                                                        <div class="col-md-12 col-sm-12">
                                                                                            <label class="control-label">Preferred location for purchase</label>
                                                                                            <select id="locations" name="locations" class="form-control">
                                                                                                <option>Select</option>
                                                                                                <?php
                                                                                                foreach ($locations as $loc) {
                                                                                                    echo "<option value='" . $loc['Location'] . "'>" . $loc['Location'] . "</option>";
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12">
                                                                                            <label class="control-label">Payment Mode</label>
                                                                                            <select id="card" name="card[]" class="form-control" multiple="">
                                                                                                <option value="Credit Card">Credit Card</option>
                                                                                                <option value="Debit Card">Debit Card</option>
                                                                                                <option value="COD">COD</option>
                                                                                                <option value="Bank Transfer">Bank Transfer</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <!--                                                                            <div class="col-md-12 col-sm-12">
                                                                                                                                                                        <label class="control-label">Payment Structure</label>
                                                                                                                                                                        <input type="text" name="paymentstructure" class="form-control" placeholder="Enter Payment Structure">
                                                                                                                                                                    </div>-->
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-success right-float">Submit</button>

                                                                                <button class="btn btn-primary" type="button" class="close" data-dismiss="modal">Cancel</button>
                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="vendor" aria-labelledby="vendor-tab">
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
                                                                                            <td>
                                                                                                Delivery Address : 
                                                                                                <?php
                                                                                                $pmode = json_decode($vendor_details->delivery_areas);
                                                                                                foreach ($pmode as $value) {
                                                                                                    echo $value . ",";
                                                                                                }
                                                                                                ?>
                                                                                            </td>
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
                                                                        </div
                                                                        <form id="cProfileForm" method="POST" action="<?php echo base_url() . "profile/addSellerDetails"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                                            <div class="modal-body">
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
                                                                                                <option disabled="" value="">Choose Language</option>
                                                                                                <option value="Chinese">Chinese</option>
                                                                                                <option value="Spanish">Spanish</option>
                                                                                                <option value="English">English</option>
                                                                                                <option value="Arabic">Arabic</option>
                                                                                                <option value="Hindi">Hindi</option>
                                                                                                <option value="Bengali">Bengali</option>
                                                                                                <option value="Portuguese">Portuguese</option>
                                                                                                <option value="Russian">Russian</option>
                                                                                                <option value="Japanese">Japanese</option>
                                                                                                <option value="Lahnda">Lahnda</option>
                                                                                                <option value="Javanese">Javanese</option>
                                                                                                <option value="Turkish">Turkish</option>
                                                                                                <option value="Korean">Korean</option>
                                                                                                <option value="French">French</option>
                                                                                                <option value="German">German</option>
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
                                                                                            <textarea maxlength="350" name="companybrief" class="form-control" rows="7" id="companybrief"></textarea>
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
                                                                                            <select id="card" name="card[]" class="form-control" multiple="">
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
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-primary" type="button" class="close" data-dismiss="modal">Cancel</button>
                                                                                <button type="submit" class="btn btn-success right-float">Submit</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $this->load->view('social/profile_types/recruitment_details'); ?>
                                                <div role="tabpanel" class="tab-pane active in fade" id="pro" aria-labelledby="recruit-tab">
                                                    <?php $this->load->view('social/profile_types/personal_details'); ?>
                                                    <?php $this->load->view('social/profile_types/edu_details'); ?>
                                                    <?php $this->load->view('social/profile_types/experience_details'); ?>
                                                    <?php $this->load->view('social/profile_types/project_details'); ?>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <a style="font-size: 25px">Certificate Details</a>
                                                            <a data-toggle="modal" data-target=".bs-example-modal-Certificate" class="btn btn-sm btn-success" style="float: right"><i class="fa fa-plus"></i> Add Certificate</a>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div id="collapse2" class="panel-collapse collapse in">
                                                            <div class="panel-body">
                                                                <?php
                                                                if (!empty($irs_js_cer)) {
                                                                    $iter = 0;
                                                                    foreach ($irs_js_cer as $key => $cer) {
                                                                        $iter++;
                                                                        ?>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <table class="table-striped table table-responsive">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                                                Certificate Name : <?php echo $cer['certificate_name']; ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                License No : <?php echo $cer['license_no']; ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                From Date  : <?php echo $cer['fromdate']; ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table> 
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <table class="table-striped table table-responsive">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Certificate Authorization : <?php echo $cer['certificate_authority']; ?>
                                                                                        </tr> 
                                                                                        <tr>
                                                                                            <td>Certificate URL : <?php echo $cer['certificate_url']; ?>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>To Date : <?php echo $cer['todate']; ?>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table> 
                                                                            </div>
                                                                            <hr>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            Data not found.
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                            <!-- Certificate modal -->
                                                            <div class="modal fade bs-example-modal-Certificate" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <form id="cProfileForm" method="POST" action="<?php echo base_url() . "profile/addJsCertificateData/"; ?><?php echo $job_seeker_id; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">

                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
                                                                                <h4 class="modal-title" id="myModalLabel">Certificate Details</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="row">    
                                                                                    <div class="form-group col-md-6">
                                                                                        <label for="">Certificate Name 
                                                                                            <span class="requerd">* 
                                                                                            </span>
                                                                                        </label>
                                                                                        <input type="text" class="form-control"  name="certificate_name"   id="certificate_name" placeholder="Certificate Name " required="">
                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label for="">Certificate Authorization 
                                                                                        </label>
                                                                                        <input type="text" class="form-control" id="certificate_authorization"  name="certificate_authorization" placeholder="Certificate Authorization">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-6">
                                                                                        <label for="">License No.
                                                                                            <span class="requerd">* 
                                                                                            </span>
                                                                                        </label>
                                                                                        <input required="" type="text" name="license_no"  id="license_no" class="form-control" placeholder="License No." >
                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label for="">Certificate URL 
                                                                                        </label>
                                                                                        <input type="text" name="certificate_url"  id="certificate_url" class="form-control" placeholder="Certificate URL" >
                                                                                    </div>  
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-6">
                                                                                        <label for="">From Date 
                                                                                            <span class="requerd">* 
                                                                                            </span>
                                                                                        </label>
                                                                                        <input class="form-control" id="yearfromaddctf" name="fromdate" placeholder="MM/YYYY" type="text" onChange="removeerroryearfromaddctf()" required=""/>
                                                                                        <span id="yearfromaddctf-error" class="error" for="yearfromaddctf">
                                                                                        </span>
                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label for="">To Date
                                                                                            <span class="requerd">* 
                                                                                            </span>
                                                                                        </label>
                                                                                        <input class="form-control" id="yeartoaddctf" name="todate" placeholder="MM/YYYY" type="text" onChange="removeerroryeartoaddctf()" required=""/>
                                                                                        <span id="yeartoaddctf-error" class="error" for="yeartoaddctf">
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-success right-float">Submit</button>
                                                                                <button class="btn btn-primary" type="button" class="close" data-dismiss="modal">Cancel</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div role="tabpanel" class="tab-pane fade" id="basic" aria-labelledby="recruit-tab">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <a style="font-size: 25px">Basic Details</a>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div id="collapse2" class="panel-collapse collapse in">
                                                            <div class="panel-body">
                                                                <form id="formThree" enctype="multipart/form-data" class="form-horizontal form-label-left" action="<?php echo base_url('profile/edit_save/') . $user->User_Id ?>" method="post">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name: </label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input value="<?php echo $user->Name; ?>" name="Name" type="text" class="form-control" placeholder="Name"  >
                                                                            <?php if (form_error('name')) { ?>

                                                                                <span class="form-error-message text-danger"><?php echo form_error('name'); ?></span>

                                                                            <?php } ?>

                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">  Email: </label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input value="<?php echo $user->Email; ?>" id="" name="Email" type="email" class="form-control" placeholder="Email" >
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">  Phone: </label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input value="<?php echo $user->Phone; ?>" id=" phone" name="Phone" type="number" class="form-control" placeholder="Phone">

                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">  Address: </label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input value="<?php echo $user->Address; ?>" id=" address" name="Address" type="text" class="form-control" placeholder="Address">

                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">  Photo: </label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input value="" id="address" name="Photo" type="file" />
                                                                            <input type="hidden" name="hidden_photo" value="<?php echo $user->Photo; ?>" />
                                                                            <img class="blah" src="<?php echo base_url(); ?>assets/photo/<?php echo $user->Photo; ?>" alt="your image" height="200" width="150" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="ln_solid"></div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                                            <!--  <button type="reset" class="btn btn-primary">Reset</button>-->
                                                                            <input type="submit" class="btn btn-success" value="Submit" />
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->
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
        <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- ./wrapper -->
        <script src="https://foodlinked.com/irs/public/External/bower_components/jquery/dist/jquery.min.js"></script>

        <script src="https://foodlinked.com/irs/public/External/assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://foodlinked.com/irs/public/External/assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
        <script src="https://foodlinked.com/irs/public/External/assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url('assets/vendors/gauge.js/dist/gauge.min.js'); ?>" type="text/javascript"></script>
        <script src="https://foodlinked.com/irs/public/External/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="https://foodlinked.com/irs/public/External/dist/js/crm.min.js"></script>
        <script src="https://foodlinked.com/irs/public/External/js/croppie.js"></script>
        <script src="https://foodlinked.com/irs/public/External/dist/js/gsdk-bootstrap-wizard.js"></script>
        <script src="https://foodlinked.com/irs/public/External/dist/js/jquery.validate.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="https://foodlinked.com/irs/public/External/dist/js/demo.js"></script>
        <!-- CK Editor -->
        <script src="https://foodlinked.com/irs/public/External/bower_components/ckeditor/ckeditor.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="https://foodlinked.com/irs/public/External/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Select2 -->
        <script src="https://foodlinked.com/irs/public/External/bower_components/select2/dist/js/select2.full.min.js"></script>
        <!-- InputMask -->
        <script src="https://foodlinked.com/irs/public/External/plugins/input-mask/jquery.inputmask.js"></script>
        <script src="https://foodlinked.com/irs/public/External/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="https://foodlinked.com/irs/public/External/plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <!-- date-range-picker -->
        <script src="https://foodlinked.com/irs/public/External/bower_components/moment/min/moment.min.js"></script>
        <!-- bootstrap color picker -->
        <script src="https://foodlinked.com/irs/public/External/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <!-- bootstrap time picker -->
        <script src="https://foodlinked.com/irs/public/External/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <!-- SlimScroll -->
        <script src="https://foodlinked.com/irs/public/External/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- iCheck 1.0.1 -->
        <script src="https://foodlinked.com/irs/public/External/plugins/iCheck/icheck.min.js"></script>
        <script src="https://foodlinked.com/irs/public/External/build/js/custom.min.js"></script>
        <script  src="https://foodlinked.com/irs/public/External/stepper/js/jquery.smartWizard.js"></script>    

        <script  src="https://foodlinked.com/irs/public/External/stepper/js/nprogress.js"></script>

        <script  src="https://foodlinked.com/irs/public/External/validator/validator.js"></script>

        <script src="https://foodlinked.com/irs/public/External/js/bootstrap-progressbar.min.js"></script>

        <!-- bootstrap-wysiwyg -->

        <script src="https://foodlinked.com/irs/public/External/js/bootstrap-wysiwyg.min.js"></script>

        <script src="https://foodlinked.com/irs/public/External/js/jquery.hotkeys.js"></script>

        <script src="https://foodlinked.com/irs/public/External/js/prettify.js"></script>

        <script src="https://foodlinked.com/irs/public/External/js/jquery.tagsinput.js"></script>

        <!-- Switchery -->

        <script src="https://foodlinked.com/irs/public/External/js/switchery.min.js"></script>

        <script src="https://cdnjs.com/libraries/Chart.js"></script>

        <script src="https://foodlinked.com/irs/public/External/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

        <script src="https://foodlinked.com/irs/public/External/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

        <script src="https://foodlinked.com/irs/public/External/datepicker/js/bootstrap-datepicker.min.js"></script>


        <style>
            .hide{
                visibility: collapse;
            }
        </style>
        <script>

                                                                                            $('#type0').change(function () {
                                                                                                $.post("<?php echo base_url('profile/getCourseByType'); ?>",
                                                                                                        {
                                                                                                            location: this.value,
                                                                                                        },
                                                                                                        function (data, status) {
                                                                                                            $('#courses').html(data);
                                                                                                        });
                                                                                            });

                                                                                            $('#courses').change(function () {
                                                                                                $.post("<?php echo base_url('profile/getStreamByCourse'); ?>",
                                                                                                        {
                                                                                                            location: this.value,
                                                                                                        },
                                                                                                        function (data, status) {
                                                                                                            $('#subcourses').html(data);
                                                                                                        });
                                                                                            });

                                                                                            $('#CountryAddEdu').change(function () {
                                                                                                $.post("<?php echo base_url('profile/getStateByCountry'); ?>",
                                                                                                        {
                                                                                                            location: this.value,
                                                                                                        },
                                                                                                        function (data, status) {
                                                                                                            $('#stateAddEdu').html(data);
                                                                                                        });
                                                                                            });

                                                                                            $('#stateAddEdu').change(function () {
                                                                                                $.post("<?php echo base_url('profile/getCityByState'); ?>",
                                                                                                        {
                                                                                                            location: this.value,
                                                                                                        },
                                                                                                        function (data, status) {
                                                                                                            $('#cityAddEdu').html(data);
                                                                                                        });
                                                                                            });
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
        <script>
            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()
            }
            )</script>
        <script>
            function isNumberKey(evt, id)
            {
                try {
                    var charCode = (evt.which) ? evt.which : event.keyCode;
                    if (charCode == 46) {
                        var txt = document.getElementById(id).value;
                        if (!(txt.indexOf(".") > -2)) {
                            return true;
                        }
                    }
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                        return false;
                    return true;
                } catch (w) {
                    alert(w);
                }
            }
        </script>
        <script>
            // WRITE THE VALIDATION SCRIPT.
            function isNumber(evt) {
                var iKeyCode = (evt.which) ? evt.which : evt.keyCode
                if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
                    return false;
                return true;
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
                $(".add-Project").click(function () {
                    $(".add4").html("");
                    var html = $(".copy-Project").html();
                    $(".add4").html(html);
                }
                );
                //here it will remove the current value of the remove button which has been pressed
                $("body").on("click", ".remove", function () {
                    console.log('remove click');
                    $(this).parents(".control-group").remove();
                    //$("#neweducation").remove();
                }
                );
            }
            );
        </script>
        <!-- Include Date Range Picker -->
        <script type="text/javascript">
            function validate_attachment() {
                var attachment_file = document.getElementById("attachment_file").value;
                var idxDot = attachment_file.lastIndexOf(".") + 1;
                var extFile = attachment_file.substr(idxDot, attachment_file.length).toLowerCase();
                if (extFile == "doc" || extFile == "docx" || extFile == "pdf" || extFile == "txt") {
                    //TO DO
                } else {
                    alert("Only doc,docx and pdf files are allowed!");
                    document.getElementById("attachment_file").value = '';
                }
            }
        </script>
        <script>
            function removeerrorsub() {
                document.getElementById('sub0-error').innerHTML = '';
            }
            function removeerrormedium0() {
                document.getElementById('medium0-error').innerHTML = '';
            }
            function removeerroryearto() {
                document.getElementById('yeartoaddexp-error').innerHTML = '';
            }
            function removeerroryearfrom() {
                document.getElementById('yearfromaddexp-error').innerHTML = '';
            }

            function removeerroryeartoeducation() {
                document.getElementById('yeartoaddedu-error').innerHTML = '';
            }
            function removeerroryearformeducation() {
                document.getElementById('yearfromaddedu-error').innerHTML = '';
            }

            function removeerroryearfromaddctf() {
                document.getElementById('yearfromaddctf-error').innerHTML = '';
            }
            function removeerroryeartoaddctf() {
                document.getElementById('yeartoaddctf-error').innerHTML = '';
            }
            function removeerroprojectfrom() {
                document.getElementById('yearfromaddpro-error').innerHTML = '';
            }
            function removeerroprojectto() {
                document.getElementById('yeartoaddpro-error').innerHTML = '';
            }

            function removeerrorcurrentposition() {
                document.getElementById('current_position-error').innerHTML = '';
            }
            function removeerroremplyment_type() {
                document.getElementById('emplyment_type-error').innerHTML = '';
            }
            function removeerrorcurrent_package() {
                document.getElementById('current_package-error').innerHTML = '';
            }
            function removeerrorexpected_package() {
                document.getElementById('expected_package-error').innerHTML = '';
            }
            function removeerrorNationality() {
                document.getElementById('Nationality-error').innerHTML = '';
            }
            function removeerrorcity() {
                document.getElementById('city-error').innerHTML = '';
            }
        </script>
        <!-- End Error remove for create Job Posting Page -->
        <script type="text/javascript">
            $('.to').datepicker({
                autoclose: true,
                minViewMode: 1,
                format: 'mm/yyyy'
            }
            ).on('changeDate', function (selected) {
                FromEndDate = new Date(selected.date.valueOf());
                FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
                $('.from').datepicker('setEndDate', FromEndDate);
            }
            );
        </script>
        <!-- Educational Details Date Start -->
        <script>
            var startDate;
            var FromEndDate;

            // var ToEndDate ;
            // ToEndDate.setDate(ToEndDate.getDate()+365);

            $('#yearfromaddedu').datepicker({

                minViewMode: 1,
                autoclose: true,
                format: 'mm/yyyy'
            })
                    .on('changeDate', function (selected) {
                        startDate = new Date(selected.date.valueOf());
                        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
                        $('#yeartoaddedu').datepicker('setStartDate', startDate);
                    });
            $('#yeartoaddedu')
                    .datepicker({

                        minViewMode: 1,
                        autoclose: true,
                        format: 'mm/yyyy'
                    })
                    .on('changeDate', function (selected) {
                        FromEndDate = new Date(selected.date.valueOf());
                        FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
                        $('#yearfromaddedu').datepicker('setEndDate', FromEndDate);
                    });


            //Educational Details Date End 
            //Experience Details Date Start

            $('#yearfromaddexp').datepicker({

                minViewMode: 1,
                autoclose: true,
                format: 'mm/yyyy'
            })
                    .on('changeDate', function (selected) {
                        startDate = new Date(selected.date.valueOf());
                        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
                        $('#yeartoaddexp').datepicker('setStartDate', startDate);
                    });
            $('#yeartoaddexp')
                    .datepicker({

                        minViewMode: 1,
                        autoclose: true,
                        format: 'mm/yyyy'
                    })
                    .on('changeDate', function (selected) {
                        FromEndDate = new Date(selected.date.valueOf());
                        FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
                        $('#yearfromaddexp').datepicker('setEndDate', FromEndDate);
                    });

            // Experience Details Date End 

            // Project Details Date Start


            $('#yearfromaddpro').datepicker({

                minViewMode: 1,
                autoclose: true,
                format: 'mm/yyyy'
            })
                    .on('changeDate', function (selected) {
                        startDate = new Date(selected.date.valueOf());
                        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
                        $('#yeartoaddpro').datepicker('setStartDate', startDate);
                    });
            $('#yeartoaddpro')
                    .datepicker({

                        minViewMode: 1,
                        autoclose: true,
                        format: 'mm/yyyy'
                    })
                    .on('changeDate', function (selected) {
                        FromEndDate = new Date(selected.date.valueOf());
                        FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
                        $('#yearfromaddpro').datepicker('setEndDate', FromEndDate);
                    });
            // Project Details Date End

            // Certificate Details Date Start 


            // var ToEndDate ;
            // ToEndDate.setDate(ToEndDate.getDate()+365);

            $('#yearfromaddctf').datepicker({

                minViewMode: 1,
                autoclose: true,
                format: 'mm/yyyy'
            })
                    .on('changeDate', function (selected) {
                        startDate = new Date(selected.date.valueOf());
                        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
                        $('#yeartoaddctf').datepicker('setStartDate', startDate);
                    });
            $('#yeartoaddctf')
                    .datepicker({

                        minViewMode: 1,
                        autoclose: true,
                        format: 'mm/yyyy'
                    })
                    .on('changeDate', function (selected) {
                        FromEndDate = new Date(selected.date.valueOf());
                        FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
                        $('#yearfromaddctf').datepicker('setEndDate', FromEndDate);
                    });
        </script>
        <!-- Certificate Details Date End -->
        <script>
            $(document).ready(function () {
                var date_input = $('input[name="DOB"]');
                //our date input has the name "date"
                var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
                date_input.datepicker({
                    format: 'mm/dd/yyyy',
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                }
                )
            }
            )
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
                $(".add-Profile").click(function () {
                    $(".add1").html("");
                    var html = $(".copy-Profile").html();
                    $(".add1").html(html);
                }
                );
                //here it will remove the current value of the remove button which has been pressed
                $("body").on("click", ".remove", function () {
                    console.log('remove click');
                    $(this).parents(".control-group").remove();
                    //$("#neweducation").remove();
                }
                );
            }
            );
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
                $(".add-Education").click(function () {
                    $(".add2").html("");
                    var html = $(".copy-Education").html();
                    $(".add2").html(html);
                }
                );
                //here it will remove the current value of the remove button which has been pressed
                $("body").on("click", ".remove", function () {
                    console.log('remove click');
                    $(this).parents(".control-group").remove();
                    //$("#neweducation").remove();
                }
                );
            }
            );
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
            //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
            $(".add-AddEducation").click(function () {
            var html = $(".copy-AddEducation").html();
                    $(".after-add-AddEducation").after(html);
            }
            );
                    //here it will remove the current value of the remove button which has been pressed                 $("body").on("click", ".removeAddEducation", function () {
                    console.log('remove click');
                    $(this).parents(".control-group").remove();
                    //$("#neweducation").remove();
            }
            );
            }
            );
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
                $(".add-more").click(function () {
                    var html = $(".copy-fields").html();
                    $(".after-add-more").after(html);
                }
                );
                //here it will remove the current value of the remove button which has been pressed
                $("body").on("click", ".remove", function () {
                    console.log('remove click');
                    $(this).parents(".control-group").remove();
                    //$("#neweducation").remove();
                }
                );
            }
            );
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
                $(".add-Experience").click(function () {
                    $(".add3").html("");
                    var html = $(".copy-Experience").html();
                    $(".add3").html(html);
                }
                );
                //here it will remove the current value of the remove button which has been pressed    
                $("body").on("click", ".remove", function () {
                    console.log('remove click');
                    $(this).parents(".control-group").remove();
                    //$("#neweducation").remove();
                }
                );
            }
            );
        </script>
        <script>
//            $(document).ready(function () {
//                var mTotal = '<?php echo $total; ?>';
//                var opts = {
//                    lines: 12, // The number of lines to draw
//                    angle: 0, // The span of the gauge arc
//                    lineWidth: 0.46, // The line thickness
//                    pointer: {
//                        length: 0.68, // The radius of the inner circle
//                        strokeWidth: 0.035, // The thickness
//                        color: '#424242' // Fill color
//                    },
//                    limitMax: false, // If true, the pointer will not go past the end of the gauge
//                    colorStart: '#363636', // Colors
//                    colorStop: '#03A9F4', // just experiment with them
//                    strokeColor: '#f5f5f5',
//                    // to see which ones work best for you
//                    generateGradient: true,
//                    highDpiSupport: true     // High resolution support
//                };
//                console.log(document.getElementById('maxVal').textContent);
//                var target = document.getElementById('canvas-preview'); // your canvas element
//                var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
//                gauge.maxValue = document.getElementById('maxVal').textContent; // set max gauge value
//                gauge.animationSpeed = 28; // set animation speed (32 is default value)
//                gauge.set(mTotal);
//                gauge.setTextField(document.getElementById("preview-textfield"));
//            });
        </script>
    </body>

</html>