<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                DASHBOARD GARANTIA
            </h3>
        </div>

        <div class="col-sm-5 text-right hidden-xs">
            <button class="btn btn-rounded btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
        </div>
    </div>

</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">
	<!-- Busqueda de equipo -->
	<div class="bg-gray-lighter">
	    <section class="content content-full content-boxed">
	        <!-- Section Content -->
	        <div class="row">
	            <div class="col-sm-8 col-sm-offset-2">
	                <form action="base_pages_support.html" method="post">
	                    <div class="input-group input-group-lg">
	                        <input class="form-control" type="text" placeholder="Busqueda de equipo (Telefono, IMEI, ID Soporte)">
	                        <div class="input-group-btn">
	                            <button class="btn btn-default"><i class="fa fa-search"></i></button>
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
                    
                </h3>
            </div>
            <div class="block-content">
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
                <table class="js-table-sections table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>
                                #ID
                            </th>
                            <th>
                                IMEI
                            </th>
                            <th>
                                Nº Telefono
                            </th>
                            <th>
                                EQUIPO
                            </th>
                            <th>
                                Cliente
                            </th>
                            <th>
                                Garantia
                            </th>
                        </tr>
                    </thead>
                    
                    <?php 
                    for ($i=0; $i < 5; $i++) { 
                    ?>
                    <tbody class="js-table-sections-header">
                    <!--<tbody class="js-table-sections-header open">-->
                        <tr>
                            <!-- ID general -->
                            <td>
                                <i class="fa fa-angle-right"></i> <span style="padding-left: 1em;">342</span>
                            </td>
                            <!-- IMEI -->
                            <td>
                                2234SDF22
                            </td>
                            <!-- Nº DE TELEFONO -->
                            <td>
                                951 199 9723
                            </td>
                            <!-- EQUIPO -->
                            <td>
                                <a href="#">
                                    Nombre del equipo
                                </a>
                            </td>
                            <!-- CLIENTE -->
                            <td>
                                <a href="#">Nombre del cliente</a>
                            </td>
                            <!-- FECHA DE INGRESO -->
                            <td class="danger">
                                <?php 
                                    $validez = 2.592e+6; // 30 dias
                                    $fin_garantia = date('d/m/Y', time()+$validez);
                                 ?>
                                <?= date('d/m/Y', time()); ?>
                                -
                                <?= $fin_garantia ?>
                            </td>

                        </tr>
                    </tbody>
                    <tbody style="font-size:12px;border: 2px solid #ee5253;">
                        <tr style="margin:0px;padding:0px;">
                            <td colspan="6" style="padding:0px;padding-top:10px;">
                                <p class="h4">Historial de acciones</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <b>Fecha</b>
                            </td>
                            <td colspan="3">
                                <b>Actualización</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <?= date('d/m/Y', time()) ?>
                            </td>
                            <td colspan="3">
                                Reemplazo de pieza solicitado
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <?= date('d/m/Y', time()) ?>
                            </td>
                            <td colspan="3">
                                Equipo revisado por el tecnico
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <?= date('d/m/Y', time()) ?>
                            </td>
                            <td colspan="3">
                                En espera de entrar a revisión
                            </td>
                        </tr>

                    </tbody>

                    <?php
                    }
                     ?>
                   
                </table>
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
<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>

<!-- Page JS Code -->
<script>
    jQuery(function () {
        // Init page helpers (Table Tools helper)
        App.initHelpers('table-tools');
    });
</script>