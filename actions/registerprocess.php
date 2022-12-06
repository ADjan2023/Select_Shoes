<?php
//making action  aware of controller
require("../controllers/customer_controller.php");
session_start();


if(isset($_POST['register'])){
	$fname=$_POST['fname'];
	$lname=$_POST['name'];
$email=$_POST['email'];
$unencryptpass=$_POST['password'];
$confirmpass=$_POST['password2'];
$password=password_hash($unencryptpass, PASSWORD_DEFAULT); 
$country=$_POST['country'];
$city=$_POST['city'];
$contact=$_POST['contact'];
$role=2;


	if ( $unencryptpass===$confirmpass) {
		if (verify_customer_ctr($email)==TRUE){
			
			$_SESSION['error'] = 'User Already Exists!';		
			header('Location:../Login/register.php');
		}	
		else 

		if(add_customer_ctr($fname,$lname,$email,$password,$country,$city,$contact,$role)===TRUE){
			$_SESSION['registered'] = 'Yes';
			header('Location:../Login/login.php');
		}
		
	}
	else{
		
		$_SESSION['error'] = 'Unable to register user!';		
		header('Location:../Login/register.php');
	}
}
else {
	
	header('Location:../Login/register.php');
}
?>
