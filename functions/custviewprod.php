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
				<div class="product-entry border" >
					<div class="prod-img">
					<img src="../images/products/<?php echo $result[$i]['product_image'];  ?>" class="img-fluid" >
				</div>
					<div class="desc"  >
						<h2><?php echo $result[$i]['product_title'];  ?></h2>
						<span class="price">GH¢ <?php echo $result[$i]['product_price'];  ?></span>
						<div class="align-self-end">
						<form action="../view/product-detail.php" method="POST">
							<input type="hidden" name="pid" value="<?php echo $result[$i]['product_id'];  ?>">
							<button class="btn btn-primary submit-search text-center" name="view" type="submit" style="background-color: #840212;"><i class="fa fa-eye"> View Product</i></button>
						</form>
					</div>
						
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
		echo $result['cart_num'];
	}
	else{
		echo 0;
	}

}

function shoeSizes($id){
	$result=select_one_product_ctr($id);
	$i=0;
	#
			$size=$result['product_sizes'];
			$sizes=preg_split('@,@', $size, -1, PREG_SPLIT_NO_EMPTY);
			$j=0;

			while($j<count($sizes)){

				?>

				<option value="<?php echo $sizes[$j]; ?>"><?php echo $sizes[$j]; ?></option>

				<?php
				$j++;
			}

		
		}

function newsletter($cid){
	$result=select_customer_ctr($cid);
				?>
				<form method="POST" action="../actions/update_newsletter.php" id="newsletter" >
					<p  style="width: 290px;padding-left: 20px;">Newsletter Subscription <input name="newsletter"  type="checkbox" <?php if ($result['newsletter']=="Yes") {
    	echo "checked"; } ?> data-toggle="toggle"  onchange="document.getElementById('newsletter').submit();">
    </p>
					<input type="hidden" name="cid" value="<?php echo $cid; ?>">
					<input type="hidden" name="newsletter" value="<?php echo $result['newsletter']; ?>">
    
</form>
				<?php
				
	}

function allCategories(){
$result=select_all_categories_ctr();
if ($result!=false) {
	$i=0;
	while($i<count($result)){
	?>
	 <p class="dropdown-item" style="padding-top: 10px; background-color: #840212; color: white; cursor: pointer;" onclick="document.getElementById('<?php echo $result[$i]['cat_name']; ?>').submit();"><?php echo $result[$i]['cat_name']; ?><form method="POST" action="../view/viewcat.php" id="<?php echo $result[$i]['cat_name']; ?>">
	 	<input type="hidden" name="cid" value="<?php echo $result[$i]['cat_id']; ?>">
	 </form> </p>
	<?php
	$i++;
}
}
else{
	?>
	<p class="dropdown-item" style="padding-top: 10px; background-color: #840212; color: white;">No categories found</p>
	<?php
}
}

function seeCat($input){
	$result=select_cat_products_ctr($input);
	$i=0;
	if ($result!=false) {
		while($i<count($result))
		{
			?>
			<div class="col-lg-3 mb-4 text-center">
				<div class="product-entry border" class="prod-img">
					
					<img src="../images/products/<?php echo $result[$i]['product_image'];  ?>" class="img-fluid" >
					<div class="desc">
						<h2><?php echo $result[$i]['product_title'];  ?></h2>
						<span class="price">GH¢ <?php echo $result[$i]['product_price'];  ?></span>
						<form action="../view/product-detail.php" method="POST">
							<input type="hidden" name="pid" value="<?php echo $result[$i]['product_id'];  ?>">
							<button class="btn btn-primary submit-search text-center" type="submit" name="view" style="background-color: #840212;"><i class="fa fa-eye"> View Product</i></button>
						</form>
					</div>
				</div>
			</div>
			

			<?php

			$i++;
		} 
	}
	else{
		echo "No products available for this category";
	}

}

function allBrands(){
$result=select_all_brands_ctr();
if ($result!=false) {
	$i=0;
	while($i<count($result)){
	?>
	 <p class="dropdown-item" style="padding-top: 10px; background-color: #840212; color: white; cursor: pointer;" onclick="document.getElementById('<?php echo $result[$i]['brand_name']; ?>').submit();"><?php echo $result[$i]['brand_name']; ?><form method="POST" action="../view/viewbrands.php" id="<?php echo $result[$i]['brand_name']; ?>">
	 	<input type="hidden" name="bid" value="<?php echo $result[$i]['brand_id']; ?>">
	 </form> </p>
	<?php
	$i++;
}
}
else{
	?>
	<p class="dropdown-item" style="padding-top: 10px; background-color: #840212; color: white;">No brands found</p>
	<?php
}
}


function seeBrands($input){
	$result=select_brands_products_ctr($input);
	$i=0;
	if ($result!=false) {
		while($i<count($result))
		{
			?>
			<div class="col-lg-3 mb-4 text-center">
				<div class="product-entry border" class="prod-img">
					
					<img src="../images/products/<?php echo $result[$i]['product_image'];  ?>" class="img-fluid" >
					<div class="desc">
						<h2><?php echo $result[$i]['product_title'];  ?></h2>
						<span class="price">GH¢ <?php echo $result[$i]['product_price'];  ?></span>
						<form action="../view/product-detail.php" method="POST">
							<input type="hidden" name="pid" value="<?php echo $result[$i]['product_id'];  ?>">
							<button class="btn btn-primary submit-search text-center" type="submit" name="view" style="background-color: #840212;"><i class="fa fa-eye"> View Product</i></button>
						</form>
					</div>
				</div>
			</div>
			

			<?php

			$i++;
		} 
	}
	else{
		echo "No products available for this brand";
	}

}
function showAdverts(){
  $result=show_all_adverts_ctr();
  $i=0;
  if ($result!=false) {
    while($i < count($result)){
      ?>
   
				

<li style="background-image: url(../images/adverts/<?php echo $result[$i]['company_image'];  ?>);">
					<div class="overlay"></div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-6 offset-sm-3 text-center slider-text">
								<div class="slider-text-inner">
									<div class="desc">
										<h1 class="head-1"> <?php echo $result[$i]['company_name']; ?></h1>
										<h2 class="head-2"><?php echo $result[$i]['company_email']; ?></h2>
										
										<p class="category"><span> <?php echo $result[$i]['company_info']; ?></span></p>
										<p><a href="../Adverts/" class="btn btn-primary">Advertise Your Business</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
     <?php

     $i++;
   }

 }

}
?>

