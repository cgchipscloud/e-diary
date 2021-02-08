<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['use_ssl'] = FALSE;
$config['verify_peer'] = FALSE;
$config['access_key'] = '6XL7JFPVKUKPWSHEGXGU';
$config['secret_key'] = 'HWr/k3gOsvQbtdUuANlmIv9e82qnumYKMIup/mF056Q';
$config['bucket_name'] = 'leveluplearning';
$config['folder_name'] = 'defaultfolder/';
$config['s3_url'] = 'sgp1.digitaloceanspaces.com';
$config['get_from_enviroment'] = FALSE;
$config['access_key_envname'] = '6XL7JFPVKUKPWSHEGXGU';
$config['secret_key_envname'] = 'HWr/k3gOsvQbtdUuANlmIv9e82qnumYKMIup/mF056Q';

if ($config['get_from_enviroment']){
	$config['access_key'] = getenv($config['access_key_envname']);
	$config['secret_key'] = getenv($config['secret_key_envname']);

}