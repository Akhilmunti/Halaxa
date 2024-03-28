<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------
  |  LinkedIn API Configuration
  | -------------------------------------------------------------------
  |
  | To get an LinkedIn app details you have to create a LinkedIn app
  | at LinkedIn Developers panel (https://www.linkedin.com/developers/)
  |
  |  linkedin_api_key        string   Your LinkedIn App Client ID.
  |  linkedin_api_secret     string   Your LinkedIn App Client Secret.
  |  linkedin_redirect_url   string   URL to redirect back to after login. (do not include base URL)
  |  linkedin_scope          array    Your required API permissions.
 */
$config['linkedin_api_key'] = '81en7ba6xgrcrh';
$config['linkedin_api_secret'] = 'CasmHRqdF3QNHz2T';
$config['linkedin_redirect_url'] = 'linkedin/';
$config['linkedin_scope'] = 'r_basicprofile r_emailaddress';

