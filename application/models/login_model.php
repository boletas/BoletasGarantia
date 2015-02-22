<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Login_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function login_user($username,$password)
    {
        $this->db->select([
            'p.perfil',
            'u.nombre',
            'u.ap_paterno'
        ]);
        $this->db->where('nombre_usuario',$username);
        $this->db->where('pass_usuario',$password);
        $this->db->where('u.tbl_Perfil_idPerfil = p.idPerfil');
        $this->db->where('u.tbl_Login_idLogin = l.idLogin');
        
        $this->db->from('tbl_Usuario u, tbl_Perfil p, tbl_Login l');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0)
        {
            return $query->row();

        }else{
         
            $this->session->set_flashdata('usuario_incorrecto','Usuario o contraseña incorrecto');
            redirect('login');
        }
    }
}