<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('partner/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('partner/partials/left-nav'); ?>    
                <?php $this->load->view('partner/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Invite Interns</h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="row">
                                                <?php
                                                $result = $this->session->flashdata('result');
                                                if ($result == NULL) {
                                                    $hidealert = "hide";
                                                } else {
                                                    $showalert = $result;
                                                    $hidealert = "";
                                                }
                                                ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <form id="memberForm" method="POST" action="<?php echo base_url('partner/members/sendRequests') ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                        <table id="memberInviteTable" class="table order-list-two table-striped no-margin table-responsive table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Intern Email</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <input value="1" readonly="" type="text" name="invitemember[1][]" class="form-control" />
                                                                    </td>
                                                                    <td>
                                                                        <input required="" type="email" name="invitemember[1][]" class="form-control" />
                                                                    </td>
                                                                    <td>
                                                                        <a class="deleteRowTwo"></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="1" style="text-align: left;">
                                                                        <button type="button" class="btn btn-warning btn-sm btn-block" id="addrowTwo">Add Row</button>
                                                                    </td>
                                                                    <td colspan="2" style="text-align: right;">
                                                                        <button class="btn btn-warning btn-sm btn-block" type="submit">Invite Interns</button>
                                                                    </td>
                                                                </tr>

                                                            </tfoot>
                                                        </table>
<!--                                                        <div style="float: right">
                                                            <button class="btn btn-dark" type="submit">Invite Interns</button>
                                                        </div>-->
                                                    </form>
                                                </div>
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
                <?php $this->load->view('social/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>

        <?php $this->load->view('partner/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                var counter = 2;
                $("#addrowTwo").on("click", function () {
                    var count = $('#memberInviteTable tr').length;
                    var countRow = count - 1;
                    var newRow = $("<tr>");
                    var cols = "";
                    cols += '<td><input readonly="" value="' + countRow + '" required="" type="text" class="form-control form-control-alternative" name="invitemember[' + counter + '][]"/></td>';
                    cols += '<td><input required="" type="email" class="form-control" name="invitemember[' + counter + '][]"/></td>';
                    cols += '<td><input type="button" class="ibtnDel2 btn btn-md btn-block btn-danger"  value="Delete"></td>';
                    newRow.append(cols)
                    $("table.order-list-two").append(newRow);
                    counter++;
                });

                $("table.order-list-two").on("click", ".ibtnDel2", function (event) {
                    $(this).closest("tr").remove();
                    counter -= 1
                });

            });

            function calculateRow(row) {
                var price = +row.find('input[name^="price"]').val();

            }

            function calculateGrandTotal() {
                var grandTotal = 0;
                $("table.order-list").find('input[name^="price"]').each(function () {
                    grandTotal += +$(this).val();
                });
                $("#grandtotal").text(grandTotal.toFixed(2));
            }
        </script>
    </body>

</html>