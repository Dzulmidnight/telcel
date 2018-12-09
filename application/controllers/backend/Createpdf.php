<?php
class Createpdf extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('pdf_helper');
	}

	public function index($numero = false)
	{
		header("Content-Type: application/json; charset=UTF-8");

	    echo 'el numero que enviaron es:'.$numero;
	    /*
	        ---- ---- ---- ----
	        your code here
	        ---- ---- ---- ----
	    */


		tcpdf();
		$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		$title = "Lista de codigos";
		$pdf->SetTitle($title);

		// default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);

		// header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// fuente monospaced
		$pdf->SetDefaultMonospacedFont('helvetica');

		// asignamos margenes
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

		// saltos de pagina
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// fuente y tamaño
		$pdf->SetFont('helvetica', '', 9);

		//$pdf->setFontSubsetting(false);

		// añadir pagina
		$pdf->AddPage();

		$html = $this->load->view('backend/pdfreport');




		// output the HTML content
		$pdf->writeHTML($html, true, 0, true, 0);
		// reset pointer to the last page
		$pdf->lastPage();

		// ---------------------------------------------------------

		//Close and output PDF document
		$pdf->Output('example_049.pdf', 'I');


	}



}