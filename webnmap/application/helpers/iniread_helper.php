<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
    Document   : iniread_helper
    Created on : 09/11/2011, 11:09:30 AM
    Author     : XmalMorthen
    Description: Metodos para leer archivo de configuraciones INI
*/

if ( ! function_exists('IniRead'))
{
	function IniRead($Seccion = NULL, $Tag = NULL)
	{
            $ini = parse_ini_file(INICONFIGFILE, true);
            if($Seccion && $Tag) {
                return $ini[$Seccion][$Tag];                
            } else if ($Seccion){
                return $ini[$Seccion];
            } else 
                return $ini;
	}
}