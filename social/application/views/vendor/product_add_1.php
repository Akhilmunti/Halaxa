<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('vendor/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/prod/multi.css" rel="stylesheet" type="text/css">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('vendor/partials/left-nav'); ?>    
                <?php $this->load->view('vendor/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Add Product</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Add Product Template</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <?php
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
                                        <form id="productForm" method="POST" action="<?php echo base_url() . "vendor/products/addProduct"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                            <div style="overflow-x: scroll">
                                                <table class="table order-list table-responsive table-bordered" id="mtable">
                                                    <thead>
                                                        <tr>
                                                            <td>Sl No</td>
                                                            <td>Product Name</td>
<!--                                                            <td>Group</td>-->
                                                            <td>Category</td>
                                                            <td>Sub-Category</td>
                                                            <td>Brand</td>
                                                            <td>Description</td>
                                                            <td>Currency</td>
                                                            <td>UOM</td>
                                                            <td>MOQ</td>
                                                            <td>Price</td>
                                                            <td>Tax in %</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="itemsTbody">
                                                        <tr>
                                                            <td><input readonly="" value="1" style="width: 50px" required="" type="text" name="product[1][]" class="form-control"></td>
                                                            <td><input style="width: 100px" required="" type="text" name="product[1][]" class="form-control"></td>
<!--                                                            <td>
                                                                <select style="width : 100px" class="form-control" name="product[1][]" id="types">
                                                                    <option>Select</option>
                                                            <?php
                                                            foreach ($types as $type) {
                                                                echo "<option value='" . $type['T_Id'] . "'>" . $type['Type'] . "</option>";
                                                            }
                                                            ?>
                                                                </select>
                                                            </td>-->
                                                            <td>
                                                                <select style="width : 100px" onchange="check(this)" id="1" name="product[1][]" class="form-control">
                                                                    <option selected="" disabled="">Choose option</option>
                                                                    <?php
                                                                    foreach ($cats as $cat) {
                                                                        echo "<option value='" . $cat['CT_Id'] . "'>" . $cat['Category'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select style="width : 100px" name="product[1][]" id="sub1" class="form-control">
                                                                    <option>Select</option>
                                                                </select>
                                                            </td>
                                                            <td><input style="width: 100px" type="text" name="product[1][]" class="form-control"></td>
                                                            <td><input style="width: 100px" type="text" name="product[1][]" class="form-control"></td>
                                                            <td>
                                                                <select style="width : 100px" class="form-control itemuom" name="product[1][]">
                                                                    <option selected="" disabled="">Choose option</option>
                                                                    <?php
                                                                    foreach ($currencies as $key => $currency) {
                                                                        echo "<option value='" . $currency['currency'] . "'>" . $currency['currency'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select style="width : 100px" class="form-control itemuom" name="product[1][]">
                                                                    <option selected="" disabled="">Choose option</option>
                                                                    <?php
                                                                    foreach ($uoms as $key => $uom) {
                                                                        echo "<option value='" . $uom['Uom'] . "'>" . $uom['Uom'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                            <td><input style="width: 100px" type="text" name="product[1][]" class="form-control"></td>
                                                            <td><input style="width: 100px" type="text" name="product[1][]" class="form-control"></td>
                                                            <td><input style="width: 100px" type="text" name="product[1][]" class="form-control"></td>
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
                                                    <a class="btn btn-success btn-block" href="<?php echo base_url() . "vendor/products/add_new"; ?>"> <i class="glyphicon glyphicon-refresh"></i></a>
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
                                                    <!--<a title="Click to download" href="<?php echo base_url() ?>buyer/rfq/download/<?php echo $file_name; ?>" >Download</a>-->
                                                    <p>Upload Products of requirements in Excel format. <a class="label label-success" href="https://foodlinked.co.in/social_v3/user_files/admin/product_dump.xlsx" download>Download Template</a></p>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group input-file"> 
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info btn-reset" type="submit">Create</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>     
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog"> 
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Detailed Form</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal form-label-left">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label">Manufacturing Date</label>
                                                        <input type="date" class="form-control" placeholder="Enter Name">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label">Expiry Date</label>
                                                        <input type="date" class="form-control" placeholder="Enter Description">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label">Other Description</label>
                                                        <input type="text" class="form-control" placeholder="Enter Description">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label">Availability</label>
                                                        <input type="text" class="form-control" placeholder="Enter Availability">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="countCpoumn" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <!-- jQuery Smart Wizard --> 
        <script src="<?php echo base_url(); ?>assets/vendors/moment/min/moment.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>  
        <!-- iCheck --> 
        <script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script> 
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script src="<?php echo base_url(); ?>assets/prod/multijs.js"></script> 
        <script>
                                                                    document.addEventListener("touchstart", function () {}, true);
        </script>
        <script>
            function check(elem) {
                var id = $(elem).attr("id");
                var cat = $(elem).val();
                var subId = "sub" + id;
                $.post("<?php echo base_url('buyer/rfq/getSubCatByCat/'); ?>",
                        {
                            category: cat,
                        },
                        function (data, status) {
                            $("#" + subId).html(data);
                        });
            }

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

            var countC;
            $('#icol').click(function () {
                if ($('#col').val()) {
                    $('#mtable tr').append($("<td>"));
                    $('#mtable thead tr>td:last').html($('#col').val());
                    var colname = $('#col').val();
                    $('#mtable tbody tr').each(function () {
                        $(this).children('td:last').append($('<input type="text" name="product[' + colname + ']" class="form-control">'))
                    });
                    countC = document.getElementById('mtable').rows[0].cells.length;
                    someFunction(countC);
                } else {
                    alert('Enter Text');
                }
            });
            // For input file styling

            function someFunction(columnCounts) {
                //alert(columnCounts);
                var text = columnCounts;
                if (columnCounts != 0) {
                    jQuery.ajax({
                        url: "<?php echo base_url(); ?>vendor/products/addProductCount",
                        type: "POST",
                        data: {account: text},
                        success: function (data) {
                            // do something
                            alert(data);
                        },
                        error: function (data) {
                            // do something
                            alert("NOOOO");
                        }
                    });
                }
            }

            function deleteLastColumn() {
                $('#mtable tr').find('th:last-child, td:last-child').remove();
            }

            $('#remove').on("click", function () {
                var rowCount = $('#mtable >tbody >tr').length;
                if (rowCount > 1) {
                    $('#mtable tbody tr:last').remove();
                }
            })

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


            $('#countCpoumn').on("click", function () {

                alert(countC);
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
                        cols += '<td><input required="" type="text" class="form-control" name="product[' + counter + '][]"/ value="' + cellValue + '"></td>';
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
                var counter = 2;

<?php
$uoms_out = '<option>Select</option>';
foreach ($uoms as $key => $uom) {
    $uoms_out = $uoms_out . "<option value='" . $uom['Uom'] . "'>" . $uom['Uom'] . "</option>";
}
echo "var uoms_out = \"" . $uoms_out . "\";";

$types_out = '<option>Select</option>';
foreach ($types as $key => $type) {
    $types_out = $types_out . "<option value='" . $type['T_Id'] . "'>" . $type['Type'] . "</option>";
}
echo "var types_out = \"" . $types_out . "\";";

$cats_out = '<option>Select</option>';
foreach ($cats as $key => $cat) {
    $cats_out = $cats_out . "<option value='" . $cat['CT_Id'] . "'>" . $cat['Category'] . "</option>";
}
echo "var cats_out = \"" . $cats_out . "\";";

$scats_out = '<option>Select</option>';
foreach ($scats as $key => $scat) {
    $scats_out = $scats_out . "<option value='" . $scat['SCT_Id'] . "'>" . $scat['Sub_Category'] . "</option>";
}
echo "var scats_out = \"" . $scats_out . "\";";

$curs_out = '<option>Select</option>';
foreach ($currencies as $key => $currency) {
    $curs_out = $curs_out . "<option value='" . $currency['currency'] . "'>" . $currency['currency'] . "</option>";
}
echo "var curs_out = \"" . $curs_out . "\";";
?>
                $("#addrow").on("click", function () {
                    var rowCount = $('#mtable tr').length;
                    var newRow = $("<tr>");
                    var cols = "";
                    cols += '<td><input readonly="" value="' + rowCount + '" style="width: 50px" required="" type="text" class="form-control form-control-alternative" name="product[' + counter + '][]"/></td>';
                    cols += '<td><input required="" type="text" class="form-control" name="product[' + counter + '][]"/></td>';
//                    cols += '<td><select class="form-control" name="product[' + counter + '][]">' + types_out + '</select></td>';
                    cols += '<td><select onchange="check(this)" id="' + counter + '" required="" class="form-control" name="product[' + counter + '][]">' + cats_out + '</select></td>';
                    cols += '<td><select id="sub' + counter + '" required="" class="form-control" name="product[' + counter + '][]">' + scats_out + '</select></td>';
                    cols += '<td><input type="text" class="form-control" name="product[' + counter + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control" name="product[' + counter + '][]"/></td>';
                    cols += '<td><select class="form-control" name="product[' + counter + '][]">' + curs_out + '</select></td>';
                    cols += '<td><select class="form-control" name="product[' + counter + '][]">' + uoms_out + '</select></td>';
                    cols += '<td><input type="text" class="form-control" name="product[' + counter + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control" name="product[' + counter + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control" name="product[' + counter + '][]"/></td>';
                    newRow.append(cols);
                    $("table.order-list").append(newRow);
                    counter++;
                });

                $("table.order-list").on("click", ".ibtnDel", function (event) {
                    $(this).closest("tr").remove();
                    counter -= 1
                });

            });
        </script>

    </body>
</html>