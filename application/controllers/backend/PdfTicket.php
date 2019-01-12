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
		
		$producto = $this->consultar_model->producto($value->id_producto_carrito);

		header("Content-Type: application/json; charset=UTF-8");
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
		$pdf->SetFont('times', 'BI', 20);

		//$pdf->setFontSubsetting(false);

		// añadir pagina
		$pdf->AddPage();
		//$params = $pdf->serializeTCPDFtagParameters(array('0123456789', 'C128C', '', '', '', 18, 0.4, '', 'N'));


		//$html .= '<tcpdf method="write1DBarcode" params="'.$params.'" />';
		$html = 'Esta es una prueba';


		// output the HTML content
		$pdf->writeHTML($html, true, 0, true, 0);
		// reset pointer to the last page
		$pdf->lastPage();

		// ---------------------------------------------------------

		//Close and output PDF document
		//$pdf->Output('example_049.pdf', 'I');
		$pdf->Output('ticket.pdf', 'D');

	}

}