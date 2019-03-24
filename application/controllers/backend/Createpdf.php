<?php
class Createpdf extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('pdf_helper');
		$this->load->model('consultar_model');
	}

	public function index($numero = false, $codigo = false, $tipo = false)
	{
		$nombre = '';
		if($tipo == 'refaccion'){
			$detalle_producto = $this->consultar_model->consultaSimple($codigo, 'codigo_barras', 'catalogo_piezas_reparacion');
			$nombre = $detalle_producto->nombre_pieza;
		}else{
			$detalle_producto = $this->consultar_model->consultaSimple($codigo, 'codigo_barras', 'producto');
			$nombre = $detalle_producto->nombre;
		}

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


		$params = $pdf->serializeTCPDFtagParameters(array($codigo, 'C128', '', '', 40, 20, 0.4, array('position'=>'S', 'border'=>false, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));

		//$html .= '<tcpdf method="write1DBarcode" params="'.$params.'" />';
		$html = '';
		$html .= '<table>';
			for ($i=0; $i < $numero; $i++) {
				$html .= '<tr>';
					$html .= '<td style="font-family:helvetica; padding:0px;margin:0px;font-size:8px;text-align:center;">'.$nombre.' "'.$detalle_producto->modelo.'"</td>';
				$html .= '</tr>';
				$html .= '<tr >';
					$html .= '<td style="padding:0px;margin:0px;"><tcpdf method="write1DBarcode" params="'.$params.'" /></td>';
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


	public function ficha_servicio($id, $cotizacion)
	{
		$data['row_detalle_ficha'] = $this->consultar_model->servicios_tecnicos($id);
		$codigo = $data['row_detalle_ficha']->codigo_barras;
		$nombre = $data['row_detalle_ficha']->nombre_cliente.' '.$data['row_detalle_ficha']->ap_paterno.' '.$data['row_detalle_ficha']->ap_materno;
		$nombre_sucursal = $data['row_detalle_ficha']->nombre_sucursal;
		$telefono_cliente = $data['row_detalle_ficha']->telefono_cliente;

		$informacion_cliente = '';

		$informacion_cliente .= $nombre;
		$informacion_cliente .= '<br>';
		$informacion_cliente .= 'Suc: '.$nombre_sucursal;
		$informacion_cliente .= '<br>';
		$informacion_cliente .= 'Tel: '.$telefono_cliente;
		$informacion_extra = $data['row_detalle_ficha']->informacion_extra_cliente;
		
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


		header("Content-Type: application/json; charset=UTF-8");
	    /*
	        ---- ---- ---- ----
	        your code here
	        ---- ---- ---- ----
	    */
		tcpdf();
		// create new PDF document
		//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, [210, 297], true, 'UTF-8', false);
		$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('Helvetica', '', 12);

		//$pdf->setFontSubsetting(false);

		// añadir pagina
		$pdf->AddPage();
		//$params = $pdf->serializeTCPDFtagParameters(array('0123456789', 'C128C', '', '', '', 18, 0.4, '', 'N'));
		$params = $pdf->serializeTCPDFtagParameters(array($codigo, 'C128', '', '', 40, 20, 0.4, array('position'=>'S', 'border'=>false, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));

		$html = '';
		$html .= '<table style="margin:0px;padding:0px;">';
			$html .= '<tr style="text-align:center;padding:20px;margin:20px">';
				$html .= '<td colspan="3" cellspacing="10" style="padding:20px;margin:20px"><h2 style="padding:40px;">FICHA DE SERVICIO</h2></td>';
			$html .= '</tr>';

			/// INICIA INFORMACION CLIENTE
			$html .= '<tr>';
				$html .= '<td>';
					$html .= '<h4>Cliente</h4>';
					$html .= $informacion_cliente;
				$html .= '</td>';
				$html .= '<td>';
					$html .= '<h4>Detalles</h4>';
					$html .= $informacion_extra;
				$html .= '</td>';
				$html .= '<td><tcpdf method="write1DBarcode" params="'.$params.'" /></td>';
			$html .= '</tr>';
			/// END INFORMACION CLIENTE

			// FALLA REPORTADA
			$html .= '<tr>';
				$html .= '<td colspan="3">';
					$html .= '<h4>Falla Reportada</h4>';
					$html .= $falla_reportada;
				$html .= '</td>';
			$html .= '</tr>';
			// END FALLA REPORTADA

		$html .= '</table>';

		$html .= '<table>';
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
					$html .= '<td colspan="2">Depósito en garantía</td>';
					$html .= '<td>'.$deposito_garantia.'</td>';
				$html .= '</tr>';
				// saldo restante
				$html .= '<tr>';
					$html .= '<td colspan="2">Restante</td>';
					$html .= '<td>'.$saldo_restante.'</td>';
				$html .= '</tr>';
				// total
				$html .= '<tr>';
					$html .= '<td colspan="2">Total</td>';
					$html .= '<td>'.$total.'</td>';
				$html .= '</tr>';

			$html .= '</tbody>';
		$html .= '</table>';

		/// LISTADO DE PIEZAS UTILIZADAS

		$html .= '<table>';
			$html .= '<thead>';
				$html .= '<tr>';
					$html .= '<th colspan="3"><h2>Piezas utilizadas</h2></th>';
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
/*


		//$html .= '<tcpdf method="write1DBarcode" params="'.$params.'" />';
		$html = '';
		$html .= '<table>';
			for ($i=0; $i < $numero; $i++) {
				$html .= '<tr>';
					$html .= '<td style="font-family:helvetica; padding:0px;margin:0px;font-size:8px;text-align:center;">'.$nombre.' "'.$detalle_producto->modelo.'"</td>';
				$html .= '</tr>';
				$html .= '<tr >';
					$html .= '<td style="padding:0px;margin:0px;"><tcpdf method="write1DBarcode" params="'.$params.'" /></td>';
				$html .= '</tr>';
			}
		$html .= '</table>';*/


		// output the HTML content
		$pdf->writeHTML($html, true, 0, true, 0);
		// reset pointer to the last page
		$pdf->lastPage();

		// ---------------------------------------------------------

		//Close and output PDF document
		$pdf->Output('codigo_de_barras.pdf', 'I');

	}


}