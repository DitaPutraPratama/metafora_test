<?php 
class Model_transaksi extends CI_Model{
	public function get_transaksi()
	{
		$this->db->select('tb_transaksi.*,tb_barang.nama_barang,tb_pelanggan.nama_pelanggan');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_barang','tb_barang.id_barang=tb_transaksi.id_barang','left');
		$this->db->join('tb_pelanggan','tb_pelanggan.id=tb_transaksi.id_pelanggan');
		$query = $this->db->get();
		return $query;
	}
	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function update_transaksi($data,$id){
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('tb_transaksi',$data);
	}
	public function post_transaksi ($data,$table){
		$this->db->insert($table, $data);
	}
	public function edit_data($id){
		$this->db->select('tb_transaksi.*, tb_barang.nama_barang, tb_pelanggan.nama_pelanggan');
		$this->db->from('tb_transaksi');
		$this->db->where('tb_transaksi.id =' . $id);
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_transaksi.id_barang', 'left');
		$this->db->join('tb_pelanggan', 'tb_pelanggan.id = tb_transaksi.id_pelanggan');
		$query = $this->db->get();
		return $query;
	}
}
;?>
