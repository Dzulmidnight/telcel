<style>
    .encabezado{
        font-size: 11px !important;
    }
    .mayusculas{
        text-transform:uppercase;
    }
</style>

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/dropzonejs/dropzone.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css">

<!-- Page Header -->


<div class="content bg-gray-lighter">
    <div class="block">
        <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
            <li class="active">
                <a href="#btabs-alt-static-home">Articulos</a>
            </li>
            <li class="">
                <a href="#btabs-alt-static-profile">Refacciones</a>
            </li>
            <li class="pull-right">
                <a href="#btabs-alt-static-settings" data-toggle="tooltip" title="" data-original-title="Settings"><i class="si si-settings"></i></a>
            </li>
        </ul>
        <div class="block-content tab-content">
            <!-- INICIA sección articulos -->
            <div class="tab-pane active" id="btabs-alt-static-home">
                <div class="row">
                    <div class="col-lg-4">
                        <h3 class="" style="margin-bottom:1em;">
                            Total de articulos: <span id="total_articulos_span" class="text-success"><?= $total_inventario; ?></span>
                        </h3>                        
                    </div>
                    <div class="col-lg-8 text-right">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-cargar-excel">
                                <i class="fa fa-cloud-upload"></i> Importar articulos
                        </button>

                        <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#modal-agregar-producto">
                            <span data-toggle="tooltip" title="Agregar nuevo producto">
                                <i class="fa fa-plus"></i> Nuevo
                            </span>
                        </button>

                        <button class="btn btn-rounded btn-primary" onclick="history.back(-1);">
                            <i class="fa fa-arrow-left"></i> Regresar
                        </button>
                    </div>
                </div>
                
                <div class="row" style="margin-bottom:1em;">
                    <div class="col-lg-12" style="margin-bottom:10px;">
                        <h4>
                            Filtrar información
                        </h4>
                    </div>
                    <div class="col-lg-12">
                        <form id="frm_filtrar_informacion" action="#" method="POST">
                            <select class="js-select2 form-control" id="select_listado_sucursales" name="select_listado_sucursales" style="width: 30%;" data-placeholder="Listado de Sucursales" multiple>
                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                <?php foreach($row_sucursales as $sucursal): ?>
                                    <option value="<?= $sucursal->id_sucursal ?>"><?= $sucursal->nombre ?></option>
                                <?php endforeach; ?>
                            </select>

                            <select class="js-select2 form-control" id="select_categoria_producto" name="select_categoria_producto" style="width: 30%;" data-placeholder="Tipo de articulo" multiple>
                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                <?php foreach($row_categoria_producto as $categoria_producto): ?>
                                    <option value="<?= $categoria_producto->id_categoria_producto ?>"><?= $categoria_producto->nombre ?></option>
                                <?php endforeach; ?>
                            </select>

                            <button type="button" class="btn btn-info" onclick="filtrarInventario('filtrar');">
                                <i class="fa fa-search"></i> Filtrar
                            </button>
                            
                            <button type="button" class="btn btn-default" onclick="filtrarInventario('limpiar');">
                                <i class="glyphicon glyphicon-trash"></i> Limpiar
                            </button>
                            <input type="hidden" id="input_base_url" value="<?= base_url(); ?>">
                        </form>
                    </div>
                </div>
                
                <div class="row">
                    <div id="div_tabla_inventario" class="col-md-12 block">
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
                                <?php foreach($row_productos as $producto): ?>
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
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <form id="frm_eliminar_articulo" action="<?= base_url(); ?>/backend/MOD_INVENTARIO/inventario/eliminar" method="POST">
                            <input type="hidden" id="id_eliminar" name="id_eliminar" placeholder="id que se va a eliminar">
                        </form>
                    </div>

                </div>
            </div>
            <!-- TERMINA sección articulos -->

            <!-- INICIA sección Refacciones -->
            <div class="tab-pane" id="btabs-alt-static-profile">
                <h4 class="font-w300 push-15">
                    Listado Refacciones: <span class="text-primary"><?= count($row_refacciones); ?></span>
                </h4>
                <div class="row">
                    <div class="col-lg-3" style="margin-bottom:1em;">
                        <select class="js-select2 form-control" id="example-select2-multiple" name="example-select2-multiple" style="width: 100%;" data-placeholder="Filtrar por sucursales" multiple>
                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                            <?php foreach($row_sucursales as $sucursal): ?>
                                <option value="<?= $sucursal->id_sucursal ?>"><?= $sucursal->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-9 text-right">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-cargar-excel-refacciones">
                                <i class="fa fa-cloud-upload"></i> Importar refacciones
                        </button>

                        <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#modal-agregar-refaccion">
                            <span data-toggle="tooltip" title="Agregar nueva refacción">
                                <i class="fa fa-plus"></i> Nuevo
                            </span>
                        </button>

                        <button class="btn btn-rounded btn-primary" onclick="history.back(-1);">
                            <i class="fa fa-arrow-left"></i> Regresar
                        </button>
                    </div>

                    <div class="col-md-12 block">
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
                                        Nombre
                                    </th>
                                    <th class="encabezado">
                                        Modelo
                                    </th>

                                    <th class="encabezado">
                                        Color
                                    </th>
                                    <th class="encabezado">
                                        Precio
                                    </th>
                                    <th class="encabezado">
                                        Cantidad
                                    </th>
                                    <th class="encabezado">
                                        Estatus
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
                                <?php foreach($row_refacciones as $refaccion): ?>
                                    <tr>
                                        <!-- Nº -->
                                        <td>
                                            <?php 
                                                echo $contador;
                                                $contador++;
                                             ?>
                                        </td>

                                        <!-- CODIGO_BARRAS -->
                                        <td>
                                            <?php 
                                                if($refaccion->codigo_barras){
                                                ?>
                                                    <a href="#" onclick="mostrarCodigoRefaccion('<?= base_url(); ?>','<?= $refaccion->codigo_barras ?>');">
                                                        <i class="si si-printer"></i> <?= $refaccion->codigo_barras ?>
                                                    </a>
                                                <?php
                                                }else{
                                                    echo '<span style="color:#bdc3c7;">No disponible</span>';
                                                }
                                             ?>
                                        </td>

                                        <!-- TIPO -->
                                        <td>
                                            Refacción
                                        </td>
                                        
                                        <!-- Nombre -->
                                        <td>
                                            <?= $refaccion->nombre_pieza; ?>
                                        </td>
                                        
                                        <!-- Modelo -->
                                        <td>
                                            <?= $refaccion->modelo; ?>
                                        </td>
                                        
                                        <!-- Color -->
                                        <td>
                                            <?= $refaccion->color; ?>
                                        </td>
                                        
                                        <!-- Precio -->
                                        <td>
                                            $ <b><?= $refaccion->precio; ?></b>
                                        </td>
                                        
                                        <!-- Cantidad -->
                                        <td>
                                            <?php 
                                                $cantidad = $refaccion->cantidad;

                                                if($refaccion->estatus == 'INVENTARIO' || $refaccion->estatus == 'AGOTADO'){
                                                    if($cantidad < 1){
                                                        echo '<b style="color:#e74c3c"><i class="fa fa-close"></i> '.$cantidad.'</b>';
                                                    }else if($cantidad == 1){
                                                        echo '<b style="color:#f39c12"><i class="fa fa-warning"></i> '.$cantidad.'</b>';
                                                    }else{
                                                        echo '<b style="color:#44bd32">'.$cantidad.'</b>';
                                                    }
                                                }
                                             ?>
                                        </td>
                                        
                                        <!-- Estatus -->
                                        <td>
                                            <?php
                                                $estatus = $refaccion->estatus;

                                                switch ($estatus) {
                                                    case 'INVENTARIO':
                                                        echo '<span style="color:#44bd32;"><i class="si si-check"></i> '.$estatus.'</span>';
                                                        break;
                                                    case 'AGOTADO':
                                                        echo '<span style="color:#e74c3c;"><i class="si si-close"></i> '.$estatus.'</span>';
                                                        break;
                                                    case 'PROVEEDOR':
                                                        echo '<span style="color:#3498db;"><i class="si si-basket-loaded"></i> '.$estatus.'</span>';
                                                        break;
                                                    
                                                    default:
                                                        echo $estatus;
                                                        break;
                                                }
                                            ?>
                                        </td>
                                        
                                        <!-- Fecha -->
                                        <td>
                                            <?= date('d/m/Y', $refaccion->fecha_registro); ?>
                                        </td>
                                        <!-- Acciones -->                                    
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <!--<button class="btn btn-xs btn-default">
                                                    <i class="si si-settings"></i>
                                                </button>-->
                                                <button class="btn btn-xs btn-warning" type="button" data-toggle="tooltip" title="Editar articulo" onclick="editarRefaccion(<?= $refaccion->codigo_barras ?>, '<?= base_url(); ?>');"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-xs btn-danger" type="button" data-toggle="tooltip" title="Eliminar articulo" onclick="eliminar('id_eliminar', <?= $refaccion->id_catalogo_piezas_reparacion; ?>, 'frm_eliminar_articulo');"><i class="fa fa-times"></i></button>

                                                <!--<button class="btn btn-xs btn-primary" data-toggle="tooltip" title="Actualizar cantidad">
                                                    <i class="fa fa-repeat"></i>
                                                </button>-->
                                                <?php 
                                                    if($refaccion->estatus == 'PROVEEDOR'){
                                                    ?>
                                                        <button class="btn btn-xs btn-success" data-toggle="tooltip" title="Solicitar pieza">
                                                            <i class="fa fa-calendar-plus-o"></i>
                                                        </button>
                                                    <?php
                                                    }
                                                 ?>
                                            </div>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <form id="frm_eliminar_articulo" action="<?= base_url(); ?>/backend/MOD_INVENTARIO/inventario/eliminar" method="POST">
                            <input type="hidden" id="id_eliminar" name="id_eliminar" placeholder="id que se va a eliminar">
                        </form>
                    </div>

                </div>

            </div>
            <!-- TERMINA sección Refacciones -->
            <div class="tab-pane" id="btabs-alt-static-settings">
                <h4 class="font-w300 push-15">Settings Tab</h4>
                <p>...</p>
            </div>
        </div>
    </div>


