<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class leyenda extends CI_Controller {

    private $model = NULL;
    
    public function __construct()
    {
        parent::__construct();        
        $this->model['title'] = "SAL - Captura de Leyendas";
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
    }
    
    private function _showformpage(){        
        $this->model['css'] = "";
        $this->model['content'] = $this->load->view('leyenda/index',NULL,TRUE);
        $this->load->view('layout/masterpage',$this->model);
    }   

    public function index()
    {
        if (!$this->input->post()){
            $this->_showformpage();            
        } else {
            
        }
    }
}

/* End of file leyenda.php */
/* Location: ./application/controllers/leyenda.php */