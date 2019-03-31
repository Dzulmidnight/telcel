<!-- Modal mostrar codigo de barras -->
<div class="modal fade" id="modalVenta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Venta de productos</h3>
                </div>
                <div class="block-content" style="margin-bottom: 4em;">
                    <div class="row text-justify">
                        <div class="col-md-12">
                            <!-- Block Tabs Justified Default Style -->
                            <div class="block">
                                <ul class="nav nav-tabs nav-justified" data-toggle="tabs">
                                    <li class="active">
                                        <a href="#btabs-static-justified-ventas" onclick="tipoServicio('producto');"><i class="text-success si si-basket-loaded"></i> Ventas</a>
                                    </li>
                                    <li>
                                        <a href="#btabs-static-justified-servicios" onclick="tipoServicio('servicio');"><i class="text-warning si si-energy"></i> Servicios</a>
                                    </li>
                                </ul>

                                <div class="col-lg-12">
                                    <div class="col-lg-6">
                                        <label for="fk_id_sucursal">Sucursal donde se realiza la venta</label>
                                        <select class="form-control" name="fk_id_sucursal_venta" id="fk_id_sucursal_venta" required>
                                            <option value="">...</option>
                                            <?php 
                                                foreach ($row_sucursales as $sucursal) {
                                                    if($sucursal->id_sucursal == $this->session->userdata('id_sucursal')){
                                                        echo "<option value='{$sucursal->id_sucursal}' selected>{$sucursal->nombre}</option>";
                                                    }else{
                                                        echo "<option value='{$sucursal->id_sucursal}'>{$sucursal->nombre}</option>";
                                                    }
                                                }
                                             ?>
                 
                                        </select>
                                    </div>
                                    <div class="col-lg-6" style="color:red">
                                        <label for="id_vendedor_venta">* Identificación del vendedor</label>
                                        <input type="number" class="form-control" id="id_vendedor_venta" name="id_vendedor_venta" onkeyup="consultarVendedor(this.value, '<?= base_url(); ?>');" placeholder="Ingresa tu número de vendedor" value="" required>
                                        <p id="span-nombre-vendedor" style="background:#ecf0f1;padding:.5em;color:#2c3e50;"></p>
                                    </div>
                                </div>
                                
                                <form id="frm_venta_producto" class="form-horizontal" action="#" method="post">
                                    <div class="block-content tab-content">
                                        <!-- VENTA ACCESORIOS -->
                                        <div class="tab-pane active" id="btabs-static-justified-ventas">
                                            <h4 class="font-w300 push-15">Venta de Producto</h4>

                                            <!-- Formularios invetario -->
                                            <div id="formularios_inventario">

                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <hr>
                                                        </div>
                                                        <div class="col-md-4" style="color:red">
                                                            <label for="codigoCapturado">* Codigo del producto</label>
                                                            <input type="text" class="form-control" id="codigoCapturado" name="codigoCapturado" onkeyup="consultarCodigo(this.value, '<?= base_url(); ?>')" placeholder="Introduce el codigo del producto" value="" autofocus required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="piezas_venta">* Nº Piezas</label>
                                                            <input type="number" class="form-control" disabled id="piezas_venta" name="piezas_venta" placeholder="Nº de piezas" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="precio_unitario_venta">* Precio de venta</label>
                                                            <input type="number" class="form-control" disabled id="precio_unitario_venta" name="precio_unitario_venta" placeholder="Precio" required>
                                                            <input type="hidden" id="precio_real_venta">
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-right">
                                                    <button type="button" style="margin-top:2em;" class="btn btn-sm btn-default" disabled id="btn_agregar_producto" name="btn_agregar_producto" onclick="carritoCompras('frm_venta_producto');">
                                                        Agregar <i class="fa fa-shopping-bag"></i>
                                                    </button>
                                                    <button style="margin-top:2em;" class="btn btn-sm btn-default" type="button" onclick="limpiar();">
                                                        Limpiar <i class="glyphicon glyphicon-erase"></i>
                                                    </button> 
                                                </div>

                                                <!-- Div Información del producto -->
                                                <div style="margin-top:1em;" class="col-md-5" id="div_informacion_producto">
                                                </div>
                                                <!-- END Div información del producto -->

                                                <!-- Div carro de compras -->
                                                <div style="margin-top:2em;" class="col-md-7 well" id="div_carro_compras">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="6">Resumen compra</th>
                                                            </tr>
                                                            <tr >
                                                                <th></th>
                                                                <th style="font-size:11px">Id</th>
                                                                <th style="font-size:11px;">Producto</th>
                                                                <th style="font-size:11px;">Marca</th>
                                                                <th style="font-size:11px;">Precio</th>
                                                                <th style="font-size:11px;">Cantidad</th>
                                                                <th style="font-size:11px;">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tablaDetalleCompra" style="font-size: 11px !important;">
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    
                                                    <div class="text-right">
                                                        <button type="button" class="btn btn-sm btn-default" onclick="cancelarVenta();">
                                                            Cancelar
                                                        </button>
                                                        <button type="button" id="btn_realizar_venta" class="btn btn-sm btn-default" onclick="realizarVenta('<?= base_url(); ?>', 'frm_venta_producto');" disabled>
                                                            <i class="fa fa-save"></i> Realizar venta
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- END Div carro de compras -->
                                            </div>
                                            <!-- END Formularios inventario -->


                                        </div>

                                        <!-- SERVICIOS RAPIDOS -->
                                        <div class="tab-pane" id="btabs-static-justified-servicios">
                                            <h4 class="font-w300 push-15">Servicios Rapidos</h4>

                                            <div class="row">
                                                <div class="col-md-6" style="padding-right: 1em;">
                                                    <label for="nombre_servicio">Nombre del servicio</label>
                                                    <select class="form-control" name="nombre_servicio" id="nombre_servicio" onchange="servicioRapido(this.value);">
                                                        <option value="">Servicios recurrentes</option>
                                                        <option value="otro">Otro</option>
                                                    </select>

                                                    <div id="nuevoServicio_div" style="margin-top: 1em;display: none;" class="text-success">
                                                        <label for="nombre_nuevo_servicio">Agregar nuevo servicio</label>
                                                        <input type="text" class="form-control" id="nombre_nuevo_servicio" name="nombre_nuevo_servicio" value="" placeholder="Escribe el nuevo servicio">
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="padding-left: 1em;">
                                                    <div class="form-group">
                                                        <label class="" for="exampleInputAmount">Monto pagado</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">$</div>
                                                            <input type="text" class="form-control" id="pago_servicio" name="pago_servicio" placeholder="0.00">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-right">
                                                    <button type="button" class="btn btn-sm btn-success" onclick="ventaRapida('<?= base_url(); ?>');">
                                                        <i class="fa fa-check"></i> Registrar venta
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <input type="hidden" id="tipo_servicio" name="tipo_servicio" value="">
                                </form>
                            </div>
                            <!-- END Block Tabs Justified Alternative Style -->
                        </div>
                    <!-- END Justified Tabs -->

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- END Modal mostrar codigo de barras -->

<!-- Modal mostrar codigo de barras -->
<div class="modal fade" id="modalPdf" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Ticket de Compra</h3>
                </div>
                <div class="block-content" style="margin-bottom: 4em;">
                    <iframe id="frame_pdf" src="" height="500px" width="100%" frameborder="0"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- END Modal mostrar codigo de barras -->