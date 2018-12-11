<?php
class Update_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}

        public function update($tabla = false, $id_nombre = false, $id_valor = false, $data){
                $this->db->where($id_nombre, $id_valor);
                $this->db->update($tabla, $data);

                return true;
        }

        
}