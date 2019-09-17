<table class="table">
	<thead>
		<tr>
			<th>
				<?php 
				if(isset($detalle_ticket->fecha_registro)){
					$fecha_venta = date('d/m/Y', $detalle_ticket->fecha_registro);
				}else{
					$fecha_venta = "";
				}
				 ?>
				Fecha Venta: <b style="color:red;"><?= $fecha_venta; ?></b>
			</th>
			<th>
				Codigo: <b style="color:#3498db;"><?= $detalle_ticket->codigo_ticket; ?></b>
				<input type="hidden" id="input-id-ticket" value="<?= $detalle_ticket->id_ticket; ?>">
				<input type="hidden" id="input-codigo-ticket" value="<?= $detalle_ticket->codigo_ticket; ?>">
			</th>
			<th>
				Sucursal: <b style="color:#3498db"><?= $detalle_ticket->nombre_sucursal; ?></b>
				<br>
				Usuario: <b style="color:#3498db"><?= $detalle_ticket->nombre.' '.$detalle_ticket->ap_paterno; ?></b>
			</th>
			<th>
				<button class="btn btn-sm btn-default"></button>
			</th>
		</tr>
	</thead>
</table>
<table class="table table-hover">
	<thead>
		<tr>
			<th class="bg-info" colspan="6">
				Articulos
			</th>
		</tr>
		<tr>
			<th>
				#
			</th>
			<th>
				Fecha
			</th>
			<th>
				Producto
			</th>
			<th>
				Precio venta
			</th>
			<th>
				Piezas
			</th>
			<th class="text-right">
				Total: <b style="color:#e74c3c;">$ <?= $detalle_ticket->total; ?> MXN</b>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$total = count($row_productos);
			if($total > 0){
				$contador = 1;
				foreach ($row_productos as $producto) {
					$precio_venta = $producto->precio_venta;
					$piezas = $producto->piezas;
					$fecha_venta = date('d/m/Y', $producto->fecha_registro);
				?>
					<tr>
						<!-- # -->
						<td>
							<?= $contador; ?>

							<button type="button" class="btn btn-default" data-toggle="tooltip" title="Devolver producto" onclick="devolverProducto('<?= $producto->fk_id_producto; ?>', '<?= $piezas; ?>', '<?= $producto->nombre; ?>');">
								<i class="si si-action-undo"></i>
							</button>
						</td>
						
						<!-- fecha de venta -->
						<td>
							<?= $fecha_venta; ?>						
						</td>

						<!-- nombre producto -->
						<td>
							<?php 
							echo '<b>'.$producto->nombre.'</b>';
							echo '<br>';
							echo 'Marca: <b>'.$producto->marca.'</b>';
							 ?>
						</td>

						<!-- precio venta -->
						<td>
							<?= '$ '.$producto->precio_venta.' MXN'; ?>
						</td>

						<!-- num piezas -->
						<td>
							<?= $piezas; ?>
						</td>

						<!-- total -->
						<td class="text-right">
							<?php 

							$sub_total = $precio_venta*$piezas;

							echo '<b style="color:#27ae60;">$ '.$sub_total.' MXN</b>';
							 ?>
						</td>
					</tr>
				<?php
				$contador++;
				}
			}else{
				echo "<tr><td colspan='5'>No se encontro información</td></tr>";

			}
		?>
	</tbody>
</table>