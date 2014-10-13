<?php defined('BASEPATH') OR exit('No direct script access allowed');

class leyenda_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->spark('restclient/2.1.0');
        $this->load->library('rest');
        
        $cnfg = ini_cnfg::parse();            

        $config = array('server'    => $cnfg->wsleyendas['ws_leyenda_host'],
                        'http_user' => $cnfg->wsleyendas['ws_leyenda_user'],
                        'http_pass' => $cnfg->wsleyendas['ws_leyenda_pass'],
                        'http_auth' => 'basic',
                        );

        $this->rest->initialize($config);
    }
    
    public function getLeyenda(){
        try        
        {
            $leyendastr = $this->rest->get('getLeyenda');
            return $leyendastr;
        } catch (Exception $e) {            
            msg_reporting::error_log($e);
            return FALSE;
        }        
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
    
    public function history (){
        try        
        {
            $leyendasstr = $this->rest->get('getLeyendas');
            return $leyendasstr;
        } catch (Exception $e) {            
            msg_reporting::error_log($e);
            return NULL;
        }        
    }
}
