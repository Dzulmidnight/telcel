<?php
class Add_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	public function insertar($datos, $tabla)
	{
		$this->db->insert($tabla, $datos);

        $this->db->select('*');
        $this->db->from($tabla);
        $r = $this->db->get();
        $result = $r->result();
       
       	echo json_encode($result);

		//echo json_encode($result); 
		//echo 'EL TOTAL ES: '.$this->db->count_all($tabla);
	}
}