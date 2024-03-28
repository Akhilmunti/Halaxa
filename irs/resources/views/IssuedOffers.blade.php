<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IRS | Issued Offers
    </title>
    @include('layouts.css')
    
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container"> 
        @include('layouts.employer_sidebar')
        @include('layouts.header')
        <div class="right_col" role="main" >
          <div class="">
            <div class="">
              <div class="page-title">
                <div class="title_left">
                  <h3>Issued Offers
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
Issued Offers
</div>
</h2>
                      <div class="clearfix">
                      </div>
                    </div>
                      <table  class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Sr. #
                            </th>
                            <th>Intern Name
                            </th>
                            <th>Country
                            </th>
                            <th>City
                            </th>
                            <th>Period From
                            </th>
                            <th>Period To
                            </th>
                            <th>Status
                            </th>
                            <th>Action
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  if(count($issued_offerdata)>0){  ?>
                          <?php $countparameter = 1; foreach ($issued_offerdata as $issued_offer_data) {  ?>
                           <tr>

                            <input type="hidden" name="Employee_Id" id="Employee_Id<?php echo $countparameter; ?>" value = "<?php echo $issued_offer_data['Employee_Id']; ?>">
                            <input type="hidden" name="School_Id" id="School_Id<?php echo $countparameter; ?>"  value = "<?php echo $issued_offer_data['School_Id']; ?>">
                            <input type="hidden" name="Intern_Id" id="Intern_Id<?php echo $countparameter; ?>"  value = "<?php echo $issued_offer_data['Intern_Id']; ?>">
                            <input type="hidden" name="Country" id="Country<?php echo $countparameter; ?>"  value = "<?php echo $issued_offer_data['Country']; ?>">
                            <input type="hidden" name="City" id="City<?php echo $countparameter; ?>"  value = "<?php echo $issued_offer_data['City']; ?>">
                            <input type="hidden" name="Start_Date" id="Start_Date<?php echo $countparameter; ?>"  value = "<?php echo $issued_offer_data['Start_Date']; ?>">
                            <input type="hidden" name="End_Date" id="End_Date<?php echo $countparameter; ?>"  value = "<?php echo $issued_offer_data['End_Date']; ?>">
                            
                            <td><?php echo $countparameter; ?></td>
                            <td><?php echo $issued_offer_data['Intern_Id']; ?></td>
                            <td><?php echo $issued_offer_data['Country']; ?></td>
                            <td><?php echo $issued_offer_data['City']; ?></td>
                            <td><?php echo $issued_offer_data['Start_Date']; ?></td>
                            <td><?php echo $issued_offer_data['End_Date']; ?></td>
                            <td>
                              <?php  if($issued_offer_data['Flag'] == 0 ){ echo 'Pending'; } elseif($issued_offer_data['Flag'] == 1 ){ echo 'Issued'; } elseif($issued_offer_data['Flag'] == 2 ){ echo 'Withdrawn'; } elseif($issued_offer_data['Flag'] == 3 ){ echo 'Reoffered'; } else{ echo ''; } ?>
                                
                              </td>
                            <td>
                            
                              <input type="button" class="btn-primary" value="withdraw" data-toggle="modal" data-target=".bs-withdraw-modal-sm" onclick="getwithdrawmodel(<?php echo $countparameter; ?>);" />
                           
                              <input type="button" class="btn-success" value="Re-Offer" data-toggle="modal" data-target=".bs-re-offer-modal-sm" onclick="getreoffermodel(<?php echo $countparameter; ?>);" />
                            
                          </td>
                          </tr>
                         <?php $countparameter++; } } else{ ?>

                            <tr class="odd"><td valign="top" colspan="6" class="dataTables_empty">No data available in table</td></tr>
                            
                        <?php  }  ?> 
                          
                        </tbody>
                      </table>
                    </div></div></div></div></div></div></div></div></div>

                    <div class="modal fade bs-withdraw-modal-sm" tabindex="-1" role="dialog" id="withdrawmodelwithdata" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    </div>


                  <div class="modal fade bs-re-offer-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" id="reoffermodelwithdata">
                    
                  </div>

        @include('layouts.footer')    
    @include('layouts.js')

    <script>
      function getwithdrawmodel(op_type){
        var Employee_Id = document.getElementById('Employee_Id'+op_type).value;
        var School_Id = document.getElementById('School_Id'+op_type).value;
        var Intern_Id = document.getElementById('Intern_Id'+op_type).value;
        var Country = document.getElementById('Country'+op_type).value;
        var City = document.getElementById('City'+op_type).value;
        var Start_Date = document.getElementById('Start_Date'+op_type).value;
        var End_Date = document.getElementById('End_Date'+op_type).value;
        //alert(typeofeducation); 
        $.ajax({
          type:"post",
          url: "<?php echo url("/common/showwithdrawmodel"); ?>",
          data:{
          Employee_Id:Employee_Id,School_Id:School_Id,Intern_Id:Intern_Id,Country:Country,City:City,Start_Date:Start_Date,End_Date:End_Date,op_type:op_type,"_token":'{{csrf_token()}}'}
               ,
               context: document.body
               }
              ).done(function(msg) {

          $('#withdrawmodelwithdata').html(msg);
        }
                    );
      }
    </script>
    <script>
      function getreoffermodel(op_type){
        var Employee_Id = document.getElementById('Employee_Id'+op_type).value;
        var School_Id = document.getElementById('School_Id'+op_type).value;
        var Intern_Id = document.getElementById('Intern_Id'+op_type).value;
        var Country = document.getElementById('Country'+op_type).value;
        var City = document.getElementById('City'+op_type).value;
        var Start_Date = document.getElementById('Start_Date'+op_type).value;
        var End_Date = document.getElementById('End_Date'+op_type).value;
        //alert(typeofeducation); 
        $.ajax({
          type:"post",
          url: "<?php echo url("/common/showreoffermodel"); ?>",
          data:{
          Employee_Id:Employee_Id,School_Id:School_Id,Intern_Id:Intern_Id,Country:Country,City:City,Start_Date:Start_Date,End_Date:End_Date,op_type:op_type,"_token":'{{csrf_token()}}'}
               ,
               context: document.body
               }
              ).done(function(msg) {

          $('#reoffermodelwithdata').html(msg);
        }
                    );
      }
    </script>
                  </body>
                  </html>