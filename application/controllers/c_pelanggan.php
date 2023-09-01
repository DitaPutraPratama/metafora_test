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
		if ($nama_pelanggan=="") {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Harap isi semua form
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('c_pelanggan/tampil_pelanggan');
		}
		$this->model_pelanggan->input_pelanggan($data, 'tb_pelanggan');
		redirect('c_pelanggan/tampil_pelanggan');
	}
	public function hapus_pelanggan($id)  {
		$where = array('id' => $id);
		$this->model_pelanggan->hapus_data_pelanggan($where, 'tb_pelanggan');
		redirect('c_pelanggan/tampil_pelanggan');
	}
	public function edit($id){
		$where = array('id' => $id);
		$data['pelanggan'] = $this->model_pelanggan->edit_pelanggan($where, 'tb_pelanggan')->result();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('form_edit_pelanggan', $data);
		$this->load->view('template/footer');
	}
	public function update_pelanggan(){
		$id = $this->input->post('id');
		$nama_pelanggan = $this->input->post('nama_pelanggan');

		$data = array(
			'nama_pelanggan' => $nama_pelanggan,
		);
		$where = array(
			'id' => $id
		);
		if ($nama_pelanggan=="") {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Harap isi semua form
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('c_pelanggan/edit/'.$id);
		}
		$this->model_pelanggan->update_data($where, $data, 'tb_pelanggan');
		redirect('c_pelanggan/tampil_pelanggan');
	}
}
;?>
