<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo PROJECT_NAME; ?> | Partner</title>
        <meta content="<?php echo PROJECT_NAME; ?>" name="description" />
        <meta content="<?php echo PROJECT_NAME; ?>" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/halaxa/images/favicon.png">

        <link href="<?php echo base_url(); ?>assets/halaxa/css/bootstrap.css" rel="stylesheet" type="text/css">
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/halaxa/halaxa-partner.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .form_wizard .stepContainer {
                display: block;
                position: relative;
                margin: 0;
                padding: 0;
                border: 0 solid #CCC;
                overflow-x: hidden
            }
            .wizard_horizontal ul.wizard_steps {
                display: table;
                list-style: none;
                position: relative;
                width: 100%;
                margin: 0 0 20px
            }
            .wizard_horizontal ul.wizard_steps li {
                display: table-cell;
                text-align: center
            }
            .wizard_horizontal ul.wizard_steps li a,
            .wizard_horizontal ul.wizard_steps li:hover {
                display: block;
                position: relative;
                -moz-opacity: 1;
                filter: alpha(opacity=100);
                opacity: 1;
                color: #666
            }
            .wizard_horizontal ul.wizard_steps li a:before {
                content: "";
                position: absolute;
                height: 4px;
                background: #ccc;
                top: 20px;
                width: 100%;
                z-index: 4;
                left: 0
            }
            .wizard_horizontal ul.wizard_steps li a.disabled .step_no {
                background: #ccc
            }
            .wizard_horizontal ul.wizard_steps li a .step_no {
                width: 40px;
                height: 40px;
                line-height: 40px;
                border-radius: 100px;
                display: block;
                margin: 0 auto 5px;
                font-size: 16px;
                text-align: center;
                position: relative;
                z-index: 5
            }
            .wizard_horizontal ul.wizard_steps li a.selected:before,
            .step_no {
                background: #34495E;
                color: #fff
            }
            .wizard_horizontal ul.wizard_steps li a.done:before,
            .wizard_horizontal ul.wizard_steps li a.done .step_no {
                background: #1ABB9C;
                color: #fff
            }
            .wizard_horizontal ul.wizard_steps li:first-child a:before {
                left: 50%
            }
            .wizard_horizontal ul.wizard_steps li:last-child a:before {
                right: 50%;
                width: 50%;
                left: auto
            }
            .wizard_verticle .stepContainer {
                width: 80%;
                float: left;
                padding: 0 10px
            }
            .actionBar {
                width: 100%;
                border-top: 1px solid #ddd;
                padding: 10px 5px;
                text-align: right;
                margin-top: 10px
            }
            .actionBar .buttonDisabled {
                cursor: not-allowed;
                pointer-events: none;
                opacity: .65;
                filter: alpha(opacity=65);
                box-shadow: none
            }
            .actionBar a {
                margin: 0 3px
            }
            .wizard_verticle .wizard_content {
                width: 80%;
                float: left;
                padding-left: 20px
            }
            .wizard_verticle ul.wizard_steps {
                display: table;
                list-style: none;
                position: relative;
                width: 20%;
                float: left;
                margin: 0 0 20px
            }
            .wizard_verticle ul.wizard_steps li {
                display: list-item;
                text-align: center
            }
            .wizard_verticle ul.wizard_steps li a {
                height: 80px
            }
            .wizard_verticle ul.wizard_steps li a:first-child {
                margin-top: 20px
            }
            .wizard_verticle ul.wizard_steps li a,
            .wizard_verticle ul.wizard_steps li:hover {
                display: block;
                position: relative;
                -moz-opacity: 1;
                filter: alpha(opacity=100);
                opacity: 1;
                color: #666
            }
            .wizard_verticle ul.wizard_steps li a:before {
                content: "";
                position: absolute;
                height: 100%;
                background: #ccc;
                top: 20px;
                width: 4px;
                z-index: 4;
                left: 49%
            }
            .wizard_verticle ul.wizard_steps li a.disabled .step_no {
                background: #ccc
            }
            .wizard_verticle ul.wizard_steps li a .step_no {
                width: 40px;
                height: 40px;
                line-height: 40px;
                border-radius: 100px;
                display: block;
                margin: 0 auto 5px;
                font-size: 16px;
                text-align: center;
                position: relative;
                z-index: 5
            }
            .wizard_verticle ul.wizard_steps li a.selected:before,
            .step_no {
                background: #34495E;
                color: #fff
            }
            .wizard_verticle ul.wizard_steps li a.done:before,
            .wizard_verticle ul.wizard_steps li a.done .step_no {
                background: #1ABB9C;
                color: #fff
            }
            .wizard_verticle ul.wizard_steps li:first-child a:before {
                left: 49%
            }
            .wizard_verticle ul.wizard_steps li:last-child a:before {
                left: 49%;
                left: auto;
                width: 0
            }
            .form_wizard .loader {
                display: none
            }
            .form_wizard .msgBox {
                display: none
            }
        </style>

    </head>

    <body class="bg-section">
        <!-- Main -->
        <div class="main">
            <section>
                <div class="header">
                    <nav class="navbar navbar-expand-lg bg-1 text-white navbar-dark">
                        <div class="container">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <a class="navbar-brand text-white" href="#">
                                <img height="30" src="<?php echo base_url('assets/halaxa/images/partner-logo.png'); ?>" />
                            </a>

                            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                <ul class="navbar-nav ml-auto mt-2 mt-lg-0 nav-theme-li">
                                    <li class="nav-item">
                                        <a target="_blank" href="<?= base_url("partner/home/signIn"); ?>" class="no-decoration btn btn-white font-bold my-2 my-sm-0 mr-3" type="submit">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a target="_blank" href="<?= base_url("partner/apply"); ?>" class="no-decoration btn btn-white font-bold my-2 my-sm-0 mr-3" type="submit">Apply</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </section>

            <section class="mt-5 mb-5">
                <div class="container">
                    <?php
                    if ($notification) {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success" role="alert">
                                    <?php echo $notification;
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="partner-card">
                                <div class="partner-card-header">
                                    <p>Influencer Application</p>
                                </div>
                            </div>
                            <div class="partner-card-content">
                                <div id="wizard" class="form_wizard wizard_horizontal">
                                    <ul class="wizard_steps">
                                        <li> <a href="#step-1"> <span class="step_no">1</span> <span class="step_descr"> Personal Info</span> </a> </li>
                                        <li> <a href="#step-2"> <span class="step_no">2</span> <span class="step_descr"> Experience</span> </a> </li>
                                        <li> <a href="#step-3"> <span class="step_no">3</span> <span class="step_descr"> Education</span> </a> </li>
                                        <li> <a href="#step-4"> <span class="step_no">4</span> <span class="step_descr"> Skills</span> </a> </li>
                                        <li> <a href="#step-5"> <span class="step_no">5</span> <span class="step_descr"> Certification</span> </a> </li>
                                        <li> <a href="#step-6"> <span class="step_no">6</span> <span class="step_descr"> Influential impact</span> </a> </li>
                                    </ul>
                                    <form class="form-horizontal form-label-left" id="infForm" method="POST" action="<?php echo base_url() . "partner/influencer/add_new"; ?>" enctype="multipart/form-data">
                                        <div id="step-1" class="p-5">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span> </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="email" id="email" name="email" required="required" class="form-control form-control-sm">
                                                </div>
                                                <span class="form-error-message-dob text-danger"></span>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username <span class="required">*</span> </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" id="username" name="username" required="required" class="form-control form-control-sm">
                                                </div>
                                                <span class="form-error-message-dob text-danger"></span>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span> </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="password" id="password" name="password" required="required" class="form-control form-control-sm">
                                                </div>
                                                <span class="form-error-message-dob text-danger"></span>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phone <span class="required">*</span> </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="tel" id="phone" name="phone" required="required" class="form-control form-control-sm">
                                                </div>
                                                <span class="form-error-message-dob text-danger"></span>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date of birth <span class="required">*</span> </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="date" id="dob" name="dob" required="required" class="form-control form-control-sm">
                                                </div>
                                                <span class="form-error-message-dob text-danger"></span>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Gender <span class="required">*</span> </label>
                                                <!--                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                    <input type="text" id="gender" name="gender" required="required" class="form-control form-control-sm">
                                                                                                </div>-->
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                            <input type="radio" name="gender" id="marital" value="male">
                                                            Male </label>
                                                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                            <input type="radio" name="gender" id="marital" value="female">
                                                            Female </label>
                                                    </div>
                                                </div>
                                                <span class="form-error-message-gender text-danger"></span>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Marital status <span class="required">*</span></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                            <input type="radio" name="marital" id="marital" value="married">
                                                            Married </label>
                                                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                            <input type="radio" name="marital" id="marital" value="single">
                                                            Single </label>
                                                    </div>
                                                </div>
                                                <span class="form-error-message-marital text-danger"></span>
                                            </div>
                                            <div class="form-group row">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nationality <span class="required">*</span></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <select id="country" name="nationality" class="form-control form-control-sm">
                                                        <option>Choose option</option>
                                                        <?php
                                                        foreach ($countries as $loc) {
                                                            echo "<option data-value='" . $loc['id'] . "' value='" . $loc['name'] . "'>" . $loc['name'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <span class="form-error-message-nationality text-danger"></span>
                                            </div>
                                            <div class="form-group row">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Current Address<span class="required">*</span></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input id="current_address" name="current_address" class="form-control form-control-sm" type="text">
                                                </div>
                                                <span class="form-error-message-ca text-danger"></span>
                                            </div>
                                            <div class="form-group row">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Website Link <span class="required">*</span></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input id="hyperlink" name="hyperlink" class="form-control form-control-sm" type="text">
                                                </div>
                                                <span class="form-error-message-hyperlink text-danger"></span>
                                            </div>
                                            <div class="form-group row">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">About yourself <span class="required">*</span></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input id="about" name="about" class="form-control form-control-sm" type="text">
                                                </div>
                                                <span class="form-error-message-about text-danger"></span>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Resume <span class="required">*</span></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input id="resume" name="resume" class="form-control form-control-sm" type="file">
                                                </div>
                                                <span class="form-error-message-resume text-danger"></span>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Photo <span class="required">*</span></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input id="photo" name="photo" class="form-control form-control-sm" type="file">
                                                </div>
                                                <span class="form-error-message-photo text-danger"></span>
                                            </div>
                                        </div>
                                        <div id="step-2" class="p-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="form-error-message-experience text-danger"></span>
                                                    <table class="table experience table-bordered table-responsive" id="tab_logic">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center"> # </th>
                                                                <th class="text-center"> Title </th>
                                                                <th class="text-center"> Company Name </th>
                                                                <th class="text-center"> Start date </th>
                                                                <th class="text-center"> End date </th>
                                                                <th class="text-center"> Location </th>
                                                                <th class="text-center"> Company Description </th>
                                                                <th class="text-center"> What did you achieve ? </th>
                                                                <th class="text-center"> Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr id="addr0">
                                                                <td> 1 </td>
                                                                <td><input type="text" name='expInfo[1][]' id="title" placeholder='Tile' class="form-control form-control-sm"/></td>
                                                                <td><input type="text" name='expInfo[1][]' id="companyname" placeholder='Company Name' class="form-control form-control-sm"/></td>
                                                                <td><input type="date" name='expInfo[1][]' id="start_date" class="form-control form-control-sm"/></td>
                                                                <td><input type="date" name='expInfo[1][]' id="end_date" class="form-control form-control-sm"/></td>
                                                                <td><input type="text" name='expInfo[1][]' id="location" placeholder='Location' class="form-control form-control-sm"/></td>
                                                                <td><input type="text" name='expInfo[1][]' id="description" placeholder='Company Description' class="form-control form-control-sm"/></td>
                                                                <td><input type="text" name='expInfo[1][]' id="achieve" placeholder='What did you achieve ?' class="form-control form-control-sm"/></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="10" style="text-align: left;">
                                                                    <input type="button" class="btn btn-small btn-dark btn-block" id="addrowexp" value="Add Row" />
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-3" class="p-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="form-error-message-education text-danger"></span>
                                                    <table class="table education table-bordered table-hover" id="tab_logic2">
                                                        <thead>
                                                            <tr >
                                                                <th class="text-center"> # </th>
                                                                <th class="text-center"> Degree and field of study </th>
                                                                <th class="text-center"> School or university </th>
                                                                <th class="text-center"> Start Date </th>
                                                                <th class="text-center"> End Date </th>
                                                                <th class="text-center"> Location </th>
                                                                <th class="text-center"> Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr id="addrt0">
                                                                <td> 1 </td>
                                                                <td><input type="text" name='educationInfo[1][]'  placeholder='Degree and field of study' class="form-control form-control-sm"/></td>
                                                                <td><input type="text" name='educationInfo[1][]' placeholder='School or university' class="form-control form-control-sm"/></td>
                                                                <td><input type="date" name='educationInfo[1][]' placeholder='start date' class="form-control form-control-sm"/></td>
                                                                <td><input type="date" name='educationInfo[1][]' placeholder='End date' class="form-control form-control-sm"/></td>
                                                                <td><input type="text" name='educationInfo[1][]' placeholder='Location' class="form-control form-control-sm"/></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="10" style="text-align: left;">
                                                                    <input type="button" class="btn btn-small btn-dark btn-block" id="addrowedu" value="Add Row" />
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-4" class="p-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="form-error-message-skills text-danger"></span>
                                                    <table class="table skills table-bordered table-hover" id="tab_logic3">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center"> # </th>
                                                                <th class="text-center"> Your unique talent </th>
                                                                <th class="text-center"> How did you acquire it? </th>
                                                                <th class="text-center"> What did it result in? </th>
                                                                <th class="text-center"> Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr id="addrth0">
                                                                <td> 1 </td>
                                                                <td><input type="text" name='skillsInfo[1][]'  placeholder='Your unique talent' class="form-control form-control-sm"/></td>
                                                                <td><input type="text" name='skillsInfo[1][]' placeholder='How did you acquire it?' class="form-control form-control-sm"/></td>
                                                                <td><input type="text" name='skillsInfo[1][]' placeholder='What did it result in?' class="form-control form-control-sm"/></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="10" style="text-align: left;">
                                                                    <input type="button" class="btn btn-small btn-dark btn-block" id="addrowskills" value="Add Row" />
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-5" class="p-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="form-error-message-certi text-danger"></span>
                                                    <table class="table certi table-bordered table-hover" id="tab_logic3">
                                                        <thead>
                                                            <tr >
                                                                <th class="text-center"> # </th>
                                                                <th class="text-center"> Certification Name</th>
                                                                <th class="text-center"> Certification authority </th>
                                                                <th class="text-center"> License Number </th>
                                                                <th class="text-center"> From </th>
                                                                <th class="text-center"> Cerification Url </th>
                                                                <th class="text-center"> Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr id="addrth0">
                                                                <td> 1 </td>
                                                                <td><input type="text" name='certiInfo[1][]'  placeholder='Certification Name' class="form-control form-control-sm"/></td>
                                                                <td><input type="text" name='certiInfo[1][]' placeholder='Certification authority' class="form-control form-control-sm"/></td>
                                                                <td><input type="text" name='certiInfo[1][]' placeholder='License Number' class="form-control form-control-sm"/></td>
                                                                <td><input type="date" name='certiInfo[1][]' placeholder='From' class="form-control form-control-sm"/></td>
                                                                <td><input type="text" name='certiInfo[1][]' placeholder='Cerification Url' class="form-control form-control-sm"/></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="10" style="text-align: left;">
                                                                    <input type="button" class="btn btn-small btn-dark btn-block" id="addrowcerti" value="Add Row" />
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-6" class="p-5">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Why you fit as a influencer ? <span class="required">*</span> </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" id="fit" name="fit" required="required" class="form-control form-control-sm">
                                                </div>
                                                <span class="form-error-message-fit text-danger"></span>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Why you want to be a <?php echo PROJECT_NAME; ?> influencer ? <span class="required">*</span> </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" id="why" name="why" name="last-name" required="required" class="form-control form-control-sm">
                                                </div>
                                                <span class="form-error-message-why text-danger"></span>
                                            </div>
                                            <div class="form-group row">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Current number of followers of Facebook ? ​</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input id="fbf" class="form-control form-control-sm" type="text" name="fbf">
                                                </div>
                                                <span class="form-error-message-fbf text-danger"></span>
                                            </div>
                                            <div class="form-group row">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Current number of followers of Instagram ?</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input id="instaf" class="form-control form-control-sm" type="text" name="instaf">
                                                </div>
                                                <span class="form-error-message-instaf text-danger"></span>
                                            </div>
                                            <div class="form-group row">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Current number of followers of Linkedin ?</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input id="linkf" class="form-control form-control-sm" type="text" name="linkf">
                                                </div>
                                                <span class="form-error-message-linkf text-danger"></span>
                                            </div>
                                            <div class="form-group row">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Current number of followers of YouTube ?</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input id="youf" class="form-control form-control-sm" type="text" name="youf">
                                                </div>
                                                <span class="form-error-message-youf text-danger"></span>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Current number of followers of Twitter ?</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input id="twif" class="form-control form-control-sm" type="text" name="twif">
                                                </div>
                                                <span class="form-error-message-twif text-danger"></span>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <!-- End SmartWizard Content --> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- End Main -->

        <!-- jQuery  -->
        <?php $this->load->view('partner/partials/assets-footer'); ?>
        <!-- jQuery Smart Wizard --> 
        <script src="<?php echo base_url(); ?>assets/vendors/moment/min/moment.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>  
        <script src="<?php echo base_url(); ?>assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                // Smart Wizard         
                $('#wizard').smartWizard({
                    onLeaveStep: leaveAStepCallback,
                    onFinish: onFinishCallback
                });

                function leaveAStepCallback(obj, context) {
                    //alert(context);
                    //alert("Leaving step " + context.fromStep + " to go to step " + context.toStep);
                    return validateSteps(context.fromStep); // return false to stay on step and true to continue navigation 
                }

                function onFinishCallback(objs, context) {
                    if (validateAllSteps()) {
                        $('form').submit();
                    }
                }

                // Your Step validation logic
                function validateSteps(stepnumber) {
                    var isStepValid = false;
                    // validate step 1
                    if (stepnumber == 1) {
                        var dob = $('#dob').val();
                        var gender = $('#gender').val();
                        var marital = $('#marital').val();
                        var nationality = $('#nationality').val();
                        var ca = $('#current_address').val();
                        var hyperlink = $('#hyperlink').val();
                        var about = $('#about').val();
                        var resume = $('#resume').val();
                        var photo = $('#photo').val();
                        var errors = 0;
                        if (dob == "") {
                            errors++;
                            $('.form-error-message-dob').html("Please input date of birth.");
                        } else {
                            $('.form-error-message-dob').html("");
                        }

//                        if (gender == "") {
//                            errors++;
//                            $('.form-error-message-gender').html("Please input gender.");
//                        } else {
//                            $('.form-error-message-gender').html("");
//                        }
                        
                        if ($("input:radio[name='gender']").is(":checked")) {
                            //write your code 
                            $('.form-error-message-gender').html("");
                        } else {
                            errors++;
                            $('.form-error-message-gender').html("Please select gender status.");
                        }

                        if ($("input:radio[name='marital']").is(":checked")) {
                            //write your code 
                            $('.form-error-message-marital').html("");
                        } else {
                            errors++;
                            $('.form-error-message-marital').html("Please select marital status.");
                        }

                        if (nationality == "") {
                            errors++;
                            $('.form-error-message-nationality').html("Please input nationality.");
                        } else {
                            $('.form-error-message-nationality').html("");
                        }

                        if (ca == "") {
                            errors++;
                            $('.form-error-message-ca').html("Please input current address.");
                        } else {
                            $('.form-error-message-ca').html("");
                        }

                        if (hyperlink == "") {
                            errors++;
                            $('.form-error-message-hyperlink').html("Please input Website link.");
                        } else {
                            $('.form-error-message-hyperlink').html("");
                        }

                        if (about == "") {
                            errors++;
                            $('.form-error-message-about').html("Please input About.");
                        } else {
                            $('.form-error-message-about').html("");
                        }

                        if (resume == "") {
                            errors++;
                            $('.form-error-message-resume').html("Please upload resume.");
                        } else {
                            $('.form-error-message-resume').html("");
                        }

                        if (photo == "") {
                            errors++;
                            $('.form-error-message-photo').html("Please upload photo.");
                        } else {
                            $('.form-error-message-photo').html("");
                        }

                        if (errors == 0) {
                            isStepValid = true;
                        }
                        return isStepValid;
                    }

                    if (stepnumber == 2) {
                        isStepValid = false;
                        var errors2 = 0;

                        var item_texts = $('input[name^=expInfo]').map(function (idx, elem) {
                            return $(elem).val();
                        }).get();

                        item_texts.forEach(function (entry) {
                            if (entry == '') {
                                errors2++;
                            }
                        });

                        if ((errors2) == 0) {
                            $('.form-error-message-experience').html('');
                        } else {
                            $('.form-error-message-experience').html('Table contails invalid entris, please correct and try again.');
                        }

                        if (errors2 == 0) {
                            isStepValid = true;
                        }
                        return isStepValid;
                    }


                    if (stepnumber == 3) {
                        isStepValid = false;
                        var errors3 = 0;

                        var item_texts = $('input[name^=educationInfo]').map(function (idx, elem) {
                            return $(elem).val();
                        }).get();

                        item_texts.forEach(function (entry) {
                            if (entry == '') {
                                errors3++;
                            }
                        });

                        if ((errors3) == 0) {
                            $('.form-error-message-education').html('');
                        } else {
                            $('.form-error-message-education').html('Table contails invalid entris, please correct and try again.');
                        }

                        if (errors3 == 0) {
                            isStepValid = true;
                        }
                        return isStepValid;
                    }


                    if (stepnumber == 4) {
                        isStepValid = false;
                        var errors4 = 0;

                        var item_texts = $('input[name^=skillsInfo]').map(function (idx, elem) {
                            return $(elem).val();
                        }).get();

                        item_texts.forEach(function (entry) {
                            if (entry == '') {
                                errors4++;
                            }
                        });

                        if ((errors4) == 0) {
                            $('.form-error-message-skills').html('');
                        } else {
                            $('.form-error-message-skills').html('Table contails invalid entris, please correct and try again.');
                        }

                        if (errors4 == 0) {
                            isStepValid = true;
                        }
                        return isStepValid;
                    }

                    if (stepnumber == 5) {
                        isStepValid = false;
                        var errors5 = 0;

//                        var item_texts = $('input[name^=certiInfo]').map(function (idx, elem) {
//                            return $(elem).val();
//                        }).get();
//
//                        item_texts.forEach(function (entry) {
//                            if (entry == '') {
//                                errors5++;
//                            }
//                        });

                        if ((errors5) == 0) {
                            $('.form-error-message-certi').html('');
                        } else {
                            $('.form-error-message-certi').html('Table contails invalid entris, please correct and try again.');
                        }

                        if (errors5 == 0) {
                            isStepValid = true;
                        }
                        return isStepValid;
                    }

                    if (stepnumber == 6) {
                        var fit = $('#fit').val();
                        var why = $('#why').val();
                        var fbf = $('#fbf').val();
                        var instaf = $('#instaf').val();
                        var linkf = $('#linkf').val();
                        var youf = $('#youf').val();
                        var twif = $('#twif').val();
                        var errors6 = 0;

                        if (fit == "") {
                            errors6++;
                            $('.form-error-message-fit').html("Please fill the field.");
                        } else {
                            $('.form-error-message-fit').html("");
                        }

                        if (why == "") {
                            errors6++;
                            $('.form-error-message-why').html("Please fill the field.");
                        } else {
                            $('.form-error-message-why').html("");
                        }

                        if (fbf == "") {
                            errors6++;
                            $('.form-error-message-fbf').html("Please fill the field.");
                        } else {
                            $('.form-error-message-fbf').html("");
                        }

                        if (instaf == "") {
                            errors6++;
                            $('.form-error-message-instaf').html("Please fill the field.");
                        } else {
                            $('.form-error-message-instaf').html("");
                        }

                        if (linkf == "") {
                            errors6++;
                            $('.form-error-message-linkf').html("Please fill the field.");
                        } else {
                            $('.form-error-message-linkf').html("");
                        }

                        if (youf == "") {
                            errors6++;
                            $('.form-error-message-youf').html("Please fill the field.");
                        } else {
                            $('.form-error-message-youf').html("");
                        }

                        if (twif == "") {
                            errors6++;
                            $('.form-error-message-twif').html("Please fill the field.");
                        } else {
                            $('.form-error-message-twif').html("");
                        }

                        if (errors6 == 0) {
                            isStepValid = true;
                        }
                        return isStepValid;
                    }

                }
                function validateAllSteps() {
                    var isStepValid = true;
                    // all step validation logic     
                    return isStepValid;
                }
                function alertFun() {
                    console.log("Submit form");
                    $('#infForm').submit();
                }

                $('.buttonNext').addClass('btn btn-success');
                $('.buttonPrevious').addClass('btn btn-primary');
                $('.buttonFinish').addClass('btn btn-default');
            });
        </script>
        <!-- iCheck --> 
        <script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script> 
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
        <!-- jQuery Smart Wizard -->

        <script type="text/javascript">
            $(document).ready(function () {
                var counter = 2;

                $("#addrowexp").on("click", function () {
                    var newRow = $("<tr>");
                    var cols = "";
                    cols += '<td>' + counter + '</td>';
                    cols += '<td><input type="text" class="form-control form-control-sm" name="expInfo[' + counter + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control form-control-sm" name="expInfo[' + counter + '][]"/></td>';
                    cols += '<td><input type="date" class="form-control form-control-sm" name="expInfo[' + counter + '][]"/></td>';
                    cols += '<td><input type="date" class="form-control form-control-sm" name="expInfo[' + counter + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control form-control-sm" name="expInfo[' + counter + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control form-control-sm" name="expInfo[' + counter + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control form-control-sm" name="expInfo[' + counter + '][]"/></td>';

                    cols += '<td><input type="button" class="ibtnDel btn btn-small btn-danger "  value="Delete"></td>';
                    newRow.append(cols);
                    $("table.experience").append(newRow);
                    counter++;
                });

                $("table.experience").on("click", ".ibtnDel", function (event) {
                    $(this).closest("tr").remove();
                    counter -= 1
                });

            });

            $(document).ready(function () {
                var counter = 2;

                $("#addrowedu").on("click", function () {
                    var newRow = $("<tr>");
                    var cols = "";
                    cols += '<td>' + counter + '</td>';
                    cols += '<td><input type="text" class="form-control form-control-sm" name="educationInfo[' + counter + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control form-control-sm" name="educationInfo[' + counter + '][]"/></td>';
                    cols += '<td><input type="date" class="form-control form-control-sm" name="educationInfo[' + counter + '][]"/></td>';
                    cols += '<td><input type="date" class="form-control form-control-sm" name="educationInfo[' + counter + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control form-control-sm" name="educationInfo[' + counter + '][]"/></td>';
                    cols += '<td><input type="button" class="ibtnDel btn btn-small btn-danger "  value="Delete"></td>';
                    newRow.append(cols);
                    $("table.education").append(newRow);
                    counter++;
                });

                $("table.education").on("click", ".ibtnDel", function (event) {
                    $(this).closest("tr").remove();
                    counter -= 1
                });

            });

            $(document).ready(function () {
                var counter = 2;

                $("#addrowskills").on("click", function () {
                    var newRow = $("<tr>");
                    var cols = "";
                    cols += '<td>' + counter + '</td>';
                    cols += '<td><input type="text" class="form-control form-control-sm" name="skillsInfo[' + counter + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control form-control-sm" name="skillsInfo[' + counter + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control form-control-sm" name="skillsInfo[' + counter + '][]"/></td>';

                    cols += '<td><input type="button" class="ibtnDel btn btn-small btn-danger "  value="Delete"></td>';
                    newRow.append(cols);
                    $("table.skills").append(newRow);
                    counter++;
                });

                $("table.skills").on("click", ".ibtnDel", function (event) {
                    $(this).closest("tr").remove();
                    counter -= 1
                });

            });


            $(document).ready(function () {
                var counter = 2;

                $("#addrowcerti").on("click", function () {
                    var newRow = $("<tr>");
                    var cols = "";
                    cols += '<td>' + counter + '</td>';
                    cols += '<td><input type="text" class="form-control form-control-sm" name="certiInfo[' + counter + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control form-control-sm" name="certiInfo[' + counter + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control form-control-sm" name="certiInfo[' + counter + '][]"/></td>';
                    cols += '<td><input type="date" class="form-control form-control-sm" name="certiInfo[' + counter + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control form-control-sm" name="certiInfo[' + counter + '][]"/></td>';

                    cols += '<td><input type="button" class="ibtnDel btn btn-small btn-danger "  value="Delete"></td>';
                    newRow.append(cols);
                    $("table.certi").append(newRow);
                    counter++;
                });

                $("table.certi").on("click", ".ibtnDel", function (event) {
                    $(this).closest("tr").remove();
                    counter -= 1
                });

            });
        </script>
    </body>

</html>