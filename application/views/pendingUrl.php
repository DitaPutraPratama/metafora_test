<div class="container-fluid">
	<h3>Detail Transaksi</h3>
	<div class="container">
		<p><strong>Status Transaksi:</strong> <?= $status; ?></p>
		<p>Reference ID: <?php echo $referenceId; ?></p>
		<p>Transaction ID: <?php echo $trx_id; ?></p>
		<p>Via: <?php echo $via; ?></p>
		<p>Channel: <?php echo $channel; ?></p>
		<!-- Tampilkan data transaksi jika ada -->
		<?php if (isset($transaksi)) : ?>
			<p>Nama Pelanggan: <?php echo $transaksi->nama_pelanggan; ?></p>
			<p>Email: <?php echo $transaksi->email; ?></p>
			<!-- Tampilkan data lainnya sesuai kebutuhan -->
		<?php endif; ?>
	</div>
</div>
