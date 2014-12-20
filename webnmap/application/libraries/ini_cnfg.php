<?php //defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Autor: Miguel Angel Rueda Aguilar
 * Fecha: 04-09-2012
 * Descripción: Clase para generar estructura a partir del
 *              archivo de configuraciones
 */

class ini_cnfg {
    private $file = NULL;
    public $ini = NULL;
    
#funcion: constructor    
    public function __construct($inifile = NULL) {
                
#valida: recibe archivo
        if (!$inifile) {
            if (defined('INICONFIGFILE')) {
                $inifile = INICONFIGFILE;
            } else {
                show_error('No se especificó el archivo .ini',500);
            }
        }        
#valida: si existe el archivo
        $this->_exist($inifile);
#asigna: archivo a variable privada     
        $this->file = $inifile;        
    }
    
/*
 * Autor: Miguel Angel Rueda
 * Descripción: traducir el contenido de archivo ini en objeto manipulable
 */ 
    public function parse(){
#valida: si existe el archivo
        $this->_exist();
#accion: procesa el archivo ini        
        $parse_ini = parse_ini_file($this->file);
                
#accion: genera objeto con estructura del archivo ini        
        $this->ini = new stdClass();
        foreach ($parse_ini as $key => $value) {
            $this->ini->$key = $value;
        };        
        
        return $this->ini;
    }

/*
 * Autor: Miguel Angel Rueda
 * Descripción: verifica que exista el archivo de configuraciones ini
 * Parámetros:
 *        Entrada: $inifile - nombre de archivo ini
 *                 $showerror - indica si se genera un error de salida o no
 *        Salida: TRUE o FALSE
 */     
    private function _exist($inifile = NULL, $showerror = TRUE){
        
        $file = $inifile !== NULL ? $inifile : $this->file;
               
        if (!file_exists($file)) {
            if ($showerror) {
                require 'application/libraries/msg_reporting.php';
                msg_reporting::system_error("El archivo de configuración [ <strong>{$file}</strong> ], no se encuentra o no se tiene el permiso de lectura, favor de revisar...!!!");
            }
            return false;
        }
        return true;
    }
    
}
