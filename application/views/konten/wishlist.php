<section id="cart_items">
	<div class="container">
		<!-- <div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Shopping Cart</li>
			</ol>
		</div> -->
		<h3>Wishlist</h3>
		<?php
			if ($this->session->has_userdata('status')) {
		?>
				<p><?php echo $this->session->flashdata('status'); ?></p>
		<?php
			}
		?>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="image">Nama Produk</td>
						<td class="price">Price</td>
						<td class="total">Aksi</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php
						if ($wishlist != NULL) {
							foreach ($wishlist as $value) {
						?>
								<tr>
									<td class="cart_product">
										<a href="<?php echo base_url('produk/s/') .$value->id_produk; ?>"><img src="<?php echo base_url('assets/images/produk/') .$value->foto_produk; ?>" alt="<?php echo $value->nama_produk; ?>"></a>
									</td>
									<td class="cart_description">
										<h4><a href="<?php echo base_url('produk/s/') .$value->id_produk; ?>"><?php echo $value->nama_produk; ?></a></h4>
										<!-- <p>Web ID: 1089772</p> -->
									</td>
									<td class="cart_total">
										<p class="cart_total_price">Rp <?php echo number_format($value->harga_produk, 2, ',', '.') ?></p>
									</td>
									<td class="cart_delete">
										<a title="Hapus" class="cart_quantity_delete" href="<?php echo base_url('produk/hapus_wishlist/') .$value->whishlist_id; ?>"><i class="fa fa-times"></i></a>
									</td>
								</tr>
						<?php
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->