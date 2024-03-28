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
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>Corporate Profile</h3>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Edit Corporate profile</h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <form id="cProfileForm" method="POST" action="<?php echo base_url() . "buyer/profile/updateCorporateDetails"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-6">
                                                        <label class="control-label">Company Name</label>
                                                        <input value="<?php echo $user->Company_name; ?>" required="" name="companyname" type="text" class="form-control" placeholder="Enter Company Name">
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <label class="control-label">Preferred Language</label>
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
                                                    <div class="col-md-4 col-sm-6">
                                                        <label class="control-label">Desgination</label>
                                                        <input value="<?php echo $user->Designation; ?>" name="designation" type="text" class="form-control" placeholder="Enter Desgination">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label">Delivery Address</label>
                                                        <textarea value="" required="" name="deliveryaddress" class="form-control" rows="3" id="comment"><?php echo $user->delivery_address; ?></textarea>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label">Company Brief</label>
                                                        <textarea value="" minlength="350" maxlength="400" required="" name="companybrief" rows="3" class="form-control"><?php echo $user->Company_brief; ?></textarea>
                                                    </div>
                                                    <!--                                                    <div class="col-md-4 col-sm-6">
                                                                                                            <label class="control-label">Category</label>
                                                                                                            <select id="categories" name="categories" class="form-control">
                                                                                                                <option value="<?php
                                                    $category = $this->rfq_model->getCatById($user->category);
                                                    print_r($category[0]['CT_Id']);
                                                    ?>"><?php
                                                    $category = $this->rfq_model->getCatById($user->category);
                                                    print_r($category[0]['Category']);
                                                    ?></option>
                                                    <?php
                                                    foreach ($categories as $cat) {
                                                        echo "<option value='" . $cat['CT_Id'] . "'>" . $cat['Category'] . "</option>";
                                                    }
                                                    ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col-md-4 col-sm-6">
                                                                                                            <label class="control-label">Sub Category</label>
                                                                                                            <select name="subcategories" id="subcategories" class="form-control">
                                                                                                                <option value="<?php
                                                    $category = $this->rfq_model->getSCatById($user->sub_category);
                                                    print_r($category[0]['SCT_Id']);
                                                    ?>"><?php
                                                    $category = $this->rfq_model->getSCatById($user->sub_category);
                                                    print_r($category[0]['Sub_Category']);
                                                    ?></option>
                                                                                                            </select>
                                                                                                        </div>-->
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label">Location</label>
                                                        <select id="locations" name="locations" class="form-control">
                                                            <option selected=""><?php echo $user->Locations; ?></option>
                                                            <?php
                                                            foreach ($countries as $loc) {
                                                                echo "<option data-value='" . $loc['id'] . "' value='" . $loc['name'] . "'>" . $loc['name'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label">Payment Mode</label>
                                                        <select id="card" name="card[]" class="form-control" multiple="">
                                                            <option value="Credit Card">Credit Card</option>
                                                            <option value="Debit Card">Debit Card</option>
                                                            <option value="COD">COD</option>
                                                            <option value="Bank Transfer">Bank Transfer</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <button type="submit" class="btn btn-success right-float">Submit</button>
                                            </form>
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
        <script>
            document.addEventListener("touchstart", function () {}, true);
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