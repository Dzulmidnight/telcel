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
                Clientes registrados: <span class="text-danger"><?= $total_clientes; ?></span>
            </h3>
        </div>

        <div class="col-sm-5 text-right hidden-xs">
            <button type="button" class="btn btn-rounded btn-round btn-success" data-toggle="modal" data-target="#modal-popout2">
                <span data-toggle="tooltip" title="Agregar nuevo cliente">
                    <i class="fa fa-user-plus"></i> Nuevo
                </span>
            </button>
            <button class="btn btn-rounded btn-round btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
        </div>
    </div>

</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">

	<div class="row">
        <div class="col-lg-3" style="margin-bottom:1em;">
            <select class="js-select2 form-control" id="example-select2-multiple" name="example-select2-multiple" style="width: 100%;" data-placeholder="Sucursales" multiple>
                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                <?php foreach($row_sucursales as $sucursal): ?>
                    <option value="<?= $sucursal->id_sucursal; ?>"><?= $sucursal->nombre; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
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
                        <?php foreach ($row_clientes as $cliente): ?>
                            <tr>
                                <td class="text-center"><?= $cliente->id_cliente; ?></td>
                                <td>
                                    <i class="fa fa-home"></i> <?= $cliente->id_sucursal; ?>
                                </td>
                                <td class="">
                                    <span class="text-primary"><?= $cliente->nombre; ?></span> <?= $cliente->ap_paterno; ?> <?= $cliente->ap_materno; ?>
                                </td>
                                <td class="hidden-xs"><?= $cliente->telefono; ?></td>
                                <td class="hidden-xs">
                                    <?php 
                                    if(!empty($cliente->email)){
                                        echo '<p><b>Email</b>: '.$cliente->email.'</p>';
                                    }
                                    if(!empty($cliente->informacion_extra)){
                                        echo '<p><b>Extra</b>: '.$cliente->informacion_extra.'</p>';
                                    }
                                    
                                     ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <!--<a class="btn btn-sm btn-primary" href="<?php echo base_url('backend/MOD_CLIENTES/clientes/detalle'); ?>" data-toggle="tooltip" title="Consultar perfil">
                                            <i class="glyphicon glyphicon-folder-open"></i>
                                        </a>-->
                                        <button class="btn btn-sm btn-default" type="button" data-toggle="modal" data-target="#modal-editar" onclick="editarCliente('<?= base_url(); ?>backend/MOD_CLIENTES/Clientes/detalle_cliente/', <?= $cliente->id_cliente; ?> );">
                                            <i class="fa fa-pencil" data-toggle="tooltip" title="Editar cliente"></i>
                                        </button>
                                
                                        <button class="btn btn-sm btn-danger" type="button" data-toggle="tooltip" title="Eliminar cliente" onclick="eliminar('id_eliminar', <?= $cliente->id_cliente; ?>, 'frm_eliminar_cliente');"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <!--
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
                                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('backend/MOD_CLIENTES/clientes/detalle'); ?>" data-toggle="tooltip" title="Consultar perfil">
                                            <i class="glyphicon glyphicon-folder-open"></i>
                                        </a>
                                        <button class="btn btn-sm btn-default" type="button" data-toggle="modal" data-target="#modal-editar"><i class="fa fa-pencil" data-toggle="tooltip" title="Editar cliente"></i></button>
                                        <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Eliminar cliente" onclick="eliminar()"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">2</td>
                                <td>
                                    <i class="fa fa-home"></i> Sucursal 2
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
                                        <button class="btn btn-sm btn-default" type="button" data-toggle="modal" data-target="#modal-editar"><i class="fa fa-pencil" data-toggle="tooltip" title="Editar cliente"></i></button>
                                        <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Eliminar cliente" onclick="eliminar()"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">3</td>
                                <td>
                                    <i class="fa fa-home"></i> Sucursal 3
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
                                        <button class="btn btn-sm btn-default" type="button" data-toggle="modal" data-target="#modal-editar"><i class="fa fa-pencil" data-toggle="tooltip" title="Editar cliente"></i></button>
                                        <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Eliminar cliente" onclick="eliminar()"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">4</td>
                                <td>
                                    <i class="fa fa-home"></i> Sucursal 4
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
                                        <button class="btn btn-sm btn-default" type="button" data-toggle="modal" data-target="#modal-editar"><i class="fa fa-pencil" data-toggle="tooltip" title="Editar cliente"></i></button>
                                        <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Eliminar cliente" onclick="eliminar()"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                        -->


                    </tbody>
                </table>
            </div>
    	</div>
        <!-- formulario eliminar cliente -->
        <form id="frm_eliminar_cliente" action="<?= base_url(); ?>/backend/MOD_CLIENTES/Clientes/eliminar" method="POST">
            <input type="hidden" id="id_eliminar" name="id_eliminar" placeholder="id que se va a eliminar">
        </form>
		<!-- END Listado de proveedores -->

	</div>

