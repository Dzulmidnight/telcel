<?php
class Finanzas extends CI_Controller{
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
		$data['row_sucursales'] = $this->consultar_model->sucursales();
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$data['row_listado_ventas'] = $this->consultar_model->listado_ventas(false, false);

		$data['monto_ventas'] = 0;
		$data['num_productos'] = 0;

		foreach ($data['row_listado_ventas'] as $venta) {
			$data['monto_ventas'] += $venta->total;
			$data['num_productos'] += $venta->piezas;
		}

		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_FINANZAS/dashboard_finanzas', $data);
		$this->load->view('backend/template/footer');	
	}



	public function listado_ventas()
	{
		$data['row_listado_ventas'] = $this->consultar_model->listado_ventas();
		$data['row_sucursales'] = $this->consultar_model->sucursales();
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_FINANZAS/tabla_ventas', $data);
		$this->load->view('backend/template/footer');
	}

	public function tabla($seccion = false, $sucursal = false){
		if($seccion){
			$data['row_sucursales'] = $this->consultar_model->sucursales();

			switch ($seccion) {
				case 'productos':
					$data['row_listado_ventas'] = $this->consultar_model->listado_ventas();

					$vista = $this->load->view('backend/MOD_FINANZAS/tabla_productos', $data, true);
					break;
				case 'servicios':
					$data['row_listado_servicios'] = $this->consultar_model->listado_servicios();

					$vista = $this->load->view('backend/MOD_FINANZAS/tabla_servicios', $data, true);
					break;
				case 'reparaciones':
					$data['row_listado_reparaciones'] = $this->consultar_model->listado_reparaciones();
					$vista = $this->load->view('backend/MOD_FINANZAS/tabla_reparaciones', $data, true);
					break;
				
				default:
					$data['row_listado_ventas'] = $this->consultar_model->listado_ventas();
					$vista = $this->load->view('backend/MOD_FINANZAS/tabla_productos', $data, true);
					break;
			}
		}
		echo $vista;
	}

	public function tabla_ventas($sucursal = false){
		header("Content-type: application/json");

		$obj = json_decode($_POST['objeto'], false);
		$inicio = $obj[0];
		$fin = $obj[1];
		$sucursal = $obj[2];

		$data['row_listado_ventas'] = $this->consultar_model->pago_servicios($inicio, $fin, $sucursal);

		$vista = $this->load->view('backend/MOD_FINANZAS/tabla_ventas_ajax', $data, true);

		echo $vista;
	}
}