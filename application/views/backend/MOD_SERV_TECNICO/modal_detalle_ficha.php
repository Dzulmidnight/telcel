<!-- Ficha de Servicio -->
<div class="modal fade" id="modal-detalle-ficha" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout">
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
                        <h3 class="block-title">Ficha de Servicio</h3>
                    </div>
                    <!-- Invoice -->
                    <div class="block">
                        <div class="block-header">
                            <ul class="block-options">
                                <li>
                                    <!-- Print Page functionality is initialized in App() -> uiHelperPrint() -->
                                    <!--<button type="button" onclick="App.initHelper('print-page');"><i class="si si-printer"></i> Print Invoice</button>
                                    <button type="button" onclick="descargarPdfFichaServicio('<?= base_url(); ?>',<?= $row_detalle_ficha->id_servicio_tecnico; ?>, <?= $row_detalle_ficha->codigo_barras; ?>);"><i class="si si-printer"></i> Imprimir Ficha</button>-->
                                </li>
                                <li>
                                    <!--<button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>-->
                                </li>
                                <li>
                                    <!--<button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>-->
                                </li>
                            </ul>
                            <h3 class="block-title">

                                # <?= $row_detalle_ficha->codigo_barras; ?>    
                            </h3>
                        </div>
                        <div class="block-content block-content-narrow">
                            <!-- Invoice Info -->
                            <div class="h1 text-center push-30-t push-30 hidden-print">
                                FICHA DE SERVICIO
                            </div>
                            <hr class="hidden-print">
                            <div class="row items-push-2x">
                                <!-- Company Info -->
                                <div class="col-md-4 col-lg-4">
                                    <p class="h4 font-w400 push-5">Cliente</p>
                                    <address>
                                        <?= $row_detalle_ficha->nombre_cliente.' '.$row_detalle_ficha->ap_paterno.' '.$row_detalle_ficha->ap_materno; ?><br>
                                        <?= $row_detalle_ficha->nombre_sucursal; ?> <br>
                                        <i class="si si-call-end"></i> <?= $row_detalle_ficha->telefono_cliente; ?>
                                    </address>
                                </div>
                                <!-- END Company Info -->
                                
                                <div class="col-md-4 col-lg-4">
                                    <p class="h4 font-w400 push-5">Detalles</p>
                                    <address>
                                        <?= $row_detalle_ficha->informacion_extra_cliente; ?>
                                    </address>
                                </div>

                                <div class="col-md-4 col-lg-4">
                                    <canvas id="barcode_ficha"></canvas>
                                </div>

                                <!-- Company Info -->
                                <div class="col-xs-12 col-sm-12 col-lg-12">
                                    <p class="h4 font-w400 push-5">Falla reportada</p>
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
                                        <!-- DEPOSITO EN GARANTIA -->
                                        <tr>
                                            <td colspan="2" class="font-w600 text-right">Depósito en garantía</td>
                                            <td class="text-right">
                                                $ <?= $row_detalle_ficha->deposito_garantia ?>
                                            </td>
                                        </tr>
                                        <!-- SALDO RESTANTE -->
                                        <tr>
                                            <td colspan="2" class="font-w600 text-right">Restante</td>
                                            <td class="text-right" style="color: #27ae60">
                                                <?php 
                                                    $monto_restante = ($row_detalle_ficha->costo_servicio) - ($row_detalle_ficha->deposito_garantia);
                                                 ?>
                                                <b>$ <?= $monto_restante; ?></b>        
                                            </td>
                                        </tr>
                                        <!-- TOTAL -->
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
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Ficha de Servicio -->