</div>
<!-- END Page Header -->


<!-- Modal importar Listado de Articulos -->
<div class="modal fade" id="modal-cargar-excel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <div class="modal-content">
            <form action="<?php echo base_url('backend/Excel_import/import'); ?>" method="POST" enctype="multipart/form-data">
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Importar Listado de articulos</h3>
                    </div>
                    <div class="block-content" style="margin-bottom: 4em;">
                        <div class="row text-justify">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="fk_id_sucursal_excel">* Seleccione la sucursal</label>
                                        <select class="form-control" name="fk_id_sucursal_excel" id="fk_id_sucursal_excel" required="">
                                            <option value="">Listado Sucursales</option>
                                            <?php foreach($row_sucursales as $sucursal):?>
                                                <option value="<?= $sucursal->id_sucursal; ?>"><?= $sucursal->nombre; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12" style="margin-top: 1em;">
                                        <!-- Formulario de registro de usuario -->
                                            <label for="archivo_datos">* Selecciona el Excel con los datos que deseas cargar</label>
                                            <input class="form-control" type="file" id="archivo_datos" name="archivo_datos" required accept=".xls, .xlsx">
                                        <!-- END Formulario de registro de cliente -->  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 text-center" style="border-left:3px solid #2980b9">
                                <p>
                                    <b>Obtener formato de excel para registrar articulos</b>
                                </p>
                                
                                <a href="<?= base_url('assets/formatos/formato_para_inventario.xlsx') ?>" target="_new" class="btn btn-info">
                                    <i class="fa fa-download"></i> Descargar formato
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-success" type="submit">
                        <i class="fa fa-check"></i> Cargar datos
                    </button>
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Modal importar Listado de Articulos -->

