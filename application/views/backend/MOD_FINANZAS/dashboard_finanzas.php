<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                DASHBOARD FINANZAS
            </h3>
        </div>

        <div class="col-sm-5 text-right hidden-xs">
            <button class="btn btn-sm btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
        </div>
    </div>

</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">

    <div class="row">
                        <div class="col-sm-4">
                            <!-- Tiles Slider 3 -->
                            <div class="js-slider" data-slider-dots="true" data-slider-autoplay="true">
                                <div>
                                    <div class="block text-center remove-margin-b">
                                        <div class="block-content block-content-full">
                                            <div class="h1 font-w700">28.600</div>
                                            <div class="h5 text-muted text-uppercase push-5-t">Downloads</div>
                                        </div>
                                        <div class="block-content block-content-full block-content-mini bg-danger text-white">
                                            <i class="fa fa-arrow-down text-black-op"></i> -15% This week
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="block text-center remove-margin-b">
                                        <div class="block-content block-content-full">
                                            <div class="h1 font-w700"><span class="h2 text-muted">+</span> 245</div>
                                            <div class="h5 text-muted text-uppercase push-5-t">Sales</div>
                                        </div>
                                        <div class="block-content block-content-full block-content-mini bg-warning text-white">
                                            <i class="fa fa-chevron-up text-black-op"></i> +15% This week
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="block text-center remove-margin-b">
                                        <div class="block-content block-content-full">
                                            <div class="h1 font-w700"><span class="h2 text-muted">+</span> 750</div>
                                            <div class="h5 text-muted text-uppercase push-5-t">Users</div>
                                        </div>
                                        <div class="block-content block-content-full block-content-mini bg-primary text-white">
                                            <i class="fa fa-chevron-down text-black-op"></i> -2% This week
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Tiles Slider 3 -->
                        </div>
        <div class="col-lg-12">
            <div class="row">

                <div class="col-xs-6 col-md-3">
                    <a class="block block-link-hover1" href="javascript:void(0)">
                        <div class="block-content block-content-full clearfix">
                            <div class="pull-right push-15-t push-15">
                                <i class="fa fa-bar-chart-o fa-2x text-amethyst"></i>
                            </div>
                            <div class="h2 text-amethyst" data-toggle="countTo" data-to="48">
                               <span class="h2 text-muted">+</span> $ 7,000
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
                                <span class="h2 text-muted">+</span> $ 2,000
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
                                <span class="h2 text-muted">+</span> $ 6,000
                            </div>
                            <div class="text-uppercase font-w600 font-s12 text-muted">Telefonos</div>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-3">
                    <a class="block block-link-hover1" href="javascript:void(0)">
                        <div class="block-content block-content-full clearfix">
                            <div class="pull-right push-15-t push-15">
                                <i class="fa fa-line-chart fa-2x text-success"></i>
                            </div>
                            <div class="h2 text-success" data-toggle="countTo" data-to="760" data-before="$">$ 0</div>
                            <div class="text-uppercase font-w600 font-s12 text-muted">Otros</div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-6 col-md-3">
                    <a class="block block-link-hover1" href="javascript:void(0)">
                        <div class="block-content block-content-full clearfix">
                            <div class="pull-right push-15-t push-15">
                                <i class="fa fa-bar-chart-o fa-2x text-danger"></i>
                            </div>
                            <div class="h2 text-danger" data-toggle="countTo" data-to="48">- $ 1,000</div>
                            <div class="text-uppercase font-w600 font-s12 text-muted">Pago servicios</div>
                        </div>
                    </a>
                </div>


            </div>
        </div>
        <div class="col-lg-5">
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
                            <h3 class="block-title">Ventas x Sucursal</h3>
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
        <div class="col-lg-7">
            <!-- Ventas de la semana -->
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Ventas semanales</h3>
                </div>
                <div class="block-content block-content-full text-center">
                    <!-- Bars Chart Container -->
                    <canvas class="js-chartjs2-bars"></canvas>
                </div>
            </div>
            <!-- END Ventas de la semana -->
        </div>

    </div>

    <div class="row">
        <!-- Articulos mas vendidos -->
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
                    <table class="table table-striped" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>
                                    #ID
                                </th>
                                <th>
                                    ARTICULO
                                </th>
                                <th>
                                    Vendidos
                                </th>
                                <th>
                                    STOCK
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
                                        <a href="#">
                                            Nombre articulo
                                        </a>
                                    </td>
                                    <td>
                                        <?= rand(7, 15) ?>
                                    </td>
                                    <td>
                                        <?= rand(2,10) ?>
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
                    <table class="table table-striped" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>
                                    #ID
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
                                        <a href="#">
                                            Nombre articulo
                                        </a>
                                    </td>
                                    <td>
                                        <?= rand(7, 15) ?>
                                    </td>
                                    <td>
                                        <?= rand(2,10) ?>
                                    </td>
                                    <td>
                                        <?= date('d/m/Y', time()) ?>
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
        <!-- END Articulos con mayor tiempo -->
    </div>

</div>


<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
<!-- Page JS Plugins -->
<script src="<?php echo base_url(); ?>assets/js/plugins/chartjsv2/Chart.min.js"></script>
<!-- Page JS Code -->
<script src="<?php echo base_url(); ?>assets/js/pages/base_comp_chartjs_v2.js"></script>