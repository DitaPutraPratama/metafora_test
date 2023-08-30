<div class="content-wrapper">
	<section class="content-header mx-3">
		<?php foreach ($transaksi as $tr) { ?>
			<h3>halman transaksi <?php echo $tr->nama_pelanggan; ?> </h3>
			<form action="<?php base_url('c_transaksi/input_transaksi' . $tr->id) ?>" method="post" class="">
				<div class="form-group">
					<p>nama</p>
					<select class="form-control" name="pelanggan" id="">
						<?php foreach ($pelanggan as $plg) { ?>
							<option value="<?= $plg->id ?>" <?php if ($tr->id_pelanggan == $plg->id) {
																echo 'selected';
															}; ?>><?= $plg->nama_pelanggan ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label for="">barang</label>
					<select class="form-control" name="barang" id="">
						<?php foreach ($barang as $brg) { ?>
							<option value="<?= $brg->id_barang ?>" <?php if ($tr->id_barang == $brg->id_barang) {
																		echo 'selected';
																	}; ?>><?= $brg->nama_barang ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label for="">harga</label>
					<input class="form-control" type="text" name="harga" value="<?php echo $tr->harga ?>">
				</div>
				<div class="form-group">
					<label for="">jumlah</label>
					<input class="form-control" type="text" name="jumlah" value="<?php echo $tr->jumlah ?>">
				</div>
				<div class="form-group">
					<label for="">subtotal</label>
					<input class="form-control" type="text" name="subtotal" value="<?php echo $tr->subtotal ?>">
				</div>
				<button type="submit" class="btn btn-primary btn-sm mt-3">Kirim</button>
				<button type="reset" class="btn btn-danger btn-sm mt-3">Reset</button>
			</form>
		<?php } ?>
	</section>
</div>
