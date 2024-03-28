<!DOCTYPE html>
<html lang="en">
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>IRS | Active Job Login </title>
     @include('layouts.css')
  </head>

  <body class="login">
    <div>
    <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        
                    @endauth
                </div>
            @endif
            <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo url("users/create_user") ?>" method="get">
              <h1>Login Form</h1>
              @if (Session::has('role_error'))
              <span class="invalid-feedback">
              <strong>{{ Session::get('role_error') }}
              </strong></span>
              @endif
              <div class="form-group row">
                <input type="text" class="form-control" name="name" id="username" placeholder="Username" required="" />
                @if ($errors->has('name'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group row">
                <input type="email" class="form-control" name="userid" id="email" placeholder="Email Address" required="" />
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group row left">
                <input type="radio" class="flat" name="role" id="role" value="EMPLOYER"  required="" />
                Employer
                <input type="radio" class="flat" name="role" id="role"  value="JOB_SEEKER"  required="" />
                Job Seeker
                @if ($errors->has('role'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span>
                @endif
                
                <input type="hidden" class="form-control" name="_token" id="_token" value="{{ csrf_token() }}">
                <input type="hidden" class="form-control" name="token" id="token" value='WdLiluxxZVkPUHsAvW' />
              </div>
             
              <div class="form-group row">
                <input type="submit" class="btn btn-default submit" name="btnsubmit" value="Login" />
              </div>

              <div class="clearfix"></div>

              <div class="separator">
              </div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Foodlink!</h1>
                </div>
              </div>
           </form>
          </section>
        </div>
             </div>
    </div>
  </body>
   @include('layouts.js')
  <script>
   
  function addValidations(){
    console.log('i am in addvalidations');
    document.getElementById('username').setAttribute("required", "required");
    document.getElementById('email').setAttribute("required", "required");
  }
 
</script>

<!--<script type="text/javascript" >
 function getrole(role)
  {
    console.log("role is:"+role);
    
  }
function saveloginuser() {
    var name = document.getElementById('username').value;
    var userid = document.getElementById('email').value;
    var role = 'employer';
    var token = 'WdLiluxxZVkPUHsAvWdLiluxxZVkPUHsAvWdLiluxxZVkPUHsAvWdLiluxxZVkPUHsAvWdLiluxxZVkPUHsAvWdLiluxxZVkPUHsAvWdLiluxxZVkPUHsAvWdLiluxxZVkPUHsAvWdLiluxxZVkPUHsAv';
    $.ajax({
        type:"post",
        url: "create_user",
       data:{name:name,userid:userid,role:role,token:token,"_token":'{{csrf_token()}}'},
  context: document.body
  }).done(function(msg) {
 // $('#DOCTORATEStream').html(msg);
  });
}
</script>-->
</html>
