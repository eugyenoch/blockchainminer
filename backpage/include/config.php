<?php
//Begin session and include the session file
include('session.php');

define('SERVER', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'minear');

$dbc = new mysqli(SERVER,USER,PASS,DB);

if($dbc->connect_error){
	die("Connection failed: ".$dbc->connect_error);
}

if(isset($_SESSION['email']) && $_SESSION['email']!==null){ 
$SQLprofile = "SELECT * FROM `people` WHERE `user_email`='$sessEmail'";
$SQLex = $dbc->query($SQLprofile);
foreach($SQLex as $info){extract($info);
//$profile_photo = '../upload/'.$photo;
}

$sqlWallet = "SELECT * FROM `wallet` WHERE `user_email`='$sessEmail'";
$SQLex2 = $dbc->query($sqlWallet);
foreach($SQLex2 as $wallet_info){extract($wallet_info);}

$sqlAdmin = "SELECT * FROM `admin` WHERE `user_email`='$sessEmail'";
$SQLex3 = $dbc->query($sqlAdmin);
foreach($SQLex3 as $admin_info){extract($admin_info);}
}
?>