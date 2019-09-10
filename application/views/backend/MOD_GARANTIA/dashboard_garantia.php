<!-- Page Content -->
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="block">
                <div class="block-header">
                    <div class="row">
                            <div class="col-sm-7">
                                <h3 class="block-title">
                                    DASHBOARD GARANTIA
                                    <input type="hidden" id="input-base-url" value="<?= base_url(); ?>">
                                </h3>
                            </div>

                            <div class="col-sm-5 text-right hidden-xs">
                                <button class="btn btn-rounded btn-primary" onclick="history.back(-1)">
                                    <i class="fa fa-arrow-left"></i> Regresar
                                </button>
                            </div>
                    </div>
                </div>
                <!--<div class="block-content">
                    <ul class="nav nav-pills push">
                        <li class="active">
                            <a href="javascript:void(0)">
                                Garantia
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('backend/MOD_GARANTIA/Garantia/devoluciones'); ?>">
                                Devoluciones
                            </a>
                        </li>
                    </ul>
                </div>-->
            </div>
        </div>
    </div>
	<!-- Busqueda de equipo -->
	<div class="bg-gray-lighter">
	    <section class="content content-full content-boxed">
	        <!-- Section Content -->
	        <div class="row">
	            <div class="col-sm-8 col-sm-offset-2">
                    <p class="text-primary" style="margin:0px;">
                        <i class="si si-info"></i> Consultar la garantia de un articulo
                    </p>
	                <form action="#" method="post">
	                    <div class="input-group input-group-lg">
                            <!--<div class="input-group-btn">
                                <select name="" id="">
                                    <option value="">Tipo</option>
                                    <option value="">Telefono</option>
                                    <option value="">Articulo</option>
                                </select>
                            </div>-->

	                        <input class="form-control" type="text" id="numero-ticket" placeholder="Busqueda de articulo (Ingrese el numero de ticket)">
	                        <div class="input-group-btn">
	                            <button class="btn btn-default" type="button" onclick="consultarGarantia();"><i class="fa fa-search"></i></button>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
	        <!-- END Section Content -->
	    </section>
	</div>
	<!-- END Busqueda de equipo -->
    <!-- Opciones servicio tecnico -->
    <div class="bg-white">

        <!-- Table Sections (.js-table-sections class is initialized in App() -> uiHelperTableToolsSections()) -->
        <div class="block">
            <div class="block-header">
                <div class="block-options">
                    
                </div>
                <h3 class="block-title">
                    Detalle de la transacción
                </h3>
            </div>
            <div class="block-content" style="padding-bottom:3em;">
                <div id="div-resultado-ticket"></div>
                <!--
                Separate your table content with multiple tbody sections. Add one row and add the class .js-table-sections-header to a
                tbody section to make it clickable. It will then toggle the next tbody section which can have multiple rows. Eg:

                <tbody class="js-table-sections-header">One row</tbody>
                <tbody>Multiple rows</tbody>
                <tbody class="js-table-sections-header">One row</tbody>
                <tbody>Multiple rows</tbody>
                <tbody class="js-table-sections-header">One row</tbody>
                <tbody>Multiple rows</tbody>

                You can also add the class .open in your tbody.js-table-sections-header to make the next tbody section visible by default
                -->
            </div>
        </div>
        <!-- END Table Sections -->

    </div>
    <!-- END Opciones servico tecnico -->

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

<!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
<script src="<?= base_url('assets/js/propios/garantia.js'); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>

<!-- Page JS Code -->
<script>
    jQuery(function () {
        // Init page helpers (Table Tools helper)
        App.initHelpers('table-tools');
    });
</script>