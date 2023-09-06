<div class="container-fluid">
	<h1>Table Riwayat Transaksi</h1>
	<table class="table table-hover table-striped">
		<tr class="thead-dark">
			<th scope="col">No</th>
			<th scope="col">Nama</th>
			<th scope="col">Barang</th>
			<th scope="col">Harga</th>
			<th scope="col">Jumlah</th>
			<th scope="col">Subtotal</th>
			<th scope="col">Aksi</th>
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
				<td><?php echo anchor('c_transaksi/hapus_transaksi/' . $tr->id, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</div>'); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
