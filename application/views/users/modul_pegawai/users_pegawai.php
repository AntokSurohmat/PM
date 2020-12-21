  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $page?>
    </h1>
    <ol class="breadcrumb">
      <li>PM</li>
      <li><a href="<?= base_url('users/pegawai')?>"><?= $page ;?></a></li>
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
        <h3 class="box-title">Data <?= $page?></h3> 
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th >No</th>
              <th >NIK</th>
              <th >Nama</th>
              <th >Tempat, Tgl Lahir</th>
              <th >L/P</th>
              <th >Pendidikan</th>
              <th >Alamat</th>
              <th width="67" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=0; foreach ($pegawai as $row) :  $i++;?>
            <tr>
              <th scope="row"><?= $i ;?></th>
              <td><?= $row->nik; ?></td>
              <td><?= $row->nama_pegawai; ?></td>
              <td><?= $row->tempat_lahir .', '.date('d F Y', strtotime($row->tanggal_lahir)) ?></td>
              <td><?= $row->jenis_kelamin; ?></td>
              <td><?= $row->pendidikan; ?></td>
              <td><?= $row->alamat; ?></td>
              <td>
                <a class="btn btn-xs btn-info" href="<?= base_url('users/pegawaiDetail/').$this->encrypt->encode($row->nik).'';?>" title="Detail"><i class="fa fa-info-circle"></i></a>
              </td>
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
