<?php
class Serv_tecnico extends CI_Controller{
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
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		/*$data['row_productos'] = $this->consultar_model->productos();
		$data['row_sucursales'] = $this->consultar_model->sucursales();
		$data['row_proveedores'] = $this->consultar_model->listadoProveedores();
		$data['row_categoria_producto'] = $this->consultar_model->categoriaProductos();
		$data['row_sub_categoria_producto'] = $this->consultar_model->subCategoriaProducto();
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);

		foreach ($data['row_productos'] as $producto) {

			$data['row_sucursal_piezas'][$producto->id_producto] = $this->consultar_model->sucursal_producto($producto->id_producto);
		}*/
		$data['row_servicios'] = $this->consultar_model->servicios_tecnicos();


		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_SERV_TECNICO/dashboard_serv_tecnico', $data);
		$this->load->view('backend/template/footer');
	}

	/*public function listado()
	{
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);


		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_SERV_TECNICO/listado_inventario', $data);
		$this->load->view('backend/template/footer');
	}*/

	public function agregar()
	{	
		$id_sucursal = $this->session->userdata('id_sucursal');
		$fecha_registro = time();
		$fk_id_cliente = '';
		$estatus = 'PENDIENTE';

		if(!empty($this->input->post('nombre_cliente'))){
			$data_cliente = array(
				'nombre' => $this->input->post('nombre_cliente'),
				'ap_paterno' => $this->input->post('ap_paterno'),
				'ap_materno' => $this->input->post('ap_materno'),
				'telefono' => $this->input->post('telefono'),
				'email' => $this->input->post('email'),
				'informacion_extra' => $this->input->post('informacion_extra'),
				'id_sucursal' => $id_sucursal,
				'fecha_registro' => $fecha_registro
			);
			$this->add_model->agregar($data_cliente, 'clientes');
			$fk_id_cliente = $this->db->insert_id();

		}else{
			$fk_id_cliente = $this->input->post('fk_id_cliente');
		}


		$data_servicio = array(
			'fk_id_cliente' => $fk_id_cliente,
			'fk_id_sucursal' => $id_sucursal,
			'imei' => $this->input->post('imei'),
			'numero_telefono' => $this->input->post('numero_telefono'),
			'marca_telefono' => $this->input->post('marca_telefono'),
			'modelo_telefono' => $this->input->post('modelo_telefono'),
			'estado_fisico' => $this->input->post('estado_fisico'),
			'falla_reportada' => $this->input->post('falla_reportada'),
			'detalle_extra' => $this->input->post('detalle_extra'),
			'patron_bloqueo' => $this->input->post('patron_bloqueo'),
			'fecha_registro' => $fecha_registro,
			'estatus' => $estatus
			);

		if($this->add_model->agregar($data_servicio, 'servicio_tecnico')){
			$id_servicio = $this->db->insert_id();
			$codigo_barras = time().str_pad($id_servicio, 3, "0", STR_PAD_LEFT);
			$data = array(
				'codigo_barras' => $codigo_barras
			);
			$this->update_model->update('servicio_tecnico', 'id_servicio_tecnico', $id_servicio, $data);
		}

		redirect('backend/MOD_SERV_TECNICO/Serv_tecnico', 'refresh');


	}

}