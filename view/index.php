<?php 
session_start();
require("../functions/custviewprod.php");

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Sneaker Select</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../images/custimages/bg.png">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
	<link href="img/favicon.ico" rel="icon">

<link rel="canonical" href="http://www.bootstraptoggle.com">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.3/styles/github.min.css" rel="stylesheet" >
	


	<link href="../css/bootstrap-toggle.css" rel="stylesheet">
	<link href="../doc/stylesheet.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<!-- Icon Font Stylesheet -->

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/custcss/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/custcss/icomoon.css">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="../css/custcss/ionicons.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/custcss/bootstrap.min.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../css/custcss/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="../css/custcss/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="../css/custcss/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/custcss/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="../css/custcss/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="../fontawesome/custfonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/custcss/style.css">
	
	

</head>
<body>

	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div >
						<div class="col-sm-7 col-md-9" style="position: absolute; top: 10px;left: 10px;">
							<div id="colorlib-logo" style="padding-bottom: 100px;"><a href="index.php"><img src="../images/custimages/logo1.png" height="100px" ></a></div>
						</div>
						<div class="col-sm-5 col-md-3" style="position: absolute; top: 10px;right: -150px; padding-top: 50px;">
						<?php
						if (!empty($_SESSION['id']) and !empty($_SESSION['name']) and !empty($_SESSION['email']) and !empty($_SESSION['role']) and $_SESSION['role']!=1 ){

	


						?>
						
							
							<div class="dropdown show">
								<a class="btn btn-secondary dropdown-toggle" style="background-color: #fff ; border: 0px; color: black; " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php


									if (!empty($_SESSION['name'])){

										echo $_SESSION['name'];


									}
									?>
									<img class="rounded-circle me-lg-2" src="../images/profile.png" alt="" style="width: 40px; height: 40px;">
								</a>

								<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

									<p class="dropdown-item" ><?php
									newsletter($_SESSION['id']);
									?>


								</p>
								<a class="dropdown-item" href="../actions/logout.php">Logout</a>
							</div>
						</div>

					
					<?php
} else{
	?>
<div class="dropdown show">
								<a class="btn btn-secondary dropdown-toggle" style="background-color: #fff ; border: 0px; color: black; " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Guest User
									<img class="rounded-circle me-lg-2" src="../images/profile.png" alt="" style="width: 40px; height: 40px;">
								</a>

								<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

									
								<a class="dropdown-item" href="../Login/login.php">Login</a>
							</div>
						</div>
	<?php
}

					?>
					</div>

				</div>

				<div class="row">
					<div class="col-sm-10 text-left menu-1">
						<ul>
							<li class="active"><a href="index.php">Home</a></li>
							<li>
								<a class="btn btn-secondary dropdown-toggle" style="background-color: #fff ; border: 0px; color: black; padding-bottom: 7px; " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Brands
								</a>
								<div style="padding-bottom: 0px; background-color:  #840212;" class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<?php
									allBrands();
									?>
								</div>
							</li>
							<li>
								<a class="btn btn-secondary dropdown-toggle" style="background-color: #fff ; border: 0px; color: black; padding-bottom: 7px; " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Categories
								</a>
								<div style="padding-bottom: 0px; background-color:  #840212;" class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<?php
									allCategories();
									?>
								</div>
							</li>

							<li><a href="about.php">About</a></li>
							<li><a href=" contact.php">Contact</a></li>
							<?php
						if (!empty($_SESSION['id']) and !empty($_SESSION['name']) and !empty($_SESSION['email']) and !empty($_SESSION['role']) and $_SESSION['role']!=1 ){

	


						?>
							<li><a href="order-details.php">View Orders</a></li>

							<li style="padding-left: 100px"><a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart [<?php countCart($_SESSION['id']); ?>]</a></li>

							<?php
						}
							?>
						</ul>

					</div>

				</div>
			</div>
		</div>
		

		<div class="sale">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center">
						<div class="row">
							<div class="owl-carousel2">
								<div class="item">
									<div class="col">
										<h3><a href="#">Merry Christmas and a Happy New Year</a></h3>
									</div>
								</div>
								<div class="item">
									<div class="col">
										<h3><a href="#">New Website</a></h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<aside id="colorlib-hero">
		<div class="flexslider">
			<ul class="slides">
				<li style="background-image: url(../images/custimages/slide1.jpg);">
					<div class="overlay"></div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-6 offset-sm-3 text-center slider-text">
								<div class="slider-text-inner">
									<div class="desc">
										<h1 class="head-1">Quality</h1>
										<h2 class="head-2">Authentic</h2>
										<h2 class="head-3">Shoes</h2>
										<p class="category"><span>New trending shoes</span></p>
										<p><a href="../Adverts/" class="btn btn-primary">Advertise Your Business</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li style="background-image: url(../images/custimages/slide2.jpg);">
					<div class="overlay"></div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-6 offset-sm-3 text-center slider-text">
								<div class="slider-text-inner">
									<div class="desc">
										<h1 class="head-1">Christmas</h1>
										<h2 class="head-2">Sale</h2>
										<h2 class="head-3"><strong class="font-weight-bold">20%</strong> Off</h2>
										<p class="category"><span>Big sale football boots</span></p>
										<p><a href="../Adverts/" class="btn btn-primary">Advertise Your Business</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			
				<li style="background-image: url(../images/custimages/slide3.jpg);">
					<div class="overlay"></div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-6 offset-sm-3 text-center slider-text">
								<div class="slider-text-inner">
									<div class="desc">
										<h1 class="head-1">New</h1>
										<h2 class="head-2">Arrival</h2>
										<h2 class="head-3">up to <strong class="font-weight-bold">30%</strong> off</h2>
										<p class="category"><span>New Jordan's</span></p>
										<p><a href="../Adverts/" class="btn btn-primary">Advertise Your Business</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
				<?php
				showAdverts();
				?>
			</ul>
		</div>
	</aside>

	<nav class="colorlib-nav" role="navigation">
		<div class="top-menu">
			<div class="container">
				<div class="colorlib-intro">
					


					<form action="productsearch.php" method="POST" class="search-wrap">
						<div class="form-group">
							<input type="input" name="title" class="form-control search" placeholder="Search Product" required>
							<button class="btn btn-primary submit-search text-center" name="search" type="submit"><i class="fa fa-search"></i></button>
						</div>
					</form>


					
				</div>
			</div>
		</div>
	</nav>

		<!-- <div class="colorlib-product">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6 text-center">
						<div class="featured">
							<a href="#" class="featured-img" style="background-image: url(images/men.jpg);"></a>
							<div class="desc">
								<h2><a href="#">Shop Men's Collection</a></h2>
							</div>
						</div>
					</div>
					<div class="col-sm-6 text-center">
						<div class="featured">
							<a href="#" class="featured-img" style="background-image: url(images/women.jpg);"></a>
							<div class="desc">
								<h2><a href="#">Shop Women's Collection</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->

		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-md">
					
					
					
					<?php 

					viewProducts();
					?>
					
					
				</div>
				
			</div>
		</div>

		<!-- <div class="colorlib-partner">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Trusted Partners</h2>
					</div>
				</div>
				<div class="row">
					<div class="col partner-col text-center">
						<img src="images/brand-1.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-2.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-3.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-4.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-5.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
				</div>
			</div>
		</div> -->

		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col footer-col colorlib-widget">
						<h4 style="color: white;">About Select Shoes</h4>
						<p>Online Marketplace Specializing in Authentic Footwear</p>
						<p>
							<ul class="colorlib-social-icons" >
								<li><a href="https://twitter.com/SneakerSelectGH?s=09"><i class="fa-brands fa-twitter" style="color: white;"></i></a></li>
								<li><a href="https://www.facebook.com/SneakerSelectGH"><i class="fa-brands fa-facebook" style="color: white;"></i></a></li>
								<li><a href="https://instagram.com/select.shoesgh?igshid=ZmRlMzRkMDU="><i class="fa-brands fa-instagram" style="color: white;"></i></a></li>
								
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4 style="color: white;">Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li ><a href="about.php" style="color: white;">About us</a></li>
								<li ><a href="about.php" style="color: white;">Delivery Information</a></li>
								<li ><a href="about.php" style="color: white;">Privacy Policy</a></li>
								<li ><a href="contact.php" style="color: white;">Support</a></li>
								<li ><a href="about.php" style="color: white;">Order Tracking</a></li>
							</ul>
						</p>
					</div>

					

					<div class="col footer-col">
						<h4 style="color: white;">Contact Information</h4>
						<ul class="colorlib-footer-links">
							
							<li ><a href="tel:+233546311192" style="color: white;">+ 233 54 631 1192</a></li>
							<li><a href="mailto:info@yoursite.com" style="color: white;">sneakerselectgh@gmail.com</a></li>
							
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>
							<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made by <a href="https://colorlib.com" target="_blank">Colorlib</a>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
								<span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<div class="gototop js-top">
			<a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
		</div>

		<!-- jQuery -->
		<script src="../js/custjs/jquery.min.js"></script>
		<!-- popper -->
		<script src="../js/custjs/popper.min.js"></script>
		<!-- bootstrap 4.1 -->
		<script src="../js/custjs/bootstrap.min.js"></script>
		<!-- jQuery easing -->
		<script src="../js/custjs/jquery.easing.1.3.js"></script>
		<!-- Waypoints -->
		<script src="../js/custjs/jquery.waypoints.min.js"></script>
		<!-- Flexslider -->
		<script src="../js/custjs/jquery.flexslider-min.js"></script>
		<!-- Owl carousel -->
		<script src="../js/custjs/owl.carousel.min.js"></script>
		<!-- Magnific Popup -->
		<script src="../js/custjs/jquery.magnific-popup.min.js"></script>
		<script src="../js/custjs/magnific-popup-options.js"></script>
		<!-- Date Picker -->
		<script src="../js/custjs/bootstrap-datepicker.js"></script>
		<!-- Stellar Parallax -->
		<script src="../js/custjs/jquery.stellar.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.3/highlight.min.js"></script>


		<script src="../js/bootstrap-toggle.js"></script>
		<!-- Main -->
		<script src="../js/custjs/main.js"></script>




		

	</body>
	</html>
