<?php
//making action  aware of controller
include("../controllers/advert_controller.php");

//collect form data


if(isset($_POST['delete'])){
	$pid=$_POST['cid'];
$img=$_POST['image'];
if(unlink("../images/adverts/".$img)){
	if(delete_advert_ctr($pid)==TRUE){

			header('Location:../Admin/manage_adverts.php');
		}

else{
	echo "Unable to delete image";
}
}
else if(!unlink("../images/adverts/".$img)){
	if(delete_advert_ctr($pid)==TRUE){

			header('Location:../Admin/manage_adverts.php');
		}
}
}


else{
	header('Location:../Admin/manage_adverts.php');
}




?>
