<?php
//Require my functions.php file
include('function.php');
//Begin cookie and include the cookie file
include('include/cookie.php');

//$sessEmail = $_SESSION['email'];

/*$SQLprofile = "SELECT * FROM `people` WHERE `user_email`='$sessEmail'";
$SQLex = $dbc->query($SQLprofile);
foreach($SQLex as $info){extract($info);}*/
$profile_photo = 'upload/'.$photo;

/*$sqlWallet = "SELECT * FROM `wallet` WHERE `user_email`='$sessEmail'";
$SQLex2 = $dbc->query($sqlWallet);
foreach($SQLex2 as $wallet_info){extract($wallet_info);}*/

//Build the profile update script
if(isset($_POST['uProfile'])){
  //Lead variable
  //$eEmail = $_POST['eEmail'];

  //Extract variables from user input
  $eFname = sanitize($_POST['eFname']);
  $eLname = sanitize($_POST['eLname']);  
  $ePhone = sanitize($_POST['ePhone']);
  $eAddress = sanitize($_POST['eAddress']);
  $eCountry = sanitize($_POST['eCountry']);
  $city = sanitize($_POST['city']);
  $facebook = sanitize($_POST['facebook']);
  $linkedin = sanitize($_POST['linkedin']);
  $twitter = sanitize($_POST['twitter']);
  $eBio = sanitize($_POST['eBio']);

  $sql_profile_update = "UPDATE `people` SET `firstname` = '$eFname', `lastname` = '$eLname',`address` = '$eAddress', `city` = '$city',`country` = '$eCountry', `phone` = '$ePhone', `facebook` = '$facebook',`linkedin` = '$linkedin', `twitter` = '$twitter', `bio` = '$eBio' WHERE `people`.`user_email` = '$user_email'";

  if($dbc->query($sql_profile_update) === TRUE){
    $toast = "success";
    header('Refresh:1');}
  else{$toast = "fail";}
}

//FOR THE PASSWORD RESET SECTION
//FORM VALIDATION
$pass=""; $passErr=""; $cpass=""; $cpassErr=""; $cpasses="";

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['ePass'])){
       echo "<style>.note{display:none !important;</style>";
        $passErr = "Password cannot be empty";
    }
    else{
        $pass = md5($_POST['ePass']);
    }

    if(empty($_POST['eCPass'])){
       echo "<style>.note{display:none !important;</style>";
        $cpassErr = "Confirm password cannot be empty";
    }
    else{
        $cpass = md5($_POST['eCPass']);
    }

    if($pass !== $cpass){
        $cpasses = "Both passwords do not match";
        echo "<script>window.alert('ERROR: Both passwords do not match')</script>";
    }
}

