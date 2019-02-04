<?php
class Excel_import extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('add_model');
		$this->load->model('count_model');
		$this->load->model('consultar_model');			
		$this->load->model('update_model');
		$this->load->model('excel_import_model');
		$this->load->library('excel');
	}
	function index()
	{
		$this->load->view('excel_import');
	}

	function fetch()
	{
		$data = $this->excel_import_model->select();
		$output = '
			<h3>Total: '.$data->num_rows().'</h3>
			<table>
				<thead>
					<tr>
						<th>Customer name</th>
						<th>Address</th>
						<th>City</th>
						<th>Postal code</th>
						<th>Country</th>
					</tr>
				</thead>
				<tbody>
				';
				foreach ($$data->result() as $row) {
					$output .= '
						<tr>
							<td>'.$row->CustomerName.'</td>
							<td>'.$row->Address.'</td>
							<td>'.$row->City.'</td>
							<td>'.$row->PostalCode.'</td>
							<td>'.$row->Country.'</td>
						</tr>
					';
				}
		$output .='</tbody>
			</table>
		';

		echo $output;
	} 

	function import()
	{
		if(isset($_FILES["archivo_datos"]["name"]))
		{
			$path = $_FILES["archivo_datos"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{	
					$categoria_producto = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$marca = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$piezas = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$nombre = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$modelo = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$color = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$capacidad = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$precio_interno = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$precio_publico = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$fecha_registro = time();
					
					/*$data[] = array(
						'marca' => $marca,
						'piezas' => $piezas,
						'nombre' => $nombre,
						'modelo' => $modelo,
						'color' => $color,
						'capacidad' => $capacidad,
						'precio_interno' => $precio_interno,
						'precio_publico' => $precio_publico,
						'fecha_registro' => $fecha_registro
					);*/
					$fk_id_categoria_producto = '';
					switch ($categoria_producto) {
						case 'ACCESORIO':
							$fk_id_categoria_producto = 1;
							break;
						case 'TELEFONO':
							$fk_id_categoria_producto = 2;
							break;
						case 'REPARACION':
							$fk_id_categoria_producto = 3;
							break;
						default:
							$fk_id_categoria_producto = 1;
							break;
					}

					$data = array(
						'fk_id_categoria_producto' => $fk_id_categoria_producto,
						'marca' => $marca,
						'piezas' => $piezas,
						'nombre' => $nombre,
						'modelo' => $modelo,
						'color' => $color,
						'capacidad' => $capacidad,
						'precio_interno' => $precio_interno,
						'precio_publico' => $precio_publico,
						'fecha_registro' => $fecha_registro
					);
					$this->excel_import_model->insert($data);

					$id_producto = $this->db->insert_id();

					$codigo_barras = time().str_pad($id_producto, 3, "0", STR_PAD_LEFT);
					$data_codigo = array(
						'codigo_barras' => $codigo_barras
					);
					$this->update_model->update('producto', 'id_producto', $id_producto, $data_codigo);

					// AGREGAR PRODUCTO_ENTRADA
					$data_producto_entrada = array(
						'piezas' => $piezas,
						'fk_id_producto' => $id_producto,
						'precio_unitario' => $precio_interno,
						'fecha_registro' => $fecha_registro
					);
					$this->add_model->agregar($data_producto_entrada, 'producto_entrada');


					/// AGREGAR HISTORIA_INVENTARIO
					$data_historial_inventario = array(
						'fk_id_producto' => $id_producto,
						'producto_entrada' => $piezas,
						'fecha_registro' => time()
					);
					$this->add_model->agregar($data_historial_inventario, 'historial_inventario');

			 		// AGREGAR SUCURSAL_PRODUCTO
			 			$array_suc_producto = array(
			 				'fk_id_sucursal' => $this->input->post('fk_id_sucursal_excel'),
			 				'fk_id_producto' => $id_producto,
			 				'piezas' => $piezas,
			 				'fecha_registro' => $fecha_registro
			 			);
			 			$this->add_model->agregar($array_suc_producto, 'sucursal_producto');
			 		// END SUCURSAL_PRODUCTO


					/*$customer_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$address = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$city = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$postal_code = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$country = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$data[] = array(
						'CustomerName'  => $customer_name,
						'Address'   => $address,
						'City'    => $city,
						'PostalCode'  => $postal_code,
						'Country'   => $country
					);*/
				}
			}
			//$this->excel_import_model->insert($data);
			
			redirect('backend/MOD_INVENTARIO/Inventario/listado', 'refresh');
		} 
	}
}