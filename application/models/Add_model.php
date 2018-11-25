<?php
class Add_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	public function insertar($datos, $tabla)
	{
		$this->db->insert($tabla, $datos);
	}
}