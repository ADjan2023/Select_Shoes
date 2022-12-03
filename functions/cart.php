<?php

include("../controllers/cart_controller.php");
function showCart($id){
	$ip = $_SERVER['REMOTE_ADDR'];

	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}

	$result=show_cart_ctr($id,$ip);
	$i=0;
	$total=0;
	if ($result!=false) {
		while($i<count($result))
		{
			$product=select_one_prod_ctr($result[$i]['p_id']);
			?>
			<div class="product-cart d-flex">
				<div class="one-forth">
					<div class="product-img" style="background-image: url(../images/products/<?php echo $product['product_image'];  ?>);">
					</div>
					<div class="display-tc">
						<h3><?php echo $product['product_title'];  ?></h3>
					</div>
				</div>
				<div class="one-eight text-center">
					<div class="display-tc">
						<span class="price"><?php echo $result[$i]['shoe_size'];  ?></span>
					</div>
				</div>
				<div class="one-eight text-center">
					<div class="display-tc">
						<span class="price">GH¢<?php echo $product['product_price'];  ?></span>
					</div>
				</div>

				<div class="one-eight text-center">
					<div class="display-tc">
						<form method="POST" action="../actions/update_qty.php" id='<?php echo 'cart'.$i;  ?>'>
							<input type="hidden" name="pid" value="<?php echo $product['product_id'];  ?>">
							<input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="<?php echo $result[$i]['qty'];  ?>" min="1" max="100" onfocusout="document.getElementById('<?php echo 'cart'.$i;  ?>').submit();">

						</form>
					</div>
				</div>
				<div class="one-eight text-center">
					<div class="display-tc">
						<span class="price">GH¢<?php echo ($product['product_price'])*($result[$i]['qty']);  ?></span>
					</div>
				</div>
				<div class="one-eight text-center">
					<div class="display-tc">
						<form method="POST" action="../actions/delete_from_cart.php">
							<input type="hidden" name="cid" value="<?php echo $result[$i]['c_id'];  ?>">
							<input type="hidden" name="pid" value="<?php echo $result[$i]['p_id'];  ?>">
							<button class="closed text-center" type="submit" name="delete" style="border: 0px;"></button>
						</form>
					</div>
				</div>
			</div>
			

			<?php 

			$total+=($product['product_price'])*($result[$i]['qty']);
			$i++;
		}
		?>
	</div>
</div>
<div class="row row-pb-lg">
	<div class="col-md-12">
		<div class="total-wrap">
			<div class="row">
				<div class="col-sm-8">

				</div>
				<div class="col-sm-4 text-center">
					<form action="order-confirm.php" method="POST">
						<div class="total">
							<div class="sub">
								<p><span>Subtotal:</span> <span>GH¢<?php echo $total; ?></span></p>
								<p><span>Shipping:</span> <span>GH¢50</span></p>
							</div>
							<div class="grand-total">
								<p><span><strong>Total:</strong></span> <span>GH¢<?php echo $total+50; ?></span></p>
							</div>
						</div>
						<div class="row form-group">
							<br>
							<div class="col-sm-12">
								<input type="submit" value="Proceed to Checkout" class="btn btn-primary" name="add" style="background-color: #840212;">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

}
else{
	echo "Your Cart is Empty";
}

}
function orderConfirm($id){
	$ip = $_SERVER['REMOTE_ADDR'];

	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}

	$result=show_cart_ctr($id,$ip);
	$i=0;
	$total=0;
	if ($result!=false) {
		while($i<count($result))
		{
			$product=select_one_prod_ctr($result[$i]['p_id']);
			?>
			<div class="product-cart d-flex">
				<div class="one-forth">
					<div class="product-img" style="background-image: url(../images/products/<?php echo $product['product_image'];  ?>);">
					</div>
					<div class="display-tc">
						<h3><?php echo $product['product_title'];  ?></h3>
					</div>
				</div>
				<div class="one-eight text-center">
					<div class="display-tc">
						<span class="price"><?php echo $result[$i]['shoe_size'];  ?></span>
					</div>
				</div>
				<div class="one-eight text-center">
					<div class="display-tc">
						<span class="price">GH¢<?php echo $product['product_price'];  ?></span>
					</div>
				</div>
				<div class="one-eight text-center">
					<div class="display-tc">
						<form method="POST" action="../actions/update_qty.php" id='<?php echo 'cart'.$i;  ?>'>
							<input type="hidden" name="pid" value="<?php echo $product['product_id'];  ?>">
							<input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="<?php echo $result[$i]['qty'];  ?>" min="1" max="100" disabled>

						</form>
					</div>
				</div>
				<div class="one-eight text-center">
					<div class="display-tc">
						<span class="price">GH¢<?php echo ($product['product_price'])*($result[$i]['qty']);  ?></span>
					</div>
				</div>
			</div>
			

			<?php 

			$total+=($product['product_price'])*($result[$i]['qty']);
			$i++;
		}
		?>
	</div>
</div>
<div class="row row-pb-lg">
	<div class="col-md-12">
		<div class="total-wrap">
			<div class="row">
				<div class="col-sm-8">

				</div>
				<div class="col-sm-4 text-center">

					<div class="total">
						<div class="sub">
							<p><span>Subtotal:</span> <span>GH¢<?php echo $total; ?></span></p>
							<p><span>Shipping:</span> <span>GH¢50</span></p>
						</div>
						<div class="grand-total">
							<p><span><strong>Total:</strong></span> <span>GH¢<?php echo $total+50; ?></span></p>
						</div>
					</div>
					<div class="row form-group" >
						<br>
						<div class="col-sm-12">
							<div class="total">
								<div class="sub">
									<p>Choose Payment Option</p>

								</div>
								<div class="grand-total">
									<form id="paymentForm">
										<input type="hidden" id="email" required value="<?php echo $_SESSION['email']; ?>" />
										<input type="hidden" id="amount" required value="<?php echo $total+50; ?>" />
										<input type="hidden"  id="dollar">
										<p><button class="btn btn-primary" type="submit" style="background-color: #840212;width: 280px;"  onclick="payWithPaystack()"><img src="../images/paystack.png" height="20px">  Paystack</button></p>
									</form>

									<script src="https://www.paypal.com/sdk/js?client-id=AWUF9-aXKLnlGhODkgXQQxytoQg8aa__zWW3ExhcgD0rXSSMOWgbFlPa26pg78tL0I1EssnMiqvXx0X3&currency=USD"></script>
									<div id="paypal-button-container"></div>
									<form id="clearCart" method="POST" action="../actions/clear_cart.php">
										<input type="hidden" name="cid" required value="<?php echo $_SESSION['id']; ?>" />
										<input type="hidden" name="amount" required value="<?php echo $total+50; ?>" />
										<input type="hidden" name="size" required value="<?php echo $result[$i]['shoe_size'];  ?>" />
									</form>
									<form id="fail" method="POST" action="../actions/failed_order.php">
										<input type="hidden" name="cid" required value="<?php echo $_SESSION['id']; ?>" />
										<input type="hidden" name="size" required value="<?php echo $result[$i]['shoe_size'];  ?>" />
									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<?php

}
else{
	echo "Your Cart is Empty";
}

}

