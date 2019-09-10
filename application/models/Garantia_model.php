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
}