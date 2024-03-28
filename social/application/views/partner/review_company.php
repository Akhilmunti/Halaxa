<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('partner/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('partner/partials/left-nav'); ?>    
                <!-- top navigation -->
                <?php $this->load->view('partner/partials/top-nav'); ?>
                <!-- /top navigation --> 
            </div>

            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Rate a company</h3>
                                        <p>It only takes a minute! And your anonymous review will help other job seekers</p>
                                    </div>
                                </div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="light-back">
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="usr">Overall Rating</label>
                                                            <br>
                                                            <div class="rating">
                                                                <label>
                                                                    <input type="radio" name="stars" value="1" />
                                                                    <span class="icon">★</span> </label>
                                                                <label>
                                                                    <input type="radio" name="stars" value="2" />
                                                                    <span class="icon">★</span> <span class="icon">★</span> </label>
                                                                <label>
                                                                    <input type="radio" name="stars" value="3" />
                                                                    <span class="icon">★</span> <span class="icon">★</span> <span class="icon">★</span> </label>
                                                                <label>
                                                                    <input type="radio" name="stars" value="4" />
                                                                    <span class="icon">★</span> <span class="icon">★</span> <span class="icon">★</span> <span class="icon">★</span> </label>
                                                                <label>
                                                                    <input type="radio" name="stars" value="5" />
                                                                    <span class="icon">★</span> <span class="icon">★</span> <span class="icon">★</span> <span class="icon">★</span> <span class="icon">★</span> </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="usr">Student Status</label>
                                                            <select class="form-control" id="sel1">
                                                                <option>Current Student</option>
                                                                <option>Alumni</option>
                                                                <option>Potential Student</option>
                                                                <option>Others</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="usr">Review Title</label>
                                                            <input type="text" class="form-control" id="email" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="comment">Pros:</label>
                                                            <textarea class="form-control" rows="3" id="comment" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="comment">Cons:</label>
                                                            <textarea class="form-control" rows="3" id="comment" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="comment">Advice to management:</label>
                                                            <textarea class="form-control" rows="3" id="comment" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" required>
                                                                I agree to the terms of use. This review of my experience at my current or former employer is truthful.</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button class="btn btn-dark" type="submit">Submit Review</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="light-back">
                                            <h4 class="text-justify">Keep it real</h4>
                                            <p class="text-justify">Thank you for contributing to the community. Your Opinion will help others make decisions about jobs and companies.</p>
                                            <h5>Please stick to the Community guidelines and do not post.</h5>
                                            <ul>
                                                <li>
                                                    Aggressive or Discriminatory language.
                                                </li>
                                                <li>
                                                    Profanities
                                                </li>
                                                <li>
                                                    Trade secrets/Confidential information.
                                                </li>
                                            </ul>
                                            <p class="text-justify">Thank you.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- footer content -->
            <?php $this->load->view('partner/partials/footer') ?>
            <!-- /footer content --> 
        </div>

        <?php $this->load->view('partner/partials/assets-footer'); ?>
        <!-- jQuery Smart Wizard --> 
        <script src="<?php echo base_url(); ?>assets/vendors/moment/min/moment.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>  
        <script src="<?php echo base_url(); ?>assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- iCheck --> 
        <script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script> 
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
        <script>
            $(':radio').change(function () {
                console.log('New star rating: ' + this.value);
            });
        </script>
    </body>
</html>
