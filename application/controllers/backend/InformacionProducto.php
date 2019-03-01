<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InformacionProducto extends CI_Controller{

	public function index()
	{
		$this->load->model('consultar_model');

		$codigo = json_decode($_POST['codigo']);

		if($this->consultar_model->detalle_producto($codigo)){
			$data['info_producto'] = $this->consultar_model->detalle_producto($codigo);
			$vista = $this->load->view('backend/detalle_producto', $data, true);
			echo $vista;			
		}else{
			echo 'Articulo no encontrado';
		}
		//echo $this->consultar_model->detalle_producto('1543689119');
		//echo $this->consultar_model->detalle_producto();
	}

	public function refaccion(){
		$this->load->model('consultar_model');

		$codigo = json_decode($_POST['codigo']);

		if($this->consultar_model->consultaSimple($codigo, 'codigo_barras', 'catalogo_piezas_reparacion')){

			$data['info_refaccion'] = $this->consultar_model->consultaSimple($codigo, 'codigo_barras', 'catalogo_piezas_reparacion');

			$vista = $this->load->view('backend/detalle_refaccion', $data, true);
			echo $vista;			
		}else{
			echo 'Articulo no encontrado';
		}
		//echo $this->consultar_model->detalle_producto('1543689119');
		//echo $this->consultar_model->detalle_producto();
	}
}//1543689119