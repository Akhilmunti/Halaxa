
                    <div class="modal-dialog modal-sm">
                      <form action="<?php echo url('/employer/changestatustowithdraw'); ?>" method="post">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Confirmation</h4>
                        </div>
                        <div class="modal-body">
                        
                        <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="Employee_Id" id="Employee_Id" value = "<?php echo $Employee_Id; ?>">
                            <input type="hidden" name="School_Id" id="School_Id"  value = "<?php echo $School_Id; ?>">
                            <input type="hidden" name="Intern_Id" id="Intern_Id"  value = "<?php echo $Intern_Id; ?>">
                            <input type="hidden" name="Country" id="Country"  value = "<?php echo $Country; ?>">
                            <input type="hidden" name="City" id="City"  value = "<?php echo $City; ?>">
                            <input type="hidden" name="Start_Date" id="Start_Date"  value = "<?php echo $Start_Date; ?>">
                            <input type="hidden" name="End_Date" id="End_Date"  value = "<?php echo $End_Date; ?>">

                          <h4>Are you sure you want to cancel? </h4>
                        </div>
                        <div class="modal-footer">
                          <a href="<?php  ?>"><button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"> No</i></button></a>
                          <button type="submit" class="btn btn-success"> <i class="fa fa-check"> Yes</i></button>
                        </div>

                      </div></form>
                    </div>
                 