<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('buyer/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('buyer/partials/left-nav'); ?>    
                <?php $this->load->view('buyer/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <?php $this->load->view('buyer/partials/searchbar'); ?>
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>View RFQ </h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><i class="fa fa-bars"></i>Received Quotation</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab_content33" role="tab" id="pro-tabb" data-toggle="tab" aria-controls="pro" aria-expanded="false">Compare Quotes</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#tab_content44" role="tab" id="prod-tabb" data-toggle="tab" aria-controls="prod" aria-expanded="false">Negotiate</a>
                                                </li>
                                                <li role="presentation" class="<?php echo $potab; ?>"><a href="#tab_content55" role="tab" id="po-tabb" data-toggle="tab" aria-controls="po" aria-expanded="false">PO</a>
                                                </li>
                                            </ul>
                                            <div id="myTabContent2" class="tab-content">
                                                <div role="tabpane3" class="tab-pane fade active in" id="tab_content33" aria-labelledby="home-tab">  
                                                    <style>
                                                        .m_wrap{
                                                            width:100%;
                                                            height:auto;
                                                        }
                                                        .dx {
                                                            overflow-y: hidden;
                                                            white-space: nowrap;
                                                            width: 100%;
                                                        }
                                                        .xc{
                                                            display:inline-block;
                                                        }
                                                    </style>
                                                    <div class="m_wrap">
                                                        <div class="dx">
                                                            <?php
                                                            if (!empty($quotedRfqById)) {
                                                                $i = 1;
                                                                $countVendor = count($quotedRfqById) + 1;
                                                                foreach ($quotedRfqById as $key => $rfq) {
                                                                    $countVendor--;
                                                                    ?>
                                                                    <div class="xc">
                                                                        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Quote count : <?php echo $countVendor; ?></th>
                                                                                    <th colspan="5">Vendor name :<a href="<?php echo base_url(); ?>Profile/index/<?php echo $rfq['vendor_id']; ?>" target="_blank"><?php echo $rfq['vendor_name']; ?> </a></th>
                                                                                    <th colspan="2">RFQ Id : <a href="<?php echo base_url() . "buyer/received_quotes/show/" . $rfq['RFQ_Id']; ?>"><?php echo $rfq['RFQ_Id']; ?></a></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Sl No</th>
                                                                                    <th>Item</th>
                                                                                    <th>Quantity</th>
                                                                                    <th>UOM</th>
                                                                                    <th>Currency</th>
                                                                                    <th>Price per unit</th>
                                                                                    <th>Amount</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                $itemdata = json_decode($rfq['quotedItems']);
                                                                                $sum = 0;
                                                                                $countRows = 0;
                                                                                foreach ($itemdata as $key => $itemrow) {
                                                                                    $sum += $itemrow[5];
                                                                                    $countRows++;
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td><?php echo $countRows; ?></td>
                                                                                        <td><?= $itemrow[0]; ?></td>
                                                                                        <td class="text-warning"><?= $itemrow[1]; ?></td>
                                                                                        <td><?= $itemrow[2]; ?></td>
                                                                                        <td><?= $itemrow[3]; ?></td>
                                                                                        <td class="text-success"><?= $itemrow[4]; ?></td>
                                                                                        <td><?= $itemrow[5]; ?></td>
                                                                                    </tr>
                                                                                    <?php
                                                                                }
                                                                                ?>

                                                                            </tbody>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th colspan="5"><?php echo "Last Updated : " . $rfq['date_updated']; ?></th>
                                                                                    <th colspan="2" class="text-danger">Total : <?php echo $sum ?></th>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>

                                                                    </div>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <tr>
                                                                    <td colspan="6">Data empty</td>
                                                                </tr>
                                                            <?php }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpane3" class="tab-pane fade in" id="tab_content44" aria-labelledby="home-tab">
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl No</th>
                                                                <th>Item</th>
                                                                <th>Quantity</th>
                                                                <th>UOM</th>
                                                                <th>Currency</th>
                                                                <th>Price per unit</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if (!empty($quotedRfqById)) {
                                                                $i = 1;
                                                                foreach ($quotedRfqById as $key => $rfq) {
                                                                    ?>
                                                                    <tr>
                                                                        <?php
                                                                        $postatus = $rfq['q_negotiate'];
                                                                        if ($postatus == "0"):
                                                                            ?>
                                                                        <tr>
                                                                            <th colspan="7">Vendor name : <a href="<?php echo base_url(); ?>buyer/Profile/profileDetails/<?php echo $rfq['vendor_name']; ?>" target="_blank"><?php echo $rfq['vendor_name']; ?> </a> 
            <!--                                                                                <a data-toggle="modal" data-target="#myModalNegMail" onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>buyer/received_quotes/requote/<?php echo $rfq['id']; ?>" class="label label-primary btn-xs">Negotiate</a>-->
                                                                                <a type="button" data-toggle="modal" data-target="#myModalNegMail_<?php echo $rfq['id'] ?>" onclick="return confirm('Are you sure?')" class="label label-primary btn-xs">Negotiate</a>
                                                                            </th>
                                                                        </tr>
                                                                    <?php else: ?>
                                                                        <tr>
                                                                            <th colspan="7">Vendor name : <a href="<?php echo base_url(); ?>buyer/Profile/profileDetails/<?php echo $rfq['vendor_name']; ?>" target="_blank"><?php echo $rfq['vendor_name']; ?> </a>
                                                                                <a href="#" class="label label-warning btn-xs">Under Negotiation</a></th>
                                                                        </tr>
                                                                        <?php
                                                                        $Negstatus = $this->vendor_model->getAllNegMessages($rfq['id']);
                                                                        if (!empty($Negstatus)) {
                                                                            ?>
                                                                            <tr>
                                                                                <th colspan="7">
                                                                                    Message Sent : <?php echo $Negstatus['message'] ?>
                                                                                </th>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    <?php endif; ?>
                                                                    </tr>
                                                                    <?php
                                                                    $itemdata = json_decode($rfq['quotedItems']);
                                                                    $countRows = 0;
                                                                    foreach ($itemdata as $key => $itemrow) {
                                                                        $countRows++;
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $countRows; ?></td>
                                                                            <td><?= $itemrow[0]; ?></td>
                                                                            <td><?= $itemrow[1]; ?></td>
                                                                            <td><?= $itemrow[2]; ?></td>
                                                                            <td><?= $itemrow[3]; ?></td>
                                                                            <td><?= $itemrow[4]; ?></td>
                                                                            <td><?= $itemrow[5]; ?></td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <tr>
                                                                    <td colspan="6">Data empty</td>
                                                                </tr>
                                                            <?php }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div role="tabpane3" class="tab-pane fade in" id="tab_content55" aria-labelledby="home-tab">
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl No</th>
                                                                <th>Item</th>
                                                                <th>Quantity</th>
                                                                <th>UOM</th>
                                                                <th>Currency</th>
                                                                <th>Price per unit</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if (!empty($quotedRfqById)) {
                                                                $i = 1;
                                                                foreach ($quotedRfqById as $key => $rfq) {
                                                                    ?>
                                                                    <tr>
                                                                        <?php
                                                                        $postatus = $rfq['po_status'];
                                                                        if ($postatus == "0"):
                                                                            ?>
                                                                            <th colspan="7">Vendor name : <a href="<?php echo base_url(); ?>buyer/Profile/profileDetails/<?php echo $rfq['vendor_name']; ?>" target="_blank"><?php echo $rfq['vendor_name']; ?> </a>
                                                                                <a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>buyer/received_quotes/issuePo/<?php echo $rfq['id']; ?>" class="label label-warning btn-xs">Issue PO</a>
                                                                            </th>
                                                                        <?php else: ?>
                                                                            <th colspan="7">Vendor name : <a href="<?php echo base_url(); ?>buyer/Profile/profileDetails/<?php echo $rfq['vendor_name']; ?>" target="_blank"><?php echo $rfq['vendor_name']; ?> </a> 
                                                                                <a href="#" class="label label-success btn-xs">PO already issued</a>
                                                                            </th>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <?php
                                                                    $itemdata = json_decode($rfq['quotedItems']);
                                                                    $countRows = 0;
                                                                    foreach ($itemdata as $key => $itemrow) {
                                                                        $countRows++;
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $countRows; ?></td>
                                                                            <td><?= $itemrow[0]; ?></td>
                                                                            <td><?= $itemrow[1]; ?></td>
                                                                            <td><?= $itemrow[2]; ?></td>
                                                                            <td><?= $itemrow[3]; ?></td>
                                                                            <td><?= $itemrow[4]; ?></td>
                                                                            <td><?= $itemrow[5]; ?></td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <tr>
                                                                    <td colspan="6">Data empty</td>
                                                                </tr>
                                                            <?php }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- /page content --> 

                <?php
                if (!empty($quotedRfqById)) {
                    $i = 1;
                    foreach ($quotedRfqById as $key => $rfq) {
                        ?>
                        <div id="myModalNegMail_<?php echo $rfq['id'] ?>" class="modal fade" role="dialog" data-backdrop="false">
                            <div class="modal-dialog">
                                <form id="rfqForm" method="POST" action="<?php echo base_url(); ?>buyer/received_quotes/requote/<?php echo $rfq['id']; ?>  " class="form-horizontal form-label-left" enctype="multipart/form-data">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Negotiate</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <label class="control-label">Send Message to <?php echo $rfq['vendor_name']; ?></label>
                                                    <textarea rows="3" required="" name="message" type="text" class="form-control" placeholder="Enter Message"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-sm btn-dark">Negotiate</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    ?>

                <?php }
                ?>
                <!-- footer content -->
                <?php $this->load->view('buyer/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>

        <?php $this->load->view('buyer/partials/assets-footer'); ?>
        <!-- jQuery Smart Wizard --> 
        <script src="<?php echo base_url(); ?>assets/vendors/moment/min/moment.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>  
        <script src="<?php echo base_url(); ?>assets/vendors/jQuery-Smart-Wizard/js/normal.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- iCheck --> 
        <script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script> 
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
                                                                        document.addEventListener("touchstart", function () {}, true);
        </script>
        <script>
            // Type change event
            $('#types').change(function () {
                $.post("<?php echo base_url('buyer/rfq/getCatByType/'); ?>",
                        {
                            type: this.value,
                        },
                        function (data, status) {
                            $('#categories').html(data);
                        });
            });

            $(document).ready(function () {
                var counter = $('#RfqInfoTable tr').length - 1;
<?php
$items_out = '<option>Choose option</option>';
foreach ($items as $key => $item) {
    $items_out = $items_out . "<option value='" . $item['I_Id'] . "'>" . $item['Item'] . "</option>";
}
echo "var items_out = \"" . $items_out . "\";";

$uoms_out = '<option>Choose option</option>';
foreach ($uoms as $key => $uom) {
    $uoms_out = $uoms_out . "<option value='" . $uom['U_Id'] . "'>" . $uom['Uom'] . "</option>";
}
echo "var uoms_out = \"" . $uoms_out . "\";";
?>

                $("#addrow").on("click", function () {
                    var newRow = $("<tr>");
                    var cols = "";
                    cols += '<td><input type="text" class="form-control" name="iteminfo[' + counter + '][]"/ readonly value="' + counter + '"></td>';
                    cols += '<td><select class="form-control" name="iteminfo[' + counter + '][]">' + items_out + '</select></td>';
                    cols += '<td><input type="text" class="form-control" name="iteminfo[' + counter + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control" name="iteminfo[' + counter + '][]"/></td>';
                    cols += '<td><select class="form-control" name="iteminfo[' + counter + '][]">' + uoms_out + '</select></td>';
                    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                    newRow.append(cols);
                    $("table.order-list").append(newRow);
                    counter++;
                });

                $("table.order-list").on("click", ".ibtnDel", function (event) {
                    $(this).closest("tr").remove();
                    counter -= 1
                });

            });

            // location autocomplete
            var locations = [
<?php
foreach ($locs as $key => $loc) {
    echo "{ value: '" . $loc['Location'] . "', data: '" . $loc['L_Id'] . "' },";
}
?>
            ];
            $('#loc-automplete').autocomplete({lookup: locations});


            // For input file styling

            function bs_input_file() {
                $(".input-file").before(
                        function () {
                            if (!$(this).prev().hasClass('input-ghost')) {
                                var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                                element.attr("name", $(this).attr("name"));
                                element.change(function () {
                                    element.next(element).find('input').val((element.val()).split('\\').pop());
                                });
                                $(this).find("button.btn-choose").click(function () {
                                    element.click();
                                });
                                $(this).find("button.btn-reset").click(function () {
                                    element.val(null);
                                    $(this).parents(".input-file").find('input').val('');
                                });
                                $(this).find('input').css("cursor", "pointer");
                                $(this).find('input').mousedown(function () {
                                    $(this).parents('.input-file').prev().click();
                                    return false;
                                });
                                return element;
                            }
                        }
                );
            }
            $(function () {
                bs_input_file();
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