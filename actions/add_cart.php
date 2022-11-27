<?php
session_start();
include("../controllers/cart_controller.php");
 $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    if(isset($_POST['add'])){
	$pid=$_POST['pid'];
	$quantity=$_POST['quantity'];
	if(add_to_cart_ctr($pid,$ip,$_SESSION['id'],$quantity)==TRUE){
			header('Location:../view/index.php');
		}

} else
    if(isset($_POST['add1'])){
    $pid=$_POST['pid'];
    $quantity=$_POST['quantity'];

    if(add_to_cart_ctr($pid,$ip,$_SESSION['id'],$quantity)==TRUE){
            header('Location:../view/cart.php');
        }

else{
    header('Location:../view/index.php');
}

}




?>