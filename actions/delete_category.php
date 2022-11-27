<?php
include("../controllers/product_controller.php");


$cid=$_POST['cid'];
if(isset($_POST['delete'])){
	if(delete_category_ctr($cid)==TRUE){
			header('Location:../Admin/admin_dash.php');
		}

}
else{
	header('Location:../Admin/admin_dash.php');
}




?>