<style>
    .encabezado{
        font-size: 11px !important;
    }
</style>

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/select2/select2.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/select2/select2-bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/dropzonejs/dropzone.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css">

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                LISTADO DE ARTICULOS: <span class="text-primary"><?= count($row_productos) ?></span>
            </h3>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <!-- Modulos -->
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

</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">

    <div class="content-grid push-50">
        <div class="row">
            <div class="col-lg-3" style="margin-bottom:1em;">
                <select class="js-select2 form-control" id="example-select2-multiple" name="example-select2-multiple" style="width: 100%;" data-placeholder="Filtrar por sucursales" multiple>
                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                    <?php foreach($row_sucursales as $sucursal): ?>
                        <option value="<?= $sucursal->id_sucursal ?>"><?= $sucursal->nombre ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-12 block">
                <div class="block-content">
                    <table id="example" class="table table-condensed table-striped js-dataTable-full" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th class="encabezado text-center">
                                    Id
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
                                    Codigo
                                </th>

                                <th class="encabezado">
                                    Cant
                                </th>
                                <th class="encabezado">
                                    Precio Public
                                </th>
                                <th class="encabezado" style="width:200px;">
                                    Detalles
                                </th>
                                <th class="encabezado">
                                    Fecha
                                </th>
                                <th class="encabezado" style="width: 10%">...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($row_productos as $producto): ?>
                                <tr>
                                    <!-- Nº -->
                                    <td>
                                        <?= $producto->id_producto; ?>
                                    </td>
                                    <!-- Tipo -->
                                    <td>
                                        <?= $producto->nombre_categoria_producto; ?>
                                    </td>
                                    <!-- Img del producto -->
                                    <td>
                                        <img src="<?= base_url($producto->imagen); ?>" width="60px;" height="60px;" alt="">
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
                                    <!-- Codigo de barras del producto -->
                                    <td>
                                        <a href="#" onclick="mostrarCodigo('<?= base_url(); ?>','<?= $producto->codigo_barras ?>');">
                                            <i class="si si-printer"></i> <?= $producto->codigo_barras ?>
                                        </a>
                                    </td>
                                    <!-- Cantidad -->
                                    <td>
                                        <?= $producto->piezas ?> <a href="#" class="text-success" data-toggle="tooltip" title="Actualizar" onclick="actualizarCantidad(<?= $producto->codigo_barras ?>, '<?= base_url(); ?>');"><b><i class="glyphicon glyphicon-refresh"></i></b></a>
                                    </td>
                                    <!-- Precio al publico -->
                                    <td>
                                        $ <?= $producto->precio_publico ?> 
                                    </td>
                                    <!-- Detalles -->
                                    <td>
                                       <?php 
                                       if(!empty($producto->modelo)){
                                        echo 'Modelo: <span class="text-primary">'.$producto->modelo.'</span>';
                                       }
                                       if(!empty($producto->color)){
                                        echo 'Color: <span class="text-primary">'.$producto->color.'</span>';
                                       }
                                       if(!empty($producto->capacidad)){
                                        echo 'Capacidad: <span class="text-primary">'.$producto->capacidad.'</span>';
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
                                            <button class="btn btn-xs btn-warning" type="button" data-toggle="tooltip" title="Editar articulo" onclick="editarArticulo(<?= $producto->codigo_barras ?>, '<?= base_url(); ?>');"><i class="fa fa-pencil"></i></button>
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
    </div>
</div>


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
                        <form class="form-horizontal push-10-t block-content" action="base_forms_elements.html" method="post" onsubmit="return false;">

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

                                    <input type="number" class="form-control" id="numCodigos" name="numCodigos" min="1" onkeyup="descargarPdf('numCodigos', '<?= base_url(); ?>','');">
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

<!-- Modal registrar producto -->
<div class="modal fade" id="modal-agregar-producto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout">
        <div class="modal-content" style="padding:30px;">
            <?php 
            $atributos = array('class="form-horizontal push-10-t block-content"');
            echo form_open_multipart('backend/MOD_INVENTARIO/inventario/agregar'); 
            ?>

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
                                        <label for="fk_id_categoria_producto">Categoria del producto</label>
                                        <select class="form-control" name="fk_id_categoria_producto" id="fk_id_categoria_producto" onchange="siguienteEtapa();">
                                            <option value="">...</option>
                                            <?php foreach($row_categoria_producto as $categoria_producto): ?>
                                                <option value="<?= $categoria_producto->id_categoria_producto ?>"><?= $categoria_producto->nombre ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!-- END Categoria producto -->

                                    <!-- Sucursales disponibles -->
                                    <div class="col-sm-4">
                                        <label for="fk_id_sucursal">
                                            Sucursal *
                                        </label>
                                        <select class="form-control" name="fk_id_sucursal" id="fk_id_sucursal" onchange="siguienteEtapa();">
                                            <option value="">...</option>
                                            <?php foreach($row_sucursales as $sucursal): ?>
                                                <option value="<?= $sucursal->id_sucursal ?>"><?= $sucursal->nombre ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!-- END Sucursales disponibles -->

                                    <!-- Proveedores -->
                                    <div class="col-sm-4">
                                        <label for="fk_id_proveedor">
                                            Proveedor *
                                        </label>
                                        <select class="form-control" name="fk_id_proveedor" id="fk_id_proveedor" onchange="siguienteEtapa();">
                                            <option value="">...</option>
                                            <?php foreach($row_proveedores as $proveedor): ?>
                                                <option value="<?= $proveedor->id_proveedor ?>"><?= $proveedor->nombre ?></option>
                                            <?php endforeach; ?>
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
                                                        <select class="form-control" name="fk_id_sub_categoria_producto" id="fk_id_sub_categoria_producto">
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
                                        <div id="div-informacion-accesorio">
                                            <div class="col-md-4">
                                                <label style="color:red" for="piezas">Nº de Piezas</label>
                                                <input class="form-control" type="number" min="0" id="piezas" name="piezas">
                                            </div>
                                            <div class="col-md-4">
                                                <label style="color:red" for="precio_interno">Precio Proveedor (unidad)</label>
                                                <input type="number" class="form-control" step=".01" min="1" id="precio_interno" name="precio_interno" placeholder="$ 0.00">
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                                
                                            <div class="col-md-6">
                                                <label style="color:red" for="precio_publico">Precio Publico (unidad)</label>
                                                <input type="number" class="form-control" step=".01" min="1" id="precio_publico" name="precio_publico" placeholder="$ 0.00">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="">
                                            </div>


                                            <div class="col-md-6">
                                                <label for="marca">Marca</label>
                                                <input type="text" class="form-control" id="marca" name="marca" placeholder="">
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
                                                                    <input class="form-control" type="text" id="color" name="color" placeholder="">
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
                                                <button id="btn_guardar" class="btn btn-success" type="submit">
                                                    <i class="fa fa-check"></i>Registrar producto
                                                </button>
                                            </div>
                                        </div>
                                        <!-- END Información Accesorio -->

                                        <!-- INICIA Información Telefono -->
                                        <div id="div-informacion-telefono">
                                            <div class="col-md-4">
                                                <label style="color:red" for="piezas_telefono">Nº de Piezas</label>
                                                <input class="form-control" type="number" min="1" id="piezas_telefono" name="piezas_telefono" value="1" onkeyup="numeroCelulares(this.value);">
                                            </div>
                                            <div class="col-md-4">
                                                <label style="color:red" for="precio_interno_telefono">Precio Proveedor</label>
                                                <input type="number" class="form-control" step=".01" min="1" id="precio_interno_telefono" name="precio_interno_telefono" placeholder="$ 0.00">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="precio_publico_telefono">
                                                    Precio Público
                                                </label>
                                                <input type="number" class="form-control" step="0.1" min="1" id="precio_publico_telefono" name="precio_publico_telefono" placeholder="$ 0.00">
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                                
                                            <div class="col-md-6">
                                                <label for="nombre_telefono">Nombre</label>
                                                <input type="text" id="nombre_telefono" name="nombre_telefono" class="form-control" placeholder="">
                                            </div>


                                            <div class="col-md-6">
                                                <label for="marca_telefono">Marca</label>
                                                <input type="text" class="form-control" id="marca_telefono" name="marca_telefono" placeholder="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="modelo_telefono">Modelo</label>
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
                                                <button id="btn_guardar" class="btn btn-success" type="submit">
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
                                        <a href="#btabs-alt-static-home">Nuevo</a>
                                    </li>
                                    <li>
                                        <a href="#btabs-alt-static-profile">Traspasar</a>
                                    </li>

                                </ul>
                                <div class="block-content tab-content">
                                    <!-- agregar nueva mercancia de lo mismo -->
                                    <div class="tab-pane active" id="btabs-alt-static-home">
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
                                    <div class="tab-pane" id="btabs-alt-static-profile">
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