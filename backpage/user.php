<?php
//Require my functions.php file
include('function.php');
//Begin cookie and include the cookie file
include('include/cookie.php');

$profile_photo = './upload/'.$photo;

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
      <h1>Accounts</h1>
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
              <h6 class="info-box-text text-white">New Orders</h6>
              <h1 class="text-white">1,150</h1>
              <span class="progress-description text-white"> 70% Increase in 30 Days </span> </div>
            <!-- /.info-box-content --> 
          </div>
          <!-- /.info-box --> 
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green text-white"> <span class="info-box-icon bg-transparent"><i class="ti-face-smile"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">New Users</h6>
              <h1 class="text-white">565</h1>
              <span class="progress-description text-white"> 45% Increase in 30 Days </span> </div>
            <!-- /.info-box-content --> 
          </div>
          <!-- /.info-box --> 
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua"> <span class="info-box-icon bg-transparent"><i class="ti-bar-chart"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Online Revenue</h6>
              <h1 class="text-white">$5,450</h1>
              <span class="progress-description text-white"> 50% Increase in 30 Days </span> </div>
            <!-- /.info-box-content --> 
          </div>
          <!-- /.info-box --> 
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="info-box bg-orange"> <span class="info-box-icon bg-transparent"><i class="ti-money"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Total Profit</h6>
              <h1 class="text-white">$8,188</h1>
              <span class="progress-description text-white"> 35% Increase in 30 Days </span> </div>
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
                <h4 class="text-black">Our Visitors</h4>
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
                <p>Mines auto-yield up to 250%. All that is needed is simply grow your own stake</p>
              </div>
            </div>
            <div class="sl-item sl-danger">
              <div class="sl-content"><small class="text-muted"><i class="fa fa-user position-left"></i> Pool(launching...)</small>
                <p>All that is needed is to stake some tokens to earn. High APR, low risk.</p>
              </div>
            </div>
            <div class="sl-item sl-success">
              <div class="sl-content"><small class="text-muted"><i class="fa fa-user position-left"></i> Farm(launching...)</small>
                <p>Stake liquidity (LP) tokens to earn more with APR's up to 300%</p> 
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
                <h4 class="m-b-2 text-black">Line Chart with Area</h4>
              </div>
            </div>
           <div class="ct-line-chart" style="height:350px;"></div>
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
                <div class="widget-user-image"> <img class="img-circle" src="dist/img/img5.jpg" alt="User Avatar"> </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">Earth Miners<sup>&copy;</sup></h3>
                <h5 class="widget-user-desc">Mines, Farms, Marketplace and Pools</h5>
              </div>
              <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                  <li><a href="#mine">Mines <span class="pull-right badge bg-blue">5</span></a></li>
                  <li><a href="#pool">Pools <span class="pull-right badge bg-aqua">2</span></a></li>
                  <li><a href="#farm">Farms <span class="pull-right badge bg-green">3</span></a></li>
                  <li><a href="#nft">NFT Pools<span class="pull-right badge bg-red">4</span></a></li>
                  <li><a href="#games">Games <span class="pull-right badge bg-green">4</span></a></li>
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
                      <h5 class="description-header">1,500</h5>
                      <span class="description-text">SALES</span> </div>
                    <!-- /.description-block --> 
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">10,350</h5>
                      <span class="description-text">FOLLOWERS</span> </div>
                    <!-- /.description-block --> 
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span> </div>
                    <!-- /.description-block --> 
                  </div>
                  <!-- /.col --> 
                </div>
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
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#pool" role="tab" aria-expanded="true">Pools</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#farm" role="tab" aria-expanded="false">Farms</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#nft" role="tab">NFT's</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#games" role="tab">Games</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#token" role="tab">Token</a> </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="mine" role="tabpanel" aria-expanded="true">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/img3.jpg" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>MINE</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum raesent mauris nec.</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                          <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img7.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img8.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img9.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img10.jpg" alt="user" class="img-responsive img-rounded"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row m-t-3">
                      <div class="col-lg-2">
                         <div class="user-img pull-left"> <img src="dist/img/img3.jpg" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>MINE</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum raesent mauris nec.</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                           <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img7.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img8.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img9.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img10.jpg" alt="user" class="img-responsive img-rounded"></div>
                          </div>
                          <div class="like-comm m-t-1"> <a href="#"><?= date('l - M.d.Y H:i'); ?></a> <a href="#"><i class="fa fa-heart text-danger"></i> With love from Earthminers</a> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--second pane-->

                <div class="tab-pane" id="pool" role="tabpanel" aria-expanded="false">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/img3.jpg" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>POOLS</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum raesent mauris nec.</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                          <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img7.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img8.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img9.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img10.jpg" alt="user" class="img-responsive img-rounded"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row m-t-3">
                      <div class="col-lg-2">
                         <div class="user-img pull-left"> <img src="dist/img/img3.jpg" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>POOLS</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum raesent mauris nec.</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                           <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img7.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img8.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img9.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img10.jpg" alt="user" class="img-responsive img-rounded"></div>
                          </div>
                          <div class="like-comm m-t-1"> <a href="#"><?= date('l - M.d.Y H:i'); ?></a> <a href="#"><i class="fa fa-heart text-danger"></i> With love from Earthminers</a> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--Third pane-->
                <div class="tab-pane" id="farm" role="tabpanel" aria-expanded="false">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/img3.jpg" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>FARM</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum raesent mauris nec.</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                          <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img7.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img8.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img9.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img10.jpg" alt="user" class="img-responsive img-rounded"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row m-t-3">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/img5.jpg" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>FARM</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum raesent mauris nec.</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                           <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img7.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img8.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img9.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img10.jpg" alt="user" class="img-responsive img-rounded"></div>
                          </div>
                          <div class="like-comm m-t-1"> <a href="#"><?= date('l - M.d.Y H:i'); ?></a> <a href="#"><i class="fa fa-heart text-danger"></i> With love from Earthminers</a> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Fourth pane -->
                <div class="tab-pane" id="nft" role="tabpanel" aria-expanded="false">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/img3.jpg" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>NFT</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum raesent mauris nec.</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                          <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img7.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img8.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img9.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img10.jpg" alt="user" class="img-responsive img-rounded"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row m-t-3">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/img5.jpg" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>NFT</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum raesent mauris nec.</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                           <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img7.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img8.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img9.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img10.jpg" alt="user" class="img-responsive img-rounded"></div>
                          </div>
                          <div class="like-comm m-t-1"> <a href="#"><?= date('l - M.d.Y H:i'); ?></a> <a href="#"><i class="fa fa-heart text-danger"></i> With love from Earthminers</a> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Fifth pane -->
                <div class="tab-pane" id="games" role="tabpanel" aria-expanded="false">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/img3.jpg" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>GAMES</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum raesent mauris nec.</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                          <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img7.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img8.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img9.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img10.jpg" alt="user" class="img-responsive img-rounded"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row m-t-3">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/img5.jpg" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>GAMES</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum raesent mauris nec.</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                           <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img7.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img8.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img9.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img10.jpg" alt="user" class="img-responsive img-rounded"></div>
                          </div>
                          <div class="like-comm m-t-1"> <a href="#"><?= date('l - M.d.Y H:i'); ?></a> <a href="#"><i class="fa fa-heart text-danger"></i> With love from Earthminers</a> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <!-- sixth pane -->
                <div class="tab-pane" id="token" role="tabpanel" aria-expanded="false">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/img3.jpg" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>TOKEN</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum raesent mauris nec.</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                          <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img7.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img8.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img9.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img10.jpg" alt="user" class="img-responsive img-rounded"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="row m-t-3">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/img5.jpg" class="img-circle img-responsive" alt="User Image"> </div>
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
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                  <p class="text-italic pt-1">- John Doe -</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-twitter-alt"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                  <p class="text-italic pt-1">- John Doe -</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-twitter-alt"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                  <p class="text-italic pt-1">- John Doe -</p>
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
                  <div class="sco-icon"><i class="ti-facebook"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                  <p class="text-italic pt-1">- John Doe -</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-facebook"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                  <p class="text-italic pt-1">- John Doe -</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-facebook"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                  <p class="text-italic pt-1">- John Doe -</p>
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
                  <div class="sco-icon"><i class="ti-google"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                  <p class="text-italic pt-1">- John Doe -</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-google"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                  <p class="text-italic pt-1">- John Doe -</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-google"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                  <p class="text-italic pt-1">- John Doe -</p>
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
</body>
</html>
<?php
if(isset($toast) && $toast==='success'){echo "<script>toastr.success('You have updated your information', 'Success')</script>";}
if(isset($toast) && $toast==='fail'){echo "<script>toastr.error('We could not update that information', 'Error')</script>";}
?>
