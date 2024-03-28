<div role="tabpanel" class="tab-pane fade" id="recruit" aria-labelledby="recruit-tab">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a style="font-size: 25px">Recruiter Details</a>
            <?php if (!empty($irs_recruit)) { ?>
                <a data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-success" style="float: right"><i class="fa fa-edit"></i> Update Recruiter</a>
            <?php } else { ?>
                <a data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-success" style="float: right"><i class="fa fa-plus"></i> Add Recruiter</a>
            <?php } ?>
            <div class="clearfix"></div>
        </div>
        <div id="collapse2" class="panel-collapse collapse in">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table-striped table table-responsive">
                            <tbody>
                                <?php if ($user->Company_name) {
                                    ?>
                                    <tr>
                                        <td>Name : <?php echo $user->Company_name; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        Company Type : 
                                        <?php
                                        if ($irs_recruit['company_type'] == 2) {
                                            echo "Recuritment Agency";
                                        } else {
                                            echo "Company";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Pincode  : <?php echo $irs_recruit['pincode'] ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table> 
                    </div>
                    <div class="col-md-6">
                        <table class="table-striped table table-responsive">
                            <tbody>
                                <tr>
                                    <td>Website : <?php echo $irs_recruit['website'] ?>
                                </tr> 
                                <tr>
                                    <td>Address :  <?php echo $irs_recruit['addline1'] ?>
                                </tr>
                                <tr>
                                    <td>About Company : <?php echo $irs_recruit['about'] ?>
                                </tr>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div id="myModal" class="modal fade bs-example-modal-Project" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="cProfileForm" method="POST" action="<?php echo base_url() . "profile/addRecruiterDetails/"; ?><?php echo $job_seeker_id; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
                    <h4 class="modal-title" id="myModalLabel">Recruitment Details</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-5 col-sm-offset-1">                       
                            <div class="form-group">
                                <label>Company Name <span class="requerd">*</span></label>
                                <input value="<?php echo $irs_recruit['company'] ?>" name="companyname" id="companyname" type="text" class="form-control" placeholder="Enter Company..." onkeypress="return checkQuote();">
                                <div id="companyname-error"></div>
                            </div> 

                        </div>
                        <div class="col-sm-5 col-sm-offset-1">

                            <?php
                            if ($irs_recruit['company_type'] == 1) {
                                $company = "checked";
                                $agency = "";
                            } else {
                                $agency = "checked";
                                $company = "";
                            }
                            ?>
                            <div class="form-group">
                                <label>Company Type  <span class="requerd">*</span></label><br>

                                <input type="radio" name="companytype"  value="1" <?php echo $company; ?> />

                                Company
                                &nbsp;

                                <input type="radio" name="companytype"  value="2" <?php echo $agency; ?> /> 

                                Recuritment Agency
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5 col-sm-offset-1">
                            <div class="form-group">
                                <label>Pincode</label>
                                <input value="<?php echo $irs_recruit['pincode'] ?>" name="pincode" id="pincode" type="text" class="form-control" placeholder="Enter Pincode"   onkeypress="javascript:return isNumber(event)" >
                                <div id="pincode-error"></div>
                            </div>
                        </div>


                        <div class="col-sm-5 ">
                            <div class="form-group">
                                <label>Website </label>
                                <input value="<?php echo $irs_recruit['website'] ?>" name="website" id="website" type="text" class="form-control" placeholder="Enter Website..." onblur="checkURL(this)">
                                <div id="website-error"></div>
                            </div>

                        </div>


                    </div>

                    <div class="row">
                        <div class="col-sm-5 col-sm-offset-1">
                            <div class="form-group">
                                <label>Address <span class="requerd">*</span></label>
                                <textarea rows="5" name="address" required="" class="form-control"><?php echo $irs_recruit['addline1'] ?></textarea>
                                <div id = "divadd"></div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>About Company  <span class="requerd">*</span></label>
                                <textarea rows="5" name="aboutcompany" required="" class="form-control"><?php echo $irs_recruit['about'] ?></textarea>
                                <div id = "divabt"></div>
                            </div>
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