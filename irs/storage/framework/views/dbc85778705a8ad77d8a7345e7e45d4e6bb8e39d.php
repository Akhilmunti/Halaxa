<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IRS | Candidate Application</title>
        <?php echo $__env->make('layouts.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .checked {
                color: orange;
            }
        </style>
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container"> 

                <?php echo $__env->make('layouts.employer_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="right_col" role="main" >
                    <div class="">
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3> Candidate Application</h3>
                                </div>

                                <div class="title_right">
                                    <div class="form-group pull-right top_search">
                                        <div class="input-group">
                                            <ol class="breadcrumb">
                                                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                                                <li class="active">Assesment and Video Interview</li>
                                            </ol></div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Video Interview </h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <p>Please go premium to use this feature</p>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                    <input type='button' class='btn btn-previous btn-primary btn-wd' name='previous' value='Upgrade to the Premium Account' />
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><?php //echo $CandidateAppliedForJobs->links();  ?> 
                            </div>

                        </div>
                    </div>
                </div>
                <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>       
            </div>
            <!-- ./wrapper -->
    </body>
    <?php echo $__env->make('layouts.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</html>
<script>
    // Not essential functionality - for demonstration purposes only
    $(document).on('change', '[type=radio]', function (e) {
        // Update display of the currently selected value whenever it's changed
        if ($(this).is(':checked')) {
            $('#display_selected').text($(this).val());
        }
    }).ready(function () {
        // Display the initial selected value (should be zero)
        $('input').trigger('change');
    });
</script>
<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
