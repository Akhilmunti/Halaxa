<div class="panel panel-default">
    <div class="panel-heading">
        <a style="font-size: 25px">Personal Details</a>
        <a data-toggle="modal" data-target=".bs-example-modal-Profile" class="btn btn-sm btn-success" style="float: right"><i class="fa fa-edit"></i> Edit Personal</a>
        <div class="clearfix"></div>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table-striped table table-responsive">
                        <tbody>
                            <?php if ($irs_details['name']) {
                                ?>
                                <tr>
                                    <td>Name : <?php echo $irs_details['name']; ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($irs_jsd['marital_status']) {
                                ?>
                                <tr>
                                    <td>Marital Status: <?php echo $irs_jsd['marital_status']; ?>
                                </tr>
                            <?php } ?>
                            <?php if ($irs_jsd['countryid']) {
                                ?>
                                <tr>
                                    <td>
                                        Nationality : <?php echo $irs_jsd['name'] ?>
                                    </td>
                                </tr>
                            <?php } ?>

                            <?php if ($irs_jsd['about']) {
                                ?>
                                <tr>
                                    <td>Personal Breif : <?php echo $irs_jsd['about']; ?>
                                </tr>   
                            <?php } ?>
                            <?php if ($irs_jsd['website']) {
                                ?>
                                <tr>
                                    <td>Website/Link : <?php echo $irs_jsd['website']; ?>
                                </tr>   
                            <?php } ?>
                            <?php if ($irs_jsd['show_to_employer']) {
                                ?>
                                <tr>
                                    <td>CV : No Data; ?>
                                </tr>   
                            <?php } ?>
                        </tbody>
                    </table> 
                </div>
                <div class="col-md-6">
                    <table class="table-striped table table-responsive">
                        <tbody>
                            <?php if ($irs_details['email']) {
                                ?>
                                <tr>
                                    <td>Email : <?php echo $irs_details['email']; ?></td>
                                </tr>
                            <?php } ?>

                            <?php if ($irs_jsd['dob']) {
                                ?>
                                <tr>
                                    <td>DOB : <?php echo $irs_jsd['dob']; ?>
                                </tr>   
                            <?php } ?>

                            <?php if ($irs_jsd['gender']) {
                                ?>
                                <tr>
                                    <td>Gender : <?php
                                        if ($irs_jsd['gender'] == "M") {
                                            echo "Male";
                                        } else {
                                            echo "Female";
                                        }
                                        ?>
                                    </td>

                                </tr>   
                            <?php } ?>

                            <?php if ($irs_jsd['permanent_address']) {
                                ?>
                                <tr>
                                    <td>Current Address : <?php echo $irs_jsd['permanent_address']; ?>
                                </tr>   
                            <?php } ?>

                            <?php if ($irs_jsd['show_to_employer']) {
                                ?>
                                <tr>
                                    <td>Show To Employer : <?php echo $irs_jsd['show_to_employer']; ?>
                                </tr>   
                            <?php } ?>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>
<!--modal-->

<div class="modal fade bs-example-modal-Profile">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×
                    </span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Personal Details
                </h4>
            </div>
            <form method="POST" action="<?php echo base_url() . "profile/addJsPerData/"; ?><?php echo $job_seeker_id; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Name 
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <input value="<?php echo $irs_details['name']; ?>" type="text" class="form-control"  name="name" id="name" placeholder="Name" required="required">
                                <div id="name-error">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="">Marital Status 
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <?php
                                $marital_status = $irs_jsd['marital_status'];
                                if ($marital_status == "M") {
                                    $married = "Selected";
                                    $unmarried = "";
                                } else {
                                    $married = "";
                                    $unmarried = "Selected";
                                }
                                ?>
                                <select class="form-control select2" style="width:100%" name="marital" id="marital" required="required">
                                    <option value="" >Select Maritial Status</option>
                                    <option value="M" <?php echo $married; ?>>Married</option> 
                                    <option value="S" <?php echo $unmarried; ?>>Single</option> 
                                </select>
                                <div id="phone-error">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Email 
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $irs_jsd['email']; ?>" required="required" readonly>
                                <div id="email-error">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="">DOB 
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <input class="form-control" id="date" value="<?php echo $irs_jsd['dob']; ?>" name="DOB" placeholder="MM/DD/YYYY" required="required"/>
                                <div id="date-error">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                        <!--                        <div class="form-group col-md-2">
                                                    <div class="panel-body" align="center">
                                                        <div class="picture-container">
                                                            <div class="picture">
                                                                <div id="wizardPicturePreview">
                                                                    <img src="https://foodlinked.com/irs/storage/app/public/jobseeker/<?php echo $irs_jsd['logoid'] ?>"  class="picture-src" id="wizardPicturePreview" title=""/>
                                                                </div>
                                                                <input type="file" name="employer_logo" id="employer_logo" accept=".jpg,.JPG,.JPEG,.PNG,.jpeg,.png" >
                        
                        
                                                                <h2>Profile Picture
                                                                </h2>
                                                            </div>
                                                        </div>      
                                                    </div>
                                                    <div class=" col-md-2">
                                                    </div>
                                                </div>-->
                    </div>
                    <div class="row">

                        <div class="form-group col-md-4">
                            <label for="">Gender 
                                <span class="requerd">* 
                                </span>
                            </label>
                            <?php
                            $gender = $irs_jsd['gender'];
                            if ($gender == "M") {
                                $male = "checked";
                                $female = "";
                            } else {
                                $male = "";
                                $female = "checked";
                            }
                            ?>
                            <p style="margin-top: 5px;">
                                Male 
                                <input type="radio" name="gender" id="genderM" value="M" 
                                       <?php echo $male; ?> required="required" data-parsley-multiple="gender">&nbsp;&nbsp; 
                                Female
                                <input <?php echo $female; ?> type="radio" name="gender" id="genderF" value="F"
                                                              data-parsley-multiple="gender">
                            </p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="country">Nationality 
                                <span class="requerd">* 
                                </span>
                            </label>
                            <select class="form-control select2" id="country"   name="country" style="width:100%" required="required">
                                <option value="">Select Nationality
                                </option>          
                                <?php
                                foreach ($countries as $loc) {
                                    if ($loc['location_id'] == $irs_jsd['countryid']) {
                                        echo "<option value='" . $loc['location_id'] . "' selected=''>" . $loc['name'] . "</option>";
                                    } else {
                                        echo "<option value='" . $loc['location_id'] . "'>" . $loc['name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                            <label id="country-error" class="error" for="country">
                            </label>
                        </div>
                        <div class="form-group col-md-4"> 
                            <label for="">Upload your Resume.   </label>   
                            <div class="btn btn-default btn-file">
                                <label for=""> &nbsp; 
                                </label>
                                <i class="fa fa-paperclip">
                                </i> Attachment Resume
                                <input type="file" name="attachment_file" id="attachment_file" accept=".doc, .docx, .txt,.pdf" onchange="validate_attachment()">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-9">
                            <label for="">Website/Link   </label>
                            <input type="text" name="website" class="form-control" value="<?php echo $irs_jsd['website'] ?>" id="website" onblur="checkURL(this)">
                        </div>
                        <div class="form-group col-md-3">
                            <?php
                            $show_to_employer = $irs_jsd['show_to_employer'];
                            if ($show_to_employer == 0) {
                                $check = "";
                            } else {
                                $check = "checked";
                            }
                            ?>
                            <label for="">View to employer Only   </label>
                            <p style="margin-top: 5px;">
                                <input <?php echo $check; ?> type="checkbox" name="ViewStatus" id="ViewStatus" value="1" class="flat" >
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Personal Brief
                            </label>
                            <textarea id="About" name="About" class="form-control"><?php echo $irs_jsd['about'] ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Current Address
                            </label>
                            <textarea  id="Address" name="Address" class="form-control"><?php echo $irs_jsd['permanent_address'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class='btn btn-primary add-Profile' /> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>