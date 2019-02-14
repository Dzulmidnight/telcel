        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/select2/select2.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/select2/select2-bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/dropzonejs/dropzone.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css">


<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                DASHBOARD SERVICIO TÉCNICO
            </h3>
        </div>

        <div class="col-sm-5 text-right hidden-xs">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cargar-excel">
                    <i class="fa fa-cloud-upload"></i> Importar
            </button>

            <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#modal-nuevo-ingreso">
                <span data-toggle="tooltip" title="Registrar nuevo servicio tecnico">
                    <i class="fa fa-briefcase"></i> Nuevo Servicio
                </span>
            </button>
            <button class="btn btn-rounded btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
        </div>
    </div>


</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">
    <!-- Busqueda de equipo -->
    <!--
    <div class="bg-gray-lighter">
        <section class="content content-full content-boxed">
         
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <form action="base_pages_support.html" method="post">
                        <div class="input-group input-group-lg">
                            <input class="form-control" type="text" placeholder="Busqueda de equipo (Telefono, IMEI, ID Soporte)">
                            <div class="input-group-btn">
                                <button class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    
        </section>
    </div>
    <!-- END Busqueda de equipo -->

    <!-- Opciones servicio tecnico -->
    <div class="bg-white">
        <div class="row">
            <!-- Sub opciones garantia -->
            <div class="col-sm-12">
                <table class="table js-dataTable-full" style="font-size: 11px;">
                    <thead style="font-size: 12px;">
                        <tr>
                            <th style="font-size: 12px;" class="danger">
                                #Codigo
                            </th>
                            <th style="font-size: 12px;">
                                Ingreso
                            </th>
                            <th style="font-size: 12px;">
                                Estatus
                            </th>
                            <th style="font-size: 12px;">
                                Sucursal
                            </th>
                            <th style="font-size: 12px;">
                                Cliente
                            </th>
                            <th style="font-size: 12px; width:20%;">
                                Detalle Equipo
                            </th>
                            <th style="font-size: 12px;">
                                Entrega aprox
                            </th>
                            <th style="font-size: 12px;">
                                Garantia
                            </th>
                            <th style="font-size: 12px;">
                                ...
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($row_servicios as $servicio): ?>
                        <?php 
                            $estilo = '';
                            switch ($servicio->estatus) {
                                case 'PENDIENTE':
                                    $estilo = 'gray';
                                    break;
                                case 'EN PROCESO':
                                    $estilo = 'warning';
                                    break;
                                case 'FINALIZADO':
                                    $estilo = 'danger';
                                    break;
                                case 'ENTREGADO':
                                    $estilo = 'success';
                                    break;
                                
                                default:
                                    # code...
                                    break;
                            }
                         ?>
                            <tr>
                                <!-- ID SERVICIO -->
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#modal-historial-estatus" onclick="historialAcciones('<?= base_url(); ?>', <?= $servicio->id_servicio_tecnico; ?>,'div-mostrar-tabla');">
                                        <i class="fa fa-search"></i> <?= $servicio->codigo_barras; ?>
                                    </a>
                                </td>

                                <!-- FECHA DE INGRESO -->
                                <td>
                                    <?= date('d/m/Y', $servicio->fecha_registro); ?>
                                </td>
                                <!-- ESTATUS -->
                                <td class="<?= $estilo; ?>">
                                    <?php 
                                        echo $servicio->estatus;

                                        if($servicio->estatus == 'COTIZACION'){
                                        ?>
                                            <br>
                                            <button type="button" class="btn btn-xs btn-info" onclick="modalDetalleCotizacion('<?= base_url(); ?>', <?= $servicio->id_servicio_tecnico; ?>,'div-mostrar-cotizacion');">
                                                <i class="si si-doc"></i> Cotización
                                            </button>
                                        <?php
                                        }
                                        if(!empty($servicio->estatus) && $servicio->estatus != 'COTIZACION'){
                                        ?>
                                            <br>
                                            <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-historial-estatus" onclick="historialAcciones('<?= base_url(); ?>', <?= $servicio->id_servicio_tecnico; ?>,'div-mostrar-tabla');">
                                                <i class="fa fa-search"></i> Historial
                                            </a>
                                        <?php
                                        }
                                     ?>  
                                </td>

                                <!-- Sucursal -->
                                <td>
                                    <?= $servicio->nombre_sucursal; ?>
                                </td>

                                <!-- Cliente -->
                                <td>
                                    <a href="#" onclick="modalDetalleCliente('<?= base_url(); ?>',<?= $servicio->fk_id_cliente; ?>, 'div-mostrar-modal-cliente');">
                                        <i class="fa fa-search"></i> <?= $servicio->nombre_cliente; ?>
                                    </a>
                                </td>

                                <!-- Detalle del equipo -->
                                <td>
                                    Equipo: <span style="color:red"><?= $servicio->marca_telefono.' '.$servicio->modelo_telefono; ?> </span>
                                    <br>
                                    Falla: <span style="color:red"><?= $servicio->falla_reportada; ?></span>
                                    
                                </td>

                                <!-- Fecha de entrega aprox -->
                                <td>
                                    <?= date('d/m/Y', $servicio->fecha_entrega); ?>
                                </td>

                                <!-- Garantia -->
                                <td></td>

                                <!-- Acciones -->
                                <td>
                                    <a class="btn btn-default" href="<?= base_url('backend/MOD_SERV_TECNICO/Serv_tecnico/ficha_servicio/'.$servicio->id_servicio_tecnico); ?>" data-toggle="tooltip" title="Ficha de servicio">
                                        <i class="si si-note"></i>
                                    </a>
                                    <?php 
                                        if($servicio->estatus == 'FINALIZADO'){
                                        ?>
                                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Eliminar" onclick="eliminarDatos();">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <button type="button" class="btn btn-success" data-toggle="tooltip" title="Marcar como entregado" onclick="entregarEquipo('frm_entregar_equipo','<?= $servicio->id_servicio_tecnico; ?>');">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        <?php
                                        }
                                     ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>                
            </div>           

        </div>
    </div>
    <!-- END Opciones servico tecnico -->

