
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("../PHPMailer/src/Exception.php");
require("../PHPMailer/src/PHPMailer.php");
require("../PHPMailer/src/SMTP.php");

require("../controllers/product_controller.php");
if (isset($_POST['send'])) {
	$email=$_POST['email'];
	$message=$_POST['message'];
	$subject=$_POST['subject'];

	$mail=new PHPMailer(true);

	$mail->isSMTP();
	$mail->Host='smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'ayeyidjan@gmail.com';
	$mail->Password = 'ksqjfuvcosiofcoo';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->setFrom($email);
	
$mail->addAddress('ayeyidjan@gmail.com');
	
	$mail->isHTML(true);
	$mail->Subject=$_POST['subject'];
	$mail->Body=$_POST['message'];
	$mail->send();
	
	session_start();
	$_SESSION['contact']='success';
	header("Location:../view/contact.php");
	



}
else{
	header("../view/contact.php");
}


	



?>