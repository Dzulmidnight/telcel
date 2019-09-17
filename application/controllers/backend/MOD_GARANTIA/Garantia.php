<?php
class Garantia extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('garantia_model');
		$this->load->model('update_model');
	}

	public function index()
	{
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_GARANTIA/dashboard_garantia', $data);
		$this->load->view('backend/template/footer');	
	}

	public function listado()
	{
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_GARANTIA/listado_inventario', $data);
		$this->load->view('backend/template/footer');
	}

	public function devoluciones()
	{
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_GARANTIA/devoluciones', $data);
		$this->load->view('backend/template/footer');
	}
	public function consultarTicket()
	{
		$codigo = $_POST['parametros'];
		$data['detalle_ticket'] = $this->garantia_model->consultar($codigo);		
		$total = count($data['detalle_ticket']);

		if($total){
			$id_ticket = $data['detalle_ticket']->id_ticket;

			$data['row_productos'] = $this->garantia_model->productos($id_ticket);
			$vista = $this->load->view('backend/MOD_GARANTIA/tabla_informacion', $data, true);
			echo $vista;
		}else{
			echo FALSE;
		}
	}
	public function aplicarDevolucion()
	{
		$this->load->model('eliminar_model');
		$parametros = json_decode($_POST["parametros"]);
		if(isset($_POST["piezas"]) && $_POST['piezas'] > 0){
			$devolver_piezas = $_POST['piezas'];
		}else{
			$devolver_piezas = $parametros->numPiezas;
		}
		$id_ticket = $parametros->idTicket;
		$ticket = $parametros->ticket;
		$id_producto = $parametros->idProducto;

		$detalle_ticket = $this->garantia_model->ticket($id_ticket);
		$fk_id_sucursal = $detalle_ticket->fk_id_sucursal;

		// consultamos la tb_historial_inventario
		$historial_inventario = $this->garantia_model->inventario($id_producto);
		$id_historial_inventario = $historial_inventario->id_historial_inventario;

		$salida_inventario = $historial_inventario->producto_salida;
			$nueva_salida = ($salida_inventario - $devolver_piezas);

			// actualizamos tb_historial_inventario
			$datos = array(
				'producto_salida' => $nueva_salida
			);
			$where = "id_historial_inventario = ".$id_historial_inventario;
			$this->update_model->updateCompuesto('historial_inventario', $where, $datos);
			// fin actualizar tb_historial_inventario

		/// consultamos la tb_producto
		$producto = $this->garantia_model->producto($id_producto);
			$id_tb_producto = $producto->id_producto;
			$piezas_tb_producto = $producto->piezas;
				$nuevo_num_piezas = ($piezas_tb_producto + $devolver_piezas);
			// actualizar tb_producto
			$datos_producto = array(
				'piezas' => $nuevo_num_piezas,
				'fecha_actualizacion' => time()
			);
			$where = "id_producto = ".$id_tb_producto;
			$this->update_model->updateCompuesto('producto', $where, $datos_producto);
			// fin actualizar tb_producto

		/// consultamos la tb_producto_venta
		$producto_venta = $this->garantia_model->producto_venta($id_producto, $id_ticket);
			$id_producto_venta = $producto_venta->id_producto_venta;
			$piezas_venta = $producto_venta->piezas;
			$precio_venta = $producto_venta->precio_venta;

			if($piezas_venta == $devolver_piezas){ // se elimina la información
				$this->eliminar_model->eliminar('producto_venta', 'id_producto_venta', $id_producto_venta);
				// eliminar tb_ticket_producto_venta
				$this->eliminar_model->eliminar('ticket_producto_venta', 'fk_id_producto_venta', $id_producto_venta);

			}else{ // se actualiza la cantidad
				$nuevo_num_piezas_venta = ($piezas_venta - $devolver_piezas);
				// actualizar tb_producto_venta
				$datos_producto_venta = array(
					'piezas' => $nuevo_num_piezas_venta
				);
				$where = "id_producto_venta = ".$id_producto_venta;
				$this->update_model->updateCompuesto('producto_venta', $where, $datos_producto_venta);
				// fin actualizar tb_producto_venta
			}

		/// consultamos la tb_sucursal_producto
		$sucursal_producto = $this->garantia_model->sucursal_producto($id_producto, $fk_id_sucursal);
			$id_sucursal_producto = $sucursal_producto->id_sucursal_producto;
			$piezas_sucursal = $sucursal_producto->piezas;
			$nuevo_num_piezas = ($piezas_sucursal + $devolver_piezas);

			// actualizar la tb_sucursal_producto
			$datos_producto_sucusal = array(
				'piezas' => $nuevo_num_piezas,
				'fecha_actualizacion' => time()
			);
			$where = "id_sucursal_producto = ".$id_sucursal_producto;
			$this->update_model->updateCompuesto('sucursal_producto', $where, $datos_producto_sucusal);

		/// consultamos la tb_ticket
			$piezas_ticket = $detalle_ticket->piezas;
			$precio_total_ticket = $detalle_ticket->total;
			$precio_total_devuelto = ($precio_venta * $devolver_piezas);
			$nuevo_total_ticket = ($precio_total_ticket - $precio_total_devuelto);
			$fecha = time();
			$nuevo_codigo_ticket = str_pad($id_ticket, 3, "0", STR_PAD_LEFT).'-'.$fecha;

			if($piezas_ticket == $devolver_piezas){
				$this->eliminar_model->eliminar('ticket', 'id_ticket', $id_ticket);
				$id_ticket = "eliminado";
			}else{ // actualizamos el codigo codigo_ticket, actualizando la fecha de registro
				$nuevo_num_piezas = ($piezas_ticket - $devolver_piezas);
				$datos_ticket = array(
					'piezas' => $nuevo_num_piezas,
					'total' => $nuevo_total_ticket,
					'codigo_ticket' => $nuevo_codigo_ticket,
					'fecha_registro' => $fecha
				);
				$where = "id_ticket = ".$id_ticket;
				$this->update_model->updateCompuesto('ticket', $where, $datos_ticket);
			}

		echo $id_ticket;

	}

	public function aplicarDevolucion2()
	{
		$this->load->model('eliminar_model');

		$parametros = json_decode($_POST['parametros']);
		$id_ticket = $parametros->idTicket;
		$ticket = $parametros->ticket;
		$id_producto = $parametros->idProducto;
		$devolver_piezas = $parametros->numPiezas;

		// consultamos la tb_historial_inventario
		$historial_inventario = $this->garantia_model->inventario($id_producto);
		$id_historial_inventario = $historial_inventario->id_historial_inventario;

		$entrada_inventario = $historial_inventario->producto_entrada;
			$nueva_entrada = ($entrada_inventario + $devolver_piezas);
		$salida_inventario = $historial_inventario->producto_salida;
			$nueva_salida = ($salida_inventario - $devolver_piezas);

			// actualizamos tb_historial_inventario
			$datos = array(
				'producto_entrada' => $nueva_entrada,
				'producto_salida' => $nueva_salida
			);
			$where = "id_historial_inventario = ".$id_historial_inventario;
			$this->update_model->updateCompuesto('historial_inventario', $where, $datos);
			// fin actualizar tb_historial_inventario


		/// consultamos la tb_producto
		$producto = $this->garantia_model->producto($id_producto);
			$id_tb_producto = $producto->id_producto;
			$piezas_tb_producto = $producto->piezas;
				$nuevo_num_piezas = ($piezas_tb_producto + $devolver_piezas);
			// actualizar tb_producto
			$datos_producto = array(
				'piezas' => $nuevo_num_piezas,
				'fecha_actualizacion' => time()
			);
			$where = "id_producto = ".$id_tb_producto;
			$this->update_model->updateCompuesto('producto', $where, $datos_producto);
			// fin actualizar tb_producto

		/// consultamos la tb_producto_venta
		$producto_venta = $this->garantia_model->producto_venta($id_producto, $id_ticket);
			$id_producto_venta = $producto_venta->id_producto_venta;
			$piezas_venta = $producto_venta->piezas;

			if($piezas_venta == $devolver_piezas){ // se elimina la información
				$this->eliminar_model->eliminar('producto_venta', 'id_producto_venta', $id_producto_venta);
				// eliminar tb_ticket_producto_venta
				$this->eliminar_model->eliminar('ticket_producto_venta', 'fk_id_producto_venta', $id_producto_venta);

			}else{ // se actualiza la cantidad
				$nuevo_num_piezas_venta = ($piezas_venta + $devolver_piezas);
				// actualizar tb_producto_venta
				$datos_producto_venta = array(
					'piezas' => $piezas_producto
				);
				$where = "id_producto_venta = ".$id_producto_venta;
				$this->update_model->updateCompuesto('producto_venta', $where, $datos_producto_venta);
				// fin actualizar tb_producto_venta
			}

		/// consultamos la tb_sucursal_producto
		$sucursal_producto = $this->garantia_model->sucursal_producto($id_producto);
			$id_sucursal_producto = $sucursal_producto->id_sucursal_producto;
			$piezas_sucursal = $sucursal_producto->piezas;
			$nuevo_num_piezas = ($piezas_sucursal + $devolver_piezas);

			// actualizar la tb_sucursal_producto
			$datos_producto_sucusal = array(
				'piezas' => $nuevo_num_piezas,
				'fecha_actualizacion' => time()
			);
			$where = "id_sucursal_producto = ".$id_sucursal_producto;
			$this->update_model->updateCompuesto('sucursal_producto', $where, $datos_producto_sucusal);


		/// consultamos la tb_ticket
		$ticket = $this->garantia_model->ticket($id_ticket);
			$piezas_ticket = $ticket->piezas;

			if($piezas_ticket == $devolver_piezas){
				$this->eliminar_model->eliminar('ticket', 'id_ticket', $id_ticket);
			}else{

			}

		echo 1;
	}
}












