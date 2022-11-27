<?php
include("../controllers/product_controller.php");
function viewProducts(){
	$result=select_all_products_ctr();
	$i=0;
	if ($result!=false) {
		while($i<count($result))
		{
			?>
			<div class="col-lg-3 mb-4 text-center">
				<div class="product-entry border" class="prod-img">
					<div style="background-color: #840212;">
						<form method="POST" action="../actions/add_cart.php">
							<input type="hidden" name="pid" value="<?php echo $result[$i]['product_id'];  ?>">
							<input type="hidden" name="quantity" value="1">
					<button class="btn text-center" type="submit" style="background-color: transparent; border: none; color: white; " name="add"><i class="fas fa-shopping-cart"> Add to cart</i></button>
				</form>
				</div>
					<img src="../images/products/<?php echo $result[$i]['product_image'];  ?>" class="img-fluid" >
					<div class="desc"  >
						<h2><?php echo $result[$i]['product_title'];  ?></h2>
						<span class="price">GH¢ <?php echo $result[$i]['product_price'];  ?></span>
						<form action="../view/product-detail.php" method="POST">
							<input type="hidden" name="pid" value="<?php echo $result[$i]['product_id'];  ?>">
							<button class="btn btn-primary submit-search text-center" name="view" type="submit" style="background-color: #840212;"><i class="fa fa-eye"> View Product</i></button>
						</form>
					</div>
				</div>
			</div>
			

			<?php 


			$i++;
		}
		  
	}
	else{
		echo "No products found";
	}

}
function productImage($id){
	
	$result=select_one_product_ctr($id);

	if ($result!=false) {
		
		?>
		<div class="item">

			<a href="#" class="prod-img">
				<img src="../images/products/<?php echo $result['product_image'];  ?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
			</a>

		</div>


		<?php

	}
	else{
		echo "No products found";
	}

}

function productTitle($id){
	
	$result=select_one_product_ctr($id);

	if ($result!=false) {
		
		echo $result['product_title'];
	}
	else{
		echo "No products found";
	}

}

function productPrice($id){
	
	$result=select_one_product_ctr($id);

	if ($result!=false) {
		
		echo "GH¢".$result['product_price'];
	}
	else{
		echo "No products found";
	}

}

function productDescription($id){
	
	$result=select_one_product_ctr($id);

	if ($result!=false) {
		
		echo $result['product_desc'];
	}
	else{
		echo "No products found";
	}

}
function productBrand($id){
	$result1=select_one_product_ctr($id);

	$result=select_one_brand_ctr($result1['product_brand']);

	if ($result!=false) {
		
		echo $result['brand_name'];
	}
	else{
		echo "No products found";
	}

}
function productCategory($id){
	
	$result1=select_one_product_ctr($id);
	
	$result=select_one_category_ctr($result1['product_cat']);

	if ($result!=false) {
		
		echo $result['cat_name'];
	}
	else{
		echo "No products found";
	}

}
function searchedProducts($input){
	$result=search_products_ctr($input);
	$i=0;
	if ($result!=false) {
		while($i<count($result))
		{
			?>
			<div class="col-lg-3 mb-4 text-center">
				<div class="product-entry border" class="prod-img">
					<div style="background-color: #840212;">
						<form method="POST" action="../actions/add_cart.php">
							<input type="hidden" name="pid" value="<?php echo $result[$i]['product_id'];  ?>">
							<input type="hidden" name="quantity" value="1">
					<button class="btn text-center" type="submit" style="background-color: transparent; border: none; color: white; " name="add"><i class="fas fa-shopping-cart"> Add to cart</i></button>
				</form>
				</div>
					<img src="../images/products/<?php echo $result[$i]['product_image'];  ?>" class="img-fluid" >
					<div class="desc">
						<h2><?php echo $result[$i]['product_title'];  ?></h2>
						<span class="price">GH¢ <?php echo $result[$i]['product_price'];  ?></span>
						<form action="../view/product-detail.php" method="POST">
							<input type="hidden" name="pid" value="<?php echo $result[$i]['product_id'];  ?>">
							<button class="btn btn-primary submit-search text-center" type="submit" style="background-color: #840212;"><i class="fa fa-eye"> View Product</i></button>
						</form>
					</div>
				</div>
			</div>
			

			<?php

			$i++;
		} 
	}
	else{
		echo "No products found";
	}

}
function countCart($cid){
	$ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

	$result=count_cart_ctr($cid,$ip);

	if ($result!=false) {
		print_r($result['cart_num']);
	}
	else{
		echo 0;
	}

}

?>
