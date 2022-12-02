
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("../PHPMailer/src/Exception.php");
require("../PHPMailer/src/PHPMailer.php");
require("../PHPMailer/src/SMTP.php");

require("../controllers/product_controller.php");
if (isset($_POST['send'])) {
$result=select_newsletter_ctr();
if ($result==true) {
$i=0;

	$mail=new PHPMailer(true);

	$mail->isSMTP();
	$mail->Host='smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'ayeyidjan@gmail.com';
	$mail->Password = 'ksqjfuvcosiofcoo';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->setFrom('ayeyidjan@gmail.com');
	while ($i<count($result)) {
$mail->addAddress($result[$i]['customer_email']);
	$i++;
	}
	$mail->isHTML(true);
	$mail->Subject=$_POST['subject'];
	$mail->Body=$_POST['message'];
	$mail->send();
	
	session_start();
	$_SESSION['newsletter']='success';
	echo "
	<script>
	document.location.href = '../Admin/newsletter.php';
	</script>
	";
	



}
else{
	echo "
	<script>
	alert('Sent Successfully');
	document.location.href = '../Admin/newsletter.php';
	</script>
	";
}


	

}



?>