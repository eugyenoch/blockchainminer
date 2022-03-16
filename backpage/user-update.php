<?php
//Begin cookie and include the cookie file
include('include/cookie.php');
//Require my functions.php file
include('function.php');

//FOR THE PASSWORD RESET SECTION
//FORM VALIDATION
$pass=""; $passErr=""; $cpass=""; $cpassErr=""; $cpasses="";

if(isset($_POST['uPwd']) && $_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['ePass'])){
      $passErr = "Password cannot be empty";
       echo "<style>.note{display:none !important;</style>";
        
    }
    else{
        $pass = md5($_POST['ePass']);
    }

    if(empty($_POST['eCPass'])){
       $cpassErr = "Confirm password cannot be empty";
       echo "<style>.note{display:none !important;</style>";
       
    }
    else{
        $cpass = md5($_POST['eCPass']);
    }

    if($pass !== $cpass){
        $cpasses = "Both passwords do not match";
        echo "<script>window.alert('ERROR: Both passwords do not match')</script>";
    }
//}

// if(isset($_POST['uPwd'])){
    if($pass===$cpass){
        $sql = "UPDATE `people` SET `user_pass` = '$pass' WHERE `people`.`user_email`='$user_email'";

        if($dbc->query($sql)==TRUE){
            $toast = "success";
        header("Refresh:1,url=./login.php");
        session_destroy();
       }else{
        $toast = "fail";
       } 
     }
   }

//FOR THE WALLET UPDATE SECTION
//For the wallets section
if(isset($_POST['uWallet'])){
  //$eEmail = $_POST['eEmail'];
  $btc = sanitize($_POST['btc']);
  $eth = sanitize($_POST['eth']);
  $bnb = sanitize($_POST['bnb']);
  $usdt = sanitize($_POST['usdt']);
  //$token = sanitize($_POST['token']);

  $sql_wallet_update = "UPDATE `wallet` SET `bitcoin`='$btc',`ethereum`='$eth',`binance`='$bnb',`usdt`='$usdt' WHERE `user_email` = '$sessEmail'";

  if($dbc->query($sql_wallet_update)===TRUE){$toast = "success";header('Refresh:1');}
  else{$toast = "fail";}
  }

?>
<!DOCTYPE html>
<html lang="en" prefix="og:http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <title>The Earthminers Office | User Update Center</title>
  <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
  <meta name="description" content="Login to the earthminers member area" />
  <link rel="shortcut icon" href="" /> 
  <meta property="og:type" content="website" />
  <meta property="og:title" content="The Earthminers Office | User Login Area" />
  <meta property="og:description" content="Login to the earthminers member area" />
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
<body class="skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">
  <header class="main-header"> 
   <?php include('mainheader.php');?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar"> 
     <!-- sidebar: style can be found in sidebar.less -->
    <div class="sidebar"> 
       <!-- Left side column. contains the logo and sidebar -->
      <!-- Sidebar user panel -->
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include('sidebar.php');?>
      <!-- /.sidebar --> 
  </aside> 
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h4>Security and uploads | <?php if(isset($sessEmail)){echo $sessEmail;} ?></h4>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i>Accounts</li>
      </ol>
    </div>
    <!-- Forms area -->
  <div class="content">
      <div class="row m-t-3">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h4>Password update</h4>
              <p>use the form to update your password</p>
               <form class="form-horizontal form-material" method="POST" action="<?= htmlentities($_SERVER['PHP_SELF']);?>">
            <!--     <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="ti-email"></i></div>
                    <input class="form-control" id="exampleInputEmail1" placeholder="Enter email" type="email">
                  </div>
                </div> -->
                <div class="form-group">
                  <label for="pwd1">Password</label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="ti-lock"></i></div>
                    <input class="form-control" id="pwd1" placeholder="Enter password" type="password" name="ePass" pattern="(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).{8,}" title="password must contain atleast 1 digit, atleast 1 uppercase letter, atleast 1 lowercase letter and minimum of 8 characters in all" required>
                    </div>
                    <span class="note"><small>atleast 1 digit, atleast 1 uppercase letter, atleast 1 lowercase letter and minimum of 8 characters in all</small></span><br>
                    <span class="text-danger"><?php if(isset($passErr) && $passErr!==null){echo $passErr;} ?></span>
                </div>
                <div class="form-group">
                  <label for="pwd2">Confirm Password</label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="ti-lock"></i></div>
                    <input class="form-control" id="pwd2" placeholder="Re-enter password" type="password" name="eCPass" title="confirm password must match password" required>
                    </div>
                    <span class="note"><small>must match password entered in the box above</small></span><br>
                    <span class="text-danger"><?php if(isset($cpassErr) && $cpassErr!==null){echo $cpassErr;} ?></span><br>
                    <span class="text-danger"><?php if(isset($cpasses) && $cpasses!==null){echo $cpasses;} ?></span>
                </div>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="uPwd">Update Password</button>
                <button type="reset" class="btn btn-inverse waves-effect waves-light">Cancel</button>
              </form>
                <div class="col-md-12 m-t-2">
                    <h5>2FA being rolled out shortly</h5>
                  </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h4 id="wallets" class="card-title">Wallets and Addresses</h4>
              <p>Use this section to fill-in external wallet address details</p>
              <form class="form-horizontal form-material" action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
            <div class="form-group">
                    <div class="col-md-12">
                      <input value="<?php if(isset($user_email) && $user_email!==null){echo $user_email;}?>" class="form-control form-control-line" name="eEmail" id="example-email" type="email" hidden>
                    </div> 
                  </div>
                <div class="form-group">
                  <label for="exampleInputuname">Bitcoin<small>(BTC)</small></label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="ti-wallet"></i></div>
                    <input name="btc" class="form-control" id="exampleInputuname" placeholder="Bitcoin address" type="text" value="<?php if(isset($bitcoin) && $bitcoin!==null){echo $bitcoin;} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputuname">Ethereum<small>(ETH)</small></label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="ti-wallet"></i></div>
                    <input name="eth" class="form-control" id="exampleInputuname" placeholder="Ethereum address" type="text" value="<?php if(isset($ethereum) && $ethereum!==null){echo $ethereum;} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputuname">Binance<small>(BNB)</small></label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="ti-wallet"></i></div>
                    <input name="bnb" class="form-control" id="exampleInputuname" placeholder="Binance address" type="text" value="<?php if(isset($binance) && $binance!==null){echo $binance;} ?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="exampleInputuname">Tether<small>(USDT)</small></label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="ti-wallet"></i></div>
                    <input name="usdt" class="form-control" id="exampleInputuname" placeholder="Binance address" type="text" value="<?php if(isset($usdt) && $usdt!==null){echo $usdt;} ?>">
                  </div>
                </div>
                 <div class="form-group" hidden>
                  <label for="exampleInputuname">Tether<small>(USDT)</small></label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="ti-wallet"></i></div>
                    <input name="earthminers" class="form-control" id="exampleInputuname" placeholder="Earthminers Token address" type="text" value="<?php if(isset($token) && $token!==null){echo $token;} ?>">
                  </div>
                </div>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="uWallet">Update Wallet</button>
              </form>
    </div>
  </div>

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
  echo "<script>toastr.success('Your data was updated', 'Success')</script>";
}

if(isset($toast) && $toast==='fail'){
  echo "<script>toastr.error('We could not update that! Retry or contact support', 'Error')</script>";
}
$dbc->close();
?>