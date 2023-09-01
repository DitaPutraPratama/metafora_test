<div class="container-fluid">
	<h1>Table Transaksi</h1>
	<?php echo $this->session->flashdata('pesan'); ?>
	<button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#tambahData"><i class="fas fa-plus"></i>Tambah Data</button>
	<table class="table table-hover table-striped">
		<tr class="thead-dark">
			<th scope="col">No</th>
			<th scope="col">Nama</th>
			<th scope="col">Barang</th>
			<th scope="col">Harga</th>
			<th scope="col">Jumlah</th>
			<th scope="col">Subtotal</th>
			<th colspan="3">Aksi</th>
		</tr>
		<?php
		$no = 1;
		foreach ($transaksi as $tr) :; ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $tr->nama_pelanggan; ?></td>
				<td><?php echo $tr->nama_barang; ?></td>
				<td>Rp. <?= number_format($tr->harga, 0, ',', '.'); ?></td>
				<td><?php echo $tr->jumlah; ?></td>
				<td>Rp. <?= number_format($tr->subtotal, 0, ',', '.'); ?></td>
				<td><?php echo anchor('c_transaksi/edit/' . $tr->id, '<div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>'); ?>
				</td>
				<td><?php echo anchor('c_transaksi/hapus/' . $tr->id, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>'); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>

	<!-- modal -->
	<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Data Transaksi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('c_transaksi/tambah_transaksi') ?>" method="post">
						<label class="form-label">Nama Customer</label>
						<select name="pelanggan" id="" class="form-control">
							<option value="">-- Pilih --</option>
							<?php foreach ($pelanggan as $plg) : ?>
								<option value="<?php echo $plg->id; ?>"><?php echo $plg->nama_pelanggan; ?></option>
							<?php endforeach; ?>
						</select>

						<label class="form-label">Nama Barang</label>
						<select name="barang" id="barang" class="form-control">
							<option value="">-- Pilih --</option>
							<?php foreach ($barang as $brg) : ?>
								<option value="<?= $brg->id_barang; ?>" harga="<?= $brg->harga; ?>"><?= $brg->nama_barang; ?></option>
							<?php endforeach; ?>
						</select>

						<label class="form-label">Harga Barang</label>
						<input type="number" class="form-control" id="harga" name="harga" placeholder="">

						<label class="form-label">Jumlah</label>
						<input type="number" class="form-control" id="" name="jumlah" placeholder="">

						<button type="submit" class="btn btn-primary mt-2">Simpan Data</button>
					</form>
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		var selectBarang = document.getElementById("barang");
		var inputHarga = document.getElementById("harga");

		selectBarang.addEventListener("change", function() {
			var selectedOption = selectBarang.options[selectBarang.selectedIndex];
			var selectedHarga = selectedOption.getAttribute("harga");

			inputHarga.value = selectedHarga;

		});
	});
</script>
