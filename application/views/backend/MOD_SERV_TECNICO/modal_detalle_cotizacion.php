<!-- Modal Detalle Cliente -->
<div class="modal fade" id="modal-detalle-cotizacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <div class="modal-content">

            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Detalle de la cotización</h3>
                </div>
                <div class="block-content">
                    <div class="row">
                        <div class="block-content block-content-full">
                            <div class="col-md-6">
                                <p>
                                    <b>Deposito:</b> $ <?= $row_detalle_cotizacion->deposito_garantia; ?>
                                </p>
                                <p>
                                    <?php 
                                        $restante = ($row_detalle_cotizacion->costo_servicio) - ($row_detalle_cotizacion->deposito_garantia);
                                     ?>
                                    <b>Costo de repación:</b> 
                                    <br>
                                    $ <?= $row_detalle_cotizacion->costo_servicio; ?> (<span style="color:red">- $ <?= $row_detalle_cotizacion->deposito_garantia; ?></span>) = $ <span style="color:#27ae60"><?= $restante; ?></span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <b>Fecha de entrega: </b><?= date('d/m/Y', $row_detalle_cotizacion->fecha_entrega); ?>
                                </p>
                            </div>
                            <div class="col-md-12">
                                <p>
                                    <b>Descripción del servicio</b>
                                </p>
                                <p>
                                    <?= $row_detalle_cotizacion->descripcion_servicio; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- END Modal Detalle Cliente -->