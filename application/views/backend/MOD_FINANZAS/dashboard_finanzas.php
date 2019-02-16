<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/select2/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/select2/select2-bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/dropzonejs/dropzone.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css">



<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                DASHBOARD FINANZAS
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

    <div class="row">
        <div class="col-lg-12" style="margin-bottom:1em;">
            <select class="js-select2 form-control" id="example-select2-multiple" name="example-select2-multiple" style="width:20%" data-placeholder="Filtrar por sucursales" multiple>
                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                <option value="1">Sucursal 1</option>
                <option value="2">Sucursal 2</option>
                <option value="3">Sucursal 3</option>
            </select>
        </div>


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

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-3">
                    <a class="block block-link-hover1" href="javascript:void(0)">
                        <div class="block-content block-content-full clearfix">
                            <div class="pull-right push-15-t push-15">
                                <i class="fa fa-bar-chart-o fa-2x text-amethyst"></i>
                            </div>
                            <div class="h2 text-success" data-toggle="countTo" data-to="48">
                               <span class="h2 text-muted">+</span> $ 7,000
                            </div>
                            <div class="text-uppercase font-w600 font-s12 text-muted">Balance del dia</div>
                        </div>

                        <div class="block-content block-content-full text-center">
                            <!-- Lines Chart Container -->
                            <canvas class="js-chartjs2-lines"></canvas>
                        </div>

                    </a>

                </div>

                <div class="col-md-9">
                    <div class="row">
                        <div class="col-xs-6 ">
                            <a class="block block-link-hover1" href="<?php echo base_url('backend/MOD_SERVICIOS/servicios/listado'); ?>">
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
                        <div class="col-xs-6 ">
                            <a class="block block-link-hover1" href="<?php echo base_url('backend/MOD_SERVICIOS/servicios/listado'); ?>">
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
                        <div class="col-xs-6 ">
                            <a class="block block-link-hover1" href="<?php echo base_url('backend/MOD_SERVICIOS/servicios/listado'); ?>">
                                <div class="block-content block-content-full clearfix">
                                    <div class="pull-right push-15-t push-15">
                                        <i class="fa fa-line-chart fa-2x text-gray"></i>
                                    </div>
                                    <div class="h2 text-gray" data-toggle="countTo" data-to="760" data-before="$">$ 0</div>
                                    <div class="text-uppercase font-w600 font-s12 text-muted">Otros</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xs-6 ">
                            <a class="block block-link-hover1" href="<?php echo base_url('backend/MOD_SERVICIOS/servicios/listado'); ?>">
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


            </div>
        </div>

        <div class="col-lg-12">
            <!-- Ventas de la semana -->
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Ventas por sucursal</h3>
                </div>
                <div class="block-content text-center">
                    <!-- Bars Chart Container -->
                    <canvas class="js-chartjs2-bars"></canvas>
                </div>
            </div>
            <!-- END Ventas de la semana -->
        </div>

    </div>

</div>

<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
<!-- Page JS Plugins -->
<script src="<?php echo base_url(); ?>assets/js/plugins/chartjsv2/Chart.min.js"></script>
<!-- Page JS Code -->
<script src="<?php echo base_url(); ?>assets/js/pages/base_comp_chartjs_v2.js"></script>



<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

</script>



