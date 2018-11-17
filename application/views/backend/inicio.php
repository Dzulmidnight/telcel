

<!-- Page Content -->
<div class="content">

    <div class="content-grid push-50">
        <div class="row">
            <?= $menu_general ?>
        </div>
    </div>
    <!-- END Modulos -->

</div>
<!-- END Page Content -->


<!-- Pop Out Modal -->
<div class="modal fade" id="modal-popout" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Servicios</h3>
                </div>
                <div class="block-content" style="margin-bottom: 4em;">
                    <div class="row text-justify">
                        <div class="col-md-12">
                            <h3>
                                Tipos de servicios
                            </h3>
                            <p>
                                Por favor seleccione un tipo de servicio.
                            </p>
                        </div>


                        <!--
                        <div id="div_servicio_express" class="col-md-3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a class="block block-link-hover3 text-center" href="#" onclick="mostrarServicio('mostrar', 'servicio_express');">
                                        <div class="block-content block-content-full">
                                            <div class="h1 font-w700 text-success"><i class="fa fa-plus"></i></div>
                                        </div>
                                        <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Venta</div>
                                    </a>                                    
                                </div>
                                <div class="col-xs-12 explicacion">
                                    <div class="block block-rounded">
                                        <div class="block-header bg-gray-lighter">
                                            <h4 class="block-title">Venta</h4>
                                        </div>
                                        <div class="block-content">
                                            <p>
                                                Servicios que no necesitan registrar información del cliente.   
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    -->
                        <div id="div_servicio" class="col-md-4">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a class="block block-link-hover3 text-center" href="<?php echo base_url("backend/MOD_SERVICIOS/servicios/index/detallado"); ?>">
                                        <div class="block-content block-content-full">
                                            <div class="h1 font-w700 text-success"><i class="fa fa-plus"></i></div>
                                        </div>
                                        <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Venta</div>
                                    </a>                                    
                                </div>
                                <div class="col-xs-12 explicacion">
                                    <div class="block block-rounded">
                                        <div class="block-header bg-gray-lighter">
                                            <h4 class="block-title">Venta</h4>
                                        </div>
                                        <div class="block-content">
                                            <p>
                                                Opción para ingresar ventas y reparaciones
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="div_servicio_interno" class="col-md-4">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a class="block block-link-hover3 text-center" href="#" onclick="mostrarServicio('mostrar', 'servicio_interno');">
                                        <div class="block-content block-content-full">
                                            <div class="h1 font-w700 text-warning"><i class="fa fa-plus"></i></div>
                                        </div>
                                        <div class="block-content block-content-full block-content-mini bg-gray-lighter text-warning font-w600">Pago Interno</div>
                                    </a>                                    
                                </div>

                                <div class="col-xs-12 explicacion">
                                    <div class="block block-rounded">
                                        <div class="block-header bg-gray-lighter">
                                            <h4 class="block-title">Pago Interno</h4>
                                        </div>
                                        <div class="block-content">
                                            <p>
                                                Servicios relacionados al pago de sucursal (luz, internet, renta)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="div_listado_servicios" class="col-md-4">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a class="block block-link-hover3 text-center" href="<?php echo base_url('backend/MOD_SERVICIOS/servicios/listado'); ?>">
                                        <div class="block-content block-content-full">
                                            <div class="h1 font-w700 text-info"><i class="fa fa-search"></i></div>
                                        </div>
                                        <div class="block-content block-content-full block-content-mini bg-gray-lighter text-info font-w600">Listado</div>
                                    </a>                                    
                                </div>
                                <div class="col-xs-12 explicacion">
                                    <div class="block block-rounded">
                                        
                                        <div class="block-content">
                                            <p>
                                                Consultar listado de servicios realizados
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Div servicio_interno -->
                        <div class="col-md-8" id="frm_servicio_interno" style="display: none">
                            <form class="form-horizontal push-10-t" action="base_forms_elements.html" method="post" onsubmit="return false;">
                                <h3 class="text-warning">
                                    Registrar Servicio Interno
                                </h3>
                                <hr>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <div class="form-material">
                                            <select class="form-control" id="material-select" name="material-select" size="1" required="">
                                                <option>...</option>
                                                <option value="1">Pago Luz</option>
                                                <option value="2">Pago Internet</option>
                                                <option value="3">Pago Local</option>
                                            </select>
                                            <label for="material-select">Servicios recurrentes *</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-material form-material-primary">
                                            <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="Nuevo servicio">
                                            <label for="material-color-primary">Otro servicio</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="form-material form-material-primary">
                                            <input class="form-control" type="number" step="0.01" id="material-color-primary" name="material-color-primary" placeholder="Ej: 150.50" required>
                                            <label for="material-color-primary">Monto del servicio *</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <div class="form-material">
                                            <textarea class="form-control" id="material-textarea-small" name="material-textarea-small" rows="3" placeholder="Opcional: detalles del servicio"></textarea>
                                            <label for="material-textarea-small">Detalles del servicio</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-material">
                                            <input type="file" class="form-control" id="comprobante_pago" name="comprobante_pago">
                                            <label for="comprobante_pago">Comprobante de pago</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group text-right">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-default" onclick="mostrarServicio('cancelar', 'servicio_interno')">
                                            Cancelar
                                        </button>
                                        <button class="btn btn-success">
                                            Registrar servicio
                                        </button>  
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- End Div servicio_interno -->

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- END Pop Out Modal -->

<script>

    function mostrarServicio(accion, servicio){
        var frm = 'frm_'+servicio;
        var div = '';


        if(accion == 'mostrar'){
            document.getElementById('div_servicio').style.display = 'none';
            document.getElementById('div_listado_servicios').style.display = 'none';
            document.getElementById(frm).style.display = 'block';
        }else if(accion == 'cancelar'){
            frm = 'frm_'+servicio;

            document.getElementById('div_servicio').style.display = 'block';
            document.getElementById('div_listado_servicios').style.display = 'block';
            document.getElementById(frm).style.display = 'none';
        }

    }
</script>