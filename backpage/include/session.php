<?php
//PHP SESSSIONS
//start the session
session_start();

//Assign default session id to custom variable
$sessID = session_id();

//echo session ID - intended for troubleshooting
/*echo $sessID;*/

//Empty variable to be used for session email
$user_session_email;
$sessEmail;

/*Create an email session*/
if(isset($_POST['user']) && isset($_POST['signin'])){
	$_SESSION['email']=$_POST['user'];

	$GLOBALS['user_session_email'] = $_SESSION['email'];
	//echo $_SESSION['email']; //<-For testing
	//echo $user_session_email; //<-For testing
}
if(isset($_SESSION['email']) && $_SESSION['email']!==null){
	//$sessEmail = $_SESSION['email'];
	$GLOBALS['sessEmail'] = $_SESSION['email'];
	//echo "$sessEmail";
	//echo $_SESSION['email']; //<-For testing
	//echo $user_session_email; //<-For testing
}
?>