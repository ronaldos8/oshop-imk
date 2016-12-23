
					<div class="fitur_produk"><!--features_items-->
						<h2 class="title text-center">
							<?php
								if (isset($header_kategori)) {
									echo $header_kategori;
								}else echo "Fitur Produk";
							?>
						</h2>
						
						<?php
							if ($list_produk != NULL) {
								$i = 1;
								foreach ($list_produk as $value) {
						?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url('assets/images/produk/'); ?><?php echo $value->foto_produk; ?>" alt="" />
													<h2>Rp.<?php echo number_format($value->harga_produk, 2, ',', '.') ?></h2>
													<p><?php echo $value->nama_produk; ?></p>
													
													<div class="col-md-offset-2 col-md-8">
														<img src="<?php echo base_url('assets/images/produk/rating.png'); ?>" alt="" />
													</div>
													<div class="clearfix">
														<br><br><br>
													</div>
												</div>
												<div class="product-overlay">
													<div class="overlay-content">
														<p class="desc">
															<?php
																echo $value->detail_produk;
															?>
														</p>
														<h2>Rp.<?php echo number_format($value->harga_produk, 2, ',', '.') ?></h2>
														<p><?php echo $value->nama_produk; ?></p>
														<a href="<?php echo base_url('user/beli/') .$value->id_produk; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><b>Beli</b></a>
														<a href="<?php echo base_url('produk/s/') ?><?php echo $value->id_produk; ?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Lihat Produk</a>
													</div>
												</div>
											</div>
											<div class="choose">
												<ul class="nav nav-pills nav-justified">
													<li><a href="<?php echo base_url('produk/proses_wishlist/') .$value->id_produk; ?>"><i class="fa fa-plus-square"></i>Tambah wishlist</a></li>
												</ul>
											</div>
										</div>
									</div>
						<?php
									if ($i % 3 == 0) {
										echo "<div class='clearfix'></div>";
									}
									$i++;
								}
							}
						?>
					</div><!--features_items-->
