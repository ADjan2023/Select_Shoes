<?php
include("../controllers/product_controller.php");




//collect form data
if (isset($_POST['cid'])) {
	$id=$_POST['cid'];
	$status=$_POST['newsletter'];
	$fstatus;
	if($status=='Yes'){
$fstatus='No';
	}
	else{
	$fstatus='Yes';	
	}
	if(update_newsletter_ctr($id,$fstatus)==True){
		header('Location:../view');
	}
	
}







?>