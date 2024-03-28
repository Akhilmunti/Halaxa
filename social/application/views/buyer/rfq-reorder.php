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
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Create RFQ </h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content"> 
                                    <!-- Smart Wizard -->
                                    <form id="rfqForm" method="POST" action="<?php echo base_url() . "buyer/rfq/create-submit"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                        <div id="wizard" class="form_wizard wizard_horizontal">
                                            <ul class="wizard_steps">
                                                <li> <a href="#step-1"> <span class="step_no">1</span> <span class="step_descr"> Request Info </span> </a> </li>
                                                <li> <a href="#step-2"> <span class="step_no">2</span> <span class="step_descr"> Items Info </span> </a> </li>
                                                <li> <a href="#step-3"> <span class="step_no">3</span> <span class="step_descr"> Vendors Selection </span> </a> </li>
                                            </ul>
                                            <div id="step-1" style="overflow: hidden">                        
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-6">
                                                        <label class="control-label">Group</label>
                                                        <select class="form-control" name="types" id="types">
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
                                                        <select id="categories" name="categories" class="form-control">
                                                            <option value="<?php
                                                            print_r($cat[0]['CT_Id'])
                                                            ?>" selected=""><?php
                                                                        print_r($cat[0]['Category'])
                                                                        ?></option>
                                                        </select>
                                                        <span class="form-error-message text-danger"></span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <label class="control-label">Sub Category</label>
                                                        <select name="subcategories" id="subcategories" class="form-control">
                                                            <option value="<?php
                                                            print_r($scat[0]['SCT_Id'])
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
                                                        $timestamp = strtotime($rfqdata['End']);
                                                        $t2 = $new_date_format = date('m/d/Y', $timestamp);
                                                        ?>
                                                        <input value="<?= $t1 ?>" name="startdate" type="text" class="form-control" id="single_cal1" placeholder="First Name" aria-describedby="inputSuccess2Status">
                                                        <span class="form-error-message text-danger"></span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <label class="control-label">End Date</label>
                                                        <input value="<?= $t2 ?>" name="enddate" type="text" class="form-control" id="single_cal2" placeholder="First Name" aria-describedby="inputSuccess2Status">
                                                        <span class="form-error-message text-danger"></span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <label class="control-label">Location</label>
                                                        <input value="<?= $rfqdata['Location'] ?>" name="location" id="loc-automplete" type="text" class="form-control" placeholder="Enter Location">
                                                        <span class="form-error-message text-danger"></span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <label class="control-label">City</label>
                                                        <input value="<?= $rfqdata['City'] ?>" name="city" id="city-automplete" type="text" class="form-control" placeholder="Enter City">
                                                        <span class="form-error-message text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-2">
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
                                                        foreach ($itemdata as $key => $itemrow) {
                                                            ?>
                                                            <tr>
                                                                <td class="col-sm-1">
                                                                    <input type="text" value="<?= $itemrow[0]; ?>" name="iteminfo[1][]" value="1" readonly class="form-control" />
                                                                </td>   
                                                                <td class="col-sm-2">
                                                                    <input list="items" value="<?= $itemrow[1]; ?>" name="iteminfo[1][]" class="form-control" />
                                                                    <datalist id="items">
                                                                        <?php
                                                                        foreach ($items as $key => $item) {
                                                                            echo "<option value='" . $item['I_Id'] . "'>" . $item['Item'] . "</option>";
                                                                        }
                                                                        ?>
                                                                    </datalist>
                                                                </td>   
                                                                <td class="col-sm-3"><input value="<?= $itemrow[2]; ?>" type="text" name="iteminfo[1][]"  class="form-control"/></td>
                                                                <td class="col-sm-2"><input value="<?= $itemrow[3]; ?>" type="text" name="iteminfo[1][]"  class="form-control"/></td>
                                                                <td class="col-sm-2"><select class="form-control" name="iteminfo[1][]">
                                                                        <option>Choose option</option>
                                                                        <?php
                                                                        foreach ($uoms as $key => $uom) {
                                                                            if ($itemrow[4] == $uom['U_Id']) {
                                                                                echo "<option value='" . $uom['U_Id'] . "' selected>" . $uom['Uom'] . "</option>";
                                                                            } else {
                                                                                echo "<option value='" . $uom['U_Id'] . "'>" . $uom['Uom'] . "</option>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select></td>
                                                                <td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="1" style="text-align: left;"><input type="button" class="btn btn-sm btn-dark" id="addrow" value="Add Row" /></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>Note: Please make sure column number and column names are similar in your uploading BOQ documents.</p>
                                                        <!-- COMPONENT START -->
                                                        <div class="form-group">
                                                            <div class="input-group input-file" name="Fichier1"> <span class="input-group-btn">
                                                                    <button class="btn btn-default btn-choose" type="button">Choose</button>
                                                                </span>
                                                                <input type="text" class="form-control" placeholder='Choose a file...' />
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
                                                                <input type="text" class="form-control" placeholder='Choose a file...' />
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-warning btn-reset" type="button">Reset</button>
                                                                </span> </div>
                                                        </div>
                                                        <p>Attachents</p>
                                                    </div>
                                                </div>
                                                <?php if ($rfqdata['file1'] != '' || $rfqdata['file2'] != '') { ?>
                                                    <div class="row">
                                                        <div class="col-md-12"><h2>Attachments</h2></div>
                                                        <div class="col-md-6">
                                                            <?php
                                                            if ($rfqdata['file1'] != '') {
                                                                ?>
                                                                <a href="<?php echo base_url('user_files/rfq_files/') . $rfqdata['file1']; ?>" download>Download <?= $rfqdata['file1']; ?></a><br>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?php
                                                            if ($rfqdata['file2'] != '') {
                                                                ?>                              
                                                                <a href="<?php echo base_url('user_files/rfq_files/') . $rfqdata['file2']; ?>" download>Download <?= $rfqdata['file2']; ?></a>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="control-label">Delivery Address</label>
                                                        <select class="form-control" name="deliveryaddress" id="deliveryaddress">
                                                            <option>Choose option</option>
                                                            <option value="1" <?php
                                                            if ($rfqdata['Deliveryaddress'] == "1") {
                                                                echo "selected";
                                                            }
                                                            ?>>Address 1</option>
                                                            <option value="2" <?php
                                                            if ($rfqdata['Deliveryaddress'] == "2") {
                                                                echo "selected";
                                                            }
                                                            ?>>Address 2</option>
                                                        </select>
                                                        <span class="form-error-message text-danger"></span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="control-label">Payment Method</label>
                                                        <select class="form-control" name="paymentmethod" id="paymentmethod">
                                                            <option>Choose option</option>
                                                            <option value="1" <?php
                                                            if ($rfqdata['Paymentmethod'] == "1") {
                                                                echo "selected";
                                                            }
                                                            ?>>Option one</option>
                                                            <option value="2" <?php
                                                            if ($rfqdata['Paymentmethod'] == "2") {
                                                                echo "selected";
                                                            }
                                                            ?>>Option two</option>
                                                        </select>
                                                        <span class="form-error-message text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-3">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <select class="form-control">
                                                            <option>Filter By</option>
                                                            <option>Favourite Seller</option>
                                                            <option>Location</option>
                                                            <option>Rating</option>
                                                            <option>Keyword</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 col-md-offset-8">
                                                        <select class="form-control">
                                                            <option>Sort By</option>
                                                            <option>Name</option>
                                                            <option>Country</option>
                                                            <option>City</option>
                                                            <option>Rating</option>
                                                        </select>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="col-md-12">
                                                        <span class="form-error-message text-danger text-danger" id="vendorRowError"></span>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped jambo_table bulk_action">
                                                                <thead>
                                                                    <tr class="headings">
                                                                        <th> <input type="checkbox" id="check-all" class="flat"></th>
                                                                        <th class="column-title">Name/Company </th>
                                                                        <th class="column-title">Phone </th>
                                                                        <th class="column-title">Email </th>
                                                                        <th class="column-title">Address </th>
                                                                        <th class="bulk-actions" colspan="6"> <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a> </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    if (!empty($vendors)) {
                                                                        foreach ($vendors as $key => $vendor) {
                                                                            ?>
                                                                            <tr class="even pointer">
                                                                                <td class="a-center "><input type="checkbox" name="vendor_id[]" value="<?= $vendor['V_Id'] ?>" class="flat" name="table_records"></td>
                                                                                <td class=" "><?= $vendor['Company'] ?></td>
                                                                                <td class=" "><?= $vendor['Phone'] ?></td>
                                                                                <td class=" "><?= $vendor['Email'] ?></td>
                                                                                <td class=" "><?= $vendor['Address'] ?></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                        <tr>
                                                                            <td colspan="5"><center>No data found</center></td>
                                                                    </tr>
                                                                <?php }
                                                                ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <input type="checkbox" class="flat" name="table_records"> Share public,make my RFQ visible to all Foodlinked sellers to submit quotes.
                                                    </div>
                                                </div>
                                            </div>                      
                                        </div>
                                    </form>
                                    <!-- End SmartWizard Content --> 
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
            // category prefill
//            $(function () {
//                $.post("<?php echo base_url('buyer/rfq/getCatByType/'); ?>",
//                        {
//                            type: <?php echo $rfqdata['T_Key']; ?>,
//                        },
//                        function (data, status) {
//                            $('#categories').html(data);
//                        });
//            });



            // Category change event
//            $('#categories').change(function () {
//                $.post("<?php echo base_url('buyer/rfq/getSubCatByCat/'); ?>",
//                        {
//                            category: this.value,
//                        },
//                        function (data, status) {
//                            $('#subcategories').html(data);
//                        });
//            });

            // Adding new rows

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