<!-- You can use the .hidden-print class to hide an element in printing -->
<div class="content bg-gray-lighter hidden-print">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                Ficha de servicio
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <button class="btn btn-rounded btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content content-boxed">
    <!-- Invoice -->
    <div class="block">
        <div class="block-header">
            <ul class="block-options">
                <li>
                    <!-- Print Page functionality is initialized in App() -> uiHelperPrint() -->
                    <button type="button" onclick="App.initHelper('print-page');"><i class="si si-printer"></i> Print Invoice</button>
                </li>
            </ul>
            <h3 class="block-title">#INV0625</h3>
        </div>

        <div class="block-content block-content-narrow">
            <!-- Invoice Info -->
            <div class="h1 text-center push-30-t push-30 hidden-print">
                FICHA DE SERVICIO
            </div>
            <hr class="hidden-print">
            <div class="row items-push-2x">
                <!-- Company Info -->
                <div class="col-md-4 col-lg-4" style="padding: 0px;margin: 0px;">
                    <p class="h4">Cliente</p>
                    <address>
                        <?= $row_detalle_ficha->nombre_cliente.' '.$row_detalle_ficha->ap_paterno.' '.$row_detalle_ficha->ap_materno; ?><br>
                        <?= $row_detalle_ficha->nombre_sucursal; ?> <br>
                        <i class="si si-call-end"></i> <?= $row_detalle_ficha->telefono_cliente; ?>
                    </address>
                </div>
                <!-- END Company Info -->
                
                <div class="col-md-4 col-lg-4" style="padding: 0px;margin: 0px;">
                    <p class="h4">Detalles</p>
                    <address>
                        <?= $row_detalle_ficha->informacion_extra_cliente; ?>
                    </address>
                </div>

                <div class="col-md-4 col-lg-4" style="padding: 0px;margin: 0px;">
                    <canvas id="barcode_ficha_pdf"></canvas>
                </div>

                <!-- Company Info -->
                <div class="col-xs-12 col-sm-12 col-lg-12" style="padding: 0px;margin: 0px;">
                    <p class="h4">Falla reportada</p>
                    <address>
                        <?= $row_detalle_ficha->falla_reportada; ?>
                    </address>
                </div>
                <!-- END Company Info -->  


                <div class="col-lg-12">
                    <div class="row">

                    </div>
                </div>

                <!-- Client Info -->
                <!--<div class="col-xs-6 col-sm-4 col-sm-offset-4 col-lg-3 col-lg-offset-6 text-right">
                    <p class="h2 font-w400 push-5">Client</p>
                    <address>
                        Address<br>
                        Town/City<br>
                        Region, Zip/Postal Code<br>
                        <i class="si si-call-end"></i> (000) 000-0000
                    </address>
                </div>-->
                <!-- END Client Info -->
            </div>
            <!-- END Invoice Info -->

            <!-- Table -->
            <div class="table-responsive push-50">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">
                                Fecha
                            </th>
                            <th>Servicio realizado</th>
                            <th class="text-center" style="width: 100px;">Importe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <?= date('d/m/Y', $row_detalle_ficha->fecha_actualizacion); ?>
                            </td>
                            <td>
                                <!--<p class="font-w600 push-10">App Design &amp; Development</p>-->
                                <div class="text-muted">
                                    <?= $row_detalle_ficha->descripcion_servicio; ?>
                                </div>
                            </td>
                            <td class="text-right">$ <?= $row_detalle_ficha->costo_servicio; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="font-w600 text-right">Depósito en garantía</td>
                            <td class="text-right">
                                $ <?= $row_detalle_ficha->deposito_garantia ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="font-w600 text-right">Restante</td>
                            <td class="text-right" style="color: #27ae60">
                                <?php 
                                    $monto_restante = ($row_detalle_ficha->costo_servicio) - ($row_detalle_ficha->deposito_garantia);
                                 ?>
                                <b>$ <?= $monto_restante; ?></b>        
                            </td>
                        </tr>
                        <tr class="active">
                            <td colspan="2" class="font-w700 text-uppercase text-right">Total</td>
                            <td class="font-w700 text-right">
                                $ <?= $row_detalle_ficha->costo_servicio; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- END Table -->

            <!-- Footer -->
            <hr class="hidden-print">
            <p class="text-muted text-center"><small>Muchas gracias por su preferencia</small></p>
            <!-- END Footer -->
        </div>
    </div>
    <!-- END Invoice -->
</div>
<!-- END Page Content -->
<svg id="barcode"></svg>

<script>
JsBarcode("#barcode", "Hi world!");
</script>

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
