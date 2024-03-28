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
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Messages</h2>                
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist">
                                            <li role="presentation" class="active"><a href="#tab_content11" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Sent Inmails</a>
                                            </li>
                                            <li role="presentation" class=""><a href="#tab_content22" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Received Inmails</a>
                                            </li>
                                            <li role="presentation"><a href="#tab_content33" id="log-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Sent Logs</a>
                                            </li>
                                            <li role="presentation"><a href="#tab_content44" role="tab" id="sent-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Received Logs</a>
                                            </li>
                                            <li role="presentation"><a href="#tab_content55" role="tab" id="com-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Community notifications</a>
                                            </li>
                                        </ul>
                                        <div id="myTabContent2" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content11" aria-labelledby="home-tab">
                                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl No.</th>
                                                            <th>To</th>
                                                            <th>Message</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if (!empty($sentMessages)) {
                                                            $iter = 0;
                                                            foreach ($sentMessages as $key => $message) {
                                                                $iter++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $iter; ?></td>
                                                                    <td>
                                                                        <?php
                                                                        $$useriduserid = $message['to_user'];
                                                                        $username = $this->users_model->get_user_by_id($userid);
                                                                        if (!empty($username)) {
                                                                            echo $username->Name;
                                                                        } else {
                                                                            echo "No Profile";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $message['message']; ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <td colspan="8">Inmail Empty !!</td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="profile-tab">
                                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl No.</th>
                                                            <th>From</th>
                                                            <th>Message</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if (!empty($inmailMessages)) {
                                                            $iter = 0;
                                                            foreach ($inmailMessages as $key => $message) {
                                                                $iter++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $iter; ?></td>
                                                                    <td>
                                                                        <?php
                                                                        $userid = $message['User_Id'];
                                                                        $username = $this->users_model->get_user_by_id($userid);
                                                                        if (!empty($username)) {
                                                                            echo $username->Name;
                                                                        } else {
                                                                            echo "No Profile";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $message['message']; ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <td colspan="8">Inmail Empty !!</td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div role="tabpane3" class="tab-pane fade in" id="tab_content33" aria-labelledby="log-tabb">
                                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl No.</th>
                                                            <th>To</th>
                                                            <th>Message</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if (!empty($sentLogs)) {
                                                            $iter = 0;
                                                            foreach ($sentLogs as $key => $message) {
                                                                $iter++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $iter; ?></td>
                                                                    <td>
                                                                        <?php
                                                                        $userid = $message['to_user'];
                                                                        $username = $this->users_model->get_user_by_id($userid);

                                                                        if (!empty($username)) {
                                                                            echo $username->Name;
                                                                        } else {
                                                                            echo "No Profile";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $message['message']; ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <td colspan="8">Logs Empty !!</td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div role="tabpane" class="tab-pane fade" id="tab_content44" aria-labelledby="sent-tabb">
                                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl No.</th>
                                                            <th>From</th>
                                                            <th>Message</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if (!empty($logMessages)) {
                                                            $iter = 0;
                                                            foreach ($logMessages as $key => $message) {
                                                                $iter++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $iter; ?></td>
                                                                    <td>
                                                                        <?php
                                                                        $userid = $message['User_Id'];
                                                                        $username = $this->users_model->get_user_by_id($userid);
                                                                        if (!empty($username)) {
                                                                            echo $username->Name;
                                                                        } else {
                                                                            echo "No Profile";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $message['message']; ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <td colspan="8">Logs Empty !!</td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div role="tabpane" class="tab-pane fade" id="tab_content55" aria-labelledby="sent-tabb">
                                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl No.</th>
                                                            <th>From</th>
                                                            <th>Message</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if (!empty($partners)) {
                                                            $iter = 0;
                                                            foreach ($partners as $key => $message) {
                                                                $iter++;
                                                                $followerId = $message['User_Id'];
                                                                $communityDetails = $this->association_model->getPartner($followerId);
                                                                $community = $this->association_model->getCommunity($communityDetails['C_Id']);
                                                                ?>

                                                                <?php if (!empty($community['Groupname'])) { ?>
                                                                    <tr>
                                                                        <td><?php echo $iter; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            if (!empty($community)) {
                                                                                echo $community['Groupname'];
                                                                            } else {
                                                                                echo "No Profile";
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $message['message']; ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>

                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <td colspan="8">Notifications Empty !!</td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
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