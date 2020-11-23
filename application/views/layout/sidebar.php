 <!-- sidebar: style can be found in sidebar.less -->
 <section class="sidebar">
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="<?php if($page == 'Beranda'){ echo 'active';}?>">
      <a href="<?= base_url('home')?>"><i class="fa fa-dashboard"></i> <span>Beranda</span></a>
    </li>
    <li class="treeview <?php if($parent == 'Data' || $parent == 'Administrator' || $parent == 'Calon Pegawai' || $parent == 'Aspek Penilaian' || $parent == 'Faktor Penilaian'){ echo 'active';}?>">
      <a href="#">
        <i class="fa fa-book"></i> <span>Data</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php if($page == 'Administrator' || $page == 'Add Administrator' || $page == 'Edit Administrator'){ echo 'active';}?>">
          <a href="<?= base_url('data/dataAdministrator')?>"><i class="fa fa-circle-o"></i>Administrator</a>
        </li>
        <li class="<?php if($page == 'Calon Pegawai' || $page == 'Add Calon Pegawai' || $page == 'Edit Calon Pegawai'){ echo 'active';}?>">
          <a href="<?= base_url('data/dataPegawai')?>"><i class="fa fa-circle-o"></i>Calon Pegawai</a>
        </li>
        <li class="<?php if($page == 'Aspek Penilaian' || $page == 'Add Aspek Penilaian' || $page == 'Edit Aspek Penilaian'){ echo 'active';}?>">
          <a href="<?= base_url('data/aspek')?>"><i class="fa fa-circle-o"></i>Aspek Penilaian</a>
        </li>
        <li class="<?php if($page == 'Faktor Penilaian' || $page == 'Add Faktor Penilaian' || $page == 'Edit Faktor Penilaian'){ echo 'active';}?>">
          <a href="<?= base_url('data/faktor')?>"><i class="fa fa-circle-o"></i>Faktor Penilaian</a>
        </li>
      </ul>
    </li>
    <li class="<?php if($page == 'Kandidat Calon Pegawai'){ echo 'active';}?>">
      <a href="<?= base_url('kandidat/kandidat')?>"><i class="fa fa-fw fa-bar-chart-o"></i> <span>Kandidat Calon Pegawai</span></a>
    </li>
    <li class="<?php if($page == 'Manual Pehitungan'){ echo 'active';}?>">
      <a href="<?= base_url('manual/manual')?>"><i class="fa fa-fw fa-table"></i> <span>Manual Perhitungan</span></a>
    </li>
    <li class="<?php if($page == 'Hasil Perhitungan'){ echo 'active';}?>">
      <a href="<?= base_url('home/hasil')?>"><i class="fa fa-fw fa-edit"></i> <span>Hasil Perhitungan</span></a>
    </li>
    <li><a href="#" data-toggle="modal" data-target="#logOutModal" data-backdrop="static" data-keyboard="true"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
  </ul>
</section>
  <!-- /.sidebar -->