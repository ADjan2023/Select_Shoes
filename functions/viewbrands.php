<?php
include("../controllers/product_controller.php");

function viewBrands(){
	$result=select_all_brands_ctr();
	$i=0;
	if ($result!=false) {
		?>
		<table>

			<?php
			while($i < count($result)){
				?>
				<tr>
					<div class="d-flex align-items-center border-bottom py-2">

						<div class="w-100 ms-3">
							<div class="d-flex w-100 align-items-center justify-content-between">
								<span id="bname">
									<?php 
									echo $result[$i]['brand_name']; 
									?>

								</span>
								

								<!-- <form method="POST" action="../actions/update_brand.php"> -->

									<div class="modal fade" id="<?php echo "exampleModal".$i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 style="color: black;" class="modal-title" id="exampleModalLabel">Edit Brand</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<form action="../actions/update_brand.php" method="POST" onSubmit="return confirm('Do you want to update this brand?') ">
														<div class="form-group">

															<input type="text" style="background: white;" class="form-control" name="bname" id="recipient-name" placeholder="<?php 
															echo $result[$i]['brand_name']; 
														?>">
														<input type="hidden" name="bid" value="<?php 
														echo $result[$i]['brand_id']; 
													?>">
												</div>


											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												<button type="submit" name="edit" class="btn btn-primary">Save changes</button>
											</div>
										</form>
									</div>
								</div>
							</div>

							
							<form action="../actions/delete_brand.php" method="POST" onSubmit="return confirm('Do you want to delete this brand?') ">
								<input type="hidden" name="bid" value="<?php 
								echo $result[$i]['brand_id']; 
							?>">
							<div>
								<button class="btn btn-sm" type="submit" name="delete"><i class="fa fa-trash"></i></button>
								<button class="btn btn-sm" type="button"  data-bs-toggle="modal" data-bs-target="<?php echo "#exampleModal".$i;?>" ><i class="fa fa-user-edit"></i></button>
							</div>
						</form>
						<!-- Modal -->

						<!-- </form> -->
						<?php

						$i++;
						?>


					</div>
				</div>
			</div> 
		</tr>                    
		<?php


	}
	?>
</table>
<?php


}
else{
	echo "No Brands Added";
}
}



function viewCategories(){
	$result=select_all_categories_ctr();
	$i=0;
	if ($result!=false) {
		while($i < count($result)){
			?>
			<div class="d-flex align-items-center border-bottom py-2">

				<div class="w-100 ms-3">
					<div class="d-flex w-100 align-items-center justify-content-between">
						<span>
							<?php 
							echo $result[$i]['cat_name']; 
							?>
						</span>
						<div class="modal fade" id="<?php echo "Modal".$i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 style="color: black;" class="modal-title" id="exampleModalLabel">Edit Category</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form action="../actions/update_category.php" method="POST" onSubmit="return confirm('Do you want to update this category?') ">
											<div class="form-group">

												<input type="text" style="background: white;" class="form-control" name="cname" id="recipient-name" placeholder="<?php 
												echo $result[$i]['cat_name']; 
											?>">
											<input type="hidden" name="cid" value="<?php 
											echo $result[$i]['cat_id']; 
										?>">
									</div>


								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									<button type="submit" name="edit" class="btn btn-primary">Save changes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<form action="../actions/delete_category.php" method="POST" onSubmit="return confirm('Do you want to delete this category?') ">
					<input type="hidden" name="cid" value="<?php 
					echo $result[$i]['cat_id']; 
				?>">
				<div>
					<button class="btn btn-sm" type="submit" name="delete"><i class="fa fa-trash"></i></button>
					<button class="btn btn-sm" type="button"  data-bs-toggle="modal" data-bs-target="<?php echo "#Modal".$i;?>" ><i class="fa fa-user-edit"></i></button>
				</div>
			</form>

			<!-- Modal -->
			<?php

			$i++;
			?>


		</div>
	</div>
</div>                     
<?php


}
}
else{
	echo "No Categories Added";
}

}

function selectdropBrands(){
	
	?>
	<select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="bid">
		<?php
		$result=select_all_brands_ctr();
		$i=0;
		if ($result!=false) {
			while($i < count($result)){
				?>
				<option value="<?php echo $result[$i]['brand_id']; ?>"><?php echo $result[$i]['brand_name']; ?></option>				
				<?php
				$i++;
			}
		}
		else{
			?>
			<option selected>No brands have been added</option>
			<?php
		}
		?>
	</select>
	<?php 
}
function selectdropBrands1(){
	
	?>
	<select class="form-control" id="floatingSelect" aria-label="Floating label select example" name="bid">
		<?php
		$result=select_all_brands_ctr();
		$i=0;
		if ($result!=false) {
			while($i < count($result)){
				?>
				<option value="<?php echo $result[$i]['brand_id']; ?>"><?php echo $result[$i]['brand_name']; ?></option>				
				<?php
				$i++;
			}
		}
		else{
			?>
			<option selected>No brands have been added</option>
			<?php
		}
		?>
	</select>
	<?php 
}

