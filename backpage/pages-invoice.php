<?php
//Require my functions.php file
include('function.php');
//Begin cookie and include the cookie file
include('include/cookie.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>Invoice Page | Earthminers</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

<!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css" />

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" />

<!-- Theme style -->
<link rel="stylesheet" href="dist/css/style.css" />
<link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css" />
<link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css" />

<!-- DataTables -->
<link rel="stylesheet" href="dist/plugins/datatables/css/dataTables.bootstrap.min.css" />

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
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h3>Invoice page | <?php if(isset($sessEmail)){echo $sessEmail;} ?></h3>
      <ol class="breadcrumb">
        <li><a href="user.php">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Pages</li>
        <li><i class="fa fa-angle-right"></i> Invoice</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="m-b-3">
        <div class="callout callout-info no-print" style="margin-bottom: 0!important;">
          <h4><i class="fa fa-info"></i> Note:</h4>
          This page has been enhanced for printing. Click the Generate PDF button at the bottom of the invoice to generate PDF and print. </div>
      </div>
      <div class="info-box"> 
        <!-- Main content -->
        <div class="invoice"> 
          <!-- title row -->
          <div class="row">
            <div class="col-lg-12 m-b-3">
              <h3 class="text-black"> INVOICE <span class="pull-right">
                <?php if(isset($fund_info['ftxn'])&&$fund_info['ftxn']!==null){echo $fund_info['ftxn'];} ?></span> 
              </h3>
            </div>
            <!-- /.col --> 
          </div>
          <!-- info row -->
          <div class="row invoice-info m-b-3">
            <div class="col-sm-4 invoice-col"> From
              <address>
              <strong>Earthminers Store</strong><br>
              Kalkofnsvegur 2, Reykjavik<br>
              Capital Region, 101<br>
              Phone: (354) 421-2434<br>
              Email: info@earthminers.com
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col"> To
              <address>
              <strong><?php if(isset($firstname) && isset($lastname)){echo $firstname."&nbsp;".$lastname;}else{echo "Check that your firstname and lastname is set";}?></strong><br>
              <?php if(isset($address) && $address!==null){echo $address;}else{echo "Check that your address is set";}?><br>
              <?php if(isset($city) && $city!==null){echo $city;}else{echo "set a city";}?>,<?php if(isset($country) && $country!==null){echo $country;}else{echo "and country";}?><br>
              Phone: <?php if(isset($phone) && $phone!==null){echo $phone;}else{echo "Check that your phone number is set";}?><br>
              Email: <?php if(isset($user_email) && $user_email!==null){echo $user_email;}else{echo "Check that your email is set";}?>
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col"> <b>Invoice #:  <?php if(isset($fund_info['ftxn'])&&$fund_info['ftxn']!==null){echo $fund_info['ftxn'];} ?></b><br>
              <br>
              <b>Order ID:</b>  <?php if(isset($fund_info['ftxn'])&&$fund_info['ftxn']!==null){echo $fund_info['ftxn'];} ?><br>
              <b>Payment Due:</b>  <?php if(isset($fund_info['request_date'])&&$fund_info['request_date']!==null){echo $fund_info['request_date'];} ?><br>
              <b>Account:</b> <?php if(isset($fund_info['affid'])&&$fund_info['affid']!==null){echo $fund_info['affid'];} ?> </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
          
          <!-- Table row -->
          <div class="row ">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Qty</th>
                    <th>Product</th>
                    <th>Serial #</th>
                    <th>Description</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td><?php if(isset($fund_info['fundname'])&& $fund_info['fundname']!==null && $fund_info['status']==='Pending'){echo $fund_info['fundname'];}?></td>
                    <td><?php if(isset($fund_info['ftxn']) && $fund_info['ftxn']!==null && $fund_info['status']==='Pending'){echo $fund_info['ftxn'];} ?></td>
                    <td>
                      <?php 
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Shield' && $fund_info['status']==='Pending'){echo "1 month mining period with an allowance of up to 40 MH/s.";} 
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Shield 2' && $fund_info['status']==='Pending'){echo "3 months mining period with an allowance of up to 80 MH/s.";}
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Farm' && $fund_info['status']==='Pending'){echo "6 months mining period with an allowance of up to 150 MH/s.";}
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Farm 2' && $fund_info['status']==='Pending'){echo "9 months mining period with an allowance of up to 350 MH/s.";}
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Commercial' && $fund_info['status']==='Pending'){echo "12 months ETH mining period with an allowance of up to 512 MH/s.";}
                       ?>
                    </td>
                    <td>
                       <?php 
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Shield' && $fund_info['status']==='Pending'){echo "$". "200.00";} 
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Shield 2' && $fund_info['status']==='Pending'){echo "$". "525.00";}
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Farm' && $fund_info['status']==='Pending'){echo "$". "1,550.00";}
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Farm 2' && $fund_info['status']==='Pending'){echo "$". "5,250.00";}
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Commercial' && $fund_info['status']==='Pending'){echo "$". "10,520.00";}
                       ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row -->
          
          <div class="row m-t-3"> 
            <!-- accepted payments column -->
            <div class="col-lg-6">
              <p class="lead">Payment Methods:</p>
              <img src="dist/img/btc.png" alt="Bitcoin" width="42px" height="42px"> <img src="dist/img/ethereum.png" alt="Ethereum" width="42px" height="42px">
              <img src="dist/img/visa.png" alt="Visa"> <img src="dist/img/mastercard.png" alt="Mastercard"> <img src="dist/img/american-express.png" alt="American Express"> <img src="dist/img/paypal2.png" alt="Paypal">
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> We accept the following payment methods on Earthminers. Other payment methods will be added upon approval. </p>
            </div>
            <!-- /.col -->
            <div class="col-lg-6">
              <p class="lead">Amount Due <?php if(isset($fund_info['request_date'])&&$fund_info['request_date']!==null){echo $fund_info['request_date'];} ?></p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td> <?php 
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Shield' && $fund_info['status']==='Pending'){echo "$". "200.00";} 
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Shield 2' && $fund_info['status']==='Pending'){echo "$". "525.00";}
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Farm' && $fund_info['status']==='Pending'){echo "$". "1,550.00";}
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Farm 2' && $fund_info['status']==='Pending'){echo "$". "5,250.00";}
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Commercial' && $fund_info['status']==='Pending'){echo "$". "10,520.00";}
                       ?></td>
                  </tr>
                  <tr>
                    <th>Tax</th>
                    <td>9.99%</td>
                  </tr>
                  <tr>
                    <th>Shipping:</th>
                    <td>$0.00</td>
                  </tr>
                  <tr>
                    <th class="">Total:</th>
                    <td><?php 
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Shield' && $fund_info['status']==='Pending'){echo "$". "220.00";} 
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Shield 2' && $fund_info['status']==='Pending'){echo "$". "577.50";}
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Farm' && $fund_info['status']==='Pending'){echo "$". "1,705.00";}
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Farm 2' && $fund_info['status']==='Pending'){echo "$". "5,775.00";}
                      if(isset($fund_info['fundname']) && $fund_info['fundname']==='Commercial' && $fund_info['status']==='Pending'){echo "$". "11,572.00";}
                       ?></td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
          
          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-lg-12">
               <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment </button>
              <button style="margin-right: 5px;" type="button" class="btn btn-primary pull-right" onclick="print()"> <i class="fa fa-download"></i> Generate PDF </button>

             
            </div>
          </div>
        </div>
        <!-- /.content --> 
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

<!-- jQuery UI 1.11.4 --> 
<script src="dist/plugins/jquery-ui/jquery-ui.min.js"></script>
</body>
</html>
