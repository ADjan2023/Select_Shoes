<?php
include("../controllers/product_controller.php");



if(isset($_POST['edit'])){
	$bname=$_POST['bname'];
$bid=$_POST['bid'];
	if(update_brand_ctr($bname,$bid)==TRUE){
			header('Location:../Admin/admin_dash.php');
		}

}




?>