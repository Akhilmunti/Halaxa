<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('is_logged_in')) {

    function is_logged_in() {
        $CI = & get_instance();
        $is_logged_in = $CI->session->userdata('User_Id');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login');
        }
    }

}