<?php
include("../controllers/product_controller.php");



if(isset($_POST['add'])){
	$allowTypes = array('jpg','png','jpeg','gif'); 
	$bid=$_POST['bid'];
	$cid=$_POST['cid'];
	$title=$_POST['title'];
	$price=$_POST['price'];
	$sizes=$_POST['sizes'];
	 
	$keywords=$_POST['keywords'];
	$description=$_POST['description'];

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
	




move_uploaded_file($_FILES["image"]["tmp_name"][0],$output_dir."/".$NewImageName );
	if(add_product_ctr($cid,$bid,$title,$price,$NewImageName,$keywords,$description,$sizes)==TRUE){
		header('Location:../Admin/view_product.php');
	}
	else{
		header('Location:../Admin/admin_dash.php');
	}

}
else{
	header('Location:../Admin/admin_dash.php');
}



?>