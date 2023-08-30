<?php
class Model_barang extends CI_Model
{
	
	public function get_barang(){
		$query=$this->db->get('tb_barang');
		return $query->result();
	}
	
	public function input_barang($data,$table)  {
		$this->db->insert($table, $data);
	}
	public function upStok($data, $barang) {
		$this->db->set($data);
		$this->db->where('id_barang', $barang);
		$this->db->update("tb_barang", $data);
	}
}
