<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('vendor/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('vendor/partials/left-nav'); ?>    
                <?php $this->load->view('vendor/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <?php $this->load->view('vendor/partials/searchbar'); ?>
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Invoice Management</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>List</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Invoice Id</th>
                                                    <th>PO Id</th>
                                                    <th>RFQ Id</th>
                                                    <th>Quotation Id</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>123456</td>
                                                    <td>123456</td>
                                                    <td>123456</td>
                                                    <td>123456</td>
                                                    <td><a class="label label-primary">Draft</a</td>
                                                    <td><button type="button" class="btn btn-success btn-xs">View</button>
                                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">Edit</button></td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>123456</td>
                                                    <td>123456</td>
                                                    <td>123456</td>
                                                    <td>123456</td>
                                                    <td><a class="label label-primary">Draft</a</td>
                                                    <td><button type="button" class="btn btn-success btn-xs">View</button>
                                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">Share by email</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Invoice Details</h2>
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
                                        <form class="form-horizontal form-label-left">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <label class="control-label">Invoice Id</label>
                                                    <input type="number" class="form-control" placeholder="Enter Invoice Id">
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <label class="control-label">Buyer Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Buyer Name">
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <label class="control-label">Date</label>
                                                    <input type="date" class="form-control" placeholder="Enter Product">
                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="form-group" style="float: right">
                                                <button class="btn btn-info" type="reset">Print</button>
                                                <button type="submit" class="btn btn-success">Generate</button>
                                                <button type="submit" class="btn btn-primary">Email</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /page content --> 

                    <!-- footer content -->
                    <?php $this->load->view('vendor/partials/footer') ?>
                    <!-- /footer content --> 
                </div>
            </div>

            <?php $this->load->view('vendor/partials/assets-footer'); ?>
            <!-- Custom Theme Scripts --> 
            <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
            <script>
                document.addEventListener("touchstart", function () {}, true);
            </script>
    </body>
</html>