<?php
//Begin session
require('session.php');
//Require my functions.php file
require('../function.php');

//Build the login script
if(isset($_POST['signin'])){
	//Extract the user input and assign to variables
	$user = sanitize($_POST['user']);
	$pass = $_POST['pwd'];

	//Search DB for the entered data above
	$sqlCheck = "SELECT * FROM people WHERE user_email = '$user' AND user_pass=md5('$pass')";
	
	//Execute the mysqli query
	$sqlDo = $dbc->query($sqlCheck);

	//count the number of rows that contain the data
    $rowCount = mysqli_num_rows($sqlDo);

    //Check if there is a matching row with the user data
    if($rowCount<=0){
    	$toast = "fail";
        header("Refresh:3,url=../login.php");
    }
    else{
    	$toast = "success";
        $_SESSION['email'] = $user;
        header("Refresh:3,url=../user.php");
    }
}
else{
	header('Location:../login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<!--Toastr -->
<link rel="stylesheet" type="text/css" href="dist/css/toastr.css" />
</head>
<body>
	<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 
<!-- Toastr -->
<script src="dist/js/toastr.min.js"></script>
</body>
</html>

<?php
if(isset($toast) && $toast==='success'){
  echo "<script>toastr.success('You have been successfully registered', 'Success')</script>";
}

if(isset($toast) && $toast==='fail'){
  echo "<script>toastr.error('You have not been successfully registered', 'Failure')</script>";
}
?>