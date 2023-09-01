<div class="container-fluid">
	<h3>Edit Data Pelanggan</h3>
	<?php echo $this->session->flashdata('pesan'); ?>
	<?php foreach ($pelanggan as $plg) :; ?>
		<form method="post" action="<?php echo base_url() . 'c_pelanggan/update_pelanggan' ?>">
			<input type="hidden" name="id" class="form-control" value="<?php echo $plg->id ?>">
			<div class="form-group">
				<label for="">nama</label>
				<input type="text" name="nama_pelanggan" class="form-control" value="<?php echo $plg->nama_pelanggan ?>">
			</div>
			<button type="submit" class="btn btn-primary btn-sm">simpan</button>
			<a href="<?php echo base_url('c_pelanggan/tampil_data'); ?>" class="btn btn-warning btn-sm ">Kembali</a>
		</form>
	<?php endforeach; ?>
</div>