<!-- MODAL importar datos refacciones -->
<div class="modal fade" id="modal-cargar-excel-refacciones" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <div class="modal-content">
            <form action="<?php echo base_url('backend/Excel_import/import_catalogo'); ?>" method="POST" enctype="multipart/form-data">
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Importar Listado de refacciones</h3>
                    </div>
                    <div class="block-content" style="margin-bottom: 4em;">
                        <div class="row text-justify">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="fk_id_sucursal">
                                            * Seleccione un sucursal
                                        </label>
                                        <select class="form-control" name="fk_id_sucursal" id="fk_id_sucursal" required>
                                            <option value="">Listado de sucursales</option>
                                            <?php 
                                                foreach ($row_sucursales as $sucursal) {
                                                    echo '<option value="'.$sucursal->id_sucursal.'">'.$sucursal->nombre.'</option>';
                                                }
                                             ?>
                                        </select>    
                                    </div>

                                    <div class="col-xs-12" style="margin-top: 1em;">
                                        <!-- Formulario de registro de usuario -->
                                            <label for="archivo_datos">* Selecciona el Excel con los datos que deseas cargar</label>
                                            <input class="form-control" type="file" id="archivo_datos" name="archivo_datos" required accept=".xls, .xlsx">
                                        <!-- END Formulario de registro de cliente -->  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 text-center" style="border-left:3px solid #2980b9">
                                <p>
                                    <b>Obtener formato de excel para registrar piezas de reparación</b>
                                </p>
                                
                                <a href="<?= base_url('assets/formatos/listado_refacciones.xlsx') ?>" target="_new" class="btn btn-info">
                                    <i class="fa fa-download"></i> Descargar formato
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-success" type="submit">
                        <i class="fa fa-check"></i> Cargar datos
                    </button>
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Modal importar datos refacciones -->


<!-- Modal mostrar codigo de barras -->
<div class="modal fade" id="modalCodigoBarras" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Codigo de barras</h3>
                </div>
                <div class="block-content" style="margin-bottom: 4em;">
                    <div class="row text-justify">
                        <!-- Formulario de registro de usuario -->
                        <form class="form-horizontal push-10-t block-content" action="#" method="post" onsubmit="return false;">

                            <!-- Formularios invetario -->
                            <div id="formularios_inventario">
                                <div class="col-sm-6" id="div_informacion_producto">
                                </div>
                                <!-- sección para mostrar el codigo de barras -->
                                <div class="col-sm-6">
                                    <canvas id="barcode2"></canvas>

                                    <label for="numCodigos">
                                        Número de codigos a generar
                                    </label>

                                    <input type="number" class="form-control" id="numCodigos" name="numCodigos" min="1" onkeyup="descargarPdf('numCodigos', '<?= base_url(); ?>','','pieza');" value="1">
                                    <input type="hidden" id="codigoBarras" name="codigoBarras" value="">
                                    <br>


                                    <div id="btnCodigo">
                                        
                                    </div>
                                    <a class="btn btn-success" id="linkPdf" href="" target="_new">
                                        Generar codigos
                                    </a>


                                    <!--<button class="btn btn-success" onclick="guardarImg('<?= base_url(); ?>')">
                                        Imprimir codigo 2
                                    </button>-->
                                    <!--<a href="<?= base_url('backend/Createpdf'); ?>" target="_new">
                                        Imprimir
                                    </a>-->
                                    <!--<button id="btn_guardar" class="btn btn-sm btn-success" type="button" onclick="descargarPdf('numCodigos', '<?= base_url('backend/crearPdf/generarPDF/'); ?>')">
                                        <i class="glyph-icon icon-printer"></i> Imprimir codigo
                                    </button>-->
                                </div>
                            </div>
                            <!-- END Formularios inventario -->

                        </form>
                        <!-- END Formulario de registro de cliente -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- END Modal mostrar codigo de barras -->


