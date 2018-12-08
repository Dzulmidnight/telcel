<?php

class Createpdf extends CI_Controller{

	public function index()
	{
	    $this->load->helper('pdf_helper');
	    /*
	        ---- ---- ---- ----
	        your code here
	        ---- ---- ---- ----
	    */
	    $this->load->view('backend/pdfreport');
	}



}