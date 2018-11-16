<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                DASHBOARD SERVICIO TÉCNICO
            </h3>
        </div>

        <div class="col-sm-5 text-right hidden-xs">
            <button class="btn btn-rounded btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
            <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#modal-popout2">
                <span data-toggle="tooltip" title="Registrar nuevo servicio tecnico">
                    <i class="fa fa-briefcase"></i> Nuevo Servicio
                </span>
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
        <div class="row">
            <!-- Sub opciones garantia -->
            <div class="col-sm-12">
                <div class="block">
                    <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs">
                        <li class="active">
                            <a href="#btabs-alt-static-justified-home"><i class="fa fa-home"></i> En proceso</a>
                        </li>
                        <li class="">
                            <a href="#btabs-alt-static-justified-profile"><i class="fa fa-pencil"></i> Finalizados</a>
                        </li>
                        <li class="">
                            <a href="#btabs-alt-static-justified-settings"><i class="fa fa-cog"></i> Total</a>
                        </li>
                    </ul>
                    <div class="block-content tab-content">
                        <!-- Equipos en proceso de garantia -->
                        <div class="tab-pane active" id="btabs-alt-static-justified-home">
                            <h4 class="font-w300 push-15">En proceso</h4>
                            <table class="js-table-sections table table-condensed table-hover">
                                <thead style="font-size:13px;">
                                    <tr>
                                        <th class="danger">
                                            #ID
                                        </th>
                                        <th>
                                            Sucursal
                                        </th>
                                        <th>
                                            Cliente
                                        </th>
                                        <th style="width:20%;">
                                            Detalle Equipo
                                        </th>
                                        <th>
                                            Técnico
                                        </th>
                                        <th>
                                            Entrega aprox
                                        </th>
                                        <th>
                                            Garantia
                                        </th>
                                        <th>
                                            ...
                                        </th>
                                    </tr>
                                </thead>
                                
                                <tbody class="js-table-sections-header">
                                <!--<tbody class="js-table-sections-header open">-->
                                    <tr class="font-size:12px;">
                                        <!-- ID general -->
                                        <td>
                                            <i class="fa fa-angle-right"></i> <span class="text-danger">342</span>
                                        </td>
                                        <!-- Nombre de la sucursal -->
                                        <td>
                                            Nom. Sucursal
                                        </td>
                                        <!-- Información del cliente -->
                                        <td>
                                            Cliente: <a href="#">Nombre del cliente</a>
                                            <br>
                                            Tel: <span class="text-primary">951 199 9723</span>
                                        </td>
                                        <!-- EQUIPO -->
                                        <td>
                                            <a href="#">
                                                Nombre del equipo
                                            </a>
                                            <p>
                                                Descripción: <span class="text-city">El equipo presenta falla en la pantalla, necesita ser reemplazada</span>
                                            </p>
                                        </td>
                                        <!-- Nombre del tecnico -->
                                        <td>
                                            Nom Tecnico
                                        </td>
                                        <!-- Fecha de entrega aprox -->
                                        <td>
                                            <span class="text-danger">
                                                <?= date('d/m/Y', time()) ?>
                                            </span> 
                                        </td>

                                        <!-- FECHA DE INGRESO -->
                                        <td>
                                            <?php 
                                                $validez = 2.592e+6; // 30 dias
                                                $fin_garantia = date('d/m/Y', time()+$validez);
                                             ?>
                                            <?= date('d/m/Y', time()); ?>
                                            -
                                            <?= $fin_garantia ?>
                                        </td>
                                        <!-- Acciones -->
                                        <td>
                                            <button class="btn btn-xs btn-success">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>

                                    </tr>
                                </tbody>
                                <tbody style="font-size:12px;border: 2px solid #ee5253;">
                                    <tr style="margin:0px;padding:0px;">
                                        <td colspan="7" style="padding:0px;padding-top:10px;">
                                            <p class="h4">Historial de acciones</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <b>Fecha</b>
                                        </td>
                                        <td colspan="4">
                                            <b>Actualización</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?= date('d/m/Y', time()) ?>
                                        </td>
                                        <td colspan="4">
                                            Reemplazo de pieza solicitado
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?= date('d/m/Y', time()) ?>
                                        </td>
                                        <td colspan="4">
                                            Equipo revisado por el tecnico
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?= date('d/m/Y', time()) ?>
                                        </td>
                                        <td colspan="4">
                                            En espera de entrar a revisión
                                        </td>
                                    </tr>

                                </tbody>
                               
                            </table>
                        </div>

                        <!-- Equipos finalizados -->
                        <div class="tab-pane" id="btabs-alt-static-justified-profile">
                            <h4 class="font-w300 push-15">Finalizados</h4>
                            <table class="js-table-sections table table-condensed table-hover">
                                <thead style="font-size:13px;">
                                    <tr>
                                        <th class="danger">
                                            #ID
                                        </th>
                                        <th>
                                            Sucursal
                                        </th>
                                        <th>
                                            Cliente
                                        </th>
                                        <th style="width:20%;">
                                            Detalle Equipo
                                        </th>
                                        <th>
                                            Técnico
                                        </th>
                                        <th>
                                            Entrega aprox
                                        </th>
                                        <th>
                                            Garantia
                                        </th>
                                        <th>
                                            ...
                                        </th>
                                    </tr>
                                </thead>
                                
                                <tbody class="js-table-sections-header">
                                <!--<tbody class="js-table-sections-header open">-->
                                    <tr class="font-size:12px;">
                                        <!-- ID general -->
                                        <td>
                                            <i class="fa fa-angle-right"></i> <span class="text-danger">342</span>
                                        </td>
                                        <!-- Nombre de la sucursal -->
                                        <td>
                                            Nom. Sucursal
                                        </td>
                                        <!-- Información del cliente -->
                                        <td>
                                            Cliente: <a href="#">Nombre del cliente</a>
                                            <br>
                                            Tel: <span class="text-primary">951 199 9723</span>
                                        </td>
                                        <!-- EQUIPO -->
                                        <td>
                                            <a href="#">
                                                Nombre del equipo
                                            </a>
                                            <p>
                                                Descripción: <span class="text-city">El equipo presenta falla en la pantalla, necesita ser reemplazada</span>
                                            </p>
                                        </td>
                                        <!-- Nombre del tecnico -->
                                        <td>
                                            Nom Tecnico
                                        </td>
                                        <!-- Fecha de entrega aprox -->
                                        <td>
                                            <span class="text-danger">
                                                <?= date('d/m/Y', time()) ?>
                                            </span> 
                                        </td>

                                        <!-- FECHA DE INGRESO -->
                                        <td>
                                            <?php 
                                                $validez = 2.592e+6; // 30 dias
                                                $fin_garantia = date('d/m/Y', time()+$validez);
                                             ?>
                                            <?= date('d/m/Y', time()); ?>
                                            -
                                            <?= $fin_garantia ?>
                                        </td>
                                        <!-- Acciones -->
                                        <td>
                                            <button class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>

                                    </tr>
                                </tbody>
                                <tbody style="font-size:12px;border: 2px solid #ee5253;">
                                    <tr style="margin:0px;padding:0px;">
                                        <td colspan="7" style="padding:0px;padding-top:10px;">
                                            <p class="h4">Historial de acciones</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <b>Fecha</b>
                                        </td>
                                        <td colspan="4">
                                            <b>Actualización</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?= date('d/m/Y', time()) ?>
                                        </td>
                                        <td colspan="4">
                                            Reemplazo de pieza solicitado
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?= date('d/m/Y', time()) ?>
                                        </td>
                                        <td colspan="4">
                                            Equipo revisado por el tecnico
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?= date('d/m/Y', time()) ?>
                                        </td>
                                        <td colspan="4">
                                            En espera de entrar a revisión
                                        </td>
                                    </tr>

                                </tbody>
                               
                            </table>
                        </div>

                        <!-- Total de equipos -->
                        <div class="tab-pane" id="btabs-alt-static-justified-settings">
                            <h4 class="font-w300 push-15">Listado de equipos</h4>
                            <table class="js-table-sections table table-condensed table-hover">
                                <thead style="font-size:13px;">
                                    <tr>
                                        <th class="danger">
                                            #ID
                                        </th>
                                        <th>
                                            Sucursal
                                        </th>
                                        <th>
                                            Cliente
                                        </th>
                                        <th style="width:20%;">
                                            Detalle Equipo
                                        </th>
                                        <th>
                                            Técnico
                                        </th>
                                        <th>
                                            Entrega aprox
                                        </th>
                                        <th>
                                            Garantia
                                        </th>
                                        <th>
                                            ...
                                        </th>
                                    </tr>
                                </thead>
                                
                                <tbody class="js-table-sections-header">
                                <!--<tbody class="js-table-sections-header open">-->
                                    <tr class="font-size:12px;">
                                        <!-- ID general -->
                                        <td>
                                            <i class="fa fa-angle-right"></i> <span class="text-danger">342</span>
                                        </td>
                                        <!-- Nombre de la sucursal -->
                                        <td>
                                            Nom. Sucursal
                                        </td>
                                        <!-- Información del cliente -->
                                        <td>
                                            Cliente: <a href="#">Nombre del cliente</a>
                                            <br>
                                            Tel: <span class="text-primary">951 199 9723</span>
                                        </td>
                                        <!-- EQUIPO -->
                                        <td>
                                            <a href="#">
                                                Nombre del equipo
                                            </a>
                                            <p>
                                                Descripción: <span class="text-city">El equipo presenta falla en la pantalla, necesita ser reemplazada</span>
                                            </p>
                                        </td>
                                        <!-- Nombre del tecnico -->
                                        <td>
                                            Nom Tecnico
                                        </td>
                                        <!-- Fecha de entrega aprox -->
                                        <td>
                                            <span class="text-danger">
                                                <?= date('d/m/Y', time()) ?>
                                            </span> 
                                        </td>

                                        <!-- FECHA DE INGRESO -->
                                        <td>
                                            <?php 
                                                $validez = 2.592e+6; // 30 dias
                                                $fin_garantia = date('d/m/Y', time()+$validez);
                                             ?>
                                            <?= date('d/m/Y', time()); ?>
                                            -
                                            <?= $fin_garantia ?>
                                        </td>
                                        <!-- Acciones -->
                                        <td>
                                            <button class="btn btn-xs btn-success">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>

                                    </tr>
                                </tbody>
                                <tbody style="font-size:12px;border: 2px solid #ee5253;">
                                    <tr style="margin:0px;padding:0px;">
                                        <td colspan="7" style="padding:0px;padding-top:10px;">
                                            <p class="h4">Historial de acciones</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <b>Fecha</b>
                                        </td>
                                        <td colspan="4">
                                            <b>Actualización</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?= date('d/m/Y', time()) ?>
                                        </td>
                                        <td colspan="4">
                                            Reemplazo de pieza solicitado
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?= date('d/m/Y', time()) ?>
                                        </td>
                                        <td colspan="4">
                                            Equipo revisado por el tecnico
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?= date('d/m/Y', time()) ?>
                                        </td>
                                        <td colspan="4">
                                            En espera de entrar a revisión
                                        </td>
                                    </tr>

                                </tbody>
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Sub opciones garantia -->
        </div>
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
                    <h3 class="block-title">Registrar nuevo ingreso</h3>
                </div>
                <div class="block-content">
                    <div class="row text-justify">

                        <!-- Registrar nuevo cliente -->
                        <div class="col-md-5">
                               <h3 class="h4">
                                    Información del cliente
                                </h3>
                                <hr>
                                <div class="form-group">
                                    <div class="">
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

                        </div>
                        <!-- END Registrar nuevo cliente -->
                        <div class="col-md-7">
                            <!-- Div servicio_tecnico -->
                            <div id="div_servicio_tecnico">
                                <p class="text-danger h3" >
                                    Servicio Técnico
                                </p>

                                <div class="form-group" style="padding-bottom:4em;">
                                    <div class="col-sm-6">
                                        <label for="fecha_ingreso">FECHA DE INGRESO</label>
                                        <input type="date" class="form-control" id="fecha_ingreso" value="<?= date('Y-m-d', time()) ?>" readonly>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="fecha_entrega">FECHA ESTIMADA DE ENTREGA *</label>
                                        <input type="date" class="form-control" id="fecha_entrega" value="">
                                    </div>
                                </div>
                                <div class="form-group" style="padding-bottom:4em;">
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

                                <div class="form-group" style="padding-bottom:4em;">
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


                                <div class="form-group" style="padding-bottom:4em;">
                                    <div class="col-sm-6">
                                        <label for="material-select">Estado fisico del equipo *</label>
                                        <select class="form-control" id="material-select" name="material-select" size="1" required="" onchange="tipoServicio()">
                                            <option>...</option>
                                               <option value="1">Excenlente</option>
                                            <option value="2">Bueno</option>
                                            <option value="3">Regular</option>
                                            <option value="4">Malo</option>
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