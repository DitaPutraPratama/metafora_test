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
		$data = [
			'transaksi' => $this->model_transaksi->get_transaksi()->result(),
			'barang' => $this->model_barang->get_barang(),
			'pelanggan' => $this->model_pelanggan->get_pelanggan(),

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

		$sBarang = $this->db->query("SELECT stok FROM tb_barang WHERE id_barang='$barang'")->row();
		// var_dump ($sBarang);
		// return

		$newStok = intval($sBarang->stok) + intval($jumlah);
		$data = ['stok' => $newStok];

		$this->model_barang->upStok($data, $barang);

		$where = array('id' => $id);
		$this->model_transaksi->hapus_data($where, 'tb_transaksi');
		redirect('c_transaksi/');
	}
	public function edit($id)
	{
		// $where=array('id'=>$id);
		$data = [
			'transaksi' => $this->model_transaksi->edit_data($id)->row(),
			'barang' => $this->model_barang->get_barang(),
			'pelanggan' => $this->model_pelanggan->get_pelanggan(),
		];
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('v_edit', $data);
		$this->load->view('template/footer');
	}
	public function input_transaksi()
	{
		$id = $this->input->post('id');
		$pelanggan = $this->input->post('pelanggan');
		$barang = $this->input->post('barang');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');
		$subtotal = intval($harga) * intval($jumlah);

		$data = array(
			'id_pelanggan' => $pelanggan,
			'id_barang' => $barang,
			'harga' => $harga,
			'jumlah' => $jumlah,
			'subtotal' => $subtotal,
		);

		if (empty($pelanggan) || empty($barang) || empty($harga) || empty($jumlah) || empty($subtotal)) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Harap isi semua form
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('c_transaksi/edit/' . $id);
		}

		// var_dump($data);
		// return

		$transaksi = $this->db->query("SELECT * FROM tb_transaksi WHERE id='$id'")->row();

		$id_barang_lama = $transaksi->id;
		$jumlah_jual_barang_lama = $transaksi->jumlah;

		$this->db->query("UPDATE tb_barang SET stok=stok+'$jumlah_jual_barang_lama' WHERE id_barang='$id_barang_lama' ");

		$this->db->query("UPDATE tb_barang SET stok=stok-'$jumlah'WHERE id_barang='$barang'");

		$this->model_transaksi->update_transaksi($data, $id);
		redirect('c_transaksi');
	}
	public function tambah_transaksi()
	{
		$pelanggan = $this->input->post('pelanggan');
		$barang = $this->input->post('barang');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');
		$subtotal = intval($harga) * intval($jumlah);

		$sBarang = $this->db->query("SELECT stok FROM tb_barang WHERE id_barang='$barang'")->row();
		// var_dump($sBarang);
		// die();

		if ($sBarang->stok < $jumlah) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				stok tidak mencukupi
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('c_transaksi');
		}
		$upStok = intval($sBarang->stok) - intval($jumlah);
		$stokBaru = ['stok' => $upStok];

		$this->model_barang->upStok($stokBaru, $barang);

		$data = array(
			'id_pelanggan' => $pelanggan,
			'id_barang' => $barang,
			'harga' => $harga,
			'jumlah' => $jumlah,
			'subtotal' => $subtotal,
		);
		if (empty($pelanggan) || empty($barang) || empty($harga) || empty($jumlah) || empty($subtotal)) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Harap isi semua form
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('c_transaksi');
		}
		$this->model_transaksi->post_transaksi($data, 'tb_transaksi');
		redirect('c_transaksi');
	}
	public function bayar($id)
	{
		$data = [
			'transaksi' => $this->model_transaksi->get_data_bayar($id)->row(),
			'barang' => $this->model_barang->get_barang(),
			'pelanggan' => $this->model_pelanggan->get_pelanggan(),
			'paymen' => $this->model_paymen->get_paymenmethod()->result(),
		];
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('bayar', $data);
		$this->load->view('template/footer');
		// var_dump($data);
		// return;
	}
	public function pembayaran()
	{
		$pelanggan = $this->input->post('pelanggan');
		$email = $this->input->post('email');
		$telp = $this->input->post('telp');
		$barang = $this->input->post('barang');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');
		$metode = $this->input->post('metode');

		// SAMPLE HIT API iPaymu v2 PHP //

		$va           = '0000005156185849'; //get on iPaymu dashboard
		$apiKey       = 'SANDBOX5FBDE5C0-459F-443C-827A-256E1923CD77'; //get on iPaymu dashboard

		$url          = 'https://sandbox.ipaymu.com/api/v2/payment'; // for development mode
		// $url          = 'https://my.ipaymu.com/api/v2/payment'; // for production mode

		$method       = 'POST'; //method

		//Request Body//
		$body['buyerName']=$pelanggan;
		$body['buyerEmail']=$email;
		$body['buyerPhone']=$telp;
		$body['paymentMethod']=$metode;      
		$body['product']    = array($barang);
		$body['qty']        = array($jumlah);
		$body['price']      = array($harga);
		$body['returnUrl']  = base_url('c_transaksi/returnUrl');
		$body['cancelUrl']  = base_url('c_transaksi/cancelUrl');
		$body['notifyUrl']  = base_url('c_transaksi/notifyUrl');
		$body['referenceId'] = '1234'; //your reference id
		//End Request Body//
		// var_dump($body);
		// return

		//Generate Signature
		// *Don't change this
		$jsonBody     = json_encode($body, JSON_UNESCAPED_SLASHES);
		$requestBody  = strtolower(hash('sha256', $jsonBody));
		$stringToSign = strtoupper($method) . ':' . $va . ':' . $requestBody . ':' . $apiKey;
		$signature    = hash_hmac('sha256', $stringToSign, $apiKey);
		$timestamp    = Date('YmdHis');
		//End Generate Signature


		$ch = curl_init($url);

		$headers = array(
			'Accept: application/json',
			'Content-Type: application/json',
			'va: ' . $va,
			'signature: ' . $signature,
			'timestamp: ' . $timestamp
		);

		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		curl_setopt($ch, CURLOPT_POST, count($body));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		$err = curl_error($ch);
		$ret = curl_exec($ch);
		curl_close($ch);

		if ($err) {
			echo $err;
		} else {

			//Response
			$ret = json_decode($ret);
			if ($ret->Status == 200) {
				$sessionId  = $ret->Data->SessionID;
				$url        =  $ret->Data->Url;
				header('Location:' . $url);
			} else {
				echo $ret;
			}
			//End Response
		}
	}
	public function returnUrl(){
		$data=array(
			'return' => $this->input->get('return'),
			'trx_id' => $this->input->get('trx_id'),
			'via' => $this->input->get('via'),
			'channel' => $this->input->get('channel'),
			'status' => $this->input->get('status'),
		);

		// Lakukan logika berdasarkan parameter yang diterima
		if ($data['status'] == 'berhasil') {
			// Transaksi berhasil, lakukan apa yang diperlukan di sini
			// Contoh: Tampilkan halaman "Transaksi Berhasil"
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('returnUrl',$data);
			$this->load->view('template/footer');
		} else {
			// Transaksi gagal, lakukan apa yang diperlukan di sini
			// Contoh: Tampilkan halaman "Transaksi Gagal"
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('cancelUrl',$data);
			$this->load->view('template/footer');
		}
	}
	public function cancelUrl(){
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('cancelUrl');
		$this->load->view('template/footer');
	}
	public function notifyUrl(){
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('notifyUrl');
		$this->load->view('template/footer');
	}
};
