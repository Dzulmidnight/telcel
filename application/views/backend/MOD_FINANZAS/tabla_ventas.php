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


<div class="content">
    <div class="content-grid push-50">
        <div class="row">

	        <div class="col-lg-6" style="margin-bottom:1em;">
	            <select class="js-select2 form-control" id="example-select2-multiple" name="example-select2-multiple" data-placeholder="Filtrar por sucursales" multiple onchange="ventasPorSucursal(this.value, '<?= base_url(); ?>');">
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

	        <div class="col-lg-6">
	            <a class="block block-link-hover1" href="#">
	                <div class="block-content block-content-full clearfix">
	                    <div class="pull-right push-15-t push-15">
	                        <i class="fa fa-bar-chart-o fa-2x text-danger"></i>
	                    </div>
	                    <div class="h2 text-danger" data-toggle="countTo" data-to="48">- $ 1,000</div>
	                    <div class="text-uppercase font-w600 font-s12 text-muted">Pago servicios</div>
	                </div>
	            </a>
	        </div>


			<div class="col-lg-12">
				<div id="div-tabla-ventas">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="success" colspan="9">
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
					                    <td class="cantidad-venta">
					                        <b>
					                            <?= $venta->piezas; ?>
					                        </b>
					                    </td>

					                    <!-- MONTO VENTA -->
					                    <td style="color:#00a8ff;" class="monto-venta">
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
			</div>
        </div>
    </div>
</div>