<?php
//Form validation
//Import my security function from function.php
include('function.php');
//Define empty variables
$fname = $lname = $email = $pass = $cpass = "";

//Define empty error variables
$fnameErr = $lnameErr = $emailErr = $passErr = $cpassErr = $cpassesErr = $checkErr = ""; 

//Test for valid(empty) and invalid(non-empty) form fields
if($_SERVER['REQUEST_METHOD']=="POST"){
  if(empty($_POST['fname'])){
    $fnameErr = "Firstname is required";
  }
  else{
    $fname = sanitize($_POST['fname']);
  }

  if(empty($_POST['lname'])){
    $lnameErr = "Lastname is required";
  }
  else{
    $lname = sanitize($_POST['lname']);
  }

  if(empty($_POST['email'])){
    $emailErr = "Email is required";
  }
  else{
    $email = sanitize($_POST['email']);
  }

  if(empty($_POST['pwd'])){
    echo "<style>.note{display:none !important;</style>";
    $passErr = "Password is required";
  }
  else{
    $pass = md5($_POST['pwd']);
  }

  if(empty($_POST['cpwd'])){
    echo "<style>.note{display:none !important;</style>";
    $cpassErr = "Confirm password is required";
  }
  else{
    $cpass = md5($_POST['cpwd']);
  }

  if($pass !== $cpass){
    $cpassesErr = "Both passwords do not match";
  }

  if(!isset($_POST['agreement'])){
    $checkErr = "Please agree to our terms";
  }
}
?>

<?php
if(isset($_POST['reg'])){
  if($pass===$cpass){
  $sqlIns = "INSERT INTO people(firstname,lastname,user_email,user_pass)VALUES('$fname','$lname','$email','$cpass')";
  $sqlC = $dbc->query($sqlIns);
 if($sqlC){
  $toast = "success";
  header("Refresh:2,url=login.php");
 }else{
  $toast = "fail";
 } 
}
}
 $dbc->close();

?>

<!DOCTYPE html>
<html lang="en" prefix="og:http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>The Earthminers Office | User Registration Area</title>
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
<meta name="description" content="Register to join the earthminers member area" />

<link rel="shortcut icon" href="" /> 
  <meta property="og:type" content="website" />
  <meta property="og:title" content="The Earthminers Office | User Registration Area" />
  <meta property="og:description" content="Register to join the earthminers member area" />
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
  <style type="text/css">
    .err{color:indianred;}
  </style>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-box-body">
    <h3 class="login-box-msg">Sign Up</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="regForm" novalidate>
      <div class="form-group has-feedback">
        <input type="text" name="fname" class="form-control sty1" placeholder="Firstname" required />
        <span class="err"><?= $fnameErr; ?></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="lname" class="form-control sty1" placeholder="Lastname" required />
        <span class="err"><?= $lnameErr; ?></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control sty1" placeholder="Email" title="Your email is your username" required />
        <span class="err"><?= $emailErr; ?></span>        
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="pwd" class="form-control sty1" placeholder="Password" pattern="(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).{8,}" title="password must contain atleast 1 digit, atleast 1 uppercase letter, atleast 1 lowercase letter and minimum of 8 characters in all" required />
      <span class="note"><small>atleast 1 digit, atleast 1 uppercase letter, atleast 1 lowercase letter and minimum of 8 characters in all</small></span>
      <span class="err"><?= $passErr; ?></span>
    </div>

      <div class="form-group has-feedback">
        <input type="password" name="cpwd" class="form-control sty1" title="Confirm password must match the initial password entered in the box above" placeholder="Confirm Password" required /><span class="note"><small>must match password entered in the box above</small></span>
        <span class="err"><?= $cpassErr; ?></span><br>
         <span class="err"><?= $cpassesErr; ?></span>
      </div>
      <div>
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="agreement" required />
               I agree to the <a href="../docs/terms-of-use.php" title="View terms of use" target="_blank" rel="noopener noreferrer">Terms Of Use</a></label><br>
               <span class="err"><?= $checkErr; ?></span>
             </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="reg">Sign Up</button>
        </div>
        <!-- /.col --> 
      </div>
    </form>
    <div class="m-t-2">Already have an account? <a href="login.php" class="text-center">Sign In</a></div>
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
  echo "<script>toastr.success('You have been successfully registered', 'Success')</script>";
}

if(isset($toast) && $toast==='fail'){
  echo "<script>toastr.error('You have not been successfully registered', 'Failure')</script>";
}
?>