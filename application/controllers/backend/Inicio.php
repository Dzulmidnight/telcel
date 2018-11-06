<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ESTRUCTURA GENERAL
	- head
	- overlay
	- navbar
	- header
		- contenido variable
	- footer
*/

class Inicio extends CI_Controller{

	public function index()
	{
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/inicio');
		$this->load->view('backend/template/footer');

	}
}