<!-- Modal mostrar codigo de barras refaccion -->
<div class="modal fade" id="modalCodigoBarrasRefaccion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Codigo de barras refacción</h3>
                </div>
                <div class="block-content" style="margin-bottom: 4em;">
                    <div class="row text-justify">
                        <!-- Formulario de registro de usuario -->
                        <form class="form-horizontal push-10-t block-content" action="#" method="post" onsubmit="return false;">

                            <!-- Codigo barras refacción -->
                            <div id="formularios_inventario">
                                <div class="col-sm-6" id="div_informacion_refaccion">
                                </div>
                                <!-- sección para mostrar el codigo de barras -->
                                <div class="col-sm-6">
                                    <canvas id="barcode2"></canvas>

                                    <label for="numCodigos">
                                        Número de codigos a generar
                                    </label>

                                    <input type="number" class="form-control" id="numCodigosRefaccion" name="numCodigosRefaccion" min="1" onkeyup="descargarPdfRefaccion('numCodigosRefaccion', '<?= base_url(); ?>', '', 'refaccion');" value="1">
                                    <input type="hidden" id="codigoBarras" name="codigoBarras" value="">
                                    <br>


                                    <div id="btnCodigo">
                                        
                                    </div>
                                    <a class="btn btn-success" id="linkPdfRefaccion" href="" target="_new">
                                        Generar codigos
                                    </a>

                                </div>
                            </div>
                            <!-- END Codigo barras refaccion -->


                        </form>
                        <!-- END Formulario de registro de cliente -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- END Modal mostrar codigo de barras refaccion -->

