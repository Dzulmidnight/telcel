<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                Dashboard
            </h1>
        </div>
        <div class="col-sm-5 hidden-xs">
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">

    <div class="content-grid push-50">
        <div class="row">

            <div class="col-xs-6 col-sm-4 col-lg-4">
                <a class="block block-link-hover2 text-center" href="#" data-toggle="modal" data-target="#modal-popout">
                    <div class="block-content block-content-full bg-primary">
                        <i class="si si-shuffle fa-4x text-white"></i>
                        <div class="font-w600 text-white-op push-15-t">Ventas</div>
                    </div>
                </a>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-4">
                <a class="block block-link-hover2 text-center" href="<?php echo base_url('backend/MOD_CLIENTES/clientes'); ?>">
                    <div class="block-content block-content-full bg-success">
                        <i class="si si-calculator fa-4x text-white"></i>
                        <div class="font-w600 text-white-op push-15-t">Clientes</div>
                    </div>
                </a>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-4">
                <a class="block block-link-hover2 text-center" href="javascript:void(0)">
                    <div class="block-content block-content-full bg-primary-dark">
                        <i class="si si-film fa-4x text-white"></i>
                        <div class="font-w600 text-white-op push-15-t">Personal</div>
                    </div>
                </a>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-4">
                <a class="block block-link-hover2 text-center" href="<?php echo base_url('backend/MOD_PROVEEDORES/proveedores'); ?>">
                    <div class="block-content block-content-full bg-modern">
                        <i class="si si-crop fa-4x text-white"></i>
                        <div class="font-w600 text-white-op push-15-t">Proveedores</div>
                    </div>
                </a>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-4">
                <a class="block block-link-hover2 text-center" href="<?php echo base_url('backend/MOD_INVENTARIO/inventario'); ?>">
                    <div class="block-content block-content-full bg-amethyst">
                        <i class="si si-settings fa-4x text-white"></i>
                        <div class="font-w600 text-white-op push-15-t">Inventario</div>
                    </div>
                </a>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-4">
                <a class="block block-link-hover2 text-center" href="<?php echo base_url('backend/MOD_GARANTIA/garantia'); ?>">
                    <div class="block-content block-content-full bg-city">
                        <i class="si si-game-controller fa-4x text-white"></i>
                        <div class="font-w600 text-white-op push-15-t">Garantia</div>
                    </div>
                </a>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-4">
                <a class="block block-link-hover3 text-center" href="<?php echo base_url('backend/MOD_FINANZAS/finanzas'); ?>">
                    <div class="block-content block-content-full">
                        <i class="si si-support fa-4x text-muted"></i>
                        <div class="font-w600 push-15-t">Finanzas</div>
                    </div>
                </a>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-4">
                <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <i class="si si-speedometer fa-4x text-danger"></i>
                        <div class="font-w600 push-15-t">Sucursales</div>
                    </div>
                </a>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-4">
                <a class="block block-link-hover3 text-center" href="<?php echo base_url('backend/MOD_SERV_TECNICO/Serv_tecnico'); ?>">
                    <div class="block-content block-content-full">
                        <i class="si si-speedometer fa-4x text-danger"></i>
                        <div class="font-w600 push-15-t">Reparaciones</div>
                    </div>
                </a>
            </div>


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
                        <div id="div_servicio_detallado" class="col-md-3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a class="block block-link-hover3 text-center" href="<?php echo base_url("backend/MOD_SERVICIOS/servicios/index/detallado"); ?>">
                                        <div class="block-content block-content-full">
                                            <div class="h1 font-w700 text-success"><i class="fa fa-plus"></i></div>
                                        </div>
                                        <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Venta Detallada</div>
                                    </a>                                    
                                </div>
                                <div class="col-xs-12 explicacion">
                                    <div class="block block-rounded">
                                        <div class="block-header bg-gray-lighter">
                                            <h4 class="block-title">Venta Detallada</h4>
                                        </div>
                                        <div class="block-content">
                                            <p>
                                                Se necesita dar de alta la información del cliente (<span style="color:red">venta equipos, reparación</span>).
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="div_servicio_interno" class="col-md-3">
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

                        <div id="div_listado_servicios" class="col-md-3">
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
                    </div>
                    <!-- Div frm_venta -->
                    <div class="row">



                        <!-- Div servicio_express -->
                        <div class="col-md-12" id="frm_servicio_express" style="">
                            <form class="form-horizontal push-10-t" action="base_forms_elements.html" method="post" onsubmit="return false;">
                                <h3 >
                                    REGISTRAR SERVICIO
                                </h3>
                                <hr>
                                <!-- Lista de servicios -->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="form-material">
                                                <select class="form-control" id="material-select" name="material-select" size="1" required="">
                                                    <option>...</option>
                                                    <option value="1">Instalar whatsapp</option>
                                                    <option value="2">Instalar facebook</option>
                                                    <option value="3">Realizar recarga</option>
                                                </select>
                                                <label for="material-select">Listado de servicios *</label>
                                            </div>
                                            <span class="input-group-btn">
                                                <button id="btn_nuevo_servicio" class="btn btn-sm btn-default" type="button" value="mostrar" onclick="nuevoServicio(this.id, this.value)">
                                                    <i class="fa fa-plus"></i> Nuevo
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Lista de servicios -->
                                
                                <!-- FRM Nuevo servicio -->
                                <div id="frm_nuevo_servicio" class="well" style="display:none">
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <div class="form-material input-group">
                                                <input class="form-control" type="password" id="register5-password" name="register5-password" placeholder="Escribre el nuevo servicio">
                                                <label for="register5-password">Nuevo Servicio</label>
                                                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="css-input switch switch-sm switch-success">
                                                <input type="checkbox" checked=""><span></span> Necesita registrar usuario?
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <!-- END FRM Nuevo servicio -->

                                <!-- DIV contenedor servicio -->
                                <div id="contendor_servicio" class="row">
                                    <hr>

                                    <!-- Registrar nuevo cliente -->
                                    <div class="col-md-6 block">
                                        <form class="form-horizontal push-10-t block-content" action="base_forms_elements.html" method="post" onsubmit="return false;">
                                            <h3 class="">
                                                Información del cliente
                                            </h3>
                                            <hr>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <b class="text-success">Buscar cliente</b>
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info" type="button"><i class="fa fa-search"></i> Buscar</button>
                                                        </span>
                                                        <input class="form-control" type="text" id="example-input1-group2" name="example-input1-group2" placeholder="Nombre y apellido, Nº Telefono">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <h4 style="margin-bottom: 1em;">Nuevo cliente</h4>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <div class="form-material form-material-primary">
                                                        <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                        <label for="material-color-primary">Nombre *</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-material form-material-primary">
                                                        <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                        <label for="material-color-primary">Nº Telefono *</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <div class="form-material form-material-primary">
                                                        <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                        <label for="material-color-primary">Apellido Paterno *</label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-material form-material-primary">
                                                        <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                        <label for="material-color-primary">Apellido Materno *</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class="form-material">
                                                        <textarea class="form-control" id="material-textarea-small" name="material-textarea-small" rows="3" placeholder="Opcional: detalles del servicio"></textarea>
                                                        <label for="material-textarea-small">Información extra</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END Registrar nuevo cliente -->

                                </div>
                                <!-- END DIV contenedor servicio -->

                                <div class="form-group text-right">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-default" onclick="mostrarServicio('cancelar', 'servicio_express')">
                                            Cancelar
                                        </button>
                                        <button class="btn btn-success">
                                            Registrar servicio
                                        </button>  
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- End div_servicio_express -->




                        <!-- Div servicio_interno -->
                        <div class="col-md-12" id="frm_servicio_interno" style="display: block">
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
                    <!-- END Div frm_venta -->
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
    function nuevoServicio(id_btn, valor){
        if(valor == 'mostrar'){
            document.getElementById('frm_nuevo_servicio').style.display = 'block';
            document.getElementById(id_btn).value = 'cancelar';
            document.getElementById(id_btn).innerHTML = 'Cancelar';
        }else{
            document.getElementById('frm_nuevo_servicio').style.display = 'none';
            document.getElementById(id_btn).value = 'mostrar';
            document.getElementById(id_btn).innerHTML = 'Nuevo';
        }
    }

    function mostrarServicio(accion, servicio){
        var frm = 'frm_'+servicio;
        var div = '';

        if(servicio == 'servicio_express'){
            div = 'div_servicio_interno';
        }else if(servicio == 'servicio_interno'){
            div = 'div_servicio_express';
        }

        var elementos = document.getElementsByClassName('explicacion');

        for(var i = 0; i < elementos.length; i++){
            elementos[i].style.display = 'none';
        }

        /*if(accion == 'mostrar'){
            document.getElementById('div_servicio_detallado').style.display = 'none';
            document.getElementById('div_listado_servicios').style.display = 'none';
            document.getElementById(div).style.display = 'none';
            document.getElementById(frm).style.display = 'block';
        }else if(accion == 'cancelar'){
            frm = 'frm_'+servicio;

            document.getElementById('div_servicio_detallado').style.display = 'block';
            document.getElementById('div_listado_servicios').style.display = 'block';
            document.getElementById(div).style.display = 'block';
            document.getElementById(frm).style.display = 'none';
        }*/

    }
</script>