</div>

<div>
    <form id="frm_entregar_equipo" action="<?= base_url('backend/MOD_SERV_TECNICO/Serv_tecnico/entregar_equipo'); ?>" method="POST">
        <input type="hidden" id="id_frm_servicio_tecnico" name="id_frm_servicio_tecnico" value="">
        <input type="hidden" name="fecha_registro" value="<?= time(); ?>">
    </form>
</div>

<!-- FRM Registrar Servicio Tecnico -->
<div class="modal" id="modal-nuevo-ingreso" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <form id="frm_nuevo_ingreso" class="form-horizontal push-10-t block-content" action="<?= base_url('backend/MOD_SERV_TECNICO/Serv_tecnico/agregar'); ?>" method="POST" enctype="multipart/form-data">
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Registrar nuevo ingreso</h3>
                    </div>
                    <div class="block-content">
                        <div class="row text-justify">

                            <!-- Registrar nuevo cliente -->
                            <div class="col-md-5">
                                   <h3 class="h4">
                                        Información del cliente
                                    </h3>
                                    <hr>
                                    <div class="form-group">
                                        <div class="">
                                            <b class="text-success" style="margin-bottom:1em;">Buscar cliente</b>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-info" type="button"><i class="fa fa-search"></i> Buscar</button>
                                                </span>
                                                <input class="form-control" type="text" id="" name="" placeholder="Nombre y apellido, Nº Telefono" onkeyup="buscarCliente('this.value');">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row well">
                                        <div class="col-sm-12">
                                           <h4 style="margin-bottom: 1em;">Nuevo cliente</h4> 
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="nombre">* Nombre</label>
                                            <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" required>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="ap_paterno">Apellido Paterno</label>
                                            <input type="text" id="ap_paterno" name="ap_paterno" class="form-control">
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="ap_materno">Apellido Materno</label>
                                            <input type="text" id="ap_materno" name="ap_materno" class="form-control">
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="num_telefono">* Nº Teléfono</label>
                                            <input type="text" id="num_telefono" name="num_telefono" class="form-control" required>
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="informacion_extra">Información Extra</label>
                                            <textarea class="form-control" name="informacion_extra" id="informacion_extra"></textarea>
                                        </div>
                                    </div>
                            </div>
                            <!-- END Registrar nuevo cliente -->
                            <div class="col-md-7">
                                <!-- Div servicio_tecnico -->
                                <div id="div_servicio_tecnico">
                                    <p class="text-danger h3" >
                                        Servicio Técnico
                                    </p>

                                    <div class="row well" style="border-left: 3px solid #E77715;margin:10px;">
                                        <div class="col-sm-6">
                                            <label for="fecha_ingreso">FECHA DE INGRESO</label>
                                            <input type="date" class="form-control" id="fecha_ingreso" value="<?= date('Y-m-d', time()) ?>" readonly>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="fecha_entrega">* FECHA ESTIMADA DE ENTREGA</label>
                                            <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega" value="" required>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="deposito_garantia">Deposito en garantia</label>
                                            <input type="text" class="form-control" id="deposito_garantia" name="deposito_garantia" value="" placeholder="$ 000.00">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="imei">* IMEI</label>
                                            <input type="text" class="form-control" id="imei" name="imei" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="num_telefono_equipo">* Número de telefono</label>
                                            <input type="text" class="form-control" id="num_telefono_equipo" name="num_telefono_equipo" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="marca">* Marca</label>
                                            <input type="text" class="form-control" id="marca" name="marca" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="modelo">* Modelo</label>
                                            <input type="text" class="form-control" id="modelo" name="modelo" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="estado_fisico">* Estado fisico del equipo</label>
                                            <select class="form-control" name="estado_fisico" id="estado_fisico" required>
                                                <option>...</option>
                                                <option value="EXCELENTE">Excenlente</option>
                                                <option value="BUENO">Bueno</option>
                                                <option value="REGULAR">Regular</option>
                                                <option value="MALO">Malo</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="evidencias">Evidencias</label>
                                            <input type="file" class="form-control" id="evidencias" name="evidencias">
                                        </div>

                                        <div class="col-sm-12" style="margin-top:2em;">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label for="falla_reportada">* Falla reportada por el usuario</label>
                                                    <textarea class="form-control" name="falla_reportada" id="falla_reportada" rows="5" required></textarea>
                                                </div>

                                                <div class="col-xs-6">
                                                    <label for="detalle_extra">Detalles Extra</label>
                                                    <textarea class="form-control" name="detalle_extra" id="detalle_extra" rows="5"></textarea>
                                                </div> 
                                            </div> 
                                        </div>

                                        <div class="col-sm-12" style="margin-top:2em;">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label class="css-input css-radio css-radio-success">
                                                        <input name="tipo_bloqueo" type="radio" onclick="mostrarBloqueo('patron');" value="1"><span></span> <b>Patron de bloqueo</b>
                                                    </label>
                                                </div>
                                                <div class="col-xs-6">
                                                    <label class="css-input css-radio css-radio-success">
                                                        <input name="tipo_bloqueo" type="radio" onclick="mostrarBloqueo('codigo');" value="1"><span></span> <b>Codigo de bloqueo</b>
                                                    </label>
                                                </div> 
                                            </div>   
                                        </div>

                                        <div class="col-md-12">
                                            <div id="div-padron-bloqueo" style="display:none">
                                                <table class="table table-bordered" style="background:#fff;">
                                                    <tr class="text-center">
                                                        <td style="" colspan="3">
                                                            <h5 style="color:#e74c3c;">
                                                                Selecciona los cuadros para grabar el patron
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr style="color:#000; border: 2px solid #52BE80;" class="text-center">
                                                        <td style="border: 2px solid #52BE80;" id="casilla1" onclick="mostrarSeleccion(this.id);">*</td>
                                                        <td style="border: 2px solid #52BE80;" id="casilla2" onclick="mostrarSeleccion(this.id);">*</td>
                                                        <td style="border: 2px solid #52BE80;" id="casilla3" onclick="mostrarSeleccion(this.id);">*</td>
                                                    </tr>
                                                    <tr style="color:#000; border: 2px solid #52BE80;" class="text-center">
                                                        <td style="border: 2px solid #52BE80;" id="casilla4" onclick="mostrarSeleccion(this.id);">*</td>
                                                        <td style="border: 2px solid #52BE80;" id="casilla5" onclick="mostrarSeleccion(this.id);">*</td>
                                                        <td style="border: 2px solid #52BE80;" id="casilla6" onclick="mostrarSeleccion(this.id);">*</td>
                                                    </tr>
                                                    <tr style="color:#000; border: 2px solid #52BE80;" class="text-center">
                                                        <td style="border: 2px solid #52BE80;" id="casilla7" onclick="mostrarSeleccion(this.id);">*</td>
                                                        <td style="border: 2px solid #52BE80;" id="casilla8" onclick="mostrarSeleccion(this.id);">*</td>
                                                        <td style="border: 2px solid #52BE80;" id="casilla9" onclick="mostrarSeleccion(this.id);">*</td>
                                                    </tr>
                                                </table>                                            
                                            </div>
                                            <div id="div-codigo-bloqueo" style="display:none">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>
                                                            <h5 style="color:#e74c3c;">
                                                                Escribe el código de bloqueo
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="number" class="form-control" id="codigo_bloqueo" name="codigo_bloqueo" placeholder="Código de bloqueo">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <!-- END Div servicio_tecnico -->  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="tipo-bloqueo" name="tipo_bloqueo" value="">
                    <input type="hidden" id="casilla_seleccionada" name="casilla_seleccionada">
                    <input type="hidden" id="numero-inicial-patron" value="0">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-success" type="button" onclick="validarCampos('frm_nuevo_ingreso');">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END FRM Registrar Servicio Tecnico -->

