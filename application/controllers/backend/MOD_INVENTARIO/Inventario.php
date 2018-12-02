<?php
class Inventario extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('add_model');
		$this->load->model('count_model');
		$this->load->model('consultar_model');
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

	public function agregar()
	{
		$fecha_registro = time();

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

		$data = array(
			'fk_id_categoria_producto' => $this->input->post('fk_id_categoria_producto'),
			'fk_id_sub_categoria_producto' => $fk_id_sub_categoria_producto,
			'marca' => $this->input->post('marca'),
			'piezas' => $this->input->post('piezas'),
			'nombre' => $this->input->post('nombre'),
			'modelo' => $this->input->post('modelo'),
			'color' => $this->input->post('color'),
			'capacidad' => $this->input->post('capacidad'),
			'precio_interno' => $this->input->post('precio_interno'),
			'precio_publico' => $this->input->post('precio_publico'),
			'codigo_barras' => $fecha_registro,
			'fecha_registro' => $fecha_registro
		);


		if($this->add_model->agregar($data, 'producto')){
			$this->session->set_flashdata('success', "Producto agregado");
		}
		redirect('backend/MOD_INVENTARIO/Inventario/listado', 'refresh');
	}

	public function listado()
	{
		$data['row_productos'] = $this->consultar_model->productos();
		$data['row_sucursales'] = $this->consultar_model->sucursales();		
		$data['row_proveedores'] = $this->consultar_model->listadoProveedores();
		$data['row_categoria_producto'] = $this->consultar_model->categoriaProductos();
		$data['row_sub_categoria_producto'] = $this->consultar_model->subCategoriaProducto();
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);

		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_INVENTARIO/listado_inventario', $data);
		$this->load->view('backend/template/footer');
	}
}