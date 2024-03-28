
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IRS | Job Seeker Dashboard</title>
  @include('layouts.css')
  <style>
 label.error:not(.form-control) {
  color: #EB5E28;
  font-size: 0.8em;
 }
</style>
</head>
<body class="">
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
       <div class="modal-header">

          
                      <div class="wizard-container">
              <div class="card wizard-card" data-color="orange" id="wizardProfile"> 
                    <center><h3> JOB SEEKER DETAILS</h3>  </center>
                    <hr/>
                            <form action="<?php echo url('job_seeker/register_jobseeker') ?>" method="post" id="main" enctype="multipart/form-data">
                            <div class="row">
                                        <div class="col-md-4">
                                                 <div class="form-group">
                                                   <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">

                                                   <label for="">Name *</label>
                                                    <input type="text" class="form-control"  name="name" id="name" placeholder="Name">
                                                    <div id="name-error"></div>
                                                </div> 
                                               
                                                <div class="form-group">
                                                   <label for="">Phone *</label>
                                                   <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone"  onkeypress="javascript:return isNumber(event)">
                                                   <div id="phone-error"></div>
                                                </div>
                                            </div>
                                                <div class="col-md-4">
                                                 <div class="form-group">
                                                   <label for="">Email *</label>
                                                   <input type="text" class="form-control" name="email" id="email" placeholder="Email" value={{Auth::check() ? Auth::user()->email : 'Account'}} readonly>
                                                   <div id="email-error"></div>
                                                   
                                                </div> 
                                                <div class="form-group">
                                                   <label for="">DOB *</label>
                                                   <input class="form-control" id="date" name="DOB" placeholder="MM/DD/YYYY" type="text"/>
                                                   <div id="date-error"></div>
</div>
                                               
                                             </div>
                                            <div class="col-md-1"></div>
                                                <div class="form-group col-md-2">
                                             <div class="picture-container">
                                                 <div class="picture">
                                                     <img src="assets/img/default-avatar.png" style="" class="picture-src" id="wizardPicturePreview" title=""/>
                                                     <input type="file" name="profile_pic" id="wizard-picture" accept=".jpg,.jpeg,.png">
                                                 
                                                 <h2>Profile Picture</h2>
                                               </div><div id = "divimglogo"></div>
                                             </div>      
                                         </div>
                                         <div class=" col-md-1"></div></div>
 
                                            <div class="row">
                                    
                                            <div class="form-group col-md-4">
                                            <label for="">Marital Status *</label>
                                                    <p style="margin-top: 5px;">       
                        Married <input type="radio" class="flat" name="marital" id="marital"  value="M" checked="" required="" data-parsley-multiple="Marital_Status" style="position: absolute; opacity: 0;">&nbsp;&nbsp; Single
                        <input type="radio" class="flat" name="marital" id="marital"  value="S"  required="" data-parsley-multiple="Marital_Status" style="position: absolute; opacity: 0;">
                      </p>
                                                 
                                                </div>
                   
                                                
                                              <div class="form-group col-md-4">
                                                   <label for="">Gender *</label>
                                                   <p style="margin-top: 5px;">
                        Male <input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required="" data-parsley-multiple="gender" style="position: absolute; opacity: 0;">&nbsp;&nbsp; Female
                        <input type="radio" class="flat" name="gender" id="genderF" value="F" data-parsley-multiple="gender" style="position: absolute; opacity: 0;">
                      </p>
                                            </div>
                                            <div class="form-group col-md-4">
                                                 
                                          <div class="btn btn-default btn-file" style="margin-top: 24px;">
                                          <label for=""> &nbsp; </label>
                                              <i class="fa fa-paperclip"></i> Attachment Resume
                                              <input type="file" name="attachment_file" id="attachment_file" accept=".doc, .docx, .txt,.pdf" onchange="validate_attachment()">
                                          </div>
                                                 
                                               
                                                </div>
                                            </div>
                                            <div class="row ">
                                                 <div class="form-group col-md-4">
                                                 <label for="country">Country *</label>
                                                 <select class="form-control select2" name="country" onChange="ShowState()"  style="width: 100%;" id="country">
                                                <option value="">Select Country</option>          
                                                        <?php foreach ($Country as $user3) { ?>
                                                        <option value="<?php echo $user3->location_id?>"><?php echo $user3->name?></option>
                                                            <?php } ?>
                                                </select> <div id="country-error"></div> 
                                                </div>
                                                   <div class="form-group col-md-4">
                                                <label>State *</label>
                                                   <div id="NewAddState"> <select class="form-control select2" name="state" id="state"  onChange="ShowCity()"  style="width: 100%;">
                                                </select> 
                                                </div><div id="state-error"></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label for="City">City *</label>
                                                <div id="NewAddCity"> <select class="form-control select2" name="city" id="city" style="width: 100%;">
                                                </select> </div>                                                  <div id="city-error"></div> 
                                             </div>
                                            </div>
                                             <div class="row">
                                                 <div class="form-group col-md-6">
                                                   <label for="About">About *</label>
                                                   <div id="column1" style="border: 1px solid; border-color:#d2d6de;">
                                                       <div contenteditable="true" id="editor1" name="editor1" required="required">
                                                   <textarea name="About"  class="form-control" rows="3" cols="20" required="required"></textarea>
                                                </div>
                                                        </div><div id="divabt"></div>
                                                        </div>
                                                   <div class="form-group col-md-6">
                                                   <label for="Address">Permanent Address *</label>
                                                   <div id="column2" style="border: 1px solid; border-color:#d2d6de;">
                                                       <div contenteditable="true" id="editor2" name="editor2" required="required">
                                                   <textarea  name="Address"   rows="3" cols="20" required="required">
                                                    </textarea>
                                                        </div>
                                                        </div><div id="divpaddrs"></div>
                                                </div>
                                            </div>
                               <input type="hidden" name="About" value="" id="About" required="">
                                <input type="hidden" name="Address" value="" id="Address" required="">
                            

                            <div class="modal-footer">
                         
                          <input type="submit" id="abcd" class='btn btn-success btn-fill btn-default' name="Submit" value="Submit" />
                        </div>
                        </form>
                    </div> <!-- wizard container -->
                </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ./wrapper -->
