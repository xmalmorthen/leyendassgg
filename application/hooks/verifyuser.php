<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class verifyuser{

    private $_CI;

    public function  __construct() {
    	$this->_CI = & get_instance();
    }    

    public function validateUser($params = NULL){
        /*
         * Obtenemos el metodo y controlador
         */
        $method = $this->_CI->router->method;        
        $controller = $this->_CI->router->class;
        $user = $this->_CI->session->userdata("id_usuario");

        //Si no está el usuario autentificado, redirecciona a login.
        if($user == FALSE){            
            if($controller != 'logon'){
                redirect('logon');
                exit();
            }
        }
    }
}