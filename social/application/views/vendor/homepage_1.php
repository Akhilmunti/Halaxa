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
                        <div class="row top_tiles">
                            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-quote-right"></i></div>
                                    <div class="count"><?php echo count($products); ?></div>
                                    <h3>Products</h3>
                                </div>
                            </div>
                            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                                    <div class="count"><?php echo count($rfqs); ?></div>
                                    <h3>RFQ</h3>
                                </div>
                            </div>
                            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-list-ol"></i></div>
                                    <div class="count"><?php echo count($poissued); ?></div>
                                    <h3>PO</h3>
                                </div>
                            </div>
<!--                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-share"></i></div>
                                    <div class="count">179</div>
                                    <h3>NN Open</h3>
                                    <p>Lorem ipsum psdea itgum rixt.</p>
                                </div>
                            </div>-->
                        </div>
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>Vendor</h3>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <p>Keep your Seller Corporate Profile updated at all times in order for buyers to find you all the times</p>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <a href="<?php echo base_url('vendor/profile'); ?>" class="btn btn-sm btn-dark">Update Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="x_panel">
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <p>Help us continuously grow the <?php echo PROJECT_NAME; ?> suppliers network and help your current suppliers grow their sales and revenues.</p>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <a href="<?php echo base_url('vendor/invite-buyers'); ?>" class="btn btn-sm btn-dark">Invite</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php
                                $blogsData = $blogs;
                                if (empty($blogsData)) {
                                    $bloghide = "hide";
                                } else {
                                    $bloghide = "";
                                }
                                ?>
<!--                                <div class="col-md-4 <?php echo $bloghide; ?>">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Blogs</h2>
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
                                            <?php
                                            if (!empty($blogs)) {
                                                foreach (array_slice($blogs, 0, 2) as $key => $blog) {
                                                    ?>
                                                    <div class="profile_details">
                                                        <div class="well profile_view">
                                                            <div class="col-sm-12">
                                                                <h4 class="brief"><i><?php echo $blog['topic']; ?></i></h4>
                                                                <div class="left col-xs-3 text-center"> 
                                                                    <img src="<?php echo base_url(); ?>uploads/<?php echo $blog['attachment']; ?>" alt="" class="img-circle img-responsive"> 
                                                                </div>
                                                                <div class="right col-xs-9">
                                                                    <h2><?php echo $blog['blog_by']; ?></h2>
                                                                    <p><?php echo $blog['blog_description']; ?></p>
                                                                    <br>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 bottom text-center"> 
                                                                <a href="<?php echo base_url() . "buyer/home/blogs/"; ?>" class="btn btn-info btn-xs"> <i class="fa fa-newspaper-o"> </i> Read More </a> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            } else {
                                                ?>

                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="text-center">
                                            <a href="<?php echo base_url() . "buyer/home/blogs/"; ?>" class="btn btn-dark btn-sm">View All Blogs</a>
                                        </div>
                                    </div>
                                                                        <div class="x_panel">
                                                                            <div class="x_title">
                                                                                <h2>Quick Links</h2>
                                                                                <div class="clearfix"></div>
                                                                            </div>
                                                                            <div class="x_content">
                                                                                <a class="btn btn-sm btn-dark">Request for quotation</a>
                                                                            </div>
                                                                        </div>
                                </div>-->
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