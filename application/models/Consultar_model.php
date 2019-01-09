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
                        $this->db->where('users.id_user', $id);
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
                        contacto.telefono as telefonoContacto,
                        contacto.ap_paterno,
                        contacto.ap_materno,
                        contacto.email as emailContacto');
                $this->db->from('proveedores');
                $this->db->join('contacto', 'contacto.fk_id_proveedor = proveedores.id_proveedor', 'left');
                if($id != false){
                        $this->db->where('proveedores.id_proveedor', $id);
                }
                $query = $this->db->get();
                $result = $query->result();

                return $result;
        }
        //// CLIENTES ////
        public function clientes()
        {
                $this->db->select('clientes.*,
                        sucursal.nombre as nombreSucursal'
                );
                $this->db->from('clientes');
                $this->db->join('sucursal', 'sucursal.id_sucursal = clientes.id_sucursal', 'left');
                $query = $this->db->get();
                $result = $query->result();

                return $result;
        }
        public function detalle_cliente($id = false){
                $this->db->select('*');
                $this->db->from('clientes');
                $this->db->where('clientes.id_cliente', $id);
                //$this->db->like('producto.codigo_barras', $codigo);

                $query = $this->db->get();
                $result = $query->row();

                return $result;
        }

        //// END CLIENTES ////

        public function categoriaProductos()
        {
                $this->db->select('*');
                $this->db->from('categoria_producto');
                $query = $this->db->get();
                $result = $query->result();

                return $result;
        }

        public function subCategoriaProducto()
        {
                $this->db->select('*');
                $this->db->from('sub_categoria_producto');
                $query = $this->db->get();
                $result = $query->result();

                return $result;
        }
        public function sucursales()
        {
                $this->db->select('*');
                $this->db->from('sucursal');
                $query = $this->db->get();
                $result = $query->result();

                return $result;
        }
        public function sucursal_producto($id_producto = false)
        {
                $this->db->select('
                        sucursal.id_sucursal,
                        sucursal.nombre,
                        sucursal_producto.piezas

                ');
                $this->db->from('sucursal_producto');
                $this->db->join('sucursal', 'sucursal.id_sucursal = sucursal_producto.fk_id_sucursal');
                if($id_producto != false){
                        $this->db->where('sucursal_producto.fk_id_producto', $id_producto);
                }
                $query = $this->db->get();
                $result = $query->result();

                return $result;
        }
        public function sucursal_cantidad($id_producto = false, $id_sucursal = false)
        {
                $this->db->select('
                        sucursal.id_sucursal,
                        sucursal.nombre,
                        sucursal_producto.id_sucursal_producto,
                        sucursal_producto.piezas

                ');
                $this->db->from('sucursal_producto');
                $this->db->join('sucursal', 'sucursal.id_sucursal = sucursal_producto.fk_id_sucursal');
                if($id_producto != false){
                        $this->db->where('sucursal_producto.fk_id_producto', $id_producto);
                }
                if($id_sucursal != false){
                        $this->db->where('sucursal_producto.fk_id_sucursal', $id_sucursal);
                }
                $query = $this->db->get();
                $result = $query->row();

                return $result;
        }

        //// PRODUCTOS ////
        public function productos($id = false, $id_sucursal = false){
                $this->db->select('producto.*,
                        sub_categoria_producto.nombre as nombre_sub_producto,
                        categoria_producto.nombre as nombre_categoria_producto'
                );
                $this->db->from('producto');
                $this->db->join('categoria_producto', 'categoria_producto.id_categoria_producto = producto.fk_id_categoria_producto', 'left');
                $this->db->join('sub_categoria_producto', 'sub_categoria_producto.id_sub_categoria_producto = producto.fk_id_sub_categoria_producto', 'left');
                if($id != false){
                        $this->db->where('producto.id_producto', $id);
                }

                $query = $this->db->get();
                $result = $query->result();

                return $result;
        }

        public function detalle_producto($codigo = false){
                $this->db->select('producto.*,
                        sub_categoria_producto.nombre as nombre_sub_producto,
                        categoria_producto.nombre as nombre_categoria_producto,'
                );
                $this->db->from('producto');
                $this->db->join('categoria_producto', 'categoria_producto.id_categoria_producto = producto.fk_id_categoria_producto', 'left');
                $this->db->join('sub_categoria_producto', 'sub_categoria_producto.id_sub_categoria_producto = producto.fk_id_sub_categoria_producto', 'left');

                $this->db->where('producto.codigo_barras', $codigo);
                //$this->db->like('producto.codigo_barras', $codigo);

                $query = $this->db->get();
                $result = $query->row();

                return $result;
        }
        //// END PRODUCTOS ////


}