<?php
class Consultar_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}

	public function listado($tabla = false, $id = false)
	{
        $this->db->select('*');
        $this->db->from($tabla);
        if($id != false){
        	$this->db->where('usuarios.id_usuario', $id);
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
}