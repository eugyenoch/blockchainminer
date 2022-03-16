<?php
//Require my functions.php file and also begin session
require('../function.php');

require('cookie.php');

//Build the delete withdrawal request script
if(isset($_GET['dw']) && $_GET['dw']!==null){
	//Extract the user input and assign to variables
	$dw = $_GET['dw'];

//echo a warning statement
echo"<script>window.alert('Click the OK button to permanently delete this withdraw request')</script>";

//Run Delete SQL query
	$withdraw_request_delete ="DELETE FROM `withdraw` WHERE `wtxn`='$dw'";
	if($dbc->query($withdraw_request_delete)){
		echo "<script>location.href='../table-data-withdraw.php'</script>";}
		else{header('Location:../table-data-withdraw.php');}
   }


   //Build the delete plan purchase request script
if(isset($_GET['df']) && $_GET['df']!==null){
	//Extract the user input and assign to variables
	$df = $_GET['df'];

//echo a warning statement
echo"<script>window.alert('Click the OK button to permanently delete this purchase request')</script>";
//Run Delete SQL query
	$fund_request_delete = "DELETE FROM `fund` WHERE `ftxn`='$df'";
	if($dbc->query($fund_request_delete)){
		echo "<script>location.href='../table-data-fund.php'</script>";}
		else{header('Location:../table-data-fund.php');}
   }

   if(isset($_GET['plan']) && $_GET['plan']==='shield'){
   	$ftxn = "TXN".mt_rand(100000,999999);

   	$select_shield = "INSERT INTO fund(user_email,ftxn,fundname,currency,amount) VALUES('$sessEmail','$ftxn','Shield','USD','200')";

   	$select_shield_execute = $dbc->query($select_shield);

   	if($select_shield_execute){
   		header("Location:../pages-invoice.php");
   	}
   }

   if(isset($_GET['plan']) && $_GET['plan']==='shield2'){
   	$ftxn = "TXN".mt_rand(100000,999999);

   	$select_shield2 = "INSERT INTO fund(user_email,ftxn,fundname,currency,amount) VALUES('$sessEmail','$ftxn','Shield 2','USD','525')";

   	$select_shield2_execute = $dbc->query($select_shield2);
   	
   	if($select_shield2_execute){
   		header("Location:../pages-invoice.php");
   	}
   }

   if(isset($_GET['plan']) && $_GET['plan']==='farm'){
   	$ftxn = "TXN".mt_rand(100000,999999);

   	$select_farm = "INSERT INTO fund(user_email,ftxn,fundname,currency,amount) VALUES('$sessEmail','$ftxn','Farm','USD','1550')";

   	$select_farm_execute = $dbc->query($select_farm);
   	
   	if($select_farm_execute){
   		header("Location:../pages-invoice.php");
   	}
   }

   if(isset($_GET['plan']) && $_GET['plan']==='farm2'){
   	$ftxn = "TXN".mt_rand(100000,999999);

   	$select_farm2 = "INSERT INTO fund(user_email,ftxn,fundname,currency,amount) VALUES('$sessEmail','$ftxn','Farm 2','USD','5250')";

   	$select_farm2_execute = $dbc->query($select_farm2);
   	
   	if($select_farm2_execute){
   		header("Location:../pages-invoice.php");
   	}
   }

   if(isset($_GET['plan']) && $_GET['plan']==='commercial'){
   	$ftxn = "TXN".mt_rand(100000,999999);

   	$select_commercial = "INSERT INTO fund(user_email,ftxn,fundname,currency,amount) VALUES('$sessEmail','$ftxn','Commercial','USD','10520')";

   	$select_commercial_execute = $dbc->query($select_commercial);
   	
   	if($select_commercial_execute){
   		header("Location:../pages-invoice.php");
   	}
   }