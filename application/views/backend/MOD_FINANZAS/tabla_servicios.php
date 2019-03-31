<table class="table table-striped">
    <thead>
        <tr>
            <th class="success text-left" colspan="8">
                REGISTRO DE SERVICIOS REALIZADAS POR PERIODO
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
            foreach ($row_listado_servicios as $servicios) {
            $contador++;
        ?>
                <tr>
                    <!-- # -->
                    <td>
                        <?= $contador; ?>
                    </td>

                    <!-- ID VENTA -->
                    <!--<td>
                        <?= $servicios->id_producto_venta; ?>
                    </td>-->

                    <!-- FECHA VENTA -->
                    <td>
                        <?= date('d/m/Y', $servicios->fecha_venta); ?>
                    </td>

                    <!-- SUCURSAL -->
                    <td>
                        <?= $servicios->nombre_sucursal; ?>
                    </td>

                    <!-- VENDEDOR -->
                    <td>
                        <?= $servicios->nombre_vendedor; ?>
                    </td>

                    <!-- ARTICULO -->
                    <td>
                        <?= $servicios->nombre_producto; ?>
                    </td>

                    <!-- VENDIDOS -->
                    <td>
                        <b>
                            <?= $servicios->piezas; ?>
                        </b>
                    </td>

                    <!-- MONTO VENTA -->
                    <td style="color:#00a8ff;">
                        <b>
                            <?= money_format('%n', $servicios->total); ?>
                        </b>
                    </td>

                    <!-- STOCK -->
                    <td style="background:#ecf0f1; color:#2c3e50;">
                        <?= $servicios->stock_producto; ?>
                    </td>
                </tr>
        <?php
            }
         ?>
    </tbody>
</table>