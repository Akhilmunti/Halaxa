<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('admin/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('admin/partials/left-nav'); ?>    
                <?php $this->load->view('admin/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>Questions Template Management</h3>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Add new question template</h2>
                                                <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                                                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="#">Settings 1</a> </li>
                                                            <li><a href="#">Settings 2</a> </li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <form enctype="multipart/form-data" id="formOne" class="form-horizontal form-label-left" action="<?php echo base_url('admin/IRSQuestions/actionAdd') ?>" method="post">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Question Title*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <textarea required="" rows="5" value="" id="question" name="question" type="text" class="form-control" placeholder="Question"></textarea>
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('question'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Question Description*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <textarea rows="5" value="" id="note" name="note" type="text" class="form-control" placeholder="Note"></textarea>
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('note'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Duration*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input required="" value="" id="time" name="time" type="number" class="form-control" placeholder="">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('time'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="ln_solid"></div>
                                                    <div class="form-group">
                                                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                            <button type="submit" class="btn btn-success">Submit</button>
                                                        </div>
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
                <!-- /page content --> 

                <!-- footer content -->
                <?php $this->load->view('admin/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>

        <?php $this->load->view('admin/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
        <script>
            $(document).ready(function () {
                $("#formOne").submit(function (e) {
                    var typename = $('#typename').val();
                    var catname = $('#catname').val();

                    var e1 = false;
                    var e2 = false;

                    if (typename.length > 0) {
                        $('#typename + .form-error-message').html('');
                        e1 = true;
                    } else {
                        $('#typename + .form-error-message').html('Please enter valid data.');
                        e1 = false;
                    }
                    if (catname.length > 0) {
                        e2 = true;
                        $('#catname + .form-error-message').html('');
                    } else {
                        e2 = false;
                        $('#catname + .form-error-message').html('Please enter valid data.');
                    }
                    return (e1 && e2) ? true : false;
                })
            });
        </script>
    </body>

</html>