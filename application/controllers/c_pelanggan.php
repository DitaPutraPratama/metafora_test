<?php
class C_pelanggan extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_pelanggan');
	}
	public function tampil_pelanggan()
	{
		$data['pelanggan'] = $this->model_pelanggan->get_pelanggan();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('v_pelanggan', $data);
		$this->load->view('template/footer');
	}
	public function tambah_pelanggan()
	{
		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$data = array('nama_pelanggan' => $nama_pelanggan);
		$this->model_pelanggan->input_pelanggan($data, 'tb_pelanggan');
		redirect('c_pelanggan/tampil_pelanggan');
	}
}
;?>
