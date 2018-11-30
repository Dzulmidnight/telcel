<tbody>
    <?php foreach($row_proveedores as $proveedor): ?>
        <tr>
            <td class="text-center">
                <?= $proveedor->id_proveedor ?>
            </td>
            <td class="">
                <a href="<?php echo base_url('backend/MOD_PROVEEDORES/Proveedores/detalle'); ?>">
                    <?= $proveedor->nombre ?>
                </a>
            </td>
            <td class="hidden-xs">
                <?= $proveedor->telefono ?>
            </td>
            <!-- Stock -->
            <td>
                <a href="#">
                    <b>0</b>
                </a>
            </td>
            <!-- Saldos -->
            <td>
                <b class="text-danger">
                    <i class="fa fa-arrow-down"></i> $ 0
                </b>
                <!--<b class="text-success">
                    <i class="fa fa-arrow-up"></i> $ 2,400
                </b>-->

            </td>
            <!-- Información del contacto -->
            <td>
                <p>
                    <?= $proveedor->nombreContacto ?>
                </p>
                <p>
                    <?= $proveedor->telefonoContacto ?>
                </p>
            </td>
            
            <td class="text-center">
                <div class="btn-group">
                    <a  class="btn btn-sm btn-primary" href="<?php echo base_url('backend/MOD_PROVEEDORES/Proveedores/detalle'); ?>" data-toggle="tooltip" title="Consultar perfil">
                        <i class="glyphicon glyphicon-folder-open"></i>
                    </a>
                    <button class="btn btn-sm btn-default" type="button" data-toggle="modal" data-target="#modal-editar-proveedor">
                        <i class="fa fa-pencil" data-toggle="tooltip" title="Editar proveedor"></i>
                    </button>
                    <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Eliminar proveedor" onclick="eliminar()"><i class="fa fa-times"></i></button>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>