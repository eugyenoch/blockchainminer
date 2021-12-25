 <div class="user-panel">
        <div class="image text-center"><img src="<?php if(isset($profile_photo) && $profile_photo!==null){echo $profile_photo;}?>" title="<?php if(isset($firstname) && $firstname!==null){echo $firstname;}?> <?php if(isset($lastname) && $lastname!==null){echo $lastname;}?>" class="img-circle" alt="User Image"> </div>
        <div class="info">
          <p><?php if(isset($firstname) && $firstname!==null){echo $firstname;}?> <?php if(isset($lastname) && $lastname!==null){echo $lastname;}?></p>
          <a href="backpage/pages-profile.php#settings"><i class="fa fa-cog"></i></a> <a href="#"><i class="fa fa-envelope-o"></i></a> <a href="logout.php"><i class="fa fa-power-off"></i></a> </div>
      </div>
<!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">PERSONAL</li>
        <li class="active treeview"> <a href="#"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="user.php">Home</a></li>          
            <li class=""><a href="#0">Dashboard</a></li>
            <li><a href="ui-tooltip-popover.html">Tooltip &amp; Popover</a></li>        
           <li><a href="pages-profile.php">Profile</a></li>
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
        <li class="header">FORMS, TABLE & WIDGETS</li>
        <li class="treeview"> <a href="#"> <i class="fa fa-edit"></i> <span>Forms</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="form-layouts.html">Form Layouts</a></li>
            <li><a href="form-summernote.php">Summernote</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-table"></i> <span>Tables</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="table-data-table.php">Data Tables</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-th"></i> <span>Widgets</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="widget-data.html">Data Widgets</a></li>
            <li><a href="widget-apps.html">Apps Widgets</a></li>
          </ul>
        </li>
        <li class="header">EXTRA COMPONENTS</li>
        <li class="treeview"> <a href="#"><i class="fa fa-bar-chart"></i> <span>Charts</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="chart-morris.html">Morris Chart</a></li>
            <li><a href="chart-knob.html">Knob Chart</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-files-o"></i> <span>Pages</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="pages-blank.html">Blank page</a></li>
            <!-- <li><a href="pages-lockscreen.html">Lockscreen</a></li> -->
            <li><a href="pages-recover-password.html">Recover password</a></li>
            <li><a href="pages-invoice.html">Invoice</a></li>
            <li><a href="pages-treeview.html">Treeview</a></li>
            <li><a href="pages-pricing.html">Pricing</a></li>
            <li><a href="pages-gallery.html">Gallery</a></li>
            <li><a href="pages-faq.html">Faqs</a></li>
          </ul>
        </li>
    </div>
    <!-- /.sidebar --> 