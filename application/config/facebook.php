<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config['facebook_app_id'] = '2224789510896528';
$config['facebook_app_secret'] = 'c39f47078003e93535b8b13edf8e1c57';
$config['facebook_login_type'] = 'web';
$config['facebook_login_redirect_url'] = 'login';
$config['facebook_logout_redirect_url'] = 'login/logout';
$config['facebook_permissions'] = array('email');
$config['facebook_graph_version'] = 'v2.10';
$config['facebook_auth_on_load'] = TRUE;
