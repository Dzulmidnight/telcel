<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ESTRUCTURA GENERAL
	- head
	- overlay
	- navbar
	- header
		- contenido variable
	- footer
*/

class Inicio extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('add_model');
		$this->load->model('count_model');
		$this->load->model('consultar_model');
		$this->load->model('update_model');
		$this->load->model('eliminar_model');
	}
	
	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'login');
		}
		
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$data['modal_ventas'] = $this->load->view('backend/modal_ventas','',true);
		$data['row_entregas'] = $this->consultar_model->ultimosAvisos($this->session->userdata('id_sucursal'));

		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/inicio',$data);
		$this->load->view('backend/template/footer',$data);

	}
}