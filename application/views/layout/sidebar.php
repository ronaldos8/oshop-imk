
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Kategori</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-caret-square-o-down"></i></span>
											Wanita
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse in">
									<div class="panel-body">
										<ul>
											<?php
												if ($wanita != NULL) {
													foreach ($wanita as $value) {
											?>
														<li><a href="<?php echo base_url('produk/kategori/') .$value->id_sub; ?>"><?php echo $value->nama_sub; ?> </a></li>
											<?php
													}
												}
											?>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-caret-square-o-down"></i></span>
											PRIA
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse in">
									<div class="panel-body">
										<ul>
											<?php
												if ($pria != NULL) {
													foreach ($pria as $value) {
											?>
														<li><a href="<?php echo base_url('produk/kategori/') .$value->id_sub; ?>"><?php echo $value->nama_sub; ?> </a></li>
											<?php
													}
												}
											?>
										</ul>
									</div>
								</div>
							</div>							
						</div><!--/category-products-->

						<div class="brands_products"><!--brands_products-->
							<h2>Merek</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<?php
										if ($brand != NULL) {
											foreach ($brand as $value) {
									?>
												<li><a href="<?php echo base_url('produk/brand/') .$value; ?>"> <span class="pull-right"><!-- (50) --></span><?php echo $value; ?></a></li>
									<?php
											}
										}
									?>
								</ul>
							</div>
						</div><!--/brands_products-->
						<br>
						<div class="brands_products"><!--brands_products-->
							<h2>Filter / Urutkan</h2>
							<div class="brands-name">
								<form action="<?php echo base_url('welcome/index'); ?>" method="get" accept-charset="utf-8">
									<select name="orderby" required >
										<option value="">-- Filter --</option>
										<option value="harga_produk asc">Harga Termurah</option>
										<option value="harga_produk desc">Harga Termahal</option>
									</select>
									<div align="center">
										<br>
										<button type="submit" class="btn btn-default">Filter</button>
									</div>
								</form>
							</div>
						</div><!--/brands_products-->
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">