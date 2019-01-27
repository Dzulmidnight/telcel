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

<style>
	.circulo {
	     width: 30px;
	     height: 30px;
	     -moz-border-radius: 50%;
	     -webkit-border-radius: 50%;
	     border-radius: 50%;
	     background: #5cb85c;
	}
</style>

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h4 class="page-heading">
                Ficha de servicio
            </h4>
        </div>

        <div class="col-sm-5 text-right hidden-xs">
            <button class="btn btn-rounded btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
        </div>
    </div>


</div>
<!-- Stats -->
<div class="content bg-white border-b">
    <div class="row items-push text-uppercase">
        <div class="col-xs-6 col-sm-3">
            <div class="font-w700 text-gray-darker animated fadeIn">
            	Ficha de servicio
            </div>
            <a class="h4 font-w300 text-primary animated flipInX" href="javascript:void(0)">
            	# <?= $row_servicios->codigo_barras; ?>
            </a>
        </div>
        <div class="col-xs-6 col-sm-3">
            <div class="font-w700 text-gray-darker animated fadeIn">
            	Cliente
            </div>
            <a class="h4 font-w300 text-primary animated flipInX" href="javascript:void(0)">
            	<?= $row_servicios->nombre_cliente.' '.$row_servicios->ap_paterno; ?>
            </a>
        </div>
        <div class="col-xs-6 col-sm-3">
            <div class="font-w700 text-gray-darker animated fadeIn">Fecha de ingreso</div>
            <a class="h4 font-w300 text-primary animated flipInX" href="javascript:void(0)">
            	<?= date('d/m/Y', $row_servicios->fecha_registro); ?>
            </a>
        </div>
        <div class="col-xs-6 col-sm-3">
            <div class="font-w700 text-gray-darker animated fadeIn">Fecha de Entrega</div>
            <a class="h4 font-w300 bg-city animated flipInX" style="color:white" href="javascript:void(0)">
            	<?= date('d/m/Y', $row_servicios->fecha_entrega); ?>
            </a>
        </div>
    </div>
</div>
<!-- END Stats -->

