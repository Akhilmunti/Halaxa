<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('admin/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('admin/partials/left-nav'); ?>    
                <!-- top navigation -->
                <?php $this->load->view('admin/partials/top-nav'); ?>
                <!-- /top navigation --> 
            </div>


            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Question Bank (<b><a href="<?php echo base_url() . "admin/questions/add" ?>">+ADD NEW</a></b>)</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                                $resultFlash = $this->session->flashdata('result');
                                if (isset($resultFlash)) {
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-success" role="alert">
                                                <?php echo $resultFlash;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <?php
                                //echo validation_errors();
                                //print_r($clients);
                                if ($result) {
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-success" role="alert">
                                                <?php echo $result;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                                <div class="row">
                                    <div class="col-md-12"> 
                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin table-responsive table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Question</th>
                                                    <th>Note</th>
                                                    <th>Max time</th>
                                                    <th>Date added</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($questions as $question) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $question['question_content'] ?></td>
                                                        <td>
                                                            <?php
                                                            if(!empty($question['question_note'])){
                                                                echo $question['question_note'];
                                                            } else {
                                                                echo "Not added with the question.";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $question['question_max_time'] . " Minutes" ?></td>
                                                        <td><?php echo $question['question_date_added'] ?></td>
                                                        <td>
                                                            <?php if ($question['question_status'] == 1) { ?>
                                                                <a class="btn btn-xs btn-success">Enabled</a>
                                                            <?php } else { ?>
                                                                <a class="btn btn-xs btn-danger">Disabled</a>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($question['question_status'] == 1) { ?>
                                                                <a href="<?php echo base_url('admin/questions/actionDisable/') . $question['question_key']; ?>" class="btn btn-xs btn-danger">Disable</a>
                                                            <?php } else { ?>
                                                                <a href="<?php echo base_url('admin/questions/actionEnable/') . $question['question_key']; ?>" class="btn btn-xs btn-success">Enable</a>
                                                            <?php } ?>
                                                            <a onclick="return confirm('Are you sure?')" href="<?php echo base_url('admin/questions/actionDelete/') . $question['question_key']; ?>" class="btn btn-xs btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                ?>
                                            </tbody>


                                        </table>
                                        <!-- end user projects --> 
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

        <?php $this->load->view('admin/partials/assets-footer'); ?>
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
    </body>
</html>
