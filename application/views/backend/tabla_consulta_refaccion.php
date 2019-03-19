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
        <input type="hidden" id="total_consulta_refaccion" value="<?= count($row_consulta_refaccion); ?>">
        <?php foreach($row_consulta_refaccion as $consulta_refaccion): ?>
            <tr>
                <!-- Fecha -->
                <td>
                    <?= date('d/m/Y', $consulta_refaccion->fecha_registro); ?>
                </td>

                <!-- Nombre pieza -->
                <td>
                    <?= $consulta_refaccion->nombre; ?>
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
                    Tel: <b><?= $consulta_refaccion->modelo_telefono; ?></b>
                    <br>
                    Marca: <b><?= $consulta_refaccion->marca_telefono; ?></b>
                </td>

                <!-- Acciones -->
                <td>
                    <button type="button" class="btn btn-sm btn-info" data-toggle="tooltip" title="Asignar precio" onclick="asignarPrecio('<?= base_url(); ?>', <?= $consulta_refaccion->id_consulta_pieza; ?>);">
                        <i class="fa fa-dollar"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>