<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IRS | Employer Home</title>
        @include('layouts.css')
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                @include('layouts.employer_sidebar')
                @include('layouts.header')
                <div class="right_col" role="main">
                   <div class="page-title">
                        <div class="title_left">
                            <h3> Employer Home</h3>
                        </div>
                        <div class="title_right">
                            <div class="form-group pull-right top_search">
                                <div class="input-group">
                                    <ol class="breadcrumb">
                                        <li class="active"><i class="fa fa-dashboard"></i> Employer Home</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>


<div class="row">
<div class="col-md-12">
<div class="x_panel">
<div class="x_title">
<h2>Company Registration </h2>

<div class="clearfix"></div>
</div>
<div class="x_content">

<!-- blockquote -->
<div class="col-md-6">
<ul class="checked-ul">
<li>By setting up profilre you would be able to post jobs on diffirent job-boards.</li>
<li>You can recruit through Campus Recuitment process.</li>
<li>You can Save & Edit Jobs.</li>
<li>You can Check Candidate profiles Who had applied on your Posted Jobs.</li>
</ul>
</div>

<div class="col-md-2 col-md-offset-2 profile-btn"> 
                                            <a class="btn btn-lg btn-dark" href="<?php echo url('/employer/company_registration') ?>" style="padding:0px auto; font-size: 20px; margin-top: 100px;">Setup Company Profile </a> 
                                        </div>

<div class="clearfix"></div>


</div>
</div>
</div>
</div>
</div>
</div>




                            </div>

                        </div></div>


                     @include('layouts.footer')
                


        <style>
            .right-float{
                float: right !important
            }
        </style>
        <script>
            // Category change event
           /* $('#categories').change(function () {
                $.post("<?php /*echo url('buyer/rfq/getSubCatByCat/');*/ ?>",
                        {
                            category: this.value,
                        },
                        function (data, status) {
                            $('#subcategories').html(data);
                        });
            });*/
        </script>
        <script>
            // Type change event
            /*$('#filterby').change(function () {
                $.post("<?php /*echo url('buyer/search/getFilterResults/');*/ ?>",
                        {
                            filter: this.value,
                        },
                        function (data, status) {
                            $('#products').html(data);
                        });
            });*/
        </script>
    </body>
@include('layouts.js')
</html>