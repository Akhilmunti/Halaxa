<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('social/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('social/partials/left-nav-profile'); ?>    
                <?php $this->load->view('social/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Profile Details</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <a style="font-size: 25px">Recruiter Details</a>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <table class="table-striped table table-responsive">
                                                            <tbody>
                                                                <?php if ($user->Company_name) {
                                                                        ?>
                                                                        <tr>
                                                                            <td>Name : <?php echo $user->Company_name; ?></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                <tr>
                                                                    <td>
                                                                        Company Type : 
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Pincode  : 
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <table class="table-striped table table-responsive">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Website : 
                                                                </tr> 
                                                                <tr>
                                                                    <td>Address : 
                                                                </tr>
                                                                <tr>
                                                                    <td>About Company : 
                                                                </tr>
                                                            </tbody>
                                                        </table> 
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
                    <div class="clearfix"></div>

                </div>
                <!-- footer content -->
                <?php $this->load->view('buyer/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>
    </div>

    <?php $this->load->view('social/partials/assets-footer'); ?>

    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Custom Theme Scripts --> 
    <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script>
    <script>
        document.addEventListener("touchstart", function () {}, true);
    </script>
    <style>
        .hide{
            visibility: collapse;
        }
    </style>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function () {
            readURL(this);
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
    <script>
        $(function () {
            $('#categories').multiselect({
                includeSelectAllOption: true
            });
        });

        $('#categories').change(function () {
            var selectedValues = [];
            $("#categories :selected").each(function () {
                selectedValues.push($(this).val());
            });

            $.post("<?php echo base_url('vendor/home/getSubCatByMulCat/'); ?>",
                    {
                        category: JSON.stringify(selectedValues),
                    },
                    function (data, status) {
                        $('#subcategories').html(data);
                    });
        });
    </script>
</body>

</html>