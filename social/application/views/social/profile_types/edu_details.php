<div class="panel panel-default">
    <div class="panel-heading">
        <a style="font-size: 25px">Educational Details</a>
        <a data-toggle="modal" data-target=".bs-example-modal-Education" class="btn btn-sm btn-success" style="float: right"><i class="fa fa-plus"></i> Add Educational</a>
        <div class="clearfix"></div>
    </div>
    <div id="collapse2" class="panel-collapse collapse in">
        <div class="panel-body">
            <?php
            if (!empty($irs_js_edu)) {
                $iter = 0;
                foreach ($irs_js_edu as $key => $edu) {
                    $iter++;
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h3><?php echo $edu['education_type']; ?> - <?php echo $edu['course']; ?></h3>
                        </div>

                        <div class="col-md-6">
                            <table class="table-striped table table-responsive">
                                <tbody>
                                    <tr>
                                        <td>
                                            Education Type : <?php echo $edu['education_type']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Medium : <?php echo $edu['medium']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            University : <?php echo $edu['university']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Country : <?php echo $edu['country']; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                        <div class="col-md-6">
                            <table class="table-striped table table-responsive">
                                <tbody>
                                    <tr>
                                        <td>Courses : <?php echo $edu['course']; ?>
                                    </tr>   
                                    <tr>
                                        <td>Year : <?php echo $edu['year_from'] . "-" . $edu['year_to']; ?>
                                    </tr> 
                                    <tr>
                                        <td>Stream : <?php echo $edu['specialization']; ?>
                                    </tr>
                                    <tr>
                                        <td>City : <?php echo $edu['city']; ?>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
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

<!-- Education Details Modal -->
<div class="" id="wizardProfile">
    <form id="Educationaldetail" method="POST" action="<?php echo base_url() . "profile/addJsEduData/"; ?><?php echo $job_seeker_id; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
        <div class="modal fade bs-example-modal-Education">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×
                            </span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Educational Details
                        </h4>
                    </div>
                    <div class="modal-body">
                        <h4>
                            <b>Educational Qualifications
                            </b>
                            <!-- <button class="btn btn-success btn-sm pull-right add-more add-AddEducation"  type="button"  title="Add Education"  id=""><i class="fa  fa-plus-circle"></i></button> -->
                        </h4>
                        <br/>
                        <div class="row">
                            <input type = "hidden" name="_token" value="REHyK8ZURP7MsyNjw3w82MnLqTujSZ2aBl5xD2Kq">
                            <div class="form-group  col-md-4">
                                <label for="">Education Type 
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <select class="form-control select2" id="type0" name="educationtype" onChange="ShowCourse(0)" style="width:100%" required="" >
                                    <!-- 0 for add and 1 for edit -->
                                    <option value="">Select Type
                                    </option>
                                    <option value="UG">UG
                                    </option>
                                    <option value="PG">PG
                                    </option>
                                    <option value="PPG">PPG
                                    </option>
                                </select>
                                <label id="type0-error" class="error" for="type0">
                                </label> 
                            </div>  
                            <div class="form-group col-md-4">
                                <label for="">Education Courses 
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <div id="courses0" >
                                    <select class="form-control select2" name="courses"  id="courses" style="width:100%" required="">
                                        <option value="">Select Course
                                        </option>         
                                    </select>
                                </div>
                                <label id="courses0-error" class="error" for="courses0">
                                </label>
                            </div>
                            <div class="form-group  col-md-4">
                                <label for="">&nbsp; 
                                </label>
                                <div id="stream0" >
                                    <select class="form-control select2" id="subcourses" name="sub" style="width:100%" required="">
                                        <option value="">Select Stream</option>
                                    </select>
                                </div>
                                <label id="sub-error" class="error" for="sub0"></label>
                                </label>
                            </div> 
                        </div> 
                        <div class="row after-add-more">
                            <div class="form-group col-md-3">
                                <label for="">Medium 
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <select class="form-control select2" id="medium0" name="medium" onChange = "removeerrormedium0()"  style="width:100%" required="">
                                    <option value="">Select Medium
                                    </option>
                                    <option value="Hindi">Hindi
                                    </option>
                                    <option value="English">English
                                    </option>
                                </select>
                                <label id="medium0-error" class="error" for="medium0">
                                </label>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">University 
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <input type="text" class="form-control" id="university"  name="university" placeholder="University" required="">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Year From 
                                    <span class="requerd">* 
                                    </span>
                                </label>
                                <input class="form-control" id="yearfromaddedu" name="yearfromeducation" placeholder="MM/YYYY" type="text" onChange="removeerroryearformeducation()"   required=""/>
                                <span id="yearfromaddedu-error" class="error" for="yearfromaddedu">
                                </span>
                            </div>
                            <div class=" form-group col-md-3">
                                <label for="">Year To 
                                    <span class="requerd">* 
                                    </span>
                                </label>

                                <input class="form-control" id="yeartoaddedu" name="yeartoeducation" placeholder="MM/YYYY" type="text" onChange="removeerroryeartoeducation()"   required=""/>
                                <span id="yeartoaddedu-error" class="error" for="yeartoaddedu">
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="country">Country 
                                    <span class="requerd">*
                                    </span>
                                </label>
                                <select class="form-control select2" id="CountryAddEdu" name="countryAddEdu" onChange="ShowState('AddEdu');" style="width: 100%;">
                                    <option value="">Select Country
                                    </option>          
                                    <?php
                                    foreach ($countries as $loc) {
                                        echo "<option value='" . $loc['location_id'] . "'>" . $loc['name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-offset-md-1 col-md-4">
                                <label for="state">State 
                                    <span class="requerd">*
                                    </span>
                                </label>
                                <div id="NewStateAddEdu">
                                    <select class="form-control select2" id="stateAddEdu" name="stateAddEdu" onChange="ShowCity('AddEdu');"  style="width: 100%;" >
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
                                <div id="NewCityAddEdu">
                                    <select class="form-control select2" id="cityAddEdu" name="cityAddEdu" style="width: 100%;" >
                                    </select>
                                </div>
                                <label id="city-error" class="error" for="city">
                                </label>
                            </div>
                        </div>
                    </div>                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success right-float">Submit</button>
                        <button class="btn btn-primary" type="button" class="close" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Education Details Modal End -->