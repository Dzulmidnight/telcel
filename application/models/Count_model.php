<?php
class Count_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}

	public function count($tabla)
	{
        $result = $this->db->count_all($tabla);

        return $result;
	}

	public function sumaInventario(){
		$this->db->select_sum('producto_entrada');
		$query = $this->db->get('historial_inventario');
	}
	
	public function restaInventario(){
		$this->db->select_sum('producto_salida');
		$query = $this->db->get('historial_inventario');
	}

	public function contarInventario(){
        /*$this->db->select('
        	SUM(),
            sub_categoria_producto.nombre as nombre_sub_producto,
            categoria_producto.nombre as nombre_categoria_producto,
        ');
        $this->db->from('producto');
        $this->db->join('categoria_producto', 'categoria_producto.id_categoria_producto = producto.fk_id_categoria_producto', 'left');
        $this->db->join('sub_categoria_producto', 'sub_categoria_producto.id_sub_categoria_producto = producto.fk_id_sub_categoria_producto', 'left');

        $this->db->where('producto.codigo_barras', $codigo);

        $query = $this->db->get();
        $result = $query->row();

        return $result;*/
	}
}