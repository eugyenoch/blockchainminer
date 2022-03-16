 <div class="user-panel">
        <div class="image text-center"><img src="<?php if(isset($profile_photo) && $profile_photo!==null){echo $profile_photo;}?>" title="<?php if(isset($firstname) && $firstname!==null){echo $firstname;}?> <?php if(isset($lastname) && $lastname!==null){echo $lastname;}?>" class="img-circle" alt="User Image"> </div>
        <div class="info">
          <p><?php if(isset($firstname) && $firstname!==null){echo $firstname;}?> <?php if(isset($lastname) && $lastname!==null){echo $lastname;}?></p>
          <a href="pages-profile.php#settings"><i class="fa fa-cog"></i></a> <a href="pages-profile.php"><i class="fa fa-envelope-o"></i></a> <a href="logout.php"><i class="fa fa-power-off"></i></a> </div>
      </div>
<!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">PERSONAL</li>
        <li class="active treeview"> <a href="#"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="user.php">Home</a></li>          
            <!-- <li class=""><a href="#0">Dashboard</a></li> -->
           <!--  <li><a href=""></a></li>  -->       
           <li><a href="pages-profile.php">Profile</a></li>
           <li><a href="pages-profile.php#settings">Settings</a></li>
           <li><a href="user-update.php">Security</a></li>
           <li><a href="user-update.php">Wallets & Addresses</a></li>
            <li><a href="pages-profile.php#upload">Uploads</a></li>

            <!--<li><a href=""></a></li> -->
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Apps</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="apps-calendar.php">Calendar</a></li>
            <li><a href="apps-compose-mail.php">Support Ticket</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-envelope-o "></i> <span>Inbox</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="apps-mailbox.php">Mailbox</a></li>
            <li><a href="apps-mailbox-detail.php">Mailbox Detail</a></li>
            <li><a href="apps-compose-mail.php">Compose Mail</a></li>
          </ul>
        </li>
        <li class="header">FORMS, TABLES & WIDGETS</li>
        <li class="treeview"> <a href="#"> <i class="fa fa-edit"></i> <span>Forms</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <!-- <li><a href="form-layouts.html">Form Layouts</a></li> -->
            <li><a href="form-summernote.php">Notes & Draft</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-table"></i> <span>Funding & Withdrawals</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="table-data-fund.php">Purchase Table</a></li>
            <li><a href="table-data-withdraw.php">Withdraw Table</a></li>
             <li><a href="pages-invoice.php">Invoice</a></li>
             <li><a href="pages-pricing.php">Pricing</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-files-o"></i> <span>Pages</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="user-update.php">Reset password</a></li>
            <li><a href="pages-gallery.php">Gallery</a></li>
            <li><a href="pages-faq.php">Faqs</a></li>
          </ul>
        </li>
    </div>
    <!-- /.sidebar --> 