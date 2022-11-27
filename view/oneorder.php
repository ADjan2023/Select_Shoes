<?php
session_start();
if (empty($_SESSION['id']) and empty($_SESSION['name']) and empty($_SESSION['email'] and $_SESSION['role']!=2) ){
	header("location:../Login/login.php"); // redirects to login page
        exit;
}
if(isset($_POST['oid'])){
?>


<!DOCTYPE HTML>
<html>
	<head>
	<title>Sneaker Select</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
	 <link href="img/favicon.ico" rel="icon">
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
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="index.php"><img src="../images/custimages/logo1.png" width="170px"></a></div>
						</div>
						<div class="col-sm-5 col-md-3">
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
  	
    <p class="dropdown-item" >View Profile</p>
    <a class="dropdown-item" href="../actions/logout.php">Logout</a>
  </div>
</div>


						</div>
						
			         
		         </div>
					<div class="row">
						<div class="col-sm-10 text-left menu-1">
							<ul>
								<li ><a href="index.php">Home</a></li>
								<li><a href="">Categories</a></li>
								<li><a href="">About</a></li>
								<li><a href="">Contact</a></li>

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

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.php">Home</a></span> / <span>Order</span></p>
					</div>
				</div>
			</div>
		</div>


		<div class="colorlib-product">
			<div class="container">
			
				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="product-name d-flex">
							<div class="one-forth text-left px-4">
								<span>Product Details</span>
							</div>
							<div class="one-eight text-center">
								<span>Price</span>
							</div>
							<div class="one-eight text-center">
								<span>Quantity</span>
							</div>
							<div class="one-eight text-center">
								<span>Total</span>
							</div>
						
						</div>
						
						<?php
						require('../functions/cart.php');
						showOrder($_POST['oid']);

						?>
				
				
			</div>
		</div>

		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col footer-col colorlib-widget">
						<h4>About Footwear</h4>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Customer Care</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">Contact</a></li>
								<li><a href="#">Returns/Exchange</a></li>
								<li><a href="#">Gift Voucher</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Special</a></li>
								<li><a href="#">Customer Services</a></li>
								<li><a href="#">Site maps</a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">About us</a></li>
								<li><a href="#">Delivery Information</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Support</a></li>
								<li><a href="#">Order Tracking</a></li>
							</ul>
						</p>
					</div>

					<div class="col footer-col">
						<h4>News</h4>
						<ul class="colorlib-footer-links">
							<li><a href="blog.html">Blog</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Exhibitions</a></li>
						</ul>
					</div>

					<div class="col footer-col">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
							<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
							<li><a href="#">yoursite.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>
							<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
							<span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
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
	<!-- Main -->
	<script src="../js/custjs/main.js"></script>

	</body>
</html>

<?php 
}
else{
	header('Location:../view/order-details.php');
}

?>