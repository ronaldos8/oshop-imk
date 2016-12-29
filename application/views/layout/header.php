<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +62 81 232 456 778</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@os.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/'); ?>images/produk/logo2.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									IND
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">IND</a></li>
									<li><a href="#">ENG</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php
									if ($this->session->has_userdata('log_user')) {
								?>
									<li class="<?php if(isset($menu_wishlist)) echo "active"; ?>"><a href="<?php echo base_url('produk/wishlist'); ?>"><i class="fa fa-star"></i> Wishlist</a></li>
								<?php
									}
								?>
								<!-- <li><a href="#"><i class="fa fa-crosshairs"></i> Checkout</a></li> -->
								<li class="<?php if(isset($menu_cart)) echo "active"; ?>"><a href="<?php echo base_url('user/cart'); ?>"><i class="fa fa-shopping-cart"></i> Keranjang Belanja</a></li>
								<?php
									if (!$this->session->has_userdata('log_user')) {
								?>
									<li <?php if(isset($menu_login)) echo "active"; ?>><a href="<?php echo base_url('user/login'); ?>"><i class="fa fa-plus-square-o"></i> Daftar</a></li>
									<li><a href="<?php echo base_url('user/login'); ?>" class="<?php if(isset($menu_login)) echo $menu_login; ?>"><i class="fa fa-lock"></i> Login</a></li>
								<?php
									}else {
								?>
										<li><a href="<?php echo base_url('user/transaksi'); ?>"><i class="fa fa-exchange"></i> Transaksi</a></li>
										<li><a href="<?php echo base_url('user'); ?>"><i class="fa fa-user"></i> <?php echo $this->session->userdata('nama_user'); ?></a></li>
										<li><a href="<?php echo base_url('user/logout'); ?>"><i class="fa fa-sign-out"></i> Logout	</a></li>
								<?php
									}
								?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo base_url(); ?>" class="<?php if(isset($menu_beranda)) echo "active"; ?>">Beranda</a></li>
								<li class="dropdown" class="<?php if(isset($menu_shop)) echo "active"; ?>"><a href="#">Belanja<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Produk</a></li>
										<li><a href="product-details.html">Kategori</a></li>  
										<li><a href="cart.html">Diskon</a></li> 
										<li><a href="login.html">Pengiriman</a></li> 
                                    </ul>
                                </li> 
								<li class="<?php if(isset($menu_about)) echo "active"; ?>"><a href="contact-us.html">Tentang Kami</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<form action="<?php echo base_url('produk/cari/'); ?>" method="get" accept-charset="utf-8">
							<div class="search_box pull-right">
								<input type="text" name="s" value="<?php if(isset($_GET['s'])) echo $_GET['s']; ?>" placeholder="Pencarian"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
