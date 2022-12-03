<?php
session_start();
	require('../functions/cart.php');
	if (empty($_SESSION['id']) and empty($_SESSION['name']) and empty($_SESSION['email'] and $_SESSION['role']!=2) ){
	header("location:../Login/login.php"); // redirects to login page
        exit;
}

?>
<!DOCTYPE HTML>
<html>
	<head>
	<title>Sneaker Select</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
	 <link href="img/favicon.ico" rel="icon">


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
 <link rel="canonical" href="http://www.bootstraptoggle.com">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.3/styles/github.min.css" rel="stylesheet" >
	


	<link href="../css/bootstrap-toggle.css" rel="stylesheet">
	<link href="../doc/stylesheet.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div >
						<div class="col-sm-7 col-md-9" style="position: absolute; top: 10px;left: 10px;">
							<div id="colorlib-logo" style="padding-bottom: 100px;"><a href="index.php"><img src="../images/custimages/logo1.png" width="170px" ></a></div>
						</div>
						
						<div class="col-sm-5 col-md-3" style="position: absolute; top: 10px;right: -150px; padding-top: 50px;">
							
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

						</div>
						
			         </div>
		         
					<div class="row">
						<div class="col-sm-10 text-left menu-1">
							<ul>
								<li ><a href="index.php">Home</a></li>
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
								
								<li><a href="">About</a></li>
								<li><a href="">Contact</a></li>
								<li><a href="order-details.php">View Orders</a></li>
								
								 
								<li style="padding-left: 100px" class="active"><a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart [<?php countCart($_SESSION['id']); ?>]</a></li>

							
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
						<p class="bread"><span><a href="index.php">Home</a></span> / <span>Shopping Cart</span></p>
					</div>
				</div>
			</div>
		</div>


		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 offset-md-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="product-name d-flex">
							<div class="one-forth text-left px-4">
								<span>Product Details</span>
							</div>
							<div class="one-eight text-center">
								<span>Shoe Size</span>
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
							<div class="one-eight text-center px-4">
								<span>Remove</span>
							</div>
						</div>
						
						<?php
					
						showCart($_SESSION['id']);

						?>
				
				
			</div>
		</div>

	
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
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

	


<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.3/highlight.min.js"></script>

	
	<script src="../js/bootstrap-toggle.js"></script>

	</body>
</html>

