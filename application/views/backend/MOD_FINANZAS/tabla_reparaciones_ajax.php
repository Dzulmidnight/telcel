<table class="table table-striped">
    <thead>
        <tr>
            <th class="success text-left" colspan="8">
                REGISTRO DE REPARACIONES REALIZADAS ENTRE <span id="inicioEntregaReparaciones_span" class="text-danger"></span> al <span id="finEntregaReparaciones_span" class="text-danger"></span>
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
                <a href="#" data-toggle="tooltip" title="Fecha de entrega del equipo">
                    <i class="fa fa-info-circle"></i> FECHA
                </a>
            </th>
            <th class="text-right" style="font-size:12px;width:150px;">
                MONTO COBRADO
            </th>
            
            <th style="font-size:12px;">
                SUCURSAL
            </th>
            <th style="font-size:12px;">
                TECNICO
            </th>
            <th style="font-size:12px;">
                ARTICULO
            </th>
        </tr>
    </thead>
    <tbody style="font-size:12px;">
        <?php
            $contador = 0;
            foreach ($row_listado_reparaciones as $reparacion) {
            $contador++;
        ?>
                <tr>
                    <!-- # -->
                    <td>
                        <?= $contador; ?>
                    </td>

                    <!-- ID VENTA -->
                    <!--<td>
                        <?= $reparacion->id_producto_venta; ?>
                    </td>-->

                    <!-- FECHA VENTA -->
                    <td>
                        <?= date('d/m/Y', $reparacion->fecha_entrega); ?>
                    </td>

                    <!-- MONTO VENTA -->
                    <td class="text-right monto-venta" style="color:#27ae60;width:150px;">
                        <?php 
                            $total = $reparacion->deposito_garantia + $reparacion->monto_pagado;
                         ?>
                        <b>
                            <?= money_format('%n', $total); ?>
                        </b>
                    </td>

                    <!-- SUCURSAL -->
                    <td>
                        <?= $reparacion->nombre_sucursal; ?>
                    </td>

                    <!-- VENDEDOR -->
                    <td>
                        <?= $reparacion->nombre_tecnico; ?>
                    </td>

                    <!-- ARTICULO -->
                    <td class="cantidad-venta">
                        <span class="hidden cantidad-reparaciones">1</span>
                        <?php 
                            echo 'Marca: '.$reparacion->marca_telefono;
                            echo '<br>';
                            echo 'Mod: '.$reparacion->modelo_telefono;
                         ?>
                    </td>
                </tr>
        <?php
            }
         ?>
    </tbody>
</table>