</body>
@include('layouts.js2')

<!-- Include Date Range Picker -->

<script type="text/javascript">
    function validate_attachment(){
        var attachment_file = document.getElementById("attachment_file").value;
        var idxDot = attachment_file.lastIndexOf(".") + 1;
        var extFile = attachment_file.substr(idxDot, attachment_file.length).toLowerCase();
        if (extFile=="doc" || extFile=="docx" || extFile=="pdf" || extFile=="txt"){ 
            //TO DO
        }else{
            alert("Only doc,docx and pdf files are allowed!");
            document.getElementById("attachment_file").value='';
        }   
    }
</script>
<script>
	$(document).ready(function(){
		var date_input=$('input[id="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'mm/dd/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})

function ShowState(){
  console.log('ShowState function call');
    var Country = document.getElementById('country').value;
    $.ajax({
        type:"post",
        url: "<?php echo url('/common/showstate'); ?>",
        data:{Country:Country,"_token":"{{csrf_token()}}"},
        context: document.body
        }).done(function(msg) {
        $("#NewAddState").html(msg);
    });
}

function ShowCity(){
    var State = document.getElementById('state').value;
    $.ajax({
        type:"post",
        url: "<?php echo url('/common/showcity'); ?>",
        data:{State:State,"_token":"{{csrf_token()}}"},
        context: document.body
        }).done(function(msg) {
        $("#NewAddCity").html(msg);
    });
}

</script><script>
function myFunction() {
    var x = document.getElementById("myFile");
    x.disabled = true;
}
</script>
   <script>
            function removeerrorcity(){
          document.getElementById('city-error').innerHTML = '';
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
        $("#myModal").remove1();
    });
    
    $("#myModal").modal({                    // wire up the actual modal functionality and show the dialog
      "backdrop"  : "static",
      "keyboard"  : true,
      "show"      : true                     // ensure the modal is shown immediately
    });
