<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('social/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('social/partials/left-nav-profile'); ?>    
                <?php $this->load->view('social/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
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
                                                <a href="<?php echo base_url(); ?>buyer/profile/edit_corporate/<?php echo $user->User_Id; ?>" class="btn btn-sm btn-success <?php echo $buttonEdit; ?>" style="float: right"><i class="fa fa-edit"></i> Edit Seller Profile</a>
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
        </div>
    </div>

    <?php $this->load->view('social/partials/assets-footer'); ?>

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