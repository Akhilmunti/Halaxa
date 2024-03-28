// Render Google Sign-in button
function renderButton() {
    gapi.signin2.render('gSignIn', {
        'scope': 'profile email',
        'width': 130,
        'height': 30,
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
            // Save user data
            saveUserDataGplus(resp);
        });
    });
}

// Save user data to the database
function saveUserDataGplus(userData) {
    $.post("<?php echo base_url('login/gplusReg'); ?>", {
        oauth_provider: 'google',
        userData: JSON.stringify(userData)},
            function (data, status) {
                if (status == "success") {
                    signOutGplus();
                    $.post("<?php echo base_url('login/gplus'); ?>", {
                        oauth_provider: 'google',
                        userData: JSON.stringify(userData)},
                            function (data, status) {
                                if (status == "success") {
                                    signOutGplus();
                                    window.location = '<?php echo base_url(); ?>';
                                } else {
                                    signOutGplus();
                                    alert("Something went wrong please try again");
                                }
                            });
                } else {
                    alert("Something went wrong please try again");
                }
            });
}

// Sign-in failure callback
function onFailure(error) {
    signOutGplus();
}

// Sign out the user
function signOutGplus() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        document.getElementsByClassName("userContent")[0].innerHTML = '';
        document.getElementsByClassName("userContent")[0].style.display = "none";
        document.getElementById("gSignIn").style.display = "block";
    });
    auth2.disconnect();
}
