<?php
class Generar_pdf extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('pdf_helper');
		$this->load->model('count_model');
		$this->load->model('consultar_model');
		$this->load->library('My_mpdf');
	}

	public function index($id)
	{
		$this->load->library('My_mpdf');


		$data['ticket'] = $this->consultar_model->consultarTicket($id);

		// datos de la sucursal
		/*$id_sucursal = $ticket[0]->fk_id_sucursal;
		$id_usuario = $ticket[0]->fk_id_usuario;
		$fecha_registro = $ticket[0]->fecha_ticket;
		*/
		$id_sucursal = $data['ticket'][0]->fk_id_sucursal;
		$id_usuario = $data['ticket'][0]->fk_id_usuario;

		$data['sucursal'] = $this->consultar_model->consultaSimple($id_sucursal, 'id_sucursal', 'sucursal');

		$data['usuario'] = $this->consultar_model->consultaSimple($id_usuario, 'id_user', 'users');
		$data['id_ticket'] = $id;

		$data['fecha_registro'] = $data['ticket'][0]->fecha_ticket;
		$data['sucursal'] = $this->consultar_model->consultaSimple($id_sucursal, 'id_sucursal', 'sucursal');
		$data['usuario'] = $this->consultar_model->consultaSimple($id_usuario, 'id_user', 'users');



		//header("Content-Type: application/json; charset=UTF-8");
		setlocale(LC_TIME, 'es_MX');

		$header = '';
		$footer = '';
		$this->my_mpdf->pdf2->SetHTMLHeader($header);
		$this->my_mpdf->pdf2->SetHTMLFooter($footer);
		
		$html = $this->load->view('backend/pdf_ticket',$data,true);    	
   	

		/*$html = '';

		$html .= '<table width="200px">';
			$html .= '<tr>';
				$html .= '<td colspan="2" style="text-align:center; font-size:14px;color: #2980b9">MOVIL EXPERT</td>';
			$html .= '</tr>';
			$html .= '<tr>';
				$html .= '<td style="padding:10px;" colspan="2" >Sucursal:'.$sucursal->nombre.'</td>';
			$html .= '</tr>';
			$html .= '<tr>';
				$html .= '<td colspan="2" style="text-align:center;" >TICKET Nº: '.str_pad($id, 2, "0", STR_PAD_LEFT).'-'.$fecha_registro.'</td>';
			$html .= '</tr>';
			$html .= '<tr>';
				$html .= '<td>Fecha: '.date('d/m/Y', $fecha_registro).'</td>';
				$html .= '<td style="text-align: right">Hora: '.date("H:i:s", $fecha_registro).'</td>';
			$html .= '</tr>';
		$html .= '</table>';

		$html .= '<table width="200px">';
			$html .= '<tr>';
				$html .= '<td style="margin-top: 20px;border-bottom: 1px solid #000; border-top: 1px solid #000">ARTICULO</td>';
				$html .= '<td style="margin-top: 20px;border-bottom: 1px solid #000; border-top: 1px solid #000; text-align: right;">PRECIO.</td>';
				$html .= '<td style="margin-top: 20px;border-bottom: 1px solid #000; border-top: 1px solid #000; text-align: right;">CANT.</td>';
				$html .= '<td style="margin-top: 20px;border-bottom: 1px solid #000; border-top: 1px solid #000; text-align: right;">IMPORTE</td>';
			$html .= '</tr>';

			foreach ($ticket as $value) {
				$total_parcial = $value->precio_venta * $value->piezas;
				$html .= '<tr>';
					$html .= '<td>'.$value->nombre.'</td>';
					$html .= '<td style="text-align:right">$ '.$value->precio_venta.'</td>';
					$html .= '<td style="text-align:right">'.$value->piezas.'</td>';
					$html .= '<td style="text-align:right">$ '.$total_parcial.'</td>';
				$html .= '</tr>';	
			}
			$html .= '<tr>';
				$html .= '<td colspan="3" style="border-top: 1px solid #000; text-align:right">TOTAL:</td>';
				$html .= '<td style="border-top: 1px solid #000; text-align:right">$ '.$ticket[0]->ticket_total.'</td>';
			$html .= '</tr>';

			$html .= '<tr>';
				$html .= '<td>Le ha atendido '.$usuario->nombre.' '.$usuario->ap_paterno.'</td>';
			$html .= '</tr>';

			$html .= '<tr>';
				$html .= '<td colspan="4">Gracias por su compra</td>';
			$html .= '</tr>';

		$html .= '</table>';*/

		//$this->my_mpdf->pdf2->SetJs('this.print();');
		$this->my_mpdf->pdf2->WriteHTML($html);

		$this->my_mpdf->pdf2->Output('ticket_'.$id.'.pdf','D');

		//redirect('backend/MOD_INVENTARIO/Inventario/listado', 'refresh');


	}

	public function pdf_ficha_servicio($id, $cotizacion){
		$data['row_detalle_ficha'] = $this->consultar_model->servicios_tecnicos($id);
		$codigo = $data['row_detalle_ficha']->codigo_barras;
		$nombre = $data['row_detalle_ficha']->nombre_cliente.' '.$data['row_detalle_ficha']->ap_paterno.' '.$data['row_detalle_ficha']->ap_materno;
		$nombre_sucursal = $data['row_detalle_ficha']->nombre_sucursal;
		$telefono_cliente = $data['row_detalle_ficha']->telefono_cliente;

		/// INFORMACIÓN DEL CLIENTE
		$informacion_cliente = '';
		$informacion_cliente .= '<b>Cliente</b>: '.$nombre;
		$informacion_cliente .= '<br>';
		$informacion_cliente .= '<b>Sucursal</b>: '.$nombre_sucursal;
		$informacion_cliente .= '<br>';
		$informacion_cliente .= '<b>Teléfono</b>: '.$telefono_cliente;

		/// INFORMACIÓN DEL EQUIPO
		$informacion_equipo = '';
		$informacion_equipo .= '<b>Marca</b>: '.$data['row_detalle_ficha']->marca_telefono.'<br>';
		$informacion_equipo .= '<b>Modelo</b>: '.$data['row_detalle_ficha']->modelo_telefono.'<br>';
		$informacion_equipo .= '<b>IMEI</b>: '.$data['row_detalle_ficha']->imei.'<br>';
		$informacion_equipo .= '<b>Condicion del equipo</b>:<br>';
		$informacion_equipo .= $data['row_detalle_ficha']->estado_fisico;

		$fecha_ingreso = date('d/m/Y', $data['row_detalle_ficha']->fecha_registro);
		$fecha_salida = date('d/m/Y', $data['row_detalle_ficha']->fecha_actualizacion);
		
		$falla_reportada = $data['row_detalle_ficha']->falla_reportada;

		$ultima_fecha = date('d/m/Y', $data['row_detalle_ficha']->fecha_actualizacion);
		$descripcion_servicio = $data['row_detalle_ficha']->descripcion_servicio;
		$importe = '$ '.$data['row_detalle_ficha']->costo_servicio;

		$deposito_garantia = '$ '.$data['row_detalle_ficha']->deposito_garantia;

		$restante = ($data['row_detalle_ficha']->costo_servicio) - ($data['row_detalle_ficha']->deposito_garantia);

		$saldo_restante = '$ '.$restante;
		$total = '$ '.$data['row_detalle_ficha']->costo_servicio;


		///// INFORMACIÓN SOBRE LAS PIEZAS UTILIZADAS
		$data['row_piezas_cotizacion'] = $this->consultar_model->piezas_cotizacion_servicio($cotizacion);

		$this->load->library('My_mpdf');

		setlocale(LC_TIME, 'es_MX');
		$header = '';
		$footer = '<span style="color:#7f8c8d">Muchas gracias por su preferencia</span>';

		$this->my_mpdf->pdf->SetHTMLHeader($header);
		$this->my_mpdf->pdf->SetHTMLFooter($footer);
		
		//$html = $this->load->view('backend/pdf_ficha_tecnica',$data,true);
   		$codigo_barras = '<barcode code="'.$codigo.'" type="C128A" height="2" text="1" />';


		$html = '
		<html>
			<head>
				<style>
					body {
						font-family: sans-serif;
						font-size: 11px;
					}
					h5, p {	
						margin: 0pt;
					}
					table {
					  border-collapse: collapse;
					  width: 100%;
					}
					.borde table, .borde td, .borde th {  
					  border: 1px solid #ddd;
					  text-align: left;
					}

					th, td {
					  padding: 10px;
					}
					.barcode {
						padding: 1.5mm;
						margin: 0;
						vertical-align: top;
						color: #000000;
					}
					.barcodecell {
						text-align: center;
						vertical-align: middle;
						padding: 0;
					}

				</style>
			</head>
			<body>
		';


			$html .= '<table>';
				$html .= '<thead>
					<tr style="border: 1px solid #ddd;">
						<th><h2>MOVILEXPERT</h2></th>
						<th colspan="2" style="text-align:right;"><h2>FICHA DE SERVICIO</h2></th>
					</tr>
					<tr>
						<th width="30%" style="text-align:left;">CLIENTE</th>
						<th width="40%" style="text-align:left;">EQUIPO</th>
						<th width="30%" style="text-align:left;"></th>
					</tr>
				</thead>';

				$html .= '<tbody>';
					$html .= '<tr>
						<td>'.$informacion_cliente.'</td>
						<td>'.$informacion_equipo.'</td>
						<td style="text-align:center">
							'.$codigo_barras.'
							<br>
							'.$codigo.'
						</td>
					</tr>';

					// FALLA REPORTADA
					$html .= '<tr>';
						$html .= '<td>
							<b>Fecha de ingreso</b>: '.$fecha_ingreso.'
							<br>
							<b>Fecha de salida</b>: '.$fecha_salida.'
						</td>';
						$html .= '<td colspan="2">';
							$html .= '<h3>FALLA REPORTADA</h3>';
							$html .= '<br>';
							$html .= '<p >'.$falla_reportada.'</p>';
						$html .= '</td>';
					$html .= '</tr>';
					// END FALLA REPORTADA
				$html .= '</tbody>';

			$html .= '</table>';


			/// DESGLOSE DE PRECIO

			$html .= '<table class="borde" width="100%" style="margin-top:3em;">';
				$html .= '<thead>';
					$html .= '<tr>';
						$html .= '<th>FECHA</th>';
						$html .= '<th>SERVICIO REALIZADO</th>';
						$html .= '<th>IMPORTE</th>';
					$html .= '</tr>';
				$html .= '</thead>';

				$html .= '<tbody>';
					$html .= '<tr>';
						$html .= '<td>'.$ultima_fecha.'</td>';
						$html .= '<td>'.$descripcion_servicio.'</td>';
						$html .= '<td>'.$importe.'</td>';
					$html .= '</tr>';
					//deposito en garantia
					$html .= '<tr>';
						$html .= '<td style="text-align:right" colspan="2">Depósito en garantía</td>';
						$html .= '<td>'.$deposito_garantia.'</td>';
					$html .= '</tr>';
					// total
					$html .= '<tr>';
						$html .= '<td colspan="2" style="text-align:right;">Total</td>';
						$html .= '<td>'.$total.'</td>';
					$html .= '</tr>';
					// saldo restante
					$html .= '<tr style="background-color:#ecf0f1;">';
						$html .= '<td style="text-align:right" colspan="2">Restante</td>';
						$html .= '<td><b>'.$saldo_restante.'</b></td>';
					$html .= '</tr>';



				$html .= '</tbody>';
			$html .= '</table>';

			/// LISTADO DE PIEZAS UTILIZADAS
			$total_piezas = count($data['row_piezas_cotizacion']);

			if($total_piezas > 0){
				$html .= '<table class="borde" style="margin-top:3em;">';
					$html .= '<thead>';
						$html .= '<tr>';
							$html .= '<th colspan="3">PIEZAS UTILIZADAS</th>';
						$html .= '</tr>';
						$html .= '<tr>';
							$html .= '<th>Pieza</th>';
							$html .= '<th>Modelo</th>';
							$html .= '<th>Color</th>';
						$html .= '</tr>';
					$html .= '</thead>';

					$html .= '<tbody>';
						foreach ($data['row_piezas_cotizacion'] as $piezas) {
							$html .= '<tr>';
								$html .= '<td>'.$piezas->nombre_pieza.'</td>';
								$html .= '<td>'.$piezas->modelo.'</td>';
								$html .= '<td>'.$piezas->color.'</td>';
							$html .= '</tr>';
						}
					$html .= '</tbody>';
				$html .= '</table>';
			}

		$html .= '
			</body>
		</html>
		';

		$this->my_mpdf->pdf->WriteHTML($html);
		$this->my_mpdf->pdf->Output('ficha_servicio_'.$id.'.pdf','I');
	}

	public function pdfFicha($id = false, $codigo = false)
	{
		$this->load->library('My_mpdf');


		$data['row_detalle_ficha'] = $this->consultar_model->servicios_tecnicos($id);

		// datos de la sucursal
		/*$id_sucursal = $ticket[0]->fk_id_sucursal;
		$id_usuario = $ticket[0]->fk_id_usuario;
		$fecha_registro = $ticket[0]->fecha_ticket;
		*/


		//header("Content-Type: application/json; charset=UTF-8");
		setlocale(LC_TIME, 'es_MX');

		$header = '';
		$footer = '';

		$this->my_mpdf->pdf->SetHTMLHeader($header);
		$this->my_mpdf->pdf->SetHTMLFooter($footer);
		
		//$html = $this->load->view('backend/pdf_ficha_tecnica',$data,true);    	
   		$html = '';
   		$html .= '<barcode code="978-0-9542246-0" type="ISBN" height="0.66" text="1" />';

		/*$html = '';

		$html .= '<table width="200px">';
			$html .= '<tr>';
				$html .= '<td colspan="2" style="text-align:center; font-size:14px;color: #2980b9">MOVIL EXPERT</td>';
			$html .= '</tr>';
			$html .= '<tr>';
				$html .= '<td style="padding:10px;" colspan="2" >Sucursal:'.$sucursal->nombre.'</td>';
			$html .= '</tr>';
			$html .= '<tr>';
				$html .= '<td colspan="2" style="text-align:center;" >TICKET Nº: '.str_pad($id, 2, "0", STR_PAD_LEFT).'-'.$fecha_registro.'</td>';
			$html .= '</tr>';
			$html .= '<tr>';
				$html .= '<td>Fecha: '.date('d/m/Y', $fecha_registro).'</td>';
				$html .= '<td style="text-align: right">Hora: '.date("H:i:s", $fecha_registro).'</td>';
			$html .= '</tr>';
		$html .= '</table>';

		$html .= '<table width="200px">';
			$html .= '<tr>';
				$html .= '<td style="margin-top: 20px;border-bottom: 1px solid #000; border-top: 1px solid #000">ARTICULO</td>';
				$html .= '<td style="margin-top: 20px;border-bottom: 1px solid #000; border-top: 1px solid #000; text-align: right;">PRECIO.</td>';
				$html .= '<td style="margin-top: 20px;border-bottom: 1px solid #000; border-top: 1px solid #000; text-align: right;">CANT.</td>';
				$html .= '<td style="margin-top: 20px;border-bottom: 1px solid #000; border-top: 1px solid #000; text-align: right;">IMPORTE</td>';
			$html .= '</tr>';

			foreach ($ticket as $value) {
				$total_parcial = $value->precio_venta * $value->piezas;
				$html .= '<tr>';
					$html .= '<td>'.$value->nombre.'</td>';
					$html .= '<td style="text-align:right">$ '.$value->precio_venta.'</td>';
					$html .= '<td style="text-align:right">'.$value->piezas.'</td>';
					$html .= '<td style="text-align:right">$ '.$total_parcial.'</td>';
				$html .= '</tr>';	
			}
			$html .= '<tr>';
				$html .= '<td colspan="3" style="border-top: 1px solid #000; text-align:right">TOTAL:</td>';
				$html .= '<td style="border-top: 1px solid #000; text-align:right">$ '.$ticket[0]->ticket_total.'</td>';
			$html .= '</tr>';

			$html .= '<tr>';
				$html .= '<td>Le ha atendido '.$usuario->nombre.' '.$usuario->ap_paterno.'</td>';
			$html .= '</tr>';

			$html .= '<tr>';
				$html .= '<td colspan="4">Gracias por su compra</td>';
			$html .= '</tr>';

		$html .= '</table>';*/

		//$this->my_mpdf->pdf->SetJs('this.print();');
		$this->my_mpdf->pdf->WriteHTML($html);

		$this->my_mpdf->pdf->Output('ficha_pdf','I');

		//redirect('backend/MOD_INVENTARIO/Inventario/listado', 'refresh');
	}



	public function index2($id)
	{

		/*$ticket = $this->consultar_model->consultarTicket($id);

		// datos de la sucursal
		$id_sucursal = $ticket[0]->fk_id_sucursal;
		$id_usuario = $ticket[0]->fk_id_usuario;
		$fecha_registro = $ticket[0]->fecha_ticket;
		$sucursal = $this->consultar_model->consulta('sucursal', 'id_sucursal', $id_sucursal);
		$usuario = $this->consultar_model->consulta('users', 'id_user', $id_usuario);
*/

		header("Content-Type: application/json; charset=UTF-8");
		setlocale(LC_TIME, 'es_MX');
	    /*
	        ---- ---- ---- ----
	        your code here
	        ---- ---- ---- ----
	    */
		tcpdf();
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('times', '', 8);

		//$pdf->setFontSubsetting(false);

		// añadir pagina
		$pdf->AddPage();
		//$params = $pdf->serializeTCPDFtagParameters(array('0123456789', 'C128C', '', '', '', 18, 0.4, '', 'N'));


		//$html .= '<tcpdf method="write1DBarcode" params="'.$params.'" />';
		/*$html = '';

		$html .= '<table>';
			$html .= '<tr>';
				$html .= '<td colspan="2" style="text-align:center; font-size:14px;color: #2980b9">MOVIL EXPERT</td>';
			$html .= '</tr>';
			$html .= '<tr>';
				$html .= '<td style="padding:10px;" colspan="2" >Sucursal:'.$sucursal->nombre.'</td>';
			$html .= '</tr>';
			$html .= '<tr>';
				$html .= '<td colspan="2" style="text-align:center;" >TICKET Nº: '.str_pad($id, 2, "0", STR_PAD_LEFT).'-'.$fecha_registro.'</td>';
			$html .= '</tr>';
			$html .= '<tr>';
				$html .= '<td>Fecha: '.date('d/m/Y', $fecha_registro).'</td>';
				$html .= '<td style="text-align: right">Hora: '.date("H:i:s", $fecha_registro).'</td>';
			$html .= '</tr>';
		$html .= '</table>';

		$html .= '<table>';
			$html .= '<tr>';
				$html .= '<td style="margin-top: 20px;border-bottom: 1px solid #000; border-top: 1px solid #000">ARTICULO</td>';
				$html .= '<td style="margin-top: 20px;border-bottom: 1px solid #000; border-top: 1px solid #000; text-align: right;">PRECIO.</td>';
				$html .= '<td style="margin-top: 20px;border-bottom: 1px solid #000; border-top: 1px solid #000; text-align: right;">CANT.</td>';
				$html .= '<td style="margin-top: 20px;border-bottom: 1px solid #000; border-top: 1px solid #000; text-align: right;">IMPORTE</td>';
			$html .= '</tr>';

			foreach ($ticket as $value) {
				$total_parcial = $value->precio_venta * $value->piezas;
				$html .= '<tr>';
					$html .= '<td>'.$value->nombre.'</td>';
					$html .= '<td style="text-align:right">$ '.$value->precio_venta.'</td>';
					$html .= '<td style="text-align:right">'.$value->piezas.'</td>';
					$html .= '<td style="text-align:right">$ '.$total_parcial.'</td>';
				$html .= '</tr>';	
			}
			$html .= '<tr>';
				$html .= '<td colspan="3" style="border-top: 1px solid #000; text-align:right">TOTAL:</td>';
				$html .= '<td style="border-top: 1px solid #000; text-align:right">$ '.$ticket[0]->ticket_total.'</td>';
			$html .= '</tr>';

			$html .= '<tr>';
				$html .= '<td>Le ha atendido '.$usuario->nombre.' '.$usuario->ap_paterno.'</td>';
			$html .= '</tr>';

			$html .= '<tr>';
				$html .= '<td colspan="4">Gracias por su compra</td>';
			$html .= '</tr>';

		$html .= '</table>';*/


// Table with rowspans and THEAD
$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2">
<thead>
 <tr style="background-color:#FFFF00;color:#0000FF;">
  <td width="30" align="center"><b>A</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="80" align="center"> <b>XXXX</b></td>
  <td width="80" align="center"><b>XXXX</b></td>
  <td width="45" align="center"><b>XXXX</b></td>
 </tr>
 <tr style="background-color:#FF0000;color:#FFFF00;">
  <td width="30" align="center"><b>B</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="80" align="center"> <b>XXXX</b></td>
  <td width="80" align="center"><b>XXXX</b></td>
  <td width="45" align="center"><b>XXXX</b></td>
 </tr>
</thead>
 <tr>
  <td width="30" align="center">1.</td>
  <td width="140" rowspan="6">XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="140">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center" rowspan="3">2.</td>
  <td width="140" rowspan="3">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="80">XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="80" rowspan="2" >RRRRRR<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center">3.</td>
  <td width="140">XXXX1<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center">4.</td>
  <td width="140">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');


		// output the HTML content
		//$pdf->writeHTML($html, true, 0, true, 0);
		// reset pointer to the last page
		$pdf->lastPage();

		// ---------------------------------------------------------

		//Close and output PDF document
		//$pdf->Output('example_049.pdf', 'I');
		$pdf->Output('ticket_venta'.$id.'.pdf', 'I');

	}

}