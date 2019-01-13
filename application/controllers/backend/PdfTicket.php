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
		
		$ticket = $this->consultar_model->consultarTicket($id);

		// datos de la sucursal
		$id_sucursal = $ticket[0]->fk_id_sucursal;
		$id_usuario = $ticket[0]->fk_id_usuario;
		$fecha_registro = $ticket[0]->fecha_ticket;
		$sucursal = $this->consultar_model->consulta('sucursal', 'id_sucursal', $id_sucursal);
		$usuario = $this->consultar_model->consulta('users', 'id_user', $id_usuario);

		//echo $ticket[0]->fk_id_sucursal;
		/*foreach ($ticket as $value) {
			echo '<p>'.$value->id_producto.'</p>';
			echo '<p>'.$value->piezas.'</p>';
			echo '<p>'.$value->precio_venta.'</p>';
			echo '<p>'.$value->fk_id_sucursal.'</p>';
			echo '<p>'.$value->nombre.'</p>';
		}*/


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
		$html = '';

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

		$html .= '</table>';

		// output the HTML content
		$pdf->writeHTML($html, true, 0, true, 0);
		// reset pointer to the last page
		$pdf->lastPage();

		// ---------------------------------------------------------

		//Close and output PDF document
		//$pdf->Output('example_049.pdf', 'I');
		$pdf->Output('ticket_venta'.$id.'.pdf', 'I');

	}

}