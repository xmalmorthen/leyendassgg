<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['post_controller_constructor'][] = array(
                                'class'    => 'verifyuser',
                                'function' => 'validateUser',
                                'filename' => 'verifyuser.php',
                                'filepath' => 'hooks',
                                'params'   => array('login','error') // Aqui va el array con los nombres de controlador que NO necesita verificacion de acceso.
                                );

/* End of file hooks.php */
/* Location: ./application/config/hooks.php */