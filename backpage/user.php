<?php
//Require my functions.php file
include('function.php');
//Begin cookie and include the cookie file
include('include/cookie.php');

$profile_photo = './upload/'.$photo;

if(isset($_POST['wrequest'])){
  $wtxn = $_POST['wtxn'];
  $withdrawEmail = $_POST['withdrawEmail'];
  $withdrawAmount = $_POST['withdrawAmount'];
  $withdrawWallet = $_POST['withdrawWallet'];
  $withdrawAddress = $_POST['withdrawAddress'];

  $sql_withdraw_req = "INSERT INTO withdraw(user_email,wtxn,wcurrency,wamount,wallet_address,wstatus) VALUES('$withdrawEmail','$wtxn','$withdrawWallet','$withdrawAmount','$withdrawAddress','Pending')";

  $sql_withdraw_req_ex = $dbc->query($sql_withdraw_req);
  if($sql_withdraw_req_ex){
    $toast = "wstatus_success";
  header("Refresh:1;url=table-data-table.php");
}else{$toast = "wstatus_fail";} 

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>User Account Area | Earthminers</title>
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
<meta name="description" content="Member Earthminers Account" />
 <link rel="shortcut icon" href="" /> 
<meta property="og:type" content="website" />
<meta property="og:title" content="User Account Area | Earthminers" />
<meta property="og:description" content="Member Earthminers Account" />
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

<!-- Chartist CSS -->
<link rel="stylesheet" href="dist/plugins/chartist-js/chartist.min.css">
<link rel="stylesheet" href="dist/plugins/chartist-js/chartist-plugin-tooltip.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
   <!--Toastr -->
  <link rel="stylesheet" type="text/css" href="dist/css/toastr.css" />

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
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h3>Account Panel | <?php if(isset($sessEmail)){echo $sessEmail;} ?></h3>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i>Accounts</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content"> 
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="info-box bg-darkblue"> <span class="info-box-icon bg-transparent"><i class="ti-stats-up text-white"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Newest Order</h6>
              <h3 class="text-white"><?php $funded = "SELECT `fundname` AS `order` FROM `fund` WHERE `user_email`='$sessEmail' AND `status`='Approved' ORDER BY `request_date` DESC LIMIT 1";
                $funded_query = $dbc->query($funded);
                $funded_display = mysqli_fetch_assoc($funded_query);

               if($funded_display){
                $funded_row = $funded_display['order']; 
                if(isset($fund_info['fundname'])&& $fund_info['fundname']!==null){
                  echo $funded_row;
                }
              }else{echo "N/A";}?>
               </h3>
             <span class="progress-description text-white"><a href="table-data-fund.php" rel="noreferrer"><span class="text-white">View Orders</span></a> <!-- 70% Increase in 30 Days --> </span></div>
            <!-- /.info-box-content --> 
          </div>
          <!-- /.info-box --> 
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green text-white"> <span class="info-box-icon bg-transparent"><i class="ti-money"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Latest Approved Deposit</h6>
              <h3 class="text-white"><?php $deposited = "SELECT `amount` AS `lastdeposit` FROM `fund` WHERE `user_email`='$sessEmail' AND `status`='Approved' ORDER BY `request_date` DESC LIMIT 1";
                $deposit_query = $dbc->query($deposited);
                $deposit_display = mysqli_fetch_assoc($deposit_query);

               if($deposit_display){
                $deposited_row = $deposit_display['lastdeposit'];
                if(isset($fund_info['amount'])&& $fund_info['amount']!==null){
                  echo $deposited_row;
                }
              }else{echo "0.00";} 
              ?>         
          </h3>
              <span class="progress-description text-white"><a href="table-data-fund.php" rel="noreferrer"><span class="text-white">View Deposits</span></a><!-- 50% Increase in 30 Days --> </span>  </div>
            <!-- /.info-box-content --> 
          </div>
          <!-- /.info-box --> 
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua"> <span class="info-box-icon bg-transparent"><i class="ti-money"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Latest Approved Withdrawal</h6>
              <h3 class="text-white"><?php $withdrawn = "SELECT `wamount` AS `lastWithdraw` FROM `withdraw` WHERE `user_email`='$sessEmail' AND `wstatus`='Approved' ORDER BY `withdraw_request_date` DESC LIMIT 1";
                $withdraw_query = $dbc->query($withdrawn);
                $withdraw_display = mysqli_fetch_assoc($withdraw_query);

               if($withdraw_display){
                $withdrawn_row = $withdraw_display['lastWithdraw']; 
                 if(isset($withdraw_info['wamount'])&& $withdraw_info['wamount']!==null){
                  echo $withdrawn_row;
                }
              }else{echo "0.00";} ?>         
            </h3>
              <span class="progress-description text-white"><a href="table-data-withdraw.php" rel="noreferrer"><span class="text-white">View Withdrawals</span></a><!-- 50% Increase in 30 Days --> </span> </div>
            <!-- /.info-box-content --> 
          </div>
          <!-- /.info-box --> 
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="info-box bg-orange"> <span class="info-box-icon bg-transparent"><i class="ti-money"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Net Profit</h6>
              <h3 class="text-white"><?php if(isset($deposited_row)&&isset($withdrawn_row)){$netIncome=$deposited_row - $withdrawn_row; echo"{$netIncome}.00000";}else{echo "0.00";} ?></h3>
              <span class="progress-description text-white"> Net Income Per Trade<!-- 35% Increase in 30 Days --> </span> </div>
            <!-- /.info-box-content --> 
          </div>
          <!-- /.info-box --> 
        </div>
        <!-- /.col --> 
      </div>
      <!-- /.row --> 
      <!-- Main row -->
      <div class="row">
        <div class="col-lg-7 col-xlg-9">
          <div class="info-box">
            <div class="d-flex flex-wrap">
              <div>
                <h4 class="text-black">Analytics Overview</h4>
              </div>
              <div class="ml-auto">
                <ul class="list-inline">
                  <li class="text-info"> <i class="fa fa-circle"></i> Sales</li> <li class="text-blue"> <i class="fa fa-circle"></i> Earning</li>
                </ul>
              </div>
            </div>
            <div>
              <canvas id="line-chart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-xlg-3">
          <div class="info-box">
            <div class="d-flex flex-wrap">
              <div>
                <h4 class="text-black">Your Visits</h4>
              </div>
            </div>
            <div class="m-t-2">
              <canvas id="pie-chart" height="210"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="info-box">
            <h4 class="m-b-2 text-black">Recommended Activities</h4>
            <div class="sl-item sl-primary">
              <div class="sl-content"><small class="text-muted"><i class="fa fa-user position-left"></i> Mine</small>
                <p>Mines auto-yield up to 150%. All that is needed is simply grow your own stake</p>
              </div>
            </div>
            <div class="sl-item sl-danger">
              <div class="sl-content"><small class="text-muted"><i class="fa fa-user position-left"></i> Pool(launching...)</small>
                <p>All that is needed is to stake some tokens to earn. High APR, low risk.</p>
              </div>
            </div>
            <div class="sl-item sl-success">
              <div class="sl-content"><small class="text-muted"><i class="fa fa-user position-left"></i> Farm(launching...)</small>
                <p>Stake liquidity (LP) tokens to earn more with APR's up to 200%</p> 
              </div>
            </div>
            <div class="sl-item sl-warning">
              <div class="sl-content"><small class="text-muted"><i class="fa fa-user position-left"></i>Games and NFT</small>
                <p>Play games, Buy and Sell NFTs on the Binance Smart Chain.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="info-box">
            <div class="d-flex flex-wrap">
              <div>
               <!--  <h4 class="m-b-2 text-black">Wallets and Withdrawal</h4> -->
              </div>
            </div>
            <!-- <div class="ct-line-chart" style="height:350px;"></div> -->
            <div class="row">
              <div class="col-md-12">
              
               </div>
                <div class="col-md-12">
                  <?php if($deposit_display == true){?>
                   <form class="form-horizontal " class="" method="POST" action="<?= htmlentities($_SERVER['PHP_SELF']);?>">         
                    <legend class="h5 text-black">Withdrawal Request</legend>
                <div class="form-group row">
                 <!--  <label for="exampleInputEmail3" class="col-sm-3 control-label">Email*</label> -->
                  <div class="col-sm-9">
                    <div class="input-group">
                      <!-- <div class="input-group-addon"><i class="ti-email"></i></div> -->
                      <input class="form-control" id="exampleInputEmail3" placeholder="" type="text" value="TXN<?= mt_rand(100000,999999);?>" name="wtxn" hidden><br>
                       <input class="form-control" id="exampleInputEmail3" placeholder="" type="email" value="<?php if(isset($user_email) && $user_email!==null){echo $user_email;}?>" name="withdrawEmail" hidden>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="web" class="col-sm-3 control-label">Amount</label>
                  <div class="col-sm-9">
                    <div class="input-group"> 
                      <div class="input-group-addon"><i class="ti-quote-left"></i></div>
                      <input class="form-control" id="web" placeholder="Enter amount" type="number" name="withdrawAmount">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputuname3" class="col-sm-3 control-label">Select Wallet</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="ti-wallet"></i></div>
                     <input list="coins" class="form-control" id="exampleInputuname3" placeholder="Select wallet" type="text" name="withdrawWallet" required>
                      <datalist id="coins">
                        <option value="BTC">
                        <option value="ETH">
                        <option value="BNB">
                        <option value="USDT">
                      </datalist>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="web" class="col-sm-3 control-label">Wallet address</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="ti-wallet"></i></div>
                      <input class="form-control" id="web" placeholder="Enter wallet address" type="text" name="withdrawAddress">
                    </div>
                  </div>
                </div>
                 
                <div class="form-group row">
                  <div class="offset-sm-3 col-sm-9">
                    <div class="checkbox checkbox-success">
                      <input id="checkbox33" type="checkbox" required>
                      <label for="checkbox33">I confirm my details are correct and have carried out my due diligence as stipulated in the website <a href="https://earthminers.com/docs/terms-of-use.php/" target="_blank" rel="noopener">terms</a></label>
                    </div>
                  </div>
                </div>
                <div class="form-group row m-b-0">
                  <div class="offset-sm-3 col-sm-9">
                    <button name="wrequest" style="cursor:pointer;font-family:lato,poppins,tahoma;" type="submit" class="btn btn-outline-light waves-effect waves-light"><span>Request Withdrawal&nbsp;<i class="ti-credit-card"></i></span></button>
                  </div>
                </div>
              </form>
            <?php } else{echo "<span class='btn btn-outline-secondary text-black'>Withdrawal is activated once your hub or stake is approved</span>";}?>
                </div>
            </div>         
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div> 
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2"> 
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-yellow">
                <div class="widget-user-image"> <img class="img-circle" src="dist/img/logo-n.png" alt="User Avatar"> </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">Earth Miners<sup>&copy;</sup></h3>
                <h5 class="widget-user-desc">Mines, Farms, Marketplace and Pools</h5>
              </div>
              <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                  <li><a href="#mine">Earth Mines<span class="pull-right badge bg-blue">5</span></a></li>
                  <li><a href="#pool">Staking Pools <span class="pull-right badge bg-aqua">2</span></a></li>
                  <li><a href="#farm">Yield Farms <span class="pull-right badge bg-green">3</span></a></li>
                  <li><a href="#nft">NFT Pools<span class="pull-right badge bg-red">4</span></a></li>
                  <li><a href="#games">Games and Rewards <span class="pull-right badge bg-green">4</span></a></li>
                  <li><a href="#token">Token <span class="pull-right badge bg-green">1</span></a></li>
                </ul>
              </div>
            </div>
            <!-- /.widget-user --> 
          </div>
          <div class="m-t-3"> 
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user"> 
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-black" style="background: url('dist/img/user-bg.jpg');">
                <h3 class="widget-user-username"><?php if(isset($firstname) && $firstname!==null){echo $firstname;}?>&nbsp;<?php if(isset($lastname) && $lastname!==null){echo $lastname;}?></h3>
                <h5 class="widget-user-desc"><small>&copy;&nbsp;<?= date('Y');?></small></h5>
              </div>
              <div class="widget-user-image"> <img class="img-circle" src="<?php if(isset($profile_photo) && $profile_photo!==null){echo $profile_photo;}?>" title="<?php if(isset($firstname) && $firstname!==null){echo $firstname;}?> <?php if(isset($lastname) && $lastname!==null){echo $lastname;}?>" alt="User Avatar"> </div>
              <div class="box-footer">
                <div class="text-center">
                  <p><?php if(isset($bio) && $bio!==null){echo $bio;}else{echo "Check that your bio is set";}?></p>
                </div>
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">130,500+</h5>
                      <span class="description-text">SALES</span> </div>
                    <!-- /.description-block --> 
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">50,350+</h5>
                      <span class="description-text">USERS</span> </div>
                    <!-- /.description-block --> 
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">20+</h5>
                      <span class="description-text">PRODUCTS</span> </div>
                    <!-- /.description-block --> 
                  </div>
                  <!-- /.col --> 
                </div>
                <div class="row m-t-4">
                  <p class="lead">Get Insider Bonuses and Customer Response on Telegram</p>
                  <p>Join our free Telegram channel for the best of trades, bonuses, high yield investments, investor tips, insider secrets and unmatched customer service; available 24/7 all year round.</p>
                  <div class="row">
                  <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/icon1.png" alt="token" class="img-responsive img-rounded" title="Join Earthminer channels"></div>
                  <div class="col-lg-6 col-xs-6 m-bot-2"><a href="https://t.me/earthminers" target="_blank" rel="noopener" type="button" class="btn btn-primary btn-lg" style="cursor:pointer; font-family:verdana,tahoma,poppins;">Join Channel&nbsp;<i class="fa fa-telegram"></i></a></div>
                </div>
              </div>
             <!--  <div class="row m-t-3">
                <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/icon1.png" alt="token" class="img-responsive img-rounded" title="Join Earthminer channels"></div>
                  <div class="col-lg-6 col-xs-6 m-bot-2"><a href="" target="_blank" rel="noopener" type="button" class="btn btn-primary btn-lg" style="cursor:pointer; font-family:verdana,tahoma,poppins;">Join VIP Channel&nbsp;<i class="fa fa-telegram"></i></a></div>
                </div> -->
                <!-- /.row --> 
              </div>
            </div>
            <!-- /.widget-user --> 
          </div>
        </div>
        <div class="col-lg-8">
          <div class="info-box">
            <div class="card tab-style1"> 
              <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
              <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#mine" role="tab" aria-expanded="true">Mine</a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#pool" role="tab" aria-expanded="true">Pool</a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#farm" role="tab" aria-expanded="true">Farm</a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#nft" role="tab" aria-expanded="true">NFT</a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#games" role="tab" aria-expanded="true">Game</a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#token" role="tab" aria-expanded="true">Token</a> </li>
            </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="mine" role="tabpanel" aria-expanded="true">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/icon2.png" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5 id="shield">EARTHMINE-HUB Shield(small)</h5>
                          <p>Start small with a minimum invest of $200.00 over a 1-month ETH mining period with an allowance of up to 40 MH/s.</p>
                          <p><small>A daily maintenance fee of $0.005 per MH/s will be deducted from your mining outputs in ETH at the USD/ETH exchange rate of the mining day. <br>Access to our free Telegram channel.</small></p>
                          <hr>
                          <div class="row">
                            <div class="col-lg-2 col-xs-4 m-bot-2"><img src="dist/img/icon2.png" alt="token" class="img-responsive img-rounded" title="Earthminer Hub"></div>
                             <div class="col-lg-6 col-xs-6 m-bot-2"><a href="./include/processor.php?plan=shield" target="" rel="" type="" class="btn btn-primary btn-lg" style="font-family:verdana,tahoma,poppins;">Approve Shield&nbsp;<i class="fa fa-check"></i></a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                     <div class="row">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/icon2.png" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5 id="shield2">EARTHMINE-HUB shield 2(medium)</h5>
                          <p>Go higher with a minimum invest of $525.00 over a 3-month ETH mining period with an allowance of up to 80 MH/s</p>
                          <p><small>A daily maintenance fee of $0.009 per MH/s will be deducted from your mining outputs in ETH at the USD/ETH exchange rate of the mining day.<br>Access to our free Telegram channel.</small></p>
                           <hr>
                          <div class="row">
                            <div class="col-lg-2 col-xs-4 m-bot-2"><img src="dist/img/icon2.png" alt="token" class="img-responsive img-rounded" title="Earthminer Hub"></div>
                             <div class="col-lg-6 col-xs-6 m-bot-2"><a href="./include/processor.php?plan=shield2" target="" rel="" class="btn btn-primary btn-lg" style="font-family:verdana,tahoma,poppins;">Approve Shield 2&nbsp;<i class="fa fa-check"></i></a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                     <div class="row">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/icon2.png" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                         <h5 id="farm">EARTHMINE-HUB Farm(large)</h5>
                          <p>Go large with a minimum invest of $1,550.00 over a 6-month ETH mining period with an allowance of up to 150 MH/s</p>
                          <p><small>A daily maintenance fee of $0.015 per MH/s will be deducted from your mining outputs in ETH at the USD/ETH exchange rate of the mining day.<br>Access to our free Telegram channel.</small></p>
                           <hr>
                          <div class="row">
                            <div class="col-lg-2 col-xs-4 m-bot-2"><img src="dist/img/icon2.png" alt="token" class="img-responsive img-rounded" title="Earthminer Hub"></div>
                             <div class="col-lg-6 col-xs-6 m-bot-2"><a href="./include/processor.php?plan=farm" target="" rel="" class="btn btn-primary btn-lg" style="font-family:verdana,tahoma,poppins;">Approve Farm&nbsp;<i class="fa fa-check"></i></a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row m-t-3">
                      <div class="col-lg-2">
                         <div class="user-img pull-left"> <img src="dist/img/icon2.png" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                         <h5 id="farm2">EARTHMINE-HUB Farm 2(enterprise)</h5>
                          <p>Go enterprise with a minimum invest of $5,250.00 over a 9-month ETH mining period with an allowance of up to 350 MH/s</p>
                          <p><small>A daily maintenance fee of $0.030 per MH/s will be deducted from your mining outputs in ETH at the USD/ETH exchange rate of the mining day.<br>Access to our free and VIP Telegram channels.</small></p>

                            <hr>
                          <div class="row">
                            <div class="col-lg-2 col-xs-4 m-bot-2"><img src="dist/img/icon2.png" alt="token" class="img-responsive img-rounded" title="Earthminer Hub"></div>
                             <div class="col-lg-6 col-xs-6 m-bot-2"><a href="./include/processor.php?plan=farm2" target="" rel="" class="btn btn-primary btn-lg" style="font-family:verdana,tahoma,poppins;">Approve Farm 2&nbsp;<i class="fa fa-check"></i></a></div>
                           </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row m-t-3">
                      <div class="col-lg-2">
                         <div class="user-img pull-left"> <img src="dist/img/icon2.png" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                         <h5 id="commercial">EARTHMINE-HUB Commercial</h5>
                          <p>Go commercial with a minimum invest of $10,520.00 over a 12-month ETH mining period with an allowance of up to 512 MH/s</p>
                          <p><small>A daily maintenance fee of $0.050 per MH/s will be deducted from your mining outputs in ETH at the USD/ETH exchange rate of the mining day.<br>Access to our free and VIP Telegram channels.</small></p>

                            <hr>
                          <div class="row">
                            <div class="col-lg-2 col-xs-4 m-bot-2"><img src="dist/img/icon2.png" alt="token" class="img-responsive img-rounded" title="Earthminer Hub"></div>
                             <div class="col-lg-6 col-xs-6 m-bot-2"><a href="./include/processor.php?plan=commercial" target="" rel="" type="button" class="btn btn-primary btn-lg" style="font-family:verdana,tahoma,poppins;">Approve Commercial&nbsp;<i class="fa fa-check"></i></a></div>
                          </div>
                          <hr>

         <div class="row m-t-5">
            <!--   <p><small><em>All plans are one-time payments for the entire contract duration and are not based on a monthly subscription model.</em></small></p>
            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/icon1.png" alt="token" class="img-responsive img-rounded" title="Join Earthminer channels"></div>
            <div class="col-lg-6 col-xs-6 m-bot-2"><a href="https://t.me/earthminers" target="_blank" rel="noopener" type="button" class="btn btn-primary btn-lg" style="cursor:pointer; font-family:verdana,tahoma,poppins;">Join Channel&nbsp;<i class="fa fa-telegram"></i></a></div>-->
          </div> 

                      <div class="like-comm m-t-1"> <a href="#"><?= date('l - M.d.Y H:i'); ?></a> <a href="#"><i class="fa fa-heart text-danger"></i> With love from Earthminers</a> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                <!--second pane-->

                <div class="tab-pane" id="pool" role="tabpanel" aria-expanded="true">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/icon3.png" class="img-circle img-responsive" alt="User Image" title="Earthminer Pools"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>LP-BNB POOL (Closed)</h5>
                          <p>Stake your tokens, up to a maximum of $10,000 and earn the Binance tokens! There are no locks on deposits!</p>
                          <p>Smart contract to be deployed as soon as work is completed.</p>
                          <hr>
                          <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/icon3.png" alt="token" class="img-responsive img-rounded" title="Earthminer Pools"></div>
                             <div class="col-lg-6 col-xs-6 m-bot-2"><a href="#0" target="" rel="" type="button" class="btn btn-primary btn-lg disabled" style="font-family:verdana,tahoma,poppins;">Approve LP-BNB&nbsp;<i class="fa fa-lock"></i></a></div>
                          </div>
                          <hr>
                        </div>
                      </div>
                    </div>
                    <div class="row m-t-3">
                      <div class="col-lg-2">
                         <div class="user-img pull-left"> <img src="dist/img/icon3.png" class="img-circle img-responsive" alt="User Image" title="Earthminer Pools"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>LP-BNB 2 POOL (Not Available)</h5>
                          <p>Stake your tokens and earn other tokens on the Binance smartchain, as will be announced soon! There are no locks on deposits to the pool!</p>
                          <p>Smart contract to be deployed as soon as work is completed.</p>
                          <hr>
                           <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/icon3.png" alt="token" class="img-responsive img-rounded" title="Earthminer Pools"></div>
                             <div class="col-lg-6 col-xs-6 m-bot-2"><a href="#0" target="" rel="" type="button" class="btn btn-primary btn-lg disabled" style="font-family:verdana,tahoma,poppins;">Approve LP-BNB 2&nbsp;<i class="fa fa-lock"></i></a></div>
                           </div>
                           <hr>
                            <div class="row m-t-5">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/icon1.png" alt="token" class="img-responsive img-rounded" title="Join Earthminer channels"></div>
                            <div class="col-lg-6 col-xs-6 m-bot-2"><a href="https://t.me/earthminers" target="_blank" rel="noopener" type="button" class="btn btn-primary btn-lg" style="cursor:pointer; font-family:verdana,tahoma,poppins;">Join Channel&nbsp;<i class="fa fa-telegram"></i></a></div>
                          </div>
                          <hr>
  
                          <div class="like-comm m-t-1"> <a href="#"><?= date('l - M.d.Y H:i'); ?></a> <a href="#"><i class="fa fa-heart text-danger"></i> With love from Earthminers</a> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--Third pane-->
                <div class="tab-pane" id="farm" role="tabpanel" aria-expanded="true">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/icon4.png" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>FARM 1 (closed)</h5>
                          <p>Earthminers Farm1 is a smart-contract powered yield farm that pays an APR of 55.78% on a minimum of $40.00</p>
                          <p>Smart contract to be deployed as soon as work is completed.</p>
                          <hr>
                          <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/icon4.png" alt="token" class="img-responsive img-rounded" title="Earthminer Farms"></div>
                             <div class="col-lg-6 col-xs-6 m-bot-2"><a href="#0" target="" rel="" type="button" class="btn btn-primary btn-lg disabled" style="font-family:verdana,tahoma,poppins;">Approve Farm 1&nbsp;<i class="fa fa-lock"></i></a></div>
                          </div>
                          <hr>
                        </div>
                      </div>
                    </div>
                    <div class="row m-t-3">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/icon4.png" class="img-circle img-responsive" alt="User Image" title="Yield Farms"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>APE (closed)</h5>
                          <p>Earthminers APE is a smart-contract powered yield farm that pays an APR of 87.68% on a minimum of $120.00</p>
                          <p>Smart contract to be deployed as soon as work is completed.</p>
                          <hr>
                           <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/icon4.png" alt="token" class="img-responsive img-rounded" title="Earthminer Farms"></div>
                             <div class="col-lg-6 col-xs-6 m-bot-2"><a href="#0" target="" rel="" type="button" class="btn btn-primary btn-lg disabled" style="font-family:verdana,tahoma,poppins;">Approve APE&nbsp;<i class="fa fa-lock"></i></a></div>
                          </div>
                          <hr>
                        </div>
                      </div>
                    </div>
                    <div class="row m-t-3">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/icon4.png" class="img-circle img-responsive" alt="User Image" title="Yield Farms"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>LP-PROTOCOL (closed)</h5>
                          <p>Earthminers LP-PROTOCOL is a smart-contract powered yield farm that pays an APR of 127.58% on a minimum of $200.00</p>
                          <p>Smart contract to be deployed as soon as work is completed.</p>
                          <hr>
                           <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/icon4.png" alt="token" class="img-responsive img-rounded" title="Earthminer Farms"></div>
                             <div class="col-lg-6 col-xs-6 m-bot-2"><a href="#0" target="" rel="" type="button" class="btn btn-primary btn-lg disabled" style="font-family:verdana,tahoma,poppins;">Approve LP-PROTOCOL&nbsp;<i class="fa fa-lock"></i></a></div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/icon1.png" alt="token" class="img-responsive img-rounded" title="Join Earthminer channels"></div>
                            <div class="col-lg-6 col-xs-6 m-bot-2"><a href="https://t.me/earthminers" target="_blank" rel="noopener" type="button" class="btn btn-primary btn-lg" style="cursor:pointer; font-family:verdana,tahoma,poppins;">Join Channel&nbsp;<i class="fa fa-telegram"></i></a></div>
                          </div>
                          <hr>
                          <div class="like-comm m-t-1"> <a href="#"><?= date('l - M.d.Y H:i'); ?></a> <a href="#"><i class="fa fa-heart text-danger"></i> With love from Earthminers</a> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Fourth pane -->
                <div class="tab-pane" id="nft" role="tabpanel" aria-expanded="true">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/hero.png" class="img-circle img-responsive" alt="User Image" title="NFT Marketplace"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>NFT (coming soon)</h5>
                          <p>Acquire unique NFTs and earn coins and tokens by staking your LP tokens on Earthminers.</p>
                          <p>All NFT's will be bought and sold online, frequently with accepted cryptocurrencies, and will be encoded with the same underlying software as many cryptos.</p>
                          <hr>
                             <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/hero.png" alt="token" class="img-responsive img-rounded" title="NFT Marketplace"></div>
                             <div class="col-lg-6 col-xs-6 m-bot-2"><a href="#0" target="" rel="" type="button" class="btn btn-primary btn-lg disabled" style="font-family:verdana,tahoma,poppins;">NFT Marketplace&nbsp;<i class="fa fa-lock"></i></a></div>
                          </div>
                          <hr>
                           <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/icon1.png" alt="token" class="img-responsive img-rounded" title="Join Earthminer channels"></div>
                            <div class="col-lg-6 col-xs-6 m-bot-2"><a href="https://t.me/earthminers" target="_blank" rel="noopener" type="button" class="btn btn-primary btn-lg" style="cursor:pointer; font-family:verdana,tahoma,poppins;">Join Channel&nbsp;<i class="fa fa-telegram"></i></a></div>
                          </div>
                          <hr>
                        </div>
                      </div>
                    </div>
                    <div class="row m-t-3">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"></div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <div class="like-comm m-t-1"> <a href="#"><?= date('l - M.d.Y H:i'); ?></a> <a href="#"><i class="fa fa-heart text-danger"></i> With love from Earthminers</a> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Fifth pane -->
                <div class="tab-pane" id="games" role="tabpanel" aria-expanded="true">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/group.png" class="img-circle img-responsive" alt="User Image" title="Game and Rewards"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>GAMES (coming soon)</h5>
                          <p>Earthminer Games is a next generation hybrid blockchain-based online gaming platform with a unique and immersive way to earn rewards.</p>
                          <p>Keep in touch with us for Treasure Chest Rewards, Blockchain Pac Rewards and several other exciting games that rewards players infinitely only on Earthminers.</p>
                          <hr>
                          <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/icon1.png" alt="token" class="img-responsive img-rounded" title="Join Earthminer channels"></div>
                            <div class="col-lg-6 col-xs-6 m-bot-2"><a href="https://t.me/earthminers" target="_blank" rel="noopener" type="button" class="btn btn-primary btn-lg" style="cursor:pointer; font-family:verdana,tahoma,poppins;">Join Channel&nbsp;<i class="fa fa-telegram"></i></a></div>
                          </div>
                          <hr>
                        </div>
                      </div>
                    </div>
                    <div class="row m-t-3">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"></div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          
                          <div class="like-comm m-t-1"> <a href="#"><?= date('l - M.d.Y H:i'); ?></a> <a href="#"><i class="fa fa-heart text-danger"></i> With love from Earthminers</a> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <!-- sixth pane -->
                <div class="tab-pane" id="token" role="tabpanel" aria-expanded="true">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/logo-n-blue.png" class="img-circle img-responsive" alt="Token Image" title="Earthminers Token"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>TOKEN (BC-SC awaiting)</h5>
                          <p>The earthminers multi-purpose blockchain and transactions based token is being prepared and will be released to memebers of our community. As soon as work is completed on our blockchain, then we will launch.</p>
                          <p>Keep in touch with us for this big news.</p>
                          <hr>
                          <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/icon1.png" alt="token" class="img-responsive img-rounded" title="Join Earthminer channels"></div>
                            <div class="col-lg-6 col-xs-6 m-bot-2"><a href="https://t.me/earthminers" target="_blank" rel="noopener" type="button" class="btn btn-primary btn-lg" style="cursor:pointer; font-family:verdana,tahoma,poppins;">Join Channel&nbsp;<i class="fa fa-telegram"></i></a></div>
                          </div>
                          <hr>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="row m-t-0">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"></div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5></h5>
                          <p></p>
                           <div class="row">
                            
                          </div>
                          <div class="like-comm m-t-1"> <a href="#"><?= date('l - M.d.Y H:i'); ?></a> <a href="#"><i class="fa fa-heart text-danger"></i> With love from Earthminers</a> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
      <div class="col-lg-4">
        <div class="soci-wid-box bg-twitter m-b-3">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-twitter-alt"></i></div>
                  <p>Twitter Feed Loading Soon...</p>
                  <p class="text-italic pt-1">- Earthminers -</p>
                </div>
              </div>
           <div class="carousel-item">
                   <div class="col-lg-12 text-center">
                <div class="sco-icon"><i class="ti-twitter-alt"></i></div>
                  <p>Twitter Feed Loading Soon...</p>
                  <p class="text-italic pt-1">- Earthminers -</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-twitter-alt"></i></div>
                  <p>Twitter Feed Loading Soon...</p>
                  <p class="text-italic pt-1">- Earthminers -</p>
                </div>
              </div>
            </div>
           <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div> 
        </div>
      </div>
      <div class="col-lg-4">
        <div class="soci-wid-box bg-facebook m-b-3">
          <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="fa fa-telegram"></i></div>
                  <p>Telegram Feed Loading Soon...</p>
                  <p class="text-italic pt-1">- Earthminers -</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="fa fa-telegram"></i></div>
                  <p>Telegram Feed Loading Soon...</p>
                  <p class="text-italic pt-1">- Earthminers -</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="fa fa-telegram"></i></div>
                  <p>Telegram Feed Loading Soon...</p>
                  <p class="text-italic pt-1">- Earthminers -</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="soci-wid-box bg-google-plus m-b-3">
          <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-instagram"></i></div>
                  <p>Instagram Feed Loading Soon...</p>
                  <p class="text-italic pt-1">- Earthminers -</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-instagram"></i></div>
                  <p>Instagram Feed Loading Soon...</p>
                  <p class="text-italic pt-1">- Earthminers -</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-instagram"></i></div>
                  <p>Instagram Feed Loading Soon...</p>
                  <p class="text-italic pt-1">- Earthminers -</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
        </div>
      </div>
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer"><?php include('foot.php');?></footer>
</div>
<!-- ./wrapper --> 

<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="dist/js/niche.js"></script> 

<!-- Chartjs JavaScript --> 
<script src="dist/plugins/chartjs/chart.min.js"></script>
<script src="dist/plugins/chartjs/chart-int.js"></script>

<!-- Chartist JavaScript --> 
<script src="dist/plugins/chartist-js/chartist.min.js"></script> 
<script src="dist/plugins/chartist-js/chartist-plugin-tooltip.js"></script> 
<script src="dist/plugins/functions/chartist-init.js"></script>

<!-- Toastr -->
<script src="dist/js/toastr.min.js"></script>
<script type="text/javascript">
  // if(screen.width<1000){
  //   confirm("Your current device may need landscape orientation to view a few items");
  // }
</script>
</body>
</html>
<?php
if(isset($toast) && $toast==='success'){echo "<script>toastr.success('You have updated your information', 'Success')</script>";}
if(isset($toast) && $toast==='fail'){echo "<script>toastr.error('We could not update that information', 'Error')</script>";}

if(isset($toast) && $toast==='wstatus_success'){echo "<script>toastr.info('Your withdraw request is now pending', 'Request Received')</script>";}
if(isset($toast) && $toast==='wstatus_fail'){echo "<script>toastr.error('We could not update that information. Try again or contact support team', 'Error')</script>";}
?>

<?php $dbc->close();?>
