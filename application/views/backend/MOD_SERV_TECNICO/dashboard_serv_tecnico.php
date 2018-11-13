<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                DASHBOARD SERVICIO TECNICO
            </h3>
        </div>

        <!--<div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>UI Elements</li>
                <li><a class="link-effect" href="">Tiles</a></li>
            </ol>
        </div>-->
    </div>
	<!-- Modulos -->
    <button class="btn btn-sm btn-primary" onclick="history.back(-1)">
        <i class="fa fa-arrow-left"></i> Regresar
    </button>
    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-popout2">
        <span data-toggle="tooltip" title="Agregar nuevo cliente">
            <i class="fa fa-user-plus"></i> Nuevo
        </span>
    </button>


</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">

	<!-- Opciones servicio tecnico -->
	<div class="bg-white">
	    <section class="content content-boxed overflow-hidden">
	        <!-- Section Content -->
	        <div class="content-grid">
	            <div class="row">
	                <div class="col-xs-6 col-sm-3 animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown">
	                    <a class="block block-bordered block-rounded block-link-hover3" href="javascript:void(0)">
	                        <div class="block-content block-content-full border-b text-center">
	                            <div class="item">
	                                <i class="si si-user text-amethyst"></i>
	                            </div>
	                        </div>
	                        <div class="block-content block-content-full block-content-mini">
	                            <span class="font-w600 text-uppercase"><span class="badge badge-default pull-right">23</span> Account</span>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-xs-6 col-sm-3 animated fadeInDown" data-toggle="appear" data-timeout="200" data-class="animated fadeInDown">
	                    <a class="block block-bordered block-rounded block-link-hover3" href="javascript:void(0)">
	                        <div class="block-content block-content-full border-b text-center">
	                            <div class="item">
	                                <i class="si si-settings text-city"></i>
	                            </div>
	                        </div>
	                        <div class="block-content block-content-full block-content-mini">
	                            <span class="font-w600 text-uppercase"><span class="badge badge-default pull-right">11</span> Features</span>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-xs-6 col-sm-3 animated fadeInDown" data-toggle="appear" data-timeout="400" data-class="animated fadeInDown">
	                    <a class="block block-bordered block-rounded block-link-hover3" href="javascript:void(0)">
	                        <div class="block-content block-content-full border-b text-center">
	                            <div class="item">
	                                <i class="si si-target text-flat"></i>
	                            </div>
	                        </div>
	                        <div class="block-content block-content-full block-content-mini">
	                            <span class="font-w600 text-uppercase"><span class="badge badge-default pull-right">16</span> Services</span>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-xs-6 col-sm-3 animated fadeInDown" data-toggle="appear" data-timeout="600" data-class="animated fadeInDown">
	                    <a class="block block-bordered block-rounded block-link-hover3" href="javascript:void(0)">
	                        <div class="block-content block-content-full border-b text-center">
	                            <div class="item">
	                                <i class="si si-wallet text-smooth"></i>
	                            </div>
	                        </div>
	                        <div class="block-content block-content-full block-content-mini">
	                            <span class="font-w600 text-uppercase"><span class="badge badge-default pull-right">19</span> Payment</span>
	                        </div>
	                    </a>
	                </div>
	            </div>
	        </div>
	        <!-- END Section Content -->
	    </section>
	</div>
	<!-- END Opciones servico tecnico -->

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
	<div class="row">
		<div class="col-lg-7">
			<div class="row">
				<div class="col-md-12">
			        <!-- Pie Chart -->
			        <div class="block">
			            <div class="block-header">
			                <ul class="block-options">
			                    <li>
			                        <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
			                    </li>
			                </ul>
			                <h3 class="block-title">Stock por proveedor</h3>
			            </div>
			            <div class="block-content block-content-full text-center">
			                <!-- Pie Chart Container -->
			                <canvas class="js-chartjs2-pie"></canvas>
			            </div>
			        </div>
			        <!-- END Pie Chart -->
				</div>
			</div>
		</div>


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
                            <th>Saldos</th>
                            <th class="text-center">...</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="">
                                <span class="text-primary">Nombre del proveedor</span>
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

                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-primary" data-toggle="tooltip" title="Consultar perfil">
                                        <i class="glyphicon glyphicon-folder-open"></i>
                                    </button>
                                    <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Editar proveedor"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Eliminar proveedor" onclick="eliminar()"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="">
                                <span class="text-primary">Nombre del proveedor</span>
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
                            	<b class="text-success">
                            		<i class="fa fa-arrow-up"></i> $ 2,400
                            	</b>
                            </td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-primary" data-toggle="tooltip" title="Consultar perfil">
                                        <i class="glyphicon glyphicon-folder-open"></i>
                                    </button>
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

<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
<!-- Page JS Plugins -->
<script src="<?php echo base_url(); ?>assets/js/plugins/chartjsv2/Chart.min.js"></script>
<!-- Page JS Code -->
<script src="<?php echo base_url(); ?>assets/js/pages/base_comp_chartjs_v2.js"></script>