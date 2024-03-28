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
                <?php $this->load->view('social/partials/left-nav'); ?>    
                <?php //$this->load->view('buyer/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Forgot Password</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <?php
                                        $sucess = $this->session->flashdata('fSuccess');
                                        if (isset($sucess)) {
                                            ?>  
                                            <div class="alert alert-success">
                                                <?php echo $sucess ?>
                                            </div>                                            
                                            <?php
                                        }

                                        $error_message = $this->session->flashdata('fError');
                                        if (isset($error_message)) {
                                            ?>
                                            <div class="alert alert-success">
                                                <?php echo $error_message ?>
                                            </div>                                           
                                            <?php
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-4">
                                                <form  action="<?php echo base_url('login/sendPassword') ?>" method="post" enctype="multipart/form-data">
                                                    <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                        <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                                                    </div>
                                                    <button class="btn btn-success btn-block" id="action_forget_password"><strong>Reset Password</strong></button>
                                                </form>
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
        <script>
            $('#action_forget_password').click(function () {
                var forget_email = $('#email').val();
                if (ValidateEmail(forget_email)) {
                    $.post("<?php echo base_url('Login/forget_password'); ?>",
                            {
                                forget_email: forget_email
                            },
                            function (data) {
                                $('#msg').html(data);
                            });
                } else {
                    $('#msg').html('<strong style="color: red;">Invalid Email Format.</strong>');
                    $("#email").focus();
                }
            });
        </script>    
    </body>

</html>