<script>
    var base_url = '<?php echo base_url(); ?>';
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
<script>
    var base_url = '<?php echo base_url(); ?>';
    // Render Google Sign-in button
    function renderButton() {
        gapi.signin2.render('gSignIn', {
            'scope': 'profile email',
            'width': 160,
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
                        //alert("Email already found, please login!!");
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
            'width': 160,
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
                        //alert("Email already found, please login!!");
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
    var base_url = '<?php echo base_url(); ?>';
    // Setup an event listener to make an API call once auth is complete
    function onLinkedInLoad() {
        IN.Event.on(IN, "auth", getProfileData);
    }

    function liAuth() {
        IN.User.authorize(function () {
            callback();
        });
    }

    // Use the API call wrapper to request the member's profile data
    function getProfileData() {
        IN.API.Profile("me").fields("id", "first-name", "last-name", "headline", "location", "picture-url", "public-profile-url", "email-address").result(displayProfileData).error(onError);
    }

    // Handle the successful return from the API call
    function displayProfileData(data) {
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
    function logoutLinkedin() {
        IN.User.logout(removeProfileData);
    }

    // Remove profile data from page
    function removeProfileData() {
        document.getElementById('profileData').remove();
    }
</script>