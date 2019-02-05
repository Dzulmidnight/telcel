<?php
class PdfTicket extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('pdf_helper');
		$this->load->model('count_model');
		$this->load->model('consultar_model');
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

		$this->my_mpdf->pdf2->Output('ticket_'.$id.'.pdf','I');

		//redirect('backend/MOD_INVENTARIO/Inventario/listado', 'refresh');


	}


	public function pdfFicha($id, $codigo)
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
		
		$html = $this->load->view('backend/pdf_ficha_tecnica',$data,true);    	
   	

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

		$this->my_mpdf->pdf->Output('ficha'.$id.'.pdf','D');

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