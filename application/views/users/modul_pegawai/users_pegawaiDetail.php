  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $page?>
    </h1>
    <ol class="breadcrumb">
      <li>PM</li>
      <li><a href="<?= base_url('admin/dataPegawai')?>"><?= $parent ;?></a></li>
      <li><a href="<?= base_url('admin/dataPegawaiEdit/').$this->encrypt->encode($onepegawai->nik).''?>"><?= $page ;?></a></li>
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
        <h4><i class="icon fa fa-info"></i> Alert!</h4>
        <?= $this->session->flashdata('message'); ?>
      </div>
    <?php endif ;?>
    <?php if($this->session->flashdata('success') == TRUE) : ?>
      <!-- Row Note -->
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check"></i> Alert!</h5>
        <?= $this->session->flashdata('success'); ?>
      </div>
    <?php endif ;?> 
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- row -->
    <div class="row ">
      <div class="col-md-1">
      </div>

      <div class="col-md-10">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Pegawai</h3>
          </div>
          <!-- /.box-header -->

          <div class="box-body">


            <form class="form-horizontal" action="<?= base_url('admin/dataPegawaiEdit/').$this->encrypt->encode($onepegawai->nik).''?>" method="post" role="form" >

              <input type="hidden" name="zz" readonly value="<?= $onepegawai->nik ?>" />
              <div class="form-group">
                <label for="addInputNIK" class="col-sm-2 control-label">NIK</label>
                <div class="col-sm-10">
                  <input type="text" name="nik_pegawai" class="form-control" id="addInputNIK" placeholder="NIK" value="<?= $onepegawai->nik?>">
                  <?php echo form_error('nik_pegawai', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              <div class="form-group">
                <label for="addInputNama" class="col-sm-2 control-label">Nama Pegawai</label>
                <div class="col-sm-10">
                  <input type="text" name="nama_pegawai" class="form-control" id="addInputNama" placeholder="Nama Pegawai" value="<?= $onepegawai->nama_pegawai?>">
                  <?php echo form_error('nama_pegawai', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              <div class="form-group">
                <label for="addinputTTL" class="col-sm-2 control-label">Tempat, Tanggal Lahir</label>
                <div class="col-sm-2">
                  <input type="text" name="tempat_lahir" class="form-control" id="addinputTTL" placeholder="Tempat Lahir" value="<?= $onepegawai->tempat_lahir?>">
                  <?php echo form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <div class="col-sm-8">
                  <input type="date" name="tanggal_lahir" class="form-control" id="addinputTTL" value="<?= $onepegawai->tanggal_lahir?>">
                  <?php echo form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              <div class="form-group">
                <label for="addinputKelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                  <select class="form-control" name="jenis_kelamin" id="addinputKelamin">
                    <option value="L" <?= ($onepegawai->jenis_kelamin == "L") ? ' selected' : '' ?>>Laki-Laki</option>
                    <option value="P" <?= ($onepegawai->jenis_kelamin == "P") ? ' selected' : '' ?>>Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="addInputPendidikan" class="col-sm-2 control-label">Pendidikan</label>
                <div class="col-sm-10">
                  <input type="text" name="pendidikan" class="form-control" id="addInputPendidikan" placeholder="Pendidikan Terakhir" value="<?= $onepegawai->pendidikan?>">
                </div>
              </div>
              <div class="form-group">
                <label for="addinputAlamat" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="alamat"  id="addinputAlamat"><?= $onepegawai->alamat?></textarea>
                  <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              <div class="box-footer justify-content-between">
                <a type="button" class="btn btn-warning" href="<?= base_url('admin/dataPegawai')?>">Batal</a>
                <button type="submit" class="btn btn-danger pull-right">Update</button>
              </div>
            </form>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.Col -->

      <div class="col-md-1">
      </div>

    </div>
    <!-- /.row -->
  </section>