if(isset($_POST['uPwd'])){
    if($pass===$cpass){
        $sql = "UPDATE `people` SET `user_pass` = '$pass' WHERE `people`.`user_email`='$user_email'";

        if($dbc->query($sql)===TRUE){
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

  $sql_wallet_update = "UPDATE `wallet` SET `bitcoin`='$btc',`ethereum`='$eth',`binance`='$bnb',`usdt`='$usdt' WHERE `user_email` = '$sessmail'";

  if($dbc->query($sql_wallet_update)===TRUE){$toast = "success";header('Refresh:1');}
  else{$toast = "fail";}
  }

//FOR THE PHOTO UPLOAD SECTION
if(isset($_POST["uPhoto"]) && !empty($_FILES['photo']['name'])){
  $errors = [];
  $file_tmp= $_FILES['photo']['tmp_name'];
  $file_name=$_FILES['photo']['name'];
  $file_size=$_FILES['photo']['size'];
  $file_type=$_FILES['photo']['type'];

  $file_name_sanitizer= explode('.',$file_name);
  $file_ext = strtolower(end($file_name_sanitizer));

  $extensions = array("jpg","jpeg","png");

if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a jpeg, jpg or png file.";
          echo "<script>alert('Only jpeg, jpg, png files are allowed')</script>";
      }
      
      if($file_size > 500000) {
         $errors[]='File size must be less than 500KB';
         echo "<script>alert('File size should be less than 500KB')</script>";
      }

      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"upload/".$file_name);
         $sql_insert_photo = "UPDATE `people` SET `photo`='$file_name' WHERE `user_email`='$user_email' ";
         if($dbc->query($sql_insert_photo)){
         $toast = "success";
         header('Refresh:1');
      }else{$toast = "fail";}
    }
}if(isset($_POST["uPhoto"]) && empty($_FILES['photo']['name'])){
        echo "<script>alert('Select a valid image not more than 500KB')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<title>Member Profile | Earthminers Pages</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
<meta name="description" content="Member profile" />
 <link rel="shortcut icon" href="" /> 
<meta property="og:type" content="website" />
<meta property="og:title" content="Member Profile | Earthminers Pages" />
<meta property="og:description" content="Member profile" />
<meta property="og:image" content="" />

<!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="dist/css/style.css">
<link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">

<!-- DataTables -->
<link rel="stylesheet" href="dist/plugins/datatables/css/dataTables.bootstrap.min.css">

 <!--Toastr -->
  <link rel="stylesheet" type="text/css" href="dist/css/toastr.css" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!--Toastr -->
  <link rel="stylesheet" type="text/css" href="dist/css/toastr.css" />
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">
  <header class="main-header"> 
    <?php include('mainheader.php');?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside> 
    <!-- sidebar: style can be found in sidebar.less -->
    <div class="main-sidebar"> 
       <!-- Left side column. contains the logo and sidebar -->
      <!-- Sidebar user panel -->
  
      <!-- sidebar menu: : style can be found in sidebar.less -->
     <?php include('sidebar.php'); ?>
    <!-- /.sidebar --> 
  </aside>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) --> 
    <div class="content-header sty-one">
      <h3 class="text-black">Profile Page | <?php if(isset($sessEmail)){echo $sessEmail;} ?></h3>
      <ol class="breadcrumb">
        <li><a href="user.php">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Pages</li>
        <li><i class="fa fa-angle-right"></i> Profile Page</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-lg-4">
          <div class="user-profile-box m-b-3">
            <div class="box-profile text-white"> <img class="profile-user-img img-responsive img-circle m-b-2" src="<?php if(isset($profile_photo) && $profile_photo!==null){echo $profile_photo;}?>" title="<?php if(isset($firstname) && $firstname!==null){echo $firstname;}?> <?php if(isset($lastname) && $lastname!==null){echo $lastname;}?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php if(isset($firstname) && $firstname!==null){echo $firstname;}?> <?php if(isset($lastname) && $lastname!==null){echo $lastname;}?></h3>
              <p class="text-center">&copy;<?php if(isset($firstname)&& isset($lastname)){echo strtolower($firstname.$lastname)."&nbsp;".date('Y');}?></p>
              <p class="text-center"><!-- Space--></p>
            </div>
          </div>
          <div class="info-box">
           <div class="box-body"> 
            <!--<strong><i class="fa fa-book margin-r-5"></i> Education</strong>
              <p class="text-muted"> Space </p>
              <hr>-->
              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
              <p class="text-muted"><?php if(isset($city) && $city!==null){echo $city;}else{echo "set a city";}?>,<?php if(isset($country) && $country!==null){echo $country;}else{echo "and country";}?></p>
              <hr>
              <strong><i class="fa fa-envelope margin-r-5"></i> Email address </strong>
              <p class="text-muted"><?php if(isset($user_email) && $user_email!==null){echo $user_email;}else{echo "You have no email set";}?></p>
              <hr>
              <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>
              <p><?php if(isset($phone) && $phone!==null){echo $phone;}else{echo "You have no phone set";}?> </p>
              <hr>
              <strong><i class="fa fa-phone margin-r-5"></i> Social Profile</strong>
              <div class="text-left"> 
                <a class="btn btn-social-icon btn-facebook" href="<?php if(isset($facebook) && $facebook!==null){echo $facebook;}?>" target="_blank" rel="noopener"><i class="fa fa-facebook"></i></a> 
                <a class="btn btn-social-icon btn-linkedin" href="<?php if(isset($linkedin) && $linkedin!==null){echo $linkedin;}?>" target="_blank" rel="noopener"><i class="fa fa-linkedin"></i></a> 
                <a class="btn btn-social-icon btn-twitter" href="<?php if(isset($twitter) && $twitter!==null){echo $twitter;}?>" target="_blank" rel="noopener"><i class="fa fa-twitter"></i></a> </div>
            </div>
            <!-- /.box-body --> 
          </div>
        </div>
        <div class="col-lg-8">
          <div class="info-box">
            <div class="card tab-style1"> 
              <!-- Nav tabs -->
              <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">Activity</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="true">Profile</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-expanded="true">Settings</a> </li>
               <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#upload" role="tab" aria-expanded="true">Upload</a> </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="<?php if(isset($profile_photo) && $profile_photo!==null){echo $profile_photo;}?>" title="<?php if(isset($firstname) && $firstname!==null){echo $firstname;}?> <?php if(isset($lastname) && $lastname!==null){echo $lastname;}?>" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5><span id="activity">Account Activity Center</span></h5>
                   <p><ul>
        <?php $funded = "SELECT `fundname` AS `order` FROM `fund` WHERE `user_email`='$sessEmail' AND `status`='Pending' ORDER BY `request_date` DESC LIMIT 1";
          $funded_query = $dbc->query($funded);
          $funded_display = mysqli_fetch_assoc($funded_query);

         if($funded_display){
          $funded_row = $funded_display['order']; 
          if(isset($fund_info['fundname'])&& $fund_info['fundname']!==null){
            echo "<li><span class=''>Your request for {$funded_row} on {$fund_info['request_date']} is pending.</span></li>";
          }
        }else{echo "<li><span class=''>Your request for {$funded_row} on {$fund_info['request_date']} is Approved.</span></li>";}?>
        <div class="p-t-3"></div>
    <?php $deposited = "SELECT `amount` AS `lastdeposit` FROM `fund` WHERE `user_email`='$sessEmail' AND `status`='Pending' ORDER BY `request_date` DESC LIMIT 1";
            $deposit_query = $dbc->query($deposited);
            $deposit_display = mysqli_fetch_assoc($deposit_query);

           if($deposit_display){
            $deposited_row = $deposit_display['lastdeposit'];
            if(isset($fund_info['amount'])&& $fund_info['amount']!==null){
              echo "<li><span class=''>Your request for funding, up to {$deposited_row} on {$fund_info['request_date']} is Pending.</span></li>";
            }
          }else{echo "<li><span class=''>Your request for funding, up to {$deposited_row} on {$fund_info['request_date']} is Approved.</span></li>";} 
          ?>  
          <div class="p-t-3"></div>
          <?php $withdrawn = "SELECT `wamount` AS `lastWithdraw` FROM `withdraw` WHERE `user_email`='$sessEmail' AND `wstatus`='Pending' ORDER BY `withdraw_request_date` DESC LIMIT 1";
                $withdraw_query = $dbc->query($withdrawn);
                $withdraw_display = mysqli_fetch_assoc($withdraw_query);

               if($withdraw_display){
                $withdrawn_row = $withdraw_display['lastWithdraw']; 
                 if(isset($withdraw_info['wamount'])&& $withdraw_info['wamount']!==null){
                  echo "<li><span class=''>Your request for withdrawal, up to {$withdrawn_row} on {$withdraw_info['withdraw_request_date']} is Pending.</span></li>";
                }
              }else{echo "<li><span class=''>Your request for withdrawal, up to {$withdrawn_row} on {$withdraw_info['withdraw_request_date']} is Approved.</span></li>";} ?>     
