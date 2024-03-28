<!DOCTYPE html>
<html>
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>IRS | Edit Job Posting</title>
        @include('layouts.css')
        <link href="<?php echo url('/'); ?>/public/External/assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />
        <link href="<?php echo url('/'); ?>/public/External/assets/css/themify-icons.css" rel="stylesheet">
      <!--   <link href="<?php echo url('/'); ?>/public/External/css/loader.css" rel="stylesheet">  -->

     
    </head>
    <script type="text/javascript">
      var ugarraylocalstorage = [];
      var pgarraylocalstorage = [];
      var ppgarraylocalstorage = [];
      var locationarraylocalstorage = [];
    </script>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container"> 
                @include('layouts.employer_sidebar')
                @include('layouts.header')
                <div class="right_col" role="main" >
                <div class="">
                    <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Edit Job Posting</h3>
                        </div>
                        <div class="title_right">
                            <div class="form-group pull-right top_search">
                                <div class="input-group">
                                    <ol class="breadcrumb">
                                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                                        <li class="active">Edit Job Posting </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
           
                    <div class="panel panel-default ">
                      <div class="panel-body ">
		                <div class="card wizard-card" data-color="orange" id="wizardProfile">
		                     <form action="" method="post" id="main"> 
                             	<div class="wizard-header text-center">
		                    	</div>
                          <div id = 'error'></div>
								<div class="wizard-navigation">
									<div class="progress-with-circle">
									     <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                   
									</div>
									<ul>
			                            <li>
											<a href="#about" data-toggle="tab" >
												<div class="icon-circle">
                              <i class="ti-user"></i>               
												</div>
                                               
                                            </a>
                                            <p style="margin-top: -20px;">JOB POSTING FORM</p>
										</li>
			                            <li>
											<a href="#account" data-toggle="tab" onclick="addValidations()">
												<div class="icon-circle" >
													<i class="ti-settings" ></i>
												</div>
                                               
                                            </a>
                                            <p style="margin-top: -20px;">ASSIGN JOB BOARDS</p>
										</li>
			                            <li>
											<a href="#address" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-map"></i>
												</div>
											
                                            </a>
                                            <p style="margin-top: -20px;">PREVIEW AND POST</p>
										</li>
			                        </ul>
                                </div>
                                <div class="tab-content">
		                            <div class="tab-pane" id="about">
                                         <hr/>
                                         <?php  foreach ($Job as $Jobsdata) { ?>
                                         
                                          <div class="col-md-12">
                                            <div class="row"> 
                            <div class="col-md-12">                
                              <h3> Job Summary
                              </h3>
                            </div>
                          </div>
                                        <div class="row">
                                         
                                          
                                         
                                                <div class="form-group col-md-6">
                                                   <label for="firstname">Job Title <span class="requerd">*</span></label>
                                                   <input type="hidden" value="EDIT" Name="PAGENAME" id="PAGENAME" readonly="">
                                                   <input type="hidden" value="<?php echo $Jobsdata->id ?>" Name="JOBID" id="JOBID">
                                                    <input type="text" class="form-control autocomplete" value="<?php echo $Jobsdata->jobtitle ?>" name="jobtitle" id="jobtitle" onkeypress="return checkQuote();" required=""/>
                                                   
                                                     <label id="jobtitle-error" class="error" for="jobtitle">
                                                     </label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                   <label for="Company Name">Company Name <span class="requerd">*</span></label>
                                                   <input type="text" class="form-control" id="Ccmpanyname" value="<?php echo $company_name ?>" name="Ccmpanyname" placeholder="Company Name" readonly >
                                                   <div class="help-block with-errors"></div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                   <label for="editor1">Role Description <span class="requerd">*</span></label>
                                                   <div contenteditable="true" id="editor1"  class=".custom_scrollbar page"  style="border: 1px solid; border-color:#d2d6de; padding: 0px 5px 0px 5px; min-height:120px;">
                                                      <div ><?php  echo $Jobsdata->description; ?>
                                                   <textarea name="description" id="description"   class="form-control" value="<?php echo $Jobsdata->description ?>" rows="10" cols="80">
                                                   </textarea>
                                                </div>
                                          </div><div id="rd-error"></div>
                                          </div>
                                                <div class="form-group col-md-6">
                                                   <label for="editor2">Role Requisites <span class="requerd">*</span></label>
                                                   <div contenteditable="true" id="editor2"  class=".custom_scrollbar page"  style="border: 1px solid; border-color:#d2d6de; padding: 0px 5px 0px 5px; min-height:120px;">
                                                      <div ><?php   echo $Jobsdata->keyskills; ?>
                                                   <textarea name="role" class="form-control"  rows="10" cols="80" onChange="removeerrorrr()">
                                                   </textarea>
                                                </div>
                                            </div><div id="rr-error"></div>
                                          </div>
                                          </div>
                                             <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label for="Minimum years of experience">Min Years of Exp: <span class="requerd">*</span> <span class="badge">
                                                    <span id='minexpbadge'></span> Year/s</span>  </label>
                                                    <select name="minexp" id="minexp" class="form-control select2" style="width: 100%;" onChange="showmaxexprience()" required="">
                                                  
                                                    <option value="">Select Min Experience</option>
                                                     <option value="0"  <?php if($Jobsdata->min_years==0) echo "Selected" ?>>0</option>

                                                     <?php   for( $i = 1; $i<=30; $i++ ) {?>
                            
                                                    <option value="<?php echo $i ?>" <?php if($i==$Jobsdata->min_years) echo "Selected" ?>><?php echo $i ?></option>
                                                        <?php  } ?>                                  
                                                    </select><label id="minexp-error" class="error" for="minexp"></label>
                                                </div>
                                                <div class="form-group col-md-3">
                                                   <label for="city">Max. Years of Exp: <span class="requerd">*</span> <span class="badge"><span id='maxyearexp'></span> Year/s</span> </label>
                                                    
                                                   <select class="form-control select2" name="maxexp" id="maxexp" style="width: 100%;" onChange="removeerroemaxexp()" required="">
                                                
                                                    <option value="">Select Max Experience</option>
                                                       <?php   for( $i = intval($Jobsdata->min_years)+1; $i<=intval($Jobsdata->min_years)+10; $i++ ) { ?>
                            
                                                    <option class="maxexprienceoption" value="<?php echo $i ?>" <?php if($i==$Jobsdata->max_years) echo "Selected" ?>><?php echo $i ?></option>
                                                        <?php  } ?>
                                                    </select><label id="maxexp-error" class="error" for="maxexp"></label>
                                                </div>
                                                <div class="form-group col-md-3">
                                                        <label for="AddressLine1">Employment type: <span class="requerd">*</span></label><br>
                                                         <input type="radio" class="flat" name="Employmenttype" id="Employmenttype"  value="1" <?php if($Jobsdata->type==1) echo "checked"; ?> style="position: absolute; opacity: 0; top: 0%; left: 0%;  margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px;" required />
                                                         Contract &nbsp;
                                                         <input type="radio" class="flat" name="Employmenttype" id="Employmenttype"  value="2" <?php if($Jobsdata->type==2) echo "checked"; ?> style="position: absolute; opacity: 0; top: 0%; left: 0%;  margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; " />
                                                        Permanent
                                                        </div>
                                                <div class="form-group col-md-3">
                                                    <label for="AddressLine1">Currency: <span class="requerd">*</span></label><br>


                                           <?php foreach ($Currency as $currency) {
                                                      ?>  <input type="radio" class="flat" name="currency" id="currency"  value="<?php echo $currency->ccode; ?>" <?php if($Jobsdata->currency_type==$currency->ccode) echo "checked"; ?>  style="position: absolute; opacity: 0; top: 0%; left: 0%;  margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px;" required />
                                                    <?php echo $currency->ccode; ?>
                                                  <?php } ?>
                                </div>
                                             </div>
                                             <div class="row">
                                                 <div class="form-group col-md-3">
                                                       <label for="Preferred Min. age">Preferred Min. age: <span class="badge"><span id='prefminagebadge'></span>Year/s</span> </label>
                                                            <select name="prefminage" id="prefminage" class="form-control select2" style="width: 100%;"  onChange="showpreferedmaxage()">
                                                    
                                                            <option value="">Select Min. age</option>    
                                                            <?php   for( $i = 18; $i<=70; $i++ ) { ?>

                                                                <option value="<?php echo $i ?>" <?php if($i==$Jobsdata->pref_min_age) echo "Selected" ?>><?php echo $i ?></option>
                                                                <?php  } ?>
                                                            </select>
                                                 </div>
                                                 <div class="form-group col-md-3">
                                                        <label for="Preferred Max. age">Preferred Max. age:  <span class="badge"><span id='prefmaxagebadge'></span> Year/s</span></label>
                                                            <select name="prefmaxage" id="prefmaxage" class="form-control select2" style="width: 100%;">
                                                   
                                                    <option value="">Select Max. age</option>
                                                     
                                                     <?php   for( $i = intval($Jobsdata->pref_min_age)+1; $i<=70; $i++ ) {?>
                            
                                                    <option class="preferedmaxageoption" value="<?php echo $i ?>" <?php if($i==$Jobsdata->pref_max_age) echo "Selected" ?>><?php echo $i ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                 </div>
                                                 <div class="form-group col-md-3">
                                                        <label for="minimum Years of Relevant Experience">Min Years of Rel Exp: <span class="badge"><span id='minrelexpbadge'></span> Year/s</span> </label>
                                                            <select name="minrelexp" id="minrelexp" class="form-control select2" style="width: 100%;"   onChange="showreleventmaxexp()">
                                                    
                                                            <option value="">Select Rel. Min Expe.</option>
                                                             <option value="0"  <?php if($Jobsdata->rel_min_years==0) echo "Selected" ?>>0</option>    
                                                            <?php   for( $i = 1; $i<=30; $i++ ) {?>
                                                              

                                                                 <option value="<?php echo $i ?>" <?php if($i==$Jobsdata->rel_min_years) echo "Selected" ?>><?php echo $i ?></option>
                                                               <?php } ?>
                                                            </select>
                                                  </div>
                                                    <div class="form-group col-md-3">
                                                       <label for="Maximum Years of Relevant Experience">Max Years of Rel Exp: <span class="badge"><span id='maxrelexpbadge'></span>Year/s</span> </label>
                                              <select  name="maxrelexp" id="maxrelexp" class="form-control select2" style="width: 100%;">
                                                    
                                                  
                                              <option value="">Select Rel.evant Max Exp.</option>
                                              <?php   for( $i = intval($Jobsdata->rel_min_years)+1; $i<=intval($Jobsdata->rel_min_years)+10; $i++ ) { ?>
                            
                                                    <option class="releventmaxexpoption" value="<?php echo $i ?>" <?php if($i==$Jobsdata->rel_max_years) echo "Selected" ?> ><?php echo $i ?></option>
                                                        <?php  } ?>

                                              </select>
                                                    </div>
                                                </div>
                                                                                                       
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                      
                                                        <label for="AnnualMinimumPackage">Annual Min. Package <span class="requerd">*</span>  <span class="text-danger" id="AnnualMinPkgID" ></span></label>
                                              
                                              <select name="annualminpkg" class="form-control select2" id="annualminpkg"  style="width: 100%;" onChange="ShowMaxAnnualIncome()"  required="">
                                                
                                                <option value="">Select Min Annual Income</option>
                                                <?php if($Jobsdata->currency_type == 'INR'){ ?>

                                                      <option class='minannualincome' value='12477' <?php if(strlen($Jobsdata->min_salary)>0){ if($Jobsdata->min_salary==12477){ echo "Selected"; } } ?> >Less than 50000</option>
                                                      <?php for($x=50000;$x<=100000;$x=$x+10000){ ?>
                                                          <option class='minannualincome' value='<?php echo $x ?>'<?php if(strlen($Jobsdata->min_salary)>0){ if($Jobsdata->min_salary==$x){ echo "Selected"; } } ?> > <?php echo number_format($x) ?> </option>
                                                       <?php  } 
                                                        for($y=125000;$y<=500000;$y=$y+25000){ ?>
                                                          <option class='minannualincome' value='<?php echo $y ?>' <?php if(strlen($Jobsdata->min_salary)>0){ if($Jobsdata->min_salary==$y){ echo "Selected"; } } ?> > <?php echo number_format($y) ?></option>
                                                        <?php } 
                                                        for($z=550000;$z<=1000000;$z=$z+50000){ ?>
                                                          <option class='minannualincome' value='<?php echo $z ?>'
                                                            <?php if(strlen($Jobsdata->min_salary)>0){ if($Jobsdata->min_salary==$z){ echo "Selected"; } } ?> ><?php echo number_format($z) ?> </option>
                                                       <?php } 
                                                        for($p=1100000;$p<=2000000;$p=$p+100000){ ?>
                                                          <option class='minannualincome' value='<?php echo $p ?>'
                                                            <?php if(strlen($Jobsdata->min_salary)>0){ if($Jobsdata->min_salary==$p){ echo "Selected"; } } ?> > <?php echo number_format($p) ?></option>
                                                        <?php } 
                                                        for($q=2250000;$q<=4000000;$q=$q+250000){ ?>
                                                          <option class='minannualincome' value='<?php echo $q ?>'
                                                          <?php if(strlen($Jobsdata->min_salary)>0){ if($Jobsdata->min_salary==$q){ echo "Selected"; } } ?> > <?php echo number_format($q) ?></option>
                                                       <?php } 
                                                         for($r=4500000;$r<=9500000;$r=$r+500000){ ?>
                                                           <option class='minannualincome' value='<?php echo $r ?>'
                                                            <?php if(strlen($Jobsdata->min_salary)>0){ if($Jobsdata->min_salary==$r){ echo "Selected"; } } ?> > <?php echo number_format($r) ?></option>
                                                      <?php  } ?>
                                                        <option class='minannualincome' value='10000000' <?php if(strlen($Jobsdata->min_salary)>0){ if($Jobsdata->min_salary==10000000){ echo "Selected"; } } ?> >  100,00,000 & above </option>
                                                <?php  } 
                                               else if($Jobsdata->currency_type=='USD'){ ?>
                                                    <option class='minannualincome' value='786'<?php if(strlen($Jobsdata->min_salary)>0){ if($Jobsdata->min_salary==786){ echo "Selected"; } } ?> > Less than 5,000 </option>
                                                    <?php  for($x=5000;$x<=100000;$x=$x+5000){ ?>
                                                             <option class='minannualincome' value='<?php echo $x ?>' <?php if(strlen($Jobsdata->min_salary)>0){ if($Jobsdata->min_salary==$x){ echo "Selected"; } } ?> ><?php echo number_format($x) ?></option>"
                                                  <?php  } ?>
                                                    <option class='minannualincome' value='10000000' <?php if(strlen($Jobsdata->min_salary)>0){ if($Jobsdata->min_salary==10000000){ echo "Selected"; } } ?> >100,000 & above </option>
                                              <?php  } 
                                              else{

                                              } ?>
                                                  
                                              </select>
                                              <label id="annualminpkg-error" class="error" for="annualminpkg"></label>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                         <label for="AnnualMaximumPackage">Annual Max. Package<span class="requerd">*</span><span class="text-danger" id="AnnualMaxPkgID" ></span></label>
                                              <select name="annualmaxpkg"  id="annualmaxpkg" class="form-control select2" required="" onChange="removeerrorannualmaxpkg()" style="width: 100%;">
                                                <option value="">Select Min Annual Income</option>
                                                <?php if(strlen($Jobsdata->min_salary)>0){ 
                                                 $incomearray = array();
                                                if($Jobsdata->currency_type=='USD'){
                                                  
                                                    array_push($incomearray, 786);
                                                    for($x=5000;$x<=100000;$x=$x+5000){
                                                      array_push($incomearray, $x);
                                                    } 
                                                    array_push($incomearray, 10000000);
                                                     $minpkg = (int)$Jobsdata->min_salary;
                                                     $minvalueindex = array_search($minpkg, $incomearray);
                                                     $maxlimit = $minvalueindex+2;
                                                      if($maxlimit>=count($incomearray)-1){
                                                          $maxlimit=count($incomearray)-1;
                                                      }
                                                    for($i=$minvalueindex; $i<=$maxlimit; $i++){
                                                      if($i == 0){ ?>
                                                        <option class='maxannualincome' value='<?php echo $incomearray[$i] ?>' <?php if($Jobsdata->max_salary==$incomearray[$i]) echo "Selected" ?> >Less than 5,000</option>
                                                     <?php }
                                                      else if($i==count($incomearray)-1){ ?>
                                                        <option class='maxannualincome' value='<?php echo $incomearray[$i] ?>' <?php if($Jobsdata->max_salary==$incomearray[$i]) echo "Selected" ?> >100,000 & above</option>"
                                                     <?php }
                                                      else{ ?>
                                                        <option class='maxannualincome' value='<?php echo $incomearray[$i] ?>' <?php if($Jobsdata->max_salary==$incomearray[$i]) echo "Selected" ?> ><?php echo $incomearray[$i] ?></option>"
                                                     <?php }
                                                    }
                                                  }

                                                  else if($Jobsdata->currency_type=='INR'){
                                                  array_push($incomearray,12477);
                                                  for($x=50000;$x<=100000;$x=$x+10000){
                                                      array_push($incomearray, $x);  
                                                  } 
                                                  for($y=125000;$y<=500000;$y=$y+25000){
                                                     array_push($incomearray, $y );  
                                                  } 
                                                  for($z=550000;$z<=1000000;$z=$z+50000){
                                                    array_push($incomearray, $z ); 
                                                  } 
                                                  for($p=1100000;$p<=2000000;$p=$p+100000){
                                                    array_push($incomearray, $p );   
                                                  } 
                                                  for($q=2250000;$q<=4000000;$q=$q+250000){
                                                    array_push($incomearray, $q );  
                                                  } 
                                                   for($r=4500000;$r<=9500000;$r=$r+500000){
                                                      array_push($incomearray, $r );
                                                  }
                                                  array_push($incomearray,10000000);
                                                   $minpkg = (int)$Jobsdata->min_salary;
                                                  $minvalueindex = array_search($minpkg, $incomearray);
                                                  $maxlimit = $minvalueindex+5;
                                                  if($maxlimit>=count($incomearray)-1){
                                                     $maxlimit=count($incomearray)-1;
                                                  }

                                                  for($i=$minvalueindex;$i<=$maxlimit;$i++){
                                                    if($i == 0){ ?>
                                                      <option class='maxannualincome' value='<?php echo $incomearray[$i] ?>' <?php if($Jobsdata->max_salary==$incomearray[$i]) echo "Selected" ?> >Less than 50,000</option>
                                                   <?php }
                                                    else if($i == count($incomearray)-1){ ?>
                                                      <option class='maxannualincome' value='<?php echo $incomearray[$i] ?>' <?php if($Jobsdata->max_salary==$incomearray[$i]) echo "Selected" ?> >100,00,000 & above</option>
                                                   <?php }
                                                    else{ ?>
                                                    <option class='maxannualincome' value='<?php echo $incomearray[$i] ?>' <?php if($Jobsdata->max_salary==$incomearray[$i]) echo "Selected" ?> ><?php echo $incomearray[$i] ?></option>
                                                   <?php }
                                                  }
                                                }
                                                else{

                                                } } ?>
                                              </select>
                                              <label id="annualmaxpkg-error" class="error" for="annualmaxpkg"></label>
                                                <div class="col-md-12" id="divpkg" style="float: bottom"> </div>
                                                    </div>
                                                      <div class="form-group col-md-3">
                                      <label for="">No. of Job Opening 
                                       <span class="requerd">*
                                </span></label>
                                      <input type="text"  name="jobopning" class="form-control"  id="jobopning" min="1" max="1000" onkeypress="return isOpningJob(event,this.id)" value="<?php echo $Jobsdata->number_of_vacancies ?>" placeholder="Enter No. of Job Opening" required="">
                                    </div>
                                                      <br>
                                                    <div class="form-group col-md-3">
                                              <input type="checkbox" class="flat" name="hidesalary" id="hidesalary" <?php if($Jobsdata->hidesalary == "1"){ ?> value= "1" checked <?php } else { ?>value = "0" <?php } ?>>
                                                        <label>Hide salary</label> &nbsp;
                                                         <input type="checkbox" class="flat" name="salarynotconstraint" id="salarynotconstraint" <?php if($Jobsdata->salarynotconstraint == "1"){ ?> value= "1" checked <?php } else { ?>value = "0" <?php } ?>>
                                                        <label>Salary is not a constraint</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="CompanyVideoUrl">Company Url</label>
                                                       <input type="text" name="companyvideourl" class="form-control" id="CompanyVideoUrl" placeholder="Company Url"  value="<?php echo $Jobsdata->videourl ?>"  onblur="checkURL(this)">
                                                    </div>


                                                    <div class="form-group col-md-3">
                                                       <label for="Current Position ">Current Position <span class="requerd">*</span></label>
                                        
                                              <input type="text" class="form-control autocomplete" value="<?php echo $Jobsdata->positioncriteria ?>" name="currentposition" onkeypress="return checkQuote();" id="currentposition" required=""/>
                                              <label id="currentposition-error" class="error" for="currentposition"></label>
                                                    </div>
                                                    <div class="form-group  col-md-5">
                                                       <label for="Service Tenure in the Current Position">Service Tenure in the Cur. Position: <span class="badge"><span id='servicetenurebadge'></span> Year/s</span></label>
                                              <select name="servicetenure" id="servicetenure" class="form-control select2" style="width: 100%;">
                                                    

                                                <?php   for( $i = 1; $i<=100; $i++ ) { ?>
                                                <option value="<?php echo $i ?>" <?php if($i==$Jobsdata->servicetenure) echo "Selected" ?>><?php echo $i ?></option>
                                                <?php  } ?>
                                              </select>
                                                    </div>
                                                </div>


                                                 <div class="row">
                                      
                                            <div class="form-group col-md-4">
                                                <label for="AnnualMinimumPackage">Industry <span class="requerd">*</span></label>
                                              <select class="form-control select2" name="industry" id="industry" style="width: 100%;" onChange="removeerroeindustry()" required="">
                                                
                                                  <option value="">Select Industry</option>         
                                 <?php foreach ($Jobs_seed_data_Industry as $user7) { ?>
                               
                                <option value="<?php echo $user7->id?> -- <?php echo $user7->value?>"<?php if($user7->id==$Jobsdata->industry) echo "Selected" ?>><?php echo $user7->value?></option>
                                     <?php } ?>
                                              </select><label id="industry-error" class="error" for="industry">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="AnnualMinimumPackage">Functional area <span class="requerd">*</span></label>
                                                 <select class="form-control select2" name="functionalarea" id="FunctionRole" onChange="FunctionalJobRole()" style="width: 100%;" required="">

                                                <option value="">Select Functional Area</option>          
                                 <?php foreach ($Jobs_seed_data_Functional_Area as $user8) { ?>
                                <option value="<?php echo $user8->id?> -- <?php echo $user8->value?>"<?php if($user8->id==$Jobsdata->functional_area) echo "Selected" ?>><?php echo $user8->value?></option>
                                     <?php } ?>
                                              </select><label id="FunctionRole-error" class="error" for="FunctionRole"></label>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="AnnualMinimumPackage">Job role <span class="requerd">*</span></label>
                                               <div id="FunctionalRole" >
                                                <select class="form-control select2" name="jobrole" id="jobrole" style="width: 100%;" required="">
                                                   
                                                    <option value="">Select Job role</option> 
                                                
                                                <?php foreach ($JobRolesShowing as $jobroles) { ?>
                                                <option value="<?php echo $jobroles->id ?> -- <?php echo $jobroles->value?>" <?php if($jobroles->id==$Jobsdata->role) echo "Selected"?>><?php echo $jobroles->value?></option>

                                              <?php  } ?>
                                              
                                              </select>
                                            </div><label id="jobrole-error" class="error" for="jobrole"></label>
                                            </div></div>

                                                <div class="row">
                                                <div class="col-md-12">
                                                <h3>Job Locations</h3>
                                       </div></div>
                                       <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="country">Country <span class="requerd">*</span></label>
                                              <select class="form-control select2" id="country"  onChange="ShowState()" style="width: 100%;">
                                                  <option value="">Select Country</option>          
                                 <?php  foreach ($Country as $user6) { ?>
                                <option value="<?php echo $user6->location_id?>" ><?php echo $user6->name?></option>
                                     <?php } ?>
                                              </select>
                                            </div>
                                            <div class="form-group col-offset-md-1 col-md-3">
                                                <label for="state">State <span class="requerd">*</span></label>
                                                 <div id="NewState" ><select class="form-control select2" id="state"  onChange="ShowCity()"  style="width: 100%;">
                                              </select>
                                            </div>
                                            <label id="state-error" class="error" for="state"></label>
                                         </div>
                                            <div class="form-group col-offset-md-1 col-md-3">
                                                <label for="City">City <span class="requerd">*</span></label>
                                                <div id="NewCity" ><select class="form-control select2" id="city" style="width: 100%;" >
                                              </select>
                                            </div>
                                            <label id="city-error" class="error" for="city"></label>
                                            </div>
                                          
                                            <div class="form-group col-md-1">
                                                 <br />
                                                <button class="btn btn-success btn-sm" data-toggle="tooltip" title="Add Location!" id="Add_Location" type="button"  onclick="addLocation()">
                                             <i class="fa  fa-plus-circle"></i></button>
                                            </div> 
                                            </div>
                                            <div class="col-md-12"> 
                                            <div id="location-error" class="row"></div>
                                            <div class="row" id="divLocation">
                                              <?php $Locationdatacounter = 0; foreach ($JobLocation as $fetchedfromDBLocation) { ?>

                                                <span  id="LocationSpan<?php echo $Locationdatacounter ?>">
                                               <input type ="button" data-toggle="tooltip" style="margin-bottom: 5px; margin-right:5px;"  name='locationpreferedbuttonname' title="Remove Location!" class="btn btn-success btn-xs" id="Location<?php echo $Locationdatacounter ?>"   value="<?php echo $countryname[$Locationdatacounter][0]['name'].' - '.$statenames[$Locationdatacounter][0]['name'].' - '.$fetchedfromDBLocation->city ?>"  onClick = "LocationsRemove('<?php echo $Locationdatacounter ?>')">
                                               <input type ='hidden'  name='locationpreferedwithcity' value="<?php echo $fetchedfromDBLocation->countryid.','.$fetchedfromDBLocation->regionid.','.$fetchedfromDBLocation->city ?>">
                                               <script type="text/javascript">
                                                locationarraylocalstorage[<?php echo $Locationdatacounter ?>] = "<?php  echo $countryname[$Locationdatacounter][0]['name'].' - '.$statenames[$Locationdatacounter][0]['name'].' - '.$fetchedfromDBLocation->city; ?>";
                                              </script></span>
                                                
                                                <?php $Locationdatacounter++;  } ?>
                                            </div>
                                            </div>
                                                
                                          
                                            <div class="row"> 
                                                <div class="col-md-12">                 
                                                <h3> Educational Qualifications/Academic Credentials :</h3>
                                           </div></div>
                                    <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label for="UGCourses" >UG Courses <span class="requerd">*</span></label>
                                                      <select class="form-control select2" onChange="ShowUGStream()" id="UGCourses" >
                                  <option value="">Select UG Course</option>          
                                 <?php foreach ($Jobs_seed_data_UG as $user3) { ?>
                                <option value="<?php echo $user3->value?>"><?php echo $user3->value?></option>
                                     <?php } ?>
                                              </select>
                                                </div>
                                                <div class="form-group  col-md-3">
                                                    <label for="UGStreams">&nbsp; </label><label> &nbsp;</label>
                                                     <div id="UGStream" >
                                                     <select class="form-control select2" id="UGStreams" >
                                              </select>
                                               </div>
                                               <label id="UGStreams-error" class="error" for="UGStreams"></label>
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <br>
                                                    <button class="btn btn-success btn-sm" data-toggle="tooltip" title="Add UG!" id="Add_UG" onclick="addUG()" type="button"><i class="fa  fa-plus-circle"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div id="ug-error" class="row"></div>
                                            <div class="row" id="divUG">
                                           

                                            <?php $UGdatacounter = 0; foreach ($JobQualificationUG as $fetchedfromDBUG) { ?>
                                           
                                              <span id="UGSpan<?php echo $UGdatacounter ?>">
                                                
                                                <input type ="button" style="margin-bottom: 5px; margin-right: 5px;" data-toggle="tooltip" name='ugcourseswithstreambuttonname' title="Remove UG!" class="btn btn-success btn-xs" id="UG<?php echo $UGdatacounter ?>"  value="<?php echo $fetchedfromDBUG->qualification.' - '.$fetchedfromDBUG->specialization ?>"  onClick = "UGRemove('<?php echo $UGdatacounter ?>')" >

                                                 <input type ="hidden" name="ugcourseswithstream"  value="<?php echo $fetchedfromDBUG->qualification.','.$fetchedfromDBUG->specialization ?>"> 
                                             
                                              <script type="text/javascript">
                                                ugarraylocalstorage[<?php echo $UGdatacounter ?>] = "<?php echo $fetchedfromDBUG->qualification.' - '.$fetchedfromDBUG->specialization ?>";
                                              </script> </span>
                                           <?php $UGdatacounter++; } ?> </div>
                                           </div>
                                           <div class="row">
                                            <div class="col-md-12">
                                              <input class="flat" name='checkPG' type="checkbox" id="chkPG" <?php if(count($JobQualificationPG)>0){ echo "checked"; }  ?> >
                                                    <label for="PGCourses">PG Courses </label>
                                            </div>
                                            </div>
                                          
                                            <div class="row"  id="pgblock" style="display:<?php if(count($JobQualificationPG)>0){ echo 'block'; } else{ echo 'none'; }  ?> ">
                                                <div class="form-group col-md-3">
                                                    
                                                    <select class="form-control select2" id="PGCourses"  onChange="ShowPGStream()" style="width: 100%;">
                                                 <option value="">Select PG Course</option>         
                                                 <?php foreach ($Jobs_seed_data_PG as $user4) { ?>
                                                <option value="<?php echo $user4->value?>"><?php echo $user4->value?></option>
                                                <?php } ?>
                                              </select>
                                                </div>
                                                <div class="form-group  col-md-3">
                                                   <div id="PGStream" >
                                                   <select class="form-control select2"  id="PGStreams" style="width: 100%;"  >
                                              </select>
                                               </div>
                                                </div>
                                                <div class="form-group  col-md-1">
                                                    <button class="btn btn-success btn-sm streem" data-toggle="tooltip" title="Add PG!" id="Add_PG" onclick="addPG()" type="button" style="margin-top:0px;"><i class="fa  fa-plus-circle"></i></button>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                            <div id="pg-error" class="row"></div>
                                            <div class="row" id="divPG">
                                            
                                           
                                              <?php $PGdatacounter = 0; foreach ($JobQualificationPG as $fetchedfromDBPG) { ?>
                                           
                                              <span id="PGSpan<?php echo $PGdatacounter ?>">
                                                
                                                <input type ="button" style="margin-bottom: 5px; margin-right: 5px;"  data-toggle="tooltip" name='pgcourseswithstreambuttonname' title="Remove PG!" class="btn btn-success btn-xs" id="PG<?php echo $PGdatacounter ?>"  value="<?php echo $fetchedfromDBPG->qualification.' - '.$fetchedfromDBPG->specialization ?>"  onClick = "PGRemove('<?php echo $PGdatacounter ?>')" >

                                                 <input type ="hidden" name="pgcourseswithstream"  value="<?php echo $fetchedfromDBPG->qualification.','.$fetchedfromDBPG->specialization ?>"> 
                                             
                                           <script type="text/javascript">
                                                pgarraylocalstorage[<?php echo $PGdatacounter ?>] = "<?php echo $fetchedfromDBPG->qualification.' - '.$fetchedfromDBPG->specialization ?>";
                                              </script></span>
                                           <?php $PGdatacounter++; } ?>
                                            </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-md-12">
                                                <input class="flat" name='checkDoctorate' type="checkbox" id="chkPG" <?php if(count($JobQualificationDOCTORATE)>0){ echo "checked"; } ?> >
                                                <label for="DoctorateCourses">Doctorate Courses</label>
                                              </div>
                                            </div>
                                          
                                            <div class="row" id="doctorateblock"  style="display:<?php if(count($JobQualificationPG)>0){ echo 'block'; } else{ echo 'none'; }  ?> " >
                                                <div class="form-group col-md-3">
                                                <select class="form-control select2" id="DoctorateCourses"  onChange="ShowDOCTORATEStream()" style="width: 100%;">
                                                <option value="">Select Doctrate Course</option>          
                                                 <?php foreach ($Jobs_seed_data_DR as $user5) { ?>
                                                <option value="<?php echo $user5->value?>"><?php echo $user5->value?></option>
                                                <?php } ?>
                                              </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                  <div id="DOCTORATEStream" >
                                                  <select class="form-control select2" id="DoctorateStreams" style="width: 100%;">
                                              </select>
                                            </div>
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <button class="btn btn-success btn-sm streem" data-toggle="tooltip" title="Add Doctorate!"  id="Add_Doctorate" onclick="addDoctorate()" type="button"  style="margin-top:0px;"><i class="fa  fa-plus-circle"></i></button>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                            <div id="ppg-error" class="row"></div>
                                            <div class="row" id="divDoctorate"> 
                                             
                                             <?php $Doctoratedatacounter = 0; foreach ($JobQualificationDOCTORATE as $fetchedfromDBDOCTORATE) { ?>
                                             
                                              <span id="DoctorateSpan<?php echo $Doctoratedatacounter ?>">
                                                
                                                <input type ="button" style="margin-bottom: 5px; margin-right:5px;"  data-toggle="tooltip" name='doctoratecourseswithstreambuttonname' title="Remove Doctorate!" class="btn btn-success btn-xs" id="Doctorate<?php echo $Doctoratedatacounter ?>"  value="<?php echo $fetchedfromDBDOCTORATE->qualification.' - '.$fetchedfromDBDOCTORATE->specialization ?>"  onClick = "DoctorateRemove('<?php echo $Doctoratedatacounter ?>')" >

                                                 <input type ="hidden" name="doctoratecourseswithstream"  value="<?php echo $fetchedfromDBDOCTORATE->qualification.','.$fetchedfromDBDOCTORATE->specialization ?>"> 
                                              <script type="text/javascript">
                                                ppgarraylocalstorage[<?php echo $Doctoratedatacounter ?>] = "<?php echo $fetchedfromDBDOCTORATE->qualification.' - '.$fetchedfromDBDOCTORATE->specialization ?>";
                                              </script></span>
                                           <?php $Doctoratedatacounter++; } ?>
                                         </div>  </div>
                                        
                                   
<div class="row"> 
                            <div class="col-md-12">                
                              <h3> Additional Details
                              </h3>
                            </div>
                          </div>
                                       
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="editor3">Company/ Project brief </label>
                                                    <div contenteditable="true" id="editor3"  class=".custom_scrollbar page"  style="border: 1px solid; border-color:#d2d6de; padding: 0px 5px 0px 5px; min-height:120px;">
                                                      <div ><?php echo $Jobsdata->brief; ?>
                                                    <textarea name="brief" rows="10" cols="80">
                                                      
                                                    </textarea>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="editor4">Comments (if any- optional)</label>
                                                    <div contenteditable="true" id="editor4"  class=".custom_scrollbar page"  style="border: 1px solid; border-color:#d2d6de; padding: 0px 5px 0px 5px; min-height:120px;">
                                                      <div ><?php echo $Jobsdata->comments; ?>
                                                    <textarea name="comment" rows="10" cols="80">
                                        </textarea>
                                                </div>
                                            </div>
                                                </div>
                                                </div>
                                                <div class="row">
                                             <div class="col-md-12">
                                            <h3>Recruiter Contact Details:</h3>
</div>
</div>
<div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="Name">Name <span class="requerd">*</span></label>
                                                    <input type="text" name="recruitername" class="form-control" id="Name" placeholder="Name" required="" value="<?php echo $ContactdetailArray['name'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="EmailAddress">Email Address <span class="requerd">*</span></label>
                                                    <input type="email"  name="recruiteremail" class="form-control" id="EmailAddress" placeholder="Email Address" required=""  value="<?php echo $ContactdetailArray['emailid'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="PhoneNumber">Phone Number </label>
                                                    <input type="text"  name="recruiterphone" class="form-control"  id="PhoneNumber" onkeypress="return isNumberKey(event,this.id)" placeholder="Phone Number"  value="<?php echo $ContactdetailArray['phonenumber'] ?>">
                                                </div>
                                                <?php }  ?>
                                            </div>
                                 </div>
                                 </div>
                                 </div>
		                            <div class="tab-pane" id="account">
                                        <hr/>
		                                <div class="row">
		                                    <div class="col-sm-8 col-sm-offset-2">
                                                
                                               
                                              
                                                  <div class="row">
                                                     <div class="col-sm-4">
                                                      <label class="continr">
                                                    <input type="checkbox" name="selectalljobboards" value="Select All" id="checkAll" >
                                                 
                                                     <div class="choice"   name="selectalljobboards" value="Select All" id="checkAll"  data-toggle="wizard">
                                                     <input type="checkbox" name="jobb" value="Develop">
                                                    <div class="card card-checkboxes card-hover-effect">
                                                        <i class="fa fa-check"></i>
                              <p>Select All</p>
                                                    </div>
                                                </div>
                                                 <span class="checkmrk"></span></label>
                                                   </div>
                                                <?php foreach ($job_boards_data as $jobboard) { $i==0; ?>
		                                       
                                            
                                                 <div class="col-sm-4">

                                                <label class="continr">
                                                <input type="checkbox" name="jobboards[]" id="jobboards<?php echo $i ?>"  value="<?php echo $jobboard->name?>" class="myjobboards" <?php if($jobboard->name == "FoodLinked india"){ echo "checked"; echo " readonly"; } ?> <?php if(in_array($jobboard->id,$insertedboardarray,TRUE)){echo "checked"; } ?>>

		                                            <div class="choice"  name="jobboards[]" id="jobboards<?php echo $i ?>"  value="<?php echo $jobboard->name?>" class="myjobboards" data-toggle="wizard">
		                                                <input type="checkbox" name="jobb"  value="Develop" >
		                                                <div class="card card-checkboxes card-hover-effect">
		                                                    <i class="fa fa-briefcase"></i>
															<p><?php echo $jobboard->name?></p>
		                                                </div>
		                                            </div>
                                           <span class="checkmrk"></span></label>
                                         </div>
                                              
                                                <?php $i++; } ?>
                                                  </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="alert alert-info alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <h4><i class="icon fa fa-warning"></i> Note:</h4>
                                                        Jobs will be published on selected Job Boards within 24 hours.
                                                    </div>
		                                    </div>
                                 </div>
                                 
                                    

		                            <div class="tab-pane" id="address">
		                                <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  
                        <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                       
                        <h4><strong><i class="fa fa-book mr-1"></i> Job Summary</strong></h4>
                        
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-6"> 
                        <div class="panel-body">
                            <table class="table table-striped">
                             
                              <tbody>
                                <tr>
                                  <th scope="row">Job Title</th>
                                  <td id = 'pJobTitle'> </td>
                                </tr>
                                <tr>
                                  <th scope="row">Company Name</th>
                                  <td id = 'pcompanyname'> </td>
                                </tr>
                              
                                <tr>
                                  <th scope="row">Min. Years of Exp.</th>
                                  <td id = 'pmye'> </td>
                                </tr>
                                <tr>
                                  <th scope="row">Max. Years of Exp.</th>
                                  <td id = 'pmaye'> </td>
                                </tr>
                                <tr>
                                  <th scope="row">Employment Type</th>
                                  <td id = 'pemploymenttype'> </td>
                                </tr>
                                <tr>
                                  <th scope="row">Currency</th>
                                  <td id = 'pcurrency'> </td>
                                </tr>
                                <tr>
                                  <th scope="row">Preferred Min. Age</th>
                                  <td id = 'ppma'> </td>
                                </tr>
                                
                               <tr>
                                  <th scope="row">Functional Area</th>
                                  <td id = 'pfa'> </td>
                                </tr>
                                <tr>
                                  <th scope="row">Job Role</th>
                                  <td id = 'pjr'> </td>
                                </tr>
                                <tr>
                                  <th scope="row">Industry</th>
                                  <td id = 'pindst'> </td>
                                </tr>
                               
                              </tbody>
                            </table>
                          </div>
                        </div>
                     
                        <div class="col-md-6"> 
                        <div class="panel-body">
                            <table class="table table-striped">
                             
                               <tbody>
                                <tr>
                                  <th scope="row">Annual Min Package</th>
                                  <td>
                                  <span id="pampspan"></span>
                                  <i id = 'pamp'> </i></td>
                                </tr>
                                <tr>
                                  <th scope="row">Annual Max Packagee</th>
                                  <td><span id="pamapspan"></span>
                                  <i id = 'pamap'> </i></td>
                                </tr>
                                <tr>
                                  <th scope="row">Current Position</th>
                                  <td id = 'pcurrentposition'></td>
                                </tr>
                                <tr>
                                  <th scope="row">Service Tenure in the Cur. Positio</th>
                                  <td id = 'pstcp'></td>
                                </tr>
                                <tr>
                                  <th scope="row">Company Url</th>
                                  <td id = 'pcvu'> </td>
                                </tr>
                                <tr>
                                  <th scope="row">Preferred Max. Age</th>
                                  <td id = 'ppmaa'> </td>
                                </tr>
                                <tr>
                                  <th scope="row">Max Years of Rel. Exp.</th>
                                  <td id = 'pmayre'> </td>
                                </tr>
                                <tr>
                                  <th scope="row">Min Years of Rel. Exp.</th>
                                  <td id = 'pmyre'> </td>
                                </tr>
                                <tr>
                                  <th scope="row">Name </th>
                                  <td id = 'pname'> </td>
                                </tr>
                                <tr>
                                  <th scope="row">Email Address</th>
                                  <td id = 'pmailaddress'> </td>
                                </tr>
                                <tr>
                                  <th scope="row">Phone Number</th>
                                  <td id = 'ppno'> </td>
                                </tr>   
                             
                              </tbody>
                            </table>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                     <div class="col-md-12">
                     <div class="panel-body">
                      <table class="table table-striped">
                             
                              <tbody>
                              <tr>
                                  <th scope="row">Role Description</th>
                                  <td id = 'proledescription'> </td>
                                </tr>
                                <tr>
                                  <th scope="row">Role Requisites</th>
                                  <td id = 'prolerequisites'> </td>
                                </tr>
                                <tr>
                                <th scope="row">Company/ Project brief</th>
                                  <td id = 'pcpb'>

                                  </td>
                                  
                                </tr>
                                <tr>
                                  <th scope="row">Comments (if any- optional)</th>
                                  <td id = 'pcomment'> </td>
                                </tr>            
                              </tbody>
                            </table>
                            </div> </div></div>

                     <h4><strong><i class="fa fa-book mr-1"></i> Educational Qualifications</strong></h4>
                     
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12"> 
                        <div class="panel-body">
                            <table class="table table-striped">
                             
                              <tbody>
                                <label>UG Courses</label>
                                <tr>
                                  <th scope="row">
                                    
                                     <span id="PUGSpan0">
                                    <input type="button" data-toggle="tooltip"  class="btn btn-success btn-xs ugallcoursesstream" id="UG0" value="BCA  - Computer" >
                                    </span>
                                  </th>
                                  
                                </tr>
                                                  
                              </tbody>
                               <table class="table table-striped" >
                             
                              <tbody id="pglable" style="display:none;">
                                <label id="pglable2"  style="display:none;">PG Courses</label>
                                <tr>
                                  <th scope="row">
                                     <span id="PPGSpan0">
                                    <input type="button" data-toggle="tooltip"  class="btn btn-success btn-xs pgallcoursesstream" id="Location0" value="MCA - Computer" >
                                    </span>

                                  </th>
                                  
                                </tr>
                                                  
                              </tbody>
                               <table class="table table-striped">
                             
                              <tbody id="doctoratelable" style="display:none;">
                                <label id="doctoratelable2" style="display:none;">Doctorate Courses</label>
                                <tr>
                                  <th scope="row">
                                    <span id="PDoctorateSpan0">
                                    <input type="button" data-toggle="tooltip"  class="btn btn-success btn-xs doctorateallcoursesstream" id="Location0" value="PHD - Computer" >
                                    </span>
                                  </th>
                                  
                                </tr>
                                                  
                              </tbody>
                            </table>
                          </div>
                        </div>
                        </div>

        

                      
                         
                         <h4><strong><i class="fa fa-map-marker mr-1"></i> Location</strong></h4>
                        
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12"> 
                        <div class="panel-body">
                            <table class="table table-striped">
                             
                              <tbody>

                                <tr>
                                
                                  <th scope="row">
                                    <span id="PLocationSpan0">
                                    <input type="button" data-toggle="tooltip"  class="btn btn-success btn-xs locationallfull" id="Location0" value="Afghanistan - Balkh - huvhuvu" >
                                    </span>
                                  </th>
                                </tr>                        
                              </tbody>
                            </table>
                          </div>
                          </div>
                        </div>
                        </div> </div>
                                        </div>
                                        </div>
                                </div>   
                                </div>   
                                </div>   
                                <hr style="width:100%;"/>
		                        <div class="wizard-footer">
		                            <div class="pull-right"> 
                                    
                                        <input type='button' class='btn btn-save btn-fill btn-primary btn-wd myBtn' name='next'  href="#a1"    value='Save As Draft' onclick="saveAndPostCreatejob('0')" />
                                        <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' onclick="addValidations()"/>
                                        <input type='button' class='btn btn-finish btn-fill btn-primary btn-wd myBtn' name='finish'  href="#a1"   value='Post' onclick="saveAndPostCreatejob('1')" />
                                          <!-- data-toggle="modal" data-target=".bs-example-modal-sm" -->
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div><!-- end row -->
		</div> <!--  big container -->   
        </div>
  </div>

  <div id="myModal" class="modal">
  <div  id="a1"> 
    <ul class="loader">
       <li-loader class="dot"></li-loader>
       <li-loader class="dot"></li-loader>
       <li-loader class="dot"></li-loader>
       <li-loader class="dot"></li-loader>
       <li-loader class="dot"></li-loader>
       <li-loader class="dot"></li-loader>
       <ul>
  </div>

</div>

                                  <div class="modal fade bs-example-modal-sm" id="postmodelincreatejob" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">Confirmation</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Do You Want to Post this Job ?</h4>
                        </div>
                        <div class="modal-footer">
                          <a href="{{ url('/employer/savedjobposting') }}"><button type="button" class="btn btn-default pull-left"><i class="fa fa-times"> No</i></button></a>
                          <a href="{{ url('/employer/jobposting') }}"><button type="button" class="btn btn-success"><i class="fa fa-check"> Yes</i></button></a>
                        </div>

                      </div>
                    </div>
                  </div>
        @include('layouts.footer')
    <!-- ./wrapper -->

@include('layouts.js2')
<script src="<?php echo url('/'); ?>/public/External/google_button/js/jquery.autocomplete.min.js"></script>
        <script>
                function checkURL (CompanyVideoUrl) {
                var string = CompanyVideoUrl.value;
                console.log(string);
                if(string.length>0){
                  if (!~string.indexOf("http")) {
                  string = "http://" + string;
                  }
                }
                CompanyVideoUrl.value = string;
                return CompanyVideoUrl
                }
              </script>
<script>
  $('input[name="checkPG"]').on('ifChecked', function() {
var pgblock = document.getElementById("pgblock");
pgblock.style.display = "block";
}); 
$('input[name="checkPG"]').on('ifUnchecked', function() {
var pgblock = document.getElementById("pgblock");
pgblock.style.display = "none";
$('#divPG').html('');
var pgarraylocalstorage = [];
console.log(pgarraylocalstorage);
 $("#PGCourses").val("").change();
 $("#PGStreams").html('');
});
</script>
<script>
  $('input[name="checkDoctorate"]').on('ifChecked', function() {
var doctorateblock = document.getElementById("doctorateblock");
doctorateblock.style.display = "block";
}); 
$('input[name="checkDoctorate"]').on('ifUnchecked', function() {
var doctorateblock = document.getElementById("doctorateblock");
doctorateblock.style.display = "none";
$('#divDoctorate').html('');
var ppgarraylocalstorage = [];
$("#DoctorateCourses").val("").change();
$("#DoctorateStreams").html('');

});
</script>

<script>
$('input[name="checkPG"]').on('ifChecked', function() {
var pglable = document.getElementById("pglable");
pglable.style.display = "block";
}); 
$('input[name="checkPG"]').on('ifUnchecked', function() {
var pglable = document.getElementById("pglable");
pglable.style.display = "none";
}); 
$('input[name="checkPG"]').on('ifChecked', function() {
var pglable2 = document.getElementById("pglable2");
pglable2.style.display = "block";
}); 
$('input[name="checkPG"]').on('ifUnchecked', function() {
var pglable2 = document.getElementById("pglable2");
pglable2.style.display = "none";
}); 

$('input[name="checkDoctorate"]').on('ifChecked', function() {
var doctoratelable = document.getElementById("doctoratelable");
doctoratelable.style.display = "block";
}); 
$('input[name="checkDoctorate"]').on('ifUnchecked', function() {
var doctoratelable = document.getElementById("doctoratelable");
doctoratelable.style.display = "none";
}); 
$('input[name="checkDoctorate"]').on('ifChecked', function() {
var doctoratelable2 = document.getElementById("doctoratelable2");
doctoratelable2.style.display = "block";
}); 
$('input[name="checkDoctorate"]').on('ifUnchecked', function() {
var doctoratelable2 = document.getElementById("doctoratelable2");
doctoratelable2.style.display = "none";
}); 
</script>
<!-- Error remove for create Job Posting Page -->
<script>
      function removeerrorjobtitle(){
        document.getElementById('jobtitle-error').innerHTML = '';
      }
      function removeerroemaxexp(){    
        document.getElementById('maxexp-error').innerHTML = '';
        }
        function removeerrorannualmaxpkg(){    
        document.getElementById('annualmaxpkg-error').innerHTML = '';
        }
        function removeerrorCompanyVideoUrl(){
          document.getElementById('CompanyVideoUrl').innerHTML = '';
        }
        function removeerrorcurrentposition(){
          document.getElementById('currentposition-error').innerHTML = '';
        }
        function removeerroeindustry(){
          document.getElementById('industry-error').innerHTML = '';
        }
        function removeerroejobrole(){
          document.getElementById('jobrole-error').innerHTML = '';
        }
        function removeerroeUGStreams(){
          document.getElementById('UGStreams-error').innerHTML = '';
        }
        function removeerrorcity(){
          document.getElementById('city-error').innerHTML = '';
        }
        function removeerroerd(){
          document.getElementById('rd-error').innerHTML = '';
        }
    </script>
    <!-- End Error remove for create Job Posting Page -->
  <script>
  $(document).on("click", ".myBtn", function() {
  var myTargetModal = $(this).attr("href");
 // console.log(myTargetModal);
  $("#myModal").fadeIn();
  $(myTargetModal).fadeIn();
  return false;
});

$("body").on("click", ".close", function() {
  $("#myModal").hide();
 // $(".modal-content").hide();
});
  </script>
  <script>

              function isNumberKey(evt,id)
              {
              try{
              var charCode = (evt.which) ? evt.which : event.keyCode;

              if(charCode==46){
              var txt=document.getElementById(id).value;
              if(!(txt.indexOf(".") > -2)){

              return true;
              }
              }
              if (charCode > 31 && (charCode < 48 || charCode > 57) )
              return false;

              return true;
              }catch(w){
              alert(w);
              }
              }
              </script>
                            <script>

              function isOpningJob(evt,id)
              {
              try{
              var charCode = (evt.which) ? evt.which : event.keyCode;

              if(charCode==46){
              var txt=document.getElementById(id).value;
              if(!(txt.indexOf(".") > -2)){

              return true;
              }
              }
              if (charCode > 31 && (charCode < 48 || charCode > 57) )
              return false;

              return true;
              }catch(w){
              alert(w);
              }
              }
              </script>
              <!-- Error remove for create Job Posting Page -->
     
    <script>
        function UGRemove(lenth) {
            $("#UGSpan" + lenth).remove();
            delete ugarraylocalstorage[lenth];
        }
    </script>
    <script>
        function PGRemove(lenth) {
            $("#PGSpan" + lenth).remove();
            delete pgarraylocalstorage[lenth];
        }
    </script>
    <script>
        function DoctorateRemove(lenth) {
            $("#DoctorateSpan" + lenth).remove();
            delete ppgarraylocalstorage[lenth];
        }
    </script>
    <script>
        function LocationsRemove(lenth) {
            $("#LocationSpan" + lenth).remove();
            delete locationarraylocalstorage[lenth];
        }
    </script>

     <script>
      
      $('#checkAll').on('click', function() {
          console.log('in check all');
             if (this.checked == true){
                 console.log('in check all if');
     /*            $('#jobboards').find('input[name="jobboards[]"]').prop('checked', true);
     */       $("input[class=myjobboards]").prop('checked', true);
            //$("input[class=choice]").addClass("active");
             }
             else{
                 console.log('in check all else');
     /*            $('#userTable').find('input[name="checkboxRow"]').prop('checked', false);
     */                $("input[class=myjobboards]").prop('checked', false);
             //$("input[class=choice]").removeClass("active");
     
              }
         });
     </script>

    <script>
  function addValidations(){
    

    var jobTitle=document.getElementById('jobtitle').value;
    var Ccmpanyname = document.getElementById('Ccmpanyname').value;
    var roleDescription=CKEDITOR.instances.editor1.getData();
    var RoleRequisites=CKEDITOR.instances.editor2.getData();
    console.log('roleDescription'+roleDescription+' length: '+roleDescription.trim().length);
    console.log('RoleRequisites'+RoleRequisites+' length: '+RoleRequisites.trim().length);
    document.getElementById("rd-error").innerHTML = '';
    document.getElementById("rr-error").innerHTML = '';
    document.getElementById("ug-error").innerHTML = '';
    
    var minexp = document.getElementById('minexp').value;
    var maxexp = document.getElementById('maxexp').value;
   if ($("input[name='Employmenttype']:checked").val()==1)
      {var Employmenttype = 'Contract';}
    else{var Employmenttype =  'permanenet';}
    //console.log(Employmenttype);
   var Currency = $("input[name='currency']:checked"). val();
    //console.log(Currency);
    var prefminage = document.getElementById('prefminage').value;
    var prefmaxage = document.getElementById('prefmaxage').value;
    var minrelexp = document.getElementById('minrelexp').value;
    var maxrelexp = document.getElementById('maxrelexp').value;
    var annualminpkg = document.getElementById('annualminpkg').value;
    var annualmaxpkg = document.getElementById('annualmaxpkg').value;
    var CompanyVideoUrl = document.getElementById('CompanyVideoUrl').value;
    var crrentpstion = document.getElementById('currentposition').value;
    var servicetenure = document.getElementById('servicetenure').value;
    var divUG = document.getElementById('divUG').value;
    var divPG = document.getElementById('divPG').value;
    var divDoctorate = document.getElementById('divDoctorate').value;
    var divLocation = document.getElementById('divLocation').value;
    var indstry = document.getElementById('industry').value;
    var FnctnRle = document.getElementById('FunctionRole').value;
    var jbrl = document.getElementById('jobrole').value;
    var projectbrief=CKEDITOR.instances.editor3.getData();
    var comment=CKEDITOR.instances.editor4.getData();
    var Name = document.getElementById('Name').value;
    var EmailAddress = document.getElementById('EmailAddress').value;
    var PhoneNumber = document.getElementById('PhoneNumber').value;

    var industry = indstry.split(" -- ");
    var FunctionRole = FnctnRle.split(" -- ");
    var jobrole = jbrl.split(" -- ");

       //min anuual income
    if(annualminpkg == 786){
      annualminpkg = 'Less than 5000';
    }
    else if(annualminpkg == 10000000 && Currency == 'INR'){
      annualminpkg = '100,000 & above';
    }
    else if(annualminpkg == 12477){
      annualminpkg = 'Less than 50000';
    }
    else if(annualminpkg == 10000000 && Currency == 'INR'){
      annualminpkg = '100,00,000 & above';
    }

    else{
      //--code--
    }
//max annual income
 if(annualmaxpkg == 786){
      annualmaxpkg = 'Less than 5000';
    }
    else if(annualmaxpkg == 10000000 && Currency == 'INR'){
      annualmaxpkg = '100,000 & above';
    }
    else if(annualmaxpkg == 12477){
      annualmaxpkg = 'Less than 50000';
    }
    else if(annualmaxpkg == 10000000 && Currency == 'INR'){
      annualmaxpkg = '100,00,000 & above';
    }

    else{
      //--code--
    }


    if (Currency == 'INR'){
      $("#pampspan").removeClass(); 
      $("#pamapspan").removeClass();
      $("#pampspan").addClass("fa fa-inr"); 
      $("#pamapspan").addClass("fa fa-inr"); }
    else if(Currency == 'EUR'){ 
      $("#pampspan").removeClass(); 
      $("#pamapspan").removeClass(); 
      $("#pampspan").addClass("fa fa-eur"); 
      $("#pamapspan").addClass("fa fa-eur"); } 
    else if(Currency == 'USD'){ 
      $("#pampspan").removeClass(); 
      $("#pamapspan").removeClass(); 
      $("#pampspan").addClass("fa fa-usd"); 
      $("#pamapspan").addClass("fa fa-usd"); }
    else{ 
      $("#pampspan").removeClass(); 
      $("#pamapspan").removeClass(); 
      $("#pampspan").addClass("fa fa-jpy"); 
      $("#pamapspan").addClass("fa fa-jpy"); }
    
    document.getElementById("pJobTitle").innerHTML = jobTitle;
    document.getElementById("pcompanyname").innerHTML = Ccmpanyname;
     document.getElementById("proledescription").innerHTML = roleDescription;
    document.getElementById("prolerequisites").innerHTML = RoleRequisites;
    document.getElementById("pmye").innerHTML = minexp+" Year/s";
    document.getElementById("pmaye").innerHTML = maxexp+" Year/s";
    document.getElementById("pemploymenttype").innerHTML = Employmenttype;
    document.getElementById("pcurrency").innerHTML = Currency;
    document.getElementById("ppma").innerHTML = prefminage+" Year/s";
    document.getElementById("pname").innerHTML = Name;
    document.getElementById("pamp").innerHTML = annualminpkg;
    document.getElementById("pamap").innerHTML = annualmaxpkg; 
    document.getElementById("pcurrentposition").innerHTML = crrentpstion;
    document.getElementById("pstcp").innerHTML = servicetenure;
    document.getElementById("pcvu").innerHTML = CompanyVideoUrl;
    document.getElementById("ppmaa").innerHTML = prefmaxage+" Year/s";
    document.getElementById("pmayre").innerHTML = maxrelexp+" Year/s";
    document.getElementById("pmyre").innerHTML = minrelexp+" Year/s";
    document.getElementById("pmailaddress").innerHTML = EmailAddress;
    document.getElementById("ppno").innerHTML = PhoneNumber;
    document.getElementById("pindst").innerHTML = industry[1];
    document.getElementById("pfa").innerHTML = FunctionRole[1];
    document.getElementById("pjr").innerHTML = jobrole[1];
    document.getElementById("pcpb").innerHTML = projectbrief;
    document.getElementById("pcomment").innerHTML = comment;

  var UgCoursesAndStream = getselecteddatabuttons("ugcourseswithstreambuttonname");     
  console.log(UgCoursesAndStream);
  //console.log(UgCoursesAndStream.length);
   $(".ugallcoursesstream").remove();
for(var i=0; i<UgCoursesAndStream.length; i++){
   var UGcourseButton = "<input type='button' data-toggle='tooltip' style='margin-right: 5px; margin-bottom: 5px; ' class='btn btn-success btn-xs ugallcoursesstream' id='ug"+i+"' value='"+UgCoursesAndStream[i]+"' >";
   console.log(UGcourseButton);
   document.getElementById('PUGSpan0').innerHTML+=UGcourseButton;
}

var PgCoursesAndStream = getselecteddatabuttons("pgcourseswithstreambuttonname");     
  console.log(PgCoursesAndStream);
  //console.log(UgCoursesAndStream.length);
   $(".pgallcoursesstream").remove();
for(var i=0; i<PgCoursesAndStream.length; i++){
   var PGcourseButton = "<input type='button' data-toggle='tooltip' style='margin-right: 5px; margin-bottom: 5px;'  class='btn btn-success btn-xs pgallcoursesstream' id='pg"+i+"' value='"+PgCoursesAndStream[i]+"' >";
   console.log(PGcourseButton);
   document.getElementById('PPGSpan0').innerHTML+=PGcourseButton;
}   

var DoctorateCoursesAndStream = getselecteddatabuttons("doctoratecourseswithstreambuttonname");     
  console.log(DoctorateCoursesAndStream);
  //console.log(UgCoursesAndStream.length);
   $(".doctorateallcoursesstream").remove();
for(var i=0; i<DoctorateCoursesAndStream.length; i++){
   var DOCTORATEcourseButton = "<input type='button' data-toggle='tooltip' style='margin-right: 5px; margin-bottom: 5px;' class='btn btn-success btn-xs doctorateallcoursesstream' id='doctorate"+i+"' value='"+DoctorateCoursesAndStream[i]+"' >";
   console.log(DOCTORATEcourseButton);
   document.getElementById('PDoctorateSpan0').innerHTML+=DOCTORATEcourseButton;
}   


var LocationOfWork = getselecteddatabuttons("locationpreferedbuttonname");     
   $(".locationallfull").remove();
for(var i=0; i<LocationOfWork.length; i++){
   var PrefferedlocationButton = "<input type='button' data-toggle='tooltip'  style='margin-right: 5px; margin-bottom: 5px;' class='btn btn-success btn-xs locationallfull' id='countrystatecity"+i+"' value='"+LocationOfWork[i]+"' >";
   console.log(PrefferedlocationButton);
   document.getElementById('PLocationSpan0').innerHTML+=PrefferedlocationButton;
} 

var divpgdata = document.getElementById('divPG').innerHTML;
divpgdata = divpgdata.trim();
console.log('divpgdata hiihihS:'+divpgdata+","+divpgdata.length);

if(divpgdata.length == 0){
  var pglable = document.getElementById("pglable");
  pglable.style.display = "none";
  var pglable2 = document.getElementById("pglable2");
  pglable2.style.display = "none";
}
else{
  var pglable = document.getElementById("pglable");
  pglable.style.display = "";
  var pglable2 = document.getElementById("pglable2");
  pglable2.style.display = "";
}

var divppgdata = document.getElementById('divDoctorate').innerHTML;
divppgdata = divppgdata.trim();
console.log('divppgdata'+divppgdata.length);
if(divppgdata.length==0){
  var doctoratelable = document.getElementById("doctoratelable");
  doctoratelable.style.display = "none";
  var doctoratelable2 = document.getElementById("doctoratelable2");
  doctoratelable2.style.display = "none";
}
else{
  var doctoratelable = document.getElementById("doctoratelable");
  doctoratelable.style.display = "";
  var doctoratelable2 = document.getElementById("doctoratelable2");
  doctoratelable2.style.display = "";
}
var divUGs = document.getElementById('divUG').innerHTML;
var divLocations = document.getElementById('divLocation').innerHTML;
console.log(roleDescription.trim().length+","+RoleRequisites.trim().length+","+divUGs.trim().length);
if(roleDescription.trim().length==0 || RoleRequisites.trim().length==0 || divUGs.trim().length==0){
      if(roleDescription.trim().length==0){
        console.log('in if roleDescription');
        rderror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>This field is required.</b> </div>";
       document.getElementById("rd-error").innerHTML = rderror;
      }
      if(RoleRequisites.trim().length==0){
        console.log('in if RoleRequisites');
        rrerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>This field is required.</b> </div>";
       document.getElementById("rr-error").innerHTML = rrerror;
      }
      console.log('divUG'+divUGs+' length '+divUGs.length);
      if(divUGs.trim().length==0){
        console.log('in if divUGs');
        ugerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>Please Select UG Cource and Stream and click ADD Button.</b> </div>";
        document.getElementById("ug-error").innerHTML = ugerror;
      }
      if(divLocations.trim().length==0){
        console.log('in if divLocations');
        locationerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>Please Select country, State and City and click ADD Button.</b> </div>";
        document.getElementById("location-error").innerHTML = locationerror;
      }
      return false;
    }

  }
</script>
<script>
function getselecteddatabuttons(nameoffield) {
var allbuttons = [];
var inputfields = document.getElementsByName(nameoffield);
console.log("inputfields: "+inputfields);
var ar_inputflds = inputfields.length;

for (var i = 0; i < ar_inputflds; i++) {

allbuttons.push(inputfields[i].value);
}
console.log("allbuttons: "+allbuttons);
return allbuttons;

}
</script>

 <script>
              function showmaxexprience(){
             
                var minexprnc = document.getElementById('minexp').value;
                console.log(minexprnc);
                var min = parseInt(minexprnc)+1;
                var max = parseInt(minexprnc)+10;
                console.log(max);
                $(".maxexprienceoption").remove();
                for(var x=min;x<=max;x++){
                  var option = "<option class='maxexprienceoption' value='" + x + "'> " + x + "</option>"
                  document.getElementById('maxexp').innerHTML += option;   
                  document.getElementById('minexp-error').innerHTML = '';
                 } 
                   
              }
              function showpreferedmaxage(){
             
                var prefMinAge = document.getElementById('prefminage').value;
                console.log(prefMinAge);
                $(".preferedmaxageoption").remove();
                var min = parseInt(prefMinAge)+1;
                for(var x=min;x<=70;x++){
                  var option = "<option class='preferedmaxageoption' value='" + x + "'> " + x + "</option>"
                  document.getElementById('prefmaxage').innerHTML += option;   
                 } 
                   
              }
              function showreleventmaxexp(){
             
                var minRelExp = document.getElementById('minrelexp').value;
                //console.log(minRelExp);
                var min = parseInt(minRelExp)+1;
                var max = parseInt(minRelExp)+10;
                 $(".releventmaxexpoption").remove();
                for(var x=min;x<=max;x++){
                  var option = "<option class='releventmaxexpoption' value='" + x + "'> " + x + "</option>"
                  document.getElementById('maxrelexp').innerHTML += option;   
                 } 
                   
              }
              
              </script>
  <script>
        function addUG() {
          ugerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>Please Select UG Cource and Stream and click ADD Button.</b> </div>";
          document.getElementById("ug-error").innerHTML = ugerror;
            var allUgSpan = document.getElementsByName('ugcourseswithstream');
            var counterUG = allUgSpan.length;
            var btn = document.createElement("span");
            var UGCourses = document.getElementById("UGCourses").value;
            //console.log(UGCourses);
            var UGStreams = document.getElementById("UGStreams").value;
            //console.log(UGStreams);
             if(UGCourses.trim().length >0 && UGStreams.trim().length>0){
              document.getElementById("ug-error").innerHTML = '';

              var upcommingUGData = UGCourses.trim().concat(' - ',UGStreams.trim());
              if(ugarraylocalstorage.length<5){

                  if(ugarraylocalstorage.indexOf(upcommingUGData)==-1){
                    btn.innerHTML = "<input type ='button' data-toggle='tooltip'  style='margin-right: 5px; margin-bottom: 5px;' name='ugcourseswithstreambuttonname' title='Remove UG!' class='btn btn-success btn-xs' id='UG" + counterUG + "'  value='" + UGCourses + " - " + UGStreams + "'  onClick = 'UGRemove(" + counterUG + ")' ><input type ='hidden' name='ugcourseswithstream'  value='" + UGCourses + "," + UGStreams + "'>";
                    btn.id = "UGSpan" + counterUG;
                    document.getElementById("divUG").appendChild(btn);
                    ugarraylocalstorage[counterUG] = upcommingUGData;
                    //console.log('Array of UGcources after update : '+ugarraylocalstorage);
                    counterUG++;
                  }else{
                    ugerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>This UG Course is already added.</b> </div>";
                    document.getElementById("ug-error").innerHTML = ugerror;
                }
            }
            else{
                ugerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>Max UG Cources Exceed.</b> </div>";
                document.getElementById("ug-error").innerHTML = ugerror;
            }
          }
            return false;
        }
    </script>
     <script>
        function addPG() {
           var allPgSpan = document.getElementsByName('pgcourseswithstream');
            var counterPG = allPgSpan.length;
            var btn = document.createElement("span");
            var PGCourses = document.getElementById("PGCourses").value;
            var PGStreams = document.getElementById("PGStreams").value;
            if(PGCourses.trim().length >0 && PGStreams.trim().length>0){
              document.getElementById("pg-error").innerHTML = '';
                console.log('Array of PGcources before update : '+pgarraylocalstorage);
              var upcommingPGData = PGCourses.trim().concat(' - ',PGStreams.trim());
              if(pgarraylocalstorage.length<5){

                  if(pgarraylocalstorage.indexOf(upcommingPGData)==-1){
                      btn.innerHTML = "<input type ='button' data-toggle='tooltip'  style='margin-right: 5px; margin-bottom: 5px;' name='pgcourseswithstreambuttonname' title='Remove PG!' class='btn btn-success btn-xs' id='PG" + counterPG + "' value='" + PGCourses + " - " + PGStreams + "'  onClick = 'PGRemove(" + counterPG + ")'><input type ='hidden'  name='pgcourseswithstream'  value='" + PGCourses + "," + PGStreams + "'>";
                      btn.id = "PGSpan" + counterPG;
                      document.getElementById("divPG").appendChild(btn);
                      pgarraylocalstorage[counterPG] = upcommingPGData;
                      //console.log('Array of PGcources after update : '+pgarraylocalstorage);
                      counterPG++;
                  }else{
                    pgerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>This PG Course is already added.</b> </div>";
                    document.getElementById("pg-error").innerHTML = pgerror;
                  }
              }
              else{
                  pgerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>Max PG Cources Exceed.</b> </div>";
                  document.getElementById("pg-error").innerHTML = pgerror;
              }
            }
            else{
              pgerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>Please Select PG Cource and Stream and click ADD Button.</b> </div>";
                  document.getElementById("pg-error").innerHTML = pgerror;
            }
            return false;
        }
    </script>
     <script>
        function addDoctorate() {
          var allDoctorateSpan = document.getElementsByName('doctoratecourseswithstream');
            var counterDoctorate = allDoctorateSpan.length;
            var btn = document.createElement("span"); 
            var DoctorateCourses = document.getElementById("DoctorateCourses").value;
            var DoctorateStreams = document.getElementById("DoctorateStreams").value;
            if(DoctorateCourses.trim().length >0 && DoctorateStreams.trim().length>0){
              document.getElementById("ppg-error").innerHTML = '';

              var upcommingPPGData = DoctorateCourses.trim().concat(' - ',DoctorateStreams.trim());
              if(ppgarraylocalstorage.length<5){

                  if(ppgarraylocalstorage.indexOf(upcommingPPGData)==-1){
                      btn.innerHTML = "<input type ='button' data-toggle='tooltip'  style='margin-right: 5px; margin-bottom: 5px; ' name='doctoratecourseswithstreambuttonname' title='Remove Doctorate!' class='btn btn-success btn-xs' id='Doctorate" + counterDoctorate + "'  value='" + DoctorateCourses + " - " + DoctorateStreams + "'  onClick = 'DoctorateRemove(" + counterDoctorate + ")'><input type ='hidden'  name='doctoratecourseswithstream'  value='" + DoctorateCourses + "," + DoctorateStreams + "'>";
                      btn.id = "DoctorateSpan" + counterDoctorate;
                      document.getElementById("divDoctorate").appendChild(btn);
                      ppgarraylocalstorage[counterDoctorate] = upcommingPPGData;
                       // console.log('Array of PGcources after update : '+ppgarraylocalstorage);
                        counterDoctorate++;
                  }else{
                    ppgerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>This Doctorate Course is already added.</b> </div>";
                    document.getElementById("ppg-error").innerHTML = ppgerror;
                  }
              }
              else{
                  ppgerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>Max Doctorate Cources Exceed.</b> </div>";
                  document.getElementById("ppg-error").innerHTML = ppgerror;
              }
            }
            else{
              ppgerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>Please Select Doctorate Cource and Stream and click ADD Button.</b> </div>";
                  document.getElementById("ppg-error").innerHTML = ppgerror;
            }
                        return false;
        }
        </script>

        <script>
        function addLocation() {
          document.getElementById("location-error").innerHTML = '';
          locationerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>Please Select country, State and City and click ADD Button.</b> </div>";
              document.getElementById("location-error").innerHTML = locationerror;
           var allLocationSpan = document.getElementsByName('locationpreferedwithcity');
           //console.log(allLocationSpan);
            var counterLocation = allLocationSpan.length;
            var btn = document.createElement("span");
            var country = document.getElementById("country");
            var countryVal = country.value;
            var selected_country = country.options[country.selectedIndex].innerHTML;
            var state = document.getElementById("state");
            var stateVal = state.value;
            var selected_state = state.options[state.selectedIndex].innerHTML;
            var city = document.getElementById("city").value;
            // console.log(selected_country+" "+selected_state+" "+city);
            // console.log(locationarraylocalstorage);
            if(countryVal.trim().length >0 && stateVal.trim().length>0 && city.trim().length>0){
              document.getElementById("location-error").innerHTML = '';
              var upcommingLocationData = selected_country.trim().concat(" - "+selected_state.trim()+" - "+city.trim());
              //console.log('upcommingLocationData'+upcommingLocationData);
              if(locationarraylocalstorage.length<5){
                //console.log('locationarraylocalstorage.indexOf(upcommingLocationData)'+locationarraylocalstorage.indexOf(upcommingLocationData));
                    if(locationarraylocalstorage.indexOf(upcommingLocationData)==-1){
                        btn.innerHTML = "<input type ='button' data-toggle='tooltip'  style='margin-right: 5px; margin-bottom: 5px;' name='locationpreferedbuttonname' title='Remove Location!' class='btn btn-success btn-xs' id='Location" + counterLocation + "'  value='"+ selected_country+ " - "+selected_state+" - "+city+"'  onClick = 'LocationsRemove(" + counterLocation + ")'><input type ='hidden'  name='locationpreferedwithcity' value='" + countryVal + "," + stateVal + "," + city + "'>";
                        btn.id = "LocationSpan" + counterLocation;
                        document.getElementById("divLocation").appendChild(btn);
                        locationarraylocalstorage[counterLocation] = upcommingLocationData;
                        //  console.log('Array of location after update : '+locationarraylocalstorage);
                        counterLocation++;
                    }else{
                        locationerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>This Location is already added.</b> </div>";
                        document.getElementById("location-error").innerHTML = locationerror;
                    }
              }
              else{
                  locationerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>Max Location Count Exceed.</b> </div>";
                        document.getElementById("location-error").innerHTML = locationerror;
              }
          }
            return false;
        }
    </script>



                  <script>
                  function compare()
                  {
                    var AnnualMinPkg=document.getElementById('annualminpkg').value;
                    var AnnualMaxPkg=document.getElementById('annualmaxpkg').value;
                    if(parseInt(AnnualMinPkg)>parseInt(AnnualMaxPkg) || parseInt(AnnualMinPkg)==parseInt(AnnualMaxPkg) )
                    {/*<input type ='hidden'   name='pkgvalidation' value='Minimum Value must be less than maximum value'>*/
                      //alert('Minimum Value must be less than maximum value');
                      
                       maxpkt= "<div style='color:red;' data-toggle='tooltip' id = 'maxpkgdiv'>Minimum Value must be less than maximum value' </div>";
                      document.getElementById("divpkg").innerHTML = maxpkt;
                      document.getElementById('annualmaxpkg').value = '';

                    }
                    if(parseInt(AnnualMinPkg)<parseInt(AnnualMaxPkg))
                    {
                      $("#maxpkgdiv").remove();
                      //document.getElementById("divpkg").innerHTML += '';
                    }
                  }
                  </script>
               <script>
              function ShowState(){
                  var Country = document.getElementById('country').value;
              // console.log(vl);
                    $.ajax({
                      type:"post",
                      url: "<?php echo url("/common/showstate"); ?>",
                    data:{Country:Country,"_token":'{{csrf_token()}}'},
                    context: document.body
                    }).done(function(msg) {
                    $('#NewState').html(msg);
                    });
              }
              </script>
               <script>
              function ShowCity(){
                  var State = document.getElementById('state').value;
              // console.log(vl);
                    $.ajax({
                      type:"post",
                      url: "<?php echo url("/common/showcity"); ?>",
                    data:{State:State,"_token":'{{csrf_token()}}'},
                    context: document.body
                    }).done(function(msg) {
                    $('#NewCity').html(msg);
                    });
                    document.getElementById('state-error').innerHTML = '';
              }
              </script>


              <script>
              function ShowUGStream(){
                  var UGCourse = document.getElementById('UGCourses').value;
               //  alert(UGCourse); die();
              // console.log(vl);
                    $.ajax({
                      type:"post",
                      url: "<?php echo url("/common/showugstream"); ?>",
                    data:{UGCourse:UGCourse,"_token":'{{csrf_token()}}'},
                    context: document.body
                    }).done(function(msg) {
                    $('#UGStream').html(msg);
                    });
              }
              </script>

              <script>
              function ShowPGStream(){
                  var PGCourse = document.getElementById('PGCourses').value;
                  //alert(PGCourse); die();
              // console.log(vl);
                    $.ajax({
                      type:"post",
                      url: "<?php echo url("/common/showpgstream"); ?>",
                    data:{PGCourse:PGCourse,"_token":'{{csrf_token()}}'},
                    context: document.body
                    }).done(function(msg) {
                    $('#PGStream').html(msg);
                    });
              }
              </script>


<script>
function ShowDOCTORATEStream(){
     var DoctorateCourse = document.getElementById('DoctorateCourses').value;
    // alert(DoctorateCourse); die();
 // console.log(vl);
      $.ajax({
        type:"post",
        url: "<?php echo url("/common/showdoctoratestream"); ?>",
       data:{DoctorateCourse:DoctorateCourse,"_token":'{{csrf_token()}}'},
      context: document.body
      }).done(function(msg) {
      $('#DOCTORATEStream').html(msg);
      });
}
</script>


    <!-- NProgress -->



<script>
              function FunctionalJobRole(){
                  var FunctionalArea = document.getElementById('FunctionRole').value;
               // alert(FunctionalArea); 
              // console.log(vl);
                    $.ajax({
                      type:"post",
                      url: "<?php echo url("/common/functionaljobrole"); ?>",
                    data:{FunctionalArea:FunctionalArea,"_token":'{{csrf_token()}}'},
                    context: document.body
                    }).done(function(msg) {
                    $('#FunctionalRole').html(msg);
                    });
                    document.getElementById('FunctionRole-error').innerHTML = '';
              }
              </script>

              <script>
              $(document).change(function () {
                  var MinExp = document.getElementById("minexp").value;
                  document.getElementById("minexpbadge").innerHTML = MinExp;
                //  document.getElementById("maxexp").innerHTML = MinExp;

                   var MinRelExp = document.getElementById("minrelexp").value;
                  document.getElementById("minrelexpbadge").innerHTML = MinRelExp;
                  
                   var PrefMinAge = document.getElementById("prefminage").value;
                  document.getElementById("prefminagebadge").innerHTML = PrefMinAge;



                     var MaxExp = document.getElementById("maxexp").value;
                   document.getElementById("maxyearexp").innerHTML = MaxExp;
                  // //document.getElementById("maxexp").innerHTML = MaxExp;

                   var MaxRelexExp = document.getElementById("maxrelexp").value;
                  document.getElementById("maxrelexpbadge").innerHTML = MaxRelexExp;
                  
                   var PrefMaxAge = document.getElementById("prefmaxage").value;
                  document.getElementById("prefmaxagebadge").innerHTML = PrefMaxAge;

                     var ServiceTenure = document.getElementById("servicetenure").value;
                  document.getElementById("servicetenurebadge").innerHTML = ServiceTenure;


              });
              </script>
 <script>
              function saveAndPostCreatejob(condition) {
                  var boards = [];
                  if (condition=='1')
                  { 
                    var i=0;
                    $('.myjobboards:checked').each(function(){        
                      var values = $(this).val();
                      boards[i] = values;
                      i++;
                    
                    });                    
                    console.log(boards);
                  }
                  if (condition=='0')
                  {
                    var jobTitle=document.getElementById('jobtitle').value;
                 
                   
                     if(jobTitle.length==0){
                       $("#myModal").remove();
                       document.getElementById('jobtitle-error').innerHTML = 'This field is required.';
                       document.getElementById('jobtitle').focus();
                        return false;
                   }
                  }
                          
                    var ugarray=[];
                    var pgarray=[];
                    var doctoratearray=[];
                    var countryarray=[];

                    var PAGENAME = document.getElementById('PAGENAME').value;
                    var JOBID = document.getElementById('JOBID').value;
                    var Jobtitle = document.getElementById('jobtitle').value;
                    var Ccmpanyname = document.getElementById('Ccmpanyname').value;
                    var editor1=CKEDITOR.instances.editor1.getData();
                    var editor2=CKEDITOR.instances.editor2.getData();
                    var editor3=CKEDITOR.instances.editor3.getData();
                    var editor4=CKEDITOR.instances.editor4.getData();
                    var minexp = document.getElementById('minexp').value;
                    var maxexp = document.getElementById('maxexp').value;
                    var Employmenttype = document.querySelector('input[name="Employmenttype"]:checked').value;
                    console.log(Employmenttype);
                    var currency = document.querySelector('input[name="currency"]:checked').value;
                    console.log(currency);
                    var prefminage = document.getElementById('prefminage').value;
                    var prefmaxage = document.getElementById('prefmaxage').value;
                    var maxrelexp = document.getElementById('maxrelexp').value;
                    var minrelexp = document.getElementById('minrelexp').value;
                    var annualminpkg = document.getElementById('annualminpkg').value;
                    var annualmaxpkg = document.getElementById('annualmaxpkg').value;
                    var CompanyVideoUrl = document.getElementById('CompanyVideoUrl').value;
                    var crrentpstion = document.getElementById('currentposition').value;
                    var servicetenure = document.getElementById('servicetenure').value;
                    var country = document.getElementsByName('locationpreferedwithcity');
                    var indstry = document.getElementById('industry').value;
                    var FnctnRle = document.getElementById('FunctionRole').value;
                    var jbrl = document.getElementById('jobrole').value;
                    var ug = document.getElementsByName('ugcourseswithstream');
                    var pg = document.getElementsByName('pgcourseswithstream');
                    var doctorate = document.getElementsByName('doctoratecourseswithstream');
                    var Name = document.getElementById('Name').value;
                    var EmailAddress = document.getElementById('EmailAddress').value;
                    var PhoneNumber = document.getElementById('PhoneNumber').value;
                    var industry = indstry.split(" -- ",1);
                    var FunctionRole = FnctnRle.split(" -- ",1);
                    var Jobrole = jbrl.split(" -- ",1);
                    var jobopning = document.getElementById('jobopning').value;
                          var obj = {};

                          obj.name = Name;
                          obj.emailid = EmailAddress;
                          obj.phonenumber = PhoneNumber;
          
                    if($('#hidesalary').not(':checked').length){
                      var hidesalary = 0;
                    }
                    else{
                      var hidesalary = 1;
                    }
                    
                    if($('#salarynotconstraint').not(':checked').length){
                      var salarynotconstraint = 0; 
                    }
                    else{
                      var salarynotconstraint = 1;
                    }

                    for(var i=0;i<ug.length;i++)
                      {
                        ugarray[i]=ug[i].value;
                        console.log(ugarray[i]);
                        }
                      for(var j=0;j<pg.length;j++)
                      {
                        pgarray[j]=pg[j].value;
                        console.log(pgarray[j]);
                        }
                      for(var k=0;k<doctorate.length;k++)
                      {
                        doctoratearray[k]=doctorate[k].value;
                        console.log(doctoratearray[k]);
                        }
                      for(var l=0;l<country.length;l++)
                      {
                        countryarray[l]=country[l].value;
                        console.log(countryarray[l]);
                      }
                      if(condition=='1'){
                    
                              $.ajax({
                            type:"post",
                            url: "<?php echo url("/employer/createjob"); ?>",
                            data:{PAGENAME:PAGENAME,JOBID:JOBID,Jobtitle:Jobtitle,Ccmpanyname:Ccmpanyname,ug:ugarray,pg:pgarray,
                            doctorate:doctoratearray,country:countryarray,editor1:editor1,
                            editor2:editor2,editor3:editor3,editor4:editor4,minexp:minexp,
                            maxexp:maxexp,Employmenttype:Employmenttype,currency:currency,
                            prefminage:prefminage,prefmaxage:prefmaxage,maxrelexp:maxrelexp,
                            minrelexp:minrelexp,annualminpkg:annualminpkg,annualmaxpkg:annualmaxpkg,
                            hidesalary:hidesalary,salarynotconstraint:salarynotconstraint,
                            CompanyVideoUrl:CompanyVideoUrl,currentposition:crrentpstion,
                            servicetenure:servicetenure,industry:industry,
                            FunctionRole:FunctionRole,jobrole:Jobrole,Name:Name,
                            EmailAddress:EmailAddress,PhoneNumber:PhoneNumber,obj,condition:condition,boards:boards,jobopning:jobopning,"_token":'{{csrf_token()}}'},
                            context: document.body
                      }).done(function(msg) {
                        console.log(msg);
                        if(msg.errors){
                        $("#myModal").hide(); 
                        $('#error').html('<div class="alert alert-danger" id="myalertstatus" >Data is Not Valid, Please Insert Valid Data.</div>');
                        window.location.hash = '#error';
                        $('#myalertstatus').fadeOut(10000);
                        }
                        else{
                          $("#myModal").hide();

  $.toast({
                heading: 'Success',
                text: 'You have Successfully Finished the Job.',
                icon: 'success',    
                position: 'top-right'
            })

      $('#postmodelincreatejob').modal('show');
      //window.location.reload();
                        } 
                    });
                    } 
                    else{
                      if(condition=='0'){
                    
                          $.ajax({
                                  type:"post",
                                  url: "<?php echo url("/employer/createjob"); ?>",
                                  data:{PAGENAME:PAGENAME,JOBID:JOBID,Jobtitle:Jobtitle,Ccmpanyname:Ccmpanyname,ug:ugarray,pg:pgarray,
                                  doctorate:doctoratearray,country:countryarray,editor1:editor1,
                                  editor2:editor2,editor3:editor3,editor4:editor4,minexp:minexp,
                                  maxexp:maxexp,Employmenttype:Employmenttype,currency:currency,
                                  prefminage:prefminage,prefmaxage:prefmaxage,maxrelexp:maxrelexp,
                                  minrelexp:minrelexp,annualminpkg:annualminpkg,annualmaxpkg:annualmaxpkg,
                                  hidesalary:hidesalary,salarynotconstraint:salarynotconstraint,
                                  CompanyVideoUrl:CompanyVideoUrl,currentposition:crrentpstion,
                                  servicetenure:servicetenure,industry:industry,
                                  FunctionRole:FunctionRole,jobrole:Jobrole,Name:Name,
                                  EmailAddress:EmailAddress,PhoneNumber:PhoneNumber,obj,condition:condition,boards:boards,jobopning:jobopning,"_token":'{{csrf_token()}}'},
                            context: document.body
                            }).done(function(msg) {
                          
                            $("#myModal").hide();
  $.toast({
                heading: 'Success',
                text: 'You have Successfully Saved the Job.',
                icon: 'success',    
                position: 'top-right'
            })
                            });
                    }
                    
                    }
                    
                      
              }
 </script> 
 <script>
        $('input[name="currency"]').on('ifChecked', function() {
            var currencytype = $("input[name='currency']:checked"). val();
            console.log('currencytype: '+currencytype);
            $(".minannualincome").remove();
            $(".maxannualincome").remove();
          if(currencytype=='USD'){
                var option = "<option class='minannualincome' value='786'> Less than 5,000 </option>"
                            document.getElementById('annualminpkg').innerHTML += option;
                for(var x=5000;x<=100000;x=x+5000){
                            var option = "<option class='minannualincome' value='"+ x +"'> " + x.toLocaleString() + "</option>"
                            document.getElementById('annualminpkg').innerHTML += option;   
                } 
                var option = "<option class='minannualincome' value='10000000'>  100,000 & above </option>"
                            document.getElementById('annualminpkg').innerHTML += option;
            }
          else if(currencytype=='INR'){
              var option = "<option class='minannualincome' value='12477'> Less than 50,000 </option>"
                          document.getElementById('annualminpkg').innerHTML += option;
              for(var x=50000;x<=100000;x=x+10000){
                          var option = "<option class='minannualincome' value='"+ x +"'> " + x.toLocaleString() + "</option>"
                          document.getElementById('annualminpkg').innerHTML += option;   
              } 
              for(var y=125000;y<=500000;y=y+25000){
                          var option = "<option class='minannualincome' value='"+ y +"'> " + y.toLocaleString() + "</option>"
                          document.getElementById('annualminpkg').innerHTML += option;   
              } 
              for(var z=550000;z<=1000000;z=z+50000){
                          var option = "<option class='minannualincome' value='"+ z +"'> " + z.toLocaleString() + "</option>"
                          document.getElementById('annualminpkg').innerHTML += option;   
              } 
              for(var p=1100000;p<=2000000;p=p+100000){
                          var option = "<option class='minannualincome' value='"+ p +"'> " + p.toLocaleString() + "</option>"
                          document.getElementById('annualminpkg').innerHTML += option;   
              } 
              for(var q=2250000;q<=4000000;q=q+250000){
                          var option = "<option class='minannualincome' value='"+ q +"'> " + q.toLocaleString() + "</option>"
                          document.getElementById('annualminpkg').innerHTML += option;   
              } 
               for(var r=4500000;r<=9500000;r=r+500000){
                          var option = "<option class='minannualincome' value='"+ r +"'> " + r.toLocaleString() + "</option>"
                          document.getElementById('annualminpkg').innerHTML += option;   
              }
              var option = "<option class='minannualincome' value='10000000'>  100,00,000 & above </option>"
                          document.getElementById('annualminpkg').innerHTML += option;
          }
            
      else{

          // ShowMaxAnnualIncome();
      }
          });

          function ShowMaxAnnualIncome(){
            var minpkg = document.getElementById('annualminpkg').value;
            document.getElementById('annualminpkg-error').innerHTML = '';
            console.log(minpkg);
            var currencytype = $("input[name='currency']:checked"). val();
            $(".maxannualincome").remove();
             var incomearray = [];
             console.log(incomearray);
            
            if(currencytype=='USD'){
              incomearray.push(786);
              for(var x=5000;x<=100000;x=x+5000){
                incomearray.push( x );
              } 
              incomearray.push(10000000);
              console.log(incomearray);
              // if(minpkg =="Less than 5000" || minpkg =="100000 & above"){
              //   console.log('string he');
              // }
              // else{
                //console.log('integer he');
               minpkg = parseInt(minpkg);
             // }
              console.log('minpkg: '+minpkg);
              var minvalueindex = incomearray.indexOf(minpkg);
              console.log('minvalueindex: '+minvalueindex);
              maxlimit = minvalueindex+2;
              console.log('incomearray.length: '+incomearray.length);
              if(maxlimit>=incomearray.length-1){
                maxlimit=incomearray.length-1;
              }
              console.log('maxlimit: '+maxlimit);
              for(var i=minvalueindex; i<=maxlimit; i++){
                if(i == 0){
                  var option = "<option class='maxannualincome' value='" + incomearray[i] + "'>Less than 5,000</option>"
                }
                else if(i==incomearray.length-1){
                  var option = "<option class='maxannualincome' value='" + incomearray[i] + "'>100,000 & above</option>"
                }
                else{
                var option = "<option class='maxannualincome' value='" + incomearray[i] + "'> " + incomearray[i] + "</option>"
                }
                document.getElementById('annualmaxpkg').innerHTML += option;
              }
            }

            else if(currencytype=='INR'){
              incomearray.push(12477);
              for(var x=50000;x<=100000;x=x+10000){
                          incomearray.push( x );  
              } 
              for(var y=125000;y<=500000;y=y+25000){
                         incomearray.push( y );  
              } 
              for(var z=550000;z<=1000000;z=z+50000){
                          incomearray.push( z ); 
              } 
              for(var p=1100000;p<=2000000;p=p+100000){
                          incomearray.push( p );   
              } 
              for(var q=2250000;q<=4000000;q=q+250000){
                          incomearray.push( q );  
              } 
               for(var r=4500000;r<=9500000;r=r+500000){
                         incomearray.push( r );
              }
              incomearray.push(10000000);
              // console.log(incomearray);
              // if(minpkg =="Less than 50000" || minpkg =="10000000 & above"){
              //   console.log('string he');
              // }
              // else{
                //console.log('integer he');
               minpkg = parseInt(minpkg);
              //}
              console.log('minpkg: '+minpkg);
              var minvalueindex = incomearray.indexOf(minpkg);
              console.log('minvalueindex: '+minvalueindex);
              maxlimit = minvalueindex+5;
              console.log('incomearray.length: '+incomearray.length);
              if(maxlimit>=incomearray.length-1){
                maxlimit=incomearray.length-1;
              }
              console.log('maxlimit: '+maxlimit);
              for(var i=minvalueindex; i<=maxlimit; i++){
                if(i == 0){
                  var option = "<option class='maxannualincome' value='" + incomearray[i] + "'>Less than 50,000</option>"
                }
                else if(i == incomearray.length-1){
                  var option = "<option class='maxannualincome' value='" + incomearray[i] + "'>100,00,000 & above</option>"
                }
                else{
                var option = "<option class='maxannualincome' value='" + incomearray[i] + "'> " + incomearray[i] + "</option>"
                }
                   document.getElementById('annualmaxpkg').innerHTML += option;
              }
            }
            else{

            }

          }
  </script>
 <script>
                $(function () {
                  //Initialize Select2 Elements
                  $('.select2').select2()
                }
                 );
                $(function(){

<?php 
$job_titles = array();
foreach ($Jobs_seed_data_Current_Position as $job) { 
$job_titles[] = array('data'=>$job->value, 'value'=>$job->value);
} 
?>
var currencies = <?php echo json_encode($job_titles); ?> 
/* [
{ value: 'Director-Business Development', data: 'Director-Business Development' },
]; */
// setup autocomplete function pulling from currencies[] array
$('.autocomplete').jobtitle({
lookup: currencies,
onSelect: function (suggestion) {
var thehtml = '<strong>Currency Name:</strong> ' + suggestion.value + ' <br> <strong>Symbol:</strong> ' + suggestion.data;
$('#outputcontent').html(thehtml);
}
});


});
     
 function checkQuote() {
      if(event.keyCode == 39 || event.keyCode == 34) {
        event.keyCode = 0;
        return false;
      }
    }

              </script>
            
</body>
</html>