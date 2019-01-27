<!-- Modal Detalle Cliente -->
<div class="modal fade" id="modal-detalle-cliente" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <div class="modal-content">

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
                    <div class="row">
                        <div class="block-content block-content-full">
                            <div class="col-md-12 h4 push-5">
                                <?= $row_cliente->nombre.' '.$row_cliente->ap_paterno.' '.$row_cliente->ap_materno; ?>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <b>Telefono:</b> <?= $row_cliente->telefono; ?>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <b>Email:</b> <?= $row_cliente->email; ?>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <b>Información Extra:</b>
                                </p>
                                
                                <p>
                                    <?= $row_cliente->informacion_extra; ?>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <b>Registrado en:</b> <?= $row_cliente->nombre_sucursal; ?>
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