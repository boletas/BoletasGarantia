<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        
    }
	public function index()
	{
            switch ($this->session->userdata('perfil')) {
            case '':
                $this->load->view('login');
                break;
            case 'administrador':
                redirect(base_url().'admin');
                break;
            case 'usuario':
                redirect(base_url().'usuario');
                break;    
            default:
                $this->load->view('login');
                break;        
        }
		
	}
        
        public function inicio_sesion(){
                
                $usuario = $this->input->post("usuario");
                $pass = $this->input->post("password");
                
                $usuariook = $this->login_model->login_user($usuario,$pass);
                
                if($usuariook == TRUE){
                    
                    $data = array (
                        'logueado'      => TRUE,
                        'perfil'        => $usuariook->perfil,
                        'usuario'       => $usuariook->nombre,
                        'ap_paterno'    => $usuariook->ap_paterno
                    );
                    
                    $this->session->set_userdata($data);
                    $this->index();
                }else{
                    redirect('login');
                }
                
                
            }
        
    public function cerrar_sesion()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
        
        
}

        

    
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */