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
    
    private function _showformpage($page){        
        $this->model['content'] = $this->load->view($page,$this->model,TRUE);
        $this->load->view('layout/masterpage',$this->model);
    }   

    public function index()
    {
        $this->model['css'] = "<link href=" . base_url(ASSETS .'bootstrap-datepicker/css/datepicker3.css') . " rel='stylesheet' />";
        $this->model['js'] = "<script src=" . base_url(ASSETS .'bootstrap-datepicker/js/bootstrap-datepicker.js') . "></script>" .
                             "<script src=" . base_url(ASSETS .'bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js') . "></script>";
                          
        $this->model['fechadecreto'] = utils::fecha();        
        $this->model['msgresponse'] = $this->session->flashdata('msgresponse');
        
        if ($this->input->post()){                       
            $this->form_validation->set_message('required', 'El dato es requerido');       
            $this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-exclamation-triangle"></i><span>','</span></div>');
            $this->form_validation->set_rules('decreto', 'Decreto', 'trim|required|xss_clean');
            $this->form_validation->set_rules('fechadecreto', 'Fechadecreto', 'trim|required|xss_clean');
            $this->form_validation->set_rules('textoleyenda', 'Textoleyenda', 'trim|required|xss_clean');

            if($this->form_validation->run() == TRUE)
            {
                if ( $this->_insertleyenda($this->input->post('textoleyenda')) === TRUE){
                    $this->session->set_flashdata('msgresponse', 'success');
                    redirect('leyenda/index');
                } else {
                    $this->model['msgresponse'] = 'error';
                }                    
            } else {
                $this->model['msgresponse'] = 'formerror';
            }
        }
        
        $leyendastr = $this->leyenda_model->getLeyenda();
        if ($leyendastr) {
            $this->model['leyendaactual'] = $leyendastr['leyenda'];
            $this->model['anio'] = $leyendastr['anio'];
            $this->model['numDecreto'] = $leyendastr['numDecreto'];
            $this->model['fechaDecreto'] = $leyendastr['fechaDecreto'];
            $this->model['fechaRegistro'] = $leyendastr['fechaRegistro'];
        }
        
        $this->_showformpage('leyenda/index');
    }
    
    private function _insertleyenda($textoleyenda)
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
        if ($data){            
            $this->load->library('table');

            $this->table->set_template(array ( 'table_open'  => '<table id="historytable" class="table table-hover" style="width:100% !Important;">' ));
            $this->table->set_heading(array (
                'Año',
                'Núm. de decreto',
                'Leyenda',
                'Fecha de decreto',
                'Fecha de registro',
                'Activo'
            ));            

            foreach ($data['item'] as $value) {
                $this->table->add_row(array($value->anio,$value->numDecreto,$value->leyenda,$value->fechaDecreto,$value->fechaRegistro, ($value->activa == '1') ? 'true' : 'false' ));
            }
            $this->model['historytable'] = $this->table->generate();
        }
        
        $this->model['css'] = "<link href=" . base_url(ASSETS .'dataTables-1.10.3/media/css/jquery.dataTables.css') . " rel='stylesheet' />";
        $this->model['js'] = "<script src=" . base_url(ASSETS .'dataTables-1.10.3/media/js/jquery.dataTables.js') . "></script>        ";
                
        $this->_showformpage('leyenda/history');        
    }
}

/* End of file leyenda.php */
/* Location: ./application/controllers/leyenda.php */