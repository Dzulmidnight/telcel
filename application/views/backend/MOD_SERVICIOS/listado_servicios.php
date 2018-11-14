<style>
    .encabezado{
        font-size: 11px !important;
    }
</style>
<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                LISTADO SERVICIOS
            </h3>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <button class="btn btn-sm btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
            <!--<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-popout2">
                <span data-toggle="tooltip" title="Agregar nuevo cliente">
                    <i class="fa fa-user-plus"></i> Nuevo
                </span>
            </button>-->
        </div>
    </div>

</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">

    <div class="content-grid push-50">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xs-6 col-md-3">
                        <a class="block block-link-hover1" href="javascript:void(0)">
                            <div class="block-content block-content-full clearfix">
                                <div class="pull-right push-15-t push-15">
                                    <i class="fa fa-bar-chart-o fa-2x text-amethyst"></i>
                                </div>
                                <div class="h2 text-amethyst" data-toggle="countTo" data-to="48">
                                    45
                                </div>
                                <div class="text-uppercase font-w600 font-s12 text-muted">Balance</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-6 col-md-3">
                        <a class="block block-link-hover1" href="<?php echo base_url('backend/MOD_INVENTARIO/inventario/listado'); ?>">
                            <div class="block-content block-content-full clearfix">
                                <div class="pull-right push-15-t push-15">
                                    <i class="fa fa-users fa-2x text-primary"></i>
                                </div>
                                <div class="h2 text-primary" data-toggle="countTo" data-to="36300">
                                    23
                                </div>
                                <div class="text-uppercase font-w600 font-s12 text-muted">Servicios Express</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <a class="block block-link-hover1" href="javascript:void(0)">
                            <div class="block-content block-content-full clearfix">
                                <div class="pull-right push-15-t push-15">
                                    <i class="fa fa-briefcase fa-2x text-smooth"></i>
                                </div>
                                <div class="h2 text-smooth" data-toggle="countTo" data-to="360">
                                    23
                                </div>
                                <div class="text-uppercase font-w600 font-s12 text-muted">Servicios detallados</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <a class="block block-link-hover1" href="javascript:void(0)">
                            <div class="block-content block-content-full clearfix">
                                <div class="pull-right push-15-t push-15">
                                    <i class="fa fa-briefcase fa-2x text-success"></i>
                                </div>
                                <div class="h2 text-success" data-toggle="countTo" data-to="760" data-before="$">4</div>
                                <div class="text-uppercase font-w600 font-s12 text-muted">Serv. Tecnico</div>
                            </div>
                        </a>
                    </div>
       
                </div>
            </div>

            <div class="col-md-12 block">
                <div class="block-content">
                    <table id="example" class="table table-condensed table-striped js-dataTable-full" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th class="encabezado text-center">
                                    Nº
                                </th>
                                <th>
                                    ID
                                </th>
                                <th class="encabezado">
                                    Tipo
                                </th>
                                <th class="encabezado">
                                    Categoria
                                </th>
                                <th class="encabezado">
                                    Estatus
                                </th>
                                </th>
                                <th class="encabezado">
                                    Fecha
                                </th>
                                <th class="encabezado" style="width: 10%">...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            for ($i=0; $i < 10; $i++) { 
                            ?>
                                <tr>
                                    <!-- Nº -->
                                    <td>
                                        1
                                    </td>
                                    <!-- ID -->
                                    <td>
                                        #342
                                    </td>
                                    <!-- Categoria -->
                                    <td>
                                        Express
                                    </td>
                                    <!-- Tipo -->
                                    <td>
                                        Instalación whatsapp
                                    </td>
                                    <!-- Estatus -->
                                    <td>
                                        <span class="text-success">
                                            <i class="fa fa-check"></i> Completo
                                        </span>
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
                                            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Consultar detalles"><i class="fa fa-search"></i></button>
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
                            <div class="form-group">
                                <!-- Tipo de elemento -->
                                <div class="col-sm-4">
                                    <div class="form-material">
                                        <select class="form-control" id="material-select" name="material-select" size="1" onchange="tipoElemento(this.value, 'formularios_inventario')">
                                            <option>...</option>
                                            <option value="1">Accesorio</option>
                                            <option value="2">Telefono</option>
                                        </select> 
                                        <label for="material-select">Tipo de elemento</label>
                                    </div>
                                </div>
                                <!-- END Tipo de elemento -->

                                <!-- Sucursales disponibles -->
                                <div class="col-sm-4">
                                    <div class="form-material">
                                        <select class="form-control" id="material-select" name="material-select" size="1">
                                            <option>...</option>
                                            <option value="1">Sucursal #1</option>
                                            <option value="2">Sucursal #2</option>
                                            <option value="3">Sucursal #3</option>
                                        </select>
                                        <label for="material-select">Sucursal</label>
                                    </div>
                                </div>
                                <!-- END Sucursales disponibles -->

                                <!-- Proveedores -->
                                <div class="col-sm-4">
                                    <div class="form-material">
                                        <select class="form-control" id="material-select" name="material-select" size="1">
                                            <option>...</option>
                                            <option value="1">Proveedor #1</option>
                                            <option value="2">Proveedor #2</option>
                                            <option value="3">Proveedor #3</option>
                                        </select>
                                        <label for="material-select">Proveedor</label>
                                    </div>
                                </div>
                                <!-- END Proveedores -->

                            </div>

                            <hr>
                            <!-- Formularios invetario -->
                            <div id="formularios_inventario">
                                <!-- Frm accesorio -->
                                <div id="frm_accesorio" style="display:block">

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <div class="form-material">
                                                <select class="form-control" id="id_tipo_accesorio" name="id_tipo_accesorio" size="1">
                                                    <option>...</option>
                                                    <option value="1">Accesorio</option>
                                                    <option value="2">Telefono</option>
                                                </select>
                                                <label for="id_tipo_accesorio" >
                                                    <button id="btn_accion" type="button" class="btn btn-xs btn-default" onclick="mostrar(this.id, 'nuevo_accesorio', this.value)" value="mostrar"><i id="icono_btn" class="fa fa-plus" data-toggle="tooltip" title="Nuevo tipo de accesorio"></i></button> Tipo de accesorio
                                                </label>
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
                                                <label for="material-color-primary">Cantidad *</label>
                                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-material form-material-primary input-group">
                                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                <label for="material-color-primary">Precio Interno *</label>
                                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="form-material form-material-primary input-group">
                                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                <label for="material-color-primary">Precio Publico</label>
                                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
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

                                <!-- Frm telefono -->
                                <div id="frm_telefono" style="display:none">
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="form-material form-material-primary input-group">
                                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                <label for="material-color-primary">Precio Interno (Unidad) *</label>
                                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-material form-material-primary input-group">
                                                <input class="form-control" type="number" min="0" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                <label for="material-color-primary">Cantidad *</label>
                                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="form-material form-material-primary input-group">
                                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                <label for="material-color-primary">Nombre *</label>
                                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-material form-material-primary input-group">
                                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                                <label for="material-color-primary">Precio Publico</label>
                                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                            </div>
                                        </div>
                                    </div>
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
                                <!-- END Frm telefono -->  
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
<script>
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
            document.getElementById('id_tipo_accesorio').style.display = 'none';
        }else{
            document.getElementById(elemento).style.display = 'none';
            document.getElementById('icono_btn').classList.add('text-success','fa-plus');
            document.getElementById('icono_btn').classList.remove('text-danger','fa-close');
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