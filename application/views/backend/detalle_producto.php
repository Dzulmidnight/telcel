<table class="table table-striped">
	<thead>
		<tr>
			<th colspan="2">
				Detalle del producto
			</th>
		</tr>
	</thead>
	<tbody style="font-size:12px;">
		<tr>
			<td>Precio Publico</td>
			<td class="text-primary">
				$<span id="precio_establecido"><?= $info_producto->precio_publico; ?></span>
				<input type="hidden" id="precio_real" value="<?= $info_producto->precio_publico; ?>">
			</td>
		</tr>
		<tr>
			<td>Sucursal</td>
			<td class="text-primary"><?= $info_producto->nombre_sucursal; ?></td>
		</tr>
		<tr>
			<td>Piezas</td>
			<td class="text-primary">
				<input type="hidden" id="piezas_existentes" value="<?= $info_producto->piezas; ?>">
				<?= $info_producto->piezas; ?>
			</td>
		</tr>
		<tr>
			<td>
				Producto
			</td>
			<td class="text-primary">
				<span id="spanProducto"><?= $info_producto->nombre; ?></span>
				<input type="hidden" id="id_producto" value="<?= $info_producto->id_producto; ?>">
			</td>
		</tr>
		<tr>
			<td>
				Marca
			</td>
			<td class="text-primary">
				<span id="spanMarca"><?= $info_producto->marca; ?></span>
			</td>
		</tr>
		<tr>
			<td>Modelo</td>
			<td class="text-primary">
				<span id="spanModelo"><?= $info_producto->modelo; ?></span>
			</td>
		</tr>
		<tr>
			<td>Color</td>
			<td class="text-primary">
				<span id="spanColor"><?= $info_producto->color; ?></span>
			</td>
		</tr>
		<tr>
			<td>Capacidad</td>
			<td class="text-primary">
				<span id="spanCapacidad"><?= $info_producto->capacidad; ?></span>
			</td>
		</tr>
		<tr>
			<td>Imagen</td>
			<td>
				<?php 
				    if(isset($info_producto->imagen)){
				        echo '<img src="'.base_url($info_producto->imagen).'" style="width:100px;height:100px;" alt="">';
				    }
				 ?>
			</td>
		</tr>
	</tbody>
</table>