<?php

class Clientes extends CI_Controller{

	public function index()
	{
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_CLIENTES/listado_clientes');
		$this->load->view('backend/template/footer');
	}
}