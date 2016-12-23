<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="container">
			<h2>Transaksi</h2>
			<table class="table">
				<caption>Daftar produk yang ada beli</caption>
				<thead>
					<tr>
						<th>No</th>
						<th>No Transaksi</th>
						<th>Nama Produk</th>
						<th>Jumlah</th>
						<th>Total Harga</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if ($transaksi != NULL) {
							$c=1;
							foreach ($transaksi as $value) {
					?>
								<tr>
									<td><?php echo $c; ?></td>
									<td><?php echo $value->no_transaksi; ?></td>
									<td><?php echo $value->nama_produk; ?></td>
									<td><?php echo $value->qty; ?></td>
									<td><?php echo "Rp" .number_format($value->harga, 0, ',', '.'); ?></td>
									<td><?php if($value->status == 1) echo "Lunas"; else if($value->status == 0) echo "Belum Lunas"; else echo 'Pending'; ?></td>
								</tr>
					<?php
								$c++;
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>