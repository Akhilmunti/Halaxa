<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('admin/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3" style="margin-top: 100px">
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab"> 
                            <!-- start recent activity -->
                            <div class="container" >
                                <div class="x_panel">
                                    <div class="x_content">
                                        <div class="omb_login">
                                            <h3 class="omb_authTitle">Foodlinked Admin</h3>
                                            <div class="row omb_row-sm-offset-3">
                                                <div class="col-xs-12 col-sm-6">
                                                    <?php
                                                    $alert = $this->session->flashdata('result');
                                                    if ($alert == NULL) {
                                                        $hidealert = "hide";
                                                    } else {
                                                        $showalert = $alert;
                                                        $hidealert = "";
                                                    }
                                                    ?>
                                                    <div class="alert alert-danger <?php echo $hidealert ?>">
                                                        <?php echo $showalert ?>
                                                    </div>
                                                    <form  action="<?php echo base_url('admin/login/login') ?>" method="post" enctype="multipart/form-data">
                                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                            <input type="text" class="form-control" name="Username" placeholder="Username" required="">
                                                        </div>
                                                        <span class="help-block"></span>
                                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                            <input  type="password" class="form-control" name="Password" placeholder="Password" required="">
                                                        </div>
                                                        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Submit" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end recent activity --> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('admin/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
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