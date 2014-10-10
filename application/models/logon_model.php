<?php defined('BASEPATH') OR exit('No direct script access allowed');

class logon_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();                 
        $this->load->database();
    }
    
    public function login($username,$password) {
        try        
        {
            $vigente = 1;
          
            $this->db->select('idusuario,nombre,clave');
            $this->db->from('cat_usuarios');
            $this->db->where('vigente ',$vigente);
            $this->db->where('idrol ',ROL_LOGEO);
            $this->db->where('login ',$this->db->escape_str($username));            
            $query=$this->db->get();
            
            $data = $query->result_array();
            if ($data){
                if (base64_encode($password) == $data[0]['clave']){
                    $sess_array = array();
                    foreach($result as $row)
                    {
                        $sess_array = array(
                            'id' => $data[0]['idusuario'],
                            'username' => $username,
                            'name' => $data[0]['nombre']
                        );
                        $this->session->set_userdata('logged_in', $sess_array);
                    }
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;                
            }            
        } catch (Exception $e) {            
            msg_reporting::error_log($e);
            return false;
        }
    }    
}
