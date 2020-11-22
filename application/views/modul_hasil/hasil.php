  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $page?>
    </h1>
    <ol class="breadcrumb">
      <li>PM</li>
      <li><a href="<?= base_url('kandidat/kandidat')?>"><?= $page ;?></a></li>
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

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Hasil Akhir</h3>
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
            </tr>
          </thead>
          <tbody>
            <?php $i=0; foreach ($kandidathasil as $kh) :  $i++;?>
            <tr>
              <th scope="row"><?= $i ;?></th>
              <td><?= $kh->nik; ?></td>
              <td><?= $kh->nama_pegawai; ?></td>
              <td><?= $kh->jenis_kelamin; ?></td>
              <td><?= $kh->pendidikan; ?></td>
              <td><?= $kh->alamat; ?></td>
              <td><?= $kh->nilai_akhir; ?></td>
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
