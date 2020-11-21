 <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li>
        <a href="<?= base_url('home')?>"><i class="fa fa-dashboard"></i> <span>Beranda</span></a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-book"></i> <span>Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li >
            <a href="<?= base_url('data/dataAdministrator')?>"><i class="fa fa-circle-o"></i>Administrator</a>
          </li>
          <li >
            <a href="<?= base_url('data/dataPegawai')?>"><i class="fa fa-circle-o"></i>Calon Pegawai</a>
          </li>
          <li >
            <a href="<?= base_url('data/aspek')?>"><i class="fa fa-circle-o"></i>Aspek Penilaian</a>
          </li>
          <li >
            <a href="<?= base_url('data/faktor')?>"><i class="fa fa-circle-o"></i>Faktor Penilaian</a>
          </li>
        </ul>
      </li>
      <li><a href="<?= base_url('kandidat/kandidat')?>"><i class="fa fa-fw fa-bar-chart-o"></i> <span>Kandidat Calon Pegawai</span></a></li>
      <li><a href="manual.php"><i class="fa fa-fw fa-table"></i> <span>Manual Perhitungan</span></a></li>
      <li><a href="hasil.akhir.php"><i class="fa fa-fw fa-edit"></i> <span>Hasil Perhitungan</span></a></li>
      <li><a href="#" data-toggle="modal" data-target="#logOutModal" data-backdrop="static" data-keyboard="true"><i class="fa fa-fw fa-power-off"></i> <span>Logout</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->