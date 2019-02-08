<table class="table table-bordered" style="margin-top:1em;">
	<thead>
		<tr>
			<th style="font-size:12px;background:#ecf0f1;color:#2c3e50;" class="text-center" colspan="5">
				LISTADO DE PIEZAS
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
		 ?>
			<tr>
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
					<button type="button" class="btn btn-xs btn-success" onclick="agregarPieza(<?= $id_pieza; ?>, '<?= $pieza; ?>', '<?= $modelo; ?>', '<?= $color; ?>', <?= $precio; ?>);">
						<i class="fa fa-plus"></i>
					</button>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>