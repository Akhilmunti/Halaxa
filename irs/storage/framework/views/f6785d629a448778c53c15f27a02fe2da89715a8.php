<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IRS | Candidate Available
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
                  <h3>Candidate Available
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
Candidate Available
</div>
</h2>
                      <div class="clearfix">
                      </div>
                    </div>
                      <table  class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Sl #</th>
                            <th>Intern Name</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Period From</th>
                            <th>Period To</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                       <?php  
                       //echo '<pre>';
                       //print_r($members_availability);
                       //exit;
                       if(count($members_availability)>0){  ?> 
                          <?php $countrow = 1; foreach ($members_availability as $member) { 
                          $flag = $member['Flag'];
                          $upflag = $member['Flag'];
                          if($flag == 0){
                             $btncolor = "btn btn-primary";
                             $btnText = "Submit Offer";
                             $upflag = "1";
                          } else if($flag == 1){
                             $btncolor = "btn btn-warning";
                             $btnText = "Withdraw Offer";
                             $upflag = "2";
                          } else if($flag == 2){
                             $btncolor = "btn btn-secondary";
                             $btnText = "ReOffer";
                             $upflag = "3";
                          }else{
                              $btnText = "";
                          }
                          /*print_r($member); echo $EmployerId;*/  ?>
                            <form action="<?php echo url('/employer/postsubmitoffer'); ?>" method="post">
                            <tr>
                            <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" name="School_Id" value ="<?php echo $member['S_Id']; ?>">
                            <input type="hidden" name="Intern_Id" value ="<?php echo $member['Intern_Type']; ?>">
                            <input type="hidden" name="Country" value = "<?php echo $member['Country']; ?>">
                            <input type="hidden" name="City" value ="<?php echo $member['City']; ?>">
                            <input type="hidden" name="Start_Date" value ="<?php echo $member['Periodfrom']; ?>">
                            <input type="hidden" name="End_Date" value ="<?php echo $member['Periodto']; ?>">
                            <input type="hidden" name="Employee_Id" value ="<?php echo $EmployerId; ?>">
                            <input type="hidden" name="up_flag" value ="<?php echo $upflag; ?>">
                            <td>
                              <?php echo $countrow; ?>
                                </td>
                            <td>
                             <?php echo $member['Intern_Name'] ?>
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
                            <td><span class="btn btn-primary"><b><?php if($member['Flag'] == 0 ){ echo 'Pending'; } elseif($member['Flag'] == 1 ){ echo 'Issued'; } elseif($member['Flag'] == 2 ){ echo 'Withdrawn'; } elseif($member['Flag'] == 3 ){ echo 'Reoffered'; }elseif($member['Flag'] == 4 ){ echo ''; } elseif($member['Flag'] == 5 ){ echo 'Accept'; } elseif($member['Flag'] == 6 ){ echo 'Reject'; } else{ echo ''; } ?></b></span></span></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#<?php echo "view_model_" . $member['P_Id']; ?>"><button type="submit" class="btn btn-success" value="Submit Offer">View Offer</button></a>
                                <?php 
                                if($btnText){?>
                                    <input type="submit" class="<?php echo $btncolor;?>" value="<?php echo $btnText;?>" />
                                <?php }
                                ?>
                            </td>
                        </form>
                          </tr>
                          <?php  }} else{ ?>
                            <tr class="odd"><td valign="top" colspan="6" class="dataTables_empty">No data available in table</td></tr>
                        <?php  }  ?> 
                         
                        </tbody>
                      </table>
                    </div>
                    </div>
                    </div>
                    <?php 
                    //echo '<pre>';
                    //print_r($members_availability);
                    foreach($members_availability as $ma){?>
                            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" id="<?php echo "view_model_" . $ma['P_Id']; ?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel2">Offer Details</h4>
                                        </div>
                                        <div class="modal-body">
                                             <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="x_panel">
                                                        <div class="x_content">
                                                            <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                <div class="row">
                                                                    <div class="col-md-6"> 
                                                                        <div class="panel-body">
                                                                            <table class="table table-striped">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th scope="row">Intern Name</th>
                                                                                        <td><?php echo $ma['Intern_Name'];?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">School Name</th>
                                                                                        <td><?php echo "";?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Country</th>
                                                                                        <td><?php echo $ma['Country'];?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">City</th>
                                                                                        <td><?php echo $ma['City'];?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Period From</th>
                                                                                        <td><?php echo $ma['Periodfrom'];?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Period To</th>
                                                                                        <td><?php echo $ma['Periodto'];?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Property Name</th>
                                                                                        <td><?php echo $ma['Periodto'];?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Overview/Notes</th>
                                                                                        <td><?php echo "";?></td>
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
                                        <div class="modal-footer">
                                            <a href="<?php echo url('employer/activejobopening') ?>"><button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times">Close</i></button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>    
    <?php echo $__env->make('layouts.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  </body>
                  </html>