<div class="container-fluid">
	<h1>Table pelangggan</h1>
	<?php echo $this->session->flashdata('pesan'); ?>
	<button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#tambahData"><i class="fas fa-plus"></i>Tambah Data</button>
	<table class="table table-hover table-striped">
		<tr>
			<th>no</th>
			<th>nama_pelanggan</th>
			<th colspan="3">aksi</th>
		</tr>
		<?php
		$no = 1;
		foreach ($pelanggan as $plg) :; ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $plg->nama_pelanggan; ?></td>
				<td><?php echo anchor('c_pelanggan/edit/' . $plg->id, '<div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>'); ?></td>
				<td><?php echo anchor('c_pelanggan/hapus_pelanggan/' . $plg->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>'); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<a class="btn btn-sm btn-success" href="<?php echo base_url('c_transaksi') ?>">Kembali</a>

	<!-- modal tambah data -->

	<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Data Pelanggan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url() . 'c_pelanggan/tambah_pelanggan' ?>" method="post" class="form-group">
						<label for="">Nama Pelanggan</label>
						<input class="form-control" name="nama_pelanggan" type="text" name="">
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
