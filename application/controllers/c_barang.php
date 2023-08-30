<?php 
class C_barang extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_barang');
	}
	public function tampil_barang()
	{
		$data['barang'] = $this->model_barang->get_barang();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('v_barang', $data);
		$this->load->view('template/footer');
	}
	public function tambah_barang()
	{
		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$data = array(
			'nama_barang' => $nama,
			'harga' => $harga,
			'stok' => $stok,
		);
		$this->model_barang->input_barang($data, 'tb_barang');
		redirect('c_barang/tampil_barang');
	}
}
;?>
