<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-8 col-xs-12 well">
					<?php
						if ($pembeli != NULL) {
					?>
						<div class="login-form"><!--login form-->
						<h2>Isi Data Pembelian</h2>
						<div class="panel">
						<div class="panel-body">
								<p class="bg-warning text-warning">Data anda akan selalu rahasia</p>
							</div>
						</div>
						<form class="form-horizontal" action="<?php echo base_url('user/proses_login'); ?>" method="POST">
							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 control-label" for="">Nama Pembeli</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="nama_pembeli" value="<?php echo $pembeli->nama_pembeli; ?>" placeholder="Nama Pembeli" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 control-label" for="">Email Pembeli</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="email" name="email_pembeli" value="<?php echo $pembeli->email_pembeli; ?>" placeholder="Email Pembeli" />
									<span>
										Pastikan email yang anda tuliskan valid.
									</span>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 control-label" for="">Telepon / Handphone</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="kontak_pembeli" value="<?php echo $pembeli->kontak_pembeli; ?>" placeholder="Telepon/Handphone" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 control-label" for="">Alamat Pengiriman</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea name="alamat_pembeli" rows="4" placeholder="Alamat Pengiriman"><?php echo $pembeli->alamat_pembeli; ?></textarea>
								</div>
							</div>

							<br>
							<h2>Daftar belanja dan pengiriman</h2>

							<div class="panel panel-default">
								<div class="panel-heading">
							    	<h3 class="panel-title"><?php echo $produk->nama_produk; ?></h3>
								</div>
								<div class="panel-body">
							    	<table class="table">
							    		<tr>
							    			<td>Barang belanja</td>
							    			<td>
							    				<img class="col-md-3 col-sm-3 col-xs-6" src="<?php echo base_url('assets/images/produk/') .$produk->foto_produk; ?>" alt="">
							    				<div class="col-md-2">
							    					<input type="number" name="qty" value="<?php echo $qty; ?>" placeholder="">
							    				</div>
							    				<br><br><br>
							    				<?php echo $produk->detail_produk; ?>
							    			</td>
							    			<td>
							    				<b>subtotal</b>
							    				<?php
							    					echo "Rp" .number_format($produk->harga_produk, 0, ',', '.');
							    				?>
							    			</td>
							    		</tr>
							    		<tr>
							    			<td>
							    				Catatan
							    			</td>
							    			<td colspan="3">
							    				<textarea name="catatan"></textarea>
							    			</td>
							    		</tr>
							    		<tr>
							    			<td>Jasa Pengiriman</td>
							    			<td colspan="2">
							    				<select name="jasa_pengiriman" >
							    					<option value="">Jasa Pengiriman</option>
							    					<option value="jne">JNE REGULER</option>
							    					<option value="jne2">JNE EXPRESS</option>
							    					<option value="gojek">GO SEND</option>
							    				</select>
							    			</td>
							    		</tr>
							    	</table>
								</div>
							</div>
						</form>
					</div><!--/login form-->	
					<?php
						}else {
					?>
							<p>
								Silahkan login terlebih dahulu untuk berbelanja.
								<a href="<?php echo base_url('user/login'); ?>" title="">Login Disini</a>
							</p>
					<?php
						}
					?>
				</div>

				<div class="col-md-4 col-sm-4 col-xs-12 well">
					<div class="login-form">
						<h2>Ringkasan Pembelian</h2>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<b>Total Harga Barang</b>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12" align="right">
							<b><?php echo "Rp" .number_format($produk->harga_produk*$qty, 0, ',', '.'); ?></b>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<b>Biaya Kirim</b>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12" align="right">
							<b><?php //echo "Rp" .number_format(1.3/100*$produk->harga_produk, 0, ',', '.'); ?></b>
						</div>
						<div class="col-md-12">
							<hr>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<b>Total Belanja</b>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12" align="right">
							<b><?php echo "Rp" .number_format($produk->harga_produk*$qty, 0, ',', '.'); ?></b>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<br>
						</div>
						<?php
							if ($pembeli != NULL) {
						?>
						<div class="col-md-12 col-sm-12 col-xs-12" align="center">
							<a href="<?php echo base_url('user/pembayaran/') .$produk->id_produk ."/" .$qty; ?>" title="">
								<button type="submit" class="btn btn-default">Pilih Metode Pembayaran</button>
							</a>
						</div>
						<?php
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>