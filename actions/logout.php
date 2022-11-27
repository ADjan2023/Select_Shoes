<?php
session_start();
//Destroy session
session_destroy();
header("location:../index.php"); // redirects to login page
        exit;
?>