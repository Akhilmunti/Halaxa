$('.google-button').on('click', function () {
    // Initialize with your OAuth.io app public key
    OAuth.initialize('l2FZ4pK9NRWlqUqYPSlh32XCflI');
    // Use popup for OAuth
    OAuth.popup('google').then(google => {
        console.log('google:', google);
        // Retrieves user data from oauth provider
        // Prompts 'welcome' message with User's email on successful login
        // #me() is a convenient method to retrieve user data without requiring you
        // to know which OAuth provider url to call
        google.me().then(data => {
            console.log('me data:', data);
            //alert('Google says your email is:' + data.email + ".\nView browser 'Console Log' for more details");
        });
        // Retrieves user data from OAuth provider by using #get() and
        // OAuth provider url
        google.get('/plus/v1/people/me').then(data => {
            console.log('self data:', data);
            saveGoogleData(data);
        })
    });


    function saveGoogleData(userData) {
        $.post(base_url + "login/googleReg", {
            userData: JSON.stringify(userData)},
                function (data) {
                    if (data == "logged") {
                        alert("User found, click ok to proceed!!");
                        window.location.href = base_url;
                    } else if (data == "added") {
                        $.post(base_url + "login/google", {
                            userData: JSON.stringify(userData)},
                                function (data) {
                                    if (data == "true") {
                                        alert("User added, click ok Login!!");
                                        window.location.href = base_url;
                                    } else {
                                        alert(data);
                                    }
                                });
                    } else {
                        alert(data);
                    }
                });

    }
})