<?php
class Proveedores extends CI_Controller{
	function __construct()
	{
		parent::__construct();

		$this->load->model('add_model');
	}

	public function index()
	{
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_PROVEEDORES/dashboard_proveedores', $data);
		$this->load->view('backend/template/footer');	
	}

	public function listado()
	{
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_PROVEEDORES/listado_inventario', $data);
		$this->load->view('backend/template/footer');
	}
	public function detalle()
	{
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_PROVEEDORES/detalle_proveedor', $data);
		$this->load->view('backend/template/footer');
	}

	public function agregar()
	{
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'telefono' => $this->input->post('telefono'),
			'direccion' => $this->input->post('direccion'),
			'informacion_extra' => $this->input->post('informacion_extra')
		);

		if($this->add_model->agregar($data, 'proveedores')){
			$fk_id_proveedor = $this->db->insert_id();
			// insertamos los contactos
			if($this->input->post('nombre')){
				$data = array(
					'nombre' => $this->input->post('nombre'),
					'ap_paterno' => $this->input->post('ap_paterno'),
					'ap_materno' => $this->input->post('ap_materno'),
					'telefono' => $this->input->post('telefono'),
					'email' => $this->input->post('email'),
					'fk_id_proveedor' => $fk_id_proveedor
				);
				$this->add_model->agregar($data, 'contacto');

				$this->session->set_flashdata('success', "Proveedor agregado"); 

				$data['menu_general'] = $this->load->view('backend/menu_general','',true);
				$this->load->view('backend/template/head');
				$this->load->view('backend/template/overlay');
				$this->load->view('backend/template/navbar');
				$this->load->view('backend/template/header');
					$this->load->view('backend/MOD_PROVEEDORES/dashboard_proveedores', $data);
				$this->load->view('backend/template/footer');

			}
		}else{
			
		}
	}
}