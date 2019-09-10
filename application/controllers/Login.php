<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('login_model');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->database('default');
    }
	
	public function index()
	{	
		switch ($this->session->userdata('perfil')) {
			case '':
				$data['token'] = $this->token();
				$data['titulo'] = 'Login con roles de usuario en codeigniter';
				$this->load->view('header');
				$this->load->view('login',$data);
				$this->load->view('footer');
				break;
			case 'administrador':
				redirect(base_url().'backend/Inicio');
				break;
			case 'editor':
				redirect(base_url().'editor');
				break;	
			case 'suscriptor':
				redirect(base_url().'suscriptor');
				break;
			default:		
				$data['titulo'] = 'Login con roles de usuario en codeigniter';
				$this->load->view('header');
				$this->load->view('login',$data);
				$this->load->view('footer');
				break;

		}
	}

	public function new_user()
	{
		/*if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
		{*/
	        $this->form_validation->set_rules('username', 'nombre de usuario', 'required');
	        $this->form_validation->set_rules('password', 'password', 'required');

	        //lanzamos mensajes de error si es que los hay
	        
			if($this->form_validation->run() == FALSE)
			{
				$this->index();
			}else{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$check_user = $this->login_model->login_user($username,$password);
				if($check_user == TRUE)
				{
					$data = array(
	                'is_logued_in' 	=> 		TRUE,
	                'id_usuario' 	=> 		$check_user->id_user,
	                'perfil'		=>		$check_user->perfil,
	                'username' 		=> 		$check_user->username,
	                'id_sucursal'	=>		$check_user->id_sucursal
	        		);		
					$this->session->set_userdata($data);
					$this->index();
				}
			}
		/*}/*else{
			redirect(base_url().'login');
		}*/
	}
	
	public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}
	
	public function logout_ci()
	{
		$this->session->sess_destroy();
		$this->index();
	}
}