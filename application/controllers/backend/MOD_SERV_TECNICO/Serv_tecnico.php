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
		$data['row_sucursales'] = $this->consultar_model->sucursales();

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

		$tipo_bloqueo = $this->input->post('tipo_bloqueo');
		$patron_bloqueo = '';
		$codigo_bloqueo = '';

		if(isset($tipo_bloqueo) && $tipo_bloqueo = 'patron'){
			$patron_bloqueo = $this->input->post('casilla_seleccionada');
		}else if(isset($tipo_bloqueo) && $tipo_bloqueo == 'codigo'){
			$codigo_bloqueo = $this->input->post('codigo_bloqueo');
		}

		$fecha_entrega = strtotime($this->input->post('fecha_entrega'));


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
			'fk_id_usuario' => $this->session->userdata('id_usuario'),
			'deposito_garantia' => $this->input->post('deposito_garantia'),
			'imei' => $this->input->post('imei'),
			'numero_telefono' => $this->input->post('num_telefono_equipo'),
			'marca_telefono' => $this->input->post('marca'),
			'modelo_telefono' => $this->input->post('modelo'),
			'estado_fisico' => $this->input->post('estado_fisico'),
			'falla_reportada' => $this->input->post('falla_reportada'),
			'detalle_extra' => $this->input->post('detalle_extra'),
			'patron_bloqueo' => $patron_bloqueo,
			'codigo_bloqueo' => $codigo_bloqueo,
			'fecha_registro' => $fecha_registro,
			'fecha_entrega' => $fecha_entrega,
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

	public function ficha_servicio($id)
	{
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$data['row_servicios'] = $this->consultar_model->servicios_tecnicos($id);
		$data['historial_estatus'] = $this->consultar_model->consulta($id, 'fk_id_servicio_tecnico', 'estatus_servicio', 'DESC');

		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_SERV_TECNICO/ficha_servicio', $data);
		$this->load->view('backend/template/footer');
	}

	public function actualizar_estatus(){
		$id_servicio_tecnico = $this->input->post('id_servicio_tecnico');
		$data_estatus = array(
			'estatus' => $this->input->post('estatus_servicio'),
			'accion_realizada' => $this->input->post('accion_realizada'),
			'fk_id_user' => $this->session->userdata('id_usuario'),
			'fk_id_servicio_tecnico' => $id_servicio_tecnico,
			'fecha_registro' => $this->input->post('fecha_registro')
		);
		$this->add_model->agregar($data_estatus, 'estatus_servicio');

		$data_actualizar = array(
			'fecha_actualizacion' => $this->input->post('fecha_registro'),
			'estatus' => $this->input->post('estatus_servicio')
		);
		$this->update_model->update('servicio_tecnico', 'id_servicio_tecnico', $id_servicio_tecnico, $data_actualizar);

		redirect('backend/MOD_SERV_TECNICO/Serv_tecnico/ficha_servicio/'.$id_servicio_tecnico.'', 'refresh');
	}

	public function cotizacion_servicio(){
		$id_servicio_tecnico = $this->input->post('id_servicio_tecnico');
		$data_estatus = array(
			'estatus' => $this->input->post('estatus_servicio'),
			'accion_realizada' => 'Cotización generada',
			'fk_id_user' => $this->session->userdata('id_usuario'),
			'fk_id_servicio_tecnico' => $id_servicio_tecnico,
			'fecha_registro' => $this->input->post('fecha_registro')
		);
		$this->add_model->agregar($data_estatus, 'estatus_servicio');

		$data_actualizar = array(
			'costo_servicio' => $this->input->post('costo_servicio'),
			'descripcion_servicio' => $this->input->post('descripcion_servicio'),
			'fecha_actualizacion' => $this->input->post('fecha_registro'),
			'estatus' => $this->input->post('estatus_servicio')
		);
		$this->update_model->update('servicio_tecnico', 'id_servicio_tecnico', $id_servicio_tecnico, $data_actualizar);

		redirect('backend/MOD_SERV_TECNICO/Serv_tecnico/ficha_servicio/'.$id_servicio_tecnico.'', 'refresh');	
	}

	public function entregar_equipo(){
		$id_servicio_tecnico = $this->input->post('id_frm_servicio_tecnico');
		echo $id_servicio_tecnico;
		$data_estatus = array(
			'estatus' => 'ENTREGADO',
			'accion_realizada' => 'Equipo entregado al cliente',
			'fk_id_user' => $this->session->userdata('id_usuario'),
			'fk_id_servicio_tecnico' => $id_servicio_tecnico,
			'fecha_registro' => $this->input->post('fecha_registro')
		);
		$this->add_model->agregar($data_estatus, 'estatus_servicio');

		$data_actualizar = array(
			'servicio_pagado' => 1,
			'fecha_actualizacion' => $this->input->post('fecha_registro'),
			'estatus' => 'ENTREGADO'
		);
		$this->update_model->update('servicio_tecnico', 'id_servicio_tecnico', $id_servicio_tecnico, $data_actualizar);

		redirect('backend/MOD_SERV_TECNICO/Serv_tecnico/', 'refresh');
	}

	public function modal_detalle_cotizacion($id){
		$data['row_detalle_cotizacion'] = $this->consultar_model->servicios_tecnicos($id);
		$vista = $this->load->view('backend/MOD_SERV_TECNICO/modal_detalle_cotizacion', $data, true);

		echo $vista;
	}

	public function modal_ficha_servicio_prueba($id){
		$data['row_detalle_ficha'] = $this->consultar_model->servicios_tecnicos($id);
		//$vista = $this->load->view('backend/MOD_SERV_TECNICO/modal_detalle_ficha', $data, true);

		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/pdf_ficha_tecnica', $data);
		$this->load->view('backend/template/footer');

//		echo $vista;
	}

	public function modal_ficha_servicio($id){
		$data['row_detalle_ficha'] = $this->consultar_model->servicios_tecnicos($id);
		$vista = $this->load->view('backend/MOD_SERV_TECNICO/modal_detalle_ficha', $data, true);

		echo $vista;
	}

	public function historialAcciones($id){
		$data['row_historial_acciones'] = $this->consultar_model->consulta($id, 'fk_id_servicio_tecnico', 'estatus_servicio', 'DESC');

		$vista = $this->load->view('backend/MOD_SERV_TECNICO/tabla_estatus_acciones', $data, true);
		//$historial = json_encode($this->consultar_model->consulta($id, 'fk_id_servicio_tecnico', 'estatus_servicio', 'DESC'));
		echo $vista;
	}

	public function repuestos($busqueda){
		$data['row_repuestos'] = $this->consultar_model->repuestos($busqueda);
		
		$tabla = $this->load->view('backend/MOD_SERV_TECNICO/tabla_repuesto', $data, true);
		echo $tabla;
	}

}