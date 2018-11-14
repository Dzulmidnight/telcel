<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                DASHBOARD INVENTARIO
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
			                <h3 class="block-title">Stock sucursales</h3>
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
			<div class="row">
				<div class="col-md-12">
					<h3 style="margin-bottom:1em">Resumen general</h3>
				</div>
				<div class="col-xs-6 col-md-6">
			        <a class="block block-link-hover1" href="<?php echo base_url('backend/MOD_INVENTARIO/inventario/listado'); ?>">
			            <div class="block-content block-content-full clearfix">
			                <div class="pull-right push-15-t push-15">
			                    <i class="fa fa-search fa-2x text-primary"></i>
			                </div>
			                <div class="h2 text-primary" data-toggle="countTo" data-to="36300">540</div>
			                <div class="text-uppercase font-w600 font-s12 text-muted">Stock actual (accesorios)</div>
			            </div>
			        </a>
				</div>
			    <div class="col-xs-6 col-md-6">
			        <a class="block block-link-hover1" href="javascript:void(0)">
			            <div class="block-content block-content-full clearfix">
			                <div class="pull-right push-15-t push-15">
			                    <i class="fa fa-search fa-2x text-smooth"></i>
			                </div>
			                <div class="h2 text-smooth" data-toggle="countTo" data-to="360">$ 34,600</div>
			                <div class="text-uppercase font-w600 font-s12 text-muted">Valor stock actual ($)</div>
			            </div>
			        </a>
			    </div>
			    <div class="col-xs-6 col-md-6">
			        <a class="block block-link-hover1" href="javascript:void(0)">
			            <div class="block-content block-content-full clearfix">
			                <div class="pull-right push-15-t push-15">
			                    <i class="fa fa-search fa-2x text-success"></i>
			                </div>
			                <div class="h2 text-success" data-toggle="countTo" data-to="760" data-before="$">4</div>
			                <div class="text-uppercase font-w600 font-s12 text-muted">Telefonos</div>
			            </div>
			        </a>
			    </div>
			    <div class="col-xs-6 col-md-6">
			        <a class="block block-link-hover1" href="javascript:void(0)">
			            <div class="block-content block-content-full clearfix">
			                <div class="pull-right push-15-t push-15">
			                    <i class="fa fa-search fa-2x text-amethyst"></i>
			                </div>
			                <div class="h2 text-amethyst" data-toggle="countTo" data-to="48">48</div>
			                <div class="text-uppercase font-w600 font-s12 text-muted">Proveedores</div>
			            </div>
			        </a>
			    </div>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- Alertas articulos -->
		<div class="col-xs-6 col-lg-3 ">

			<div class="block block-themed">
			    <div class="block-header bg-warning">
			        <ul class="block-options">
			            <li>
			                <button type="button"><i class="si si-settings"></i></button>
			            </li>
			        </ul>
			        <h3 class="block-title">OTROS</h3>
			    </div>
			    <div class="block-content" style="padding-top:0">
					<table class="table table-striped">
						<tr>
							<td>
								Apartados
							</td>
							<td>
								<b class="text-info">20</b>
							</td>
						</tr>
						<tr>
							<td>
								Productos por Agotar
							</td>
							<td>
								<b class="text-danger">12</b>
							</td>
						</tr>
						<tr>
							<td>
								Excendetes
							</td>
							<td>
								<b class="text-warning">23</b>
							</td>
						</tr>
						<tr>
							<td>
								Agotados
							</td>
							<td>
								<b>20</b>
							</td>
						</tr>
					</table>
			    </div>
			</div>
		</div>
		<!-- END Alertas articulos -->
		
		<!-- Articulos mas vendidos -->
		<div class="col-xs-6 col-lg-4">
			<div class="block block-themed">
			    <div class="block-header bg-success">
			        <ul class="block-options">
			            <li>
			                <button type="button"><i class="si si-settings"></i></button>
			            </li>
			        </ul>
			        <h3 class="block-title">MÁS VENDIDOS (sem)</h3>
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
		<div class="col-xs-6 col-lg-5">

			<div class="block block-themed">
			    <div class="block-header bg-danger">
			        <ul class="block-options">
			            <li>
			                <button type="button"><i class="si si-settings"></i></button>
			            </li>
			        </ul>
			        <h3 class="block-title">MÁS ANTIGUOS (sem)</h3>
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