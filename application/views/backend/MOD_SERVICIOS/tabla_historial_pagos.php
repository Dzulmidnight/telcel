<table class="table table-condensed tabla-striped" style="font-size:12px;">
	<thead>
		<tr>
			<th>
				Sucursal
			</th>
			<th>
				Servicio
			</th>
			<th>
				Pago
			</th>
			<th>
				Fecha
			</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$total_servicios = count($row_historial_pagos);
			$contador = 0;
			if($total_servicios > 0){
				foreach ($row_historial_pagos as $historial) {
					$contador++;
				?>
					<tr>
						<td>
							<?= $contador; ?>
						</td>
						<td>
							<?= $historial->nombre_sucursal; ?>
						</td>
						<td>
							<?= $historial->nombre_servicio; ?>
						</td>
						<td>
							$ <?= $historial->monto; ?>
						</td>
						<td>
							<?= date('d/m/Y', $historial->fecha_registro); ?>
						</td>
					</tr>
				<?php
				}
			}else{
				echo '<tr class="text-center"><td colspan="4">No se encontro información</td></tr>';
			}
		 ?>
	</tbody>
</table>