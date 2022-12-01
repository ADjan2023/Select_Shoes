<?php
include("../controllers/product_controller.php");



if(isset($_POST['deliv'])){
	
$oid=$_POST['oid'];
$status=$_POST['deliv'];
	if(update_deliv_ctr($status,$oid)==TRUE){
			header('Location:../Admin/manage_orders.php');
		}

}




?>