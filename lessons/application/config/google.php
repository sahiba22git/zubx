<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '851988311556-2d20onpugpmrmo00qe6pcrla5srb579d.apps.googleusercontent.com';
$config['google']['client_secret']    = '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';
$config['google']['redirect_uri']     = 'https://vaibhavfurnishingsinc.com/projects/lessons/social_login/social_google_login';
$config['google']['application_name'] = 'Login to Lesson';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();