<!-- Page Content -->
<div class="content content-boxed">
    <div class="row">
        <div class="col-sm-6 col-lg-7">
            <!-- Timeline -->
            <div class="block">
                <div class="block-header bg-gray-lighter">
                    <ul class="block-options">
                    	<?php 
                    		if($row_servicios->estatus == 'PENDIENTE'){
                    		?>
                    			<li>
                    				<button type="button" class="" data-toggle="modal" data-target="#modal-cotizacion-servicio">
                    					<span style="color:#f39c12;">
                    						<i class="si si-calculator"></i> Cotización
                    					</span>
                    				</button>
                    			</li>
                    		<?php
                    		}
                    		if($row_servicios->estatus == 'EN PROCESO'){
                    		?>
		                        <li>
		                        	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-estatus-reparacion" onclick="actualizarEstatus();">
		                        		<i class="si si-refresh"></i> Actualizar estatus
		                        	</button>
		                            <!--<button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>-->
		                        </li>
		                        <li style="color:#27ae60;">
		                        	<button type="button" class="" data-toggle="modal" data-target="#modal-estatus-reparacion" onclick="finalizarServicio();">
		                        		<span style="color:#27ae60" class="font-w700"><i class="si si-check"></i> Finalizar servicio</span>
		                        	</button>
		                        </li>

                    		<?php
                    		}
                    	 ?>

                        <li>
                            <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                        </li>
                    </ul>
                    <h3 class="block-title"><i class="fa fa-newspaper-o"></i> Actualizaciones</h3>
                </div>
                <div class="block-content">
                	<?php 
                		$total_estatus = count($historial_estatus);
                	 ?>
                    <ul class="list list-timeline pull-t">
                    	<?php 
                    	foreach ($historial_estatus as $estatus) {
                    		$estilo_estatus = '';
                    		switch ($estatus->estatus) {
                    			case 'EN PROCESO':
                    				$estilo_estatus = 'style="color:#f39c12;"';
                    				break;
                    			case 'FINALIZADO':
                    				$estilo_estatus = 'style="color:#e74c3c;"';
                    				break;
                    			case 'ENTREGADO':
                    				$estilo_estatus = 'style="color:#27ae60;"';
                    				break;
                    			
                    			default:
                    				# code...
                    				break;
                    		}
                    	?>
	                        <!-- Actualización general -->
	                        <li>
	                            <div class="list-timeline-time"><?= date('d/m/Y h:i:s', $estatus->fecha_registro); ?></div>
	                            <i class="fa fa-briefcase list-timeline-icon bg-modern"></i>
	                            <div class="list-timeline-content">
	                               	<p class="font-w600">Estatus: <span <?= $estilo_estatus; ?>><?= $estatus->estatus; ?></span></p>
	                                <p class="font-s13">
	                                	<?= $estatus->accion_realizada; ?>
	                                </p>
	                            </div>
	                        </li>
	                        <!-- END Actualización general -->
                    	<?php
                    	}
                    	 ?>
                    </ul>
                </div>
            </div>
            <!-- END Timeline -->
        </div>
        <div class="col-sm-6 col-lg-5">
            <!-- Información equipo -->
            <div class="block">
                <div class="block-header bg-gray-lighter">
                    <h3 class="block-title"><i class="fa fa-fw fa-briefcase"></i> Equipo</h3>
                </div>
                <div class="block-content">
                    <ul class="list list-simple list-li-clearfix">
                        <li>
                            <h5 class="push-10-t">IMEI</h5>
                            <div class="font-s13">
                            	<?= $row_servicios->imei; ?>
                            </div>
                        </li>
                        <li>
                            <h5 class="push-10-t">Nº Telefono</h5>
                            <div class="font-s13">
                            	<?= $row_servicios->numero_telefono; ?>
                            </div>
                        </li>
                        <li>
                            <h5 class="push-10-t">Marca</h5>
                            <div class="font-s13">
                            	<?= $row_servicios->marca_telefono; ?>
                            </div>
                        </li>
                        <li>
                            <h5 class="push-10-t">Modelo</h5>
                            <div class="font-s13">
                            	<?= $row_servicios->modelo_telefono; ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END Información equipo -->

            <!-- Detalles del equipo -->
            <div class="block">
                <div class="block-header bg-gray-lighter">
                    <h3 class="block-title"><i class="fa fa-fw fa-briefcase"></i> Detalles</h3>
                </div>
                <div class="block-content">
                    <ul class="list list-simple list-li-clearfix">
                        <li>
                            <h5 class="push-10-t">Falla Reportada</h5>
                            <div class="font-s13 text-danger">
                            	<?= $row_servicios->falla_reportada; ?>
                            </div>
                        </li>
                        <li>
                            <h5 class="push-10-t">Detalles extra</h5>
                            <div class="font-s13 text-primary">
                            	<?= $row_servicios->detalle_extra; ?>
                            </div>
                        </li>
                        <li>
                            <h5 class="push-10-t">Estado fisico</h5>
                            <div class="font-s13">
                            	<?= $row_servicios->estado_fisico; ?>
                            </div>
                        </li>
                        <li>
                            <h5 class="push-10-t">Tipo de bloqueo</h5>
                            <div class="font-s13">
                            	<?php

                            		if(isset($row_servicios->patron_bloqueo)){
                            			echo '<p class="text-success">Patrón de Bloqueo</p>';
                            			echo '<p>Sigue la secuencia de número para desbloquear el equipo</p>';

											$token_casilla = explode(',', $row_servicios->patron_bloqueo);
											$string_casilla = '';

											foreach ($token_casilla as $value) {
												$string_casilla .= $value;
											}

											$num_casilla = explode('casilla', $string_casilla);

											$orden = array();
											$casilla = array();
											$cont = 1;

											foreach ($num_casilla as $value) {
												if($value != ''){
													$casilla[] = $value;
													$orden[] = $cont;
													$cont++;
												}
											}
		
											$orden_casilla = array_combine($orden, $casilla);

                            			?>
											<table class="table table-bordered text-center" style="color:white;">
												<tr>
													<td class="">
														<?php 
															for ($i=1; $i <= count($orden_casilla); $i++) { 
																if ($orden_casilla[$i] == '1') {
																	echo '<span class="bg-success" style="padding:10px;">'.$i.'</span>';
																	break;
																}
															}
														 ?>
													</td>
													<td>
														<?php 
															for ($i=1; $i <= count($orden_casilla); $i++) { 
																if ($orden_casilla[$i] == '2') {
																	echo '<span class="bg-success" style="padding:10px;">'.$i.'</span>';
																	break;
																}
															}
														 ?>
													</td>
													<td>
														<?php 
															for ($i=1; $i <= count($orden_casilla); $i++) { 
																if ($orden_casilla[$i] == '3') {
																	echo '<span class="bg-success" style="padding:10px;">'.$i.'</span>';
																	break;
																}
															}
														 ?>
													</td>
												</tr>
												<tr>
													<td>
														<?php 
															for ($i=1; $i <= count($orden_casilla); $i++) { 
																if ($orden_casilla[$i] == '4') {
																	echo '<span class="bg-success" style="padding:10px;">'.$i.'</span>';
																	break;
																}
															}
														 ?>
													</td>
													<td>
														<?php 
															for ($i=1; $i <= count($orden_casilla); $i++) { 
																if ($orden_casilla[$i] == '5') {
																	echo '<span class="bg-success" style="padding:10px;">'.$i.'</span>';
																	break;
																}
															}
														 ?>
													</td>
													<td>
														<?php 
															for ($i=1; $i <= count($orden_casilla); $i++) { 
																if ($orden_casilla[$i] == '6') {
																	echo '<span class="bg-success" style="padding:10px;">'.$i.'</span>';
																	break;
																}
															}
														 ?>
													</td>
												</tr>
												<tr>
													<td>
														<?php 
															for ($i=1; $i <= count($orden_casilla); $i++) { 
																if ($orden_casilla[$i] == '7') {
																	echo '<span class="bg-success" style="padding:10px;">'.$i.'</span>';
																	break;
																}
															}
														 ?>
													</td>
													<td>
														<?php 
															for ($i=1; $i <= count($orden_casilla); $i++) { 
																if ($orden_casilla[$i] == '8') {
																	echo '<span class="bg-success" style="padding:10px;">'.$i.'</span>';
																	break;
																}
															}
														 ?>
													</td>
													<td>
														<?php 
															for ($i=1; $i <= count($orden_casilla); $i++) { 
																if ($orden_casilla[$i] == '9') {
																	echo '<span class="bg-success" style="padding:10px;">'.$i.'</span>';
																	break;
																}
															}
														 ?>
													</td>
												</tr>
											</table>
                            			<?php
                            		}else if(isset($row_servicios->codigo_bloqueo)){
                            			echo '<p class="text-primary">Codigo de Bloqueo</p>';
                            			echo '<b>'.$row_servicios->codigo_bloqueo.'</b>';
                            		}else{
                            			echo 'Ninguno';
                            		}
                            	 ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END Detalles del equipo -->
        </div>
    </div>
