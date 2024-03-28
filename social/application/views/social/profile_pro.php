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
                                    <div class="panel-group">

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a style="font-size: 25px">Personal Details</a>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="collapse1" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <?php if ($user->Company_name) {
                                                                        ?>
                                                                        <tr>
                                                                            <td>Name : <?php echo $user->Name; ?></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                    <?php if ($user->Company_brief) {
                                                                        ?>
                                                                        <tr>
                                                                            <td>Marital Status: No Data
                                                                        </tr>
                                                                    <?php } ?>
                                                                    <?php if ($user->category) {
                                                                        ?>
                                                                        <tr>
                                                                            <td>
                                                                                Nationality : No Data
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                    <tr>
                                                                        <td>
                                                                            Personal Breif : No Data
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Website/Link : No Data
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            CV : No Data
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <?php if ($user->Email) {
                                                                        ?>
                                                                        <tr>
                                                                            <td>Email : <?php echo $user->Email; ?></td>
                                                                        </tr>
                                                                    <?php } ?>

                                                                    <tr>
                                                                        <td>DOB : No Data
                                                                    </tr>   
                                                                    <tr>
                                                                        <td>Gender : Male
                                                                    </tr> 
                                                                    <tr>
                                                                        <td>Current Address : NO Data
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Show to employer only : NO
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a style="font-size: 25px">Educational Details</a>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="collapse2" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            Education Type : PG
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Medium : English
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            University : Bangalore
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Country : India
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Courses : Masters
                                                                    </tr>   
                                                                    <tr>
                                                                        <td>Year : 11/2019 – 03/2019
                                                                    </tr> 
                                                                    <tr>
                                                                        <td>Stream : Tourism and Travel Management
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Country : Bengaluru South
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a style="font-size: 25px">Experience Details</a>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="collapse2" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            Current Position : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Employment Type : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            About Company  : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Role Description and Achievements : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Year from :
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Year to : 
                                                                    </tr> 
                                                                    <tr>
                                                                        <td>Current Package : 
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Key Responsibilities : 
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Nationality : 
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Company location : 
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a style="font-size: 25px">Project Details</a>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="collapse2" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            Project Title : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Team Size : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            About Project  : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Duration From : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Duration To :
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Client Name : 
                                                                    </tr> 
                                                                    <tr>
                                                                        <td>Project Loctaion : 
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Skills Used : 
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Role : 
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a style="font-size: 25px">Certificate Details</a>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="collapse2" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            Certificate Name : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            License No : 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            From Date  : 
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table> 
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table-striped table table-responsive">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Certificate Authorization : 
                                                                    </tr> 
                                                                    <tr>
                                                                        <td>Certificate URL : 
                                                                    </tr>
                                                                    <tr>
                                                                        <td>To Date : 
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