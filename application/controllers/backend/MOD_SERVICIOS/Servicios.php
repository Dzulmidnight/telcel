<?php
class Servicios extends CI_Controller{
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
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_SERVICIOS/dashboard_servicios', $data);
		$this->load->view('backend/template/footer');	
	}

	public function vendedor($id)
	{
		$row_vendedor = $this->consultar_model->consultaSimple($id, 'id_user', 'users');

		$resultado = json_encode($row_vendedor);

		echo $resultado;
	}

	public function listado()
	{
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_SERVICIOS/listado_servicios', $data);
		$this->load->view('backend/template/footer');
	}

	public function venta()
	{

		$objeto = json_decode($_POST["parametros"], false);
		$id_vendedor = json_decode($_POST["id_vendedor"], false);
		$id_sucursal_venta = $_POST["id_sucursal_venta"];
		//$id_sucursal = json_decode($_POST["array_sucursal"], false);


		/*if(is_array($objeto)){
			echo 'si es array';
			foreach ($objeto as $value) {
				echo $value->precioCarrito;
			}
		}else{
			echo 'no es';
		}*/

		/*$array_id_articulos = $this->input->post('id_producto_carrito');
		$array_precio_articulos = $this->input->post('precio_carrito');
		$array_precio_real_articulo = $this->input->post('precio_real_carrito');
		$array_cantidad_articulos = $this->input->post('cantidad_carrito');
		$array_total_venta = $this->input->post('total_carrito');
		$array_total_venta_real = $this->input->post('total_real_carrito');*/
		$insert_producto_venta = 0;
		$insert_producto = 0;
		$insert_historial_inventario = 0;

		$piezas_ticket = 0;
		$total_ticket = 0;
		$array_producto_venta = array();

		////// CREAMOS TICKET DE VENTA //////
			$data_ticket = array(
				'fk_id_sucursal' => $id_sucursal_venta,
				'fk_id_usuario' => $id_vendedor,
				'fecha_registro' => time()
			);
			$this->add_model->agregar($data_ticket, 'ticket');

			$fk_id_ticket = $this->db->insert_id();

		foreach ($objeto as $key => $value) {
			$piezas_ticket += $value->cantidad_carrito;
			//$precio_pieza = $value->precio_carrito * $value->cantidad_carrito;
			$total_ticket += ($value->precio_carrito * $value->cantidad_carrito);
			$id_producto = $value->id_producto_carrito;
			$id_sucursal_producto = $value->id_sucursal_producto; 

			// registramos la venta en tb -> producto_venta
				$data_producto_venta = array(
					'piezas' => $value->cantidad_carrito,
					'precio_venta' => $value->precio_carrito,
					'precio_real_venta' => $value->precio_real_carrito,
					'fk_id_producto' => $id_producto,
					'fk_id_sucursal' => $id_sucursal_venta,
					'fk_id_usuario' => $id_vendedor,
					'fk_id_ticket' => $fk_id_ticket,
					'fecha_registro' => time()
				);
				$this->add_model->agregar($data_producto_venta, 'producto_venta');

				$array_producto_venta[] = $this->db->insert_id();
				
			//// actualizamos las piezas de la tb -> producto
				$producto = $this->consultar_model->producto($id_producto);

				$piezas_restantes = ($producto->piezas) - ($value->cantidad_carrito);

				$data_piezas_producto = array(
					'piezas' => $piezas_restantes
				);
				
				$this->update_model->update('producto', 'id_producto', $id_producto, $data_piezas_producto);

			///// actualizamos las piezas de sucursal
				$sucursal_producto = $this->consultar_model->sucursal_cantidad($id_producto, $id_sucursal_producto);

				$restante = ($sucursal_producto->piezas) - ($value->cantidad_carrito);

				$data_restante_sucursal = array(
					'piezas' => $restante,
					'fecha_actualizacion' => time()
				);
				$this->update_model->update('sucursal_producto', 'id_sucursal_producto', $sucursal_producto->id_sucursal_producto, $data_restante_sucursal);

			// actualizamos las piezas de la TB -> historial_inventario
				$detalle_historial = $this->consultar_model->consultaSimple($id_producto, 'fk_id_producto', 'historial_inventario');

				$id_historial_inventario = $detalle_historial->id_historial_inventario;

				$suma_salidas = 0;
				//echo '<br> salidas anteriores: '.$suma_salidas;
				$suma_salidas = ($detalle_historial->producto_salida) + ($value->cantidad_carrito);			

				$data_historial_inventario = array(
					'producto_salida' => $suma_salidas,
					'fecha_actualizacion' => time()
				);

				$this->update_model->update('historial_inventario', 'id_historial_inventario', $id_historial_inventario, $data_historial_inventario);

				//$this->session->set_flashdata('success', "Producto agregado");
				//redirect('backend/Inicio/', 'refresh');
		}

		// actualizamos ticket de venta
			$data_ticket_update = array(
				'piezas' => $piezas_ticket,
				'total' => $total_ticket
			);
			$this->update_model->update('ticket', 'id_ticket', $fk_id_ticket, $data_ticket_update);

			foreach ($array_producto_venta as $value) {
				$data_ticket_producto = array(
					'fk_id_ticket' => $fk_id_ticket,
					'fk_id_producto_venta' => $value,
					'fecha_registro' => time()
				);

				$this->add_model->agregar($data_ticket_producto, 'ticket_producto_venta');
			}

			echo $fk_id_ticket;

		/*foreach ($objeto as $key => $articulo) {

			$piezas_restantes = 0;
			echo '<br>------ detalle del producto ------<br>';
			echo '<br>EL Key: '.$key.' - id_articulo: '.$articulo.' - precio_unitario: '.$array_precio_articulos[$key].' - precio_unitario_real: '.$array_precio_real_articulo[$key].' - cantidad: '.$array_cantidad_articulos[$key].' - total_venta: '.$array_total_venta[$key].' - total real: '.$array_total_venta_real[$key];
			
			// registramos la venta en tb -> producto_venta
				$data_producto_venta = array(
					'piezas' => $array_cantidad_articulos[$key],
					'precio_venta' => $array_precio_articulos[$key],
					'precio_real_venta' => $array_precio_real_articulo[$key],
					'fk_id_sucursal' => $this->session->userdata('id_sucursal'),
					'fk_id_usuario' => $this->session->userdata('id_usuario'),
					'fecha_registro' => time()
				);
				//$this->add_model->agregar($data_producto_venta, 'producto_venta');
			

			//// actualizamos las piezas de la tb -> producto
				$producto = $this->consultar_model->producto($articulo);

				//echo '<br>Las piezas: '.$producto->piezas;

				$piezas_restantes = ($producto->piezas) - ($array_cantidad_articulos[$key]);

				//echo '<br>Las restantes: '.$piezas_restantes;

				$data_piezas_producto = array(
					'piezas' => $piezas_restantes
				);
				//$this->update_model->update('producto', 'id_producto', $articulo, $data_piezas_producto);

			// actualizamos las piezas de la TB -> historial_inventario
				$detalle_historial = $this->consultar_model->consulta('historial_inventario', 'fk_id_producto', $articulo);

				$id_historial_inventario = $detalle_historial->id_historial_inventario;

				$suma_salidas = 0;
				//echo '<br> salidas anteriores: '.$suma_salidas;
				$suma_salidas = ($detalle_historial->producto_salida) + ($array_cantidad_articulos[$key]);
	
				echo '<br> Nuevas salidas: '.$suma_salidas;
				echo '<br> ID_HISTORIAL: '.$detalle_historial->id_historial_inventario;
				echo '<br>total_historia: '.count($detalle_historial);
				echo '<br> fk_id_producto: '.$detalle_historial->fk_id_producto;
				echo '<br> entrada: '.$detalle_historial->producto_entrada;
				echo '<br> salida: '.$detalle_historial->producto_salida;
				echo '<br> total: '.$detalle_historial->total_restante;
				

				$data_historial_inventario = array(
					'producto_salida' => $suma_salidas,
					'fecha_actualizacion' => time()
				);

				//$this->update_model->update('historial_inventario', 'id_historial_inventario', $id_historial_inventario, $data_historial_inventario);

				//$this->session->set_flashdata('success', "Producto agregado");
				//redirect('backend/Inicio/', 'refresh');

		}*/
	}

	/// para los casos de servicios express
	public function venta_rapida(){
		$parametros = json_decode($_POST['parametros']);

		$id_servicio = $parametros->idServicio;
		$pago = $parametros->pago;
		$id_sucursal = $parametros->idSucursal;
		$id_vendedor = $parametros->idVendedor;

		if($id_servicio == 'otro'){
			// agregamos la info del catalogo_servicio_rapido
			$datos_servicio = array(
				'nombre' => $parametros->nuevoServicio,
				'fecha_registro' => time()
			);
			$this->add_model->agregar($datos_servicio, 'catalogo_servicio_rapido');
			$id_servicio = $this->db->insert_id();
		}

		// agregamos la info del servicio rapido
		$data_info_servicio_rapido = array(
			'fk_id_catalogo_servicio_rapido' => $id_servicio,
			'monto' => $pago,
			'id_usuario' => $id_vendedor,
			'fk_id_sucursal' => $id_sucursal,
			'fecha_registro' => time()
 		);
		$this->add_model->agregar($data_info_servicio_rapido, 'servicio_rapido');
	}

	public function pago_servicios(){
		$id_sucursal = $this->session->userdata('id_sucursal');

		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$data['row_sucursales'] = $this->consultar_model->sucursales();
		$data['row_catalogo_servicio'] = $this->consultar_model->catalogo_servicio();
		$data['row_servicios_sucursal'] = $this->consultar_model->servicios_sucursal($id_sucursal);
		$data['num_servicios'] = count($data['row_servicios_sucursal']);


		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_SERVICIOS/dashboard_servicios', $data);
		$this->load->view('backend/template/footer');	
	}

	public function agregar_servicio(){
		$dia_pago = $this->input->post('dia_pago');
		$periodo_pago = $this->input->post('periodo_pago');
		$id_sucursal = $this->input->post('id_sucursal');
		$id_catalogo_servicio = 0;

		if($this->input->post('id_servicio') == 'nuevo_servicio'){
			$data_servicio = array(
				'nombre' => $this->input->post('nombre_servicio'),
				'descripcion' => $this->input->post('descripcion_servicio'),
				'fecha_registro' => time()
			);

			$this->add_model->agregar($data_servicio, 'catalogo_servicio');

			$id_catalogo_servicio = $this->db->insert_id();
		}else{
			$id_catalogo_servicio = $this->input->post('id_servicio');
		}

		// agregar recordatorio_pago
		if(!empty($dia_pago) && !empty($periodo_pago)){
			$data_recordatorio = array(
				'dia' => $dia_pago,
				'periodo' => $periodo_pago,
				'fk_id_sucursal' => $id_sucursal,
				'fk_id_catalogo_servicio' => $id_catalogo_servicio,
				'fecha_registro' => time()
			);
		}
		$this->add_model->agregar($data_recordatorio, 'recordatorio_pago');

		redirect('backend/MOD_SERVICIOS/Servicios/pago_servicios', 'refresh');
	}

	public function realizar_pago(){
		$fk_id_catalogo_servicio = $this->input->post('fk_id_catalogo_servicio');
		$fk_id_sucursal = $this->input->post('fk_id_sucursal');
		$monto = $this->input->post('monto_pagado');
		$comprobante_pago = '';
		$fecha_registro = $this->input->post('fecha_registro');


		/* cargar comprobante de pago */
			$ruta_de_carga = 'assets/img/comprobante_pago/';
			$nombreArchivo = strtolower('comprobante_pago'.$fecha_registro.'_'.$fk_id_catalogo_servicio);

		   	$img_comprobante = 'comprobante_pago';
		    $config['upload_path'] = $ruta_de_carga;
		    $config['file_name'] = $nombreArchivo;
		    $config['allowed_types'] = "*";
		    $config['max_size'] = 0;
		    $config['remove_spaces'] = true;

		    $this->load->library('upload', $config);

		    if (!$this->upload->do_upload($img_comprobante)) {
		        //*** ocurrio un error
		        /*$data['uploadError'] = $this->upload->display_errors();
		        echo $this->upload->display_errors();
		        return;*/
		    }else{
		    	$nombre_archivo = $this->upload->data('file_name');
		    	$ruta_definida = $ruta_de_carga.$nombre_archivo;

		    	$comprobante_pago = $ruta_definida;
		    }


		$data_pago = array(
			'fk_id_catalogo_servicio' => $fk_id_catalogo_servicio,
			'fk_id_sucursal' => $fk_id_sucursal,
			'monto' => $monto,
			'comprobante_pago' => $comprobante_pago,
			'fecha_registro' => $fecha_registro
		);
		$this->add_model->agregar($data_pago, 'pago_servicio');

		$this->session->set_flashdata('success', "Información registrada");
		redirect('backend/MOD_SERVICIOS/Servicios/pago_servicios', 'refresh');
	}

	public function historial_pagos($id_sucursal, $id_servicio){
		$data['row_historial_pagos'] = $this->consultar_model->historial_pagos($id_sucursal, $id_servicio);

		$vista = $this->load->view('backend/MOD_SERVICIOS/tabla_historial_pagos', $data, true);

		echo $vista;

	}
}