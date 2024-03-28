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
                                        $sucess = $this->session->flashdata('fSucess');
                                        if (isset($sucess)) {
                                            ?>  
                                            <h5 style="text-align:center;background:green;color:white;font:bold"><?php echo $sucess; ?></h5>
                                            <?php
                                        }

                                        $error_message = $this->session->flashdata('fError');
                                        if (isset($error_message)) {
                                            ?>
                                            <h5 style="text-align:center;background:red;color:white;font:bold"><?php echo $error_message; ?></h5>
                                            <?php
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-4">
                                                <form  action="<?php echo base_url('login/resetPassword'); ?>/<?php echo $userId; ?>" method="post" enctype="multipart/form-data">
                                                    <div class="input-group"> <span class="input-group-addon"><i class="fa fa-eye-slash"></i></span>
                                                        <input  type="password" id="Password" class="form-control" name="Password" placeholder="Password" value="" required>
                                                    </div>
                                                    <div class="input-group"> <span class="input-group-addon"><i class="fa fa-eye-slash"></i></span>
                                                        <input  type="password" id="CPassword" class="form-control" name="CPassword" placeholder="Confirm Password" required="">
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
        <script>
            document.addEventListener("touchstart", function () {}, true);
            function pwd_validate()
            {

                if (document.getElementById('Password').value != document.getElementById('CPassword').value)
                {
                    alert('Password Missmatch,Please enter again');
                    document.getElementById("CPassword").value = '';
                    document.getElementById("CPassword").focus();
                    return false;
                } else
                {
                    return true;
                }
            }

        </script>
    </body>

</html>