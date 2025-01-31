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
        @include('layouts.employer_sidebar')
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

                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                      <div class="icon">
                        <i class="fa fa-caret-square-o-right"></i>
                      </div>
                      <div class="count"><?php echo $savedJobs; ?></div>
                        <h3><a href="<?php echo url('/employer/savedjobposting') ?>">Saved Jobs</a></h3>
                        <p>Jobs which are not finished or posted yet.</p>
                      </div>
                  </div>

                  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                      <div class="icon">
                        <i class="fa fa-sort-amount-desc"></i>
                      </div>
                      <div class="count"><?php echo $ActivePostedJobs; ?></div>
                        <h3><a href="<?php echo url('/employer/activejobopening') ?>">Active Jobs</a></h3>
                        <p>Jobs which have been Posted.</p>
                      </div>
                  </div>


                  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                      <div class="icon">
                        <i class="fa fa-comments-o"></i>
                      </div>
                      <div class="count"><?php echo $Applicants; ?></div>
                        <h3><a href="<?php echo url('/employer/candidateinformation') ?>">Applicants</a></h3>
                        <p>Who applied for the job posted by you.</p>
                      </div>
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
