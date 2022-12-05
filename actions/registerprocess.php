<?php
//making action  aware of controller
require("../controllers/customer_controller.php");
session_start();
//collect form data

if(isset($_POST['register'])){
	$name=$_POST['fullname'];
$email=$_POST['email'];
$unencryptpass=$_POST['password'];
$confirmpass=$_POST['password2'];
$password=password_hash($unencryptpass, PASSWORD_DEFAULT); 
$country=$_POST['country'];
$city=$_POST['city'];
$contact=$_POST['contact'];
$role=2;

if(add_customer_ctr($name,$email,$password,$country,$city,$contact,$role)){
	echo "hi";
} else{
	echo "bye";
}
}
	/*if ( $unencryptpass==$confirmpass) {

		if(add_customer_ctr($name,$email,$password,$country,$city,$contact,$role)==TRUE){
			header('Location:../Login/login.php');
		}
		else{
			
			$_SESSION['error'] = 'User Already Exists!';		
			header('Location:../Login/register.php');
		}	
	}
	else{
		
		$_SESSION['error'] = 'Unable to register user!';		
		header('Location:../Login/register.php');
	}
}*/
else {
	
	header('Location:../Login/register.php');
}
?>
