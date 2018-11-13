<?php
class Proveedores extends CI_Controller{

	public function index()
	{
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_PROVEEDORES/dashboard_proveedores');
		$this->load->view('backend/template/footer');	
	}

	public function listado()
	{
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_PROVEEDORES/listado_inventario');
		$this->load->view('backend/template/footer');
	}
	public function detalle()
	{
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_PROVEEDORES/detalle_proveedor');
		$this->load->view('backend/template/footer');
	}
}