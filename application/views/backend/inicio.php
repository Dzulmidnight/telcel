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
            <div class="col-md-7">
                <?= $menu_general; ?>
                <?= $modal_ventas; ?>  
            </div>

            <div class="col-md-5">
                <?php 
                    $en_espera = 0;
                    $finalizados = 0;
                    foreach ($row_servicios as $servicio) {
                        $en_espera++;
                    }
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
                    <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
                        <li class="active">
                            <a href="#btabs-equipos-finalizados">En espera (<?= $en_espera; ?>)</a>
                        </li>
                        <li>
                            <a href="#btabs-equipos-cotizacion">Finalizados</a>
                        </li>
                        <li class="pull-right">
                            <a href="#btabs-alt-static-settings" data-toggle="tooltip" title="Settings"><i class="si si-settings"></i></a>
                        </li>
                    </ul>
                    <div class="block-content tab-content">
                        <!-- Equipos en espera -->
                        <div class="tab-pane active" id="btabs-equipos-finalizados">
                            <h4 class="font-w300 push-15">Equipos en espera </h4>
                            <table class="table table-condensed" style="font-size:12px;">
                                <thead>
                                    <tr>
                                        <th style="font-size:12px;">Fecha</th>
                                        <th style="font-size:12px;">Cliente</th>
                                        <th style="font-size:12px;">Codigo</th>
                                        <th style="font-size:12px;">Estatus</th>
                                        <th>
                                            ...
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($row_servicios as $servicio): ?>
                                        <tr>
                                            <td>
                                                <?= date('d/m/Y', $servicio->fecha_registro); ?>
                                            </td>
                                            <td>
                                                <?= $servicio->nombre_cliente; ?>
                                                <br>
                                                <?= $servicio->telefono_cliente; ?>
                                            </td>
                                            <td>
                                                <?= $servicio->codigo_barras; ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if($servicio->estatus == 'COTIZACION'){
                                                    ?>
                                                        <a class="btn btn-xs btn-info" href="#" onclick="modalCotizacion('<?= base_url(); ?>',<?= $servicio->id_servicio_tecnico; ?>, 'div-mostrar-cotizacion');">
                                                            <i class="fa fa-search"></i> Cotización
                                                        </a>
                                                    <?php
                                                    }else{
                                                        echo $servicio->estatus;
                                                    }
                                                 ?>
                                            </td>
                                            <td>
                                                <form action="<?= base_url('backend/MOD_SERV_TECNICO/Serv_tecnico/actualizar_estatus_cotizacion'); ?>" id="frm-informacion-cotizacion" method="POST">
                                                    <input type="hidden" id="id_servicio_tecnico" name="id_servicio_tecnico" value="<?= $servicio->id_servicio_tecnico; ?>">
                                                    <input type="hidden" name="fecha_registro" value="<?= time();?>">
                                                    <input type="hidden" id="estatus_cotizacion_servicio" name="estatus_cotizacion_servicio" value="">
                                                </form>
                                                <?php 
                                                    if($servicio->estatus == 'COTIZACION'){
                                                    ?>
                                                        <button class="btn btn-xs btn-success" data-toggle="tooltip" title="Aceptar cotización" onclick="aceptarCotizacion('frm-informacion-cotizacion');">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                        <button class="btn btn-xs btn-warning" data-toggle="tooltip" title="Rechazar cotización" onclick="rechazarCotizacion('frm-informacion-cotizacion');">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    <?php
                                                    }
                                                 ?>
                                                <a class="btn btn-xs btn-info" href="<?= base_url('backend/MOD_SERV_TECNICO/Serv_tecnico/ficha_servicio/'.$servicio->id_servicio_tecnico); ?>" data-toggle="tooltip" title="Ficha de servicio">
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
                            <p>Contactar al cliente para entregar el equipo.</p>
                            <table class="table table-condensed" style="font-size: 11px;">
                                <?php foreach($row_entregas as $entregas): ?>
                                    <tr>
                                        <td>
                                            <i class="fa fa-circle" style="color:#c0392b;"></i> <?= date('d/m/Y', $entregas->fecha_entrega); ?>
                                        </td>
                                        <td>
                                            <?= $entregas->nombre_cliente.' '.$entregas->ap_paterno; ?>
                                        </td>
                                        <td>
                                            <a href="#" data-toggle="tooltip" title="Consultar ficha de servicio" onclick="modalFichaServicio('<?= base_url(); ?>', <?= $entregas->id_servicio_tecnico; ?>,'div-mostrar-ficha', <?= $entregas->codigo_barras; ?>);">
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
                                            <button type="button" class="btn btn-success" data-toggle="tooltip" title="Marcar como entregado" onclick="entregarEquipo('frm_entregar_equipo','<?= $entregas->id_servicio_tecnico; ?>');">
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
                            </table>
                        </div>
                        <!-- END Equipos finalizados -->

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