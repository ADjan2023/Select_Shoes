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
											<p><button class="btn btn-primary" type="submit" style="background-color: #840212;width: 280px;"  onclick="payWithPaystack()"><img src="../images/paystack.png" height="20px">  Paystack</button></p>
											<p><button class="btn btn-primary" type="submit" style="background-color: #840212; width: 280px;"><i class="fa-brands fa-paypal"></i>  PayPal</button></p>
											</form>
											<form id="clearCart" method="POST" action="../actions/clear_cart.php">
												<input type="hidden" name="cid" required value="<?php echo $_SESSION['id']; ?>" />
												<input type="hidden" name="amount" required value="<?php echo $total+50; ?>" />
											</form>
											<form id="fail" method="POST" action="../actions/failed_order.php">
												<input type="hidden" name="cid" required value="<?php echo $_SESSION['id']; ?>" />
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
		echo $result;
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
?>