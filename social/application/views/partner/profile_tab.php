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
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="https://foodlinked.com/irs/public/External/dist/css/skins/skin-green.min.css">
        <link rel="stylesheet" href="https://foodlinked.com/irs/public/External/css/switchery.min.css" rel="stylesheet">

        <!-- bootstrap-daterangepicker -->
        <link rel="stylesheet" href="https://foodlinked.com/irs/public/External/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <link rel="stylesheet" href="https://foodlinked.com/irs/public/External/datepicker/css/bootstrap-datepicker3.css" rel="stylesheet">

        <link rel="stylesheet" href="https://foodlinked.com/irs/public/External/build/css/custom.min.css">
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
    <body class="body">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Profile Details</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
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
                                                                                <td>Payment Mode : <?php echo $user->payment_mode; ?></td>
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
                                                            <div class="modal-body">
                                                                <form id="cProfileForm" method="POST" action="<?php echo base_url() . "profile/addCorporateDetails"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
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
                                                                                    <option value="0">Choose Language</option>
                                                                                    <option value="Kannada">Kannada</option>
                                                                                    <option value="English">English</option>
                                                                                    <option value="Telugu">Telugu</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <label class="control-label">Delivery Address*</label>
                                                                                <textarea required="" name="deliveryaddress" class="form-control" rows="4" id="deliveryaddress"></textarea>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <label class="control-label">Company Brief*</label>
                                                                                <textarea required="" name="companybrief" class="form-control" rows="4" placeholder="Enter Brief Details"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <h4 class="text-center">Non-Mandatory Fields</h4>
                                                                            <hr>
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <label class="control-label">Designation</label>
                                                                                <input name="designation" type="text" class="form-control" placeholder="Enter Designation">
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <label class="control-label">Preferrences</label>
                                                                                <select id="Preferrence" name="Preferrence" class="form-control">
                                                                                    <option>Select</option>
                                                                                    <option value="One">Preferrence One</option>
                                                                                    <option value="Two">Preferrence Two</option>
                                                                                </select>
                                                                            </div>
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
                                                                                <select id="card" name="card" class="form-control">
                                                                                    <option>Select</option>
                                                                                    <option value="All">All</option>
                                                                                    <option value="Credit Card">Credit Card</option>
                                                                                    <option value="Debit Card">Debit Card</option>
                                                                                    <option value="COD">COD</option>
                                                                                    <option value="Bank Transfer">Bank Transfer</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <label class="control-label">Payment Structure</label>
                                                                                <input type="text" name="paymentstructure" class="form-control" placeholder="Enter Payment Structure">
                                                                            </div>
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
                                                                                <td>Payment Mode : <?php echo $vendor_details->payment_mode; ?></td>
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
                                                                                <td>Delivery Address : <?php echo $vendor_details->delivery_areas; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        <?php if ($vendor_details->delivery_areas) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>Payment Mode : <?php echo $vendor_details->payment_mode; ?></td>
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
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="recruit" aria-labelledby="recruit-tab">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a style="font-size: 25px">Recruiter Details</a>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="collapse2" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <?php if ($user->Company_name) {
                                                                        ?>
                                                                        <tr>
                                                                            <td>Name : <?php echo $user->Company_name; ?></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                    <tr>
                                                                        <td>
                                                                            Company Type : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Pincode  : 
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Website : 
                                                                    </tr> 
                                                                    <tr>
                                                                        <td>Address : 
                                                                    </tr>
                                                                    <tr>
                                                                        <td>About Company : 
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane active in fade" id="pro" aria-labelledby="recruit-tab">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a style="font-size: 25px">Personal Details</a>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="collapse1" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <?php if ($irs_details['name']) {
                                                                        ?>
                                                                        <tr>
                                                                            <td>Name : <?php echo $irs_details['name']; ?></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                    <?php if ($irs_details['']) {
                                                                        ?>
                                                                        <tr>
                                                                            <td>Marital Status: No Data
                                                                        </tr>
                                                                    <?php } ?>
                                                                    <?php if ($user->category) {
                                                                        ?>
                                                                        <tr>
                                                                            <td>
                                                                                Nationality : No Data
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                    <tr>
                                                                        <td>
                                                                            Personal Breif : No Data
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Website/Link : No Data
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            CV : No Data
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <?php if ($user->Email) {
                                                                        ?>
                                                                        <tr>
                                                                            <td>Email : <?php echo $user->Email; ?></td>
                                                                        </tr>
                                                                    <?php } ?>

                                                                    <tr>
                                                                        <td>DOB : No Data
                                                                    </tr>   
                                                                    <tr>
                                                                        <td>Gender : Male
                                                                    </tr> 
                                                                    <tr>
                                                                        <td>Current Address : NO Data
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Show to employer only : NO
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                    </div>
                                                    <div class="modal fade bs-example-modal-Profile">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">
                                                                        <span aria-hidden="true">×
                                                                        </span>
                                                                    </button>
                                                                    <h4 class="modal-title" id="myModalLabel">Personal Details
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body">   

                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input type = "hidden" name="_token" value="REHyK8ZURP7MsyNjw3w82MnLqTujSZ2aBl5xD2Kq">
                                                                                <label for="">Name 
                                                                                    <span class="requerd">* 
                                                                                    </span>
                                                                                </label>
                                                                                <input type="text" class="form-control"  name="name" id="name" placeholder="Name" value="<?php echo $irs_details['name']; ?>" required>
                                                                                <div id="name-error">
                                                                                </div>
                                                                            </div> 
                                                                            <div class="form-group">
                                                                                <label for="">Marital Status 
                                                                                    <span class="requerd">* 
                                                                                    </span>
                                                                                </label>
                                                                                <select class="form-control select2" style="width:100%" name="marital" id="marital" required>
                                                                                    <option value="" >Select Maritial Status</option>
                                                                                    <option value="M" >Married</option> 
                                                                                    <option value="S" selected>Single</option></select>
                                                                                <div id="phone-error">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="">Email 
                                                                                    <span class="requerd">* 
                                                                                    </span>
                                                                                </label>
                                                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $irs_details['email']; ?>" required readonly>
                                                                                <div id="email-error">
                                                                                </div>
                                                                            </div> 
                                                                            <div class="form-group">
                                                                                <label for="">DOB 
                                                                                    <span class="requerd">* 
                                                                                    </span>
                                                                                </label>
                                                                                <input class="form-control" id="date" value="" name="DOB" placeholder="MM/DD/YYYY" required/>
                                                                                <div id="date-error">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            <div class="panel-body" align="center">
                                                                                <div class="picture-container">
                                                                                    <div class="picture">
                                                                                        <div id="wizardPicturePreview">
                                                                                            <img src="https://foodlinked.com/irs/storage/app/public/jobseeker/"  class="picture-src" id="wizardPicturePreview" title=""/>
                                                                                        </div>
                                                                                        <input type="file" name="employer_logo" id="employer_logo" accept=".jpg,.JPG,.JPEG,.PNG,.jpeg,.png" >


                                                                                        <h2>Profile Picture
                                                                                        </h2>
                                                                                    </div>
                                                                                </div>      
                                                                            </div>
                                                                            <div class=" col-md-2">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">

                                                                        <div class="form-group col-md-4">
                                                                            <label for="">Gender 
                                                                                <span class="requerd">* 
                                                                                </span>
                                                                            </label>
                                                                            <p style="margin-top: 5px;">
                                                                                Male 
                                                                                <input type="radio" class="flat" name="gender" id="genderM" value="M" 
                                                                                       checked required="" data-parsley-multiple="gender" style="position: absolute; opacity: 0;">&nbsp;&nbsp; 
                                                                                Female
                                                                                <input type="radio" class="flat" name="gender" id="genderF" value="F" 
                                                                                       data-parsley-multiple="gender" style="position: absolute; opacity: 0;">
                                                                            </p>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="country">Nationality 
                                                                                <span class="requerd">* 
                                                                                </span>
                                                                            </label>
                                                                            <select class="form-control select2" id="country"   name="country" style="width:100%" required>
                                                                                <option value="">Select Nationality
                                                                                </option>
                                                                                <option value="2" 
                                                                                        >
                                                                                    Afghanistan                  </option>
                                                                                <option value="5" 
                                                                                        >
                                                                                    Albania                  </option>
                                                                                <option value="62" 
                                                                                        >
                                                                                    Algeria                  </option>
                                                                                <option value="11" 
                                                                                        >
                                                                                    American Samoa                  </option>
                                                                                <option value="6" 
                                                                                        >
                                                                                    Andorra                  </option>
                                                                                <option value="3" 
                                                                                        >
                                                                                    Angola                  </option>
                                                                                <option value="4" 
                                                                                        >
                                                                                    Anguilla                  </option>
                                                                                <option value="12" 
                                                                                        >
                                                                                    Antarctica                  </option>
                                                                                <option value="14" 
                                                                                        >
                                                                                    Antigua and Barbuda                  </option>
                                                                                <option value="9" 
                                                                                        >
                                                                                    Argentina                  </option>
                                                                                <option value="10" 
                                                                                        >
                                                                                    Armenia                  </option>
                                                                                <option value="1" 
                                                                                        >
                                                                                    Aruba                  </option>
                                                                                <option value="15" 
                                                                                        >
                                                                                    Australia                  </option>
                                                                                <option value="16" 
                                                                                        >
                                                                                    Austria                  </option>
                                                                                <option value="17" 
                                                                                        >
                                                                                    Azerbaijan                  </option>
                                                                                <option value="25" 
                                                                                        >
                                                                                    Bahamas                  </option>
                                                                                <option value="24" 
                                                                                        >
                                                                                    Bahrain                  </option>
                                                                                <option value="22" 
                                                                                        >
                                                                                    Bangladesh                  </option>
                                                                                <option value="32" 
                                                                                        >
                                                                                    Barbados                  </option>
                                                                                <option value="27" 
                                                                                        >
                                                                                    Belarus                  </option>
                                                                                <option value="19" 
                                                                                        >
                                                                                    Belgium                  </option>
                                                                                <option value="28" 
                                                                                        >
                                                                                    Belize                  </option>
                                                                                <option value="20" 
                                                                                        >
                                                                                    Benin                  </option>
                                                                                <option value="29" 
                                                                                        >
                                                                                    Bermuda                  </option>
                                                                                <option value="34" 
                                                                                        >
                                                                                    Bhutan                  </option>
                                                                                <option value="30" 
                                                                                        >
                                                                                    Bolivia                  </option>
                                                                                <option value="26" 
                                                                                        >
                                                                                    Bosnia and Herzegovina                  </option>
                                                                                <option value="36" 
                                                                                        >
                                                                                    Botswana                  </option>
                                                                                <option value="35" 
                                                                                        >
                                                                                    Bouvet Island                  </option>
                                                                                <option value="31" 
                                                                                        >
                                                                                    Brazil                  </option>
                                                                                <option value="101" 
                                                                                        >
                                                                                    British Indian Ocean Territory                  </option>
                                                                                <option value="33" 
                                                                                        >
                                                                                    Brunei                  </option>
                                                                                <option value="23" 
                                                                                        >
                                                                                    Bulgaria                  </option>
                                                                                <option value="21" 
                                                                                        >
                                                                                    Burkina Faso                  </option>
                                                                                <option value="18" 
                                                                                        >
                                                                                    Burundi                  </option>
                                                                                <option value="114" 
                                                                                        >
                                                                                    Cambodia                  </option>
                                                                                <option value="44" 
                                                                                        >
                                                                                    Cameroon                  </option>
                                                                                <option value="38" 
                                                                                        >
                                                                                    Canada                  </option>
                                                                                <option value="50" 
                                                                                        >
                                                                                    Cape Verde                  </option>
                                                                                <option value="54" 
                                                                                        >
                                                                                    Cayman Islands                  </option>
                                                                                <option value="43" 
                                                                                        >
                                                                                    CÃƒÆ’Ã‚Â´te dÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ                  </option>
                                                                                <option value="37" 
                                                                                        >
                                                                                    Central African Republic                  </option>
                                                                                <option value="206" 
                                                                                        >
                                                                                    Chad                  </option>
                                                                                <option value="41" 
                                                                                        >
                                                                                    Chile                  </option>
                                                                                <option value="42" 
                                                                                        >
                                                                                    China                  </option>
                                                                                <option value="53" 
                                                                                        >
                                                                                    Christmas Island                  </option>
                                                                                <option value="39" 
                                                                                        >
                                                                                    Cocos (Keeling) Islands                  </option>
                                                                                <option value="48" 
                                                                                        >
                                                                                    Colombia                  </option>
                                                                                <option value="49" 
                                                                                        >
                                                                                    Comoros                  </option>
                                                                                <option value="46" 
                                                                                        >
                                                                                    Congo                  </option>
                                                                                <option value="45" 
                                                                                        >
                                                                                    Congo, The Democratic Republic                  </option>
                                                                                <option value="47" 
                                                                                        >
                                                                                    Cook Islands                  </option>
                                                                                <option value="51" 
                                                                                        >
                                                                                    Costa Rica                  </option>
                                                                                <option value="96" 
                                                                                        >
                                                                                    Croatia                  </option>
                                                                                <option value="52" 
                                                                                        >
                                                                                    Cuba                  </option>
                                                                                <option value="55" 
                                                                                        >
                                                                                    Cyprus                  </option>
                                                                                <option value="56" 
                                                                                        >
                                                                                    Czech Republic                  </option>
                                                                                <option value="60" 
                                                                                        >
                                                                                    Denmark                  </option>
                                                                                <option value="58" 
                                                                                        >
                                                                                    Djibouti                  </option>
                                                                                <option value="59" 
                                                                                        >
                                                                                    Dominica                  </option>
                                                                                <option value="61" 
                                                                                        >
                                                                                    Dominican Republic                  </option>
                                                                                <option value="212" 
                                                                                        >
                                                                                    East Timor                  </option>
                                                                                <option value="63" 
                                                                                        >
                                                                                    Ecuador                  </option>
                                                                                <option value="64" 
                                                                                        >
                                                                                    Egypt                  </option>
                                                                                <option value="193" 
                                                                                        >
                                                                                    El Salvador                  </option>
                                                                                <option value="85" 
                                                                                        >
                                                                                    Equatorial Guinea                  </option>
                                                                                <option value="65" 
                                                                                        >
                                                                                    Eritrea                  </option>
                                                                                <option value="68" 
                                                                                        >
                                                                                    Estonia                  </option>
                                                                                <option value="69" 
                                                                                        >
                                                                                    Ethiopia                  </option>
                                                                                <option value="72" 
                                                                                        >
                                                                                    Falkland Islands                  </option>
                                                                                <option value="74" 
                                                                                        >
                                                                                    Faroe Islands                  </option>
                                                                                <option value="71" 
                                                                                        >
                                                                                    Fiji Islands                  </option>
                                                                                <option value="70" 
                                                                                        >
                                                                                    Finland                  </option>
                                                                                <option value="73" 
                                                                                        >
                                                                                    France                  </option>
                                                                                <option value="90" 
                                                                                        >
                                                                                    French Guiana                  </option>
                                                                                <option value="178" 
                                                                                        >
                                                                                    French Polynesia                  </option>
                                                                                <option value="13" 
                                                                                        >
                                                                                    French Southern territories                  </option>
                                                                                <option value="76" 
                                                                                        >
                                                                                    Gabon                  </option>
                                                                                <option value="83" 
                                                                                        >
                                                                                    Gambia                  </option>
                                                                                <option value="78" 
                                                                                        >
                                                                                    Georgia                  </option>
                                                                                <option value="57" 
                                                                                        >
                                                                                    Germany                  </option>
                                                                                <option value="79" 
                                                                                        >
                                                                                    Ghana                  </option>
                                                                                <option value="80" 
                                                                                        >
                                                                                    Gibraltar                  </option>
                                                                                <option value="86" 
                                                                                        >
                                                                                    Greece                  </option>
                                                                                <option value="88" 
                                                                                        >
                                                                                    Greenland                  </option>
                                                                                <option value="87" 
                                                                                        >
                                                                                    Grenada                  </option>
                                                                                <option value="82" 
                                                                                        >
                                                                                    Guadeloupe                  </option>
                                                                                <option value="91" 
                                                                                        >
                                                                                    Guam                  </option>
                                                                                <option value="89" 
                                                                                        >
                                                                                    Guatemala                  </option>
                                                                                <option value="81" 
                                                                                        >
                                                                                    Guinea                  </option>
                                                                                <option value="84" 
                                                                                        >
                                                                                    Guinea-Bissau                  </option>
                                                                                <option value="92" 
                                                                                        >
                                                                                    Guyana                  </option>
                                                                                <option value="97" 
                                                                                        >
                                                                                    Haiti                  </option>
                                                                                <option value="94" 
                                                                                        >
                                                                                    Heard Island and McDonald Isla                  </option>
                                                                                <option value="226" 
                                                                                        >
                                                                                    Holy See (Vatican City State)                  </option>
                                                                                <option value="95" 
                                                                                        >
                                                                                    Honduras                  </option>
                                                                                <option value="93" 
                                                                                        >
                                                                                    Hong Kong                  </option>
                                                                                <option value="98" 
                                                                                        >
                                                                                    Hungary                  </option>
                                                                                <option value="105" 
                                                                                        >
                                                                                    Iceland                  </option>
                                                                                <option value="100" 
                                                                                        >
                                                                                    India                  </option>
                                                                                <option value="99" 
                                                                                        >
                                                                                    Indonesia                  </option>
                                                                                <option value="103" 
                                                                                        >
                                                                                    Iran                  </option>
                                                                                <option value="104" 
                                                                                        >
                                                                                    Iraq                  </option>
                                                                                <option value="102" 
                                                                                        >
                                                                                    Ireland                  </option>
                                                                                <option value="106" 
                                                                                        >
                                                                                    Israel                  </option>
                                                                                <option value="107" 
                                                                                        >
                                                                                    Italy                  </option>
                                                                                <option value="108" 
                                                                                        >
                                                                                    Jamaica                  </option>
                                                                                <option value="110" 
                                                                                        >
                                                                                    Japan                  </option>
                                                                                <option value="109" 
                                                                                        >
                                                                                    Jordan                  </option>
                                                                                <option value="111" 
                                                                                        >
                                                                                    Kazakstan                  </option>
                                                                                <option value="112" 
                                                                                        >
                                                                                    Kenya                  </option>
                                                                                <option value="115" 
                                                                                        >
                                                                                    Kiribati                  </option>
                                                                                <option value="118" 
                                                                                        >
                                                                                    Kuwait                  </option>
                                                                                <option value="113" 
                                                                                        >
                                                                                    Kyrgyzstan                  </option>
                                                                                <option value="119" 
                                                                                        >
                                                                                    Laos                  </option>
                                                                                <option value="129" 
                                                                                        >
                                                                                    Latvia                  </option>
                                                                                <option value="120" 
                                                                                        >
                                                                                    Lebanon                  </option>
                                                                                <option value="126" 
                                                                                        >
                                                                                    Lesotho                  </option>
                                                                                <option value="121" 
                                                                                        >
                                                                                    Liberia                  </option>
                                                                                <option value="122" 
                                                                                        >
                                                                                    Libyan Arab Jamahiriya                  </option>
                                                                                <option value="124" 
                                                                                        >
                                                                                    Liechtenstein                  </option>
                                                                                <option value="127" 
                                                                                        >
                                                                                    Lithuania                  </option>
                                                                                <option value="128" 
                                                                                        >
                                                                                    Luxembourg                  </option>
                                                                                <option value="130" 
                                                                                        >
                                                                                    Macao                  </option>
                                                                                <option value="138" 
                                                                                        >
                                                                                    Macedonia                  </option>
                                                                                <option value="134" 
                                                                                        >
                                                                                    Madagascar                  </option>
                                                                                <option value="149" 
                                                                                        >
                                                                                    Malawi                  </option>
                                                                                <option value="150" 
                                                                                        >
                                                                                    Malaysia                  </option>
                                                                                <option value="135" 
                                                                                        >
                                                                                    Maldives                  </option>
                                                                                <option value="139" 
                                                                                        >
                                                                                    Mali                  </option>
                                                                                <option value="140" 
                                                                                        >
                                                                                    Malta                  </option>
                                                                                <option value="137" 
                                                                                        >
                                                                                    Marshall Islands                  </option>
                                                                                <option value="147" 
                                                                                        >
                                                                                    Martinique                  </option>
                                                                                <option value="145" 
                                                                                        >
                                                                                    Mauritania                  </option>
                                                                                <option value="148" 
                                                                                        >
                                                                                    Mauritius                  </option>
                                                                                <option value="151" 
                                                                                        >
                                                                                    Mayotte                  </option>
                                                                                <option value="136" 
                                                                                        >
                                                                                    Mexico                  </option>
                                                                                <option value="75" 
                                                                                        >
                                                                                    Micronesia, Federated States o                  </option>
                                                                                <option value="133" 
                                                                                        >
                                                                                    Moldova                  </option>
                                                                                <option value="132" 
                                                                                        >
                                                                                    Monaco                  </option>
                                                                                <option value="142" 
                                                                                        >
                                                                                    Mongolia                  </option>
                                                                                <option value="146" 
                                                                                        >
                                                                                    Montserrat                  </option>
                                                                                <option value="131" 
                                                                                        >
                                                                                    Morocco                  </option>
                                                                                <option value="144" 
                                                                                        >
                                                                                    Mozambique                  </option>
                                                                                <option value="141" 
                                                                                        >
                                                                                    Myanmar                  </option>
                                                                                <option value="152" 
                                                                                        >
                                                                                    Namibia                  </option>
                                                                                <option value="162" 
                                                                                        >
                                                                                    Nauru                  </option>
                                                                                <option value="161" 
                                                                                        >
                                                                                    Nepal                  </option>
                                                                                <option value="159" 
                                                                                        >
                                                                                    Netherlands                  </option>
                                                                                <option value="7" 
                                                                                        >
                                                                                    Netherlands Antilles                  </option>
                                                                                <option value="153" 
                                                                                        >
                                                                                    New Caledonia                  </option>
                                                                                <option value="163" 
                                                                                        >
                                                                                    New Zealand                  </option>
                                                                                <option value="157" 
                                                                                        >
                                                                                    Nicaragua                  </option>
                                                                                <option value="154" 
                                                                                        >
                                                                                    Niger                  </option>
                                                                                <option value="156" 
                                                                                        >
                                                                                    Nigeria                  </option>
                                                                                <option value="158" 
                                                                                        >
                                                                                    Niue                  </option>
                                                                                <option value="155" 
                                                                                        >
                                                                                    Norfolk Island                  </option>
                                                                                <option value="174" 
                                                                                        >
                                                                                    North Korea                  </option>
                                                                                <option value="143" 
                                                                                        >
                                                                                    Northern Mariana Islands                  </option>
                                                                                <option value="160" 
                                                                                        >
                                                                                    Norway                  </option>
                                                                                <option value="164" 
                                                                                        >
                                                                                    Oman                  </option>
                                                                                <option value="165" 
                                                                                        >
                                                                                    Pakistan                  </option>
                                                                                <option value="170" 
                                                                                        >
                                                                                    Palau                  </option>
                                                                                <option value="177" 
                                                                                        >
                                                                                    Palestine                  </option>
                                                                                <option value="166" 
                                                                                        >
                                                                                    Panama                  </option>
                                                                                <option value="171" 
                                                                                        >
                                                                                    Papua New Guinea                  </option>
                                                                                <option value="176" 
                                                                                        >
                                                                                    Paraguay                  </option>
                                                                                <option value="168" 
                                                                                        >
                                                                                    Peru                  </option>
                                                                                <option value="169" 
                                                                                        >
                                                                                    Philippines                  </option>
                                                                                <option value="167" 
                                                                                        >
                                                                                    Pitcairn                  </option>
                                                                                <option value="172" 
                                                                                        >
                                                                                    Poland                  </option>
                                                                                <option value="175" 
                                                                                        >
                                                                                    Portugal                  </option>
                                                                                <option value="173" 
                                                                                        >
                                                                                    Puerto Rico                  </option>
                                                                                <option value="179" 
                                                                                        >
                                                                                    Qatar                  </option>
                                                                                <option value="180" 
                                                                                        >
                                                                                    RÃƒÆ’Ã‚Â©union                  </option>
                                                                                <option value="181" 
                                                                                        >
                                                                                    Romania                  </option>
                                                                                <option value="182" 
                                                                                        >
                                                                                    Russian Federation                  </option>
                                                                                <option value="183" 
                                                                                        >
                                                                                    Rwanda                  </option>
                                                                                <option value="189" 
                                                                                        >
                                                                                    Saint Helena                  </option>
                                                                                <option value="116" 
                                                                                        >
                                                                                    Saint Kitts and Nevis                  </option>
                                                                                <option value="123" 
                                                                                        >
                                                                                    Saint Lucia                  </option>
                                                                                <option value="196" 
                                                                                        >
                                                                                    Saint Pierre and Miquelon                  </option>
                                                                                <option value="227" 
                                                                                        >
                                                                                    Saint Vincent and the Grenadin                  </option>
                                                                                <option value="234" 
                                                                                        >
                                                                                    Samoa                  </option>
                                                                                <option value="194" 
                                                                                        >
                                                                                    San Marino                  </option>
                                                                                <option value="197" 
                                                                                        >
                                                                                    Sao Tome and Principe                  </option>
                                                                                <option value="184" 
                                                                                        >
                                                                                    Saudi Arabia                  </option>
                                                                                <option value="186" 
                                                                                        >
                                                                                    Senegal                  </option>
                                                                                <option value="203" 
                                                                                        >
                                                                                    Seychelles                  </option>
                                                                                <option value="192" 
                                                                                        >
                                                                                    Sierra Leone                  </option>
                                                                                <option value="187" 
                                                                                        >
                                                                                    Singapore                  </option>
                                                                                <option value="199" 
                                                                                        >
                                                                                    Slovakia                  </option>
                                                                                <option value="200" 
                                                                                        >
                                                                                    Slovenia                  </option>
                                                                                <option value="191" 
                                                                                        >
                                                                                    Solomon Islands                  </option>
                                                                                <option value="195" 
                                                                                        >
                                                                                    Somalia                  </option>
                                                                                <option value="237" 
                                                                                        >
                                                                                    South Africa                  </option>
                                                                                <option value="188" 
                                                                                        >
                                                                                    South Georgia and the South Sa                  </option>
                                                                                <option value="117" 
                                                                                        >
                                                                                    South Korea                  </option>
                                                                                <option value="67" 
                                                                                        >
                                                                                    Spain                  </option>
                                                                                <option value="125" 
                                                                                        >
                                                                                    Sri Lanka                  </option>
                                                                                <option value="185" 
                                                                                        >
                                                                                    Sudan                  </option>
                                                                                <option value="198" 
                                                                                        >
                                                                                    Suriname                  </option>
                                                                                <option value="190" 
                                                                                        >
                                                                                    Svalbard and Jan Mayen                  </option>
                                                                                <option value="202" 
                                                                                        >
                                                                                    Swaziland                  </option>
                                                                                <option value="201" 
                                                                                        >
                                                                                    Sweden                  </option>
                                                                                <option value="40" 
                                                                                        >
                                                                                    Switzerland                  </option>
                                                                                <option value="204" 
                                                                                        >
                                                                                    Syria                  </option>
                                                                                <option value="218" 
                                                                                        >
                                                                                    Taiwan                  </option>
                                                                                <option value="209" 
                                                                                        >
                                                                                    Tajikistan                  </option>
                                                                                <option value="219" 
                                                                                        >
                                                                                    Tanzania                  </option>
                                                                                <option value="208" 
                                                                                        >
                                                                                    Thailand                  </option>
                                                                                <option value="207" 
                                                                                        >
                                                                                    Togo                  </option>
                                                                                <option value="210" 
                                                                                        >
                                                                                    Tokelau                  </option>
                                                                                <option value="213" 
                                                                                        >
                                                                                    Tonga                  </option>
                                                                                <option value="214" 
                                                                                        >
                                                                                    Trinidad and Tobago                  </option>
                                                                                <option value="215" 
                                                                                        >
                                                                                    Tunisia                  </option>
                                                                                <option value="216" 
                                                                                        >
                                                                                    Turkey                  </option>
                                                                                <option value="211" 
                                                                                        >
                                                                                    Turkmenistan                  </option>
                                                                                <option value="205" 
                                                                                        >
                                                                                    Turks and Caicos Islands                  </option>
                                                                                <option value="217" 
                                                                                        >
                                                                                    Tuvalu                  </option>
                                                                                <option value="220" 
                                                                                        >
                                                                                    Uganda                  </option>
                                                                                <option value="221" 
                                                                                        >
                                                                                    Ukraine                  </option>
                                                                                <option value="8" 
                                                                                        >
                                                                                    United Arab Emirates                  </option>
                                                                                <option value="77" 
                                                                                        >
                                                                                    United Kingdom                  </option>
                                                                                <option value="224" 
                                                                                        >
                                                                                    United States                  </option>
                                                                                <option value="222" 
                                                                                        >
                                                                                    United States Minor Outlying I                  </option>
                                                                                <option value="223" 
                                                                                        >
                                                                                    Uruguay                  </option>
                                                                                <option value="225" 
                                                                                        >
                                                                                    Uzbekistan                  </option>
                                                                                <option value="232" 
                                                                                        >
                                                                                    Vanuatu                  </option>
                                                                                <option value="228" 
                                                                                        >
                                                                                    Venezuela                  </option>
                                                                                <option value="231" 
                                                                                        >
                                                                                    Vietnam                  </option>
                                                                                <option value="229" 
                                                                                        >
                                                                                    Virgin Islands, British                  </option>
                                                                                <option value="230" 
                                                                                        >
                                                                                    Virgin Islands, U.S.                  </option>
                                                                                <option value="233" 
                                                                                        >
                                                                                    Wallis and Futuna                  </option>
                                                                                <option value="66" 
                                                                                        >
                                                                                    Western Sahara                  </option>
                                                                                <option value="235" 
                                                                                        >
                                                                                    Yemen                  </option>
                                                                                <option value="236" 
                                                                                        >
                                                                                    Yugoslavia                  </option>
                                                                                <option value="238" 
                                                                                        >
                                                                                    Zambia                  </option>
                                                                                <option value="239" 
                                                                                        >
                                                                                    Zimbabwe                  </option>

                                                                            </select>
                                                                            <label id="country-error" class="error" for="country">
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-group col-md-4"> 
                                                                            <label for="">Upload your Resume.   </label>   
                                                                            <div class="btn btn-default btn-file">
                                                                                <label for=""> &nbsp; 
                                                                                </label>
                                                                                <i class="fa fa-paperclip">
                                                                                </i> Attachment Resume
                                                                                <input type="file" name="attachment_file" id="attachment_file" accept=".doc, .docx, .txt,.pdf" onchange="validate_attachment()">
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group col-md-9">
                                                                            <label for="">Website/Link   </label>
                                                                            <input type="text" name="website" class="form-control" value="" id="website" onblur="checkURL(this)">
                                                                        </div>
                                                                        <div class="form-group col-md-3">

                                                                            <label for="">View to employer Only   </label>
                                                                            <p style="margin-top: 5px;">
                                                                                <input type="checkbox" name="ViewStatus" id="ViewStatus" value="1" class="flat"  >
                                                                            </p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="">Personal Brief
                                                                            </label>
                                                                            <textarea id="About" name="About" class="form-control" required=""></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="">Current Address
                                                                            </label>
                                                                            <textarea  id="Address" name="Address" class="form-control" required=""></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class='btn btn-primary add-Profile' /> Save
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a style="font-size: 25px">Educational Details</a>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="collapse2" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            Education Type : PG
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Medium : English
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            University : Bangalore
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Country : India
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Courses : Masters
                                                                    </tr>   
                                                                    <tr>
                                                                        <td>Year : 11/2019 – 03/2019
                                                                    </tr> 
                                                                    <tr>
                                                                        <td>Stream : Tourism and Travel Management
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Country : Bengaluru South
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a style="font-size: 25px">Experience Details</a>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="collapse2" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            Current Position : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Employment Type : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            About Company  : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Role Description and Achievements : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Year from :
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Year to : 
                                                                    </tr> 
                                                                    <tr>
                                                                        <td>Current Package : 
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Key Responsibilities : 
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Nationality : 
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Company location : 
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a style="font-size: 25px">Project Details</a>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="collapse2" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            Project Title : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Team Size : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            About Project  : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Duration From : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Duration To :
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Client Name : 
                                                                    </tr> 
                                                                    <tr>
                                                                        <td>Project Loctaion : 
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Skills Used : 
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Role : 
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a style="font-size: 25px">Certificate Details</a>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="collapse2" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            Certificate Name : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            License No : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            From Date  : 
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Certificate Authorization : 
                                                                    </tr> 
                                                                    <tr>
                                                                        <td>Certificate URL : 
                                                                    </tr>
                                                                    <tr>
                                                                        <td>To Date : 
                                                                    </tr>
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
        </div>

        <div id="myModal" class="modal fade">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content"> 
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×
                            </span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">COMPANY DETAILS
                        </h4>
                    </div>
                    <!-- dialog body -->
                    <div class="modal-body">
                        <form action="http://foodlinked.com/irs/employer/register_company" method="post"  enctype="multipart/form-data" id="main">
                            <input type = "hidden" name="_token" value="REHyK8ZURP7MsyNjw3w82MnLqTujSZ2aBl5xD2Kq">
                            <input type="hidden" name="Address" value="" id="Address" required="">
                            <input type="hidden" name="About" value="" id="About" required="">
                            <div class="row">
                                <div class="col-sm-5  col-sm-offset-1 ">                       
                                    <div class="form-group">
                                        <label>Company Name <span class="requerd">*</span></label>
                                        <input name="companyname" id="companyname" type="text" class="form-control" placeholder="Enter Company..." onkeypress="return checkQuote();">
                                        <div id="companyname-error"></div>
                                    </div> 

                                    <div class="form-group">
                                        <label>Company Type  <span class="requerd">*</span></label><br>

                                        <input type="radio" class="flat" name="companytype"  value="1" checked="" style="position: absolute; opacity: 0; top: 0%; left: 0%;  margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px;" required />

                                        Company
                                        &nbsp;

                                        <input type="radio" class="flat" name="companytype"  value="2"  style="position: absolute; opacity: 0; top: 0%; left: 0%;  margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; " /> 

                                        Recuritment Agency
                                    </div>

                                </div>

                                <div class="col-sm-2"></div>
                                <div class="col-sm-2 ">
                                    <div class="panel-body" align="center">
                                        <div class="picture-container">
                                            <div class="picture">
                                                <div id="wizardPicturePreview">
                                                    <img src="http://foodlinked.com/irs/storage/app/public/employer ?>" style="" class="picture-src" id="wizardPicturePreview" title=""/>
                                                </div>
                                                <input type="file" name="employer_logo" id="employer_logo" accept=".jpg,.JPG,.JPEG,.PNG,.jpeg,.png" >

                                                <h4>Employer <br/>Logo</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-1"></div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-5 col-sm-offset-1">
                                    <div class="form-group">
                                        <label>Pincode</label>
                                        <input name="pincode" id="pincode" type="text" class="form-control" placeholder="Enter Pincode"   onkeypress="javascript:return isNumber(event)" >
                                        <div id="pincode-error"></div>
                                    </div>
                                </div>


                                <div class="col-sm-5 ">
                                    <div class="form-group">
                                        <label>Website </label>
                                        <input name="website" id="website" type="text" class="form-control" placeholder="Enter Website..." onblur="checkURL(this)">
                                        <div id="website-error"></div>
                                    </div>

                                </div>


                            </div>

                            <div class="row">
                                <div class="col-sm-5 col-sm-offset-1">
                                    <div class="form-group">
                                        <label>Address <span class="requerd">*</span></label>
                                        <div contenteditable="true" id="editor1" name="editor1"  class=".custom_scrollbar page" style="border: 1px solid; border-color:#d2d6de; min-height:120px; padding: 0px 5px 0px 5px;">
                                            <div>
                                                <textarea name="address"  class="form-control">
                                                </textarea>
                                            </div>
                                        </div><div id = "divadd"></div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>About Company  <span class="requerd">*</span></label>
                                        <div contenteditable="true" id="editor2" name="editor2" class=".custom_scrollbar page" style="border: 1px solid; border-color:#d2d6de; min-height:120px; padding: 0px 5px 0px 5px;">
                                            <div  >
                                                <textarea name="aboutcompany">
                                                </textarea>
                                            </div>
                                        </div><div id = "divabt"></div>
                                    </div>
                                </div>
                            </div>
                            <hr/>


                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type="submit" name="Submit" value="Submit" class="btn btn-success" />
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div> 
                </div>
            </div>
        </div>
        <!-- Education Details Modal -->
        <div class="card wizard-card" id="wizardProfile">
            <form action="addjobseekereducationalprofile" method="post" id="Educationaldetail">
                <div class="modal fade bs-example-modal-Education">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">×
                                    </span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Educational Details
                                </h4>
                            </div>
                            <div class="modal-body">
                                <h4>
                                    <b>Educational Qualifications
                                    </b>
                                    <!-- <button class="btn btn-success btn-sm pull-right add-more add-AddEducation"  type="button"  title="Add Education"  id=""><i class="fa  fa-plus-circle"></i></button> -->
                                </h4>
                                <br/>
                                <div class="row">
                                    <input type = "hidden" name="_token" value="REHyK8ZURP7MsyNjw3w82MnLqTujSZ2aBl5xD2Kq">
                                    <div class="form-group  col-md-4">
                                        <label for="">Education Type 
                                            <span class="requerd">* 
                                            </span>
                                        </label>
                                        <select class="form-control select2" id="type0" name="educationtype" onChange="ShowCourse(0)" style="width:100%" required >
                                            <!-- 0 for add and 1 for edit -->
                                            <option value="">Select Type
                                            </option>
                                            <option value="UG">UG
                                            </option>
                                            <option value="PG">PG
                                            </option>
                                            <option value="PPG">PPG
                                            </option>
                                        </select>
                                        <label id="type0-error" class="error" for="type0">
                                        </label> 
                                    </div>  
                                    <div class="form-group col-md-4">
                                        <label for="">Education Courses 
                                            <span class="requerd">* 
                                            </span>
                                        </label>
                                        <div id="courses0" >
                                            <select class="form-control select2" name="courses"  id="courses0" onChange = "ShowStream(0)" style="width:100%" required>
                                                <option value="">Select Course
                                                </option>         
                                            </select>
                                        </div>
                                        <label id="courses0-error" class="error" for="courses0">
                                        </label>
                                    </div>
                                    <div class="form-group  col-md-4">
                                        <label for="">&nbsp; 
                                        </label>
                                        <div id="stream0" >
                                            <select class="form-control select2" id="sub0" name="sub" style="width:100%" required>
                                                <option value="">Select Stream</option>
                                            </select>
                                        </div>
                                        <label id="sub-error" class="error" for="sub0"></label>
                                        </label>
                                    </div> 
                                </div> 
                                <div class="row after-add-more">
                                    <div class="form-group col-md-3">
                                        <label for="">Medium 
                                            <span class="requerd">* 
                                            </span>
                                        </label>
                                        <select class="form-control select2" id="medium0" name="medium" onChange = "removeerrormedium0()"  style="width:100%" required>
                                            <option value="">Select Medium
                                            </option>
                                            <option value="Hindi">Hindi
                                            </option>
                                            <option value="English">English
                                            </option>
                                        </select>
                                        <label id="medium0-error" class="error" for="medium0">
                                        </label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">University 
                                            <span class="requerd">* 
                                            </span>
                                        </label>
                                        <input type="text" class="form-control" id="university"  name="university" placeholder="University" required>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Year From 
                                            <span class="requerd">* 
                                            </span>
                                        </label>
                                        <input class="form-control" id="yearfromaddedu" name="yearfromeducation" placeholder="MM/YYYY" type="text" onChange="removeerroryearformeducation()"   required/>
                                        <span id="yearfromaddedu-error" class="error" for="yearfromaddedu">
                                        </span>
                                    </div>
                                    <div class=" form-group col-md-3">
                                        <label for="">Year To 
                                            <span class="requerd">* 
                                            </span>
                                        </label>

                                        <input class="form-control" id="yeartoaddedu" name="yeartoeducation" placeholder="MM/YYYY" type="text" onChange="removeerroryeartoeducation()"   required/>
                                        <span id="yeartoaddedu-error" class="error" for="yeartoaddedu">
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="country">Country 
                                            <span class="requerd">*
                                            </span>
                                        </label>
                                        <select class="form-control select2" id="CountryAddEdu" name="countryAddEdu" onChange="ShowState('AddEdu');" style="width: 100%;">
                                            <option value="">Select Country
                                            </option>          
                                            <option value="2">
                                                Afghanistan                                </option>
                                            <option value="5">
                                                Albania                                </option>
                                            <option value="62">
                                                Algeria                                </option>
                                            <option value="11">
                                                American Samoa                                </option>
                                            <option value="6">
                                                Andorra                                </option>
                                            <option value="3">
                                                Angola                                </option>
                                            <option value="4">
                                                Anguilla                                </option>
                                            <option value="12">
                                                Antarctica                                </option>
                                            <option value="14">
                                                Antigua and Barbuda                                </option>
                                            <option value="9">
                                                Argentina                                </option>
                                            <option value="10">
                                                Armenia                                </option>
                                            <option value="1">
                                                Aruba                                </option>
                                            <option value="15">
                                                Australia                                </option>
                                            <option value="16">
                                                Austria                                </option>
                                            <option value="17">
                                                Azerbaijan                                </option>
                                            <option value="25">
                                                Bahamas                                </option>
                                            <option value="24">
                                                Bahrain                                </option>
                                            <option value="22">
                                                Bangladesh                                </option>
                                            <option value="32">
                                                Barbados                                </option>
                                            <option value="27">
                                                Belarus                                </option>
                                            <option value="19">
                                                Belgium                                </option>
                                            <option value="28">
                                                Belize                                </option>
                                            <option value="20">
                                                Benin                                </option>
                                            <option value="29">
                                                Bermuda                                </option>
                                            <option value="34">
                                                Bhutan                                </option>
                                            <option value="30">
                                                Bolivia                                </option>
                                            <option value="26">
                                                Bosnia and Herzegovina                                </option>
                                            <option value="36">
                                                Botswana                                </option>
                                            <option value="35">
                                                Bouvet Island                                </option>
                                            <option value="31">
                                                Brazil                                </option>
                                            <option value="101">
                                                British Indian Ocean Territory                                </option>
                                            <option value="33">
                                                Brunei                                </option>
                                            <option value="23">
                                                Bulgaria                                </option>
                                            <option value="21">
                                                Burkina Faso                                </option>
                                            <option value="18">
                                                Burundi                                </option>
                                            <option value="114">
                                                Cambodia                                </option>
                                            <option value="44">
                                                Cameroon                                </option>
                                            <option value="38">
                                                Canada                                </option>
                                            <option value="50">
                                                Cape Verde                                </option>
                                            <option value="54">
                                                Cayman Islands                                </option>
                                            <option value="43">
                                                CÃƒÆ’Ã‚Â´te dÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ                                </option>
                                            <option value="37">
                                                Central African Republic                                </option>
                                            <option value="206">
                                                Chad                                </option>
                                            <option value="41">
                                                Chile                                </option>
                                            <option value="42">
                                                China                                </option>
                                            <option value="53">
                                                Christmas Island                                </option>
                                            <option value="39">
                                                Cocos (Keeling) Islands                                </option>
                                            <option value="48">
                                                Colombia                                </option>
                                            <option value="49">
                                                Comoros                                </option>
                                            <option value="46">
                                                Congo                                </option>
                                            <option value="45">
                                                Congo, The Democratic Republic                                </option>
                                            <option value="47">
                                                Cook Islands                                </option>
                                            <option value="51">
                                                Costa Rica                                </option>
                                            <option value="96">
                                                Croatia                                </option>
                                            <option value="52">
                                                Cuba                                </option>
                                            <option value="55">
                                                Cyprus                                </option>
                                            <option value="56">
                                                Czech Republic                                </option>
                                            <option value="60">
                                                Denmark                                </option>
                                            <option value="58">
                                                Djibouti                                </option>
                                            <option value="59">
                                                Dominica                                </option>
                                            <option value="61">
                                                Dominican Republic                                </option>
                                            <option value="212">
                                                East Timor                                </option>
                                            <option value="63">
                                                Ecuador                                </option>
                                            <option value="64">
                                                Egypt                                </option>
                                            <option value="193">
                                                El Salvador                                </option>
                                            <option value="85">
                                                Equatorial Guinea                                </option>
                                            <option value="65">
                                                Eritrea                                </option>
                                            <option value="68">
                                                Estonia                                </option>
                                            <option value="69">
                                                Ethiopia                                </option>
                                            <option value="72">
                                                Falkland Islands                                </option>
                                            <option value="74">
                                                Faroe Islands                                </option>
                                            <option value="71">
                                                Fiji Islands                                </option>
                                            <option value="70">
                                                Finland                                </option>
                                            <option value="73">
                                                France                                </option>
                                            <option value="90">
                                                French Guiana                                </option>
                                            <option value="178">
                                                French Polynesia                                </option>
                                            <option value="13">
                                                French Southern territories                                </option>
                                            <option value="76">
                                                Gabon                                </option>
                                            <option value="83">
                                                Gambia                                </option>
                                            <option value="78">
                                                Georgia                                </option>
                                            <option value="57">
                                                Germany                                </option>
                                            <option value="79">
                                                Ghana                                </option>
                                            <option value="80">
                                                Gibraltar                                </option>
                                            <option value="86">
                                                Greece                                </option>
                                            <option value="88">
                                                Greenland                                </option>
                                            <option value="87">
                                                Grenada                                </option>
                                            <option value="82">
                                                Guadeloupe                                </option>
                                            <option value="91">
                                                Guam                                </option>
                                            <option value="89">
                                                Guatemala                                </option>
                                            <option value="81">
                                                Guinea                                </option>
                                            <option value="84">
                                                Guinea-Bissau                                </option>
                                            <option value="92">
                                                Guyana                                </option>
                                            <option value="97">
                                                Haiti                                </option>
                                            <option value="94">
                                                Heard Island and McDonald Isla                                </option>
                                            <option value="226">
                                                Holy See (Vatican City State)                                </option>
                                            <option value="95">
                                                Honduras                                </option>
                                            <option value="93">
                                                Hong Kong                                </option>
                                            <option value="98">
                                                Hungary                                </option>
                                            <option value="105">
                                                Iceland                                </option>
                                            <option value="100">
                                                India                                </option>
                                            <option value="99">
                                                Indonesia                                </option>
                                            <option value="103">
                                                Iran                                </option>
                                            <option value="104">
                                                Iraq                                </option>
                                            <option value="102">
                                                Ireland                                </option>
                                            <option value="106">
                                                Israel                                </option>
                                            <option value="107">
                                                Italy                                </option>
                                            <option value="108">
                                                Jamaica                                </option>
                                            <option value="110">
                                                Japan                                </option>
                                            <option value="109">
                                                Jordan                                </option>
                                            <option value="111">
                                                Kazakstan                                </option>
                                            <option value="112">
                                                Kenya                                </option>
                                            <option value="115">
                                                Kiribati                                </option>
                                            <option value="118">
                                                Kuwait                                </option>
                                            <option value="113">
                                                Kyrgyzstan                                </option>
                                            <option value="119">
                                                Laos                                </option>
                                            <option value="129">
                                                Latvia                                </option>
                                            <option value="120">
                                                Lebanon                                </option>
                                            <option value="126">
                                                Lesotho                                </option>
                                            <option value="121">
                                                Liberia                                </option>
                                            <option value="122">
                                                Libyan Arab Jamahiriya                                </option>
                                            <option value="124">
                                                Liechtenstein                                </option>
                                            <option value="127">
                                                Lithuania                                </option>
                                            <option value="128">
                                                Luxembourg                                </option>
                                            <option value="130">
                                                Macao                                </option>
                                            <option value="138">
                                                Macedonia                                </option>
                                            <option value="134">
                                                Madagascar                                </option>
                                            <option value="149">
                                                Malawi                                </option>
                                            <option value="150">
                                                Malaysia                                </option>
                                            <option value="135">
                                                Maldives                                </option>
                                            <option value="139">
                                                Mali                                </option>
                                            <option value="140">
                                                Malta                                </option>
                                            <option value="137">
                                                Marshall Islands                                </option>
                                            <option value="147">
                                                Martinique                                </option>
                                            <option value="145">
                                                Mauritania                                </option>
                                            <option value="148">
                                                Mauritius                                </option>
                                            <option value="151">
                                                Mayotte                                </option>
                                            <option value="136">
                                                Mexico                                </option>
                                            <option value="75">
                                                Micronesia, Federated States o                                </option>
                                            <option value="133">
                                                Moldova                                </option>
                                            <option value="132">
                                                Monaco                                </option>
                                            <option value="142">
                                                Mongolia                                </option>
                                            <option value="146">
                                                Montserrat                                </option>
                                            <option value="131">
                                                Morocco                                </option>
                                            <option value="144">
                                                Mozambique                                </option>
                                            <option value="141">
                                                Myanmar                                </option>
                                            <option value="152">
                                                Namibia                                </option>
                                            <option value="162">
                                                Nauru                                </option>
                                            <option value="161">
                                                Nepal                                </option>
                                            <option value="159">
                                                Netherlands                                </option>
                                            <option value="7">
                                                Netherlands Antilles                                </option>
                                            <option value="153">
                                                New Caledonia                                </option>
                                            <option value="163">
                                                New Zealand                                </option>
                                            <option value="157">
                                                Nicaragua                                </option>
                                            <option value="154">
                                                Niger                                </option>
                                            <option value="156">
                                                Nigeria                                </option>
                                            <option value="158">
                                                Niue                                </option>
                                            <option value="155">
                                                Norfolk Island                                </option>
                                            <option value="174">
                                                North Korea                                </option>
                                            <option value="143">
                                                Northern Mariana Islands                                </option>
                                            <option value="160">
                                                Norway                                </option>
                                            <option value="164">
                                                Oman                                </option>
                                            <option value="165">
                                                Pakistan                                </option>
                                            <option value="170">
                                                Palau                                </option>
                                            <option value="177">
                                                Palestine                                </option>
                                            <option value="166">
                                                Panama                                </option>
                                            <option value="171">
                                                Papua New Guinea                                </option>
                                            <option value="176">
                                                Paraguay                                </option>
                                            <option value="168">
                                                Peru                                </option>
                                            <option value="169">
                                                Philippines                                </option>
                                            <option value="167">
                                                Pitcairn                                </option>
                                            <option value="172">
                                                Poland                                </option>
                                            <option value="175">
                                                Portugal                                </option>
                                            <option value="173">
                                                Puerto Rico                                </option>
                                            <option value="179">
                                                Qatar                                </option>
                                            <option value="180">
                                                RÃƒÆ’Ã‚Â©union                                </option>
                                            <option value="181">
                                                Romania                                </option>
                                            <option value="182">
                                                Russian Federation                                </option>
                                            <option value="183">
                                                Rwanda                                </option>
                                            <option value="189">
                                                Saint Helena                                </option>
                                            <option value="116">
                                                Saint Kitts and Nevis                                </option>
                                            <option value="123">
                                                Saint Lucia                                </option>
                                            <option value="196">
                                                Saint Pierre and Miquelon                                </option>
                                            <option value="227">
                                                Saint Vincent and the Grenadin                                </option>
                                            <option value="234">
                                                Samoa                                </option>
                                            <option value="194">
                                                San Marino                                </option>
                                            <option value="197">
                                                Sao Tome and Principe                                </option>
                                            <option value="184">
                                                Saudi Arabia                                </option>
                                            <option value="186">
                                                Senegal                                </option>
                                            <option value="203">
                                                Seychelles                                </option>
                                            <option value="192">
                                                Sierra Leone                                </option>
                                            <option value="187">
                                                Singapore                                </option>
                                            <option value="199">
                                                Slovakia                                </option>
                                            <option value="200">
                                                Slovenia                                </option>
                                            <option value="191">
                                                Solomon Islands                                </option>
                                            <option value="195">
                                                Somalia                                </option>
                                            <option value="237">
                                                South Africa                                </option>
                                            <option value="188">
                                                South Georgia and the South Sa                                </option>
                                            <option value="117">
                                                South Korea                                </option>
                                            <option value="67">
                                                Spain                                </option>
                                            <option value="125">
                                                Sri Lanka                                </option>
                                            <option value="185">
                                                Sudan                                </option>
                                            <option value="198">
                                                Suriname                                </option>
                                            <option value="190">
                                                Svalbard and Jan Mayen                                </option>
                                            <option value="202">
                                                Swaziland                                </option>
                                            <option value="201">
                                                Sweden                                </option>
                                            <option value="40">
                                                Switzerland                                </option>
                                            <option value="204">
                                                Syria                                </option>
                                            <option value="218">
                                                Taiwan                                </option>
                                            <option value="209">
                                                Tajikistan                                </option>
                                            <option value="219">
                                                Tanzania                                </option>
                                            <option value="208">
                                                Thailand                                </option>
                                            <option value="207">
                                                Togo                                </option>
                                            <option value="210">
                                                Tokelau                                </option>
                                            <option value="213">
                                                Tonga                                </option>
                                            <option value="214">
                                                Trinidad and Tobago                                </option>
                                            <option value="215">
                                                Tunisia                                </option>
                                            <option value="216">
                                                Turkey                                </option>
                                            <option value="211">
                                                Turkmenistan                                </option>
                                            <option value="205">
                                                Turks and Caicos Islands                                </option>
                                            <option value="217">
                                                Tuvalu                                </option>
                                            <option value="220">
                                                Uganda                                </option>
                                            <option value="221">
                                                Ukraine                                </option>
                                            <option value="8">
                                                United Arab Emirates                                </option>
                                            <option value="77">
                                                United Kingdom                                </option>
                                            <option value="224">
                                                United States                                </option>
                                            <option value="222">
                                                United States Minor Outlying I                                </option>
                                            <option value="223">
                                                Uruguay                                </option>
                                            <option value="225">
                                                Uzbekistan                                </option>
                                            <option value="232">
                                                Vanuatu                                </option>
                                            <option value="228">
                                                Venezuela                                </option>
                                            <option value="231">
                                                Vietnam                                </option>
                                            <option value="229">
                                                Virgin Islands, British                                </option>
                                            <option value="230">
                                                Virgin Islands, U.S.                                </option>
                                            <option value="233">
                                                Wallis and Futuna                                </option>
                                            <option value="66">
                                                Western Sahara                                </option>
                                            <option value="235">
                                                Yemen                                </option>
                                            <option value="236">
                                                Yugoslavia                                </option>
                                            <option value="238">
                                                Zambia                                </option>
                                            <option value="239">
                                                Zimbabwe                                </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-offset-md-1 col-md-4">
                                        <label for="state">State 
                                            <span class="requerd">*
                                            </span>
                                        </label>
                                        <div id="NewStateAddEdu">
                                            <select class="form-control select2" id="stateAddEdu" name="stateAddEdu" onChange="ShowCity('AddEdu');"  style="width: 100%;" >
                                            </select>
                                        </div>
                                        <label id="state-error" class="error" for="state">
                                        </label>
                                    </div>
                                    <div class="form-group col-offset-md-1 col-md-4">
                                        <label for="City">City 
                                            <span class="requerd">*
                                            </span>
                                        </label>
                                        <div id="NewCityAddEdu">
                                            <select class="form-control select2" id="cityAddEdu" name="cityAddEdu" style="width: 100%;" >
                                            </select>
                                        </div>
                                        <label id="city-error" class="error" for="city">
                                        </label>
                                    </div>
                                </div>
                            </div>                    
                            <div class="modal-footer">
                                <button type="submit" class='btn btn-primary add-Education' /> Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Education Details Modal End -->
        <!-- Experience Details Modal -->
        <div class="card wizard-card" id="wizardProfile">  
            <form action="addjobseekerexperienceprofile" method="post">
                <div class="modal fade bs-example-modal-Experience">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">×
                                    </span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Experience Details
                                </h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="">Current Position <span class="requerd">* </span></label>
                                        <input class="form-control" id="companyname"  name="companyname" placeholder="Enter Company Name" type="text" required/>
                                    </div> </div> 
                                <div class="row">    
                                    <input type = "hidden" name="_token" value="REHyK8ZURP7MsyNjw3w82MnLqTujSZ2aBl5xD2Kq">                                      
                                    <div class="form-group col-md-6">
                                        <label for="">Current Position 
                                            <span class="requerd">* 
                                            </span>
                                        </label>
                                        <select name="currentposition" id="current_position" name="current_position" class="form-control select2" style="width: 100%;" onChange="removeerrorcurrentposition()" required="">
                                            <option value="">Select Position
                                            </option>          
                                            <option value="General Manager" name="General Manager">
                                                General Manager                  </option>
                                            <option value="Hotel Manager" name="Hotel Manager">
                                                Hotel Manager                  </option>
                                            <option value="Executive Assistant Manager" name="Executive Assistant Manager">
                                                Executive Assistant Manager                  </option>
                                            <option value="Secretary to General Manager" name="Secretary to General Manager">
                                                Secretary to General Manager                  </option>
                                            <option value="Executive Secretary to General Manager" name="Executive Secretary to General Manager">
                                                Executive Secretary to General Manager                  </option>
                                            <option value="External Consultants" name="External Consultants">
                                                External Consultants                  </option>
                                            <option value="Director on Board" name="Director on Board">
                                                Director on Board                  </option>
                                            <option value="Director Sales & Marketing" name="Director Sales & Marketing">
                                                Director Sales & Marketing                  </option>
                                            <option value="Associate Director Sales & Marketing" name="Associate Director Sales & Marketing">
                                                Associate Director Sales & Marketing                  </option>
                                            <option value="Director Sales " name="Director Sales ">
                                                Director Sales                   </option>
                                            <option value="Associate Director Sales " name="Associate Director Sales ">
                                                Associate Director Sales                   </option>
                                            <option value="Director Marketing" name="Director Marketing">
                                                Director Marketing                  </option>
                                            <option value="Associate Director Marketing" name="Associate Director Marketing">
                                                Associate Director Marketing                  </option>
                                            <option value="National Sales Manager" name="National Sales Manager">
                                                National Sales Manager                  </option>
                                            <option value="Regional Sales Manager" name="Regional Sales Manager">
                                                Regional Sales Manager                  </option>
                                            <option value="Area Sales Manager" name="Area Sales Manager">
                                                Area Sales Manager                  </option>
                                            <option value="Senior Marketing Manager" name="Senior Marketing Manager">
                                                Senior Marketing Manager                  </option>
                                            <option value="Marketing Manager" name="Marketing Manager">
                                                Marketing Manager                  </option>
                                            <option value="Senior Sales Manager" name="Senior Sales Manager">
                                                Senior Sales Manager                  </option>
                                            <option value="Sales Manager" name="Sales Manager">
                                                Sales Manager                  </option>
                                            <option value="Deputy Sales Manager" name="Deputy Sales Manager">
                                                Deputy Sales Manager                  </option>
                                            <option value="Assistant Sales Manager" name="Assistant Sales Manager">
                                                Assistant Sales Manager                  </option>
                                            <option value="Assistant Manager Sales" name="Assistant Manager Sales">
                                                Assistant Manager Sales                  </option>
                                            <option value="Assistant Marketing Manager" name="Assistant Marketing Manager">
                                                Assistant Marketing Manager                  </option>
                                            <option value="Assistant Manager Marketing" name="Assistant Manager Marketing">
                                                Assistant Manager Marketing                  </option>
                                            <option value="Senior Sales Executive" name="Senior Sales Executive">
                                                Senior Sales Executive                  </option>
                                            <option value="Sales Executive" name="Sales Executive">
                                                Sales Executive                  </option>
                                            <option value="Senior Marketing Executive" name="Senior Marketing Executive">
                                                Senior Marketing Executive                  </option>
                                            <option value="Marketing Executive" name="Marketing Executive">
                                                Marketing Executive                  </option>
                                            <option value="Group Sales Manager" name="Group Sales Manager">
                                                Group Sales Manager                  </option>
                                            <option value="Guest Room Sales Manager" name="Guest Room Sales Manager">
                                                Guest Room Sales Manager                  </option>
                                            <option value="Group Sales Coordinator" name="Group Sales Coordinator">
                                                Group Sales Coordinator                  </option>
                                            <option value="Marketing Coordinator" name="Marketing Coordinator">
                                                Marketing Coordinator                  </option>
                                            <option value="Rooms Divison Manager" name="Rooms Divison Manager">
                                                Rooms Divison Manager                  </option>
                                            <option value="Director-Rooms" name="Director-Rooms">
                                                Director-Rooms                  </option>
                                            <option value="Associate Director-Rooms" name="Associate Director-Rooms">
                                                Associate Director-Rooms                  </option>
                                            <option value="Director Front Office Operations" name="Director Front Office Operations">
                                                Director Front Office Operations                  </option>
                                            <option value="Associate Director-Front Office Operations" name="Associate Director-Front Office Operations">
                                                Associate Director-Front Office Operations                  </option>
                                            <option value="Director-Guest Relations" name="Director-Guest Relations">
                                                Director-Guest Relations                  </option>
                                            <option value="Director-Revenue Management" name="Director-Revenue Management">
                                                Director-Revenue Management                  </option>
                                            <option value="Director-Reservations" name="Director-Reservations">
                                                Director-Reservations                  </option>
                                            <option value="Front Office Manager" name="Front Office Manager">
                                                Front Office Manager                  </option>
                                            <option value="Assistant Front Office Manager" name="Assistant Front Office Manager">
                                                Assistant Front Office Manager                  </option>
                                            <option value="Assistant Manager Front Office" name="Assistant Manager Front Office">
                                                Assistant Manager Front Office                  </option>
                                            <option value="Night Manager" name="Night Manager">
                                                Night Manager                  </option>
                                            <option value="Business Center Manager" name="Business Center Manager">
                                                Business Center Manager                  </option>
                                            <option value="Guest Relations Manager" name="Guest Relations Manager">
                                                Guest Relations Manager                  </option>
                                            <option value="Assistant Guest Relations Manager" name="Assistant Guest Relations Manager">
                                                Assistant Guest Relations Manager                  </option>
                                            <option value="Guest Relations Officer" name="Guest Relations Officer">
                                                Guest Relations Officer                  </option>
                                            <option value="Senior Guest Relations Executive" name="Senior Guest Relations Executive">
                                                Senior Guest Relations Executive                  </option>
                                            <option value="Guest Relations Executive" name="Guest Relations Executive">
                                                Guest Relations Executive                  </option>
                                            <option value="Guest Relations Assistant" name="Guest Relations Assistant">
                                                Guest Relations Assistant                  </option>
                                            <option value="Revenue Manager" name="Revenue Manager">
                                                Revenue Manager                  </option>
                                            <option value="Assistant Revenue Manager" name="Assistant Revenue Manager">
                                                Assistant Revenue Manager                  </option>
                                            <option value="Revenue Executive" name="Revenue Executive">
                                                Revenue Executive                  </option>
                                            <option value="Reservations Manager" name="Reservations Manager">
                                                Reservations Manager                  </option>
                                            <option value="Assistant Reservations Manager" name="Assistant Reservations Manager">
                                                Assistant Reservations Manager                  </option>
                                            <option value="Reservations Executive" name="Reservations Executive">
                                                Reservations Executive                  </option>
                                            <option value="Reservations Agent" name="Reservations Agent">
                                                Reservations Agent                  </option>
                                            <option value="Central Reservations Executive" name="Central Reservations Executive">
                                                Central Reservations Executive                  </option>
                                            <option value="Central Reservations Manager" name="Central Reservations Manager">
                                                Central Reservations Manager                  </option>
                                            <option value="Central Assistant Reservations Manager" name="Central Assistant Reservations Manager">
                                                Central Assistant Reservations Manager                  </option>
                                            <option value="Central Reservations Assistant" name="Central Reservations Assistant">
                                                Central Reservations Assistant                  </option>
                                            <option value="Central Reservations Supervisor" name="Central Reservations Supervisor">
                                                Central Reservations Supervisor                  </option>
                                            <option value="Central Reservations-Telephone Operator" name="Central Reservations-Telephone Operator">
                                                Central Reservations-Telephone Operator                  </option>
                                            <option value="Manager-Bell Desk" name="Manager-Bell Desk">
                                                Manager-Bell Desk                  </option>
                                            <option value="Assistant Manager Bell Desk" name="Assistant Manager Bell Desk">
                                                Assistant Manager Bell Desk                  </option>
                                            <option value="Guest Service Assistant-Bell Desk" name="Guest Service Assistant-Bell Desk">
                                                Guest Service Assistant-Bell Desk                  </option>
                                            <option value="Bell Senior Captain" name="Bell Senior Captain">
                                                Bell Senior Captain                  </option>
                                            <option value="Bell Captain" name="Bell Captain">
                                                Bell Captain                  </option>
                                            <option value="Senior Bell Boy" name="Senior Bell Boy">
                                                Senior Bell Boy                  </option>
                                            <option value="Bell Boy" name="Bell Boy">
                                                Bell Boy                  </option>
                                            <option value="Bell desk Assistant" name="Bell desk Assistant">
                                                Bell desk Assistant                  </option>
                                            <option value="Manager-Travel Desk" name="Manager-Travel Desk">
                                                Manager-Travel Desk                  </option>
                                            <option value="Assistant Manager Travel Desk" name="Assistant Manager Travel Desk">
                                                Assistant Manager Travel Desk                  </option>
                                            <option value="Guest Service Assistant-Travel Desk" name="Guest Service Assistant-Travel Desk">
                                                Guest Service Assistant-Travel Desk                  </option>
                                            <option value="Travel desk Assistant" name="Travel desk Assistant">
                                                Travel desk Assistant                  </option>
                                            <option value="Senior Travel desk Assistant" name="Senior Travel desk Assistant">
                                                Senior Travel desk Assistant                  </option>
                                            <option value="Travel Desk Supervisor" name="Travel Desk Supervisor">
                                                Travel Desk Supervisor                  </option>
                                            <option value="Travel Desk Executive" name="Travel Desk Executive">
                                                Travel Desk Executive                  </option>
                                            <option value="Transportation Coordinator" name="Transportation Coordinator">
                                                Transportation Coordinator                  </option>
                                            <option value="Concierge Manager" name="Concierge Manager">
                                                Concierge Manager                  </option>
                                            <option value="Concierge Coordinator" name="Concierge Coordinator">
                                                Concierge Coordinator                  </option>
                                            <option value="Travel Agent/ Tour Operator" name="Travel Agent/ Tour Operator">
                                                Travel Agent/ Tour Operator                  </option>
                                            <option value="Cashier" name="Cashier">
                                                Cashier                  </option>
                                            <option value="Front Office Receptionist" name="Front Office Receptionist">
                                                Front Office Receptionist                  </option>
                                            <option value="Receptionist" name="Receptionist">
                                                Receptionist                  </option>
                                            <option value="Front Office Assistant" name="Front Office Assistant">
                                                Front Office Assistant                  </option>
                                            <option value="Guest Service Associate" name="Guest Service Associate">
                                                Guest Service Associate                  </option>
                                            <option value="Front Office Team Member" name="Front Office Team Member">
                                                Front Office Team Member                  </option>
                                            <option value="Front Office Team Leader" name="Front Office Team Leader">
                                                Front Office Team Leader                  </option>
                                            <option value="Front Office Executive" name="Front Office Executive">
                                                Front Office Executive                  </option>
                                            <option value="Duty Manager" name="Duty Manager">
                                                Duty Manager                  </option>
                                            <option value="Assistant Manager Front Office" name="Assistant Manager Front Office">
                                                Assistant Manager Front Office                  </option>
                                            <option value="Lobby Manager" name="Lobby Manager">
                                                Lobby Manager                  </option>
                                            <option value="Senior Duty Manager" name="Senior Duty Manager">
                                                Senior Duty Manager                  </option>
                                            <option value="Senior Lobby Manager" name="Senior Lobby Manager">
                                                Senior Lobby Manager                  </option>
                                            <option value="Senior Telephone Operator" name="Senior Telephone Operator">
                                                Senior Telephone Operator                  </option>
                                            <option value="Telephone Operator" name="Telephone Operator">
                                                Telephone Operator                  </option>
                                            <option value="Telephone Desk-Team Member" name="Telephone Desk-Team Member">
                                                Telephone Desk-Team Member                  </option>
                                            <option value="Telephone Desk-Team Leader" name="Telephone Desk-Team Leader">
                                                Telephone Desk-Team Leader                  </option>
                                            <option value="Central Guest Service Desk-Telephone Operator" name="Central Guest Service Desk-Telephone Operator">
                                                Central Guest Service Desk-Telephone Operator                  </option>
                                            <option value="Central Guest Service Desk-Senior Telephone Operator" name="Central Guest Service Desk-Senior Telephone Operator">
                                                Central Guest Service Desk-Senior Telephone Operator                  </option>
                                            <option value="Central Guest Service Desk-Team Member" name="Central Guest Service Desk-Team Member">
                                                Central Guest Service Desk-Team Member                  </option>
                                            <option value="Central Guest Service Desk-Team Leader" name="Central Guest Service Desk-Team Leader">
                                                Central Guest Service Desk-Team Leader                  </option>
                                            <option value="Health Club Assistant" name="Health Club Assistant">
                                                Health Club Assistant                  </option>
                                            <option value="Health Club Team Member" name="Health Club Team Member">
                                                Health Club Team Member                  </option>
                                            <option value="Health Club Supervisor" name="Health Club Supervisor">
                                                Health Club Supervisor                  </option>
                                            <option value="Health Club Team Leader" name="Health Club Team Leader">
                                                Health Club Team Leader                  </option>
                                            <option value="Health Club Executive" name="Health Club Executive">
                                                Health Club Executive                  </option>
                                            <option value="Gym Attendant" name="Gym Attendant">
                                                Gym Attendant                  </option>
                                            <option value="Gym Supervisor" name="Gym Supervisor">
                                                Gym Supervisor                  </option>
                                            <option value="Fitness Center Assistant" name="Fitness Center Assistant">
                                                Fitness Center Assistant                  </option>
                                            <option value="Fitness Center Supervisor" name="Fitness Center Supervisor">
                                                Fitness Center Supervisor                  </option>
                                            <option value="Fitness Center Executive" name="Fitness Center Executive">
                                                Fitness Center Executive                  </option>
                                            <option value="Gym Trainer" name="Gym Trainer">
                                                Gym Trainer                  </option>
                                            <option value="Gym Instructor" name="Gym Instructor">
                                                Gym Instructor                  </option>
                                            <option value="Gym Personal Trainer" name="Gym Personal Trainer">
                                                Gym Personal Trainer                  </option>
                                            <option value="Masseur" name="Masseur">
                                                Masseur                  </option>
                                            <option value="Male Masseur" name="Male Masseur">
                                                Male Masseur                  </option>
                                            <option value="Female Masseur" name="Female Masseur">
                                                Female Masseur                  </option>
                                            <option value="Spa Therapist" name="Spa Therapist">
                                                Spa Therapist                  </option>
                                            <option value="Senior Spa Therapist" name="Senior Spa Therapist">
                                                Senior Spa Therapist                  </option>
                                            <option value="Male Spa Therapist" name="Male Spa Therapist">
                                                Male Spa Therapist                  </option>
                                            <option value="Female Spa Therapist" name="Female Spa Therapist">
                                                Female Spa Therapist                  </option>
                                            <option value="Swimming Pool Attendant" name="Swimming Pool Attendant">
                                                Swimming Pool Attendant                  </option>
                                            <option value="Swim Trainer" name="Swim Trainer">
                                                Swim Trainer                  </option>
                                            <option value="Director Housekeeping" name="Director Housekeeping">
                                                Director Housekeeping                  </option>
                                            <option value="Assistant Director Housekeeping" name="Assistant Director Housekeeping">
                                                Assistant Director Housekeeping                  </option>
                                            <option value="Executive Housekeeper" name="Executive Housekeeper">
                                                Executive Housekeeper                  </option>
                                            <option value="Senior Housekeeping Manager" name="Senior Housekeeping Manager">
                                                Senior Housekeeping Manager                  </option>
                                            <option value="Housekeeping Manager" name="Housekeeping Manager">
                                                Housekeeping Manager                  </option>
                                            <option value="Lead Housekeeper" name="Lead Housekeeper">
                                                Lead Housekeeper                  </option>
                                            <option value="Assistant Housekeeping Manager" name="Assistant Housekeeping Manager">
                                                Assistant Housekeeping Manager                  </option>
                                            <option value="Assistant Manager Housekeeping" name="Assistant Manager Housekeeping">
                                                Assistant Manager Housekeeping                  </option>
                                            <option value="Senior Housekeeping Executive" name="Senior Housekeeping Executive">
                                                Senior Housekeeping Executive                  </option>
                                            <option value="Housekeeping Executive" name="Housekeeping Executive">
                                                Housekeeping Executive                  </option>
                                            <option value="Senior Housekeeping Supervisor" name="Senior Housekeeping Supervisor">
                                                Senior Housekeeping Supervisor                  </option>
                                            <option value="Housekeeping Supervisor" name="Housekeeping Supervisor">
                                                Housekeeping Supervisor                  </option>
                                            <option value="Trainee Housekeeping Supervisor" name="Trainee Housekeeping Supervisor">
                                                Trainee Housekeeping Supervisor                  </option>
                                            <option value="Self Supervisor" name="Self Supervisor">
                                                Self Supervisor                  </option>
                                            <option value="Floor Supervisor" name="Floor Supervisor">
                                                Floor Supervisor                  </option>
                                            <option value="Senior Room Boy" name="Senior Room Boy">
                                                Senior Room Boy                  </option>
                                            <option value="Room Boy" name="Room Boy">
                                                Room Boy                  </option>
                                            <option value="Senior Room Attendant" name="Senior Room Attendant">
                                                Senior Room Attendant                  </option>
                                            <option value="Room Attendant" name="Room Attendant">
                                                Room Attendant                  </option>
                                            <option value="Senior Housekeeping Associate" name="Senior Housekeeping Associate">
                                                Senior Housekeeping Associate                  </option>
                                            <option value="Senior Housekeeping Attendant" name="Senior Housekeeping Attendant">
                                                Senior Housekeeping Attendant                  </option>
                                            <option value="Senior Housekeeping GSA" name="Senior Housekeeping GSA">
                                                Senior Housekeeping GSA                  </option>
                                            <option value="Housekeeping GSA" name="Housekeeping GSA">
                                                Housekeeping GSA                  </option>
                                            <option value="Housekeeping Associate" name="Housekeeping Associate">
                                                Housekeeping Associate                  </option>
                                            <option value="Houskeeping Attendant" name="Houskeeping Attendant">
                                                Houskeeping Attendant                  </option>
                                            <option value="Housekeeping Team Member" name="Housekeeping Team Member">
                                                Housekeeping Team Member                  </option>
                                            <option value="Housekeeping Team Leader" name="Housekeeping Team Leader">
                                                Housekeeping Team Leader                  </option>
                                            <option value="Laundry Manager" name="Laundry Manager">
                                                Laundry Manager                  </option>
                                            <option value="Manager Laundry" name="Manager Laundry">
                                                Manager Laundry                  </option>
                                            <option value="Assistant Laundry Manager" name="Assistant Laundry Manager">
                                                Assistant Laundry Manager                  </option>
                                            <option value="Assistant Manager Laundry" name="Assistant Manager Laundry">
                                                Assistant Manager Laundry                  </option>
                                            <option value="Senior Laundry Executive" name="Senior Laundry Executive">
                                                Senior Laundry Executive                  </option>
                                            <option value="Laundry Executive" name="Laundry Executive">
                                                Laundry Executive                  </option>
                                            <option value="Senior Laundry Supervisor" name="Senior Laundry Supervisor">
                                                Senior Laundry Supervisor                  </option>
                                            <option value="Laundry Supervisor" name="Laundry Supervisor">
                                                Laundry Supervisor                  </option>
                                            <option value="Laundry Team Leader" name="Laundry Team Leader">
                                                Laundry Team Leader                  </option>
                                            <option value="Laundry Team Member" name="Laundry Team Member">
                                                Laundry Team Member                  </option>
                                            <option value="Senior Linen Supervisor" name="Senior Linen Supervisor">
                                                Senior Linen Supervisor                  </option>
                                            <option value="Linen Supervisor" name="Linen Supervisor">
                                                Linen Supervisor                  </option>
                                            <option value="Linen Team Leader" name="Linen Team Leader">
                                                Linen Team Leader                  </option>
                                            <option value="Senior Linen Attendant" name="Senior Linen Attendant">
                                                Senior Linen Attendant                  </option>
                                            <option value="Linen Attendant" name="Linen Attendant">
                                                Linen Attendant                  </option>
                                            <option value="Linen Associate" name="Linen Associate">
                                                Linen Associate                  </option>
                                            <option value="Linen Team Member" name="Linen Team Member">
                                                Linen Team Member                  </option>
                                            <option value="Manager-Floors" name="Manager-Floors">
                                                Manager-Floors                  </option>
                                            <option value="Assistant Manager Floors" name="Assistant Manager Floors">
                                                Assistant Manager Floors                  </option>
                                            <option value="Floors Supervisor" name="Floors Supervisor">
                                                Floors Supervisor                  </option>
                                            <option value="Manager Public Area" name="Manager Public Area">
                                                Manager Public Area                  </option>
                                            <option value="Assistant Manager Public Area" name="Assistant Manager Public Area">
                                                Assistant Manager Public Area                  </option>
                                            <option value="Senior Public Area Supervisor" name="Senior Public Area Supervisor">
                                                Senior Public Area Supervisor                  </option>
                                            <option value="Public Area Supervisor" name="Public Area Supervisor">
                                                Public Area Supervisor                  </option>
                                            <option value="Public Area Team Leader" name="Public Area Team Leader">
                                                Public Area Team Leader                  </option>
                                            <option value="Senior Public Area Attendant" name="Senior Public Area Attendant">
                                                Senior Public Area Attendant                  </option>
                                            <option value="Public Area Attendant" name="Public Area Attendant">
                                                Public Area Attendant                  </option>
                                            <option value="Public Area Associate" name="Public Area Associate">
                                                Public Area Associate                  </option>
                                            <option value="Public Area Team Member" name="Public Area Team Member">
                                                Public Area Team Member                  </option>
                                            <option value="Senior Housekeeping Desk Attendant" name="Senior Housekeeping Desk Attendant">
                                                Senior Housekeeping Desk Attendant                  </option>
                                            <option value="Housekeeping Desk Attendant" name="Housekeeping Desk Attendant">
                                                Housekeeping Desk Attendant                  </option>
                                            <option value="Pest Control Supervisor" name="Pest Control Supervisor">
                                                Pest Control Supervisor                  </option>
                                            <option value="Pest Control Attendant" name="Pest Control Attendant">
                                                Pest Control Attendant                  </option>
                                            <option value="Floor Polisher" name="Floor Polisher">
                                                Floor Polisher                  </option>
                                            <option value="Senior Gardener" name="Senior Gardener">
                                                Senior Gardener                  </option>
                                            <option value="Gardener" name="Gardener">
                                                Gardener                  </option>
                                            <option value="Sweeper" name="Sweeper">
                                                Sweeper                  </option>
                                            <option value="Cleaner" name="Cleaner">
                                                Cleaner                  </option>
                                            <option value="Director-F & B Service" name="Director-F & B Service">
                                                Director-F & B Service                  </option>
                                            <option value="Associate Director-F & B Service" name="Associate Director-F & B Service">
                                                Associate Director-F & B Service                  </option>
                                            <option value="Head F & B Service" name="Head F & B Service">
                                                Head F & B Service                  </option>
                                            <option value="F&B Manager" name="F&B Manager">
                                                F&B Manager                  </option>
                                            <option value="Restaurant Manager" name="Restaurant Manager">
                                                Restaurant Manager                  </option>
                                            <option value="Cafe Manager" name="Cafe Manager">
                                                Cafe Manager                  </option>
                                            <option value="Coffee Shop Manager" name="Coffee Shop Manager">
                                                Coffee Shop Manager                  </option>
                                            <option value="Speciality Restaurant Manager" name="Speciality Restaurant Manager">
                                                Speciality Restaurant Manager                  </option>
                                            <option value="Guest Services Manager" name="Guest Services Manager">
                                                Guest Services Manager                  </option>
                                            <option value="Assistant Restaurant Manager" name="Assistant Restaurant Manager">
                                                Assistant Restaurant Manager                  </option>
                                            <option value="Senior F & B Executive" name="Senior F & B Executive">
                                                Senior F & B Executive                  </option>
                                            <option value="F & B Executive" name="F & B Executive">
                                                F & B Executive                  </option>
                                            <option value="Senior Captain" name="Senior Captain">
                                                Senior Captain                  </option>
                                            <option value="Captain" name="Captain">
                                                Captain                  </option>
                                            <option value="Senior F & B Supervisor" name="Senior F & B Supervisor">
                                                Senior F & B Supervisor                  </option>
                                            <option value="F & B Supervisor" name="F & B Supervisor">
                                                F & B Supervisor                  </option>
                                            <option value="F & B Team Leader" name="F & B Team Leader">
                                                F & B Team Leader                  </option>
                                            <option value="Guest Services Supervisor" name="Guest Services Supervisor">
                                                Guest Services Supervisor                  </option>
                                            <option value="Trainee F & B Supervisor" name="Trainee F & B Supervisor">
                                                Trainee F & B Supervisor                  </option>
                                            <option value="Trainee Captain" name="Trainee Captain">
                                                Trainee Captain                  </option>
                                            <option value="Senior Steward" name="Senior Steward">
                                                Senior Steward                  </option>
                                            <option value="Steward" name="Steward">
                                                Steward                  </option>
                                            <option value="F & B Team Member" name="F & B Team Member">
                                                F & B Team Member                  </option>
                                            <option value="Senior Guest Service Assistant" name="Senior Guest Service Assistant">
                                                Senior Guest Service Assistant                  </option>
                                            <option value="Guest Service Associate" name="Guest Service Associate">
                                                Guest Service Associate                  </option>
                                            <option value="Guest Service Assistant" name="Guest Service Assistant">
                                                Guest Service Assistant                  </option>
                                            <option value="Guest Services Coordinator" name="Guest Services Coordinator">
                                                Guest Services Coordinator                  </option>
                                            <option value="Guest Service Representative" name="Guest Service Representative">
                                                Guest Service Representative                  </option>
                                            <option value="Trainee Steward" name="Trainee Steward">
                                                Trainee Steward                  </option>
                                            <option value="Apprentice Steward" name="Apprentice Steward">
                                                Apprentice Steward                  </option>
                                            <option value="Host" name="Host">
                                                Host                  </option>
                                            <option value="Hostess" name="Hostess">
                                                Hostess                  </option>
                                            <option value="Waiter" name="Waiter">
                                                Waiter                  </option>
                                            <option value="Waitress " name="Waitress ">
                                                Waitress                   </option>
                                            <option value="Sommelier" name="Sommelier">
                                                Sommelier                  </option>
                                            <option value="Butler" name="Butler">
                                                Butler                  </option>
                                            <option value="Room Service Order Taker/RSOT" name="Room Service Order Taker/RSOT">
                                                Room Service Order Taker/RSOT                  </option>
                                            <option value="Room Service Steward/IRD Steward" name="Room Service Steward/IRD Steward">
                                                Room Service Steward/IRD Steward                  </option>
                                            <option value="Room Service Captain/IRD Captain" name="Room Service Captain/IRD Captain">
                                                Room Service Captain/IRD Captain                  </option>
                                            <option value="Room Service Supervisor/IRD Supervisor" name="Room Service Supervisor/IRD Supervisor">
                                                Room Service Supervisor/IRD Supervisor                  </option>
                                            <option value="Room Service Executive/IRD Executive" name="Room Service Executive/IRD Executive">
                                                Room Service Executive/IRD Executive                  </option>
                                            <option value="Room Service Manager/IRD Manager" name="Room Service Manager/IRD Manager">
                                                Room Service Manager/IRD Manager                  </option>
                                            <option value="Room Service Assistant Manager/IRD Assistant Manager" name="Room Service Assistant Manager/IRD Assistant Manager">
                                                Room Service Assistant Manager/IRD Assistant Manager                  </option>
                                            <option value="Mini-Bar Attendant" name="Mini-Bar Attendant">
                                                Mini-Bar Attendant                  </option>
                                            <option value="Banquets Manager" name="Banquets Manager">
                                                Banquets Manager                  </option>
                                            <option value="Catering Manager" name="Catering Manager">
                                                Catering Manager                  </option>
                                            <option value="Assistant Banquets Manager" name="Assistant Banquets Manager">
                                                Assistant Banquets Manager                  </option>
                                            <option value="Assistant Manager-Banquets" name="Assistant Manager-Banquets">
                                                Assistant Manager-Banquets                  </option>
                                            <option value="Banquet Executive" name="Banquet Executive">
                                                Banquet Executive                  </option>
                                            <option value="Banquet Captain" name="Banquet Captain">
                                                Banquet Captain                  </option>
                                            <option value="Banquet Supervisor" name="Banquet Supervisor">
                                                Banquet Supervisor                  </option>
                                            <option value="Banquet Steward" name="Banquet Steward">
                                                Banquet Steward                  </option>
                                            <option value="Meeting Concierge" name="Meeting Concierge">
                                                Meeting Concierge                  </option>
                                            <option value="Meeting Planner" name="Meeting Planner">
                                                Meeting Planner                  </option>
                                            <option value="Meeting Specialist" name="Meeting Specialist">
                                                Meeting Specialist                  </option>
                                            <option value="Meeting Manager" name="Meeting Manager">
                                                Meeting Manager                  </option>
                                            <option value="Meeting Coordinator" name="Meeting Coordinator">
                                                Meeting Coordinator                  </option>
                                            <option value="Banquet Sales Manager" name="Banquet Sales Manager">
                                                Banquet Sales Manager                  </option>
                                            <option value="Events Manager" name="Events Manager">
                                                Events Manager                  </option>
                                            <option value="Manager, Special Events" name="Manager, Special Events">
                                                Manager, Special Events                  </option>
                                            <option value="Wedding Sales Manager" name="Wedding Sales Manager">
                                                Wedding Sales Manager                  </option>
                                            <option value="Executive Conference Manager" name="Executive Conference Manager">
                                                Executive Conference Manager                  </option>
                                            <option value="Executive Meeting Manager" name="Executive Meeting Manager">
                                                Executive Meeting Manager                  </option>
                                            <option value="Assistant Banquet Sales Manager" name="Assistant Banquet Sales Manager">
                                                Assistant Banquet Sales Manager                  </option>
                                            <option value="Assistant Manager-Banquet Sales " name="Assistant Manager-Banquet Sales ">
                                                Assistant Manager-Banquet Sales                   </option>
                                            <option value="Event Planner" name="Event Planner">
                                                Event Planner                  </option>
                                            <option value="Banquet Sales Executive" name="Banquet Sales Executive">
                                                Banquet Sales Executive                  </option>
                                            <option value="Banquet Sales Supervisor" name="Banquet Sales Supervisor">
                                                Banquet Sales Supervisor                  </option>
                                            <option value="Banquet Sales Assistant" name="Banquet Sales Assistant">
                                                Banquet Sales Assistant                  </option>
                                            <option value="Wedding Coordinator" name="Wedding Coordinator">
                                                Wedding Coordinator                  </option>
                                            <option value="Catering Sales Manager" name="Catering Sales Manager">
                                                Catering Sales Manager                  </option>
                                            <option value="Assistant Catering Sales Manager" name="Assistant Catering Sales Manager">
                                                Assistant Catering Sales Manager                  </option>
                                            <option value="Catering Sales Executive" name="Catering Sales Executive">
                                                Catering Sales Executive                  </option>
                                            <option value="Catering Sales Supervisor" name="Catering Sales Supervisor">
                                                Catering Sales Supervisor                  </option>
                                            <option value="Catering Sales Assistant" name="Catering Sales Assistant">
                                                Catering Sales Assistant                  </option>
                                            <option value="Event Planner" name="Event Planner">
                                                Event Planner                  </option>
                                            <option value="Bar Manager" name="Bar Manager">
                                                Bar Manager                  </option>
                                            <option value="Casino Manager" name="Casino Manager">
                                                Casino Manager                  </option>
                                            <option value="Manager Brew Pub" name="Manager Brew Pub">
                                                Manager Brew Pub                  </option>
                                            <option value="Manager Breweries" name="Manager Breweries">
                                                Manager Breweries                  </option>
                                            <option value="Assistant Bar Manager" name="Assistant Bar Manager">
                                                Assistant Bar Manager                  </option>
                                            <option value="Bar Executive" name="Bar Executive">
                                                Bar Executive                  </option>
                                            <option value="Bar Senior Captain" name="Bar Senior Captain">
                                                Bar Senior Captain                  </option>
                                            <option value="Bar Captain" name="Bar Captain">
                                                Bar Captain                  </option>
                                            <option value="Senior BarTender" name="Senior BarTender">
                                                Senior BarTender                  </option>
                                            <option value="BarTender" name="BarTender">
                                                BarTender                  </option>
                                            <option value="Executive Chef" name="Executive Chef">
                                                Executive Chef                  </option>
                                            <option value="Culinary Head" name="Culinary Head">
                                                Culinary Head                  </option>
                                            <option value="Director Culinary Arts" name="Director Culinary Arts">
                                                Director Culinary Arts                  </option>
                                            <option value="Director Culinary Experience" name="Director Culinary Experience">
                                                Director Culinary Experience                  </option>
                                            <option value="Director Culinary Operations" name="Director Culinary Operations">
                                                Director Culinary Operations                  </option>
                                            <option value="Assistant Director Culinary Experience" name="Assistant Director Culinary Experience">
                                                Assistant Director Culinary Experience                  </option>
                                            <option value="Executive  Sous Chef" name="Executive  Sous Chef">
                                                Executive  Sous Chef                  </option>
                                            <option value="Master Chef" name="Master Chef">
                                                Master Chef                  </option>
                                            <option value="Chef-North Indian Culinary" name="Chef-North Indian Culinary">
                                                Chef-North Indian Culinary                  </option>
                                            <option value="Chef-South Indian Culinary" name="Chef-South Indian Culinary">
                                                Chef-South Indian Culinary                  </option>
                                            <option value="Continental Chef" name="Continental Chef">
                                                Continental Chef                  </option>
                                            <option value="Chef-Western Culinary" name="Chef-Western Culinary">
                                                Chef-Western Culinary                  </option>
                                            <option value="Chef-Italian Culinary" name="Chef-Italian Culinary">
                                                Chef-Italian Culinary                  </option>
                                            <option value="Chef-Japanese Culinary" name="Chef-Japanese Culinary">
                                                Chef-Japanese Culinary                  </option>
                                            <option value="Senior Sous Chef" name="Senior Sous Chef">
                                                Senior Sous Chef                  </option>
                                            <option value="Sous Chef" name="Sous Chef">
                                                Sous Chef                  </option>
                                            <option value="Junior Sous Chef" name="Junior Sous Chef">
                                                Junior Sous Chef                  </option>
                                            <option value="Pastry Chef" name="Pastry Chef">
                                                Pastry Chef                  </option>
                                            <option value="Junior Pastry Chef" name="Junior Pastry Chef">
                                                Junior Pastry Chef                  </option>
                                            <option value="Bakery Chef" name="Bakery Chef">
                                                Bakery Chef                  </option>
                                            <option value="Senior Chef De Partie" name="Senior Chef De Partie">
                                                Senior Chef De Partie                  </option>
                                            <option value="Chef De Partie" name="Chef De Partie">
                                                Chef De Partie                  </option>
                                            <option value="Chef De Cuisine" name="Chef De Cuisine">
                                                Chef De Cuisine                  </option>
                                            <option value="Demi Chef De Partie" name="Demi Chef De Partie">
                                                Demi Chef De Partie                  </option>
                                            <option value="Baker" name="Baker">
                                                Baker                  </option>
                                            <option value="Commis III" name="Commis III">
                                                Commis III                  </option>
                                            <option value="Commis II" name="Commis II">
                                                Commis II                  </option>
                                            <option value="Commis I" name="Commis I">
                                                Commis I                  </option>
                                            <option value="Cook" name="Cook">
                                                Cook                  </option>
                                            <option value="Halwaii" name="Halwaii">
                                                Halwaii                  </option>
                                            <option value="Tandoori Chef" name="Tandoori Chef">
                                                Tandoori Chef                  </option>
                                            <option value="Tandoori Master" name="Tandoori Master">
                                                Tandoori Master                  </option>
                                            <option value="Kandhahaar Roti Chef" name="Kandhahaar Roti Chef">
                                                Kandhahaar Roti Chef                  </option>
                                            <option value="Sweet Maker" name="Sweet Maker">
                                                Sweet Maker                  </option>
                                            <option value="Chaat Master" name="Chaat Master">
                                                Chaat Master                  </option>
                                            <option value="Garde Manger" name="Garde Manger">
                                                Garde Manger                  </option>
                                            <option value="Banquet Chef" name="Banquet Chef">
                                                Banquet Chef                  </option>
                                            <option value="ODC Chef" name="ODC Chef">
                                                ODC Chef                  </option>
                                            <option value="Soushi Chef" name="Soushi Chef">
                                                Soushi Chef                  </option>
                                            <option value="Senior Butcher" name="Senior Butcher">
                                                Senior Butcher                  </option>
                                            <option value="Butcher" name="Butcher">
                                                Butcher                  </option>
                                            <option value=" Assistant Butcher" name=" Assistant Butcher">
                                                Assistant Butcher                  </option>
                                            <option value="Runner" name="Runner">
                                                Runner                  </option>
                                            <option value="KOT Assistant" name="KOT Assistant">
                                                KOT Assistant                  </option>
                                            <option value="Staff Cafeteria Manager" name="Staff Cafeteria Manager">
                                                Staff Cafeteria Manager                  </option>
                                            <option value="Staff Cafeteria Supervisor" name="Staff Cafeteria Supervisor">
                                                Staff Cafeteria Supervisor                  </option>
                                            <option value="Staff Cafeteria Head Chef" name="Staff Cafeteria Head Chef">
                                                Staff Cafeteria Head Chef                  </option>
                                            <option value="Staff Cafeteria Chef" name="Staff Cafeteria Chef">
                                                Staff Cafeteria Chef                  </option>
                                            <option value="Staff Cafeteria Cook" name="Staff Cafeteria Cook">
                                                Staff Cafeteria Cook                  </option>
                                            <option value="Staff Cafeteria Commis" name="Staff Cafeteria Commis">
                                                Staff Cafeteria Commis                  </option>
                                            <option value="Staff Cafeteria Helper" name="Staff Cafeteria Helper">
                                                Staff Cafeteria Helper                  </option>
                                            <option value="Kitchen Manager" name="Kitchen Manager">
                                                Kitchen Manager                  </option>
                                            <option value="Kitchen Supervisor" name="Kitchen Supervisor">
                                                Kitchen Supervisor                  </option>
                                            <option value="Senior Kitchen Stewarding Manager" name="Senior Kitchen Stewarding Manager">
                                                Senior Kitchen Stewarding Manager                  </option>
                                            <option value="Kitchen Stewarding Manager" name="Kitchen Stewarding Manager">
                                                Kitchen Stewarding Manager                  </option>
                                            <option value="Assistant Manager-Kitchen Stewarding" name="Assistant Manager-Kitchen Stewarding">
                                                Assistant Manager-Kitchen Stewarding                  </option>
                                            <option value="Senior Kitchen Stewarding Executive" name="Senior Kitchen Stewarding Executive">
                                                Senior Kitchen Stewarding Executive                  </option>
                                            <option value="Kitchen Stewarding Executive" name="Kitchen Stewarding Executive">
                                                Kitchen Stewarding Executive                  </option>
                                            <option value="Senior Kitchen Stewarding Supevisor" name="Senior Kitchen Stewarding Supevisor">
                                                Senior Kitchen Stewarding Supevisor                  </option>
                                            <option value="Kitchen Stewarding Supevisor" name="Kitchen Stewarding Supevisor">
                                                Kitchen Stewarding Supevisor                  </option>
                                            <option value="Kitchen Stewarding Associate" name="Kitchen Stewarding Associate">
                                                Kitchen Stewarding Associate                  </option>
                                            <option value="Dishwasher" name="Dishwasher">
                                                Dishwasher                  </option>
                                            <option value="Director Human Resources" name="Director Human Resources">
                                                Director Human Resources                  </option>
                                            <option value="Associate Director Human Resources" name="Associate Director Human Resources">
                                                Associate Director Human Resources                  </option>
                                            <option value="Director Talent Management" name="Director Talent Management">
                                                Director Talent Management                  </option>
                                            <option value="Associate Director Talent Management" name="Associate Director Talent Management">
                                                Associate Director Talent Management                  </option>
                                            <option value="Director Talent & Culture" name="Director Talent & Culture">
                                                Director Talent & Culture                  </option>
                                            <option value="Associate Director Talent & Culture" name="Associate Director Talent & Culture">
                                                Associate Director Talent & Culture                  </option>
                                            <option value="Director Talent Development" name="Director Talent Development">
                                                Director Talent Development                  </option>
                                            <option value="Associate Director Talent Development" name="Associate Director Talent Development">
                                                Associate Director Talent Development                  </option>
                                            <option value="Director Employee Engagement" name="Director Employee Engagement">
                                                Director Employee Engagement                  </option>
                                            <option value="Associate Director Employee Engagement" name="Associate Director Employee Engagement">
                                                Associate Director Employee Engagement                  </option>
                                            <option value="Director HR & Administration" name="Director HR & Administration">
                                                Director HR & Administration                  </option>
                                            <option value="Associate Director HR & Administration" name="Associate Director HR & Administration">
                                                Associate Director HR & Administration                  </option>
                                            <option value="Manager HR" name="Manager HR">
                                                Manager HR                  </option>
                                            <option value="HR Manager" name="HR Manager">
                                                HR Manager                  </option>
                                            <option value="Deputy HR Manager" name="Deputy HR Manager">
                                                Deputy HR Manager                  </option>
                                            <option value="Assistant HR Manager" name="Assistant HR Manager">
                                                Assistant HR Manager                  </option>
                                            <option value="Assistant Manager HR" name="Assistant Manager HR">
                                                Assistant Manager HR                  </option>
                                            <option value="Manager Employee Benefits" name="Manager Employee Benefits">
                                                Manager Employee Benefits                  </option>
                                            <option value="Assistant Manager Employee Benefits" name="Assistant Manager Employee Benefits">
                                                Assistant Manager Employee Benefits                  </option>
                                            <option value="Manager Employee Welfare" name="Manager Employee Welfare">
                                                Manager Employee Welfare                  </option>
                                            <option value="Assistant Manager Employee Welfare" name="Assistant Manager Employee Welfare">
                                                Assistant Manager Employee Welfare                  </option>
                                            <option value="Manager Compensation & Benefits" name="Manager Compensation & Benefits">
                                                Manager Compensation & Benefits                  </option>
                                            <option value="Assistant Manager Compensation & Benefits" name="Assistant Manager Compensation & Benefits">
                                                Assistant Manager Compensation & Benefits                  </option>
                                            <option value="Manager Statutory Compliance" name="Manager Statutory Compliance">
                                                Manager Statutory Compliance                  </option>
                                            <option value="Assistant Manager Statutory Compliance" name="Assistant Manager Statutory Compliance">
                                                Assistant Manager Statutory Compliance                  </option>
                                            <option value="Manager HR & IR" name="Manager HR & IR">
                                                Manager HR & IR                  </option>
                                            <option value="Assistant Manager HR & IR" name="Assistant Manager HR & IR">
                                                Assistant Manager HR & IR                  </option>
                                            <option value="Payroll Manager" name="Payroll Manager">
                                                Payroll Manager                  </option>
                                            <option value="Senior HR Executive" name="Senior HR Executive">
                                                Senior HR Executive                  </option>
                                            <option value="HR Executive" name="HR Executive">
                                                HR Executive                  </option>
                                            <option value="HR Team Leader" name="HR Team Leader">
                                                HR Team Leader                  </option>
                                            <option value="HR Supervisor" name="HR Supervisor">
                                                HR Supervisor                  </option>
                                            <option value="Payroll Executive" name="Payroll Executive">
                                                Payroll Executive                  </option>
                                            <option value="HR Assistant" name="HR Assistant">
                                                HR Assistant                  </option>
                                            <option value="HR Associate" name="HR Associate">
                                                HR Associate                  </option>
                                            <option value="HR Team Member" name="HR Team Member">
                                                HR Team Member                  </option>
                                            <option value="General Manager L & D" name="General Manager L & D">
                                                General Manager L & D                  </option>
                                            <option value="L & D Manager" name="L & D Manager">
                                                L & D Manager                  </option>
                                            <option value="Manager L & D" name="Manager L & D">
                                                Manager L & D                  </option>
                                            <option value="Training Manager" name="Training Manager">
                                                Training Manager                  </option>
                                            <option value="T & D Manager" name="T & D Manager">
                                                T & D Manager                  </option>
                                            <option value="Assistant L & D Manager" name="Assistant L & D Manager">
                                                Assistant L & D Manager                  </option>
                                            <option value="Assistant Manager L & D" name="Assistant Manager L & D">
                                                Assistant Manager L & D                  </option>
                                            <option value="L & D Co-ordinator" name="L & D Co-ordinator">
                                                L & D Co-ordinator                  </option>
                                            <option value="Training Co-ordinator" name="Training Co-ordinator">
                                                Training Co-ordinator                  </option>
                                            <option value="Trainee" name="Trainee">
                                                Trainee                  </option>
                                            <option value="Apprentice" name="Apprentice">
                                                Apprentice                  </option>
                                            <option value="Management Trainee" name="Management Trainee">
                                                Management Trainee                  </option>
                                            <option value="Hotel Operations Trainee" name="Hotel Operations Trainee">
                                                Hotel Operations Trainee                  </option>
                                            <option value="HOMT" name="HOMT">
                                                HOMT                  </option>
                                            <option value="Chief Financial Officer" name="Chief Financial Officer">
                                                Chief Financial Officer                  </option>
                                            <option value="Director Finance & Accounts" name="Director Finance & Accounts">
                                                Director Finance & Accounts                  </option>
                                            <option value="Director Finance" name="Director Finance">
                                                Director Finance                  </option>
                                            <option value="Chief Accountant" name="Chief Accountant">
                                                Chief Accountant                  </option>
                                            <option value="Associate Director Finance & Accounts" name="Associate Director Finance & Accounts">
                                                Associate Director Finance & Accounts                  </option>
                                            <option value="Senior Finance Manager" name="Senior Finance Manager">
                                                Senior Finance Manager                  </option>
                                            <option value="Senior Manager Finance" name="Senior Manager Finance">
                                                Senior Manager Finance                  </option>
                                            <option value="Senior Finance & Accounts Manager" name="Senior Finance & Accounts Manager">
                                                Senior Finance & Accounts Manager                  </option>
                                            <option value="Senior Manager Finance & Accounts" name="Senior Manager Finance & Accounts">
                                                Senior Manager Finance & Accounts                  </option>
                                            <option value="Senior Accounts Manager" name="Senior Accounts Manager">
                                                Senior Accounts Manager                  </option>
                                            <option value="Senior Manager Accounts" name="Senior Manager Accounts">
                                                Senior Manager Accounts                  </option>
                                            <option value="Finance Manager" name="Finance Manager">
                                                Finance Manager                  </option>
                                            <option value="Accounts Manager" name="Accounts Manager">
                                                Accounts Manager                  </option>
                                            <option value="Senior Accounts Officer" name="Senior Accounts Officer">
                                                Senior Accounts Officer                  </option>
                                            <option value="Accounts Officer" name="Accounts Officer">
                                                Accounts Officer                  </option>
                                            <option value="Senior Finance Executive" name="Senior Finance Executive">
                                                Senior Finance Executive                  </option>
                                            <option value="Finance Executive" name="Finance Executive">
                                                Finance Executive                  </option>
                                            <option value="Senior Accounts Executive" name="Senior Accounts Executive">
                                                Senior Accounts Executive                  </option>
                                            <option value="Accounts Executive" name="Accounts Executive">
                                                Accounts Executive                  </option>
                                            <option value="Senior Accounts Supervisor" name="Senior Accounts Supervisor">
                                                Senior Accounts Supervisor                  </option>
                                            <option value="Accounts Supervisor" name="Accounts Supervisor">
                                                Accounts Supervisor                  </option>
                                            <option value="Finance Team Leader" name="Finance Team Leader">
                                                Finance Team Leader                  </option>
                                            <option value="Accounts Team Leader" name="Accounts Team Leader">
                                                Accounts Team Leader                  </option>
                                            <option value="Finance Team Member" name="Finance Team Member">
                                                Finance Team Member                  </option>
                                            <option value="Senior Finance Assistant" name="Senior Finance Assistant">
                                                Senior Finance Assistant                  </option>
                                            <option value="Finance Assistant" name="Finance Assistant">
                                                Finance Assistant                  </option>
                                            <option value="Accounts Team Member" name="Accounts Team Member">
                                                Accounts Team Member                  </option>
                                            <option value="Senior Accounts Assistant" name="Senior Accounts Assistant">
                                                Senior Accounts Assistant                  </option>
                                            <option value="Accounts Assistant" name="Accounts Assistant">
                                                Accounts Assistant                  </option>
                                            <option value="Senior Cashier" name="Senior Cashier">
                                                Senior Cashier                  </option>
                                            <option value="Cashier" name="Cashier">
                                                Cashier                  </option>
                                            <option value="Restaurant Cashier" name="Restaurant Cashier">
                                                Restaurant Cashier                  </option>
                                            <option value="Hotel Deposit Clerk" name="Hotel Deposit Clerk">
                                                Hotel Deposit Clerk                  </option>
                                            <option value="Accounts Payables Assistant" name="Accounts Payables Assistant">
                                                Accounts Payables Assistant                  </option>
                                            <option value="Payables Executive" name="Payables Executive">
                                                Payables Executive                  </option>
                                            <option value="Credits Manager" name="Credits Manager">
                                                Credits Manager                  </option>
                                            <option value="Assistant Manager Credits" name="Assistant Manager Credits">
                                                Assistant Manager Credits                  </option>
                                            <option value="Senior Credits Executive" name="Senior Credits Executive">
                                                Senior Credits Executive                  </option>
                                            <option value="Credits Executive" name="Credits Executive">
                                                Credits Executive                  </option>
                                            <option value="Credits Team Leader" name="Credits Team Leader">
                                                Credits Team Leader                  </option>
                                            <option value="Senior Credits Supervisor" name="Senior Credits Supervisor">
                                                Senior Credits Supervisor                  </option>
                                            <option value="Credits Supervisor" name="Credits Supervisor">
                                                Credits Supervisor                  </option>
                                            <option value="Senior Credits Assistant" name="Senior Credits Assistant">
                                                Senior Credits Assistant                  </option>
                                            <option value="Credits Assistant" name="Credits Assistant">
                                                Credits Assistant                  </option>
                                            <option value="Night Auditor" name="Night Auditor">
                                                Night Auditor                  </option>
                                            <option value="Night Clerk" name="Night Clerk">
                                                Night Clerk                  </option>
                                            <option value="Senior F & B Controller" name="Senior F & B Controller">
                                                Senior F & B Controller                  </option>
                                            <option value="F & B Controller" name="F & B Controller">
                                                F & B Controller                  </option>
                                            <option value="Controller F & B Events" name="Controller F & B Events">
                                                Controller F & B Events                  </option>
                                            <option value="F & B Controls Assistant" name="F & B Controls Assistant">
                                                F & B Controls Assistant                  </option>
                                            <option value="Senior Strores Manager" name="Senior Strores Manager">
                                                Senior Strores Manager                  </option>
                                            <option value="Stores Manager" name="Stores Manager">
                                                Stores Manager                  </option>
                                            <option value="Manager Stores" name="Manager Stores">
                                                Manager Stores                  </option>
                                            <option value="Assistant Stores Manager" name="Assistant Stores Manager">
                                                Assistant Stores Manager                  </option>
                                            <option value="Assistant Manager Stores" name="Assistant Manager Stores">
                                                Assistant Manager Stores                  </option>
                                            <option value="Senior Stores Officer" name="Senior Stores Officer">
                                                Senior Stores Officer                  </option>
                                            <option value="Stores Officer" name="Stores Officer">
                                                Stores Officer                  </option>
                                            <option value="Receiving Officer" name="Receiving Officer">
                                                Receiving Officer                  </option>
                                            <option value="Senior Stores Executive" name="Senior Stores Executive">
                                                Senior Stores Executive                  </option>
                                            <option value="Stores Executive" name="Stores Executive">
                                                Stores Executive                  </option>
                                            <option value="Stores Team Leader" name="Stores Team Leader">
                                                Stores Team Leader                  </option>
                                            <option value="Stores Team Member" name="Stores Team Member">
                                                Stores Team Member                  </option>
                                            <option value="Senior Stores Assistant" name="Senior Stores Assistant">
                                                Senior Stores Assistant                  </option>
                                            <option value="Stores Assistant" name="Stores Assistant">
                                                Stores Assistant                  </option>
                                            <option value="Senior Store Keeper" name="Senior Store Keeper">
                                                Senior Store Keeper                  </option>
                                            <option value="Store Keeper" name="Store Keeper">
                                                Store Keeper                  </option>
                                            <option value="Receiving Assistant" name="Receiving Assistant">
                                                Receiving Assistant                  </option>
                                            <option value="Director Materials" name="Director Materials">
                                                Director Materials                  </option>
                                            <option value="Director Procurement" name="Director Procurement">
                                                Director Procurement                  </option>
                                            <option value="Associate Director Materials" name="Associate Director Materials">
                                                Associate Director Materials                  </option>
                                            <option value="Associate Director Procurement" name="Associate Director Procurement">
                                                Associate Director Procurement                  </option>
                                            <option value="Materials Manager" name="Materials Manager">
                                                Materials Manager                  </option>
                                            <option value="Purchase Manager" name="Purchase Manager">
                                                Purchase Manager                  </option>
                                            <option value="Assistant Materials Manager" name="Assistant Materials Manager">
                                                Assistant Materials Manager                  </option>
                                            <option value="Assistant Purchase Manager" name="Assistant Purchase Manager">
                                                Assistant Purchase Manager                  </option>
                                            <option value="Assistant Manager Materials" name="Assistant Manager Materials">
                                                Assistant Manager Materials                  </option>
                                            <option value="Assistant Manager Materials" name="Assistant Manager Materials">
                                                Assistant Manager Materials                  </option>
                                            <option value="Materials Officer" name="Materials Officer">
                                                Materials Officer                  </option>
                                            <option value="Purchase Officer" name="Purchase Officer">
                                                Purchase Officer                  </option>
                                            <option value="Senior Materials Executive" name="Senior Materials Executive">
                                                Senior Materials Executive                  </option>
                                            <option value="Senior Purchase Executive" name="Senior Purchase Executive">
                                                Senior Purchase Executive                  </option>
                                            <option value="Materials Executive" name="Materials Executive">
                                                Materials Executive                  </option>
                                            <option value="Purchase Executive" name="Purchase Executive">
                                                Purchase Executive                  </option>
                                            <option value="Senior Materials Assistant" name="Senior Materials Assistant">
                                                Senior Materials Assistant                  </option>
                                            <option value="Senior Purchase Assistant" name="Senior Purchase Assistant">
                                                Senior Purchase Assistant                  </option>
                                            <option value="Materials Assistant" name="Materials Assistant">
                                                Materials Assistant                  </option>
                                            <option value="Purchase Assistant" name="Purchase Assistant">
                                                Purchase Assistant                  </option>
                                            <option value="Materials Team Leader" name="Materials Team Leader">
                                                Materials Team Leader                  </option>
                                            <option value="Materials Team Member" name="Materials Team Member">
                                                Materials Team Member                  </option>
                                            <option value="Purchase Team Leader" name="Purchase Team Leader">
                                                Purchase Team Leader                  </option>
                                            <option value="Purchase Team Member" name="Purchase Team Member">
                                                Purchase Team Member                  </option>
                                            <option value="Corporate Security Officer/CSO" name="Corporate Security Officer/CSO">
                                                Corporate Security Officer/CSO                  </option>
                                            <option value="Director-Security & Safety" name="Director-Security & Safety">
                                                Director-Security & Safety                  </option>
                                            <option value="Security Manager" name="Security Manager">
                                                Security Manager                  </option>
                                            <option value="Manager Security" name="Manager Security">
                                                Manager Security                  </option>
                                            <option value="Assistant Security Manager" name="Assistant Security Manager">
                                                Assistant Security Manager                  </option>
                                            <option value="Assistant Manager Security" name="Assistant Manager Security">
                                                Assistant Manager Security                  </option>
                                            <option value="Senior Security Officer" name="Senior Security Officer">
                                                Senior Security Officer                  </option>
                                            <option value="Security Officer" name="Security Officer">
                                                Security Officer                  </option>
                                            <option value="Assistant Security Officer" name="Assistant Security Officer">
                                                Assistant Security Officer                  </option>
                                            <option value="Senior Security Executive" name="Senior Security Executive">
                                                Senior Security Executive                  </option>
                                            <option value="Security Executive" name="Security Executive">
                                                Security Executive                  </option>
                                            <option value="Senior Security Supervisor" name="Senior Security Supervisor">
                                                Senior Security Supervisor                  </option>
                                            <option value="Security Supervisor" name="Security Supervisor">
                                                Security Supervisor                  </option>
                                            <option value="Security Team Leader" name="Security Team Leader">
                                                Security Team Leader                  </option>
                                            <option value="Senior Security Assistant" name="Senior Security Assistant">
                                                Senior Security Assistant                  </option>
                                            <option value="Security Assistant" name="Security Assistant">
                                                Security Assistant                  </option>
                                            <option value="Security Team Member" name="Security Team Member">
                                                Security Team Member                  </option>
                                            <option value="Security Guard" name="Security Guard">
                                                Security Guard                  </option>
                                            <option value="Time Office Guard" name="Time Office Guard">
                                                Time Office Guard                  </option>
                                            <option value="Female Frisking Attendant" name="Female Frisking Attendant">
                                                Female Frisking Attendant                  </option>
                                            <option value="Senior DoorMan" name="Senior DoorMan">
                                                Senior DoorMan                  </option>
                                            <option value="DoorMan" name="DoorMan">
                                                DoorMan                  </option>
                                            <option value="Baggage Scanner Assistant" name="Baggage Scanner Assistant">
                                                Baggage Scanner Assistant                  </option>
                                            <option value="CCTV Monitoring Assistant" name="CCTV Monitoring Assistant">
                                                CCTV Monitoring Assistant                  </option>
                                            <option value="Control Room Assistant" name="Control Room Assistant">
                                                Control Room Assistant                  </option>
                                            <option value="Senior Valet Supervisor" name="Senior Valet Supervisor">
                                                Senior Valet Supervisor                  </option>
                                            <option value="Valet Parking Supervisor" name="Valet Parking Supervisor">
                                                Valet Parking Supervisor                  </option>
                                            <option value="Valet Driver Supervisor" name="Valet Driver Supervisor">
                                                Valet Driver Supervisor                  </option>
                                            <option value="Senior Valet Driver" name="Senior Valet Driver">
                                                Senior Valet Driver                  </option>
                                            <option value="Valet Driver" name="Valet Driver">
                                                Valet Driver                  </option>
                                            <option value="Valet Parker" name="Valet Parker">
                                                Valet Parker                  </option>
                                            <option value="Valet Parking Assistant" name="Valet Parking Assistant">
                                                Valet Parking Assistant                  </option>
                                            <option value="Senior Driver" name="Senior Driver">
                                                Senior Driver                  </option>
                                            <option value="Driver" name="Driver">
                                                Driver                  </option>
                                            <option value="Vehicle Cleaner" name="Vehicle Cleaner">
                                                Vehicle Cleaner                  </option>
                                            <option value="Vehicle Serviceman" name="Vehicle Serviceman">
                                                Vehicle Serviceman                  </option>
                                            <option value="Director Engineering" name="Director Engineering">
                                                Director Engineering                  </option>
                                            <option value="Director Maintenance" name="Director Maintenance">
                                                Director Maintenance                  </option>
                                            <option value="Director Engineering & Maintenance" name="Director Engineering & Maintenance">
                                                Director Engineering & Maintenance                  </option>
                                            <option value="Associate Director Engineering" name="Associate Director Engineering">
                                                Associate Director Engineering                  </option>
                                            <option value="Associate Director Maintenance" name="Associate Director Maintenance">
                                                Associate Director Maintenance                  </option>
                                            <option value="Associate Director Engineering & Maintenance" name="Associate Director Engineering & Maintenance">
                                                Associate Director Engineering & Maintenance                  </option>
                                            <option value="Chief Engineer" name="Chief Engineer">
                                                Chief Engineer                  </option>
                                            <option value="Deputy Chief Engineer" name="Deputy Chief Engineer">
                                                Deputy Chief Engineer                  </option>
                                            <option value="Assistant Engineer" name="Assistant Engineer">
                                                Assistant Engineer                  </option>
                                            <option value="Maintenance Engineer" name="Maintenance Engineer">
                                                Maintenance Engineer                  </option>
                                            <option value="Senior Maintenance Manager" name="Senior Maintenance Manager">
                                                Senior Maintenance Manager                  </option>
                                            <option value="Maintenance Manager" name="Maintenance Manager">
                                                Maintenance Manager                  </option>
                                            <option value="Senior Shift Engineer" name="Senior Shift Engineer">
                                                Senior Shift Engineer                  </option>
                                            <option value="Shift Engineer" name="Shift Engineer">
                                                Shift Engineer                  </option>
                                            <option value="Senior Shift Supervisor" name="Senior Shift Supervisor">
                                                Senior Shift Supervisor                  </option>
                                            <option value="Shift Supervisor" name="Shift Supervisor">
                                                Shift Supervisor                  </option>
                                            <option value="Senior Maintenance Executive" name="Senior Maintenance Executive">
                                                Senior Maintenance Executive                  </option>
                                            <option value="Maintenance Executive" name="Maintenance Executive">
                                                Maintenance Executive                  </option>
                                            <option value="Senior Engineering Executive" name="Senior Engineering Executive">
                                                Senior Engineering Executive                  </option>
                                            <option value="Engineering Executive" name="Engineering Executive">
                                                Engineering Executive                  </option>
                                            <option value="Senior Maintenance Supervisor" name="Senior Maintenance Supervisor">
                                                Senior Maintenance Supervisor                  </option>
                                            <option value="Maintenance Supervisor" name="Maintenance Supervisor">
                                                Maintenance Supervisor                  </option>
                                            <option value="Senior Engineering Supervisor" name="Senior Engineering Supervisor">
                                                Senior Engineering Supervisor                  </option>
                                            <option value="Engineering Supervisor" name="Engineering Supervisor">
                                                Engineering Supervisor                  </option>
                                            <option value="Maintenance Team Leader" name="Maintenance Team Leader">
                                                Maintenance Team Leader                  </option>
                                            <option value="Engineering Team Leader" name="Engineering Team Leader">
                                                Engineering Team Leader                  </option>
                                            <option value="Maintenance Team Member" name="Maintenance Team Member">
                                                Maintenance Team Member                  </option>
                                            <option value="Engineering Team Member" name="Engineering Team Member">
                                                Engineering Team Member                  </option>
                                            <option value="General Tradesman" name="General Tradesman">
                                                General Tradesman                  </option>
                                            <option value="Senior Maintenance Assistant" name="Senior Maintenance Assistant">
                                                Senior Maintenance Assistant                  </option>
                                            <option value="Maintenance Assistant" name="Maintenance Assistant">
                                                Maintenance Assistant                  </option>
                                            <option value="Senior Engineering Assistant" name="Senior Engineering Assistant">
                                                Senior Engineering Assistant                  </option>
                                            <option value="Engineering Assistant" name="Engineering Assistant">
                                                Engineering Assistant                  </option>
                                            <option value="Senior Techinical Executive" name="Senior Techinical Executive">
                                                Senior Techinical Executive                  </option>
                                            <option value="Techinical Executive" name="Techinical Executive">
                                                Techinical Executive                  </option>
                                            <option value="Senior Techinical Supervisor" name="Senior Techinical Supervisor">
                                                Senior Techinical Supervisor                  </option>
                                            <option value="Techinical Supervisor" name="Techinical Supervisor">
                                                Techinical Supervisor                  </option>
                                            <option value="Senior Technical Assistant" name="Senior Technical Assistant">
                                                Senior Technical Assistant                  </option>
                                            <option value="Technical Assistant" name="Technical Assistant">
                                                Technical Assistant                  </option>
                                            <option value="Senior Technician" name="Senior Technician">
                                                Senior Technician                  </option>
                                            <option value="Technician" name="Technician">
                                                Technician                  </option>
                                            <option value="Senior Electrician" name="Senior Electrician">
                                                Senior Electrician                  </option>
                                            <option value="Electrician" name="Electrician">
                                                Electrician                  </option>
                                            <option value="Senior Welder" name="Senior Welder">
                                                Senior Welder                  </option>
                                            <option value="Welder" name="Welder">
                                                Welder                  </option>
                                            <option value="Senior Plumber" name="Senior Plumber">
                                                Senior Plumber                  </option>
                                            <option value="Plumber" name="Plumber">
                                                Plumber                  </option>
                                            <option value="Senior Carpenter" name="Senior Carpenter">
                                                Senior Carpenter                  </option>
                                            <option value="Carpenter" name="Carpenter">
                                                Carpenter                  </option>
                                            <option value="Senior Painter" name="Senior Painter">
                                                Senior Painter                  </option>
                                            <option value="Painter" name="Painter">
                                                Painter                  </option>
                                            <option value="STP Supervisor" name="STP Supervisor">
                                                STP Supervisor                  </option>
                                            <option value="STP Assistant" name="STP Assistant">
                                                STP Assistant                  </option>
                                            <option value="Control Room Supervisor" name="Control Room Supervisor">
                                                Control Room Supervisor                  </option>
                                            <option value="Control Room Assistant" name="Control Room Assistant">
                                                Control Room Assistant                  </option>
                                            <option value="Boiler Room Attendant" name="Boiler Room Attendant">
                                                Boiler Room Attendant                  </option>
                                            <option value="Plant Room Supervisor" name="Plant Room Supervisor">
                                                Plant Room Supervisor                  </option>
                                            <option value="Plant Room Attendant" name="Plant Room Attendant">
                                                Plant Room Attendant                  </option>
                                            <option value="Maintenance Desk Supervisor" name="Maintenance Desk Supervisor">
                                                Maintenance Desk Supervisor                  </option>
                                            <option value="Maintenance Desk Attendant" name="Maintenance Desk Attendant">
                                                Maintenance Desk Attendant                  </option>
                                            <option value="Kenfixit Supervisor" name="Kenfixit Supervisor">
                                                Kenfixit Supervisor                  </option>
                                            <option value="Kenfixit Team Leader" name="Kenfixit Team Leader">
                                                Kenfixit Team Leader                  </option>
                                            <option value="Kenfixit Attendant" name="Kenfixit Attendant">
                                                Kenfixit Attendant                  </option>
                                            <option value="Kenfixit Team Member" name="Kenfixit Team Member">
                                                Kenfixit Team Member                  </option>
                                            <option value="PM Team Leader" name="PM Team Leader">
                                                PM Team Leader                  </option>
                                            <option value="PM Team Member" name="PM Team Member">
                                                PM Team Member                  </option>
                                            <option value="Director IT" name="Director IT">
                                                Director IT                  </option>
                                            <option value="Head IT" name="Head IT">
                                                Head IT                  </option>
                                            <option value="Associate Director IT" name="Associate Director IT">
                                                Associate Director IT                  </option>
                                            <option value="Senior IT Manager" name="Senior IT Manager">
                                                Senior IT Manager                  </option>
                                            <option value="Senior Manager IT" name="Senior Manager IT">
                                                Senior Manager IT                  </option>
                                            <option value="IT Manager" name="IT Manager">
                                                IT Manager                  </option>
                                            <option value="Manager IT" name="Manager IT">
                                                Manager IT                  </option>
                                            <option value="Deputy  Manager IT" name="Deputy  Manager IT">
                                                Deputy  Manager IT                  </option>
                                            <option value="Assistant  Manager IT" name="Assistant  Manager IT">
                                                Assistant  Manager IT                  </option>
                                            <option value="Senior  IT Executive" name="Senior  IT Executive">
                                                Senior  IT Executive                  </option>
                                            <option value="IT Executive" name="IT Executive">
                                                IT Executive                  </option>
                                            <option value="IT Assistant" name="IT Assistant">
                                                IT Assistant                  </option>
                                            <option value="Wifi Executive" name="Wifi Executive">
                                                Wifi Executive                  </option>
                                            <option value="Wifi Assistant" name="Wifi Assistant">
                                                Wifi Assistant                  </option>
                                            <option value="Executive Assistant to Chairman" name="Executive Assistant to Chairman">
                                                Executive Assistant to Chairman                  </option>
                                            <option value="Executive Assistant to Managing Director" name="Executive Assistant to Managing Director">
                                                Executive Assistant to Managing Director                  </option>
                                            <option value="Executive Secretary to Chairman" name="Executive Secretary to Chairman">
                                                Executive Secretary to Chairman                  </option>
                                            <option value="Executive Secretary to Managing Director" name="Executive Secretary to Managing Director">
                                                Executive Secretary to Managing Director                  </option>
                                            <option value="Secretary to Chairman" name="Secretary to Chairman">
                                                Secretary to Chairman                  </option>
                                            <option value="Secretary to Managing Director" name="Secretary to Managing Director">
                                                Secretary to Managing Director                  </option>
                                            <option value="Group CEO" name="Group CEO">
                                                Group CEO                  </option>
                                            <option value="Chief Operating Officer" name="Chief Operating Officer">
                                                Chief Operating Officer                  </option>
                                            <option value="Chief Resorts Officer" name="Chief Resorts Officer">
                                                Chief Resorts Officer                  </option>
                                            <option value="Executive Director" name="Executive Director">
                                                Executive Director                  </option>
                                            <option value="Country Head" name="Country Head">
                                                Country Head                  </option>
                                            <option value="Head Business Excellence" name="Head Business Excellence">
                                                Head Business Excellence                  </option>
                                            <option value="SBU Head" name="SBU Head">
                                                SBU Head                  </option>
                                            <option value="Cluster Head" name="Cluster Head">
                                                Cluster Head                  </option>
                                            <option value="Executive Secretary to Group CEO" name="Executive Secretary to Group CEO">
                                                Executive Secretary to Group CEO                  </option>
                                            <option value="Secretary to Group CEO" name="Secretary to Group CEO">
                                                Secretary to Group CEO                  </option>
                                            <option value="Executive Secretary to COO" name="Executive Secretary to COO">
                                                Executive Secretary to COO                  </option>
                                            <option value="Secretary to COO" name="Secretary to COO">
                                                Secretary to COO                  </option>
                                            <option value="Executive Secretary to CRO" name="Executive Secretary to CRO">
                                                Executive Secretary to CRO                  </option>
                                            <option value="Secretary to CRO" name="Secretary to CRO">
                                                Secretary to CRO                  </option>
                                            <option value="Executive Secretary to ED" name="Executive Secretary to ED">
                                                Executive Secretary to ED                  </option>
                                            <option value="Secretary to ED" name="Secretary to ED">
                                                Secretary to ED                  </option>
                                            <option value="Director-Operations" name="Director-Operations">
                                                Director-Operations                  </option>
                                            <option value="Executive President-Operations" name="Executive President-Operations">
                                                Executive President-Operations                  </option>
                                            <option value="Executive Vice President-Operations" name="Executive Vice President-Operations">
                                                Executive Vice President-Operations                  </option>
                                            <option value="Global Head-Operations" name="Global Head-Operations">
                                                Global Head-Operations                  </option>
                                            <option value="Senior Vice President-Operations" name="Senior Vice President-Operations">
                                                Senior Vice President-Operations                  </option>
                                            <option value="Vice President Operations" name="Vice President Operations">
                                                Vice President Operations                  </option>
                                            <option value="Assistant Vice President-Operations" name="Assistant Vice President-Operations">
                                                Assistant Vice President-Operations                  </option>
                                            <option value="Associate Director-Operations" name="Associate Director-Operations">
                                                Associate Director-Operations                  </option>
                                            <option value="Senior General Manager-Operations" name="Senior General Manager-Operations">
                                                Senior General Manager-Operations                  </option>
                                            <option value="Group General Manager-Operations" name="Group General Manager-Operations">
                                                Group General Manager-Operations                  </option>
                                            <option value="Deputy General Manager-Operations" name="Deputy General Manager-Operations">
                                                Deputy General Manager-Operations                  </option>
                                            <option value="Assistant General Manager-Operations" name="Assistant General Manager-Operations">
                                                Assistant General Manager-Operations                  </option>
                                            <option value="Senior Corporate Manager-Operations" name="Senior Corporate Manager-Operations">
                                                Senior Corporate Manager-Operations                  </option>
                                            <option value="Head Operations" name="Head Operations">
                                                Head Operations                  </option>
                                            <option value="Corporate Head-Operations" name="Corporate Head-Operations">
                                                Corporate Head-Operations                  </option>
                                            <option value="Corporate Manager-Operations" name="Corporate Manager-Operations">
                                                Corporate Manager-Operations                  </option>
                                            <option value="Assistant Corporate Manager-Operations" name="Assistant Corporate Manager-Operations">
                                                Assistant Corporate Manager-Operations                  </option>
                                            <option value="Corporate Executive-Operations" name="Corporate Executive-Operations">
                                                Corporate Executive-Operations                  </option>
                                            <option value="Cluster Head Operations" name="Cluster Head Operations">
                                                Cluster Head Operations                  </option>
                                            <option value="Regional Head Operations" name="Regional Head Operations">
                                                Regional Head Operations                  </option>
                                            <option value="Director-Business Development" name="Director-Business Development">
                                                Director-Business Development                  </option>
                                            <option value="Executive President-Business Development" name="Executive President-Business Development">
                                                Executive President-Business Development                  </option>
                                            <option value="Executive Vice President-Business Development" name="Executive Vice President-Business Development">
                                                Executive Vice President-Business Development                  </option>
                                            <option value="Global Head-Business Development" name="Global Head-Business Development">
                                                Global Head-Business Development                  </option>
                                            <option value="Senior Vice President-Business Development" name="Senior Vice President-Business Development">
                                                Senior Vice President-Business Development                  </option>
                                            <option value="Vice President Business Development" name="Vice President Business Development">
                                                Vice President Business Development                  </option>
                                            <option value="Assistant Vice President-Business Development" name="Assistant Vice President-Business Development">
                                                Assistant Vice President-Business Development                  </option>
                                            <option value="Associate Director-Business Development" name="Associate Director-Business Development">
                                                Associate Director-Business Development                  </option>
                                            <option value="Senior General Manager-Business Development" name="Senior General Manager-Business Development">
                                                Senior General Manager-Business Development                  </option>
                                            <option value="General Manager-Business Development" name="General Manager-Business Development">
                                                General Manager-Business Development                  </option>
                                            <option value="Group General Manager-Business Development" name="Group General Manager-Business Development">
                                                Group General Manager-Business Development                  </option>
                                            <option value="Deputy General Manager-Business Development" name="Deputy General Manager-Business Development">
                                                Deputy General Manager-Business Development                  </option>
                                            <option value="Assistant General Manager-Business Development" name="Assistant General Manager-Business Development">
                                                Assistant General Manager-Business Development                  </option>
                                            <option value="Senior Corporate Manager-Business Development" name="Senior Corporate Manager-Business Development">
                                                Senior Corporate Manager-Business Development                  </option>
                                            <option value="Head Business Development" name="Head Business Development">
                                                Head Business Development                  </option>
                                            <option value="Corporate Head-Business Development" name="Corporate Head-Business Development">
                                                Corporate Head-Business Development                  </option>
                                            <option value="Corporate Manager-Business Development" name="Corporate Manager-Business Development">
                                                Corporate Manager-Business Development                  </option>
                                            <option value="Assistant Corporate Manager-Business Development" name="Assistant Corporate Manager-Business Development">
                                                Assistant Corporate Manager-Business Development                  </option>
                                            <option value="Corporate Executive-Business Development" name="Corporate Executive-Business Development">
                                                Corporate Executive-Business Development                  </option>
                                            <option value="Cluster Head Business Development" name="Cluster Head Business Development">
                                                Cluster Head Business Development                  </option>
                                            <option value="Regional Head Business Development" name="Regional Head Business Development">
                                                Regional Head Business Development                  </option>
                                            <option value="Global Head Public Relations" name="Global Head Public Relations">
                                                Global Head Public Relations                  </option>
                                            <option value="Head Public relations" name="Head Public relations">
                                                Head Public relations                  </option>
                                            <option value="National Head Public Relations" name="National Head Public Relations">
                                                National Head Public Relations                  </option>
                                            <option value="India Head Public Relations" name="India Head Public Relations">
                                                India Head Public Relations                  </option>
                                            <option value="Senior Vice President Public relations" name="Senior Vice President Public relations">
                                                Senior Vice President Public relations                  </option>
                                            <option value="Vice President Public relations" name="Vice President Public relations">
                                                Vice President Public relations                  </option>
                                            <option value="Senior General Manager-Public relations" name="Senior General Manager-Public relations">
                                                Senior General Manager-Public relations                  </option>
                                            <option value="General Manager-Public relations" name="General Manager-Public relations">
                                                General Manager-Public relations                  </option>
                                            <option value="Group General Manager-Public relations" name="Group General Manager-Public relations">
                                                Group General Manager-Public relations                  </option>
                                            <option value="Deputy General Manager-Public relations" name="Deputy General Manager-Public relations">
                                                Deputy General Manager-Public relations                  </option>
                                            <option value="Assistant General Manager-Public relations" name="Assistant General Manager-Public relations">
                                                Assistant General Manager-Public relations                  </option>
                                            <option value="Corporate Head Public relations" name="Corporate Head Public relations">
                                                Corporate Head Public relations                  </option>
                                            <option value="Manager Public Relations" name="Manager Public Relations">
                                                Manager Public Relations                  </option>
                                            <option value="Public Relations Manager" name="Public Relations Manager">
                                                Public Relations Manager                  </option>
                                            <option value="Executive Public Relations" name="Executive Public Relations">
                                                Executive Public Relations                  </option>
                                            <option value="Global Head Corporate Communication" name="Global Head Corporate Communication">
                                                Global Head Corporate Communication                  </option>
                                            <option value="Head Corporate communication" name="Head Corporate communication">
                                                Head Corporate communication                  </option>
                                            <option value="National Head Corporate communication" name="National Head Corporate communication">
                                                National Head Corporate communication                  </option>
                                            <option value="India Head Corporate communication" name="India Head Corporate communication">
                                                India Head Corporate communication                  </option>
                                            <option value="Senior Vice President Corporate communication" name="Senior Vice President Corporate communication">
                                                Senior Vice President Corporate communication                  </option>
                                            <option value="Vice President Corporate communication" name="Vice President Corporate communication">
                                                Vice President Corporate communication                  </option>
                                            <option value="Senior General Manager-Corporate Communication" name="Senior General Manager-Corporate Communication">
                                                Senior General Manager-Corporate Communication                  </option>
                                            <option value="General Manager-Corporate Communication" name="General Manager-Corporate Communication">
                                                General Manager-Corporate Communication                  </option>
                                            <option value="Group General Manager-Corporate Communication" name="Group General Manager-Corporate Communication">
                                                Group General Manager-Corporate Communication                  </option>
                                            <option value="Deputy General Manager-Corporate Communication" name="Deputy General Manager-Corporate Communication">
                                                Deputy General Manager-Corporate Communication                  </option>
                                            <option value="Assistant General Manager-Corporate Communication" name="Assistant General Manager-Corporate Communication">
                                                Assistant General Manager-Corporate Communication                  </option>
                                            <option value="Corporate Head  Corporate communication" name="Corporate Head  Corporate communication">
                                                Corporate Head  Corporate communication                  </option>
                                            <option value="Manager Corporate communication" name="Manager Corporate communication">
                                                Manager Corporate communication                  </option>
                                            <option value="Public Corporate communication" name="Public Corporate communication">
                                                Public Corporate communication                  </option>
                                            <option value="Executive Corporate communication" name="Executive Corporate communication">
                                                Executive Corporate communication                  </option>
                                            <option value="Global Head Sales & Marketing" name="Global Head Sales & Marketing">
                                                Global Head Sales & Marketing                  </option>
                                            <option value="Senior Vice President Sales & Marketing" name="Senior Vice President Sales & Marketing">
                                                Senior Vice President Sales & Marketing                  </option>
                                            <option value="Vice President Sales & Marketing" name="Vice President Sales & Marketing">
                                                Vice President Sales & Marketing                  </option>
                                            <option value="Head Sales & Marketing" name="Head Sales & Marketing">
                                                Head Sales & Marketing                  </option>
                                            <option value="National Head Sales & Marketing" name="National Head Sales & Marketing">
                                                National Head Sales & Marketing                  </option>
                                            <option value="India Head Sales & Marketing" name="India Head Sales & Marketing">
                                                India Head Sales & Marketing                  </option>
                                            <option value="Senior General Manager-Sales & Marketing" name="Senior General Manager-Sales & Marketing">
                                                Senior General Manager-Sales & Marketing                  </option>
                                            <option value="General Manager-Sales & Marketing" name="General Manager-Sales & Marketing">
                                                General Manager-Sales & Marketing                  </option>
                                            <option value="Group General Manager-Sales & Marketing" name="Group General Manager-Sales & Marketing">
                                                Group General Manager-Sales & Marketing                  </option>
                                            <option value="Deputy General Manager-Sales & Marketing" name="Deputy General Manager-Sales & Marketing">
                                                Deputy General Manager-Sales & Marketing                  </option>
                                            <option value="Assistant General Manager-Sales & Marketing" name="Assistant General Manager-Sales & Marketing">
                                                Assistant General Manager-Sales & Marketing                  </option>
                                            <option value="Regional Sales Manager" name="Regional Sales Manager">
                                                Regional Sales Manager                  </option>
                                            <option value="Cluster Head Sales & Marketing" name="Cluster Head Sales & Marketing">
                                                Cluster Head Sales & Marketing                  </option>
                                            <option value="Regional Head Sales -South India" name="Regional Head Sales -South India">
                                                Regional Head Sales -South India                  </option>
                                            <option value="Regional Head Sales -North India" name="Regional Head Sales -North India">
                                                Regional Head Sales -North India                  </option>
                                            <option value="Regional Head Sales -Western India" name="Regional Head Sales -Western India">
                                                Regional Head Sales -Western India                  </option>
                                            <option value="Regional Head Sales -Central India" name="Regional Head Sales -Central India">
                                                Regional Head Sales -Central India                  </option>
                                            <option value="Regional Head Sales -Eastern India" name="Regional Head Sales -Eastern India">
                                                Regional Head Sales -Eastern India                  </option>
                                            <option value="Corporate Head Sales & Marketing" name="Corporate Head Sales & Marketing">
                                                Corporate Head Sales & Marketing                  </option>
                                            <option value="Senior Corporate Sales Manager" name="Senior Corporate Sales Manager">
                                                Senior Corporate Sales Manager                  </option>
                                            <option value="Manager Corporate Sales" name="Manager Corporate Sales">
                                                Manager Corporate Sales                  </option>
                                            <option value="Corporate Sales Manager" name="Corporate Sales Manager">
                                                Corporate Sales Manager                  </option>
                                            <option value="Corporate Sales Executive " name="Corporate Sales Executive ">
                                                Corporate Sales Executive                   </option>
                                            <option value="Senior Vice President Sales " name="Senior Vice President Sales ">
                                                Senior Vice President Sales                   </option>
                                            <option value="Vice President Sales " name="Vice President Sales ">
                                                Vice President Sales                   </option>
                                            <option value="Head Sales " name="Head Sales ">
                                                Head Sales                   </option>
                                            <option value="National Head Sales " name="National Head Sales ">
                                                National Head Sales                   </option>
                                            <option value="Senior Vice President Marketing" name="Senior Vice President Marketing">
                                                Senior Vice President Marketing                  </option>
                                            <option value="Vice President Marketing" name="Vice President Marketing">
                                                Vice President Marketing                  </option>
                                            <option value="Head Marketing" name="Head Marketing">
                                                Head Marketing                  </option>
                                            <option value="National Head Marketing" name="National Head Marketing">
                                                National Head Marketing                  </option>
                                            <option value="Manager Corporate Marketing" name="Manager Corporate Marketing">
                                                Manager Corporate Marketing                  </option>
                                            <option value="Corporate Marketing Manager" name="Corporate Marketing Manager">
                                                Corporate Marketing Manager                  </option>
                                            <option value="Corporate Marketing Executive " name="Corporate Marketing Executive ">
                                                Corporate Marketing Executive                   </option>
                                            <option value="Group Chief Financial Officer/GCFO" name="Group Chief Financial Officer/GCFO">
                                                Group Chief Financial Officer/GCFO                  </option>
                                            <option value="Chief Financial Officer/CFO" name="Chief Financial Officer/CFO">
                                                Chief Financial Officer/CFO                  </option>
                                            <option value="Chief Financial Analyst" name="Chief Financial Analyst">
                                                Chief Financial Analyst                  </option>
                                            <option value="Chief Finance & Accounts Officer" name="Chief Finance & Accounts Officer">
                                                Chief Finance & Accounts Officer                  </option>
                                            <option value="Global Head Finance & Accounts" name="Global Head Finance & Accounts">
                                                Global Head Finance & Accounts                  </option>
                                            <option value="National Head Finance & Accounts" name="National Head Finance & Accounts">
                                                National Head Finance & Accounts                  </option>
                                            <option value="India Head Finance & Accounts" name="India Head Finance & Accounts">
                                                India Head Finance & Accounts                  </option>
                                            <option value="Senior Vice President Finance & Accounts" name="Senior Vice President Finance & Accounts">
                                                Senior Vice President Finance & Accounts                  </option>
                                            <option value="Vice President Finance & Accounts" name="Vice President Finance & Accounts">
                                                Vice President Finance & Accounts                  </option>
                                            <option value="Senior General Manager Finance & Accounts" name="Senior General Manager Finance & Accounts">
                                                Senior General Manager Finance & Accounts                  </option>
                                            <option value="General Manager Finance & Accounts" name="General Manager Finance & Accounts">
                                                General Manager Finance & Accounts                  </option>
                                            <option value="Group General Manager Finance & Accounts" name="Group General Manager Finance & Accounts">
                                                Group General Manager Finance & Accounts                  </option>
                                            <option value="Senior General Manager Accounts" name="Senior General Manager Accounts">
                                                Senior General Manager Accounts                  </option>
                                            <option value="General Manager Accounts" name="General Manager Accounts">
                                                General Manager Accounts                  </option>
                                            <option value="Group General Manager Accounts" name="Group General Manager Accounts">
                                                Group General Manager Accounts                  </option>
                                            <option value="Regional  Finance & Accounts Manager" name="Regional  Finance & Accounts Manager">
                                                Regional  Finance & Accounts Manager                  </option>
                                            <option value="Cluster Head Finance & Accounts" name="Cluster Head Finance & Accounts">
                                                Cluster Head Finance & Accounts                  </option>
                                            <option value="Regional Head Finance & Accounts -South India" name="Regional Head Finance & Accounts -South India">
                                                Regional Head Finance & Accounts -South India                  </option>
                                            <option value="Regional Head Finance & Accounts -North India" name="Regional Head Finance & Accounts -North India">
                                                Regional Head Finance & Accounts -North India                  </option>
                                            <option value="Regional Head Finance & Accounts -Western India" name="Regional Head Finance & Accounts -Western India">
                                                Regional Head Finance & Accounts -Western India                  </option>
                                            <option value="Regional Head Finance & Accounts -Central India" name="Regional Head Finance & Accounts -Central India">
                                                Regional Head Finance & Accounts -Central India                  </option>
                                            <option value="Regional Head Finance & Accounts -Eastern India" name="Regional Head Finance & Accounts -Eastern India">
                                                Regional Head Finance & Accounts -Eastern India                  </option>
                                            <option value="Corporate Manager-Finance & Accounts" name="Corporate Manager-Finance & Accounts">
                                                Corporate Manager-Finance & Accounts                  </option>
                                            <option value="Senior Corporate Manager-Finance " name="Senior Corporate Manager-Finance ">
                                                Senior Corporate Manager-Finance                   </option>
                                            <option value="Senior Corporate Manager- Accounts" name="Senior Corporate Manager- Accounts">
                                                Senior Corporate Manager- Accounts                  </option>
                                            <option value="Corporate Manager-Finance " name="Corporate Manager-Finance ">
                                                Corporate Manager-Finance                   </option>
                                            <option value="Corporate Manager- Accounts" name="Corporate Manager- Accounts">
                                                Corporate Manager- Accounts                  </option>
                                            <option value="Corporate Finance Manager" name="Corporate Finance Manager">
                                                Corporate Finance Manager                  </option>
                                            <option value="Corporate Accounts Manager" name="Corporate Accounts Manager">
                                                Corporate Accounts Manager                  </option>
                                            <option value="Group Finance Officer" name="Group Finance Officer">
                                                Group Finance Officer                  </option>
                                            <option value="Group Accounts Officer" name="Group Accounts Officer">
                                                Group Accounts Officer                  </option>
                                            <option value="Senior Corporate Finance Officer" name="Senior Corporate Finance Officer">
                                                Senior Corporate Finance Officer                  </option>
                                            <option value="Corporate Finance Officer" name="Corporate Finance Officer">
                                                Corporate Finance Officer                  </option>
                                            <option value="Senior Corporate Accounts Officer" name="Senior Corporate Accounts Officer">
                                                Senior Corporate Accounts Officer                  </option>
                                            <option value="Corporate Accounts Officer" name="Corporate Accounts Officer">
                                                Corporate Accounts Officer                  </option>
                                            <option value="Senior Corporate Accounts Executive" name="Senior Corporate Accounts Executive">
                                                Senior Corporate Accounts Executive                  </option>
                                            <option value="Corporate Accounts Executive" name="Corporate Accounts Executive">
                                                Corporate Accounts Executive                  </option>
                                            <option value="Senior Corporate Finance Executive" name="Senior Corporate Finance Executive">
                                                Senior Corporate Finance Executive                  </option>
                                            <option value="Corporate Finance Executive" name="Corporate Finance Executive">
                                                Corporate Finance Executive                  </option>
                                            <option value="Senior Corporate Finance Assistant" name="Senior Corporate Finance Assistant">
                                                Senior Corporate Finance Assistant                  </option>
                                            <option value="Corporate Finance Assistant" name="Corporate Finance Assistant">
                                                Corporate Finance Assistant                  </option>
                                            <option value="Senior Corporate Accounts Assistant" name="Senior Corporate Accounts Assistant">
                                                Senior Corporate Accounts Assistant                  </option>
                                            <option value="Corporate Accounts Assistant" name="Corporate Accounts Assistant">
                                                Corporate Accounts Assistant                  </option>
                                            <option value="Group F & B Controller" name="Group F & B Controller">
                                                Group F & B Controller                  </option>
                                            <option value="Corporate F & B Controller" name="Corporate F & B Controller">
                                                Corporate F & B Controller                  </option>
                                            <option value="Senior Corporate Credits Manager" name="Senior Corporate Credits Manager">
                                                Senior Corporate Credits Manager                  </option>
                                            <option value="Corporate Credits Manager" name="Corporate Credits Manager">
                                                Corporate Credits Manager                  </option>
                                            <option value="Group Chief Human Resources Officer/GCHRO" name="Group Chief Human Resources Officer/GCHRO">
                                                Group Chief Human Resources Officer/GCHRO                  </option>
                                            <option value="President Human Resources" name="President Human Resources">
                                                President Human Resources                  </option>
                                            <option value="Chief Human Resources Officer/CHRO" name="Chief Human Resources Officer/CHRO">
                                                Chief Human Resources Officer/CHRO                  </option>
                                            <option value="Chief Human Resources Research Officer" name="Chief Human Resources Research Officer">
                                                Chief Human Resources Research Officer                  </option>
                                            <option value="Chief HR & IR Officer" name="Chief HR & IR Officer">
                                                Chief HR & IR Officer                  </option>
                                            <option value="Global Head Human Resources" name="Global Head Human Resources">
                                                Global Head Human Resources                  </option>
                                            <option value="National Head Human Resources" name="National Head Human Resources">
                                                National Head Human Resources                  </option>
                                            <option value="India Head Human Resources" name="India Head Human Resources">
                                                India Head Human Resources                  </option>
                                            <option value="Senior Vice President Human Resources" name="Senior Vice President Human Resources">
                                                Senior Vice President Human Resources                  </option>
                                            <option value="Vice President Human Resources" name="Vice President Human Resources">
                                                Vice President Human Resources                  </option>
                                            <option value="Vice President Strategic HR" name="Vice President Strategic HR">
                                                Vice President Strategic HR                  </option>
                                            <option value="Vice President Strategic HR Initiatives" name="Vice President Strategic HR Initiatives">
                                                Vice President Strategic HR Initiatives                  </option>
                                            <option value="Senior Vice President Human Resources,Admin,L & D" name="Senior Vice President Human Resources,Admin,L & D">
                                                Senior Vice President Human Resources,Admin,L & D                  </option>
                                            <option value="Senior Vice President Human Resources,Admin,IT" name="Senior Vice President Human Resources,Admin,IT">
                                                Senior Vice President Human Resources,Admin,IT                  </option>
                                            <option value="Senior Vice President Human Resources & Admin" name="Senior Vice President Human Resources & Admin">
                                                Senior Vice President Human Resources & Admin                  </option>
                                            <option value="Vice President Human Resources & Admin" name="Vice President Human Resources & Admin">
                                                Vice President Human Resources & Admin                  </option>
                                            <option value="Senior General Manager Human Resources & Admin" name="Senior General Manager Human Resources & Admin">
                                                Senior General Manager Human Resources & Admin                  </option>
                                            <option value="General Manager Human Resources & Admin" name="General Manager Human Resources & Admin">
                                                General Manager Human Resources & Admin                  </option>
                                            <option value="General Manager Strategic HR" name="General Manager Strategic HR">
                                                General Manager Strategic HR                  </option>
                                            <option value="General Manager Strategic HR Initiatives" name="General Manager Strategic HR Initiatives">
                                                General Manager Strategic HR Initiatives                  </option>
                                            <option value="Senior General Manager Human Resources" name="Senior General Manager Human Resources">
                                                Senior General Manager Human Resources                  </option>
                                            <option value="General Manager Human Resources" name="General Manager Human Resources">
                                                General Manager Human Resources                  </option>
                                            <option value="Group General Manager Human Resources" name="Group General Manager Human Resources">
                                                Group General Manager Human Resources                  </option>
                                            <option value="Senior General Manager Human Resources" name="Senior General Manager Human Resources">
                                                Senior General Manager Human Resources                  </option>
                                            <option value="General Manager Human Resources" name="General Manager Human Resources">
                                                General Manager Human Resources                  </option>
                                            <option value="Group General Manager Human Resources" name="Group General Manager Human Resources">
                                                Group General Manager Human Resources                  </option>
                                            <option value="Regional Human Resources Manager" name="Regional Human Resources Manager">
                                                Regional Human Resources Manager                  </option>
                                            <option value="Cluster Head Human Resources" name="Cluster Head Human Resources">
                                                Cluster Head Human Resources                  </option>
                                            <option value="Regional Head HR-South India" name="Regional Head HR-South India">
                                                Regional Head HR-South India                  </option>
                                            <option value="Regional Head HR-North India" name="Regional Head HR-North India">
                                                Regional Head HR-North India                  </option>
                                            <option value="Regional Head HR-Western India" name="Regional Head HR-Western India">
                                                Regional Head HR-Western India                  </option>
                                            <option value="Regional Head HR-Central India" name="Regional Head HR-Central India">
                                                Regional Head HR-Central India                  </option>
                                            <option value="Regional Head HR-Eastern India" name="Regional Head HR-Eastern India">
                                                Regional Head HR-Eastern India                  </option>
                                            <option value="Corporate Manager-Human Resources" name="Corporate Manager-Human Resources">
                                                Corporate Manager-Human Resources                  </option>
                                            <option value="Senior Corporate Manager-Human Resources" name="Senior Corporate Manager-Human Resources">
                                                Senior Corporate Manager-Human Resources                  </option>
                                            <option value="Senior Corporate Manager- Human Resources" name="Senior Corporate Manager- Human Resources">
                                                Senior Corporate Manager- Human Resources                  </option>
                                            <option value="Corporate Manager-Human Resources" name="Corporate Manager-Human Resources">
                                                Corporate Manager-Human Resources                  </option>
                                            <option value="Corporate Manager- HR & IR" name="Corporate Manager- HR & IR">
                                                Corporate Manager- HR & IR                  </option>
                                            <option value="Corporate Human Resources Manager" name="Corporate Human Resources Manager">
                                                Corporate Human Resources Manager                  </option>
                                            <option value="Corporate HR & IR  Manager" name="Corporate HR & IR  Manager">
                                                Corporate HR & IR  Manager                  </option>
                                            <option value="Group Human Resources Officer" name="Group Human Resources Officer">
                                                Group Human Resources Officer                  </option>
                                            <option value="Group HR & IR  Officer" name="Group HR & IR  Officer">
                                                Group HR & IR  Officer                  </option>
                                            <option value="Senior Corporate Human Resources Officer" name="Senior Corporate Human Resources Officer">
                                                Senior Corporate Human Resources Officer                  </option>
                                            <option value="Corporate Human Resources Officer" name="Corporate Human Resources Officer">
                                                Corporate Human Resources Officer                  </option>
                                            <option value="Senior Corporate HR & IR Officer" name="Senior Corporate HR & IR Officer">
                                                Senior Corporate HR & IR Officer                  </option>
                                            <option value="Corporate HR & IR Officer" name="Corporate HR & IR Officer">
                                                Corporate HR & IR Officer                  </option>
                                            <option value="Senior Corporate Human Resources Executive" name="Senior Corporate Human Resources Executive">
                                                Senior Corporate Human Resources Executive                  </option>
                                            <option value="Corporate HR & IR Executive" name="Corporate HR & IR Executive">
                                                Corporate HR & IR Executive                  </option>
                                            <option value="Senior Corporate HR & IR Executive" name="Senior Corporate HR & IR Executive">
                                                Senior Corporate HR & IR Executive                  </option>
                                            <option value="Corporate Human Resources Executive" name="Corporate Human Resources Executive">
                                                Corporate Human Resources Executive                  </option>
                                            <option value="Senior Corporate HR Assistant" name="Senior Corporate HR Assistant">
                                                Senior Corporate HR Assistant                  </option>
                                            <option value="Corporate HR Assistant" name="Corporate HR Assistant">
                                                Corporate HR Assistant                  </option>
                                            <option value="Senior Corporate HR  Assistant" name="Senior Corporate HR  Assistant">
                                                Senior Corporate HR  Assistant                  </option>
                                            <option value="Corporate HR Assistant" name="Corporate HR Assistant">
                                                Corporate HR Assistant                  </option>
                                            <option value="Vice President L & D" name="Vice President L & D">
                                                Vice President L & D                  </option>
                                            <option value="General Manager L & D" name="General Manager L & D">
                                                General Manager L & D                  </option>
                                            <option value="Corporate Manager L & D" name="Corporate Manager L & D">
                                                Corporate Manager L & D                  </option>
                                            <option value="Vice President Training" name="Vice President Training">
                                                Vice President Training                  </option>
                                            <option value="Group General Manager L & D" name="Group General Manager L & D">
                                                Group General Manager L & D                  </option>
                                            <option value="Vice Presient T & D" name="Vice Presient T & D">
                                                Vice Presient T & D                  </option>
                                            <option value="Senior Corporate L & D Manager" name="Senior Corporate L & D Manager">
                                                Senior Corporate L & D Manager                  </option>
                                            <option value="Corporate L & D Manager" name="Corporate L & D Manager">
                                                Corporate L & D Manager                  </option>
                                            <option value="Corporate L & D Executive" name="Corporate L & D Executive">
                                                Corporate L & D Executive                  </option>
                                            <option value="Corporate L & D Assistant" name="Corporate L & D Assistant">
                                                Corporate L & D Assistant                  </option>
                                            <option value="Senior Administration Manager" name="Senior Administration Manager">
                                                Senior Administration Manager                  </option>
                                            <option value="Corporate Administration Manager" name="Corporate Administration Manager">
                                                Corporate Administration Manager                  </option>
                                            <option value="Administration Manager" name="Administration Manager">
                                                Administration Manager                  </option>
                                            <option value="Administration Officer" name="Administration Officer">
                                                Administration Officer                  </option>
                                            <option value="Staff Welfare Officer" name="Staff Welfare Officer">
                                                Staff Welfare Officer                  </option>
                                            <option value="Staff Welfare & Administrative Officer" name="Staff Welfare & Administrative Officer">
                                                Staff Welfare & Administrative Officer                  </option>
                                            <option value="Assistant Administration Officer" name="Assistant Administration Officer">
                                                Assistant Administration Officer                  </option>
                                            <option value="Corporate Administration Executive" name="Corporate Administration Executive">
                                                Corporate Administration Executive                  </option>
                                            <option value="Corporate Administration Assistant" name="Corporate Administration Assistant">
                                                Corporate Administration Assistant                  </option>
                                            <option value="Associate Welfare Officer" name="Associate Welfare Officer">
                                                Associate Welfare Officer                  </option>
                                            <option value="Global Head -Culinary Arts & Operations" name="Global Head -Culinary Arts & Operations">
                                                Global Head -Culinary Arts & Operations                  </option>
                                            <option value="National Head-Culinary Arts & Operations" name="National Head-Culinary Arts & Operations">
                                                National Head-Culinary Arts & Operations                  </option>
                                            <option value="India Head-Culinary Arts & Operations" name="India Head-Culinary Arts & Operations">
                                                India Head-Culinary Arts & Operations                  </option>
                                            <option value="Senior Vice President Culinary Arts & Operations" name="Senior Vice President Culinary Arts & Operations">
                                                Senior Vice President Culinary Arts & Operations                  </option>
                                            <option value="Vice President Culinary Arts & Operations" name="Vice President Culinary Arts & Operations">
                                                Vice President Culinary Arts & Operations                  </option>
                                            <option value="Corporate Executive Chef" name="Corporate Executive Chef">
                                                Corporate Executive Chef                  </option>
                                            <option value="Group Exeuctive Chef" name="Group Exeuctive Chef">
                                                Group Exeuctive Chef                  </option>
                                            <option value="Cluster Head Culinary Arts & Operations" name="Cluster Head Culinary Arts & Operations">
                                                Cluster Head Culinary Arts & Operations                  </option>
                                            <option value="Regional Head Culinary Arts & Operations-South India" name="Regional Head Culinary Arts & Operations-South India">
                                                Regional Head Culinary Arts & Operations-South India                  </option>
                                            <option value="Regional Head Culinary Arts & Operations-North India" name="Regional Head Culinary Arts & Operations-North India">
                                                Regional Head Culinary Arts & Operations-North India                  </option>
                                            <option value="Regional Head Culinary Arts & Operations-Western India" name="Regional Head Culinary Arts & Operations-Western India">
                                                Regional Head Culinary Arts & Operations-Western India                  </option>
                                            <option value="Regional Head Culinary Arts & Operations-Central India" name="Regional Head Culinary Arts & Operations-Central India">
                                                Regional Head Culinary Arts & Operations-Central India                  </option>
                                            <option value="Regional Head Culinary Arts & Operations-Eastern India" name="Regional Head Culinary Arts & Operations-Eastern India">
                                                Regional Head Culinary Arts & Operations-Eastern India                  </option>
                                            <option value="Corporate Head Chef- Culinary Arts & Operations" name="Corporate Head Chef- Culinary Arts & Operations">
                                                Corporate Head Chef- Culinary Arts & Operations                  </option>
                                            <option value="Corporate Chef- Culinary Arts & Operations" name="Corporate Chef- Culinary Arts & Operations">
                                                Corporate Chef- Culinary Arts & Operations                  </option>
                                            <option value="Corporate Head-Culinary Initiatives" name="Corporate Head-Culinary Initiatives">
                                                Corporate Head-Culinary Initiatives                  </option>
                                            <option value="Corporate Head-Culinary Innovative Initiatives" name="Corporate Head-Culinary Innovative Initiatives">
                                                Corporate Head-Culinary Innovative Initiatives                  </option>
                                            <option value="Corporate Head-Speciality Culinary Arts" name="Corporate Head-Speciality Culinary Arts">
                                                Corporate Head-Speciality Culinary Arts                  </option>
                                            <option value="Microbiologist" name="Microbiologist">
                                                Microbiologist                  </option>
                                            <option value="Corporate HACCP Head" name="Corporate HACCP Head">
                                                Corporate HACCP Head                  </option>
                                            <option value="Global Head F & B Service" name="Global Head F & B Service">
                                                Global Head F & B Service                  </option>
                                            <option value="National Head F & B Service" name="National Head F & B Service">
                                                National Head F & B Service                  </option>
                                            <option value="India Head F & B Service" name="India Head F & B Service">
                                                India Head F & B Service                  </option>
                                            <option value="Senior Vice President F & B Service" name="Senior Vice President F & B Service">
                                                Senior Vice President F & B Service                  </option>
                                            <option value="Vice President F & B Service" name="Vice President F & B Service">
                                                Vice President F & B Service                  </option>
                                            <option value="Corporate Head F & B Service" name="Corporate Head F & B Service">
                                                Corporate Head F & B Service                  </option>
                                            <option value="Cluster Head F & B Service" name="Cluster Head F & B Service">
                                                Cluster Head F & B Service                  </option>
                                            <option value="Regional Head F & B Service-South India" name="Regional Head F & B Service-South India">
                                                Regional Head F & B Service-South India                  </option>
                                            <option value="Regional Head F & B Service-North India" name="Regional Head F & B Service-North India">
                                                Regional Head F & B Service-North India                  </option>
                                            <option value="Regional Head F & B Service-Western India" name="Regional Head F & B Service-Western India">
                                                Regional Head F & B Service-Western India                  </option>
                                            <option value="Regional Head F & B Service-Central India" name="Regional Head F & B Service-Central India">
                                                Regional Head F & B Service-Central India                  </option>
                                            <option value="Regional Head F & B Service-Eastern India" name="Regional Head F & B Service-Eastern India">
                                                Regional Head F & B Service-Eastern India                  </option>
                                            <option value="Corporate F & B Manager" name="Corporate F & B Manager">
                                                Corporate F & B Manager                  </option>
                                            <option value="Corporate F & B Executive" name="Corporate F & B Executive">
                                                Corporate F & B Executive                  </option>
                                            <option value="Global Head Housekeeping" name="Global Head Housekeeping">
                                                Global Head Housekeeping                  </option>
                                            <option value="Senior Vice President Housekeeping" name="Senior Vice President Housekeeping">
                                                Senior Vice President Housekeeping                  </option>
                                            <option value="Vice President Housekeeping" name="Vice President Housekeeping">
                                                Vice President Housekeeping                  </option>
                                            <option value="National Head Housekeeping" name="National Head Housekeeping">
                                                National Head Housekeeping                  </option>
                                            <option value="India Head Housekeeping" name="India Head Housekeeping">
                                                India Head Housekeeping                  </option>
                                            <option value="Cluster Head Housekeeping" name="Cluster Head Housekeeping">
                                                Cluster Head Housekeeping                  </option>
                                            <option value="Regional Head Housekeeping-South India" name="Regional Head Housekeeping-South India">
                                                Regional Head Housekeeping-South India                  </option>
                                            <option value="Regional Head Housekeeping-North India" name="Regional Head Housekeeping-North India">
                                                Regional Head Housekeeping-North India                  </option>
                                            <option value="Regional Head Housekeeping-Western India" name="Regional Head Housekeeping-Western India">
                                                Regional Head Housekeeping-Western India                  </option>
                                            <option value="Regional Head Housekeeping-Central India" name="Regional Head Housekeeping-Central India">
                                                Regional Head Housekeeping-Central India                  </option>
                                            <option value="Regional Head Housekeeping-Eastern India" name="Regional Head Housekeeping-Eastern India">
                                                Regional Head Housekeeping-Eastern India                  </option>
                                            <option value="Corporate Executive HouseKeeper" name="Corporate Executive HouseKeeper">
                                                Corporate Executive HouseKeeper                  </option>
                                            <option value="Corporate Housekeeper" name="Corporate Housekeeper">
                                                Corporate Housekeeper                  </option>
                                            <option value="Corporate Housekeeping Manager" name="Corporate Housekeeping Manager">
                                                Corporate Housekeeping Manager                  </option>
                                            <option value="Corporate Assistant Housekeeping Manager" name="Corporate Assistant Housekeeping Manager">
                                                Corporate Assistant Housekeeping Manager                  </option>
                                            <option value="President Projects" name="President Projects">
                                                President Projects                  </option>
                                            <option value="President New Acquisitions" name="President New Acquisitions">
                                                President New Acquisitions                  </option>
                                            <option value="President Mergers & Acquisitions" name="President Mergers & Acquisitions">
                                                President Mergers & Acquisitions                  </option>
                                            <option value="Senior Vice President Projects" name="Senior Vice President Projects">
                                                Senior Vice President Projects                  </option>
                                            <option value="Senior Vice President New Acquisitions" name="Senior Vice President New Acquisitions">
                                                Senior Vice President New Acquisitions                  </option>
                                            <option value="Senior Vice President Mergers & Acquisitions" name="Senior Vice President Mergers & Acquisitions">
                                                Senior Vice President Mergers & Acquisitions                  </option>
                                            <option value="Vice President Projects" name="Vice President Projects">
                                                Vice President Projects                  </option>
                                            <option value="Vice President New Acquisitions" name="Vice President New Acquisitions">
                                                Vice President New Acquisitions                  </option>
                                            <option value="Vice President Mergers & Acquisitions" name="Vice President Mergers & Acquisitions">
                                                Vice President Mergers & Acquisitions                  </option>
                                            <option value="Contracts Manager" name="Contracts Manager">
                                                Contracts Manager                  </option>
                                            <option value="General Manager Contracts" name="General Manager Contracts">
                                                General Manager Contracts                  </option>
                                            <option value="Senior General Manager Projects" name="Senior General Manager Projects">
                                                Senior General Manager Projects                  </option>
                                            <option value="General Manager Projects" name="General Manager Projects">
                                                General Manager Projects                  </option>
                                            <option value="Deputy General Manager Projects" name="Deputy General Manager Projects">
                                                Deputy General Manager Projects                  </option>
                                            <option value="Assistant General Manager Projects" name="Assistant General Manager Projects">
                                                Assistant General Manager Projects                  </option>
                                            <option value="General Manager MEP" name="General Manager MEP">
                                                General Manager MEP                  </option>
                                            <option value="General Manager Civil" name="General Manager Civil">
                                                General Manager Civil                  </option>
                                            <option value="Senior Projects Manager" name="Senior Projects Manager">
                                                Senior Projects Manager                  </option>
                                            <option value="Projects Manager" name="Projects Manager">
                                                Projects Manager                  </option>
                                            <option value="MEP Engineer" name="MEP Engineer">
                                                MEP Engineer                  </option>
                                            <option value="QS Manager" name="QS Manager">
                                                QS Manager                  </option>
                                            <option value="QS Executive" name="QS Executive">
                                                QS Executive                  </option>
                                            <option value="Projects Assistant" name="Projects Assistant">
                                                Projects Assistant                  </option>
                                            <option value="Senior Architect" name="Senior Architect">
                                                Senior Architect                  </option>
                                            <option value="Architect" name="Architect">
                                                Architect                  </option>
                                            <option value="Manager MEP" name="Manager MEP">
                                                Manager MEP                  </option>
                                            <option value="Director Technical,Engineering,Maintenance" name="Director Technical,Engineering,Maintenance">
                                                Director Technical,Engineering,Maintenance                  </option>
                                            <option value="Director Technical Operations" name="Director Technical Operations">
                                                Director Technical Operations                  </option>
                                            <option value="Director Engineering Operations" name="Director Engineering Operations">
                                                Director Engineering Operations                  </option>
                                            <option value="Director Maintanence Operations" name="Director Maintanence Operations">
                                                Director Maintanence Operations                  </option>
                                            <option value="Senior VP Technical,Engineering,Maintenance" name="Senior VP Technical,Engineering,Maintenance">
                                                Senior VP Technical,Engineering,Maintenance                  </option>
                                            <option value="Vice President Technical,Engineering,Maintenance" name="Vice President Technical,Engineering,Maintenance">
                                                Vice President Technical,Engineering,Maintenance                  </option>
                                            <option value="Vice President Engineering & Maintenance" name="Vice President Engineering & Maintenance">
                                                Vice President Engineering & Maintenance                  </option>
                                            <option value="Group General Manager Engineering & Maintenance" name="Group General Manager Engineering & Maintenance">
                                                Group General Manager Engineering & Maintenance                  </option>
                                            <option value="General Manager Engineering & Maintenance" name="General Manager Engineering & Maintenance">
                                                General Manager Engineering & Maintenance                  </option>
                                            <option value="Deputy General Manager Engineering & Maintenance" name="Deputy General Manager Engineering & Maintenance">
                                                Deputy General Manager Engineering & Maintenance                  </option>
                                            <option value="Assistant General Manager Engineering & Maintenance" name="Assistant General Manager Engineering & Maintenance">
                                                Assistant General Manager Engineering & Maintenance                  </option>
                                            <option value="Corporate Engineer" name="Corporate Engineer">
                                                Corporate Engineer                  </option>
                                            <option value="Assistant Executive Engineer" name="Assistant Executive Engineer">
                                                Assistant Executive Engineer                  </option>
                                            <option value="Corporate Assistant Executive Engineer" name="Corporate Assistant Executive Engineer">
                                                Corporate Assistant Executive Engineer                  </option>
                                            <option value="Group Assistant Executive Engineer" name="Group Assistant Executive Engineer">
                                                Group Assistant Executive Engineer                  </option>
                                            <option value="National Head Engineering & Maintenance" name="National Head Engineering & Maintenance">
                                                National Head Engineering & Maintenance                  </option>
                                            <option value="India Head Engineering & Maintenance" name="India Head Engineering & Maintenance">
                                                India Head Engineering & Maintenance                  </option>
                                            <option value="Cluster Head Engineering & Maintenance" name="Cluster Head Engineering & Maintenance">
                                                Cluster Head Engineering & Maintenance                  </option>
                                            <option value="Regional Head Engineering & Maintenance-South India" name="Regional Head Engineering & Maintenance-South India">
                                                Regional Head Engineering & Maintenance-South India                  </option>
                                            <option value="Regional Head Engineering & Maintenance-North India" name="Regional Head Engineering & Maintenance-North India">
                                                Regional Head Engineering & Maintenance-North India                  </option>
                                            <option value="Regional Head Engineering & Maintenance-Western India" name="Regional Head Engineering & Maintenance-Western India">
                                                Regional Head Engineering & Maintenance-Western India                  </option>
                                            <option value="Regional Head Engineering & Maintenance-Central India" name="Regional Head Engineering & Maintenance-Central India">
                                                Regional Head Engineering & Maintenance-Central India                  </option>
                                            <option value="Regional Head Engineering & Maintenance-Eastern India" name="Regional Head Engineering & Maintenance-Eastern India">
                                                Regional Head Engineering & Maintenance-Eastern India                  </option>
                                            <option value="Corporate Chief Engineer" name="Corporate Chief Engineer">
                                                Corporate Chief Engineer                  </option>
                                            <option value="Corporate Engineering & Maintenance Manager" name="Corporate Engineering & Maintenance Manager">
                                                Corporate Engineering & Maintenance Manager                  </option>
                                            <option value="Corporate Assistant Engineering & Maintenance Manager" name="Corporate Assistant Engineering & Maintenance Manager">
                                                Corporate Assistant Engineering & Maintenance Manager                  </option>
                                            <option value="Global Head Procurement" name="Global Head Procurement">
                                                Global Head Procurement                  </option>
                                            <option value="National Head Procurement" name="National Head Procurement">
                                                National Head Procurement                  </option>
                                            <option value="India Head Procurement" name="India Head Procurement">
                                                India Head Procurement                  </option>
                                            <option value="Senior Vice President Procurement" name="Senior Vice President Procurement">
                                                Senior Vice President Procurement                  </option>
                                            <option value="Vice President Procurement" name="Vice President Procurement">
                                                Vice President Procurement                  </option>
                                            <option value="Group General Manager Procurement" name="Group General Manager Procurement">
                                                Group General Manager Procurement                  </option>
                                            <option value="General Manager Procurement" name="General Manager Procurement">
                                                General Manager Procurement                  </option>
                                            <option value="Deputy General Manager Procurement" name="Deputy General Manager Procurement">
                                                Deputy General Manager Procurement                  </option>
                                            <option value="Assistant General Manager Procurement" name="Assistant General Manager Procurement">
                                                Assistant General Manager Procurement                  </option>
                                            <option value="Senior Corporate Procurement Manager" name="Senior Corporate Procurement Manager">
                                                Senior Corporate Procurement Manager                  </option>
                                            <option value="Corporate Procurement Manager" name="Corporate Procurement Manager">
                                                Corporate Procurement Manager                  </option>
                                            <option value="Corporate Procurement Executive" name="Corporate Procurement Executive">
                                                Corporate Procurement Executive                  </option>
                                            <option value="Corporate Procurement Assistant" name="Corporate Procurement Assistant">
                                                Corporate Procurement Assistant                  </option>
                                            <option value="Global Head IT" name="Global Head IT">
                                                Global Head IT                  </option>
                                            <option value="National Head IT" name="National Head IT">
                                                National Head IT                  </option>
                                            <option value="India Head IT" name="India Head IT">
                                                India Head IT                  </option>
                                            <option value="Senior Vice President IT" name="Senior Vice President IT">
                                                Senior Vice President IT                  </option>
                                            <option value="Vice President IT" name="Vice President IT">
                                                Vice President IT                  </option>
                                            <option value="Group General Manager IT" name="Group General Manager IT">
                                                Group General Manager IT                  </option>
                                            <option value="General Manager IT" name="General Manager IT">
                                                General Manager IT                  </option>
                                            <option value="Deputy General Manager IT" name="Deputy General Manager IT">
                                                Deputy General Manager IT                  </option>
                                            <option value="Assistant General Manager IT" name="Assistant General Manager IT">
                                                Assistant General Manager IT                  </option>
                                            <option value="Senior Corporate IT Manager" name="Senior Corporate IT Manager">
                                                Senior Corporate IT Manager                  </option>
                                            <option value="Corporate IT Manager" name="Corporate IT Manager">
                                                Corporate IT Manager                  </option>
                                            <option value="Corporate IT Executive" name="Corporate IT Executive">
                                                Corporate IT Executive                  </option>
                                            <option value="Corporate IT Assistant" name="Corporate IT Assistant">
                                                Corporate IT Assistant                  </option>
                                            <option value="Global Head IS" name="Global Head IS">
                                                Global Head IS                  </option>
                                            <option value="National Head IS" name="National Head IS">
                                                National Head IS                  </option>
                                            <option value="India Head IS" name="India Head IS">
                                                India Head IS                  </option>
                                            <option value="Senior Vice President IS" name="Senior Vice President IS">
                                                Senior Vice President IS                  </option>
                                            <option value="Vice President IS" name="Vice President IS">
                                                Vice President IS                  </option>
                                            <option value="Group General Manager IS" name="Group General Manager IS">
                                                Group General Manager IS                  </option>
                                            <option value="General Manager IS" name="General Manager IS">
                                                General Manager IS                  </option>
                                            <option value="Deputy General Manager IS" name="Deputy General Manager IS">
                                                Deputy General Manager IS                  </option>
                                            <option value="Assistant General Manager IS" name="Assistant General Manager IS">
                                                Assistant General Manager IS                  </option>
                                            <option value="Senior Corporate IS Manager" name="Senior Corporate IS Manager">
                                                Senior Corporate IS Manager                  </option>
                                            <option value="Corporate IS Manager" name="Corporate IS Manager">
                                                Corporate IS Manager                  </option>
                                            <option value="Corporate IS Executive" name="Corporate IS Executive">
                                                Corporate IS Executive                  </option>
                                            <option value="Corporate IS Assistant" name="Corporate IS Assistant">
                                                Corporate IS Assistant                  </option>
                                            <option value="Global Head Security & Safety" name="Global Head Security & Safety">
                                                Global Head Security & Safety                  </option>
                                            <option value="National Head Security & Safety" name="National Head Security & Safety">
                                                National Head Security & Safety                  </option>
                                            <option value="India Head Security & Safety" name="India Head Security & Safety">
                                                India Head Security & Safety                  </option>
                                            <option value="Senior Vice President Security & Safety" name="Senior Vice President Security & Safety">
                                                Senior Vice President Security & Safety                  </option>
                                            <option value="Vice President Security & Safety" name="Vice President Security & Safety">
                                                Vice President Security & Safety                  </option>
                                            <option value="Group General Manager Security & Safety" name="Group General Manager Security & Safety">
                                                Group General Manager Security & Safety                  </option>
                                            <option value="General Manager Security & Safety" name="General Manager Security & Safety">
                                                General Manager Security & Safety                  </option>
                                            <option value="Deputy General Manager Security & Safety" name="Deputy General Manager Security & Safety">
                                                Deputy General Manager Security & Safety                  </option>
                                            <option value="Assistant General Manager Security & Safety" name="Assistant General Manager Security & Safety">
                                                Assistant General Manager Security & Safety                  </option>
                                            <option value="Senior Corporate Security Officer" name="Senior Corporate Security Officer">
                                                Senior Corporate Security Officer                  </option>
                                            <option value="Corporate Security Executive" name="Corporate Security Executive">
                                                Corporate Security Executive                  </option>
                                            <option value="Corporate Security Assistant" name="Corporate Security Assistant">
                                                Corporate Security Assistant                  </option>
                                            <option value="Corporate Security Guard" name="Corporate Security Guard">
                                                Corporate Security Guard                  </option>
                                            <option value="Corporate Lady Guard" name="Corporate Lady Guard">
                                                Corporate Lady Guard                  </option>
                                            <option value="Receptionist" name="Receptionist">
                                                Receptionist                  </option>
                                            <option value="Telephone Operator" name="Telephone Operator">
                                                Telephone Operator                  </option>
                                            <option value="Senior Receptionist" name="Senior Receptionist">
                                                Senior Receptionist                  </option>
                                            <option value="Office Boy" name="Office Boy">
                                                Office Boy                  </option>
                                            <option value="Office Assistant" name="Office Assistant">
                                                Office Assistant                  </option>
                                            <option value="Pantry Boy" name="Pantry Boy">
                                                Pantry Boy                  </option>
                                            <option value="Pantry Assistant" name="Pantry Assistant">
                                                Pantry Assistant                  </option>
                                            <option value="Canteen Chef" name="Canteen Chef">
                                                Canteen Chef                  </option>
                                            <option value="Canteen Kitchen Stewarding Boy" name="Canteen Kitchen Stewarding Boy">
                                                Canteen Kitchen Stewarding Boy                  </option>
                                            <option value="Helper" name="Helper">
                                                Helper                  </option>
                                            <option value="Housekeeping Boy" name="Housekeeping Boy">
                                                Housekeeping Boy                  </option>
                                            <option value="Butler" name="Butler">
                                                Butler                  </option>
                                        </select>
                                        <label id="current_position-error" class="error" for="current_position">
                                        </label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Employment Type 
                                            <span class="requerd">* 
                                            </span>
                                        </label>
                                        <select  class="form-control select2" id="emplyment_type"  name="emplyment_type"  style="width: 100%;" onChange="removeerroremplyment_type()" required>
                                            <option value="">Select
                                            </option>
                                            <option value="1">Full Time
                                            </option>
                                            <option value="2">Part Time
                                            </option>
                                            <option value="3">Internship
                                            </option>
                                        </select>
                                        <label id="emplyment_type-error" class="error" for="emplyment_type">
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">About Company 
                                            <span class="requerd">* 
                                            </span>
                                        </label>
                                        <textarea id="editor3" name="about_company" class="form-control"  required>
                                        </textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Role Description and Achievements
                                            <span class="requerd">* 
                                            </span>
                                        </label>
                                        <textarea id="editor4" name="role_description" class="form-control" required>
                                        </textarea>
                                    </div>
                                </div>                                                          
                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for="">Year from 
                                            <span class="requerd">* 
                                            </span>
                                        </label>
                                        <input class="form-control" id="yearfromaddexp" name="yearfrom" placeholder="MM/YYYY" type="text" onChange="removeerroryearfrom()" required/>
                                        <span id="yearfromaddexp-error" class="error" for="yearfromaddexp">
                                        </span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Year to 
                                            <span class="requerd">* 
                                            </span>
                                        </label>
                                        <input class="form-control" id="yeartoaddexp" name="yearto" placeholder="MM/YYYY" type="text" onChange="removeerroryearto()"   required/>
                                        <span id="yeartoaddexp-error" class="error" for="yeartoaddexp">
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Current Package 
                                            <span class="requerd">* 
                                            </span>
                                        </label>
                                        <select  name="current_package"  id="current_package" class="form-control select2" required="" onChange="removeerrorcurrent_package()" style="width: 100%;">
                                            <option value="">Select Current Package
                                            </option>  
                                            <option value='786'
                                                    > Less than 5,000 
                                            </option>
                                            <option value='5000' 
                                                    >
                                                5,000                </option>
                                            <option value='10000' 
                                                    >
                                                10,000                </option>
                                            <option value='15000' 
                                                    >
                                                15,000                </option>
                                            <option value='20000' 
                                                    >
                                                20,000                </option>
                                            <option value='25000' 
                                                    >
                                                25,000                </option>
                                            <option value='30000' 
                                                    >
                                                30,000                </option>
                                            <option value='35000' 
                                                    >
                                                35,000                </option>
                                            <option value='40000' 
                                                    >
                                                40,000                </option>
                                            <option value='45000' 
                                                    >
                                                45,000                </option>
                                            <option value='50000' 
                                                    >
                                                50,000                </option>
                                            <option value='55000' 
                                                    >
                                                55,000                </option>
                                            <option value='60000' 
                                                    >
                                                60,000                </option>
                                            <option value='65000' 
                                                    >
                                                65,000                </option>
                                            <option value='70000' 
                                                    >
                                                70,000                </option>
                                            <option value='75000' 
                                                    >
                                                75,000                </option>
                                            <option value='80000' 
                                                    >
                                                80,000                </option>
                                            <option value='85000' 
                                                    >
                                                85,000                </option>
                                            <option value='90000' 
                                                    >
                                                90,000                </option>
                                            <option value='95000' 
                                                    >
                                                95,000                </option>
                                            <option value='100000' 
                                                    >
                                                100,000                </option>
                                            <option value='10000000' 
                                                    >100,000 & above 
                                            </option>
                                        </select>
                                        <label id="current_package-error" class="error" for="current_package">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Key Responsibilities 
                                            <span class="requerd">* 
                                            </span>
                                        </label>
                                        <input id="tags_2" name="tags_2" type="text"  class=" form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Nationality 
                                            <span class="requerd">* 
                                            </span>
                                        </label>
                                        <select class="form-control select2" id="Nationality" name="Nationality"  data-placeholder="Select a country" style="width: 100%;" onChange="removeerrorNationality()"  required>
                                            <option value="">Select Nationality</option>

                                            <option value="2" 
                                                    >
                                                Afghanistan          </option>

                                            <option value="5" 
                                                    >
                                                Albania          </option>

                                            <option value="62" 
                                                    >
                                                Algeria          </option>

                                            <option value="11" 
                                                    >
                                                American Samoa          </option>

                                            <option value="6" 
                                                    >
                                                Andorra          </option>

                                            <option value="3" 
                                                    >
                                                Angola          </option>

                                            <option value="4" 
                                                    >
                                                Anguilla          </option>

                                            <option value="12" 
                                                    >
                                                Antarctica          </option>

                                            <option value="14" 
                                                    >
                                                Antigua and Barbuda          </option>

                                            <option value="9" 
                                                    >
                                                Argentina          </option>

                                            <option value="10" 
                                                    >
                                                Armenia          </option>

                                            <option value="1" 
                                                    >
                                                Aruba          </option>

                                            <option value="15" 
                                                    >
                                                Australia          </option>

                                            <option value="16" 
                                                    >
                                                Austria          </option>

                                            <option value="17" 
                                                    >
                                                Azerbaijan          </option>

                                            <option value="25" 
                                                    >
                                                Bahamas          </option>

                                            <option value="24" 
                                                    >
                                                Bahrain          </option>

                                            <option value="22" 
                                                    >
                                                Bangladesh          </option>

                                            <option value="32" 
                                                    >
                                                Barbados          </option>

                                            <option value="27" 
                                                    >
                                                Belarus          </option>

                                            <option value="19" 
                                                    >
                                                Belgium          </option>

                                            <option value="28" 
                                                    >
                                                Belize          </option>

                                            <option value="20" 
                                                    >
                                                Benin          </option>

                                            <option value="29" 
                                                    >
                                                Bermuda          </option>

                                            <option value="34" 
                                                    >
                                                Bhutan          </option>

                                            <option value="30" 
                                                    >
                                                Bolivia          </option>

                                            <option value="26" 
                                                    >
                                                Bosnia and Herzegovina          </option>

                                            <option value="36" 
                                                    >
                                                Botswana          </option>

                                            <option value="35" 
                                                    >
                                                Bouvet Island          </option>

                                            <option value="31" 
                                                    >
                                                Brazil          </option>

                                            <option value="101" 
                                                    >
                                                British Indian Ocean Territory          </option>

                                            <option value="33" 
                                                    >
                                                Brunei          </option>

                                            <option value="23" 
                                                    >
                                                Bulgaria          </option>

                                            <option value="21" 
                                                    >
                                                Burkina Faso          </option>

                                            <option value="18" 
                                                    >
                                                Burundi          </option>

                                            <option value="114" 
                                                    >
                                                Cambodia          </option>

                                            <option value="44" 
                                                    >
                                                Cameroon          </option>

                                            <option value="38" 
                                                    >
                                                Canada          </option>

                                            <option value="50" 
                                                    >
                                                Cape Verde          </option>

                                            <option value="54" 
                                                    >
                                                Cayman Islands          </option>

                                            <option value="43" 
                                                    >
                                                CÃƒÆ’Ã‚Â´te dÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ          </option>

                                            <option value="37" 
                                                    >
                                                Central African Republic          </option>

                                            <option value="206" 
                                                    >
                                                Chad          </option>

                                            <option value="41" 
                                                    >
                                                Chile          </option>

                                            <option value="42" 
                                                    >
                                                China          </option>

                                            <option value="53" 
                                                    >
                                                Christmas Island          </option>

                                            <option value="39" 
                                                    >
                                                Cocos (Keeling) Islands          </option>

                                            <option value="48" 
                                                    >
                                                Colombia          </option>

                                            <option value="49" 
                                                    >
                                                Comoros          </option>

                                            <option value="46" 
                                                    >
                                                Congo          </option>

                                            <option value="45" 
                                                    >
                                                Congo, The Democratic Republic          </option>

                                            <option value="47" 
                                                    >
                                                Cook Islands          </option>

                                            <option value="51" 
                                                    >
                                                Costa Rica          </option>

                                            <option value="96" 
                                                    >
                                                Croatia          </option>

                                            <option value="52" 
                                                    >
                                                Cuba          </option>

                                            <option value="55" 
                                                    >
                                                Cyprus          </option>

                                            <option value="56" 
                                                    >
                                                Czech Republic          </option>

                                            <option value="60" 
                                                    >
                                                Denmark          </option>

                                            <option value="58" 
                                                    >
                                                Djibouti          </option>

                                            <option value="59" 
                                                    >
                                                Dominica          </option>

                                            <option value="61" 
                                                    >
                                                Dominican Republic          </option>

                                            <option value="212" 
                                                    >
                                                East Timor          </option>

                                            <option value="63" 
                                                    >
                                                Ecuador          </option>

                                            <option value="64" 
                                                    >
                                                Egypt          </option>

                                            <option value="193" 
                                                    >
                                                El Salvador          </option>

                                            <option value="85" 
                                                    >
                                                Equatorial Guinea          </option>

                                            <option value="65" 
                                                    >
                                                Eritrea          </option>

                                            <option value="68" 
                                                    >
                                                Estonia          </option>

                                            <option value="69" 
                                                    >
                                                Ethiopia          </option>

                                            <option value="72" 
                                                    >
                                                Falkland Islands          </option>

                                            <option value="74" 
                                                    >
                                                Faroe Islands          </option>

                                            <option value="71" 
                                                    >
                                                Fiji Islands          </option>

                                            <option value="70" 
                                                    >
                                                Finland          </option>

                                            <option value="73" 
                                                    >
                                                France          </option>

                                            <option value="90" 
                                                    >
                                                French Guiana          </option>

                                            <option value="178" 
                                                    >
                                                French Polynesia          </option>

                                            <option value="13" 
                                                    >
                                                French Southern territories          </option>

                                            <option value="76" 
                                                    >
                                                Gabon          </option>

                                            <option value="83" 
                                                    >
                                                Gambia          </option>

                                            <option value="78" 
                                                    >
                                                Georgia          </option>

                                            <option value="57" 
                                                    >
                                                Germany          </option>

                                            <option value="79" 
                                                    >
                                                Ghana          </option>

                                            <option value="80" 
                                                    >
                                                Gibraltar          </option>

                                            <option value="86" 
                                                    >
                                                Greece          </option>

                                            <option value="88" 
                                                    >
                                                Greenland          </option>

                                            <option value="87" 
                                                    >
                                                Grenada          </option>

                                            <option value="82" 
                                                    >
                                                Guadeloupe          </option>

                                            <option value="91" 
                                                    >
                                                Guam          </option>

                                            <option value="89" 
                                                    >
                                                Guatemala          </option>

                                            <option value="81" 
                                                    >
                                                Guinea          </option>

                                            <option value="84" 
                                                    >
                                                Guinea-Bissau          </option>

                                            <option value="92" 
                                                    >
                                                Guyana          </option>

                                            <option value="97" 
                                                    >
                                                Haiti          </option>

                                            <option value="94" 
                                                    >
                                                Heard Island and McDonald Isla          </option>

                                            <option value="226" 
                                                    >
                                                Holy See (Vatican City State)          </option>

                                            <option value="95" 
                                                    >
                                                Honduras          </option>

                                            <option value="93" 
                                                    >
                                                Hong Kong          </option>

                                            <option value="98" 
                                                    >
                                                Hungary          </option>

                                            <option value="105" 
                                                    >
                                                Iceland          </option>

                                            <option value="100" 
                                                    >
                                                India          </option>

                                            <option value="99" 
                                                    >
                                                Indonesia          </option>

                                            <option value="103" 
                                                    >
                                                Iran          </option>

                                            <option value="104" 
                                                    >
                                                Iraq          </option>

                                            <option value="102" 
                                                    >
                                                Ireland          </option>

                                            <option value="106" 
                                                    >
                                                Israel          </option>

                                            <option value="107" 
                                                    >
                                                Italy          </option>

                                            <option value="108" 
                                                    >
                                                Jamaica          </option>

                                            <option value="110" 
                                                    >
                                                Japan          </option>

                                            <option value="109" 
                                                    >
                                                Jordan          </option>

                                            <option value="111" 
                                                    >
                                                Kazakstan          </option>

                                            <option value="112" 
                                                    >
                                                Kenya          </option>

                                            <option value="115" 
                                                    >
                                                Kiribati          </option>

                                            <option value="118" 
                                                    >
                                                Kuwait          </option>

                                            <option value="113" 
                                                    >
                                                Kyrgyzstan          </option>

                                            <option value="119" 
                                                    >
                                                Laos          </option>

                                            <option value="129" 
                                                    >
                                                Latvia          </option>

                                            <option value="120" 
                                                    >
                                                Lebanon          </option>

                                            <option value="126" 
                                                    >
                                                Lesotho          </option>

                                            <option value="121" 
                                                    >
                                                Liberia          </option>

                                            <option value="122" 
                                                    >
                                                Libyan Arab Jamahiriya          </option>

                                            <option value="124" 
                                                    >
                                                Liechtenstein          </option>

                                            <option value="127" 
                                                    >
                                                Lithuania          </option>

                                            <option value="128" 
                                                    >
                                                Luxembourg          </option>

                                            <option value="130" 
                                                    >
                                                Macao          </option>

                                            <option value="138" 
                                                    >
                                                Macedonia          </option>

                                            <option value="134" 
                                                    >
                                                Madagascar          </option>

                                            <option value="149" 
                                                    >
                                                Malawi          </option>

                                            <option value="150" 
                                                    >
                                                Malaysia          </option>

                                            <option value="135" 
                                                    >
                                                Maldives          </option>

                                            <option value="139" 
                                                    >
                                                Mali          </option>

                                            <option value="140" 
                                                    >
                                                Malta          </option>

                                            <option value="137" 
                                                    >
                                                Marshall Islands          </option>

                                            <option value="147" 
                                                    >
                                                Martinique          </option>

                                            <option value="145" 
                                                    >
                                                Mauritania          </option>

                                            <option value="148" 
                                                    >
                                                Mauritius          </option>

                                            <option value="151" 
                                                    >
                                                Mayotte          </option>

                                            <option value="136" 
                                                    >
                                                Mexico          </option>

                                            <option value="75" 
                                                    >
                                                Micronesia, Federated States o          </option>

                                            <option value="133" 
                                                    >
                                                Moldova          </option>

                                            <option value="132" 
                                                    >
                                                Monaco          </option>

                                            <option value="142" 
                                                    >
                                                Mongolia          </option>

                                            <option value="146" 
                                                    >
                                                Montserrat          </option>

                                            <option value="131" 
                                                    >
                                                Morocco          </option>

                                            <option value="144" 
                                                    >
                                                Mozambique          </option>

                                            <option value="141" 
                                                    >
                                                Myanmar          </option>

                                            <option value="152" 
                                                    >
                                                Namibia          </option>

                                            <option value="162" 
                                                    >
                                                Nauru          </option>

                                            <option value="161" 
                                                    >
                                                Nepal          </option>

                                            <option value="159" 
                                                    >
                                                Netherlands          </option>

                                            <option value="7" 
                                                    >
                                                Netherlands Antilles          </option>

                                            <option value="153" 
                                                    >
                                                New Caledonia          </option>

                                            <option value="163" 
                                                    >
                                                New Zealand          </option>

                                            <option value="157" 
                                                    >
                                                Nicaragua          </option>

                                            <option value="154" 
                                                    >
                                                Niger          </option>

                                            <option value="156" 
                                                    >
                                                Nigeria          </option>

                                            <option value="158" 
                                                    >
                                                Niue          </option>

                                            <option value="155" 
                                                    >
                                                Norfolk Island          </option>

                                            <option value="174" 
                                                    >
                                                North Korea          </option>

                                            <option value="143" 
                                                    >
                                                Northern Mariana Islands          </option>

                                            <option value="160" 
                                                    >
                                                Norway          </option>

                                            <option value="164" 
                                                    >
                                                Oman          </option>

                                            <option value="165" 
                                                    >
                                                Pakistan          </option>

                                            <option value="170" 
                                                    >
                                                Palau          </option>

                                            <option value="177" 
                                                    >
                                                Palestine          </option>

                                            <option value="166" 
                                                    >
                                                Panama          </option>

                                            <option value="171" 
                                                    >
                                                Papua New Guinea          </option>

                                            <option value="176" 
                                                    >
                                                Paraguay          </option>

                                            <option value="168" 
                                                    >
                                                Peru          </option>

                                            <option value="169" 
                                                    >
                                                Philippines          </option>

                                            <option value="167" 
                                                    >
                                                Pitcairn          </option>

                                            <option value="172" 
                                                    >
                                                Poland          </option>

                                            <option value="175" 
                                                    >
                                                Portugal          </option>

                                            <option value="173" 
                                                    >
                                                Puerto Rico          </option>

                                            <option value="179" 
                                                    >
                                                Qatar          </option>

                                            <option value="180" 
                                                    >
                                                RÃƒÆ’Ã‚Â©union          </option>

                                            <option value="181" 
                                                    >
                                                Romania          </option>

                                            <option value="182" 
                                                    >
                                                Russian Federation          </option>

                                            <option value="183" 
                                                    >
                                                Rwanda          </option>

                                            <option value="189" 
                                                    >
                                                Saint Helena          </option>

                                            <option value="116" 
                                                    >
                                                Saint Kitts and Nevis          </option>

                                            <option value="123" 
                                                    >
                                                Saint Lucia          </option>

                                            <option value="196" 
                                                    >
                                                Saint Pierre and Miquelon          </option>

                                            <option value="227" 
                                                    >
                                                Saint Vincent and the Grenadin          </option>

                                            <option value="234" 
                                                    >
                                                Samoa          </option>

                                            <option value="194" 
                                                    >
                                                San Marino          </option>

                                            <option value="197" 
                                                    >
                                                Sao Tome and Principe          </option>

                                            <option value="184" 
                                                    >
                                                Saudi Arabia          </option>

                                            <option value="186" 
                                                    >
                                                Senegal          </option>

                                            <option value="203" 
                                                    >
                                                Seychelles          </option>

                                            <option value="192" 
                                                    >
                                                Sierra Leone          </option>

                                            <option value="187" 
                                                    >
                                                Singapore          </option>

                                            <option value="199" 
                                                    >
                                                Slovakia          </option>

                                            <option value="200" 
                                                    >
                                                Slovenia          </option>

                                            <option value="191" 
                                                    >
                                                Solomon Islands          </option>

                                            <option value="195" 
                                                    >
                                                Somalia          </option>

                                            <option value="237" 
                                                    >
                                                South Africa          </option>

                                            <option value="188" 
                                                    >
                                                South Georgia and the South Sa          </option>

                                            <option value="117" 
                                                    >
                                                South Korea          </option>

                                            <option value="67" 
                                                    >
                                                Spain          </option>

                                            <option value="125" 
                                                    >
                                                Sri Lanka          </option>

                                            <option value="185" 
                                                    >
                                                Sudan          </option>

                                            <option value="198" 
                                                    >
                                                Suriname          </option>

                                            <option value="190" 
                                                    >
                                                Svalbard and Jan Mayen          </option>

                                            <option value="202" 
                                                    >
                                                Swaziland          </option>

                                            <option value="201" 
                                                    >
                                                Sweden          </option>

                                            <option value="40" 
                                                    >
                                                Switzerland          </option>

                                            <option value="204" 
                                                    >
                                                Syria          </option>

                                            <option value="218" 
                                                    >
                                                Taiwan          </option>

                                            <option value="209" 
                                                    >
                                                Tajikistan          </option>

                                            <option value="219" 
                                                    >
                                                Tanzania          </option>

                                            <option value="208" 
                                                    >
                                                Thailand          </option>

                                            <option value="207" 
                                                    >
                                                Togo          </option>

                                            <option value="210" 
                                                    >
                                                Tokelau          </option>

                                            <option value="213" 
                                                    >
                                                Tonga          </option>

                                            <option value="214" 
                                                    >
                                                Trinidad and Tobago          </option>

                                            <option value="215" 
                                                    >
                                                Tunisia          </option>

                                            <option value="216" 
                                                    >
                                                Turkey          </option>

                                            <option value="211" 
                                                    >
                                                Turkmenistan          </option>

                                            <option value="205" 
                                                    >
                                                Turks and Caicos Islands          </option>

                                            <option value="217" 
                                                    >
                                                Tuvalu          </option>

                                            <option value="220" 
                                                    >
                                                Uganda          </option>

                                            <option value="221" 
                                                    >
                                                Ukraine          </option>

                                            <option value="8" 
                                                    >
                                                United Arab Emirates          </option>

                                            <option value="77" 
                                                    >
                                                United Kingdom          </option>

                                            <option value="224" 
                                                    >
                                                United States          </option>

                                            <option value="222" 
                                                    >
                                                United States Minor Outlying I          </option>

                                            <option value="223" 
                                                    >
                                                Uruguay          </option>

                                            <option value="225" 
                                                    >
                                                Uzbekistan          </option>

                                            <option value="232" 
                                                    >
                                                Vanuatu          </option>

                                            <option value="228" 
                                                    >
                                                Venezuela          </option>

                                            <option value="231" 
                                                    >
                                                Vietnam          </option>

                                            <option value="229" 
                                                    >
                                                Virgin Islands, British          </option>

                                            <option value="230" 
                                                    >
                                                Virgin Islands, U.S.          </option>

                                            <option value="233" 
                                                    >
                                                Wallis and Futuna          </option>

                                            <option value="66" 
                                                    >
                                                Western Sahara          </option>

                                            <option value="235" 
                                                    >
                                                Yemen          </option>

                                            <option value="236" 
                                                    >
                                                Yugoslavia          </option>

                                            <option value="238" 
                                                    >
                                                Zambia          </option>

                                            <option value="239" 
                                                    >
                                                Zimbabwe          </option>

                                        </select>
                                        <label id="Nationality-error" class="error" for="Nationality">
                                        </label>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label for="">Company location 
                                            <span class="requerd">* 
                                            </span>
                                        </label>
                                        <input type="text" name="company_location"  id="company_location" class="form-control" placeholder="Company Location" required>
                                        <label id="company_location-error" class="error" for="company_location">
                                        </label>
                                    </div>
                                </div>                  
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class='btn btn-primary add-Experience'> Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Experience Details Modal End -->
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

        <!--- project --->
        <div class="modal fade bs-example-modal-Project" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×
                            </span>
                        </button>
                        <h4 class="modal-title" id="">Project Details
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">    
                            <input type="hidden" name="_token" value="REHyK8ZURP7MsyNjw3w82MnLqTujSZ2aBl5xD2Kq">                                      
                            <div class="form-group col-md-6">
                                <label for="">Project Title 
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <input type="text" class="form-control"  name="project_title"   id="project_title" placeholder="Project Title" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Client Name 
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <input type="text" class="form-control" id="client_name"  name="client_name" placeholder="Clint Name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Team Size 
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <input type="text" name="team_size"  onkeypress="return isNumberKey(event, this.id)"  id="team_size" class="form-control" placeholder="Team Size" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Project Loctaion 
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <input type="text" name="project_locat"  id="project_locat" class="form-control" placeholder="Project Loctaion" required>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">About Project 
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <textarea id="editor5" name="project_abtprjct" class="form-control" required>
                                </textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Skills Used 
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <textarea id="editor6" name="project_skilsused" class="form-control" required>
                                </textarea>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="">Duration From
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <input class="form-control" id="yearfromaddpro" name="duration_from" placeholder="MM/YYYY" type="text" onChange="removeerroprojectfrom()"   required/>
                                <span id="yearfromaddpro-error" class="error" for="yearfromaddpro">
                                </span>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Duration To
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <input class="form-control" id="yeartoaddpro" name="duration_to" placeholder="MM/YYYY" type="text" onChange="removeerroprojectto()"   required/>
                                <span id="yeartoaddpro-error" class="error" for="yeartoaddpro">
                                </span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Role 
                                </label> <span class="requerd">* 
                                </span>
                                <input type="text" name="role" id="role" class="form-control " placeholder="Role" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class='btn btn-primary add-Project'> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-Certificate" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×
                            </span>
                        </button>
                        <h4 class="modal-title" id="">Certificate Details
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">    
                            <input type="hidden" name="_token" value="REHyK8ZURP7MsyNjw3w82MnLqTujSZ2aBl5xD2Kq">                                      
                            <div class="form-group col-md-6">
                                <label for="">Certificate Name 
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <input type="text" class="form-control"  name="certificate_name"   id="certificate_name" placeholder="Certificate Name " required>
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
                                <input type="text" name="license_no"  id="license_no" class="form-control" placeholder="License No." >
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
                                <input class="form-control" id="yearfromaddctf" name="fromdate" placeholder="MM/YYYY" type="text" onChange="removeerroryearfromaddctf()"   required/>
                                <span id="yearfromaddctf-error" class="error" for="yearfromaddctf">
                                </span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">To Date
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <input class="form-control" id="yeartoaddctf" name="todate" placeholder="MM/YYYY" type="text" onChange="removeerroryeartoaddctf()"   required/>
                                <span id="yeartoaddctf-error" class="error" for="yeartoaddctf">
                                </span>
                            </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class='btn btn-primary add-Project'> Save
                        </button>
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
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- ./wrapper -->
<script src="https://foodlinked.com/irs/public/External/bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://foodlinked.com/irs/public/External/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://foodlinked.com/irs/public/External/assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
<script src="https://foodlinked.com/irs/public/External/assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script>
<!-- FastClick -->
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



<script src="https://foodlinked.com/irs/public/External/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="https://foodlinked.com/irs/public/External/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="https://foodlinked.com/irs/public/External/datepicker/js/bootstrap-datepicker.min.js"></script>
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
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    }
    )
</script>
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
        //here it will remove the current value of the remove button which has been pressed
        $("body").on("click", ".removeAddEducation", function () {
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
</body>

</html>