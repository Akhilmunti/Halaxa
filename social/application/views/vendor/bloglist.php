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
                <?php foreach ($rfqs as $key => $rfq) { ?>
                    <!-- Modal -->
                    <div class="modal fade" id="viewDataModal<?php echo $rfq['RFQ_Id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">RFQ Details</h4>
                                </div>
                                <div class="modal-body">
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Item Service</th>
                                                <th>Item Description</th>
                                                <th>Quantity</th>
                                                <th>UOM ID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $infos = json_decode($rfq['itemsinfo']);
                                            foreach ($infos as $key => $info) {
                                                echo "<tr><td>" . $info[0] . "</td><td>" . $info[1] . "</td><td>" . $info[2] . "</td><td>" . $info[3] . "</td><td>" . $info[4] . "</td></tr>";
                                            }
                                            ?>
                                            <tr>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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