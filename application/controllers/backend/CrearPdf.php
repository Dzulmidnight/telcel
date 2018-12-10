<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrearPdf extends CI_Controller {

	function generarPDF($cantidad = false, $codigo = false){

	    	$this->load->view('backend/pdfcodigos');
			
	}
}