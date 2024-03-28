<!-- <div class="Edit Education"> -->
<!-- 1 is edit qualification -->
     <style>
        label.error:not(.form-control) {
        color: #EB5E28;
        font-size: 0.8em;
        }
        </style> 
    <div class="card wizard-card" id="wizardProfile">
        <form action="editjobseekereducationalprofile" method="post" id="">
       <?php foreach ($jsqualificationdata as $jsqualificationforedit) {
        ?>

        <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Educational Details</h4>
        </div>
        <div class="modal-body">
        <h4><b>Edit Educational Qualifications</b>

        </h4><br/>
        
        <div class="row">
        <div class="form-group col-md-4">
            <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="qualificationid" id="qualificationid" value="<?php echo $jsqualificationforedit->id ?> ">
            <label for="">Education Type <span class="requerd">*</span></label>
            <select class="form-control select2" id="type1" name="educationtype1" onChange="ShowCourse(1)" style="width:100%" required >
                                <option value="" <?php if($jsqualificationforedit->education_type==""){ echo "selected";} ?> >Select Type</option>
                                <option value="UG" <?php if($jsqualificationforedit->education_type=="UG"){ echo "selected";} ?> >UG</option>
                                <option value="PG" <?php if($jsqualificationforedit->education_type=="PG"){ echo "selected";} ?> >PG</option>
                                <option value="PPG" <?php if($jsqualificationforedit->education_type=="PPG"){ echo "selected";} ?> >PPG</option>
                                </select>
                                <label id="type1-error" class="error" for="type1"></label> 
        </div> 
        <div class="form-group col-md-4">
            <label for="">Education Courses <span class="requerd">*</span></label>
            <div id="courses1">
                                <select class="form-control select2" name="coursedetail"  id="coursedetail" onChange = "ShowStream(1)" style="width:100%" required>
                                    <option value="">Select Course</option> 
                                    <?php foreach ($coursebytype as $coursetype) { ?>
                                        <option value="<?php echo $coursetype->value ?>" <?php if($jsqualificationforedit->course==$coursetype->value){ echo "selected";} ?> ><?php echo $coursetype->value ?></option>
                                    <?php }  ?>      
                                </select>
                            </div>
                            <label id="coursedetail-error" class="error" for="coursedetail"></label>
        </div>
        <div class="form-group col-md-4">
            <label for="">&nbsp; </label>
            <div id="stream1" >
                                     <select class="form-control select2" id="streamdetail" name="streamdetail" style="width:100%" required>
                                     <option value="">Select Stream</option>
                                      <?php foreach ($streambycoursetype as $streamtype) { ?>
                                        <option value="<?php echo $streamtype->value ?>" <?php if($jsqualificationforedit->specialization==$streamtype->value){ echo "selected";} ?> ><?php echo $streamtype->value ?></option>
                                    <?php }  ?>  
                                     </select>
                                </div>
                                     <label id="streamdetail-error" class="error" for="streamdetail"></label>
        </div> 
        </div> 
        <div class="row after-add-more">
        <div class="form-group col-md-3">
            <label for="">Medium <span class="requerd">* </span></label>
                                <select class="form-control select2" id="medium1" name="medium1"  style="width:100%" required>
                                    <option value="">Select Medium</option>
                                    <option value="Hindi" <?php if($jsqualificationforedit->medium=="Hindi"){ echo "selected";} ?>>Hindi</option>
                                    <option value="English"  <?php if($jsqualificationforedit->medium=="English"){ echo "selected";} ?>>English</option>
                                </select>
                                <label id="medium0-error" class="error" for="medium1"></label>
        </div>
        <div class="form-group col-md-3">
            <label for="">University <span class="requerd">*</span></label>
            <input type="text" class="form-control" id="university1" name="university1" value="<?php echo $jsqualificationforedit->university ?>" placeholder="University" required>
        </div>
        
        <div class="form-group col-md-3">
            <label for="">Year From <span class="requerd">*</span></label>
            <input class="form-control" id="yearfromeditedu" name="yearfrom1" placeholder="MM/YYYY" type="text" value="<?php echo $jsqualificationforedit->year_from ?>"   required/>
        </div>
        <div class=" form-group col-md-3">
            <label for="">Year To <span class="requerd">*</span></label>
            <input class="form-control" id="yeartoeditedu" name="yearto1" placeholder="MM/YYYY" type="text" value="<?php echo $jsqualificationforedit->year_to ?>"   required/>
        </div>
        </div>
        <div class="row">
                            <div class="form-group col-md-4">
                              <label for="country">Country 
                                <span class="requerd">*
                                </span>
                              </label>
                              <select class="form-control select2" id="CountryEditEdu" name="CountryEditEdu" onChange="ShowState('EditEdu')" style="width: 100%;">
                                <option value="">Select Country
                                </option>          
                                <?php foreach ($Country as $user6) { ?>
                                <option value="<?php echo $user6->location_id?>" <?php if($user6->location_id==$jsqualificationforedit->country) echo 'selected'; ?>>
                                  <?php echo $user6->name?>
                                </option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group col-offset-md-1 col-md-4">
                              <label for="state">State 
                                <span class="requerd">*
                                </span>
                              </label>
                              <div id="NewStateEditEdu">
                                <select class="form-control select2" id="stateEditEdu" name="stateEditEdu" onChange="ShowCity('EditEdu')"  style="width: 100%;" required="">
                                    <option value="">Select State</option>
                                    <?php foreach ($state as $statelist) { ?>
                                     <option value="<?php echo $statelist->location_id ?>"  <?php if($statelist->location_id==$jsqualificationforedit->state) echo 'selected'; ?> ><?php echo $statelist->name ?></option>
                                    <?php } ?>
                                </select>
                              </div>
                              <label id="state-error" class="error" for="state">
                              </label>
                            </div>
                            <div class="form-group col-offset-md-1 col-md-4">
                              <label for="City">City 
                                <span class="requerd">*
                                </span>
                              </label>
                              <div id="NewCityEditEdu">
                                <select class="form-control select2" id="city" name="cityEditEdu" style="width: 100%;" >
                                 <option value="">Select City</option>
                                    <?php foreach ($city as $citylist) { ?>
                                     <option value="<?php echo $citylist->name ?>"  <?php if($citylist->name==$jsqualificationforedit->city) echo 'selected'; ?> ><?php echo $citylist->name ?></option>
                                    <?php } ?>
                                </select>
                              </div>
                              <label id="city-error" class="error" for="city">
                              </label>
                            </div>
                          </div>

        <div class="" id="TextBoxContainer">
        </div>
        <div class="modal-footer">
        <button type="submit" class='btn btn-primary add-Education'> Save </button>
   </div></div></div></div>
<?php  } ?></form>
</div>

              <script>
                $(function () {
                  //Initialize Select2 Elements
                  $('.select2').select2()
                }
                 );
             </script>

             <script>
var startDate;
var FromEndDate;

// var ToEndDate ;
// ToEndDate.setDate(ToEndDate.getDate()+365);

$('#yearfromeditedu').datepicker({

minViewMode: 1,
autoclose: true,
format: 'mm/yyyy'
})
.on('changeDate', function(selected){
startDate = new Date(selected.date.valueOf());
startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
$('#yeartoeditedu').datepicker('setStartDate', startDate);
}); 
$('#yeartoeditedu')
.datepicker({

minViewMode: 1,
autoclose: true,
format: 'mm/yyyy'
})
.on('changeDate', function(selected){
FromEndDate = new Date(selected.date.valueOf());
FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
$('#yearfromeditedu').datepicker('setEndDate', FromEndDate);
});


//Educational Details Date End 
</script>