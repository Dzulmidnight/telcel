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

		header("Content-Type: application/json; charset=UTF-8");

		$objeto = json_decode($_POST["parametros"], false);


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

		foreach ($objeto as $key => $value) {
			// registramos la venta en tb -> producto_venta
				$data_producto_venta = array(
					'piezas' => $value->cantidad_carrito,
					'precio_venta' => $value->precio_carrito,
					'precio_real_venta' => $value->precio_real_carrito,
					'fk_id_sucursal' => $this->session->userdata('id_sucursal'),
					'fk_id_usuario' => $this->session->userdata('id_usuario'),
					'fecha_registro' => time()
				);
				if($this->add_model->agregar($data_producto_venta, 'producto_venta')){
					$insert_producto_venta = 1;
				}

			//// actualizamos las piezas de la tb -> producto
				$producto = $this->consultar_model->producto($value->id_producto_carrito);

				$piezas_restantes = ($producto->piezas) - ($value->cantidad_carrito);

				$data_piezas_producto = array(
					'piezas' => $piezas_restantes
				);
				
				if($this->update_model->update('producto', 'id_producto', $value->id_producto_carrito, $data_piezas_producto)){
					$insert_producto = 1;
				}

			// actualizamos las piezas de la TB -> historial_inventario
				$detalle_historial = $this->consultar_model->consulta('historial_inventario', 'fk_id_producto', $value->id_producto_carrito);

				$id_historial_inventario = $detalle_historial->id_historial_inventario;

				$suma_salidas = 0;
				//echo '<br> salidas anteriores: '.$suma_salidas;
				$suma_salidas = ($detalle_historial->producto_salida) + ($value->cantidad_carrito);			

				$data_historial_inventario = array(
					'producto_salida' => $suma_salidas,
					'fecha_actualizacion' => time()
				);

				if($this->update_model->update('historial_inventario', 'id_historial_inventario', $id_historial_inventario, $data_historial_inventario)){
					$insert_historial_inventario = 1;
				}

				if($insert_producto_venta == 1 && $insert_producto == 1 && $insert_historial_inventario == 1){
					echo 1;
				}else{
					echo 0;
				}


				//$this->session->set_flashdata('success', "Producto agregado");
				//redirect('backend/Inicio/', 'refresh');


		}
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
}