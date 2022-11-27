<?php
include("../controllers/cart_controller.php");

session_start();
if(isset($_POST['add'])){
	$cid=$_SESSION['id'];
	$invoice=mt_rand();
	$date=date("Y/m/d");
	$status="pending";
	if(create_order_ctr($cid,$invoice,$date,$status)==TRUE){
	$result=show_cart_ctr($cid,0);
	$oid=show_order_ctr($cid,$invoice);
	$_SESSION['invoice']=$invoice;
	$i=0;
	while($i<count($result)){
		order_details($oid['order_id'],$result[$i]['p_id'],$result[$i]['qty']);
		$i++;
	}

			header('Location:../view/order-confirm.php');
		}

}




?>