<?php
class Sucursales extends CI_Controller{
	function __construct()
	{
		parent::__construct();

		$this->load->model('add_model');
		$this->load->model('consultar_model');
	}

	public function index($tipo = false)
	{
		switch ($tipo) {
			case 'express':
				$servicio = 'servicio_express';
				break;
			case 'detallado':
				$servicio = 'servicio_detallado';
				break;

			case 'interno':
				$servicio = 'servicio_interno';
				break;
			default:
				# code...
				break;
		}
		$data['row_sucursales'] = $this->consultar_model->sucursales();
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);

		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_SUCURSALES/dashboard_sucursales', $data);
		$this->load->view('backend/template/footer');	
	}

	public function agregar()
	{
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'telefono' => $this->input->post('telefono'),
			'direccion' => $this->input->post('direccion'),
			'fecha_registro' => $this->input->post('fecha_registro')
		);

		if($this->add_model->agregar($data, 'sucursal')){
			$this->session->set_flashdata('success', "Sucursal agregada");
		}
		redirect('backend/MOD_SUCURSALES/sucursales', 'refresh');
	}

	public function listado()
	{
		$data['row_sucursales'] = $this->consultar_model->sucursales();
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_SUCURSALES/listado_sucursales', $data);
		$this->load->view('backend/template/footer');
	}
}