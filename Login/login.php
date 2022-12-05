<!doctype html>
	<html lang="en">
	<head>
		<title>Login</title>
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

				</div>
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap p-0">
							<h3 class="mb-4 text-center">Sign In</h3>
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
							<form action="../actions/loginprocess.php" class="signin-form" method="POST">
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Email" name="email" required>
								</div>
								<div class="form-group">
									<input id="password-field" type="password" class="form-control" placeholder="Password" name="password" required>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit" name="login" class="form-control btn btn-primary submit px-3">Sign In</button>
								</div>

							</form>
						
							<p class="w-100 text-center">Dont have an account, <a href="register.php">Create One</a> </p>
						</div>
					</div>
				</div>
			</section>

			<script src="../js/jquery.min.js"></script>
			<script src="../js/popper.js"></script>
			<script src="../js/bootstrap.min.js"></script>
			<script src="../js/main.js"></script>
			<?php
if(!empty($_SESSION['registered']) and $_SESSION['registered']=='Yes'){
    ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script >
Swal.fire({
  icon: 'success',
  title: 'Account Created Successfully',
  showConfirmButton: false,
 timer: 4000,
})
    </script>

    <?php
    unset($_SESSION['registered']);
}

?>
		</body>
		</html>

