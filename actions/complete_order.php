<?php
include("../controllers/product_controller.php");


session_start();
if(isset($_POST['update'])){
	$oid=$_POST['oid'];
	if(complete_order_ctr($oid)==TRUE){
			header('Location:../Admin/manage_orders.php');
		}

}




?>