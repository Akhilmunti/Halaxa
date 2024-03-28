<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('vendor/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" type="text/css"/>
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('vendor/partials/left-nav'); ?>    
                <?php $this->load->view('vendor/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <?php $this->load->view('vendor/partials/searchbar'); ?>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Sellers Benefits</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php
                                    $alert = $this->session->flashdata('result');
                                    if ($alert == NULL) {
                                        $hidealert = "hide";
                                    } else {
                                        $showalert = $alert;
                                        $hidealert = "";
                                    }
                                    ?>
                                    <div class="alert alert-success <?php echo $hidealert ?>">
                                        <?php echo $showalert ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="checked-ul">
                                                <li>Increase your sales</li>
                                                <li>Add and Manage products - Upload 1,000+ products in 2 clicks</li>
                                                <li>Set your delivery aread and quantities per product</li>
                                                <li>Display and promote your products</li>
                                                <li>Receive RFQ's</li>
                                                <li>Issues Quotation</li>
                                                <li>Receive purchase orders</li>
                                                <li>Browse public buying requests and issue quotation</li>
                                                <li>Easy tools to negotiate and discuss issued quotations with buyers</li>
                                                <li>Maintain and track all your sale communications and transactions </li>
                                                <li>Get Live market data </li>
                                                <li>Much more to come</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-2 col-md-offset-2 profile-btn"> 
                                            <a class="btn btn-lg btn-dark" data-toggle="modal" data-target=".bs-example-modal-lg">Setup Seller Profile </a> 
                                            <!-- modals -->
                                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
                                                            <h4 class="modal-title" id="myModalLabel">Setup Seller Profile</h4>
                                                        </div>
                                                        <form id="cProfileForm" method="POST" action="<?php echo base_url() . "vendor/home/addSellerDetails"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
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
                                                                            <select id="categories" name="categories[]" class="multiselect-ui form-control" multiple="multiple">
                                                                                <?php
                                                                                foreach ($categories as $category) {
                                                                                    echo "<option value='" . $category['CT_Id'] . "'>" . $category['Category'] . "</option>";
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label class="control-label">Sub Category</label>
                                                                            <select name="subcategories[]" id="subcategories" class="multiselect-ui2 form-control" multiple="multiple">
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
                                                                            <label class="control-label">Country</label>
                                                                            <input class="form-control" name="location" id="loc-automplete" list="country">
                                                                            <datalist id="country">
                                                                                <option>Choose option</option>
                                                                                <?php
                                                                                foreach ($countries as $loc) {
                                                                                    echo "<option data-value='" . $loc['id'] . "' value='" . $loc['name'] . "'>" . $loc['name'] . "</option>";
                                                                                }
                                                                                ?>
                                                                            </datalist>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label class="control-label">Areas of Supply</label>
                                                                            <select name="deliveryAreas[]" id="state-automplete" class="multiselect-ui2 form-control" multiple="">
                                                                                <option disabled="">Choose State</option>
                                                                            </select>
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
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content --> 

                <!-- footer content -->
                <?php $this->load->view('vendor/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>
        <style type="text/css">
            .multiselect-container {
                width: 100% !important;
            }
        </style>
        <?php $this->load->view('vendor/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
        <script>
            $(function () {
                $('#state-automplete').multiselect({
                    includeSelectAllOption: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '100%'
                });
            });

            $(function () {
                $('#subcategories').multiselect({
                    includeSelectAllOption: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '100%'
                });
            });

            $(function () {
                $('#card').multiselect({
                    includeSelectAllOption: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '100%'
                });
            });

            $(function () {
                $('#categories').multiselect({
                    includeSelectAllOption: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '100%'
                });
            });

            $('#categories').change(function () {
                var selectedValues = [];
                $("#categories :selected").each(function () {
                    selectedValues.push($(this).val());
                });
                $("#subcategories").multiselect('destroy');
                $.post("<?php echo base_url('vendor/home/getSubCatByMulCat/'); ?>",
                        {
                            category: JSON.stringify(selectedValues),
                        },
                        function (data, status) {
                            $('#subcategories').html(data);
                            $("#subcategories").multiselect({
                                includeSelectAllOption: true,
                                enableCaseInsensitiveFiltering: true,
                                buttonWidth: '100%'
                            });
                        });
            });

            $('#loc-automplete').change(function () {
                $("#state-automplete").multiselect('destroy');
                $.post("<?php echo base_url('buyer/rfq/getStateByCountrySign/'); ?>",
                        {
                            location: this.value,
                        },
                        function (data, status) {
                            $('#state-automplete').html(data);
                            $("#state-automplete").multiselect({
                                includeSelectAllOption: true,
                                enableCaseInsensitiveFiltering: true,
                                buttonWidth: '100%'
                            });
                        });
            });
        </script>
    </body>
</html>