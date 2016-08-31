<?php include("layouts/header.php"); ?>

<section class="login-section">
	<div class="container">
		<div class="row">
			<div class="grid-4 grid-offset-4">
				<h2>Login</h2>
				<form action="" name="loginform" onsubmit="return loginValidate()">
					<div class="form-group">
						<input type="email" name="email" class="input-control" placeholder="Your Email Here">
						<span id="email-help"></span>
					</div>
					<div class="form-group">
						<input type="password" name="password" class="input-control" placeholder="Your Password Here">
					</div>
					<div class="form-group">
						<button type="submit" class="btn-primary btn-block">Login</button>
					</div>
				</form>
			</div>
		</div><!-- /row -->
	</div><!-- /container -->
</section><!-- /login-section -->

<?php include("layouts/footer.php"); ?>