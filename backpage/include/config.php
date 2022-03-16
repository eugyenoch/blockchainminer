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
$SQL_profile_ex = $dbc->query($SQLprofile);
foreach($SQL_profile_ex as $info){extract($info);
//$profile_photo = '../upload/'.$photo;
}

$sqlWallet = "SELECT * FROM `wallet` WHERE `user_email`='$sessEmail'";
$SQL_wallet_ex = $dbc->query($sqlWallet);
foreach($SQL_wallet_ex as $wallet_info){extract($wallet_info);}

$sqlAdmin = "SELECT * FROM `admin` WHERE `user_email`='$sessEmail'";
$SQL_admin_ex = $dbc->query($sqlAdmin);
foreach($SQL_admin_ex as $admin_info){extract($admin_info);}

$sqlWithdraw = "SELECT * FROM `withdraw` WHERE `user_email`='$sessEmail'";
$SQL_withdraw_ex = $dbc->query($sqlWithdraw);
foreach($SQL_withdraw_ex as $withdraw_info){extract($withdraw_info);}

$sqlFund = "SELECT * FROM `fund` WHERE `user_email`='$sessEmail'";
$SQL_fund_ex = $dbc->query($sqlFund);
foreach($SQL_fund_ex as $fund_info){extract($fund_info);}
}
?>