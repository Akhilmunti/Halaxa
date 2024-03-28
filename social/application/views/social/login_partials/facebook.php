<script>
    var base_url = '<?php echo base_url(); ?>';
    window.fbAsyncInit = function () {
        alert(base_url);
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