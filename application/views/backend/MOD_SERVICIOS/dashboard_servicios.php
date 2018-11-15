<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                DASHBOARD SERVICIOS
            </h3>
        </div>

        <div class="col-sm-5 text-right hidden-xs">
            <button class="btn btn-sm btn-round btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
        </div>
    </div>

</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">


    <div class="block">
        <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
            <li class="active">
                <a href="#btabs-alt-static-home">Servicios</a>
            </li>
            <li class="">
                <a href="#btabs-alt-static-profile">Historial de servicios</a>
            </li>
            <li class="pull-right">
                <a href="#btabs-alt-static-settings" data-toggle="tooltip" title="" data-original-title="Settings"><i class="si si-settings"></i></a>
            </li>
        </ul>
        <div class="block-content tab-content">
            

            <!-- Tab registrar servicio -->
            <div class="tab-pane active" id="btabs-alt-static-home">
                <h4 class="font-w300 push-15">REGISTRAR SERVICIO</h4>

                <div class="row">
                    <!-- Div servicio_express -->
                    <div class="col-md-12" id="frm_servicio_express" style="">
                        <form class="form-horizontal push-10-t" action="base_forms_elements.html" method="post" onsubmit="return false;">
                            <!-- Lista de servicios -->
                            <div class="form-group">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="form-material">
                                            <select class="form-control" id="material-select" name="material-select" size="1" required="" onchange="tipoServicio(this.value)">
                                                <option>...</option>
                                                <option value="1">Instalar whatsapp</option>
                                                <option value="1">Instalar facebook</option>
                                                <option value="1">Realizar recarga</option>
                                                <option value="2">Venta de accesorios</option>
                                                <option value="3">Venta de equipo telefonico</option>
                                                <option value="4">Servicio Tecnico</option>

                                            </select>
                                            <label for="material-select">Listado de servicios *</label>
                                        </div>
                                        <span class="input-group-btn">
                                            <button id="btn_nuevo_servicio" class="btn btn-sm btn-default" type="button" value="mostrar" onclick="nuevoServicio(this.id, this.value)">
                                                <i class="fa fa-plus"></i> Nuevo
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- END Lista de servicios -->
                            
                            <!-- FRM Nuevo servicio -->

                                <div id="frm_nuevo_servicio" class="col-sm-6 well" style="display:none">
                                    <div class="form-material input-group">
                                        <input class="form-control" type="text" id="register5-password" name="register5-password" placeholder="Escribre el nuevo servicio">
                                        <label for="register5-password">Nuevo Servicio</label>
                                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                    </div>
                                    <label class="css-input switch switch-sm switch-success">
                                        <input type="checkbox" checked=""><span></span> Necesita registrar usuario?
                                    </label>
                                    <br>
                                    <button class="btn btn-sm btn-success" style="margin-top:2em;">
                                        Guardar nuevo servicio
                                    </button>
                                </div>

                            <!-- END FRM Nuevo servicio -->

                            <!-- DIV contenedor servicio -->
                            <div id="contendor_servicio" class="row col-md-12">
                                <hr>

                                <!-- Registrar nuevo cliente -->
                                <div class="col-md-6 block">
                                    <form class="form-horizontal push-10-t block-content" action="base_forms_elements.html" method="post" onsubmit="return false;">
                                        <h3 class="h4">
                                            Información del cliente
                                        </h3>
                                        <hr>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <b class="text-success" style="margin-bottom:1em;">Buscar cliente</b>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info" type="button"><i class="fa fa-search"></i> Buscar</button>
                                                    </span>
                                                    <input class="form-control" type="text" id="example-input1-group2" name="example-input1-group2" placeholder="Nombre y apellido, Nº Telefono">
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
                                                    <label for="material-color-primary">Nº Telefono *</label>
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
                                <!-- END Registrar nuevo cliente -->

                                <!-- Registrar servicios -->
                                <div class="col-md-6 block">
                                    <form >
                                        <h3 class="h4">
                                            Datos del servicio
                                        </h3>
                                        <!--<hr style="margin-bottom: 2em;">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <div class="form-material">
                                                    <select class="form-control" id="material-select" name="material-select" size="1" required="" onchange="tipoServicio(this.value)">
                                                        <option>...</option>
                                                        <option value="1">Venta de accesorios</option>
                                                        <option value="2">Venta de equipo telefonico</option>
                                                        <option value="3">Servicio Tecnico</option>
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
                                        </div>-->

                                        <div id="contenedor_bloques">
                                        <hr>       
                                            <!-- DIV Servicio express -->
                                            <div id="div_venta_express" style="display:none">
                                                <p class="h3 text-danger" style="margin-bottom: 1em">
                                                    Registro express
                                                </p>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <div class="form-material form-material-primary">
                                                            <input class="form-control" type="number" step="0.01" min="1" id="material-color-primary" name="material-color-primary" placeholder="Ej: 150.50" required>
                                                            <label for="material-color-primary">Monto del servicio *</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="form-material">
                                                            <textarea class="form-control" id="material-textarea-small" name="material-textarea-small" rows="3" placeholder="Opcional: detalles del servicio"></textarea>
                                                            <label for="material-textarea-small">Detalles del servicio</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END DIV Servicio express -->       
                                            <!-- Div venta_accesorios -->
                                            <div id="div_venta_accesorios" style="display:none">
                                                <p class="text-danger h3" style="margin-bottom: 1em">
                                                    Venta de Accesorios
                                                </p class="text-danger h3">

                                                <div class="form-group">
                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                        <div class="form-material form-material-primary">
                                                            <input class="form-control" type="number" min="0" id="material-color-primary" name="material-color-primary" placeholder="Codigo del accesorio" required>
                                                            <label for="material-color-primary">CODIGO *</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                        <div class="row">
                                                            <div class="col-xs-6">
                                                                <div class="form-material form-material-primary">
                                                                    <input class="form-control" type="number" step="0.01" min="0" id="costo_accesorio" name="costo_accesorio" placeholder="Ej: 150.50" required>
                                                                    <label id="label_costo" for="costo_accesorio">Costo *</label>
                                                                </div>  
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <label class="css-input css-checkbox css-checkbox-warning">
                                                                    <input id="apartar_accesorio" type="checkbox" onclick="apartar(this.id,'label_costo')"><span></span> Apartar
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                
                                                <div class="row" style="margin-bottom:1em;">
                                                    <div class="col-md-12">
                                                        <h4>Información del accesorio</h4>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <td>Costo</td>
                                                                <td class="text-primary">$ 21,000 MXN</td>

                                                                <td>Marca</td>
                                                                <td class="text-primary">Samsung</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Modelo</td>
                                                                <td class="text-primary">Galaxy S10</td>

                                                                <td>Color</td>
                                                                <td class="text-primary">Azul</td>
                                                            </tr>
                                                            <tr>
                                                                <td>IMEI</td>
                                                                <td class="text-primary">232423423</td>

                                                                <td>ICCID</td>
                                                                <td class="text-primary">SDAA3341342</td>
                                                            </tr>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- END Div venta_accesorios -->

                                            <!-- Div venta_telefono -->
                                            <div id="div_venta_telefono" style="display:none">
                                                <p class="text-danger h3" style="margin-bottom: 1em">
                                                    Venta de Equipo
                                                </p>

                                                <div class="form-group">
                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                        <div class="form-material form-material-primary">
                                                            <input class="form-control" type="number" min="0" id="material-color-primary" name="material-color-primary" placeholder="IMEI del equipo" required>
                                                            <label for="material-color-primary">IMEI *</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                        <div class="form-material form-material-primary">
                                                            <input class="form-control" type="number" min="0" id="material-color-primary" name="material-color-primary" placeholder="Telefono" required>
                                                            <label for="material-color-primary">Nº Telefono *</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="col-xs-6">
                                                                <div class="form-material form-material-primary">
                                                                    <input class="form-control" type="number" step="0.01" min="0" id="material-color-primary" name="material-color-primary" placeholder="Ej: 150.50" required>
                                                                    <label id="label_costo_equipo" for="material-color-primary">Costo del equipo *</label>
                                                                </div>  
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <label class="css-input css-checkbox css-checkbox-warning">
                                                                    <input id="apartar_equipo" type="checkbox" onclick="apartar(this.id, 'label_costo_equipo')"><span></span> Apartar
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row" style="margin-bottom:1em;">
                                                    <div class="col-md-12">
                                                        <h4>Información del equipo</h4>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <td>Costo</td>
                                                                <td class="text-primary">$ 21,000 MXN</td>

                                                                <td>Marca</td>
                                                                <td class="text-primary">Samsung</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Modelo</td>
                                                                <td class="text-primary">Galaxy S10</td>

                                                                <td>Color</td>
                                                                <td class="text-primary">Azul</td>
                                                            </tr>
                                                            <tr>
                                                                <td>IMEI</td>
                                                                <td class="text-primary">232423423</td>

                                                                <td>ICCID</td>
                                                                <td class="text-primary">SDAA3341342</td>
                                                            </tr>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- END Div venta_telefono -->

                                            <!-- Div servicio_tecnico -->
                                            <div id="div_servicio_tecnico" style="display:none">
                                                <p class="text-danger h3" style="margin-bottom: 1em">
                                                    Servicio Técnico
                                                </p>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label for="fecha_ingreso">FECHA DE INGRESO</label>
                                                        <input type="date" class="form-control" id="fecha_ingreso" value="<?= date('Y-m-d', time()) ?>" readonly>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="fecha_entrega">FECHA ESTIMADA DE ENTREGA *</label>
                                                        <input type="date" class="form-control" id="fecha_entrega" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                        <div class="form-material form-material-primary">
                                                            <input class="form-control" type="number" min="0" id="material-color-primary" name="material-color-primary" placeholder="IMEI del equipo" required>
                                                            <label for="material-color-primary">IMEI *</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                        <div class="form-material form-material-primary">
                                                            <input class="form-control" type="number" min="0" id="material-color-primary" name="material-color-primary" placeholder="Telefono" required>
                                                            <label for="material-color-primary">Nº Telefono *</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                        <div class="form-material form-material-primary">
                                                            <input class="form-control" type="number" min="0" id="material-color-primary" name="material-color-primary" placeholder="IMEI del equipo" required>
                                                            <label for="material-color-primary">Marca *</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                        <div class="form-material form-material-primary">
                                                            <input class="form-control" type="number" min="0" id="material-color-primary" name="material-color-primary" placeholder="Telefono" required>
                                                            <label for="material-color-primary">Modelo *</label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label for="material-select">Estado fisico del equipo *</label>
                                                        <select class="form-control" id="material-select" name="material-select" size="1" required="" onchange="tipoServicio()">
                                                            <option>...</option>
                                                            <option value="1">Venta de equipo telefonico</option>
                                                            <option value="2">Servicio Tecnico</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-material">
                                                            <textarea class="form-control" id="material-textarea-small" name="material-textarea-small" rows="2" placeholder="Opcional: detalles del servicio"></textarea>
                                                            <label for="material-textarea-small">Falla reportada por el usuario *</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <div class="form-material">
                                                            <label for="evidencias">Evidencias</label>
                                                            <input type="file" class="form-control" id="evidencias" name="evidencias">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-material">
                                                            <textarea class="form-control" id="material-textarea-small" name="material-textarea-small" rows="3" placeholder="Opcional: detalles del servicio"></textarea>
                                                            <label for="material-textarea-small">Detalles Extra</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label class="css-input css-checkbox css-checkbox-success">
                                                            <input type="checkbox"><span></span> <b>Patron de bloqueo</b>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- END Div servicio_tecnico -->     

                                        </div>

                                        <div id="acciones_servicio" class="col-md-12" style="display:none">
                                            <div class="form-group text-right">
                                                <div class="col-sm-12">
                                                    <button type="button" class="btn btn-default" onclick="mostrarServicio('cancelar', 'servicio_interno')">
                                                        Cancelar
                                                    </button>
                                                    <button class="btn btn-success" onclick="registrarServicio()">
                                                        Registrar servicio
                                                    </button>  
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <!-- END Registrar servicios -->
                            </div>
                            <!-- END DIV contenedor servicio -->


                        </form>
                    </div>
                    <!-- End div_servicio_express -->
                </div>
            </div>
            <!-- END Tab registrar servicio -->

            <!-- Tab historial de servicios -->
            <div class="tab-pane" id="btabs-alt-static-profile">
                <h4 class="font-w300 push-15">Historial de servicios</h4>

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
            <!--END Tab historial de servicios -->


            <div class="tab-pane" id="btabs-alt-static-settings">
                <h4 class="font-w300 push-15">Settings Tab</h4>
                <p>...</p>
            </div>
        </div>
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
    function nuevoServicio(id_btn, valor){
        if(valor == 'mostrar'){
            document.getElementById('frm_nuevo_servicio').style.display = 'block';
            document.getElementById(id_btn).value = 'cancelar';
            document.getElementById(id_btn).innerHTML = 'Cancelar';
        }else{
            document.getElementById('frm_nuevo_servicio').style.display = 'none';
            document.getElementById(id_btn).value = 'mostrar';
            document.getElementById(id_btn).innerHTML = 'Nuevo';
        }
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
    function apartar(id, elemento){
        if(document.getElementById(id).checked == true){
            document.getElementById(elemento).innerHTML = "Deposito en garantia *";
        }else{
            document.getElementById(elemento).innerHTML = 'Costo *';
        }
    }

    function tipoServicio(tipo){
        var hijos = document.querySelectorAll("div#contenedor_bloques > div");
        
        tipo = tipo - 1;
        
        for (var i = 0; i < hijos.length; i++) {
            var div_id = hijos[i].id;

            if(tipo == i ){
                document.getElementById(div_id).style.display = 'block';
            }else{
                document.getElementById(div_id).style.display = 'none';
            }
       
        };
        document.getElementById('acciones_servicio').style.display = 'block';
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