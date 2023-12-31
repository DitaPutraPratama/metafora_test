<div class="content-wrapper">
	<section class="content-header mx-3">
		<h3>Halman Transaksi <?php echo $transaksi->nama_pelanggan; ?> </h3>
		<?php echo $this->session->flashdata('pesan'); ?>
		<form action="<?php echo base_url('c_transaksi/input_transaksi') ?>" method="post" class="">
			<div class="form-group">
				<label>Nama Pelanggan</label>
				<input name="id" type="hidden" value="<?php echo $transaksi->id ?>">
				<select class="form-control" name="pelanggan" id="">
					<?php foreach ($pelanggan as $plg) { ?>
						<option value="<?= $plg->id ?>" <?php if ($transaksi->id_pelanggan == $plg->id) {
															echo 'selected';
														}; ?>><?= $plg->nama_pelanggan ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Barang</label>
				<select class="form-control" name="barang" id="">
					<?php foreach ($barang as $brg) { ?>
						<option value="<?= $brg->id_barang ?>" <?php if ($transaksi->id_barang == $brg->id_barang) {
																	echo 'selected';
																}; ?>><?= $brg->nama_barang ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Harga</label>
				<input class="form-control" type="text" name="harga" value="<?php echo $transaksi->harga ?>">
			</div>
			<div class="form-group">
				<label for="">Jumlah</label>
				<input class="form-control" type="text" name="jumlah" value="<?php echo $transaksi->jumlah ?>">
			</div>
			<div class="form-group">
				<label for="">Subtotal</label>
				<input class="form-control" type="text" name="subtotal" value="<?php echo $transaksi->subtotal ?>">
			</div>
			<button type="submit" class="btn btn-primary btn-sm mt-3">Kirim</button>
			<a href="<?php echo base_url('c_transaksi'); ?>" class="btn btn-warning btn-sm mt-3">Kembali</a>
		</form>
	</section>
</div>

