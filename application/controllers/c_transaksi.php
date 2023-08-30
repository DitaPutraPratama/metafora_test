<?php
class c_transaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_transaksi');
		$this->load->model('model_barang');
		$this->load->model('model_pelanggan');
		
	}
	public function index()
	{
		$data=[
			'transaksi'=> $this->model_transaksi->get_transaksi()->result(),
			'barang'=> $this->model_barang->get_barang(),
			'pelanggan'=> $this->model_pelanggan->get_pelanggan(),
			
		];

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('v_transaksi', $data);
		$this->load->view('template/footer');
	}
	public function hapus($id)
	{
		$jumTransaksi = $this->db->query("SELECT jumlah,id_barang FROM tb_transaksi WHERE id = '$id' ")->row();

		$barang = $jumTransaksi->id_barang;
		$jumlah = $jumTransaksi->jumlah;

		$sBarang=$this->db->query("SELECT stok FROM tb_barang WHERE id_barang='$barang'")->row();
		// var_dump ($sBarang);
		// return
		
		$newStok=intval($sBarang->stok)+intval($jumlah);
		$data=['stok'=>$newStok];
		
		$this->model_barang->upStok($data,$barang);

		$where = array('id' => $id);
		$this->model_transaksi->hapus_data($where, 'tb_transaksi');
		redirect('c_transaksi/');
	}
	public function edit($id)
	{
		$where=array('id'=>$id);
		$data = [
			'transaksi' => $this->model_transaksi->get_transaksi($where,'tb_transaksi')->result(),
			'barang' => $this->model_barang->get_barang(),
			'pelanggan' => $this->model_pelanggan->get_pelanggan(),
		];
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('v_edit',$data);
		$this->load->view('template/footer');
	}
	public function input_transaksi($id){
		$pelanggan = $this->input->post('pelanggan');
		$barang = $this->input->post('barang');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');
		$subtotal = intval($harga) * intval($jumlah);

		$data = array(
			'id_pelanggan' => $pelanggan,
			'id_barang' => $barang,
			// 'harga'=>$harga,
			'jumlah' => $jumlah,
			'subtotal' => $subtotal,
		);

		$transaksi=$this->db->query("SELECT * FROM tb_transaksi WHERE id='$id'")->result();

		$id_barang_lama=$transaksi->id;
		$jumlah_jual_barang_lama=$transaksi->jumlah;

		$this->db->query("UPDATE tb_barang SET stok=stok+'$jumlah_jual_barang_lama' WHERE id_barang='$id_barang_lama' ");

		$this->db->query("UPDATE tb_barang SET stok=stok-'$jumlah'WHERE id_barang='$barang'");

		$this->model_transaksi->update_transaksi($data, $id);
		redirect("c_transaksi");
	}
	public function tambah_transaksi(){
		$pelanggan = $this->input->post('pelanggan');
		$barang = $this->input->post('barang');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');
		$subtotal = intval($harga)* intval($jumlah);

		$sBarang=$this->db->query("SELECT stok FROM tb_barang WHERE id_barang='$barang'")->row();
		$upStok = intval($sBarang->stok)- intval($jumlah);
		$stokBaru = ['stok'=>$upStok];

		$this->model_barang->upStok($stokBaru,$barang);

		$data = array(
			'id_pelanggan'=>$pelanggan,
			'id_barang'=>$barang,
			// 'harga'=>$harga,
			'jumlah'=>$jumlah,
			'subtotal'=>$subtotal,
		);
		$this->model_transaksi->post_transaksi($data, 'tb_transaksi');
		redirect('c_transaksi');
	}
};
