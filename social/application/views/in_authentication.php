<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link rel="stylesheet" media="screen and (max-width: 1200px) and (min-width: 0px)" type="text/css" href="<?php echo base_url(); ?>css/styleresponsive1.css">
        <link rel="stylesheet" media="screen and (max-width: 600px) and (min-width: 0px)" type="text/css" href="<?php echo base_url(); ?>css/styleresponsive2.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="main">
            <div id="envelope">
                <?php if (isset($userData['authURL'])) { ?>
                    <header id="sign_in">
                        <h2>Login With LinkedIn</h2>
                    </header>
                    <hr>
                    <div id="content">
                        <center><a href="<?php echo $userData['authURL']; ?>"><img id="google_signin" src="<?php echo base_url(); ?>images/linked_in.png" width="100%" ></a></center>
                    </div>
                    <?php
                } else {
                    if ($userData) {
                        $fName = $userData['first_name'];
                        $pic = $userData['picture'];
                        //$logout = $userData['logoutURL'];
                    } else {
                        $fName = '';
                        $pic = '';
                        $logout = '';
                    }
                    ?>
                    <header id="info">
                        <a target="_blank" class="user_name" href="<?php echo $pic; ?>" /><img class="user_img" src="<?php echo $pic; ?>" width="15%" />
                        <?php echo '<p class="welcome"><i>Welcome ! </i>' . $fName . "</p>"; ?></a><a class='logout' href='<?php echo base_url()."User_Authentication/logout"; ?>'>Logout</a>
                    </header>
                    <?php
                    if ($userData) {
                        //print_r($userData);
                        //print_r($userData);
                        echo "<p class='profile'>Profile :-</p>";
                        echo "<p><b> Id : </b>" . $userData['oauth_uid'] . "</p>";
                        echo "<p><b> First Name : </b>" . $userData['first_name'] . "</p>";
                        echo "<p><b> Last Name : </b>" . $userData['last_name'] . "</p>";
                        echo "<p><b> Gender : </b>" . $userData['gender'] . "</p>";
                        echo "<p><b>Email : </b>" . $userData['email'] . "</p>";
                    }
                    ?>
                <?php } ?>
            </div>
        </div>
    </body>
</html>