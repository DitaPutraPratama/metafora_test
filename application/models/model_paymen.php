<?php 
class Model_paymen extends CI_Model{
	public function get_paymenmethod(){
		$query = $this->db->get('tb_pyMethod');
		return $query;
	}
}
;?>
