<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                PERFIL PROVEEDOR
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

<div class="block">
    <ul class="nav nav-tabs" data-toggle="tabs">
        <li class="active">
            <a href="#btabs-perfil">Perfil</a>
        </li>
        <li>
            <a href="#btabs-garantia">Garantia</a>
        </li>
        <li class="pull-right">
            <a href="#btabs_garantia" data-toggle="tooltip" title="" data-original-title="Settings"><i class="si si-settings"></i></a>
        </li>
    </ul>
    <div class="block-content tab-content">
        <!-- Perfil del proveedor -->
        <div class="tab-pane active" id="btabs-perfil">
            <p class="h3">Perfil</p>
            <!-- Main Content -->
            <div class="row">
                <div class="col-md-6">
                    <!-- About -->
                    <div class="block">
                        <div class="block-content">
                            <b>
                               DATOS PROVEEDOR
                            </b>
                            <br>
                                Nombre: 
                            <br>
                                Telefono
                            <br>
                                Dirección
                            <br>
                                Información extra
                            <hr>
                            <b>
                                Persona de contacto
                            </b>
                            <p>
                                <i class="fa fa-user"></i> Nombre de la persona <br>
                                <i class="fa fa-phone"></i> 951 199 9723
                            </p>
                        </div>
                    </div>
                    <!-- END About -->

                    <!-- Products -->
                    <div class="block block-opt-refresh-icon6">
                        <div class="block-header block-header bg-amethyst-dark">
                            <ul class="block-options">
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title text-white"><i class="fa fa-fw fa-briefcase"></i> Productos</h3>
                        </div>
                        <div class="block-content">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            Tipo
                                        </th>
                                        <th>
                                            Producto
                                        </th>
                                        <th>
                                            Cantidad
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    for ($i=1; $i <= 10 ; $i++) { 
                                    ?>
                                        <tr>
                                            <td>
                                                Tipo de producto
                                            </td>
                                            <td>
                                                Nombre del producto
                                            </td>
                                            <td>
                                                23
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                     ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Products -->

                </div>

                <!-- Sección de finanzas -->
                <div class="col-md-6">
                    <h4 class="font-w300 push-15">
                        <span style="padding-right:1em;">
                            Finanzas
                        </span>                         
                        <a class="h3 font-w300 text-success animated flipInX" href="javascript:void(0)" data-toggle="tooltip" title="Saldo a favor">
                            <i class="fa fa-arrow-up"></i> $ 12,400
                        </a>
                        <a class="h3 font-w300 text-danger animated flipInX" href="javascript:void(0)" data-toggle="tooltip" title="Saldo en contra">
                            <i class="fa fa-arrow-down"></i> $ 12,400
                        </a>
                    </h4>

                    <div class="row">
                        <!-- Historial de compras -->
                        <div class="col-sm-12">
                            <!-- Timeline -->
                            <div class="block block-opt-refresh-icon6">
                                <div class="block-header">
                                    <ul class="block-options">
                                        <li>
                                            <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                                        </li>
                                        <li>
                                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                        </li>
                                    </ul>
                                    <h3 class="block-title"><i class="fa fa-newspaper-o"></i> Historial de compras</h3>
                                </div>
                                <div class="block-content">
                                    <!-- Detalle compras -->
                                    <div class="block block-transparent pull-r-l">
                                        <div class="row">
                                            <!-- Productos comprados -->
                                            <div class="col-md-12">
                                                <div class="block-header bg-gray-lighter">
                                                    <ul class="block-options">
                                                        <li>
                                                            <span><em class="text-muted"><?= date('d/m/Y', time()) ?></em></span>
                                                        </li>
                                                        <li>
                                                            <span><i class="fa fa-facebook text-primary"></i></span>
                                                        </li>
                                                    </ul>
                                                    <h3 class="block-title">+ 290 Productos</h3>
                                                </div>
                                                <div class="block-content">
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <p class="h4">
                                                                Costo total:<br><span class="text-danger">$ 2,342.00</span>
                                                            </p>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <p class="h4">
                                                                Pagado:<br><span class="text-success">$ 2,342.00</span>
                                                            </p>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <p class="h4">
                                                                Balance:<br><span>$ 0.00</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END Productos Comprados -->

                                            <!-- Historial de pagos -->
                                            <div class="col-md-12">
                                                <div class="block-header bg-gray-lighter">
                                                    <ul class="block-options">
                                                        <li>
                                                            <span><em class="text-muted"><?= date('d/m/Y', time()) ?></em></span>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-plus text-success"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <h3 class="block-title">Pagos Realizados</h3>
                                                </div>
                                                <div class="block-content">
                                                    <?php 
                                                        for ($i=0; $i < 3; $i++) { 
                                                        ?>
                                                            
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    Fecha de pago: <?php echo date('d/m/Y', time()); ?>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    Cantidad: $500
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <a href="#">Descargar comprobante</a>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                    ?>
                                                    <div class="col-sm-12 text-center" style="margin-top:1em">
                                                        <a href="#" data-toggle="modal" data-target="#modal-tabla-pagos">
                                                            <i class="fa fa-search"></i> Ver todos los pagos
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END Historial de pagos -->
                                        </div>
                                    </div>
                                    <!-- END Detalle compras -->

                                </div>
                            </div>
                            <!-- END Timeline -->
                        </div>
                        <!-- END Historial de compras -->
                    </div>

                </div>
                <!-- END Sección de finanzas -->

            </div>
        </div>
        <!-- END Perfil del proveedor -->


        <!-- Sección garantia -->
        <div class="tab-pane" id="btabs-garantia">
            <h4 class="font-w300 push-15">Garantia</h4>

            <div class="row" style="margin-top:1em; margin-bottom:1em;">
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
        <!-- END Sección garantia -->
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


<!-- Tabla de pagos -->
<div class="modal fade" id="modal-tabla-pagos" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    Fecha pago
                                </th>
                                <th>
                                    Cantidad
                                </th>
                                <th>
                                    Comprobante
                                </th>
                                <th>
                                    Balance
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?= date('d/m/Y', time()); ?>
                                </td>
                                <td>
                                    $ 540.00
                                </td>
                                <td>
                                    <a href="#">
                                        Descargar
                                    </a>
                                </td>
                                <td class="text-danger">
                                    $ 2,450.00
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- END Tabla de pagos -->


<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
<!-- Page JS Plugins -->
<script src="<?php echo base_url(); ?>assets/js/plugins/chartjsv2/Chart.min.js"></script>
<!-- Page JS Code -->
<script src="<?php echo base_url(); ?>assets/js/pages/base_comp_chartjs_v2.js"></script>