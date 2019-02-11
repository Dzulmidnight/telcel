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
                                <table class="table table-bordered table-condensed table-striped" style="font-size: 12px !important;">
                                    <tr>
                                        <td>
                                            Deposito del cliente
                                        </td>
                                        <td>
                                            <b>$ <?= $row_detalle_cotizacion->deposito_garantia; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Costo de repación:
                                        </td>
                                        <td>
                                            <?php 
                                                $restante = ($row_cotizacion->costo) - ($row_detalle_cotizacion->deposito_garantia);
                                             ?>   
                                            $ <?= $row_cotizacion->costo; ?> (<span style="color:red">- $ <?= $row_detalle_cotizacion->deposito_garantia; ?></span>) = $ <b style="color:#27ae60"><?= $restante; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Fecha de entrega
                                        </td>
                                        <td>
                                            <b><?= date('d/m/Y', $row_detalle_cotizacion->fecha_entrega); ?></b>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-6">
                                <table class="table table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="text-center" style="font-size: 12px;">
                                                Piezas utilizadas
                                            </th>
                                        </tr>
                                        <tr>
                                            <th style="font-size: 12px;">Pieza</th>
                                            <th style="font-size: 12px;">Modelo</th>
                                            <th style="font-size: 12px;">Color</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 12px; background:#ecf0f1; color:#2c3e50;">
                                        <?php foreach($row_piezas_cotizacion as $pieza): ?>
                                            <tr>
                                                <td><?= $pieza->nombre_pieza; ?></td>
                                                <td><?= $pieza->modelo; ?></td>
                                                <td><?= $pieza->color; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>    
                            </div>

                            <div class="col-md-12">
                                <p>
                                    <b>Descripción del servicio</b>
                                </p>
                                <p>
                                    <?= $row_cotizacion->descripcion; ?>
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