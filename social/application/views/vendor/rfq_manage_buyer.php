<?php
// print_r($vendors);
?>
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
                <?php $this->load->view('vendor/partials/left-nav'); ?>    
                <?php $this->load->view('vendor/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <?php $this->load->view('vendor/partials/searchbar'); ?>
                    <div class="">
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>Manage Buyer </h3>
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
                                                            <div class="table-responsive">
                                                                <table class="table table-striped jambo_table bulk_action">
                                                                    <thead>
                                                                        <tr class="headings">
                                                                            <th> <input type="checkbox" id="check-all" class="flat">
                                                                            </th>
                                                                            <th class="column-title">Name/Company</th>
                                                                            <th class="column-title">Phone</th>
                                                                            <th class="column-title">Email</th>
                                                                            <th class="column-title">Address</th>
                                                                            <th class="bulk-actions" colspan="7"> 
                                                                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a> 
                                                                            </th>
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
                                            </form>
                                            <!-- End SmartWizard Content --> 
                                        </div>
                                    </div>
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

            // Category change event
            $('#categories').change(function () {
                $.post("<?php echo base_url('buyer/rfq/getSubCatByCat/'); ?>",
                        {
                            category: this.value,
                        },
                        function (data, status) {
                            $('#subcategories').html(data);
                        });
            });

            // Adding new rows

            $(document).ready(function () {
                var counter = 2;
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

            // Cities autocomplete
            var cities = [
<?php
foreach ($cities as $key => $city) {
    echo "{ value: '" . $city['City'] . "', data: '" . $city['C_Id'] . "' },";
}
?>
            ];
            $('#city-automplete').autocomplete({lookup: cities});

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
    </body>

</html>