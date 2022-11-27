<?php
include("../controllers/product_controller.php");


$cname=$_POST['cname'];
if(isset($_POST['save'])){
	if(add_category_ctr($cname)==TRUE){
			header('Location:../Admin/admin_dash.php');
		}

}




?>