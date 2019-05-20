<?php
class General extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('add_model');
		$this->load->model('count_model');
		$this->load->model('consultar_model');
		$this->load->model('eliminar_model');
	}

	public function eliminar($tabla = false, $nombre_id = false, $nombre_campo = false)
	{
		$id = $this->input->post($nombre_id);
		
		if($this->eliminar_model->eliminar($tabla, $nombre_campo, $id)){
			$this->session->set_flashdata('error', "Información eliminada");
		}
		redirect('backend/MOD_INVENTARIO/Inventario/listado', 'refresh');
	}

	public function eliminar_user($tabla = false, $nombre_id = false, $nombre_campo = false)
	{
		$id = $this->input->post($nombre_id);
		
		if($this->eliminar_model->eliminar($tabla, $nombre_campo, $id)){
			$this->session->set_flashdata('error', "Información eliminada");
			$this->eliminar_model->eliminar('sucursales_administrador', 'id_administrador', $id);
		}
		redirect('backend/MOD_PERSONAL/Personal/index', 'refresh');
	}



}