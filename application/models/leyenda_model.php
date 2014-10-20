<?php defined('BASEPATH') OR exit('No direct script access allowed');

class leyenda_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->library('msg_reporting');
        
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
            if (!is_array($leyendastr)){
                throw new Exception('Error al intentar consultar información del websrevice - ' . $leyendastr);
            }           
            return $leyendastr;
        } catch (Exception $e) {            
            msg_reporting::error_log($e);
            return FALSE;
        }        
    }
    
    public function insert($decreto,$fechadecreto,$textoleyenda) {
        try        
        {
            $uri = "?NumDecreto=" . urlencode($decreto) . "&FechaDecreto=" . $fechadecreto . "&Leyenda=" . urlencode($textoleyenda);            
            $leyendasstr = $this->rest->get('setLeyenda/' . $uri);
            if (!is_array($leyendasstr)){
                throw new Exception('Error al intentar consultar información del websrevice - ' . $leyendasstr);
            }
            return $leyendasstr;
        } catch (Exception $e) {            
            msg_reporting::error_log($e);
            return FALSE;
        }
    }
    
    public function history (){
        try        
        {
            $leyendasstr = $this->rest->get('getLeyendas');
            if (!is_array($leyendasstr)){
                throw new Exception('Error al intentar consultar información del websrevice - ' . $leyendasstr);
            }
            return $leyendasstr;
        } catch (Exception $e) {            
            msg_reporting::error_log($e);
            return NULL;
        }        
    }
}
