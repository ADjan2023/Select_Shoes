<?php
include("../controllers/product_controller.php");


$pid=$_POST['pid'];
$img=$_POST['image'];

if(isset($_POST['delete'])){
if(unlink("../images/products/".$img)){
	if(delete_product_ctr($pid)==TRUE){

			header('Location:../Admin/admin_dash.php');
		}

else{
	echo "Unable to delete image";
}
}
else if(!unlink("../images/products/".$img)){
	if(delete_product_ctr($pid)==TRUE){

			header('Location:../Admin/view_product.php');
		}
}
}


else{
	header('Location:../Admin/view_product.php');
}




?>