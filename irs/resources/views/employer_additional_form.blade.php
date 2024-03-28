<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IRS | Employer Additional Forms</title>
  @include('layouts.css')
  <style>
 label.error:not(.form-control) {
  color: #EB5E28;
  font-size: 0.8em;
 }
</style>
</head>
<body>
    <section class="content">
      <div class="row">
<!-- set up the modal to start hidden and fade in and out -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content"> 
        <br/> 
          <div class="col-md-12">
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info alert-dismissible') }}" id="myalertstatus">{{ Session::get('message') }}</p>
@endif
              </div>
      
      <!-- dialog body -->
      <div class="modal-body">
         <div class="row">
        <div class="col-sm-12">
            <div class="wizard-container">
              <div class="card wizard-card" data-color="orange" id="wizardProfile">
<!--  name="myform" -->
                                          <div class="pull-right"> 
                                            <a class="close" href="<?php echo url('/employer') ?>"><span aria-hidden="true">×</span></a> 
                                        </div>
                  <form action="<?php echo url("/employer/register_company"); ?>" method="post"  enctype="multipart/form-data" id="main">
                    
                      <center><h3> COMPANY DETAILS</h3>  </center>
                      <hr/>
                         <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
                         <input type="hidden" name="Address" value="" id="Address" required="">
                <input type="hidden" name="About" value="" id="About" required="">
              <div class="row">
    

                    <div class="col-sm-5  col-sm-offset-1 ">                       
                         <div class="form-group">
                        <label>Company Name <span class="requerd">*</span></label>
                        <input name="companyname" id="companyname" type="text" class="form-control" placeholder="Enter Company..." onkeypress="return checkQuote();">
                        <div id="companyname-error"></div>
                    </div> 
    
                    <div class="form-group">
                    <label>Company Type  <span class="requerd">*</span></label><br>
                         
                           <input type="radio" class="flat" name="companytype"  value="1" checked="" style="position: absolute; opacity: 0; top: 0%; left: 0%;  margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px;" required />
                       
                          Company
                          &nbsp;
                         
                            <input type="radio" class="flat" name="companytype"  value="2"  style="position: absolute; opacity: 0; top: 0%; left: 0%;  margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; " /> 
                           
                          Recuritment Agency
                        </div>

                </div>
               
                 <div class="col-sm-2"></div>
                <div class="col-sm-2 ">
                   <div class="panel-body" align="center">
                     <div class="picture-container">
                        <div class="picture">
                          <div id="wizardPicturePreview">
                            <img src="<?php echo url('/'); ?>/storage/app/public/employer ?>" style="" class="picture-src" id="wizardPicturePreview" title=""/>
                          </div>
                            <input type="file" name="employer_logo" id="employer_logo" accept=".jpg,.JPG,.JPEG,.PNG,.jpeg,.png" >
                        
                        <h4>Employer <br/>Logo</h4>
                      </div>
                    </div>
                  </div>
                  
                 <div class="col-sm-1"></div>
</div>
      
                </div>
<div class="row">
                 <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                        <label>Pincode</label>
                        <input name="pincode" id="pincode" type="text" class="form-control" placeholder="Enter Pincode"   onkeypress="javascript:return isNumber(event)" >
                        <div id="pincode-error"></div>
                    </div>
                </div>


                <div class="col-sm-5 ">
                    <div class="form-group">
                        <label>Website </label>
                        <input name="website" id="website" type="text" class="form-control" placeholder="Enter Website..." onblur="checkURL(this)">
                        <div id="website-error"></div>
                    </div>
                    
                </div>

               
                </div>

<div class="row">
                 <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                        <label>Address <span class="requerd">*</span></label>
                        <div contenteditable="true" id="editor1" name="editor1"  class=".custom_scrollbar page" style="border: 1px solid; border-color:#d2d6de; min-height:120px; padding: 0px 5px 0px 5px;">
                        <div>
                        <textarea name="address"  class="form-control">
                        </textarea>
                    </div>
                </div><div id = "divadd"></div>
                                 </div>
                                 </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>About Company  <span class="requerd">*</span></label>
                        <div contenteditable="true" id="editor2" name="editor2" class=".custom_scrollbar page" style="border: 1px solid; border-color:#d2d6de; min-height:120px; padding: 0px 5px 0px 5px;">
                        <div  >
                        <textarea name="aboutcompany">
                        </textarea>
                    </div>
                </div><div id = "divabt"></div>
          </div>
            </div>
                                 </div>
            <hr/>
           

                <div class="col-sm-10 col-sm-offset-1">
                <div class="wizard-footer">
                    <div class="pull-right">
                        <input type="submit" name="Submit" value="Submit" class="btn btn-success" />
                    </div>
                </div>
            </div>
            </form>
            </div> 
            </div> 
            </div> 
            </div> 
        </div>
        </div>
      </div>
    </div>
