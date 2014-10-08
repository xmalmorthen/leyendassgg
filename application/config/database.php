<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$cnfg = ini_cnfg::parse();

$active_group = 'default';
$active_record = TRUE;

$db['default']['hostname'] = $cnfg->default['Hostname'];
$db['default']['username'] = $cnfg->default['UserName'];
$db['default']['password'] = $cnfg->default['Pass'] . '';
$db['default']['default'] = $cnfg->default['Database'];
$db['default']['dbdriver'] = $cnfg->default['Adapter'];
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

/* End of file default.php */
/* Location: ./application/config/default.php */