<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * 
 */
class Usuario extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
    }
    
    public function index()
    {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'usuario')
        {
            redirect(base_url().'login');
        }
        $data['titulo'] = 'Bienvenido usuario';
        $this->load->view('usuario_view');
    }
}
