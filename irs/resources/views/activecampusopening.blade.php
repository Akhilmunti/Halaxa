<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IRS | Active Job Openings
    </title>
    @include('layouts.css')
    <style type="text/css">
label.error:not(.form-control) {
color: #EB5E28;
font-size: 0.8em;
}
</style>
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
                  <h3>Active Campus Recruitement
                  </h3>
                </div>
                <div class="title_right pull-right">
                <span class="input-group-btn">
                   <?php  if (count($ActiveCampusRecruitementdata) > 0) { ?>
                     <button class="btn btn-default pull-right" type="button"  data-toggle="modal" data-target=".bs-example-modal-Campus-Recruitement" style="border-radius: 50px; background-color: #FFF; "><i class="fa fa-search" ></i> Search Go ! </button>
                     <?php } ?>
                   </span>
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
Active Campus Recruitements
</div>
</h2>
                 <div class="clearfix">
                 </div>
               </div>
              
                 <table  class="table table-striped table-bordered">
                   <thead>
                     <tr>
                       <th>Job Title
                       </th>
                       <th>Company
                       </th>
                       <th>Recruiter
                       </th>
                       <th>Posted Date
                       </th>
                       <th>Expiry Date
                       </th>
                       <th>Salary
                       </th>
                     </tr>
                   </thead>
                   <tbody>
                    <?php  if (count($ActiveCampusRecruitementdata) > 0) { ?>
                     <?php $counter = 0; foreach ($ActiveCampusRecruitementdata as $ActiveCampusRecruitement) { ?>
                     <tr>
                       <?php $ContactdetailArray = json_decode($ActiveCampusRecruitement->contact_details,true); 
?>
                       <td>
                         <a href="{{ url('/employer/viewsavedjob/'.$ActiveCampusRecruitement->id.'') }}">
                           <b>
                             <?php echo $ActiveCampusRecruitement->jobtitle?>
                           </b></a>
                           </td>
                       <td>
                         <?php echo $ActiveCampusRecruitement->company?>
                       </td>
                       <td>
                         <?php  echo $ContactdetailArray['name'] ?>
                       </td>
                       <td>
                         <?php $posted = explode(" ", $ActiveCampusRecruitement->postedts); echo $newDateFormat2 = date('d, F Y', strtotime(date($posted[0])));?>
                       </td>
                       <td>
                         <?php $posted = explode(" ", $ActiveCampusRecruitement->expiryts); echo $newDateFormat2 = date('d, F Y', strtotime(date($posted[0])));?>
                       </td>
                       <td>
                         <i class="<?php if($ActiveCampusRecruitement->currency_type == 'INR'){ echo 'fa fa-inr'; }
                                   else if($ActiveCampusRecruitement->currency_type == 'EUR'){ echo 'fa fa-eur'; } 
                                   else if($ActiveCampusRecruitement->currency_type == 'USD'){ echo 'fa fa-usd'; }
                                   else{  echo 'fa fa-jpy'; } ?>">
                           <?php if($ActiveCampusRecruitement->min_salary == 786){
$annualminpkg = 'Less than 5000';
}
else if($ActiveCampusRecruitement->min_salary == 10000000 && $ActiveCampusRecruitement->currency_type == 'INR'){
$annualminpkg = '100,000 & above';
}
else if($ActiveCampusRecruitement->min_salary == 12477){
$annualminpkg = 'Less than 50000';
}
else if($ActiveCampusRecruitement->min_salary == 10000000 && $ActiveCampusRecruitement->currency_type == 'INR'){
$annualminpkg = '100,00,000 & above';
}
else{
$annualminpkg = $ActiveCampusRecruitement->min_salary;
}
echo $annualminpkg; ?></i>
                           </td>
                     </tr>
                     <?php $counter++; }} else{ ?>  
                      <tr class="odd"><td valign="top" colspan="6" class="dataTables_empty">No data available in table</td></tr>
                        <?php } ?>
                   </tbody>
                 </table>
               </div>
               <?php echo $ActiveCampusRecruitementdata->links(); ?> 

</div>
</div>

              </div>
            </div>
          </div>
        </div>


<!-- Save Job modal End-->


<!--Campus-Recruitement modal -->

<div class="modal fade bs-example-modal-Campus-Recruitement" >
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
<h4 class="modal-title">Search</h4>
</div>
<div class="card wizard-card" data-color="orange" id="wizardProfile">
<form action="<?php echo url("/employer/searchactivecampusrecruitement"); ?>" method="post" id="mins" enctype="multipart/form-data" >
<div class="modal-body">
<!-- start form for validation -->
<div class="row">
<div class="col-md-4 form-group" >
<input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
<label for="fullname">Keyword </label>
<input type="text" id="fullname" class="form-control" name="keyword" >
</div>
<div class="col-md-4 form-group">
<label for="Currency">Currency </label>
<select id="Currency" name="Currency" class="form-control select2" onChange="ChangeCurrency();" style="width: 100%;">
<option value="">Select Currency Type</option>
<?php foreach ($Currency as $currency) { ?>
<option value="<?php echo $currency->ccode; ?>" ><?php echo $currency->ccode; ?></option>
<?php } ?>
</select>
</div>
<div class="col-md-4 form-group"> 
<label for="heard">Experience </label>
<select name="exp" id="exp" class="form-control select2" style="width: 100%;">
<option value="">Select Min Exp
</option>
 <option value="0">0</option>
