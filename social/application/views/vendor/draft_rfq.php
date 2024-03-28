
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
                                <h3>RFQ Drafts</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>RFQ Draft List</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>RFQ Id</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($quotedRfq)) {
                                                    $i = 1;
                                                    foreach ($quotedRfq as $key => $rfq) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $rfq['RFQ_Id']; ?></td>
                                                            <td><a class="btn btn-xs btn-info">Saved as draft</a></td>
                                                            <td>
                                                                <a href="<?php echo base_url() . "vendor/recieved_rfq/show/" . $rfq['RFQ_Id']; ?>" class="btn btn-success btn-xs">View</a>
                                                                <?php
                                                                $rfqData = $this->rfq_model->getRfqById($rfq['RFQ_Id']);
                                                                $userId = $rfqData['User_Id'];
                                                                ?>
                                                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal<?php echo "_" . $rfq['RFQ_Id']; ?>">Quote</button>
<!--                                                                <a target="_blank" href="<?php echo base_url(); ?>vendor/Profile/profileDetailsByKey/<?php echo $userId; ?>" class="btn btn-success btn-xs">Manage Buyer</a>-->
                                                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#manage<?php echo "_" . $rfq['RFQ_Id']; ?>">Message Buyer</button>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="5">Data not available.</td>
                                                    </tr>
                                                <?php }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /page content --> 
                            <!-- Modal -->
                            <?php
                            $i = 1;
                            foreach ($quotedRfq as $key => $rfq) {
                                ?>
                                <div id="myModal<?php echo "_" . $rfq['RFQ_Id']; ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-lg"> 
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Message</h4>
                                            </div>
                                            <?php //print_r($rfq);  ?>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-4 col-md-offset-1">
                                                        <div class="row">
                                                            <div class="col-md-6 p-5 dark-color">
                                                                <h5>TO</h5>
                                                            </div>
                                                            <div class="col-md-6 p-5 light-color">
                                                                <h5>Guest</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-md-offset-2">
                                                        <div class="row">
                                                            <div class="col-md-6 p-5 dark-color">
                                                                <h5>RFQ No</h5>
                                                            </div>
                                                            <div class="col-md-6 p-5 light-color">
                                                                <h5><?php echo $rfq['RFQ_Id']; ?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <br>
                                                    <div class="col-md-4 p-5 dark-color text-center">
                                                        <h5>Requested</h5>
                                                    </div>
                                                    <div class="col-md-8 p-5 light-color text-center">
                                                        <h5>Quote</h5>
                                                    </div>
                                                    <div class="col-md-4 no-padding">
                                                        <table class="table table-responsive table-striped noPadding" id="mtable">
                                                            <thead class="dark-color">
                                                                <tr>
                                                                    <td>Item</td>
                                                                    <td>Quantity</td>
                                                                    <td>UOM</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $itemdata = json_decode($rfq['quotedItems']);
                                                                foreach ($itemdata as $key => $itemrow) {
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $itemrow[0]; ?>
                                                                        </td>
                                                                        <td><?php echo $itemrow[1]; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            if (is_int($itemrow[2])) {
                                                                                foreach ($uoms as $key => $uom) {
                                                                                    if ($itemrow[2] == $uom['U_Id']) {
                                                                                        echo $uom['Uom'];
                                                                                    }
                                                                                }
                                                                            } else {
                                                                                echo $itemrow[2];
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <form method="POST" action="<?php echo base_url() . "vendor/Recieved-rfq/submit-quote"; ?>/<?php echo $rfq['RFQ_Id']; ?>" enctype="multipart/form-data">
                                                        <div class="col-md-8 no-padding">
                                                            <table class="table table-responsive table-striped noPadding" id="mtable">
                                                                <thead class="light-color">
                                                                    <tr>
                                                                        <td>Item Name</td>
                                                                        <td>Quantity</td>
                                                                        <td>UOM</td>
                                                                        <td>Currency</td>
                                                                        <td>Price per unit</td>
                                                                        <td>Amount</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $itemdata = json_decode($rfq['quotedItems']);
                                                                    $iter = 0;
                                                                    foreach ($itemdata as $key => $itemrow) {
                                                                        $iter++;
                                                                        $unique = mt_rand();
                                                                        ?>
                                                                        <tr>
                                                                            <td>
                                                                                <?php
                                                                                foreach ($items as $key => $item) {
                                                                                    if (is_numeric($itemrow[0])) {
                                                                                        if ($itemrow[0] == $item['I_Id']) {
                                                                                            $value = $item['Item'];
                                                                                        }
                                                                                    } else {
                                                                                        $value = $itemrow[0];
                                                                                    }
                                                                                }
                                                                                ?>
                                                                                <input value="<?php echo $value; ?>" readonly="" type="text" name="quotedItems[<?php echo $iter; ?>][]" class="form-control"/>
                                                                                <span class="form-error-message text-danger"></span>
                                                                            </td>
                                                                            <td>
                                                                                <input id="quotedQuantity<?php echo $unique; ?>" type="hidden" value="<?php echo $itemrow[1]; ?>" />
                                                                                <input max="<?php echo $itemrow[1] ?>" value="<?php echo $itemrow[1] ?>" onchange="calculateQuantityTotal(<?php echo $unique; ?>)" required="" id="quantity<?php echo $unique; ?>" type="number" name="quotedItems[<?php echo $iter; ?>][]" class="form-control"/>
                                                                                <span class="form-error-message text-danger"></span>
                                                                            </td>
                                                                            <td>
                                                                                <input value="<?php
                                                                                if (is_numeric($itemrow[2])) {
                                                                                    foreach ($uoms as $key => $uom) {
                                                                                        if ($itemrow[2] == $uom['U_Id']) {
                                                                                            echo $uom['Uom'];
                                                                                        }
                                                                                    }
                                                                                } else {
                                                                                    echo $itemrow[2];
                                                                                }
                                                                                ?>" readonly="readonly" type="text" name="quotedItems[<?php echo $iter; ?>][]"  class="form-control"/>
                                                                                <span class="form-error-message text-danger"></span>
                                                                            </td>
                                                                            <td>
                                                                                <input required="" value="INR" readonly="readonly" type="text" name="quotedItems[<?php echo $iter; ?>][]" class="form-control"/>
                                                                                <span class="form-error-message text-danger"></span>
                                                                            </td>
                                                                            <td>
                                                                                <input required="" value="<?php echo $itemrow[4] ?>" id="price<?php echo $unique; ?>" onchange="calculateTotal(<?php echo $unique; ?>)" type="number" name="quotedItems[<?php echo $iter; ?>][]" class="form-control"/>
                                                                                <span class="form-error-message text-danger"></span>
                                                                            </td>
                                                                            <td>
                                                                                <input value="<?php echo $itemrow[5] ?>" readonly="" required="" id="amount<?php echo $unique; ?>" type="number" name="quotedItems[<?php echo $iter; ?>][]" class="form-control"/>
                                                                                <span class="form-error-message text-danger"></span>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group" style="float: right;margin-right: 20px">
                                                                <button class="btn btn-default"  class="close" data-dismiss="modal">Close</button>
                                                                <button id="submit" type="submit" class="btn btn-success">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php }
                            ?> 
                            <?php
                            $i = 1;
                            foreach ($rfqs as $key => $rfq) {
                                ?>
                                <div id="manage<?php echo "_" . $rfq['RFQ_Id']; ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-lg"> 
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Quotation Details</h4>
                                            </div>
                                            <?php //print_r($rfq);  ?>
                                            <div class="modal-body">
                                                <form id="inmailForm" method="POST" action="<?php echo base_url() . "vendor/home/sendInmailToBuyers"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <label class="control-label">To (Foodlinked Users)</label>
                                                            <select class="form-control" name="user" id="usersFoodlinked">
                                                                <option data-value="<?php echo $rfq['User_Id']; ?>" value="<?php echo $rfq['User_Id']; ?>" selected><?php echo $rfq['RFQ_Key']; ?></option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12">
                                                            <label class="control-label">Message</label>
                                                            <textarea rows="3" required="" name="message" type="text" class="form-control" placeholder="Enter Message"></textarea>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <button type="submit" class="btn btn-success right-float">Send</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
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
        <script>
            $(window).on("load", function () {

<?php
$itemdata = json_decode($rfq['quotedItems']);
$l = 0;
foreach ($itemdata as $key => $itemrow) {
    $l++;
    $priceId = "#price" . $l;
    ?>

<?php } ?>
            });

            function calculateTotal(row) {
                var rowvalue = row;
                var quotedQuantity = "#quotedQuantity" + rowvalue;
                var quantity = "#quantity" + rowvalue;
                var priceId = "#price" + rowvalue;
                if ($(quantity).val() > $(quotedQuantity).val()) {
                    //$("#submit").attr("disabled", true);
                    alert("Quantity cannot be more than requested quantity.");
                } else {
                    $("#submit").attr("disabled", false);
                    value = $(quantity).val();
                    value2 = $(priceId).val();
                    $("#amount" + rowvalue).val(value * parseFloat(value2.replace(",", "")));
                }
            }

            function calculateQuantityTotal(row) {
                var rowvalue = row;
                var quotedQuantity = "#quotedQuantity" + rowvalue;
                var quantity = "#quantity" + rowvalue;
                var priceId = "#price" + rowvalue;
                if ($(quantity).val() > $(quotedQuantity).val()) {
                    //$("#submit").attr("disabled", true);
                    alert("Quantity cannot be more than requested quantity.");
                } else {
                    $("#submit").attr("disabled", false);
                    value = $(quantity).val();
                    value2 = $(priceId).val();
                    $("#amount" + rowvalue).val(value * parseFloat(value2.replace(",", "")));
                }
            }

            $(document).ready(function () {
                $("#draft").click(function () {
                    alert("Are you sure?");
                    $("input").prop('required', false);
                });
            });
        </script>
        <script>
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
        
    </body>
</html>