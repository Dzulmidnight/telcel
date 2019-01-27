<table class="table">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Acción realizada</th>
        </tr>
    </thead>
    <tbody id="tabla-historial">
        <?php foreach($row_historial_acciones as $historial): ?>
            <tr>
                <td><?= date('d/m/Y', $historial->fecha_registro); ?></td>
                <td><?= $historial->accion_realizada; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>