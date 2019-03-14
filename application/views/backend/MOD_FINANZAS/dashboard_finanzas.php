

<?php 
    $sucursal_gral = $this->session->userdata('id_sucursal');
 ?>

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                FINANZAS - VENTAS
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

    <!-- Navigation -->
    <div class="bg-gray-light border-b">
        <ul class="nav nav-pills push">
            <li class="active">
                <a href="javascript:void(0)"><i class="fa fa-fw fa-home push-5-r"></i> Productos</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-fw fa-pencil push-5-r"></i> Servicios</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-fw fa-pencil push-5-r"></i> Reparaciones</a>
            </li>

            <li>
                <a href="javascript:void(0)"><i class="fa fa-envelope"></i></a>
            </li>
        </ul>
    </div>
    <!-- END Navigation -->
    <div class="row">
        <div class="col-sm-6 col-lg-4">
            <a class="block block-bordered block-link-hover3 text-center" href="javascript:void(0)">
                <div class="block-content block-content-full bg-gray-lighter border-b">
                    <div id="montoVentas_div" class="h1 font-w700">
                        <?= money_format('%n', $monto_ventas); ?>
                    </div>
                    <div class="h5 text-muted text-uppercase push-5-t">Monto</div>
                </div>
                <div class="block-content block-content-full block-content-mini">
                    <i class="fa fa-arrow-up text-success"></i> +50% Está semana
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-4">
            <a class="block block-bordered block-link-hover3 text-center" href="javascript:void(0)">
                <div class="block-content block-content-full bg-gray-lighter border-b">
                    <div id="productosVendidos_div" class="h1 font-w700">
                        <?= $num_productos; ?>
                    </div>
                    <div class="h5 text-muted text-uppercase push-5-t">Productos</div>
                </div>
                <div class="block-content block-content-full block-content-mini">
                    <i class="fa fa-arrow-down text-danger"></i> -5% Está semana
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-4">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="example-daterange1">
                            Período de ventas
                        </label>
                        <div class="input-daterange input-group" data-date-format="mm/dd/yyyy">
                            <input class="form-control" type="text" id="inicio_ventas" name="inicio_ventas" placeholder="Del">
                            <span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>
                            <input class="form-control" type="text" id="fin_ventas" name="fin_ventas" placeholder="Al">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <label for="fk_id_sucursales">Sucursales</label>
                    <!--<select class="js-select2 form-control" id="fk_id_sucursales" name="fk_id_sucursales" style="" data-placeholder="Filtrar por sucursales" multiple onchange="ventaSucursal(this.value, '<?= base_url(); ?>')">-->
                    <select class="js-select2 form-control" id="listado_sucursales" name="fk_id_sucursales" style="" data-placeholder="Filtrar por sucursales" multiple>
                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                        <?php 
                            foreach ($row_sucursales as $sucursal) {
                                if($sucursal_gral == $sucursal->id_sucursal){
                                    echo '<option value="'.$sucursal->id_sucursal.'" >'.$sucursal->nombre.'</option>';
                                }else{
                                    echo '<option value="'.$sucursal->id_sucursal.'">'.$sucursal->nombre.'</option>';
                                }
                            }
                         ?>
                    </select>  
                </div>
                <div class="col-xs-12 text-right">
                    <button class="btn btn-sm btn-primary" onclick="busquedaFinanzas('<?= base_url(); ?>');">
                        <i class="fa fa-search"></i> Consultar
                    </button>
                </div>
            </div>
        </div>

    </div>


    <div class="row">

        <!-- Articulos mas vendidos -->
        <div id="tablaVentas_div" class="col-lg-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="success text-left" colspan="8">
                            REGISTRO DE VENTAS REALIZADAS AL DÍA <b style="color:#e74c3c;"><?= date('d-m', time()); ?></b>
                        </th>
                    </tr>
                    <tr>
                        <th style="font-size:12px;">
                            #
                        </th>
                        <!--<th style="font-size:12px;">
                            ID
                        </th>-->
                        <th style="font-size:12px;">
                            FECHA
                        </th>
                        <th style="font-size:12px;">
                            SUCURSAL
                        </th>
                        <th style="font-size:12px;">
                            VENDEDOR
                        </th>
                        <th style="font-size:12px;">
                            ARTICULO
                        </th>
                        <th style="font-size:12px;">
                            VENDIDOS
                        </th>
                        <th style="font-size:12px;">
                            MONTO
                        </th>
                        <th style="font-size:12px;">
                            STOCK
                        </th>
                    </tr>
                </thead>
                <tbody style="font-size:12px;">
                    <?php
                        $contador = 0;
                        foreach ($row_listado_ventas as $venta) {
                        $contador++;
                    ?>
                            <tr>
                                <!-- # -->
                                <td>
                                    <?= $contador; ?>
                                </td>

                                <!-- ID VENTA -->
                                <!--<td>
                                    <?= $venta->id_producto_venta; ?>
                                </td>-->

                                <!-- FECHA VENTA -->
                                <td>
                                    <?= date('d/m/Y', $venta->fecha_venta); ?>
                                </td>

                                <!-- SUCURSAL -->
                                <td>
                                    <?= $venta->nombre_sucursal; ?>
                                </td>

                                <!-- VENDEDOR -->
                                <td>
                                    <?= $venta->nombre_vendedor; ?>
                                </td>

                                <!-- ARTICULO -->
                                <td>
                                    <?= $venta->nombre_producto; ?>
                                </td>

                                <!-- VENDIDOS -->
                                <td>
                                    <b>
                                        <?= $venta->piezas; ?>
                                    </b>
                                </td>

                                <!-- MONTO VENTA -->
                                <td style="color:#00a8ff;">
                                    <b>
                                        <?= money_format('%n', $venta->total); ?>
                                    </b>
                                </td>

                                <!-- STOCK -->
                                <td style="background:#ecf0f1; color:#2c3e50;">
                                    <?= $venta->stock_producto; ?>
                                </td>
                            </tr>
                    <?php
                        }
                     ?>
                </tbody>
            </table>
        </div>

        <div class="col-xs-6 col-lg-6">
            <div class="block block-themed">
                <div class="block-header bg-success">
                    <ul class="block-options">
                        <li>
                            <button type="button"><i class="si si-settings"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Ultimas ventas</h3>
                </div>
                <div class="block-content" style="padding-top:0">
                    <table class="table table-condensed table-striped" style="font-size:12px;">
                        <thead style="font-size:13px;">
                            <tr>
                                <th>#ID</th>
                                <th>
                                    Fecha
                                </th>
                                <th>
                                    Sucursal
                                </th>
                                <th>
                                    Articulo
                                </th>
                                <th>
                                    Vendidos
                                </th>
                                <th>
                                    Monto
                                </th>
                                <th>
                                    STOCK
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($row_listado_ventas as $venta): ?>
                                <tr>
                                    <td><?= $venta->id_producto_venta; ?></td>
                                    <td>
                                        <?= date('d/m/Y', $venta->fecha_venta); ?>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <?= $venta->nombre_sucursal; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <?= $venta->nombre_producto; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?= $venta->piezas; ?>
                                    </td>
                                    <td>
                                        $ <?= $venta->total; ?>
                                    </td>
                                    <td>
                                        <?= $venta->stock_producto; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            
                             <tr class="text-center">
                                 <td colspan="6">
                                     <a href="<?= base_url('backend/MOD_FINANZAS/Finanzas/listado_ventas'); ?>">
                                         <i class="fa fa-search"></i> Consultar todos
                                     </a>
                                 </td>
                             </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Articulos mas vendidos -->

        <!-- Articulos con mayor tiempo -->
        <div class="col-xs-6 col-lg-6">

            <div class="block block-themed">
                <div class="block-header bg-danger">
                    <ul class="block-options">
                        <li>
                            <button type="button"><i class="si si-settings"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Ultimos pagos</h3>
                </div>
                <div class="block-content" style="padding-top:0">
                    <table class="table table-condensed table-striped" style="font-size:12px;">
                        <thead style="font-size:13px;">
                            <tr>
                                <th>
                                    #ID
                                </th>
                                <th>
                                    Sucursal
                                </th>
                                <th>
                                    Monto
                                </th>
                                <th>
                                    Detalle
                                </th>
                                <th>
                                    Comprobante
                                </th>
                                <th>
                                    Fecha
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            for ($i=0; $i < 5; $i++) { 
                            ?>
                                <tr>
                                    <td>
                                        <?= rand(100,300); ?>
                                    </td>
                                    <td>
                                        Nom. Sucursal
                                    </td>
                                    <td>
                                        <a href="#">
                                            Nombre articulo
                                        </a>
                                    </td>
                                    <td>
                                        <?= rand(7, 15) ?>
                                    </td>
                                    <td>
                                        <a href="#">
                                            Decargar
                                        </a>
                                    </td>
                                    <td>
                                        <?= date('d/m/Y', time()) ?>
                                    </td>
                                </tr>
                            <?php
                            }
                             ?>
                             <tr class="text-center">
                                 <td colspan="6">
                                     <a href="#">
                                         <i class="fa fa-search"></i> Consultar todos
                                     </a>
                                 </td>
                             </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        
        </div>
        <!-- END Articulos con mayor tiempo -->
    </div>

</div>


        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
        <script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/core/bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/core/jquery.appear.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/core/jquery.countTo.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/core/jquery.placeholder.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/core/js.cookie.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/app.js"></script>

        <!-- Page JS Plugins -->
        <script src="<?= base_url(); ?>assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/plugins/bootstrap-datetimepicker/moment.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/plugins/select2/select2.full.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/plugins/dropzonejs/dropzone.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/plugins/autonumeric/autoNumeric.min.js"></script>

        <!-- Page JS Code -->
        <script src="<?= base_url(); ?>assets/js/pages/base_forms_pickers_more.js"></script>
        <script>
            jQuery(function () {
                // Init page helpers (BS Datepicker + BS Datetimepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs + AutoNumeric plugins)
                App.initHelpers(['datepicker', 'datetimepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs', 'autonumeric']);
            });
        </script>