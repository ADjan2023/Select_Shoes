<?php
//making action  aware of controller
include("../controllers/customer_controller.php");
include("../error/errordisplay");

//collect form data
$name=$_POST['fullname'];
$email=$_POST['email'];
$unencryptpass=$_POST['password'];
$confirmpass=$_POST['password2'];
$password=password_hash($unencryptpass, PASSWORD_DEFAULT); 
$country=$_POST['country'];
$city=$_POST['city'];
$contact=$_POST['contact'];
$role=2;
if(isset($_POST['register'])){
	if ( $unencryptpass==$confirmpass) {

		if(add_customer_ctr($name,$email,$password,$country,$city,$contact,$role)==TRUE){
			header('Location:../Login/login.php');
		}
		else{
			session_start();
			$_SESSION['error'] = 'Unable to register user!';		
			header('Location:../Login/register.php');
		}	
	}
	else{
		session_start();
		$_SESSION['error'] = 'Unable to register user!';		
		header('Location:../Login/register.php');
	}
}
else {
	
	header('Location:../Login/register.php');
}
?>
