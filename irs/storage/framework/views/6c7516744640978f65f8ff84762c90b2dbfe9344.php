<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IRS | Job Preferences</title>
     <?php echo $__env->make('layouts.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <style>   
 label.error:not(.form-control) {
  color: #EB5E28;
  font-size: 0.8em;
 }
</style>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container"> 
            <?php echo $__env->make('layouts.jobseeker_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="right_col" role="main" >
               <div class="page-title">
                    <div class="title_left">
                        <h3>Job Preferences</h3>
                    </div>
                    <div class="title_right">
                        <div class="form-group pull-right top_search">
                            <div class="input-group">
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                                    <li class="active">Job Preferences</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Preferences</h2>  
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                         <div class="wizard-container">
                            <div class="card wizard-card" data-color="orange" id="wizardofile">
                                <form action="updatejsprefrence" method="get" id="main"> 
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="">Preferred Job Title </label>

                                                <select class="form-control select2" multiple="multiple" id="jobtitle[]" name="jobtitle[]" data-placeholder="Select Preferred Job Title" style="width: 100%;" >

                                                <option value="">Select Job Title</option>    
                                                <?php foreach ($Jobs_seed_data_Functional_Area as $jobTitleHeading) {  ?>
                                                        
                                                          <optgroup label="<?php echo $jobTitleHeading->value ?>">
                                                            <?php for ($i=0; $i < count($Jobs_RolesBy_Id[$jobTitleHeading->id]); $i++) { ?>
                                                             
                                                            <option value="<?php echo $Jobs_RolesBy_Id[$jobTitleHeading->id][$i]->value ?>" 
                                                            <?php if(count($jobPrefData)>0){ $jobtitleArray = explode(' , ', $jobPrefData[0]->pref_jobtitle);
                                                             for($jobtitle=0;$jobtitle<count($jobtitleArray);$jobtitle++){
                                                                if($jobtitleArray[$jobtitle]==$Jobs_RolesBy_Id[$jobTitleHeading->id][$i]->value ) { echo "Selected"; }
                                                            }} ?> ><?php echo $Jobs_RolesBy_Id[$jobTitleHeading->id][$i]->value ?></option>
                                                          <?php  } ?>
                                                          </optgroup>
                                                      <?php } ?>
                                                </select><label id="jobtitle-error" class="error" for="jobtitle[]"></label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Type of Job </label>
                                                <br/>
                                                <h4><input type="checkbox" class="flat" name="employementtype[]" id="employementtype[]" value="1" <?php if(count($jobPrefData)>0){ $jobtypeArray = explode(',', $jobPrefData[0]->pref_type); for($jobtype=0;$jobtype<count($jobtypeArray);$jobtype++){ if($jobtypeArray[$jobtype]==1) { echo "checked"; } } } ?> > Full Time &nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="checkbox" class="flat" name="employementtype[]" id="employementtype[]" value="2" <?php if(count($jobPrefData)>0){ $jobtypeArray = explode(',', $jobPrefData[0]->pref_type); for($jobtype=0;$jobtype<count($jobtypeArray);$jobtype++){ if($jobtypeArray[$jobtype]==2) { echo "checked"; } } } ?> > 
                                                Part Time &nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="checkbox" class="flat" name="employementtype[]" id="employementtype[]" value="3" <?php if(count($jobPrefData)>0){ $jobtypeArray = explode(',', $jobPrefData[0]->pref_type); for($jobtype=0;$jobtype<count($jobtypeArray);$jobtype++){ if($jobtypeArray[$jobtype]==3) { echo "checked"; } } } ?>  > Internship</h4>
                                                <label id="employementtype-error" class="error" for="employementtype">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>Preferred Locations</h3>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="country">Country  </label>
                                                    <select class="form-control select2" id="country" onChange="ShowState()" style="width: 100%;" > 
                                                        <option value="">Select Country</option>
                                                        <?php foreach ($Country as $user6) { ?>
                                                        <option value="<?php echo $user6->location_id?>"><?php echo $user6->name?></option>
                                                             <?php } ?>
                                                    </select>
                                                    <label id="country-error" class="error" for="country"></label>
                                            </div>
                                            <div class="form-group col-offset-md-1 col-md-3">
                                                <label for="state">State </label>

                                                   <div id="NewState">
                                                    <select class="form-control select2" id="state" name="state" onChange="ShowCity()" style="width: 100%;" >
                                                        
                                                    </select></div> <label id="state-error" class="error" for="state"></label>
            </div> 
                                            <div class="form-group col-offset-md-1 col-md-3">
                                                <label for="City">City  </label>
                                                    <div id="NewCity">
                                                    <select class="form-control select2" id="city" name="city"  style="width: 100%;" >
                                                        
                                                    </select></div>
                                                    <label id="city-error" class="error" for="city"></label>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label for=""> &nbsp;</label>
                                                    <br/>
                                                    <button class="btn btn-success btn-sm" data-toggle="tooltip" title="Add Location!" id="Add_Location" type="button" onclick="addLocation()">
                                                    <i class="fa  fa-plus-circle"></i>
                                                    </button>
                                            </div> 
                                            <div id="location-error" class="col-md-12"></div>
                                                <div class="col-md-12" id="divLocation">
                                              
                                              <?php $Locationdatacounter = 0; foreach ($jobPrefLocationData as $fetchedfromDBprefLocation) { ?>

                                                <span  id="LocationSpan<?php echo $Locationdatacounter ?>" style="margin-right: 5px; margin-bottom: 5px;">
                                               <input type ="button" data-toggle="tooltip" name='locationpreferedbuttonname' title="Remove Location!" class="btn btn-success btn-xs" id="Location<?php echo $Locationdatacounter ?>"   value="<?php echo $countryname[$Locationdatacounter][0]['name'].' - '.$statenames[$Locationdatacounter][0]['name'].' - '.$fetchedfromDBprefLocation->cityname ?>"  onClick = "LocationsRemove('<?php echo $Locationdatacounter ?>')">
                                               <input type ='hidden'  name='locationpreferedwithcity[]' value="<?php echo $fetchedfromDBprefLocation->countryid.','.$fetchedfromDBprefLocation->regionid.','.$fetchedfromDBprefLocation->cityname ?>"></span>
                                              
                                                <?php $Locationdatacounter++;  } ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3>Size of Company <small>(number of employees)</small></h3>
                                            </div>
                                            <div class="col-md-6">
                                                <h3>Package Per Annum</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="">Minimum Employees </label>
                                                    <select name="minemp" id="minemp" class="form-control select2" onchange="showmaxemployee()">
                                                        <option value="">Select Minimum</option>

                                                        <?php   for( $i = 0; $i<=10000; $i=$i+50 ) {?>

                                                        <option value="<?php echo $i ?>"<?php if(count($jobPrefData)>0){ if($i==$jobPrefData[0]->min_emp) { echo "Selected"; } } ?> ><?php echo $i ?></option>
                                                        <?php  } ?>
                                                        <option value="10000 And More"<?php if(count($jobPrefData)>0){ if("10000 And More"==$jobPrefData[0]->min_emp) { echo "Selected"; } } ?> >10000 And More</option>
                                                    </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="city">Maximum Employees </label>
                                                    <select class="form-control select2" name="maxemp" id="maxemp">
                                                        <option value="">Select Maximum</option>

                                                        <?php if(count($jobPrefData)>0){  for( $j = intval($jobPrefData[0]->min_emp)+50; $j<=10000; $j=$j+50 ) { ?>
                                                    <option class="maxemployeecount" value="<?php echo $j ?>" <?php if($j==$jobPrefData[0]->max_emp) echo "Selected" ?> ><?php echo $j ?></option>
                                                        <?php  } ?>
                                                        <option class="maxemployeecount" value="10000 And More"<?php if(count($jobPrefData)>0){ if("10000 And More"==$jobPrefData[0]->max_emp) { echo "Selected"; } } ?> >10000 And More</option>
                                                        <?php  } ?>
                                                    </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                            <label for="AddressLine1">Currency: 
                                
                              </label>
                              <br>
                              <?php foreach ($Currency as $currency) { ?>  
                              <input type="radio" class="flat currency" name="currency" id="currency"  value="<?php echo $currency->ccode; ?>" 
                                     <?php if($currency->ccode=="USD") echo "checked"; ?> style="position: absolute; opacity: 0; top: 0%; left: 0%;  margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px;"/>
                              <?php echo $currency->ccode; ?>
                              <?php } ?>
                                                
                                            </div>
                                                                                   </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="Notice Period">Notice Period </label>
                                                <select name="noticeperiod" id="noticeperiod" class="form-control select2" style="width: 100%;">
                                                        <option value="">Select Notice Period</option>

                                                <option value="10" <?php if(count($jobPrefData)>0){ if( intval($jobPrefData[0]->notice_period)==10){ echo "Selected"; } } ?> >10 days</option>
                                                <option value="20"<?php if(count($jobPrefData)>0){ if( intval($jobPrefData[0]->notice_period)==20){ echo "Selected"; } } ?>>20 days</option>
                                                <option value="30"<?php if(count($jobPrefData)>0){ if( intval($jobPrefData[0]->notice_period)==30){ echo "Selected"; } } ?>>30 days</option>
                                                <option value="45"<?php if(count($jobPrefData)>0){ if( intval($jobPrefData[0]->notice_period)==45){ echo "Selected"; } } ?>>45 days</option>
                                                <option value="90"<?php if(count($jobPrefData)>0){ if( intval($jobPrefData[0]->notice_period)==90){ echo "Selected"; } } ?>>90 days and More</option>                                               
                                            </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Current Package</label>
                                                <select  name="annualminpkg" class="form-control select2" id="annualminpkg">
                                                <option  value="">Select Current Package</option>
                                                    <option  class='minannualincome' value='786'<?php if(count($jobPrefData)>0){ if($jobPrefData[0]->curr_package==786){ echo "Selected"; } } ?> > Less than 5,000 </option>
                                                    <?php  for($x=5000;$x<=100000;$x=$x+5000){ ?>
                                                             <option  class='minannualincome' value='<?php echo $x ?>' <?php if(count($jobPrefData)>0){ if($jobPrefData[0]->curr_package==$x){ echo "Selected"; } } ?> ><?php echo number_format($x) ?></option>
                                                  <?php  } ?>
                                                    <option  class='minannualincome' value='10000000' <?php if(count($jobPrefData)>0){ if($jobPrefData[0]->curr_package==10000000){ echo "Selected"; } } ?> >100,000 & above </option>
                                                </select>
                                                    
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="Preferred Max. age">Expected Package </label>
                                                <select  name="annualmaxpkg" class="form-control select2" id="annualmaxpkg">   
                                                <option value="">Select Expected Package</option>
                                                    <option  class='minannualincome' value='786'<?php if(count($jobPrefData)>0){ if($jobPrefData[0]->expected_package==786){ echo "Selected"; } } ?> > Less than 5,000 </option>
                                                    <?php  for($x=5000;$x<=100000;$x=$x+5000){ ?>
                                                            
                                                             <option  class='minannualincome' value='<?php echo $x ?>' <?php if(count($jobPrefData)>0){ if($jobPrefData[0]->expected_package==$x){ echo "Selected"; } } ?> ><?php echo number_format($x) ?></option>

                                                  <?php  } ?>
                                                    <option  class='minannualincome' value='10000000' <?php if(count($jobPrefData)>0){ if($jobPrefData[0]->expected_package==10000000){ echo "Selected"; } } ?> >100,000 & above </option>
                                                </select>
                                            </div>

                                        </div>
                                                    
                                    </div>
                                    <div class="col-md-12">
                                        <hr/>
                                        <button class="btn btn-success pull-right" type="submit" >Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>       
        </div>
<?php echo $__env->make('layouts.js2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- ./wrapper -->


<!-- <script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script> -->

      
     
<script>
        function LocationsRemove(lenth) {
            $("#LocationSpan" + lenth).remove();
            delete locationarraylocalstorage[lenth];
        }
    </script>
 <script>
              function ShowState(){
                  var Country = document.getElementById('country').value;
              // console.log(vl);
                    $.ajax({
                      type:"post",
                      url: "<?php echo url("/common/showstate"); ?>",
                    data:{Country:Country,"_token":'<?php echo e(csrf_token()); ?>'},
                    context: document.body
                    }).done(function(msg) {
                    $('#NewState').html(msg);
                    });
              }
              </script>
             <script>
                $('input[name="currency"]').on('ifChecked', function() {
                  var currencytype = $("input[name='currency']:checked").val();
                  console.log('currencytype: '+currencytype);
                  $(".minannualincome").remove();
                  $(".maxannualincome").remove();
                  if(currencytype=='USD'){
                    var option = "<option class='minannualincome' value='786'> Less than 5,000 </option>"
                    document.getElementById('annualminpkg').innerHTML += option;
                    document.getElementById('annualmaxpkg').innerHTML += option;
                    for(var x=5000;x<=100000;x=x+5000){
                      var option = "<option class='minannualincome' value='"+ x +"'> " + x.toLocaleString() + "</option>"
                      document.getElementById('annualminpkg').innerHTML += option;
                      document.getElementById('annualmaxpkg').innerHTML += option;
                    }
                    var option = "<option class='minannualincome' value='10000000'>  100,000 & above </option>"
                    document.getElementById('annualminpkg').innerHTML += option;
                    document.getElementById('annualmaxpkg').innerHTML += option;
                  }
                  else if(currencytype=='INR'){
                    var option = "<option class='minannualincome' value='12477'> Less than 50,000 </option>"
                    document.getElementById('annualminpkg').innerHTML += option;
                    document.getElementById('annualmaxpkg').innerHTML += option;
                    for(var x=50000;x<=100000;x=x+10000){
                      var option = "<option class='minannualincome' value='"+ x +"'> " + x.toLocaleString() + "</option>"
                      document.getElementById('annualminpkg').innerHTML += option;
                      document.getElementById('annualmaxpkg').innerHTML += option;
                    }
                    for(var y=125000;y<=500000;y=y+25000){
                      var option = "<option class='minannualincome' value='"+ y +"'> " + y.toLocaleString() + "</option>"
                      document.getElementById('annualminpkg').innerHTML += option;
                      document.getElementById('annualmaxpkg').innerHTML += option;
                    }
                    for(var z=550000;z<=1000000;z=z+50000){
                      var option = "<option class='minannualincome' value='"+ z +"'> " + z.toLocaleString() + "</option>"
                      document.getElementById('annualminpkg').innerHTML += option;
                      document.getElementById('annualmaxpkg').innerHTML += option;
                    }
                    for(var p=1100000;p<=2000000;p=p+100000){
                      var option = "<option class='minannualincome' value='"+ p +"'> " + p.toLocaleString() + "</option>"
                      document.getElementById('annualminpkg').innerHTML += option;
                      document.getElementById('annualmaxpkg').innerHTML += option;
                    }
                    for(var q=2250000;q<=4000000;q=q+250000){
                      var option = "<option class='minannualincome' value='"+ q +"'> " + q.toLocaleString() + "</option>"
                      document.getElementById('annualminpkg').innerHTML += option;
                      document.getElementById('annualmaxpkg').innerHTML += option;
                    }
                    for(var r=4500000;r<=9500000;r=r+500000){
                      var option = "<option class='minannualincome' value='"+ r +"'> " + r.toLocaleString() + "</option>"
                      document.getElementById('annualminpkg').innerHTML += option;
                      document.getElementById('annualmaxpkg').innerHTML += option;
                    }
                    var option = "<option class='minannualincome' value='10000000'>  100,00,000 & above </option>"
                    document.getElementById('annualminpkg').innerHTML += option;
                    document.getElementById('annualmaxpkg').innerHTML += option;
                  }
                  else{
                    // ShowMaxAnnualIncome();
                  }
                });
   </script>
               <script>
              function ShowCity(){
                  var State = document.getElementById('state').value;
              // console.log(vl);
                    $.ajax({
                      type:"post",
                      url: "<?php echo url("/common/showcity"); ?>",
                    data:{State:State,"_token":'<?php echo e(csrf_token()); ?>'},
                    context: document.body
                    }).done(function(msg) {
                    $('#NewCity').html(msg);
                    });
                    document.getElementById('state-error').innerHTML = '';
              }
              </script>
<!-- <script>
$( "#main" ).click(function( event ) {
    var divLocations = document.getElementById('divLocation').innerHTML;
    if(divLocations.trim().length==0){
        console.log('in if divLocations');
        locationerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>Please Select country, State and City and click ADD Button.</b> </div>";
        document.getElementById("location-error").innerHTML = locationerror;
        event.preventDefault(event);
      }
});
</script> -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
</script>
    <script>
    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
</script>
<script>
            function removeerrorcity(){
          document.getElementById('city-error').innerHTML = '';
        }
        </script>
 <script>
              function showmaxemployee(){
             
                var minemply = document.getElementById('minemp').value;
                
                var min = parseInt(minemply);
                //var max = parseInt(res[1])+10000;
                
                //console.log(max);
                $(".maxemployeecount").remove();
                for(var x=min;x<10000;x=x+100){
                    var y=x+100;
                    //console.log(y);
                  var option = "<option class='maxemployeecount' value='" + x + "'>" + x + "</option>"
                  document.getElementById('maxemp').innerHTML += option;   
                 } 
                 var option = "<option class='maxemployeecount' value=' 10000 And More '>10000 And More </option>"
                 document.getElementById('maxemp').innerHTML += option;
              }
</script>
<script>
        var counterLocation = 0;
       
       var locationarraylocalstorage =[];
        function addLocation() {
            document.getElementById("location-error").innerHTML = '';
          locationerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>Please Select country, State and City and click ADD Button.</b> </div>";
              document.getElementById("location-error").innerHTML = locationerror;
           var allLocationSpan = document.getElementsByName('locationpreferedwithcity');
           console.log(allLocationSpan);
            var counterLocation = allLocationSpan.length;
            var btn = document.createElement("span");
            btn.style.marginRight = '5px';
            btn.style.marginBottom = '5px';
            var country = document.getElementById("country");
            var countryVal = country.value;
            var selected_country = country.options[country.selectedIndex].innerHTML;
            var state = document.getElementById("state");
            var stateVal = state.value;
            var selected_state = state.options[state.selectedIndex].innerHTML;
            var city = document.getElementById("city").value;
            console.log(selected_country+" "+selected_state+" "+city);
            if(countryVal.trim().length >0 && stateVal.trim().length>0 && city.trim().length>0){
              document.getElementById("location-error").innerHTML = '';
              var upcommingLocationData = selected_country.concat(' - '+selected_state+' - '+city);
              if(locationarraylocalstorage.length<5){

                    if(locationarraylocalstorage.indexOf(upcommingLocationData)==-1){
                        btn.innerHTML = "<input type ='button' data-toggle='tooltip' name='locationpreferedbuttonname' title='Remove Location!' class='btn btn-success btn-xs' id='Location" + counterLocation + "'  value='" + selected_country + " - " + selected_state + " - " + city + "'  onClick = 'LocationsRemove(" + counterLocation + ")'><input type ='hidden'  name='locationpreferedwithcity[]' value='" + countryVal + "," + stateVal + "," + city + "'>";
                        btn.id = "LocationSpan" + counterLocation;
                        document.getElementById("divLocation").appendChild(btn);
                        locationarraylocalstorage[counterLocation] = upcommingLocationData;
                        console.log('Array of location after update : '+locationarraylocalstorage[counterLocation]);
                        console.log('Array of location after update : '+locationarraylocalstorage);
                        counterLocation++;
                    }else{
                        locationerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>This Location is already added.</b> </div>";
                        document.getElementById("location-error").innerHTML = locationerror;
                    }
              }
              else{
                  locationerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>Max Location Count Exceed.</b> </div>";
                        document.getElementById("location-error").innerHTML = locationerror;
              }
          }
            return false;
        }
    </script>
</body>

</html>
<!-- page script -->
