<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$cnfg = ini_cnfg::parse();

$active_group = 'default';
$active_record = TRUE;

$db['default']['hostname'] = $cnfg->database_logeo['Hostname'];
$db['default']['username'] = $cnfg->database_logeo['UserName'];
$db['default']['password'] = $cnfg->database_logeo['Pass'] . '';
$db['default']['database'] = $cnfg->database_logeo['Database'];
$db['default']['dbdriver'] = $cnfg->database_logeo['Adapter'];
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = TRUE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

/* End of file database.php */
/* Location: ./application/config/database.php */