<!-- ./wrapper -->
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
</body>
@include('layouts.js2');
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
<!-- <script>
function ShowState(){
    var Country = document.getElementById('country').value;
    $.ajax({
        type:"post",
        url: "<?php /*echo url('/common/showstate');*/ ?>",
        data:{Country:Country,"_token":"{{csrf_token()}}"},
        context: document.body
        }).done(function(msg) {
        $("#NewAddState").html(msg);
    });
}
</script> -->
  <!--  <script>
function ShowCity(){
    var State = document.getElementById('state').value;
    console.log(State);
    $.ajax({
        type:"post",
        url: "<?php /*echo url('/common/showcity');*/ ?>",
        data:{State:State,"_token":"{{csrf_token()}}"},
        context: document.body
        }).done(function(msg) {
        $("#NewAddCity").html(msg);
    });
}
</script> -->
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
            function removeerrorcity(){
          document.getElementById('city-error').innerHTML = '';
        }
        </script>
              
<!-- sometime later, probably inside your on load event callback -->
<script>
    $("#myModal").on("show", function() {    // wire up the OK button to dismiss the modal when shown
        $("#myModal a.btn").on("click", function(e) {
            console.log("button pressed");   // just as an example...
            $("#myModal").modal('hide');     // dismiss the dialog
        });
    });
    $("#myModal").on("hide", function() {    // remove the event listeners when the dialog is dismissed
        $("#myModal a.btn").off("click");
    });
    
    $("#myModal").on("hidden", function() {  // remove the actual elements from the DOM when fully hidden
        $("#myModal").remove();
    });
    
    $("#myModal").modal({                    // wire up the actual modal functionality and show the dialog
      "backdrop"  : "static",
      "keyboard"  : true,
      "show"      : true                     // ensure the modal is shown immediately
    });
</script>
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
      
    })
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
<script>
$(document).ready(function () {
  // Listen to submit event on the <form> itself!
  $('#main').click(function (e) {
      
    document.getElementById("companyname-error").innerHTML = '';
      var companyname=document.getElementById("companyname").value;
     if(companyname.trim().length==0){
        companynameerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip'><b>This field is required.</b> </div>";
     document.getElementById("companyname-error").innerHTML = companynameerror;
    e.preventDefault();
    }

    //     document.getElementById("country-error").innerHTML = '';
    //   var country=document.getElementById("country").value;
    //  if(country.trim().length==0){
    //     countryerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip'><b>This field is required.</b> </div>";
    //  document.getElementById("country-error").innerHTML = countryerror;
    // e.preventDefault();
    // }

    //         document.getElementById("state-error").innerHTML = '';
    //   var state=document.getElementById("state").value;
    //  if(state.trim().length==0){
    //     stateerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip'><b>This field is required.</b> </div>";
    //  document.getElementById("state-error").innerHTML = stateerror;
    // e.preventDefault();
    // }
    // document.getElementById("city-error").innerHTML = '';
    //   var city=document.getElementById("city").value;
    //  if(city.trim().length==0){
    //     cityerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip'><b>This field is required.</b> </div>";
    //  document.getElementById("city-error").innerHTML = cityerror;
    // e.preventDefault();
    // }

        

       /* document.getElementById("website-error").innerHTML = '';
      var website=document.getElementById("website").value;
     if(website.trim().length==0){
        websiteerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip'><b>This field is required.</b> </div>";
     document.getElementById("website-error").innerHTML = websiteerror;
    e.preventDefault();
     }
     else{
      document.getElementById("website-error").innerHTML = '';
      var regForUrl = /(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
      if (!regForUrl.test(website)) { 
          websiteerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip'><b>Please enter a valid url with http.</b> </div>";
          document.getElementById("website-error").innerHTML = websiteerror;
          e.preventDefault();
      }else{
      
      }
     }
*/
    //          document.getElementById("estimatedvacancies-error").innerHTML = '';
    //   var estimatedvacancies=document.getElementById("estimatedvacancies").value;
    //  if(estimatedvacancies.trim().length==0){
    //     estimatedvacancieserror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>This field is required.</b> </div>";
    //  document.getElementById("estimatedvacancies-error").innerHTML = estimatedvacancieserror;
    // e.preventDefault();
    //  }

    document.getElementById("divadd").innerHTML = '';
    var company_address=CKEDITOR.instances.editor1.getData();
    if(company_address.trim().length==0){
     addrs= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>This field is required.</b> </div>";
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
  });
});


 function checkQuote() {
      if(event.keyCode == 39 || event.keyCode == 34) {
        event.keyCode = 0;
        return false;
      }
    }
</script>




  
</html>


