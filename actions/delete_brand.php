<?php
include("../controllers/product_controller.php");


$bid=$_POST['bid'];
if(isset($_POST['delete'])){
	if(delete_brand_ctr($bid)==TRUE){
			header('Location:../Admin/admin_dash.php');
		}

}
else{
	header('Location:../Admin/admin_dash.php');
}




?>