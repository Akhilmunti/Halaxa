<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo PROJECT_NAME; ?> | Partner</title>
        <meta content="<?php echo PROJECT_NAME; ?>" name="description" />
        <meta content="<?php echo PROJECT_NAME; ?>" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png">

        <link href="<?php echo base_url(); ?>assets/halaxa/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/halaxa/halaxa-partner.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body class="login-body">
        <!-- Main -->
        <div class="main">
            <section>
                <div class="header">
                    <nav class="navbar navbar-expand-lg bg-1 text-white">
                        <div class="container">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <a class="navbar-brand text-white" href="#">
                                <img height="30" src="<?php echo base_url('assets/halaxa/images/partner-logo.png'); ?>" />
                            </a>
                            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                <ul class="navbar-nav ml-auto mt-2 mt-lg-0 nav-theme-li">
                                    <li class="nav-item">
                                        <a target="_blank" href="#" class="no-decoration btn-circle btn-white font-bold my-2 my-sm-0 mr-3" type="submit">Apply</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </section>

            <section class="vertical-align">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="partner-card">
                                <div class="partner-card-header">
                                    <p>Sign into the halaxa partner admin panel</p>
                                </div>
                            </div>
                            <div class="partner-card-content">
                                <div class="row">
                                    <div class="col-md-6 mx-auto text-center">
                                        <div class="row">
                                            <div class="col-md-4 mx-auto">
                                                <img class="mb-2 img-fluid rounded-circle" src="<?php echo base_url('assets/halaxa/images/user-light.jpg'); ?>" />
                                            </div>
                                        </div>
                                        <form>
                                            <div class="form-group">
                                                <select class="form-control form-control-sm" name="type">
                                                    <option selected="" disabled="" value="">Select Type</option>
                                                    <option>Hotel</option>
                                                    <option>School</option>
                                                    <option>Association</option>
                                                    <option>Influencer</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Password">
                                            </div>
                                            <button type="submit" class="btn btn-theme btn-block font-bold">Login</button>
                                            <a class="text-muted mt-2 font-13" href="#"><span class="anchor-color">Forgot the password?</span> Click here</a>
                                            <br><br>
                                            <a class="text-muted font-13" href="#"><span class="anchor-color">Don't you have an partner account?</span> Apply</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- End Main -->

        <!-- jQuery  -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>

</html>