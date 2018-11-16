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
                LISTADO STOCK ACTUAL: <span class="text-primary">10</span>
            </h3>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
        <!-- Modulos -->
        <button class="btn btn-rounded btn-primary" onclick="history.back(-1)">
            <i class="fa fa-arrow-left"></i> Regresar
        </button>
        <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#modal-popout2">
            <span data-toggle="tooltip" title="Agregar nuevo cliente">
                <i class="fa fa-user-plus"></i> Nuevo
            </span>
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
                    <option value="1">Sucursal 1</option>
                    <option value="2">Sucursal 2</option>
                    <option value="3">Sucursal 3</option>
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
                                    Sucursal
                                </th>
                                <th class="encabezado">
                                    Codigo
                                </th>
                                <th class="encabezado">
                                    Tipo
                                </th>
                                <th class="encabezado">
                                    Cant
                                </th>
                                <th class="encabezado">
                                    Articulo
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
                            <?php 
                            for ($i=1; $i <= 10; $i++) { 
                            ?>
                                <tr>
                                    <!-- Nº -->
                                    <td>
                                        <?= $i ?>
                                    </td>
                                    <!-- Sucursal -->
                                    <td>
                                        <button class="btn btn-xs btn-warning" data-toggle="tooltip" title="Nom. Sucur">
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
                                        </button>



                                    </td>
                                    <!-- Codigo -->
                                    <td>
                                        3345234534
                                    </td>
                                    <!-- Tipo -->
                                    <td>
                                        Funda
                                    </td>
                                    <!-- Cantidad -->
                                    <td>
                                        <b class="text-white bg-primary" style="padding:3px;">14</b><button type="button" class="btn btn-xs btn-success"  onclick="actualizarCantidad()"><i class="si si-refresh"></i></button>
                                    </td>
                                    <!-- Nombre articulo -->
                                    <td>
                                        Funda de telefono
                                    </td>
                                    <!-- Precio al publico -->
                                    <td>
                                        $ 450.00
                                    </td>
                                    <!-- Detalles -->
                                    <td>
                                        Proveedor: <span class="text-primary">Nom. Provee</span>
                                        Modelo: <span class="text-primary">XR20</span> ,
                                        Color: <span class="text-primary">Azul</span> ,
                                        Capacidad:
                                    </td>
                                    <!-- Fecha -->
                                    <td>
                                        <?= date('d/m/Y', time()); ?>
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

                            <?php
                            }
                             ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Pop Out Modal -->
