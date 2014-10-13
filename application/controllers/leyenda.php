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
        
        $this->load->model('leyenda_model');
    }
    
    private function _showformpage($page,$model = NULL){        
        $this->model['content'] = $this->load->view($page,$model,TRUE);
        $this->load->view('layout/masterpage',$this->model);
    }   

    public function index()
    {
        if (!$this->input->post()){            
            $leyendastr = $this->leyenda_model->getLeyenda();
            
            $model = array (
                'fechadecreto' => utils::fecha(), 
                'leyendaactual' => $leyendastr['leyenda'],
                'anio' => $leyendastr['anio'],
                'numDecreto' => $leyendastr['numDecreto'],
                'fechaDecreto' => $leyendastr['fechaDecreto'],
                'fechaRegistro' => $leyendastr['fechaRegistro']
            );
            
            
            $this->_showformpage('leyenda/index',$model);            
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
                $this->_showformpage('leyenda/index');
            }
        }
    }
    
    function insertleyenda($textoleyenda)
    {      
        $decreto = $this->input->post('decreto');
        $fechadecreto = $this->input->post('fechadecreto');
        
        if ($this->leyenda_model->insert($decreto,$fechadecreto,$textoleyenda)) {            
            return TRUE;
        }else{
            $this->form_validation->set_message('insertleyenda','');
            return FALSE;
        }
    }
    
    public function history(){
        $data = $this->leyenda_model->history();
        $model = array();
        if ($data){
            
            $this->load->library('table');

            $this->table->set_template(array ( 'table_open'  => '<table id="historytable" class="table table-hover">' ));
            $this->table->set_heading(array (
                'Año',
                'Nùm. Decreto',
                'Leyenda',
                'Fecha Decreto',
                'Fecha Registro'
            ));            
            
            $this->table->add_row(array('2010', '1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','01/01/2010','01/02/2010'));
            $this->table->add_row(array('2011', '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','01/01/2011','01/02/2011'));
            $this->table->add_row(array('2012', '3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','01/01/2012','01/02/2012'));
            $this->table->add_row(array('2013', '4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','01/01/2013','01/02/2013'));
            $this->table->add_row(array('2014', '5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','01/01/2014','01/02/2014'));

            $model['historytable'] = $this->table->generate();            
        }
        
        $this->model['css'] = "<link href=" . base_url('application/assets/dataTables-1.10.3/media/css/jquery.dataTables.css') . " rel='stylesheet' />";
        $this->model['js'] = "<script src=" . base_url('application/assets/dataTables-1.10.3/media/js/jquery.dataTables.js') . "></script>        ";
                
        $this->_showformpage('leyenda/history',$model);        
    }
}

/* End of file leyenda.php */
/* Location: ./application/controllers/leyenda.php */