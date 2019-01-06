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
                LISTADO STOCK ACTUAL: <span class="text-primary"><?= count($row_productos) ?></span>
            </h3>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <!-- Modulos -->
            <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#modal-popout2">
                <span data-toggle="tooltip" title="Agregar nuevo producto">
                    <i class="fa fa-user-plus"></i> Nuevo
                </span>
            </button>

            <button class="btn btn-rounded btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
        </div>
    </div>

</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">
    <?php 
    if($this->session->flashdata('success')){
        $mensaje = $this->session->flashdata('success');
    ?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h3 class="font-w300 push-15"><?= $mensaje ?></h3>
        </div>
    <?php
    }else if($this->session->flashdata('error')){
        $mensaje = $this->session->flashdata('error');
    ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h3 class="font-w300 push-15"><?= $mensaje ?></h3>
        </div>
    <?php
    }
     ?>


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
                                    Nº
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
                                            echo '<button class="btn btn-xs btn-warning" data-toggle="tooltip" title="'.$sucursal->nombre.'">
                                            <i class="si si-home "></i> '.$sucursal->piezas.'
                                        </button>';
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
                                        <button type="button" class="btn btn-default" onclick="mostrarCodigo('<?= base_url(); ?>','<?= $producto->codigo_barras ?>');">
                                            <i class="si si-printer"></i> <?= $producto->codigo_barras ?>
                                        </button>
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
                                        Modelo: <span class="text-primary"><?= $producto->modelo ?></span> ,
                                        Color: <span class="text-primary"><?= $producto->color ?></span> ,
                                        Capacidad:
                                    </td>
                                    <!-- Fecha -->
                                    <td>
                                        <?= date('d/m/Y', $producto->fecha_registro); ?>
                                    </td>
                                    <!-- Acciones -->
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-xs btn-default">
                                                <i class="si si-settings"></i>
                                            </button>
                                            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Editar articulo"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Eliminar articulo" onclick="eliminar()"><i class="fa fa-times"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
                                <div class="col-sm-6">
                                    <div class="block block-themed">
                                        <div class="block-header bg-info">
                                            <h3 class="block-title">Detalle del articulo</h3>
                                        </div>
                                        <div class="block-content">
                                            <p>
                                                Tipo: <span class="text-primary">Tipo del articulo</span>
                                            </p>
                                            <p>
                                                Articulo: <span class="text-primary">Nombre del articulo</span>
                                            </p>
                                            <p>
                                                Cantidad actual: <span id="spanCantidadActual" class="text-primary">14</span>
                                                <input type="hidden" id="cantidad_actual" value="14">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- sección para mostrar el codigo de barras -->
                                <div class="col-sm-6">
                                    <canvas id="barcode2"></canvas>

                                    <label for="numCodigos">
                                        Número de codigos a imprimir
                                    </label>

                                    <input type="number" class="form-control" id="numCodigos" name="numCodigos" min="1" onkeyup="descargarPdf('numCodigos', '<?= base_url(); ?>','');">
                                    <input type="hidden" id="codigoBarras" name="codigoBarras" value="">
                                    <br>


                                    <div id="btnCodigo">
                                        
                                    </div>
                                    <a class="btn btn-success" id="linkPdf" href="" target="_new">
                                        Imprimir codigo
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
<div class="modal fade" id="modal-popout2" tabindex="-1" role="dialog" aria-hidden="true">
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
                                        <select class="form-control" name="fk_id_categoria_producto" id="fk_id_categoria_producto" onchange="siguienteEtapa()">
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
                                        <select class="form-control" name="fk_id_sucursal" id="fk_id_sucursal" onchange="siguienteEtapa()">
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
                                        <select class="form-control" name="fk_id_proveedor" id="fk_id_proveedor" onchange="siguienteEtapa()">
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
                                <div id="frm_detalle_producto" style="display:block">
                                    <p class="h4">
                                        2.- Información del producto
                                    </p>
                                    <!--  -->
                                        <div class="col-md-4">
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
                                    <!--  -->
                                    <!-- INFORMACIÓN DEL TELEFONO -->
                                        <div id="datos_telefono" class="form-group has-error">
                                            <div class="col-md-6">
                                                <label for="imei">IMEI</label>
                                                <input type="text" id="imei" name="imei" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="codigo">CODIGO</label>
                                                <input type="text" id="codigo" name="codigo" class="form-control" placeholder="">
                                            </div>
                                            <!--<div class="col-sm-6">
                                                <div class="form-material form-material-primary input-group">
                                                    <input class="form-control" type="text" id="imei" name="imei" placeholder="" >
                                                    <label for="imei">IMEI *</label>
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-material form-material-primary input-group">
                                                    <input class="form-control" type="text" id="codigo_telefono" name="codigo_telefono" placeholder="" >
                                                    <label for="codigo_telefono">CODIGO *</label>
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                </div>
                                            </div>-->
                                        </div>
                                    <!-- END INFORMACIÓN DEL TELEFONO -->
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
                                <!-- END Frm accesorio -->
                            </div>
                            <!-- END Formularios inventario -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- END Modal registrar producto -->


