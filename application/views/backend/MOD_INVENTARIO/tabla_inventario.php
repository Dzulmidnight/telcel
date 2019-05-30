<table id="example" class="table table-condensed table-striped js-dataTable-full" style="font-size:12px;">
    <thead>
        <tr>
            <th class="encabezado text-center">
                #
            </th>
            <th class="encabezado">
                Codigo
            </th>
            <th class="encabezado">
                Tipo
            </th>
            <th class="encabezado">
                Img
            </th>
            <th class="encabezado">
                Articulo
            </th>

            <th class="encabezado">
                Sucursal
            </th>

            <th class="encabezado">
                Cant
            </th>
            <th class="encabezado">
                Precio Public
            </th>
            <th class="encabezado">
                Detalles
            </th>
            <th class="encabezado">
                Fecha
            </th>
            <th class="encabezado" style="width: 10%">...</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $contador = 1;
         ?>
        <?php 
            if(count($row_productos) == 0){
                echo '<tr><td class="text-center warning" colspan="11">No se encontro información</td></tr>';
            }else{
                foreach($row_productos as $producto){
                ?>
                    <tr>
                        <!-- Nº -->
                        <td>
                            <?php 
                                echo $contador;
                                $contador++;
                             ?>
                        </td>
                        <!-- Codigo de barras del producto -->
                        <td>
                            <a href="#" onclick="mostrarCodigo('<?= base_url(); ?>','<?= $producto->codigo_barras ?>');">
                                <i class="si si-printer"></i> <?= $producto->codigo_barras ?>
                            </a>
                        </td>
                        <!-- Tipo -->
                        <td>
                            <?= $producto->nombre_categoria_producto; ?>
                        </td>
                        <!-- Img del producto -->
                        <td>
                            <?php 
                                if(isset($producto->imagen)){
                                    echo '<img src="'.base_url($producto->imagen).'" width="60px" height="60px" alt="">';
                                }
                             ?>
                        </td>
                        <!-- Nombre articulo -->
                        <td>
                            <?= $producto->nombre; ?>
                        </td>

                        <!-- Sucursal -->
                        <td>
                            <?php
                            foreach ($row_sucursal_piezas[$producto->id_producto] as $sucursal) {
                                echo $sucursal->nombre.' (<span style="color:red">'.$sucursal->piezas.'</span>)';
                                //echo '<button class="btn btn-xs btn-warning" data-toggle="tooltip" title="'.$sucursal->nombre.'">
                                //<i class="si si-home "></i> '.$sucursal->piezas.'
                            //</button>';
                            }
                            //echo $row_sucursal_piezas[$producto->id_producto]->id_sucursal;
                             ?>
                            <!--<button class="btn btn-xs btn-warning" data-toggle="tooltip" title="Nom. Sucur">
                                <i class="si si-home "></i> 4
                            </button>
                            <button class="btn btn-xs btn-success" data-toggle="tooltip" title="Nom. Sucur">
                                <i class="si si-home"></i> 8
                            </button>
                            <button class="btn btn-xs btn-danger" data-toggle="tooltip" title="Nom. Sucur">
                                <i class="si si-home"></i> 2
                            </button>
                            <button class="btn btn-xs btn-default" data-toggle="tooltip" title="Nom. Sucur">
                                <i class="si si-home"></i> 0
                            </button>-->
                        </td>

                        <!-- Cantidad -->
                        <td>
                            <?php 
                                $cantidad = $producto->piezas;

                                if($cantidad < 1){
                                    echo '<b style="color:#e74c3c"><i class="fa fa-close"></i> '.$cantidad.'</b>';
                                }else if($cantidad == 1){
                                    echo '<b style="color:#f39c12"><i class="fa fa-warning"></i> '.$cantidad.'</b>';
                                }else{
                                    echo '<b style="color:#44bd32">'.$cantidad.'</b>';
                                }
                             
                                if($producto->nombre_categoria_producto != 'TELEFONO'){
                                ?>
                                    <a href="#" class="text-success" data-toggle="tooltip" title="Actualizar" onclick="actualizarCantidad('<?= $producto->codigo_barras ?>', '<?= base_url(); ?>');">
                                        <b>
                                            <i class="glyphicon glyphicon-refresh"></i>
                                        </b>
                                    </a>
                                <?php
                                }
                             ?>
                        </td>
                        <!-- Precio al publico -->
                        <td>
                            $ <?= $producto->precio_publico ?> 
                        </td>
                        <!-- Detalles -->
                        <td>
                           <?php 
                           if(!empty($producto->modelo)){
                            echo 'Modelo: <span class="text-primary">'.$producto->modelo.'</span><br>';
                           }
                           if(!empty($producto->color)){
                            echo 'Color: <span class="text-primary">'.$producto->color.'</span><br>';
                           }
                           if(!empty($producto->capacidad)){
                            echo 'Capacidad: <span class="text-primary">'.$producto->capacidad.'</span><br>';
                           }
                            ?>
                        </td>
                        <!-- Fecha -->
                        <td>
                            <?= date('d/m/Y', $producto->fecha_registro); ?>
                        </td>
                        <!-- Acciones -->                                    
                        <td class="text-center">
                            <div class="btn-group">
                                <!--<button class="btn btn-xs btn-default">
                                    <i class="si si-settings"></i>
                                </button>-->
                                <button class="btn btn-xs btn-warning" type="button" data-toggle="tooltip" title="Editar articulo" onclick="editarArticulo('<?= $producto->codigo_barras ?>', '<?= base_url(); ?>');"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-xs btn-danger" type="button" data-toggle="tooltip" title="Eliminar articulo" onclick="eliminar('id_eliminar', <?= $producto->id_producto; ?>, 'frm_eliminar_articulo');"><i class="fa fa-times"></i></button>
                            </div>
                        </td>

                    </tr>
                <?php
                }
            }
         ?>
    </tbody>
</table>
