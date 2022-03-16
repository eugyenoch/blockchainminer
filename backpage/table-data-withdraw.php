<?php
//Require my functions.php file
include('function.php');
//Begin cookie and include the cookie file
include('include/cookie.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Data Tables | Earthminers</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

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

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
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
      <h3 class="text-black">Data Tables | <?php if(isset($sessEmail)){echo $sessEmail;} ?></h3>
      <ol class="breadcrumb">
        <li><a href="user.php">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Account</li>
        <li><i class="fa fa-angle-right"></i> Data Tables</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
       <h4 class="text-black" id="withdraws">Account Withdrawal History</h4>
      <p>Data Table With History on Withdrawal<br>
      Export data to CSV, Excel, PDF & Print</p>
      <div class="table-responsive">
              <table id="example2" class="table table-bordered table-hover" data-name="cool-table">
                <thead>
                    <tr>
                    <th title="Transaction ID">ID</th>
                    <th title="User email">Email</th>
                    <th title="Transaction currency">Currency</th>
                    <th title="Transaction amount">Amount</th>
                    <th title="User wallet address">Wallet Address</th>
                    <th title="Approval status">Status</th>
                    <th title="Request Date and Time">Request Date</th>
                    <th title="User actions">Action</th>
                  </tr>
                </thead>
                <tbody>
             <?php foreach($SQL_withdraw_ex as $withdraw_info){extract($withdraw_info);?>
            <tr>
              <td><?php if(isset($withdraw_info['wtxn'])&&$withdraw_info['wtxn']!==null){echo $withdraw_info['wtxn'];} ?></td>

              <td><?php if(isset($withdraw_info['user_email'])&&$withdraw_info['user_email']!==null){echo $withdraw_info['user_email'];} ?></td>
             
              <td><?php if(isset($withdraw_info['wcurrency'])&&$withdraw_info['wcurrency']!==null){echo $withdraw_info['wcurrency'];} ?></td>

               <td><?php if(isset($withdraw_info['wamount'])&&$withdraw_info['wamount']!==null){echo $withdraw_info['wamount'];} ?></td>
                <td><?php if(isset($withdraw_info['wallet_address'])&&$withdraw_info['wallet_address']!==null){echo $withdraw_info['wallet_address'];} ?></td>

              <td><?php 
              if(isset($withdraw_info['wstatus'])&&$withdraw_info['wstatus']==="Pending"){echo "<span class='label label-warning'>Pending</span>";}
              if(isset($withdraw_info['wstatus'])&&$withdraw_info['wstatus']==="Approved"){echo "<span class='label label-success'>Approved</span>";}
            ?></td>

          <td><?php if(isset($withdraw_info['withdraw_request_date'])&&$withdraw_info['withdraw_request_date']!==null){echo $withdraw_info['withdraw_request_date'];} ?></td>
           <td>
            <?php if(isset($withdraw_info['wtxn'])&&isset($withdraw_info['user_email'])&&isset($withdraw_info['wcurrency'])&&isset($withdraw_info['wamount'])&&isset($withdraw_info['wallet_address'])&&isset($withdraw_info['wstatus'])&&isset($withdraw_info['withdraw_request_date'])){?>
              <a class="btn btn-outline-danger" href="./include/processor.php?dw=<?= $withdraw_info['wtxn'];?>">Delete</a>
           <?php }?>
          </td>
                  </tr>
<?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                    <th title="Transaction ID">ID</th>
                    <th title="User email">Email</th>
                    <th title="Transaction currency">Currency</th>
                    <th title="Transaction amount">Amount</th>
                    <th title="User wallet address">Wallet Address</th>
                    <th title="Approval status">Status</th>
                    <th title="Request Date and Time">Request Date</th>
                    <th title="User actions">Action</th>
                  </tr>
                </tfoot>
              </table>
                  </div>
      </div>
      </div>
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->

    <footer class="main-footer">
      <?php include('foot.php');?>
      </footer>
    
</div>
<!-- ./wrapper --> 

<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="dist/js/niche.js"></script> 

<!-- DataTable --> 
<script src="dist/plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="dist/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script src="dist/plugins/table-expo/filesaver.min.js"></script>
<script src="dist/plugins/table-expo/xls.core.min.js"></script>
<script src="dist/plugins/table-expo/tableexport.js"></script>
<script>
$("table").tableExport({formats: ["xlsx","xls", "csv", "txt"],    });
</script>

</body>
</html>
<?php $dbc->close();?>