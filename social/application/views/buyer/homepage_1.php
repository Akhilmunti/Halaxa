<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('buyer/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" type="text/css"/>
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('buyer/partials/left-nav'); ?>    
                <?php $this->load->view('buyer/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <?php $this->load->view('buyer/partials/searchbar'); ?>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Buyers Benefits</h2>
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
                                                <li>Search thousands of products and sellers</li>
                                                <li>Issue RFQs to one or multiple sellers of your choice at a time</li>
                                                <li>Compare and Negotiate Quotations</li>
                                                <li>Issue Purchase Orders </li>
                                                <li>Easy Re-order option</li>
                                                <li>Rate and Review Sellers that you deal with </li>
                                                <li>If you can not find a product then post a public RFQ and sellers will find you</li>
                                                <li>Reduce your procurement cost by more than 20% </li>
                                                <li>Get Products and Sellers recommendations based on your profile preferences </li>
                                                <li>Get Live Market data </li>
                                                <li>MUCH MORE to come </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-2 col-md-offset-3 profile-btn"> 
                                            <a class="btn btn-lg btn-dark" data-toggle="modal" data-target=".bs-example-modal-lg">Setup Buyer Profile </a> 
                                            <!-- modals -->
                                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
                                                            <h4 class="modal-title" id="myModalLabel">Setup Buyer Corporate Profile</h4>
                                                        </div>
                                                        <form id="cProfileForm" method="POST" action="<?php echo base_url() . "buyer/home/addCorporateDetails"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">

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
                                                                        <!--                                                                        <div class="col-md-12 col-sm-12">
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
                                                                                <option value="" disabled="" selected="">Select</option>
                                                                                <?php
                                                                                foreach ($countries as $loc) {
                                                                                    echo "<option value='" . $loc['name'] . "'>" . $loc['name'] . "</option>";
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
                <?php $this->load->view('buyer/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>

        <?php $this->load->view('buyer/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
        <style>
            .right-float{
                float: right !important
            }
        </style>
        <script>
            $(function () {
                $('#card').multiselect({
                    includeSelectAllOption: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '100%'
                });
            });

            // Category change event
            $('#categories').change(function () {
                $.post("<?php echo base_url('buyer/rfq/getSubCatByCat/'); ?>",
                        {
                            category: this.value,
                        },
                        function (data, status) {
                            $('#subcategories').html(data);
                        });
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