function showOrders($id){
	$ip = $_SERVER['REMOTE_ADDR'];

	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}

	$result=view_orders_ctr($id);
	$i=0;
	$total=0;
	if ($result!=false) {
		while($i<count($result))
		{
			?>
			<div class="product-cart d-flex" >

				<div class="one-forth " style="padding-left: 30px;">
					<div class="display-tc">
						<span class="price"><?php echo $result[$i]['invoice_no'];  ?></span>
					</div>
				</div>
				<div class="one-eight text-center">
					<div class="display-tc">
						<span class="price"><?php echo $result[$i]['order_date'];  ?></span>
					</div>
				</div>
				<div class="one-eight text-center">
					<div class="display-tc">
						<span class="price"><?php echo $result[$i]['order_status'];  ?></span>
					</div>
				</div>
				<div class="one-eight text-center">
					<div class="display-tc">
						<form method="POST" action="oneorder.php">
							<input type="hidden" name="oid" value="<?php echo $result[$i]['order_id'];  ?>">
							<span class="price"><button type="submit" name="view" class="btn btn-primary btn-outline-primary" ><i class="fas fa-eye"></i> View</button></span>
						</form>
					</div>
				</div>

			</div>
			

			<?php 

			$i++;
		}
		?>
	</div>
</div>

<?php

}
else{
	echo "Your Cart is Empty";
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
function showOrder($oid){
	$ip = $_SERVER['REMOTE_ADDR'];

	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}

	$result=view_order_ctr($oid);
	$i=0;
	$total=0;
	if ($result!=false) {
		while($i<count($result))
		{
			$product=select_one_prod_ctr($result[$i]['product_id']);
			?>
			<div class="product-cart d-flex">
				<div class="one-forth">
					<div class="product-img" style="background-image: url(../images/products/<?php echo $product['product_image'];  ?>);">
					</div>
					<div class="display-tc">
						<h3><?php echo $product['product_title'];  ?></h3>
					</div>
				</div>
				<div class="one-eight text-center">
					<div class="display-tc">
						<span class="price">GH¢<?php echo $product['product_price'];  ?></span>
					</div>
				</div>
				<div class="one-eight text-center">
					<div class="display-tc">
						<form method="POST" action="../actions/update_qty.php" id='<?php echo 'cart'.$i;  ?>'>

							<input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="<?php echo $result[$i]['qty'];  ?>" min="1" max="100" disabled>

						</form>
					</div>
				</div>
				<div class="one-eight text-center">
					<div class="display-tc">
						<span class="price">GH¢<?php echo ($product['product_price'])*($result[$i]['qty']);  ?></span>
					</div>
				</div>
			</div>
			

			<?php 

			$total+=($product['product_price'])*($result[$i]['qty']);
			$i++;
		}
		?>
	</div>
</div>
<div class="row row-pb-lg">
	<div class="col-md-12">
		<div class="total-wrap">
			<div class="row">
				<div class="col-sm-8">

				</div>
				<div class="col-sm-4 text-center">

					<div class="total">
						<div class="sub">
							<p><span>Subtotal:</span> <span>GH¢<?php echo $total; ?></span></p>
							<p><span>Shipping:</span> <span>GH¢50</span></p>
						</div>
						<div class="grand-total">
							<p><span><strong>Total:</strong></span> <span>GH¢<?php echo $total+50; ?></span></p>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
</div>

<?php

}
else{
	echo "Your Cart is Empty";
}

}

function showInvoice($oid){
	

	$result=view_invoice_ctr($oid);
	echo $result['invoice_no'];
	

}

function packageTrack($oid){
	

	$result=view_invoice_ctr($oid);
	
	if ($result!=false) {
		if ($result['deliv_status']=='Processed'){
			echo " <li class='active step0'></li>
			<li class=' step0'></li>
			<li class=' step0'></li>
			<li class=' step0'></li>";

		}
		else if($result['deliv_status']=='Shipped'){
			echo " <li class='active step0'></li>
			<li class='active step0'></li>
			<li class=' step0'></li>
			<li class=' step0'></li>";
		}
		else if($result['deliv_status']=='Delivery'){
			echo " <li class='active step0'></li>
			<li class='active step0'></li>
			<li class='active step0'></li>
			<li class=' step0'></li>";
		}
		else if($result['deliv_status']=='Arrived'){
			echo " <li class='active step0'></li>
			<li class='active step0'></li>
			<li class='active step0'></li>
			<li class='active step0'></li>";

		}


		else{
			echo "No results";
		}

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
		echo "No products available for this brand";
	}

}


?>