function selectdropCategories(){
	
	?>
	<select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="cid">
		<?php
		$result=select_all_categories_ctr();
		$i=0;
		if ($result!=false) {
			while($i < count($result)){
				?>
				<option value="<?php echo $result[$i]['cat_id']; ?>"><?php echo $result[$i]['cat_name']; ?></option>				
				<?php
				$i++;
			}
		}
		else{
			?>
			<option selected>No categories have been added</option>
			<?php
		}
		?>
	</select>
	<?php 
}
function selectdropCategories1(){
	
	?>
	<select class="form-control" id="floatingSelect" aria-label="Floating label select example" name="cid">
		<?php
		$result=select_all_categories_ctr();
		$i=0;
		if ($result!=false) {
			while($i < count($result)){
				?>
				<option value="<?php echo $result[$i]['cat_id']; ?>"><?php echo $result[$i]['cat_name']; ?></option>				
				<?php
				$i++;
			}
		}
		else{
			?>
			<option selected>No categories have been added</option>
			<?php
		}
		?>
	</select>
	<?php 
}

function showProducts(){

	$result=select_all_products_ctr();
	$i=0;
	if ($result!=false) {
		while($i<count($result))
		{
			?>
			<div class="col-md-2 d-flex align-items-stretch"  >
				<div class="card" style="width: 18rem;  ">
					<div >
						<span style="position: absolute; background-color:  white; opacity: 60%; padding-left: 60px;padding-right: 48.7px;" ><button type="button" class="btn " data-toggle="modal" data-target='<?php echo "#image".$i;?>'><i class="fa-solid fa-camera"></i>  Change image
							</button>
						</span>

					<img src="../images/products/<?php echo $result[$i]['product_image'];  ?>" class="card-img-top">


				</div>
					<div class="card-body"  >

						<h5 class="card-subtitle mb-2 text-muted"><?php echo $result[$i]['product_title'];  ?></h5>
						<h6 class="card-subtitle mb-2 text-muted"><?php echo $result[$i]['product_price'];  ?> GHS</h6>
						<p class="card-text"><?php echo $result[$i]['product_desc'];  ?></p>
						
					</div>
					<div style="position: bottom; padding-left: 30px;">
						
						<button type="button" class="btn " data-toggle="modal" data-target='<?php echo "#exampleModal".$i;?>'><i class="fas fa-user-edit"></i> Edit</button>
						<form class="btn mr-2" method="POST" action="../actions/delete_product.php" onSubmit="return confirm('Do you want to delete this product?') ">
							<button class="btn " type="submit" name="delete"><i class="fas fa-trash"></i> Delete</button>
							<input type="hidden" name="pid" value="<?php echo $result[$i]['product_id'];  ?>">
							<input type="hidden" name="image" value="<?php echo $result[$i]['product_image'];  ?>">
						</form>
					</div>
					
				</div>
				<br>
			</div>
			<div class="modal fade" id='<?php echo "exampleModal".$i;?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel" style="color: black;">Edit Product</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" action="../actions/update_product.php" enctype="multipart/form-data">
								<?php
								selectdropBrands1();
								?>
								<br>
								<?php
								selectdropCategories1();
								?>
								<br>
								<input type="text" style="background: white;" class="form-control" name="title" id="recipient-name" value="<?php echo $result[$i]['product_title'];  ?>" required><br>
								<input type="text" style="background: white;" class="form-control" name="price" id="recipient-name" value="<?php echo $result[$i]['product_price'];  ?>" required><br>
								
								<input type="text" style="background: white;" class="form-control" name="keywords" id="recipient-name" value="<?php echo $result[$i]['product_keywords'];  ?>" required><br>
								<input type="text" style="background: white;" class="form-control" name="sizes" id="recipient-name" value="<?php echo $result[$i]['product_sizes'];  ?>" required><br>
								<textarea style="background: white;" class="form-control" name="description" id="recipient-name"  ><?php echo $result[$i]['product_desc'];  ?></textarea>
								
								<input type="hidden" name="pid" value="<?php echo $result[$i]['product_id'];  ?>">


							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" name="update">Update</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id='<?php echo "image".$i;?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel" style="color: black;">Update Image</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" action="../actions/update_product.php" enctype="multipart/form-data">
								<input type="hidden" name="pid" value="<?php echo $result[$i]['product_id'];  ?>">


							<input type="file" accept="image/*" style="background: white;" class="form-control" name="image[]" id="recipient-name"  ><br>
							
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" name="updateimg">Update</button>
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
		echo "No products added";
	}
}
function viewProducts(){
	$result=select_all_products_ctr();
	$i=0;
	if ($result!=false) {
		while($i<count($result))
		{
			?>
			<div class="col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="../images/products/<?php echo $result[$i]['product_image'];  ?>" class="img-fluid" >
							</a>
							<div class="desc">
								<h2><a href="#"><?php echo $result[$i]['product_title'];  ?></a></h2>
								<span class="price">GH¢ <?php echo $result[$i]['product_price'];  ?></span>
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

function manageOrders(){
	$result=view_orders_ctr();
	$i=0;
	if ($result!=false) {
		while($i<count($result))
		{
			?>
			  <tr>
                                    
                                    <td> <?php echo $result[$i]['order_date'];  ?></td>
                                    <td> <?php echo $result[$i]['invoice_no'];  ?></td>
                                    <td> <?php echo $result[$i]['customer_name'];  ?></td>
                                    
                                    <td><?php echo $result[$i]['order_status'];  ?></td>
                                    <td>
                                     <form method="POST" action="../actions/update_deliv.php" id="<?php echo "deliv".$i;  ?>">
                                     	<input type="hidden" name="oid" value="<?php echo $result[$i]['order_id'];  ?>">
                                     	<input type="hidden" name="email" value="<?php echo $result[$i]['customer_email'];  ?>">
                                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="deliv" onchange="getElementById('<?php echo "deliv".$i;  ?>').submit()">
                                        <?php
                                        	if($result[$i]['deliv_status']=="Processed"){
                                        ?>
                                            <option selected value=" <?php echo $result[$i]['deliv_status'];  ?>"> <?php echo $result[$i]['deliv_status'];  ?></option>
                                            
                                            <option value="Shipped">Shipped</option>
                                            <option value="Delivery">Delivery</option>
                                           	<option value="Arrived">Arrived</option>

                                           	<?php
                                           		}
                                           		else if($result[$i]['deliv_status']=="Shipped"){
                                        ?>
                                            <option selected value=" <?php echo $result[$i]['deliv_status'];  ?>"> <?php echo $result[$i]['deliv_status'];  ?></option>
                                            
                                            <option value="Processed">Processed</option>
                                            <option value="Delivery">Delivery</option>
                                           	<option value="Arrived">Arrived</option>

                                           	<?php
                                           		} else if($result[$i]['deliv_status']=="Delivery"){
                                        ?>
                                            <option selected value=" <?php echo $result[$i]['deliv_status'];  ?>"> <?php echo $result[$i]['deliv_status'];  ?></option>
                                            
                                            <option value="Processed">Processed</option>
                                            <option value="Shipped">Shipped</option>
                                           	<option value="Arrived">Arrived</option>

                                           	<?php
                                           		} else if($result[$i]['deliv_status']=="Arrived"){
                                        ?>
                                            <option selected value=" <?php echo $result[$i]['deliv_status'];  ?>"> <?php echo $result[$i]['deliv_status'];  ?></option>
                                            	<option value="Processed">Processed</option>
                                            <option value="Shipped">Shipped</option>
                                            <option value="Delivery">Delivery</option>
                                           

                                           	<?php
                                           		}
                                           	?>
                              </select>
                          </form>
                               
                           
                        </td> 

                        <td>
                        	<button type="button" class="btn " data-toggle="modal" data-target='<?php echo "#exampleModal".$i;?>'><i class="fas fa-eye"></i> View Order</button>
                        </td>  
                        <td>
                        	<button type="button" class="btn " data-toggle="modal" data-target='<?php echo "#complete".$i;?>' title="Mark Order As Completed"><i class="fas fa-check"></i></button>
                        </td>    
                                </tr>
                           <div class="modal fade" id='<?php echo "exampleModal".$i;?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel" style="color: black;">View Order</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php 
							$order=view_one_order_ctr($result[$i]['order_id']);
							if ($order==false) {
								echo "Order is empty";
							} else{
								?>
								 <?php echo "Amount Spent: ".$order[0]['amt']."<br><br>";  ?>
								<?php 
								$j=0;
								while($j<count($order)){
									?>
									<span style="text-align: left;"><?php echo "Product ".$j+1;  ?></span><br><br>
									<input type="text" style="background: white;" class="form-control" value=" <?php echo "Shoe Name: ".$order[$j]['product_title'];  ?>" disabled><br>
									<input type="text" style="background: white;" class="form-control" value=" <?php echo "Shoe Size: ".$order[$j]['shoe_size'];  ?>" disabled><br>
									<input type="text" style="background: white;" class="form-control" value=" <?php echo "Quantity: ".$order[$j]['qty'];  ?>" disabled><br>
									
									<?php
									$j++;
								}
							}

							?>
							


							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								
						</div>
					</div>
				</div>
			</div>   
			<div class="modal fade" id='<?php echo "complete".$i;?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel" style="color: black;">Mark Order As Completed</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							 <p class="modal-card-title">Do you want to mark <?php echo $result[$i]['customer_name'];  ?>'s order as completed?</p>
							

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
								  <form method="POST" action="../actions/complete_order.php">
          <input type="hidden" value="<?php echo $result[$i]['order_id'];  ?>" name="oid">
          <button type="submit" class="btn btn-primary" name="update">Yes</button>
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
		echo "No orders made";
	}

}
?>

