<div class="panel panel-default">
    <div class="panel-heading">
        <a style="font-size: 25px">Project Details</a>
        <a data-toggle="modal" data-target=".bs-example-modal-Project" class="btn btn-sm btn-success" style="float: right"><i class="fa fa-plus"></i> Add Project</a>

        <div class="clearfix"></div>
    </div>
    <div id="collapse2" class="panel-collapse collapse in">
        <div class="panel-body">
            <?php
            if (!empty($irs_js_pro)) {
                $iter = 0;
                foreach ($irs_js_pro as $key => $pro) {
                    $iter++;
                    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table-striped table table-responsive">
                                <tbody>
                                    <tr>
                                        <td>
                                            Project Title : <?php echo $pro['project_title']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Team Size : <?php echo $pro['team_size']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            About Project  : <?php echo $pro['project_details']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Duration : <?php echo $pro['duration']; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                        <div class="col-md-6">
                            <table class="table-striped table table-responsive">
                                <tbody>
                                    <tr>
                                        <td>Client Name : <?php echo $pro['client_name']; ?>
                                    </tr> 
                                    <tr>
                                        <td>Project Loctaion : <?php echo $pro['project_location']; ?>
                                    </tr>
                                    <tr>
                                        <td>Skills Used : <?php echo $pro['skills_used']; ?>
                                    </tr>
                                    <tr>
                                        <td>Role : <?php echo $pro['role']; ?>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                        <hr>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="row">
                    <div class="col-md-12">
                        Data not found.
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-Project" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="cProfileForm" method="POST" action="<?php echo base_url() . "profile/addJsProjectData/"; ?><?php echo $job_seeker_id; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
                    <h4 class="modal-title" id="myModalLabel">Project Details</h4>
                </div>
                <div class="modal-body">
                    <div class="row">    
                        <input type="hidden" name="_token" value="REHyK8ZURP7MsyNjw3w82MnLqTujSZ2aBl5xD2Kq">                                      
                        <div class="form-group col-md-6">
                            <label for="">Project Title 
                                <span class="requerd">* 
                                </span>
                            </label>
                            <input type="text" class="form-control"  name="project_title"   id="project_title" placeholder="Project Title" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Client Name 
                                <span class="requerd">* 
                                </span>
                            </label>
                            <input type="text" class="form-control" id="client_name"  name="client_name" placeholder="Client Name" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Team Size 
                                <span class="requerd">* 
                                </span>
                            </label>
                            <input type="text" name="team_size"  onkeypress="return isNumberKey(event, this.id)"  id="team_size" class="form-control" placeholder="Team Size" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Project Loctaion 
                                <span class="requerd">* 
                                </span>
                            </label>
                            <input type="text" name="project_locat"  id="project_locat" class="form-control" placeholder="Project Loctaion" required="">
                        </div>  
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">About Project 
                                <span class="requerd">* 
                                </span>
                            </label>
                            <textarea id="editor5" name="project_abtprjct" class="form-control" required="">
                            </textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Skills Used 
                                <span class="requerd">* 
                                </span>
                            </label>
                            <textarea id="editor6" name="project_skilsused" class="form-control" required="">
                            </textarea>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="">Duration From
                                <span class="requerd">* 
                                </span>
                            </label>
                            <input class="form-control" id="yearfromaddpro" name="duration_from" placeholder="MM/YYYY" type="text" onChange="removeerroprojectfrom()"   required=""/>
                            <span id="yearfromaddpro-error" class="error" for="yearfromaddpro">
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Duration To
                                <span class="requerd">* 
                                </span>
                            </label>
                            <input class="form-control" id="yeartoaddpro" name="duration_to" placeholder="MM/YYYY" type="text" onChange="removeerroprojectto()"   required=""/>
                            <span id="yeartoaddpro-error" class="error" for="yeartoaddpro">
                            </span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Role 
                            </label> <span class="requerd">* 
                            </span>
                            <input type="text" name="role" id="role" class="form-control " placeholder="Role" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success right-float">Submit</button>
                    <button class="btn btn-primary" type="button" class="close" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>