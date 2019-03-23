<style>
    .fuente11{
        font-size: 11px;
    }
</style>
<!-- Page Content -->
<div class="content">

    <div class="content-grid push-50">
        <div class="row">
            <!--<div class="col-md-3">

                <button class="btn btn-danger" data-toggle="modal" data-target="#modalVenta">
                    <i class="si si-dollar"></i> Venta de productos
                </button>
            </div>-->
            <div class="col-md-6">
                <?= $menu_general; ?>
                <?= $modal_ventas; ?>  
            </div>

            <div class="col-md-6">
                <?php 
                    $en_espera = count($row_servicios_en_espera);
                    $por_entregar = count($row_servicios_por_entregar);
                    $refaccion = count($row_consulta_refaccion);
                 ?>
                <!-- Block Tabs Alternative Style -->
                <label for="busqueda_cliente">Consultar servicio</label>
                <div class="input-group">
                    <input class="form-control" type="email" id="busqueda_cliente" onkeyup="buscarServicio(this.value, '<?= base_url(); ?>');" placeholder="# de servicio">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick="limpiarCampo('busqueda_cliente');">Limpiar</button>
                    </span>
                </div>
                <br>
                <div class="block" id="div-servicios"></div>
                <div class="block" id="div-notificaciones">
                    <h4 class="text-center" style="background:#ecf0f1; padding:10px;">
                        Servicio tecnico
                    </h4>
                    <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
                        <li class="active">
                            <a href="#btabs-equipos-finalizados">
                                En espera (<?= $en_espera; ?>)
                            </a>
                        </li>
                        <li>
                            <a href="#btabs-equipos-cotizacion">
                                Por entregar (<?= $por_entregar; ?>)
                            </a>
                        </li>
                        <li>
                            <a href="#btabs-consulta-refacciones">
                                Refacciones (<span id="totalRefaccion_span"><?= $refaccion; ?></span>)
                            </a>
                        </li>
                        <li class="pull-right">
                            <a href="#btabs-alt-static-settings" data-toggle="tooltip" title="Settings"><i class="si si-settings"></i></a>
                        </li>
                    </ul>
                    <div class="block-content tab-content">
                        <!-- Equipos en espera -->
                        <div class="tab-pane active" id="btabs-equipos-finalizados">
                            <h4 class="font-w300 push-15">Equipos en espera</h4>
                            <table class="table table-condensed table-hover" style="font-size:11px;">
                                <thead>
                                    <tr>
                                        <th style="font-size:11px;">Fecha</th>
                                        <th style="font-size:11px;">Cliente</th>
                                        <th style="font-size:11px;">Codigo</th>
                                        <th style="font-size:11px;">Estatus</th>
                                        <th>
                                            ...
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($row_servicios_en_espera as $servicio_en_espera): ?>
                                        <tr>
                                            <td>
                                                <?php 
                                                    if($servicio_en_espera->estatus == 'COTIZACION'){
                                                        echo '<a style="font-size:16px;" href="#" data-toggle="tooltip" title="El cliente debe aceptar o rechazar la cotización."><i class="fa fa-info-circle"></i></a>';
                                                    }else{
                                                        echo '<a style="color:#e74c3c;font-size:16px;" href="#" data-toggle="tooltip" title="Se debe generar una cotización de servicio."><i class="fa fa-info-circle"></i></a>';
                                                    }
                                                 ?>
                                                <?= date('d/m/Y', $servicio_en_espera->fecha_registro); ?>
                                            </td>
                                            <td style="font-weight:bold;">
                                                <?= $servicio_en_espera->nombre_cliente; ?>
                                                <?php 
                                                    if(isset($servicio_en_espera->telefono_cliente)){
                                                        echo '<br>';
                                                        echo '<i class="fa fa-phone"></i> '.$servicio_en_espera->telefono_cliente;
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?= $servicio_en_espera->codigo_barras; ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if(isset($servicio_en_espera->id_consulta_pieza)){
                                                        echo $servicio_en_espera->tiempo_entrega;
                                                    }
                                                 ?>
                                                <?php 
                                                    if($servicio_en_espera->estatus == 'COTIZACION'){
                                                    ?>
                                                        <a class="btn btn-xs btn-info" href="#" onclick="modalCotizacion('<?= base_url(); ?>',<?= $servicio_en_espera->id_servicio_tecnico; ?>, 'div-mostrar-cotizacion');">
                                                            <i class="fa fa-search"></i> Cotización
                                                        </a>
                                                    <?php
                                                    }else{
                                                        echo $servicio_en_espera->estatus;
                                                    }
                                                 ?>
                                            </td>
                                            <td>
                                                <form action="<?= base_url('backend/MOD_SERV_TECNICO/Serv_tecnico/actualizar_estatus_cotizacion'); ?>" id="frm-informacion-cotizacion<?= $servicio_en_espera->id_cotizacion_servicio; ?>" method="POST">
                                                    <input type="hidden" id="id_servicio_tecnico" name="id_servicio_tecnico" value="<?= $servicio_en_espera->id_servicio_tecnico; ?>">
                                                    <input type="hidden" name="fecha_registro" value="<?= time();?>">
                                                    <input type="hidden" id="estatus_cotizacion_servicio<?= $servicio_en_espera->id_servicio_tecnico; ?>" name="estatus_cotizacion_servicio" value="">
                                                </form>
                                                <?php 
                                                    if($servicio_en_espera->estatus == 'COTIZACION'){
                                                    ?>
                                                        <button class="btn btn-xs btn-success" data-toggle="tooltip" title="Aceptar cotización" onclick="aceptarCotizacion('frm-informacion-cotizacion', <?= $servicio_en_espera->id_cotizacion_servicio; ?>);">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                        <button class="btn btn-xs btn-warning" data-toggle="tooltip" title="Rechazar cotización" onclick="rechazarCotizacion('frm-informacion-cotizacion<?= $servicio_en_espera->id_cotizacion_servicio; ?>');">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    <?php
                                                    }
                                                 ?>
                                                <a class="btn btn-xs btn-info" href="<?= base_url('backend/MOD_SERV_TECNICO/Serv_tecnico/ficha_servicio/'.$servicio_en_espera->id_servicio_tecnico); ?>" data-toggle="tooltip" title="Ficha de servicio">
                                                    <i class="si si-note"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- END Equipos en espera -->

                        <!-- Equipos finalizados -->
                        <div class="tab-pane" id="btabs-equipos-cotizacion">
                            <h4 class="font-w300 push-15">Equipos finalizados</h4>
                            <p style="background:#e74c3c;color:#fff;padding:1em;">
                                <i class="fa fa-warning"></i> Contactar al cliente para entregar el equipo.
                            </p>
                            <table class="table table-condensed" style="font-size: 11px;">
                                <thead>
                                    <tr>
                                        <th style="font-size:11px;">Fecha</th>
                                        <th style="font-size:11px;">Cliente</th>
                                        <th style="font-size:11px;">Ficha</th>
                                        <th style="font-size:11px;">Telefono</th>
                                        <th style="font-size:11px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($row_servicios_por_entregar as $entregas): ?>
                                        <tr>
                                            <td>
                                                <?= 'cot: '.$entregas->id_cotizacion_servicio; ?>
                                                <i class="fa fa-circle" style="color:#c0392b;"></i> <?= date('d/m/Y', $entregas->fecha_entrega); ?>
                                            </td>
                                            <td>
                                                <?= $entregas->nombre_cliente.' '.$entregas->ap_paterno; ?>
                                            </td>
                                            <td>
                                                <a href="#" data-toggle="tooltip" title="Consultar ficha de servicio" onclick="modalFichaServicio('<?= base_url(); ?>', <?= $entregas->id_servicio_tecnico; ?>,'div-mostrar-ficha', <?= $entregas->codigo_barras; ?>);">
                                                    <i class="si si-briefcase"></i> <?= $entregas->codigo_barras; ?>
                                                </a>
<br>
                                                <a href="#" data-toggle="tooltip" title="Consultar ficha de servicio" onclick="modalFichaServicio2('<?= base_url(); ?>', <?= $entregas->id_servicio_tecnico; ?>, <?= $entregas->id_cotizacion_servicio; ?>);">
                                                    <i class="si si-briefcase"></i> <?= $entregas->codigo_barras; ?>
                                                </a>

                                                <!--<a href="<?= base_url('backend/MOD_SERV_TECNICO/Serv_tecnico/modal_ficha_servicio/'.$entregas->id_servicio_tecnico.''); ?>" data-toggle="tooltip" title="Consultar ficha de servicio">
                                                    <i class="si si-briefcase"></i> <?= $entregas->codigo_barras; ?>
                                                </a>-->
                                            </td>
                                            <td>
                                                <i class="si si-call-in"></i> <?= $entregas->telefono_cliente; ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-xs btn-success" data-toggle="tooltip" title="Marcar como entregado" onclick="entregarEquipo('frm_entregar_equipo','<?= $entregas->id_servicio_tecnico; ?>');">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                <!--<button class="btn btn-xs btn-success" data-toggle="tooltip" title="Entregar">
                                                    <i class="fa fa-check"></i>
                                                </button>-->
                                                <!--<button class="btn btn-xs btn-danger" data-toggle="tooltip" title="">
                                                    <i class="fa fa-close"></i>
                                                </button>-->
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- END Equipos finalizados -->

                        <!-- Consulta precios refacciones -->
                        <div class="tab-pane" id="btabs-consulta-refacciones">
                            <h4 class="font-w300 push-15">
                                Consulta sobre refacciones
                            </h4>
                            <p style="background:#e74c3c;color:#fff;padding:1em;">
                                <i class="fa fa-warning"></i> Debes agregar el precio de las siguiente piezas.
                            </p>
                            <div id="tablaConsultaRefaccion_div">
                                <table class="table table-condensed" style="font-size: 11px;">
                                    <thead>
                                        <tr>
                                            <th style="font-size:11px;">Fecha</th>
                                            <th style="font-size:11px;">Nombre</th>
                                            <th style="font-size:11px;">Modelo</th>
                                            <th style="font-size:11px;">Color</th>
                                            <th style="font-size:11px;">Detalle</th>
                                            <th>
                                                ...
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($row_consulta_refaccion2 as $value): ?>
                                            <tr>
                                                <td colspan="6">
                                                    Cotización en espera: ID <?= $value->id_cotizacion_servicio; ?>
                                                    <br>
                                                    servicio: <?= $value->id_servicio_tecnico; ?>
                                                </td>
                                            </tr>
                                            <?php foreach($row_piezas_cotizacion[$value->id_cotizacion_servicio] as $pieza): ?>
                                                <tr style="background:#ecf0f1;">
                                                    <td>
                                                        <?= date('d/m/Y', $pieza->fecha_registro); ?>
                                                    </td>
                                                    <td>
                                                        <?= $pieza->nombre_pieza; ?>
                                                    </td>
                                                    <td>
                                                        <?= $pieza->modelo; ?>
                                                    </td>
                                                    <td>
                                                        <?= $pieza->color; ?>
                                                    </td>
                                                    <td>
                                                        Tel: <b><?= $value->modelo_telefono; ?></b>
                                                        <br>
                                                        Marca: <b><?= $value->marca_telefono; ?></b>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-info" data-toggle="tooltip" title="Asignar precio" onclick="asignarPrecio('<?= base_url(); ?>', <?= $pieza->id_catalogo_piezas_reparacion; ?>, <?= $value->id_cotizacion_servicio; ?>, '<?= $value->costo; ?>', <?= $value->id_servicio_tecnico; ?>);">
                                                            <i class="fa fa-dollar"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>

                                        <?php endforeach; ?>



                                        <?php foreach($row_consulta_refaccion as $consulta_refaccion): /* ?>
                                            <tr>
                                                <!-- Fecha -->
                                                <td>
                                                    <?php echo 'ID: '.$consulta_refaccion->id_catalogo_piezas_reparacion; ?>
                                                    <?= date('d/m/Y', $consulta_refaccion->fecha_registro); ?>
                                                </td>

                                                <!-- Nombre pieza -->
                                                <td>
                                                    <?= $consulta_refaccion->nombre_pieza; ?>
                                                </td>

                                                <!-- Modelo de la pieza -->
                                                <td>
                                                    <?= $consulta_refaccion->modelo; ?>
                                                </td>

                                                <!-- Color de la pieza -->
                                                <td>
                                                    <?= $consulta_refaccion->color; ?>
                                                </td>

                                                <!-- Detalles extra -->
                                                <td>
                                                    <?php foreach($detalle_refaccion[$consulta_refaccion->id_catalogo_piezas_reparacion] as $detalle):?>
                                                        Tel: <b><?= $detalle->modelo_telefono; ?></b>
                                                        <br>
                                                        Marca: <b><?= $detalle->marca_telefono; ?></b>
                                                    <?php endforeach; ?>
                                                </td>

                                                <!-- Acciones -->
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-info" data-toggle="tooltip" title="Asignar precio" onclick="asignarPrecio('<?= base_url(); ?>', <?= $consulta_refaccion->id_catalogo_piezas_reparacion; ?>);">
                                                        <i class="fa fa-dollar"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php */ endforeach; ?>
                                    </tbody>
                                </table>                                
                            </div>

                        </div>
                        <!-- END Consulta precios refacciones -->


                        <div class="tab-pane" id="btabs-alt-static-settings">
                            <h4 class="font-w300 push-15">Settings Tab</h4>
                            <p>...</p>
                        </div>
                    </div>
                </div>
                <!-- END Block Tabs Alternative Style -->

            </div>            
        </div>
    </div>

    <form id="frm_entregar_equipo" action="<?= base_url('backend/MOD_SERV_TECNICO/Serv_tecnico/entregar_equipo'); ?>" method="POST">
        <input type="hidden" id="id_frm_servicio_tecnico" name="id_frm_servicio_tecnico" value="">
        <input type="hidden" id="monto_pagado" name="monto_pagado">
        <input type="hidden" name="fecha_registro" value="<?= time(); ?>">
    </form>

    <!-- END Modulos -->

</div>

</script>

<div id="div-mostrar-ficha"></div>
<div id="div-mostrar-cotizacion"></div>
<!-- END Page Content -->
<!--<div class="col-md-12">
	<h3>EL CODIGO DE BARRAS</h3>
	<canvas id="barcode"></canvas>

	<button type="button" onclick='otraFuncion();'>
		Generar codigo
	</button>

    <a href="javascript:genPDF()">
        Generar pdf
    </a>

</div>-->

<!-- Modal mostrar codigo de barras -->
<div class="modal" id="modalPrecioRefaccion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-popout">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">
                        Petición de refacción
                    </h3>
                </div>
                <div class="block-content" style="margin-bottom: 4em;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="" for="precio_interno_refaccion">
                                    Precio Interno
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input type="text" class="form-control" id="precio_interno_refaccion" name="precio_interno_refaccion" placeholder="Ej: 100.00">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="" for="precio_publico_refaccion">
                                    Precio al Publico
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input type="text" class="form-control" id="precio_publico_refaccion" name="precio_publico_refaccion" placeholder="Ej: 100.00">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="" for="tiempo_entrega_refaccion">
                                    Tiempo de entrega
                                </label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="tiempo_entrega_refaccion" name="tiempo_entrega_refaccion" placeholder="Ej: 4">
                                    <div class="input-group-addon">Dia(s)</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                <button type="button" id="notificarConsulta_btn" class="btn btn-sm btn-success">
                    Notificar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END Modal mostrar codigo de barras -->

<!-- Modal mostrar PDF FICHA SERVICIO -->
<div class="modal fade" id="modalPdfFicha" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">FICHA DE SERVICIO</h3>
                </div>
                <div class="block-content" style="margin-bottom: 4em;">
                    <iframe id="framePdfFichaServicio" src="" height="500px" width="100%" frameborder="0"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- END Modal mostrar PDF FICHA SERVICIO -->

<script src="<?php echo base_url(); ?>assets/js/propios/ventas.js"></script>
<script src="<?php echo base_url(); ?>assets/js/propios/inventario.js"></script>
<script src="<?php echo base_url(); ?>assets/js/propios/funciones.js"></script>
<script src="<?php echo base_url(); ?>assets/js/propios/servicio.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.scrollLock.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.appear.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.countTo.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.placeholder.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/js.cookie.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>

<script>

    function genPDF(){
        var doc = new jsPDF();
        doc.text(20,20,'Algo de texto');
        doc.addPage();
        doc.text(20,20,'Algo de texto3');
        JsBarcode("#barcode", "22342341");    
        var canvas = document.getElementById('barcode');
        //var jpegUrl = $("#barcode").toDataURL("image/jpeg");
        var image = canvas.toDataURL("image/png").replace("image/jpeg", "");
        //var myImage = canvas1.toDataURL("image/png");
        doc.addImage(image, 'JPEG', 0, 0,0,0);
        doc.addImage(image, 'JPEG', 20, 20,20,20);
        doc.addImage(image, 'JPEG', 3, 3,3,2);
        //doc.addImage(image, 'JPEG', 0, 0, 0, 0);
        //doc.addImage(image, 'JPEG', 0, 0, 0, 0);

        doc.save('text.pdf');
    }

</script>