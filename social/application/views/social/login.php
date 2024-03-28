<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('buyer/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.12.0/bootstrap-social.min.css">
        <script src="https://cdn.rawgit.com/oauth-io/oauth-js/c5af4519/dist/oauth.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('social/partials/left-nav'); ?>    
                <?php //$this->load->view('buyer/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="x_panel">
                                    <div class="x_content">
                                        <?php if (form_error('Username')) { ?>
                                            <div class="alert alert-success">
                                                <?php echo form_error('Username'); ?>
                                            </div>
                                        <?php } ?>
                                        <div id="dataOutput"></div>
                                        <div class="" id="tabs" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li id="login" role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Login</a> </li>
                                                <li id="register" role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Register</a> </li>
                                            </ul>
                                            <div id="myTabContent" class="tab-content">
                                                <?php
                                                $sucess = $this->session->flashdata('Sucess');
                                                if ($sucess == NULL) {
                                                    $hidealert = "hide";
                                                } else {
                                                    $showalert = $sucess;
                                                    $hidealert = "";
                                                }
                                                ?>
                                                <div class="alert alert-success <?php echo $hidealert ?>">
                                                    <?php echo $showalert ?>
                                                </div>

                                                <?php
                                                $error_message = $this->session->flashdata('Error');
                                                if ($error_message == NULL) {
                                                    $hidealert = "hide";
                                                } else {
                                                    $showalert = $error_message;
                                                    $hidealert = "";
                                                }
                                                ?>
                                                <div class="alert alert-danger <?php echo $hidealert ?>">
                                                    <?php echo $showalert ?>
                                                </div>

                                                <?php
                                                $picerror = $this->session->flashdata('PicError');
                                                if ($picerror == NULL) {
                                                    $hidealert = "hide";
                                                } else {
                                                    $showalert = $picerror;
                                                    $hidealert = "";
                                                }
                                                ?>
                                                <div class="alert alert-success <?php echo $hidealert ?>">
                                                    <?php echo $showalert ?>
                                                </div>

                                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab"> 
                                                    <!-- start recent activity -->
                                                    <div class="container">
                                                        <div class="omb_login">
                                                            <h3 class="omb_authTitle">Login </h3>
                                                            <div class="row omb_row-sm-offset-3 omb_socialButtons">
                                                                <div class="col-xs-4 col-sm-2"> 
                                                                    <a href="javascript:void(0);" onclick="fbLogin()" class="btn btn-block btn-social btn-facebook"> <i class="fa fa-facebook"></i> Facebook </a> 
                                                                </div>
                                                                <div class="col-xs-4 col-sm-2"> 
                                                                    <a onclick="liAuth()" class="btn btn-block btn-social btn-linkedin linkedin-button"><i class="fa fa-linkedin"></i> LinkedIn </a>
                                                                </div>
                                                                <div class="col-xs-4 col-sm-2"> 
<!--                                                                    <a class="btn btn-block btn-social btn-google google-button"><i class="fa fa-google"></i> Google +</a>-->
                                                                    <!-- Display Google sign-in button -->
                                                                    <div id="gSignIn"></div>
                                                                </div>
                                                            </div>
                                                            <!-- display profile info -->
                                                            <table id='tableUser' style='display: none;'>
                                                                <tr>
                                                                    <td>Name</td>
                                                                    <td><span id='fullname'></span></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Email</td>
                                                                    <td><span id='email'></span></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Profile image</td>
                                                                    <td><img src='' width='32' height='32' id='profile_photo'></td>
                                                                </tr>

                                                            </table>
                                                            <div class="row omb_row-sm-offset-3 omb_loginOr">
                                                                <div class="col-xs-12 col-sm-6">
                                                                    <hr class="omb_hrOr">
                                                                    <span class="omb_spanOr">or</span> 
                                                                </div>
                                                            </div>
                                                            <div class="row omb_row-sm-offset-3">
                                                                <div class="col-xs-12 col-sm-6">
                                                                    <form  action="<?php echo base_url('login/login') ?>" method="post" enctype="multipart/form-data">
                                                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                                            <input id="loginName" type="text" class="form-control" name="Username" placeholder="Username">
                                                                        </div>
                                                                        <span class="help-block"></span>
                                                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                            <input  type="password" class="form-control" name="Password" placeholder="Password">
                                                                        </div>
                                                                        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Submit" />
                                                                    </form>
                                                                    <div class="text-center">
                                                                        <a href="<?php echo base_url('login/forgotPassword') ?>">Forgot Password ?</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end recent activity --> 
                                                    <br><br><br><br>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab"> 

                                                    <!-- start user projects -->
                                                    <!-- start recent activity -->
                                                    <div class="container">
                                                        <div class="omb_login">
                                                            <h3 class="omb_authTitle">Register </h3>
                                                            <div class="row omb_row-sm-offset-3 omb_socialButtons">
                                                                <div class="col-xs-4 col-sm-2"> 
                                                                    <a onclick="fbReg()" class="btn btn-block btn-social btn-facebook"> <i class="fa fa-facebook"></i> Facebook </a> 
                                                                </div>
                                                                <div class="col-xs-4 col-sm-2"> 
<!--                                                                    <a class="btn btn-block btn-social btn-linkedin linkedin-button"> <i class="fa fa-linkedin"></i> LinkedIn </a> -->
                                                                    <!-- sign in with linkedin button -->
<!--                                                                    <script type="in/Login"></script>-->
                                                                    <a onclick="liAuth()" class="btn btn-block btn-social btn-linkedin linkedin-button"><i class="fa fa-linkedin"></i> LinkedIn </a>
                                                                </div>
                                                                <div class="col-xs-4 col-sm-2"> 
<!--                                                                    <a class="btn btn-block btn-social btn-google google-button"><i class="fa fa-google"></i> Google +</a>-->
                                                                    <!-- Display Google sign-in button -->
                                                                    <div id="gRegister"></div>
                                                                </div>
                                                            </div>
                                                            <div class="row omb_row-sm-offset-3 omb_loginOr">
                                                                <div class="col-xs-12 col-sm-6">
                                                                    <hr class="omb_hrOr">
                                                                    <span class="omb_spanOr">or</span> </div>
                                                            </div>
                                                            <div class="row omb_row-sm-offset-3">
                                                                <div class="col-xs-12 col-sm-6">
                                                                    <!-- display profile info -->
                                                                    <div id="profileData" style="display: none;">
                                                                        <p><a href="javascript:void(0);" onclick="logout()">Logout</a></p>
                                                                        <div id="picture"></div>
                                                                        <div class="info">
                                                                            <p id="name"></p>
                                                                            <p id="intro"></p>
                                                                            <p id="email"></p>
                                                                            <p id="location"></p>
                                                                            <p id="link"></p>
                                                                        </div>
                                                                    </div>
                                                                    <form  action="<?php echo base_url('login') ?>" method="post" enctype="multipart/form-data">


<!--                                                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input id="firstname" type="text" class="form-control" name="Name" placeholder="Name" value="<?php echo set_value('Name'); ?>" required>
</div>-->
                                                                        <?php if (form_error('Email')) { ?><span class="form-error-message text-danger"><?php echo form_error('Email'); ?></span>
                                                                        <?php } ?> 
                                                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                                                            <input id="username" type="text" class="form-control" name="Username" placeholder="Username" value="<?php echo set_value('Username'); ?>" required>
                                                                        </div>

                                                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                                            <input id="email" type="text" class="form-control" name="Email" placeholder="Email ID">
                                                                        </div> 

                                                                        <?php if (form_error('Password')) { ?><span class="form-error-message text-danger"><?php echo form_error('Password'); ?></span>
                                                                        <?php } ?>     
                                                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                            <input  type="password" id="Password" class="form-control" name="Password" placeholder="Password" value="" required>
                                                                        </div>

                                                                        <span class="help-block"></span>
                                                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                            <input  type="password" id="CPassword" class="form-control" name="CPassword" placeholder="Confirm Password">
                                                                        </div>


<!--                                                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                                            <input id="phone" type="number" class="form-control" name="Phone" placeholder="Phone Number">
                                                                        </div>-->




<!--                                                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                                            <input type="text" class="form-control" name="Address" placeholder="Address">
                                                                        </div>-->


<!--                                                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-camera"></i></span>
                                                                            <input id="photo" type="file" class="form-control" name="Photo" accept=".png, .jpg, .jpeg, .gif" >
                                                                        </div>-->

<!--   <span class="help-block">Password error</span>-->
                                                                        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Register" onclick="return pwd_validate()" />
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end recent activity --> 
                                                    <br><br><br><br>
                                                    <!-- end user projects --> 

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
                <?php $this->load->view('buyer/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>

        <?php $this->load->view('buyer/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
        <script src="https://apis.google.com/js/client:platform.js?onload=renderButtonReg" async defer></script>
        <meta name="google-signin-client_id" content="949757778087-7bhs8ku1ir1q9631rfciupfrn2emdbbh.apps.googleusercontent.com">
        <script type="text/javascript" src="//platform.linkedin.com/in.js">
                                                                            api_key: 81pqjtq6a8blxy
                                                                                    authorize: true
                                                                                    onLoad: onLinkedInLoad
                                                                                    scope: r_basicprofile r_emailaddress
        </script>

        <script>
                    var base_url = '<?php echo base_url(); ?>';
            // Render Google Sign-in button
            function renderButton() {
            gapi.signin2.render('gSignIn', {
            'scope': 'profile email',
                    'width': 125,
                    'height': 33,
                    'longtitle': true,
                    'theme': 'dark',
                    'onsuccess': onSuccess,
                    'onfailure': onFailure
            });
            }

// Sign-in success callback
            function onSuccess(googleUser) {
            // Get the google profile data
            var profile = googleUser.getBasicProfile();
            // Get the google+ profile data
            gapi.client.load('plus', 'v1', function () {
            var request = gapi.client.plus.people.get({
            'userId': 'me'
            });
            request.execute(function (resp) {
            saveGoogleData(resp);
            });
            });
            }

            function saveGoogleData(userData) {
            $.post(base_url + "login/googleReg", {
            userData: JSON.stringify(userData)},
                    function (data) {
                    if (data == "logged") {
                    alert("User found, click ok to proceed!!");
                    signOutFromGoogle();
                    window.location.href = base_url;
                    } else if (data == "added") {
                    $.post(base_url + "login/google", {
                    userData: JSON.stringify(userData)},
                            function (data) {
                            if (data == "true") {
                            alert("User added, click ok Login!!");
                            signOutFromGoogle();
                            window.location.href = base_url;
                            } else {
                            signOutFromGoogle();
                            alert(data);
                            }
                            });
                    } else if (data == "email") {
                    alert("Email already found, please login!!");
                    } else {
                    signOutFromGoogle();
                    alert(data);
                    }
                    });
            }

// Sign-in failure callback
            function onFailure(error) {
            alert(error);
            }

// Sign out the user
            function signOutFromGoogle() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.disconnect();
            }
        </script>

        <script>
            var base_url = '<?php echo base_url(); ?>'
                    // Render Google Sign-in button
                            function renderButtonReg() {
                            gapi.signin2.render('gRegister', {
                            'scope': 'profile email',
                                    'width': 125,
                                    'height': 33,
                                    'longtitle': true,
                                    'theme': 'dark',
                                    'onsuccess': onSuccess,
                                    'onfailure': onFailure
                            });
                            }

// Sign-in success callback
                    function onSuccess(googleUser) {
                    // Get the google profile data
                    var profile = googleUser.getBasicProfile();
                    // Get the google+ profile data
                    gapi.client.load('plus', 'v1', function () {
                    var request = gapi.client.plus.people.get({
                    'userId': 'me'
                    });
                    request.execute(function (resp) {
                    saveGoogleData(resp);
                    });
                    });
                    }

                    function saveGoogleData(userData) {
                    $.post(base_url + "login/googleReg", {
                    userData: JSON.stringify(userData)},
                            function (data) {
                            if (data == "logged") {
                            alert("User found, click ok to proceed!!");
                            signOutFromGoogle();
                            window.location.href = base_url;
                            } else if (data == "added") {
                            $.post(base_url + "login/google", {
                            userData: JSON.stringify(userData)},
                                    function (data) {
                                    if (data == "true") {
                                    alert("User added, click ok Login!!");
                                    signOutFromGoogle();
                                    window.location.href = base_url;
                                    } else {
                                    signOutFromGoogle();
                                    alert(data);
                                    }
                                    });
                            } else if (data == "email") {
                            alert("Email already found, please login!!");
                            } else {
                            signOutFromGoogle();
                            alert(data);
                            }
                            });
                    }

// Sign-in failure callback
                    function onFailure(error) {
                    alert(error);
                    }

// Sign out the user
                    function signOutFromGoogle() {
                    var auth2 = gapi.auth2.getAuthInstance();
                    auth2.disconnect();
                    }
        </script>

        <script type="text/javascript">
                    var base_url = '<?php echo base_url(); ?>'
                            // Setup an event listener to make an API call once auth is complete
                                    function onLinkedInLoad() {
                                    IN.Event.on(IN, "auth", getProfileData);
                                    }

                            function liAuth(){
                            IN.User.authorize(function(){
                            callback();
                            });
                            }

                            // Use the API call wrapper to request the member's profile data
                            function getProfileData() {
                            IN.API.Profile("me").fields("id", "first-name", "last-name", "headline", "location", "picture-url", "public-profile-url", "email-address").result(displayProfileData).error(onError);
                            }

                            // Handle the successful return from the API call
                            function displayProfileData(data){
                            var user = data.values[0];
                            saveUserDataLinkedIn(user);
                            logoutLinkedin();
                            }

                            function saveUserDataLinkedIn(userData) {
                            logoutLinkedin();
                            $.post(base_url + "login/linkedinReg", {
                            userData: JSON.stringify(userData)},
                                    function (data) {
                                    if (data == "logged") {
                                    alert("User found, click ok to proceed with linkedin!!");
                                    logoutLinkedin();
                                    window.location.href = base_url;
                                    } else if (data == "added") {
                                    $.post(base_url + "login/linkedin", {
                                    userData: JSON.stringify(userData)},
                                            function (data) {
                                            if (data == "true") {
                                            alert("User added, click ok Login!!");
                                            logoutLinkedin();
                                            window.location.href = base_url;
                                            } else {
                                            logoutLinkedin();
                                            alert(data);
                                            }
                                            });
                                    } else if (data == "email") {
                                    alert("Email already found, please login!!");
                                    } else {
                                    logoutLinkedin();
                                    alert(data);
                                    }
                                    });
                            }

                            // Handle an error response from the API call
                            function onError(error) {
                            console.log(error);
                            }

                            // Destroy the session of linkedin
                            function logoutLinkedin(){
                            IN.User.logout(removeProfileData);
                            }

                            // Remove profile data from page
                            function removeProfileData(){
                            document.getElementById('profileData').remove();
                            }
        </script>

        <script>
                            var base_url = '<?php echo base_url(); ?>'
                                    document.addEventListener("touchstart", function () {}, true);
                            function pwd_validate()
                            {

                            if (document.getElementById('Password').value != document.getElementById('CPassword').value)
                            {
                            alert('Password Missmatch,Please enter again');
                            document.getElementById("CPassword").value = '';
                            document.getElementById("CPassword").focus();
                            return false;
                            } else
                            {
                            return true;
                            }
                            }

        </script>

        <script>
                            var base_url = '<?php echo base_url(); ?>'
                                    window.fbAsyncInit = function () {
                                    // FB JavaScript SDK configuration and setup
                                    FB.init({
                                    appId: '2224789510896528', // FB App ID
                                            cookie: true, // enable cookies to allow the server to access the session
                                            xfbml: true, // parse social plugins on this page
                                            version: 'v2.10' // use graph api version 2.10
                                    });
                                    };
// Load the JavaScript SDK asynchronously
                            (function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id))
                                    return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//connect.facebook.net/en_US/sdk.js";
                            fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
// Facebook login with JavaScript SDK
                            function fbReg() {
                            FB.login(function (response) {
                            if (response.authResponse) {
                            // Get and display the user profile data
                            getFbUserData();
                            } else {
                            document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
                            }
                            }, {scope: 'email'});
                            }

                            function fbLogin() {
                            FB.login(function (response) {
                            if (response.authResponse) {
                            // Get and display the user profile data
                            getFbUserDataLogin();
                            } else {
                            alert("User cancelled login or did not fully authorize.");
                            }
                            }, {scope: 'email'});
                            }

                            function getFbUserDataLogin() {
                            FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture,cover'},
                                    function (response) {
                                    // Save user data
                                    saveUserDataLogin(response);
                                    });
                            }

