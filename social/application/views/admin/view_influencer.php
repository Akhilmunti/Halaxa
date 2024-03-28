<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('admin/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('admin/partials/left-nav'); ?>    
                <?php $this->load->view('admin/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>Influencer Data</h3>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2><?php echo $influencer['Username'] . "'s"; ?> Details</h2>
                                                <?php //print_r($influencer); ?>
                                                <?php
                                                $resultData = $result;
                                                if (isset($resultData)) {
                                                    echo "<p class='text-center text-success'>" . $resultData . "</p>";
                                                }
                                                ?>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <div class="panel-group">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" href="#collapse1">Personal Info</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse1" class="panel-collapse collapse in">
                                                            <div class="panel-body">
                                                                <div class="p-5">
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span> </label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input disabled="" disabled="" value="<?php echo $influencer['Email']; ?>" type="email" id="email" name="email" required="required" class="form-control form-control-sm">
                                                                        </div>
                                                                        <span class="form-error-message-dob text-danger"></span>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username <span class="required">*</span> </label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input disabled="" value="<?php echo $influencer['Username']; ?>" type="text" id="username" name="username" required="required" class="form-control form-control-sm">
                                                                        </div>
                                                                        <span class="form-error-message-dob text-danger"></span>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phone <span class="required">*</span> </label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input disabled="" value="<?php echo $influencer['Phone']; ?>" type="tel" id="phone" name="phone" required="required" class="form-control form-control-sm">
                                                                        </div>
                                                                        <span class="form-error-message-dob text-danger"></span>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date of birth <span class="required">*</span> </label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input disabled="" value="<?php echo $influencer['Dob']; ?>" type="text" id="dob" name="dob" required="required" class="form-control form-control-sm">
                                                                        </div>
                                                                        <span class="form-error-message-dob text-danger"></span>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Gender <span class="required">*</span> </label>
                                                                        <!--                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                                            <input disabled="" type="text" id="gender" name="gender" required="required" class="form-control form-control-sm">
                                                                                                                        </div>-->
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <div id="gender" class="btn-group" data-toggle="buttons">
                                                                                <?php
                                                                                if ($influencer['Gender'] == "male") {
                                                                                    $msMale = "checked";
                                                                                    $msFelmale = "";
                                                                                } else {
                                                                                    $msMale = "";
                                                                                    $msFelmale = "checked";
                                                                                }
                                                                                ?>
                                                                                <input disabled="" <?php echo $msMale; ?> type="radio" name="gender" id="marital" value="male">
                                                                                Male
                                                                                <input disabled="" <?php echo $msFelmale; ?> type="radio" name="gender" id="marital" value="female">
                                                                                Female
                                                                            </div>
                                                                        </div>
                                                                        <span class="form-error-message-gender text-danger"></span>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Marital status <span class="required">*</span></label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <div id="gender" class="btn-group" data-toggle="buttons">
                                                                                <?php
                                                                                if ($influencer['Marital_status'] == "single") {
                                                                                    $mssingle = "checked";
                                                                                    $msMarried = "";
                                                                                } else {
                                                                                    $msMarried = "checked";
                                                                                    $mssingle = "";
                                                                                }
                                                                                ?>
                                                                                <input disabled="" type="radio" <?php echo $msMarried; ?> name="marital" id="marital" value="married">
                                                                                Married 
                                                                                <input disabled="" type="radio" <?php echo $mssingle; ?> name="marital" id="marital" value="single">
                                                                                Single 
                                                                            </div>
                                                                        </div>
                                                                        <span class="form-error-message-marital text-danger"></span>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nationality <span class="required">*</span></label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input disabled="" value="<?php echo $influencer['Nationality']; ?>" type="text" id="Nationality" name="Nationality" required="required" class="form-control form-control-sm">
                                                                        </div>
                                                                        <span class="form-error-message-nationality text-danger"></span>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Current Address<span class="required">*</span></label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <textarea disabled="" value="<?php echo $influencer['Current_address']; ?>" id="current_address" name="current_address" class="form-control form-control-sm" type="text"><?php echo $influencer['Current_address']; ?></textarea>
                                                                        </div>
                                                                        <span class="form-error-message-ca text-danger"></span>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Website Link <span class="required">*</span></label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input disabled="" value="<?php echo $influencer['Website']; ?>" id="hyperlink" name="hyperlink" class="form-control form-control-sm" type="text">
                                                                        </div>
                                                                        <span class="form-error-message-hyperlink text-danger"></span>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">About yourself <span class="required">*</span></label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input disabled="" value="<?php echo $influencer['About']; ?>" id="about" name="about" class="form-control form-control-sm" type="text">
                                                                        </div>
                                                                        <span class="form-error-message-about text-danger"></span>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Resume <span class="required">*</span></label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <?php if (!empty($influencer['Resume'])) { ?>
                                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/') . $influencer['Resume']; ?>">Download Resume</a>
                                                                            <?php } ?>
                                                                        </div>
                                                                        <span class="form-error-message-resume text-danger"></span>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Photo <span class="required">*</span></label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <?php if (!empty($influencer['Photo'])) { ?>
                                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/') . $influencer['Resume']; ?>">Download Profile Photo</a>
                                                                            <?php } ?>
                                                                        </div>
                                                                        <span class="form-error-message-photo text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel-group">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" href="#collapse2">Experience Info</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse2" class="panel-collapse collapse in">
                                                            <div class="panel-body">
                                                                <table class="table experience table-bordered table-responsive" id="tab_logic">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> # </th>
                                                                            <th> Title </th>
                                                                            <th> Company Name </th>
                                                                            <th> Start date </th>
                                                                            <th> End date </th>
                                                                            <th> Location </th>
                                                                            <th> Company Description </th>
                                                                            <th> What did you achieve ? </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <?php
                                                                        $i = 0;
                                                                        foreach (json_decode($influencer['expInfo']) as $key => $value) {
                                                                            $i++;
                                                                            ?>
                                                                            <tr id="addr0">
                                                                                <td> <?php echo $i; ?> </td>
                                                                                <td> <?php echo $value[0]; ?> </td>
                                                                                <td> <?php echo $value[1]; ?> </td>
                                                                                <td> <?php echo $value[2]; ?> </td>
                                                                                <td> <?php echo $value[3]; ?> </td>
                                                                                <td> <?php echo $value[4]; ?> </td>
                                                                                <td> <?php echo $value[5]; ?> </td>
                                                                                <td> <?php echo $value[6]; ?> </td>
                                                                            </tr>
                                                                        <?php } ?>

                                                                    </tbody>
                                                                </table> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel-group">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" href="#collapse3">Education Info</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse3" class="panel-collapse collapse in">
                                                            <div class="panel-body">
                                                                <table class="table experience table-bordered table-responsive" id="tab_logic">
                                                                    <thead>
                                                                        <tr >
                                                                            <th> # </th>
                                                                            <th> Degree and field of study </th>
                                                                            <th> School or university </th>
                                                                            <th> Start Date </th>
                                                                            <th> End Date </th>
                                                                            <th> Location </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <?php
                                                                        $i = 0;
                                                                        foreach (json_decode($influencer['educationInfo']) as $key => $value) {
                                                                            $i++;
                                                                            ?>
                                                                            <tr id="addr0">
                                                                                <td> <?php echo $i; ?> </td>
                                                                                <td> <?php echo $value[0]; ?> </td>
                                                                                <td> <?php echo $value[1]; ?> </td>
                                                                                <td> <?php echo $value[2]; ?> </td>
                                                                                <td> <?php echo $value[3]; ?> </td>
                                                                                <td> <?php echo $value[4]; ?> </td>
                                                                            </tr>
                                                                        <?php } ?>

                                                                    </tbody>
                                                                </table> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel-group">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" href="#collapse3">Skills Info</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse3" class="panel-collapse collapse in">
                                                            <div class="panel-body">
                                                                <table class="table experience table-bordered table-responsive" id="tab_logic">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> # </th>
                                                                            <th> Your unique talent </th>
                                                                            <th> How did you acquire it? </th>
                                                                            <th> What did it result in? </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <?php
                                                                        $i = 0;
                                                                        foreach (json_decode($influencer['skillsInfo']) as $key => $value) {
                                                                            $i++;
                                                                            ?>
                                                                            <tr id="addr0">
                                                                                <td> <?php echo $i; ?> </td>
                                                                                <td> <?php echo $value[0]; ?> </td>
                                                                                <td> <?php echo $value[1]; ?> </td>
                                                                                <td> <?php echo $value[2]; ?> </td>
                                                                            </tr>
                                                                        <?php } ?>

                                                                    </tbody>
                                                                </table> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel-group">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" href="#collapse4">Certificate Info</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse4" class="panel-collapse collapse in">
                                                            <div class="panel-body">
                                                                <table class="table experience table-bordered table-responsive" id="tab_logic">
                                                                    <thead>
                                                                        <tr >
                                                                            <th> # </th>
                                                                            <th> Certification Name</th>
                                                                            <th> Certification authority </th>
                                                                            <th> License Number </th>
                                                                            <th> From </th>
                                                                            <th> Cerification Url </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <?php
                                                                        $i = 0;
                                                                        foreach (json_decode($influencer['certiInfo']) as $key => $value) {
                                                                            $i++;
                                                                            ?>
                                                                            <?php if (!empty($value[0])) { ?>
                                                                                <tr id="addr0">
                                                                                    <td> <?php echo $i; ?> </td>
                                                                                    <td> <?php echo $value[0]; ?> </td>
                                                                                    <td> <?php echo $value[1]; ?> </td>
                                                                                    <td> <?php echo $value[2]; ?> </td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        <?php } ?>

                                                                    </tbody>
                                                                </table> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel-group">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" href="#collapse5">Influencial Impact</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse5" class="panel-collapse collapse in">
                                                            <div class="panel-body">
                                                                <div id="step-6" class="p-5">
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Why you fit as a influencer ? <span class="required">*</span> </label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input value="<?php echo $influencer['Fit'] ?>" disabled="" type="text" id="fit" name="fit" required="required" class="form-control form-control-sm">
                                                                        </div>
                                                                        <span class="form-error-message-fit text-danger"></span>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Why you want to be a <?php echo PROJECT_NAME; ?> influencer ? <span class="required">*</span> </label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input value="<?php echo $influencer['Why'] ?>" disabled="" type="text" id="why" name="why" name="last-name" required="required" class="form-control form-control-sm">
                                                                        </div>
                                                                        <span class="form-error-message-why text-danger"></span>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Current number of followers of Facebook ? ​</label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input value="<?php echo $influencer['Facebook'] ?>" disabled="" id="fbf" class="form-control form-control-sm" type="text" name="fbf">
                                                                        </div>
                                                                        <span class="form-error-message-fbf text-danger"></span>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Current number of followers of Instagram ?</label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input value="<?php echo $influencer['Instagram'] ?>" disabled="" id="instaf" class="form-control form-control-sm" type="text" name="instaf">
                                                                        </div>
                                                                        <span class="form-error-message-instaf text-danger"></span>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Current number of followers of Linkedin ?</label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input value="<?php echo $influencer['Linkedin'] ?>" disabled="" id="linkf" class="form-control form-control-sm" type="text" name="linkf">
                                                                        </div>
                                                                        <span class="form-error-message-linkf text-danger"></span>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Current number of followers of YouTube ?</label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input value="<?php echo $influencer['Youtube'] ?>" disabled="" id="youf" class="form-control form-control-sm" type="text" name="youf">
                                                                        </div>
                                                                        <span class="form-error-message-youf text-danger"></span>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Current number of followers of Twitter ?</label>
                                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                                            <input value="<?php echo $influencer['Twitter'] ?>" disabled="" id="twif" class="form-control form-control-sm" type="text" name="twif">
                                                                        </div>
                                                                        <span class="form-error-message-twif text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content --> 

                <!-- footer content -->
                <?php $this->load->view('admin/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>

        <?php $this->load->view('admin/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
    </body>

</html>