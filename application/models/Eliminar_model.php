<?php
class Eliminar_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}


	public function eliminar($tabla, $id_nombre, $id_valor)
	{
		$this->db->where($id_nombre, $id_valor);
		$this->db->delete($tabla);

		return true;
	}
}