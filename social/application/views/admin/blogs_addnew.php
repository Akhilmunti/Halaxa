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
                                    <h3>Blogs Management</h3>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Add new Blog</h2>
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
                                                <form enctype="multipart/form-data" id="formOne" class="form-horizontal form-label-left" action="<?php echo base_url('admin/Blogs/add-new') ?>" method="post">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Blog Topic*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input value="" id="topic" name="topic" type="text" class="form-control" placeholder="Blog Topic">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('topic'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Blog By*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input value="" id="by" name="by" type="text" class="form-control" placeholder="Blog By">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('by'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Blog Description*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input value="" id="description" name="description" type="text" class="form-control" placeholder="Blog Description">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('description'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Blog Attachment*: </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input id="attachment" name="attachment" type="file" class="form-control" placeholder="Blog Attachment">
                                                            <span class="form-error-message text-danger"><?php echo $this->session->flashdata('attachment'); ?></span>
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