<script>
    var contadorPatron = document.getElementById('numero-inicial-patron').value;
    var ultimoId;
    var casillaSeleccionada = '';
    function mostrarBloqueo(tipo){
        if(tipo == 'patron'){
            document.getElementById('div-padron-bloqueo').style.display = 'block';
            document.getElementById('div-codigo-bloqueo').style.display = 'none';
            document.getElementById('tipo-bloqueo').value = tipo;
        }else if(tipo == 'codigo'){
            document.getElementById('div-padron-bloqueo').style.display = 'none';
            document.getElementById('div-codigo-bloqueo').style.display = 'block';
            document.getElementById('tipo-bloqueo').value = tipo;
        }
    }

    function mostrarSeleccion(id){
        contadorPatron++;

        document.getElementById(id).style = 'background:#2ecc71;color:#fff;';
        document.getElementById(id).innerHTML = contadorPatron;

        casillaSeleccionada += id+',';

        document.getElementById('casilla_seleccionada').value = casillaSeleccionada;
    }
</script>

<div id="div-mostrar-cotizacion"></div>
<div id="div-mostrar-modal-cliente"></div>



<!-- Estatus de la reparación -->
<div class="modal fade" id="modal-historial-estatus" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <div class="modal-content">
            <?php 
            $atributos = array('class="form-horizontal push-10-t block-content"');
            echo form_open_multipart('backend/MOD_SERV_TECNICO/Serv_tecnico/agregar'); 
            ?>
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Historial de acciones</h3>
                    </div>
                    <div class="block-content">
                        <div id="div-mostrar-tabla"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Estatus de la reparación -->



