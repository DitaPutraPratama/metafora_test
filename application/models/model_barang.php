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
	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function edit_barang($table, $where)
	{
		return $this->db->get_where($where, $table);
	}
	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}
