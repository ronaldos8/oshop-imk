	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<?php
					if ($this->session->has_userdata('status')) {
				?>
						<div class="col-md-offset-1 col-md-11 col-sm-12 col-xs-12">
							<p class="text-success">
								<?php echo $this->session->flashdata('status'); ?>
							</p>
						</div>
				<?php
					}
				?>
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login ke akun anda</h2>
						<form action="<?php echo base_url('user/proses_login'); ?>" method="POST">
							<div class="form-group">
								<input type="text" name="username" placeholder="Username" />
							</div>
							<div class="form-group">
								<input type="password" name="password" placeholder="Password" />
							</div>
							<div class="form-group">
								<span>
								<input type="checkbox" class="checkbox"> 
									ingat saya	
								</span>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4" style="margin-top: -7px;">
										<button type="submit" class="btn btn-default">Login</button>
									</div>
									<div class="col-md-1" style="margin-top: -7px; margin-left: -45px; margin-right: 30px; ">
										<button style="background: white !important; color: black;" type="">atau</button>
									</div>
									<div class="col-md-6">
										<button href="path/to/shopping/cart" class="btn btn-primary" style="background: blue;" aria-label="facebook">
										  <i class="fa fa-facebook-square" aria-hidden="true"></i> Login dengan facebook
										</button>
									</div>
								</div>
							</div>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">ATAU</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Mendaftar di Oshop!</h2>
						<form action="<?php echo base_url('user/proses_daftar'); ?>" method="POST">
							<input type="text" name="nama_pembeli" placeholder="Nama Lengkap"/>
							<input type="email" name="email_pembeli" placeholder="Alamat Email"/>
							<input type="text" name="username" value="" placeholder="Username">
							<input type="password" name="password" placeholder="Password"/>
							<button type="submit" class="btn btn-default">Daftar</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->