<?php

define('INICONFIGFILE', 'config.ini');
define('NMAP_PATH','c:\"Program Files (x86)"\Nmap\nmap.exe');
define('NMAP_RETURN_XML','-oX -');

/*
 * Desarrollador: Xmal Morthen
 * Fecha: 19/12/2014
 * Descripción: Controlador para iniciar el demonio. 
 */
class socket {
/*
 * Desarrollador: Xmal Morthen
 * Fecha: 19/12/2014
 * Descripción: Controlador para iniciar el demonio. 
 */   
    static function init()
    {   
        try {
            set_time_limit(0);
            
            require_once('libraries/ini_cnfg.php');

            $ini = new ini_cnfg(INICONFIGFILE);
            $cnfg = $ini->parse();
            
            $socket = socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));
            socket_bind($socket, $cnfg->ip_listener, $cnfg->port_listener);
            echo socket_strerror(socket_last_error());
            socket_listen($socket);
            $i = 0;
            $param = '';
            while(1){
                    $request[++$i] = socket_accept($socket);
                    socket_recv ( $request[$i] , $param , 1048576 , MSG_PEEK);
                    $command = NMAP_PATH . ' ' . NMAP_RETURN_XML . ' ' . trim($param);
                    echo "{$command} : ";
                    $response = shell_exec($command);
                    socket_write($request[$i], $response . '\n\r', strlen($response));
                    socket_close($request[$i]);
                    echo "OK \n";
            }
            socket_close($socket);          
        } catch (Exception $exc) {
            die("Ocurrió un error al ejecutar el demonio de sockets... {$exc->message}");
        }                
    }
}

socket::init();
?>
