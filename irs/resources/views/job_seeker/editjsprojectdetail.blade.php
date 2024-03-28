      <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="editjobseekerprojectdetails" method="post" id="projectdetail">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="">Project Details
            </h4>
          </div>
          <div class="modal-body">
            <?php foreach ($jsprojectdata as $jsproject) { 
           ?>
            <div class="row">    
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
              <input type="hidden" name="projectid" value="<?php echo $jsproject->id; ?>">                                     
              <div class="form-group col-md-6">
                <label for="">Project Title 
                  <span class="requerd">* 
                  </span>
                </label>
                <input type="text" class="form-control"  name="project_title"  value="<?php echo $jsproject->project_title; ?>" id="project_title" placeholder="Project Title" required>
              </div>
              <div class="form-group col-md-6">
                <label for="">Client Name 
                  <span class="requerd">* 
                  </span>
                </label>
                <input type="text" class="form-control" id="client_name" value="<?php echo $jsproject->client_name; ?>" name="client_name" placeholder="Clint Name" required>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">Team Size 
                  <span class="requerd">* 
                  </span>
                </label>
                <input type="text" name="team_size" value="<?php echo $jsproject->team_size; ?>" onkeypress="return isNumberKey(event,this.id)"  id="team_size" class="form-control" placeholder="Team Size" required>
              </div>
              <div class="form-group col-md-6">
                <label for="">Project Loctaion 
                  <span class="requerd">* 
                  </span>
                </label>
                <input type="text" name="project_locat" value="<?php echo $jsproject->project_location; ?>" id="project_locat" class="form-control" placeholder="Project Loctaion" required>
              </div>  
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">About Project 
                  <span class="requerd">* 
                  </span>
                </label>
                <textarea id="editor5" name="project_abtprjct" class="form-control" required><?php echo $jsproject->project_details; ?>
                </textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="">Skills Used 
                  <span class="requerd">* 
                  </span>
                </label>
                <textarea id="editor6" name="project_skilsused" class="form-control" required><?php echo $jsproject->skills_used; ?>
                </textarea>
              </div>
            </div>  
            <div class="row">
              <?php $projectduration = explode(' - ', $jsproject->duration) ?>
              
              <div class="form-group col-md-3">
                <label for="">Duration From
                  <span class="requerd">* 
                  </span>
                </label>
                <input class="form-control" id="yearfromeditpro" name="duration_from" placeholder="MM/YYYY" type="text" value="<?php echo $projectduration[1]; ?>"   required/>
              </div>
              <div class="form-group col-md-3">
                <label for="">Duration To
                  <span class="requerd">* 
                  </span>
                </label>
                 <input class="form-control" id="yeartoeditpro" name="duration_to" placeholder="MM/YYYY" type="text"  value="<?php echo $projectduration[0]; ?>"   required/>
              </div>
              <div class="form-group col-md-6">
                <label for="">Role  <span class="requerd">* 
                  </span>
                </label>
                <input type="text" name="role" id="role" value="<?php echo $jsproject->role; ?>" class="form-control " placeholder="Role" required>
              </div>
            </div>
          <?php } ?>
          </div>
          <div class="modal-footer">
            <button type="submit" class='btn btn-primary edit-Project'> Save
            </button>
          </div></form></div></div>


<script>
//project Details Date Start
var startDate;
var FromEndDate;

// var ToEndDate ;
// ToEndDate.setDate(ToEndDate.getDate()+365);

$('#yearfromeditpro').datepicker({

minViewMode: 1,
autoclose: true,
format: 'mm/yyyy'
})
.on('changeDate', function(selected){
startDate = new Date(selected.date.valueOf());
startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
$('#yeartoeditpro').datepicker('setStartDate', startDate);
}); 
$('#yeartoeditpro')
.datepicker({

minViewMode: 1,
autoclose: true,
format: 'mm/yyyy'
})
.on('changeDate', function(selected){
FromEndDate = new Date(selected.date.valueOf());
FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
$('#yearfromeditpro').datepicker('setEndDate', FromEndDate);
});


//project Details Date End 
</script>