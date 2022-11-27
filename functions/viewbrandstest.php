<?php
include("../controllers/product_controller.php");


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
							<div class="modal fade" id="<?php echo "delModal".$i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 style="color: black;" class="modal-title" id="exampleModalLabel">Edit Brand</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<form action="../actions/delete_brand.php" method="POST" >
														<div class="form-group">
															<h6>Do you want to delete this brand</h6>
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

							<button class="btn btn-sm" type="button"   data-bs-toggle="modal" data-bs-target="<?php echo "#delModal".$i;?>"><i class="fa fa-trash"></i></button>
							<button class="btn btn-sm" type="button"  data-bs-toggle="modal" data-bs-target="<?php echo "#exampleModal".$i;?>" ><i class="fa fa-user-edit"></i></button>
							
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

?>