<!-- Modal registrar producto -->
<div class="modal fade" id="modal-agregar-producto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout">
        <div class="modal-content" style="padding:30px;">
            <form class="form-horizontal push-10-t block-content" action="<?= base_url('backend/MOD_INVENTARIO/inventario/agregar'); ?>" id="frm_registro_articulo" name="frm_registro_articulo" method="POST" enctype="multipart/form-data">
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Registrar Inventario</h3>
                    </div>
                    <div class="block-content" style="margin-bottom: 4em;">
                        <div class="row text-justify">
                            <p class="h4">
                                1.- Selecciona las caracteristicas
                            </p>
                            <div class="col-md-12" id="select_general" style="background:#ff8f8f;color:#fff;padding-bottom:10px;">
                                <div class="row">
                                    <!-- Categoria producto -->
                                    <div class="col-sm-4">
                                        <label for="fk_id_categoria_producto">* Categoria del producto</label>
                                        <select class="form-control" name="fk_id_categoria_producto" id="fk_id_categoria_producto" onchange="siguienteEtapa();" required>
                                            <option value="">...</option>
                                            <?php foreach($row_categoria_producto as $categoria_producto): ?>
                                                <option value="<?= $categoria_producto->id_categoria_producto ?>"><?= $categoria_producto->nombre ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!-- END Categoria producto -->

                                    <!-- Sucursales disponibles -->
                                    <div class="col-sm-4">
                                        <label for="fk_id_sucursal_accesorios">
                                            * Sucursal
                                        </label>
                                        <select class="form-control" name="fk_id_sucursal_accesorios" id="fk_id_sucursal_accesorios" onchange="siguienteEtapa();" required>
                                            <option value="">...</option>
                                            <?php foreach($row_sucursales as $sucursal): ?>
                                                <option value="<?= $sucursal->id_sucursal ?>"><?= $sucursal->nombre ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!-- END Sucursales disponiblefs -->

                                    <!-- Proveedores -->
                                    <div class="col-sm-4">
                                        <label for="fk_id_proveedor_accesorios">
                                            * Proveedor
                                        </label>
                                        <select class="form-control" name="fk_id_proveedor_accesorios" id="fk_id_proveedor_accesorios" onchange="siguienteEtapa();" required>
                                            <option value="">...</option>
                                            <?php foreach($row_proveedores as $proveedor): ?>
                                                <option value="<?= $proveedor->id_proveedor ?>"><?= $proveedor->nombre ?></option>
                                            <?php endforeach; ?>
                                            <option value="1">
                                                Otro proveedor
                                            </option>
                                        </select>
                                    </div>
                                    <!-- END Proveedores -->
                                </div>
                            </div>

                            <hr>
                            <!-- Formularios invetario -->
                            <div id="formularios_inventario" style="margin-top:10px;">
                                <!-- Frm accesorio -->
                                <div id="frm_detalle_producto" style="display:none; margin-top:2em;">
                                    <p class="h4">
                                        2.- Información del producto
                                    </p>
                                    <!--  -->
                                        <div id="div-categoria" class="col-md-4">
                                            <div class="row">
                                                <div class="col-xs-8">
                                                    <div id="div_lista_categoria">
                                                        <label for="fk_id_sub_categoria_producto" style="color:red">Categoria *</label>
                                                        <select class="form-control" name="fk_id_sub_categoria_producto" id="fk_id_sub_categoria_producto" required>
                                                            <option>...</option>
                                                            <?php foreach($row_sub_categoria_producto as $sub_categoria_producto): ?>
                                                                <option value="<?= $sub_categoria_producto->id_sub_categoria_producto ?>"><?= $sub_categoria_producto->nombre ?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>

                                                    <div id="div_nuevo_accesorio" class="form-group has-success" style="display:none">
                                                        <label for="nuevo_sub_accesorio">Nuevo tipo</label>
                                                        <input type="text" class="form-control" id="nuevo_sub_accesorio" name="nuevo_sub_accesorio" placeholder="Escribe el nuevo tipo">

                                                        <input id="estado" type="hidden" value="oculto">
                                                    </div>

                                                </div>
                                                <div class="col-xs-4">
                                                    <button type="button" id="btn_accion" class="btn btn-sm btn-default" style="margin-top:2em;" value="mostrar" onclick="mostrar(this.id, 'div_nuevo_accesorio', this.value, )" value="mostrar">
                                                        <span data-toggle="tooltip" title="Nuevo tipo de accesorio">
                                                            <i id="icono_btn" class="fa fa-plus" ></i> <span id="texto-btn">Nuevo</span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- INICIA Información Accesorio -->
                                        <div id="div-informacion-accesorio" style="display: none">
                                            <div class="col-md-4">
                                                <label style="color:red" for="piezas">Nº de Piezas *</label>
                                                <input class="form-control" type="number" min="0" id="piezas" name="piezas" >
                                            </div>
                                            <div class="col-md-4">
                                                <label style="color:red" for="precio_interno">Precio Proveedor (unidad) *</label>
                                                <input type="number" class="form-control" step=".01" min="1" id="precio_interno" name="precio_interno" placeholder="$ 0.00" >
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                                
                                            <div class="col-md-6">
                                                <label style="color:red" for="precio_publico">Precio Publico (unidad) *</label>
                                                <input type="number" class="form-control" step=".01" min="1" id="precio_publico" name="precio_publico" placeholder="$ 0.00" >
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nombre">Nombre *</label>
                                                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="" >
                                            </div>


                                            <div class="col-md-6">
                                                <label for="marca">Marca *</label>
                                                <input type="text" class="form-control" id="marca" name="marca" placeholder="" >
                                            </div>
                                            <div class="col-md-6">
                                                <label for="modelo">Modelo</label>
                                                <input type="text" class="form-control" id="modelo" name="modelo" placeholder="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="capacidad">Capacidad</label>
                                                <input type="text" class="form-control" id="capacidad" name="capacidad" placeholder="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="img_producto">Imagen del producto</label>
                                                <input type="file" class="form-control" id="img_producto" name="img_producto">
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2">Colores</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="encabezado">Color</th>
                                                            <th class="encabezado">Piezas</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabla-colores">
                                                        <tr class="encabezado">
                                                            <td>
                                                                <div class="input-group">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="guardarColor();"><i class="fa fa-save"></i></button>
                                                                    </span>
                                                                    <input class="form-control" type="text" id="color" name="color" placeholder="Color">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="number" min="0" class="form-control" id="num_color_piezas" name="num_color_piezas" placeholder="Ej: 3">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <input type="hidden" id="input-piezas" value="0">
                                                <!--<label for="color">Color</label>
                                                <input type="text" class="form-control" id="color" name="color" placeholder="">-->
                                            </div>
                                            <div class="col-md-6 well text-center" style="margin-top:3em;">
                                                <button type="button" id="btn_guardar1" class="btn btn-success" value="guardarArticulo" onclick="enviarForm('btn_guardar1', 'frm_registro_articulo');">
                                                    <i class="fa fa-check"></i>Registrar producto
                                                </button>
                                            </div>
                                        </div>
                                        <!-- END Información Accesorio -->

                                        <!-- INICIA Información Telefono -->
                                        <div id="div-informacion-telefono" style="display: none">
                                            <div class="col-md-4">
                                                <label style="color:red" for="piezas_telefono">Nº de Piezas *</label>
                                                <input class="form-control" type="number" min="1" id="piezas_telefono" name="piezas_telefono" value="1" onkeyup="numeroCelulares(this.value);">
                                            </div>
                                            <div class="col-md-4">
                                                <label style="color:red" for="precio_interno_telefono">Precio Proveedor *</label>
                                                <input type="number" class="form-control" step=".01" min="1" id="precio_interno_telefono" name="precio_interno_telefono" placeholder="$ 0.00" >
                                            </div>

                                            <div class="col-md-4">
                                                <label for="precio_publico_telefono">
                                                    Precio Público *
                                                </label>
                                                <input type="number" class="form-control" step="0.1" min="1" id="precio_publico_telefono" name="precio_publico_telefono" placeholder="$ 0.00" >
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                                
                                            <div class="col-md-6">
                                                <label for="nombre_telefono">Nombre *</label>
                                                <input type="text" id="nombre_telefono" name="nombre_telefono" class="form-control" placeholder="">
                                            </div>


                                            <div class="col-md-6">
                                                <label for="marca_telefono">Marca *</label>
                                                <input type="text" class="form-control" id="marca_telefono" name="marca_telefono" placeholder="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="modelo_telefono">Modelo *</label>
                                                <input type="text" class="form-control" id="modelo_telefono" name="modelo_telefono" placeholder="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="capacidad_telefono">Capacidad</label>
                                                <input type="text" class="form-control" id="capacidad_telefono" name="capacidad_telefono" placeholder="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="img_telefono">Imagen del producto</label>
                                                <input type="file" class="form-control" id="img_telefono" name="img_telefono">
                                            </div>


                                            <div class="col-md-12">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                CODIGO
                                                            </th>
                                                            <th>
                                                                IMEI
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabla-codigos-telefono">
                                                        <tr>
                                                            <td>
                                                                <input class="form-control" type="text" id="" name="array_codigos[]" value="" placeholder="Codigo telefono">
                                                            </td>
                                                            <td>
                                                                <input class="form-control" type="text" id="" name="array_imei[]" value="" placeholder="IMEI telefono">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="col-md-12 well text-center" style="margin-top:3em;">
                                                <button type="button" id="btn_guardar2" class="btn btn-success" value="guardarTelefono" onclick="enviarForm('btn_guardar2', 'frm_registro_articulo');">
                                                    <i class="fa fa-check"></i>Registrar producto
                                                </button>
                                            </div>
                                        </div>
                                        <!-- END Información Telefono -->
                                </div>
                                <!-- END Frm accesorio -->
                            </div>
                            <!-- END Formularios inventario -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="tipo_registro" name="tipo_registro" value="">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- END Modal registrar producto -->

