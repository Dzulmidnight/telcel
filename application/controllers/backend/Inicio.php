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
		$data['row_sucursales'] = $this->consultar_model->sucursales();
		$data['row_servicios_en_espera'] = $this->consultar_model->servicios_tecnicos_en_espera();
		$data['row_servicios_por_entregar'] = $this->consultar_model->servicios_tecnicos_por_entregar();

		$data['row_entregas'] = $this->consultar_model->ultimosAvisos($this->session->userdata('id_sucursal'));
		$data['row_servicios_rapidos'] = $this->consultar_model->catalogo_servicio_rapido();

		$data['row_consulta_refaccion2'] = $this->consultar_model->consulta_refaccion2();

		foreach ($data['row_consulta_refaccion2'] as $value) {
			$data['row_piezas_cotizacion'][$value->id_cotizacion_servicio] = $this->consultar_model->piezas_cotizacion_servicio($value->id_cotizacion_servicio, 'PETICION');
		}


		$data['row_consulta_refaccion'] = $this->consultar_model->consulta_refaccion(false);
		foreach ($data['row_consulta_refaccion'] as $value) {
			$data['detalle_refaccion'][$value->id_catalogo_piezas_reparacion] = $this->consultar_model->servicio_tecnico_piezas($value->id_catalogo_piezas_reparacion);
		}

		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$data['modal_ventas'] = $this->load->view('backend/modal_ventas', $data, true);
		
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/inicio',$data);
		$this->load->view('backend/template/footer',$data);

	}
}