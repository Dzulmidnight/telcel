<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'/third_party/mpdf/mpdf.php');

class my_mpdf{


	public $param;
	public $pdf;
	// $mpdf=new mPDF('c','A4','','',32,25,47,47,10,10); 

  public function __construct($param = "'c', 'A4-L',32,25,47,47,10,10")
	{
	    $this->param =$param;
	    $this->pdf = new mPDF($this->param);
	}
}