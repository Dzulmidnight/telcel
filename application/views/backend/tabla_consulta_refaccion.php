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
        <input type="hidden" id="total_consulta_refaccion" value="<?= count($row_consulta_refaccion2); ?>">
            <?php foreach($row_consulta_refaccion2 as $value): ?>
                <tr>
                    <td colspan="6">
                        Cotización en espera: ID <?= $value->id_cotizacion_servicio; ?>
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
                            <button type="button" class="btn btn-sm btn-info" data-toggle="tooltip" title="Asignar precio" onclick="asignarPrecio('<?= base_url(); ?>', <?= $pieza->id_catalogo_piezas_reparacion; ?>, <?= $value->id_cotizacion_servicio; ?>, '<?= $value->costo; ?>');">
                                <i class="fa fa-dollar"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach;?>

            <?php endforeach; ?>
    </tbody>
</table>