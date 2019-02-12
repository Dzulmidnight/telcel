<div style="padding:1em;">
	<table class="table table-striped table-condensed">
		<tr>
			<td colspan="2" class="text-center">
				<b>INFORMACIÓN DEL SERVICIO</b>
			</td>
		</tr>
		<tr>
			<td>Codigo</td>
			<td>
				<?= $row_servicio_tecnico->codigo_barras; ?>
			</td>
		</tr>
		<tr>
			<td>Cliente</td>
			<td>
				<?= $row_cliente->nombre.' '.$row_cliente->ap_paterno; ?>
			</td>
		</tr>
		<tr>
			<td>
				Estatus
			</td>
			<td>
				<a class="btn btn-xs btn-info" href="<?= base_url('backend/MOD_SERV_TECNICO/Serv_tecnico/ficha_servicio/'.$row_servicio_tecnico->id_servicio_tecnico); ?>" data-toggle="tooltip" title="Ficha de servicio">
                	<i class="si si-note"></i> <?= $row_servicio_tecnico->estatus; ?>
                </a>
			</td>
		</tr>
		<tr>
			<td>Fecha de entrega</td>
			<td>
				<?= date('d/m/Y', $row_servicio_tecnico->fecha_entrega); ?>
			</td>
		</tr>
		<tr>
			<td>Equipo</td>
			<td>
				
				<?php 
					echo 'Marca: '.$row_servicio_tecnico->marca_telefono;
					echo '<br>';
					echo 'Modelo: '.$row_servicio_tecnico->modelo_telefono;
				 ?>
			</td>
		</tr>
		<tr>
			<td>
				Falla
			</td>
			<td>
				<?= $row_servicio_tecnico->falla_reportada; ?>
			</td>
		</tr>
		<!--<?php foreach($row_estatus as $estatus): ?>
			<tr>
				<td>
					Estatus
				</td>
				<td>
					<?= $estatus->estatus.' ('.date('d/m/Y', $estatus->fecha_registro).')'; ?>
					<br>
					<?= $estatus->accion_realizada; ?>
				</td>
			</tr>
		<?php endforeach; ?>-->

	</table>
</div>