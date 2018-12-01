<?php
class Proveedores extends CI_Controller{
	function __construct()
	{
		parent::__construct();

		$this->load->model('add_model');
		$this->load->model('consultar_model');
	}

	public function index()
	{
		$data['row_proveedores'] = $this->consultar_model->listadoProveedores();
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
		$data['row_proveedores'] = $this->consultar_model->listadoProveedores();

		$prueba=$this->load->view('backend/MOD_PROVEEDORES/listado_proveedores', $data, TRUE);
		echo $prueba;
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


	public function detalleProveedor($tabla = false, $id = false){
		header("Content-Type: application/json; charset=UTF-8");
		//$objeto = json_decode($_POST["x"], false);

		//echo json_encode($this->consultar_model->listado('usuarios'));
		//$data['row_usuarios'] = $this->consultar_model->listado($tabla, $id);
		echo json_encode($data['row_proveedores'] = $this->consultar_model->listadoProveedores($id));
		//echo json_encode($row_usuarios);

	}


	public function agregar()
	{
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'telefono' => $this->input->post('telefono'),
			'direccion' => $this->input->post('direccion'),
			'informacion_extra' => $this->input->post('informacion_extra'),
			'fecha_registro' => $this->input->post('fecha_registro')
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
					'fk_id_proveedor' => $fk_id_proveedor,
					'fecha_registro' => $this->input->post('fecha_registro')
				);
				$this->add_model->agregar($data, 'contacto');

				$this->session->set_flashdata('success', "Proveedor agregado"); 

				redirect('backend/MOD_PROVEEDORES/Proveedores', 'refresh');
			}
		}else{
			// cuando no se realizo la inserción
		}
	}

	public function actualizar($id = false)
	{
		// datos del proveedor
		$id_proveedor = $this->input->post('id_proveedor');
		$datos_proveedor = array(
			'nombre' => $this->input->post('editar_nombre_proveedor'),
			'telefono' => $this->input->post('editar_telefono_proveedor'),
			'direccion' => $this->input->post('editar_direccion'),
			'informacion_extra' => $this->input->post('editar_informacion_extra'),
			'fecha_registro' => $this->input->post('editar_fecha_registro')
		);

		// datos del contacto
		$id_contacto = $this->input->post('id_contacto');
		$datos_contacto = array(
			'nombre' => $this->input->post('editar_nombre_contacto'),
			'ap_paterno' => $this->input->post('editar_ap_paterno_contacto'),
			'ap_materno' => $this->input->post('editar_ap_materno_contacto'),
			'telefono' => $this->input->post('editar_telefono_contacto'),
			'email' => $this->input->post('editar_email_contacto'),
		);

		$this->add_model->actualizar($datos_proveedor, 'proveedores', 'id_proveedor', $id_proveedor);

		if($this->add_model->actualizar($datos_proveedor, 'proveedores', 'id_proveedor', $id_proveedor) && $this->add_model->actualizar($datos_contacto, 'contacto', 'id_contacto', $id_contacto)){

			$this->session->set_flashdata('success', "Datos actualizados");
		}else{
			$this->session->set_flashdata('error', "No se pudieron actualizar los datos");
		}
		
		redirect('backend/MOD_PROVEEDORES/Proveedores', 'refresh');

		if($this->add_model->agregar($data, 'proveedores')){
			$fk_id_proveedor = $this->db->insert_id();
			// insertamos los contactos
			if($this->input->post('editar_nombre')){
				$data = array(
					'nombre' => $this->input->post('editar_nombre'),
					'ap_paterno' => $this->input->post('editar_ap_paterno'),
					'ap_materno' => $this->input->post('editar_ap_materno'),
					'telefono' => $this->input->post('editar_telefono'),
					'email' => $this->input->post('editar_email'),
					'fk_id_proveedor' => $fk_id_proveedor
				);
				$this->add_model->agregar($data, 'contacto');

				$this->session->set_flashdata('success', "Proveedor agregado"); 

				redirect('backend/MOD_PROVEEDORES/Proveedores', 'refresh');
			}
		}else{
			// cuando no se realizo la inserción
		}
	}

	public function eliminar($id)
	{
		$this->load->model('eliminar_model');
		$this->eliminar_model->eliminar('proveedores', 'id_proveedor', $id);
		$this->eliminar_model->eliminar('contacto', 'fk_id_proveedor', $id);

		redirect('backend/MOD_PROVEEDORES/Proveedores', 'refresh');
	}
}