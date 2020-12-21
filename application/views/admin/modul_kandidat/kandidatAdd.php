  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $page?>
    </h1>
    <ol class="breadcrumb">
      <li>PM</li>
      <li><a href="<?= base_url('admin/kandidat')?>"><?= $parent ;?></a></li>
      <li><a href="<?= base_url('admin/kandidatAdd')?>"><?= $page ;?></a></li>
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
            <h3 class="box-title">Add Kandidat Calon Pegawai</h3>
          </div>
          <!-- /.box-header -->

          <div class="box-body">


            <form class="form-horizontal" action="<?= base_url('admin/kandidatAdd')?>" method="post" role="form" >

              <div class="form-group">
                <label for="addInputKode" class="col-sm-4 control-label">Nama Pegawai</label>
                <div class="col-sm-8">
                  <select class="form-control select2" id="addInputKode" name="nik">
                    <option value="">-- Pilih --</option>
                    <?php foreach($pegawai as $row) : ?>
                      <option value="<?= $row->nik?>"><?= $row->nama_pegawai?></option>
                    <?php endforeach;?>
                  </select>
                  <?php echo form_error('nik', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              
              <?php foreach($faktor as $fak) :?>
                <div class="form-group">
                  <label class="col-sm-4 control-label"><?= $fak->nama_faktor?>  -  <?= $fak->kode_faktor?></label>
                  <div class="col-sm-8">
                    <select class="form-control select2" name="faktor[<?= $fak->kode_faktor?>]" required>
                      <option>-- Pilih --</option>
                      <?php foreach($skala as $key => $value) : ?>
                        <option value="<?= $key ?>"><?= $value .'  ('.$key.')'?></option>
                      <?php endforeach;?>
                    </select>
                    <?php echo form_error('faktor[<?= $fak->kode_faktor?>]', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                </div>
              <?php endforeach;?>

              <div class="box-footer justify-content-between">
                <a type="button" class="btn btn-warning" href="<?= base_url('admin/kandidat')?>">Batal</a>
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