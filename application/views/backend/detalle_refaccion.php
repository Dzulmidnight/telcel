<table class="table table-striped">
	<thead>
		<tr>
			<th colspan="2">
				Detalle de la refacción
			</th>
		</tr>
	</thead>
	<tbody style="font-size:12px;">
		<tr>
			<td>Precio Publico</td>
			<td class="text-primary">
				$<span id="precio_establecido"><?= $info_refaccion->precio; ?></span>
				<input type="hidden" id="precio_interno" value="<?= $info_refaccion->precio; ?>">
			</td>
		</tr>
		<tr>
			<td>Total Piezas</td>
			<td class="text-primary"><?= $info_refaccion->cantidad; ?></td>
		</tr>
		<tr>
			<td>
				Nombre
			</td>
			<td class="text-primary">
				<span id="spanProducto"><?= $info_refaccion->nombre_pieza; ?></span>
				<input type="hidden" id="id_refaccion" value="<?= $info_refaccion->id_catalogo_piezas_reparacion; ?>">
			</td>
		</tr>
		<tr>
			<td>Modelo</td>
			<td class="text-primary">
				<span id="spanModelo"><?= $info_refaccion->modelo; ?></span>
			</td>
		</tr>
		<tr>
			<td>Color</td>
			<td class="text-primary">
				<span id="spanColor"><?= $info_refaccion->color; ?></span>
			</td>
		</tr>
		<tr>
			<td>
				Proveedor
			</td>
			<td class="text-primary">
				<span id="spanMarca"><?= $info_refaccion->proveedor; ?></span>
			</td>
		</tr>

	</tbody>
</table>