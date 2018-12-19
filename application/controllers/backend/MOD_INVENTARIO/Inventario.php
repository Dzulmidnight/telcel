<?php
class Inventario extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('add_model');
		$this->load->model('count_model');
		$this->load->model('consultar_model');
		$this->load->model('update_model');
	}


	public function index()
	{
		$data['row_sucursales'] = $this->consultar_model->sucursales();
		$data['row_productos'] = $this->consultar_model->productos();
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
	
		// total de inventario
		$inventario = 0;
		$precio_interno = 0;
		foreach ($data['row_productos'] as $producto) {
			$inventario += $producto->piezas;
			$precio_interno += $producto->precio_interno;
		}

		$data['total_inventario'] = $inventario;
		$data['total_precio_interno'] = $precio_interno;

		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_INVENTARIO/dashboard_inventario', $data);
		$this->load->view('backend/template/footer');	
	}

	/*public function agregar(){
				$array_color = $this->input->post('array_color');
		$array_piezas_color = $this->input->post('array_piezas_color');


		if(is_array($array_color)){
			foreach ($array_color as $key => $color) {
				echo '<br>El color es: '.$color;
				echo '<br> La llave es: '.$key;
				echo '<br> las piezas: '.$array_piezas_color[$key];
			}
		}

	}*/

	public function agregar()
	{
		$fecha_registro = time();
		$id_producto = 0;

		if($this->input->post('nuevo_sub_accesorio')){
			$nombre_accesorio = $this->input->post();

			$data = array(
				'nombre' => $this->input->post('nuevo_sub_accesorio'),
				'fecha_registro' => $fecha_registro
			);

			$this->add_model->agregar($data, 'sub_categoria_producto');

			$fk_id_sub_categoria_producto = $this->db->insert_id();
		}else{
			$fk_id_sub_categoria_producto = $this->input->post('fk_id_sub_categoria_producto');
		}

		// AGREGAR PRODUCTO
			$data = array(
				'fk_id_categoria_producto' => $this->input->post('fk_id_categoria_producto'),
				'fk_id_sub_categoria_producto' => $fk_id_sub_categoria_producto,
				'marca' => $this->input->post('marca'),
				'piezas' => $this->input->post('piezas'),
				'nombre' => $this->input->post('nombre'),
				'modelo' => $this->input->post('modelo'),
				'capacidad' => $this->input->post('capacidad'),
				'precio_interno' => $this->input->post('precio_interno'),
				'precio_publico' => $this->input->post('precio_publico'),
				'fecha_registro' => $fecha_registro
			);

			if($this->add_model->agregar($data, 'producto')){
				$id_producto = $this->db->insert_id();
				$codigo_barras = time().str_pad($id_producto, 3, "0", STR_PAD_LEFT);
				$data = array(
					'codigo_barras' => $codigo_barras
				);
				$this->update_model->update('producto', 'id_producto', $id_producto, $data);
			}
			/* cargar img del producto */
				$ruta_de_carga = 'assets/img/productos/';
				$nombreArchivo = strtolower('img_producto'.$fecha_registro.'_'.$id_producto);

			   	$img_producto = 'img_producto';
			    $config['upload_path'] = $ruta_de_carga;
			    $config['file_name'] = $nombreArchivo;
			    $config['allowed_types'] = "*";
			    $config['max_size'] = 0;
			    $config['remove_spaces'] = true;

			    $this->load->library('upload', $config);

			    if (!$this->upload->do_upload($img_producto)) {
			        //*** ocurrio un error
			        /*$data['uploadError'] = $this->upload->display_errors();
			        echo $this->upload->display_errors();
			        return;*/
			    }else{
			    	$nombre_archivo = $this->upload->data('file_name');
			    	$ruta_definida = $ruta_de_carga.$nombre_archivo;

			    	$array_img = array(
			    		'imagen' => $ruta_definida
			    	);
			    	$this->update_model->update('producto', 'id_producto', $id_producto, $array_img);
			    }
		    /* END cargar img del producto */

			// color_producto
				$array_color = $this->input->post('array_color');
				$array_piezas_color = $this->input->post('array_piezas_color');
				if(is_array($array_color)){
					foreach ($array_color as $key => $color) {
						$datos_colores = array(
							'fk_id_producto' => $id_producto,
							'color' => $color,
							'piezas' => $array_piezas_color[$key]
						);

						$this->add_model->agregar($datos_colores, 'color_producto');
					}
				}
				
			// END color_producto

		// END PRODUCTO

		// AGREGAR PRODUCTO_ENTRADA
			$array_producto_entrada = array(
				'piezas' => $this->input->post('piezas'),
				'fk_id_producto' => $id_producto,
				'precio_unitario' => $this->input->post('precio_interno'),
				'fecha_registro' => $fecha_registro
			);
			$this->add_model->agregar($array_producto_entrada , 'producto_entrada');

			$this->session->set_flashdata('success', "Producto agregado");
		
		// END AGREGAR PRODUCTO_ENTRADA

		// AGREGAR HISTORIAL_INVENTARIO
			$array_historial = array(
				'fk_id_producto' => $id_producto,
				'producto_entrada' => $this->input->post('piezas')
 			);
 			$this->add_model->agregar($array_historial, 'historial_inventario');
		// END AGREGAR HISTORIAL_INVENTARIO

 		// AGREGAR SUCURSAL_PRODUCTO
 			$array_suc_producto = array(
 				'fk_id_sucursal' => $this->input->post('fk_id_sucursal'),
 				'fk_id_producto' => $id_producto,
 				'piezas' => $this->input->post('piezas'),
 				'fecha_registro' => $fecha_registro
 			);
 			$this->add_model->agregar($array_suc_producto, 'sucursal_producto');
 		// END SUCURSAL_PRODUCTO


		redirect('backend/MOD_INVENTARIO/Inventario/listado', 'refresh');
	}

	public function consultar()
	{

		$codigo = json_decode($_POST['codigo']);

		//echo $codigo;
		if($this->consultar_model->detalle_producto($codigo)){
			$data['info_producto'] = $this->consultar_model->detalle_producto($codigo);

			//$vista = $this->load->view('backend/detalle_producto', $data, true);
			$respuesta_json = json_encode($this->consultar_model->detalle_producto($codigo));
			echo $respuesta_json;

		}else{
			echo 'Articulo no encontrado';
		}
	}

	public function listado()
	{
		$data['row_productos'] = $this->consultar_model->productos();
		$data['row_sucursales'] = $this->consultar_model->sucursales();
		$data['row_proveedores'] = $this->consultar_model->listadoProveedores();
		$data['row_categoria_producto'] = $this->consultar_model->categoriaProductos();
		$data['row_sub_categoria_producto'] = $this->consultar_model->subCategoriaProducto();
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);

		foreach ($data['row_productos'] as $producto) {

			$data['row_sucursal_piezas'][$producto->id_producto] = $this->consultar_model->sucursal_producto($producto->id_producto);
		}

		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_INVENTARIO/listado_inventario', $data);
		$this->load->view('backend/template/footer');
	}
}