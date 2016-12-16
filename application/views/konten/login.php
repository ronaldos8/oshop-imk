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
						<h2>Login to your account</h2>
						<form action="<?php echo base_url('user/proses_login'); ?>" method="POST">
							<input type="text" name="username" placeholder="Username" />
							<input type="password" name="password" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="<?php echo base_url('user/proses_daftar'); ?>" method="POST">
							<input type="text" name="nama_pembeli" placeholder="Name"/>
							<input type="email" name="email_pembeli" placeholder="Email Address"/>
							<input type="text" name="username" value="" placeholder="Username">
							<input type="password" name="password" placeholder="Password"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->