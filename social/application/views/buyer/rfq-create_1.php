<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('buyer/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" type="text/css"/>
    </head>
    <body class="nav-md">
        <style type="text/css">
            .multiselect-container {
                width: 100% !important;
            }
        </style>
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('buyer/partials/left-nav'); ?>    
                <?php $this->load->view('buyer/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Create RFQ </h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_content"> 
                                        <?php
                                        $result = $this->session->flashdata('result');
                                        if ($result == NULL) {
                                            $hidealert = "hide";
                                        } else {
                                            $showalert = $result;
                                            $hidealert = "";
                                        }
                                        ?>
                                        <div class="alert alert-success <?php echo $hidealert ?>">
                                            <?php echo $showalert ?>
                                        </div>
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
                                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                                            <label class="control-label">Group</label>
                                                            <select class="form-control" name="types" id="types">
                                                                <option>Select</option>
                                                                <?php
                                                                foreach ($types as $type) {
                                                                    echo "<option value='" . $type['T_Id'] . "'>" . $type['Type'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <span class="form-error-message text-danger"></span>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                                            <label class="control-label">Category</label>
                                                            <select id="categories" name="categories" class="form-control">
                                                                <option>Select</option>
                                                            </select>
                                                            <span class="form-error-message text-danger"></span>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                                            <label class="control-label">Sub Category</label>
                                                            <select name="subcategories" id="subcategories" class="form-control">
                                                                <option>Choose option</option>
                                                            </select>
                                                            <span class="form-error-message text-danger"></span>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                                            <label class="control-label">Start Date</label>
                                                            <input name="startdate" type="text" class="form-control" id="single_cal1" placeholder="First Name" aria-describedby="inputSuccess2Status">
                                                            <span class="form-error-message text-danger"></span>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                                            <label class="control-label">End Date</label>
                                                            <input name="enddate" type="text" class="form-control" id="single_cal2" placeholder="First Name" aria-describedby="inputSuccess2Status">
                                                            <span class="form-error-message text-danger"></span>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                                            <label class="control-label">Country</label>
                                                            <?php
                                                            if (!empty($user->Locations)) {
                                                                $place = $user->Locations;
                                                            } else {
                                                                $place = "";
                                                            }
                                                            ?>
                                                            <input value="<?php echo $place; ?>" class="form-control" name="location" id="loc-automplete" list="country">
                                                            <datalist id="country">
                                                                <option disabled="" selected="">Choose option</option>
                                                                <?php
                                                                foreach ($countries as $loc) {
                                                                    if ($loc['name'] == $user->Locations) {
                                                                        echo "<option selected='' data-value='" . $loc['id'] . "' value='" . $loc['name'] . "'>" . $loc['name'] . "</option>";
                                                                    } else {
                                                                        echo "<option data-value='" . $loc['id'] . "' value='" . $loc['name'] . "'>" . $loc['name'] . "</option>";
                                                                    }
                                                                }
                                                                ?>
                                                            </datalist>
                                                            <span class="form-error-message text-danger"></span>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                                            <label class="control-label">State</label>
                                                            <select name="state" id="state-automplete" class="form-control">
                                                                <option>Choose option</option>
                                                            </select>
                                                            <span class="form-error-message text-danger"></span>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                                            <label class="control-label">City</label>
                                                            <select name="city" id="city-automplete" class="form-control" multiple="">
                                                                <option>Choose option</option>
                                                            </select>
                                                            <span class="form-error-message text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="step-2">
                                                    <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                    <table id="myTable" class="table order-list table-striped">
                                                        <thead>
                                                            <tr>
                                                                <td>Sl No</td>
                                                                <td>Item/Service</td>
                                                                <td>Item Description</td>
                                                                <td>Quantity</td>
                                                                <td>UOM</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="itemsTbody">
                                                            <tr>
                                                                <td><input readonly="" value="1" type="text" name="iteminfo[1][]"  class="form-control"/></td>
                                                                <td>
                                                                    <input class="form-control" name="iteminfo[1][]" list="items">
                                                                    <datalist id="items">
                                                                        <option>Choose option</option>
                                                                        <?php
                                                                        foreach ($items as $key => $item) {
                                                                            echo "<option value='" . $item['Item'] . "'>" . $item['Item'] . "</option>";
                                                                        }
                                                                        ?>
                                                                    </datalist>
                                                                </td>
                                                                <td><input type="text" name="iteminfo[1][]"  class="form-control"/></td>
                                                                <td><input type="text" name="iteminfo[1][]"  class="form-control"/></td>
                                                                <td>
                                                                    <select class="form-control itemuom" name="iteminfo[1][]">
                                                                        <option>Choose option</option>
                                                                        <?php
                                                                        foreach ($uoms as $key => $uom) {
                                                                            echo "<option value='" . $uom['U_Id'] . "'>" . $uom['Uom'] . "</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </td>
                                                                <td><a class="deleteRow"></a></td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="1" style="text-align: left;"><input type="button" class="btn btn-sm btn-dark" id="addrow" value="Add Row" /></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                    <div class="row">
                                                        <div class="col-md-6 col-xs-12">
                                                            <p>Note: Please make sure column number and column names are similar in your uploading BOQ documents.</p>
                                                            <!-- COMPONENT START -->
                                                            <div class="form-group">
                                                                <div class="input-group"> 
                                                                    <input type="file" id="excelfile" class="form-control" placeholder='Choose a file...' />
                                                                    <span class="input-group-btn">
                                                                        <input class="btn btn-warning" type="button" id="viewfile" value="Export To Table" onclick="ExportToTable()"></input>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!--<a title="Click to download" href="<?php echo base_url() ?>buyer/rfq/download/<?php echo $file_name; ?>" >Download</a>-->
                                                            <p>Upload BOQ/List of requirements in Excel format. <a class="label label-success" href="https://foodlinked.co.in/social_v3/user_files/admin/template.xlsx" download>Download Template</a></p>
                                                        </div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <p>Note: If you need to upload more documents (Like terms and conditions, service level agreement and additional conditions etc. ) Please zip all the files and upload</p>
                                                            <div class="form-group">
                                                                <div class="input-group input-file" name="Fichier2"> 
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default btn-choose" type="button">Choose</button>
                                                                    </span>
                                                                    <input type="text" class="form-control" placeholder='Choose a file...' />
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-warning btn-reset" type="button">Reset</button>
                                                                    </span> 
                                                                </div>
                                                            </div>
                                                            <p>Attachments</p>
                                                        </div>
                                                        <div class="col-md-12 col-xs-12">
                                                            <label class="control-label">Delivery Address*</label>
                                                            <select class="form-control" name="deliveryaddress" id="deliveryaddress">
                                                                <option>Choose option</option>
                                                                <?php
                                                                foreach ($addresses as $key => $address) {
                                                                    if ($address['delivery_address'] != "null") {
                                                                        echo "<option value='" . $address['id'] . "'>" . $address['delivery_address'] . "</option>";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                            <span class="form-error-message text-danger"></span>
                                                        </div>
                                                        <!--                                                        <div class="col-md-6">
                                                                                                                    <label class="control-label">Payment Method*</label>
                                                                                                                    <select class="form-control" name="paymentmethod" id="paymentmethod">
                                                                                                                        <option>Choose option</option>
                                                                                                                        <option value="1">Credit</option>
                                                                                                                        <option value="2">Debit</option>
                                                                                                                        <option value="3">Bank Transfer</option>
                                                                                                                        <option value="4">COD</option>
                                                                                                                    </select>
                                                                                                                    <span class="form-error-message text-danger"></span>
                                                                                                                </div>-->
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
                                                            <input id="select_all" type="checkbox" value="1" name="public_rfq"> Share public,make my RFQ visible to all Foodlinked sellers to submit quotes.</input>

                                                            <div class="table-responsive">
                                                                <table class="table table-striped jambo_table bulk_action">
                                                                    <thead>
                                                                        <tr class="headings">
                                                                            <th class="column-title">Action</th>
                                                                            <th class="column-title">Name/Company </th>
<!--                                                                            <th class="column-title">Phone </th>
                                                                            <th class="column-title">Email </th>
                                                                            <th class="column-title">Address </th>-->
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        if (!empty($vendors)) {
                                                                            foreach ($vendors as $key => $vendor) {
                                                                                ?>
                                                                                <tr class="even pointer">
                                                                                    <td class="a-center">
                                                                                        <input type="checkbox" name="vendor_id[]" value="<?= $vendor['User_Id'] ?>" class="checkbox">
                                                                                    </td>
                                                                                    <td class=" "><a target="_blank" href="<?php echo base_url('profile/index/'); ?><?= $vendor['User_Id'] ?>"><?= $vendor['comapany_name'] ?></a></td>
        <!--                                                                                    <td class=" ">
                                                                                    <?php
                                                                                    $vid = $vendor['User_Id'];
                                                                                    $userData = $this->users_model->getUser($vid);
                                                                                    $user = $userData[0];
                                                                                    print_r($user['Phone']);
                                                                                    ?>
                                                                                    </td>
                                                                                    <td class=" ">
                                                                                    <?php
                                                                                    $vid = $vendor['User_Id'];
                                                                                    $userData = $this->users_model->getUser($vid);
                                                                                    $user = $userData[0];
                                                                                    print_r($user['Email']);
                                                                                    ?>
                                                                                    </td>
                                                                                    <td class=" ">
                                                                                    <?php
                                                                                    $vid = $vendor['User_Id'];
                                                                                    $userData = $this->users_model->getUser($vid);
                                                                                    $user = $userData[0];
                                                                                    print_r($user['Address']);
                                                                                    ?>
                                                                                    </td>-->
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>  
        <script src="<?php echo base_url(); ?>assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- iCheck --> 
        <script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script> 
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

        <script>
                                                                            document.addEventListener("touchstart", function () {}, true);
        </script>
        <script>
            function TDate() {
                var UserDate = document.getElementById("userdate").value;
                var ToDate = new Date();

                if (new Date(UserDate).getTime() <= ToDate.getTime()) {
                    alert("The Date must be Bigger or Equal to today date");
                    return false;
                }
                return true;
            }

//            $(function () {
//                $('#city-automplete').multiselect({
//                    includeSelectAllOption: true,
//                    enableCaseInsensitiveFiltering: true,
//                    buttonWidth: '100%'
//                });
//            });

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
        <script>
            $(document).ready(function () {
                var defaultCountry = '<?php echo $country; ?>';
                if (defaultCountry != "") {
                    $.post("<?php echo base_url('buyer/rfq/getStateByCountry/'); ?>",
                            {
                                location: defaultCountry,
                            },
                            function (data, status) {
                                $('#state-automplete').html(data);
                            });
                }
            });
            $('#loc-automplete').change(function () {
                $.post("<?php echo base_url('buyer/rfq/getStateByCountry/'); ?>",
                        {
                            location: this.value,
                        },
                        function (data, status) {
                            $('#state-automplete').html(data);
                        });
            });

            $('#state-automplete').change(function () {
                $.post("<?php echo base_url('buyer/rfq/getCityByState/'); ?>",
                        {
                            state: this.value,
                        },
                        function (data, status) {
                            $('#city-automplete').html(data);
//                            $('#city-automplete').multiselect({
//                                includeSelectAllOption: true,
//                                enableCaseInsensitiveFiltering: true,
//                                buttonWidth: '100%'
//                            });
                        });
            });
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
                    var rowCount = $('#myTable tr').length;
                    var count = rowCount - 1;
                    var newRow = $("<tr>");
                    var cols = "";
                    cols += '<td><input readonly="" value="' + count + '" type="text" name="iteminfo[' + counter + '][]" class="form-control"/> </td>';
                    cols += '<td><input class="form-control" list="items" name="iteminfo[' + counter + '][]" ><datalist id="items"><option>' + items_out + '</option></datalist></td>';
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
        <script type="text/javascript">
            function ExportToTable() {
                $('#itemsTbody tr').remove();
                var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;
                /*Checks whether the file is a valid excel file*/
                if (regex.test($("#excelfile").val().toLowerCase())) {
                    var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/
                    if ($("#excelfile").val().toLowerCase().indexOf(".xlsx") > 0) {
                        xlsxflag = true;
                    }
                    /*Checks whether the browser supports HTML5*/
                    if (typeof (FileReader) != "undefined") {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var data = e.target.result;
                            /*Converts the excel data in to object*/
                            if (xlsxflag) {
                                var workbook = XLSX.read(data, {type: 'binary'});
                            } else {
                                var workbook = XLS.read(data, {type: 'binary'});
                            }
                            /*Gets all the sheetnames of excel in to a variable*/
                            var sheet_name_list = workbook.SheetNames;

                            var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/
                            sheet_name_list.forEach(function (y) { /*Iterate through all sheets*/
                                /*Convert the cell value to Json*/
                                if (xlsxflag) {
                                    var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);
                                } else {
                                    var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);
                                }
                                if (exceljson.length > 0 && cnt == 0) {
                                    BindTable(exceljson, '#myTable');
                                    cnt++;
                                }
                            });
                            $('#myTable').show();
                        }
                        if (xlsxflag) {/*If excel file is .xlsx extension than creates a Array Buffer from excel*/
                            reader.readAsArrayBuffer($("#excelfile")[0].files[0]);
                        } else {
                            reader.readAsBinaryString($("#excelfile")[0].files[0]);
                        }
                    } else {
                        alert("Sorry! Your browser does not support HTML5!");
                    }
                } else {
                    alert("Please upload a valid Excel file!");
                }
            }
            function BindTable(jsondata, tableid) {/*Function used to convert the JSON array to Html Table*/
                var columns = BindTableHeader(jsondata, tableid); /*Gets all the column headings of Excel*/
                var counter = 0;
                for (var i = 0; i < jsondata.length; i++) {
                    counter++;
                    var cols = "";
                    var newRow = $("<tr>");
                    for (var colIndex = 0; colIndex < columns.length; colIndex++) {
                        var cellValue = jsondata[i][columns[colIndex]];
                        if (cellValue == null)
                            cellValue = "";
                        cols += '<td><input type="text" class="form-control" name="iteminfo[' + counter + '][]"/ value="' + cellValue + '"></td>';
                    }
                    newRow.append(cols);
                    $("table.order-list").append(newRow);
                }
            }
            function BindTableHeader(jsondata, tableid) {/*Function used to get all column names from JSON and bind the html table header*/
                var columnSet = [];
                var headerTr$ = $('<tr/>');
                for (var i = 0; i < jsondata.length; i++) {
                    var rowHash = jsondata[i];
                    for (var key in rowHash) {
                        if (rowHash.hasOwnProperty(key)) {
                            if ($.inArray(key, columnSet) == -1) {/*Adding each unique column names to a variable array*/
                                columnSet.push(key);
                                headerTr$.append($('<th/>').html(key));
                            }
                        }
                    }
                }
                //$(tableid).append(headerTr$);
                return columnSet;
            }
        </script>
        <script>
            $(document).ready(function () {

                handleStatusChanged();

            });

            function handleStatusChanged() {
                $('#toggleElement').on('change', function () {
                    toggleStatus();
                });
            }

            function toggleStatus() {
                if ($('#toggleElement').is(':checked')) {
                    $('#elementsToOperateOn :input').attr('disabled', true);
                } else {
                    $('#elementsToOperateOn :input').removeAttr('disabled');
                }
            }

            function myFunction() {
                document.getElementById("vendor_id[]").disabled = true;
            }
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