<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logon extends CI_Controller {

    public function index()
    {
        //$this->output->cache(1440);
        
        $model['css'] = "<link href=" . base_url('application/assets/css/logOn.css') . " rel='stylesheet' />";
        $model['content'] = $this->load->view('logon/index',NULL,TRUE);
        
        $this->load->view('layout/masterpage',$model);
    }
    
}

/* End of file logon.php */
/* Location: ./application/controllers/logon.php */