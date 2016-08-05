<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends MX_Controller {

	public function __construct(){
		$this->load->helper('url');
		$this->load->model('inventario_model');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		$data['tiendas']=$this->inventario_model->getTiendas();
		$this->load->view('inventario_view',$data);

	}
	public function list(){
		@$name=$this->input->post('name');
		@$idTienda=$this->input->post('idTienda');
		$where=[];
		if (isset($name) and $name !='') {
			$where['name']=$name;
		}
		if (isset($idTienda) and !is_null($idTienda)){
			$where['idTienda']=$idTienda;

		}
		$rs=$this->inventario_model->list($where);
		#echo $this->db->last_query();die;
		foreach ($rs as $row) {
			$rows[] = $row;
		}
		$jTableResult = [];
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
		echo json_encode($jTableResult);
	}
	public function tiendas(){
		$rs=$this->inventario_model->getTiendas();
		$tiendas=[];
		foreach ($rs as $row) {
			
			$tienda=[];
			$tienda['DisplayText']=$row->razon_social;
			$tienda['Value']=$row->idTiendas;
			$tiendas[]=$tienda;
		}


		
		$arrayInicial['Result']='OK';
		$arrayInicial['Options'] = $tiendas;
		echo json_encode($arrayInicial);

	}
	public function create(){
		$cantidad=$this->input->post('cantidad');
		$preciounitario=$this->input->post('preciounitario');
		$idTienda=$this->input->post('idTiendas');
		$producto=$this->input->post('producto');
		$idInventarioGeneral=$this->inventario_model->saveProduct($producto,$preciounitario,$cantidad,$idTienda);
		$where=['idInventarioGeneral'=>$idInventarioGeneral];
		$rs=$this->inventario_model->list($where);
		foreach ($rs as $row) {
			$rows[] = $row;
		}
		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $rows;
		print json_encode($jTableResult);
	}
	public function delete()
	{
		$idInventarioGeneral=$this->input->post('idInventarioGeneral');

		$this->inventario_model->deleteInventario($idInventarioGeneral);
		#echo $this->last_query();die;
		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	public function update(){
		$idInventarioGeneral=$this->input->post('idInventarioGeneral');
		$cantidad=$this->input->post('cantidad');
		$preciounitario=$this->input->post('preciounitario');
		$idTienda=$this->input->post('idTiendas');
		$producto=$this->input->post('producto');
		$this->inventario_model->updateProduct($idInventarioGeneral,$producto,$preciounitario,$cantidad,$idTienda);
		$where=['idInventarioGeneral'=>$idInventarioGeneral];
		$rs=$this->inventario_model->list($where);
		foreach ($rs as $row) {
			$rows[] = $row;
		}
		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $rows;
		print json_encode($jTableResult);
	}
}
