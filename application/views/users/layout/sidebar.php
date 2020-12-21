 <!-- sidebar: style can be found in sidebar.less -->
 <section class="sidebar">
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="<?php if($page == 'Home'){ echo 'active';}?>">
      <a href="<?= base_url('users')?>"><i class="fa fa-home"></i> <span>Home</span></a>
    </li>
    <li class="<?php if($page == 'Profile'){ echo 'active';}?>">
      <a href="<?= base_url('users/profile')?>"><i class="fa fa-user"></i> <span>Profile</span></a>
    </li>
    <li class="treeview <?php if($parent == 'Data' || $parent == 'Calon Pegawai' || $parent == 'Aspek Penilaian' || $parent == 'Faktor Penilaian'){ echo 'active';}?>">
      <a href="#">
        <i class="fa fa-book"></i> <span>Data</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php if($page == 'Calon Pegawai' || $page == 'Add Calon Pegawai' || $page == 'Edit Calon Pegawai'){ echo 'active';}?>">
          <a href="<?= base_url('users/pegawai')?>"><i class="fa fa-circle-o"></i>Calon Pegawai</a>
        </li>
        <li class="<?php if($page == 'Aspek Penilaian' || $page == 'Add Aspek Penilaian' || $page == 'Edit Aspek Penilaian'){ echo 'active';}?>">
          <a href="<?= base_url('users/aspek')?>"><i class="fa fa-circle-o"></i>Aspek Penilaian</a>
        </li>
        <li class="<?php if($page == 'Faktor Penilaian' || $page == 'Add Faktor Penilaian' || $page == 'Edit Faktor Penilaian'){ echo 'active';}?>">
          <a href="<?= base_url('users/faktor')?>"><i class="fa fa-circle-o"></i>Faktor Penilaian</a>
        </li>
      </ul>
    </li>
    <li class="<?php if($page == 'Kandidat Calon Pegawai'){ echo 'active';}?>">
      <a href="<?= base_url('users/kandidat')?>"><i class="fa fa-fw fa-bar-chart-o"></i> <span>Kandidat Calon Pegawai</span></a>
    </li>
    <li class="<?php if($page == 'Hasil Perhitungan'){ echo 'active';}?>">
      <a href="<?= base_url('users/hasil')?>"><i class="fa fa-fw fa-edit"></i> <span>Hasil Perhitungan</span></a>
    </li>
    <li><a href="#" data-toggle="modal" data-target="#logOutModal" data-backdrop="static" data-keyboard="true"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
  </ul>
</section>
  <!-- /.sidebar -->