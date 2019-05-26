<table class="table table-striped">
    <thead>
        <tr>
            <th class="success text-left" colspan="8">
                REGISTRO DE VENTAS REALIZADAS AL DÍA <b style="color:#e74c3c;"><?= date('d / m / Y', time()); ?></b>
            </th>
        </tr>
        <tr>
            <th style="font-size:12px;">
                #
            </th>
            <!--<th style="font-size:12px;">
                ID
            </th>-->
            <th style="font-size:12px;">
                FECHA
            </th>
            <th style="font-size:12px;">
                SUCURSAL
            </th>
            <th style="font-size:12px;">
                VENDEDOR
            </th>
            <th style="font-size:12px;">
                ARTICULO
            </th>
            <th style="font-size:12px;">
                VENDIDOS
            </th>
            <th style="font-size:12px;">
                MONTO
            </th>
            <th style="font-size:12px;">
                STOCK
            </th>
        </tr>
    </thead>
    <tbody style="font-size:12px;">
        <?php
            $contador = 0;
            foreach ($row_listado_ventas as $venta) {
            $contador++;
        ?>
                <tr>
                    <!-- # -->
                    <td>
                        <?= $contador; ?>
                    </td>

                    <!-- ID VENTA -->
                    <!--<td>
                        <?= $venta->id_producto_venta; ?>
                    </td>-->

                    <!-- FECHA VENTA -->
                    <td>
                        <?= date('d/m/Y', $venta->fecha_venta); ?>
                    </td>

                    <!-- SUCURSAL -->
                    <td>
                        <?= $venta->nombre_sucursal; ?>
                    </td>

                    <!-- VENDEDOR -->
                    <td>
                        <?= $venta->nombre_vendedor; ?>
                    </td>

                    <!-- ARTICULO -->
                    <td>
                        <?= $venta->nombre_producto; ?>
                    </td>

                    <!-- VENDIDOS -->
                    <td class="cantidad-venta">
                        <b>
                            <?= $venta->piezas_producto_vendido; ?>
                        </b>
                    </td>

                    <!-- MONTO VENTA -->
                    <td style="color:#00a8ff;">
                        <b>
                            <?= money_format('%n', $venta->total); ?>
                        </b>
                    </td>

                    <!-- STOCK -->
                    <td style="background:#ecf0f1; color:#2c3e50;">
                        <?= $venta->stock_producto; ?>
                    </td>
                </tr>
        <?php
            }
         ?>
    </tbody>
</table>