<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                Servicio Detallado
            </h3>
        </div>
        <!--<div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>UI Elements</li>
                <li><a class="link-effect" href="">Tiles</a></li>
            </ol>
        </div>-->
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content content-narrow">
    <!-- Modulos -->

    <div class="content-grid push-50">
        <div class="row">
        	<div class="col-md-6 block">
                <form class="form-horizontal push-10-t block-content" action="base_forms_elements.html" method="post" onsubmit="return false;">
                    <h3 class="">
                        Información del cliente
                    </h3>
                    <hr>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <b class="text-success">Buscar cliente</b>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button"><i class="fa fa-search"></i> Buscar</button>
                                </span>
                                <input class="form-control" type="text" id="example-input1-group2" name="example-input1-group2" placeholder="Nombre y apellido">
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h4 style="margin-bottom: 1em;">Nuevo cliente</h4>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="form-material form-material-primary">
                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                <label for="material-color-primary">Nombre *</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-material form-material-primary">
                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                <label for="material-color-primary">Telefono *</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="form-material form-material-primary">
                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                <label for="material-color-primary">Apellido Paterno *</label>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-material form-material-primary">
                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                <label for="material-color-primary">Apellido Materno *</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <textarea class="form-control" id="material-textarea-small" name="material-textarea-small" rows="3" placeholder="Opcional: detalles del servicio"></textarea>
                                <label for="material-textarea-small">Información extra</label>
                            </div>
                        </div>
                    </div>
                </form>

        	</div>

            <div class="col-md-6 block">
                <form class="form-horizontal push-10-t block-content " action="base_forms_elements.html" method="post" onsubmit="return false;">
                    <h3 class="">
                        Registrar Servicio Detallado
                    </h3>
                    <hr style="margin-bottom: 2em;">
                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="form-material">
                                <select class="form-control" id="material-select" name="material-select" size="1" required="" onchange="tipoServicio()">
                                    <option>...</option>
                                    <option value="1">Venta de equipo telefonico</option>
                                    <option value="2">Servicio Tecnico</option>
                                </select>
                                <label for="material-select">Servicios recurrentes *</label>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-material form-material-primary">
                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="Nuevo servicio">
                                <label for="material-color-primary">Otro servicio</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="form-material form-material-primary">
                                <input class="form-control" type="number" step="0.01" id="material-color-primary" name="material-color-primary" placeholder="Ej: 150.50" required>
                                <label for="material-color-primary">Monto del servicio *</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="form-material">
                                <textarea class="form-control" id="material-textarea-small" name="material-textarea-small" rows="3" placeholder="Opcional: detalles del servicio"></textarea>
                                <label for="material-textarea-small">Detalles del servicio</label>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-material">
                                <input type="file" class="form-control" id="comprobante_pago" name="comprobante_pago">
                                <label for="comprobante_pago"></label>
                            </div>
                        </div>

                    </div>

                </form>

            </div>

            <div class="col-md-12">
                <div class="form-group text-right">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-default" onclick="mostrarServicio('cancelar', 'servicio_interno')">
                            Cancelar
                        </button>
                        <button class="btn btn-success">
                            Registrar servicio
                        </button>  
                    </div>
                </div>
            </div>

		</div>
	</div>
</div>