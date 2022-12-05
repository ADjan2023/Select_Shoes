<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("../PHPMailer/src/Exception.php");
require("../PHPMailer/src/PHPMailer.php");
require("../PHPMailer/src/SMTP.php");
//making action  aware of controller
include("../controllers/advert_controller.php");

//collect form data
if (isset($_POST['id'])) {
	$id=$_POST['id'];
	$status=$_POST['status'];
	$email=$_POST['cemail'];
	
	if($status=="Yes"){
	if(update_advert_ctr($id,$status)==True){
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
	$mail->Subject="Your Advert Is Approved";
	$mail->Body="Your advert has been approved by the admin and is currently on the select shoes main page!";
	$mail->send();
	
		header('Location:../Admin/manage_adverts.php');
	}
	
}
else{
	if(update_advert_ctr($id,$status)==True){
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
	$mail->Subject="Your Advert Has Been Taken Down";
	$mail->Body="The time for your advert to run on our page is over. If you want your advert to continue running, please submit your company details again and make payment!";
	$mail->send();
	
		header('Location:../Admin/manage_adverts.php');
	}

}
}
?>
