<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('buyer/halaxa_partials/header'); ?>

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('buyer/halaxa_partials/navbar'); ?>

            <div class="wrapper">

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $this->load->view('buyer/halaxa_partials/alerts'); ?>
                            </div>

                            <div class="col-md-12">
                                <div class="theme-card p-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="header-text">Buyer Profile</h5>
                                            <hr class="hr-theme">
                                        </div>
                                        <div class="col-md-10 mx-auto">
                                            <p class="text-center mt-5">You are required to setup a Buyer profile</p>
                                            <img class="img-fluid mb-5" src="<?php echo base_url('assets/halaxa_buyer/images/buyer_dash.png'); ?>" />
                                        </div>
                                        <div class="col-md-12 text-center"> 
                                            <a href="#" class="btn btn-danger mt-3" data-toggle="modal" data-target=".bs-example-modal-lg">Setup Buyer Profile </a> 
                                            <!-- modals -->
                                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content-theme">
                                                        <div class="modal-header bg-danger">
                                                            <span class="modal-header-text">Setup Buyer Corporate Profile</span>
                                                        </div>
                                                        <form id="cProfileForm" method="POST" action="<?php echo base_url() . "buyer/home/addCorporateDetails"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">

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
                                                                                <option selected="" disabled="" value="">Choose Language</option>
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
                                                                            <label class="control-label">Delivery Address*</label>
                                                                            <textarea required="" name="deliveryaddress" class="form-control" rows="4" id="deliveryaddress"></textarea>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label class="control-label">Company Brief*</label>
                                                                            <textarea maxlength="350" required="" name="companybrief" class="form-control" rows="4" placeholder="Enter Brief Details"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h4 class="text-center">Non-Mandatory Fields</h4>
                                                                        <hr>
                                                                        <div class="col-md-12">
                                                                            <label class="control-label">Designation</label>
                                                                            <input name="designation" type="text" class="form-control" placeholder="Enter Designation">
                                                                        </div>
                                                                        <!--                                                                        <div class="col-md-12">
                                                                                                                                                    <label class="control-label">Preferrences</label>
                                                                                                                                                    <select id="Preferrence" name="Preferrence" class="form-control">
                                                                                                                                                        <option>Select</option>
                                                                                                                                                        <option value="One">Preferrence One</option>
                                                                                                                                                        <option value="Two">Preferrence Two</option>
                                                                                                                                                    </select>
                                                                                                                                                </div>-->
                                                                        <div class="col-md-12">
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
                                                                <button class="btn btn-info" type="button" class="close" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger right-float">Submit</button>
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

        <!-- End Main -->

        <!-- jQuery  -->
        <?php $this->load->view('buyer/halaxa_partials/scripts'); ?>

    </body>

</html>