<!-- MODAL registrar refacción -->
    <div class="modal fade" id="modal-agregar-refaccion" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-popout">
            <div class="modal-content">
                <form class="form-horizontal push-10-t block-content" action="<?= base_url('backend/MOD_INVENTARIO/inventario/agregar_refaccion'); ?>" id="frm_registro_refaccion" name="frm_registro_refaccion" method="POST" enctype="multipart/form-data">
                    <div class="block block-themed block-transparent remove-margin-b">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Registrar Refacción</h3>
                        </div>
                        <div class="block-content" style="margin-bottom:2em;">
                            <div class="row">
                                <div class="col-md-12" style="margin-bottom:2em;">
                                    <p>
                                        Localización de la pieza  
                                    </p>

                                    <label class="css-input css-radio css-radio-lg css-radio-primary push-10-r">
                                        <input type="radio" name="localizacion_refaccion" value="sucursal" onclick="localizacionRefaccion(this.value);" required><span></span> Sucursal
                                    </label>
                                    <label class="css-input css-radio css-radio-lg css-radio-primary">
                                        <input type="radio" name="localizacion_refaccion" value="proveedor" onclick="localizacionRefaccion(this.value);"><span></span> Proveedor
                                    </label>
                                </div>
                                <div id="div-listado-sucursal" class="col-md-6" style="display:none">
                                    <label for="id_sucursal_refaccion">* Listado de sucursales</label>
                                    <select class="form-control" name="id_sucursal_refaccion" id="id_sucursal_refaccion">
                                        <option value="">...</option>
                                        <?php foreach($row_sucursales as $sucursal): ?>
                                            <option value="<?= $sucursal->id_sucursal?>"><?= $sucursal->nombre; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="nombre_refaccion">* Nombre de la pieza</label>
                                    <input type="text" class="form-control mayusculas" id="nombre_refaccion" name="nombre_refaccion">
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="modelo_refaccion">* Modelo</label>
                                    <input type="text" class="form-control mayusculas" id="modelo_refaccion" name="modelo_refaccion">
                                </div>

                                <div class="col-md-6">
                                    <label for="precio_publico_refaccion">* Precio Publico</label>
                                    <input type="number" step="any" class="form-control mayusculas" id="precio_publico_refaccion" name="precio_publico_refaccion">
                                </div>

                                <div class="col-md-6">
                                    <label for="precio_interno_refaccion">* Precio Proveedor</label>
                                    <input type="number" step="any" class="form-control mayusculas" id="precio_interno_refaccion" name="precio_interno_refaccion">
                                </div>

                                <div class="col-md-6">
                                    <label for="color_refaccion">Color</label>
                                    <input type="text" class="form-control mayusculas" id="color_refaccion" name="color_refaccion">
                                </div>

                                <div class="col-md-6">
                                    <label for="cantidad_refaccion">* Cantidad</label>
                                    <input type="number" min="1" class="form-control mayusculas" id="cantidad_refaccion" name="cantidad_refaccion" value="1">
                                </div>

                                <div class="col-md-6">
                                    <label for="proveedor_refaccion">Proveedor</label>
                                    <input type="text" class="form-control mayusculas" id="proveedor_refaccion" name="proveedor_refaccion">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="tipo_registro" name="tipo_registro" value="">
                        <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success" onclick="validarInformacion();">
                            <i class="fa fa-check"></i> Registrar pieza
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<!-- END MODAL registrar refacción -->  

<!-- Modal Editar Producto -->
<div class="modal fade" id="modal-editar-articulo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <div class="modal-content" style="padding:30px;">
            <?php 
            $atributos = array('class="form-horizontal push-10-t block-content"');
            echo form_open_multipart('backend/MOD_INVENTARIO/inventario/editar'); 
            ?>

                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Editar articulo</h3>
                    </div>
                    <div class="block-content" style="margin-bottom: 4em;">
                        <div class="row text-justify">
                            <div class="col-md-6">
                                <img id="edit_img_actual" width="80px;" height="80px;" src="" alt="">
                            </div>
                            <div class="col-md-6">
                                <label for="img_nueva">Reemplazar Imagen</label>
                                <input type="file" class="form-control" id="img_nueva" name="img_nueva">
                            </div> 
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_precio_publico">Precio Publico</label>
                                <input type="text" class="form-control" id="edit_precio_publico" name="edit_precio_publico">
                            </div>
                            <div class="col-md-6">
                                <label for="edit_precio_proveedor">Precio Proveedor</label>
                                <input type="text" class="form-control" id="edit_precio_proveedor" name="edit_precio_proveedor">
                            </div>
                            <div class="col-md-6">
                                <label for="edit_nombre">Nombre</label>
                                <input type="text" class="form-control" id="edit_nombre" name="edit_nombre">
                            </div>
                            <div class="col-md-6">
                                <label for="edit_marca">Marca</label>
                                <input type="text" class="form-control" id="edit_marca" name="edit_marca">
                            </div>
                            <div class="col-md-6">
                                <label for="edit_modelo">Modelo</label>
                                <input type="text" class="form-control" id="edit_modelo" name="edit_modelo">
                            </div>
                            <div class="col-md-6">
                                <label for="edit_capacidad">Capacidad</label>
                                <input type="text" class="form-control" id="edit_capacidad" name="edit_capacidad">
                            </div>

                            <input type="hidden" id="edit_id_producto" name="edit_id_producto">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-success" type="submit">
                        Actualizar
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- END Modal Editar Producto -->


