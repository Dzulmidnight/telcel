<style type="text/css">
	.ticket {
	  width: 155px;
	  max-width: 155px;
	}
</style>

<div class="ticket">
		<table style="margin-top: 1em; font-size:10px;">

			<tr>
				<td colspan="4" style="text-align:center; font-size:14px;color: #2980b9">MOVIL EXPERT</td>
			</tr>
			<tr>
				<td colspan="4" style="padding:10px;">Sucursal: <?= $sucursal->nombre; ?></td>
			</tr>
			<tr>
				<td colspan="4" style="text-align:center;padding-bottom: 1em;" >TICKET Nº: <?= str_pad($id_ticket, 2, "0", STR_PAD_LEFT).'-'.$fecha_registro; ?></td>
			</tr>
			<tr>
				<td style="padding-bottom: 2em;" colspan="2">Fecha: <?= date('d/m/Y', $fecha_registro); ?></td>
				<td style="padding-bottom: 2em;text-align: right" colspan="2">Hora: <?= date("H:i:s", $fecha_registro); ?></td>
			</tr>


			<tr>
				<td style="border-bottom: 1px solid #000; border-top: 1px solid #000">ARTICULO</td>
				<td style="border-bottom: 1px solid #000; border-top: 1px solid #000; text-align: right;">PRECIO</td>
				<td style="border-bottom: 1px solid #000; border-top: 1px solid #000; text-align: right;">CANT</td>
				<td style="border-bottom: 1px solid #000; border-top: 1px solid #000; text-align: right;">IMPORTE</td>
			</tr>
			<tr>
				<td colspan="4" style="padding-top: 10px;"></td>
			</tr>
			<?php
			foreach ($ticket as $value) {
				$total_parcial = $value->precio_venta * $value->piezas;
			?>
				<tr>
					<td style="overflow-wrap: break-word !important;"><?= $value->nombre; ?></td>
					<td style=" text-align:right">$ <?= $value->precio_venta; ?></td>
					<td style=" text-align:right"><?= $value->piezas; ?></td>
					<td style=" text-align:right">$ <b><?= $total_parcial; ?></b></td>
				</tr>
			<?php	
			}
			?>
			<tr>
				<td colspan="4" style="padding-bottom: 10px;"></td>
			</tr>

			<tr>
				<td colspan="3" style="border-top: 1px solid #000; text-align:right">TOTAL:</td>
				<td style="border-top: 1px solid #000; text-align:right">$ <b><?= $ticket[0]->ticket_total; ?></b></td>
			</tr>

			<tr>
				<td style="text-align:center; padding-top: 2em;" colspan="4">Le ha atendido <?= $usuario->nombre.' '.$usuario->ap_paterno; ?></td>
			</tr>

			<tr>
				<td style="text-align:center; padding-top: 2em;" colspan="4">Gracias por su compra</td>
			</tr>

		</table>
</div>