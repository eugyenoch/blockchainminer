<?php
//Require my functions.php file
include('function.php');

//Build the login script
if(isset($_POST['confirm'])){
  //Extract the user input and assign to variables
  $user = sanitize($_POST['user']);

  //Search DB for the entered data above
  $sqlCheck = "SELECT * FROM people WHERE user_email = '$user'";
  
  //Execute the mysqli query
  $sqlDo = $dbc->query($sqlCheck);

  //count the number of rows that contain the data
    $rowCount = mysqli_num_rows($sqlDo);

    //Check if there is no matching row with the user data
    if($rowCount<=0){
      $toast = "fail";
    }
    else{
      $toast = "success";
        header("Refresh:2,url=reset-password.php?em=$user");
    }
}
else{
  //header('Location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en" prefix="og:http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <title>Confirm Email Address | Earthminers</title>
  <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
  <meta name="description" content="Confirm your email address to continue to update password" />
  <link rel="shortcut icon" href="" /> 
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Confirm Email Address | Earthminers" />
  <meta property="og:description" content="onfirm your email address to continue to update password" />
  <meta property="og:image" content="" />
  <!-- v4.0.0-alpha.6 -->
  <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css" />

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" />

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/style.css" />
  <link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css" />
  <link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css" />

  <!--Toastr -->
  <link rel="stylesheet" type="text/css" href="dist/css/toastr.css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-box-body">
    <h3 class="login-box-msg">Confirm Your Email</h3><br>
    <form action="<?php htmlentities($_SERVER['PHP_SELF']);?>" method="post" name="loginForm">
      <div class="form-group has-feedback">
        <input type="email" class="form-control sty1" placeholder="username" name="user" title="Enter your registered email address" required><br>
      </div>
      <div>
        <div class="col-xs-8">
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="confirm">Confirm</button>
        </div>
        <!-- /.col --> 
      </div>
    </form>
    <div class="social-auth-links text-center">
      <p><small>Confirm your registered email address and if that's found, then you will be re-directed to update your password effectively.<br>Your username is your registered email address</small></p>
  <!-- /.login-box-body --> 
</div>
<!-- /.login-box --> 

<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="dist/js/niche.js"></script>

<!-- Toastr -->
<script src="dist/js/toastr.min.js"></script>
</body>
</html>

<?php
if(isset($toast) && $toast==='success'){echo "<script>toastr.success('You will be redirected shortly', 'Success')</script>";}

if(isset($toast) && $toast==='fail'){echo "<script>toastr.error('You cannot update password', 'Wrong credentials')</script>";}
?>