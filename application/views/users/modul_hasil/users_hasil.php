  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $page?>
    </h1>
    <ol class="breadcrumb">
      <li>PM</li>
      <li><a href="<?= base_url('users/hasil')?>"><?= $page ;?></a></li>
    </ol>
    <?php if(validation_errors()) : ?>
      <!-- Row Note -->
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        <?= validation_errors(); ?>
      </div>
    <?php endif ;?>
    <?php if($this->session->flashdata('message') == TRUE) : ?>
      <!-- Row Note -->
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-info"></i> Note:</h4>
        <?= $this->session->flashdata('message'); ?>
      </div>
    <?php endif ;?>
    <?php if($this->session->flashdata('success') == TRUE) : ?>
      <!-- Row Note -->
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check"></i> Note:</h5>
        <?= $this->session->flashdata('success'); ?>
      </div>
    <?php endif ;?> 
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Perhitungan Hasil Akhir Calon Pegawai</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body ">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>NIK</th>
              <th>Nama Pegawai</th>
              <th>Jenis Kelamin</th>
              <th>Pendidikan</th>
              <th>Alamat</th>
              <th width="100">Hasil Akhir</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=0; foreach ($allhasil as $kh) :  $i++;?>
            <tr>
              <th scope="row"><?= $i ;?></th>
              <td><?= $kh->nik; ?></td>
              <td><?= $kh->nama_pegawai; ?></td>
              <td><?= $kh->jenis_kelamin; ?></td>
              <td><?= $kh->pendidikan; ?></td>
              <td><?= $kh->alamat; ?></td>
              <td><?= $kh->nilai_akhir; ?></td>
              <?php if($kh->kandidat_terima == '0'){
                echo '<td>' .'Belum DiTerima'. '</td>';
              }else{
                echo '<td>' .'DiTerima'. '</td>';
              }?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

<!-- Main content -->
<section class="content">

  <div class="box box-warning">
    <div class="box-header">
      <h3 class="box-title">List Calon Pegawai Yang Sudah DiTerima</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body ">
      <table id="example2" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Pegawai</th>
            <th>Jenis Kelamin</th>
            <th>Pendidikan</th>
            <th>Alamat</th>
            <th width="100">Hasil Akhir</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=0; foreach ($allmasuk as $kh) :  $i++;?>
          <tr>
            <th scope="row"><?= $i ;?></th>
            <td><?= $kh->nik; ?></td>
            <td><?= $kh->nama_pekerja; ?></td>
            <td><?= $kh->jenis_kelamin; ?></td>
            <td><?= $kh->pendidikan; ?></td>
            <td><?= $kh->alamat; ?></td>
            <td><?= $kh->nilai_akhir; ?></td>
            <?php if($kh->kandidat_terima == '0'){
              echo '<td>' .'Belum DiTerima'. '</td>';
            }else{
              echo '<td>' .'DiTerima'. '</td>';
            }?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

</section>
<!-- /.content -->

