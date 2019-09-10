<?php
class Garantia extends CI_Controller{

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
		$this->load->model('garantia_model');

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
}