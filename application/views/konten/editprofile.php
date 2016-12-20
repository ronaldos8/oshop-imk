<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="container">
			<h3>Perbaharui Profile</h3>

			<div class="form">
				<table class="table">
					<tbody>
						<form action="<?php echo base_url('user/proses_edit'); ?>" method="POST" accept-charset="utf-8">
							<tr>
								<td>
									<div class="form-group">
										<input type="text" name="nama_pembeli" class="form-control" value="<?php echo $pembeli->nama_pembeli; ?>" placeholder="">
									</div>
								</td>
								<td>
									<div class="form-group">
										<input type="text" name="kontak_pembeli" class="form-control" value="<?php echo $pembeli->kontak_pembeli; ?>" placeholder="Nomor Kontak">
									</div>
								</td>
								<td>
									<div class="form-group">
										<input type="email" name="email_pembeli" class="form-control" value="<?php echo $pembeli->email_pembeli; ?>" placeholder="Email">
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<textarea name="alamat_pembeli" placeholder="Alamat" class="form-control" rows="4"><?php echo $pembeli->alamat_pembeli; ?></textarea>
								</td>
								<td>
									<select name="jk_pembeli" class="form-control" >
										<option value="">-- Jenis Kelamin --</option>
										<option value="Laki-laki" <?php if($pembeli->jk_pembeli == 'Laki-laki') echo "selected"; ?>>Laki-laki</option>
										<option value="Perempuan" <?php if($pembeli->jk_pembeli == 'Perempuan') echo "selected"; ?> >Perempuan</option>
									</select>
								</td>
							</tr>
							<Laki-laki>
								<td colspan="3">
									<input type="hidden" name="id_pembeli" value="<?php echo $pembeli->id_pembeli; ?>">
									<button type="submit" class="btn btn-success">Simpan</button>
								</td>
							</tr>
						</form>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>