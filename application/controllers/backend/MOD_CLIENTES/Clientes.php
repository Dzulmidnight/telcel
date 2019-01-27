<?php

class Clientes extends CI_Controller{
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
		$data['row_sucursales'] = $this->consultar_model->sucursales();
		$data['row_clientes'] = $this->consultar_model->clientes();
	
		// total de inventario
		$data['total_clientes'] = count($data['row_clientes']);

		$data['menu_general'] = $this->load->view('backend/menu_general','',true);

		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_CLIENTES/dashboard_clientes', $data);
		$this->load->view('backend/template/footer');	
	}

	public function listado()
	{
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_CLIENTES/listado_clientes', $data);
		$this->load->view('backend/template/footer');
	}
	public function detalle()
	{
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_CLIENTES/detalle_cliente', $data);
		$this->load->view('backend/template/footer');
	}
	public function detalle_cliente($id)
	{
		$id = $id;

		//echo $codigo;
		if($this->consultar_model->detalle_cliente($id)){
			//$data['info_cliente'] = $this->consultar_model->detalle_cliente($id);

			//$vista = $this->load->view('backend/detalle_cliente', $data, true);
			$respuesta_json = json_encode($this->consultar_model->detalle_cliente($id));
			echo $respuesta_json;

		}else{
			echo 'Articulo no encontrado';
		}
	}
	public function modal_detalle_cliente($id){
		$data['row_cliente'] = $this->consultar_model->detalle_cliente($id);
		$vista = $this->load->view('backend/MOD_CLIENTES/modal_detalle_cliente', $data, true);

		echo $vista;
	}

	public function agregar()
	{

		$data = array(
			'nombre' => $this->input->post('nombre'),
			'ap_paterno' => $this->input->post('ap_paterno'),
			'ap_materno' => $this->input->post('ap_materno'),
			'telefono' => $this->input->post('telefono'),
			'email' => $this->input->post('email'),
			'informacion_extra' => $this->input->post('informacion_extra'),
			'fecha_registro' => $this->input->post('fecha_registro'),
			'id_sucursal' => $this->input->post('id_sucursal')
		);

		if($this->add_model->agregar($data, 'clientes')){
			$this->session->set_flashdata('success', "Información agregada");
		}else{
			$this->session->set_flashdata('error', "No se pudo guardar la información");
		}

		redirect('backend/MOD_CLIENTES/clientes/', 'refresh');
	}

	public function editar()
	{
		$id_cliente = $this->input->post('id_cliente');

		$data = array(
			'nombre' => $this->input->post('edit_nombre'),
			'ap_paterno' => $this->input->post('edit_ap_paterno'),
			'ap_materno' => $this->input->post('edit_ap_materno'),
			'telefono' => $this->input->post('edit_telefono'),
			'email' => $this->input->post('edit_email'),
			'informacion_extra' => $this->input->post('edit_informacion_extra'),
			'fecha_actualizacion' => time()
		);
		
		if($this->update_model->update('clientes', 'id_cliente', $id_cliente, $data)){
			$this->session->set_flashdata('success', "Información editada");
		}

		redirect('backend/MOD_CLIENTES/Clientes/', 'refresh');	
	}

	public function eliminar()
	{
		$id = $this->input->post('id_eliminar');
		
		if($this->eliminar_model->eliminar('clientes', 'id_cliente', $id)){
			$this->session->set_flashdata('error', "Información eliminada");
		}
		redirect('backend/MOD_CLIENTES/clientes/', 'refresh');
	}


}