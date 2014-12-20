<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            $taget = $this->input->post('taget');
            $profile = $this->input->post('profile');
            
            /*
             * TODO / VALIDAR PARAMETROS DE ENTRADA DE FORMULARIO
             */

            $target = 'intercambiosvirtuales.org';
            $profile = 1;
            
            $response = $this->data_model->nmap($target,$profile);
            
            die(var_dump($response));
            
            if ($response) {
                $this->load->view('nmapscan',$response);                 
            }            
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */