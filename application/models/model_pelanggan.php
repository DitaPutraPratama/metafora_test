<?php
class Model_pelanggan extends CI_Model
{
	public function get_pelanggan()
	{
		$query = $this->db->get('tb_pelanggan');
		return $query->result();
	}
	public function input_pelanggan($data, $table)
	{
		$this->db->insert($table, $data);
	}
	public function hapus_data_pelanggan($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function edit_pelanggan($table,$where){
		return $this->db->get_where($where,$table);
	}
	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
};
