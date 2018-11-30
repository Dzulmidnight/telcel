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

        public function listadoProveedores($id = false)
        {
                $this->db->select('proveedores.*, 
                        contacto.id_contacto, 
                        contacto.nombre as nombreContacto, 
                        contacto.telefono as telefonoContacto');
                $this->db->from('proveedores');
                $this->db->join('contacto', 'contacto.fk_id_proveedor = proveedores.id_proveedor', 'left');
                if($id != false){
                        $this->db->where('proveedores.id_proveedor', $id);
                }
                $query = $this->db->get();
                $result = $query->result();

                return $result;
        }
}