<div class="modal fade" id="modal-popout2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout">
        <div class="modal-content">
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
                        <!-- Formulario de registro de usuario -->
                        <form class="form-horizontal push-10-t block-content" action="base_forms_elements.html" method="post" onsubmit="return false;">
                            <p class="h4">
                                1.- Selecciona las caracteristicas
                            </p>
                            <div id="select_general" class="form-group bg-city text-white" style="padding:1em;">
                                <!-- Categoria producto -->
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <div class="form-material">
                                                <select class="form-control" id="categoria_producto" name="categoria_producto" size="1" onchange="siguienteEtapa()">
                                                    <option value="">...</option>
                                                    <option value="1">Accesorio</option>
                                                    <option value="telefono">Telefono</option>
                                                    <option value="3">Reparación</option>
                                                </select>
                                                <label for="categoria_producto">Categoria producto</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Categoria producto -->

                                <!-- Sucursales disponibles -->
                                <div class="col-sm-4">
                                    <div class="form-material">
                                        <select class="form-control" id="sucursal_producto" name="sucursal_producto" size="1" onchange="siguienteEtapa()">
                                            <option value="">...</option>
                                            <option value="1">Sucursal #1</option>
                                            <option value="2">Sucursal #2</option>
                                            <option value="3">Sucursal #3</option>
                                        </select>
                                        <label for="sucursal_producto">Sucursal *</label>
                                    </div>
                                </div>
                                <!-- END Sucursales disponibles -->

                                <!-- Proveedores -->
                                <div class="col-sm-4">
                                    <div class="form-material">
                                        <select class="form-control" id="proveedor_producto" name="proveedor_producto" size="1" onchange="siguienteEtapa()">
                                            <option value="">...</option>
                                            <option value="1">Proveedor #1</option>
                                            <option value="2">Proveedor #2</option>
                                            <option value="3">Proveedor #3</option>
                                        </select>
                                        <label for="proveedor_producto">Proveedor *</label>
                                    </div>
                                </div>
                                <!-- END Proveedores -->

                            </div>

                            <hr>
                            <!-- Formularios invetario -->
                            <div id="formularios_inventario">
                                <!-- Frm accesorio -->
                                <div id="frm_detalle_producto" style="display:none">
                                    <p class="h4" style="background:#ff8f8f;color:#fff;padding:10px;">
                                        2.- Ingresa los detalles del articulo
                                    </p>
                                    <div class="form-group bg-">
                                        <div class="col-sm-4">
                                            <div class="form-material">
                                                <div class="input-group" id="sub_categoria_producto" style="display:none">
                                                    <div class="row">
                                                        <div class="col-xs-8">
                                                            <div class="form-material">
                                                                <select class="form-control" id="id_tipo_accesorio" name="id_tipo_accesorio" size="1">
                                                                    <option>...</option>
                                                                <option value="1">Accesorio</option>
                                                                <option value="telefono">Telefono</option>
                                                                <option value="3">Reparación</option>

                                                                </select>
                                                                <label for="id_tipo_accesorio">Tipo de elemento *</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <span class="input-group-btn">
                                                                <button id="btn_accion" class="btn btn-sm btn-default" type="button" value="mostrar" onclick="mostrar(this.id, 'nuevo_accesorio', this.value)" value="mostrar">
                                                                    <i id="icono_btn" class="fa fa-plus" data-toggle="tooltip" title="Nuevo tipo de accesorio"></i> <span id="texto-btn">Nuevo</span>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="nuevo_accesorio" style="display:none">
                                                <div class="form-material form-material-success input-group">
                                                    <input class="form-control" type="text" id="material-color-success" name="material-color-success" placeholder="Escribe el nuevo tipo" required>
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                </div>
                                                <input id="estado" type="hidden" value="oculto">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-material form-material-primary input-group">
                                                <input class="form-control" type="number" min="0" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                <label for="material-color-primary">Nº de piezas *</label>
                                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">                         
                                            <div class="form-material">
                                                <input class="js-autonumeric-dollar form-control" type="text" id="example-autonumeric-dollar2" name="example-autonumeric-dollar2" placeholder="$ 0.00">
                                                <label for="example-autonumeric-dollar2">Precio de proveedor (unidad) *</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-6">
                          
                                                <div class="form-material">
                                                    <input class="js-autonumeric-dollar form-control" type="text" id="example-autonumeric-dollar2" name="example-autonumeric-dollar2" placeholder="$ 0.00">
                                                    <label for="example-autonumeric-dollar2">Precio Publico *</label>
                                                </div>
                                      
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-material form-material-primary input-group">
                                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                <label for="material-color-primary">Nombre *</label>
                                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- INFORMACIÓN DEL TELEFONO -->
                                        <div id="datos_telefono" class="form-group has-error">
                                            <div class="col-sm-6">
                                                <div class="form-material form-material-primary input-group">
                                                    <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                    <label for="material-color-primary">IMEI *</label>
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-material form-material-primary input-group">
                                                    <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                    <label for="material-color-primary">CODIGO *</label>
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                </div>
                                            </div>

                                        </div>
                                    <!-- END INFORMACIÓN DEL TELEFONO -->

                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="form-material form-material-primary input-group">
                                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                <label for="material-color-primary">Marca</label>
                                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-material form-material-primary input-group">
                                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                <label for="material-color-primary">Modelo *</label>
                                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="form-material form-material-primary input-group">
                                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                <label for="material-color-primary">Color</label>
                                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-material form-material-primary input-group">
                                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                <label for="material-color-primary">Capacidad *</label>
                                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Frm accesorio -->
                            </div>
                            <!-- END Formularios inventario -->

                        </form>
                        <!-- END Formulario de registro de cliente -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                <button id="btn_guardar" class="btn btn-sm btn-success" type="button" style="display:none">Registrar</button>
            </div>
        </div>
    </div>
