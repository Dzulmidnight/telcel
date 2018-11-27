<?php
class Consultar_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}

	public function listado($tabla)
	{
        $this->db->select('*');
        $this->db->from($tabla);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
}