<!-- Modal Editar Refaccion -->
<div class="modal fade" id="modal-editar-refaccion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <div class="modal-content" style="padding:30px;">
            <?php 
            $atributos = array('class="form-horizontal push-10-t block-content"');
            echo form_open_multipart('backend/MOD_INVENTARIO/inventario/editar_refaccion'); 
            ?>

                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Editar Refacción</h3>
                    </div>
                    <div class="block-content" style="margin-bottom: 4em;">
                        <div class="row text-justify">
                            <div class="col-md-6">
                                <img id="edit_img_actual_refaccion" width="80px;" height="80px;" src="" alt="">
                            </div>
                            <div class="col-md-6">
                                <label for="img_nueva_refaccion">Reemplazar Imagen</label>
                                <input type="file" class="form-control" id="img_nueva_refaccion" name="img_nueva_refaccion">
                            </div> 
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_precio_publico_refaccion">Precio Publico</label>
                                <input type="text" class="form-control" id="edit_precio_publico_refaccion" name="edit_precio_publico_refaccion">
                            </div>
                            <div class="col-md-6">
                                <label for="edit_precio_proveedor_refaccion">Precio Proveedor</label>
                                <input type="text" class="form-control" id="edit_precio_proveedor_refaccion" name="edit_precio_proveedor_refaccion">
                            </div>
                            <div class="col-md-6">
                                <label for="edit_nombre_refaccion">Nombre</label>
                                <input type="text" class="form-control" id="edit_nombre_refaccion" name="edit_nombre_refaccion">
                            </div>
                            <div class="col-md-6">
                                <label for="edit_marca_refaccion">Marca</label>
                                <input type="text" class="form-control" id="edit_marca_refaccion" name="edit_marca_refaccion">
                            </div>
                            <div class="col-md-6">
                                <label for="edit_modelo_refaccion">Modelo</label>
                                <input type="text" class="form-control" id="edit_modelo_refaccion" name="edit_modelo_refaccion">
                            </div>

                            <input type="hidden" id="edit_id_refaccion" name="edit_id_refaccion">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-success" type="submit">
                        Actualizar
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- END Modal Editar Refaccion -->