</div>
<!-- END Page Content -->


<!-- Modal Cotización Servicio -->
<div class="modal fade" id="modal-cotizacion-servicio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout">
        <div class="modal-content">
            <?php 
            $atributos = array('class="form-horizontal push-10-t block-content"');
            echo form_open_multipart('backend/MOD_SERV_TECNICO/Serv_tecnico/cotizacion_servicio'); 
            ?>
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Cotización del servicio</h3>
                    </div>
                    <div class="block-content">
                    	<div class="row">
                    		<div id="div_mensaje_finalizar" class="col-md-12" style="margin-bottom: 1em;">
                    			<p class="bg-danger" style="color:white;padding:10px;">
                    				Despues de generar la cotización, se notificara a la sucursal.
                    			</p>
                    		</div>
                    		<div class="col-md-6">
                    			<label for="costo_servicio">Costo servicio</label>
                    			<input type="text" class="form-control" id="costo_servicio" name="costo_servicio" placeholder="$ 000.00">
                    		</div>
                    		<div class="col-md-6">
                    			<label for="consultar_piezas">Consultar piezas</label>
                    			<input type="text" class="form-control" id="consultar_piezas" name="consultar_piezas" placeholder="Nombre de piezas">
                    		</div>

                    		<div class="col-md-6">
                    			<label for="descripcion_servicio">Descripción del servicio</label>
                    			<textarea class="form-control" name="descripcion_servicio" id="descripcion_servicio" cols="" rows="5" placeholder=""></textarea>
                    		</div>

                    		<!-- tabla de piezas -->
                    		<div class="col-md-6">
	                            <table class="table table-condensed table-striped js-dataTable-full">
	                                <thead>
	                                    <tr>
	                                        <th style="font-size: 12px;">#</th>
	                                        <th style="font-size: 12px;">Pieza</th>
	                                        <th style="font-size: 12px;">Precio</th>
	                                        <th style="font-size: 12px;" style="width: 10%;">...</th>
	                                    </tr>
	                                </thead>
	                                <tbody style="font-size: 11px;">
	                                 	<tr>
	                                 		<td></td>
	                                 		<td></td>
	                                 		<td></td>
	                                 		<td></td>
	                                 	</tr>
	                                </tbody>
	                            </table>
                    		</div>
                    	</div>
                    </div>
                </div>
                <div class="modal-footer" style="margin-top: 1em;">
                	<input type="hidden" name="fecha_registro" value="<?= time(); ?>">
                	<input type="hidden" id="estatus_servicio" name="estatus_servicio" value="COTIZACION">
                	<input type="hidden" name="id_servicio_tecnico" value="<?= $row_servicios->id_servicio_tecnico; ?>">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                    <button id="btn_submit_estatus" class="btn btn-sm btn-success" type="submit">Registrar cotización</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Modal Cotización Servicio -->


