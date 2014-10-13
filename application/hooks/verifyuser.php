<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class verifyuser{

    private $_CI;
    private $cnfg;

    public function  __construct() {
    	$this->_CI = & get_instance();        
        $this->cnfg = ini_cnfg::parse();
    }    

    public function validateUser($params = NULL){
        $method = $this->_CI->router->method;        
        $controller = $this->_CI->router->class;
               
        //$this->_CI->config->set_item('base_url', base_url('index.php') );
        if ( $controller == 'errorlog') return;
		
        $user = $this->_CI->session->userdata("logged_in");

        //Si no está el usuario autentificado, redirecciona a login.
        if($user == FALSE){            
            if($controller != 'logon'){
                $this->_CI->session->set_flashdata('togourl',$this->_CI->uri->uri_string());
                redirect('logon');
                exit();
            }
        }
    }	
}