<?php
include("../controllers/product_controller.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("../PHPMailer/src/Exception.php");
require("../PHPMailer/src/PHPMailer.php");
require("../PHPMailer/src/SMTP.php");

if(isset($_POST['deliv'])){
	
$oid=$_POST['oid'];
$status=$_POST['deliv'];
$email=$_POST['email'];
	if(update_deliv_ctr($status,$oid)==TRUE){
		if($status=="Shipped"){
			$mail=new PHPMailer(true);

	$mail->isSMTP();
	$mail->Host='smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'ayeyidjan@gmail.com';
	$mail->Password = 'ksqjfuvcosiofcoo';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->setFrom('ayeyidjan@gmail.com');
	
$mail->addAddress($email);
	
	$mail->isHTML(true);
	$mail->Subject="Order Shipped!";
	$mail->Body="Your package has been shipped from the warehouse and will arrive in Ghana soon!";
	$mail->send();
	
	
	header('Location:../Admin/manage_orders.php');
	
		} else if($status=="Delivery"){
			$mail=new PHPMailer(true);

	$mail->isSMTP();
	$mail->Host='smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'ayeyidjan@gmail.com';
	$mail->Password = 'ksqjfuvcosiofcoo';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->setFrom('ayeyidjan@gmail.com');
	
$mail->addAddress($email);
	
	$mail->isHTML(true);
	$mail->Subject="Order Is Being Delivered!";
	$mail->Body="Your package has arrived at the port and will be delivered to you soon!";
	$mail->send();
	
	
	header('Location:../Admin/manage_orders.php');
	
		}
		else if($status=="Arrived"){
			$mail=new PHPMailer(true);

	$mail->isSMTP();
	$mail->Host='smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'ayeyidjan@gmail.com';
	$mail->Password = 'ksqjfuvcosiofcoo';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->setFrom('ayeyidjan@gmail.com');
	
$mail->addAddress($email);
	
	$mail->isHTML(true);
	$mail->Subject="Order has Arrived!";
	$mail->Body="Thank you for purchasing from Sneaker Select. We appreciate You!";
	$mail->send();
	
	
	header('Location:../Admin/manage_orders.php');
	
		}

			
		}
		}
		





?>