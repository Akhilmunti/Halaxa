<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        @include('recruitertheme.css')
    </head>

    <body>
        <!-- Main -->
        <div class="main">
            <div class="header">
                @include('recruitertheme.header')
            </div>
            <style>
                th {
                    padding: 3px;
                }
            </style>
            <div class="wrapper">
                <!-- Sidebar  -->
                <nav id="sidebar">
                    @include('recruitertheme.recruiter_sidebar')
                </nav>

                 <div id="content">
                    <div class="theme-card container-fluid">
                        <div id = 'error'>
                            @if(Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info alert-dismissible') }}" id="myalertstatus">{{ Session::get('message') }}
                            </p>
                            @endif
                        </div>
                        <div class="row">
                            <?php 
                                if(count($employerprofile) > 0){
                                    $profile = $employerprofile[0];
                                }else{
                                    $profile = array();
                                }
                            ?>
                            <div class="col-md-12">
                               <div class="p-5">
                                           <form action="editemployerprofile" method="post" id="mains" enctype="multipart/form-data">
                                                <div id="div_edit" style="min-height: 450px">
                                                    <h6><b>Recruiter Information</b></h6>
                                                
                                                    <div class="form-group row mt-4">
                                                        <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                        <input type="hidden" name="Address" value="<?php echo trim($profile->addline1); ?>" id="Address" required="">
                                                        <input type="hidden" name="About" value="<?php echo trim($profile->about); ?>" id="About" required="">
                                                        <label for="inputEmail3" class="col-md-3 col-form-label">
                                                            Company Name
                                                            <span class="form-required-icon">*</span>
                                                        </label>
                                                        <div class="col-md-5">
                                                            <input type="text" class="form-control form-rounded" name="companyname" id="companyname" value="<?php echo $profile->company ?>"/>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="col-md-10 offset-md-2 mt-3">
                                                            <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                        </div>
                                                    </div>
    
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-3 col-form-label">
                                                            Company Type 
                                                            <span class="form-required-icon">*</span>
                                                        </label>
                                                        <div class="col-md-9 mt-2">
                                                            <div class="form-check form-check-inline">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" id="companytype[1]" name="companytype" value="1" <?php if($profile->company_type==1) echo "checked"; ?>>
                                                                    <label class="custom-control-label" for="companytype[1]">Company</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" id="companytype[2]" name="companytype" value="2" <?php if($profile->company_type==2) echo "checked"; ?>>
                                                                    <label class="custom-control-label" for="companytype[2]">Recuritment Agency</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    
                                                    <div class="form-group row mt-4">
                                                        <label for="inputEmail3" class="col-md-3 col-form-label">
                                                            Pincode
                                                            <span class="form-required-icon">*</span>
                                                        </label>
                                                        <div class="col-md-5">
                                                            <input type="numeric" class="form-control form-rounded" name="pincode" id="pincode" onkeypress="return isOpningJob(event, this.id)" value="<?php echo $profile->pincode ?>"/>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="col-md-10 offset-md-2 mt-3">
                                                            <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row mt-4">
                                                        <label for="inputEmail3" class="col-md-3 col-form-label">
                                                            Website
                                                            <span class="form-required-icon">*</span>
                                                        </label>
                                                        <div class="col-md-5">
                                                            <input type="text" class="form-control form-rounded" name="website" id="website" value="<?php echo $profile->website ?>"/>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="col-md-10 offset-md-2 mt-3">
                                                            <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                        </div>
                                                    </div>
    
                                                    <div class="form-group row mt-4">
                                                        <label for="inputEmail3" class="col-md-3 col-form-label">
                                                            Address 
                                                            <span class="form-required-icon">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <textarea rows="5" type="number" class="form-control form-rounded-textarea" id="editor1" name="address" onChange="addAddressInfo(this.value);">
                                                                <?php echo trim($profile->addline1); ?>
                                                            </textarea>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="col-md-10 offset-md-2 mt-3">
                                                            <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                        </div>
                                                    </div>
    
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-3 col-form-label"> 
                                                            About Company
                                                            <span class="form-required-icon">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <textarea rows="5" type="number" class="form-control form-rounded-textarea" id="editor2" name="aboutcompany" onChange="addAboutInfo(this.value);">
                                                                <?php echo trim($profile->about); ?>
                                                            </textarea>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="col-md-10 offset-md-2 mt-3">
                                                            <span class="form-error-message text-danger text-danger" id="ItemRowError"></span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="text-right">
                                                        <span class="form-required-icon font-size-14"><i class="fa fa-asterisk"></i></span>
                                                        <span class="required-text">Required fields</span>
                                                        <hr class="hr-theme">
                                                    </div>
                                                    <div class="inner-footer">
                                                        <button type="submit" class="btn btn-theme-submit"><i class="fa fa-check mr-2"></i>Update Profile</button>   
                                                    </div>
                                                </div>
                                            </form> 
                                        
                                            <div id="div_view">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <span class="text-left"><h6><b>Recruiter Details</b></h6></span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span class="text-right">
                                                            <button type="button" class="btn btn-info float-right" onClick="enableEditProfile();"><i class="fa fa-save mr-2"></i>Edit Profile</button>
                                                        </span>
                                                    </div>
                                                </div>
                                                                                             
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Company Name
                                                                </p>
                                                            </th>
                                                            <td id="pJobTitle">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    <?php echo $profile->company ?>
                                                                </p>
                                                            </td>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Company Type
                                                                </p>
                                                            </th>
                                                            <td id="pAnnualMinPkg">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    <?php if ($profile->company_type == 1){ echo 'Company Recruter';} else{ echo 'Recuritment Agency'; } ?>
                                                                </p>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Pincode
                                                                </p>
                                                            </th>
                                                            <td id="pCompanyName">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Company Name
                                                                </p>
                                                            </td>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Website
                                                                </p>
                                                            </th>
                                                            <td id="pAnnualMaxPkg">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    <?php echo $profile->website ?>
                                                                </p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    Address

                                                                </p>
                                                            </th>
                                                            <td id="pMinExp">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    <?php echo trim($profile->addline1); ?>
                                                                </p>
                                                            </td>
                                                            <th>
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    
                                                                </p>
                                                            </th>
                                                            <td id="pCurrentPosition">
                                                                <p class="jobs-li-place text-justify p-info">
                                                                    
                                                                </p>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>

                                                <h6 class="h-info"><b>About Company</b></h6>
                                                <div id="pDescription">
                                                    <p class="p-info">
                                                        <?php echo trim($profile->about); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        <!-- End Main -->

        @include('recruitertheme.js')
         <script>
            $(document).ready(function () {
                /* SMART WIZARD */
                $("#div_edit").hide(); 
                $("#div_view").show(); 
            });
            
            function enableEditProfile(){
                $("#div_edit").show(); 
                $("#div_view").hide(); 
            }

        </script>
        
    <script>
      // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;
        return true;
    }
      
    function addAddressInfo(addressInfo) {
        $("#Address").val(addressInfo);
    }
      
    function addAboutInfo(aboutInfo) {
        $("#About").val(addressInfo);
    }
    </script>
      
    </body>

</html>