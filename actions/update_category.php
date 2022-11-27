<?php
include("../controllers/product_controller.php");



if(isset($_POST['edit'])){
	$cname=$_POST['cname'];
$cid=$_POST['cid'];
	if(update_category_ctr($cname,$cid)==TRUE){
			header('Location:../Admin/admin_dash.php');
		}

}




?>