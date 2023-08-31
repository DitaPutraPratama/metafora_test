<div class="container-fluid">
	<h3>edit data barang</h3>
	<?php foreach ($pelanggan as $plg) :; ?>
		<form method="post" action="<?php echo base_url() . 'c_pelanggan/update_pelanggan' ?>">
			<div class="form-group">
				<input type="hidden" name="id" class="form-control" value="<?php echo $plg->id ?>">
				<label for="">nama</label>
				<input type="text" name="nama_pelanggan" class="form-control" value="<?php echo $plg->nama_pelanggan ?>">
			</div>
			<button type="submit" class="btn btn-primary btn-sm">simpan</button>
		</form>
	<?php endforeach; ?>
</div>
