<?php
class Inventario_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }
    function list($where=[]){
    	    $this->db->select("
                            t.idTiendas,
                            t.razon_social,
                            t.telefono,
                            i.idInventarioGeneral,
                            i.producto,
                            i.preciounitario,
                            ti.cantidad
                            ")
         
          ->from('Tiendas as t')
         
          ->join('TiendaInventario as ti', 'ti.idTiendas=t.idTiendas')
          
          ->join('InventarioGeneral as i', 'i.idInventarioGeneral=ti.idInventarioGeneral');
          if(isset($where['idTienda']) and $where['idTienda']>0){
            	$this->db->where('t.idTiendas', $where['idTienda']);
           }
         /*  if(isset($where['idInventarioGeneral']) and $where['idInventarioGeneral']>0){
            	$this->db->where('i.idInventarioGeneral', $where['idInventarioGeneral']);
           }*/
           if(isset($where['name'])){
				$this->db->like('i.producto', $where['name']);
		   }
          $query = $this->db->get();
           return $query->result();
    }
    public function getTiendas(){
    	$query=$this->db->get('Tiendas');
    	return $query->result();
    }
    public function saveProduct($producto,$preciounitario,$cantidad,$idTienda){
    	$data['producto']=$producto;
    	$data['preciounitario']=$preciounitario;
    	$this->db->insert('InventarioGeneral', $data);
    	$idInventarioGeneral=$this->db->insert_id();

    	$data2['cantidad']=$cantidad;
    	$data2['idTiendas']=$idTienda;
    	$data2['idInventarioGeneral']=$idInventarioGeneral;
    	$this->db->insert('TiendaInventario', $data2);

    	return $idInventarioGeneral;
    	
    }
    public function deleteInventario($idInventarioGeneral)
    {
    	/*$tables = array('TiendaInventario', 'InventarioGeneral');
		$this->db->where('idInventarioGeneral', $idInventarioGeneral);
		$this->db->delete($tables);*/


		$this->db->where('idInventarioGeneral', $idInventarioGeneral);
		$this->db->delete('TiendaInventario');

		$this->db->where('idInventarioGeneral', $idInventarioGeneral);
		$this->db->delete('InventarioGeneral');
		

    }
    public function updateProduct($idInventarioGeneral,$producto,$preciounitario,$cantidad,$idTienda)
    {
    	$data['producto']=$producto;
    	$data['preciounitario']=$preciounitario;
    	$this->db->where('idInventarioGeneral', $idInventarioGeneral);
    	$this->db->update('InventarioGeneral', $data);
    	

    	$data2['cantidad']=$cantidad;
    	$data2['idTiendas']=$idTienda;
    	$data2['idInventarioGeneral']=$idInventarioGeneral;
    	$this->db->where('idInventarioGeneral', $idInventarioGeneral);
    	$this->db->where('idTiendas', $idTienda);
    	$this->db->update('TiendaInventario', $data2);

    	
    }
}