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
		$codigo_barras = '';

		$tipo_bloqueo = $this->input->post('tipo_bloqueo');
		$patron_bloqueo = '';
		$codigo_bloqueo = '';

		if(isset($tipo_bloqueo) && $tipo_bloqueo = 'patron'){
			$patron_bloqueo = $this->input->post('patron_bloqueo');
		}else if(isset($tipo_bloqueo) && $tipo_bloqueo == 'codigo'){
			$codigo_bloqueo = $this->input->post('codigo_bloqueo');
		}

		$fecha_entrega = strtotime($this->input->post('fecha_entrega'));


		if(!empty($this->input->post('nombre_cliente'))){
			$data_cliente = array(
				'nombre' => $this->input->post('nombre_cliente'),
				'ap_paterno' => $this->input->post('ap_paterno'),
				'ap_materno' => $this->input->post('ap_materno'),
				'telefono' => $this->input->post('telefono_contacto'),
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

		//// generamos el PDF

			$this->load->helper('pdf_helper');


			header("Content-Type: application/pdf; charset=UTF-8");
		    /*
		        ---- ---- ---- ----
		        your code here
		        ---- ---- ---- ----
		    */
			tcpdf();
			// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, [60, 297], true, 'UTF-8', false);

			// remove default header/footer
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);

			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

			// set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


			// ---------------------------------------------------------

			// set font
			$pdf->SetFont('times', 'BI', 20);

			//$pdf->setFontSubsetting(false);

			// añadir pagina
			$pdf->AddPage();
			//$params = $pdf->serializeTCPDFtagParameters(array('0123456789', 'C128C', '', '', '', 18, 0.4, '', 'N'));


			$params = $pdf->serializeTCPDFtagParameters(array($codigo_barras, 'C128', '', '', 40, 20, 0.4, array('position'=>'S', 'border'=>true, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));

			//$html = '<tcpdf method="write1DBarcode" params="'.$params.'" />';


			$html = '';
			$html .= '<table>';
				////// CODIGO PARA EL SERVICIO TECNICO
				$html .= '<tr>';
					$html .= '<td style="font-family:helvetica; padding:0px;margin:0px;font-size:8px;text-align:center;">Servicio Tecnico</td>';
				$html .= '</tr>';
				$html .= '<tr >';
					$html .= '<td style="padding:0px;margin:0px;"><tcpdf method="write1DBarcode" params="'.$params.'" /></td>';
				$html .= '</tr>';
				$html .= '<tr>';
					$html .= '<td style="font-family:helvetica; padding:0px;margin:0px;font-size:8px;text-align:center;">Firma cliente</td>';
				$html .= '</tr>';
				$html .= '<tr>';
					$html .= '<td style="margin-top:10px;border-bottom:1px solid #000;"></td>';
				$html .= '</tr>';

				////// CODIGO PARA EL CLIENTE
				$html .= '<tr>';
					$html .= '<td style="font-family:helvetica; padding:0px;padding-top:20px; margin-top:10px;font-size:8px;text-align:center;">Copia cliente</td>';
				$html .= '</tr>';
				$html .= '<tr >';
					$html .= '<td style="padding:0px;margin:0px;"><tcpdf method="write1DBarcode" params="'.$params.'" /></td>';
				$html .= '</tr>';

			$html .= '</table>';

			// output the HTML content
			$pdf->writeHTML($html, true, 0, true, 0);
			// reset pointer to the last page
			$pdf->lastPage();

			// ---------------------------------------------------------

			//Close and output PDF document
			$pdf->Output('servicio_tecnico_'.$codigo_barras.'.pdf', 'I');
		//redirect('backend/MOD_SERV_TECNICO/Serv_tecnico', 'refresh');
	}

	public function ficha_servicio($id)
	{
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$data['row_servicios'] = $this->consultar_model->servicios_tecnicos($id);
		$data['historial_estatus'] = $this->consultar_model->consulta($id, 'fk_id_servicio_tecnico', 'estatus_servicio', 'DESC');
		$data['row_cotizacion'] = $this->consultar_model->consultaSimple($id, 'id_servicio_tecnico', 'cotizacion_servicio');
		
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_SERV_TECNICO/ficha_servicio', $data);
		$this->load->view('backend/template/footer');
	}

	public function actualizar_estatus($id = false){
		if($id){
			$id_servicio_tecnico = $id;
		}else{
			$id_servicio_tecnico = $this->input->post('id_servicio_tecnico');
		}
		
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

	public function finalizar_servicio(){
		$id_servicio_tecnico = $this->input->post('id_servicio_tecnico');
		$resultado_reparacion = $this->input->post('resultado_reparacion');
		$descripcion_resultado = $this->input->post('accion_realizada');
		$comentarios_tecnico = $this->input->post('comentarios_tecnico');

		$data_estatus = array(
			'estatus' => 'FINALIZADO',
			'accion_realizada' => 'Finaliza servicio',
			'fk_id_user' => $this->session->userdata('id_usuario'),
			'fk_id_servicio_tecnico' => $id_servicio_tecnico,
			'fecha_registro' => $this->input->post('fecha_registro')
		);
		$this->add_model->agregar($data_estatus, 'estatus_servicio');

		$data_actualizar = array(
			'resultado' => $resultado_reparacion,
			'descripcion_resultado' => $descripcion_resultado,
			'comentarios_tecnico' => $comentarios_tecnico,
			'fecha_actualizacion' => $this->input->post('fecha_registro'),
			'estatus' => $this->input->post('estatus_servicio')
		);
		$this->update_model->update('servicio_tecnico', 'id_servicio_tecnico', $id_servicio_tecnico, $data_actualizar);

		redirect('backend/MOD_SERV_TECNICO/Serv_tecnico/ficha_servicio/'.$id_servicio_tecnico.'', 'refresh');


	}

	public function actualizar_estatus_cotizacion(){
		$estatus = $this->input->post('estatus_cotizacion_servicio');
		$id_servicio_tecnico = $this->input->post('id_servicio_tecnico');
		
		$data_estatus = array(
			'estatus' => $this->input->post('estatus_cotizacion_servicio'),
			'fecha_aceptacion' => time()
		);
		$this->update_model->update('cotizacion_servicio', 'id_servicio_tecnico', $id_servicio_tecnico, $data_estatus);

		/// actualizamos el estatus del servicio
		if($estatus == 'EN PROCESO'){
			$data_estatus = array(
				'estatus' => 'EN PROCESO',
				'accion_realizada' => 'Cotización aceptada',
				'fk_id_user' => $this->session->userdata('id_usuario'),
				'fk_id_servicio_tecnico' => $id_servicio_tecnico,
				'fecha_registro' => time()
			);
			$this->add_model->agregar($data_estatus, 'estatus_servicio');

			$data_actualizar = array(
				'fecha_actualizacion' => time(),
				'estatus' => 'EN PROCESO'
			);
			$this->update_model->update('servicio_tecnico', 'id_servicio_tecnico', $id_servicio_tecnico, $data_actualizar);

		}else{
			// actualizamos tb_ESTATUS_SERVICIO
			$data_estatus = array(
				'estatus' => 'RECHAZADO',
				'accion_realizada' => 'Cotización rechazada',
				'fk_id_user' => $this->session->userdata('id_usuario'),
				'fk_id_servicio_tecnico' => $id_servicio_tecnico,
				'fecha_registro' => time()
			);
			$this->add_model->agregar($data_estatus, 'estatus_servicio');

			// actualizamos tb_SERVICIO_TECNICO
			$data_actualizar = array(
				'fecha_actualizacion' => time(),
				'estatus' => 'RECHAZADO'
			);
			$this->update_model->update('servicio_tecnico', 'id_servicio_tecnico', $id_servicio_tecnico, $data_actualizar);
			
		}

		redirect('backend/Inicio', 'refresh');

	}

	// INICIA GENERAR COTIZACION_SERVICIO
		public function cotizacion_servicio(){
			$suma_pieza = 0;
			$id_pieza_repuesto = $this->input->post('id_pieza_repuesto');
			$precio_pieza_repuesto = $this->input->post('precio_pieza_repuesto');
			$nombre_pieza_repuesto = $this->input->post('nombre_pieza_repuesto');
			$modelo_pieza_repuesto = $this->input->post('modelo_pieza_repuesto');
			$color_pieza_repuesto = $this->input->post('color_pieza_repuesto');
			$id_servicio_tecnico = $this->input->post('id_servicio_tecnico');
			$costo_servicio = $this->input->post('costo_servicio');
			$fecha_entrega = strtotime($this->input->post('fecha_entrega'));
			$estatus_cotizacion = 'ENVIADO';

			$data_cotizacion = array(
				'id_servicio_tecnico' => $id_servicio_tecnico,
				'descripcion' => $this->input->post('descripcion_servicio'),
				'id_usuario' => $this->session->userdata('id_usuario'),
				'estatus' => $estatus_cotizacion,
				'fecha_registro' => time()
			);
			$this->add_model->agregar($data_cotizacion, 'cotizacion_servicio');

			$id_cotizacion = $this->db->insert_id();

			/// FRM CONSULTA DE PIEZA
			/*$consultar_nombre_pieza = $this->input->post('consultar_nombre_pieza');
			if($consultar_nombre_pieza != ''){
				$consultar_nombre_pieza = $this->input->post('consultar_nombre_pieza');
				$consultar_modelo_pieza = $this->input->post('consultar_modelo_pieza');
				$consultar_color_pieza = $this->input->post('consultar_color_pieza');
				$estatus = 'PETICION';

				// INSERTAMOS LA PIEZA DENTRO DE EL CATALOGO_PIEZAS_REPARACION
				$data_agregar_catalogo = array(
					'nombre_pieza' => $consultar_nombre_pieza,
					'modelo' => $consultar_modelo_pieza,
					'color' => $consultar_color_pieza,
					'cantidad' => 1,
					'estatus' => $estatus,
					'fecha_registro' => time()
				);

				$this->add_model->agregar($data_agregar_catalogo, 'catalogo_piezas_reparacion');
			}*/

			/// PIEZAS UTILIZADAS EN EL SERVICIO
			if(isset($id_pieza_repuesto)){
				foreach ($this->input->post('precio_pieza_repuesto') as $key => $value) {

					if($value == 'PENDIENTE'){
						$estatus = 'PETICION';
						// INSERTAMOS LA PIEZA DENTRO DE EL CATALOGO_PIEZAS_REPARACION
						$data_agregar_catalogo = array(
							'nombre_pieza' => $nombre_pieza_repuesto[$key],
							'modelo' => $modelo_pieza_repuesto[$key],
							'color' => $color_pieza_repuesto[$key],
							'cantidad' => 1,
							'estatus' => $estatus,
							'fecha_registro' => time()
						);

						$this->add_model->agregar($data_agregar_catalogo, 'catalogo_piezas_reparacion');

						$id_pieza = $this->db->insert_id();

						$estatus_cotizacion = 'PENDIENTE';
					}else{
						$suma_pieza += $value;
						$id_pieza = $id_pieza_repuesto[$key];
					}

					$data_pieza = array(
						'id_pieza_repuesto' => $id_pieza,
						'id_cotizacion_servicio' => $id_cotizacion,
						'fecha_registro' => time()
					);
					$this->add_model->agregar($data_pieza, 'piezas_cotizacion_servicio');

					/*echo '<br>id: '.$id_pieza_repuesto[$key];
					echo '<br> Precio: '.$value;*/
				}
			}
			$suma_pieza = $suma_pieza + $costo_servicio;

			$data_actualizar_cotizacion = array(
				'costo' => $suma_pieza,
				'estatus' => $estatus_cotizacion
			);
			$this->update_model->update('cotizacion_servicio', 'id_cotizacion_servicio', $id_cotizacion, $data_actualizar_cotizacion);


			if(isset($id_pieza_repuesto)){
				foreach ($this->input->post('id_pieza_repuesto') as $key => $pieza) {
					if($precio_pieza_repuesto[$key] != 'PENDIENTE'){
						$id = $id_pieza_repuesto[$key];
						$refacciones = $this->consultar_model->consultaSimple($id, 'id_catalogo_piezas_reparacion', 'catalogo_piezas_reparacion');

						$estatus = $refacciones->estatus;
						$cantidad = $refacciones->cantidad;

						if($estatus == 'INVENTARIO'){
							$total = $cantidad - 1;
							//echo 'EL TOTAL: '.$total;
							$data_update = array(
								'cantidad' => $total,
							);
							$this->update_model->update('catalogo_piezas_reparacion', 'id_catalogo_piezas_reparacion', $id, $data_update);
						}
					}
				}

				$id_pieza_repuesto = $this->input->post('id_pieza_repuesto');
			}

			/*echo '<br>costo_servicio: '.$this->input->post('costo_servicio');
			echo '<br>costo_pieza: '.$suma_pieza;
			echo '<br>fecha_entrega: '.$this->input->post('fecha_entrega');*/


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
				'fecha_entrega' => $fecha_entrega,
				'fecha_actualizacion' => $this->input->post('fecha_registro'),
				'estatus' => $this->input->post('estatus_servicio')
			);
			$this->update_model->update('servicio_tecnico', 'id_servicio_tecnico', $id_servicio_tecnico, $data_actualizar);

			$this->session->set_flashdata('success', "Cotización generada");

			redirect('backend/MOD_SERV_TECNICO/Serv_tecnico/ficha_servicio/'.$id_servicio_tecnico.'', 'refresh');
		}
	/// END COTIZACIÓN_SERVICIO

	/// INICIA ENTREGAR_EQUIPO
		public function entregar_equipo(){
			
			$id = $this->input->post('id_frm_servicio_tecnico');
			$id_servicio_tecnico = $this->input->post('id_frm_servicio_tecnico');

			$data['row_servicios'] = $this->consultar_model->servicios_tecnicos($id);
			$data['historial_estatus'] = $this->consultar_model->consulta($id, 'fk_id_servicio_tecnico', 'estatus_servicio', 'DESC');
			$data['row_cotizacion'] = $this->consultar_model->consultaSimple($id, 'id_servicio_tecnico', 'cotizacion_servicio');

			$data_estatus = array(
				'estatus' => 'ENTREGADO',
				'accion_realizada' => 'Equipo entregado al cliente',
				'fk_id_user' => $this->session->userdata('id_usuario'),
				'fk_id_servicio_tecnico' => $id,
				'fecha_registro' => $this->input->post('fecha_registro')
			);
			$this->add_model->agregar($data_estatus, 'estatus_servicio');

			$data_actualizar = array(
				'monto_pagado' => $this->input->post('monto_pagado'),
				'fecha_actualizacion' => $this->input->post('fecha_registro'),
				'estatus' => 'ENTREGADO'
			);
			$this->update_model->update('servicio_tecnico', 'id_servicio_tecnico', $id_servicio_tecnico, $data_actualizar);

			//$this->load->view('backend/pdf_ficha_tecnica', $data);
			//echo $id_servicio_tecnico;
			

			

			//// generamos el PDF  de servicio


			redirect('backend/Inicio', 'refresh');
			//redirect('backend/MOD_SERV_TECNICO/Serv_tecnico/', 'refresh');
		}
	/// END ENTREGAR_EQUIPO

	public function modal_detalle_cotizacion($id){
		$data['row_detalle_cotizacion'] = $this->consultar_model->servicios_tecnicos($id);

		$data['row_cotizacion'] = $this->consultar_model->consultaSimple($id, 'id_servicio_tecnico', 'cotizacion_servicio');
		
		$id_cotizacion =  $this->consultar_model->consultaSimple($id, 'id_servicio_tecnico', 'cotizacion_servicio');
		
		$data['row_piezas_cotizacion'] = $this->consultar_model->piezas_cotizacion_servicio($id_cotizacion->id_cotizacion_servicio);

		$vista = $this->load->view('backend/MOD_SERV_TECNICO/modal_detalle_cotizacion', $data, true);

		//echo 'el id es:'.$id_cotizacion->id_cotizacion_servicio;
		echo $vista;
	}

	public function modal_ficha_servicio_prueba($id){
		$data['row_detalle_ficha'] = $this->consultar_model->servicios_tecnicos($id);
		$vista = $this->load->view('backend/MOD_SERV_TECNICO/modal_detalle_ficha', $data, true);

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

	public function consultar_servicio_tecnico($codigo){
		$row_servicio_tecnico = $this->consultar_model->consultaSimple($codigo, 'codigo_barras', 'servicio_tecnico');

		if($row_servicio_tecnico){
			$id_servicio_tecnico = $row_servicio_tecnico->id_servicio_tecnico;
		}else{
			$id_servicio_tecnico = 0;
		}
		

		if($id_servicio_tecnico != 0){
			/*$row_estatus = $this->consultar_model->consulta($id_servicio_tecnico, 'fk_id_servicio_tecnico', 'estatus_servicio');
			$respuesta = array($id_servicio_tecnico => $row_estatus);*/

			$data['row_servicio_tecnico'] = $this->consultar_model->consultaSimple($codigo, 'codigo_barras', 'servicio_tecnico');
			$id_cliente = $data['row_servicio_tecnico']->fk_id_cliente;

			$data['row_cliente'] = $this->consultar_model->consultaSimple($id_cliente, 'id_cliente', 'clientes');
			$data['row_estatus'] = $this->consultar_model->consulta($id_servicio_tecnico, 'fk_id_servicio_tecnico', 'estatus_servicio', 'DESC');

			$vista = $this->load->view('backend/MOD_SERV_TECNICO/tabla_consulta_servicio', $data, true);

			echo $vista;
		}else{
			$respuesta = null;
			$vista = null;
		}
	}

	public function consulta_refaccion(){
		//$id = $_POST["id"];
		$objJson = json_decode($_POST["objJson"]);
		$id_consulta_pieza = $objJson->consulta;
		$id_cotizacion = $objJson->cotizacion;
		$id_servicio_tecnico = $objJson->servicioTecnico;
		$costo_cotizacion = $objJson->costoCotizacion;
		$precio_interno_refaccion = $objJson->precioInterno;
		$precio_publico_refaccion = $objJson->precioPublico;
		$tiempo_entrega = $objJson->tiempo;
		$costo = 0;

		$estatus = 'ENVIADO';

		// ACTUALIZAR CATALOGO_PIEZAS_REPARACION
		$data_actualizar = array(
			'precio' => $precio_publico_refaccion,
			'precio_interno' => $precio_interno_refaccion,
			'estatus' => $estatus,
			'tiempo_entrega' => $tiempo_entrega
		);

		// ACTUALIZAR CONSULTA_PIEZA
		/*$data_actualizar = array(
			'precio_interno' => $precio_interno_refaccion,
			'precio_publico' => $precio_publico_refaccion,
			'tiempo_entrega' => $tiempo_entrega,
			'estatus' => $estatus,
			'fecha_actualizacion' => time()
		);*/
		
		$this->update_model->update('catalogo_piezas_reparacion', 'id_catalogo_piezas_reparacion', $id_consulta_pieza, $data_actualizar);

		// actualizamos el costo de la cotización
		$costo = $costo_cotizacion + $precio_publico_refaccion;

		$data_update_cotizacion = array(
			'costo' => $costo
		);
		$this->update_model->update('cotizacion_servicio', 'id_cotizacion_servicio', $id_cotizacion, $data_update_cotizacion);

		// actualizamos el costo dentro del servicio tecnico
		$data_update_servicio = array(
			'costo_servicio' => $costo
		);
		$this->update_model->update('servicio_tecnico', 'id_servicio_tecnico', $id_servicio_tecnico, $data_update_servicio);

		// antes de actualizar la cotizción debemos de checar que no haya otras piezas con ese estatus
		$data['row_piezas'] = $this->consultar_model->piezas_cotizacion_servicio($id_cotizacion, 'PETICION');

		$total_peticiones = count($data['row_piezas']);
		if($total_peticiones <= 0){
			// ACTUALIZAR COTIZACION
			$data_act_cotizacion = array(
				'estatus' => $estatus
			);
			$this->update_model->update('cotizacion_servicio', 'id_cotizacion_servicio', $id_cotizacion, $data_act_cotizacion);
		}


		$data['row_consulta_refaccion2'] = $this->consultar_model->consulta_refaccion2();

		foreach ($data['row_consulta_refaccion2'] as $value) {
			$data['row_piezas_cotizacion'][$value->id_cotizacion_servicio] = $this->consultar_model->piezas_cotizacion_servicio($value->id_cotizacion_servicio, 'PETICION');
		}

		$vista = $this->load->view('backend/tabla_consulta_refaccion', $data, true);

		echo $vista;
	}

}