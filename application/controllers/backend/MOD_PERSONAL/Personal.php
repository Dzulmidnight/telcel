<?php
class Personal extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('add_model');
		$this->load->model('count_model');
		$this->load->model('consultar_model');
	}

	public function index()
	{

		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$data['num_resultados'] = $this->count_model->count('usuarios');
		$data['row_usuarios'] = $this->consultar_model->listado('usuarios');


		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_PERSONAL/dashboard_personal', $data);
		$this->load->view('backend/template/footer');	
	}

	public function listado()
	{
		$data['menu_general'] = $this->load->view('backend/menu_general','',true);
		$this->load->view('backend/template/head');
		$this->load->view('backend/template/overlay');
		$this->load->view('backend/template/navbar');
		$this->load->view('backend/template/header');
			$this->load->view('backend/MOD_PERSONAL/listado_sucursales', $data);
		$this->load->view('backend/template/footer');
	}

	/*public function agregar(){
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'ap_paterno' => $this->input->post('ap_paterno'),
			'ap_materno' => $this->input->post('ap_materno'),
			'telefono' => $this->input->post('telefono'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'fecha_registro' => $this->input->post('fecha_registro'),
			'id_sucursal' => $this->input->post('id_sucursal')
		);
		// agregar nuevo usuario
		$this->add_model->insertar($data, 'usuarios');

		redirect(base_url('backend/MOD_PERSONAL/personal'), "refresh");
	}*/
	public function listar($tabla = false, $id = false)
	{
		header("Content-Type: application/json; charset=UTF-8");
		//$objeto = json_decode($_POST["x"], false);

		//echo json_encode($this->consultar_model->listado('usuarios'));
		//$data['row_usuarios'] = $this->consultar_model->listado($tabla, $id);
		echo json_encode($data['row_usuarios'] = $this->consultar_model->listado($tabla, $id));
		//echo json_encode($row_usuarios);

	}

	public function agregar()
	{
		header("Content-Type: application/json; charset=UTF-8");

		$objeto = json_decode($_POST["x"], false);

		foreach ($objeto as $value) {
			//explode nos crea el array del nombre y valor y lo asigno a las variables de list $nombre, $valor
			list($nombre, $valor) = explode(" : ", $value);
			$data[$nombre] = $valor;
		}

		$this->add_model->insertar($data, 'usuarios');

	}

	public function actualizar()
	{
		header("Content-Type: application/json; charset=UTF-8");

		$id = '';
		$objeto = json_decode($_POST["x"], false);

		foreach ($objeto as $value) {
			list($nombre, $valor) = explode(" : ", $value);
			$data[$nombre] = $valor;
			if($nombre == 'id_usuario'){
				$id = $valor;
			}
		}

		if($this->add_model->actualizar($data, 'usuarios', $id)){
			echo json_encode($data['row_usuarios'] = $this->consultar_model->listado('usuarios'));
		}else{
			echo 0;
		}

	}

	public function eliminar($id)
	{
		$this->load->model('eliminar_model');
		$this->eliminar_model->eliminar('usuarios', 'id_usuario', $id);

		redirect('backend/MOD_PERSONAL/personal', 'refresh');
	}

}