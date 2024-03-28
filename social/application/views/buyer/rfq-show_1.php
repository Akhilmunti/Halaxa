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
                                        <h2><i class="fa fa-bars"></i> RFQ Details </h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab_content11" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Request Info</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#tab_content22" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Items Info</a>
                                                </li>
                                            </ul>
                                            <div id="myTabContent2" class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content11" aria-labelledby="home-tab">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-6">
                                                            <label class="control-label">Group</label>
                                                            <select class="form-control" name="types" id="types" disabled="">
                                                                <option>Select</option>
                                                                <?php
                                                                foreach ($types as $type) {
                                                                    if ($rfqdata['T_Key'] == $type['T_Id']) {
                                                                        echo "<option value='" . $type['T_Id'] . "' selected>" . $type['Type'] . "</option>";
                                                                    } else {
                                                                        echo "<option value='" . $type['T_Id'] . "'>" . $type['Type'] . "</option>";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                            <span class="form-error-message text-danger"></span>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6">
                                                            <label class="control-label">Category</label>
                                                            <select disabled="" id="categories" name="categories" class="form-control">
                                                                <option value="<?php
                                                                print_r($cat[0]['Category'])
                                                                ?>"><?php
                                                                            print_r($cat[0]['Category'])
                                                                            ?></option>
                                                            </select>
                                                            <span class="form-error-message text-danger"></span>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6">
                                                            <label class="control-label">Sub Category</label>
                                                            <select disabled="" name="subcategories" id="subcategories" class="form-control">
                                                                <option value="<?php
                                                                print_r($scat[0]['Sub_Category'])
                                                                ?>"><?php
                                                                            print_r($scat[0]['Sub_Category'])
                                                                            ?></option>
                                                            </select>
                                                            <span class="form-error-message text-danger"></span>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6">
                                                            <label class="control-label">Start Date</label>
                                                            <?php
                                                            $timestamp = strtotime($rfqdata['Start']);
                                                            $t1 = $new_date_format = date('m/d/Y', $timestamp);
                                                            ?>
                                                            <input disabled="" value="<?= $t1 ?>" name="startdate" type="text" class="form-control" id="single_cal1" placeholder="First Name" aria-describedby="inputSuccess2Status">
                                                            <span class="form-error-message text-danger"></span>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6">
                                                            <label class="control-label">End Date</label>
                                                            <?php
                                                            $timestamp = strtotime($rfqdata['End']);
                                                            $t2 = $new_date_format = date('m/d/Y', $timestamp);
                                                            ?>
                                                            <input disabled="" value="<?= $t2 ?>" name="enddate" type="text" class="form-control" id="single_cal2" placeholder="First Name" aria-describedby="inputSuccess2Status">
                                                            <span class="form-error-message text-danger"></span>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6">
                                                            <label class="control-label">Location</label>
                                                            <input disabled="" value="<?= $rfqdata['Location'] ?>" name="location" id="loc-automplete" type="text" class="form-control" placeholder="Enter Location">
                                                            <span class="form-error-message text-danger"></span>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6">
                                                            <label class="control-label">City</label>
                                                            <input disabled="" value="<?= $rfqdata['City'] ?>" name="city" id="city-automplete" type="text" class="form-control" placeholder="Enter City">
                                                            <span class="form-error-message text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="profile-tab">
                                                    <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                    <table id="RfqInfoTable" class="table order-list table-striped">
                                                        <thead>
                                                            <tr>
                                                                <td>Sl No</td>
                                                                <td>Item Service</td>
                                                                <td>Item Description</td>
                                                                <td>Quantity</td>
                                                                <td>UOM</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $itemdata = json_decode($rfqdata['itemsinfo']);
                                                            $iter = 0;
                                                            foreach ($itemdata as $key => $itemrow) {
                                                                $iter++;
                                                                ?>
                                                                <tr>
                                                                    <td class="col-sm-1">
                                                                        <input type="text" value="<?= $iter; ?>" name="iteminfo[1][]" value="1" readonly class="form-control" /></td>
                                                                    <td class="col-sm-2">                                  
                                                                        <select name="iteminfo[0][]" class="form-control" disabled="">
                                                                            <?php
                                                                            foreach ($items as $key => $item) {
                                                                                if (is_numeric($itemrow[1])) {
                                                                                    if ($itemrow[1] == $item['I_Id']) {
                                                                                        echo "<option value='" . $item['I_Id'] . "' selected>" . $item['Item'] . "</option>";
                                                                                    } else {
                                                                                        echo "<option value='" . $itemrow[1] . "'>" . $itemrow[1] . "</option>";
                                                                                    }
                                                                                } else {
                                                                                    echo "<option value='" . $itemrow[1] . "' selected>" . $itemrow[1] . "</option>";
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </td>
                                                                    <td class="col-sm-3"><input disabled="" value="<?= $itemrow[2]; ?>" type="text" name="iteminfo[1][]"  class="form-control"/></td>
                                                                    <td class="col-sm-2"><input disabled="" value="<?= $itemrow[3]; ?>" type="text" name="iteminfo[1][]"  class="form-control"/></td>
                                                                    <td class="col-sm-2"><select disabled="" class="form-control" name="iteminfo[1][]">
                                                                            <option>Choose option</option>
                                                                            <?php
                                                                            foreach ($uoms as $key => $uom) {
                                                                                if (is_numeric($itemrow[4])) {
                                                                                    if ($itemrow[4] == $uom['U_Id']) {
                                                                                        echo "<option value='" . $uom['U_Id'] . "' selected>" . $uom['Uom'] . "</option>";
                                                                                    } else {
                                                                                        echo "<option value='" . $uom['U_Id'] . "'>" . $uom['Uom'] . "</option>";
                                                                                    }
                                                                                } else {
                                                                                    echo "<option value='" . $itemrow[4] . "' selected>" . $itemrow[4] . "</option>";
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                        </tbody>
<!--                                                                <tfoot>
                                                            <tr>
                                                                <td colspan="1" style="text-align: left;"><input type="button" class="btn btn-sm btn-dark" id="addrow" value="Add Row" /></td>
                                                            </tr>
                                                        </tfoot>-->
                                                    </table>
                                                    <!--                                                    <div class="row">
                                                                                                            <div class="col-md-6">
                                                                                                                <p>Note: Please make sure column number and column names are similar in your uploading BOQ documents.</p>
                                                                                                                 COMPONENT START 
                                                                                                                <div class="form-group">
                                                                                                                    <div class="input-group input-file" name="Fichier1"> <span class="input-group-btn">
                                                                                                                            <button class="btn btn-default btn-choose" type="button">Choose</button>
                                                                                                                        </span>
                                                                                                                        <input disabled="" type="text" class="form-control" placeholder='Choose a file...' />
                                                                                                                        <span class="input-group-btn">
                                                                                                                            <button class="btn btn-warning btn-reset" type="button">Reset</button>
                                                                                                                        </span> </div>
                                                                                                                </div>
                                                    
                                                                                                                <p>Upload BOQ/List of requirements in Excel format.</p>
                                                    
                                                                                                            </div>
                                                                                                            <div class="col-md-6">
                                                                                                                <p>Note: If you need to upload more documents (Like terms and conditions, service level agreement and additional conditions etc. ) Please zip all the files and upload</p>
                                                                                                                <div class="form-group">
                                                                                                                    <div class="input-group input-file" name="Fichier2"> <span class="input-group-btn">
                                                                                                                            <button class="btn btn-default btn-choose" type="button">Choose</button>
                                                                                                                        </span>
                                                                                                                        <input disabled="" type="text" class="form-control" placeholder='Choose a file...' />
                                                                                                                        <span class="input-group-btn">
                                                                                                                            <button class="btn btn-warning btn-reset" type="button">Reset</button>
                                                                                                                        </span> </div>
                                                                                                                </div>
                                                                                                                <p>Attachents</p>
                                                                                                            </div>
                                                                                                        </div>-->
                                                    <?php if ($rfqdata['file1'] != '' || $rfqdata['file2'] != '') { ?>
                                                        <div class="row">
                                                            <div class="col-md-12"><h2>Attachments</h2></div>
                                                            <div class="col-md-6">
                                                                <?php
                                                                $file1 = base_url('user_files/rfq_files/') . $rfqdata['file1'];
                                                                if (!empty($rfqdata['file1'])) {
                                                                    ?>
                                                                    <a class="btn btn-sm btn-dark" href="<?php echo base_url('user_files/rfq_files/') . $rfqdata['file1']; ?>" download>Download <?= $rfqdata['file1']; ?></a><br>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <a class="btn btn-sm btn-dark" href="" download>Not uploaded</a><br>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <?php
                                                                $file2 = base_url('user_files/rfq_files/') . $rfqdata['file2'];
                                                                if (!empty($rfqdata['file2'])) {
                                                                    ?>                              
                                                                    <a class="btn btn-sm btn-dark" href="<?php echo base_url('user_files/rfq_files/') . $rfqdata['file2']; ?>" download>Download <?= $rfqdata['file2']; ?></a>
                                                                <?php } else {
                                                                    ?>
                                                                    <a class="btn btn-sm btn-dark" href="" download>Not uploaded</a><br>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="control-label">Delivery Address</label>
                                                            <select disabled="" class="form-control" name="deliveryaddress" id="deliveryaddress">
                                                                <option><?php
                                                                    $id = $rfqdata['Deliveryaddress'];
                                                                    $deleivery = $this->users_model->get_address_byid($id);
                                                                    print_r($deleivery[0]['delivery_address']);
                                                                    ?>
                                                                </option>
                                                            </select>
                                                            <span class="form-error-message text-danger"></span>
                                                        </div>
                                                        <!--                                                        <div class="col-md-6">
                                                                                                                    <label class="control-label">Payment Method</label>
                                                                                                                    <select disabled="" class="form-control" name="paymentmethod" id="paymentmethod">
                                                                                                                        <option>Choose option</option>
                                                                                                                        <option value="1" <?php
                                                        if ($rfqdata['Paymentmethod'] == "1") {
                                                            echo "selected";
                                                        }
                                                        ?>>Credit</option>
                                                                                                                        <option value="2" <?php
                                                        if ($rfqdata['Paymentmethod'] == "2") {
                                                            echo "selected";
                                                        }
                                                        ?>>Debit</option>
                                                                                                                        <option value="3" <?php
                                                        if ($rfqdata['Paymentmethod'] == "3") {
                                                            echo "selected";
                                                        }
                                                        ?>>Bank Transfer</option>
                                                                                                                        <option value="4" <?php
                                                        if ($rfqdata['Paymentmethod'] == "4") {
                                                            echo "selected";
                                                        }
                                                        ?>>COD</option>
                                                                                                                    </select>
                                                                                                                    <span class="form-error-message text-danger"></span>
                                                                                                                </div>-->
                                                    </div>
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