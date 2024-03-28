<div class="modal-dialog modal-lg">
  <form action="editjobseekercertificatedetails" method="post" id="certificatedetail">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×
              </span>
            </button>
            <h4 class="modal-title" id="">Certificate Details
            </h4>
          </div>
          <div class="modal-body">
            <?php foreach ($jscertificatedata as $jscertificate) { ?>
            <div class="row">    
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <input type="hidden" name="certificateid" value="<?php echo $jscertificate->id; ?>">                                      
              <div class="form-group col-md-6">
                <label for="">Certificate Name 
                  <span class="requerd">* 
                  </span>
                </label>
                <input type="text" class="form-control"  name="certificate_name" value="<?php echo $jscertificate->certificate_name ?>"  id="certificate_name" placeholder="Certificate Name " required>
              </div>
              <div class="form-group col-md-6">
                <label for="">Certificate Authorization 
                </label>
                <input type="text" class="form-control" id="certificate_authorization" value="<?php echo $jscertificate->certificate_authority ?>"  name="certificate_authorization" placeholder="Certificate Authorization">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">License No.
                  <span class="requerd">* 
                  </span>
                </label>
                <input type="text" name="license_no"  id="license_no" value="<?php echo $jscertificate->license_no ?>"  class="form-control" placeholder="License No." >
              </div>
              <div class="form-group col-md-6">
                <label for="">Certificate URL 
                </label>
                <input type="text" name="certificate_url"  id="certificate_url" value="<?php echo $jscertificate->certificate_url ?>"  class="form-control" placeholder="Certificate URL" >
              </div>  
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">From Date 
                  <span class="requerd">* 
                  </span>
                </label>
                <input class="form-control" id="yearfromeditctf" name="fromdate" placeholder="MM/YYYY" type="text" value="<?php echo $jscertificate->fromdate ?>" required/>
              </div>
              <div class="form-group col-md-6">
                <label for="">To Date
                  <span class="requerd">* 
                  </span>
                </label>
                 <input class="form-control" id="yeartoeditctf" name="todate" placeholder="MM/YYYY" type="text" value="<?php echo $jscertificate->todate ?>" required/>
              </div>
            </div> 
            <?php } ?>  
          </div>
          <div class="modal-footer">
            <button type="submit" class='btn btn-primary add-Project'> Save
            </button>
          </div>
        </div>
      </form>
      </div>

      <script>
//Certificate Details Date Start
var startDate;
var FromEndDate;

// var ToEndDate ;
// ToEndDate.setDate(ToEndDate.getDate()+365);

$('#yearfromeditctf').datepicker({

minViewMode: 1,
autoclose: true,
format: 'mm/yyyy'
})
.on('changeDate', function(selected){
startDate = new Date(selected.date.valueOf());
startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
$('#yeartoeditctf').datepicker('setStartDate', startDate);
}); 
$('#yeartoeditctf')
.datepicker({

minViewMode: 1,
autoclose: true,
format: 'mm/yyyy'
})
.on('changeDate', function(selected){
FromEndDate = new Date(selected.date.valueOf());
FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
$('#yearfromeditctf').datepicker('setEndDate', FromEndDate);
});


//Certificate Details Date End 
</script>