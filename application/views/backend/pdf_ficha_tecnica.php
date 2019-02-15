<?php
$this->load->helper('pdf_helper');
$codigo_barras = $row_servicios->codigo_barras;
    tcpdf();
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set header and footer fonts

    // set default monospaced font

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    // ---------------------------------------------------------
    $pdf->SetFont('helvetica', '', 11);

    //$pdf->setFontSubsetting(false);

    // añadir pagina
    $pdf->AddPage();
    //$params = $pdf->serializeTCPDFtagParameters(array('0123456789', 'C128C', '', '', '', 18, 0.4, '', 'N'));


    $params = $pdf->serializeTCPDFtagParameters(array($codigo_barras, 'C128', '', '', 40, 20, 0.4, array('position'=>'S', 'border'=>true, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));

    //$html = '<tcpdf method="write1DBarcode" params="'.$params.'" />';
    $html = '';
    $html .= '
        <table style="padding-bottom:50px;">
            <tr>
                <td colspan="2" style="font-size:15px;text-align:center;">
                    <p>
                        <b>
                            Movil Expert
                        </b>
                    </p>
                    <p>
                        Ficha de Servicio Tecnico
                    </p>
                </td>
                <td>
                    <tcpdf method="write1DBarcode" params="'.$params.'" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>
                        <b>Estatus:</b> '.$row_servicios->estatus.'
                    </p>

                    <p>
                        <b>Cliente:</b> '.$row_servicios->nombre_cliente.' '.$row_servicios->ap_paterno.' '.$row_servicios->ap_materno.'
                    </p>
                    
                    <p>
                        <b>Número:</b> '.$row_servicios->telefono_cliente.'
                    </p>

                    <p>
                        <b>Marca y Modelo:</b> '.$row_servicios->marca_telefono.' '.$row_servicios->modelo_telefono.'
                    </p>
                    
                    <p>
                        <b>IMEI:</b> '.$row_servicios->imei.'
                    </p>
                </td>

                <td>
                    <p>
                        <b>Fecha de ingreso:</b> '.date('d/m/Y', $row_servicios->fecha_registro).'
                    </p>
                    
                    <p>
                        <b>Fecha de entrega:</b> '.date('d/m/Y', $row_servicios->fecha_entrega).'
                    </p>
                    
                    <p>
                        <b>Estado fisico del equipo:</b> '.$row_servicios->estado_fisico.'
                    </p>
                </td>
            </tr>
        </table>
        <table style="padding-top:20px;">
            <tr>
                <td>
                    <b>Falla reportada por el usuario:</b> '.$row_servicios->falla_reportada.'
                </td>
            </tr>
            <tr>
                <td>
                    <b>Diagnóstico del Servicio Técnico:</b> '.$row_servicios->descripcion_servicio.'
                </td>
            </tr>
            <tr>
                <td>
                    <b>Reparación efectuada:</b> '.$row_servicios->descripcion_resultado.'
                </td>
            </tr>
            <tr>
                <td>
                    <b>Comentario Servicio Técnico:</b> '.$row_servicios->comentarios_tecnico.'
                </td>
            </tr>
            <tr>
                <td>
                    <b>FIRMA CLIENTE</b>
                </td>
            </tr>

        </table>

    ';
    /*$html = '';
    $html .= '<table>';
        for ($i=0; $i < $numero; $i++) { 
            $html .= '<tr>';
                $html .= '<td><tcpdf method="write1DBarcode" params="'.$params.'" /></td>';
            $html .= '</tr>';
        }
    $html .= '</table>';*/

    // output the HTML content
    $pdf->writeHTML($html, true, 0, true, 0);
    // reset pointer to the last page
    $pdf->lastPage();
    // ---------------------------------------------------------

    //Close and output PDF document
    $pdf->Output('servicio_tecnico_'.$codigo_barras.'.pdf', 'I');