<!-- Información del cliente -->
<div class="modal fade" id="estatus-reparacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <div class="modal-content">
            <?php 
            $atributos = array('class="form-horizontal push-10-t block-content"');
            echo form_open_multipart('backend/MOD_SERV_TECNICO/Serv_tecnico/agregar'); 
            ?>
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Información del cliente</h3>
                    </div>
                    <div class="block-content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Acción realizada</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-sm btn-success" type="submit">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Información del cliente -->


<!-- Modal importar datos -->
<div class="modal fade" id="modal-cargar-excel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <div class="modal-content">
            <form action="<?php echo base_url('backend/Excel_import/import_catalogo'); ?>" method="POST" enctype="multipart/form-data">
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Importar datos</h3>
                    </div>
                    <div class="block-content" style="margin-bottom: 4em;">
                        <div class="row text-justify">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-xs-12" style="margin-top: 1em;">
                                        <!-- Formulario de registro de usuario -->
                                            <label for="archivo_datos">* Selecciona el Excel con los datos que deseas cargar</label>
                                            <input class="form-control" type="file" id="archivo_datos" name="archivo_datos" required accept=".xls, .xlsx">
                                        <!-- END Formulario de registro de cliente -->  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 text-center" style="border-left:3px solid #2980b9">
                                <p>
                                    <b>Obtener formato de excel para registrar piezas de reparación</b>
                                </p>
                                
                                <a href="<?= base_url('assets/formatos/formato_para_inventario.xlsx') ?>" target="_new" class="btn btn-info">
                                    <i class="fa fa-download"></i> Descargar formato
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-success" type="submit">
                        <i class="fa fa-check"></i> Cargar datos
                    </button>
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Modal importar datos -->


<!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
<script src="<?php echo base_url(); ?>assets/js/propios/servicio.js"></script>
<script src="<?php echo base_url(); ?>assets/js/propios/inventario.js"></script>
<script src="<?php echo base_url(); ?>assets/js/propios/funciones.js"></script>
<script src="<?php echo base_url(); ?>assets/js/propios/barcode.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.scrollLock.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.appear.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.countTo.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.placeholder.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/js.cookie.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>


<!-- Page JS Code -->
<script>
    jQuery(function () {
        // Init page helpers (Table Tools helper)
        App.initHelpers('table-tools');
    });
</script>