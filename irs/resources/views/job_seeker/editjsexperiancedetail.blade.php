<div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="editjobseekerexperienceprofile" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                          <h4 class="modal-title" id="myModalLabel">Experience Details</h4>
                    </div>
                        <div class="modal-body">
                            <?php foreach ($jsexperiencedata as $jsexperience) {
                              ?>
                              <div class="row">
                              <div class="form-group col-md-12">
                                  <label for="">Current Position <span class="requerd">* </span></label>
                                  <input class="form-control" id="companyname" value="<?php echo $jsexperience->companyname; ?>" name="companyname" placeholder="Enter Company Name" type="text" required/>
                              </div> </div> 
                            <div class="row">    
                            <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">    
                             <input type = "hidden" name="experienceid" value="<?php echo $jsexperience->id; ?>">                                 
                                <div class="form-group col-md-6">
                                    <label for="">Current Position <span class="requerd">* </span></label>
                                        <select name="currentposition" id="current_position" name="current_position" class="form-control select2" style="width: 100%;" onChange="removeerrorcurrentposition()" required="">
                                        <option value="">Select Position
                                        </option>          
                                        <?php foreach ($Jobs_seed_data_Current_Position as $user1) { ?>
                                        <option value="<?php echo $user1->value?>" <?php if($jsexperience->designation == $user1->value){ echo 'selected';} ?> name="<?php echo $user1->value?>">
                                          <?php echo $user1->value?>
                                        </option>
                                        <?php } ?>
                              </select>
                              <label id="currentposition-error" class="error" for="currentposition"></label>
                            </div>
                                <div class="form-group col-md-6">
                                    <label for="">Employment Type <span class="requerd">* </span></label>
                                        <select  class="form-control select2" id="emplyment_type"  name="emplyment_type"  style="width: 100%;" required>
                                            <option value="">Select</option>
                                            <option value="1" <?php if($jsexperience->employment_type == 1){ echo 'selected';} ?>>Full Time</option>
                                            <option value="2" <?php if($jsexperience->employment_type == 2){ echo 'selected';} ?>>Part Time</option>
                                            <option value="3" <?php if($jsexperience->employment_type == 3){ echo 'selected';} ?>>Internship</option>
                                        </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">About Company <span class="requerd">* </span></label>
                                    <div id="column1" name="column1" style="border: 1px solid; border-color:#d2d6de;">
                                                       <div contenteditable="true" id="editor3" name="editor3">
                                        <textarea id="editor3" name="about_company" class="form-control"  name="" rows="10" cols="80" required><?php echo $jsexperience->about_company; ?></textarea>
                                </div>
    </div>
    </div>
                                <div class="form-group col-md-6">
                                    <label for="">Role Description and Achievements <span class="requerd">* </span></label>
                                    <div id="column2" style="border: 1px solid; border-color:#d2d6de;">
                                                       <div contenteditable="true" id="editor4" >
                                        <textarea id="editor4" name="role_description" class="form-control"  name="" rows="10" cols="80" required><?php echo $jsexperience->role_description; ?></textarea>
                                </div>
                            </div>    
    </div>
    </div>                                                          
                            <div class="row">
                                
                                <div class="form-group col-md-6">
                                    <label for="">Year from <span class="requerd">* </span></label>
                                        <input class="form-control" id="yearfromeditexp" name="yearfrom" placeholder="MM/YYYY" type="text" value="<?php echo $jsexperience->yearfrom; ?>"   required/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Year to <span class="requerd">* </span></label>
                                         <input class="form-control" id="yeartoeditexp" name="yearto" placeholder="MM/YYYY" type="text" value="<?php echo $jsexperience->yearto; ?>"   required/>
                                </div>
                                
    </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Current Package <span class="requerd">* </span></label>
                                        <select  name="current_package"  id="current_package" class="form-control select2" required="" style="width: 100%;">
                                                  <option value="">Select Current Package</option>  
                                            <option value='786'<?php if($jsexperience->package==786){ echo "Selected"; }  ?> > Less than 5,000 </option>
                                            <?php  for($x=5000;$x<=100000;$x=$x+5000){ ?>
                                                     <option value='<?php echo $x ?>' <?php if($jsexperience->package==$x){ echo "Selected"; } ?> ><?php echo number_format($x) ?></option>
                                          <?php  } ?>
                                            <option value='10000000' <?php if($jsexperience->package==10000000){ echo "Selected"; } ?> >100,000 & above </option>
                                        </select>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="">Key Responsibilities <span class="requerd">* </span></label>
                                        <input id="tags_2" name="tags_2" type="text"  value="<?php echo $jsexperience->key_responsibilities; ?>" class=" form-control" required>
                                </div>
                            </div>
                            <div class="row">
                               <div class="form-group col-md-6">
                               <label>Nationality <span class="requerd">* </span></label>
                                <select class="form-control select2" id="Nationality" name="Nationality"  data-placeholder="Select a State" style="width: 100%;" required>
                                    <option value="">Select Nationality</option>
                                  <?php foreach ($Country as $Countrydata) {
                                         ?>
                                        <option value="<?php echo $Countrydata->location_id?>" <?php if($jsexperience->company_nationality == $Countrydata->location_id){ echo "selected"; } ?> ><?php echo $Countrydata->name ?></option>
                                        <?php } ?> 
                                </select>
                                <label id="Nationality-error" class="error" for="Nationality"></label>
                                
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="">Company location <span class="requerd">* </span></label>
                                    <input type="text" name="company_location" value="<?php echo $jsexperience->company_location?>" id="company_location" class="form-control" placeholder="Company Location" required>
                                    <label id="company_location-error" class="error" for="company_location"></label>
                                </div>
                            </div>                 
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class='btn btn-primary add-Experience'> Save</button>
                        <?php  } ?></div></form></div></div>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  }
   )
</script>

<script>
//Experience Details Date Start
var startDate;
var FromEndDate;

// var ToEndDate ;
// ToEndDate.setDate(ToEndDate.getDate()+365);

$('#yearfromeditexp').datepicker({

minViewMode: 1,
autoclose: true,
format: 'mm/yyyy'
})
.on('changeDate', function(selected){
startDate = new Date(selected.date.valueOf());
startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
$('#yeartoeditexp').datepicker('setStartDate', startDate);
}); 
$('#yeartoeditexp')
.datepicker({

minViewMode: 1,
autoclose: true,
format: 'mm/yyyy'
})
.on('changeDate', function(selected){
FromEndDate = new Date(selected.date.valueOf());
FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
$('#yearfromeditexp').datepicker('setEndDate', FromEndDate);
});


//Experience Details Date End 
</script>