</div>
<!-- END Pop Out Modal -->


<!-- Modal actualizar cantidad -->
<div class="modal fade" id="modal-actualizar-cantidad" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
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
                        <form class="form-horizontal push-10-t block-content" action="base_forms_elements.html" method="post" onsubmit="return false;">

                            <!-- Formularios invetario -->
                            <div id="formularios_inventario">
                                <div class="col-sm-6">
                                    <div class="row has-success">
                                        <div class="col-sm-12">
                                            <div class="form-material form-material-primary input-group">
                                                <input class="form-control" type="number" min="1" id="num_piezas_nuevas" name="num_piezas_nuevas" placeholder="" value="" required onkeyup="actualizarPiezas(this.value)">
                                                <label for="num_piezas_nuevas">Nº de piezas nuevas *</label>
                                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-material form-material-primary input-group">
                                                <input class="form-control" type="number" min="0" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                <label for="material-color-primary">Precio interno *</label>
                                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-material form-material-primary input-group">
                                                <input class="form-control" type="number" min="0" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                <label for="material-color-primary">Precio al publico *</label>
                                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                            </div>
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
                            
                            </div>
                            <!-- END Formularios inventario -->

                        </form>
                        <!-- END Formulario de registro de cliente -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                <button id="btn_guardar" class="btn btn-sm btn-success" type="button">Actualizar cantidad</button>
            </div>
        </div>
    </div>
</div>
<!-- END Modal actualizar cantidad -->

<script>
    function actualizarPiezas(valor){
        var cantidadActual = document.getElementById('cantidad_actual').value;
        if(valor == ''){
            valor = 0;
        }
        var nuevaCantidad = valor;
        var suma = parseInt(cantidadActual) + parseInt(nuevaCantidad);
        document.getElementById('spanCantidadActual').innerHTML = suma;
    }

    function actualizarCantidad(){
        console.log('modificando cantidad');
        $('#modal-actualizar-cantidad').modal('show');
    }

    function siguienteEtapa(){
        var categoria_producto = document.getElementById('categoria_producto').value;
        var sucursal_producto = document.getElementById('sucursal_producto').value;
        var proveedor_producto = document.getElementById('proveedor_producto').value;

        if(categoria_producto !== '' && sucursal_producto !== '' && proveedor_producto !== '' ){
            console.log('seleccionaste los 3');
            console.log(categoria_producto);
            console.log(sucursal_producto);
            console.log(proveedor_producto);
            document.getElementById('frm_detalle_producto').style.display = 'block';
        }
        if(categoria_producto == 'telefono'){
            document.getElementById('datos_telefono').style.display = 'block';
            document.getElementById('sub_categoria_producto').style.display = 'none';
        }else{
            document.getElementById('datos_telefono').style.display = 'none';
            document.getElementById('sub_categoria_producto').style.display = 'initial';
        }


    }

    function mostrar(id_padre, elemento, accion){

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
        }else{
            document.getElementById(elemento).style.display = 'none';
            document.getElementById('icono_btn').classList.add('text-success','fa-plus');
            document.getElementById('icono_btn').classList.remove('text-danger','fa-close');
            document.getElementById('texto-btn').innerHTML = 'Nuevo';
            elemento_padre.value = "mostrar";
            document.getElementById('id_tipo_accesorio').style.display = 'block';
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