<section id="cart_items">
	<div class="container">
		<!-- <div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Shopping Cart</li>
			</ol>
		</div> -->
		<h3>Keranjang Belanja</h3>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description"></td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php
						if ($this->cart->contents() != NULL) {
							$total = 0;
							foreach ($this->cart->contents() as $item) {
					?>
								<tr>
									<td class="cart_product">
										<a href="<?php echo base_url('produk/s/') .$item['id']; ?>"><img src="<?php echo base_url('assets/images/produk/') .$item['foto']; ?>" alt=""></a>
									</td>
									<td class="cart_description">
										<h4><a href="<?php echo base_url('produk/s/') .$item['id']; ?>"><?php echo $item['name']; ?></a></h4>
										<!-- <p>Web ID: 1089772</p> -->
									</td>
									<td class="cart_price">
										<p><?php echo "Rp " .number_format($item['price'], 2, ',', '.'); ?></p>
									</td>
									<td class="cart_quantity">
										<div class="cart_quantity_button">
											<a class="cart_quantity_up" href=""> + </a>
											<input class="cart_quantity_input" type="text" name="qty" value="<?php echo $item['qty']; ?>" autocomplete="off" size="2">
											<a class="cart_quantity_down" href=""> - </a>
											<a href="#" title="">
												
											</a>
										</div>
									</td>
									<td class="cart_total">
										<p class="cart_total_price">Rp <?php echo number_format($item['qty']*$item['price'], 2, ',', '.') ?></p>
									</td>
									<td class="cart_delete">
										<a class="cart_quantity_delete" href="<?php echo base_url('user/hapus_cart/') .$item['rowid']; ?>"><i class="fa fa-times"></i></a>
									</td>
								</tr>
					<?php
								$total += $item['qty']*$item['price'];
							}
								echo '<tr>';
								echo "<td align='right' colspan='4'class=' cart_total'>";
								echo "<p class='cart_total_price'>Total </p>";
								echo "</td>";
								echo "<td colspan='2' align='left' class='cart_total'>" ."<p class='cart_total_price'>Rp " .number_format($total, 2, ',', '.') ."</p></td>";
								echo '</tr>';
								echo "<tr>";
								echo "<td colspan='6' align='right'>";
								echo "<button type='submit' name='submit' value='checkout' class='btn btn-fefault cart'>
											<i class='fa fa-shopping-cart'></i>
											Check Out
										</button>";
								echo "</td>";
								echo "</tr>";
						}else {
					?>
								<tr>
									<td colspan="6" align="center">
										<p class="cart_total_price">
											Belum ada item
										</p>
									</td>
								</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->