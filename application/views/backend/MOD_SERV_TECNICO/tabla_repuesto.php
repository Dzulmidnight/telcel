<?php 
	$total_resultado = count($row_repuestos);

	if($total_resultado == 0){
	?>
		<div style="margin-top:1em;">
			<p>
				<i style="color:#ff9f43;" class="fa fa-exclamation-circle"></i> Pieza no encontrada
			</p>
			<p>
				<a href="#" onclick="solicitarPieza('si');">
					<i class="fa fa-truck"></i> Solicitar pieza
				</a>
			</p>
		</div>
		<div id="div-solicitar-pieza" style="display:block;border: 2px solid #44bd32;">
			<form action="" method="POST" style="padding:1em;">
				
				<p style="background:#44bd32;color:#fff;padding:1em;">
					Formulario de solicitud <a class="push-right" style="float: right;color:white;" href="#" onclick="solicitarPieza('no');"><i class="fa fa-window-close"></i> Cancelar</a>
				</p>

				<div style="margin:1em;">
					<label for="">Nombre</label>
					<input type="text" class="form-control">

					<label for="">Modelo</label>
					<input type="text" class="form-control">

					<label for="">Color</label>
					<input type="text" class="form-control">

					<button type="button" class="btn btn-sm btn-success">
						Enviar solicitud
					</button>				
				</div>

			</form>
		</div>
	<?php
	}else{
	?>
		<table class="table table-bordered" style="margin-top:1em;">
			<thead>
				<tr>
					<th style="font-size:12px;background:#ecf0f1;color:#2c3e50;" class="text-center" colspan="5">
						LISTADO DE PIEZAS
					</th>
				</tr>
				<tr>
					<th colspan="5" style="font-size:11px;">
						<i class="fa fa-truck"></i> Pieza agotada, solicitar repuesto
					</th>
				</tr>
				<tr>
					<th style="font-size:12px;">
						Pieza
					</th>
					<th style="font-size:12px;">
						Modelo
					</th>
					<th style="font-size:12px;">
						Color
					</th>
					<th style="font-size:12px;">
						Precio
					</th>
					<th>
						
					</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($row_repuestos as $repuesto): ?>
				<?php 
					$pieza = $repuesto->nombre_pieza;
					$modelo = $repuesto->modelo;
					$color = $repuesto->color;
					$precio = $repuesto->precio;
					$id_pieza = $repuesto->id_catalogo_piezas_reparacion;
					$cantidad= $repuesto->cantidad;
					$resaltar = "style='background:#ee5253;color:#fff;'";
					
					?>
					<tr <?php if($cantidad == 0){ echo $resaltar; } ?>>
						<td style="font-size:11px;">
							<span name="nombre-pieza"><?= $repuesto->nombre_pieza; ?></span>
						</td>
						<td style="font-size:11px;">
							<span name="modelo-pieza"><?= $repuesto->modelo; ?></span>
						</td>
						<td style="font-size:11px;">
							<span name="color-pieza"><?= $repuesto->color; ?></span>
						</td>
						<td style="font-size:11px;">
							$ <span name="precio-pieza"><?= $repuesto->precio; ?></span>
						</td>
						<td style="font-size:11px;">
							<?php 
								if($cantidad == 0){
								?>
									<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="">
										<i class="fa fa-truck"></i>
									</button>
								<?php
								}else{
								?>
									<button type="button" class="btn btn-xs btn-success" onclick="agregarPieza(<?= $id_pieza; ?>, '<?= $pieza; ?>', '<?= $modelo; ?>', '<?= $color; ?>', <?= $precio; ?>);">
										<i class="fa fa-plus"></i>
									</button>
								<?php
								}
							 ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php
	}
?>