<!-- Modal actualizar estatus -->
<div class="modal fade" id="modal-estatus-reparacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <div class="modal-content">
            <?php 
            $atributos = array('class="form-horizontal push-10-t block-content"');
            echo form_open_multipart('backend/MOD_SERV_TECNICO/Serv_tecnico/actualizar_estatus'); 
            ?>
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Actualizar estatus del equipo</h3>
                    </div>
                    <div class="block-content">
                    	<div class="row">
                    		<div id="div_mensaje_finalizar" class="col-md-12" style="margin-bottom: 1em;">
                    			<p class="bg-danger" style="color:white;padding:10px;">
                    				Después de finalizar el servicio ya no podras actualizar el estatus del mismo.
                    				Se notificara a la sucursal que el equipo se encuentra listo para su entrega.
                    			</p>
                    		</div>
                    		<div class="col-md-12">
                    			<p>
                    				Fecha: <span style="background: #2c3e50; color:white; padding: 5px;"><?= date('d/m/Y');?></span>
                    			</p>
                    			<textarea class="form-control" name="accion_realizada" id="" cols="" rows="3" placeholder="Describa la acción realizada al equipo"></textarea>
                    		</div>
                    	</div>
                    </div>
                </div>
                <div class="modal-footer">
                	<input type="hidden" name="fecha_registro" value="<?= time(); ?>">
                	<input type="hidden" id="estatus_servicio" name="estatus_servicio" value="EN PROCESO">
                	<input type="hidden" name="id_servicio_tecnico" value="<?= $row_servicios->id_servicio_tecnico; ?>">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                    <button id="btn_submit_estatus" class="btn btn-sm btn-success" type="submit">Registrar acción</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Modal actualizar estatus -->
<!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
<script src="<?php echo base_url(); ?>assets/js/propios/inventario.js"></script>
<script src="<?php echo base_url(); ?>assets/js/propios/funciones.js"></script>
<script src="<?php echo base_url(); ?>assets/js/propios/barcode.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.scrollLock.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.appear.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.countTo.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.placeholder.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/js.cookie.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>

<script>
	function finalizarServicio(){
		document.getElementById('btn_submit_estatus').innerHTML = 'Finalizar';
		document.getElementById('estatus_servicio').value = 'FINALIZADO';
	}
	function actualizarEstatus(){
		document.getElementById('btn_submit_estatus').innerHTML = 'Registrar acción';
	}
</script>