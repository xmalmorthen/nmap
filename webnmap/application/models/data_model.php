<?php defined('BASEPATH') OR exit('No direct script access allowed');

class data_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->spark('restclient/2.2.1');
        $this->load->library('rest');
    }
    
    public function nmap($target,$profileid) {
        try        
        {   
            require_once('profile_structure.php');
            
            $param = $profile[$profileid] . ' ' . $target;
            $param = base64_encode($param);            
            
            $cnfg = IniRead();            
            $config = array('server'            => $cnfg['nmap_api']['url'],
                            //'api_key'         => 'Setec_Astronomy'
                            //'api_name'        => 'X-API-KEY'
                            //'http_user'       => $cnfg['nmap_api']['usr'],
                            //'http_pass'       => $cnfg['nmap_api']['pwd'],
                            //'http_auth'       => 'basic',
                            //'ssl_verify_peer' => TRUE,
                            //'ssl_cainfo'      => '/certs/cert.pem'
                            );
            $this->rest->initialize($config);
            $response = $this->rest->get("get/nmap/params/{$param}");             
            return $response;
        } catch (Exception $e) {            
            msg_reporting::error_log($e);
            Response::Respuesta(NULL,'ERROR',$e->getMessage(),500);
        }
    }    
}
