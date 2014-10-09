<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logon extends CI_Controller {
    private $model = NULL;
    
    public function __construct()
    {
        parent::__construct();        
        $this->model['title'] = "SAL - Inicio de Sesión";
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
    }
    
    private function _showloginpage(){        
        $this->model['css'] = "<link href=" . base_url('application/assets/css/logOn.css') . " rel='stylesheet' />";        
        
        $this->model['content'] = $this->load->view('logon/index',NULL,TRUE);
        $this->load->view('layout/masterpage',$this->model);
    }
    
    public function index()
    {   
        if (!$this->input->post()){
            $this->_showloginpage();            
        } else {
            $this->form_validation->set_message('required', 'El campo es requerido');       
            $this->form_validation->set_error_delimiters('<p class="error">','</p>');

            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_checkuser');        

            if($this->form_validation->run() == TRUE)
            {
                redirect('home', 'refresh');
            } else {
                $this->_showloginpage();
            }
        }
    }
    
    function checkuser($password)
    {
        $this->load->model('logon_model');
        $username = $this->input->post('username');
        
        if ($this->logon_model->login($username,$password)) {
            $sess_array = array();
            foreach($result as $row)
            {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        }else{
            $this->form_validation->set_message('checkuser', 'Usuario o contraseña inválidos...');
            return FALSE;
      }
    }
    
}

/* End of file logon.php */
/* Location: ./application/controllers/logon.php */