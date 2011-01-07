<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$env_used = 'default'; //name of your development setting
if(defined('CIUnit_Version')){
  $env_used .= '_test';
}
$active_group = $env_used;
$active_record = TRUE;

$db['default']['hostname'] = "localhost";
$db['default']['username'] = "root";
$db['default']['password'] = "root";
$db['default']['database'] = "acc";
$db['default']['dbdriver'] = "mysql";
$db['default']['dbprefix'] = "";
$db['default']['pconnect'] = "1";
$db['default']['db_debug'] = "1";
$db['default']['cache_on'] = "";
$db['default']['cachedir'] = "";
$db['default']['char_set'] = "utf8";
$db['default']['dbcollat'] = "utf8_general_ci";


$db['default_test']['hostname'] = "localhost";
$db['default_test']['username'] = "root";
$db['default_test']['password'] = "root";
$db['default_test']['database'] = "acc_test";
$db['default_test']['dbdriver'] = "mysql";
$db['default_test']['dbprefix'] = "";
$db['default_test']['pconnect'] = "1";
$db['default_test']['db_debug'] = "1";
$db['default_test']['cache_on'] = "";
$db['default_test']['cachedir'] = "";
$db['default_test']['char_set'] = "utf8";
$db['default_test']['dbcollat'] = "utf8_general_ci";
