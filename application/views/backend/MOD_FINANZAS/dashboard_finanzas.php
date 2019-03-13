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

        <div class="col-sm-6 col-lg-3">
            <a class="block block-bordered block-link-hover3 text-center" href="javascript:void(0)">
                <div class="block-content block-content-full bg-gray-lighter border-b">
                    <div class="h1 font-w700">
                        <?= $num_productos; ?>
                    </div>
                    <div class="h5 text-muted text-uppercase push-5-t">Productos</div>
                </div>
                <div class="block-content block-content-full block-content-mini">
                    <i class="fa fa-arrow-down text-danger"></i> -5% Está semana
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a class="block block-bordered block-link-hover3 text-center" href="javascript:void(0)">
                <div class="block-content block-content-full bg-gray-lighter border-b">
                    <div class="h1 font-w700"><span class="h2 text-muted">$</span> <?= $monto_ventas; ?></div>
                    <div class="h5 text-muted text-uppercase push-5-t">Monto</div>
                </div>
                <div class="block-content block-content-full block-content-mini">
                    <i class="fa fa-arrow-up text-success"></i> +50% Está semana
                </div>
            </a>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12" style="margin-bottom:1em;">
            <select class="js-select2 form-control" id="example-select2-multiple" name="example-select2-multiple" style="width:20%" data-placeholder="Filtrar por sucursales" multiple>
                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                <?php 
                    foreach ($row_sucursales as $sucursal) {
                        if($sucursal_gral == $sucursal->id_sucursal){
                            echo '<option value="'.$sucursal->id_sucursal.'" selected>'.$sucursal->nombre.'</option>';
                        }else{
                            echo '<option value="'.$sucursal->id_sucursal.'">'.$sucursal->nombre.'</option>';
                        }
                    }
                 ?>
            </select>
        </div>

        <!-- Articulos mas vendidos -->
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="success text-center" colspan="9">
                            REGISTRO DE VENTAS REALIZADAS
                        </th>
                    </tr>
                    <tr>
                        <th style="font-size:12px;">
                            #
                        </th>
                        <th style="font-size:12px;">
                            ID
                        </th>
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
                                <td>
                                    <?= $venta->id_producto_venta; ?>
                                </td>

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

                                <!-- TOTAL VENTA -->
                                <td>
                                    <?= $venta->total; ?>
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



