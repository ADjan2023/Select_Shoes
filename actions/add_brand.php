<?php
include("../controllers/product_controller.php");



if(isset($_POST['save'])){
	$bname=$_POST['bname'];
	if(add_brand_ctr($bname)==TRUE){
			header('Location:../Admin/admin_dash.php');
		}

}




?>