<!-- Modal actualizar cantidad -->
<div class="modal fade" id="modal-actualizar-cantidad" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <?= form_open_multipart('backend/MOD_INVENTARIO/inventario/actualizar'); ?>
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
                                                        <select class="form-control" name="id_sucursal" id="id_sucursal">
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
                                                            <input type="number" class="form-control" min="1" id="num_piezas_nuevas" name="num_piezas_nuevas" value="" required onkeyup="actualizarPiezas(this.value);">
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
                                                        <p>
                                                            Cantidad actual: <span id="spanActualizarCantidad" class="text-primary"></span>
                                                            <input type="text" id="cantidad_actual_actualizar" value="">
                                                        </p>
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
                                                        <select class="form-control" name="id_sucursal_origen" id="id_sucursal_origen" onchange="sucursalOrigen('<?= base_url(); ?>');">
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
                                                            <input type="number" class="form-control" min="1" id="piezas_sucursal_origen" name="piezas_sucursal_origen" value="" required onkeyup="actualizarPiezas(this.value)" readonly="">

                                                            <input type="text" id="total_piezas_origen" name="total_piezas_origen">

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
                                                            <input type="number" class="form-control" min="1" id="num_piezas_traspasar" name="num_piezas_traspasar" value="" required onkeyup="actualizarCantidadTraspaso(this.value);">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <b>Total</b>
                                                        <br>
                                                        <input type="text" class="form-control" id="nueva_cantidad_destino" name="nueva_cantidad_destino" readonly>
                                                        <b style="color: #2980b9; font-size:14px;" id="cantidad-sucursal-destino"></b>
                                                        <input type="text" id="input_cantidad_sucursal_destino">
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
                    <button id="btn_guardar" class="btn btn-sm btn-success" type="button">Actualizar cantidad</button>
                </div>
            </div>

        </form>
    </div>
</div>
<!-- END Modal actualizar cantidad -->

