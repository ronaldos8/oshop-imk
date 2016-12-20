<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="container">
			<h3>
				<?php echo "Selamat datang, " .$pembeli->nama_pembeli; ?>
			</h3>
			<?php
				if ($this->session->has_userdata('status')) {
			?>
					<p class="text-warning">
						<?php echo $this->session->flashdata('status'); ?>
					</p>
			<?php
				}
			?>
			<table class="table table-striped">
				<caption>Berikut adalah data diri anda. Silahkan lengkapi data diri anda untuk keperluan transaksi.</caption>
				<thead>
					<tr>
						<th>Nama</th>
						<th>Username</th>
						<th>No Kontak</th>
						<th>Email</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $pembeli->nama_pembeli; ?></td>
						<td><?php echo $pembeli->username; ?></td>
						<td><?php echo $pembeli->kontak_pembeli; ?></td>
						<td><?php echo $pembeli->email_pembeli; ?></td>
						<td><?php echo $pembeli->jk_pembeli; ?></td>
						<td><?php echo $pembeli->alamat_pembeli; ?></td>
						<td>
							<a href="<?php echo base_url('user/edit/') .$pembeli->id_pembeli; ?>" title="">
								<button type="button" class="btn btn-success btn-sm">Edit</button>
							</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>