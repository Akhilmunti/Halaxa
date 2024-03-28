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
                                <h3>Clientele</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Clientele Management</h2>
                                        <div style="float: right">
                                            <a data-toggle="modal" data-target="#myModal" class="btn btn-dark btn-sm">Add Client</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <?php
                                        $notification = $this->session->flashdata('result');
                                        if ($notification == NULL) {
                                            $hidealert = "hide";
                                        } else {
                                            $showalert = $notification;
                                            $hidealert = "";
                                        }
                                        ?>
                                        <div class="alert alert-success <?php echo $hidealert ?>">
                                            <?php echo $showalert ?>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-responsive">
                                                <thead>
                                                    <tr class="headings">
                                                        <th class="column-title">Sl No </th>
                                                        <th class="column-title">Client Name </th>
                                                        <th class="column-title">Client Logo </th>
                                                        <th class="column-title">Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($clients)) {
                                                        $counter = 0;
                                                        foreach ($clients as $key => $client) {
                                                            $counter++;
                                                            ?>
                                                            <tr>
                                                                <td><?= $counter; ?></td>
                                                                <td><?= $client["client_name"] ?></td>
                                                                <td>
                                                                    <?php if (!empty($client["client_logo"])) { ?>
                                                                        <a class="btn btn-dark btn-xs" download="" href="<?php echo base_url(); ?>/uploads/<?= $client["client_logo"] ?>">Download Client Logo</a>
                                                                    <?php } else { ?>
                                                                        <a class="btn btn-danger btn-xs" href="#">Client Logo Not Uploaded</a>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <a href="<?php echo base_url() . "vendor/clientele/deleteClient"; ?>/<?= $client["id"] ?>" class="btn btn-dark btn-xs">Delete client</a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td colspan="15"><center>Clientele data not found!!</center></td>
                                                    </tr>
                                                <?php }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog"> 
                                    <!-- Modal content-->
                                    <form method="POST" action="<?php echo base_url() . "vendor/clientele/addClient"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add Client</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="control-label">Client Name</label>
                                                        <input name="clientName" type="text" class="form-control" placeholder="Enter Client Name">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="control-label">Client Logo</label>
                                                        <input name="clientLogo" type="file" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-dark">Add Client</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
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
        <!-- jQuery Smart Wizard --> 
        <script src="<?php echo base_url(); ?>assets/vendors/moment/min/moment.min.js"></script> 
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
        <script type="text/javascript">
            $('#datatable').dataTable({
                "orderFixed": [0, 'desc'],
                "ordering": false
            });
        </script>
        <script>
            //select all checkboxes
            $("#select_all").change(function () {  //"select all" change 
                var status = this.checked; // "select all" checked status
                $('.checkbox').each(function () { //iterate all listed checkbox items
                    this.checked = status; //change ".checkbox" checked status
                });
            });

            $('.checkbox').change(function () { //".checkbox" change 
                //uncheck "select all", if one of the listed checkbox item is unchecked
                if (this.checked == false) { //if this item is unchecked
                    $("#select_all")[0].checked = false; //change "select all" checked status to false
                }

                //check "select all" if all checkbox items are checked
                if ($('.checkbox:checked').length == $('.checkbox').length) {
                    $("#select_all")[0].checked = true; //change "select all" checked status to true
                }
            });
        </script>
        <script type="text/javascript">
//            function getRows(override, value) {
//                var filter = "#datatable tbody tr td";
//                $("#mySelector").each(function () {
//                    var test = this === override ? value : $(this).val();
//                    if (test !== "All")
//                        filter += ":contains(" + test + ")";
//                });
//                return $(filter).parent();
//            }
//            $('#mySelector').on('change', function () {
//                $('#datatable tbody tr').hide();
//                getRows().show();
//                $('#mySelector').each(function (i, select) {
//                    $('option', this).each(function () {
//                        $(this).toggle(getRows(select, $(this).text()).length > 0);
//                    });
//                });
//            });
//
//            function getRowsUom(override, value) {
//                var filter = "#datatable tbody tr td";
//                $("#mySelectorUomList").each(function () {
//                    var test = this === override ? value : $(this).val();
//                    if (test !== "All")
//                        filter += ":contains(" + test + ")";
//                });
//                return $(filter).parent();
//            }
//            $('#mySelectorUomList').on('change', function () {
//                $('#datatable tbody tr').hide();
//                getRowsUom().show();
//                $('#mySelectorUomList').each(function (i, select) {
//                    $('option', this).each(function () {
//                        $(this).toggle(getRows(select, $(this).text()).length > 0);
//                    });
//                });
//            });

            $('#hidePrice').on('click', function () {
                $('td:nth-child(12),th:nth-child(12)').hide();
            });

            $('#displayPrice').on('click', function () {
                location.reload();
            });

            $("#productForm").submit(function () {
                var checked = $("#productForm input:checked").length > 0;
                if (!checked) {
                    alert("Please check at least one checkbox");
                    return false;
                } else {
                    return true;
                }
            });

            $(document).ready(function () {
                $('#updateUom').change(function () {
                    var checked = $("#productForm input:checked").length > 0;
                    if (!checked) {
                        alert("Please check at least one checkbox");
                        return false;
                    } else {
                        $("#productForm").submit();
                        return true;
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('select.filterSelector').bind('change', function () {
                    $('select.filterSelector').attr('disabled', 'disabled');
                    $('#productTable').find('.Row').hide();
                    var critriaAttribute = '';

                    $('select.filterSelector').each(function () {
                        if ($(this).val() != '0') {
                            critriaAttribute += '[data-' + $(this).data('attribute') + '*="' + $(this).val() + '"]';
                        }
                    });

                    $('#productTable').find('.Row' + critriaAttribute).show();
                    $('select.filterSelector').removeAttr('disabled');
                });
            });
        </script>
    </body>
</html>