<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                DASHBOARD PROVEEDORES
            </h3>
        </div>

        <div class="col-sm-5 text-right hidden-xs">
            <button class="btn btn-rounded btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
            <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#modal-nuevo-proveedor">
                <span data-toggle="tooltip" title="Agregar nuevo proveedor">
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
                            <th>Proveedor</th>
                            <th class="hidden-xs">Telefono</th>
                            <th>Stock</th>
                            <th>Balance</th>
                            <th>
                                Extra
                            </th>
                            <th class="text-center">...</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="">
                            	<a href="<?php echo base_url('backend/MOD_PROVEEDORES/Proveedores/detalle'); ?>">
                            		Nombre del proveedor
                            	</a>
                            </td>
                            <td class="hidden-xs">9511999723</td>
                            <!-- Stock -->
                            <td>
                            	<a href="#">
                            		<b>345</b>
                            	</a>
                            </td>
                            <!-- Saldos -->
                            <td>
                            	<b class="text-danger">
                            		<i class="fa fa-arrow-down"></i> $ 12,400
                            	</b>
                            </td>
                            <!-- Información extra -->
                            <td>
                                
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
                        <tr>
                            <td class="text-center">1</td>
                            <td class="">
                            	<a href="<?php echo base_url('backend/MOD_PROVEEDORES/Proveedores/detalle'); ?>">
                            		Nombre del proveedor
                            	</a>
                            </td>
                            <td class="hidden-xs">9511999723</td>
                            <!-- Stock -->
                            <td>
                            	<a href="#">
                            		<b>289</b>
                            	</a>
                            </td>
                            <!-- Saldos -->
                            <td>
                            	<b class="text-success">
                            		<i class="fa fa-arrow-up"></i> $ 2,400
                            	</b>
                            </td>
                            <!-- Información extra -->
                            <td>
                                
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a  class="btn btn-sm btn-primary" href="<?php echo base_url('backend/MOD_PROVEEDORES/Proveedores/detalle'); ?>" data-toggle="tooltip" title="Consultar perfil">
                                        <i class="glyphicon glyphicon-folder-open"></i>
                                    </a>
                                    <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Editar proveedor"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Eliminar proveedor" onclick="eliminar()"><i class="fa fa-times"></i></button>
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
<div class="modal fade" id="modal-nuevo-proveedor" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout">
        <div class="modal-content">
            <?php 
            $atributos = array('class' => 'form-horizontal push-10-t block-content');
            echo form_open('backend/MOD_PROVEEDORES/proveedores/agregar'); 
            ?>
            <form action="">
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
                            <h3 class="">
                                Información Proveedor
                            </h3>
                            <hr>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-material form-material-primary input-group">
                                        <input class="form-control" type="text" id="nombre" name="nombre" placeholder="" required>
                                        <label for="material-color-primary">Nombre proveedor *</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-material form-material-primary input-group">
                                        <input class="form-control" type="text" id="telefono" name="telefono" placeholder="" required>
                                        <label for="material-color-primary">Nº Telefono *</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material form-material-primary input-group">
                                        <textarea class="form-control" id="email" name="email" rows="3" placeholder="Opcional"></textarea>
                                        <label for="material-textarea-small">Dirección</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-material form-material-primary input-group">
                                        <textarea class="form-control" id="informacion_extra" name="informacion_extra" rows="3" placeholder="Opcional"></textarea>
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
                                        <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" 
                                        >
                                        <label for="material-color-primary">Nombre *</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-material form-material-primary input-group">
                                        <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" 
                                        >
                                        <label for="material-color-primary">Apellido Paterno</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-material form-material-primary input-group">
                                        <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" 
                                        >
                                        <label for="material-color-primary">Apellido Materno</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-material form-material-primary input-group">
                                        <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" 
                                        >
                                        <label for="material-color-primary">Teléfono</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-material form-material-primary input-group">
                                        <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" 
                                        >
                                        <label for="material-color-primary">Email</label>
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- END Formulario de registro de cliente -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-sm btn-success" type="submit">Registrar proveedor</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END FRM Registrar Proveedor -->


<!-- Editar proveedor -->
<div class="modal fade" id="modal-editar-proveedor" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-warning">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Editar proveedor</h3>
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
<!-- END Editar proveedor -->

<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
<!-- Page JS Plugins -->