<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    
        <?php echo $__env->make('halaxatheme.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </head>

    <body>
        <!-- Main -->
        <div class="main">

            <div class="header">
                <?php echo $__env->make('halaxatheme.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

            <div class="wrapper">
                <!-- Sidebar  -->
                <nav id="sidebar">
                    <?php echo $__env->make('halaxatheme.jobseeker_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </nav>

                <div id="content">
                   <?php  
                   //echo $jobPrefData[0]['pref_jobtitle'];
                   //echo '<pre>';
                   //print_r($jobPrefLocationData);
                   
                    $Locationdatacounter = 0; 
                    $locNames = array();
                    $locIds = array();
                    foreach ($jobPrefLocationData as $fetchedfromDBprefLocation) { 
                        $locNames[$Locationdatacounter] = trim($countryname[$Locationdatacounter][0]['name']).' - '.trim($statenames[$Locationdatacounter][0]['name']).' - '.trim($fetchedfromDBprefLocation->cityname);         
                        $locIds[$Locationdatacounter] = $fetchedfromDBprefLocation->countryid.','.$fetchedfromDBprefLocation->regionid.','.$fetchedfromDBprefLocation->cityname;         
                        $Locationdatacounter++;  
                    } 
                    $locationTitles = implode ("&$#", $locNames);
                    $locationIds = implode ("|", $locIds);
                    //echo $locationTitles;
                    //echo $locationIds;
                    if(count($jobPrefData)>0){
                        $titleTokens = str_replace(" ,",",", $jobPrefData[0]['pref_jobtitle']);
                        $titleTokens = str_replace(", ",",", $titleTokens);
                        $currencySlected = $jobPrefData[0]['currency'];
                    }else{
                        $titleTokens = "";
                        $currencySlected = "";
                    }
                    //echo '==============='.$currency;
                   
                   ?>
                    <div class="theme-card">
                        <div id = 'error'>
                            
                        </div>
                        <form action="updatejsprefrence" method="get" id="main">
                            <div class="inner-content">
                                <h5 class="font-bold">Job Preferences</h5>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                    <input type="hidden"  class="form-control form-rounded" name="title_token" id="title_token" value="<?php echo $titleTokens;?>">
                                    <input type="hidden"  class="form-control form-rounded" name="location_title_token" id="location_title_token" value="<?php echo $locationTitles;?>">
                                    <input type="hidden"  class="form-control form-rounded" name="location_id_token" id="location_id_token" value="<?php echo $locationIds;?>">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="clearfix"></div>
                                    <label for="inputEmail3" class="col-md-2 col-form-label">
                                         Preferred Job Title  
                                        <span class="form-required-icon">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <select <?php if(empty($titleTokens)){ echo 'required=""';}?>class="form-control form-rounded" id="new_title" name="new_title" onchange="addTitle()">
                                            <option value="">Select Job Title</option>
                                            <?php foreach ($Jobs_seed_data_Functional_Area as $jobTitleHeading) {  ?>
                                                          <option label="<?php echo $jobTitleHeading->value ?>">
                                                            <?php for ($i=0; $i < count($Jobs_RolesBy_Id[$jobTitleHeading->id]); $i++) { ?>
                                                            <option value="<?php echo $Jobs_RolesBy_Id[$jobTitleHeading->id][$i]->value ?>"><?php echo $Jobs_RolesBy_Id[$jobTitleHeading->id][$i]->value ?></option>
                                                          <?php  } ?>
                                                          </option>
                                                      <?php } ?>
                                        </select>
                                        <i class="fa fa-caret-down"></i>
                                        
                                        <?php /* <select required="" class="form-control form-rounded" multiple="multiple" id="jobtitle[]" name="jobtitle[]">
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
                                        </select>
                                        <i class="fa fa-caret-down"></i> */ ?>
                                    </div>
                                     <div class="col-md-1" style="display:none;">
                                        <a href="#" class="badge-theme no-decoration">
                                            Add <i class="fa fa-times-circle-o"></i>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-10 offset-md-2 mt-3" id="divTitle">
                                       
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Type of job </label>
                                    <div class="col-md-10 mt-2">
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="employementtype[]" id="employementtype[]" value="1" <?php if(count($jobPrefData)>0){ $jobtypeArray = explode(',', $jobPrefData[0]->pref_type); for($jobtype=0;$jobtype<count($jobtypeArray);$jobtype++){ if($jobtypeArray[$jobtype]==1) { echo "checked"; } } } ?>>
                                                <label class="custom-control-label" for="employementtype[]">Full Time</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="employementtype[]" id="employementtype[]" value="2" <?php if(count($jobPrefData)>0){ $jobtypeArray = explode(',', $jobPrefData[0]->pref_type); for($jobtype=0;$jobtype<count($jobtypeArray);$jobtype++){ if($jobtypeArray[$jobtype]==2) { echo "checked"; } } } ?>>
                                                <label class="custom-control-label" for="employementtype[]">Part Time</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="employementtype[]" id="employementtype[]" value="3" <?php if(count($jobPrefData)>0){ $jobtypeArray = explode(',', $jobPrefData[0]->pref_type); for($jobtype=0;$jobtype<count($jobtypeArray);$jobtype++){ if($jobtypeArray[$jobtype]==3) { echo "checked"; } } } ?> >
                                                <label class="custom-control-label" for="employementtype[]">Internship</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <hr class="hr-theme">
                            <div class="inner-content">
                                <h5 class="font-bold">Location</h5>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">
                                        Country, State/Province 
                                        <span class="form-required-icon">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <select <?php if(count($locIds) <= 0){ echo 'required=""';}?> class="form-control form-rounded" id="country" onChange="ShowState()">
                                            <option value="">Select Country</option>
                                                <?php foreach ($Country as $user6) { ?>
                                                    <option value="<?php echo $user6->location_id?>"><?php echo $user6->name?></option>
                                                <?php } ?>
                                        </select>
                                        <i class="fa fa-caret-down"></i>
                                    </div>
                                    <div class="col-md-3">
                                        <div id="NewState">
                                            <select <?php if(count($locIds) <= 0){ echo 'required=""';}?> class="form-control form-rounded" id="state" name="state" onChange="ShowCity()">
                                                <option selected="" value="">Select State/Province</option>
                                            </select>
                                            <i class="fa fa-caret-down"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div id="NewCity">
                                            <select <?php if(count($locIds) <= 0){ echo 'required=""';}?> class="form-control form-rounded" id="city" name="city" onChange="addLocation();">
                                                <option selected="" value="">City/Locality</option>
                                            </select>
                                            <i class="fa fa-caret-down"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-1" style="display:none;">
                                        <a href="#" class="badge-theme no-decoration">
                                            Add <i class="fa fa-times-circle-o"></i>
                                        </a>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    <div class="col-md-10 offset-md-2 mt-3" id="divLocation">
                                        
                                    </div>
                                </div>
                            </div>
                            <hr class="hr-theme">
                            <div class="inner-content">
                                <h5 class="font-bold">Company Size</h5>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">
                                        Minimum Employees
                                    </label>
                                    <div class="col-md-3">
                                        <div class="row mt-3">
                                            <div class="col-sm-12">
                                                <div id="slider-range"></div>
                                            </div>
                                        </div>
                                        <div class="row slider-labels">
                                            <div class="col-6 col-xs-6">
                                                <span class="text-left" id="slider-range-value1"></span>
                                            </div>
                                            <div class="col-6 col-xs-6 text-right">
                                                <span class="text-right" id="slider-range-value2"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="hidden" name="minemp" id="minemp" value="">
                                                <input type="hidden" name="maxemp" id="maxemp" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <label for="inputEmail3" class="col-md-2 col-form-label">
                                        Maximum Employees
                                    </label>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <hr class="hr-theme">
                            <div class="inner-content">
                                <h5 class="font-bold">Package Per annum</h5>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">
                                        Currency 
                                    </label>
                                    <div class="col-md-3">
                                        <select required="" class="form-control form-rounded" name="currency" id="currency">
                                            <option value="">Select Currency Type</option>
                                             <?php foreach ($Currency as $currency) { ?>
                                                <option  value="<?php echo $currency->ccode; ?>" <?php if($currency->ccode== $currencySlected) echo "selected"; ?> ><?php echo $currency->ccode; ?></option>
                                            <?php } ?>
                                        </select>
                                        <i class="fa fa-caret-down"></i>
                                        
                                        <?php /* foreach ($Currency as $currency) { ?>  
                                        <div class="form-check">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="currency" id="currency" <?php if($currency->ccode=="USD") echo "checked"; ?> >
                                                <label class="custom-control-label" for="customCheck"><?php echo $currency->ccode; ?></label>
                                            </div>
                                        </div>
                                      <?php } */ ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">
                                        Current Package 
                                    </label>
                                    <div class="col-md-3">
                                        <select required="" class="form-control form-rounded" name="annualminpkg" id="annualminpkg">
                                            <option selected="" value="">Select Current Package</option>
                                              <option  class='minannualincome' value='786'<?php if(count($jobPrefData)>0){ if($jobPrefData[0]->curr_package==786){ echo "Selected"; } } ?> > Less than 5,000 </option>
                                                    <?php  for($x=5000;$x<=100000;$x=$x+5000){ ?>
                                                             <option  class='minannualincome' value='<?php echo $x ?>' <?php if(count($jobPrefData)>0){ if($jobPrefData[0]->curr_package==$x){ echo "Selected"; } } ?> ><?php echo number_format($x) ?></option>
                                                  <?php  } ?>
                                                    <option  class='minannualincome' value='10000000' <?php if(count($jobPrefData)>0){ if($jobPrefData[0]->curr_package==10000000){ echo "Selected"; } } ?> >100,000 & above </option>
                                        </select>
                                        <i class="fa fa-caret-down"></i>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">
                                        Expected Package 
                                    </label>
                                    <div class="col-md-3">
                                        <select required="" class="form-control form-rounded" name="annualmaxpkg" id="annualmaxpkg">
                                            <option selected="" value="">Select Expected Package</option>
                                            <option  class='minannualincome' value='786'<?php if(count($jobPrefData)>0){ if($jobPrefData[0]->expected_package==786){ echo "Selected"; } } ?> > Less than 5,000 </option>
                                                    <?php  for($x=5000;$x<=100000;$x=$x+5000){ ?>
                                                            
                                                             <option  class='minannualincome' value='<?php echo $x ?>' <?php if(count($jobPrefData)>0){ if($jobPrefData[0]->expected_package==$x){ echo "Selected"; } } ?> ><?php echo number_format($x) ?></option>

                                                  <?php  } ?>
                                                    <option  class='minannualincome' value='10000000' <?php if(count($jobPrefData)>0){ if($jobPrefData[0]->expected_package==10000000){ echo "Selected"; } } ?> >100,000 & above </option>
                                               
                                        </select>
                                        <i class="fa fa-caret-down"></i>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">
                                        Notice Period
                                        <span class="form-required-icon">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <select required="" class="form-control form-rounded" name="noticeperiod" id="noticeperiod">
                                            <option selected="" value="">Select Notice Period</option>
                                            <option value="10" <?php if(count($jobPrefData)>0){ if( intval($jobPrefData[0]->notice_period) == 10){ echo "Selected"; } } ?> >10 days</option>
                                            <option value="20"<?php if(count($jobPrefData)>0){ if( intval($jobPrefData[0]->notice_period) == 20){ echo "Selected"; } } ?>>20 days</option>
                                            <option value="30"<?php if(count($jobPrefData)>0){ if( intval($jobPrefData[0]->notice_period) == 30){ echo "Selected"; } } ?>>30 days</option>
                                            <option value="45"<?php if(count($jobPrefData)>0){ if( intval($jobPrefData[0]->notice_period) == 45){ echo "Selected"; } } ?>>45 days</option>
                                            <option value="90"<?php if(count($jobPrefData)>0){ if( intval($jobPrefData[0]->notice_period) == 90){ echo "Selected"; } } ?>>90 days and More</option>                                               
                                        </select>
                                        <i class="fa fa-caret-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="form-required-icon font-size-14"><i class="fa fa-asterisk"></i></span>
                                <span class="required-text">Required fields</span>
                                <hr class="hr-theme">
                            </div>
                            <div class="inner-footer">
                                <button type="submit" class="btn btn-theme-submit"><i class="fa fa-check mr-2"></i>Update Profile</button>   
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Main -->

        <?php echo $__env->make('halaxatheme.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
        $(document).ready(function(){
            
            displayTitles();
            displayLocations();
        });

    </script>
<script>

    function addLocation() {
        var locTitles = $('#location_title_token').val().split("&$#");
        var locIds = $('#location_id_token').val().split("|");
        var country = document.getElementById("country");
        var countryVal = country.value;
        var selected_country = country.options[country.selectedIndex].innerHTML;
        var state = document.getElementById("state");
        var stateVal = state.value;
        var selected_state = state.options[state.selectedIndex].innerHTML;
        var city = document.getElementById("city").value;
        console.log(selected_country+" "+selected_state+" "+city);
        var nameIs = selected_country.trim() + ' - ' + selected_state.trim() + ' - ' + city.trim();
        if (locTitles.indexOf(nameIs) != -1) {
            //console.log('Laravel is exist!');
            $('#error').html('<div class="alert alert-danger" id="myalertstatus" >Duplicate Locations are not allowed.</div>');
            window.location.hash = '#error';
            $('#myalertstatus').fadeOut(10000);
        }else {
            //alert($.inArray(""+country.value, allLocationSpan));
            var myLocations = $('#location_title_token').val()+"&$#"+ selected_country.trim() + ' - ' + selected_state.trim() + ' - ' + city.trim();
            $('#location_title_token').val(myLocations);
        
            var myLocationIds = $('#location_id_token').val()+"|"+ countryVal +','+ stateVal +','+ city ;
            $('#location_id_token').val(myLocationIds);
            displayLocations();
        }
    }
    
     function displayLocations(){
        $('#divLocation').empty();
        var locTitles = $('#location_title_token').val().split("&$#");
        var locIds = $('#location_id_token').val().split("|");
        
        var btn = document.createElement("span");
        var btn = document.createElement("span");
        btn.style.marginLeft = '5px';
        btn.style.marginBottom = '5px';
        btn.innerHTML = "";
        for(var i = 0; i < locTitles.length; i++){
            var infoTitle = locTitles[i];
            var infoId = locIds[i];
            if(!infoTitle || 0 === infoTitle.length){
                //alert();
            }else{
                btn.innerHTML += '<a href="#" class="badge-theme no-decoration" onClick ="LocationsRemove(' + i + ')">' + infoTitle + '&nbsp;&nbsp;<i class="fa fa-times-circle-o"></i></a><input type ="hidden"  id="locationpreferedwithcity[]" name="locationpreferedwithcity[]" value="'+ infoId +'">';
                btn.id += "LocationSpan" + i;
                document.getElementById("divLocation").appendChild(btn);
            }
        }
        return false;
    }
    
    function LocationsRemove(length){
        var allLocationSpan = $('#location_title_token').val().split("&$#");
        var allLocationIdSpan = $('#location_id_token').val().split("|");
        var autoLocName = [];
        var autoLocId = [];
        for(var i = 0; i < allLocationSpan.length; i++){
            if(length != i){
                autoLocName.push(allLocationSpan[i]);
                autoLocId.push(allLocationIdSpan[i]);
            }
        }
        $('#location_title_token').val(autoLocName.join('&$#'));
        $('#location_id_token').val(autoLocName.join('|'));
        displayLocations();
    }
    
    function addTitle(){
        var allLocationSpan = $('#title_token').val().split(",");
        //alert(titleNames.length);
        var country = document.getElementById("new_title");
        //alert(allLocationSpan.indexOf(country.value.trim()));
        if (allLocationSpan.indexOf(country.value.trim()) != -1) {
            //console.log('Laravel is exist!');
            $('#error').html('<div class="alert alert-danger" id="myalertstatus" >Duplicate Job titles are not allowed.</div>');
            window.location.hash = '#error';
            $('#myalertstatus').fadeOut(10000);
        }else {
            //alert($.inArray(""+country.value, allLocationSpan));
            var allLocationSpan = $('#title_token').val().trim()+","+country.value.trim();
            $('#title_token').val(allLocationSpan);
            displayTitles();
        }
    }
    
    function displayTitles(){
        $('#divTitle').empty();
        var allLocationSpan = $('#title_token').val().split(",");
        var btn = document.createElement("span");
        btn.style.marginLeft = '5px';
        btn.style.marginBottom = '5px';
        btn.innerHTML = "";
        for(var i = 0; i < allLocationSpan.length; i++){
            var selected_title = allLocationSpan[i];
            if(!selected_title || 0 === selected_title.length){
                //alert();
            }else{
                btn.innerHTML += '<a href="#" class="badge-theme no-decoration" onClick ="titleRemove(' + i + ')">' + selected_title + ' &nbsp;&nbsp;<i class="fa fa-times-circle-o"></i></a><input type ="hidden"  id="jobtitle[]" name="jobtitle[]" value="'+ selected_title +'">';
                btn.id += "titleSpan" + i;
                document.getElementById("divTitle").appendChild(btn);
            }
        }
        return false;
    }
    
    function titleRemove(length){
        var allLocationSpan = $('#title_token').val().split(",");
        var favorite = [];
        for(var i = 0; i < allLocationSpan.length; i++){
            if(length != i){
                favorite.push(allLocationSpan[i]);
            }
        }
        $('#title_token').val(favorite.join(','));
        displayTitles();
    }
        
    function ShowState(){
        //alert("---------------");
        var Country = document.getElementById('country').value;
        //console.log(vl);
        $.ajax({
            type:"post",
            url: "<?php echo url("/common/showstate"); ?>",
            data:{Country:Country,"_token":'<?php echo e(csrf_token()); ?>'},
                context: document.body
            }).done(function(msg) {
            //alert(msg);
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
                      url: "<?php echo url("/common/showcityforjp"); ?>",
                    data:{State:State,"_token":'<?php echo e(csrf_token()); ?>'},
                    context: document.body
                    }).done(function(msg) {
                    $('#NewCity').html(msg);
                    });
              }
    
    </script>

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
        // function addLocation() {
            // var allLocationSpan = document.getElementsByName('locationpreferedwithcity');
            // var counterLocation = allLocationSpan.length;
        //     var btn = document.createElement("span");
        //     btn.style.marginLeft = '5px';
        //     //btn.style.marginBottom = '5px';
        //     var country = document.getElementById("country");
        //     var countryVal = country.value;
        //     var selected_country = country.options[country.selectedIndex].innerHTML;
        //     var state = document.getElementById("state");
        //     var stateVal = state.value;
        //     var selected_state = state.options[state.selectedIndex].innerHTML;
        //     console.log(state); console.log(stateVal); console.log(selected_state);
        //     var city = document.getElementById("city").value;
        //     console.log(country+" "+state+" "+city);
        //     btn.innerHTML = "<input type ='button' data-toggle='tooltip' title='Remove Location!' class='btn btn-success btn-xs' name='locationpreferedbuttonname' id='Location" + counterLocation + "'  value='" + selected_country + " - " + selected_state + " - " + city + "'  onClick = 'LocationsRemove(" + counterLocation + ")'><input type ='hidden'  name='locationpreferedwithcity[]' value='" + countryVal + "," + stateVal + "," + city + "'>";
        //     btn.id = "LocationSpan" + counterLocation;
        //     document.getElementById("divLocation").appendChild(btn);
        //     counterLocation++;
        //     return false;
        // }
    
    </script>

    </body>

</html>