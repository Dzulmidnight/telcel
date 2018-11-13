<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                DASHBOARD SERVICIO TECNICO
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
                            <table class="js-table-sections table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            #ID
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
                                    <tr>
                                        <!-- ID general -->
                                        <td>
                                            <i class="fa fa-angle-right"></i> 342
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
                                        <!-- ENTREGA APROXIMADA -->
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
                                <tbody>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="font-w600 text-success">+ $31,00</td>
                                        <td>
                                            <small>Paypal</small>
                                        </td>
                                        <td class="hidden-xs">
                                            <small class="text-muted">June 27, 2015 12:16</small>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                </tbody>
                               
                            </table>
                        </div>

                        <!-- Equipos finalizados -->
                        <div class="tab-pane" id="btabs-alt-static-justified-profile">
                            <h4 class="font-w300 push-15">Finalizados</h4>
                            <table class="js-table-sections table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            #ID
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
                                    <tr>
                                        <!-- ID general -->
                                        <td>
                                            <i class="fa fa-angle-right"></i> 342
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
                                        <!-- ENTREGA APROXIMADA -->
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
                                <tbody>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="font-w600 text-success">+ $31,00</td>
                                        <td>
                                            <small>Paypal</small>
                                        </td>
                                        <td class="hidden-xs">
                                            <small class="text-muted">June 27, 2015 12:16</small>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                </tbody>
                               
                            </table>
                        </div>

                        <!-- Total de equipos -->
                        <div class="tab-pane" id="btabs-alt-static-justified-settings">
                            <h4 class="font-w300 push-15">Listado de equipos</h4>
                            <table class="js-table-sections table table-hover">
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
                                    <tr>
                                        <!-- ID general -->
                                        <td>
                                            <i class="fa fa-angle-right"></i> 342
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
                                        <!-- ENTREGA APROXIMADA -->
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
                                            <button class="btn btn-xs btn-default">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button class="btn btn-xs btn-default">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </td>

                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="font-w600 text-success">+ $31,00</td>
                                        <td>
                                            <small>Paypal</small>
                                        </td>
                                        <td class="hidden-xs">
                                            <small class="text-muted">June 27, 2015 12:16</small>
                                        </td>
                                        <td></td>
                                        <td></td>
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