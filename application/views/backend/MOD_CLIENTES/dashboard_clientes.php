<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                DASHBOARD CLIENTES
            </h3>
        </div>

        <div class="col-sm-5 text-right hidden-xs">
            <button class="btn btn-sm btn-round btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
            <button type="button" class="btn btn-sm btn-round btn-success" data-toggle="modal" data-target="#modal-popout2">
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

	<div class="row">
		<!-- Listado de proveedores -->
    	<div class="col-lg-12">
    		<div class="block block-content">
                <table class="table table-condensed table-striped js-dataTable-full" style="font-size:12px;">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>
                                Sucursal
                            </th>
                            <th>Nombre</th>
                            <th class="hidden-xs">Telefono</th>
                            <th class="hidden-xs">Detalles</th>
                            <th class="text-center">...</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>
                                <i class="fa fa-home"></i> Sucursal 1
                            </td>
                            <td class="">
                                <span class="text-primary">Nombre</span> ApellidoP ApellidoM
                            </td>
                            <td class="hidden-xs">9511999723</td>
                            <td class="hidden-xs">
                                <b class="text-info">
                                    <i class="si si-info"></i> Producto apartado
                                </b>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-primary" data-toggle="tooltip" title="Consultar perfil">
                                        <i class="glyphicon glyphicon-folder-open"></i>
                                    </button>
                                    <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Editar cliente"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Eliminar cliente" onclick="eliminar()"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-center">1</td>
                            <td>
                                <i class="fa fa-home"></i> Sucursal 1
                            </td>
                            <td class="">
                                <span class="text-primary">Nombre</span> ApellidoP ApellidoM
                            </td>
                            <td class="hidden-xs">9511999723</td>
                            <td class="hidden-xs">
                                <b class="text-warning">
                                    <i class="si si-info"></i> Garantia con proveedor
                                </b>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-primary" data-toggle="tooltip" title="Consultar perfil">
                                        <i class="glyphicon glyphicon-folder-open"></i>
                                    </button>
                                    <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Editar cliente"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Eliminar cliente" onclick="eliminar()"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-center">1</td>
                            <td>
                                <i class="fa fa-home"></i> Sucursal 1
                            </td>
                            <td class="">
                                <span class="text-primary">Nombre</span> ApellidoP ApellidoM
                            </td>
                            <td class="hidden-xs">9511999723</td>
                            <td class="hidden-xs">
                                <b class="text-danger">
                                    <i class="si si-info"></i> Equipo en reparación
                                </b>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-primary" data-toggle="tooltip" title="Consultar perfil">
                                        <i class="glyphicon glyphicon-folder-open"></i>
                                    </button>
                                    <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Editar cliente"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Eliminar cliente" onclick="eliminar()"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-center">1</td>
                            <td>
                                <i class="fa fa-home"></i> Sucursal 1
                            </td>
                            <td class="">
                                <span class="text-primary">Nombre</span> ApellidoP ApellidoM
                            </td>
                            <td class="hidden-xs">9511999723</td>
                            <td class="hidden-xs">
                                <b class="text-success">
                                    <i class="si si-info"></i> Compra accesorio
                                </b>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-primary" data-toggle="tooltip" title="Consultar perfil">
                                        <i class="glyphicon glyphicon-folder-open"></i>
                                    </button>
                                    <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Editar cliente"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Eliminar cliente" onclick="eliminar()"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>



                    </tbody>
                </table>
            </div>
    	</div>

		<!-- END Listado de proveedores -->

	</div>

</div>
<!-- FRM Registrar Proveedor -->
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
                    <h3 class="block-title">Registro Proveedor</h3>
                </div>
                <div class="block-content" style="margin-bottom: 4em;">
                    <div class="row text-justify">
                        <!-- Formulario de registro de usuario -->
                        <form class="form-horizontal push-10-t block-content" action="base_forms_elements.html" method="post" onsubmit="return false;">
                            <h3 class="">
                                Información Proveedor
                            </h3>
                            <hr>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-material form-material-primary input-group">
                                        <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                        <label for="material-color-primary">Nombre proveedor *</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-material form-material-primary input-group">
                                        <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                        <label for="material-color-primary">Nº Telefono *</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material form-material-primary input-group">
                                        <textarea class="form-control" id="material-textarea-small" name="material-textarea-small" rows="3" placeholder="Opcional"></textarea>
                                        <label for="material-textarea-small">Dirección</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-material form-material-primary input-group">
                                        <textarea class="form-control" id="material-textarea-small" name="material-textarea-small" rows="3" placeholder="Opcional"></textarea>
                                        <label for="material-textarea-small">Información extra</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                            </div>

							
                            <div class="form-group">
                            	<div class="col-sm-12">
                            		<h4 style="margin-bottom:1em;">Persona de contacto</h4>
                            	</div>
                                <div class="col-sm-4">
                                    <div class="form-material form-material-primary input-group">
                                        <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                        <label for="material-color-primary">Nombre *</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-material form-material-primary input-group">
                                        <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                        <label for="material-color-primary">Apellido Paterno</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-material form-material-primary input-group">
                                        <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                        <label for="material-color-primary">Apellido Materno</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END Formulario de registro de cliente -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-sm btn-success" type="button">Registrar</button>
            </div>
        </div>
    </div>
</div>
<!-- END FRM Registrar Proveedor -->
<!-- Registrar cliente -->
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
                    <h3 class="block-title">Registro cliente</h3>
                </div>
                <div class="block-content" style="margin-bottom: 4em;">
                    <div class="row text-justify">
                        <!-- Formulario de registro de usuario -->
                        <form class="form-horizontal push-10-t block-content" action="base_forms_elements.html" method="post" onsubmit="return false;">
                            <h3 class="">
                                Información del cliente
                            </h3>
                            <hr>
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
                                        <label for="material-color-primary">Nº Telefono *</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-material form-material-primary input-group">
                                        <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                        <label for="material-color-primary">Apellido Paterno *</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-material form-material-primary input-group">
                                        <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                        <label for="material-color-primary">Apellido Materno</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-primary input-group">
                                        <textarea class="form-control" id="material-textarea-small" name="material-textarea-small" rows="3" placeholder="Opcional: Información complementaria del cliente"></textarea>
                                        <label for="material-textarea-small">Información extra</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END Formulario de registro de cliente -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-sm btn-success" type="button">Registrar</button>
            </div>
        </div>
    </div>
</div>
<!-- END Registrar cliente -->



<script>
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

<!-- Page JS Plugins -->
<script src="<?php echo base_url(); ?>assets/js/plugins/chartjsv2/Chart.min.js"></script>

<!-- Page JS Code -->
<script src="<?php echo base_url(); ?>assets/js/pages/base_comp_chartjs_v2.js"></script>