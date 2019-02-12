<?php
class Consultar_model extends CI_Model{
        function __construct()
        {
                parent::__construct();
        }

        public function consultaSimple($id, $nombre_id, $tabla)
        {
                $this->db->select('*');
                $this->db->from($tabla);
                $this->db->where($nombre_id, $id);
                //$this->db->like('producto.codigo_barras', $codigo);

                $query = $this->db->get();
                $result = $query->row();

                return $result;
        }

        public function consulta($id, $nombre_id, $tabla, $orden = false){
                $this->db->select('*');
                $this->db->from($tabla);
                $this->db->where($nombre_id, $id);
                if($orden){
                        $this->db->order_by('id_'.$tabla, $orden);
                }

                $query = $this->db->get();
                $result = $query->result();

                return $result;
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
        /* USUARIOS */
                public function users()
                {
                        $this->db->select('
                                users.*,
                                sucursal.nombre as nombre_sucursal
                        ');
                        $this->db->from('users');
                        $this->db->join('sucursal', 'sucursal.id_sucursal = users.id_sucursal');
                        $query = $this->db->get();
                        $result = $query->result();
                        return $result;
                }

                public function sucursal_user($id)
                {
                        $this->db->select('
                                sucursal.nombre as nombre_sucursal
                        ');
                        $this->db->from('sucursal_user');
                        $this->db->join('sucursal', 'sucursal_user.fk_id_sucursal = sucursal.id_sucursal');
                        $this->db->where('sucursal_user.fk_id_user', $id);

                        $query = $this->db->get();
                        $result = $query->result();

                        return $result;    
                }
        /* END USUARIO*/
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
                        $this->db->select('clientes.*,
                                        sucursal.nombre as nombre_sucursal
                                ');
                        $this->db->from('clientes');
                        $this->db->join('sucursal', 'sucursal.id_sucursal = clientes.id_sucursal', 'left');
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

        //// SERVICIOS_TECNICOS //////
        public function servicios_tecnicos($id = false){
                $this->db->select('
                        servicio_tecnico.*,
                        clientes.nombre as nombre_cliente,
                        clientes.ap_paterno,
                        clientes.ap_materno,
                        clientes.telefono as telefono_cliente,
                        clientes.email,
                        clientes.informacion_extra as informacion_extra_cliente,
                        sucursal.nombre as nombre_sucursal
                ');
                $this->db->from('servicio_tecnico');
                $this->db->join('clientes', 'clientes.id_cliente = servicio_tecnico.fk_id_cliente');
                $this->db->join('sucursal', 'sucursal.id_sucursal = servicio_tecnico.fk_id_sucursal');

                if($id != false){
                        $this->db->where('servicio_tecnico.id_servicio_tecnico', $id);
                        //$this->db->like('producto.codigo_barras', $codigo);

                        $query = $this->db->get();
                        $result = $query->row();
                }else{
                        $query = $this->db->get();
                        $result = $query->result();
                }

                return $result;
        }


        public function piezas_cotizacion_servicio($id){
                $this->db->select('
                        piezas_cotizacion_servicio.*,
                        catalogo_piezas_reparacion.*
                ');
                $this->db->from('piezas_cotizacion_servicio');
                $this->db->join('catalogo_piezas_reparacion', 'catalogo_piezas_reparacion.id_catalogo_piezas_reparacion = piezas_cotizacion_servicio.id_pieza_repuesto');
                $this->db->where('piezas_cotizacion_servicio.id_cotizacion_servicio = '.$id);
                $query = $this->db->get();
                $result = $query->result();

                return $result;
        }

        //// END SERVICIOS_TECNICOS ////



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
        public function producto($id = false){
                $this->db->select('producto.*,
                        sub_categoria_producto.nombre as nombre_sub_producto,
                        categoria_producto.nombre as nombre_categoria_producto,'
                );
                $this->db->from('producto');
                $this->db->join('categoria_producto', 'categoria_producto.id_categoria_producto = producto.fk_id_categoria_producto', 'left');
                $this->db->join('sub_categoria_producto', 'sub_categoria_producto.id_sub_categoria_producto = producto.fk_id_sub_categoria_producto', 'left');

                $this->db->where('producto.id_producto', $id);
                //$this->db->like('producto.codigo_barras', $codigo);

                $query = $this->db->get();
                $result = $query->row();

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


        //// TICKETS /////
        public function consultarTicket($id){
//SELECT ticket.piezas AS 'piezas_ticket', ticket.total AS 'ticket_total', ticket.fecha_registro, ticket_producto_venta.fk_id_producto_venta, producto_venta.piezas, producto_venta.precio_venta, producto_venta.fk_id_sucursal FROM ticket INNER JOIN ticket_producto_venta ON ticket.id_ticket = ticket_producto_venta.fk_id_ticket INNER JOIN producto_venta ON ticket_producto_venta.fk_id_producto_venta = producto_venta.id_producto_venta


                $this->db->select(
                        'ticket.piezas as piezas_ticket,
                        ticket.total as ticket_total,
                        ticket.fk_id_sucursal,
                        ticket.fk_id_usuario,
                        ticket.fecha_registro as fecha_ticket,
                        producto_venta.id_producto_venta,
                        producto_venta.fk_id_producto,
                        producto_venta.piezas,
                        producto_venta.precio_venta,
                        producto.id_producto,
                        producto.nombre
                        '
                );
                $this->db->from('ticket');
                $this->db->join('producto_venta', 'producto_venta.fk_id_ticket = ticket.id_ticket');
                $this->db->join('producto', 'producto.id_producto = producto_venta.fk_id_producto');
                $this->db->where('id_ticket', $id);

                $query = $this->db->get();
                $result = $query->result();

                return $result;
        }

        /////// ULTIMOS AVISOS ////////
                public function ultimosAvisos($id){
                        $this->db->select('
                                servicio_tecnico.*,
                                clientes.nombre as nombre_cliente,
                                clientes.ap_paterno,
                                clientes.telefono as telefono_cliente
                        ');
                        $this->db->from('servicio_tecnico');
                        $this->db->join('clientes', 'clientes.id_cliente = servicio_tecnico.fk_id_cliente');
                        $this->db->where('servicio_tecnico.estatus', 'FINALIZADO');
                        $this->db->where('servicio_tecnico.fk_id_sucursal', $id);

                        $query = $this->db->get();
                        $result = $query->result();

                        return $result;
                }
        ////// END ULTIMOS AVISOS /////

        //// PIEZAS DE REPUESTO
                public function repuestos($busqueda){
                        $busqueda = str_replace('%20', ' ', $busqueda);

                        $this->db->select('*');
                        $this->db->from('catalogo_piezas_reparacion');
                        $this->db->or_like('nombre_pieza', $busqueda,'both');
                        $this->db->or_like('modelo', $busqueda,'both');
                        $this->db->order_by('nombre_pieza', 'DESC');

                        $query = $this->db->get();
                        $result = $query->result();
                        //echo $this->db->last_query();
                        return $result;   
                }
        //// END PIEZAS DE REPUESTO

}