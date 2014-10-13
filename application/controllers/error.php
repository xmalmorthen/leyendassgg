<?php defined('BASEPATH') OR exit('No direct script access allowed');

class error extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();       
        $this->load->helper('url');
    }   
    
    function index(){
        redirect('errorlog/log');
    }
    
    function log(){                
        $this->load->spark( 'fire_log/0.8.2');
    }
    
    function compatibilidad(){
        $this->load->view('errors/error_compatibilidad');
    }
    
    function noscript(){
        $this->load->view('errors/noscript');
    }
    
}

/* End of file errorlog.php */
/* Location: ./application/controllers/errorlog.php */