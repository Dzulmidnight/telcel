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
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'login');
		}
		
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/inicio',$data);
		$this->load->view('backend/template/footer',$data);

	}
}