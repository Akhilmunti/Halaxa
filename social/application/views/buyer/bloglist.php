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
                <?php $this->load->view('buyer/partials/left-nav'); ?>    
                <?php $this->load->view('buyer/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <?php $this->load->view('buyer/partials/searchbar'); ?>
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Blogs </h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>List of Blogs</h2>                  
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
                                    <ul id="menu1" class="list-unstyled msg_list">
                                        <?php
                                        if (!empty($blogs)) {
                                            foreach ($blogs as $message) {
                                                ?>
                                                <li> 
                                                    <a> 
                                                        <span class="image">
                                                            <img class="img-rounded img-responsive" src="<?php echo base_url(); ?>uploads/<?php echo $message['attachment']; ?>" alt="Profile Image" />
                                                        </span> 
                                                        <span class="message">
                                                            <h5><?php echo $message['blog_by']; ?></h5>
                                                        </span>
                                                        <span> 
                                                            <span><?php echo $message['topic']; ?></span> 
                                                        </span> 
                                                        <span class="time" style="margin-right: 20px !important">
                                                            <?php echo $message['date_added']; ?>
                                                        </span>
                                                        <span class="message"> 
                                                            <?php echo $message['blog_description']; ?> 
                                                        </span> 
                                                    </a> 
                                                </li>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <li>
                                                <div class="text-center"> <a> <strong>BLogs Empty !!</strong> </a> </div>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
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
            document.addEventListener("touchstart", function () {}, true);
        </script>
        <script>
            function delete_rfq(id) {
                if (confirm("Are you sure?")) {
                    $.post("/buyer/rfq/deletebyid/" + id, {},
                            function (data, status) {
                                if (data == 'success') {
                                    alert("Data removed");
                                }
                                location.reload();
                            });
                }
            }

            $('#datatable').dataTable({
                "orderFixed": [0, 'desc'],
                "ordering": false
            });
        </script>
        <script>
            // Type change event
            $('#filterby').change(function () {
                $.post("<?php echo base_url('buyer/search/getFilterResults/'); ?>",
                        {
                            filter: this.value,
                        },
                        function (data, status) {
                            $('#products').html(data);
                        });
            });
        </script>
    </body>

</html>