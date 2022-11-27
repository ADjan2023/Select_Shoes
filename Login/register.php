<!doctype html>
	<html lang="en">
	<head>
		<title>Register</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="../css/style.css">

	</head>
	<body class="img js-fullheight" style="background-color: black;">
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center mb-5">
						<h2 class="heading-section">Register</h2>
						<h4 style="color: red;">
							<?php
							include('../error/errordisplay')
							?>
						</h4>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap p-0">
							<form action="../actions/registerprocess.php" class="signin-form" method="POST" >
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Full Name" name="fullname" required>
								</div>
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Email" name="email" required>
								</div>
								<div id="strength"></div>
								<div class="form-group">
									<input id="password-field" type="password" class="form-control" placeholder="Password" name="password"  required>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div id="msg"></div>
								<div class="form-group">
									<input id="password-field1" type="password" class="form-control" placeholder="Confirm Password" name="password2" required>
									<span toggle="#password-field1" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>

								<div class="form-group">
									<input type="text" class="form-control" placeholder="Country" name="country" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="City" name="city" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Contact Number" name="contact" required maxlength="10" onkeypress='validate(event)' oninvalid="this.setCustomValidity('Phone number should be 10 numbers')" oninput="this.setCustomValidity('')" >
								</div>
								<div class="form-group">
									<button type="submit" id="register" class="form-control btn btn-primary submit px-3" name="register">Register</button>
								</div>

							</form>
							<?php
							session_start();

							if (!empty($_SESSION['error'])){
								?>
								<div class="w-100 text-center" style="color: red;">
									<?php
									echo $_SESSION['error'];
									unset($_SESSION['error']);
								}
								?>
							</div>
							<p class="w-100 text-center">Have an account, <a href="login.php">Login</a> </p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="../js/jquery.min.js"></script>
		<script src="../js/popper.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/main.js"></script>

	</body>
	</html>
