<?php
include("../controllers/product_controller.php");





if(isset($_POST['update'])){

	$pid=$_POST['pid']; 
	$bid=$_POST['bid'];
	$cid=$_POST['cid'];
	$title=$_POST['title'];
	$price=$_POST['price'];
	$keywords=$_POST['keywords'];
	$description=$_POST['description'];
	
	$sizes=$_POST['sizes'];







	if(update_product_ctr($cid,$bid,$title,$price,$keywords,$description,$sizes,$pid)==TRUE){

			header('Location:../Admin/view_product.php');
		}
		

} else if(isset($_POST['updateimg'])){

	$allowTypes = array('jpg','png','jpeg','gif');
	$pid=$_POST['pid']; 
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
	if(update_image_ctr($NewImageName,$pid)==TRUE){

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