</ul>
                   </p>
                         <h5><span id="notification">Notification Center</span></h5>
                         <p>Sitewide announcements will be displayed here</p>
                          <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"></div>
                          </div>
                          <div class="like-comm m-t-1"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row m-t-3">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          
                        </div>
                      </div>
                    </div>
                    <div class="row m-t-3">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                        
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--second tab-->
                <div class="tab-pane" id="profile" role="tabpanel" aria-expanded="true">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-3 col-xs-6 b-r"> <strong>Full Name</strong> <br>
                        <p class="text-muted"><?php if(isset($firstname) && isset($lastname)){echo $firstname."&nbsp;".$lastname;}else{echo "Check that your firstname and lastname is set";}?></p>
                      </div>
                      <div class="col-lg-3 col-xs-6 b-r"> <strong>Mobile</strong> <br>
                        <p class="text-muted"><?php if(isset($phone) && $phone!==null){echo $phone;}else{echo "Check that your phone number is set";}?></p>
                      </div>
                      <div class="col-lg-3 col-xs-6 b-r"> <strong>Email</strong> <br>
                        <p class="text-muted"><?php if(isset($user_email) && $user_email!==null){echo $user_email;}else{echo "Check that your email is set";}?></p><?php if(isset($fund_info['affid'])&&$fund_info['affid']!==null){echo $fund_info['affid'];} ?>
                      </div>
                      <div class="col-lg-3 col-xs-6 b-r"> <strong>User ID</strong> <br>
                        <p class="text-muted"><?php if(isset($fund_info['affid'])&&$fund_info['affid']!==null){echo $fund_info['affid'];}else{echo "User ID is not set.";}?></p>
                      </div>
                    </div>
                    <hr>
                    <h3>Your Bio</h3>
                    <p><?php if(isset($bio) && $bio!==null){echo $bio;}else{echo "Check that your bio is set";}?> </p>

                <div class="table-responsive">
                <table class="table table-bordered table-hover" data-name="cool-table">
                  <caption class="h5" style="caption-side:top;">Your Wallets</caption>
                  <thead class="thead-dark">
                  <tr>
                    <th scope="col"><h6 class="text-center">BTC Wallet</h6></th>
                    <th scope="col"><h6 class="text-center">BNB Wallet</h6></th>
                    <th scope="col"><h6 class="text-center">ETH Wallet</h6></th>
                    <th scope="col"><h6 class="text-center">USDT Wallet</h6></th>
                  </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <td colspan="4"><center><a class="btn btn-outline-dark  btn-lg" href="user-update.php#wallets">Update Wallets&nbsp;<i class="ti-wallet"></i></a></center></td>
                    </tr>
                  </tfoot>
                  <tbody>
                  <tr>
                    <td><?php if(isset($wallet_info['bitcoin']) && $wallet_info['bitcoin']!==null){echo $wallet_info['bitcoin'];}else{echo "N/A";}?></td>
                    <td><?php if(isset($wallet_info['ethereum']) && $wallet_info['ethereum']!==null){echo $wallet_info['ethereum'];}else{echo "N/A";}?></td>
                    <td><?php if(isset($wallet_info['binance']) && $wallet_info['binance']!==null){echo $wallet_info['binance'];}else{echo "N/A";}?></td>
                    <td><?php if(isset($wallet_info['usdt']) && $wallet_info['usdt']!==null){echo $wallet_info['usdt'];}else{echo "N/A";}?></td>
                  </tr>
                </tbody>
                </table>
              </div>
                    <h4 class="font-medium m-t-3">Your Profits and Losses Summary</h4>
                    <hr>
                    <div>
                      <h6 class="m-t-3">Profits <span class="pull-right">N/A</span></h6>
                      <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                      </div>
                      <h5 class="m-t-3">Losses <span class="pull-right">N/A</span></h5>
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                      </div>
                     </div>
                  </div>
                </div>
                <div class="tab-pane" id="settings" role="tabpanel" aria-expanded="true">
                  <div class="card-body">
                    <form class="form-horizontal form-material" method="POST" action="<?= htmlentities($_SERVER['PHP_SELF']);?>">
                      <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                          <input value="<?php if(isset($user_email) && $user_email!==null){echo $user_email;}?>" class="form-control form-control-line" name="eEmail" id="example-email" type="email" title="Your email is your username and cannot be changed after setting it" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-12">Firstname</label>
                        <div class="col-md-12">
                          <input placeholder="firstname" class="form-control form-control-line" type="text" name="eFname" value="<?php if(isset($firstname) && $firstname!==null){echo $firstname;}?>">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-md-12">Lastname</label>
                        <div class="col-md-12">
                          <input placeholder="lastname" class="form-control form-control-line" type="text" name="eLname" value="<?php if(isset($lastname) && $lastname!==null){echo $lastname;}?>">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-md-12">Phone</label>
                        <div class="col-md-12">
                          <input placeholder="123 456 7890" class="form-control form-control-line" type="tel" pattern="[+0-9].{7,17}" title="Enter minimum of 7 digits and maximum of 17 digits, may include '+'" name="ePhone" value="<?php if(isset($phone) && $phone!==null){echo $phone;}?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">Address</label>
                        <div class="col-md-12">
                          <input placeholder="address" class="form-control form-control-line" type="text" name="eAddress" value="<?php if(isset($address) && $address!==null){echo $address;}?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-12">City</label>
                        <div class="col-md-12">
                          <input placeholder="city" class="form-control form-control-line" type="text" name="city" value="<?php if(isset($city) && $city!==null){echo $city;}?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-12">Select Country</label>
                        <div class="col-sm-12">
                          <select class="form-control form-control-line" name="eCountry">
                            <option name="selectedCountry"><?php if(isset($country) && $country!==null){echo $country;}?></option>
                            <?php include('include/selectCountry.html');?>
                          </select>
                        </div>
                      </div>
                      <!-- Socials begin -->
                      <div class="form-group">
                        <label class="col-md-12">Facebook</label>
                        <div class="col-md-12">
                          <input placeholder="facebook url" class="form-control form-control-line" type="url" name="facebook" title="Enter your facebook url only or leave field vacant if you have none" value="<?php if(isset($facebook) && $facebook!==null){echo $facebook;}?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-12">Linkedin</label>
                        <div class="col-md-12">
                          <input placeholder="linkedin url" class="form-control form-control-line" type="url" name="linkedin" title="Enter your linkedin url only or leave field vacant if you have none" value="<?php if(isset($linkedin) && $linkedin!==null){echo $linkedin;}?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-12">Twitter</label>
                        <div class="col-md-12">
                          <input placeholder="twitter url" class="form-control form-control-line" type="url" name="twitter" title="Enter your twitter url only or leave field vacant if you have none" value="<?php if(isset($twitter) && $twitter!==null){echo $twitter;}?>">
                        </div>
                      </div>
                      <!-- Socials end -->

                      <div class="form-group">
                        <label class="col-md-12">Bio</label>
                        <div class="col-md-12">
                          <textarea rows="5" class="form-control form-control-line" name="eBio" placeholder="We recommend no more than 200 words" maxlength="200"><?php if(isset($bio) && $bio!==null){echo $bio;}?></textarea>
                        </div>
                      </div>                      
                      <div class="form-group">
                        <div class="col-sm-12">
                          <button type="submit" class="btn btn-success" name="uProfile">Update Profile</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                    <!-- fourth pane -->
                 <div class="tab-pane" id="upload" role="tabpanel" aria-expanded="true">
                  <div class="card-body">
                     <h4>Center For Member Uploads</h4>
                     <p>Upload profile photo</p>
                    <form class="form-horizontal form-material" action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
                       <div class="form-group">
                        <div class="col-md-6 col-xs-12">
                          <input class="form-control form-control-line" name="photo" id="example-email" type="file" title="Use this to upload your profile photo" accept="image/jpg,image/jpeg,image/png"><span><small><strong>Note:</strong> Only .jpg, .jpeg, .png formats allowed up to max size of 500KB</small></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-6 col-xs-12">
                          <button type="submit" class="btn btn-success" name="uPhoto">Upload</button>
                        </div>
                      </div>
                    </form>
              </div>
            </div>
          </div>
        </div>
         <div class="like-comm m-t-1"> <a href="#"><?= date('l - M.d.Y H:i'); ?></a> <a href="#"><i class="fa fa-heart text-danger"></i> With love from Earthminers</a> </div>
      </div>
      <!-- Main row --> 
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <?php include('foot.php');?></footer>
</div>
<!-- ./wrapper --> 

<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="dist/js/niche.js"></script> 

<!-- jQuery UI 1.11.4 --> 
<script src="dist/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Toastr -->
<script src="dist/js/toastr.min.js"></script>
<script type="text/javascript">
  if(screen.width<1000){
    confirm("Your current device may need landscape orientation to view a few items");
  }
</script>
</body>
</html>

<?php
if(isset($toast) && $toast==='success'){echo "<script>toastr.success('You have updated your information', 'Success')</script>";}
if(isset($toast) && $toast==='fail'){echo "<script>toastr.error('We could not update that information', 'Error')</script>";}

$dbc->close();
?>