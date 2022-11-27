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
					<img src="../images/products/<?php echo $result[$i]['product_image'];  ?>" class="card-img-top">
					<div class="card-body"  >

						<h5 class="card-subtitle mb-2 text-muted"><?php echo $result[$i]['product_title'];  ?></h5>
						<h6 class="card-subtitle mb-2 text-muted"><?php echo $result[$i]['product_price'];  ?> GHS</h6>
						<p class="card-text"><?php echo $result[$i]['product_desc'];  ?></p>
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
								<input type="file" style="background: white;" class="form-control" name="image[]" id="recipient-name"><br>
								<input type="text" style="background: white;" class="form-control" name="keywords" id="recipient-name" value="<?php echo $result[$i]['product_keywords'];  ?>" required><br>
								<textarea style="background: white;" class="form-control" name="description" id="recipient-name"  ><?php echo $result[$i]['product_desc'];  ?></textarea>
								<input type="hidden" name="image" value="<?php echo $result[$i]['product_image'];  ?>">
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
?>

