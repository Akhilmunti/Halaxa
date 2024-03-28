<!DOCTYPE html>
<html>

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IRS | Active Job Openings</title>
     @include('layouts.css')
</head>

<body class="nav-md">
    <div class="container body">
    <div class="main_container"> 

  @include('layouts.employer_sidebar')
  @include('layouts.header')

<div class="right_col" role="main" >
    
          <div class="page-title">
            <div class="title_left">
              <h3>Employer Profile</h3>
            </div>

            <div class="title_right">
              <div class="form-group pull-right top_search">
                <div class="input-group">
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Recruit</a></li>
                    <li class="active">Employer Profile</li>
                </ol></div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>


           
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profile</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form action="" method="post" id="main"> 
                             
                                      
                                         <div class="col-md-12">
		                            	    <div class="row">
                                          
                                                <div class="form-group col-md-6">
                                                   <label for="firstname">Job Title *</label>
                                                    <input type="text" class="form-control"  name="jobtitle" id="jobtitle" placeholder="Job Title">
                                                </div>
                                                <div class="form-group col-md-6">
                                                   <label for="Company Name">Company Name *</label>
                                                   <input type="text" class="form-control" id="Ccmpanyname" value="" name="Ccmpanyname" placeholder="Company Name" readonly>
                                                   <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                   <label for="editor1">Role Description</label>
                                                   <textarea id="editor1" name="description" class="form-control"   name="editor1" rows="10" cols="80">
                                                   </textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                   <label for="editor2">Role Requisites *</label>
                                                   <textarea id="editor2" name="role" class="form-control"  name="editor2" rows="10" cols="80" >
                                                   </textarea>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label for="Minimum years of experience">Minimum years of experience: <span class="badge">
                                                    <span id='minexpbadge'></span> Year/s</span> *</label>
                                                    <select name="minexp" id="minexp" class="form-control"  onChange="showmaxexprience()" >
                                                    <option value="">Select Min Experience</option>
                                                 
                                                    <option value=""></option>
                                                                      
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                   <label for="city">Max. Years of Exp:<span class="badge"><span id='maxyearexp'></span> Year/s</span> </label>
                                                    
                                                   <select class="form-control" name="maxexp" id="maxexp" >
                                                       
                                                    <option value="">Select Max Experience</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                        <label for="AddressLine1">Employment type:</label><br>
                                                         <input type="radio" class="flat" name="Employmenttype" id="Employmenttype"  value="1" checked="" style="position: absolute; opacity: 0; top: 0%; left: 0%;  margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px;" required />
                                                         Contract &nbsp;
                                                         <input type="radio" class="flat" name="Employmenttype" id="Employmenttype"  value="2"  style="position: absolute; opacity: 0; top: 0%; left: 0%;  margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; " />
                                                        Permanent
                                                        </div>
                                                <div class="form-group col-md-3">
                                                    <label for="AddressLine1">Currency:</label><br>
                                                       <input type="radio" class="flat" name="currency" id="currency"  value="INR" checked="" style="position: absolute; opacity: 0; top: 0%; left: 0%;  margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px;" required />
                                                    INR &nbsp;
                                                    <input type="radio" class="flat" name="currency"id="currency"  value="EUR"  style="position: absolute; opacity: 0; top: 0%; left: 0%;  margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; " />
                                                    EUR &nbsp;
                                                    <input type="radio" class="flat" name="currency"id="currency"  value="USD"  style="position: absolute; opacity: 0; top: 0%; left: 0%;  margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; " />
                                                    USD &nbsp;
                                                    <input type="radio" class="flat" name="currency"id="currency"  value="JPY"  style="position: absolute; opacity: 0; top: 0%; left: 0%;  margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; " />
                                                    JPY </div>
                                             </div>
                                             <div class="row">
                                                 <div class="form-group col-md-3">
                                                       <label for="Preferred Min. age">Preferred Min. age: <span class="badge"><span id='prefminagebadge'></span>Year/s</span> </label>
                                                            <select name="prefminage" id="prefminage" class="form-control" style="width: 100%;"  onChange="showpreferedmaxage()">
                                                            <option value="">Select Min. age</option>    
                                                         
                                                                <option value=""></option>
                                                                
                                                            </select>
                                                 </div>
                                                 <div class="form-group col-md-3">
                                                        <label for="Preferred Max. age">Preferred Max. age:  <span class="badge"><span id='prefmaxagebadge'></span> Year/s</span></label>
                                                            <select name="prefmaxage" id="prefmaxage" class="form-control" style="width: 100%;">
                                                                <option value="">Select Max. age</option>
                                                            </select>
                                                 </div>
                                                 <div class="form-group col-md-3">
                                                        <label for="minimum Years of Relevant Experience">Min Years of Relevant Experience: <span class="badge"><span id='minrelexpbadge'></span> Year/s</span> </label>
                                                            <select name="minrelexp" id="minrelexp" class="form-control" style="width: 100%;"   onChange="showreleventmaxexp()">
                                                            <option value="">Select Relevant Min Experience</option>    
                                                           
                                                                <option value=""></option>
                                                               
                                                            </select>
                                                  </div>
                                                    <div class="form-group col-md-3">
                                                       <label for="Maximum Years of Relevant Experience">Max Years of Relevant Experience: <span class="badge"><span id='maxrelexpbadge'></span>Year/s</span> </label>
                                              <select  name="maxrelexp" id="maxrelexp" class="form-control" style="width: 100%;">
                                              <option value="">Select Relevant Max Experience</option>
                                              </select>
                                                    </div>
                                                </div>
                                                                                                       
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label for="AnnualMinimumPackage">Annual Minimum Package *  <span class="text-danger" id="AnnualMinPkgID" ></span></label>
                                              <input type="text" name="annualminpkg" class="form-control" pattern="[0-9]{6}" id="annualminpkg" onChange ="compare();" onkeypress="javascript:return isNumber(event)" placeholder="Annual Minimum Package" >
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                         <label for="AnnualMaximumPackage">Annual Maximum Package * <span class="text-danger" id="AnnualMaxPkgID" ></span></label>
                                              <input type="text" name="annualmaxpkg"  id="annualmaxpkg"  onChange ="compare();" onkeypress="javascript:return isNumber(event)" class="form-control" placeholder="Annual Minimum Package">
                                                <div class="col-md-12" id="divpkg" style="float: bottom"> </div>
                                                    </div>
                                                      <br>
                                                    <div class="form-group col-md-4">
                                                      <input type="checkbox" class="flat" name="hidesalary" id="hidesalary" value="1" checked>
                                                        <label>Hide salary</label> &nbsp;
                                                         <input type="checkbox" class="flat" name="salarynotconstraint" id="salarynotconstraint" value="1"  checked>
                                                        <label>Salary is not a constraint</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="CompanyVideoUrl">Company Video Url</label>
                                                       <input type="url" name="companyvideourl" class="form-control" id="CompanyVideoUrl" placeholder="Company Video Url">
                                                    </div>


                                                    <div class="form-group col-md-3">
                                                       <label for="Current Position ">Current Position </label>
                                              <select name="currentposition" id="currentposition" class="form-control" style="width: 100%;" >
                                                
                                                 <option value="">Select Position</option>          
                              
                                <option value=""></option>
                                    
                                              </select>
                                                    </div>
                                                    <div class="form-group  col-md-3">
                                                       <label for="Service Tenure in the Current Position">Service Tenure in the Current Position:   <span class="badge"><span id='servicetenurebadge'></span> Year/s</span></label>
                                              <select name="servicetenure" id="servicetenure" class="form-control" style="width: 100%;"  >
                                              
                                                <option value=""></option>
                                               
                                              </select>
                                                    </div>
                                                </div>
                                         </div>

                                                <div class="col-md-12">                 
                                                <h3> Educational Qualifications/Academic Credentials :</h3>
                                           </div>
                                    <div class="row col-md-12">
                                                <div class="form-group col-md-3">
                                                    <label for="UGCourses">UG Courses*</label>
                                                      <select class="form-control" onChange="ShowUGStream()" id="UGCourses">
                                  <option value="">Select UG Course</option>          
                             
                                <option value=""></option>
                                 
                                              </select>
                                                </div>
                                                <div class="form-group  col-md-3">
                                                    <label for="UGStreams">&nbsp; </label>
                                                     <div id="UGStream" >
                                                     <select class="form-control" id="UGStreams" >
                                              </select>
                                               </div>
                                                </div>
                                                <div class="form-group">
                                                    <br>
                                                    <button class="btn btn-primary btn-sm" data-toggle="tooltip" title="Add UG!" id="Add_UG" onclick="addUG()" type="button"><i class="fa  fa-plus-circle"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="divUG"> </div>
                                          
                                            <div class="row col-md-12">
                                                <div class="form-group col-md-3">
                                                    <label for="PGCourses">PG Courses *</label>
                                                    <select class="form-control" id="PGCourses"  onChange="ShowPGStream()" style="width: 100%;">
                                                 <option value="">Select PG Course</option>         
                                
                                <option value=""></option>
                                   
                                              </select>
                                                </div>
                                                <div class="form-group  col-md-3">
                                                    <label for="PGStreams">&nbsp; </label>
                                                   <div id="PGStream" >
                                                   <select class="form-control"  id="PGStreams" style="width: 100%;"  >
                                              </select>
                                               </div>
                                                </div>
                                                <div class="form-group">
                                                    <br>
                                                    <button class="btn btn-primary btn-sm" data-toggle="tooltip" title="Add PG!" id="Add_PG" onclick="addPG()" type="button"><i class="fa  fa-plus-circle"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="divPG"></div>
                                          
                                            <div class="row col-md-12">
                                                <div class="form-group col-md-3">
                                                    <label for="DoctorateCourses">Doctorate Courses *</label>
                                                         <select class="form-control" id="DoctorateCourses"  onChange="ShowDOCTORATEStream()" style="width: 100%;">
                                                <option value="">Select Doctrate Course</option>          
                                
                                <option value=""></option>
                                 
                                              </select>
                                                </div>
                                                <div class="form-group  col-md-3">
                                                    <label for="DoctorateStreams"> &nbsp;</label>
                                                  <div id="DOCTORATEStream" >
                                                  <select class="form-control" id="DoctorateStreams" style="width: 100%;">
                                              </select>
                                            </div>
                                                </div>

                                                <div class="form-group">
                                                    <br>
                                                    <button class="btn btn-primary btn-sm" data-toggle="tooltip" title="Add Doctorate!"  id="Add_Doctorate" onclick="addDoctorate()" type="button"><i class="fa  fa-plus-circle"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="divDoctorate"> </div>
                                   

                                        <div class="col-md-12">
                                                <h3>Job Locations</h3>
                                       </div>
                                            <div class="form-group col-md-3">
                                                <label for="country">Country *</label>
                                              <select class="form-control" id="country"  onChange="ShowState()" style="width: 100%;">
                                                  <option value="">Select Country</option>          
                               
                                <option value=""></option>
                                  
                                              </select>
                                            </div>
                                            <div class="form-group col-offset-md-1 col-md-3">
                                                <label for="state">State *</label>
                                                 <div id="NewState" ><select class="form-control" id="state" style="width: 100%;">
                                              </select>
                                            </div>
                                         </div>
                                            <div class="form-group col-offset-md-1 col-md-3">
                                                <label for="City">City *</label>
                                               <input type="text" class="form-control" id="city" placeholder="City">
                                            </div>
                                          
                                            <div class="form-group col-md-1">
                                                 <br />
                                                <button class="btn btn-primary btn-sm" data-toggle="tooltip" title="Add Location!" id="Add_Location" type="button" onclick="addLocation()">
                                             <i class="fa  fa-plus-circle"></i></button>
                                            </div> 
                                            <div class="col-md-12" id="divLocation"></div>
                                                

                                      
                                            <div class="form-group col-md-4">
                                                <label for="AnnualMinimumPackage">Industry *</label>
                                              <select class="form-control" name="industry" id="industry" style="width: 100%;">
                                                  <option value="">Select Industry</option>         
                               
                                <option value=""></option>
                                    
                                              </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="AnnualMinimumPackage">Functional area *</label>
                                                 <select class="form-control" name="functionalarea" id="FunctionRole" onChange="FunctionalJobRole()" style="width: 100%;"> 
                                                <option value="">Select Functional Area</option>          
                                 
                                <option value=""></option>
                                    
                                              </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="AnnualMinimumPackage">Job role *</label>
                                               <div id="FunctionalRole" >
                                                <select class="form-control" name="jobrole" id="jobrole" style="width: 100%;">
                                              </select>
                                            </div>
                                            </div>
                                            <div class="row col-md-12">
                                                <div class="form-group col-md-6">
                                                    <label for="editor3">Company/ Project brief *</label>
                                                    <textarea id="editor3" name="brief" rows="10" cols="80">
                                          Coming out of the Middle East and aiming to be one of the international leaders in developing web products and ecommerce portals, the Mivim concept was established.
                                      </textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="editor4">Comments (if any- optional)</label>
                                                    <textarea id="editor4" name="comment" rows="10" cols="80">
                                        </textarea>
                                                </div>
                                            </div>

                                             <div class="col-md-12">
                                            <h3>Recruiter Contact Details:</h3>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="Name">Name *</label>
                                                    <input type="text" name="recruitername" class="form-control" id="Name" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="EmailAddress">Email Address *</label>
                                                    <input type="email"  name="recruiteremail" class="form-control" id="EmailAddress" placeholder="Email Address" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="PhoneNumber">Phone Number *</label>
                                                    <input type="text"  name="recruiterphone" class="form-control"  id="PhoneNumber" onkeypress="javascript:return isNumber(event)" placeholder="Phone Number">
                                                </div>
                                            </div>
                                 </div>
                                 <div class="col-md-12">
                                 <hr/>
                      <button class="btn btn-success pull-right">Update</button>
                      <button class="btn btn-default pull-left  ">Previous</button>
</div>
                                 </form>
                    </div>
</div>
</div>
                                                </div>
                                                </div>
</div>
                   

      		 
               
@include('layouts.footer')       
</div>
@include('layouts.js')
<!-- ./wrapper -->
</body>

  <script>
        $(function() {
            //Initialize Select2 Elements
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            CKEDITOR.replace('editor2')
            CKEDITOR.replace('editor3')
            CKEDITOR.replace('editor4')
            // CKEDITOR.replace('editor5')
                //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
</html>
<!-- page script -->
