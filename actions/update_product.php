<?php
include("../controllers/product_controller.php");





if(isset($_POST['update'])){

	$allowTypes = array('jpg','png','jpeg','gif');
	$pid=$_POST['pid']; 
	$bid=$_POST['bid'];
	$cid=$_POST['cid'];
	$title=$_POST['title'];
	$price=$_POST['price'];
	$keywords=$_POST['keywords'];
	$description=$_POST['description'];
	$img=$_POST['image'];

	//image upload
	$output_dir = "../images/products/";/* Path for file upload */
	$RandomNum   = time();
	$ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
	$ImageType      = $_FILES['image']['type'][0];
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	$ImageExt=str_replace('.','',$ImageExt);
	$ImageName=preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
	$NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
	$ret[$NewImageName]= $output_dir.$NewImageName;
	



if(empty($ImageName)!=TRUE){
	unlink("../images/products/".$img);
move_uploaded_file($_FILES["image"]["tmp_name"][0],$output_dir."/".$NewImageName );
	if(update_product_ctr($cid,$bid,$title,$price,$NewImageName,$keywords,$description,$pid)==TRUE){

			header('Location:../Admin/view_product.php');
		}
		else{
	echo "Unable to delete image";
}
}
else{
	if(update_product_ctr($cid,$bid,$title,$price,$img,$keywords,$description,$pid)==TRUE){

			header('Location:../Admin/view_product.php');
		}
		else{
	echo "Unable to delete image";
}
}

}


else{
	header('Location:../Admin/admin_dash.php');
}




?>