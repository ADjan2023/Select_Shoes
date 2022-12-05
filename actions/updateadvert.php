<?php
//making action  aware of controller
include("../controllers/advert_controller.php");

//collect form data
if (isset($_POST['id'])) {
	$id=$_POST['id'];
	$status=$_POST['status'];
	
	
	if(update_advert_ctr($id,$status)==True){
		header('Location:../Admin/manage_adverts.php');
	}
	
}



?>
