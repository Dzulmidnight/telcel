<?php
class Finanzas extends CI_Controller{

	public function index()
	{
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_FINANZAS/dashboard_finanzas');
		$this->load->view('backend/template/footer');	
	}

	public function listado()
	{
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_FINANZAS/listado_inventario');
		$this->load->view('backend/template/footer');
	}
}