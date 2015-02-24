<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends SuperController {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        
    }
	public function index()
	{
            //Revisa si existe un tipo de perfil en la sesion
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
                
                //consulta si se hizo la consulta
                if($usuariook == TRUE){
                    
                    $data = array (
                        'logueado'      => TRUE,
                        'perfil'        => $usuariook->perfil,
                        'usuario'       => $usuariook->nombre,
                        'ap_paterno'    => $usuariook->ap_paterno
                    );
                    
                    //Se pasan los datos del array $data a la sesion
                    $this->session->set_userdata($data);
                    $this->index();
                }else{
                    redirect('login');
                }
                
                
            }
        
    public function cerrar_sesion()
    {
        //Para remover el cache
        $this->removeCache();
        
        //para destruir los datos de sesion
        $this->session->sess_destroy();
        
        redirect('login');
    }
        
        
}

        

    
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */