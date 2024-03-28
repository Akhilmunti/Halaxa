<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IRS | Member Availability
    </title>
    <?php echo $__env->make('layouts.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
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
                  <h3>Member Availability
                  </h3>
                </div>
                
              </div>
              <div class="clearfix">
              </div>
              <div class="row">
              <div class="x_panel">
              <div class="x_content">



                <div class="col-md-12 col-sm-12 col-xs-12">
               
                    <div class="x_title">
                     <h2>

<div class="col-md-10">
Member Availability
</div>
</h2>
                      <div class="clearfix">
                      </div>
                    </div>
                      <table  class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Sl No
                            </th>
                            <th>School Name
                            </th>
                            <th>Country
                            </th>
                            <th>City
                            </th>
                            <th>Period From
                            </th>
                            <th>Period To
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                       <?php  if(count($members_availability)>0){ ?>
                          <?php $countrow = 1; foreach ($members_availability as $member) { ?>
                          <tr>

                            <td>
                              <?php echo $countrow; $memberid = $member['P_Id']; $cityid = $member['City'];?>
                                </td>
                            <td>
                             <a style="color: #4285f4; font-style:bold;" href='<?php echo url("/employer/member_availability_candidates/".$memberid."!$!irs!$!".$cityid) ?>'> <?php echo $member['School_name'] ?></a>
                            </td>
                            <td>
                              <?php  echo $member['Country'] ?>
                            </td>
                            <td>
                              <?php  echo $member['City'] ?>
                            </td>
                            <td>
                              <?php  echo $member['Periodfrom'] ?>
                            </td>
                            <td>
                              <?php  echo $member['Periodto'] ?>
                            </td>
        
                          </tr>
                          <?php  $countrow++; }} else{ ?>

                            <tr class="odd"><td valign="top" colspan="6" class="dataTables_empty">No data available in table</td></tr>

                        <?php  }  ?> 
                         
                        </tbody>
                      </table>
                    </div></div></div></div></div></div></div></div></div>

        <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>    
    <?php echo $__env->make('layouts.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  </body>
                  </html>