<script>
    function guardarColor(){
        var tabla, color, piezas, totalPiezas, suma = 0, inputPiezas = 0, tempPiezas;

        totalPiezas = document.getElementById('piezas').value;
        tabla = document.getElementById('tabla-colores');
        color = document.getElementById('color');
        piezas = document.getElementById('num_color_piezas');
        tempPiezas = document.getElementById('num_color_piezas').value;

        inputPiezas = document.getElementById('input-piezas').value;

        if(color.value !== '' && piezas.value !== ''){

            suma = parseInt(inputPiezas) + parseInt(tempPiezas);

            if(suma > totalPiezas){
                alert('Verifica que el número de piezas sea correcto');
                document.getElementById('piezas').focus();
            }else{
                var row = tabla.insertRow(1);
                var celda1 = row.insertCell(0);
                var celda2 = row.insertCell(1);

                celda1.innerHTML = '<div class="input-group"><span class="input-group-btn"><button class="btn btn-danger" type="button" onclick="eliminarColor(this, '+piezas.value+')"><i class="fa fa-close"></i></button></span><input class="form-control" type="text" readonly id="array_color[]" name="array_color[]" value="'+color.value+'"></div>';

                //celda1.innerHTML = "<button type='button' class='btn btn-xs btn-danger' onclick='eliminarColor(this, "+piezas.value+")'><i class='fa fa-close'></i></button> "+color.value;
                celda2.innerHTML = '<input class="form-control" readonly id="array_piezas_color[]" name="array_piezas_color[]" value="'+piezas.value+'">';
                document.getElementById('input-piezas').value = suma;
            }
            color.value = '';
            piezas.value = '';
        }
    

        console.log('Total piezas: '+totalPiezas);
        console.log('La suma: '+suma);
    }

    function eliminarColor(fila, piezas){
        var row = upTo(fila, 'tr');

        if (row) row.parentNode.removeChild(row);


        var inputPiezas = document.getElementById('input-piezas').value;
        var resta =  parseInt(inputPiezas) - parseInt(piezas);
        document.getElementById('input-piezas').value = resta; 


    }




    /*function actualizarCantidad(){
        console.log('modificando cantidad');

        $('#modal-actualizar-cantidad').modal('show');
    }*/



    function siguienteEtapa(){
        var categoria_producto = document.getElementById('fk_id_categoria_producto').value;
        var sucursal_producto = document.getElementById('fk_id_sucursal').value;
        var proveedor_producto = document.getElementById('fk_id_proveedor').value;

        if(categoria_producto !== '' && sucursal_producto !== '' && proveedor_producto !== '' ){
            console.log('seleccionaste los 3');
            console.log(categoria_producto);
            console.log(sucursal_producto);
            console.log(proveedor_producto);
            document.getElementById('frm_detalle_producto').style.display = 'block';
        }
        if(categoria_producto == '2'){
            document.getElementById('datos_telefono').style.display = 'block';
            document.getElementById('sub_categoria_producto').style.display = 'none';
        }else{
            document.getElementById('datos_telefono').style.display = 'none';
            document.getElementById('sub_categoria_producto').style.display = 'initial';
        }


    }

    function mostrar(id_padre, elemento, accion, ocultar){

        console.log('ID: '+id_padre);
        console.log('elemento: '+elemento);
        console.log('accion: '+accion);

        var elemento_padre = document.getElementById(id_padre);
        var bandera = document.getElementById('estado');
        var estado = accion;
        
        if(accion == 'mostrar'){
            document.getElementById(elemento).style.display = 'block';
            document.getElementById('icono_btn').classList.remove('fa-plus');
            document.getElementById('icono_btn').classList.add('text-danger','fa-close',);
            elemento_padre.value = "ocultar";
            document.getElementById('texto-btn').innerHTML = 'Cancelar';
            document.getElementById('id_tipo_accesorio').style.display = 'none';
            document.getElementById('div_lista_categoria').style.display = 'none';
        }else{
            document.getElementById(elemento).style.display = 'none';
            document.getElementById('icono_btn').classList.add('text-success','fa-plus');
            document.getElementById('icono_btn').classList.remove('text-danger','fa-close');
            document.getElementById('texto-btn').innerHTML = 'Nuevo';
            elemento_padre.value = "mostrar";
            document.getElementById('id_tipo_accesorio').style.display = 'block';
            document.getElementById('div_lista_categoria').style.display = 'block';
        }
        /*if(bandera.value == 'oculto'){
            estado = 'mostrar';
        }else{
            estado = 'oculto';
        }*/
        
        bandera.value = estado;

    }
    function tipoElemento(tipo, seccion){
        var hijos = document.querySelectorAll("div#"+seccion+" > div");
        
        tipo = tipo - 1;
        
        for (var i = 0; i < hijos.length; i++) {
            var div_id = hijos[i].id;
            if(tipo == i ){
                document.getElementById(div_id).style.display = 'block';
            }else{
                document.getElementById(div_id).style.display = 'none';
            }
       
        };
        document.getElementById('btn_guardar').style.display = 'initial';
    }
    function eliminar(){
        swal({
            title: "¿Estas seguro?",
            text: "Una vez eliminado, no podras recuperar la información",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Cliente eliminado", {
                icon: "success",
            });
            } else {
                //swal("Your imaginary file is safe!");
            }
        });
    }

    function registrarServicio(){
        swal({
            title: "Operacion exitosa",
            text: "Se ha registrado la información correctamente",
            icon: "success",
            buttons:{
                imprimir:{
                    text: "Imprimir nota",
                },
                nuevo:{
                    text: "Nuevo registro",
                },
                confirm: true,
            },

        })
        .then((value) => {
            switch(value){
                case "imprimir":
                    swal('Mandaste a imprimir');
                    break;
                case "nuevo":
                    swal('Nuevo registro');
                    break;
            }    
        })
        ;

    }

</script>
<style>
    .swal-button--imprimir {
        background-color: #7f8c8d;
    }
    .swal-button--nuevo{
        background-color: #7f8c8d;
    }
</style>

<!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
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