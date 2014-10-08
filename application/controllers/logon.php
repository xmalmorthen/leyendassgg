<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logon extends CI_Controller {

    public function index()
    {       
        $this->load->view('logon/index');
    }
    
    public function _output($output)
    {
        echo $this->load->view('layout/masterpage',NULL,TRUE);
        
        
    }
    
}

/* End of file logon.php */
/* Location: ./application/controllers/logon.php */