<!-- Modal actualizar cantidad -->
<div class="modal fade" id="modal-actualizar-cantidad" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <?php 
            $attributes = array('id' => 'id_formulario_inventario');
            echo form_open_multipart('backend/MOD_INVENTARIO/inventario/actualizar', $attributes);
         ?>
            <div class="modal-content">
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Actualizar cantidad inventario</h3>
                    </div>
                    <div class="block-content" style="margin-bottom: 4em;">
                        <div class="row text-justify">
                            <!-- Formulario de registro de usuario -->
                            <input type="hidden" id="id_producto_actualizar" name="id_producto_actualizar" value="">
                            
                            <div class="block">
                                <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
                                    <li class="active">
                                        <a href="#btabs-alt-nueva-cantidad">Nuevo</a>
                                    </li>
                                    <li>
                                        <a href="#btabs-alt-traspasar">Traspasar</a>
                                    </li>

                                </ul>
                                <div class="block-content tab-content">
                                    <!-- agregar nueva mercancia de lo mismo -->
                                    <div class="tab-pane active" id="btabs-alt-nueva-cantidad">
                                        <!-- Formularios invetario -->
                                        <div id="formularios_inventario">
                                            <div class="col-sm-6">
                                                <div class="row has-success">
                                                    <div class="col-sm-12" style="margin-bottom: 1em;">
                                                        <label for="id_sucursal">
                                                            Asignar a sucursal
                                                        </label>
                                                        <select class="form-control" onchange="sucursalOrigen('<?= base_url(); ?>', 'si');" name="id_sucursal" id="id_sucursal">
                                                            <option value="">...</option>
                                                            <?php foreach($row_sucursales as $sucursal): ?>
                                                                <option value="<?= $sucursal->id_sucursal ?>"><?= $sucursal->nombre ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-12" style="margin-bottom: 1em;">
                                                            <label for="num_piezas_nuevas">
                                                                Nº de piezas nuevas
                                                            </label>
                                                            <input type="number" class="form-control" min="1" id="num_piezas_nuevas" name="num_piezas_nuevas" value=""  onkeyup="actualizarPiezas(this.value);">
                                                            <!--<input class="form-control" type="number" min="1" id="num_piezas_nuevas" name="num_piezas_nuevas" placeholder="" value="" required onkeyup="actualizarPiezas(this.value)">
                                                            <label for="num_piezas_nuevas">Nº de piezas nuevas *</label>
                                                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>-->
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label for="precio_interno">
                                                            Precio interno
                                                        </label>
                                                        <input type="number" class="form-control" id="precio_interno_actualizar" name="precio_interno_actualizar" step=".01" min="1" placeholder="$ 00.00">

                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label for="precio_publico">
                                                            Precio al publico
                                                        </label>
                                                        <input type="number" class="form-control" id="precio_publico_actualizar" name="precio_publico_actualizar" step=".01" min="1" placeholder="$ 00.00">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="block block-themed">
                                                    <div class="block-header bg-info">
                                                        <h3 class="block-title">Detalle del articulo</h3>
                                                    </div>
                                                    <div class="block-content">
                                                        <p>
                                                            Tipo: <span id="spanTipoArticulo" class="text-primary"></span>
                                                        </p>
                                                        <p>
                                                            Articulo: <span id="spanArticulo" class="text-primary"></span>
                                                        </p>
                                                        <p>
                                                            Producto: <span id="spanProductoActualizar" class="text-primary"></span>
                                                        </p>
                                                        <div class="row">
                                                            <div class="col-xs-6">
                                                                <label for="spanActualizarCantidad">
                                                                    Total
                                                                </label>
                                                                <input type="text" class="form-control" id="spanActualizarCantidad" name="spanActualizarCantidad" readonly="">

                                                                <input type="hidden" id="cantidad_actual_actualizar" name="cantidad_actual_actualizar" value="">
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <label for="producto_en_sucursal">
                                                                    En sucursal
                                                                </label>
                                                                <input class="form-control" type="text" id="producto_en_sucursal" name="producto_en_sucursal" placeholder="" readonly="">

                                                                <input type="hidden" id="producto_en_sucursal_original" name="producto_en_sucursal_original" placeholder="">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Formularios inventario -->
                                    </div>
                                    
                                    <!-- Traspasar mercancia de sucursales -->
                                    <div class="tab-pane" id="btabs-alt-traspasar">
                                        <!-- Formularios invetario -->
                                        <div id="formularios_inventario">
                                            <div class="col-sm-6">
                                                <div class="row has-error">
                                                    <div class="col-sm-12" style="margin-bottom: 1em;">
                                                        <label for="id_sucursal">
                                                            Sucursal origen
                                                        </label>
                                                        <select class="form-control" name="id_sucursal_origen" id="id_sucursal_origen" onchange="sucursalOrigen('<?= base_url(); ?>', 'no');">
                                                            <option value="">...</option>
                                                            <?php foreach($row_sucursales as $sucursal): ?>
                                                                <option value="<?= $sucursal->id_sucursal ?>"><?= $sucursal->nombre ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-12" style="margin-bottom: 1em;">
                                                            <label for="piezas_sucursal_origen">
                                                                Total de productos
                                                            </label>
                                                            <input type="number" class="form-control" min="1" id="piezas_sucursal_origen" name="piezas_sucursal_origen" value="" onkeyup="actualizarPiezas(this.value)" readonly="">

                                                            <input type="hidden" id="total_piezas_origen" name="total_piezas_origen">

                                                            <input type="hidden" id="id_sucursal_producto_origen" name="id_sucursal_producto_origen" placeholder="">

                                                    </div>
        

                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="row has-success">
                                                    <div class="col-sm-12" style="margin-bottom: 1em;">
                                                        <label for="id_sucursal_destino">
                                                            Sucursal destino
                                                        </label>
                                                        <select class="form-control" name="id_sucursal_destino" id="id_sucursal_destino" onchange="sucursalDestino('<?= base_url(); ?>');">
                                                            <option value="">...</option>
                                                            <?php foreach($row_sucursales as $sucursal): ?>
                                                                <option value="<?= $sucursal->id_sucursal ?>"><?= $sucursal->nombre ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-8" style="margin-bottom: 1em;">
                                                            <label for="num_piezas_traspasar">
                                                                Cantidad a traspasar
                                                            </label>
                                                            <input type="number" class="form-control" min="1" id="num_piezas_traspasar" name="num_piezas_traspasar" value="" onkeyup="actualizarCantidadTraspaso(this.value);">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="nueva_cantidad_destino">
                                                            Total
                                                        </label>
                                                        <input type="text" class="form-control" id="nueva_cantidad_destino" name="nueva_cantidad_destino" readonly>
                                                        <b style="color: #2980b9; font-size:14px;" id="cantidad-sucursal-destino"></b>
                                                        <input type="hidden" id="input_cantidad_sucursal_destino">
                                                        <input type="hidden" id="id_sucursal_producto_destino" name="id_sucursal_producto_destino" placeholder="">
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                        </div>
                                        <!-- END Formularios inventario -->
                                    </div>

                                </div>
                            </div>
                            <!-- END Formulario de registro de cliente -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                    <button id="" class="btn btn-sm btn-success" type="submit">Actualizar cantidad</button>
                </div>
            </div>

        </form>
    </div>
</div>
<!-- END Modal actualizar cantidad -->

<style>
    .swal-button--imprimir {
        background-color: #7f8c8d;
    }
    .swal-button--nuevo{
        background-color: #7f8c8d;
    }
</style>

<!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
<script src="<?php echo base_url(); ?>assets/js/propios/inventario.js"></script>
<script src="<?php echo base_url(); ?>assets/js/propios/funciones.js"></script>
<script src="<?php echo base_url(); ?>assets/js/propios/barcode.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.scrollLock.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.appear.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.countTo.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.placeholder.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/js.cookie.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>

<!-- Page JS Code -->