<div class="container-fluid">
	<h1>Tabel barang</h1>
	<button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#tambahData"><i class="fas fa-plus"></i>Tambah Data</button>
	<table class="table table-hover table-striped">
		<tr>
			<th>no</th>
			<th>nama_barang</th>
			<th>harga</th>
			<th>Stok</th>
		</tr>
		<?php
		$no = 1;
		foreach ($barang as $brg) :; ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $brg->nama_barang; ?></td>
				<td><?php echo $brg->harga; ?></td>
				<td><?php echo $brg->stok; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<a class="btn btn-sm btn-success" href="<?php echo base_url('c_transaksi') ?>">kembali</a>

	<!-- modal tambah data -->

	<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url() . 'c_barang/tambah_barang' ?>" method="post" class="form-group">
						<label for="">Nama Barang</label>
						<input class="form-control" name="nama" type="text" name="">
						<label for="">Harga</label>
						<input class="form-control" name="harga" type="number" name="">
						<label for="">stok</label>
						<input class="form-control" name="stok" type="number" name="">
						<button type="reset" class="btn mt-2 btn-danger" data-dismiss="modal">Reset</button>
						<button type="submit" class="btn btn-success mt-2">Kirim</button>
					</form>
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>
</div>