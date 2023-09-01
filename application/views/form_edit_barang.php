<div class="container-fluid">
	<h3>Edit data Barang</h3>
	<?php echo $this->session->flashdata('pesan'); ?>
	<?php foreach ($barang as $brg) :; ?>
		<form method="post" action="<?php echo base_url() . 'c_barang/update_barang' ?>">
			<div class="form-group">
				<input type="hidden" name="id_barang" class="form-control" value="<?php echo $brg->id_barang ?>">
				<label for="">Nama Barang</label>
				<input type="text" name="nama_barang" class="form-control" value="<?php echo $brg->nama_barang ?>">
				<label for="">Harga</label>
				<input type="text" name="harga" class="form-control" value="<?php echo $brg->harga ?>">
				<label for="">Stok</label>
				<input type="text" name="stok" class="form-control" value="<?php echo $brg->stok ?>">
			</div>
			<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
			<a href="<?php echo base_url('c_barang'); ?>" class="btn btn-warning btn-sm">Kembali</a>
		</form>
	<?php endforeach; ?>
</div>
