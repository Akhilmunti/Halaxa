<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IRS | Employer Dashboard</title>
  @include('layouts.css')
</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">    
       @include('layouts.jobseeker_sidebar')
        @include('layouts.header')
  <!-- Content Wrapper. Contains page content -->
  <div  class="right_col" role="main">
    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-md-2">
            <h1>Dashboard</h1>
          </div>
          <div class="pull-right">
            <ol class="breadcrumb ">
              <li class=""><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol>
          </div> 
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="x_content">
              <div class="row">
              
                @if(Session::has('message'))
                  <div class="col-md-12">
                <p class="alert {{ Session::get('alert-class', 'alert-danger alert-dismissible') }}" id="myalertstatus">{{ Session::get('message') }}</p>
                </div>
                @endif

                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                      <div class="icon">
                        <i class="fa fa-caret-square-o-right"></i>
                      </div>
                      <div class="count"><?php echo $appliedjobcount ?></div>
                        <h3><a href="<?php echo url('job_seeker/job_history') ?>">Applied Jobs</a></h3>
                        <p>Jobs, For which you have applied.</p>
                      </div>
                  </div>

                  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                      <div class="icon">
                        <i class="fa fa-sort-amount-desc"></i>
                      </div>
                      <div class="count"><?php echo $recommendedjobcount; ?></div>
                        <h3><a href="<?php echo url('job_seeker/apply_job') ?>">Recommended Jobs</a></h3>
                        <p>Jobs Where you didn't applied yet.</p>
                      </div>
                  </div>


                  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                      <div class="icon">
                        <i class="fa fa-hourglass-end"></i>
                      </div>
                      <div class="count"> &nbsp; </div>
                        <h3><a href="<?php echo url('job_seeker/job_preferences') ?>">Job Preference</a></h3>
                        <p>Preferred Requirements in job.</p>
                      </div>
                  </div>

              </div>
            </div>
          </div>

          </section>
          
</div>

  @include('layouts.footer')
</div>

</div>

  <!-- /.main-container -->
</body>
@include('layouts.js')

</html>
