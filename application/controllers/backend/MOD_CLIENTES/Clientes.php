<?php

class Clientes extends CI_Controller{

	public function index()
	{
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_CLIENTES/dashboard_clientes');
		$this->load->view('backend/template/footer');	
	}

	public function listado()
	{
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_CLIENTES/listado_clientes');
		$this->load->view('backend/template/footer');
	}
	public function detalle()
	{
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_CLIENTES/detalle_cliente');
		$this->load->view('backend/template/footer');
	}

}