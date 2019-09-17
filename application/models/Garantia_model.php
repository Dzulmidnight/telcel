<?php
class Garantia_model extends CI_Model{
        function __construct()
        {
                parent::__construct();
        }

        public function consultar($codigo)
        {
                $this->db->select('
                        ticket.*,
                        users.nombre,
                        users.ap_paterno,
                        sucursal.nombre as nombre_sucursal
                ');
                $this->db->from('ticket');
                $this->db->join('users', 'users.id_user = ticket.fk_id_usuario');
                $this->db->join('sucursal', 'sucursal.id_sucursal = ticket.fk_id_sucursal');

                $this->db->where('ticket.codigo_ticket', $codigo);
                //$this->db->like('producto.codigo_barras', $codigo);
                $query = $this->db->get();
                $result = $query->row();

                return $result;
        }

        public function productos($ticket)
        {
                $this->db->select('
                        producto_venta.*,
                        producto.marca,
                        producto.nombre,
                        producto.modelo
                ');
                $this->db->from('producto_venta');
                $this->db->join('producto', 'producto.id_producto = producto_venta.fk_id_producto');

                $this->db->where('producto_venta.fk_id_ticket', $ticket);

                $query = $this->db->get();
                $result = $query->result();

                return $result;
        }

        public function inventario($id_producto = false)
        {
                $this->db->select('*');
                $this->db->from('historial_inventario');
                if($id_producto){
                        $this->db->where('fk_id_producto', $id_producto);
                        $query = $this->db->get();
                        $result = $query->row();
                }else{
                        $query = $this->db->get();
                        $result = $query->result();
                }
                return $result;
        }

        public function producto($id_producto = false)
        {
                $this->db->select('*');
                $this->db->from('producto');
                if($id_producto){
                        $this->db->where('id_producto', $id_producto);
                        $query = $this->db->get();
                        $result = $query->row();
                }else{
                        $query = $this->db->get();
                        $result = $query->result();
                }
                return $result;
        }

        public function producto_venta($id_producto = false, $id_ticket = false)
        {
                $this->db->select('*');
                $this->db->from('producto_venta');
                if($id_producto && $id_ticket){
                        $this->db->where('fk_id_producto', $id_producto);
                        $this->db->where('fk_id_ticket', $id_ticket);
                        $query = $this->db->get();
                        $result = $query->row();
                }else if($id_ticket && $id_producto == false){
                        $this->db->where('fk_id_ticket', $id_ticket);
                        $query = $this->db->get();
                        $result = $query->result();
                }else{
                        $query = $this->db->get();
                        $result = $query->result();
                }
                return $result;
        }

        public function ticket($id_ticket = false)
        {
                $this->db->select('*');
                $this->db->from('ticket');
                if($id_ticket){
                        $this->db->where('id_ticket', $id_ticket);
                        $query = $this->db->get();
                        $result = $query->row();
                }else{
                        $query = $this->db->get();
                        $result = $query->result();
                }
                return $result;
        }

        public function sucursal_producto($fk_id_producto = false, $fk_id_sucursal = false)
        {
                $this->db->select('*');
                $this->db->from('sucursal_producto');
                if($fk_id_producto && $fk_id_sucursal){
                        $this->db->where('fk_id_producto', $fk_id_producto);
                        $this->db->where('fk_id_sucursal', $fk_id_sucursal);
                        $query = $this->db->get();
                        $result = $query->row();
                }else if($fk_id_producto && $fk_id_sucursal == false){
                        $this->db->where('fk_id_producto', $fk_id_producto);
                        $query = $this->db->get();
                        $result = $query->row();
                }else{
                        $query = $this->db->get();
                        $result = $query->result();
                }
                return $result;
        }

        /*public function eliminar_producto_venta()
        {
                $this->db->where('fk_id_producto', $fk_id_producto);
                $this->db->where('fk_id_sucursal', $fk_id_sucursal);
                $this->db->where('fk_id_ticket', $fk_id_ticket);
                $this->db->delete($tabla);

                return true;   
        }*/

}