<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('admin/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('admin/partials/left-nav'); ?>    
                <?php $this->load->view('admin/partials/top-nav'); ?>  
                <!-- page content -->
                <div class="right_col" role="main"> 
                    <div class="">
                        <div class="row top_tiles">
                            <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                <a href="<?= base_url("admin/user/buyer"); ?>">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-list-ol"></i></div>
                                        <div class="count">
                                            <?php
                                            if (!empty($buyer)) {
                                                echo count($buyer);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                        <h3>Buyers</h3>
                                        <p>Lorem ipsum psdea itgum rixt.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                <a href="<?= base_url("admin/user/vendor"); ?>">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-list-ol"></i></div>
                                        <div class="count">
                                            <?php
                                            if (!empty($vendor)) {
                                                echo count($vendor);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                        <h3>Vendors</h3>
                                        <p>Lorem ipsum psdea itgum rixt.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                <a href="<?= base_url("admin/user"); ?>">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-list-ol"></i></div>
                                        <div class="count">
                                            <?php
                                            if (!empty($social)) {
                                                echo count($social);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                        <h3>Social</h3>
                                        <p>Lorem ipsum psdea itgum rixt.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="<?= base_url("admin/influencer"); ?>">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fab fa-confluence"></i></div>
                                        <div class="count">
                                            <?php
                                            if (!empty($influencer)) {
                                                echo count($influencer);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                        <h3>Influencer</h3>
                                        <p>Lorem ipsum psdea itgum rixt.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="<?= base_url("admin/school"); ?>">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fas fa-university"></i></div>
                                        <div class="count">
                                            <?php
                                            if (!empty($school_list)) {
                                                echo count($school_list);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                        <h3>Schools</h3>
                                        <p>Lorem ipsum psdea itgum rixt.</p>
                                    </div> 
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="<?= base_url("admin/hotel"); ?>">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fas fa-hotel"></i></div>
                                        <div class="count">
                                            <?php
                                            if (!empty($hotel_list)) {
                                                echo count($hotel_list);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                        <h3>Hotels</h3>
                                        <p>Lorem ipsum psdea itgum rixt.</p>
                                    </div> 
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="<?= base_url("admin/association"); ?>">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fab fa-confluence"></i></div>
                                        <div class="count">
                                            <?php
                                            if (!empty($association_list)) {
                                                echo count($association_list);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                        <h3>Associations</h3>
                                        <p>Lorem ipsum psdea itgum rixt.</p>
                                    </div> 
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                <a href="<?= base_url("admin/type"); ?>">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-object-group"></i></div>
                                        <div class="count">
                                            <?php
                                            if (!empty($types)) {
                                                echo count($types);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                        <h3>Groups</h3>
                                        <p>Lorem ipsum psdea itgum rixt.</p>
                                    </div> 
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                <a href="<?= base_url("admin/category"); ?>">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-tags"></i></div>
                                        <div class="count">
                                            <?php
                                            if (!empty($cats)) {
                                                echo count($cats);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                        <h3>Categories</h3>
                                        <p>Lorem ipsum psdea itgum rixt.</p>
                                    </div> 
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                <a href="<?= base_url("admin/sub_category"); ?>">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-tag"></i></div>
                                        <div class="count">
                                            <?php
                                            if (!empty($scats)) {
                                                echo count($scats);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                        <h3>Sub-Categories</h3>
                                        <p>Lorem ipsum psdea itgum rixt.</p>
                                    </div> 
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="<?= base_url("admin/uom"); ?>">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fas fa-weight"></i></i></div>
                                        <div class="count">
                                            <?php
                                            if (!empty($uom)) {
                                                echo count($uom);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                        <h3>UOM</h3>
                                        <p>Lorem ipsum psdea itgum rixt.</p>
                                    </div> 
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="<?= base_url("admin/item"); ?>">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fas fa-shopping-bag"></i></div>
                                        <div class="count">
                                            <?php
                                            if (!empty($items)) {
                                                echo count($items);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                        <h3>Items</h3>
                                        <p>Lorem ipsum psdea itgum rixt.</p>
                                    </div> 
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <a href="<?= base_url("admin/blogs"); ?>">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fab fa-blogger"></i></div>
                                        <div class="count">
                                            <?php
                                            if (!empty($blogs)) {
                                                echo count($blogs);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                        <h3>Blogs</h3>
                                        <p>Lorem ipsum psdea itgum rixt.</p>
                                    </div> 
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <a href="<?= base_url("admin/logs"); ?>">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fas fa-user-secret"></i></div>
                                        <div class="count">
                                            <?php
                                            if (!empty($logs)) {
                                                echo count($logs);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                        <h3>Logs</h3>
                                        <p>Lorem ipsum psdea itgum rixt.</p>
                                    </div> 
                                </a>
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
    </body>

</html>