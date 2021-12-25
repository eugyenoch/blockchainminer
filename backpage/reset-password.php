<?php
//Require my functions.php file
include('function.php');

if(isset($_GET['em'])){
 $email = $_GET['em'];
 //echo $email; //<- For testing purposes
}

//FORM VALIDATION
$pass=""; $passErr=""; $cpass=""; $cpassErr=""; $cpasses="";

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['pwd'])){
       echo "<style>.note{display:none !important;</style>";
        $passErr = "Password cannot be empty";
    }
    else{
        $pass = md5($_POST['pwd']);
    }

    if(empty($_POST['cpwd'])){
       echo "<style>.note{display:none !important;</style>";
        $cpassErr = "Confirm password cannot be empty";
    }
    else{
        $cpass = md5($_POST['cpwd']);
    }

    if($pass !== $cpass){
        $cpasses = "Both passwords do not match";
    }
}
if(isset($_POST['reset'])){
    if($pass===$cpass){
        $sql = "UPDATE `people` SET `user_pass` = '$pass' WHERE `people`.`user_email`='$email'";
        $sqlExec = $dbc->query($sql);
        if($sqlExec===TRUE){
            $toast = "success";
        header("Refresh:2,url=./login.php");
       }else{
        $toast = "fail";
       } 
     }
   }
else{
  //header('Location:login.php');
}
$dbc->close();
?>

<!DOCTYPE html>
<html lang="en" prefix="og:http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <title>Reset Password | Earthminers</title>
  <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
  <meta name="description" content="Reset your password to the earthminers member area" />
  <link rel="shortcut icon" href="" /> 
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Reset Password | Earthminers" />
  <meta property="og:description" content="Reset your password to the earthminers member area" />
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
    <h3 class="login-box-msg">Reset Your Password</h3>
    <div class="mt-3"></div>
    <form action="<?php htmlentities($_SERVER['PHP_SELF']);?>" method="post" name="resetPassword">
      <div class="form-group has-feedback">
        <input type="password" class="form-control sty1" placeholder="Password" name="pwd" pattern="(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).{8,}" title="password must contain atleast 1 digit, atleast 1 uppercase letter, atleast 1 lowercase letter and minimum of 8 characters in all" required><span class="note"><small>atleast 1 digit, atleast 1 uppercase letter, atleast 1 lowercase letter and minimum of 8 characters in all</small></span>
      <span class="text-danger"><?php if(isset($passErr) && $passErr!==null){echo $passErr;} ?></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control sty1" placeholder="Confirm password" name="cpwd" title="Confirm password is required" required><span class="note"><small>must match password entered in the box above</small></span>
        <span class="text-danger"><?php if(isset($cpassErr) && $cpassErr!==null){echo $cpassErr;} ?></span><br>
          <span class="text-danger"><?php if(isset($cpasses) && $cpasses!==null){echo $cpasses;} ?></span>

      </div>
      <div>
        <div class="col-xs-8">
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="reset">Reset Password</button>
        </div>
        <!-- /.col --> 
      </div>
    </form>
    <div class="social-auth-links text-center">
      <p><small>Enter your new passwords to reset it - both passwords must match.</small></p>
  </div>
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
if(isset($toast) && $toast==='success'){
  echo "<script>toastr.success('You have succesfully reset your password', 'Success')</script>";
}

if(isset($toast) && $toast==='fail'){
  echo "<script>toastr.error('We cannot let you reset password', 'Wrong Move There!')</script>";
}
?>