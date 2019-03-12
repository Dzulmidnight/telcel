<?php
class Excel_import_model extends CI_Model
{
	function select()
	{
		$this->db->order_by('CustomerID', 'DESC');
		$query = $this->db->get('tbl_customer');
		return $query;
	}
	function insert($tabla, $data)
	{
		//$this->db->insert_batch('producto', $data);
		$this->db->insert($tabla, $data);
	}

	function insert_array($tabla, $data)
	{
		$this->db->insert_batch($tabla, $data);
	}
}