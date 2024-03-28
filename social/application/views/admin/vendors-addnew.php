<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('admin/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/prod/multi.css" rel="stylesheet" type="text/css">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('admin/partials/left-nav'); ?>    
                <?php $this->load->view('admin/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>Vendor Management</h3>
                                </div
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Add new vendor</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                                                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Settings 1</a> </li>
                                                        <li><a href="#">Settings 2</a> </li>
                                                    </ul>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
<!--                                                <form id="formThree" class="form-horizontal form-label-left" action="<?php echo base_url('admin/vendors/add-new') ?>" method="post">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Vendor Name*: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input value="" id="vendorname" name="vendorname" type="text" class="form-control" placeholder="Vendor Name">
                                                        <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendorname'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Vendor email*: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input value="" id="vendoremail" name="vendoremail" type="text" class="form-control" placeholder="Vendor email">
                                                        <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendoremail'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Vendor phone*: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input value="" id="vendorphone" name="vendorphone" type="text" class="form-control" placeholder="Vendor phone">
                                                        <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendorphone'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Vendor address*: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input value="" id="vendoraddress" name="vendoraddress" type="text" class="form-control" placeholder="Vendor address">
                                                        <span class="form-error-message text-danger"><?php echo $this->session->flashdata('vendoraddress'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                        <button type="reset" class="btn btn-primary">Reset</button>
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                </div>
                                            </form>-->
                                            <form id="productForm" method="POST" action="<?php echo base_url('admin/vendors/add_vendors') ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="control-label">Category*</label>
                                                        <select id="categories" name="categories[]" class="form-control" multiple="">
                                                            <?php
                                                            foreach ($categories as $category) {
                                                                echo "<option value='" . $category['CT_Id'] . "'>" . $category['Category'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="control-label">Sub Category</label>
                                                        <select name="subcategories[]" id="subcategories" class="form-control" multiple="">
                                                            <option>Choose Option</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <div style="overflow-x: scroll">
                                                    <table class="table order-list table-responsive table-bordered" id="mtable">
                                                        <thead>
                                                            <tr>
                                                                <td>Sl No</td>
<!--                                                                <td>Name</td>
                                                                <td>Username</td>
                                                                <td>Password</td>-->
                                                                <td>Company Name</td>
                                                                <td>Company Address</td>
                                                                <td>Company Email</td>
                                                                <td>Mobile/Telephone</td>
                                                                <td>Website</td>
                                                                <td>Contact Person</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="itemsTbody">
                                                            <tr>
                                                                <td><input readonly="" value="1" required="" type="text" name="vendor[1][]" class="form-control"></td>
<!--                                                                <td><input style="width: 100px" required="" type="text" name="vendor[1][]" class="form-control"></td>
                                                                <td><input style="width: 100px" required="" type="text" name="vendor[1][]" class="form-control"></td>
                                                                <td><input style="width: 100px" required="" type="password" name="vendor[1][]" class="form-control"></td>-->
                                                                <td><input required="" type="text" name="vendor[1][]" class="form-control"></td>
                                                                <td><input required="" type="text" name="vendor[1][]" class="form-control"></td>
                                                                <td><input required="" type="email" name="vendor[1][]" class="form-control"></td>
                                                                <td><input required="" type="tel" name="vendor[1][]" class="form-control"></td>
                                                                <td><input required="" type="text" name="vendor[1][]" class="form-control"></td>
                                                                <td><input required="" type="text" name="vendor[1][]" class="form-control"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group-btn">
                                                            <a id="addrow" class="btn btn-success btn-block"> Add Row <i class="glyphicon glyphicon-plus"></i> </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="input-group">
                                                            <div class="input-group-btn">
                                                                <a id="remove" class="btn btn-success btn-block"> Delete Last Row <i class="glyphicon glyphicon-minus"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a class="btn btn-success btn-block" href="<?php echo base_url() . "admin/vendors/add-new"; ?>"> <i class="glyphicon glyphicon-refresh"></i></a>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p>Note: Please make sure column number and column names are similar in your uploading products documents.</p>
                                                        <!-- COMPONENT START -->
                                                        <div class="form-group">
                                                            <div class="input-group"> 
                                                                <input type="file" id="excelfile" class="form-control" placeholder='Choose a file...' />
                                                                <span class="input-group-btn">
                                                                    <input class="btn btn-warning" type="button" id="viewfile" value="Export To Table" onclick="ExportToTable()"></input>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <p>Upload Products of requirements in Excel format. <a class="label label-success" href="http://foodlinked.co.in/social_v3/user_files/admin/vendor_dump.xlsx" download="vendor_dump.xlsx">Download Template</a></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group input-file"> 
                                                            <span class="input-group-btn">
                                                                <button id="submit" class="btn btn-info btn-reset" type="submit">Create</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>   
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
            <?php $this->load->view('admin/partials/footer') ?>
            <!-- /footer content --> 
        </div>
    </div>

    <?php $this->load->view('vendor/partials/assets-footer'); ?>
    <!-- Custom Theme Scripts --> 
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
    <script src="<?php echo base_url(); ?>assets/prod/multijs.js"></script> 
    <script>
                                                                        document.addEventListener("touchstart", function () {}, true);
    </script>
    <script>
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
    </script>
    <script type="text/javascript">
        var selectHtml = "";
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
                                BindTable(exceljson, '#mtable');
                                cnt++;
                            }
                        });
                        $('#mtable').show();
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

        function bindHtmlOptions(cellValue) {
            selectHtml = "";
            var str = cellValue;
            var myarray = str.split(',');
            for (var i = 0; i < myarray.length; i++) {
                console.log(myarray[i]);
                selectHtml += ("<option selected>" + myarray[i] + "</option>");
            }
        }

        function BindTable(jsondata, tableid) {/*Function used to convert the JSON array to Html Table*/
            var columns = BindTableHeader(jsondata, tableid); /*Gets all the column headings of Excel*/
            var counter = 1;
            for (var i = 0; i < jsondata.length; i++) {
                var cols = "";
                var newRow = $("<tr>");
                for (var colIndex = 0; colIndex < columns.length; colIndex++) {
                    var cellValue = jsondata[i][columns[colIndex]];
                    if (cellValue == null)
                        cellValue = "";
                    if (colIndex == 10) {
                        bindHtmlOptions(cellValue);
                        cols += '<td><select multiple="" style="width: 150px" required="" class="form-control" name="vendor[' + counter + '][]">' + selectHtml + '</select></td>';
                    } else {
                        cols += '<td><input required="" type="text" class="form-control" name="vendor[' + counter + '][]"/ value="' + cellValue + '"></td>';
                    }
                }
                newRow.append(cols);
                $("#mtable").append(newRow);
                counter++;
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
<?php
$cats_out = '<option>Select</option>';
foreach ($categories as $key => $cat) {
    $cats_out = $cats_out . "<option value='" . $cat['CT_Id'] . "'>" . $cat['Category'] . "</option>";
}
echo "var cats_out = \"" . $cats_out . "\";";

$scats_out = '<option>Select</option>';
foreach ($scategories as $key => $scat) {
    $scats_out = $scats_out . "<option value='" . $scat['SCT_Id'] . "'>" . $scat['Sub_Category'] . "</option>";
}
echo "var scats_out = \"" . $scats_out . "\";";

$cities_out = '<option>Select City</option>';
foreach ($cities as $city) {
    $cities_out = $cities_out . "<option value='" . $city['City'] . "'>" . $city['City'] . "</option>";
}
echo "var cities_out = \"" . $cities_out . "\";";
?>
            var counter = 2;
            $("#addrow").on("click", function () {
                var rowCount = $('#mtable tr').length;
                var newRow = $("<tr>");
                var cols = "";
                cols += '<td><input readonly=""  value="' + rowCount + '" required="" type="text" name="vendor[' + rowCount + '][]" class="form-control"></td>';
//                cols += '<td><input style="width: 100px" required="" type="text" class="form-control" name="vendor[' + rowCount + '][]"/></td>';
//                cols += '<td><input style="width: 100px" required="" type="text" class="form-control" name="vendor[' + rowCount + '][]"/></td>';
//                cols += '<td><input style="width: 100px" required="" type="password" class="form-control" name="vendor[' + rowCount + '][]"/></td>';
                cols += '<td><input required="" type="text" class="form-control" name="vendor[' + rowCount + '][]"/></td>';
                cols += '<td><input required="" type="text" class="form-control" name="vendor[' + rowCount + '][]"/></td>';
                cols += '<td><input required="" type="email" class="form-control" name="vendor[' + rowCount + '][]"/></td>';
                cols += '<td><input required="" type="tel" class="form-control" name="vendor[' + rowCount + '][]"/></td>';
                cols += '<td><input required="" type="text" class="form-control" name="vendor[' + rowCount + '][]"/></td>';
                cols += '<td><input required="" type="text" class="form-control" name="vendor[' + rowCount + '][]"/></td>';
                //cols += '<td><select multiple="" style="width: 150px" required="" class="form-control" name="vendor[' + rowCount + '][]">' + cities_out + '</select></td>';
                //cols += '<td><input style="width: 150px" class="form-control" name="vendor[' + rowCount + '][]" list="country"><datalist id="country">' + cities_out + '</datalist></td>';
                newRow.append(cols);
                $("table.order-list").append(newRow);
                counter++;
            });
            $("table.order-list").on("click", ".ibtnDel", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        });
        function deleteLastColumn() {
            $('#mtable tr').find('th:last-child, td:last-child').remove();
        }

        $('#remove').on("click", function () {
            var rowCount = $('#mtable >tbody >tr').length;
            if (rowCount > 1) {
                $('#mtable tbody tr:last').remove();
            }
        })
    </script>
    <script>
        $(function () {
            $('#categories').multiselect({
                includeSelectAllOption: true,
                enableCaseInsensitiveFiltering: true,
            });
        });

        $('#categories').change(function () {
            var selectedValues = [];
            $("#categories :selected").each(function () {
                selectedValues.push($(this).val());
            });
            $("#subcategories").multiselect('destroy');
            $.post("<?php echo base_url('vendor/home/getSubCatByMulCat/'); ?>",
                    {
                        category: JSON.stringify(selectedValues),
                    },
                    function (data, status) {
                        $('#subcategories').html(data);
                        $("#subcategories").multiselect({
                            includeSelectAllOption: true,
                            enableCaseInsensitiveFiltering: true,
                        });

                    });
        });
    </script>
</body>

</html>