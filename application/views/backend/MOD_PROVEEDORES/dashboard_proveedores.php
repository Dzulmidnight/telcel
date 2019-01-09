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
                DASHBOARD PROVEEDORES
            </h3>
        </div>

        <div class="col-sm-5 text-right hidden-xs">
            <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#modal-nuevo-proveedor">
                <span data-toggle="tooltip" title="Agregar nuevo proveedor">
                    <i class="fa fa-plus"></i> Nuevo
                </span>
            </button>
            <button class="btn btn-rounded btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
        </div>
    </div>

</div>
<!-- END Page Header -->
<div id="">
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
                                    Contacto
                                </th>
                                <th class="text-center">...</th>
                            </tr>
                        </thead>
                        <tbody id="listadoProveedores">
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
                                            <a  class="disabled btn btn-sm btn-primary" href="<?php echo base_url('backend/MOD_PROVEEDORES/Proveedores/detalle'); ?>" data-toggle="tooltip" title="Consultar perfil">
                                                <i class="glyphicon glyphicon-folder-open"></i>
                                            </a>
                                            <button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#modal-editar-proveedor<?= $proveedor->id_proveedor ?>">
                                                <i class="fa fa-pencil" data-toggle="tooltip" title="Editar proveedor"></i>
                                            </button>
                          
                                            <form id="frm_eliminar_proveedor" style="display:inline" action="<?= base_url(); ?>/backend/MOD_PROVEEDORES/proveedores/eliminar/<?= $proveedor->id_proveedor?>">
                                                <button class="btn btn-sm btn-danger" type="button" data-toggle="tooltip" title="Eliminar proveedor" onclick="eliminarDatos('frm_eliminar_proveedor');"><i class="fa fa-times"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Editar proveedor -->
                                <div class="modal fade" id="modal-editar-proveedor<?= $proveedor->id_proveedor ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-popout">
                                        <div class="modal-content">
                                            <?php 
                                            $atributos = array('class' => 'form-horizontal push-10-t block-content');
                                            echo form_open('backend/MOD_PROVEEDORES/proveedores/actualizar/'.$proveedor->id_proveedor); 
                                            ?>
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
                                                            <div class="col-sm-12">
                                                                <h3 class="">
                                                                    Información Proveedor
                                                                </h3>
                                                                <hr>
                                                            </div>

                                                            <div id="informacionProveedor">
                                                                <div class="form-group">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-material form-material-primary input-group">
                                                                            <input class="form-control" type="text" id="editar_nombre_proveedor" name="editar_nombre_proveedor" placeholder="" value="<?= $proveedor->nombre ?>" required>
                                                                            <label for="editar_nombre_proveedor">Nombre proveedor *</label>
                                                                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-material form-material-primary input-group">
                                                                            <input class="form-control" type="text" id="editar_telefono_proveedor" name="editar_telefono_proveedor" placeholder="" value="<?= $proveedor->telefono ?>" required>
                                                                            <label for="editar_telefono_proveedor">Nº Telefono *</label>
                                                                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-xs-6">
                                                                        <div class="form-material form-material-primary input-group">
                                                                            <textarea class="form-control" id="editar_direccion" name="editar_direccion" rows="3" placeholder="Opcional"><?= $proveedor->direccion ?></textarea>
                                                                            <label for="editar_direccion">Dirección</label>
                                                                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        <div class="form-material form-material-primary input-group">
                                                                            <textarea class="form-control" id="editar_informacion_extra" name="editar_informacion_extra" rows="3" placeholder="Opcional"><?= $proveedor->informacion_extra ?></textarea>
                                                                            <label for="editar_informacion_extra">Información extra</label>
                                                                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <h4 style="margin-bottom:1em;">Persona de contacto</h4>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-material form-material-primary input-group">
                                                                        <input class="form-control" type="text" id="editar_nombre_contacto" name="editar_nombre_contacto" placeholder="" value="<?= $proveedor->nombreContacto ?>" required>
                                                                        <label for="editar_nombre_contacto">Nombre *</label>
                                                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="form-material form-material-primary input-group">
                                                                        <input class="form-control" type="text" id="editar_ap_paterno_contacto" name="editar_ap_paterno_contacto" placeholder="" value="<?= $proveedor->ap_paterno ?>">
                                                                        <label for="editar_ap_paterno_contacto">Apellido Paterno</label>
                                                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-material form-material-primary input-group">
                                                                        <input class="form-control" type="text" id="editar_ap_materno_contacto" name="editar_ap_materno_contacto" placeholder="" value="<?= $proveedor->ap_materno ?>" >
                                                                        <label for="editar_ap_materno_contacto">Apellido Materno</label>
                                                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="form-material form-material-primary input-group">
                                                                        <input class="form-control" type="text" id="editar_telefono_contacto" name="editar_telefono_contacto" placeholder="" value="<?= $proveedor->telefonoContacto ?>">
                                                                        <label for="editar_telefono_contacto">Telefono</label>
                                                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-material form-material-primary input-group">
                                                                        <input class="form-control" type="text" id="editar_email_contacto" name="editar_email_contacto" placeholder="" value="<?= $proveedor->emailContacto ?>">
                                                                        <label for="editar_email_contacto">Email</label>
                                                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <!-- END Formulario de registro de cliente -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="id_proveedor" value="<?= $proveedor->id_proveedor ?>">
                                                    <input type="hidden" name="id_contacto" value="<?= $proveedor->id_contacto ?>">
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                                                    <button class="btn btn-sm btn-success" type="submit"> Guardar cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Editar proveedor -->


                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- END Listado de proveedores -->

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
                                                <textarea class="form-control" id="direccion" name="direccion" rows="3" placeholder="Opcional"></textarea>
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
                                                <input class="form-control" type="text" id="ap_paterno" name="ap_paterno" placeholder="" 
                                                >
                                                <label for="material-color-primary">Apellido Paterno</label>
                                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-material form-material-primary input-group">
                                                <input class="form-control" type="text" id="ap_materno" name="ap_materno" placeholder="" 
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
                            <input type="hidden" name="fecha_registro" value="<?= time(); ?>">
                            <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                            <button class="btn btn-sm btn-success" type="submit">Registrar proveedor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END FRM Registrar Proveedor -->
    </div>
</div>

<script src="<?= base_url('assets/js/propios/funciones.js') ?>"></script>
<!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>