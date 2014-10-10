<?php defined('BASEPATH') OR exit('No direct script access allowed');

class leyenda_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();                 
        $this->load->database();
    }
    
    public function insert($decreto,$fechadecreto,$textoleyenda) {
        try        
        {
            //TODO: IMPLEMENTAR LLAMADO A WEBSERVICE
            return FALSE;
        } catch (Exception $e) {            
            msg_reporting::error_log($e);
            return FALSE;
        }
    }    
}
