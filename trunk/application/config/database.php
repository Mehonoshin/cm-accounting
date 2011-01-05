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
