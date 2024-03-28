<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IRS | Employer Profile
    </title>
    @include('layouts.css')
    <style type="text/css">
      label.error:not(.form-control) {
        color: #EB5E28;
        /* font-weight: 300; */
        font-size: 0.8em;
      }
    </style>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container"> 
        @include('layouts.employer_sidebar')
        @include('layouts.header')
        <div class="right_col" role="main" >
          <div class="page-title">
            <div class="title_left">
              <h3>Employer Profile
              </h3>
            </div>
            <div class="title_right">
              <div class="form-group pull-right top_search">
                <div class="input-group">
                  <ol class="breadcrumb">
                    <li>
                      <a href="#">
                        <i class="fa fa-dashboard">
                        </i> Home
                      </a>
                    </li>
                    <li class="active">Employer Profile
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix">
          </div>
          <div class="x_panel">
            <div class="x_title">
              <div class="col-md-12">
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info alert-dismissible') }}" id="myalertstatus">{{ Session::get('message') }}
                </p>
                @endif
              </div>
              <h2>Profile
              </h2>
              <div class="clearfix">
              </div>
            </div>
            <?php foreach ($employerprofile as $profile) { ?>
            <div class="x_content">
              <div class="col-md-3">
                <div class="profile_img">
                  <div id="crop-avatar">
                    <!-- Current avatar -->
                    <img class="img-responsive avatar-view" src="<?php echo url('/'); ?>/storage/app/public/employer/<?php if(strlen($profile->path) > 0){echo $profile->path; } else { echo 'default.png'; }  ?>" alt="Avatar" title="Change the avatar"  >
                  </div>
                </div>
                <h3>
                  <?php echo $profile->name; ?>
                </h3>
              </div>
              <div class="col-md-9">
                <div class="profile_title">
                  <div class="col-md-6">
                    <h2>Company Profile
                    </h2>
                  </div>
                  <div class="col-md-6">
                    <button class="btn btn-success btn-sm pull-right"  data-toggle="modal" data-target=".bs-example-modal-lg" type="button"  title="Add Education">
                      <i class="glyphicon glyphicon-edit">
                      </i>
                    </button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <h4>
                      <b>Company Name -
                      </b>
                    </h4>  
                  </div>
                  <div class="col-md-9">
                    <h4>
                      <?php echo $profile->company ?>
                    </h4>  
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <h4>
                      <b>Company Type -
                      </b>
                    </h4>  
                  </div>
                  <div class="col-md-9">
                    <h4>
                      <?php if ($profile->company_type == 1){ echo 'Company Recruter';} else{ echo 'Recuritment Agency'; } ?>
                    </h4>  
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <h4>
                      <b>Website -
                      </b>
                    </h4>  
                  </div>
                  <div class="col-md-9">
                    <h4>
                      <?php echo $profile->website ?>
                    </h4>  
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <h4>
                      <b>Address -
                      </b>
                    </h4>  
                  </div>
                  <div class="col-md-9">
                    <h4>
                      <?php echo trim($profile->addline1); ?>
                    </h4>  
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <h4>
                      <b>About Company -
                      </b>
                    </h4>  
                  </div>
                  <div class="col-md-9">
                    <h4>
                      <?php echo trim($profile->about); ?>
                    </h4>  
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="modal fade bs-example-modal-lg">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×
                    </span>
                  </button>
                  <h4 class="modal-title" id="">
                    <center>
                      <h3> COMPANY DETAILS
                      </h3>  
                    </center>
                  </h4>
                </div>
                <div class="modal-body">
                  <div class="card wizard-card" data-color="orange" id="wizardProfile">
                    <form action="editemployerprofile" method="post" id="mains" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-sm-5  col-sm-offset-1 ">                       
                          <div class="form-group">
                            <label>Company Name 
                              <span class="requerd">*
                              </span>
                            </label>
                            <input name="companyname" id="companyname" type="text" value="<?php echo $profile->company ?>" class="form-control" placeholder="Enter Company..." onkeypress="return checkQuote();">
                            <div id="companyname-error">
                            </div>
                            <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" name="Address" value="" id="Address" required="">
                            <input type="hidden" name="About" value="" id="About" required="">
                          </div> 
                          <div class="form-group">
                            <label>Company Type 
                              <span class="requerd">*
                              </span>
                            </label>
                            <br>
                            <input type="radio" class="flat" name="companytype"  value="1" 
                                   <?php if($profile->company_type==1) echo "checked"; ?> style="position: absolute; opacity: 0; top: 0%; left: 0%;  margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px;" required /> Company
                            <input type="radio" class="flat" name="companytype"  value="2" 
                                   <?php if($profile->company_type==2) echo "checked"; ?> style="position: absolute; opacity: 0; top: 0%; left: 0%;  margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; " /> 
                            Recuritment Agency
                          </div>
                        </div>
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2 ">
                        <div class="panel-body" align="center">
                        <div class="picture-container">
                        <div class="picture">
                        <div id="wizardPicturePreview">
                          <img src="<?php echo url('/'); ?>/storage/app/public/employer/<?php if(strlen($profile->path) > 0){echo $profile->path; } else {  }  ?>"  class="picture-src" id="wizardPicturePreview" title=""/>
                          </div>
                            <input type="file" name="employer_logo" id="employer_logo" accept=".jpg,.JPG,.JPEG,.PNG,.jpeg,.png" />
                            <h2>Profile Picture</h2>
                        </div>
                      </div>
                      </div>
                        <div class="col-sm-1">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-5 col-sm-offset-1">
                          <div class="form-group">
                            <label>Pincode 
                              
                            </label>
                            <input name="pincode" id="pincode" type="text"  onkeypress="javascript:return isNumber(event)" value="<?php echo $profile->pincode ?>" class="form-control" placeholder="Enter Pincode...">
                            <div id="pincode-error">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-group">
                            <label>Website 
                            </label>
                            <input name="website" id="website" type="text" value="<?php echo $profile->website ?>" class="form-control" placeholder="Enter Website..."  onblur="checkURL(this)">
                          </div>
                          <div id="website-error">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-sm-5 col-sm-offset-1">
                          <label>Address 
                            <span class="requerd">*
                            </span>
                          </label>
                          <div  contenteditable="true" id="editor1" class=".custom_scrollbar page" style="border: 1px solid; border-color:#d2d6de;min-height:120px; padding: 0 5px 0 5px;">
                          <div>
                              <?php echo trim($profile->addline1); ?>
                              <textarea id="editor1" name="address" >
                              </textarea>
                          </div>
            </div>
                          <div id = "divadd">
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <label>About Company 
                            <span class="requerd">*
                            </span>
                          </label>
                          <div contenteditable="true" id="editor2" class=".custom_scrollbar page" style="border: 1px solid; border-color:#d2d6de; min-height:120px; padding: 0 5px 0 5px;">
                          <div>
                              <?php echo trim($profile->about); ?>
                              <textarea  id="editor2" name="aboutcompany" >
                              </textarea>
            </div>
                          </div>
                          <div id = "divabt">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                        </button>
                        <input type="submit" class="btn btn-success" />
                      </div>
                    </form>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>	 

            <!-- Uplode Img Modal -->

            <div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Upload & Crop Image</h4>
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-8 text-center">
						  <div id="image_demo" style="width:350px; margin-top:30px"></div>
  					</div>
  					<div class="col-md-4" style="padding-top:30px;">
  						<br />
  						<br />
  						<br/>
						  <button class="btn btn-success crop_image">Crop & Upload Image</button>
					</div>
				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
    	</div>
    </div>
</div>
 <!-- Uplode Img Modal End-->

      @include('layouts.footer')       
      @include('layouts.js2')
  
      </body>
<script>  
$(document).ready(function(){

	$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'circle' //square
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#employer_logo').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"<?php echo url('/common/uploadImg'); ?>",
        type: "POST",
        data:{"image": response, _token: '{{csrf_token()}}'},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          $('#wizardPicturePreview').html(data);
        }
      });
    })
  });

});  
</script>
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
  
      <!-- ./wrapper -->
    <script>
      // WRITE THE VALIDATION SCRIPT.
      function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
          return false;
        return true;
      }
    </script>
    <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
      }
       )
    </script>

    <script>
      function ShowState(){
        var Country = document.getElementById('country').value;
        // console.log(vl);
        $.ajax({
          type:"post",
          url: "<?php echo url("/common/showstate"); ?>",
          data:{
          Country:Country,"_token":'{{csrf_token()}}'}
               ,
               context: document.body
               }
              ).done(function(msg) {
          $('#NewAddState').html(msg);
        }
                    );
      }
    </script>
    <script>
      function ShowCity(){
        var State = document.getElementById('state').value;
        // console.log(vl);
        $.ajax({
          type:"post",
          url: "<?php echo url("/common/showcity"); ?>",
          data:{
          State:State,"_token":'{{csrf_token()}}'}
               ,
               context: document.body
               }
              ).done(function(msg) {
          $('#NewAddCity').html(msg);
        }
                    );
      }
    </script>
    <script>
      $(document).ready(function () {
        // Listen to submit event on the <form> itself!
        $('#mains').click(function (e) {
          document.getElementById("companyname-error").innerHTML = '';
          var companyname=document.getElementById("companyname").value;
          if(companyname.trim().length==0){
            companynameerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>This field is required.</b> </div>";
            document.getElementById("companyname-error").innerHTML = companynameerror;
            e.preventDefault();
          }
       
          
       
          document.getElementById("divadd").innerHTML = '';
          var company_address=CKEDITOR.instances.editor1.getData();
          if(company_address.trim().length==0){
            addrs= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip'><b>This field is required.</b> </div>";
            document.getElementById("divadd").innerHTML = addrs;
            e.preventDefault();
          }
          document.getElementById("divabt").innerHTML = '';
          var abtcompany=CKEDITOR.instances.editor2.getData();
          if(abtcompany.trim().length==0){
            abtcmpny= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>This field is required.</b> </div>";
            document.getElementById("divabt").innerHTML = abtcmpny;
            e.preventDefault();
          }
          document.getElementById("Address").value = company_address;
          document.getElementById("About").value = abtcompany;
        }
                         );
      }
                       );



       function checkQuote() {
      if(event.keyCode == 39 || event.keyCode == 34) {
        event.keyCode = 0;
        return false;
      }
    }
    </script>
    </html>
  <!-- page script -->