// Save user data to the database
                            function saveUserDataLogin(userData) {
                            $.post("<?php echo base_url('login/facebook'); ?>", {
                            oauth_provider: 'facebook',
                                    userData: JSON.stringify(userData)},
                                    function (data) {
                                    if (data == "true") {
                                    fbLogout();
                                    window.location = '<?php echo base_url(); ?>';
                                    } else {
                                    fbLogout();
                                    alert("User not found, please register");
                                    }
                                    });
                            }


// Fetch the user profile data from facebook
                            function getFbUserData() {
                            FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture,cover'},
                                    function (response) {
                                    saveUserData(response);
                                    // Save user data
                                    if (response) {
                                    fbLogout();
                                    } else {

                                    }
                                    });
                            }

// Save user data to the database
                            function saveUserData(userData) {
                            $.post("<?php echo base_url('login/fbReg'); ?>", {
                            oauth_provider: 'facebook',
                                    userData: JSON.stringify(userData)},
                                    function (data, status) {
                                    if (status == "success") {
                                    $.post("<?php echo base_url('login/facebook'); ?>", {
                                    oauth_provider: 'facebook',
                                            userData: JSON.stringify(userData)},
                                            function (data, status) {
                                            if (status == "success") {
                                            fbLogout();
                                            window.location = '<?php echo base_url(); ?>';
                                            } else {
                                            fbLogout();
                                            alert("Something went wrong please try again");
                                            }
                                            });
                                    } else {
                                    fbLogout();
                                    alert("Something went wrong please try again");
                                    }
                                    });
                            }

// Logout from facebook
                            function fbLogout() {
                            FB.logout(function () {
                            });
                            }
        </script>

    </body>

</html>