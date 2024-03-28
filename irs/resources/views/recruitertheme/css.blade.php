    <title><?php echo Config::get('constants.base.app_name'); ?></title>
    <meta content="<?php echo Config::get('constants.base.app_name'); ?>" name="description" />
    <meta content="<?php echo Config::get('constants.base.app_name'); ?>" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="<?php echo url('/'); ?>/assets/images/favicon.png">

    <link href="<?php echo url('/'); ?>/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo url('/'); ?>/assets/halaxa-recruit.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo url('/'); ?>/assets/recruit/form-wizard.css" rel="stylesheet" type="text/css">
    
    <script
            src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"
        type="text/javascript"></script>

    <script
            src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"
        type="text/javascript"></script>