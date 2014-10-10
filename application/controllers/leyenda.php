<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class leyenda extends CI_Controller {

    private $model = NULL;
    
    public function __construct()
    {
        parent::__construct();        
        $this->model['title'] = "SAL - Captura de Leyendas";
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->library('utils');
    }
    
    private function _showformpage(){        
        $this->model['css'] = "";
        
        $data['fechadecreto'] = utils::fecha();
        
        $this->model['content'] = $this->load->view('leyenda/index',$data,TRUE);
        $this->load->view('layout/masterpage',$this->model);
    }   

    public function index()
    {
        if (!$this->input->post()){
            $this->_showformpage();            
        } else {          
            $this->form_validation->set_message('required', 'El campo es requerido');       
            $this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-exclamation-triangle"></i><span>','</span></div>');
            $this->form_validation->set_rules('decreto', 'Decreto', 'trim|required|xss_clean');
            $this->form_validation->set_rules('fechadecreto', 'Fechadecreto', 'trim|required|xss_clean');
            $this->form_validation->set_rules('textoleyenda', 'Textoleyenda', 'trim|required|xss_clean|callback_insertleyenda');

            if($this->form_validation->run() == TRUE)
            {
                //redirect('leyenda');
            } else {                
                $this->_showformpage();
            }
        }
    }
    
    function insertleyenda($textoleyenda)
    {
        $this->load->model('leyenda_model');
        
        $decreto = $this->input->post('decreto');
        $fechadecreto = $this->input->post('fechadecreto');
        
        if ($this->leyenda_model->insert($decreto,$fechadecreto,$textoleyenda)) {            
            return TRUE;
        }else{
            $this->form_validation->set_message('insertleyenda','');
            return FALSE;
      }
    }
}

/* End of file leyenda.php */
/* Location: ./application/controllers/leyenda.php */