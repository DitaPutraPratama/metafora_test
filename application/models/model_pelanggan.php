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
};
