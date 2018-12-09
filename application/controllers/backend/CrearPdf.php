<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrearPdf extends CI_Controller {

	function generarPDF($cantidad = false, $codigo = false){

	    	$this->load->library('My_mpdf');
	    	$this->my_mpdf->pdf->showImageErrors = true;


	    	$filename = 'resolucion_proceso_objeciones.PDF';
	    	$html = $this->load->view('backend/pdfcodigos','',true );
			$header = '
			<table width="100%" >
			  <tr>
			    <td class="tg-us36" rowspan="4"></td>
			    <td class="tg-dvpl" style="text-align: right; font-size: .7em">Fmto-RPO-V2. 30-VI-2015</td>
			  </tr>
			  <tr>
			    <td class="tg-us36" style="text-align: right; font-size: .7em"></td>
			  </tr>
			  <tr>
			    <td class="tg-dvpl" style="text-align: right; font-size: .8em"><span style="font-weight:bold;">Resolución del Proceso de Objeciones</span></td>
			  </tr>
			  <tr>
			    <td class="tg-dvpl" style="text-align: right; font-size: .7em"><span style="font-style:italic">Símbolo de Pequeños Productores</span></td>
			  </tr>
			</table>
				';
			$footer = '<table style="width: 100%; text-align: right;">
						<tr>
							<td style="font-weight: bold; font-size:.7em">
								® SPP Global
							</td>
						</tr>
						<tr>
							<td style="font-weight: bold; font-size:.7em">
								DERECHOS RESERVADOS
							</td>
						</tr>
						<tr>
							<td style="font-size:.7em">
								Resolución_Proceso_Objeciones_SPP_V2_30-Jun-2015_AAPOM_2018-01-08
							</td>
						</tr>
					</table>';

			$this->my_mpdf->pdf->SetHTMLHeader($header);
			$this->my_mpdf->pdf->SetHTMLFooter($footer);

			$this->my_mpdf->pdf->WriteHTML($html);

			
			$this->my_mpdf->pdf->Output();
			
	}
}