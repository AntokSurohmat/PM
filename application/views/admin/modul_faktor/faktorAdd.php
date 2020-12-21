  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $page?>
    </h1>
    <ol class="breadcrumb">
      <li>PM</li>
      <li><a href="<?= base_url('admin/faktor')?>"><?= $parent ;?></a></li>
      <li><a href="<?= base_url('admin/faktorAdd')?>"><?= $page ;?></a></li>
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
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Add Faktor</h3>
          </div>
          <!-- /.box-header -->

          <div class="box-body">


            <form class="form-horizontal" action="<?= base_url('admin/faktorAdd')?>" method="post" role="form" >

              <div class="form-group">
                <label for="addInputKode" class="col-sm-2 control-label">Kode</label>
                <div class="col-sm-10">
                  <input type="text" name="kode_faktor" class="form-control" id="addInputKode" readonly placeholder="Kode" value="<?= kode_otomatisFaktor()?>">
                </div>
              </div>
              <div class="form-group">
                <label for="addInputAspek" class="col-sm-2 control-label">Aspek Penilian</label>
                <div class="col-sm-10">
                  <select class="form-control" id="addInputAspek" name="kode_aspek">
                    <option>-- Pilih --</option>
                    <?php foreach ($aspek as $row) :?>
                      <option value="<?= $row->kode_aspek?>"><?= '[' .$row->kode_aspek. ']' .$row->nama_aspek ?></option>
                    <?php endforeach ;?>
                  </select>
                  <?php echo form_error('kode_aspek', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              <div class="form-group">
                <label for="addinputNama" class="col-sm-2 control-label">Nama Faktor Penilaian</label>
                <div class="col-sm-10">
                  <input type="text" name="nama_faktor" class="form-control" id="addinputNama" placeholder="Nama Faktor Penilaian" value="<?= set_value('nama_faktor')?>">
                  <?php echo form_error('nama_faktor', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              <div class="form-group">
                <label for="addinputJenisFactor" class="col-sm-2 control-label">Jenis Faktor Penilaian</label>
                <div class="col-sm-10">
                  <select class="form-control" name="jenis_faktor" id="addinputJenisFactor">
                    <option value="">-- Pilih --</option>
                    <option value="CF">Core Factor (CF)</option>
                    <option value="SF">Secondary Factor (SF)</option>
                  </select>
                  <?php echo form_error('jenis_faktor', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              <div class="form-group">
                <label for="addInputNilaiTar" class="col-sm-2 control-label">Nilai Target</label>
                <div class="col-sm-10">
                  <select class="form-control" name="nilai_target" id="addInputNilaiTar">
                    <option value="">-- Pilih --</option>
                    <option value="1">1 - Sangat Tidak Baik</option>
                    <option value="2">2 - Tidak Baik</option>
                    <option value="3">3 - Cukup</option>
                    <option value="4">4 - Baik</option>
                    <option value="5">5 - Sangat Baik</option>
                  </select>
                  <?php echo form_error('nilai_target', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              <div class="box-footer justify-content-between">
                <a type="button" class="btn btn-warning" href="<?= base_url('admin/faktor')?>">Batal</a>
                <button type="submit" class="btn btn-primary pull-right">Simpan</button>
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
