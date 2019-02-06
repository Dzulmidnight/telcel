<table class="table table-bordered">
	<thead>
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
		</tr>
	</thead>
	<tbody>
		<?php foreach($row_repuestos as $repuesto): ?>
			<tr>
				<td>
					<?= $repuesto->nombre_pieza; ?>
				</td>
				<td>
					<?= $repuesto->modelo; ?>
				</td>
				<td>
					<?= $repuesto->color; ?>
				</td>
				<td>
					$ <?= $repuesto->precio; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>