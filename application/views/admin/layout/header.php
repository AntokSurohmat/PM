    <!-- Logo -->
    <a href="<?= base_url('home')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Profile</b>Matching</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class=" user user-menu">
            <a class="dropdown-toggle">
              <img src="<?= base_url('assets/AdminLTE-2.4.18/');?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $user->username?></span>
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="modal" data-target="#logOutModal" title="Loguot"><i class="fa fa-sign-out"></i></a>
          </li>
        </ul>
      </div>
    </nav>