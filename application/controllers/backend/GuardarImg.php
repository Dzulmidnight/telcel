<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GuardarImg extends CI_Controller {

	function index(){
		$objeto = json_decode($_POST['x']);

		//echo $objeto;

		echo $objeto;
//		$dir = base_url('assets/img/barcode/'); // Full Path
//		$name = 'codigoBarras.png';
//		$otro = base64_decode($url);
//		$encodedData = str_replace(' ','+',$objeto);
 // 		$decocedData = base64_decode($encodedData);


	}
}