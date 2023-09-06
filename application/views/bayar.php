<div class="content-wrapper">
	<section class="content-header mx-3">
		<h3>Konfirmasi Pembayaran <?php echo $transaksi->nama_pelanggan; ?> </h3>
		<?php echo $this->session->flashdata('pesan'); ?>
		<form action="<?php echo base_url('c_transaksi/pembayaran/' . $transaksi->id) ?>" method="post" class="">
			<div class="form-group">
				<label>Nama Pelanggan</label>
				<input type="hidden" class="form-control" name="id" id="" value="<?= $transaksi->id ?>" readonly>
				<input class="form-control" name="pelanggan" id="" value="<?= $transaksi->nama_pelanggan ?>" readonly>
				<label>Email</label>
				<input class="form-control" name="email" id="" value="<?= $transaksi->email ?>" readonly>
				<label>Telephone</label>
				<input class="form-control" name="telp" id="" value="<?= $transaksi->telp ?>" readonly>
				
				<label>Barang</label>
				<input class="form-control" name="barang" id="" value="<?= $transaksi->nama_barang ?>" readonly>
				
				<label>Harga</label>
				<input class="form-control" name="harga" id="" value="<?= $transaksi->harga ?>" readonly>
				
				<label>Jumlah</label>
				<input class="form-control" name="jumlah" id="" value="<?= $transaksi->jumlah ?>" readonly>
				
				<label>Subtotal</label>
				<input class="form-control" name="subtotal" id="" value="<?= $transaksi->subtotal ?>" readonly>
				
				<label>Metode Pembayaran</label>
				<select name="metode" id="" class="form-control">
					<?php foreach ($paymen as $py) : ?>
						<option value="<?php echo $py->metode; ?>"><?php echo $py->name_method; ?></option>
					<?php endforeach; ?>
				</select>

				<button type="submit" class="btn btn-primary mt-2">Bayar</button>
				<a href="<?php echo base_url('c_transaksi'); ?>" class="btn btn-warning mt-2">Kembali</a>
			</div>
		</form>
	</section>
</div>