</script>
<script>
$(document).ready(function () {
  // Listen to submit event on the <form> itself!
  $('#main').click(function (e) {
    document.getElementById("name-error").innerHTML = '';
      var name=document.getElementById("name").value;
     if(name.trim().length==0){
     nameerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' id = 'maxpkgdiv'><b>This field is required.</b> </div>";
     document.getElementById("name-error").innerHTML = nameerror;
    //document.getElementById('editor1').focus();
    e.preventDefault();
    }
    document.getElementById("phone-error").innerHTML = '';
    var phone=document.getElementById("phone").value;
     if(phone.trim().length==0){
        phoneerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' id = 'maxpkgdiv'><b>This field is required.</b> </div>";
     document.getElementById("phone-error").innerHTML = phoneerror;
    //document.getElementById('editor1').focus();
    e.preventDefault();
    }
    document.getElementById("email-error").innerHTML = '';
    var email=document.getElementById("email").value;
     if(email.trim().length==0){
        emailerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' id = 'maxpkgdiv'><b>This field is required.</b> </div>";
     document.getElementById("email-error").innerHTML = emailerror;
    //document.getElementById('editor1').focus();
    e.preventDefault();
    }
    else{
          document.getElementById("email-error").innerHTML = '';
          var emailregex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          if (!emailregex.test(email)) {
            emailerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' id = 'maxpkgdiv'><b>Please Enter Valid E-mail.</b> </div>";
             document.getElementById("email-error").innerHTML = emailerror;
            //document.getElementById('editor1').focus();
            e.preventDefault();
          }
          else{

          }
    }
    document.getElementById("country-error").innerHTML = '';
    var country=document.getElementById("country").value;
     if(country.trim().length==0){
        countryerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' id = 'maxpkgdiv'><b>This field is required.</b> </div>";
     document.getElementById("country-error").innerHTML = countryerror;
    //document.getElementById('editor1').focus();
    e.preventDefault();
    }
    document.getElementById("state-error").innerHTML = '';
    var state=document.getElementById("state").value;
     if(state.trim().length==0){
        stateerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' id = 'maxpkgdiv'><b>This field is required.</b> </div>";
     document.getElementById("state-error").innerHTML = stateerror;
    //document.getElementById('editor1').focus();
    e.preventDefault();
    }
    document.getElementById("city-error").innerHTML = '';
    var city=document.getElementById("city").value;
     if(city.trim().length==0){
        cityerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' id = 'maxpkgdiv'><b>This field is required.</b> </div>";
     document.getElementById("city-error").innerHTML = cityerror;
    //document.getElementById('editor1').focus();
    e.preventDefault();
    }
    document.getElementById("date-error").innerHTML = '';
    var date=document.getElementById("date").value;
     if(date.trim().length==0){
        dateerror= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' id = 'maxpkgdiv'><b>This field is required.</b> </div>";
     document.getElementById("date-error").innerHTML = dateerror;
    //document.getElementById('editor1').focus();
    e.preventDefault();
    }
    document.getElementById("divabt").innerHTML = '';

    var abt=CKEDITOR.instances.editor1.getData();
    if(abt.trim().length==0){
     abtcmpny= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' id = 'maxpkgdiv'><b>This field is required.</b> </div>";
     document.getElementById("divabt").innerHTML = abtcmpny;
    //document.getElementById('editor1').focus();
    e.preventDefault();
    }
    document.getElementById("divpaddrs").innerHTML = ''; 
    var paddrs=CKEDITOR.instances.editor2.getData();
    if(paddrs.trim().length==0){
     peraddrs= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' id = 'maxpkgdiv'><b>This field is required.</b> </div>";
     document.getElementById("divpaddrs").innerHTML = peraddrs;
    //document.getElementById('editor2').focus();
    e.preventDefault();
    } 
    document.getElementById("About").value = abt;
    document.getElementById("Address").value = paddrs;
      abtvalue=document.getElementById("About").value;
     paddrsvalue= document.getElementById("Address").value;

  });
});

</script>
    

<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
      //Datemask dd/mm/yyyy
    })
  </script>

</html>