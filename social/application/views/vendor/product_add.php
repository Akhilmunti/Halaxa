<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('vendor/halaxa_partials/header'); ?>

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('vendor/halaxa_partials/navbar'); ?>

            <div class="wrapper">

                <?php $this->load->view('vendor/halaxa_partials/sidebar'); ?>

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $this->load->view('vendor/halaxa_partials/alerts'); ?>
                            </div>

                            <div class="col-md-12">
                                <form id="productForm" method="POST" action="<?php echo base_url() . "vendor/products/addProduct"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">

                                    <div class="theme-card p-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="theme-header-text">Products Management</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <a class="text-theme no-decoration" href="#" data-toggle="modal" data-target=".modal-items">
                                                <b>Add item</b>
                                                <img class="ml-2" style="margin-top: -3px" height="18" src="<?php echo base_url('assets/halaxa_buyer/images/add-item-icon.png'); ?>" />
                                            </a>

                                            <table id="productsTable" class="table order-list table-striped mt-3">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <p class="jobs-li-place text-justify p-info">
                                                                #
                                                            </p>
                                                        </th>
                                                        <td>
                                                            <p class="jobs-li-place text-justify p-info">
                                                                Product Name
                                                            </p>
                                                        </td>
                                                        <th>
                                                            <p class="jobs-li-place text-justify p-info">
                                                                Catagory
                                                            </p>
                                                        </th>
                                                        <td>
                                                            <p class="jobs-li-place text-justify p-info">
                                                                Sub Catagory
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="jobs-li-place text-justify p-info">
                                                                Brand
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="jobs-li-place text-justify p-info">
                                                                UOM
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="jobs-li-place text-justify p-info">
                                                                Description
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="jobs-li-place text-justify p-info">
                                                                Currency
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="jobs-li-place text-justify p-info">
                                                                MOQ
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="jobs-li-place text-justify p-info">
                                                                Unit Price
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="jobs-li-place text-justify p-info">
                                                                Tax in %
                                                            </p>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </thead>
                                                <tbody  id="itemsTbody"></tbody>
                                            </table>

                                            <h6 class="mt-5">
                                                <b>Import items</b>
                                            </h6>
                                            <p class="p-sm">
                                                <b>
                                                    Note: Please make sure column number and column names are similar in your uploading BOQ documents.
                                                </b>
                                            </p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group input-group-sm mb-3">
                                                        <input type="file" id="excelfile" class="form-control" placeholder='Choose a file...' />
                                                        <div class="input-group-append">
                                                            <input class="btn btn-success text-white" type="button" id="viewfile" value="Import To Table" onclick="ExportToTable()"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <p class="p-sm">
                                                <b>Upload BOQ/List of requirements in Excel format.</b>
                                                <a class="badge badge-success" href="<?php echo base_url('assets/halaxa_buyer/templates/halaxa_items_template.xlsx'); ?>" download>Download Template</a>
                                            </p>
                                        </div>
                                        <hr class="hr-theme">
                                        <div class="text-right">
                                            <button class="btn btn-danger" type="submit">Create</button>
                                        </div>
                                    </div>

                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Item modal -->
        <div class="modal fade modal-items" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content-theme">
                    <div class="modal-header bg-danger">
                        <span class="modal-header-text">Product Basic Information</span>
                    </div>
                    <div class="modal-body">
                        <div class="p-3">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                    Product Name 
                                    <span class="form-required-icon">*</span>
                                </label>
                                <div class="col-md-8">
                                    <input id="item_name" required="" class="form-control form-rounded" type="text" placeholder="Product Name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                    Category
                                    <span class="form-required-icon">*</span>
                                </label>
                                <div class="col-md-8">
                                    <select id="categories" name="categories" required="" class="form-control form-rounded">
                                        <option disabled="" selected="" value="">Select Category</option>
                                        <?php foreach ($cats as $key => $value) { ?>
                                            <option value="<?php echo $value['Category']; ?>"><?php echo $value['Category']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                    Sub Category
                                    <span class="form-required-icon">*</span>
                                </label>
                                <div class="col-md-8">
                                    <select id="subcategories" name="subcategories" required="" class="form-control form-rounded">
                                        <option disabled="" selected="" value="">Select Sub Category</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                    Brand
                                    <span class="form-required-icon">*</span>
                                </label>
                                <div class="col-md-8">
                                    <input id="item_brand" required="" class="form-control form-rounded" type="text" placeholder="Brand" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                    UOM
                                    <span class="form-required-icon">*</span>
                                </label>
                                <div class="col-md-8">
                                    <select id="item_uom" required="" class="form-control form-rounded">
                                        <option value="" selected="" disabled="">Choose option</option>
                                        <?php
                                        foreach ($uoms as $key => $uom) {
                                            echo "<option value='" . $uom['Uom'] . "'>" . $uom['Uom'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                    Description
                                    <span class="form-required-icon">*</span>
                                </label>
                                <div class="col-md-8">
                                    <textarea id="item_details" rows="4" required="" class="form-control form-rounded" type="text" placeholder="Description"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                    Currency
                                    <span class="form-required-icon">*</span>
                                </label>
                                <div class="col-md-8">
                                    <select id="item_currency" required="" class="form-control form-rounded" name="product[1][]">
                                        <option value="" selected="" disabled="">Select Currency</option>
                                        <?php
                                        foreach ($currencies as $key => $currency) {
                                            echo "<option value='" . $currency['currency'] . "'>" . $currency['currency'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                    MOQ
                                    <span class="form-required-icon">*</span>
                                </label>
                                <div class="col-md-8">
                                    <input id="item_moq" required="" class="form-control form-rounded" type="text" placeholder="MOQ" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                    Unit Price
                                    <span class="form-required-icon">*</span>
                                </label>
                                <div class="col-md-8">
                                    <input id="item_price" required="" class="form-control form-rounded" type="number" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                    Tax in %
                                    <span class="form-required-icon">*</span>
                                </label>
                                <div class="col-md-8">
                                    <input max="100" id="item_tax" required="" class="form-control form-rounded" type="number" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="button" class="close" data-dismiss="modal">Cancel</button>
                        <button id="item_action_add" class="btn btn-danger right-float">Add</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery  -->
        <?php $this->load->view('vendor/halaxa_partials/scripts'); ?>

        <script type="text/javascript">

            $('#categories').change(function () {
                $.post("<?php echo base_url('buyer/rfq/getSubCatByCatByName/'); ?>",
                        {
                            category: this.value,
                        },
                        function (data, status) {
                            $('#subcategories').html(data);
                        });
            });

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
                                    BindTable(exceljson, '#productsTable');
                                    cnt++;
                                }
                            });
                            $('#productsTable').show();
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
                var counter = 1;
                for (var i = 0; i < jsondata.length; i++) {
                    var cols = "";
                    var newRow = $("<tr>");
                    for (var colIndex = 0; colIndex < columns.length; colIndex++) {
                        var cellValue = jsondata[i][columns[colIndex]];
                        if (cellValue == null) {
                            cellValue = "";
                        }
                        if (colIndex == "11") {
                            cols += '<td><a class="ibtnDel" href="#"><img height="18" src="<?php echo base_url('assets/halaxa_buyer/images/delete-item-icon.png'); ?>" /></a></td>';
                        } else {
                            cols += '<td><input hidden="" value="' + cellValue + '" type="text" name="product[' + counter + '][]"/><p class="jobs-li-place text-justify p-info">' + cellValue + '</p></td>'
                        }
                    }
                    newRow.append(cols);
                    $("#productsTable").append(newRow);
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
                var counter = 1;
                $('#item_action_add').on('click', function (e) {
                    e.preventDefault();
                    var name = $("#item_name").val();
                    var category = $("#categories").val();
                    var subcategory = $("#subcategories").val();
                    var moq = $("#item_moq").val();
                    var brand = $("#item_brand").val();
                    var details = $("#item_details").val();
                    var uom = $("#item_uom").val();
                    var currency = $("#item_currency").val();
                    var tax = $("#item_tax").val();
                    var price = $("#item_price").val();

                    if (currency == "" || tax == "" || uom == "" || name == "" || category == "" || subcategory == "" || details == "" || moq == "" || price == "") {
                        alert("Fill all the fields.");
                    } else {
                        var rowCount = $('#productsTable tr').length;
                        var count = rowCount;
                        var newRow = $("<tr>");
                        var cols = "";
                        cols += '<td><input hidden="" value="' + count + '" type="text" name="product[' + count + '][]"/><p class="jobs-li-place text-justify p-info">' + count + '</p></td>';
                        cols += '<td><input hidden="" value="' + name + '" type="text" name="product[' + count + '][]"/><p class="jobs-li-place text-justify p-info">' + name + '</p></td>';
                        cols += '<td><input hidden="" value="' + category + '" type="text" name="product[' + count + '][]"/><p class="jobs-li-place text-justify p-info">' + category + '</p></td>';
                        cols += '<td><input hidden="" value="' + subcategory + '" type="text" name="product[' + count + '][]"/><p class="jobs-li-place text-justify p-info">' + subcategory + '</p></td>';
                        cols += '<td><input hidden="" value="' + brand + '" type="text" name="product[' + count + '][]"/><p class="jobs-li-place text-justify p-info">' + brand + '</p></td>';
                        cols += '<td><input hidden="" value="' + uom + '" type="text" name="product[' + count + '][]"/><p class="jobs-li-place text-justify p-info">' + uom + '</p></td>';
                        cols += '<td><input hidden="" value="' + details + '" type="text" name="product[' + count + '][]"/><p class="jobs-li-place text-justify p-info">' + details + '</p></td>';
                        cols += '<td><input hidden="" value="' + currency + '" type="text" name="product[' + count + '][]"/><p class="jobs-li-place text-justify p-info">' + currency + '</p></td>';
                        cols += '<td><input hidden="" value="' + moq + '" type="text" name="product[' + count + '][]"/><p class="jobs-li-place text-justify p-info">' + moq + '</p></td>';
                        cols += '<td><input hidden="" value="' + price + '" type="text" name="product[' + count + '][]"/><p class="jobs-li-place text-justify p-info">' + price + ' ' + currency + '</p></td>';
                        cols += '<td><input hidden="" value="' + tax + '" type="text" name="product[' + count + '][]"/><p class="jobs-li-place text-justify p-info">' + tax + '</p></td>';
                        cols += '<td><a class="ibtnDel" href="#"><img height="18" src="<?php echo base_url('assets/halaxa_buyer/images/delete-item-icon.png'); ?>" /></a></td>'
                        newRow.append(cols);
                        if ($("#productsTable").append(newRow)) {
                            counter++;
                            $("#item_name").val("");
                            $("#item_price").val("");
                            $("#categories").val("");
                            $("#subcategories").val("");
                            $("#item_moq").val("");
                            $("#item_brand").val("");
                            $("#item_details").val("");
                            $("#item_currency").val("");
                            $("#item_tax").val("");
                            $("#item_uom").val("");
                            $('.modal-items').modal('toggle');
                        }
                    }

                });

                $("#productsTable").on("click", ".ibtnDel", function (event) {
                    $(this).closest("tr").remove();
                });

            });
        </script>
    </body>

</html>