<?php   for( $i = 1; $i<=30; $i++ ) {?>
<option value="<?php echo $i ?>">
  <?php echo $i ?>
</option>
<?php  } ?>                                  
</select>
</div>
</div>
<div class="row">
<div class="col-md-4 form-group">
<label for="Country">Country </label>
<select class="form-control select2" id="country" name="country" onChange="ShowState()" style="width: 100%;" > 
  <option value="">Select Country</option>
  <?php foreach ($Country as $user6) { ?>
  <option value="<?php echo $user6->location_id?>"><?php echo $user6->name?></option>
       <?php } ?>
</select>
</div>
<div class="col-md-4 form-group">
<label for="State">State </label>
<div id="NewState">
<select class="form-control select2" id="state" name="state" onChange="ShowCity()" style="width: 100%;" >
</select></div>

</div>
<div class="col-md-4 form-group"> 
<label for="City">City </label>
<div id="NewCity">
<select class="form-control select2" id="city" name="city"  style="width: 100%;" >
</select></div> 

</div>
</div>
<div class="row">
<div class="col-md-4 form-group">
<label for="email">Expected Pay Package </label>
<select  name="Expectedpckg" class="form-control select2" id="Expectedpckg" style="width: 100%;">   
<option value="">Select Package</option>
</select>
</div>
<div class="col-md-8 form-group">

<label>Employment Type</label>
<br/> 

<input type="radio" class="flat" name="employementtype" id="employementtype" value="" checked="" > All
<input type="radio" class="flat" name="employementtype" id="employementtype" value="1" /> Contract
<input type="radio" class="flat" name="employementtype" id="employementtype" value="2" /> Permanent

</div>
</div>

<!-- end form for validations -->
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-primary" value="Search"/>
</div>
</form>
</div>
</div>
</div>

</div>
<!-- Campus-Recruitement modal End-->
        @include('layouts.footer')       
      </div>
      <!-- ./wrapper -->
      </body>
    @include('layouts.js')
  <!-- page script -->
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
    })
  </script>
<script>
              function ShowState(){
                  var Country = document.getElementById('country').value;
              // console.log(vl);
                    $.ajax({
                      type:"post",
                      url: "<?php echo url("/common/showstateforsearch"); ?>",
                    data:{Country:Country,"_token":'{{csrf_token()}}'},
                    context: document.body
                    }).done(function(msg) {
                    $('#NewState').html(msg);
                    });
              }
              </script>
              <script>
              function ShowCity(){
                  var State = document.getElementById('state').value;
              // console.log(vl);
                    $.ajax({
                      type:"post",
                      url: "<?php echo url("/common/showcityforsearch"); ?>",
                    data:{State:State,"_token":'{{csrf_token()}}'},
                    context: document.body
                    }).done(function(msg) {
                    $('#NewCity').html(msg);
                    });
              }
              </script>
              
<script>
  function ChangeCurrency(){
    var currencytype = document.getElementById('Currency').value;
                  console.log('currencytype: '+currencytype);
                  $(".exptdpckg").remove();
                  if(currencytype=='USD'){
                    var option = "<option class='exptdpckg' value='786'> Less than 5,000 </option>"
                    document.getElementById('Expectedpckg').innerHTML += option;
                    for(var x=5000;x<=100000;x=x+5000){
                      var option = "<option class='exptdpckg' value='"+ x +"'> " + x.toLocaleString() + "</option>"
                      document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    var option = "<option class='exptdpckg' value='10000000'>  100,000 & above </option>"
                    document.getElementById('Expectedpckg').innerHTML += option;
                  }
                  else if(currencytype=='INR'){
                    var option = "<option class='exptdpckg' value='12477'> Less than 50,000 </option>"
                    document.getElementById('Expectedpckg').innerHTML += option;
                    for(var x=50000;x<=100000;x=x+10000){
                      var option = "<option class='exptdpckg' value='"+ x +"'> " + x.toLocaleString() + "</option>"
                      document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for(var y=125000;y<=500000;y=y+25000){
                      var option = "<option class='exptdpckg' value='"+ y +"'> " + y.toLocaleString() + "</option>"
                      document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for(var z=550000;z<=1000000;z=z+50000){
                      var option = "<option class='exptdpckg' value='"+ z +"'> " + z.toLocaleString() + "</option>"
                      document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for(var p=1100000;p<=2000000;p=p+100000){
                      var option = "<option class='exptdpckg' value='"+ p +"'> " + p.toLocaleString() + "</option>"
                      document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for(var q=2250000;q<=4000000;q=q+250000){
                      var option = "<option class='exptdpckg' value='"+ q +"'> " + q.toLocaleString() + "</option>"
                      document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    for(var r=4500000;r<=9500000;r=r+500000){
                      var option = "<option class='exptdpckg' value='"+ r +"'> " + r.toLocaleString() + "</option>"
                      document.getElementById('Expectedpckg').innerHTML += option;
                    }
                    var option = "<option class='exptdpckg' value='10000000'>  100,00,000 & above </option>"
                    document.getElementById('Expectedpckg').innerHTML += option;
                  }
                  else{
                    // ShowMaxAnnualIncome();
                  }
  }
</script>
</html>