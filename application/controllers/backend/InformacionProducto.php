<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InformacionProducto extends CI_Controller{

	public function index()
	{
		$this->load->model('consultar_model');

		$objeto = json_decode($_POST['codigo']);
		$data['row_info_producto'] = $this->consultar_model->detalle_producto('1543689119');
	

		//echo $this->consultar_model->detalle_producto('1543689119');
		//echo $this->consultar_model->detalle_producto();
		$vista = $this->load->view('backend/detalle_producto', $data, true);
		echo $vista;


	}
}