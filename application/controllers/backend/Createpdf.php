<?php
class Createpdf extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('pdf_helper');
	}

	public function index($numero = false, $codigo = false)
	{
		header("Content-Type: application/json; charset=UTF-8");
	    /*
	        ---- ---- ---- ----
	        your code here
	        ---- ---- ---- ----
	    */
		tcpdf();
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, [60, 297], true, 'UTF-8', false);

		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('times', 'BI', 20);

		//$pdf->setFontSubsetting(false);

		// añadir pagina
		$pdf->AddPage();
		//$params = $pdf->serializeTCPDFtagParameters(array('0123456789', 'C128C', '', '', '', 18, 0.4, '', 'N'));


		$params = $pdf->serializeTCPDFtagParameters(array($codigo, 'C128', '', '', 40, 20, 0.4, array('position'=>'S', 'border'=>true, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));

		//$html .= '<tcpdf method="write1DBarcode" params="'.$params.'" />';
		$html = '';
		$html .= '<table>';
			for ($i=0; $i < $numero; $i++) { 
				$html .= '<tr>';
					$html .= '<td><tcpdf method="write1DBarcode" params="'.$params.'" /></td>';
				$html .= '</tr>';
			}
		$html .= '</table>';


		// output the HTML content
		$pdf->writeHTML($html, true, 0, true, 0);
		// reset pointer to the last page
		$pdf->lastPage();

		// ---------------------------------------------------------

		//Close and output PDF document
		$pdf->Output('codigo_de_barras.pdf', 'I');

	}

}