</div>

<!-- Registrar cliente -->
<div class="modal fade" id="modal-popout2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout">
        <div class="modal-content">
            <form class="form-horizontal push-10-t block-content" action="<?= base_url(); ?>/backend/MOD_CLIENTES/clientes/agregar" method="post">
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
                            <h3 class="">
                                Información del cliente
                            </h3>
                            <hr>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-material form-material-primary input-group">
                                        <input class="form-control" type="text" id="nombre" name="nombre" placeholder="" required>
                                        <label for="nombre">Nombre *</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-material form-material-primary input-group">
                                        <input class="form-control" type="text" id="telefono" name="telefono" placeholder="" required>
                                        <label for="telefono">Nº Telefono *</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-material form-material-primary input-group">
                                        <input class="form-control" type="text" id="ap_paterno" name="ap_paterno" placeholder="" required>
                                        <label for="ap_paterno">Apellido Paterno *</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-material form-material-primary input-group">
                                        <input class="form-control" type="text" id="ap_materno" name="ap_materno" placeholder="">
                                        <label for="ap_materno">Apellido Materno</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-primary input-group">
                                        <textarea class="form-control" id="informacion_extra" name="informacion_extra" rows="3" placeholder="Opcional: Información complementaria del cliente"></textarea>
                                        <label for="informacion_extra">Información extra</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="fecha_registro" value="<?= time(); ?>">
                            <input type="hidden" name="id_sucursal" value="<?= $this->session->userdata('id_sucursal'); ?>">

                            <!-- END Formulario de registro de cliente -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-sm btn-success" type="submit">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Registrar cliente -->



<!-- Editar cliente -->
<div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <div class="modal-content">
            <form id="frm_editar_cliente" class="form-horizontal push-10-t block-content" action="<?= base_url(); ?>backend/MOD_CLIENTES/clientes/editar" method="post">
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-warning">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Editar información cliente</h3>
                    </div>
                    <div class="block-content" style="margin-bottom: 4em;">
                        <div class="row text-justify">
                            <!-- Formulario de registro de usuario -->
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <div class="form-material form-material-primary input-group">
                                            <input class="form-control" type="text" id="edit_nombre" name="edit_nombre" placeholder="" value="Nombre del cliente" required>
                                            <label for="edit_nombre">Nombre *</label>
                                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-material form-material-primary input-group">
                                            <input class="form-control" type="text" id="edit_telefono" name="edit_telefono" placeholder="" value="951 199 9723" required>
                                            <label for="edit_telefono">Nº Telefono *</label>
                                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <div class="form-material form-material-primary input-group">
                                            <input class="form-control" type="text" id="edit_ap_paterno" name="edit_ap_paterno" placeholder="" value="apellido paterno" required>
                                            <label for="edit_ap_paterno">Apellido Paterno *</label>
                                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-material form-material-primary input-group">
                                            <input class="form-control" type="text" id="edit_ap_materno" name="edit_ap_materno" placeholder="" value="apellido materno" required>
                                            <label for="edit_ap_materno">Apellido Materno</label>
                                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-material form-material-primary input-group">
                                            <input class="form-control" type="text" id="edit_email" name="edit_email" placeholder="" value="apellido materno">
                                            <label for="edit_email">Email</label>
                                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary input-group">
                                            <textarea class="form-control" id="edit_informacion_extra" name="edit_informacion_extra" rows="3" placeholder="Opcional: Información complementaria del cliente">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim laudantium distinctio quas cupiditate, aliquam illum esse mollitia?</textarea>
                                            <label for="edit_informacion_extra">Información extra</label>
                                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" id="id_cliente" name="id_cliente">

                            <!-- END Formulario de registro de cliente -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-sm btn-success" type="submit">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Editar cliente -->



<script>

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
<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>