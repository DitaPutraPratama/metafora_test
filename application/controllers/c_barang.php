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
		if (empty($nama) || empty($harga) || empty($stok)) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Harap isi semua form
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('c_barang/tampil_barang');
		}
		$this->model_barang->input_barang($data, 'tb_barang');
		redirect('c_barang/tampil_barang');
	}
	public function edit($id_barang){
		$where=array('id_barang'=>$id_barang);
		$data['barang']=$this->model_barang->edit_barang($where,'tb_barang')->result();
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('form_edit_barang',$data);
		$this->load->view('template/footer');
	}
	public function update_barang(){
		$id = $this->input->post('id_barang');
		$nama_barang = $this->input->post('nama_barang');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');

		$data = array(
			'nama_barang' => $nama_barang,
			'harga' => $harga,
			'stok' => $stok
		);
		$where = array(
			'id_barang' => $id
		);
		if (empty($nama_barang) || empty($harga) || empty($stok)) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Harap isi semua form
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('c_barang/edit/'.$id);
		}
		$this->model_barang->update_data($where, $data, 'tb_barang');
		redirect('c_barang/tampil_barang');
	}
	public function hapus_barang($id_barang){
		$where=array('id_barang'=>$id_barang);
		$this->model_barang->hapus_data($where, 'tb_barang');
		redirect('c_barang/tampil_barang');
	}
}
;?>
