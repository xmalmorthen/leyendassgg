<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class verifyuser{

    private $_CI;
    private $cnfg;

    public function  __construct() {
    	$this->_CI = & get_instance();
        
        $this->cnfg = ini_cnfg::parse();
        
    }    

    public function validateUser($params = NULL){
        /*
         * Obtenemos el metodo y controlador
         */
        $method = $this->_CI->router->method;        
        $controller = $this->_CI->router->class;
        $user = $this->_CI->session->userdata("id_usuario");
        
        if ( $this->cnfg->general['environment'] != 'development' ) {
            $this->_CI->output->cache(1440);            
        }
                
        //Si no está el usuario autentificado, redirecciona a login.
        if($user == FALSE){            
            if($controller != 'logon'){
                redirect('logon');
                exit();
            }
        }
    }
}