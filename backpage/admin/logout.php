<?php
//Begin the session
session_start();

if(isset($_SESSION['email'])){
//Remove all session variables
session_unset();

//Destroy the session
session_destroy();

//Redirect to login
header('Location:./login.php');
} 
else{
	header('Location:../page-404.php');
}