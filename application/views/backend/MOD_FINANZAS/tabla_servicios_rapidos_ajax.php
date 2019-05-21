<table class="table table-striped">
    <thead>
        <tr>
            <th class="success text-left" colspan="8">
                REGISTRO DE SERVICIOS REALIZADAS ENTRE <span id="inicioServicio_span" class="text-danger"></span> al <span id="finServicio_span" class="text-danger"></span>
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
                SERVICIO
            </th>
            <th style="font-size:12px;">
                MONTO
            </th>
        </tr>
    </thead>
    <tbody style="font-size:12px;">
        <?php
            $contador = 0;
            foreach ($row_listado_servicios_rapidos as $servicio) {
            $contador++;
        ?>
                <tr>
                    <!-- # -->
                    <td>
                        <?= $contador; ?>
                    </td>

                    <!-- ID VENTA -->
                    <!--<td>
                        <?= $servicio->id_producto_venta; ?>
                    </td>-->
                    <!-- columna para poder hacer la suma de las ventas express -->
                    <td class="hidden cantidad-venta">
                        <b>1</b>
                    </td>
                    <!-- FECHA VENTA -->
                    <td>
                        <?= date('d/m/Y', $servicio->fecha_registro); ?>
                    </td>

                    <!-- SUCURSAL -->
                    <td>
                        <?= $servicio->nombre_sucursal; ?>
                    </td>

                    <!-- VENDEDOR -->
                    <td>
                        <?= $servicio->nombre_vendedor; ?>
                    </td>

                    <!-- SERVICIO -->
                    <td>
                        <?= $servicio->nombre_servicio; ?>
                    </td>

                    <!-- MONTO VENTA -->
                    <td style="color:#00a8ff;" class="monto-venta">
                        <b>
                            <?= money_format('%n', $servicio->monto); ?>
                        </b>
                    </td>
                </tr>
        <?php
            }
         ?>
    </tbody>
</table>